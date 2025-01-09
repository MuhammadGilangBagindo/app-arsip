<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArsipDokumen; // Model untuk tabel arsip_dokumen
use App\Models\User; // Model untuk tabel users

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung jumlah arsip
        $jumlahArsip = ArsipDokumen::count();

        // Hitung jumlah jenis dokumen unik
        $jumlahJenisDokumen = ArsipDokumen::distinct('jenis_dokumen')->count('jenis_dokumen');

        // Hitung jumlah user
        $jumlahUser = User::count();

        // Kirim data ke view
        return view('back.dashboard', compact('jumlahArsip', 'jumlahJenisDokumen', 'jumlahUser'));
    }
}
