<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bukbes;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BukbesExport;
use Illuminate\Http\Request;

class BukuBesarController extends Controller
{
    public function index()
    {
        $bukbes = Bukbes::orderBy('tanggal')->get();
        return view('bukubesar', compact('bukbes'));
    }

    public function exportExcel()
    {
        return Excel::download(new BukbesExport, 'bukubesar.xlsx');
    }

    public function detail()
    {
        $bukbes = Bukbes::orderBy('tanggal')->get();
        return view('bukubesar_detail', compact('bukbes'));
    }
}
