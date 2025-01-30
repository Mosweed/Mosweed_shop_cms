<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Fortify\CreateNewUser;
use App\Events\UserLoggedIn;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create(Request $request, CreateNewUser $createNewUser)
    {
        $session_id = session()->getId();
        // Your custom logic before registration, if needed

        $user = $createNewUser->create($request->all());

        Auth::login($user);

        // Your custom logic after registration
        event(new UserLoggedIn($user->id, $session_id));

        return redirect()->back();
    }
}
