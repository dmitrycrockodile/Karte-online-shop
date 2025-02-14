<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\View\View;

class CreateController extends Controller
{
    public function __invoke(): View
    {        
        $coupons = Coupon::all();

        return view('category.create', compact('coupons'));
    }
}
