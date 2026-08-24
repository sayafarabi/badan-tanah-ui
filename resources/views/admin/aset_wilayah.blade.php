@extends('layouts.admin')

@section('title', 'Wilayah')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex items-start gap-4 mb-6">
        <div class="w-14 h-14 bg-green-100 text-[#006400] rounded-full flex items-center justify-center">
            <i class="fas fa-map text-2xl"></i>
        </div>
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Wilayah</h1>
            <p class="text-sm text-gray-500 mt-1">Kelola data wilayah aset tanah.</p>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <p class="text-gray-600">Halaman ini akan menampilkan data wilayah berdasarkan provinsi dan kabupaten.</p>
    </div>
</div>
@endsection