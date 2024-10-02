<?php

namespace App\Http\Controllers\API\CartItem;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CartItem\IndexRequest;
use App\Http\Resources\CartItem\CartItemResource;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class CartItemController extends Controller {
   public function index() {
      if (Auth::check()) {
         $cartItems = Auth::user()->cartItems()->with('product')->get();
         
         return CartItemResource::collection($cartItems);
      } else {
         $cartItems = session()->get('cart', []);
         return response()->json($cartItems, 401);
      }
   }

   public function store(IndexRequest $request) {
      $data = $request->validated();
      $userId = Auth::id();

      $cartItem = CartItem::where('user_id', $userId)
                           ->where('product_id', $data['product_id'])
                           ->get()
                           ->filter(function ($item) use ($data) {
                              return json_decode($item->attributes, true) == $data['attributes'];
                           })
                           ->first();

      if ($cartItem) {
         return $this->update($request, $cartItem);
      } else {
         $cartItem = CartItem::create([
            'product_id' => $data['product_id'],
            'user_id' => $userId,
            'quantity' => $data['quantity'],
            'attributes' => json_encode($data['attributes']) ?? null,
         ]);

         $cartItemWithProduct = CartItem::where('id', $cartItem->id)
                                         ->with('product')
                                         ->first();

         return response()->json([
            'message' => 'Product added to cart',
            'cartItem' => new CartItemResource($cartItemWithProduct)
         ], 201);
      }
   }

   public function update(IndexRequest $request, CartItem $cartItem) {
      $data = $request->validated();
     
      if ($cartItem->user_id !== Auth::id()) {
         return response()->json(['error' => 'Unauthorized.'], 401);
      }

      $cartItem->update([
         'quantity' => $cartItem->quantity + $data['quantity']
      ]);

      $cartItemWithProduct = CartItem::where('id', $cartItem->id)
                                       ->with('product')
                                       ->first();

      return response()->json([
         'message' => 'Cart item updated',
         'cartItem' => new CartItemResource($cartItemWithProduct)
      ], 200);
   }

   public function destroy(CartItem $cartItem) {
      if ($cartItem->user_id !== Auth::id()) {
         return response()->json(['error' => 'Unauthorized.', 401]);
      }

      $cartItem->delete();
      return response()->json(['message' => 'Item removed from cart']);
   }

   public function clearCart() {
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
