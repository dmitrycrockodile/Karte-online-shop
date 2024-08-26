<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Category $category)
    {
        $data = $request->validated();

        if (isset($data['preview_image'])) {
            $data['preview_image'] = Storage::disk('public')->put('/images/categories', $data['preview_image']);
        } else {
            $data['preview_image'] = $category['preview_image'];
        }

        if (isset($data['banner'])) {
            $data['banner'] = Storage::disk('public')->put('/images/categories', $data['banner']);
        } else {
            $data['banner'] = $category['banner'];
        }

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
