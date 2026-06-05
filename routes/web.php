<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// ===================== PUBLIC ROUTES =====================
// Halaman Utama (public, bisa diakses semua orang)
Route::get('/', function () {
    return view('index');
})->name('home');

// Halaman Produk (public view)
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// ===================== AUTH ROUTES =====================
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile (dari Breeze + foto upload)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/photo', [ProfileController::class, 'updatePhoto'])->name('profile.photo');

    // ===================== ADMIN ONLY =====================
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/products', [ProductController::class, 'adminIndex'])->name('products.index');
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/products', [ProductController::class, 'store'])->name('products.store');
        Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    });
});

require __DIR__.'/auth.php';
