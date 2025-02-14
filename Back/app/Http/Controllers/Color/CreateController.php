<?php

namespace App\Http\Controllers\Color;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class CreateController extends Controller
{
    public function __invoke(): View
    {        
        return view('color.create');
    }
}
