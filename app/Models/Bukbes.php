<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bukbes extends Model
{
    use HasFactory;

    protected $table = 'bukbes';
    protected $primaryKey = 'id';

    protected $fillable = [
        'tanggal',
        'id_coa',
        'saldo_awal',
        'debit',
        'kredit',
        'saldo_akhir',
        'deleted',
    ];

    // Relasi ke COA (yang benar)
    public function coa()
    {
        return $this->belongsTo(Coa::class, 'id_coa', 'id_coa');
    }
}
