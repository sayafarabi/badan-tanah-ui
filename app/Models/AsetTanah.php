<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsetTanah extends Model
{
    use HasFactory;

    protected $table = 'aset_tanah';

    protected $fillable = [
        'nama_lokasi',
        'provinsi',
        'kabupaten',
        'luas_hektar',
        'peruntukan',
        'skema',
        'status',
        'deskripsi',
        'lat',
        'lng',
        'gambar',
    ];
}