<?php

namespace App\Http\Controllers\API\Category;

use App\Http\Controllers\Controller;
use App\Http\Filters\ProductFilter;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Product\ProductResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller {
   public function getCategories() {
      $categories = Category::all();

      return CategoryResource::collection($categories);
   }

   public function getCategory(Category $category) {
      return new CategoryResource($category);
   }
}
