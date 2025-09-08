<?php
// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\HomeController;
// use App\Http\Controllers\TrackingController;
// use App\Http\Controllers\AccountController;
// use App\Http\Controllers\TransaksiController;

// Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/tracking', [TrackingController::class, 'index'])->name('tracking.index');
// Route::get('/account', [AccountController::class, 'index'])->name('account.index');
// Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');

// // Rute Breeze sudah ada di sini, biarkan saja
// require __DIR__.'/auth.php';

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LayananController;

// Rute yang dapat diakses tanpa login
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tracking', [TrackingController::class, 'index'])->name('tracking.index');

// Rute untuk otentikasi
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Rute Registrasi
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Rute yang hanya dapat diakses setelah login
Route::middleware(['auth'])->group(function () {
    Route::get('/account', [AccountController::class, 'index'])->name('account.index');
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
});

Route::get('/konsultasi', [LayananController::class, 'showForm'])->name('layanan.konsultasi');