<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use App\Http\Controllers\SignController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;


Route::get('/sign-in', [SignController::class, 'signin'])->name('sign-in');
Route::post('/sign-in', [SignController::class, 'login']);

// Route::get('/testing', function () {
//     $currentTime = Carbon::now();
//     return view('layouts.sign-in', [
//         'title' => 'Print',
//         'currentTime' => $currentTime
//     ]);
// });


//breeze login
// Route::get('/', function () {
//     return view('welcome');
// });
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/', [ProdukController::class, 'main'])->middleware('verified')->name('dashboard');
    Route::get('/barang', [ProdukController::class, 'index']);
    Route::get('/add-produk', [ProdukController::class, 'create']);
    Route::post('/add-produk', [ProdukController::class, 'store']);

    Route::get('/edit-produk/{produk_id}', [ProdukController::class, 'edit']);
    Route::put('/edit-produk/{produk_id}', [ProdukController::class, 'update']);

    Route::get('/delete-produk/{produk_id}', [ProdukController::class, 'destroy']);


    Route::get('/pelanggan', [PelangganController::class, 'index']);
    Route::get('/detail-pelanggan/{pelaggan_id}', [PelangganController::class, 'show'])->name('pelanggan.detail');
    Route::get('/delete-pelangan/{pelanggan_id}', [PelangganController::class, 'destroy']);
    Route::get('/pembelian', [PelangganController::class, 'create'])->middleware('cekbelipage');

    Route::post('/proses', [PelangganController::class, 'proses']);
    Route::get('/pembelian/verifikasi', [PelangganController::class, 'lanjutan'])->middleware('cekpembelian');
    Route::post('/pembelian/verifikasi', [PelangganController::class, 'finalisasi'])->middleware('cekpembelian');

    Route::get('/pembelian/forget', [PelangganController::class, 'forgetSession'])->name('pembelian.forget');

    Route::get('/penjualan', [PembelianController::class, 'index']);
    Route::post('/pembayaran/{pelanggan_id}', [PelangganController::class, 'pembayaran']);
    Route::get('/detail-penjualan/{penjualan_id}', [PembelianController::class, 'show']);
    Route::get('/downloadStruk', [PelangganController::class, 'downloadStruk']);

    Route::get('/history', [PelangganController::class, 'history']);
    Route::get('/detail-struk/{struk_id}', [PelangganController::class, 'showHistory']);
    Route::get('/print', function () {
        return view('layouts.struk.print', [
            'title' => 'Print'
        ]);
    });
    Route::get('/sign-up', [SignController::class, 'signup']);
    Route::post('/sign-up', [SignController::class, 'register']);
});

require __DIR__ . '/auth.php';
