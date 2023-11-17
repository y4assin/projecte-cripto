<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
    }
    public function updateCryptoIcons()
    {
        $cryptos = Crypto::all(); // Obtén todas las criptomonedas de la base de datos
    
        foreach ($cryptos as $crypto) {
            $response = Http::get('https://api.cryptos.com/crypto/' . $crypto->nombre); // Haz una solicitud a la API
    
            if ($response->successful()) {
                $data = $response->json(); // Convierte la respuesta en un array asociativo
    
                $crypto->icono = $data['icono_url']; // Guarda la URL del icono en la base de datos
                $crypto->save(); // Guarda los cambios en la base de datos
            }
        }
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
