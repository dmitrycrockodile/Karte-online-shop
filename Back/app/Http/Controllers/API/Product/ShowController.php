<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use Illuminate\Http\Response;

class ShowController extends Controller
{
   public function __invoke(Product $product)
   {
      return response()->json([
         'success' => true,
         'product' => new ProductResource($product),
      ], Response::HTTP_OK);
   }  
}
