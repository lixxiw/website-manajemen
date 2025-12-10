<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bukbes;
use App\Models\Coa;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BukbesExport;
use Illuminate\Http\Request;

class BukuBesarController extends Controller
{

    public function exportExcel()
    {
        return Excel::download(new BukbesExport, 'bukubesar.xlsx');
    }

    public function detail()
    {
        $bukbes = Bukbes::orderBy('tanggal')->get();
        return view('bukubesar_detail', compact('bukbes'));
    }

   public function index()
{
    return view('bukubesar', [
        'coa' => Coa::orderBy('coa_number')->get(),
        'bukbes' => [], // kosong dulu
        'start' => null,
        'end' => null,
        'saldo_awal' => 0,
        'id_coa' => null
    ]);
}


public function filter(Request $request)
{
    $start = $request->start;
    $end   = $request->end;
    $id_coa = $request->id_coa;

    // 1. SALDO AWAL
    $saldoAwal = Bukbes::where('id_coa', $id_coa)
                       ->where('tanggal', '<', $start)
                       ->orderBy('tanggal', 'desc')
                       ->value('saldo_akhir') ?? 0;

    // 2. DATA RANGE
    $data = Bukbes::where('id_coa', $id_coa)
                  ->whereBetween('tanggal', [$start, $end])
                  ->orderBy('tanggal')
                  ->get();

    // 3. HITUNG SALDO
    $saldo = $saldoAwal;
    foreach ($data as $item) {
        $item->saldo_awal = $saldo;
        $saldo = $saldo + ($item->debit ?? 0) - ($item->kredit ?? 0);
        $item->saldo_akhir = $saldo;
    }

    return view('bukubesar', [
        'bukbes' => $data,
        'start' => $start,
        'end'   => $end,
        'saldo_awal' => $saldoAwal,
        'coa' => Coa::orderBy('coa_number')->get(),
        'id_coa' => $id_coa
    ]);
}


}
