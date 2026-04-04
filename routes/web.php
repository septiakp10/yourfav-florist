<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Halaman Utama (dilindungi login)
Route::get('/', function () {
    if (!session()->has('user')) return redirect()->route('login');
    return view('index');
})->name('home');

// Halaman Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

// Proses Form Login & Logout
Route::post('/login', [AuthController::class, 'login'])->name('login.proses');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');