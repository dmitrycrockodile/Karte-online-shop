<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\API\BaseApiController;
use App\Http\Requests\API\Product\OrderRequest;
use App\Models\Order;
use Illuminate\Http\Response;

class CheckoutController extends BaseApiController {
   
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
               'unit_amount' => intval((isset($product['priceWithCoupon']) ? $product['priceWithCoupon'] : $product['price']) * 100),
            ],
            'quantity' => $product['quantity'],
         ];
      }
      $lineItems[] = [
         'price_data' => [
            'currency' => 'usd',
            'product_data' => [
               'name' => 'Shipping Fee',
            ],
            'unit_amount' => intval($data['shippingPrice'] * 100), // Shipping price in cents (e.g., $70.00 = 7000 cents)
         ],
         'quantity' => 1,
      ];

      $checkout_session = \Stripe\Checkout\Session::create([
         'line_items' => $lineItems,
         'mode' => 'payment',
         'success_url' => env('FRONTEND_URL') . '/account?success=true',
         'cancel_url' => env('FRONTEND_URL') . '/cart?success=false',
      ]);

      // $order = new Order();
      // $order->status = 'unpaid';
      // $order->total_price = $data['totalPrice'];
      // $order->session_id = $checkout_session->id;
      // $order->save();


      // Change to $this->successResponse when done
      return response()->json([
         'url' => $checkout_session->url,
         'products' => $products,
         'success' => true
      ], Response::HTTP_OK);
   }
}