<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilInstansiController extends Controller
{
    /**
     * Menampilkan halaman profil instansi.
     */
    public function index()
    {
        return view('back.instansi.index');
    }
}
