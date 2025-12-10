<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coa extends Model
{
    use HasFactory;

    protected $table = 'coa';   // pastikan sesuai database
    protected $primaryKey = 'id_coa';

    protected $fillable = [
        'coa_name',
        'coa_number',
        'posisi_awal'
    ];
}
