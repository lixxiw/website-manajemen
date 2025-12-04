<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bukbes extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'bukbes';

    // Field yang bisa diisi secara massal
    protected $fillable = [
        'tanggal',
        'id_coa',
        'saldo_awal',
        'debit',
        'kredit',
        'saldo_akhir',
        'deleted',
    ];
}
