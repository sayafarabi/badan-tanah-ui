@extends('layouts.admin')

@section('title', 'Tambah FAQ')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Tambah FAQ</h1>
        <a href="{{ route('admin.faq.index') }}" class="text-sm text-gray-600 hover:text-[#006400]">Kembali ke Daftar</a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <form action="{{ route('admin.faq.store') }}" method="POST" class="space-y-4">
            @csrf
            
            <div>
                <label class="block text-sm font-semibold mb-1">Pertanyaan <span class="text-red-500">*</span></label>
                <input type="text" name="pertanyaan" class="w-full border-gray-300 rounded-lg p-3 text-sm focus:ring-[#006400]" required>
            </div>
            
            <div>
                <label class="block text-sm font-semibold mb-1">Jawaban <span class="text-red-500">*</span></label>
                <textarea name="jawaban" rows="6" class="w-full border-gray-300 rounded-lg p-3 text-sm focus:ring-[#006400]" required></textarea>
            </div>
            
            <div class="mt-6">
                <button type="submit" class="bg-[#006400] hover:bg-[#005500] text-white px-5 py-2.5 rounded font-bold text-sm">Simpan FAQ</button>
            </div>
        </form>
    </div>
</div>
@endsection