<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\API\BaseApiController;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;

class ShowController extends BaseApiController
{
   public function __invoke(Product $product)
   {
      return $this->successResponse(['product' => new ProductResource($product)]);
   }  
}
