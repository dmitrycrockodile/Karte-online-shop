<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function __invoke(): View
    {
        $users = User::all();

        return view('user.index', compact('users'));
    }
}
