<?php

namespace App\Http\Controllers;

use App\Models\JenisDokumen;
use Illuminate\Http\Request;

class JenisDokumenController extends Controller
{
    /**
     * Menampilkan daftar jenis dokumen.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenisDokumen = JenisDokumen::all();
        return view('back.jenis_dokumen.index', compact('jenisDokumen'));
    }

    /**
     * Menampilkan form untuk membuat jenis dokumen baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.jenis_dokumen.form');
    }

    /**
     * Menyimpan jenis dokumen baru ke database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis_dokumen' => 'required|string|max:255|unique:jenis_dokumen,jenis_dokumen',
        ]);

        JenisDokumen::create([
            'jenis_dokumen' => $request->jenis_dokumen,
        ]);

        return redirect()->route('back.jenis_dokumen.index')->with('success', 'Jenis dokumen berhasil disimpan.');
    }

    /**
     * Menampilkan form untuk mengedit jenis dokumen.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenisDokumen = JenisDokumen::findOrFail($id);
        return view('back.jenis_dokumen.form', compact('jenisDokumen'));
    }

    /**
     * Memperbarui jenis dokumen di database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_dokumen' => 'required|string|max:255|unique:jenis_dokumen,jenis_dokumen,' . $id,
        ]);

        $jenisDokumen = JenisDokumen::findOrFail($id);
        $jenisDokumen->update([
            'jenis_dokumen' => $request->jenis_dokumen,
        ]);

        return redirect()->route('back.jenis_dokumen.index')->with('success', 'Jenis dokumen berhasil diperbarui.');
    }

    /**
     * Menghapus jenis dokumen dari database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jenisDokumen = JenisDokumen::findOrFail($id);
        $jenisDokumen->delete();

        return redirect()->route('back.jenis_dokumen.index')->with('success', 'Jenis dokumen berhasil dihapus.');
    }
}
