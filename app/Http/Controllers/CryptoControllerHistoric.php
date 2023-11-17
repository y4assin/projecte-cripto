<?php

namespace App\Http\Controllers;
use App\Models\Crypto;
use Illuminate\Http\Request;

class CryptoControllerHistoric extends Controller
{
    public function showHistoric($symbol)
    {
        $crypto = Crypto::where('simbolo', $symbol)->first();
        $historicData = $crypto->historicals()->get(); // Asume una relación `historicals` en el modelo Crypto

        return view('crypto-historic', compact('crypto', 'historicData'));

    }
}
