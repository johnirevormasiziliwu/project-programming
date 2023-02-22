<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyewa extends Model
{
    use HasFactory;

    protected $fillabale = [
        'kode_penyewa',
        'nama',
        'alamat',
        'no_telepon',
        'jaminan'
    ];
}