<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// use Auth;

use App\Models\Shop\Shop;

class ShopViewController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $shops = Shop::all();
        return view('shop.map', compact('shops'));
    }

    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     "portfolio_id" => ["required", "exists:App\Models\Portfolio\Portfolio,id"]
        // ]);

        // $user = Auth::user();

        // $user->portfolio_id = $validated["portfolio_id"];
        // $user->save();

        // return redirect()->route('dashboard');
    }
}
