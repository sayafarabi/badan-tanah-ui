<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BeritaAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $berita = Berita::latest()->get();
        return view('admin.berita_index', compact('berita'));
    }

    /**
     * Halaman khusus Siaran Pers
     */
    public function siaranPers()
    {
        $berita = Berita::where('kategori', 'Siaran Pers')->latest()->get();
        return view('admin.berita_index', compact('berita'));
    }

    /**
     * Halaman khusus Pengumuman
     */
    public function pengumuman()
    {
        $berita = Berita::where('kategori', 'Pengumuman')->latest()->get();
        return view('admin.berita_index', compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->role == 'publisher') {
            abort(403, 'Publisher tidak memiliki akses untuk membuat konten.');
        }
        return view('admin.berita_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->role == 'publisher') {
            abort(403, 'Publisher tidak memiliki akses untuk membuat konten.');
        }

        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'kategori' => 'required|string',
            'status' => 'required|string',
        ], [
            'judul.required' => 'Judul tidak boleh kosong!',
            'konten.required' => 'Konten tidak boleh kosong!',
            'kategori.required' => 'Kategori tidak boleh kosong!',
            'status.required' => 'Status tidak boleh kosong!',
        ]);

        if (!in_array(auth()->user()->role, ['super_admin', 'admin', 'editor'])) {
            abort(403, 'Anda tidak memiliki akses untuk membuat berita.');
        }

        $slug = Str::slug($request->judul);
        $originalSlug = $slug;
        $count = 1;
        while (Berita::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $ringkasan = $request->ringkasan ?: Str::limit(strip_tags($request->konten), 150, '...');

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('berita', 'public');
        }

        $statusApproval = 'Draft';
        $status = $request->status;

        if (auth()->user()->role == 'editor') {
            $statusApproval = 'Draft';
            $status = 'Draft';
        }

        if (in_array(auth()->user()->role, ['super_admin', 'admin']) && $request->status == 'Terbit') {
            $statusApproval = 'Dipublikasikan';
            $status = 'Dipublikasikan';
        }

        if (in_array(auth()->user()->role, ['super_admin', 'admin']) && $request->status == 'Menunggu Approval') {
            $statusApproval = 'Menunggu Approval';
            $status = 'Menunggu Approval';
        }

        $berita = Berita::create([
            'judul' => $request->judul,
            'slug' => $slug,
            'ringkasan' => $ringkasan,
            'konten' => $request->konten,
            'kategori' => $request->kategori,
            'penulis' => auth()->user()->name,
            'views' => 0,
            'status' => $status,
            'status_approval' => $statusApproval,
            'gambar' => $gambarPath,
            'tanggal_publikasi' => $request->tanggal_publikasi ?: null,
        ]);

        // Tambahkan riwayat awal
        $berita->addApprovalHistory('created', 'Berita dibuat');

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);

        $role = auth()->user()->role;
        $canEdit = false;

        if (in_array($role, ['super_admin', 'admin'])) {
            $canEdit = true;
        } elseif ($role == 'publisher') {
            $canEdit = true;
        } elseif ($role == 'editor' && $berita->penulis == auth()->user()->name) {
            $canEdit = true;
        }

        if (!$canEdit) {
            abort(403, 'Anda tidak memiliki akses untuk mengedit berita ini.');
        }

        return view('admin.berita_edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $role = auth()->user()->role;
        $canEdit = false;

        if (in_array($role, ['super_admin', 'admin'])) {
            $canEdit = true;
        } elseif ($role == 'publisher') {
            $canEdit = true;
        } elseif ($role == 'editor' && $berita->penulis == auth()->user()->name) {
            $canEdit = true;
        }

        if (!$canEdit) {
            abort(403, 'Anda tidak memiliki akses untuk mengedit berita ini.');
        }

        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'kategori' => 'required|string',
        ]);

        $data = [
            'judul' => $request->judul,
            'konten' => $request->konten,
            'kategori' => $request->kategori,
            'ringkasan' => $request->ringkasan ?: Str::limit(strip_tags($request->konten), 150, '...'),
        ];

        if ($request->hasFile('gambar')) {
            if ($berita->gambar) {
                Storage::disk('public')->delete($berita->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        if ($role == 'editor') {
            if ($request->status == 'Menunggu Approval') {
                $data['status'] = 'Menunggu Approval';
                $data['status_approval'] = 'Menunggu Approval';
                $berita->addApprovalHistory('submit', 'Berita disubmit untuk approval');
            } else {
                $data['status'] = 'Draft';
                $data['status_approval'] = 'Draft';
            }
        } elseif ($role == 'publisher') {
            if ($request->status == 'Terbit') {
                $data['status'] = 'Dipublikasikan';
                $data['status_approval'] = 'Dipublikasikan';
                $data['tanggal_publikasi'] = now();
                $berita->addApprovalHistory('publish', 'Berita dipublikasikan oleh Publisher');
            } else {
                $data['status'] = 'Draft';
                $data['status_approval'] = 'Draft';
            }
        } elseif (in_array($role, ['super_admin', 'admin'])) {
            if ($request->status == 'Terbit') {
                $data['status'] = 'Dipublikasikan';
                $data['status_approval'] = 'Dipublikasikan';
                $data['tanggal_publikasi'] = now();
                $berita->addApprovalHistory('publish', 'Berita dipublikasikan oleh Admin');
            } elseif ($request->status == 'Menunggu Approval') {
                $data['status'] = 'Menunggu Approval';
                $data['status_approval'] = 'Menunggu Approval';
                $berita->addApprovalHistory('submit', 'Berita disubmit untuk approval oleh Admin');
            } else {
                $data['status'] = 'Draft';
                $data['status_approval'] = 'Draft';
            }
        }

        if ($berita->judul != $request->judul) {
            $slug = Str::slug($request->judul);
            $originalSlug = $slug;
            $count = 1;
            while (Berita::where('slug', $slug)->where('id', '!=', $id)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }
            $data['slug'] = $slug;
        }

        $berita->update($data);
        $berita->addApprovalHistory('updated', 'Konten berita diperbarui');

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        if (!in_array(auth()->user()->role, ['super_admin', 'admin'])) {
            abort(403, 'Anda tidak memiliki akses untuk menghapus.');
        }

        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus!');
    }

    // =========================================================
    // APPROVAL WORKFLOW METHODS
    // =========================================================

    /**
     * Submit berita untuk approval (Editor → Publisher)
     */
    public function submit($id)
    {
        $berita = Berita::findOrFail($id);

        if (auth()->user()->role == 'publisher') {
            abort(403, 'Publisher tidak dapat melakukan submit.');
        }

        if (in_array(auth()->user()->role, ['editor', 'admin', 'super_admin'])) {
            if ($berita->status == 'Dipublikasikan') {
                return redirect()->route('admin.berita.index')->with('error', 'Berita sudah dipublikasikan, tidak bisa disubmit.');
            }

            if ($berita->status_approval == 'Menunggu Approval') {
                return redirect()->route('admin.berita.index')->with('error', 'Berita sudah dalam status Menunggu Approval.');
            }

            $berita->status = 'Menunggu Approval';
            $berita->status_approval = 'Menunggu Approval';
            $berita->addApprovalHistory('submit', 'Berita disubmit untuk approval');
            $berita->save();

            return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil disubmit! Menunggu approval Publisher.');
        }

        abort(403, 'Anda tidak memiliki akses untuk submit.');
    }

    /**
     * Approve berita (Publisher → Approved)
     */
    public function approve($id)
    {
        $berita = Berita::findOrFail($id);

        if (!in_array(auth()->user()->role, ['publisher', 'admin', 'super_admin'])) {
            abort(403, 'Anda tidak memiliki akses untuk approve.');
        }

        if ($berita->status == 'Dipublikasikan') {
            return redirect()->route('admin.berita.index')->with('error', 'Berita sudah dipublikasikan.');
        }

        if ($berita->status_approval == 'Disetujui') {
            return redirect()->route('admin.berita.index')->with('error', 'Berita sudah disetujui sebelumnya.');
        }

        $berita->status_approval = 'Disetujui';
        $berita->addApprovalHistory('approve', 'Berita disetujui');
        $berita->save();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil disetujui! Siap untuk dipublikasikan.');
    }

    /**
     * Publish berita (Publisher/Admin → Published)
     */
    public function publish($id)
    {
        $berita = Berita::findOrFail($id);

        if (!in_array(auth()->user()->role, ['publisher', 'admin', 'super_admin'])) {
            abort(403, 'Anda tidak memiliki akses untuk publish.');
        }

        // Jika berita dalam status Arsip, publish ulang
        if ($berita->status == 'Arsip') {
            $berita->status = 'Dipublikasikan';
            $berita->status_approval = 'Dipublikasikan';
            $berita->tanggal_publikasi = now();
            $berita->addApprovalHistory('publish', 'Berita dipublikasikan kembali (restore dari arsip)');
            $berita->save();
            return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dipublikasikan kembali!');
        }

        if ($berita->status == 'Dipublikasikan') {
            return redirect()->route('admin.berita.index')->with('error', 'Berita sudah dipublikasikan.');
        }

        if ($berita->status_approval != 'Disetujui' && !in_array(auth()->user()->role, ['admin', 'super_admin'])) {
            return redirect()->route('admin.berita.index')->with('error', 'Berita harus disetujui terlebih dahulu sebelum dipublikasikan.');
        }

        $berita->status = 'Dipublikasikan';
        $berita->status_approval = 'Dipublikasikan';
        $berita->tanggal_publikasi = now();
        $berita->addApprovalHistory('publish', 'Berita dipublikasikan');
        $berita->save();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dipublikasikan!');
    }

    /**
     * Unpublish / Arsipkan berita (Publisher/Admin → Archived)
     */
    public function unpublish($id)
    {
        $berita = Berita::findOrFail($id);

        if (!in_array(auth()->user()->role, ['publisher', 'admin', 'super_admin'])) {
            abort(403, 'Anda tidak memiliki akses untuk unpublish.');
        }

        if ($berita->status != 'Dipublikasikan') {
            return redirect()->route('admin.berita.index')->with('error', 'Berita belum dipublikasikan.');
        }

        $berita->status = 'Arsip';
        $berita->status_approval = 'Arsip';
        $berita->addApprovalHistory('unpublish', 'Berita diarsipkan');
        $berita->save();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diarsipkan!');
    }
}