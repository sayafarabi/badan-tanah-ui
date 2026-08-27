@extends('layouts.admin')

@section('title', 'Pemanfaatan & Kerjasama')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">

        <div>
            <h1 class="text-2xl font-bold text-gray-900">
                Pemanfaatan & Kerjasama
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                Kelola seluruh informasi pemanfaatan aset dan kerja sama.
            </p>
        </div>

        <a
            href="{{ route('partnership') }}"
            target="_blank"
            class="text-sm font-semibold text-[#006400] hover:underline"
        >
            <i class="fas fa-external-link-alt mr-1"></i>
            Lihat Halaman
        </a>

    </div>


    @if(session('success'))
        <div class="mb-6 bg-green-50 border border-green-200 text-green-700 rounded-lg px-4 py-3 text-sm">
            <i class="fas fa-circle-check mr-2"></i>
            {{ session('success') }}
        </div>
    @endif


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
        action="{{ route('admin.halaman.update.partnership') }}"
        method="POST"
        enctype="multipart/form-data"
        class="space-y-6"
    >

        @csrf


        {{-- JUDUL --}}
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm">

            <div class="px-6 py-5 border-b border-gray-100">

                <h2 class="text-lg font-bold text-gray-900">
                    Identitas
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


        {{-- TENTANG --}}
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm">

            <div class="px-6 py-5 border-b border-gray-100">

                <h2 class="text-lg font-bold text-gray-900">
                    Tentang Pemanfaatan
                </h2>

            </div>

            <div class="p-6">

                <textarea
                    name="tentang_pemanfaatan"
                    rows="8"
                    class="w-full rounded-lg border-gray-300 focus:border-[#006400] focus:ring-[#006400]"
                >{{ old('tentang_pemanfaatan', $halaman->tentang_pemanfaatan ?: $halaman->isi) }}</textarea>

            </div>

        </div>


        {{-- SKEMA & KERJA SAMA --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            <div class="bg-white rounded-xl border border-gray-200 shadow-sm">

                <div class="px-6 py-5 border-b border-gray-100">
                    <h2 class="text-lg font-bold text-gray-900">
                        Skema Pemanfaatan
                    </h2>
                </div>

                <div class="p-6">

                    <textarea
                        name="skema_pemanfaatan"
                        rows="8"
                        class="w-full rounded-lg border-gray-300 focus:border-[#006400] focus:ring-[#006400]"
                        placeholder="Masukkan informasi skema pemanfaatan..."
                    >{{ old('skema_pemanfaatan', $halaman->skema_pemanfaatan) }}</textarea>

                </div>

            </div>


            <div class="bg-white rounded-xl border border-gray-200 shadow-sm">

                <div class="px-6 py-5 border-b border-gray-100">
                    <h2 class="text-lg font-bold text-gray-900">
                        Bentuk Kerjasama
                    </h2>
                </div>

                <div class="p-6">

                    <textarea
                        name="bentuk_kerjasama"
                        rows="8"
                        class="w-full rounded-lg border-gray-300 focus:border-[#006400] focus:ring-[#006400]"
                        placeholder="Masukkan bentuk kerja sama..."
                    >{{ old('bentuk_kerjasama', $halaman->bentuk_kerjasama) }}</textarea>

                </div>

            </div>

        </div>


        {{-- PROSEDUR --}}
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm">

            <div class="px-6 py-5 border-b border-gray-100">

                <h2 class="text-lg font-bold text-gray-900">
                    Prosedur & Tahapan
                </h2>

            </div>

            <div class="p-6">

                <textarea
                    name="prosedur_tahapan"
                    rows="10"
                    class="w-full rounded-lg border-gray-300 focus:border-[#006400] focus:ring-[#006400]"
                >{{ old('prosedur_tahapan', $halaman->prosedur_tahapan) }}</textarea>

            </div>

        </div>


        {{-- PERSYARATAN --}}
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm">

            <div class="px-6 py-5 border-b border-gray-100">

                <h2 class="text-lg font-bold text-gray-900">
                    Persyaratan
                </h2>

            </div>

            <div class="p-6">

                <textarea
                    name="persyaratan"
                    rows="10"
                    class="w-full rounded-lg border-gray-300 focus:border-[#006400] focus:ring-[#006400]"
                >{{ old('persyaratan', $halaman->persyaratan) }}</textarea>

            </div>

        </div>


        {{-- FOTO --}}
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm">

            <div class="px-6 py-5 border-b border-gray-100">

                <h2 class="text-lg font-bold text-gray-900">
                    Foto
                </h2>

            </div>

            <div class="p-6">

                @if($halaman->gambar)

                    <img
                        src="{{ asset('storage/' . $halaman->gambar) }}"
                        class="w-full max-w-xl h-64 object-cover rounded-xl mb-5"
                    >

                @endif

                <input
                    type="file"
                    name="gambar"
                    accept="image/jpeg,image/png,image/jpg,image/gif,image/webp"
                    class="w-full border border-gray-300 rounded-lg p-3"
                >

                <p class="text-xs text-gray-400 mt-2">
                    JPG, PNG, GIF, WEBP — maksimal 5 MB.
                </p>

            </div>

        </div>


        <div class="flex justify-end">

            <button
                type="submit"
                class="bg-[#006400] hover:bg-[#005500] text-white px-6 py-3 rounded-lg font-bold"
            >
                <i class="fas fa-save mr-2"></i>
                Simpan Pemanfaatan
            </button>

        </div>

    </form>

</div>

@endsection