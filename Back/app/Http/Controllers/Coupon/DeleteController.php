<?php

namespace App\Http\Controllers\Coupon;

use App\Http\Controllers\Controller;
use App\Models\Coupon;

class DeleteController extends Controller
{
    public function __invoke(Coupon $coupon)
    {
        $coupon->delete();

        return redirect()->route('coupon.index')->with('success', trans("notifications.deleted", ['type' => 'Coupon', 'title' => $coupon['title']]));
    }
}
