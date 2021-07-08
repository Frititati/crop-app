<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use Hash;
use Session;

use App\Models\User;
use App\Mail\BetaWelcomeMail;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('is_management');

        $users = User::all()->sortBy('id');

        return view('management.user.index', compact('users'));
    }

    public function create()
    {
        $this->authorize('is_management');

        return view('management.user.create');
    }

    public function store(Request $request)
    {
        $this->authorize('is_management');

        $validated = $request->validate([
            'name' => ['required', 'min:4'],
            'surname' => ['required', 'min:4'],
            'username' => [],
            'email' => ['required', 'email'],
        ]);

        $validated["is_active"] = True;
        $validated["password"] = Hash::make(uniqid("", true));

        $user = User::create($validated);

        Session::flash('message', 'Created the User!');

        return redirect('/user/manage/'.$user->id);
    }

    public function show($id)
    {
        $this->authorize('is_management');

        $user = User::findOrFail($id);
        $coins = $user->coin;

        return view('management.user.show', compact('user', 'coins'));
    }

    public function edit($id)
    {
        $this->authorize('is_management');

        $user = User::findOrFail($id);

        return view('management.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->authorize('is_management');

        $user = User::findOrFail($id);

        if ($request->has('action')) {

            if ($request->get('action') == "general") {

                $validated = $request->validate([
                    'name' => ['required', 'min:4'],
                    'surname' => ['required', 'min:4'],
                    'username' => [],
                    'email' => ['required', 'email'],
                    'is_active' => ['required', 'boolean']
                ]);

                $user->update($validated);

                Session::flash('message', 'You changed the User\'s General Info!');
            }

            if ($request->get('action') == "password") {

                $validated = $request->validate([
                    'new_password' => ['required', 'min:8'],
                    'confirm_password' => ['required', 'min:8']
                ]);

                if (Hash::check($validated['new_password'], $user->password)) {
                    // this checks if the new password is not same
                    return back()->withErrors("The New Password is the same as the one already set.");
                }

                if(strcmp($validated['new_password'], $validated['confirm_password']) != 0){
                    //new password same as confirmed password
                    return back()->withErrors("Please have the New Password and the Confirmed Password as the same value.");
                }

                $user->password = Hash::make($validated['new_password']);
                $user->save();

                Session::flash('message', 'You changed the User\'s Password!');
            }

            // this is really important code that should be super secured
            // but it is not ¯\_(ツ)_/¯
            if ($request->get('action') == "send_beta_welcome_email") {

                $token = Password::createToken($user);

                Mail::to($user)->send(new BetaWelcomeMail($user, $token));

                Session::flash('message', 'The email should have been sent .... :D');
            }

            if ($request->get('action') == "reset_user_password_email") {

                $status = Password::sendResetLink(
                    ['email' => $user->email]
                );

                return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
            }

        } else {
            return back()->withErrors("There was something wrong :/");
        }

        return back();
    }

    public function destroy($id)
    {
        abort(500, 'Unavailable Action.');
    }

    // public function test()
    // {
    //     $token = "asdfkjlajsdf";
    //     return view('mail.password_reset', compact('token'));
    // }
}
