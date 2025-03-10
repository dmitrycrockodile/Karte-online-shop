<?php

namespace App\Http\Controllers\Color;

use App\Http\Controllers\Controller;
use App\Http\Requests\Color\ColorRequest;
use App\Models\Color;
use Illuminate\Http\RedirectResponse;

class StoreController extends Controller
{
    public function __invoke(ColorRequest $request): RedirectResponse
    {
        $data = $request->validated();
        Color::firstOrCreate($data);
        
        return redirect()->route('color.index')->with('success', trans("notifications.created", ['type' => 'Color', 'title' => $data['title']]));
    }
}