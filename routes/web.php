<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ArsipDokumenController;
use App\Http\Controllers\JenisDokumenController;
use App\Http\Controllers\LaporanDokumenController;
use App\Http\Controllers\ProfilInstansiController;
use App\Http\Controllers\ProfilUserController;
use App\Http\Controllers\ProfileController;

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// Group middleware auth untuk memastikan hanya user yang sudah login yang bisa mengakses
Route::middleware(['auth'])->group(function () {
    // Route untuk Dashboard yang bisa diakses oleh semua role
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('back')->group(function () {

        // Route untuk ArsipDokumen yang bisa diakses oleh semua role
        Route::get('/arsip_dokumen', [ArsipDokumenController::class, 'index'])->name('back.arsip_dokumen.index');
        Route::get('/arsip_dokumen/{id}', [ArsipDokumenController::class, 'show'])->name('back.arsip_dokumen.show');

        // Route untuk Jenis Dokumen yang bisa diakses oleh semua role
        Route::get('/jenis_dokumen', [JenisDokumenController::class, 'index'])->name('back.jenis_dokumen.index');

        // Route untuk ProfilInstansi yang bisa diakses oleh semua role
        Route::get('/instansi', [ProfilInstansiController::class, 'index'])->name('back.instansi.index');

        // Route untuk ProfilSaya yang bisa diakses oleh semua role
        Route::get('/profil_user', [ProfilUserController::class, 'index'])->name('back.profil_user.index');
        Route::get('/profil_user/edit', [ProfilUserController::class, 'edit'])->name('back.profil_user.edit');
        Route::put('/profil_user/update', [ProfilUserController::class, 'update'])->name('back.profil_user.update');

        // Group route hanya untuk Administrator dan Pengelola
        Route::middleware(['role:Administrator,Pengelola'])->group(function () {

            // ArsipDokumen Routes
            Route::get('/arsip-dokumen/create', [ArsipDokumenController::class, 'create'])->name('back.arsip_dokumen.create');
            Route::post('/arsip_dokumen', [ArsipDokumenController::class, 'store'])->name('back.arsip_dokumen.store');
            Route::get('/arsip_dokumen/{id}/edit', [ArsipDokumenController::class, 'edit'])->name('back.arsip_dokumen.edit');
            Route::put('/arsip_dokumen/{id}', [ArsipDokumenController::class, 'update'])->name('back.arsip_dokumen.update');
            Route::delete('/arsip_dokumen/{id}', [ArsipDokumenController::class, 'destroy'])->name('back.arsip_dokumen.destroy');

            // JenisDokumen Routes
            Route::get('/jenis_dokumen/create', [JenisDokumenController::class, 'create'])->name('back.jenis_dokumen.create');
            Route::post('/jenis_dokumen', [JenisDokumenController::class, 'store'])->name('back.jenis_dokumen.store');
            Route::get('/jenis_dokumen/{id}/edit', [JenisDokumenController::class, 'edit'])->name('back.jenis_dokumen.edit');
            Route::put('/jenis_dokumen/{id}', [JenisDokumenController::class, 'update'])->name('back.jenis_dokumen.update');
            Route::delete('/jenis_dokumen/{id}', [JenisDokumenController::class, 'destroy'])->name('back.jenis_dokumen.destroy');

            // Laporan Routes
            Route::get('/laporan', [LaporanDokumenController::class, 'index'])->name('back.laporan.index');
            Route::get('/laporan/cetak', [LaporanDokumenController::class, 'cetak'])->name('back.laporan.cetak');
        });
    });
});

Route::get('/404', function () {
    return view('layouts.404');
})->name('404');

require __DIR__ . '/auth.php';
