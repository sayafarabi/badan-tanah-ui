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
        $asets = AsetTanah::all();
        $totalAset = AsetTanah::count(); // <-- Tambahkan ini
        return view('admin.aset_index', compact('asets', 'totalAset'));
    }

    public function create()
    {
        return view('admin.aset_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lokasi' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'luas_hektar' => 'required|numeric',
            'status' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('asets', 'public');
        }

        AsetTanah::create($data);

        return redirect()->route('admin.aset.index')->with('success', 'Aset berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $aset = AsetTanah::findOrFail($id);
        return view('admin.aset_edit', compact('aset'));
    }

    public function update(Request $request, $id)
    {
        $aset = AsetTanah::findOrFail($id);
        $request->validate([
            'nama_lokasi' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'luas_hektar' => 'required|numeric',
            'status' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            if ($aset->gambar) {
                Storage::delete('public/' . $aset->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('asets', 'public');
        }

        $aset->update($data);

        return redirect()->route('admin.aset.index')->with('success', 'Aset berhasil diubah!');
    }

    public function destroy($id)
    {
        $aset = AsetTanah::findOrFail($id);
        if ($aset->gambar) {
            Storage::delete('public/' . $aset->gambar);
        }
        $aset->delete();
        return redirect()->route('admin.aset.index')->with('success', 'Aset berhasil dihapus!');
    }
}