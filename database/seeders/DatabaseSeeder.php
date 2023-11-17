<?php

namespace Database\Seeders;

use App\Models\Crypto;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $client = new Client();

        // Realizar la solicitud a la API de CoinMarketCap para obtener la lista de criptomonedas
        $response = $client->request('GET', 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest', [
            'headers' => [
                'X-CMC_PRO_API_KEY' => env('COINMARKET_CLIENT_ID'),
                'Accept' => 'application/json',
            ],
        ]);

        $data = json_decode($response->getBody(), true);
        $cryptos = $data['data'];

        // Almacenar los datos de cada criptomoneda
        foreach ($cryptos as $crypto) {
            $newCrypto = Crypto::create([
                'nombre' => $crypto['name'],
                'simbolo' => $crypto['symbol'],
                'precio' => $crypto['quote']['USD']['price'],
                'volumen' => $crypto['quote']['USD']['volume_24h'],
                'market_cap' => $crypto['quote']['USD']['market_cap'],
            ]);

            // Ahora, para cada moneda, obtener y guardar los datos históricos
            $historicalResponse = $client->request('GET', "https://api.coingecko.com/api/v3/coins/{$crypto['id']}/market_chart", [
                'query' => [
                    'vs_currency' => 'usd',
                    'days' => '30', // Número de días para los cuales quieres obtener datos históricos
                ]
            ]);
            var_dump($crypto['id']); // Imprime el ID de la criptomoneda
            $historicalData = json_decode($historicalResponse->getBody(), true);

            // Asegúrate de adaptar el siguiente código a la estructura de la respuesta de la API
            foreach ($historicalData['prices'] as $priceData) {
                $newCrypto->historicals()->create([
                    'price' => $priceData[1], // El precio
                    'volume' => $priceData[2], //Asegúrate de que este dato está disponible y es correcto
                    'created_at' => Carbon::createFromTimestampMs($priceData[0]), // Carbon maneja milisegundos con createFromTimestampMs
                ]);
            }
        }
    }
}