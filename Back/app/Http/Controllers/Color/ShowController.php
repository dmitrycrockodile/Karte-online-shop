<?php

namespace App\Http\Controllers\Color;

use App\Http\Controllers\Controller;
use App\Models\Color;

class ShowController extends Controller
{
    public function __invoke(Color $color)
    {
        return view('color.show', compact('color'));
    }
}
