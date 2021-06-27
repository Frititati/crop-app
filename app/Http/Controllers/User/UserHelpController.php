<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserHelpController extends Controller
{
    public function user_help()
    {
        // here we know that the user is already authenticated otherwise it will send them to the authentication controller

        return view('user.help.base');
    }
}
