<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Coupon;

class CreateController extends Controller
{
    public function __invoke()
    {        
        $coupons = Coupon::all();

        return view('category.create', compact('coupons'));
    }
}
