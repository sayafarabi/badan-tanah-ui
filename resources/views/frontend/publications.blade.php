@extends('layouts.frontend')

@section('title', 'Publikasi')

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | DUMMY PUBLICATION DATA
    |--------------------------------------------------------------------------
    | Struktur disesuaikan dengan PRD:
    | judul, slug, excerpt, featured image, author,
    | kategori, tanggal, status, jumlah dilihat, published_at
    |--------------------------------------------------------------------------
    */

    $publikasi = [

        // =====================================================
        // BERITA
        // =====================================================

        [
            'id' => 1,
            'judul' => 'Badan Bank Tanah Perkuat Pengelolaan Aset Persediaan Tanah Nasional',
            'slug' => 'badan-bank-tanah-perkuat-pengelolaan-aset-persediaan-tanah-nasional',
            'excerpt' => 'Badan Bank Tanah terus memperkuat pengelolaan aset persediaan tanah sebagai bagian dari upaya mendukung pembangunan nasional.',
            'gambar' => null,
            'author' => 'Badan Bank Tanah',
            'kategori' => 'Berita',
            'tanggal' => '25 Agustus 2026',
            'status' => 'Dipublikasikan',
            'views' => 1284,
            'published_at' => '25 Agustus 2026',
        ],

        [
            'id' => 2,
            'judul' => 'Pengelolaan Tanah Berkelanjutan Dukung Pemerataan Pembangunan',
            'slug' => 'pengelolaan-tanah-berkelanjutan-dukung-pemerataan-pembangunan',
            'excerpt' => 'Pengelolaan tanah yang berkelanjutan menjadi salah satu langkah strategis dalam mendukung pemerataan pembangunan dan kepentingan masyarakat.',
            'gambar' => null,
            'author' => 'Badan Bank Tanah',
            'kategori' => 'Berita',
            'tanggal' => '21 Agustus 2026',
            'status' => 'Dipublikasikan',
            'views' => 967,
            'published_at' => '21 Agustus 2026',
        ],

        [
            'id' => 3,
            'judul' => 'Badan Bank Tanah Dorong Optimalisasi Pemanfaatan Aset Tanah',
            'slug' => 'badan-bank-tanah-dorong-optimalisasi-pemanfaatan-aset-tanah',
            'excerpt' => 'Optimalisasi pemanfaatan aset tanah diarahkan untuk menghasilkan manfaat ekonomi, sosial, dan pembangunan yang berkelanjutan.',
            'gambar' => null,
            'author' => 'Badan Bank Tanah',
            'kategori' => 'Berita',
            'tanggal' => '18 Agustus 2026',
            'status' => 'Dipublikasikan',
            'views' => 742,
            'published_at' => '18 Agustus 2026',
        ],


        // =====================================================
        // SIARAN PERS
        // =====================================================

        [
            'id' => 4,
            'judul' => 'Badan Bank Tanah Sampaikan Komitmen Pengelolaan Tanah untuk Kepentingan Umum',
            'slug' => 'badan-bank-tanah-sampaikan-komitmen-pengelolaan-tanah',
            'excerpt' => 'Badan Bank Tanah menyampaikan komitmen untuk memastikan pengelolaan dan pemanfaatan tanah berjalan secara transparan dan memberikan manfaat bagi masyarakat.',
            'gambar' => null,
            'author' => 'Biro Komunikasi Badan Bank Tanah',
            'kategori' => 'Siaran Pers',
            'tanggal' => '20 Agustus 2026',
            'status' => 'Dipublikasikan',
            'views' => 1532,
            'published_at' => '20 Agustus 2026',
        ],

        [
            'id' => 5,
            'judul' => 'Optimalisasi Aset Persediaan Tanah untuk Mendukung Investasi Berkelanjutan',
            'slug' => 'optimalisasi-aset-persediaan-tanah-untuk-investasi',
            'excerpt' => 'Optimalisasi aset persediaan tanah diarahkan untuk mendukung kegiatan investasi dan pemanfaatan tanah yang memberikan nilai tambah.',
            'gambar' => null,
            'author' => 'Biro Komunikasi Badan Bank Tanah',
            'kategori' => 'Siaran Pers',
            'tanggal' => '15 Agustus 2026',
            'status' => 'Dipublikasikan',
            'views' => 1138,
            'published_at' => '15 Agustus 2026',
        ],

        [
            'id' => 6,
            'judul' => 'Penguatan Kolaborasi dalam Pemanfaatan Aset Persediaan Tanah',
            'slug' => 'penguatan-kolaborasi-pemanfaatan-aset-persediaan-tanah',
            'excerpt' => 'Kolaborasi dengan berbagai pemangku kepentingan menjadi bagian penting dalam mewujudkan pemanfaatan aset persediaan tanah secara optimal.',
            'gambar' => null,
            'author' => 'Biro Komunikasi Badan Bank Tanah',
            'kategori' => 'Siaran Pers',
            'tanggal' => '10 Agustus 2026',
            'status' => 'Dipublikasikan',
            'views' => 856,
            'published_at' => '10 Agustus 2026',
        ],


        // =====================================================
        // PENGUMUMAN
        // =====================================================

        [
            'id' => 7,
            'judul' => 'Pengumuman Pembukaan Informasi Pemanfaatan Aset Persediaan Tanah',
            'slug' => 'pengumuman-informasi-pemanfaatan-aset-persediaan-tanah',
            'excerpt' => 'Informasi mengenai kesempatan pemanfaatan aset persediaan tanah Badan Bank Tanah untuk masyarakat dan calon mitra.',
            'gambar' => null,
            'author' => 'Badan Bank Tanah',
            'kategori' => 'Pengumuman',
            'tanggal' => '23 Agustus 2026',
            'status' => 'Dipublikasikan',
            'views' => 642,
            'published_at' => '23 Agustus 2026',
        ],

        [
            'id' => 8,
            'judul' => 'Pengumuman Pembaruan Data Aset Persediaan Tanah',
            'slug' => 'pengumuman-pembaruan-data-aset-persediaan-tanah',
            'excerpt' => 'Badan Bank Tanah melakukan pembaruan informasi aset persediaan tanah untuk memastikan data publik tetap informatif dan relevan.',
            'gambar' => null,
            'author' => 'Badan Bank Tanah',
            'kategori' => 'Pengumuman',
            'tanggal' => '16 Agustus 2026',
            'status' => 'Dipublikasikan',
            'views' => 521,
            'published_at' => '16 Agustus 2026',
        ],

        [
            'id' => 9,
            'judul' => 'Informasi Layanan Pemanfaatan dan Kerjasama Usaha',
            'slug' => 'informasi-layanan-pemanfaatan-dan-kerjasama-usaha',
            'excerpt' => 'Informasi mengenai layanan, prosedur, dan tahapan pemanfaatan serta kerjasama usaha dengan Badan Bank Tanah.',
            'gambar' => null,
            'author' => 'Badan Bank Tanah',
            'kategori' => 'Pengumuman',
            'tanggal' => '12 Agustus 2026',
            'status' => 'Dipublikasikan',
            'views' => 894,
            'published_at' => '12 Agustus 2026',
        ],

    ];

