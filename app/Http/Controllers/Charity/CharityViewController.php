<?php

namespace App\Http\Controllers\Charity;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;

use App\Models\Charity\Charity;

class CharityViewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $charities = Charity::all();
        return view('charity.selection');
    }

    public function show($id)
    {
        $charity = Charity::findOrFail($id);

        return view('charity.show', compact('charity'));
    }

    public function category($category)
    {
        $charities = Charity::where('category', $category)->get();

        return view('charity.category_view', compact('charities'));
    }
}
