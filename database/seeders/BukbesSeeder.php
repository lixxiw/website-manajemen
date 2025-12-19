<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class BukbesSeeder extends Seeder
{
    public function run()
    {
        $rows = Excel::toArray([], storage_path('app/LAPORAN KEUANGAN(2).xlsx'))[0];

        foreach (array_slice($rows, 1) as $row) {
            DB::table('bukbes')->insert([
                'tanggal'     => '2025-01-05',
                'id_coa'      => (int) $row[0],
                'saldo_awal'  => (int) $row[1],
                'debit'       => (int) $row[2],
                'kredit'      => (int) $row[3],
                'saldo_akhir' => (int) $row[4],
                'deleted'     => 0,
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}
