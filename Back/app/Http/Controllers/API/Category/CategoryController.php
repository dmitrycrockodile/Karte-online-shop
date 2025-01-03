<?php

namespace App\Http\Controllers\API\Category;

use App\Http\Controllers\Controller;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;

class CategoryController extends Controller {
   public function index() {
      $categories = Category::all();

      return response()->json([
         'categories' => CategoryResource::collection($categories),
         'success' => true,
      ], 200);
   }

   public function show(Category $category) {
      return response()->json([
         'category' => new CategoryResource($category),
         'success' => true,
      ], 200);
   }
}
