<?php

namespace App\Http\Controllers\API\Category;

use App\Http\Controllers\API\BaseApiController;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class CategoryController extends BaseApiController {
   /**
     * Retrieves the categories.
     * 
     * @return JsonResponse A JSON response containing retrieved categories.
    */
   public function index(): JsonResponse {
      $categories = Category::all();

      return $this->successResponse(['categories' => CategoryResource::collection($categories)]);
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
      return $this->successResponse(['category' => new CategoryResource($category)]);
   }
}
