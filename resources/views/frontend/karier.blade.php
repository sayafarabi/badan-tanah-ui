@extends('layouts.frontend')

@section('title', 'Karier')

@section('content')
<div class="bg-[#0B2A4A] py-20">
    <div class="max-w-7xl mx-auto px-4">
        <h1 class="text-4xl font-bold text-white">Karier</h1>
        <p class="text-blue-200 mt-3">Bergabunglah dengan kami untuk membangun negeri.</p>
        <div class="h-1 w-20 bg-blue-500 mt-4"></div>
    </div>
</div>

<div class="max-w-4xl mx-auto px-4 py-16">
    <div class="space-y-6">
        @foreach ($kariers as $karier)
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex justify-between items-start">
                <div>
                    <h3 class="font-bold text-lg">{{ $karier->judul }}</h3>
                    <p class="text-sm text-gray-500 mt-1">{{ $karier->lokasi }}</p>
                </div>
                <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs font-bold">{{ $karier->status }}</span>
            </div>
            <p class="text-gray-600 text-sm mt-4">{{ $karier->deskripsi }}</p>
            <div class="mt-4">
                <h4 class="font-bold text-sm">Kualifikasi:</h4>
                <p class="text-gray-600 text-sm">{{ $karier->kualifikasi }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection