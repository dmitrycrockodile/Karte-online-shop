<?php

namespace App\Http\Controllers\Size;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function __invoke(): View
    {
        $sizes = Size::all();

        return view('size.index', compact('sizes'));
    }
}
