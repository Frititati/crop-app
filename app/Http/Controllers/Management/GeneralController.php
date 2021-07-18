<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

use App\Models\Coin\Coin;

class GeneralController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('is_management');

        // $coins = Coin::all()->sortBy('received_at');
        $coins = Coin::all()->sortBy('received_at')->values();

        $temp_period = CarbonPeriod::create($coins->first()->received_at, '1 day', Carbon::now()->endOfDay());
        $date_period = [];

        // Iterate over the period
        foreach ($temp_period as $date) {
            $date_period[] = $date->format('Y-m-d');
        }

        return view('management.index', compact('coins', 'date_period'));
    }

}
