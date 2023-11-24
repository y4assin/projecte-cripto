<?php

namespace Database\Seeders;

use App\Models\Crypto;
use GuzzleHttp\Client;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $client = new Client();

        // Realizar la solicitud a la API de CoinMarketCap
        $response = $client->request('GET', 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest', [
            'headers' => [
                'X-CMC_PRO_API_KEY' => env('COINMARKET_CLIENT_ID'),

                'Accept' => 'application/json',
            ],
        ]);

        $data = json_decode($response->getBody(), true);

        // Procesar los datos obtenidos
        $cryptos = $data['data'];

        // Almacenar los datos en la base de datos
        foreach ($cryptos as $crypto) {
            Crypto::create([
                'nombre' => $crypto['name'],
                'simbolo' => $crypto['symbol'],
                'precio' => $crypto['quote']['USD']['price'],
                'volumen' => $crypto['quote']['USD']['volume_24h'],
                'market_cap' => $crypto['quote']['USD']['market_cap'],
            ]);
        }

        // Realizar la solicitud a la API de CoinGecko
        $response = $client->request('GET', 'https://api.coingecko.com/api/v3/coins/list');

        // Guarda los datos del JSON en una variable
        $cryptos = json_decode($response->getBody(), true);

        foreach ($cryptos as $crypto) {
            Crypto::where('simbolo', $crypto['symbol'])
            ->update(['id_coin_gecko' => $crypto['id']]);
        }
    }
}
