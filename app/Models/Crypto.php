<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crypto extends Model
{
    use HasFactory;

    protected $table = 'cryptos'; // Especifica el nombre de la tabla

    // estos son los campos que se pueden ver 
    protected $fillable = [
        'nombre',
        'simbolo',
        'precio',
        'volumen',
        'market_cap',
        'id_coin_gecko',
        'historial',
        'historyUpdated_at'
    ];

}
