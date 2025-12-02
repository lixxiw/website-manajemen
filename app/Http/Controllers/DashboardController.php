<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard'); // pastikan nama file Blade = dashboard.blade.php
    }
}
