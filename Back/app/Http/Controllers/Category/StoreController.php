<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Models\Category;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        if (isset($data['coupons'])) {
            $couponsIds = $data['coupons'];
            unset($data['coupons']);
        } else {
            $couponsIds = [];
        }

        $category = Category::firstOrCreate($data);
        
        $category->coupons()->attach($couponsIds);
        
        return redirect()->route('category.index');
    }
}
