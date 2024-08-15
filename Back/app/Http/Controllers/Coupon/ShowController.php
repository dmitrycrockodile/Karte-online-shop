<?php

namespace App\Http\Controllers\Coupon;

use App\Http\Controllers\Controller;
use App\Models\Coupon;

class ShowController extends Controller
{
    public function __invoke(Coupon $coupon)
    {
        return view('coupon.show', compact('coupon'));
    }
}
