<?php

namespace App\Http\Controllers\Size;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke()
    {        
        return view('size.create');
    }
}
