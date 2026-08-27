<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PengaturanWebsite;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function index()
    {
        $pengaturan = PengaturanWebsite::first();

        if (!$pengaturan) {
            $pengaturan = PengaturanWebsite::create([
                'nama_website' => 'Badan Bank Tanah',
                'warna_utama' => '#0B2A4A',
                'warna_sekunder' => '#1D4ED8',
            ]);
        }

        return view('admin.footer', compact('pengaturan'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'footer_deskripsi' => 'nullable|string|max:2000',
            'footer_alamat' => 'nullable|string|max:1000',
            'footer_email' => 'nullable|email|max:255',
            'footer_telepon' => 'nullable|string|max:100',

            'footer_facebook' => 'nullable|url|max:500',
            'footer_twitter' => 'nullable|url|max:500',
            'footer_instagram' => 'nullable|url|max:500',
            'footer_linkedin' => 'nullable|url|max:500',

            'footer_copyright' => 'nullable|string|max:255',
            'footer_privacy' => 'nullable|string|max:255',
            'footer_terms' => 'nullable|string|max:255',
            'footer_accessibility' => 'nullable|string|max:255',
        ]);

        $pengaturan = PengaturanWebsite::first();

        if (!$pengaturan) {
            $pengaturan = new PengaturanWebsite();
        }

        $pengaturan->fill([
            'footer_deskripsi' => $request->footer_deskripsi,
            'footer_alamat' => $request->footer_alamat,
            'footer_email' => $request->footer_email,
            'footer_telepon' => $request->footer_telepon,

            'footer_facebook' => $request->footer_facebook,
            'footer_twitter' => $request->footer_twitter,
            'footer_instagram' => $request->footer_instagram,
            'footer_linkedin' => $request->footer_linkedin,

            'footer_copyright' => $request->footer_copyright,
            'footer_privacy' => $request->footer_privacy,
            'footer_terms' => $request->footer_terms,
            'footer_accessibility' => $request->footer_accessibility,
        ]);

        $pengaturan->save();

        return redirect()
            ->route('admin.footer.index')
            ->with('success', 'Footer berhasil diperbarui.');
    }
}