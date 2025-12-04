<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoaController;
use App\Http\Controllers\BukuBesarController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini tempat mendefinisikan semua route web aplikasi.
|
*/

// --- LOGIN / REGISTER / LOGOUT ---
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// --- LUPA PASSWORD ---
Route::get('password/lost', 'ForgotPasswordController@forgotPassword');

// --- ROUTE UTAMA (/), REDIRECT SESUAI ROLE ---
Route::get('/', function () {
    if (auth()->check()) {
        return auth()->user()->role === 'admin'
            ? redirect()->route('dashboard')
            : redirect()->route('home');
    }
    return redirect()->route('login');
})->name('home.redirect');

// --- ROUTE YANG PERLU LOGIN ---
Route::middleware(['auth'])->group(function() {

    // Dashboard untuk admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Home untuk user biasa
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Buku Besar
    Route::get('/bukubesar', [BukuBesarController::class, 'index'])->name('bukubesar');

    // Laporan lain (sementara arahkan ke dashboard)
    Route::get('/neraca', [DashboardController::class, 'index']);
    Route::get('/labarugi', [DashboardController::class, 'index']);
    Route::get('/aruskas', [DashboardController::class, 'index']);
    Route::get('/balance', [DashboardController::class, 'index']);

});
