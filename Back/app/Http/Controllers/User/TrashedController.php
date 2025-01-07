<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class TrashedController extends Controller
{
    public function __invoke()
    {
        $trashed_users = User::onlyTrashed()->get();

        return view('user.trashed', compact('trashed_users'));
    }
}
