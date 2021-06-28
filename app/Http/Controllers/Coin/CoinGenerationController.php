<?php

namespace App\Http\Controllers\Coin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Coin\CoinGeneration;
use App\Models\Coin\Coin;

use Crypt;

use Auth;

class CoinGenerationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('coin_generation.qr_scan');
    }

    public function create()
    {
        // check if this user already has an open creation
        // if so don't open another

        $this->authorize('is_management');

        // generate qr code
        $qr_code = uniqid("", true);

        // encrypt it
        $encrypted_qr_code = Crypt::encryptString($qr_code);
        // $encrypted_qr_code = $qr_code;

        // create instance of the gem creation

        $generation = new CoinGeneration();
        $generation->code = $qr_code;
        $generation->amount = 5;
        // default to change
        $generation->shop_id = 1;
        $generation->save();

        // view the qr code
        return view('coin_generation.view_qr', compact('encrypted_qr_code'));
    }

    public function store(Request $request)
    {

        // receive generation request
        $validated = $request->validate([
            "qr_code" => ["required"]
        ]);

        // decrypt qr_code
        $qr_code = Crypt::decryptString($validated['qr_code']);
        // $qr_code = $validated['qr_code'];

        $generation = CoinGeneration::where('code', $qr_code)->first();

        if (!is_null($generation)) {
            // we have a legit code here

            if ($generation->is_active) {
                // the code is active

                if (!$generation->done) {
                    // the code as never been registered before

                    $group_id = uniqid($generation->id, true);

                    // generate the Coins!
                    $coins = collect(new Coin());
                    for ($i=0; $i < $generation->amount ; $i++) {
                        $coin_code = uniqid($i, true);
                        $coin = new Coin();
                        $coin->uuid = $coin_code;
                        $coin->coin_generation_id = $generation->id;
                        $coin->group = $group_id;

                        $coin->received_on = now();
                        
                        // remember to add the user here
                        $coin->user_id = Auth::id();

                        // remember to add the shop here
                        $coin->shop_id = $generation->shop_id;

                        $coin->save();

                        $coins[] = $coin;
                    }

                    if (!$generation->is_static) {
                        $generation->done = true;
                    }
                    $generation->save();

                    return view('coin_generation.success_scan', compact('coins', 'generation'));

                } else {
                    // error as the code has been registerd before
                    $message = "Questo Codice e' gia stato usato e non puoi essere riutilizato!";
                    return view('coin_generation.error', compact('message'));
                }
            } else {
                // error as the code is not active
                $message = "Questo Codice non e' attivo attualmente!";
                return view('coin_generation.error', compact('message'));
            }

        } else {
            // error as the code does not exist on the database
            $message = "Questo Codice non e' valido!";
            return view('coin_generation.error', compact('message'));
        }

        $message = "Errore sconosciuto, riprovare grazie.";
        return view('coin_generation.error');
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
