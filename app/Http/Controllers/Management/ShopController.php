<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Shop\Shop;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('is_management');

        $shops = Shop::all();
        return view('management.shop.index', compact('shops'));
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
