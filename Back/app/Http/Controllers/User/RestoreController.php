<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class RestoreController extends Controller
{
    public function __invoke(int $id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->restore();

        return redirect()->route('user.index')
                         ->with('success', trans('notifications.restored', ['type' => 'User', 'title' => $user['name']]));
    }
}
