<?php

namespace App\Http\Controllers;

use App\Models\Bukbes;
use App\Models\Coa;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BukbesExport;

class BukuBesarController extends Controller
{
    public function index()
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('home')->with('error', 'Tidak bisa akses.');
        }

        return view('bukubesar', [
            'coa' => Coa::orderBy('coa_number')->get(),
            'bukbes' => collect(),
            'start' => null,
            'end' => null,
            'id_coa' => null,
            'saldo_awal' => 0,

            // ⬇⬇ WAJIB ADA
            'total_saldo_awal'  => 0,
            'total_debit'       => 0,
            'total_kredit'      => 0,
            'total_saldo_akhir' => 0,
        ]);
    }

   public function filter(Request $request)
{
    $start  = $request->start;
    $end    = $request->end;
    $id_coa = $request->id_coa;

    // =========================
    // MODE ALL COA
    // =========================
    if ($id_coa === "all") {

        $data = Bukbes::with('coa')
            ->whereBetween('tanggal', [$start, $end])
            ->orderBy('id_coa')
            ->orderBy('tanggal')
            ->get();

        $grouped = $data->groupBy('id_coa');

        $total_saldo_awal  = 0;
        $total_debit       = 0;
        $total_kredit      = 0;
        $total_saldo_akhir = 0;

        foreach ($grouped as $coa_id => $items) {

            $coa = Coa::find($coa_id);

            // saldo akhir terakhir sebelum tanggal awal
            $saldoAwal = Bukbes::where('id_coa', $coa_id)
                ->where('tanggal', '<', $start)
                ->orderBy('tanggal', 'desc')
                ->value('saldo_akhir') ?? 0;

            $saldo = $saldoAwal;

            foreach ($items as $item) {
                $item->saldo_awal = $saldo;

                // NORMAL BALANCE
                if ($coa && $coa->posisi_awal === 'Kredit') {
                    $saldo = $saldo - ($item->debit ?? 0) + ($item->kredit ?? 0);
                } else {
                    $saldo = $saldo + ($item->debit ?? 0) - ($item->kredit ?? 0);
                }

                $item->saldo_akhir = $saldo;

                $total_debit  += $item->debit ?? 0;
                $total_kredit += $item->kredit ?? 0;
            }

            $total_saldo_awal  += $saldoAwal;
            $total_saldo_akhir += $saldo;
        }

        return view('bukubesar', [
            'bukbes' => $data,
            'start'  => $start,
            'end'    => $end,
            'coa'    => Coa::orderBy('coa_number')->get(),
            'id_coa' => 'all',
            'total_saldo_awal'  => $total_saldo_awal,
            'total_debit'       => $total_debit,
            'total_kredit'      => $total_kredit,
            'total_saldo_akhir' => $total_saldo_akhir,
        ]);
    }

    // =========================
    // MODE SINGLE COA
    // =========================
    $coa = Coa::findOrFail($id_coa);

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

        if ($coa->posisi_awal === 'Kredit') {
            $saldo = $saldo - ($item->debit ?? 0) + ($item->kredit ?? 0);
        } else {
            $saldo = $saldo + ($item->debit ?? 0) - ($item->kredit ?? 0);
        }

        $item->saldo_akhir = $saldo;
    }

    return view('bukubesar', [
        'bukbes' => $data,
        'start'  => $start,
        'end'    => $end,
        'coa'    => Coa::orderBy('coa_number')->get(),
        'id_coa' => $id_coa,
        'total_saldo_awal'  => $saldoAwal,
        'total_debit'       => $data->sum('debit'),
        'total_kredit'      => $data->sum('kredit'),
        'total_saldo_akhir' => $saldo,
    ]);
}


    public function exportExcel(Request $request)
    {
        return Excel::download(
            new BukbesExport($request->start, $request->end, $request->id_coa),
            'bukubesar.xlsx'
        );
    }
}
