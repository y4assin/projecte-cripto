<?php

use App\Http\Controllers\CryptoController;

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
    Route::get('/exchange', [CryptoController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [CryptoController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/{crypto}', [CryptoController::class, 'show'])->name('cryptos.show');
    Route::get('/update', [CryptoController::class, 'autoUpdateHistory'])->name('cryptos.autoUpdateHistory');
});