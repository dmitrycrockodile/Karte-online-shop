<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use App\Models\Tag;
use App\Models\Color;
use App\Models\Category;
use App\Models\Size;
use App\Models\Coupon;
use Illuminate\View\View;

class EditController extends BaseController
{
    public function __invoke(Product $product): View
    {   
        $colors = Color::all();
        $tags = Tag::all();
        $categories = Category::all();
        $sizes = Size::all();
        $coupons = Coupon::all();

        return view('product.edit', compact('product', 'colors', 'tags', 'categories', 'sizes', 'coupons'));
    }
}
