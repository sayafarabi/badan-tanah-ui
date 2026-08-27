<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PengaturanWebsite;
use Illuminate\Http\Request;

class WebsiteBuilderController extends Controller
{
    public function edit()
    {
        $pengaturan = PengaturanWebsite::first();

        if (!$pengaturan) {
            $pengaturan = PengaturanWebsite::create([
                'judul_hero' => 'Mengelola Tanah, Memajukan Negeri',
                'subjudul_hero' => 'Badan Bank Tanah mengelola aset tanah negara secara profesional, transparan, dan berkelanjutan untuk kepentingan rakyat.',
                'tombol_text' => 'Selengkapnya',
                'tombol_link' => '/aset',
                'warna_utama' => '#0B2A4A',
                'warna_sekunder' => '#1D4ED8',
            ]);
        }

        return view('admin.website', compact('pengaturan'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'judul_hero' => 'required|string|max:255',
            'subjudul_hero' => 'required|string',
            'tombol_text' => 'required|string|max:100',
            'tombol_link' => 'required|string|max:500',

            'warna_utama' => [
                'required',
                'regex:/^#[0-9A-Fa-f]{6}$/',
            ],

            'warna_sekunder' => [
                'required',
                'regex:/^#[0-9A-Fa-f]{6}$/',
            ],
        ]);

        $pengaturan = PengaturanWebsite::first();

        if (!$pengaturan) {
            $pengaturan = new PengaturanWebsite();
        }

        $pengaturan->fill($validated);
        $pengaturan->save();

        return redirect()
            ->route('admin.website')
            ->with('success', 'Pengaturan website berhasil diperbarui.');
    }
}