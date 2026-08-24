@extends('layouts.admin')

@section('title', 'Tambah Lowongan')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Tambah Lowongan</h1>
        <a href="{{ route('admin.karier.index') }}" class="text-sm text-gray-600 hover:text-[#006400]">Kembali ke Daftar</a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <form action="{{ route('admin.karier.store') }}" method="POST" class="space-y-4">
            @csrf
            
            <div>
                <label class="block text-sm font-semibold mb-1">Judul <span class="text-red-500">*</span></label>
                <input type="text" name="judul" class="w-full border-gray-300 rounded-lg p-3 text-sm focus:ring-[#006400]" required>
            </div>
            
            <div>
                <label class="block text-sm font-semibold mb-1">Deskripsi <span class="text-red-500">*</span></label>
                <textarea name="deskripsi" rows="6" class="w-full border-gray-300 rounded-lg p-3 text-sm focus:ring-[#006400]" required></textarea>
            </div>
            
            <div>
                <label class="block text-sm font-semibold mb-1">Kualifikasi <span class="text-red-500">*</span></label>
                <textarea name="kualifikasi" rows="4" class="w-full border-gray-300 rounded-lg p-3 text-sm focus:ring-[#006400]" required></textarea>
            </div>
            
            <div>
                <label class="block text-sm font-semibold mb-1">Lokasi <span class="text-red-500">*</span></label>
                <input type="text" name="lokasi" class="w-full border-gray-300 rounded-lg p-3 text-sm focus:ring-[#006400]" required>
            </div>
            
            <div>
                <label class="block text-sm font-semibold mb-1">Status <span class="text-red-500">*</span></label>
                <select name="status" class="w-full border-gray-300 rounded-lg p-3 text-sm focus:ring-[#006400]" required>
                    <option value="Buka">Buka</option>
                    <option value="Tutup">Tutup</option>
                </select>
            </div>
            
            <div class="mt-6">
                <button type="submit" class="bg-[#006400] hover:bg-[#005500] text-white px-5 py-2.5 rounded font-bold text-sm">Simpan Lowongan</button>
            </div>
        </form>
    </div>
</div>
@endsection