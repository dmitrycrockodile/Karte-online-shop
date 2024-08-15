<?php

namespace App\Http\Controllers\Coupon;

use App\Http\Controllers\Controller;
use App\Models\Coupon;

class EditController extends Controller
{
    public function __invoke(Coupon $coupon)
    {   
        return view('coupon.edit', compact('coupon'));
    }
}
