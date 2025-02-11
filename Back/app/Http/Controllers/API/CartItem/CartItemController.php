<?php

namespace App\Http\Controllers\API\CartItem;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CartItem\IndexRequest;
use App\Http\Resources\CartItem\CartItemResource;
use App\Models\CartItem;
use App\Service\CartItemService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class CartItemController extends Controller {
   protected CartItemService $cartItemService;

   public function __construct(CartItemService $cartItemService) {
      $this->cartItemService = $cartItemService;
   }

   public function index(): JsonResponse {
      if (Auth::check()) {
         $cartItems = Auth::user()->cartItems()->with('product')->get();
         
         return response()->json([
            'success' => true,
            'data' => CartItemResource::collection($cartItems)
         ], 200);
      } else {
         $cartItems = session()->get('cart', []);
         return response()->json([
            'success' => false,
            'message' => 'Unauthorized user data.',
            'data' => $cartItems
         ], 401);
      }
   }

   public function store(IndexRequest $request): JsonResponse {
      $data = $request->validated();
      $response = $this->cartItemService->store($data);

      if (!$response['success']) {
         return response()->json([
            'success' => false,
            'message' => $response['error']
         ], $response['status']);
      }

      return response()->json([
         'success' => true,
         'message' => 'Product added to cart.',
         'cartItem' => new CartItemResource($response['cartItem'])
      ], 201);
   }

   public function update(IndexRequest $request, CartItem $cartItem): JsonResponse {
      $data = $request->validated();
      $response = $this->cartItemService->update($data, $cartItem);

      if (!$response['success']) {
         return response()->json([
            'success' => false,
            'error' => $response['error']
         ], $response['status']);
      }

      return response()->json([
         'success' => true,
         'message' => 'Product added to the cart.',
         'cartItem' => new CartItemResource($response['cartItem']),
      ], 200);
   }

   public function destroy(CartItem $cartItem): JsonResponse {
      if ($cartItem->user_id !== Auth::id()) {
         return response()->json(['error' => 'Unauthorized.', 401]);
      }

      $cartItem->delete();
      return response()->json(['message' => 'Product removed from cart']);
   }

   public function clearCart(): JsonResponse {
      $userId = Auth::id();

      if (!$userId) {
         return response()->json([
            'message' => 'Unauthorized',
            'success' => false,
         ], 401);
      }

      CartItem::where('user_id', $userId)->delete();

      return response()->json([
         'message' => 'User cart cleared successfully',
         'success' => true,
      ], 200);
   }
}