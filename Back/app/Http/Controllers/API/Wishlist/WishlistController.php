<?php

namespace App\Http\Controllers\API\Wishlist;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Wishlist\StoreRequest;
use App\Http\Resources\Wishlist\WishlistResource;
use App\Models\Wishlist;
use App\Service\WishlistService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller {
   protected WishlistService $wishlistService;

   public function __construct(WishlistService $wishlistService) {
      $this->wishlistService = $wishlistService;
   }

   /**
     * Adds a product to the user's wishlist.
     *
     * This method validates the incoming request data, adds the product to the wishlist,
     * and returns a response with a success message or an error.
     *
     * @param StoreRequest $request The validated data from the store request.
     * @return JsonResponse The response with the result of the operation.
   */
   public function store(StoreRequest $request): JsonResponse {
      $data = $request->validated();
      $response = $this->wishlistService->store($data);

      if (!$response['success']) {
         return response()->json([
            'success' => false,
            'message' => $response['error']
         ], $response['status']);
      }

      return response()->json([
         'success' => true,
         'item' => new WishlistResource($response['item']),
         'message' => 'Product was successfully added to the wishlist.',
      ], Response::HTTP_CREATED);
   }

   /**
     * Retrieves the user's wishlist.
     *
     * This method fetches all the products in the authenticated user's wishlist 
     * and returns them as a JSON response.
     *
     * @return JsonResponse The response containing the wishlist products.
   */
   public function index(): JsonResponse {
      $userId = Auth::id();
      $wishlist_items = Wishlist::where('user_id', $userId)->with('product')->get();

      return response()->json([
         'wishlist' => WishlistResource::collection($wishlist_items),
         'message' => 'Wish list products',
         'success' => true,
      ], Response::HTTP_OK);
   }

   /**
     * Removes a product from the user's wishlist.
     *
     * This method checks if the wishlist item belongs to the authenticated user.
     * If so, it deletes the item from the wishlist; otherwise, it returns an unauthorized error.
     *
     * @param Wishlist $wishlist The wishlist item to be deleted.
     * @return JsonResponse The response indicating the success or failure of the operation.
   */
   public function destroy(Wishlist $wishlist): JsonResponse {
      if ($wishlist->user_id !== Auth::id()) {
         return response()->json(['error' => 'Unauthorized.', Response::HTTP_UNAUTHORIZED]);
      }

      $wishlist->delete();

      return response()->json([
         'message' => 'Product removed from wishlist successfully.',
         'success' => true,
      ], Response::HTTP_OK);
   }
}