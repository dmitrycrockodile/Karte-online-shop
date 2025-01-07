<?php

namespace App\Http\Controllers\Color;

use App\Http\Controllers\Controller;
use App\Http\Requests\Color\ColorRequest;
use App\Models\Color;

class UpdateController extends Controller
{
    public function __invoke(ColorRequest $request, Color $color)
    {
        $data = $request->validated();
        $color->update($data);

        return redirect()->route('color.index')->with('success', "Color \"{$color['title']}\" was updated!");
    }
}
