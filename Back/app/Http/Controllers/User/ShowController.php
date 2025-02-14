<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;

class ShowController extends Controller
{
    public function __invoke(User $user): View
    {
        return view('user.show', compact('user'));
    }
}
