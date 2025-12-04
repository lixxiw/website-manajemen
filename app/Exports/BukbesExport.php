<?php

namespace App\Exports;

use App\Models\Bukbes;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BukbesExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Bukbes::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Tanggal',
            'ID COA',
            'Saldo Awal',
            'Debit',
            'Kredit',
            'Saldo Akhir',
            'Deleted',
            'Created At',
            'Updated At'
        ];
    }
}

