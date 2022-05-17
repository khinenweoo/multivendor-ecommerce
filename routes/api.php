<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DummyAPI;
use App\Http\Controllers\ClientController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/data', [DummyAPI::class, 'index']);
Route::post('/product/create', [DummyAPI::class, 'create']);

// checkout booking
Route::post('/checkout', [ClientController::class, 'checkout']);
Route::post('/user/confirm-purchasing', [ClientController::class, 'purchase'])->name('checkout.confirm');

//delete checkout temp items
Route::post('/user/remove-item', [ClientController::class, 'destroy'])->name('checkout.cancel');