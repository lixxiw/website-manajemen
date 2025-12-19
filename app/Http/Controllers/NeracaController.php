<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NeracaController extends Controller
{
    public function index(Request $request)
    {
        // 1. Ambil input tanggal (default hari ini)
        $tanggal = $request->input('tanggal', date('Y-m-d'));

        // 2. Query Gabungan COA dan tabel BUKBES
        $coaData = DB::table('coa')
            ->leftJoin('bukbes', function($join) use ($tanggal) {
                $join->on('coa.id_coa', '=', 'bukbes.id_coa')
                     ->where('bukbes.tanggal', '<=', $tanggal); 
            })
            ->select(
                'coa.id_coa',
                'coa.coa_number',
                'coa.coa_name',
                'coa.posisi_awal',
                // Mengambil angka depan coa_number sebagai pengelompok (1=Aset, 2=Hutang, dsb)
                DB::raw('LEFT(coa.coa_number, 1) as header_akun'),
                DB::raw('SUM(IFNULL(bukbes.debit, 0)) as total_debit'),
                DB::raw('SUM(IFNULL(bukbes.kredit, 0)) as total_kredit')
            )
            ->groupBy('coa.id_coa', 'coa.coa_number', 'coa.coa_name', 'coa.posisi_awal')
            ->get();

        // 3. HITUNG LABA RUGI BERJALAN
        // Berdasarkan CSV Anda: Pendapatan (Header 7 atau 4?), Beban (Header 6)
        // Sesuaikan angka header di bawah ini dengan digit pertama coa_number Anda
        $totalPendapatan = $this->hitungSaldo($coaData, '7'); 
        $totalBeban      = $this->hitungSaldo($coaData, '6');
        $labaBerjalan    = $totalPendapatan - $totalBeban;

        // 4. KIRIM DATA KE VIEW
        return view('layouts/neraca', [
            'aset'          => $coaData->where('header_akun', '1'),
            'kewajiban'     => $coaData->where('header_akun', '2'),
            'ekuitas'       => $coaData->where('header_akun', '3'),
            'laba_berjalan' => $labaBerjalan,
            'tanggal'       => $tanggal
        ]);
    }

    private function hitungSaldo($data, $header)
    {
        return $data->where('header_akun', $header)->sum(function ($item) {
            // Jika posisi_awal di database adalah Kredit, maka Kredit - Debit
            if (trim($item->posisi_awal) == 'Kredit') {
                return $item->total_kredit - $item->total_debit;
            }
            // Jika Debit (atau kosong), maka Debit - Kredit
            return $item->total_debit - $item->total_kredit;
        });
    }
}