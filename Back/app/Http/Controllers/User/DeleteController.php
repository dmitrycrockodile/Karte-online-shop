<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class DeleteController extends Controller
{
    public function __invoke(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('user.index')->with('success', trans("notifications.deleted", ['type' => 'User', 'title' => $user['name']]));
    }
}
