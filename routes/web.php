<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

use Illuminate\Support\Facades\Http;

function getCryptocurrencyList()
{
    $apiKey = '3f4a7f6f-52a6-4904-87d8-1c47081f0548';

    $response = Http::withHeaders([
        'X-CMC_PRO_API_KEY' => $apiKey,
        'Accept' => 'application/json'
    ])->get('https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest');

    $cryptocurrencies = $response->json()['data'];

    return view('cryptocurrency.list', ['cryptocurrencies' => $cryptocurrencies]);
}
