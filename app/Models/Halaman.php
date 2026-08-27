<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Halaman extends Model
{
    use HasFactory;

    protected $table = 'halaman';

    protected $fillable = [
        'judul',
        'isi',
        'gambar',

        // Tentang
        'profil_lembaga',
        'visi',
        'misi',
        'struktur_organisasi',
        'landasan_hukum',

        // Pemanfaatan & Kerjasama
        'tentang_pemanfaatan',
        'skema_pemanfaatan',
        'bentuk_kerjasama',
        'prosedur_tahapan',
        'persyaratan',
    ];
}