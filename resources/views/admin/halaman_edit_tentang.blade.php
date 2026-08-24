@extends('layouts.admin')

@section('title', 'Edit Halaman Tentang')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-900">Edit Halaman Tentang</h1>
    <a href="{{ route('about') }}" class="text-sm text-gray-600 hover:text-[#006400]"><i class="fas fa-external-link-alt mr-1"></i> Lihat Halaman</a>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- KOLOM KIRI (Form Utama) -->
    <div class="lg:col-span-2">
        <form action="{{ route('admin.halaman.update.tentang') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            @csrf
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold mb-1">Judul Halaman <span class="text-red-500">*</span></label>
                    <input type="text" name="judul" value="{{ $halaman->judul }}" class="w-full border-gray-300 rounded-lg p-3 text-sm focus:ring-[#006400]">
                </div>
                
                <div>
                    <label class="block text-sm font-semibold mb-1">Isi Halaman <span class="text-red-500">*</span></label>
                    <textarea rows="10" name="isi" class="w-full border-gray-300 rounded-lg p-3 text-sm">{{ $halaman->isi }}</textarea>
                </div>
            </div>
            
            <div class="mt-6">
                <button type="submit" class="bg-[#006400] hover:bg-[#005500] text-white px-5 py-2.5 rounded font-bold text-sm">Simpan Halaman</button>
            </div>
        </form>
    </div>

    <!-- KOLOM KANAN (Gambar) -->
    <div class="space-y-6">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h2 class="font-bold text-lg mb-4">Gambar Halaman</h2>
            
            <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center mb-4">
                <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-2"></i>
                <p class="text-sm font-medium text-gray-600">Drag & drop gambar atau klik untuk upload</p>
                <p class="text-xs text-gray-400 mt-1">Format: JPG, PNG (Max 2MB)</p>
            </div>

            @if ($halaman->gambar)
                <div class="mt-4">
                    <p class="text-xs text-gray-500 mb-2">Gambar lama:</p>
                    <img src="{{ asset('storage/' . $halaman->gambar) }}" class="w-full h-32 object-cover rounded-lg border border-gray-200">
                </div>
            @endif
        </div>
    </div>
</div>
@endsection