<?php

namespace App\Http\Controllers\Coupon;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke()
    {        
        return view('coupon.create');
    }
}
