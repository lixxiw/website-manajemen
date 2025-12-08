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

    public function filter(Request $request)
{
    $start = $request->start;
    $end   = $request->end;

    // 1. Ambil saldo akhir 1 hari sebelum tanggal awal
    $saldoAwal = Bukbes::where('tanggal', '<', $start)
                       ->orderBy('tanggal', 'desc')
                       ->value('saldo_akhir') ?? 0;

    // 2. Ambil semua transaksi dalam range tanggal
    $data = Bukbes::whereBetween('tanggal', [$start, $end])
                  ->orderBy('tanggal')
                  ->get();

    // 3. Hitung ulang saldo berdasarkan aturan akuntansi
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
        'saldo_awal' => $saldoAwal
    ]);
}

}
