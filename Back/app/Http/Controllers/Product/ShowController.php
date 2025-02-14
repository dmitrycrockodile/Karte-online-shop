<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use Illuminate\View\View;

class ShowController extends BaseController
{
    public function __invoke(Product $product): View
    {
        return view('product.show', compact('product'));
    }
}
