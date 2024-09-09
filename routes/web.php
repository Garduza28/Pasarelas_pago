<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MercadoPagoController;
use App\Http\Controllers\OpenpayController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pagar/{metodo}', "\App\Http\Controllers\pagar@pagar");
Route::get('/checkout/{metodo}', "\App\Http\Controllers\pagar@checkout");


// routes/web.php
Route::get('/payment', function () {
    return view('payment'); 
});







Route::view('/openpayment', 'openpayment'); 
Route::post('/charge', [OpenpayController::class, 'charge'])->name('payment.charge');
Route::get('/charge', [OpenpayController::class, 'handleCharge']);
Route::get('/transactions', [OpenpayController::class, 'listTransactions'])->name('transactions.index');
Route::post('/create-charge', [OpenpayController::class, 'createCharge'])->name('create.charge');
Route::get('/payment-redirect', [OpenpayController::class, 'paymentRedirect'])->name('payment.redirect');




Route::get('/payment/pending', [MercadopagoController::class, 'pending'])->name('payment.pending');
Route::get('/payment/success', [MercadopagoController::class, 'success'])->name('payment.success');
Route::get('/payment/failure', [MercadopagoController::class, 'failure'])->name('payment.failure');
Route::get('/create-preference', [MercadoPagoController::class, 'createPreference']);
Route::get('/payment-success', [MercadoPagoController::class, 'success'])->name('payment.success');
Route::get('/payment-failure', [MercadoPagoController::class, 'failure'])->name('payment.failure');
Route::get('/payment-pending', [MercadoPagoController::class, 'pending'])->name('payment.pending');
Route::get('/mercadopago/transactions', [MercadopagoController::class, 'listAllTransactions'])->name('payment.transactions');








