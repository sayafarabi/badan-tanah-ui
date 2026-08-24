@extends('layouts.admin')

@section('title', 'Berita')

@section('content')
<!-- Header Judul -->
<div class="flex justify-between items-center mb-8">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Berita</h1>
        <p class="text-sm text-gray-500 mt-1">Kelola dan atur berita yang ditampilkan di website.</p>
    </div>
    <a href="{{ route('admin.berita.create') }}" class="bg-[#006400] hover:bg-[#005500] text-white px-5 py-2.5 rounded font-semibold text-sm">+ Tambah Berita</a>
</div>

<!-- Filter Bar -->
<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 mb-6 flex gap-4 items-center">
    <div class="relative flex-1">
        <span class="absolute left-3 top-2.5 text-gray-400"><i class="fas fa-search"></i></span>
        <input type="text" placeholder="Cari berita..." class="w-full border-gray-200 rounded-lg pl-10 pr-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#006400]">
    </div>
    <select class="border-gray-200 rounded-lg py-2 px-3 text-sm">
        <option>Semua Kategori</option>
        <option>Berita</option>
        <option>Siaran Pers</option>
        <option>Pengumuman</option>
    </select>
    <select class="border-gray-200 rounded-lg py-2 px-3 text-sm">
        <option>Semua Status</option>
        <option>Terbit</option>
        <option>Draft</option>
        <option>Menunggu</option>
    </select>
    <button class="border border-gray-200 rounded-lg py-2 px-4 text-sm font-medium flex items-center gap-2"><i class="fas fa-filter"></i> Filter</button>
</div>

<!-- Tabel Berita -->
<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    <table class="w-full text-left text-sm">
        <thead class="bg-gray-50 border-b border-gray-200">
            <tr>
                <th class="px-6 py-4 font-semibold text-gray-600">Judul Berita</th>
                <th class="px-6 py-4 font-semibold text-gray-600">Kategori</th>
                <th class="px-6 py-4 font-semibold text-gray-600">Tanggal</th>
                <th class="px-6 py-4 font-semibold text-gray-600">Status</th>
                <th class="px-6 py-4 font-semibold text-gray-600">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @foreach ($berita as $item)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4">
                    <div class="flex items-center gap-3">
                        @if ($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}" class="w-10 h-10 rounded object-cover">
                        @else
                            <img src="https://picsum.photos/50/50?random={{ $loop->index }}" class="w-10 h-10 rounded object-cover">
                        @endif
                        <span class="font-medium text-gray-900">{{ $item->judul }}</span>
                    </div>
                </td>
                <td class="px-6 py-4"><span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs font-bold">{{ $item->kategori }}</span></td>
                <td class="px-6 py-4 text-gray-500">{{ $item->tanggal_publikasi ? \Carbon\Carbon::parse($item->tanggal_publikasi)->format('d M Y') : 'Tanggal belum diatur' }}</td>
                <td class="px-6 py-4"><span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs font-bold">{{ $item->status }}</span></td>
                <td class="px-6 py-4">
                    <div class="flex items-center gap-2 text-gray-500">
                        <a href="{{ route('admin.berita.edit', $item->id) }}" class="hover:text-[#006400]"><i class="fas fa-pen"></i></a>
                        <form action="{{ route('admin.berita.destroy', $item->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="hover:text-red-600"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <!-- Pagination -->
    <div class="p-4 border-t border-gray-200 flex justify-between items-center">
        <p class="text-xs text-gray-500">Menampilkan 1 - {{ $berita->count() }} dari {{ $berita->count() }} berita</p>
        <div class="flex gap-2">
            <a href="#" class="px-3 py-1 border rounded text-sm">1</a>
            <a href="#" class="px-3 py-1 border rounded text-sm bg-[#006400] text-white">2</a>
            <a href="#" class="px-3 py-1 border rounded text-sm">3</a>
        </div>
    </div>
</div>
@endsection