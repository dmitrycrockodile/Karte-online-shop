<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user = User::withTrashed()->where('email', $data['email'])->first();

        if ($user) {
            if ($user->trashed()) {
                $user['email_verified_at'] = false;
                $user->restore();
                $user->update($data);
            }
        } else {
            User::firstOrCreate([
                'email' => $data['email']
            ], $data);
        }
        
        return redirect()->route('user.index')->with('success', trans("notifications.created", ['type' => 'User', 'title' => $data['name']]));
    }
}
