<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('crypto_currency_historic', function (Blueprint $table) {
            $table->id();
            $table->foreignId('crypto_id')->constrained(); // Agregar esta línea
            $table->date('date');
            $table->decimal('price', 20, 2);
            // Agrega otras columnas según sea necesario
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('crypto_currency_historic');
    }
};