@endphp


{{-- =========================================================
    HERO
========================================================= --}}

<section class="bg-[#0B2A4A]">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-20">

        <div class="max-w-3xl">

            <div class="inline-flex items-center gap-2
                        bg-white/10
                        border border-white/10
                        text-blue-200
                        px-4 py-2
                        rounded-full
                        text-xs font-semibold">

                <i class="fas fa-newspaper"></i>

                Publikasi Badan Bank Tanah

            </div>

            <h1 class="text-3xl md:text-4xl lg:text-5xl
                       font-extrabold text-white
                       leading-tight mt-5">

                Informasi dan Publikasi
                <span class="text-blue-300">
                    Resmi
                </span>

            </h1>

            <p class="text-blue-100
                      text-base md:text-lg
                      leading-relaxed
                      mt-5 max-w-2xl">

                Temukan berita, siaran pers, dan pengumuman
                resmi Badan Bank Tanah dalam satu tempat.

            </p>

        </div>

    </div>

</section>



{{-- =========================================================
    PUBLICATION
========================================================= --}}

<section
    class="bg-gray-50"
    x-data="{ activeTab: 'Berita' }">

    <div class="max-w-7xl mx-auto
                px-4 sm:px-6 lg:px-8
                py-12 lg:py-16">


        {{-- =====================================================
            TAB
        ====================================================== --}}

        <div class="bg-white
                    border border-gray-200
                    rounded-2xl
                    shadow-sm
                    p-2 mb-8">

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">

                @foreach ([
                    ['Berita', 'fa-newspaper'],
                    ['Siaran Pers', 'fa-bullhorn'],
                    ['Pengumuman', 'fa-circle-info']
                ] as $tab)

                    <button
                        type="button"
                        @click="activeTab = '{{ $tab[0] }}'"
                        :class="activeTab === '{{ $tab[0] }}'
                            ? 'bg-[#0B2A4A] text-white shadow-sm'
                            : 'text-gray-600 hover:bg-gray-50'"
                        class="flex items-center
                               justify-center gap-3
                               px-5 py-3.5
                               rounded-xl
                               text-sm font-bold
                               transition">

                        <i class="fas {{ $tab[1] }}"></i>

                        {{ $tab[0] }}

                    </button>

                @endforeach

            </div>

        </div>



        {{-- =====================================================
            HEADER
        ====================================================== --}}

        <div class="flex flex-col
                    md:flex-row
                    md:items-end
                    md:justify-between
                    gap-4 mb-8">

            <div>

                <span class="text-xs font-bold
                             uppercase tracking-wider
                             text-blue-700">

                    Informasi Terbaru

                </span>

                <h2 class="text-2xl md:text-3xl
                           font-extrabold
                           text-gray-900 mt-2">

                    Publikasi Badan Bank Tanah

                </h2>

            </div>

            <p class="text-sm text-gray-500
                      max-w-md leading-relaxed">

                Informasi resmi dan terkini mengenai
                kegiatan, kebijakan, dan pengumuman
                Badan Bank Tanah.

            </p>

        </div>



        {{-- =====================================================
            PUBLICATION GRID
        ====================================================== --}}

        <div
            class="grid grid-cols-1
                   md:grid-cols-2
                   lg:grid-cols-3
                   gap-6">

            @foreach ($publikasi as $item)

                <article
                    x-show="activeTab === '{{ $item['kategori'] }}'"
                    x-transition.opacity
                    class="group bg-white
                           rounded-2xl
                           border border-gray-200
                           overflow-hidden
                           shadow-sm
                           hover:shadow-lg
                           transition">

                    {{-- IMAGE --}}

                    <div class="h-56
                                bg-gray-100
                                relative
                                overflow-hidden">

                        {{-- Dummy featured image --}}
                        <div
                            class="w-full h-full
                                   flex items-center
                                   justify-center
                                   bg-gradient-to-br
                                   from-[#0B2A4A]
                                   to-[#163F66]">

                            @if ($item['kategori'] === 'Berita')

                                <i class="fas fa-newspaper
                                          text-5xl
                                          text-white/30"></i>

                            @elseif ($item['kategori'] === 'Siaran Pers')

                                <i class="fas fa-bullhorn
                                          text-5xl
                                          text-white/30"></i>

                            @else

                                <i class="fas fa-circle-info
                                          text-5xl
                                          text-white/30"></i>

                            @endif

                        </div>


                        {{-- CATEGORY BADGE --}}

                        <span
                            class="absolute top-4 left-4
                                   inline-flex items-center gap-1.5
                                   bg-white
                                   text-[#0B2A4A]
                                   text-[10px]
                                   px-3 py-1.5
                                   rounded-md
                                   font-bold
                                   uppercase
                                   shadow-sm">

                            @if ($item['kategori'] === 'Berita')

                                <i class="fas fa-newspaper"></i>

                            @elseif ($item['kategori'] === 'Siaran Pers')

                                <i class="fas fa-bullhorn"></i>

                            @else

                                <i class="fas fa-circle-info"></i>

                            @endif

                            {{ $item['kategori'] }}

                        </span>

                    </div>


                    {{-- CONTENT --}}

                    <div class="p-6">

                        {{-- META --}}

                        <div class="flex items-center
                                    justify-between
                                    gap-3 mb-3">

                            <div class="flex items-center
                                        gap-1.5
                                        text-xs
                                        text-gray-500">

                                <i class="far fa-calendar"></i>

                                {{ $item['tanggal'] }}

                            </div>


                            <div class="flex items-center
                                        gap-1.5
                                        text-xs
                                        text-gray-500">

                                <i class="far fa-eye"></i>

                                {{ number_format($item['views'], 0, ',', '.') }}

                            </div>

                        </div>


                        {{-- TITLE --}}

                        <h3
                            class="font-bold
                                   text-lg
                                   text-gray-900
                                   leading-snug
                                   line-clamp-2
                                   group-hover:text-[#0B2A4A]
                                   transition">

                            {{ $item['judul'] }}

                        </h3>


                        {{-- EXCERPT --}}

                        <p
                            class="text-sm
                                   text-gray-500
                                   leading-relaxed
                                   mt-3
                                   line-clamp-3">

                            {{ $item['excerpt'] }}

                        </p>


                        {{-- AUTHOR --}}

                        <div
                            class="flex items-center
                                   gap-2
                                   mt-5
                                   pt-4
                                   border-t
                                   border-gray-100">

                            <div
                                class="w-7 h-7
                                       rounded-full
                                       bg-[#0B2A4A]/10
                                       flex items-center
                                       justify-center">

                                <i class="fas fa-user-tie
                                          text-xs
                                          text-[#0B2A4A]"></i>

                            </div>

                            <span
                                class="text-xs
                                       font-semibold
                                       text-gray-600">

                                {{ $item['author'] }}

                            </span>

                        </div>


                        {{-- CTA --}}

                        <a
                            href="#"
                            class="inline-flex
                                   items-center
                                   gap-2
                                   mt-5
                                   text-sm
                                   font-bold
                                   text-[#0B2A4A]
                                   hover:underline">

                            Baca Selengkapnya

                            <i class="fas fa-arrow-right text-xs"></i>

                        </a>

                    </div>

                </article>

            @endforeach

        </div>



        {{-- =====================================================
            PAGINATION
        ====================================================== --}}

        <div class="mt-12
                    flex flex-col
                    sm:flex-row
                    items-center
                    justify-between
                    gap-4">

            <p class="text-xs text-gray-500">

                Menampilkan publikasi terbaru
                Badan Bank Tanah

            </p>

            <div class="flex items-center gap-2">

                <button
                    type="button"
                    class="w-10 h-10
                           flex items-center justify-center
                           border border-gray-200
                           rounded-lg
                           bg-white
                           text-gray-400">

                    <i class="fas fa-chevron-left text-xs"></i>

                </button>

                <span
                    class="w-10 h-10
                           flex items-center justify-center
                           rounded-lg
                           bg-[#0B2A4A]
                           text-white
                           text-sm font-bold">

                    1

                </span>

                <button
                    type="button"
                    class="w-10 h-10
                           flex items-center justify-center
                           border border-gray-200
                           rounded-lg
                           bg-white
                           text-gray-600">

                    <i class="fas fa-chevron-right text-xs"></i>

                </button>

            </div>

        </div>

    </div>

</section>

@endsection