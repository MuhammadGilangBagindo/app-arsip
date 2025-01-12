<?php

namespace App\Http\Controllers;

use App\Models\ArsipDokumen;
use App\Models\JenisDokumen;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class ArsipDokumenController extends Controller
{
    /**
     * Menampilkan daftar arsip dokumen.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): \Illuminate\Contracts\View\View
    {
        $search = $request->input('search');
        $sortBy = $request->input('sort_by', 'nama_dokumen');
        $order = $request->input('order', 'asc');

        $arsipDokumen = ArsipDokumen::with('jenisDokumen')
            ->when($search, function ($query) use ($search) {
                $query->where('nama_dokumen', 'like', "%{$search}%")
                    ->orWhere('nomor_dokumen', 'like', "%{$search}%");
            })
            ->orderBy($sortBy, $order)
            ->get();

        // Mengembalikan tampilan dengan data yang diperlukan
        return view('back.arsip_dokumen.index', compact('arsipDokumen', 'sortBy', 'order'));
    }

    /**
     * Menampilkan form untuk membuat dokumen baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): \Illuminate\Contracts\View\View
    {
        $jenisDokumen = JenisDokumen::all();
        return view('back.arsip_dokumen.form', compact('jenisDokumen'));
    }

    /**
     * Menyimpan dokumen baru ke database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_dokumen' => 'required|string|max:255',
            'nomor_dokumen' => 'required|string|max:255',
            'tanggal_pembuatan' => 'required|date',
            'jenis_dokumen' => 'required|exists:jenis_dokumen,jenis_dokumen',
            'file' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // Upload file ke folder public/storage/dokumen
        $filePath = $request->file('file')->store('dokumen', 'public');

        // Simpan data ke database
        ArsipDokumen::create([
            'nama_dokumen' => $request->nama_dokumen,
            'nomor_dokumen' => $request->nomor_dokumen,
            'tanggal_pembuatan' => $request->tanggal_pembuatan,
            'jenis_dokumen' => $request->jenis_dokumen,
            'file' => $filePath,
        ]);

        return redirect()->route('back.arsip_dokumen.index')->with('success', 'Arsip dokumen berhasil disimpan.');
    }

    /**
     * Menampilkan detail dokumen tertentu.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): \Illuminate\Contracts\View\View
    {
        $arsipDokumen = ArsipDokumen::with('jenisDokumen')->findOrFail($id);
        return view('back.arsip_dokumen.show', compact('arsipDokumen'));
    }

    /**
     * Menampilkan form untuk mengedit dokumen.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): \Illuminate\Contracts\View\View
    {
        $arsipDokumen = ArsipDokumen::findOrFail($id);
        $jenisDokumen = JenisDokumen::all();
        return view('back.arsip_dokumen.form', compact('arsipDokumen', 'jenisDokumen'));
    }

    /**
     * Memperbarui dokumen di database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'nama_dokumen' => 'required|string|max:255',
            'nomor_dokumen' => 'required|string|max:255',
            'tanggal_pembuatan' => 'required|date',
            'jenis_dokumen' => 'required|exists:jenis_dokumen,jenis_dokumen',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $arsipDokumen = ArsipDokumen::findOrFail($id);

        // Jika ada file baru, hapus file lama dan upload file baru
        if ($request->hasFile('file')) {
            if ($arsipDokumen->file) {
                Storage::disk('public')->delete($arsipDokumen->file);
            }
            $filePath = $request->file('file')->store('dokumen', 'public');
            $arsipDokumen->file = $filePath;
        }

        // Update data lainnya
        $arsipDokumen->update($request->only('nama_dokumen', 'nomor_dokumen', 'tanggal_pembuatan', 'jenis_dokumen'));

        return redirect()->route('back.arsip_dokumen.index')->with('success', 'Arsip dokumen berhasil diperbarui.');
    }

    /**
     * Menghapus dokumen dari database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): RedirectResponse
    {
        $arsipDokumen = ArsipDokumen::findOrFail($id);

        // Hapus file dari storage
        if ($arsipDokumen->file) {
            Storage::disk('public')->delete($arsipDokumen->file);
        }

        $arsipDokumen->delete();

        return redirect()->route('back.arsip_dokumen.index')->with('success', 'Arsip dokumen berhasil dihapus.');
    }
}
