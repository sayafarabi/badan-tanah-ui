<?php

namespace App\Http\Controllers;

use App\Models\Halaman;
use App\Models\MenuNavigasi;
use App\Models\PengaturanWebsite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HalamanController extends Controller
{
    /**
     * Frontend - Tentang Badan Bank Tanah
     */
    public function index()
    {
        $halaman = Halaman::where('judul', 'like', '%Tentang%')->first();

        $menuNavigasi = MenuNavigasi::where('status', 'Aktif')->get();
        $pengaturan = PengaturanWebsite::first();

        if (! $halaman) {
            $halaman = Halaman::create([
                'judul' => 'Tentang Badan Bank Tanah',
                'isi' => 'Badan Bank Tanah adalah lembaga pemerintah yang mengelola aset tanah negara secara profesional, transparan, dan berkelanjutan untuk kepentingan rakyat.',
                'gambar' => null,
            ]);
        }

        return view(
            'frontend.about',
            compact('halaman', 'menuNavigasi', 'pengaturan')
        );
    }


    /**
     * Frontend - Pemanfaatan & Kerjasama Usaha
     */
    public function partnership()
    {
        $halaman = Halaman::where('judul', 'like', '%Pemanfaatan%')->first();

        $menuNavigasi = MenuNavigasi::where('status', 'Aktif')->get();
        $pengaturan = PengaturanWebsite::first();

        if (! $halaman) {
            $halaman = Halaman::create([
                'judul' => 'Pemanfaatan & Kerjasama Usaha',
                'isi' => 'Badan Bank Tanah membuka peluang kerjasama untuk investasi, reforma agraria, dan kemitraan strategis. Kami menyediakan skema pemanfaatan yang fleksibel dan transparan.',
                'gambar' => null,
            ]);
        }

        return view(
            'frontend.partnership',
            compact('halaman', 'menuNavigasi', 'pengaturan')
        );
    }


    /**
     * Admin - Edit Tentang
     */
    public function editTentang()
    {
        $halaman = Halaman::findOrFail(1);

        return view(
            'admin.halaman_edit_tentang',
            compact('halaman')
        );
    }


    /**
     * Admin - Update Tentang
     */
    public function updateTentang(Request $request)
    {
        $halaman = Halaman::findOrFail(1);

        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $data = [
            'judul' => $request->judul,
            'isi' => $request->isi,
        ];

        if ($request->hasFile('gambar')) {

            if ($halaman->gambar) {
                Storage::disk('public')->delete($halaman->gambar);
            }

            $data['gambar'] = $request->file('gambar')
                ->store('halaman', 'public');
        }

        $halaman->update($data);

        return redirect()
            ->route('admin.halaman.edit.tentang')
            ->with('success', 'Halaman Tentang berhasil diperbarui.');
    }


    /**
     * Admin - Edit Pemanfaatan & Kerjasama
     */
    public function editPartnership()
    {
        $halaman = Halaman::findOrFail(2);

        return view(
            'admin.halaman_edit_partnership',
            compact('halaman')
        );
    }


    /**
     * Admin - Update Pemanfaatan & Kerjasama
     */
    public function updatePartnership(Request $request)
    {
        $halaman = Halaman::findOrFail(2);

        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $data = [
            'judul' => $request->judul,
            'isi' => $request->isi,
        ];

        if ($request->hasFile('gambar')) {

            if ($halaman->gambar) {
                Storage::disk('public')->delete($halaman->gambar);
            }

            $data['gambar'] = $request->file('gambar')
                ->store('halaman', 'public');
        }

        $halaman->update($data);

        return redirect()
            ->route('admin.halaman.edit.partnership')
            ->with('success', 'Halaman Pemanfaatan & Kerjasama berhasil diperbarui.');
    }
}