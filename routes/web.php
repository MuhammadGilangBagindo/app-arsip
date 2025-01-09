<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ArsipDokumenController;
use App\Http\Controllers\JenisDokumenController;
use App\Http\Controllers\LaporanDokumenController;
use App\Http\Controllers\ProfilInstansiController;
use App\Http\Controllers\ProfilUserController;

/*
|---------------------------------------------------------------------------
| Web Routes
|---------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Group middleware auth untuk memastikan hanya user yang sudah login yang bisa mengakses
Route::middleware(['auth'])->group(function () {
    // Route untuk Dashboard yang bisa diakses oleh semua role
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Route untuk ArsipDokumen yang bisa diakses oleh semua role
    Route::get('/back/arsip_dokumen', [ArsipDokumenController::class, 'index'])->name('back.arsip_dokumen.index');
    Route::get('/back/arsip_dokumen/{id}', [ArsipDokumenController::class, 'show'])->name('back.arsip_dokumen.show');

    // Route untuk Jenis Dokumen yang bisa diakses oleh semua role
    Route::get('/back/jenis_dokumen', [JenisDokumenController::class, 'index'])->name('back.jenis_dokumen.index');

    // Route untuk ProfilInstansi yang bisa diakses oleh semua role
    Route::get('/back/instansi', [ProfilInstansiController::class, 'index'])->name('back.instansi.index');

    // Route untuk ProfilSaya yang bisa diakses oleh semua role
    Route::get('/back/profil_user', [ProfilUserController::class, 'index'])->name('back.profil_user.index');
    Route::get('/back/profil_user/edit', [ProfilUserController::class, 'edit'])->name('back.profil_user.edit');
    Route::put('/back/profil_user/update', [ProfilUserController::class, 'update'])->name('back.profil_user.update');

    // Group route hanya untuk Administrator dan Pengelola
    Route::middleware(['role:Administrator,Pengelola'])->group(function () {
        // ArsipDokumen Routes
        Route::get('back/arsip-dokumen/create', [ArsipDokumenController::class, 'create'])->name('back.arsip_dokumen.create');
        Route::post('/back/arsip_dokumen', [ArsipDokumenController::class, 'store'])->name('back.arsip_dokumen.store');
        Route::get('/back/arsip_dokumen/{id}/edit', [ArsipDokumenController::class, 'edit'])->name('back.arsip_dokumen.edit');
        Route::put('/back/arsip_dokumen/{id}', [ArsipDokumenController::class, 'update'])->name('back.arsip_dokumen.update');
        Route::delete('/back/arsip_dokumen/{id}', [ArsipDokumenController::class, 'destroy'])->name('back.arsip_dokumen.destroy');

        // JenisDokumen Routes
        Route::get('/back/jenis_dokumen/create', [JenisDokumenController::class, 'create'])->name('back.jenis_dokumen.create');
        Route::post('/back/jenis_dokumen', [JenisDokumenController::class, 'store'])->name('back.jenis_dokumen.store');
        Route::get('/back/jenis_dokumen/{id}/edit', [JenisDokumenController::class, 'edit'])->name('back.jenis_dokumen.edit');
        Route::put('/back/jenis_dokumen/{id}', [JenisDokumenController::class, 'update'])->name('back.jenis_dokumen.update');
        Route::delete('/back/jenis_dokumen/{id}', [JenisDokumenController::class, 'destroy'])->name('back.jenis_dokumen.destroy');

        // Laporan Routes
        Route::get('/back/laporan', [LaporanDokumenController::class, 'index'])->name('back.laporan.index');
        Route::get('/back/laporan/cetak', [LaporanDokumenController::class, 'cetak'])->name('back.laporan.cetak');
    });
});

Route::get('/404', function () {
    return view('layouts.404');
})->name('404');
require __DIR__ . '/auth.php';
