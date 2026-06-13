<?php

use Illuminate\Support\Facades\Route;

// Import semua Controller yang kamu pakai
use App\Http\Controllers\FrontController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\KategoriArtikelController; // Sesuaikan jika namamu KategoriArtikelController
use App\Http\Controllers\PenulisController;

// ==========================================
// 1. ROUTE PENGUNJUNG (Bisa diakses siapa saja)
// ==========================================
Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/baca/{id}', [FrontController::class, 'show'])->name('front.show');

// ==========================================
// 2. ROUTE AUTENTIKASI (Wajib di luar grup admin!)
// ==========================================
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// ==========================================
// 3. ROUTE ADMIN / CMS (Wajib Login)
// ==========================================
Route::middleware(['auth'])->prefix('admin')->group(function () {
    
    // Halaman pertama setelah login
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Route CRUD untuk CMS
    Route::resource('artikel', ArtikelController::class);
    Route::resource('kategori', KategoriArtikelController::class); 
    Route::resource('penulis', PenulisController::class);
    
});