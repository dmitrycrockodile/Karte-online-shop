<?php

namespace App\Http\Controllers\Color;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\RedirectResponse;

class DeleteController extends Controller
{
    public function __invoke(Color $color): RedirectResponse
    {
        $color->delete();

        return redirect()->route('color.index')->with('success', trans("notifications.deleted", ['type' => 'Color', 'title' => $color['title']]));
    }
}
