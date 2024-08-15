<?php

namespace App\Http\Controllers\Product;

use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use App\Models\Tag;
use App\Models\Coupon;

class CreateController extends BaseController
{
    public function __invoke()
    {       
        $colors = Color::all();
        $tags = Tag::all();
        $categories = Category::all();
        $sizes = Size::all();
        $coupons = Coupon::all();

        return view('product.create', compact('colors', 'tags', 'categories', 'sizes', 'coupons'));
    }
}
