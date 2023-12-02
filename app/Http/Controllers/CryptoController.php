<?php

namespace App\Http\Controllers;

use App\Models\Crypto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class CryptoController extends Controller
{

    public function index()
    {
        $cryptos = Crypto::all();

        return view('dashboard', ['cryptos' => $cryptos]);
    }

    public function show(Crypto $crypto)
    {
        return view('cryptocurrencies.show',['crypto'=> $crypto]);
    }

    public function autoUpdateHistory() {
        $cryptos = Crypto::orderBy('historyUpdated_at', 'asc')
                            ->limit(5)->get();

        foreach($cryptos as $crypto) {
            $this->updateHistory($crypto->id);

            $crypto->historyUpdated_at = Carbon::now();
            $crypto->save();
        }

        return redirect()->route('dashboard');
    }

    public function updateHistory(int $id)
    {
        $client = new Client();
        $currentTime = time();
        $timeTwoDaysAgo = $currentTime - 172800;
        $crypto = Crypto::find($id);
        $cryptoID = $crypto->id_coin_gecko;

        // Realizar la solicitud a la API de CoinGecko
        $response = $client->request('GET', "https://api.coingecko.com/api/v3/coins/$cryptoID/market_chart/range?vs_currency=usd&from=$timeTwoDaysAgo&to=$currentTime");

        // Guarda los datos del JSON en una variable
        $data = json_decode($response->getBody(), true);
        $historial = $data['prices'];

        // Actualiza el historial
        $crypto->historial = $historial;
        $crypto->save();
    }
}
