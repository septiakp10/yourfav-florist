<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Data user valid (dari proses_login.php lama)
    private array $validUsers = [
        'septia' => 'septia123',
    ];

    public function showLogin()
    {
        // Jika sudah login, langsung ke index
        if (session()->has('user')) return redirect()->route('home');
        return view('login');
    }

    public function login(Request $request)
    {
        $username   = trim($request->input('username', ''));
        $password   = $request->input('password', '');
        $rememberMe = $request->boolean('remember_me');

        if ($username === '' || $password === '') {
            return back()->with('error', 'Username dan password tidak boleh kosong.');
        }

        if (!isset($this->validUsers[$username]) || $this->validUsers[$username] !== $password) {
            return back()->with('error', 'Username atau password salah. Silakan coba lagi.');
        }

        // Set session Laravel
        session(['user' => $username]);

        // Handle remember me cookie
        $cookie = $rememberMe
            ? cookie('remember_username', $username, 60 * 24 * 30) // 30 hari
            : cookie()->forget('remember_username');

        return redirect()->route('home')->withCookie($cookie);
    }

    public function logout()
    {
        session()->forget('user');
        return redirect()->route('login')->with('logout', '1')
               ->withCookie(cookie()->forget('remember_username'));
    }
}