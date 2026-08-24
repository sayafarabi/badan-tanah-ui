@extends('layouts.admin')

@section('title', 'Edit Lowongan')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Edit Lowongan</h1>
        <a href="{{ route('admin.karier.index') }}" class="text-sm text-gray-600 hover:text-[#006400]">Kembali ke Daftar</a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <form action="{{ route('admin.karier.update', $karier->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            
            <div>
                <label class="block text-sm font-semibold mb-1">Judul <span class="text-red-500">*</span></label>
                <input type="text" name="judul" value="{{ $karier->judul }}" class="w-full border-gray-300 rounded-lg p-3 text-sm focus:ring-[#006400]" required>
            </div>
            
            <div>
                <label class="block text-sm font-semibold mb-1">Deskripsi <span class="text-red-500">*</span></label>
                <textarea name="deskripsi" rows="6" class="w-full border-gray-300 rounded-lg p-3 text-sm focus:ring-[#006400]" required>{{ $karier->deskripsi }}</textarea>
            </div>
            
            <div>
                <label class="block text-sm font-semibold mb-1">Kualifikasi <span class="text-red-500">*</span></label>
                <textarea name="kualifikasi" rows="4" class="w-full border-gray-300 rounded-lg p-3 text-sm focus:ring-[#006400]" required>{{ $karier->kualifikasi }}</textarea>
            </div>
            
            <div>
                <label class="block text-sm font-semibold mb-1">Lokasi <span class="text-red-500">*</span></label>
                <input type="text" name="lokasi" value="{{ $karier->lokasi }}" class="w-full border-gray-300 rounded-lg p-3 text-sm focus:ring-[#006400]" required>
            </div>
            
            <div>
                <label class="block text-sm font-semibold mb-1">Status <span class="text-red-500">*</span></label>
                <select name="status" class="w-full border-gray-300 rounded-lg p-3 text-sm focus:ring-[#006400]" required>
                    <option value="Buka" {{ $karier->status == 'Buka' ? 'selected' : '' }}>Buka</option>
                    <option value="Tutup" {{ $karier->status == 'Tutup' ? 'selected' : '' }}>Tutup</option>
                </select>
            </div>
            
            <div class="mt-6">
                <button type="submit" class="bg-[#006400] hover:bg-[#005500] text-white px-5 py-2.5 rounded font-bold text-sm">Update Lowongan</button>
            </div>
        </form>
    </div>
</div>
@endsection