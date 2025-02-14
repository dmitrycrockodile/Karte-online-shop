<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;

class EditController extends Controller
{
    public function __invoke(User $user): View
    {   
        return view('user.edit', compact('user'));
    }
}
