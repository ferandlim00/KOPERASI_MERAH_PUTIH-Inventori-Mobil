<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\TransaksiInventoriController;
use App\Models\Barang;

Route::get('/', function () {
    return view('welcome'); // atau home.blade.php
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/barang/cetak', [BarangController::class, 'cetak'])->name('barang.cetak');
    Route::get('/barang/cetak-pdf', [BarangController::class, 'cetakPdf'])->name('barang.cetakPdf');
    Route::get('/transaksi/cetak', [TransaksiInventoriController::class, 'cetakTransaksi'])->name('transaksi.cetak');
    Route::get('/transaksi/cetak-pdf', [TransaksiInventoriController::class, 'cetakTransaksiPdf'])->name('transaksi.cetakPdf');
    Route::get('/transaksi/{id}/cetak-pdf', [TransaksiInventoriController::class, 'cetakTransaksiPdf'])->name('transaksi.cetakPdf');

    Route::resource('barang', BarangController::class);
    Route::resource('transaksi', TransaksiInventoriController::class);


});

require __DIR__.'/auth.php';
