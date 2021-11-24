<?php

use App\Http\Controllers\{
    HomeController,
    LandingController,
    ProdukController
};

use Illuminate\Support\Facades\Route;

Route::resource('/', LandingController::class);

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard.index');
    Route::resource('produk', ProdukController::class);
});