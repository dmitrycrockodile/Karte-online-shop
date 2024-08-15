<?php

namespace App\Http\Controllers\Coupon;

use App\Http\Controllers\Controller;
use App\Models\Coupon;

class IndexController extends Controller
{
    public function __invoke()
    {
        $coupons = Coupon::all();

        return view('coupon.index', compact('coupons'));
    }
}
