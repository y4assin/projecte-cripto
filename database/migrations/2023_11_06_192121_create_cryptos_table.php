<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cryptos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('simbolo');
            $table->decimal('precio', 20); // Precio con 10 dígitos y 2 decimales
            $table->decimal('volumen', 20); // Volumen con 10 dígitos y 2 decimales
            $table->decimal('market_cap', 20); // Market Cap con 14 dígitos y 2 decimales
            $table->string('id_coin_gecko')->nullable(); // ID de la moneda a l'API de CoinGecko
            $table->json('historial')->nullable(); // Json amb les dades del preu de la crypto dels últims 2 dies
            $table->dateTime('historyUpdated_at')->nullable(); // Data de l'última vegada que es va actualitzar l'historial
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cryptos');
    }
};
