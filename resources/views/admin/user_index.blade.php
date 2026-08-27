@extends('layouts.admin')

@section('title', 'Daftar Pengguna')

@section('content')
<div class="flex justify-between items-center mb-8">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Daftar Pengguna</h1>
        <p class="text-sm text-gray-500 mt-1">Manajemen akun dan akses pengguna ke CMS.</p>
    </div>
    <a href="{{ route('admin.user.create') }}" class="bg-[#006400] hover:bg-[#005500] text-white px-5 py-2.5 rounded font-semibold text-sm">+ Tambah Pengguna</a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    <table class="w-full text-left text-sm">
        <thead class="bg-gray-50 border-b-2 border-gray-300">
            <tr>
                <th class="px-6 py-3 font-semibold text-gray-600">Nama</th>
                <th class="px-6 py-3 font-semibold text-gray-600">Email</th>
                <th class="px-6 py-3 font-semibold text-gray-600">Role</th>
                <th class="px-6 py-3 font-semibold text-gray-600">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y-2 divide-gray-200">
            @foreach ($users as $user)
            <tr class="hover:bg-gray-100 hover:text-gray-900 transition">
                <td class="px-6 py-4">
                    <div class="flex items-center gap-3">
                        @if ($user->foto)
                            <img src="{{ asset('storage/' . $user->foto) }}" class="w-10 h-10 rounded-full object-cover border border-gray-200">
                        @else
                            <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center text-gray-500 font-bold">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
                        @endif
                        <div>
                            <p class="font-medium text-gray-900">{{ $user->name }}</p>
                            <p class="text-xs text-gray-500">{{ $user->role }}</p>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4">{{ $user->email }}</td>
                <td class="px-6 py-4">
                    <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs font-bold">{{ $user->role }}</span>
                </td>
                <td class="px-6 py-4">
                    <div class="flex gap-2">
                        <!-- Form untuk update role (TANPA OPSI STAFF) -->
                        <form action="{{ route('admin.user.quickUpdateRole', $user->id) }}" method="POST" class="inline-flex items-center gap-2">
                            @csrf
                            @method('PUT')
                            <select name="role" class="border border-gray-300 rounded px-2 py-1 text-xs" onchange="this.form.submit()">
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="editor" {{ $user->role == 'editor' ? 'selected' : '' }}>Editor</option>
                                <option value="publisher" {{ $user->role == 'publisher' ? 'selected' : '' }}>Publisher</option>
                                <option value="super_admin" {{ $user->role == 'super_admin' ? 'selected' : '' }}>Super Admin</option>
                            </select>
                        </form>
                        
                        <a href="{{ route('admin.user.edit', $user->id) }}" class="text-blue-600 hover:underline text-sm font-bold">Edit</a>
                        <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" class="inline">
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