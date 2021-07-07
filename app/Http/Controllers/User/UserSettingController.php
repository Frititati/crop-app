<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Hash;
use Session;

class UserSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // here we know that the user is already authenticated otherwise it will send them to the authentication controller

        $user = Auth::user();

        return view('user.information_edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();

        if ($request->has('action')) {

            if ($request->get('action') == "general") {

                $validated = $request->validate([
                    'name' => ['required', 'min:4'],
                    'surname' => ['required', 'min:4'],
                    'username' => ['required', 'min:4'],
                    'email' => ['required', 'email'],
                ]);

                $user->update($validated);

                Session::flash('message', 'Informazioni cambiate correttamente!');
            }

            if ($request->get('action') == "password") {

                $validated = $request->validate([
                    'old_password' => ['required', 'min:8'],
                    'new_password' => ['required', 'min:8'],
                    'confirm_password' => ['required', 'min:8']
                ]);

                if (!Hash::check($validated['old_password'], $user->password)) {
                    // this checks if the new password is not same
                    return back()->withErrors("La vecchia password non è corretta!");
                }

                if (Hash::check($validated['new_password'], $user->password)) {
                    // this checks if the new password is not same
                    return back()->withErrors("La nuova password è uguale alla vecchia password.");
                }

                if(strcmp($validated['new_password'], $validated['confirm_password']) != 0){
                    //new password same as confirmed password
                    return back()->withErrors("La password è la conferma non sono uguali.");
                }

                $user->password = Hash::make($validated['new_password']);
                $user->save();

                Session::flash('message', 'Password cambiata correttamente!');
            }

        } else {
            return back()->withErrors("C'è qualcosa che è andato storto, riprovare.");
        }

        return back();
    }
}
