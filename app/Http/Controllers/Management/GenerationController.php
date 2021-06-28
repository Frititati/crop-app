<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Crypt;

use App\Models\Coin\CoinGeneration;
use App\Models\Shop\Shop;

class GenerationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('is_management');

        $generations = CoinGeneration::all();
        return view('management.generation.index', compact('generations'));
    }

    public function downloadStatic()
    {
        $this->authorize('is_management');

        $generations = CoinGeneration::where("is_static", true)->get();

        foreach ($generations as $item) {
            $encrypted_qr_code = Crypt::encryptString($item->code);
            $item->encrypted_code = $encrypted_qr_code;
        }

        return view('management.generation.download_static', compact('generations'));
    }

    public function create()
    {
        $this->authorize('is_management');

        $shops = Shop::where('is_active', true)->get();

        return view('management.generation.create', compact('shops'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "is_static" => ["required","boolean"],
            "shop_id" => ["required","integer"],
            "amount" => ["required","integer"],
        ]);

        $code = uniqid("", true);

        $validated["code"] = $code;

        $generation = CoinGeneration::create($validated);

        return redirect('/generation/manage/'.$generation->id);
    }

    public function show($id)
    {
        $this->authorize('is_management');

        $generation = CoinGeneration::findOrFail($id);

        $coins = $generation->coins;

        $encrypted_qr_code = Crypt::encryptString($generation->code);

        return view('management.generation.show', compact('generation', 'coins', 'encrypted_qr_code'));
    }

    public function qrScanOut()
    {
        $this->authorize('is_management');

        return view('management.generation.qr_scan');
    }

    public function qrScanIn(Request $request)
    {
        $this->authorize('is_management');

        $validated = $request->validate([
            "qr_code" => ["required"]
        ]);

        $qr_code = Crypt::decryptString($validated['qr_code']);

        $generation = CoinGeneration::where('code', $qr_code)->first();

        if (!is_null($generation)) {
            return redirect('/generation/manage/'.$generation->id);
        } else {
            return back()->withErrors('It is not a Crop QR... sorry');
        }
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
