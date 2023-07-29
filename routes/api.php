<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


/**
 * Route API FITUR
 */
Route::get('/produk-bagas', [ProdukController::class, 'product_bagas'])->name('api.produk');

Route::get('/produk-rafli', [ProdukController::class, 'product_rafli'])->name('api.produk');