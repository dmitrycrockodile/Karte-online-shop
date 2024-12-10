<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Filters\ProductFilter;
use App\Http\Requests\API\Product\IndexRequest;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;

class IndexController extends Controller
{
    public function __invoke(IndexRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);
        
        $query = Product::filter($filter);
        
        if (isset($data['dataPerPage'])) {
            $products = ProductResource::collection($query->paginate($data['dataPerPage'], ['*'], 'page', $data['page']));
        } else {
            $products = ProductResource::collection($query->get());
        }

        return response()->json([
            'success' => true,
            'products' => $products,
        ], 200);
    }
}
