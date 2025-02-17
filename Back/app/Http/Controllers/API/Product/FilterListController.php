<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\API\BaseApiController;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Tag;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Color\ColorResource;
use App\Http\Resources\Tag\TagResource;

class FilterListController extends BaseApiController
{
   public function __invoke()
   {
      return $this->successResponse([ 
         'categories' => CategoryResource::collection(Category::all()),
         'colors' => ColorResource::collection(Color::all()),
         'tags' => TagResource::collection(Tag::all()),
         'prices' => [
            'minPrice' => Product::min('price'),
            'maxPrice' => Product::max('price'),
         ]
      ]);
   }
}
