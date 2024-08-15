<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Coupon;

class EditController extends Controller
{
    public function __invoke(Category $category)
    {   
        $coupons = Coupon::all();

        return view('category.edit', compact('category', 'coupons'));
    }
}
