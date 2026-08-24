@extends('layouts.admin')

@section('title', 'Daftar Lowongan')

@section('content')
<div class="flex justify-between items-center mb-8">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Daftar Lowongan</h1>
        <p class="text-sm text-gray-500 mt-1">Kelola informasi lowongan kerja.</p>
    </div>
    <a href="{{ route('admin.karier.create') }}" class="bg-[#006400] hover:bg-[#005500] text-white px-5 py-2.5 rounded font-semibold text-sm">+ Tambah Lowongan</a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    <table class="w-full text-left text-sm">
        <thead class="bg-gray-50 border-b-2 border-gray-300">
            <tr>
                <th class="px-6 py-3 font-semibold text-gray-600">Judul</th>
                <th class="px-6 py-3 font-semibold text-gray-600">Lokasi</th>
                <th class="px-6 py-3 font-semibold text-gray-600">Status</th>
                <th class="px-6 py-3 font-semibold text-gray-600">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y-2 divide-gray-200">
            @foreach ($kariers as $karier)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 font-medium">{{ $karier->judul }}</td>
                <td class="px-6 py-4">{{ $karier->lokasi }}</td>
                <td class="px-6 py-4">
                    <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs font-bold">{{ $karier->status }}</span>
                </td>
                <td class="px-6 py-4">
                    <div class="flex gap-2">
                        <a href="{{ route('admin.karier.edit', $karier->id) }}" class="text-blue-600 hover:underline text-sm font-bold">Edit</a>
                        <form action="{{ route('admin.karier.destroy', $karier->id) }}" method="POST" class="inline">
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
@endsection