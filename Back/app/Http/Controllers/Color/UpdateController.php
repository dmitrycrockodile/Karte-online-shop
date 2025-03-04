<?php

namespace App\Http\Controllers\Color;

use App\Http\Controllers\Controller;
use App\Http\Requests\Color\ColorRequest;
use App\Models\Color;
use Illuminate\Http\RedirectResponse;

class UpdateController extends Controller
{
    public function __invoke(ColorRequest $request, Color $color): RedirectResponse
    {
        $data = $request->validated();
        $color->update($data);

        return redirect()->route('color.index')->with('success', trans("notifications.edited", ['type' => 'Color', 'title' => $color['title']]));
    }
}
