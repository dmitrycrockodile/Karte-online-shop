<?php

namespace App\Http\Controllers\Coupon;

use App\Http\Controllers\Controller;
use App\Http\Requests\Coupon\CouponRequest;
use App\Models\Coupon;
use Illuminate\Http\RedirectResponse;

class UpdateController extends Controller
{
    public function __invoke(CouponRequest $request, Coupon $coupon): RedirectResponse
    {
        $data = $request->validated();
        $coupon->update($data);

        return redirect()->route('coupon.index')->with('success', trans("notifications.edited", ['type' => 'Coupon', 'title' => $coupon['title']]));
    }
}
