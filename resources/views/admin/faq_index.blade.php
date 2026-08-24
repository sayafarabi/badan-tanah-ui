@extends('layouts.admin')

@section('title', 'Daftar FAQ')

@section('content')
<div class="flex justify-between items-center mb-8">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Daftar FAQ</h1>
        <p class="text-sm text-gray-500 mt-1">Kelola pertanyaan yang sering diajukan.</p>
    </div>
    <a href="{{ route('admin.faq.create') }}" class="bg-[#006400] hover:bg-[#005500] text-white px-5 py-2.5 rounded font-semibold text-sm">+ Tambah FAQ</a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    <table class="w-full text-left text-sm">
        <thead class="bg-gray-50 border-b-2 border-gray-300">
            <tr>
                <th class="px-6 py-3 font-semibold text-gray-600">Pertanyaan</th>
                <th class="px-6 py-3 font-semibold text-gray-600">Jawaban</th>
                <th class="px-6 py-3 font-semibold text-gray-600">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y-2 divide-gray-200">
            @foreach ($faqs as $faq)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 font-medium">{{ $faq->pertanyaan }}</td>
                <td class="px-6 py-4 text-gray-600">{{ Str::limit($faq->jawaban, 50) }}</td>
                <td class="px-6 py-4">
                    <div class="flex gap-2">
                        <a href="{{ route('admin.faq.edit', $faq->id) }}" class="text-blue-600 hover:underline text-sm font-bold">Edit</a>
                        <form action="{{ route('admin.faq.destroy', $faq->id) }}" method="POST" class="inline">
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