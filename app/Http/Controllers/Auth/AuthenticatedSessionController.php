<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Cek kredensial pengguna menggunakan Auth::attempt()
        if (Auth::attempt($request->only('email', 'password'))) {
            // Regenerasi session jika login berhasil
            $request->session()->regenerate();
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        // Jika login gagal, beri pesan kesalahan dan arahkan kembali ke form login
        return redirect()->route('login')
            ->withErrors(['email' => 'Email atau password salah'])
            ->withInput();
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
