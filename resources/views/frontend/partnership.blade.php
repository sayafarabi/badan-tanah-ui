@extends('layouts.frontend')

@section('title', 'Pemanfaatan & Kerjasama Usaha')

@section('content')

    @php
        $proyekInvestasi = \App\Models\ProyekInvestasi::where('is_active', true)->orderBy('urutan')->get();
        $dokumenKerjasama = \App\Models\DokumenKerjasama::where('is_active', true)->orderBy('urutan')->get();
    @endphp

    {{-- =========================================================
    HERO
========================================================= --}}
    <section class="bg-[#0B2A4A]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-20">

            <div class="max-w-3xl">

                <div
                    class="inline-flex items-center gap-2
                        bg-white/10 border border-white/10
                        text-blue-200 text-xs font-semibold
                        px-4 py-2 rounded-full mb-5">

                    <i class="fas fa-handshake"></i>

                    Pemanfaatan & Kerjasama Usaha

                </div>

                <h1 class="text-3xl md:text-4xl lg:text-5xl
                       font-extrabold text-white leading-tight">

                    Pemanfaatan dan Kerjasama
                    <span class="text-blue-300">
                        Aset Tanah
                    </span>

                </h1>

                <p class="text-blue-100 text-base md:text-lg
                      leading-relaxed mt-5 max-w-2xl">

                    Informasi mengenai skema pemanfaatan, bentuk kerja sama,
                    prosedur, persyaratan, tahapan, dan dokumen yang diperlukan
                    dalam pemanfaatan aset tanah Badan Bank Tanah.

                </p>

                <div class="flex flex-col sm:flex-row gap-3 mt-8">

                    <a href="{{ route('assets') }}"
                        class="inline-flex items-center justify-center gap-2
                          bg-white text-[#0B2A4A]
                          px-6 py-3 rounded-lg
                          text-sm font-bold
                          hover:bg-blue-50 transition">

                        <i class="fas fa-map-location-dot"></i>

                        Lihat Aset Persediaan

                    </a>

                    <a href="{{ route('kontak') }}"
                        class="inline-flex items-center justify-center gap-2
                          border border-white/30
                          text-white
                          px-6 py-3 rounded-lg
                          text-sm font-bold
                          hover:bg-white/10 transition">

                        <i class="fas fa-comments"></i>

                        Hubungi Kami

                    </a>

                </div>

            </div>

        </div>
    </section>


    {{-- =========================================================
    INTRO
========================================================= --}}
    <section class="bg-white">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">

            <div class="grid grid-cols-1 lg:grid-cols-[1.2fr_0.8fr]
                    gap-10 items-center">

                <div>

                    <span class="text-xs font-bold uppercase
                             tracking-wider text-blue-700">
                        Tentang Pemanfaatan
                    </span>

                    <h2 class="text-2xl md:text-3xl
                           font-extrabold text-gray-900 mt-2">

                        Membuka peluang pemanfaatan
                        aset tanah secara profesional

                    </h2>

                    <div class="text-gray-600 leading-relaxed mt-5">

                        {!! nl2br(
                            e($halaman->tentang_pemanfaatan ?: $halaman->isi ?: 'Informasi mengenai pemanfaatan aset tanah Badan Bank Tanah.'),
                        ) !!}

                    </div>

                    <p class="text-gray-600 leading-relaxed mt-4">

                        Pengunjung dapat terlebih dahulu melihat aset
                        persediaan tanah, memahami karakteristik aset,
                        kemudian mempelajari skema pemanfaatan atau
                        kerja sama yang sesuai dengan kebutuhan.

                    </p>

                </div>


                {{-- INFO CARD --}}

                <div class="bg-[#0B2A4A] rounded-2xl p-7 text-white">

                    <div
                        class="w-12 h-12 rounded-xl
                            bg-white/10
                            flex items-center justify-center mb-5">
                        <i class="fas fa-layer-group
                            text-xl text-blue-200"></i>

                    </div>

                    <h3 class="text-xl font-bold">
                        Informasi Terintegrasi
                    </h3>

                    <p class="text-blue-100 text-sm leading-relaxed mt-3">

                        Mulai dari menemukan aset, memahami skema,
                        mempelajari persyaratan hingga menghubungi
                        Badan Bank Tanah.

                    </p>

                    <div class="mt-6 space-y-3">

                        <div class="flex items-center gap-3 text-sm">
                            <i class="fas fa-check text-green-400"></i>
                            Informasi skema pemanfaatan
                        </div>

                        <div class="flex items-center gap-3 text-sm">
                            <i class="fas fa-check text-green-400"></i>
                            Informasi bentuk kerja sama
                        </div>

                        <div class="flex items-center gap-3 text-sm">
                            <i class="fas fa-check text-green-400"></i>
                            Prosedur dan tahapan
                        </div>

                        <div class="flex items-center gap-3 text-sm">
                            <i class="fas fa-check text-green-400"></i>
                            Persyaratan dan dokumen
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
    SKEMA PEMANFAATAN
========================================================= --}}
    <section class="bg-gray-50 border-y border-gray-100">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

            <div class="text-center max-w-2xl mx-auto mb-10">

                <span class="text-xs font-bold uppercase
                         tracking-wider text-blue-700">

                    Skema Pemanfaatan

                </span>

                <h2 class="text-2xl md:text-3xl
                       font-extrabold text-gray-900 mt-2">

                    Pilihan pemanfaatan aset

                </h2>

                <p class="text-gray-500 text-sm leading-relaxed mt-3">

                    Contoh informasi skema yang dapat dikelola dan
                    diperbarui melalui CMS.

                </p>

            </div>


            @php
                $skemaPemanfaatan = [
                    [
                        'icon' => 'fa-city',
                        'title' => 'Pemanfaatan untuk Kegiatan Usaha',
                        'desc' =>
                            'Pemanfaatan aset tanah untuk mendukung kegiatan usaha dan pengembangan kawasan sesuai ketentuan yang berlaku.',
                    ],
                    [
                        'icon' => 'fa-handshake-angle',
                        'title' => 'Kerja Sama Pemanfaatan Aset',
                        'desc' =>
                            'Bentuk kerja sama antara Badan Bank Tanah dengan mitra untuk mengoptimalkan pemanfaatan aset tanah.',
                    ],
                    [
                        'icon' => 'fa-chart-line',
                        'title' => 'Kemitraan Investasi',
                        'desc' =>
                            'Peluang kerja sama dengan mitra dalam pengembangan aset untuk kegiatan yang produktif dan berkelanjutan.',
                    ],
                ];
            @endphp


            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                @foreach ($skemaPemanfaatan as $skema)
                    <div
                        class="bg-white rounded-2xl
                            border border-gray-200
                            shadow-sm
                            p-7
                            hover:shadow-md
                            transition">

                        <div
                            class="w-12 h-12 rounded-xl
                                bg-[#0B2A4A]/10
                                text-[#0B2A4A]
                                flex items-center justify-center">

                            <i class="fas {{ $skema['icon'] }} text-xl"></i>

                        </div>

                        <h3 class="text-lg font-bold text-gray-900 mt-5">

                            {{ $skema['title'] }}

                        </h3>

                        <p class="text-sm text-gray-500
                              leading-relaxed mt-3">

                            {{ $skema['desc'] }}

                        </p>

                        <div class="mt-5 pt-4 border-t border-gray-100">

                            <span class="text-xs font-semibold
                                     text-[#0B2A4A]">

                                Informasi skema

                                <i class="fas fa-arrow-right ml-1"></i>

                            </span>

                        </div>

                    </div>
                @endforeach

            </div>


            @if ($halaman->skema_pemanfaatan)
                <div class="mt-8 bg-white rounded-2xl border border-gray-100 p-6">

                    <h3 class="text-lg font-bold text-gray-900 mb-4">
                        Informasi Skema
                    </h3>

                    <div class="text-sm text-gray-600 leading-7">
                        {!! nl2br(e($halaman->skema_pemanfaatan)) !!}
                    </div>

                </div>
            @endif

        </div>

    </section>


    {{-- =========================================================
    BENTUK KERJA SAMA
========================================================= --}}
    <section class="bg-white">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

            <div class="flex flex-col md:flex-row
                    md:items-end md:justify-between gap-5 mb-8">

                <div>

                    <span class="text-xs font-bold uppercase
                             tracking-wider text-blue-700">

                        Bentuk Kerja Sama

                    </span>

                    <h2 class="text-2xl md:text-3xl
                           font-extrabold text-gray-900 mt-2">

                        Pilihan bentuk kerja sama usaha

                    </h2>

                </div>

                <p class="text-sm text-gray-500 max-w-md">

                    Contoh data dummy yang dapat nantinya
                    dikelola melalui CMS.

                </p>

            </div>


            @php
                $bentukKerjasama = [
                    [
                        'number' => '01',
                        'title' => 'Kerja Sama Pengembangan',
                        'desc' => 'Kerja sama dalam pengembangan aset tanah menjadi kawasan atau kegiatan produktif.',
                    ],
                    [
                        'number' => '02',
                        'title' => 'Kerja Sama Operasional',
                        'desc' => 'Kerja sama untuk mendukung pengelolaan dan operasional pemanfaatan aset.',
                    ],
                    [
                        'number' => '03',
                        'title' => 'Kemitraan Strategis',
                        'desc' =>
                            'Kemitraan dengan pihak yang memiliki kompetensi, sumber daya, atau investasi yang relevan.',
                    ],
                ];
            @endphp


            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                @foreach ($bentukKerjasama as $item)
                    <div
                        class="rounded-2xl
                            border border-gray-200
                            p-6
                            bg-gray-50">

                        <div class="flex items-center justify-between">

                            <span class="text-3xl font-extrabold
                                     text-[#0B2A4A]/20">

                                {{ $item['number'] }}

                            </span>

                            <i class="fas fa-handshake
                                    text-[#0B2A4A]/40"></i>

                        </div>

                        <h3 class="font-bold text-lg text-gray-900 mt-5">

                            {{ $item['title'] }}

                        </h3>

                        <p class="text-sm text-gray-500
                              leading-relaxed mt-3">

                            {{ $item['desc'] }}

                        </p>

                    </div>
                @endforeach

            </div>


            @if ($halaman->bentuk_kerjasama)
                <div class="mt-8 bg-white rounded-2xl border border-gray-100 p-6">

                    <h3 class="text-lg font-bold text-gray-900 mb-4">
                        Bentuk Kerjasama
                    </h3>

                    <div class="text-sm text-gray-600 leading-7">
                        {!! nl2br(e($halaman->bentuk_kerjasama)) !!}
                    </div>

                </div>
            @endif
        </div>

    </section>


    {{-- =========================================================
    PROYEK INVESTASI (Dari Database)
========================================================= --}}
    <section class="bg-gray-50 border-y border-gray-100">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

            <div class="text-center max-w-2xl mx-auto mb-10">

                <span class="text-xs font-bold uppercase
                         tracking-wider text-green-700">

                    Proyek Investasi

                </span>

                <h2 class="text-2xl md:text-3xl
                       font-extrabold text-gray-900 mt-2">

                    Proyek Investasi Badan Bank Tanah

                </h2>

                <p class="text-gray-500 text-sm leading-relaxed mt-3">

                    Daftar proyek investasi yang sedang berjalan dan dikelola
                    oleh Badan Bank Tanah.

                </p>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @forelse ($proyekInvestasi as $item)
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 hover:shadow-lg transition group">

                        @if ($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}"
                                class="w-full h-44 object-cover rounded-xl mb-4">
                        @else
                            <div class="w-full h-44 bg-gray-100 rounded-xl mb-4 flex items-center justify-center">
                                <i class="fas fa-building text-4xl text-gray-300"></i>
                            </div>
                        @endif

                        <h4 class="font-bold text-gray-900 text-lg group-hover:text-[#006400] transition">
                            {{ $item->judul }}
                        </h4>

                        <p class="text-sm text-gray-500 mt-1">
                            <i class="fas fa-location-dot text-[#006400] mr-1"></i>
                            {{ $item->lokasi }}
                        </p>

                        <div class="flex items-center gap-2 mt-3">
                            <span
                                class="text-xs font-bold px-2.5 py-1 rounded-full
                            {{ $item->status == 'Aktif'
                                ? 'bg-green-50 text-green-700'
                                : ($item->status == 'Dalam Proses'
                                    ? 'bg-orange-50 text-orange-700'
                                    : 'bg-blue-50 text-blue-700') }}">
                                {{ $item->status }}
                            </span>
                            <span class="text-xs bg-gray-100 text-gray-600 px-2.5 py-1 rounded-full">
                                {{ $item->sektor }}
                            </span>
                        </div>

                        @if ($item->nilai_investasi)
                            <p class="text-sm font-bold text-[#006400] mt-3">
                                Rp {{ number_format($item->nilai_investasi, 0, ',', '.') }}
                            </p>
                        @endif

                        <p class="text-sm text-gray-600 mt-2 line-clamp-2">
                            {{ $item->deskripsi }}
                        </p>

                    </div>
                @empty
                    <div class="col-span-3 text-center text-gray-500 py-12">
                        <i class="fas fa-chart-line text-4xl text-gray-300 block mb-3"></i>
                        <p class="text-sm">Belum ada proyek investasi yang tersedia.</p>
                    </div>
                @endforelse

            </div>

        </div>

    </section>


    {{-- =========================================================
    DOKUMEN & BOOKLET (Dari Database)
========================================================= --}}
    <section class="bg-white">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

            <div class="text-center max-w-2xl mx-auto mb-10">

                <span class="text-xs font-bold uppercase
                         tracking-wider text-purple-700">

                    Dokumen & Booklet

                </span>

                <h2 class="text-2xl md:text-3xl
                       font-extrabold text-gray-900 mt-2">

                    Dokumen & Booklet Kerjasama

                </h2>

                <p class="text-gray-500 text-sm leading-relaxed mt-3">

                    Unduh dokumen dan booklet informasi kerjasama
                    Badan Bank Tanah.

                </p>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 max-w-3xl mx-auto">

                @forelse ($dokumenKerjasama as $item)
                    <a href="{{ route('dokumen.download', $item->id) }}"
                        class="flex items-center gap-4 p-4 bg-gray-50 border border-gray-100 rounded-xl hover:shadow-md hover:bg-white transition group">

                        <div
                            class="w-14 h-14 rounded-xl bg-red-50 text-red-500 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-file-pdf text-2xl"></i>
                        </div>

                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-800 group-hover:text-[#006400] transition truncate">
                                {{ $item->judul }}
                            </p>
                            <p class="text-xs text-gray-400">
                                {{ $item->ukuran ?? 'PDF' }} • {{ ucfirst($item->kategori) }}
                            </p>
                        </div>

                        <i class="fas fa-download text-gray-400 group-hover:text-[#006400] transition text-sm"></i>

                    </a>
                @empty
                    <div class="col-span-2 text-center text-gray-500 py-12">
                        <i class="fas fa-file-pdf text-4xl text-gray-300 block mb-3"></i>
                        <p class="text-sm">Belum ada dokumen yang tersedia.</p>
                    </div>
                @endforelse

            </div>

        </div>

    </section>


    {{-- =========================================================
    PROSEDUR / TAHAPAN
========================================================= --}}
    <section class="bg-gray-50 border-y border-gray-100">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

            <div class="text-center max-w-2xl mx-auto mb-12">

                <span class="text-xs font-bold uppercase
                         tracking-wider text-blue-700">

                    Prosedur & Tahapan

                </span>

                <h2 class="text-2xl md:text-3xl
                       font-extrabold text-gray-900 mt-2">

                    Bagaimana prosesnya?

                </h2>

                <p class="text-gray-500 text-sm mt-3">

                    Gambaran alur informasi pemanfaatan dan kerja sama
                    dari pencarian aset hingga komunikasi lebih lanjut.

                </p>

            </div>


            @php
                $tahapan = [
                    [
                        'number' => '01',
                        'icon' => 'fa-map-location-dot',
                        'title' => 'Temukan Aset',
                        'desc' => 'Cari dan lihat informasi aset persediaan tanah yang sesuai dengan kebutuhan.',
                    ],
                    [
                        'number' => '02',
                        'icon' => 'fa-book-open',
                        'title' => 'Pelajari Skema',
                        'desc' => 'Pahami pilihan pemanfaatan dan bentuk kerja sama yang tersedia.',
                    ],
                    [
                        'number' => '03',
                        'icon' => 'fa-file-circle-check',
                        'title' => 'Siapkan Persyaratan',
                        'desc' => 'Pelajari persyaratan dan dokumen yang diperlukan untuk proses selanjutnya.',
                    ],
                    [
                        'number' => '04',
                        'icon' => 'fa-headset',
                        'title' => 'Hubungi Badan Bank Tanah',
                        'desc' => 'Sampaikan kebutuhan dan lanjutkan komunikasi melalui kanal kontak yang tersedia.',
                    ],
                ];
            @endphp


            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                @foreach ($tahapan as $step)
                    <div class="relative">

                        <div
                            class="bg-white rounded-2xl
                                border border-gray-200
                                shadow-sm p-6 h-full">
                            <div
                                class="w-11 h-11 rounded-xl
                                    bg-[#0B2A4A]
                                    text-white
                                    flex items-center justify-center">

                                <i class="fas {{ $step['icon'] }} text-sm"></i>

                            </div>

                            <span
                                class="absolute top-3 right-4
                                text-[10px] font-bold
                                text-[#0B2A4A]/30">

                                {{ $step['number'] }}

                            </span>

                            <h3 class="font-bold text-gray-900 mt-5">

                                {{ $step['title'] }}

                            </h3>

                            <p class="text-sm text-gray-500
                                  leading-relaxed mt-3">

                                {{ $step['desc'] }}

                            </p>

                        </div>

                    </div>
                @endforeach

            </div>


            @if ($halaman->prosedur_tahapan)
                <div class="mt-8 bg-white rounded-2xl border border-gray-100 p-6">

                    <h3 class="text-lg font-bold text-gray-900 mb-4">
                        Prosedur & Tahapan
                    </h3>

                    <div class="text-sm text-gray-600 leading-7">
                        {!! nl2br(e($halaman->prosedur_tahapan)) !!}
                    </div>

                </div>
            @endif

        </div>

    </section>


    {{-- =========================================================
    PERSYARATAN & DOKUMEN
========================================================= --}}
    <section class="bg-white">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">


                {{-- PERSYARATAN --}}

                <div
                    class="bg-white rounded-2xl
                        border border-gray-200
                        shadow-sm p-7">

                    <div class="flex items-center gap-4 mb-6">

                        <div
                            class="w-11 h-11 rounded-xl
                                bg-green-50
                                text-green-700
                                flex items-center justify-center">

                            <i class="fas fa-clipboard-check"></i>

                        </div>

                        <div>

                            <h2 class="text-xl font-bold text-gray-900">
                                Persyaratan
                            </h2>

                            <p class="text-sm text-gray-500">
                                Contoh persyaratan awal
                            </p>

                        </div>

                    </div>


                    @if ($halaman->persyaratan)
                        <div class="space-y-4">

                            <div class="text-sm text-gray-600 leading-7">
                                {!! nl2br(e($halaman->persyaratan)) !!}
                            </div>

                        </div>
                    @else
                        <div class="text-sm text-gray-400">
                            Informasi persyaratan belum tersedia.
                        </div>
                    @endif
                </div>

            </div>



            {{-- DOKUMEN --}}

            <div
                class="bg-white rounded-2xl
                        border border-gray-200
                        shadow-sm p-7">

                <div class="flex items-center gap-4 mb-6">

                    <div
                        class="w-11 h-11 rounded-xl
                                bg-blue-50
                                text-blue-700
                                flex items-center justify-center">

                        <i class="fas fa-file-lines"></i>

                    </div>

                    <div>

                        <h2 class="text-xl font-bold text-gray-900">
                            Dokumen
                        </h2>

                        <p class="text-sm text-gray-500">
                            Contoh dokumen pendukung
                        </p>

                    </div>

                </div>


                @php
                    $dokumen = [
                        'Profil calon mitra atau badan usaha.',
                        'Proposal pemanfaatan atau rencana kegiatan.',
                        'Dokumen legalitas yang relevan.',
                        'Dokumen teknis pendukung.',
                        'Dokumen lain sesuai skema kerja sama.',
                    ];
                @endphp


                <div class="space-y-4">

                    @foreach ($dokumen as $item)
                        <div
                            class="flex items-center gap-3
                                    p-3 rounded-lg
                                    bg-gray-50">

                            <i class="fas fa-file-pdf
                                      text-red-500"></i>

                            <span class="text-sm text-gray-600">

                                {{ $item }}

                            </span>

                        </div>
                    @endforeach

                </div>

            </div>

        </div>


        @if ($halaman->persyaratan)
            <div class="mt-8 bg-white rounded-2xl border border-gray-100 p-6">

                <h3 class="text-lg font-bold text-gray-900 mb-4">
                    Persyaratan
                </h3>

                <div class="text-sm text-gray-600 leading-7">
                    {!! nl2br(e($halaman->persyaratan)) !!}
                </div>

            </div>
        @endif

        </div>

    </section>


    {{-- =========================================================
    FAQ
========================================================= --}}
    <section class="bg-gray-50 border-y border-gray-100">

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

            <div class="text-center mb-10">

                <span class="text-xs font-bold uppercase
                         tracking-wider text-blue-700">

                    FAQ

                </span>

                <h2 class="text-2xl md:text-3xl
                       font-extrabold text-gray-900 mt-2">

                    Pertanyaan yang sering diajukan

                </h2>

            </div>


            <div class="space-y-4">


                <details
                    class="group bg-white rounded-xl
                            border border-gray-200
                            shadow-sm">

                    <summary
                        class="cursor-pointer
                                list-none
                                p-5
                                flex items-center
                                justify-between
                                font-semibold
                                text-gray-900">

                        Bagaimana cara melihat aset yang tersedia?

                        <i
                            class="fas fa-chevron-down
                              text-gray-400
                              group-open:rotate-180
                              transition"></i>

                    </summary>

                    <div
                        class="px-5 pb-5
                            text-sm text-gray-500
                            leading-relaxed">

                        Pengunjung dapat membuka halaman
                        Aset Persediaan Tanah untuk melihat daftar
                        aset dan informasi lokasi, luas, peruntukan,
                        skema, serta status aset.

                    </div>

                </details>



                <details
                    class="group bg-white rounded-xl
                            border border-gray-200
                            shadow-sm">

                    <summary
                        class="cursor-pointer
                                list-none
                                p-5
                                flex items-center
                                justify-between
                                font-semibold
                                text-gray-900">

                        Bagaimana mengetahui skema yang sesuai?

                        <i
                            class="fas fa-chevron-down
                              text-gray-400
                              group-open:rotate-180
                              transition"></i>

                    </summary>

                    <div
                        class="px-5 pb-5
                            text-sm text-gray-500
                            leading-relaxed">

                        Pelajari informasi skema pemanfaatan dan
                        bentuk kerja sama pada halaman ini, kemudian
                        sesuaikan dengan kebutuhan pemanfaatan aset
                        yang dipilih.

                    </div>

                </details>



                <details
                    class="group bg-white rounded-xl
                            border border-gray-200
                            shadow-sm">

                    <summary
                        class="cursor-pointer
                                list-none
                                p-5
                                flex items-center
                                justify-between
                                font-semibold
                                text-gray-900">

                        Apa saja dokumen yang diperlukan?

                        <i
                            class="fas fa-chevron-down
                              text-gray-400
                              group-open:rotate-180
                              transition"></i>

                    </summary>

                    <div
                        class="px-5 pb-5
                            text-sm text-gray-500
                            leading-relaxed">

                        Persyaratan dan dokumen dapat berbeda
                        berdasarkan kebutuhan dan bentuk kerja sama.
                        Informasi pada halaman ini merupakan contoh
                        data dummy dan perlu disesuaikan dengan
                        ketentuan resmi.

                    </div>

                </details>



                <details
                    class="group bg-white rounded-xl
                            border border-gray-200
                            shadow-sm">

                    <summary
                        class="cursor-pointer
                                list-none
                                p-5
                                flex items-center
                                justify-between
                                font-semibold
                                text-gray-900">

                        Bagaimana cara melanjutkan proses?

                        <i
                            class="fas fa-chevron-down
                              text-gray-400
                              group-open:rotate-180
                              transition"></i>

                    </summary>

                    <div
                        class="px-5 pb-5
                            text-sm text-gray-500
                            leading-relaxed">

                        Setelah memahami aset dan skema yang
                        dibutuhkan, calon mitra dapat menghubungi
                        Badan Bank Tanah melalui kanal kontak yang
                        tersedia untuk memperoleh informasi lebih lanjut.

                    </div>

                </details>

            </div>

        </div>

    </section>


    {{-- =========================================================
    CTA
========================================================= --}}
    <section class="bg-[#0B2A4A]">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">

            <div
                class="rounded-2xl
                    bg-white/5
                    border border-white/10
                    p-8 md:p-10
                    flex flex-col lg:flex-row
                    lg:items-center
                    lg:justify-between
                    gap-8">

                <div>

                    <span class="text-xs font-bold uppercase
                             tracking-wider text-blue-300">

                        Mulai dari sini

                    </span>

                    <h2 class="text-2xl md:text-3xl
                           font-extrabold text-white mt-2">

                        Temukan peluang pemanfaatan aset

                    </h2>

                    <p class="text-blue-100 text-sm
                          leading-relaxed mt-3 max-w-2xl">

                        Lihat aset persediaan tanah, pelajari
                        informasi pemanfaatan dan kerja sama,
                        kemudian hubungi Badan Bank Tanah untuk
                        informasi lebih lanjut.

                    </p>

                </div>


                <div class="flex flex-col sm:flex-row gap-3 shrink-0">

                    <a href="{{ route('assets') }}"
                        class="inline-flex items-center
                          justify-center gap-2
                          bg-white
                          text-[#0B2A4A]
                          px-6 py-3
                          rounded-lg
                          text-sm font-bold
                          hover:bg-blue-50 transition">

                        <i class="fas fa-map-location-dot"></i>

                        Lihat Aset

                    </a>

                    <a href="{{ route('kontak') }}"
                        class="inline-flex items-center
                          justify-center gap-2
                          border border-white/30
                          text-white
                          px-6 py-3
                          rounded-lg
                          text-sm font-bold
                          hover:bg-white/10 transition">

                        <i class="fas fa-phone"></i>

                        Kontak

                    </a>

                </div>

            </div>

        </div>

    </section>

@endsection
