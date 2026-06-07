<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OffKaryawan extends Model
{
    protected $table = 'off_karyawan';

    protected $fillable = [
        'bulan',
        'nama',
        'off_terakhir',
        'schedule',
        'realisasi',
        'status'
    ];
}
