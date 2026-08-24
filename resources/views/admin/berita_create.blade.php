@extends('layouts.admin')

@section('title', 'Tambah Berita')

@section('content')

<form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900">
            Tambah Berita
        </h1>

        <div class="flex gap-3">

            <button
                type="submit"
                name="status"
                value="Draft"
                class="border border-gray-300 rounded px-4 py-2 text-sm font-medium hover:bg-gray-50">
                Simpan Draft
            </button>

            <button
                type="button"
                onclick="window.history.back()"
                class="border border-gray-300 rounded px-4 py-2 text-sm font-medium hover:bg-gray-50">
                Batal
            </button>

            <button
                type="submit"
                name="status"
                value="Terbit"
                class="bg-[#006400] hover:bg-[#005500] text-white rounded px-5 py-2 text-sm font-bold">
                Terbitkan
            </button>

        </div>
    </div>


    <!-- PESAN ERROR -->
    @if ($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 rounded-lg p-4 mb-6">
            <p class="font-bold mb-2">Terjadi kesalahan:</p>

            <ul class="list-disc ml-5 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <!-- ========================================== -->
        <!-- KOLOM KIRI -->
        <!-- ========================================== -->

        <div class="lg:col-span-2 space-y-6">

            <!-- INFORMASI DASAR -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

                <h2 class="font-bold text-lg mb-4">
                    Informasi Dasar
                </h2>

                <div class="space-y-4">

                    <!-- JUDUL -->
                    <div>

                        <label class="block text-sm font-semibold mb-1">
                            Judul Berita
                            <span class="text-red-500">*</span>
                        </label>

                        <input
                            type="text"
                            name="judul"
                            value="{{ old('judul') }}"
                            placeholder="Masukkan judul berita"
                            required
                            class="w-full border-gray-300 rounded-lg p-3 text-sm focus:ring-[#006400] focus:border-[#006400]">

                    </div>


                    <!-- RINGKASAN -->
                    <div>

                        <label class="block text-sm font-semibold mb-1">
                            Ringkasan / Lead
                        </label>

                        <textarea
                            rows="3"
                            name="ringkasan"
                            placeholder="Masukkan ringkasan singkat berita"
                            class="w-full border-gray-300 rounded-lg p-3 text-sm">{{ old('ringkasan') }}</textarea>

                        <p class="text-xs text-gray-400 mt-1">
                            Opsional. Jika dikosongkan, ringkasan dapat dibuat otomatis dari konten.
                        </p>

                    </div>


                    <!-- KATEGORI & TANGGAL -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <!-- KATEGORI -->
                        <div>

                            <label class="block text-sm font-semibold mb-1">
                                Kategori
                                <span class="text-red-500">*</span>
                            </label>

                            <select
                                name="kategori"
                                required
                                class="w-full border-gray-300 rounded-lg p-3 text-sm focus:ring-[#006400]">

                                <option value="">
                                    Pilih Kategori
                                </option>

                                <option
                                    value="Berita"
                                    {{ old('kategori') == 'Berita' ? 'selected' : '' }}>
                                    Berita
                                </option>

                                <option
                                    value="Siaran Pers"
                                    {{ old('kategori') == 'Siaran Pers' ? 'selected' : '' }}>
                                    Siaran Pers
                                </option>

                                <option
                                    value="Pengumuman"
                                    {{ old('kategori') == 'Pengumuman' ? 'selected' : '' }}>
                                    Pengumuman
                                </option>

                            </select>

                        </div>


                        <!-- TANGGAL -->
                        <div>

                            <label class="block text-sm font-semibold mb-1">
                                Tanggal Publikasi
                            </label>

                            <input
                                type="date"
                                name="tanggal_publikasi"
                                value="{{ old('tanggal_publikasi', date('Y-m-d')) }}"
                                class="w-full border-gray-300 rounded-lg p-3 text-sm">

                        </div>

                    </div>

                </div>

            </div>


            <!-- ========================================== -->
            <!-- KONTEN BERITA -->
            <!-- ========================================== -->

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

                <h2 class="font-bold text-lg mb-4">
                    Konten Berita
                </h2>


                <!-- GAMBAR UTAMA -->
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center mb-6">

                    <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-3"></i>

                    <p class="text-sm font-medium text-gray-600">
                        Upload gambar utama berita
                    </p>

                    <p class="text-xs text-gray-400 mt-1 mb-4">
                        Rekomendasi ukuran: 1200 x 675 px (16:9)
                        <br>
                        Format: JPG, JPEG, PNG (Maks. 2MB)
                    </p>


                    <input
                        type="file"
                        name="gambar"
                        accept="image/jpeg,image/png,image/jpg"
                        class="block w-full text-sm text-gray-600
                        file:mr-4 file:py-2 file:px-4
                        file:rounded-lg file:border-0
                        file:text-sm file:font-semibold
                        file:bg-green-50 file:text-green-700
                        hover:file:bg-green-100">

                </div>


                <!-- EDITOR TEKS -->
                <div class="border border-gray-300 rounded-lg overflow-hidden">

                    <div class="bg-gray-50 border-b border-gray-200 p-2 flex gap-3 text-gray-600">

                        <button type="button" class="hover:text-black">
                            <i class="fas fa-bold"></i>
                        </button>

                        <button type="button" class="hover:text-black">
                            <i class="fas fa-italic"></i>
                        </button>

                        <button type="button" class="hover:text-black">
                            <i class="fas fa-underline"></i>
                        </button>

                        <button type="button" class="hover:text-black">
                            <i class="fas fa-list-ul"></i>
                        </button>

                        <button type="button" class="hover:text-black">
                            <i class="fas fa-link"></i>
                        </button>

                        <button type="button" class="hover:text-black">
                            <i class="fas fa-image"></i>
                        </button>

                    </div>


                    <textarea
                        rows="10"
                        name="konten"
                        required
                        placeholder="Tulis konten berita di sini..."
                        class="w-full p-4 text-sm border-none focus:ring-0">{{ old('konten') }}</textarea>

                </div>

                <p class="text-right text-xs text-gray-400 mt-2">
                    Isi konten berita secara lengkap.
                </p>

            </div>


            <!-- ========================================== -->
            <!-- SEO -->
            <!-- ========================================== -->

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

                <h2 class="font-bold text-lg mb-4">
                    SEO (Opsional)
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div>

                        <label class="block text-sm font-semibold mb-1">
                            Meta Title
                        </label>

                        <input
                            type="text"
                            placeholder="Masukkan meta title"
                            class="w-full border-gray-300 rounded-lg p-3 text-sm">

                        <p class="text-right text-xs text-gray-400 mt-1">
                            0/60
                        </p>

                    </div>


                    <div>

                        <label class="block text-sm font-semibold mb-1">
                            Meta Description
                        </label>

                        <input
                            type="text"
                            placeholder="Masukkan meta description"
                            class="w-full border-gray-300 rounded-lg p-3 text-sm">

                        <p class="text-right text-xs text-gray-400 mt-1">
                            0/160
                        </p>

                    </div>


                    <div>

                        <label class="block text-sm font-semibold mb-1">
                            URL Slug
                        </label>

                        <input
                            type="text"
                            placeholder="/berita/..."
                            class="w-full border-gray-300 rounded-lg p-3 text-sm">

                    </div>

                </div>

            </div>

        </div>


        <!-- ========================================== -->
        <!-- KOLOM KANAN -->
        <!-- ========================================== -->

        <div class="space-y-6">


            <!-- STATUS -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

                <h2 class="font-bold text-lg mb-4">
                    Status & Akses
                </h2>

                <div class="space-y-4">

                    <!-- STATUS -->
                    <div>

                        <label class="block text-sm font-semibold mb-1">
                            Status
                        </label>

                        <select
                            id="status"
                            name="status"
                            class="w-full border-gray-300 rounded-lg p-3 text-sm">

                            <option
                                value="Draft"
                                {{ old('status') == 'Draft' ? 'selected' : '' }}>
                                Draft
                            </option>

                            <option
                                value="Terbit"
                                {{ old('status', 'Terbit') == 'Terbit' ? 'selected' : '' }}>
                                Terbit
                            </option>

                        </select>

                    </div>


                    <!-- PENULIS -->
                    <div>

                        <label class="block text-sm font-semibold mb-1">
                            Penulis
                        </label>

                        <input
                            type="text"
                            name="penulis"
                            value="Administrator"
                            readonly
                            class="w-full border-gray-300 rounded-lg p-3 text-sm bg-gray-50">

                    </div>

                </div>

            </div>


            <!-- RIWAYAT -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

                <h2 class="font-bold text-lg mb-4">
                    Riwayat Approval
                </h2>

                <div class="space-y-3 text-sm">

                    <div class="flex gap-3">

                        <div class="w-8 h-8 rounded-full bg-green-100 text-green-600 flex items-center justify-center">
                            <i class="fas fa-check"></i>
                        </div>

                        <div>

                            <p class="font-medium">
                                Dibuat oleh
                            </p>

                            <p class="text-gray-500">
                                Administrator
                            </p>

                        </div>

                    </div>


                    <div class="flex gap-3">

                        <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center">
                            <i class="fas fa-clock"></i>
                        </div>

                        <div>

                            <p class="font-medium">
                                Status Publikasi
                            </p>

                            <p class="text-gray-500">
                                Berita akan tampil di website jika berstatus Terbit.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</form>

@endsection