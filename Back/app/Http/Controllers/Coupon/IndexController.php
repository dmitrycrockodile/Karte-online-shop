<?php

namespace App\Http\Controllers\Coupon;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function __invoke(): View
    {
        $coupons = Coupon::all();

        return view('coupon.index', compact('coupons'));
    }
}
