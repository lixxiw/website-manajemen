<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    // Jika belum login
    if (!auth()->check()) {
        return redirect()->route('login');
    }

    // Jika bukan admin
    if (auth()->user()->role !== 'admin') {
        return redirect()->route('home')->with('error', 'Anda tidak punya akses ke dashboard admin.');
    }

    return view('dashboard');
}

}
