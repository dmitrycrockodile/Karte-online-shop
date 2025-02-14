<?php

namespace App\Http\Controllers\Coupon;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\View\View;

class ShowController extends Controller
{
    public function __invoke(Coupon $coupon): View
    {
        return view('coupon.show', compact('coupon'));
    }
}
