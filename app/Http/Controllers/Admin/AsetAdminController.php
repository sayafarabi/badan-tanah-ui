<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AsetTanah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AsetAdminController extends Controller
{
    public function index()
    {
        $asets = AsetTanah::latest()->get();

        $totalAset = $asets->count();

        return view(
            'admin.aset_index',
            compact('asets', 'totalAset')
        );
    }


    public function create()
    {
        return view('admin.aset_create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([

            'nama_lokasi' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kabupaten' => 'required|string|max:255',

            'luas_hektar' => 'required|numeric|min:0',

            'peruntukan' => 'nullable|string|max:255',
            'skema' => 'nullable|string|max:255',
            'status' => 'required|string|max:255',

            'lat' => 'nullable|numeric|between:-90,90',
            'lng' => 'nullable|numeric|between:-180,180',

            'deskripsi' => 'nullable|string',

            'sumber_perolehan' => 'nullable|string|max:255',
            'nilai_perkiraan' => 'nullable|numeric|min:0',
            'tahun_perolehan' => 'nullable|integer|min:1900|max:2100',

            'gambar' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,gif,webp',
                'max:5120',
            ],

            'dokumen.*' => [
                'nullable',
                'file',
                'mimes:pdf,jpg,jpeg,png,doc,docx,xls,xlsx',
                'max:10240',
            ],
        ]);


        // FOTO
        if ($request->hasFile('gambar')) {

            $validated['gambar'] = $request
                ->file('gambar')
                ->store('asets', 'public');

        }


        // DOKUMEN
        $dokumen = [];

        if ($request->hasFile('dokumen')) {

            foreach ($request->file('dokumen') as $file) {

                $path = $file->store('aset-dokumen', 'public');

                $dokumen[] = [
                    'nama' => $file->getClientOriginalName(),
                    'path' => $path,
                    'ukuran' => $file->getSize(),
                    'mime' => $file->getMimeType(),
                    'uploaded_at' => now()->toDateTimeString(),
                ];
            }
        }

        $validated['dokumen'] = $dokumen;


        AsetTanah::create($validated);


        return redirect()
            ->route('admin.aset.index')
            ->with('success', 'Aset berhasil ditambahkan!');
    }


    public function edit($id)
    {
        $aset = AsetTanah::findOrFail($id);

        return view(
            'admin.aset_edit',
            compact('aset')
        );
    }


    public function update(Request $request, $id)
    {
        $aset = AsetTanah::findOrFail($id);

        $validated = $request->validate([

            'nama_lokasi' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kabupaten' => 'required|string|max:255',

            'luas_hektar' => 'required|numeric|min:0',

            'peruntukan' => 'nullable|string|max:255',
            'skema' => 'nullable|string|max:255',
            'status' => 'required|string|max:255',

            'lat' => 'nullable|numeric|between:-90,90',
            'lng' => 'nullable|numeric|between:-180,180',

            'deskripsi' => 'nullable|string',

            'sumber_perolehan' => 'nullable|string|max:255',
            'nilai_perkiraan' => 'nullable|numeric|min:0',
            'tahun_perolehan' => 'nullable|integer|min:1900|max:2100',

            'gambar' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,gif,webp',
                'max:5120',
            ],

            'dokumen.*' => [
                'nullable',
                'file',
                'mimes:pdf,jpg,jpeg,png,doc,docx,xls,xlsx',
                'max:10240',
            ],
        ]);


        // FOTO BARU
        if ($request->hasFile('gambar')) {

            if ($aset->gambar) {
                Storage::disk('public')->delete($aset->gambar);
            }

            $validated['gambar'] = $request
                ->file('gambar')
                ->store('asets', 'public');
        }


        // DOKUMEN LAMA
        $dokumen = $aset->dokumen ?? [];


        // DOKUMEN BARU
        if ($request->hasFile('dokumen')) {

            foreach ($request->file('dokumen') as $file) {

                $path = $file->store('aset-dokumen', 'public');

                $dokumen[] = [
                    'nama' => $file->getClientOriginalName(),
                    'path' => $path,
                    'ukuran' => $file->getSize(),
                    'mime' => $file->getMimeType(),
                    'uploaded_at' => now()->toDateTimeString(),
                ];
            }
        }


        $validated['dokumen'] = $dokumen;


        $aset->update($validated);


        return redirect()
            ->route('admin.aset.index')
            ->with('success', 'Aset berhasil diperbarui!');
    }


    public function destroy($id)
    {
        $aset = AsetTanah::findOrFail($id);


        if ($aset->gambar) {
            Storage::disk('public')->delete($aset->gambar);
        }


        foreach ($aset->dokumen ?? [] as $dokumen) {

            if (!empty($dokumen['path'])) {
                Storage::disk('public')->delete(
                    $dokumen['path']
                );
            }
        }


        $aset->delete();


        return redirect()
            ->route('admin.aset.index')
            ->with('success', 'Aset berhasil dihapus!');
    }
}