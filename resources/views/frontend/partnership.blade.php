@extends('layouts.frontend')

@section('title', $halaman->judul)

@section('content')
<div class="bg-[#0B2A4A] py-20">
    <div class="max-w-7xl mx-auto px-4">
        <h1 class="text-4xl font-bold text-white">{{ $halaman->judul }}</h1>
        <div class="h-1 w-20 bg-blue-500 mt-4"></div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 py-16">
    <div class="bg-white p-10 rounded-xl shadow-sm border border-gray-200">
        @if ($halaman->gambar)
            <img src="{{ asset('storage/' . $halaman->gambar) }}" class="w-full h-[400px] object-cover rounded-xl mb-8" alt="">
        @endif
        <p class="text-gray-600 leading-relaxed text-lg">{{ $halaman->isi }}</p>
    </div>
</div>
@endsection