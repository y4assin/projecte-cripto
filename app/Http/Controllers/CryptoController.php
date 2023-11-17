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

    public function showHistoric($symbol)
    {
        $crypto = Crypto::where('simbolo', $symbol)->first();
        $historicalData = $crypto->historicals()->get(); // Asume una relación `historicals` en el modelo Crypto

        return view('crypto.show', compact('crypto', 'historicalData'));

    }
}
