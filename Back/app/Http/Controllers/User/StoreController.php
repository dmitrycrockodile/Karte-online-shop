<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        User::firstOrCreate([
            'email' => $data['email']
        ], $data);
    
        return redirect()->route('user.index')->with('success', trans("notifications.created", ['type' => 'User', 'title' => $data['name']]));
    }
}
