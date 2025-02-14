<?php

namespace App\Http\Controllers\Color;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\View\View;

class ShowController extends Controller
{
    public function __invoke(Color $color): View
    {
        return view('color.show', compact('color'));
    }
}
