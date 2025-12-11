<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoaSeeder extends Seeder
{
    public function run()
    {
        DB::table('coa')->insert([
            ['id_coa'=>1,'coa_name'=>'Aset','coa_number'=>'1.0.00','posisi_awal'=>null],
            ['id_coa'=>2,'coa_name'=>'Aset Lancar','coa_number'=>'1.1.00','posisi_awal'=>null],
            ['id_coa'=>5,'coa_name'=>'Kas','coa_number'=>'1.1.01','posisi_awal'=>null],
            ['id_coa'=>6,'coa_name'=>'Kas Besar','coa_number'=>'1.1.01.01','posisi_awal'=>'Debit'],
            ['id_coa'=>8,'coa_name'=>'Kas Kecil','coa_number'=>'1.1.01.02','posisi_awal'=>'Debit'],
            ['id_coa'=>261,'coa_name'=>'Kas Operasional','coa_number'=>'1.1.01.03','posisi_awal'=>'Debit'],
            ['id_coa'=>280,'coa_name'=>'Kas Besar 2','coa_number'=>'1.1.01.04','posisi_awal'=>'Debit'],
            ['id_coa'=>287,'coa_name'=>'Kas Direksi','coa_number'=>'1.1.01.99','posisi_awal'=>'Debit'],
            ['id_coa'=>9,'coa_name'=>'Bank','coa_number'=>'1.1.02','posisi_awal'=>null],
            ['id_coa'=>10,'coa_name'=>'BCA - XXX','coa_number'=>'1.1.02.01','posisi_awal'=>'Debit'],
            ['id_coa'=>238,'coa_name'=>'BCA -YYY','coa_number'=>'1.1.02.04','posisi_awal'=>'Debit'],
            ['id_coa'=>239,'coa_name'=>'Common -','coa_number'=>'1.1.02.05','posisi_awal'=>'Debit'],
            ['id_coa'=>262,'coa_name'=>'OCBC NISP','coa_number'=>'1.1.02.06','posisi_awal'=>'Debit'],
            ['id_coa'=>208,'coa_name'=>'BCA -BDN','coa_number'=>'1.1.02.08','posisi_awal'=>'Debit'],
            ['id_coa'=>237,'coa_name'=>'BCA - LY','coa_number'=>'1.1.02.09','posisi_awal'=>'Debit'],
            ['id_coa'=>17,'coa_name'=>'Piutang','coa_number'=>'1.1.03','posisi_awal'=>null],
            ['id_coa'=>18,'coa_name'=>'Piutang Usaha','coa_number'=>'1.1.03.01','posisi_awal'=>'Debit'],
            ['id_coa'=>19,'coa_name'=>'Piutang Karyawan','coa_number'=>'1.1.03.02','posisi_awal'=>'Debit'],
            ['id_coa'=>168,'coa_name'=>'Piutang Direksi','coa_number'=>'1.1.03.03','posisi_awal'=>'Debit'],
            ['id_coa'=>169,'coa_name'=>'Piutang Uang Jalan','coa_number'=>'1.1.03.04','posisi_awal'=>'Debit'],
            ['id_coa'=>170,'coa_name'=>'Piutang Lain-lain','coa_number'=>'1.1.03.05','posisi_awal'=>'Debit'],
            ['id_coa'=>98,'coa_name'=>'HPP - Uang Jalan & Totalan','coa_number'=>'5.1.01.01','posisi_awal'=>'Debit'],

        ]);
    }
}
