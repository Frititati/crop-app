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
        $shops = Shop::where('is_active', true)->get();
        return view('shop.map', compact('shops'));
    }

    public function show($id)
    {
        $shop = Shop::findOrFail($id);

        $social_network = null;
        if (!is_null($shop->social_link)) {
            if (str_contains($shop->social_link, 'facebook')) {
                $social_network = 'Facebook';
            } elseif (str_contains($shop->social_link, 'instagram')) {
                $social_network = 'Instagram';
            } else {
                $social_network = 'Social';
            }
        }

        return view('shop.show', compact('shop', 'social_network'));
    }
}
