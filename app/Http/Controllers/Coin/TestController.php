
<?php

namespace App\Http\Controllers\Coin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        
    }

    public function create()
    {
        $qr_code = uniqid("", true);
        $encrypted_qr_code = Crypt::encryptString($qr_code);
        print_r($encrypted_qr_code);
    }

    public function store(Request $request)
    {
        //
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
