@extends('layouts.admin')

@section('title', 'Detail Kontak')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Detail Pesan</h1>
        <a href="{{ route('admin.kontak.index') }}" class="text-sm text-gray-600 hover:text-[#006400]">Kembali ke Daftar</a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <p class="text-sm font-semibold text-gray-500">Nama</p>
                <p class="text-lg font-bold text-gray-900">{{ $kontak->nama }}</p>
            </div>
            <div>
                <p class="text-sm font-semibold text-gray-500">Email</p>
                <p class="text-lg font-bold text-gray-900">{{ $kontak->email }}</p>
            </div>
            <div>
                <p class="text-sm font-semibold text-gray-500">Telepon</p>
                <p class="text-lg font-bold text-gray-900">{{ $kontak->telepon }}</p>
            </div>
            <div>
                <p class="text-sm font-semibold text-gray-500">Status</p>
                <p class="text-lg font-bold">
                    <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs font-bold">Dibaca</span>
                </p>
            </div>
        </div>

        <div class="border-t border-gray-200 pt-6">
            <p class="text-sm font-semibold text-gray-500 mb-2">Pesan</p>
            <p class="text-gray-700 leading-relaxed bg-gray-50 p-4 rounded-lg">{{ $kontak->pesan }}</p>
        </div>
    </div>
</div>
@endsection