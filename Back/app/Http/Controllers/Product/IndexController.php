<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use Illuminate\View\View;

class IndexController extends BaseController
{
    public function __invoke(): View
    {
        $products = Product::all();

        return view('product.index', compact('products'));
    }
}
