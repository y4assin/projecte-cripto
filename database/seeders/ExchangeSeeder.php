<?php

namespace Database\Seeders;

use App\Models\Exchange;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExchangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Definim l'URL sobre la que farem la peticio a l'API
        $url = 'https://pro-api.coinmarketcap.com/v1/exchange/assets';
        // Indiquem els parametres que la URL requereix per tal de que ens retorni les dades sobre els Exchanges.
        $parametres = [
            'id' => '270'
        ];
        // Especifiquem el codi de l'API.
        $codigoApi = '53719878-5fd8-423c-881b-f17427613cb6';
        // Afegim les capceleres HTTP per tal de poder fer la peticio.
        $capceleresHttp = [
            'Accepts: application/json',
            'X-CMC_PRO_API_KEY: ' . $codigoApi
        ];
        // Fem la conversio dels parametres definits a "$parametres" a com es veurien a una peticio HTTP.
        $httpQuery = http_build_query($parametres);
        // Construim la URL sobre la que farem la peticio, afegint els parametres.
        $request = $url . '?' . $httpQuery;
        // Inicialitzem la consulta cURL.
        $curl = curl_init();
        // Afegim les dades de la consulta cURL.
        curl_setopt_array($curl, array(
            CURLOPT_URL => $request,
            CURLOPT_HTTPHEADER => $capceleresHttp,
            CURLOPT_RETURNTRANSFER => 1
        ));

        // Fem la peticio i desem el JSON que envia.
        $response = curl_exec($curl);
        // Convertim el JSON rebut en un array associatiu.
        $response = json_decode($response, true);
        // Tanquem la consulta cURL.
        curl_close($curl);
        
        // Bucle FOR...EACH el qual farem servir per recorrer totes les posicions del vector "$response['data']".
        foreach ($response["data"] as $value) {
            // Per cadascuna de les posicions del vector "$response['data']" afegirem les dades associades a la taula "exchanges".
            Exchange::create([
                'wallet_address' => $value['wallet_address'],
                'balance' => $value['balance'],
                'platform_crypto_id' => $value['platform']['crypto_id'],
                'platform_symbol' => $value['platform']['symbol'],
                'platform_name' => $value['platform']['name'],
                'currency_crypto_id' => $value['currency']['crypto_id'],
                'currency_price_usd' => $value['currency']['price_usd'],
                'currency_symbol' => $value['currency']['symbol'],
                'currency_name' => $value['currency']['name']
            ]);
        }
    }
}
