<?php

namespace App\Service;

use App\Models\CartItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Response;

class CartItemService {
   /**
    * Method tries to store the cart item data into the 'cart_items' table
    *
    * @param array $data
    * @return bool
   */
   public function store(array $data): array {
      try {
         $userId = Auth::id();

         if (!$userId) {
            return [
               'success' => false, 
               'error' => 'Unauthorized.',
               'status' => Response::HTTP_UNAUTHORIZED,
            ];
         }

         $cartItem = CartItem::where('user_id', $userId)
                              ->where('product_id', $data['product_id'])
                              ->get()
                              ->filter(function ($item) use ($data) {
                                 return json_decode($item->attributes, true) == $data['attributes'] && !$data['withCoupon'];
                              })
                              ->first();

         if ($cartItem) {
            return $this->update($data, $cartItem);
         } 

         DB::beginTransaction();
         
         $cartItem = CartItem::create([
            'product_id' => $data['product_id'],
            'user_id' => $userId,
            'quantity' => $data['quantity'],
            'attributes' => json_encode($data['attributes']) ?? null,
         ]);

         $cartItemWithProduct = CartItem::where('id', $cartItem->id)
                                         ->with('product')
                                         ->first();

         DB::commit();

         return [
            'success' => true,
            'cartItem' => $cartItemWithProduct
         ];
      } catch (\Exception $e) {
         DB::rollBack();

         Log::error('Failed to update cart item: ' . $e->getMessage(), [
            'trace' => $e->getTraceAsString() 
         ]);

         return [
            'success' => false,
            'error' => 'Failed to update cart item, please try again.',
            'status' => 500,
         ];
      }
   }

   /**
    * Method tries to update the cart item data in the 'cart_items' table
    *
    * @param array $data
    * @param CartItem $cartItem
    *
    * @return array
   */
   public function update(array $data, CartItem $cartItem): array {
      try {
         $cartItem->update([
            'quantity' => $cartItem->quantity + $data['quantity']
         ]);

         $cartItemWithProduct = CartItem::where('id', $cartItem->id)
                                          ->with('product')
                                          ->first();

         return [
            'success' => true,
            'cartItem' => $cartItemWithProduct
         ];
      } catch (\Exception $e) {
         Log::error('Failed to update cart item: ' . $e->getMessage(), [
            'trace' => $e->getTraceAsString() 
         ]);

         return [
            'success' => false,
            'error' => 'Failed to update cart item, please try again.',
            'status' => 500,
         ];
      }
   }
}