<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ApotekerController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\TransaksiObatKeluarController;

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

Route::get('/', [HomeController::class, 'index']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('obat', ObatController::class);
Route::resource('apoteker', ApotekerController::class);
Route::get('transaksi/getStok/{kode}', [TransaksiObatKeluarController::class, 'getStok'])->name('transaksi.getStok');
Route::resource('transaksi', TransaksiObatKeluarController::class);