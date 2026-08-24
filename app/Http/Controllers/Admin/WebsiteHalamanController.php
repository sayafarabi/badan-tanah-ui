<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Halaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WebsiteHalamanController extends Controller
{
    public function index()
    {
        $halamans = Halaman::all();
        return view('admin.halaman_index', compact('halamans'));
    }

    public function create()
    {
        return view('admin.halaman_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('halaman', 'public');
        }

        Halaman::create($data);

        return redirect()->route('admin.halaman.index')->with('success', 'Halaman berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $halaman = Halaman::findOrFail($id);
        return view('admin.halaman_edit_umum', compact('halaman'));
    }

    public function update(Request $request, $id)
    {
        $halaman = Halaman::findOrFail($id);
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            if ($halaman->gambar) {
                Storage::delete('public/' . $halaman->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('halaman', 'public');
        }

        $halaman->update($data);

        return redirect()->route('admin.halaman.index')->with('success', 'Halaman berhasil diubah!');
    }

    public function destroy($id)
    {
        Halaman::findOrFail($id)->delete();
        return redirect()->route('admin.halaman.index')->with('success', 'Halaman berhasil dihapus!');
    }
}