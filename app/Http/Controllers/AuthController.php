<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            return $this->redirectToDashboard();
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return $this->redirectToDashboard();
        }

        return back()->withErrors([
            'email' => 'Email atau password salah',
        ])->onlyInput('email');
    }

    public function showRegister()
    {
        if (Auth::check()) {
            return $this->redirectToDashboard();
        }

        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_ktp' => 'required|numeric|digits_between:8,16|unique:users,no_ktp',
            'no_hp' => 'required|numeric',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ], [
            'nama.required' => 'Nama lengkap wajib diisi.',
            'alamat.required' => 'Alamat wajib diisi.',
            'no_ktp.required' => 'No. KTP wajib diisi.',
            'no_ktp.numeric' => 'No. KTP harus berupa angka.',
            'no_ktp.digits_between' => 'No. KTP harus 8 sampai 16 digit.',
            'no_ktp.unique' => 'No. KTP sudah terdaftar.',
            'no_hp.required' => 'No. HP wajib diisi.',
            'no_hp.numeric' => 'No. HP harus berupa angka.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak sama.',
        ], [
            'nama' => 'nama lengkap',
            'no_ktp' => 'no KTP',
            'no_hp' => 'no HP',
        ]);

        $lastPasien = User::where('role', 'pasien')->orderByDesc('id')->first();
        $lastId = $lastPasien ? $lastPasien->id + 1 : 1;
        $no_rm = date('Ym').'-'.str_pad($lastId, 3, '0', STR_PAD_LEFT);

        User::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_ktp' => $request->no_ktp,
            'no_hp' => $request->no_hp,
            'no_rm' => $no_rm,
            'role' => 'pasien',
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login');
    }

    private function redirectToDashboard()
    {
        return match (Auth::user()->role) {
            'admin' => redirect()->route('admin.dashboard'),
            'dokter' => redirect()->route('dokter.dashboard'),
            default => redirect()->route('pasien.dashboard'),
        };
    }
}
