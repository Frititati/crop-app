<?php

namespace App\Http\Controllers\Portfolio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;

use App\Models\Portfolio\Portfolio;

class PortfolioSelectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $portfolio_list = Portfolio::all();
        return view('portfolio.selection', compact('portfolio_list'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "portfolio_id" => ["required", "exists:App\Models\Portfolio\Portfolio,id"]
        ]);

        $user = Auth::user();

        $user->portfolio_id = $validated["portfolio_id"];
        $user->save();

        return redirect()->route('dashboard');
    }
}
