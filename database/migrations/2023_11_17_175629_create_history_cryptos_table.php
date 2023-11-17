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
       
        Schema::create('crypto_historicals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('crypto_id')->constrained('cryptos');// Asegúrate de referenciar la tabla 'cryptos'
            $table->decimal('price', 20, 10);
            $table->decimal('volume', 20, 10);
            $table->decimal('market_cap', 20, 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crypto_historicals'); // Asegúrate de eliminar primero la tabla de datos históricos
    }
};
