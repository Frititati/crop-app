<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Coin\Coin;

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
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
