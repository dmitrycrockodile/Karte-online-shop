<?php

namespace App\Http\Controllers\API\Wishlist;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Wishlist\StoreRequest;
use App\Http\Resources\Wishlist\WishlistResource;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
   public function store(StoreRequest $request) {
      $data = $request->validated();

      $existing_item = Wishlist::where('user_id', $data['user_id'])
                               ->where('product_id', $data['product_id'])
                               ->first();
      
      if ($existing_item) {
         return response()->json([
            'message' => 'Item with this id is already in wishlist',
            'success' => false,
         ], 400);
      }

      $wished_item = Wishlist::create([
         'user_id' => $data['user_id'],
         'product_id' => $data['product_id'],
      ]);

      return response()->json([
         'item' => new WishlistResource($wished_item),
         'message' => 'Product was successfully added to the wishlist',
         'success' => true,
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