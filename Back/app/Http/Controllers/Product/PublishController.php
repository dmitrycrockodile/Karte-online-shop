<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;

class PublishController extends BaseController
{
    public function __invoke(Product $product): RedirectResponse
    {   
        $product->update(['is_published' => !$product->is_published->value]);
        
        return redirect()->route('product.index')->with(
            'success', 
            trans(
                $product->is_published->value ? "notifications.published" : "notifications.archived", 
                ['type' => 'Product', 'title' => $product['title']]
            )
        );
    }
}
