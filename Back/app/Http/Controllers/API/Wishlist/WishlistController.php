<?php

namespace App\Http\Controllers\API\Wishlist;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Wishlist\StoreRequest;
use App\Http\Resources\Wishlist\WishlistResource;
use App\Models\Wishlist;
use App\Service\WishlistService;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
   protected WishlistService $wishlistService;

   public function __construct(WishlistService $wishlistService) {
      $this->wishlistService = $wishlistService;
   }

   public function store(StoreRequest $request) {
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
      ], 201);
   }

   public function index() {
      $userId = Auth::id();
      $wishlist_items = Wishlist::where('user_id', $userId)->with('product')->get();

      return response()->json([
         'wishlist' => WishlistResource::collection($wishlist_items),
         'message' => 'Wish list products',
         'success' => true,
      ], 200);
   }

   public function destroy(Wishlist $wishlist) {
      if ($wishlist->user_id !== Auth::id()) {
         return response()->json(['error' => 'Unauthorized.', 401]);
      }

      $wishlist->delete();

      return response()->json([
         'message' => 'Product removed from wishlist successfully.',
         'success' => true,
      ], 200);
   }
}