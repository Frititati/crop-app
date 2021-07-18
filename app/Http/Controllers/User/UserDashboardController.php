<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Coin\Coin;
use App\Models\Portfolio\Portfolio;

use Auth;
use Carbon\Carbon;

class UserDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // here we know that the user is already authenticated otherwise it will send them to the authentication controller

        $user = Auth::user();

        if (!$user->viewed_help) {
            return redirect('/user_help');
        }

        // $start_time = microtime(true);

        $count_coins_to_send = Coin::where('user_id', $user->id)->whereNull('user_sent_at')->count();
        $count_coins_sent = Coin::where('user_id', $user->id)->whereNotNull('user_sent_at')->count();

        $count_coins_to_send = 75;

        // $time_elapsed_secs = microtime(true) - $start_time;

        // dd($time_elapsed_secs, $count_coins_to_send, $count_coins_sent);

        return view('user.dashboard', compact('user', 'count_coins_to_send', 'count_coins_sent'));
    }

    public function create()
    {
        abort(500, 'Unavailable Action.');
    }

    public function store(Request $request)
    {
        abort(500, 'Unavailable Action.');
    }

    public function show($id)
    {
        abort(500, 'Unavailable Action.');
    }

    public function edit($id)
    {
        abort(500, 'Unavailable Action.');
    }

    public function update(Request $request, $id)
    {
        abort(500, 'Unavailable Action.');
    }

    public function destroy($id)
    {
        abort(500, 'Unavailable Action.');
    }
}
