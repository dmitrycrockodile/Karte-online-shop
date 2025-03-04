<?php

namespace App\Http\Controllers\API\Product;

use App\Enums\ProductStatus;
use App\Http\Controllers\API\BaseApiController;
use App\Http\Filters\ProductFilter;
use App\Http\Requests\API\Product\IndexRequest;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;

class IndexController extends BaseApiController
{
    public function __invoke(IndexRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);
        
        $query = Product::where('is_published', ProductStatus::PUBLISHED)->filter($filter);

        if (isset($data['dataPerPage'])) {
            $paginatedProducts = $query->paginate($data['dataPerPage'], ['*'], 'page', $data['page']);
            $products = ProductResource::collection($paginatedProducts);

            return $this->successResponse([
                'products' => $products,
                'meta' => [
                    'current_page' => $paginatedProducts->currentPage(),
                    'last_page' => $paginatedProducts->lastPage(),
                    'per_page' => $paginatedProducts->perPage(), 
                    'total' => $paginatedProducts->total(),
                    'links' => $paginatedProducts->toArray()['links'],
                ]
            ]);
        } else {
            $products = ProductResource::collection($query->get());

            return $this->successResponse([ 'products' => $products ]);
        }
    }
}
