@extends('layouts.frontend')

@section('title', $berita->judul)

@section('content')
<div class="bg-[#0B2A4A] py-20">
    <div class="max-w-7xl mx-auto px-4">
        <h1 class="text-4xl font-bold text-white">{{ $berita->judul }}</h1>
        <p class="text-blue-200 mt-3">
            {{ $berita->tanggal_publikasi ? \Carbon\Carbon::parse($berita->tanggal_publikasi)->format('d M Y') : 'Tanggal belum diatur' }}
            | 
            <span>
                <svg class="w-4 h-4 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                {{ number_format($berita->views, 0, ',', '.') }} Dilihat
            </span>
        </p>
        <div class="h-1 w-20 bg-blue-500 mt-4"></div>
    </div>
</div>

<div class="max-w-4xl mx-auto px-4 py-16">
    <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
        <div class="mb-8">
            @if ($berita->gambar)
                <img src="{{ asset('storage/' . $berita->gambar) }}" class="w-full h-[400px] object-cover rounded-xl" alt="">
            @else
                <img src="https://picsum.photos/1000/500?random=1" class="w-full h-[400px] object-cover rounded-xl" alt="">
            @endif
        </div>
        <div class="prose prose-lg max-w-none">
            <p>{{ $berita->konten }}</p>
        </div>
    </div>
</div>
@endsection