<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CryptoCurrencyHistoric extends Model
{
    use HasFactory;

    protected $fillable = [
        'crypto_currency_id',
        'date',
        'price',
        // Agrega otras columnas según sea necesario
    ];

    // Relación con la tabla de criptomonedas
    public function crypto()
    {
        return $this->belongsTo(Crypto::class, 'crypto_currency_id');
    }
}
