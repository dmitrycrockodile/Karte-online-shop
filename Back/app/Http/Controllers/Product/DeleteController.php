<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;

class DeleteController extends BaseController
{
    public function __invoke(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index');
    }
}
