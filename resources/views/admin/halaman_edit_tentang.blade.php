@extends('layouts.admin')

@section('title', 'Edit Halaman Tentang')

@section('content')

<div class="max-w-7xl mx-auto">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">

        <div>
            <h1 class="text-2xl font-bold text-gray-900">
                Halaman Tentang
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                Kelola seluruh informasi yang ditampilkan pada halaman Tentang.
            </p>
        </div>

        <a
            href="{{ route('about') }}"
            target="_blank"
            class="inline-flex items-center gap-2 text-sm font-semibold text-[#006400] hover:underline"
        >
            <i class="fas fa-external-link-alt"></i>
            Lihat Halaman
        </a>

    </div>


    {{-- SUCCESS --}}
    @if(session('success'))
        <div class="mb-6 bg-green-50 border border-green-200 text-green-700 rounded-lg px-4 py-3 text-sm">
            <i class="fas fa-circle-check mr-2"></i>
            {{ session('success') }}
        </div>
    @endif


    {{-- ERROR --}}
    @if($errors->any())
        <div class="mb-6 bg-red-50 border border-red-200 text-red-700 rounded-lg px-4 py-3 text-sm">
            <ul class="list-disc ml-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form
        action="{{ route('admin.halaman.update.tentang') }}"
        method="POST"
        enctype="multipart/form-data"
        class="space-y-6"
    >

        @csrf


        {{-- IDENTITAS --}}
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm">

            <div class="px-6 py-5 border-b border-gray-100">
                <h2 class="text-lg font-bold text-gray-900">
                    Identitas Halaman
                </h2>
            </div>

            <div class="p-6">

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Judul Halaman
                </label>

                <input
                    type="text"
                    name="judul"
                    value="{{ old('judul', $halaman->judul) }}"
                    class="w-full rounded-lg border-gray-300 focus:border-[#006400] focus:ring-[#006400]"
                    required
                >

            </div>

        </div>


        {{-- PROFIL --}}
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm">

            <div class="px-6 py-5 border-b border-gray-100">
                <h2 class="text-lg font-bold text-gray-900">
                    Profil Lembaga
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Konten yang ditampilkan pada bagian Profil Lembaga.
                </p>
            </div>

            <div class="p-6">

                <textarea
                    name="profil_lembaga"
                    rows="8"
                    class="w-full rounded-lg border-gray-300 focus:border-[#006400] focus:ring-[#006400]"
                    placeholder="Masukkan profil Badan Bank Tanah..."
                >{{ old('profil_lembaga', $halaman->profil_lembaga ?: $halaman->isi) }}</textarea>

            </div>

        </div>


        {{-- VISI MISI --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            <div class="bg-white rounded-xl border border-gray-200 shadow-sm">

                <div class="px-6 py-5 border-b border-gray-100">
                    <h2 class="text-lg font-bold text-gray-900">
                        Visi
                    </h2>
                </div>

                <div class="p-6">

                    <textarea
                        name="visi"
                        rows="8"
                        class="w-full rounded-lg border-gray-300 focus:border-[#006400] focus:ring-[#006400]"
                        placeholder="Masukkan visi..."
                    >{{ old('visi', $halaman->visi) }}</textarea>

                </div>

            </div>


            <div class="bg-white rounded-xl border border-gray-200 shadow-sm">

                <div class="px-6 py-5 border-b border-gray-100">
                    <h2 class="text-lg font-bold text-gray-900">
                        Misi
                    </h2>
                </div>

                <div class="p-6">

                    <textarea
                        name="misi"
                        rows="8"
                        class="w-full rounded-lg border-gray-300 focus:border-[#006400] focus:ring-[#006400]"
                        placeholder="Masukkan misi..."
                    >{{ old('misi', $halaman->misi) }}</textarea>

                </div>

            </div>

        </div>


        {{-- TATA KELOLA --}}
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm">

            <div class="px-6 py-5 border-b border-gray-100">
                <h2 class="text-lg font-bold text-gray-900">
                    Tata Kelola & Struktur Organisasi
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Masukkan informasi struktur organisasi.
                </p>
            </div>

            <div class="p-6">

                <textarea
                    name="struktur_organisasi"
                    rows="10"
                    class="w-full rounded-lg border-gray-300 focus:border-[#006400] focus:ring-[#006400]"
                    placeholder="Masukkan struktur organisasi..."
                >{{ old('struktur_organisasi', $halaman->struktur_organisasi) }}</textarea>

            </div>

        </div>


        {{-- HUKUM --}}
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm">

            <div class="px-6 py-5 border-b border-gray-100">
                <h2 class="text-lg font-bold text-gray-900">
                    Landasan Hukum
                </h2>
            </div>

            <div class="p-6">

                <textarea
                    name="landasan_hukum"
                    rows="8"
                    class="w-full rounded-lg border-gray-300 focus:border-[#006400] focus:ring-[#006400]"
                    placeholder="Masukkan landasan hukum..."
                >{{ old('landasan_hukum', $halaman->landasan_hukum) }}</textarea>

            </div>

        </div>


        {{-- FOTO --}}
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm">

            <div class="px-6 py-5 border-b border-gray-100">
                <h2 class="text-lg font-bold text-gray-900">
                    Foto Profil Lembaga
                </h2>
            </div>

            <div class="p-6">

                @if($halaman->gambar)

                    <div class="mb-5">

                        <p class="text-sm font-medium text-gray-600 mb-2">
                            Foto saat ini
                        </p>

                        <img
                            src="{{ asset('storage/' . $halaman->gambar) }}"
                            class="w-full max-w-xl h-64 object-cover rounded-xl border border-gray-200"
                        >

                    </div>

                @endif


                <input
                    type="file"
                    name="gambar"
                    accept="image/jpeg,image/png,image/jpg,image/gif,image/webp"
                    class="w-full border border-gray-300 rounded-lg p-3 text-sm"
                >

                <p class="text-xs text-gray-400 mt-2">
                    JPG, PNG, GIF, WEBP. Maksimal 5 MB.
                </p>

            </div>

        </div>


        {{-- SAVE --}}
        <div class="flex justify-end">

            <button
                type="submit"
                class="inline-flex items-center gap-2 bg-[#006400] hover:bg-[#005500] text-white px-6 py-3 rounded-lg font-bold text-sm"
            >
                <i class="fas fa-save"></i>
                Simpan Halaman Tentang
            </button>

        </div>

    </form>

</div>

@endsection