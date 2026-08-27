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
        'gambar',
        'lat',
        'lng',
        'deskripsi',

        'sumber_perolehan',
        'nilai_perkiraan',
        'tahun_perolehan',
        'dokumen',
    ];

    protected $casts = [
        'lat' => 'decimal:7',
        'lng' => 'decimal:7',
        'luas_hektar' => 'decimal:2',
        'nilai_perkiraan' => 'decimal:2',
        'dokumen' => 'array',
    ];
}