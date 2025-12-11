<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoaController; // Tidak digunakan di contoh ini, tapi tetap dipertahankan
use App\Http\Controllers\BukuBesarController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini tempat mendefinisikan semua route web aplikasi.
|
*/

// Middleware 'guest' memastikan route ini hanya bisa diakses oleh pengguna yang belum login.
// Jika sudah login, mereka akan diarahkan ke route yang didefinisikan di RedirectIfAuthenticated (biasanya '/home' atau '/dashboard').
Route::middleware(['guest'])->group(function() {

    // --- LOGIN / REGISTER ---
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    // --- LUPA & RESET PASSWORD ---
    Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

});


// --- LOGOUT ---
// Route logout tetap di luar blok 'guest' karena harus bisa diakses saat sudah login.
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// --- ROUTE UTAMA (/), REDIRECT KE LOGIN JIKA BELUM LOGIN, ATAU KE DASHBOARD/HOME JIKA SUDAH LOGIN ---
Route::get('/', function () {
    // Jika user sudah login, arahkan ke dashboard/home
    if (auth()->check()) {
        return redirect()->route('home'); // Ganti 'home' dengan 'dashboard' jika lebih cocok
    }
    // Jika user belum login, arahkan ke halaman login
    return redirect()->route('login');
})->name('home.redirect');


// --- ROUTE YANG PERLU LOGIN (Middleware 'auth') ---
Route::middleware(['auth'])->group(function() {

    // Dashboard untuk admin (atau halaman utama setelah login)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Home untuk user biasa (atau halaman utama setelah login)
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Buku Besar
    Route::get('/bukubesar', [BukuBesarController::class, 'index'])->name('bukubesar');
    Route::get('/bukubesar/filter', [BukuBesarController::class, 'filter'])->name('bukubesar.filter');
    Route::get('/bukubesar/export', [BukuBesarController::class, 'exportExcel'])->name('bukubesar.export');
    Route::get('/bukubesar/detail', [BukuBesarController::class, 'detail'])->name('bukubesar.detail');

    // Laporan lain
    Route::get('/neraca', [DashboardController::class, 'index']);
    Route::get('/labarugi', [DashboardController::class, 'index']);
    Route::get('/aruskas', [DashboardController::class, 'index']);
    Route::get('/balance', [DashboardController::class, 'index']);

});