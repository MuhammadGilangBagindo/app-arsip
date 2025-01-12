<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArsipDokumen; // Model untuk tabel arsip_dokumen
use App\Models\User; // Model untuk tabel users
use Illuminate\Support\Facades\DB; // Impor DB Facade


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

        // Menambahkan data ke chart
        $dokumenPerJenis = ArsipDokumen::select('jenis_dokumen', DB::raw('count(*) as total'))
            ->groupBy('jenis_dokumen')
            ->get();

        // Membuat array untuk labels dan data
        $labels = $dokumenPerJenis->pluck('jenis_dokumen')->toArray();
        $data = $dokumenPerJenis->pluck('total')->toArray();

        // Kirim data ke view
        return view('back.dashboard', compact('labels', 'data', 'jumlahArsip', 'jumlahJenisDokumen', 'jumlahUser'));
    }
}
