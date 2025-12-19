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

 public function exportExcel(Request $request)
{
    return Excel::download(
        new BukbesExport($request->start, $request->end, $request->id_coa),
        'bukubesar.xlsx'
    );
}

    public function detail()
    {
        $bukbes = Bukbes::orderBy('tanggal')->get();
        return view('bukubesar_detail', compact('bukbes'));
    }

   public function index()
{
    if (auth()->user()->role !== 'admin') {
        return redirect()->route('home')->with('error', 'Tidak bisa akses.');
    }
    return view('bukubesar', [
        'coa' => Coa::orderBy('coa_number')->get(),
        'bukbes' => [],
        'start' => null,
        'end' => null,
        'saldo_awal' => 0,
        'id_coa' => null,

        // ⬇⬇ TAMBAHKAN INI SUPAYA VIEW TIDAK ERROR
        'total_saldo_awal' => 0,
        'total_debit' => 0,
        'total_kredit' => 0,
        'total_saldo_akhir' => 0,
    ]);
}



public function filter(Request $request)
{
    $start = $request->start;
    $end   = $request->end;
    $id_coa = $request->id_coa;

    // Jika all → ambil semua data
    if ($id_coa === "all") {

        $data = Bukbes::whereBetween('tanggal', [$start, $end])
                      ->orderBy('id_coa')
                      ->orderBy('tanggal')
                      ->get();

        // Hitung saldo per COA masing-masing
        $grouped = $data->groupBy('id_coa');

        foreach ($grouped as $coa_id => $items) {

            $saldoAwal = Bukbes::where('id_coa', $coa_id)
                               ->where('tanggal', '<', $start)
                               ->orderBy('tanggal', 'desc')
                               ->value('saldo_akhir') ?? 0;

            $saldo = $saldoAwal;

            foreach ($items as $item) {
                $item->saldo_awal = $saldo;
                $saldo = $saldo + ($item->debit ?? 0) - ($item->kredit ?? 0);
                $item->saldo_akhir = $saldo;
            }
        }
// ⬇⬇ MASUKKAN INI SETELAH LOOP SELESAI
$total_saldo_awal   = $data->sum('saldo_awal');
$total_debit        = $data->sum('debit');
$total_kredit       = $data->sum('kredit');
$total_saldo_akhir  = $data->sum('saldo_akhir');

return view('bukubesar', [
    'bukbes' => $data,
    'start' => $start,
    'end'   => $end,
    'saldo_awal' => 0,
    'coa' => Coa::orderBy('coa_number')->get(),
    'id_coa' => "all",
    'total_saldo_awal' => $total_saldo_awal,
    'total_debit' => $total_debit,
    'total_kredit' => $total_kredit,
    'total_saldo_akhir' => $total_saldo_akhir,
]);
    }

    // ===================
    // MODE SINGLE COA
    // ===================
    $saldoAwal = Bukbes::where('id_coa', $id_coa)
                       ->where('tanggal', '<', $start)
                       ->orderBy('tanggal', 'desc')
                       ->value('saldo_akhir') ?? 0;

    $data = Bukbes::where('id_coa', $id_coa)
                  ->whereBetween('tanggal', [$start, $end])
                  ->orderBy('tanggal')
                  ->get();

    $saldo = $saldoAwal;
    foreach ($data as $item) {
        $item->saldo_awal = $saldo;
        $saldo = $saldo + ($item->debit ?? 0) - ($item->kredit ?? 0);
        $item->saldo_akhir = $saldo;
    }

   // ⬇⬇ TAMBAHKAN TOTAL DI SINI
$total_saldo_awal   = $data->sum('saldo_awal');
$total_debit        = $data->sum('debit');
$total_kredit       = $data->sum('kredit');
$total_saldo_akhir  = $data->sum('saldo_akhir');

return view('bukubesar', [
    'bukbes' => $data,
    'start' => $start,
    'end'   => $end,
    'saldo_awal' => $saldoAwal,
    'coa' => Coa::orderBy('coa_number')->get(),
    'id_coa' => $id_coa,
    'total_saldo_awal' => $total_saldo_awal,
    'total_debit' => $total_debit,
    'total_kredit' => $total_kredit,
    'total_saldo_akhir' => $total_saldo_akhir,
]);
}


}
