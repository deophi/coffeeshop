<?php

use App\Http\Controllers\{
    HomeController,
    LandingController,
    PhotoTempatController,
    ProdukController,
    ProfilController,
    ProsesController,
    RekeningController,
    ReportController,
    SettingController,
    StatusOrderController,
    TempatController
};

use Illuminate\Support\Facades\Route;

Route::resource('/', LandingController::class);
Route::delete('{id}', [LandingController::class, 'destroy'])->name('index.destroy');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::resource('dashboard', HomeController::class)->except(['create', 'store', 'edit', 'update', 'destory']);
    Route::resource('photoTempat', PhotoTempatController::class)->except(['index', 'create', 'edit', 'update']);
    Route::resource('produk', ProdukController::class)->except(['show', 'create', 'update']);
    Route::resource('profil', ProfilController::class)->except(['show', 'create', 'store', 'edit', 'destory']);

    Route::get('checkout=check', [ProsesController::class, 'cekTempat'])->name('cekTempat');
    Route::resource('checkout', ProsesController::class)->except(['create', 'edit']);

    Route::resource('rekening', RekeningController::class)->except(['index', 'show', 'create']);
    Route::get('laporan', [ReportController::class, 'index'])->name('laporan.index');
    Route::resource('setting', SettingController::class)->except(['show', 'create', 'store', 'edit', 'destory']);
    Route::resource('statusOrder', StatusOrderController::class)->except(['show', 'create', 'store', 'edit', 'destory']);
    Route::resource('tempat', TempatController::class)->except(['index', 'show', 'create']);
});
