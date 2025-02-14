<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Tag;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Color\ColorResource;
use App\Http\Resources\Tag\TagResource;
use Illuminate\Http\Response;

class FilterListController extends Controller
{
   public function __invoke()
   {
      return response()->json([
         'filters' => [
            'categories' => CategoryResource::collection(Category::all()),
            'colors' => ColorResource::collection(Color::all()),
            'tags' => TagResource::collection(Tag::all()),
            'prices' => [
               'minPrice' => Product::min('price'),
               'maxPrice' => Product::max('price'),
            ],
         ],
         'success' => true
      ], Response::HTTP_OK);
   }
}
