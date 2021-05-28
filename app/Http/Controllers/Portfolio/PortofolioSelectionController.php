<?php

namespace App\Http\Controllers\Portfolio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Portfolio\Portfolio;

class PortofolioSelectionController extends Controller
{
    public function selection()
    {
        $portfolio_list = Portfolio::all();
        return view('portfolio.selection', compact('portfolio_list'));
    }
}
