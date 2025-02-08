<?php

namespace App\Http\Controllers\Product;

use App\Http\Requests\Product\UpdateRequest;
use Illuminate\Support\Facades\Log;
use App\Models\Product;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Product $product)
    {
        $data = $request->validated();

        if (!$this->service->update($data, $product)) {
            return redirect()->route('product.index')->with(
                'error', 
                trans("notifications.failed_to_update", ['type' => 'product', 'title' => $product['title']])
            );
        }
        
        return redirect()->route('product.index')->with(
            'success', 
            trans("notifications.edited", ['type' => 'Product', 'title' => $product['title']])
        );
    }
}
