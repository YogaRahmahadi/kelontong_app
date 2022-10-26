<?php

use Illuminate\Support\Facades\Route;

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

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<<<<<<< HEAD
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
=======
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::resource('home', HomeController::class);
        Route::resource('users', UserController::class);
        Route::resource('stock', StockController::class);
        Route::resource('transaksi', TransaksiController::class);
        Route::resource('laba', LabaController::class);
        // Route::get('/laporan', [PembayaranController::class, 'cetak_laporan'])->name('cetak_laporan');
    });
});
>>>>>>> 0dfa33477dc46570d3b1cc0bf5f4551351127c93
