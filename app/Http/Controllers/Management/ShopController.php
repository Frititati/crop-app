<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Session;

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
        $this->authorize('is_management');

        return view('management.shop.create');
    }

    public function store(Request $request)
    {
        $this->authorize('is_management');

        $validated = $request->validate([
            'name' => ['required', 'min:4'],
            'second_name' => ['required', 'min:4'],
            'category' => [],
            'address' => [],
            'description' => [],
            'phone_number' => [],
            'latitude' => [],
            'longitude' => [],
            'website_url' => [],
            'social_link' => [],
            'photo_path' => [],
        ]);

        $validated["is_active"] = True;

        $shop = Shop::create($validated);

        Session::flash('message', 'Created the Shop!');

        return redirect('/shop/manage/'.$shop->id);
    }

    public function show($id)
    {
        $this->authorize('is_management');

        $shop = Shop::findOrFail($id);
        $coins = $shop->coins;

        return view('management.shop.show', compact('shop', 'coins'));
    }

    public function edit($id)
    {
        $this->authorize('is_management');

        $shop = Shop::findOrFail($id);

        return view('management.shop.edit', compact('shop'));
    }

    public function update(Request $request, $id)
    {
        $this->authorize('is_management');

        $shop = Shop::findOrFail($id);

        if ($request->has('action')) {

            if ($request->get('action') == "general") {

                $validated = $request->validate([
                    'name' => ['required', 'min:4'],
                    'second_name' => ['required', 'min:4'],
                    'category' => [],
                    'address' => [],
                    'description' => [],
                    'phone_number' => [],
                    'latitude' => [],
                    'longitude' => [],
                    'website_url' => [],
                    'social_link' => [],
                    'photo_path' => [],
                    'is_active' => ['required', 'boolean']
                ]);

                $shop->update($validated);

                Session::flash('message', 'You changed the Shop\'s Info!');
            }

        } else {
            return back()->withErrors("There was something wrong :/");
        }

        return back();
    }

    public function destroy($id)
    {
        abort(500, 'Unavailable Action.');
    }
}
