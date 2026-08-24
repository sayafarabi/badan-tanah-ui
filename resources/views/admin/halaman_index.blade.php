@extends('layouts.admin')

@section('title', 'Halaman Statis')

@section('content')
<div class="flex justify-between items-center mb-8">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Halaman Statis</h1>
        <p class="text-sm text-gray-500 mt-1">Kelola halaman statis selain Tentang dan Pemanfaatan.</p>
    </div>
    <a href="{{ route('admin.halaman.create') }}" class="bg-[#006400] hover:bg-[#005500] text-white px-5 py-2.5 rounded font-semibold text-sm">+ Tambah Halaman</a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    <table class="w-full text-left text-sm">
        <thead class="bg-gray-50 border-b-2 border-gray-300">
            <tr>
                <th class="px-6 py-3 font-semibold text-gray-600">Judul</th>
                <th class="px-6 py-3 font-semibold text-gray-600">Gambar</th>
                <th class="px-6 py-3 font-semibold text-gray-600">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y-2 divide-gray-200">
            @foreach ($halamans as $halaman)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 font-medium">{{ $halaman->judul }}</td>
                <td class="px-6 py-4">
                    @if ($halaman->gambar)
                        <img src="{{ asset('storage/' . $halaman->gambar) }}" class="w-16 h-12 object-cover rounded">
                    @else
                        <span class="text-gray-400">Tidak ada</span>
                    @endif
                </td>
                <td class="px-6 py-4">
                    <div class="flex gap-2">
                        <a href="{{ route('admin.halaman.edit', $halaman->id) }}" class="text-blue-600 hover:underline text-sm font-bold">Edit</a>
                        <form action="{{ route('admin.halaman.destroy', $halaman->id) }}" method="POST" class="inline">
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