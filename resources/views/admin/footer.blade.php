@extends('layouts.admin')

@section('title', 'Footer')

@section('content')
<div class="flex justify-between items-center mb-8">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Footer</h1>
        <p class="text-sm text-gray-500 mt-1">Kelola informasi footer website.</p>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
    <form action="{{ route('admin.footer.update') }}" method="POST">
        @csrf
        
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-semibold mb-1">Alamat</label>
                <input type="text" value="Jl. H. Juanda No. 15, Jakarta Pusat" class="w-full border-gray-300 rounded-lg p-3 text-sm">
            </div>
            
            <div>
                <label class="block text-sm font-semibold mb-1">Email</label>
                <input type="email" value="info@bantah.go.id" class="w-full border-gray-300 rounded-lg p-3 text-sm">
            </div>
            
            <div>
                <label class="block text-sm font-semibold mb-1">Telepon</label>
                <input type="text" value="(021) 3456-7890" class="w-full border-gray-300 rounded-lg p-3 text-sm">
            </div>
            
            <div class="mt-6">
                <button type="submit" class="bg-[#006400] hover:bg-[#005500] text-white px-5 py-2.5 rounded font-bold text-sm">Simpan Footer</button>
            </div>
        </div>
    </form>
</div>
@endsection