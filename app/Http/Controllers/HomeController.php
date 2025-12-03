<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('layouts/home'); // pastikan nama file Blade = dashboard.blade.php
    }
}
