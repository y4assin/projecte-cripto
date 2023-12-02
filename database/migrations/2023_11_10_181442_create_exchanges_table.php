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
        Schema::create('exchanges', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('wallet_address');
            $table->bigInteger('balance');
            $table->integer('platform_crypto_id');
            $table->text('platform_symbol');
            $table->text('platform_name');
            $table->integer('currency_crypto_id');
            $table->double('currency_price_usd');
            $table->text('currency_symbol');
            $table->text('currency_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exchanges');
    }
};
