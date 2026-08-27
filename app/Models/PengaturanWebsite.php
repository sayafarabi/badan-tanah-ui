<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengaturanWebsite extends Model
{
    use HasFactory;

    protected $table = 'pengaturan_websites';

    protected $fillable = [
        // Homepage
        'judul_hero',
        'subjudul_hero',
        'tombol_text',
        'tombol_link',
        'warna_utama',
        'warna_sekunder',

        // Identitas website
        'nama_website',
        'deskripsi_website',
        'logo',

        // Footer
        'footer_deskripsi',
        'footer_alamat',
        'footer_email',
        'footer_telepon',
        'footer_facebook',
        'footer_twitter',
        'footer_instagram',
        'footer_linkedin',
        'footer_copyright',
        'footer_privacy',
        'footer_terms',
        'footer_accessibility',

        // Integrasi
        'google_analytics',
        'kimi_api_key',
        'qr_enabled',
        'maintenance_mode',

        // SEO
        'meta_title_default',
        'meta_description_default',
        'keywords',

        // General
        'timezone',
        'bahasa',
    ];

    protected $casts = [
        'qr_enabled' => 'boolean',
        'maintenance_mode' => 'boolean',
    ];
}