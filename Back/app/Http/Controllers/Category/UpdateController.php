<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Category $category)
    {
        $data = $request->validated();

        if (isset($data['coupons'])) {
            $couponsIds = $data['coupons'];
            unset($data['coupons']);
        } else {
            $couponsIds = [];
        }

        $category->update($data);

        $category->coupons()->sync($couponsIds);

        return redirect()->route('category.index');
    }
}
