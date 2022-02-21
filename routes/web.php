<?php

use App\Http\Controllers\{
    CartController,
    HomeController,
    LandingController,
    ProdukController,
    ProfilController,
    ProsesController,
    RekeningController,
    SettingController,
    StatusOrderController,
    TempatController
};

use Illuminate\Support\Facades\Route;

Route::resource('/', LandingController::class);
Route::delete('{id}', [LandingController::class, 'destroy'])->name('index.destroy');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::resource('dashboard', HomeController::class);
    Route::resource('produk', ProdukController::class);
    Route::resource('profil', ProfilController::class);

    Route::get('checkout=check', [ProsesController::class, 'cekTempat'])->name('cekTempat');
    Route::resource('checkout', ProsesController::class);
    
    Route::resource('rekening', RekeningController::class);
    Route::resource('setting', SettingController::class);
    Route::resource('statusOrder', StatusOrderController::class);
    Route::resource('tempat', TempatController::class);
});