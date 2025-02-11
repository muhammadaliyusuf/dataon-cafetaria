<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function indexLogin()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            // Jika berhasil, redirect ke halaman dashboard atau menu
            $request->session()->regenerate();
            return redirect()->intended('/menu');
        }

        // Jika gagal, kembali ke halaman login dengan pesan error
        return back()->with('loginError', 'Name or Password uncorrect')->withInput();
    }

    // Menampilkan halaman register
    public function indexRegister()
    {
        return view('auth.register');
    }

    // Proses register
    public function register(Request $request)
    {

        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'phone' => ['required', 'regex:/^(\+62|62|0)[2-9][0-9]{7,12}$/'],
            'password' => [
                'required',
                'confirmed', // Menambahkan validasi konfirmasi password
                Password::min(8)
                    ->mixedCase() // Harus ada huruf besar & kecil
                    ->letters() // Harus ada huruf
                    ->numbers() // Harus ada angka
                    ->symbols() // Harus ada simbol
            ],
        ], [
            'password.confirmed' => 'Password confirmation does not match.',
            'phone.regex' => 'Must start with +62 or 0.',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        // Membuat user baru
        User::create($validatedData);

        // Redirect ke halaman dashboard atau menu
        return redirect('/login')->with('success', 'Registration successfull, please login.');
    }

    // Proses logout
    public function logout()
    {
        Auth::logout();
        // supaya sessionnya berakhir & tidak bisa dipakai
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    }
}