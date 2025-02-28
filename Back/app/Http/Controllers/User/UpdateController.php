<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, User $user): RedirectResponse
    {
        $data = $request->validated();
        $user->update($data);

        return redirect()->route('user.index')->with('success', trans("notifications.edited", ['type' => 'User', 'title' => $user['name']]));
    }
}
