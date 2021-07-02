<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;

class UserHelpController extends Controller
{
    public function user_help()
    {
        // here we know that the user is already authenticated otherwise it will send them to the authentication controller

        if (Auth::check()) {
            $user = Auth::user();
            $user->viewed_help = now();
            $user->save();
        }

        return view('user.help.base');
    }
}
