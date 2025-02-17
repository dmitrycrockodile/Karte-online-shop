<?php

namespace App\Http\Controllers\API\CartItem;

use App\Http\Controllers\API\BaseApiController;
use App\Http\Requests\Api\CartItem\IndexRequest;
use App\Http\Resources\CartItem\CartItemResource;
use App\Models\CartItem;
use App\Service\CartItemService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Response;

class CartItemController extends BaseApiController {
   protected CartItemService $cartItemService;

   public function __construct(CartItemService $cartItemService) {
      $this->cartItemService = $cartItemService;
   }

   /**
     * Retrieves the user's cart items.
     * 
     * If the user is authenticated, this method fetches cart items from the database, 
     * including related product details. Otherwise, it attempts to retrieve cart data 
     * from the session for unauthenticated users.
     * 
     * @return JsonResponse A JSON response containing cart items or an unauthorized message.
    */
   public function index(): JsonResponse {
      if (Auth::check()) {
         $cartItems = Auth::user()->cartItems()->with('product')->get();
         
         return $this->successResponse(CartItemResource::collection($cartItems));
      } else {
         $cartItems = session()->get('cart', []);
         return $this->successResponse($cartItems, 'Unauthorized user data.');
      }
   }

   /**
     * Stores user's cart item.
     * 
     * This method stores cart item into the database.
     * 
     * @param IndexRequest $request validated request with cart item data
     * 
     * @return JsonResponse A JSON response containing stored cart item data or an unauthorized message.
    */
   public function store(IndexRequest $request): JsonResponse {
      $data = $request->validated();
      $response = $this->cartItemService->store($data);

      if (!$response['success']) {
         return $this->errorResponse($response['error'], $response['status']);
      }

      return $this->successResponse([ 'cartItem' => new CartItemResource($response['cartItem'])], 'Product added to cart.', Response::HTTP_CREATED);
   }

   /**
     * Updates user's cart item.
     * 
     * If user tries to update not his own cart item, method returns 'Unauthorized.' error.
     * Otherwise, updates the cart item data.
     * 
     * @param IndexRequest $request validated request with cart item data
     * @param CartItem $cartItem the cart item user wants to update
     * 
     * @return JsonResponse A JSON response containing updated cart item data or an error message.
    */
   public function update(IndexRequest $request, CartItem $cartItem): JsonResponse {
      $data = $request->validated();
      // Permissions check
      if (Gate::denies('update', $cartItem)) {
         return $this->errorResponse('Unauthorized.', Response::HTTP_UNAUTHORIZED);
      }

      $response = $this->cartItemService->update($data, $cartItem);

      if (!$response['success']) {
         return $this->errorResponse($response['error'], $response['status']);
      }

      return $this->successResponse([ 'cartItem' => new CartItemResource($response['cartItem']) ], 'Product added to the cart.');
   }

   /**
     * Deletes user's cart item.
     * 
     * If user tries to delete not his own cart item, method returns 'Unauthorized.' error.
     * Otherwise, deletes the cart item data.
     * 
     * @param CartItem $cartItem the cart item user wants to delete
     * 
     * @return JsonResponse A JSON response containing updated cart item data or an error message.
    */
   public function destroy(CartItem $cartItem): JsonResponse {
      // Permissions check
      if (Gate::denies('delete', $cartItem)) {
         return $this->errorResponse('Unauthorized.', Response::HTTP_UNAUTHORIZED);
      }

      $cartItem->delete();

      return $this->successResponse([], 'Product removed from cart');
   }

   /**
     * Cleares the user cart
     * 
     * If user is not authorized, method returns 'Unauthorized.' error.
     * Otherwise, clears the user cart items data.
     * 
     * @return JsonResponse A JSON response containing success or error messages.
    */
   public function clearCart(): JsonResponse {
      $userId = Auth::id();

      if (!$userId) {
         return $this->errorResponse('Unauthorized.', Response::HTTP_UNAUTHORIZED);
      }

      CartItem::where('user_id', $userId)->delete();

      return $this->successResponse([], 'User cart cleared successfully');
   }
}