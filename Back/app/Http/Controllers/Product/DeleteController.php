<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;

class DeleteController extends BaseController
{
    public function __invoke(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('product.index')->with('success', trans("notifications.deleted", ['type' => 'Product', 'title' => $product['title']]));
    }
}
