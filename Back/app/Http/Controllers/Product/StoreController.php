<?php

namespace App\Http\Controllers\Product;

use App\Http\Requests\Product\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);
        
        return redirect()->route('product.index');
    }
}
