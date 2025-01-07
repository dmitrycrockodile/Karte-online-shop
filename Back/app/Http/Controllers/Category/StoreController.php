<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $data['preview_image'] = Storage::disk('public')->put('/images/categories', $data['preview_image']);
        $data['banner'] = Storage::disk('public')->put('/images/categories', $data['banner']);

        if (isset($data['coupons'])) {
            $couponsIds = $data['coupons'];
            unset($data['coupons']);
        } else {
            $couponsIds = [];
        }

        $category = Category::firstOrCreate($data);
        
        $category->coupons()->attach($couponsIds);
        
        return redirect()->route('category.index')->with('success', "Category \"{$category['title']}\" was created!");
    }
}
