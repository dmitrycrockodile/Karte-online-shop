<?php

namespace App\Http\Controllers\Coupon;

use App\Http\Controllers\Controller;
use App\Http\Requests\Coupon\CouponRequest;
use App\Models\Coupon;

class StoreController extends Controller
{
    public function __invoke(CouponRequest $request)
    {
        $data = $request->validated();
        Coupon::firstOrCreate($data);
        
        return redirect()->route('coupon.index');
    }
}
