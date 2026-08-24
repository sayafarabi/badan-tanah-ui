<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\MenuNavigasi;
use App\Models\PengaturanWebsite;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::latest()->get();
        $menuNavigasi = MenuNavigasi::where('status', 'Aktif')->get();
        $pengaturan = PengaturanWebsite::first();

        return view('frontend.publications', compact('berita', 'menuNavigasi', 'pengaturan'));
    }

    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        $menuNavigasi = MenuNavigasi::where('status', 'Aktif')->get();
        $pengaturan = PengaturanWebsite::first();

        return view('frontend.berita_detail', compact('berita', 'menuNavigasi', 'pengaturan'));
    }
}