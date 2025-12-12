<?php

namespace App\Exports;

use App\Models\Bukbes;
use App\Models\Coa;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BukbesExport implements FromArray, WithHeadings
{
    protected $start, $end;

    public function __construct($start, $end)
    {
        $this->start = $start;
        $this->end   = $end;
    }

    public function array(): array
    {
        $data = Bukbes::with('coa')
            ->whereBetween('tanggal', [$this->start, $this->end])
            ->orderBy('id_coa')
            ->get();

        $rows = [];
        $total_saldo_awal = 0;
        $total_debit = 0;
        $total_kredit = 0;
        $total_saldo_akhir = 0;

        foreach ($data as $b) {

            if (!$b->coa) continue; // jika tidak ada COA skip

            $rows[] = [
                $b->coa->coa_number,
                $b->coa->coa_name,
                $b->saldo_awal,
                $b->debit,
                $b->kredit,
                $b->saldo_akhir
            ];

            $total_saldo_awal += $b->saldo_awal;
            $total_debit      += $b->debit;
            $total_kredit     += $b->kredit;
            $total_saldo_akhir += $b->saldo_akhir;
        }

        // Tambahkan baris TOTAL
        $rows[] = [
            'TOTAL',
            '',
            $total_saldo_awal,
            $total_debit,
            $total_kredit,
            $total_saldo_akhir
        ];

        return $rows;
    }

    public function headings(): array
    {
        return [
            'Nomor Akun',
            'Nama Akun',
            'Saldo Awal',
            'Debit',
            'Kredit',
            'Saldo Akhir'
        ];
    }
}
