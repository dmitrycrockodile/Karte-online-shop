<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Models\User;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $user = User::withTrashed()->where('email', $data['email'])->first();

        if ($user) {
            if ($user->trashed()) {
                $user->restore();
                $user->update($data);
            }
        } else {
            User::firstOrCreate([
                'email' => $data['email']
            ], $data);
        }
        
        return redirect()->route('user.index')->with('success', "User \"{$data['name']}\" was created!");
    }
}
