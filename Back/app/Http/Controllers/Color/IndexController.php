<?php

namespace App\Http\Controllers\Color;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function __invoke(): View
    {
        $colors = Color::all();

        return view('color.index', compact('colors'));
    }
}
