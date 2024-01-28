<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StokController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ModalController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\TempatController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;

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

Route::controller(LoginController::class)->group(function () {
    Route::get('/', 'login')->name('login');
    Route::get('/login', 'login');
    Route::post('/login', 'authentikasi');
});

Route::controller(DashboardController::class)->middleware('auth')->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard');
});

Route::controller(KategoriController::class)->middleware('auth')->group(function () {
    Route::get('/kategori', 'index')->name('kategori');
    Route::post('/addKategori', 'store')->name('addKategori');
    Route::post('/updateKategori', 'update')->name('updateKategori');
    Route::post('/deleteKategori', 'destroy')->name('deleteKategori');
});

Route::controller(BarangController::class)->middleware('auth')->group(function () {
    Route::get('/barang', 'index')->name('barang');
    Route::post('/addBarang', 'store')->name('addBarang');
    Route::post('/addStok', 'addStok')->name('addStok');
    Route::post('/updateBarang', 'update')->name('updateBarang');
    Route::post('/deleteBarang', 'destroy')->name('deleteBarang');
});

// Route::controller(StokController::class)->middleware('auth')->group(function () {
//     Route::get('/stok', 'index')->name('stok');
//     Route::post('/addStok', 'store')->name('addStok');
//     Route::post('/updateStok', 'update')->name('updateStok');
//     Route::post('/deleteStok', 'destroy')->name('deleteStok');
// });

Route::controller(TempatController::class)->middleware('auth')->group(function () {
    Route::get('/tempat', 'index')->name('tempat');
    Route::post('/addTempat', 'store')->name('addTempat');
    Route::post('/updateTempat', 'update')->name('updateTempat');
    Route::post('/deleteTempat', 'destroy')->name('deleteTempat');
});
Route::controller(TransaksiController::class)->middleware('auth')->group(function () {
    Route::get('/transaksi', 'index')->name('transaksi');
    Route::get('/detail', 'detail')->name('detail');
    Route::get('/addTransaksi', 'addTransaksi')->name('addTransaksi');
    // Route::post('/addTransaksi', 'store')->name('addTransaksi');
    // Route::post('/updateTransaksi', 'update')->name('updateTransaksi');
    // Route::post('/deleteTransaksi', 'destroy')->name('deleteTransaksi');
});
Route::controller(ModalController::class)->middleware('auth')->group(function () {
    Route::get('/modal', 'index')->name('modal');
    Route::post('/addModal', 'store')->name('addModal');
    Route::post('/updateModal', 'update')->name('updateModal');
    Route::post('/deleteModal', 'destroy')->name('deleteModal');
});
