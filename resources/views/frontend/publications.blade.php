@extends('layouts.frontend')

@section('title', 'Publikasi')

@section('content')
<div class="bg-[#0B2A4A] py-20">
    <div class="max-w-7xl mx-auto px-4">
        <h1 class="text-4xl font-bold text-white">Publikasi</h1>
        <p class="text-blue-200 mt-3">Berita, Siaran Pers, dan Pengumuman Resmi.</p>
        <div class="h-1 w-20 bg-blue-500 mt-4"></div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 py-16" x-data="{ activeTab: 'berita' }">
    <!-- Tab Kategori (Interaktif) -->
    <div class="flex space-x-8 border-b border-gray-200 mb-10">
        <button @click="activeTab = 'berita'" :class="activeTab === 'berita' ? 'border-[#0B2A4A] text-[#0B2A4A]' : 'border-transparent text-gray-500 hover:text-gray-700'" class="pb-4 border-b-2 font-bold text-sm transition">Berita</button>
        <button @click="activeTab = 'siaran'" :class="activeTab === 'siaran' ? 'border-[#0B2A4A] text-[#0B2A4A]' : 'border-transparent text-gray-500 hover:text-gray-700'" class="pb-4 border-b-2 font-bold text-sm transition">Siaran Pers</button>
        <button @click="activeTab = 'pengumuman'" :class="activeTab === 'pengumuman' ? 'border-[#0B2A4A] text-[#0B2A4A]' : 'border-transparent text-gray-500 hover:text-gray-700'" class="pb-4 border-b-2 font-bold text-sm transition">Pengumuman</button>
    </div>

    <!-- Tab Berita -->
    <div x-show="activeTab === 'berita'" class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach ($berita as $item)
            @if ($item->kategori == 'Berita')
            <div class="group border border-gray-100 rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition bg-white">
                <div class="h-52 bg-gray-200 relative overflow-hidden">
                    @if ($item->gambar)
                        <img src="{{ asset('storage/' . $item->gambar) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    @else
                        <img src="https://picsum.photos/600/400?random={{ $loop->index + 20 }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    @endif
                    <span class="absolute top-4 left-4 bg-[#0B2A4A] text-white text-xs px-3 py-1 rounded font-bold uppercase">{{ $item->kategori }}</span>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-3">
                        <p class="text-xs text-gray-500 font-medium">{{ $item->tanggal_publikasi ? \Carbon\Carbon::parse($item->tanggal_publikasi)->format('d M Y') : 'Tanggal belum diatur' }}</p>
                        <div class="flex items-center gap-1 text-xs text-gray-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            <span class="font-bold">{{ number_format($item->views, 0, ',', '.') }} Dilihat</span>
                        </div>
                    </div>
                    <a href="{{ route('publications.show', $item->id) }}" class="font-bold text-lg text-gray-900 leading-snug mb-4 group-hover:text-[#0B2A4A] transition">{{ $item->judul }}</a>
                    <a href="{{ route('publications.show', $item->id) }}" class="text-sm font-bold text-[#0B2A4A] hover:underline">Baca Selengkapnya</a>
                </div>
            </div>
            @endif
        @endforeach
    </div>

    <!-- Tab Siaran Pers -->
    <div x-show="activeTab === 'siaran'" class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach ($berita as $item)
            @if ($item->kategori == 'Siaran Pers')
            <div class="group border border-gray-100 rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition bg-white">
                <div class="h-52 bg-gray-200 relative overflow-hidden">
                    @if ($item->gambar)
                        <img src="{{ asset('storage/' . $item->gambar) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    @else
                        <img src="https://picsum.photos/600/400?random={{ $loop->index + 20 }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    @endif
                    <span class="absolute top-4 left-4 bg-[#0B2A4A] text-white text-xs px-3 py-1 rounded font-bold uppercase">{{ $item->kategori }}</span>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-3">
                        <p class="text-xs text-gray-500 font-medium">{{ $item->tanggal_publikasi ? \Carbon\Carbon::parse($item->tanggal_publikasi)->format('d M Y') : 'Tanggal belum diatur' }}</p>
                        <div class="flex items-center gap-1 text-xs text-gray-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            <span class="font-bold">{{ number_format($item->views, 0, ',', '.') }} Dilihat</span>
                        </div>
                    </div>
                    <a href="{{ route('publications.show', $item->id) }}" class="font-bold text-lg text-gray-900 leading-snug mb-4 group-hover:text-[#0B2A4A] transition">{{ $item->judul }}</a>
                    <a href="{{ route('publications.show', $item->id) }}" class="text-sm font-bold text-[#0B2A4A] hover:underline">Baca Selengkapnya</a>
                </div>
            </div>
            @endif
        @endforeach
    </div>

    <!-- Tab Pengumuman -->
    <div x-show="activeTab === 'pengumuman'" class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach ($berita as $item)
            @if ($item->kategori == 'Pengumuman')
            <div class="group border border-gray-100 rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition bg-white">
                <div class="h-52 bg-gray-200 relative overflow-hidden">
                    @if ($item->gambar)
                        <img src="{{ asset('storage/' . $item->gambar) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    @else
                        <img src="https://picsum.photos/600/400?random={{ $loop->index + 20 }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    @endif
                    <span class="absolute top-4 left-4 bg-[#0B2A4A] text-white text-xs px-3 py-1 rounded font-bold uppercase">{{ $item->kategori }}</span>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-3">
                        <p class="text-xs text-gray-500 font-medium">{{ $item->tanggal_publikasi ? \Carbon\Carbon::parse($item->tanggal_publikasi)->format('d M Y') : 'Tanggal belum diatur' }}</p>
                        <div class="flex items-center gap-1 text-xs text-gray-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            <span class="font-bold">{{ number_format($item->views, 0, ',', '.') }} Dilihat</span>
                        </div>
                    </div>
                    <a href="{{ route('publications.show', $item->id) }}" class="font-bold text-lg text-gray-900 leading-snug mb-4 group-hover:text-[#0B2A4A] transition">{{ $item->judul }}</a>
                    <a href="{{ route('publications.show', $item->id) }}" class="text-sm font-bold text-[#0B2A4A] hover:underline">Baca Selengkapnya</a>
                </div>
            </div>
            @endif
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-12 flex justify-center">
        <nav class="flex items-center gap-2">
            <a href="#" class="px-4 py-2 border rounded bg-white text-gray-500 hover:bg-gray-50 text-sm font-medium">Previous</a>
            <a href="#" class="px-4 py-2 border rounded bg-[#0B2A4A] text-white text-sm font-bold">1</a>
            <a href="#" class="px-4 py-2 border rounded bg-white hover:bg-gray-50 text-sm font-medium text-gray-700">Next</a>
        </nav>
    </div>
</div>
@endsection