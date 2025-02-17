<?php

namespace App\Http\Controllers\API\Wishlist;

use App\Http\Controllers\API\BaseApiController;
use App\Http\Requests\Api\Wishlist\StoreRequest;
use App\Http\Resources\Wishlist\WishlistResource;
use App\Models\Wishlist;
use App\Service\WishlistService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class WishlistController extends BaseApiController {
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
         return $this->errorResponse($response['error'], $response['status']);
      }

      return $this->successResponse(
         [ 'item' => new WishlistResource($response['item']) ],
         'Product was successfully added to the wishlist.',
         Response::HTTP_CREATED
      );
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

      return $this->successResponse(
         [ 'wishlist' => WishlistResource::collection($wishlist_items) ],
         'Wish list products',
      );
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
         return $this->errorResponse('Unauthorized.', Response::HTTP_UNAUTHORIZED);
      }

      $wishlist->delete();

      return $this->successResponse([], 'Product removed from wishlist successfully.');
   }
}