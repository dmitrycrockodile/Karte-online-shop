<?php

namespace App\Http\Controllers\Product;

use App\Http\Requests\Product\StoreRequest;
use Illuminate\Http\RedirectResponse;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if (!$this->service->store($data)) {
            return redirect()->route('product.index')->with(
                'error',
                trans("notifications.failed_to_create", ['type' => 'product'])
            );
        } 
        
        return redirect()->route('product.index')->with(
            'success', 
            trans("notifications.created", ['type' => 'Product', 'title' => $data['title']])
        );
    }
}
