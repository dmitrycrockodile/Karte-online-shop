<?php

namespace App\Http\Controllers\Coupon;

use App\Http\Controllers\Controller;
use App\Http\Requests\Coupon\CouponRequest;
use App\Models\Coupon;
use Illuminate\Http\RedirectResponse;

class StoreController extends Controller
{
    public function __invoke(CouponRequest $request): RedirectResponse
    {
        $data = $request->validated();
        Coupon::firstOrCreate($data);
        
        return redirect()->route('coupon.index')->with('success', trans("notifications.created", ['type' => 'Coupon', 'title' => $data['title']]));
    }
}
