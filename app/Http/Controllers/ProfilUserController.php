<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfilUserController extends Controller
{
    // Menampilkan halaman profil user
    public function index()
    {
        return view('back.profil_user.index');
    }

    // Menampilkan halaman edit profil user
    public function edit()
    {
        return view('back.profil_user.edit');
    }

    // Mengupdate profil user
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validasi data yang dimasukkan
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed', // Validasi password
            'avatar' => 'nullable|image|max:2048',
        ]);

        // Debug input jika diperlukan
        \Log::info('Update Profil Request:', $request->all());

        // Update nama dan email
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // Update password jika ada
        if ($request->filled('password')) {
            \Log::info('Password diubah');
            $user->password = Hash::make($request->input('password'));
        }

        // Update foto profil (avatar) jika ada
        if ($request->hasFile('avatar')) {
            // Hapus avatar lama jika ada
            if ($user->avatar && Storage::exists('public/avatar/' . $user->avatar)) {
                Storage::delete('public/avatar/' . $user->avatar);
            }

            // Simpan avatar baru
            $file = $request->file('avatar');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/avatar', $fileName);
            $user->avatar = $fileName;
        }

        // Simpan perubahan data
        $user->save();

        return redirect()->route('back.profil_user.index')->with('success', 'Profil berhasil diperbarui!');
    }
}
