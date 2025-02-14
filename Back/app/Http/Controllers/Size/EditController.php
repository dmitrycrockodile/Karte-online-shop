<?php

namespace App\Http\Controllers\Size;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\View\View;

class EditController extends Controller
{
    public function __invoke(Size $size): View
    {   
        return view('size.edit', compact('size'));
    }
}
