<?php

namespace App\Http\Controllers;

use App\Models\AsetTanah;
use App\Models\MenuNavigasi;
use App\Models\PengaturanWebsite;
use Illuminate\Http\Request;

class AsetController extends Controller
{
    public function index()
    {
        $asets = AsetTanah::all();
        $menuNavigasi = MenuNavigasi::where('status', 'Aktif')->get();
        $pengaturan = PengaturanWebsite::first();

        return view('frontend.assets', compact('asets', 'menuNavigasi', 'pengaturan'));
    }

    public function show($id)
    {
        $aset = AsetTanah::findOrFail($id);
        $menuNavigasi = MenuNavigasi::where('status', 'Aktif')->get();
        $pengaturan = PengaturanWebsite::first();

        return view('frontend.aset_detail', compact('aset', 'menuNavigasi', 'pengaturan'));
    }
}