@extends('layouts.admin')

@section('title', 'Daftar Kontak')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Daftar Kontak</h1>
            <p class="text-sm text-gray-500 mt-1">Manajemen pesan yang masuk dari pengunjung.</p>
        </div>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <table class="w-full text-left text-sm">
            <thead class="bg-gray-50 border-b-2 border-gray-300">
                <tr>
                    <th class="px-6 py-3 font-semibold text-gray-600">Nama</th>
                    <th class="px-6 py-3 font-semibold text-gray-600">Email</th>
                    <th class="px-6 py-3 font-semibold text-gray-600">Telepon</th>
                    <th class="px-6 py-3 font-semibold text-gray-600">Status</th>
                    <th class="px-6 py-3 font-semibold text-gray-600">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y-2 divide-gray-200">
                @foreach ($kontaks as $kontak)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium">{{ $kontak->nama }}</td>
                    <td class="px-6 py-4">{{ $kontak->email }}</td>
                    <td class="px-6 py-4">{{ $kontak->telepon }}</td>
                    <td class="px-6 py-4">
                        @if ($kontak->is_read == 1)
                            <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs font-bold">Dibaca</span>
                        @else
                            <span class="bg-orange-100 text-orange-700 px-2 py-1 rounded text-xs font-bold">Belum Dibaca</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex gap-2">
                            <a href="{{ route('admin.kontak.show', $kontak->id) }}" class="text-blue-600 hover:underline text-sm font-bold">Lihat Detail</a>
                            <form action="{{ route('admin.kontak.destroy', $kontak->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline text-sm font-bold">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection