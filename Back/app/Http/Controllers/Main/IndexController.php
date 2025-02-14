<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function __invoke(): View
    {
        $productsCount = Product::all()->count();
        $usersCount = User::all()->count();
        $reviewsCount = Review::all()->count();

        return view('main.index', compact('productsCount', 'usersCount', 'reviewsCount'));
    }
}
