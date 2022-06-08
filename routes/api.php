<?php

use App\Http\Controllers\API\PelangganController;
use App\Http\Controllers\API\ProviderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//provider
Route::get('providers', [ProviderController::class, 'index']);
Route::get('providers/{id}', [ProviderController::class, 'show']);
Route::post('providers', [ProviderController::class, 'store']);
Route::put('providers/{id}', [ProviderController::class, 'update']);
Route::delete('providers/{id}', [ProviderController::class, 'destroy']);

//pelanggan
Route::get('pelanggan', [PelangganController::class, 'index']);
Route::post('pelanggan', [PelangganController::class, 'beliPulsa']);

//Penjualan
Route::get('penjualan', [ProviderController::class, 'laporan_penjualan']);

