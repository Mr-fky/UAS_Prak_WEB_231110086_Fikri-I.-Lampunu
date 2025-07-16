<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TransaksiController;

Route::get('/', fn() => redirect()->route('dashboard'));

// ✅ Dashboard ringkasan
Route::get('/dashboard', [TransaksiController::class, 'dashboard'])->name('dashboard');

// Kategori CRUD
Route::resource('kategori', KategoriController::class);

// Transaksi CRUD
Route::resource('transaksi', TransaksiController::class);
