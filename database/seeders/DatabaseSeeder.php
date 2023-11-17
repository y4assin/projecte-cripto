<?php

namespace Database\Seeders;

use App\Models\Crypto;
use App\Models\CryptoCurrencyHistoric;
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
    }

    // Nuevo método para sembrar el histórico de una criptomoneda
    private function seedHistoric(Crypto $cryptoModel): void
    {
        $client = new Client();

        // Realizar la solicitud a la API de CoinGecko para obtener el histórico
        $response = $client->request('GET', "https://api.coingecko.com/api/v3/coins/{$cryptoModel->simbolo}/market_chart", [
            'query' => [
                'vs_currency' => 'usd',
                'days' => 30, // Ajusta esto según tus necesidades
            ],
        ]);

        $data = json_decode($response->getBody(), true);

        // Procesar los datos obtenidos y almacenar en la base de datos
        $historicData = $data['prices'];
        foreach ($historicData as $historic) {
            CryptoCurrencyHistoric::create([
                'crypto_currency_id' => $cryptoModel->id,
                'date' => \Carbon\Carbon::createFromTimestamp($historic[0] / 1000)->toDateString(),
                'price' => $historic[1],
                // Agrega otras columnas según sea necesario
            ]);
        }
    }
}
