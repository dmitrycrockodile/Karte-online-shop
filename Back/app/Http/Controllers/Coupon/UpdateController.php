<?php

namespace App\Http\Controllers\Coupon;

use App\Http\Controllers\Controller;
use App\Http\Requests\Coupon\CouponRequest;
use App\Models\Coupon;

class UpdateController extends Controller
{
    public function __invoke(CouponRequest $request, Coupon $coupon)
    {
        $data = $request->validated();
        $coupon->update($data);

        return redirect()->route('coupon.index');
    }
}
