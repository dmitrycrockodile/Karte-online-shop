<?php

namespace App\Http\Controllers\Size;

use App\Http\Controllers\Controller;
use App\Models\Size;

class DeleteController extends Controller
{
    public function __invoke(Size $size)
    {
        $size->delete();

        return redirect()->route('size.index');
    }
}
