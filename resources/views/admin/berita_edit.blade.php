@extends('layouts.admin')

@section('title', 'Edit Berita')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-900">Edit Berita</h1>
    <div class="flex gap-3">
        <button class="border border-gray-300 rounded px-4 py-2 text-sm font-medium">Simpan Draft</button>
        <button class="border border-gray-300 rounded px-4 py-2 text-sm font-medium">Pratinjau</button>
        <button class="bg-[#006400] hover:bg-[#005500] text-white rounded px-5 py-2 text-sm font-bold">Terbitkan</button>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- KOLOM KIRI (Form Utama) -->
    <div class="lg:col-span-2 space-y-6">
        <!-- Informasi Dasar -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h2 class="font-bold text-lg mb-4">Informasi Dasar</h2>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold mb-1">Judul Berita <span class="text-red-500">*</span></label>
                    <input type="text" name="judul" value="{{ $berita->judul }}" class="w-full border-gray-300 rounded-lg p-3 text-sm focus:ring-[#006400]">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Ringkasan / Lead</label>
                    <textarea rows="3" name="ringkasan" class="w-full border-gray-300 rounded-lg p-3 text-sm">{{ $berita->ringkasan }}</textarea>
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold mb-1">Kategori</label>
                        <select name="kategori" class="w-full border-gray-300 rounded-lg p-3 text-sm">
                            <option value="Berita" {{ $berita->kategori == 'Berita' ? 'selected' : '' }}>Berita</option>
                            <option value="Siaran Pers" {{ $berita->kategori == 'Siaran Pers' ? 'selected' : '' }}>Siaran Pers</option>
                            <option value="Pengumuman" {{ $berita->kategori == 'Pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1">Tanggal Publikasi</label>
                        <input type="date" name="tanggal_publikasi" value="{{ $berita->tanggal_publikasi ? date('Y-m-d', strtotime($berita->tanggal_publikasi)) : '' }}" class="w-full border-gray-300 rounded-lg p-3 text-sm">
                    </div>
                </div>
            </div>
        </div>

        <!-- Konten Berita -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h2 class="font-bold text-lg mb-4">Konten Berita</h2>
            
            <!-- Gambar Utama -->
            <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center mb-6">
                <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-2"></i>
                <p class="text-sm font-medium text-gray-600">Drag & drop gambar atau klik untuk upload</p>
                <p class="text-xs text-gray-400 mt-1">Rekomendasi ukuran: 1200 x 675 px (16:9) | Format: JPG, PNG (Max 2MB)</p>
            </div>

            <!-- Editor Teks -->
            <div class="border border-gray-300 rounded-lg">
                <div class="bg-gray-50 border-b border-gray-200 p-2 flex gap-3 text-gray-600">
                    <button class="hover:text-black"><i class="fas fa-bold"></i></button>
                    <button class="hover:text-black"><i class="fas fa-italic"></i></button>
                    <button class="hover:text-black"><i class="fas fa-underline"></i></button>
                    <button class="hover:text-black"><i class="fas fa-list-ul"></i></button>
                    <button class="hover:text-black"><i class="fas fa-link"></i></button>
                    <button class="hover:text-black"><i class="fas fa-image"></i></button>
                </div>
                <textarea rows="10" name="konten" class="w-full p-4 text-sm border-none focus:ring-0">{{ $berita->konten }}</textarea>
            </div>
            <p class="text-right text-xs text-gray-400 mt-2">0 WORDS - POWERED BY TINYMCE</p>
        </div>

        <!-- SEO -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h2 class="font-bold text-lg mb-4">SEO (Opsional)</h2>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold mb-1">Meta Title</label>
                    <input type="text" placeholder="Masukkan meta title" class="w-full border-gray-300 rounded-lg p-3 text-sm">
                    <p class="text-right text-xs text-gray-400 mt-1">0/60</p>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Meta Description</label>
                    <input type="text" placeholder="Masukkan meta description" class="w-full border-gray-300 rounded-lg p-3 text-sm">
                    <p class="text-right text-xs text-gray-400 mt-1">0/160</p>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">URL Slug</label>
                    <input type="text" placeholder="/berita/..." class="w-full border-gray-300 rounded-lg p-3 text-sm">
                </div>
            </div>
        </div>
    </div>

    <!-- KOLOM KANAN (Sidebar Pengaturan) -->
    <div class="space-y-6">
        <!-- Status & Akses -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h2 class="font-bold text-lg mb-4">Status & Akses</h2>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold mb-1">Status</label>
                    <select name="status" class="w-full border-gray-300 rounded-lg p-3 text-sm">
                        <option value="Draft" {{ $berita->status == 'Draft' ? 'selected' : '' }}>Draft</option>
                        <option value="Dipublikasikan" {{ $berita->status == 'Dipublikasikan' ? 'selected' : '' }}>Terbit</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Penulis</label>
                    <input type="text" value="Administrator" class="w-full border-gray-300 rounded-lg p-3 text-sm" readonly>
                </div>
            </div>
        </div>

        <!-- Riwayat -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h2 class="font-bold text-lg mb-4">Riwayat Approval</h2>
            <div class="space-y-3 text-sm">
                <div class="flex gap-3">
                    <div class="w-8 h-8 rounded-full bg-green-100 text-green-600 flex items-center justify-center"><i class="fas fa-check"></i></div>
                    <div>
                        <p class="font-medium">Dibuat oleh</p>
                        <p class="text-gray-500">Administrator</p>
                    </div>
                </div>
                <div class="flex gap-3">
                    <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center"><i class="fas fa-clock"></i></div>
                    <div>
                        <p class="font-medium">Menunggu Review</p>
                        <p class="text-gray-500">Publisher</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection