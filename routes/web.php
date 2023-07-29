<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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



Auth::routes();
Route::get('/', [ProdukController::class, 'index'])->name('home');

//group route with prefix "admin"
Route::prefix('admin')->group(function () {

    //group route with middleware "auth"
    Route::group(['middleware' => 'auth'], function() {

        Route::resource('/produk', ProdukController::class, ['as' => 'admin'])->except(['destroy']);;
        Route::delete('/produk/delete/{id}', [ProdukController::class, 'destroy'])->name('produk.delete');

    });
});
