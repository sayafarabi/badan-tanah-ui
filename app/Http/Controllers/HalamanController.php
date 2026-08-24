<?php

namespace App\Http\Controllers;

use App\Models\Halaman;
use App\Models\MenuNavigasi;
use App\Models\PengaturanWebsite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HalamanController extends Controller
{
    public function index()
    {
        $halaman = Halaman::where('judul', 'like', '%Tentang%')->first();
        $menuNavigasi = MenuNavigasi::where('status', 'Aktif')->get();
        $pengaturan = PengaturanWebsite::first();

        if (!$halaman) {
            $halaman = Halaman::create([
                'judul' => 'Tentang Badan Bank Tanah',
                'isi' => 'Badan Bank Tanah adalah lembaga pemerintah yang mengelola aset tanah negara secara profesional, transparan, dan berkelanjutan untuk kepentingan rakyat.',
                'gambar' => null,
            ]);
        }

        return view('frontend.about', compact('halaman', 'menuNavigasi', 'pengaturan'));
    }

    public function partnership()
    {
        $halaman = Halaman::where('judul', 'like', '%Pemanfaatan%')->first();
        $menuNavigasi = MenuNavigasi::where('status', 'Aktif')->get();
        $pengaturan = PengaturanWebsite::first();

        if (!$halaman) {
            $halaman = Halaman::create([
                'judul' => 'Pemanfaatan & Kerjasama Usaha',
                'isi' => 'Badan Bank Tanah membuka peluang kerjasama untuk investasi, reforma agraria, dan kemitraan strategis. Kami menyediakan skema pemanfaatan yang fleksibel dan transparan.',
                'gambar' => null,
            ]);
        }

        return view('frontend.partnership', compact('halaman', 'menuNavigasi', 'pengaturan'));
    }
}