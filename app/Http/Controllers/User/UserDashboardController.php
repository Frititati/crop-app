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

        $coins = Auth::user()->coin;

        // calculate coin totals 
        $coins_total = $coins->count();

        $date = Carbon::now();
        $date->setISODate(Carbon::now()->year, Carbon::now()->weekOfYear);
        $start = $date->startOfWeek()->toDateTimeString();
        $end = $date->endOfWeek()->toDateTimeString();

        // calculate weekly produced coins
        $coins_weekly = $coins->whereBetween('created_at', [$start, $end])->count();

        return view('user.dashboard', compact('coins_weekly', 'coins_total'));
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
