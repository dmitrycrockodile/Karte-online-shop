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

   public function getCategoryProducts(Request $request, $categoryId) {
      $category = Category::with('products')->find($categoryId);

      if (!$category) {
         return response()->json(['message' => 'Category not found'], 404);
      }   

      $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($request->all())]);
      
      $query = $category->products()->filter($filter);

      $dataPerPage = $request->input('dataPerPage', 16);
      $page = $request->input('page', 1);

      $products = ProductResource::collection($query->paginate($dataPerPage, ['*'], 'page', $page));

      return $products;
   }
}
