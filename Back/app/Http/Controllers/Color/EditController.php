<?php

namespace App\Http\Controllers\Color;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\View\View;

class EditController extends Controller
{
    public function __invoke(Color $color): View
    {   
        return view('color.edit', compact('color'));
    }
}
