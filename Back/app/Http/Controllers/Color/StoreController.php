<?php

namespace App\Http\Controllers\Color;

use App\Http\Controllers\Controller;
use App\Http\Requests\Color\ColorRequest;
use App\Models\Color;

class StoreController extends Controller
{
    public function __invoke(ColorRequest $request)
    {
        $data = $request->validated();
        Color::firstOrCreate($data);
        
        return redirect()->route('color.index');
    }
}
