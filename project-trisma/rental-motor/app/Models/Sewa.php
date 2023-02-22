<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sewa extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'kode_transaksi',
        'kode_penyewa',
        'jenis_motor',
        'sewa',
        'kembalikan'
    ];
}