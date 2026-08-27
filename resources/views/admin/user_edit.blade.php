@extends('layouts.admin')

@section('title', 'Edit Pengguna')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Edit Pengguna</h1>
        <a href="{{ route('admin.user.index') }}" class="text-sm text-gray-600 hover:text-[#006400]">Kembali ke Daftar</a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <form action="{{ route('admin.user.update', $user->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')
            
            <div>
                <label class="block text-sm font-semibold mb-1">Nama <span class="text-red-500">*</span></label>
                <input type="text" name="name" value="{{ $user->name }}" class="w-full border-gray-300 rounded-lg p-3 text-sm focus:ring-[#006400]" required>
            </div>
            
            <div>
                <label class="block text-sm font-semibold mb-1">Email <span class="text-red-500">*</span></label>
                <input type="email" name="email" value="{{ $user->email }}" class="w-full border-gray-300 rounded-lg p-3 text-sm focus:ring-[#006400]" required>
            </div>
            
            <div>
                <label class="block text-sm font-semibold mb-1">Password (Opsional)</label>
                <input type="password" name="password" class="w-full border-gray-300 rounded-lg p-3 text-sm focus:ring-[#006400]" placeholder="Kosongkan jika tidak diubah">
            </div>
            
            <div>
                <label class="block text-sm font-semibold mb-1">Role <span class="text-red-500">*</span></label>
                <select name="role" class="w-full border-gray-300 rounded-lg p-3 text-sm focus:ring-[#006400]" required>
                    <option value="super_admin" {{ $user->role == 'super_admin' ? 'selected' : '' }}>Super Admin</option>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="publisher" {{ $user->role == 'publisher' ? 'selected' : '' }}>Publisher</option>
                    <option value="editor" {{ $user->role == 'editor' ? 'selected' : '' }}>Editor</option>
                </select>
            </div>
            
            <div>
                <label class="block text-sm font-semibold mb-1">Foto Profil</label>
                <input type="file" name="foto" class="w-full border-gray-300 rounded-lg p-3 text-sm focus:ring-[#006400]" accept="image/*">
                @if ($user->foto)
                    <p class="text-xs text-gray-500 mt-2">Gambar lama:</p>
                    <img src="{{ asset('storage/' . $user->foto) }}" class="w-20 h-20 rounded-full object-cover mt-2 border border-gray-200">
                @else
                    <p class="text-xs text-gray-500 mt-2">Belum ada foto.</p>
                @endif
            </div>
            
            <div class="mt-6">
                <button type="submit" class="bg-[#006400] hover:bg-[#005500] text-white px-5 py-2.5 rounded font-bold text-sm">Update Pengguna</button>
            </div>
        </form>
    </div>
</div>
@endsection