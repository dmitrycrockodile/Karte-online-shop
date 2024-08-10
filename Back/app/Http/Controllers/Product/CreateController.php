<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use App\Models\Tag;

class CreateController extends BaseController
{
    public function __invoke()
    {       
        $colors = Color::all();
        $tags = Tag::all();
        $categories = Category::all();
        $sizes = Size::all();

        return view('product.create', compact('colors', 'tags', 'categories', 'sizes'));
    }
}
