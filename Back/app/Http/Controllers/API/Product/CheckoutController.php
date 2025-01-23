<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Product\OrderRequest;

class CheckoutController extends Controller {
   
   public function __invoke(OrderRequest $request) {
      $data = $request->validated();
      $products = $data['products'];
      \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

      $lineItems = [];
      foreach ($products as $product) {
         $lineItems[] = [
            # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
            'price_data' => [
               'currency' => 'usd',
               'product_data' => [
                  'name' => $product['title'],
                  'images' => [ $product['image'] ]
               ],
               'unit_amount' => intval($product['total_price'] * 100)
            ],
            'quantity' => $product['quantity'],
         ];
      }

      $checkout_session = \Stripe\Checkout\Session::create([
         'line_items' => $lineItems,
         'mode' => 'payment',
         'success_url' => env('FRONTEND_URL') . '/account?success=true',
         'cancel_url' => env('FRONTEND_URL') . '/cart?success=false',
      ]);

      return response()->json([
         'url' => $checkout_session->url,
         'products' => $products,
         'success' => true
      ], 200);
   }
}