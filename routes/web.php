<?php

use App\Http\Controllers\{
    CartController,
    HomeController,
    LandingController,
    ProdukController,
    ProsesController,
    TempatController
};

use Illuminate\Support\Facades\Route;

Route::resource('/', LandingController::class);
Route::delete('{id}', [LandingController::class, 'destroy'])->name('index.destroy');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard.index');
    Route::resource('tempat', TempatController::class);
    Route::resource('produk', ProdukController::class);

    Route::get('checkout=check', [ProsesController::class, 'cekTempat'])->name('cekTempat');
    Route::resource('checkout', ProsesController::class);
});