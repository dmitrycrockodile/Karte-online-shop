<?php

namespace App\Http\Controllers\Coupon;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\View\View;

class EditController extends Controller
{
    public function __invoke(Coupon $coupon): View
    {   
        return view('coupon.edit', compact('coupon'));
    }
}
