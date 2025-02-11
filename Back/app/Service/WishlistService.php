<?php

namespace App\Service;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Log;

class WishlistService {
   /**
    * Method tries to store the product in the wishlist
    *
    * @param array $data
    * @return array
   */
   public function store(array $data) {
      try {
         $existing_item = Wishlist::where('user_id', $data['user_id'])
                                 ->where('product_id', $data['product_id'])
                                 ->first();
         if ($existing_item) {
            return [
               'success' => false,
               'error' => 'Item with this id is already in wishlist',
               'status' => 400,
            ];
         }

         $wished_item = Wishlist::create([
            'user_id' => $data['user_id'],
            'product_id' => $data['product_id'],
         ]);

         return [
            'success' => true,
            'item' => $wished_item
         ];
      } catch (\Exception $e) {
         Log::error('Failed to subscribe the user: ' . $e->getMessage(), [
            'trace' => $e->getTraceAsString() 
         ]);

         return [
            'success' => false,
            'error' => 'Failed to add, please try again.',
            'status' => 500,
         ];
      }
   }
}