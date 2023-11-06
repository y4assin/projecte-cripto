<?php

namespace App\Http\Controllers;

use App\Models\Crypto;
use Illuminate\Http\Request;

class CryptoController extends Controller
{

    public function showCryptos()
    {
        $cryptos = Crypto::all();
        return view('dashboard', ['cryptos' => $cryptos]);
    }
}
