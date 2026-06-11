<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\SaranaController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;

// =====================
// Frontend Routes
// =====================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profil', [HomeController::class, 'profil'])->name('profil');
Route::get('/sarana-prasarana', [HomeController::class, 'sarana'])->name('sarana');
Route::get('/berita', [HomeController::class, 'berita'])->name('berita');
Route::get('/berita/{slug}', [HomeController::class, 'beritaDetail'])->name('berita.detail');
Route::get('/guru', [HomeController::class, 'guru'])->name('guru');
Route::get('/galeri', [HomeController::class, 'galeri'])->name('galeri');
Route::get('/kontak', [HomeController::class, 'kontak'])->name('kontak');

// =====================
// Admin Auth Routes
// =====================
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/otp', [AuthController::class, 'otpForm'])->name('otp.form');
    Route::post('/otp', [AuthController::class, 'otpVerify'])->name('otp.verify');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Protected admin routes
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('guru', GuruController::class);
        Route::resource('berita', BeritaController::class);
        Route::resource('sarana', SaranaController::class);
        Route::resource('galeri', GaleriController::class);

        // Profile & Password
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');

        // Manajemen Akun Admin
        Route::resource('users', UserController::class);
    });
});
