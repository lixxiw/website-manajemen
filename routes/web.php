<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoaController;
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
*/

Route::middleware(['guest'])->group(function() {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard'); 
    }
    return redirect()->route('login');
})->name('home.redirect');

Route::middleware(['auth'])->group(function() {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/bukubesar', [BukuBesarController::class, 'index'])->name('bukubesar');
    Route::get('/bukubesar/filter', [BukuBesarController::class, 'filter'])->name('bukubesar.filter');
    Route::get('/bukubesar/export', [BukuBesarController::class, 'exportExcel'])->name('bukubesar.export');
    Route::get('/bukubesar/detail', [BukuBesarController::class, 'detail'])->name('bukubesar.detail');

    // --- PERBAIKAN DI SINI ---
    // Karena file kamu ada di resources/views/layouts/neraca.blade.php
    Route::get('/neraca', function () {
        return view('layouts.neraca'); 
    })->name('neraca');

    // Sesuaikan juga untuk labarugi dan aruskas jika filenya ada di dalam layouts
    Route::get('/labarugi', function () {
        return view('layouts.labarugi'); 
    })->name('labarugi');

    Route::get('/aruskas', function () {
        return view('layouts.aruskas'); 
    })->name('aruskas');

    Route::get('/balance', [DashboardController::class, 'index'])->name('balance');

});