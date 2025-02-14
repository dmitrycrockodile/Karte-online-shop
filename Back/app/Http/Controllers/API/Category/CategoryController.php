<?php

namespace App\Http\Controllers\API\Category;

use App\Http\Controllers\Controller;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class CategoryController extends Controller {
   /**
     * Retrieves the categories.
     * 
     * @return JsonResponse A JSON response containing retrieved categories.
    */
   public function index(): JsonResponse {
      $categories = Category::all();

      return response()->json([
         'categories' => CategoryResource::collection($categories),
         'success' => true,
      ], Response::HTTP_OK);
   }

   /**
    * Retrieves details of a specific category.
    *
    * This method returns the details of a given category 
    * as a JSON response using the CategoryResource.
    *
    * @param Category $category The category instance to be retrieved.
    * @return JsonResponse A JSON response containing the category details.
    */
   public function show(Category $category): JsonResponse {
      return response()->json([
         'category' => new CategoryResource($category),
         'success' => true,
      ], Response::HTTP_OK);
   }
}
