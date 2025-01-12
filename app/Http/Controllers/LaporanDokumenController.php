<?php

namespace App\Http\Controllers;

use App\Models\ArsipDokumen;
use App\Models\JenisDokumen;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanDokumenController extends Controller
{
    /**
     * Menampilkan halaman laporan arsip dokumen.
     */
    public function index(Request $request)
    {
        // Ambil semua jenis dokumen
        $jenisDokumen = JenisDokumen::all();

        // Jika filter tidak diterapkan, tampilkan semua arsip dokumen
        $arsipDokumen = ArsipDokumen::query();

        // Filter berdasarkan jenis dokumen dan rentang tanggal jika ada
        if ($request->filled('jenis_dokumen') && $request->jenis_dokumen != 'semua') {
            $arsipDokumen->where('jenis_dokumen', $request->jenis_dokumen);
        }

        if ($request->filled(['tanggal_awal', 'tanggal_akhir'])) {
            $arsipDokumen->whereBetween('tanggal_pembuatan', [$request->tanggal_awal, $request->tanggal_akhir]);
        }

        // Ambil arsip dokumen setelah disaring
        $arsipDokumen = $arsipDokumen->get();

        return view('back.laporan.index', compact('jenisDokumen', 'arsipDokumen'));
    }


    /**
     * Cetak laporan arsip dokumen ke dalam PDF.
     */
    /**
     * Cetak laporan arsip dokumen ke dalam PDF.
     */
    public function cetak(Request $request)
    {
        $arsipDokumen = ArsipDokumen::query()
            ->when($request->jenis_dokumen != 'semua', function ($query) use ($request) {
                return $query->where('jenis_dokumen', $request->jenis_dokumen);
            })
            ->whereBetween('tanggal_pembuatan', [$request->tanggal_awal, $request->tanggal_akhir])
            ->get();

        // Load view cetak dengan data
        $pdf = PDF::loadView('back.laporan.cetak', [
            'arsipDokumen' => $arsipDokumen,
            'jenis_dokumen' => $request->jenis_dokumen,
            'tanggal_awal' => $request->tanggal_awal,
            'tanggal_akhir' => $request->tanggal_akhir,
        ]);

        // Set orientasi halaman menjadi portrait dan ukuran A4
        $pdf->setPaper('A4', 'portrait');

        // Return PDF sebagai file untuk dilihat langsung
        return $pdf->stream('laporan_arsip_dokumen.pdf');
    }
}
