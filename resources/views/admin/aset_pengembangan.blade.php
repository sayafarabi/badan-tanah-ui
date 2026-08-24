@extends('layouts.admin')

@section('title', 'Pengembangan Tanah')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex items-start gap-4 mb-6">
        <div class="w-14 h-14 bg-green-100 text-[#006400] rounded-full flex items-center justify-center">
            <i class="fas fa-chart-line text-2xl"></i>
        </div>
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Pengembangan Tanah</h1>
            <p class="text-sm text-gray-500 mt-1">Kelola rencana pengembangan tanah.</p>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <p class="text-gray-600">Halaman ini akan menampilkan data pengembangan tanah.</p>
    </div>
</div>
@endsection