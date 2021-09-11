<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Carbon\Carbon;
use Session;
use DB;

use App\Models\Coin\Coin;
use App\Models\Portfolio\Portfolio;


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

        $count_coins_to_send = Coin::where('user_id', $user->id)->whereNull('user_sent_at')->count();
        $count_coins_sent = Coin::where('user_id', $user->id)->whereNotNull('user_sent_at')->count();

        $charity = null;

        if ($user->portfolio) {
            $charity = $user->portfolio->division->first()->charity;
        }

        return view('user.dashboard', compact('user', 'count_coins_to_send', 'count_coins_sent', 'charity'));
    }

    public function sendCoins()
    {
        $user = Auth::user();

        $count_coins_to_send = Coin::where('user_id', $user->id)->whereNull('user_sent_at')->count();

        if ($count_coins_to_send >= 100) {
            // we can send the coins
            DB::table('coin')
                ->where('user_id', $user->id)
                ->whereNull('user_sent_at')
                ->update(['user_sent_at' => 'now()']);

            // $charity = $user->portfolio->division->random()->charity;

            return view('user.reward_message', compact('count_coins_to_send', 'user'));

        } else {
            // we can't send the coins
            return back()->withErrors('Non ci sono abbastanza Coin da donare.');
        }

        return back();
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
