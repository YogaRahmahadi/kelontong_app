<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController as HomeController;
use App\Http\Controllers\Admin\StockController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\Admin\LabaController;
=======
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\LabaController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\StockController;
use App\Http\Controllers\Admin\TransaksiController;

>>>>>>> 7756ea6a4ba85930bcdc14a56eec82823a893afb
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

Auth::routes();

Route::get('/admin/home', function () {
    return view('admin.home.index');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<<<<<<< HEAD
// Route::middleware(['auth', 'isAdmin'])->group(function () {
Route::prefix('admin')->group(function () {
    Route::resource('home', HomeController::class);
    Route::resource('users', UserController::class);
    Route::resource('stock', StockController::class);
    Route::resource('transaksi', TransaksiController::class);
    Route::resource('laba', LabaController::class);
    Route::get('/laporan', [LabaController::class, 'cetak_laporan'])->name('cetak_laporan');
});
// });
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
>>>>>>> 7756ea6a4ba85930bcdc14a56eec82823a893afb
