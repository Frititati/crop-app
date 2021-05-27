<?php

namespace App\Http\Controllers\Coin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Coin\CoinGeneration;
use App\Models\Coin\Coin;

use Crypt;

class CoinGenerationController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        return view('coin_generation.qr_scan');
    }

    public function create()
    {
        // check if this user already has an open creation
        // if so don't open another

        // generate qr code
        $qr_code = uniqid("", true);

        // encrypt it
        // $encrypted_qr_code = Crypt::encryptString($qr_code);
        $encrypted_qr_code = $qr_code;

        // create instance of the gem creation

        $generation = new CoinGeneration();
        $generation->code = $qr_code;
        $generation->amount = 5;
        // $generation->shop_id = 0;
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
        // $qr_code = Crypt::decryptString($validated['qr_code']);
        $qr_code = $validated['qr_code'];

        $generation = CoinGeneration::where('code', $qr_code)->first();

        if (!is_null($generation)) {
            // we have a legit code here

            if (!$generation->done) {
                // the code as never been registered before

                // generate the Coins!
                $coins = collect(new Coin());
                for ($i=0; $i < $generation->amount ; $i++) {
                    $coin_code = uniqid($i, true);
                    $coin = new Coin();
                    $coin->uuid = $coin_code;
                    $coin->coin_generation_id = $generation->id;

                    // $coin->received_on = now();
                    
                    // remember to add the user here
                    $coin->user_id = 1;

                    // remember to add the shop here
                    $coin->shop_id = 1;

                    $coin->save();

                    $coins[] = $coin;
                }

                $generation->done = true;
                $generation->save();

                return view('coin_generation.success_scan', compact('coins', 'generation'));

            } else {
                // error as the code has been registerd before
                $message = "This Code has already been used";
                return view('coin_generation.error', compact('message'));
            }

        } else {
            // error as the code does not exist on the database
            $message = "This Code is not valid";
            return view('coin_generation.error', compact('message'));
        }

        $message = "Unknown error";
        return view('coin_generation.error');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
