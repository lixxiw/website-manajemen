<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoaController;
use App\Http\Controllers\BukuBesarController;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');
    
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get ('password/lost','ForgotPasswordController@forgotPassword');



// --- ROUTE UTAMA (/) DIARAHKAN KE VIEW DASHBOARD ---
Route::get('/', function () {
    // Menunjuk ke resources/views/dashboard.blade.php
    return view('layouts.app'); 
})->name('layouts.app');