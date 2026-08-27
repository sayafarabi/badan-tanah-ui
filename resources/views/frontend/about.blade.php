@extends('layouts.frontend')

@section('title', $halaman->judul . ' - Badan Bank Tanah')

@section('content')

    {{-- =========================================================
    HERO / PAGE HEADER
========================================================= --}}
    <section class="bg-[#0B2A4A]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-20">

            <div class="max-w-3xl">

                <span
                    class="inline-flex items-center px-3 py-1 rounded-full
                         bg-white/10 text-blue-200 text-xs font-semibold
                         uppercase tracking-wider mb-5">
                    Badan Bank Tanah
                </span>

                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white leading-tight">
                    {{ $halaman->judul }}
                </h1>

                <div class="h-1 w-20 bg-blue-500 mt-5 mb-5 rounded-full"></div>

                <p class="text-blue-100 text-sm md:text-base leading-relaxed max-w-2xl">
                    Mengenal Badan Bank Tanah, visi dan misi, struktur organisasi,
                    serta landasan hukum dalam pengelolaan tanah negara.
                </p>

            </div>

        </div>
    </section>


    {{-- =========================================================
    CONTENT
========================================================= --}}
    <section class="bg-gray-50 py-14 md:py-20">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- =================================================
            PROFIL BADAN BANK TANAH
        ================================================== --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100
                    overflow-hidden mb-8">

                <div class="grid grid-cols-1 lg:grid-cols-5">

                    {{-- IMAGE --}}
                    @if ($halaman->gambar)
                        <div class="lg:col-span-2 min-h-[280px] lg:min-h-[380px]">

                            <img src="{{ asset('storage/' . $halaman->gambar) }}" alt="{{ $halaman->judul }}"
                                class="w-full h-full object-cover">

                        </div>
                    @else
                        <div
                            class="lg:col-span-2 min-h-[280px] lg:min-h-[380px]
                                bg-[#0B2A4A] flex items-center justify-center">

                            <div class="text-center px-8">

                                <div
                                    class="w-20 h-20 mx-auto rounded-2xl
                                        bg-white/10 flex items-center justify-center mb-5">

                                    <i class="fas fa-building-columns text-3xl text-white"></i>

                                </div>

                                <h3 class="text-xl font-bold text-white">
                                    Badan Bank Tanah
                                </h3>

                                <p class="text-blue-200 text-sm mt-2">
                                    Indonesia Land Bank Authority
                                </p>

                            </div>

                        </div>
                    @endif


                    {{-- CONTENT --}}
                    <div class="lg:col-span-3 p-7 md:p-10">

                        <span
                            class="text-blue-700 text-xs font-bold
                                 uppercase tracking-wider">
                            Profil Lembaga
                        </span>

                        <h2 class="text-2xl md:text-3xl font-bold
                               text-gray-900 mt-2 mb-5">
                            {{ $halaman->judul }}
                        </h2>

                        <div class="h-1 w-14 bg-blue-600 rounded-full mb-6"></div>

                        <div class="text-gray-600 leading-8 text-sm md:text-base">

                            {!! nl2br(e($halaman->profil_lembaga ?: $halaman->isi)) !!}

                        </div>

                    </div>

                </div>

            </div>


            {{-- =================================================
            VISI & MISI
        ================================================== --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">

                {{-- VISI --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100
                        p-7 md:p-8">

                    <div class="flex items-center gap-4 mb-6">

                        <div
                            class="w-12 h-12 rounded-xl bg-blue-50
                                flex items-center justify-center">

                            <i class="fas fa-eye text-blue-700 text-lg"></i>

                        </div>

                        <div>
                            <span
                                class="text-xs font-semibold uppercase
                                     tracking-wider text-blue-700">
                                Arah Lembaga
                            </span>

                            <h2 class="text-2xl font-bold text-gray-900">
                                Visi
                            </h2>
                        </div>

                    </div>

                    <div class="border-l-4 border-blue-600 pl-5">

                        <div class="text-gray-600 leading-8 text-sm md:text-base">
                            {!! nl2br(
                                e($halaman->visi ?: 'Visi Badan Bank Tanah ditampilkan berdasarkan konten resmi yang dikelola melalui CMS.'),
                            ) !!}
                        </div>

                    </div>

                </div>


                {{-- MISI --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100
                        p-7 md:p-8">

                    <div class="flex items-center gap-4 mb-6">

                        <div
                            class="w-12 h-12 rounded-xl bg-green-50
                                flex items-center justify-center">

                            <i class="fas fa-bullseye text-green-700 text-lg"></i>

                        </div>

                        <div>
                            <span
                                class="text-xs font-semibold uppercase
                                     tracking-wider text-green-700">
                                Arah Strategis
                            </span>

                            <h2 class="text-2xl font-bold text-gray-900">
                                Misi
                            </h2>
                        </div>

                    </div>

                    <div class="border-l-4 border-green-600 pl-5">

                        <div class="text-gray-600 leading-8 text-sm md:text-base">
                            {!! nl2br(
                                e($halaman->misi ?: 'Misi Badan Bank Tanah ditampilkan berdasarkan konten resmi yang dikelola melalui CMS.'),
                            ) !!}
                        </div>
                        Misi Badan Bank Tanah ditampilkan berdasarkan konten resmi
                        yang dikelola melalui CMS.
                        </p>

                    </div>

                </div>

            </div>


            {{-- =================================================
            STRUKTUR ORGANISASI
        ================================================== --}}
            <div class="rounded-xl border border-dashed border-gray-300
            bg-gray-50 p-8">

                @if ($halaman->struktur_organisasi)
                    <div class="text-gray-600 leading-8 text-sm md:text-base">
                        {!! nl2br(e($halaman->struktur_organisasi)) !!}
                    </div>
                @else
                    <div class="text-center">

                        <div
                            class="w-16 h-16 mx-auto rounded-full bg-white
                        shadow-sm flex items-center justify-center mb-4">

                            <i class="fas fa-users text-blue-700 text-xl"></i>

                        </div>

                        <h3 class="font-bold text-gray-900 text-lg">
                            Struktur Organisasi Badan Bank Tanah
                        </h3>

                        <p class="text-sm text-gray-500 mt-2">
                            Struktur organisasi belum dikelola melalui CMS.
                        </p>

                    </div>
                @endif

            </div>

            {{-- =================================================
            DASAR HUKUM
        ================================================== --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100
                    p-7 md:p-10">

                <div class="flex items-center gap-4 mb-7">

                    <div
                        class="w-12 h-12 rounded-xl bg-amber-50
                            flex items-center justify-center">

                        <i class="fas fa-scale-balanced text-amber-600 text-lg"></i>

                    </div>

                    @if ($halaman->landasan_hukum)
                        <div class="text-sm text-gray-500 leading-7">
                            {!! nl2br(e($halaman->landasan_hukum)) !!}
                        </div>
                    @else
                        <p class="text-sm text-gray-500 leading-7">
                            Informasi dasar hukum belum dikelola melalui CMS.
                        </p>
                    @endif
                    
                </div>


                <div class="border-t border-gray-100 pt-6">

                    <div class="flex gap-4">

                        <div class="shrink-0 mt-1">
                            <div
                                class="w-8 h-8 rounded-lg bg-amber-50
                                    flex items-center justify-center">

                                <i class="fas fa-file-lines text-amber-600 text-sm"></i>

                            </div>
                        </div>

                        <div>

                            <h3 class="font-semibold text-gray-900">
                                Landasan hukum Badan Bank Tanah
                            </h3>

                            <p class="text-sm text-gray-500 leading-7 mt-2">
                                Informasi dasar hukum ditampilkan berdasarkan
                                dokumen dan konten resmi yang dikelola melalui CMS.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

@endsection
