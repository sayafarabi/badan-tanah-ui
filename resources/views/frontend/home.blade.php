@extends('layouts.frontend')

@section('title', 'Beranda')

@section('content')

    <!-- HERO SLIDER -->
    <div id="heroSlider" class="relative h-[650px] overflow-hidden">

        <!-- FOTO 1 -->
        <div class="hero-slide absolute inset-0 bg-cover bg-center opacity-100 transition-opacity duration-1000"
            style="background-image: url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?q=80&w=2000&auto=format&fit=crop');">
        </div>

        <!-- FOTO 2 -->
        <div class="hero-slide absolute inset-0 bg-cover bg-center opacity-0 transition-opacity duration-1000"
            style="background-image: url('https://images.unsplash.com/photo-1441974231531-c6227db76b6e?q=80&w=2000&auto=format&fit=crop');">
        </div>

        <!-- FOTO 3 -->
        <div class="hero-slide absolute inset-0 bg-cover bg-center opacity-0 transition-opacity duration-1000"
            style="background-image: url('https://images.unsplash.com/photo-1500534623283-312aade485b7?q=80&w=2000&auto=format&fit=crop');">
        </div>


        <!-- OVERLAY -->
        <div
            class="absolute inset-0 bg-gradient-to-r
                    from-[#0B2A4A]/90
                    via-[#0B2A4A]/50
                    to-transparent z-10">
        </div>


        <!-- KONTEN HERO -->
        <div class="relative z-20 max-w-7xl mx-auto px-4 h-full
                    flex flex-col justify-center">

            <span class="text-blue-200 text-sm font-semibold
                         uppercase tracking-widest mb-4">
                Badan Bank Tanah
            </span>

            <h1 class="text-5xl font-bold text-white mb-6 leading-tight">
                {{ $pengaturan->judul_hero ?? 'Mengelola Tanah, Memajukan Negeri' }}
            </h1>

            <p class="text-white/90 text-lg mb-10 max-w-xl leading-relaxed">
                {{ $pengaturan->subjudul_hero ??
                    'Badan Bank Tanah mengelola aset tanah negara secara profesional, transparan, dan berkelanjutan untuk kepentingan rakyat.' }}
            </p>

            <div class="flex flex-col items-start ml-4">

                <!-- TOMBOL SELENGKAPNYA -->
                <a href="{{ $pengaturan->tombol_link ?? '/aset' }}"
                    class="bg-[#1D4ED8] hover:bg-[#1E40AF]
               text-white px-8 py-4 rounded
               font-bold transition w-max">
                    {{ $pengaturan->tombol_text ?? 'Selengkapnya' }}
                </a>

                <!-- 3 TITIK SLIDER -->
                <div class="flex items-center gap-2 mt-5 ml-6">

                    <button type="button"
                        class="hero-dot w-2.5 h-2.5 rounded-full
                   bg-white transition-all duration-300"
                        data-slide="0" aria-label="Slide 1">
                    </button>

                    <button type="button"
                        class="hero-dot w-2.5 h-2.5 rounded-full
                   bg-white/50 transition-all duration-300"
                        data-slide="1" aria-label="Slide 2">
                    </button>

                    <button type="button"
                        class="hero-dot w-2.5 h-2.5 rounded-full
                   bg-white/50 transition-all duration-300"
                        data-slide="2" aria-label="Slide 3">
                    </button>

                </div>

            </div>

        </div>


        <!-- DOT SLIDER -->
        <div class="absolute z-30 bottom-8 left-1/2
                    -translate-x-1/2 flex gap-2">

            <button type="button" class="hero-dot w-2.5 h-2.5 rounded-full bg-white transition-all" data-slide="0">
            </button>

            <button type="button" class="hero-dot w-2.5 h-2.5 rounded-full bg-white/50 transition-all" data-slide="1">
            </button>

            <button type="button" class="hero-dot w-2.5 h-2.5 rounded-full bg-white/50 transition-all" data-slide="2">
            </button>

        </div>

    </div>


    <!-- Statistik Section (Floating Card) -->

    <div class="w-full px-0 -mt-20 relative z-10">
        <div class="w-full bg-white rounded-2xl shadow-lg px-6 md:px-10 py-6">

            <div class="grid grid-cols-1 md:grid-cols-5">

                <!-- Total Luas Aset -->
                <div class="flex items-center justify-center gap-4 px-6 py-4 min-w-0">
                    <div
                        class="w-14 h-14 rounded-full bg-blue-50 text-blue-700 flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-layer-group text-xl"></i>
                    </div>

                    <div class="text-left min-w-0">
                        <div class="text-sm text-gray-500 font-medium whitespace-nowrap">
                            Total Luas Aset
                        </div>

                        <div class="text-2xl font-extrabold text-gray-900 whitespace-nowrap">
                            420.000 Ha
                        </div>

                        <div class="text-xs text-gray-400 whitespace-nowrap">
                            +2% dari tahun lalu
                        </div>
                    </div>
                </div>


                <!-- Lokasi Aset -->
                <div class="flex items-center justify-center gap-4 px-6 py-4 min-w-0">
                    <div
                        class="w-14 h-14 rounded-full bg-blue-50 text-blue-700 flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-location-dot text-xl"></i>
                    </div>

                    <div class="text-left min-w-0">
                        <div class="text-sm text-gray-500 font-medium whitespace-nowrap">
                            Lokasi Aset
                        </div>

                        <div class="text-2xl font-extrabold text-gray-900 whitespace-nowrap">
                            1.248
                        </div>

                        <div class="text-xs text-gray-400 whitespace-nowrap">
                            Bidang Tanah
                        </div>
                    </div>
                </div>


                <!-- Wilayah -->
                <div class="flex items-center justify-center gap-4 px-6 py-4 min-w-0">
                    <div
                        class="w-14 h-14 rounded-full bg-blue-50 text-blue-700 flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-building text-xl"></i>
                    </div>

                    <div class="text-left min-w-0">
                        <div class="text-sm text-gray-500 font-medium whitespace-nowrap">
                            Wilayah
                        </div>

                        <div class="text-2xl font-extrabold text-gray-900 whitespace-nowrap">
                            18
                        </div>

                        <div class="text-xs text-gray-400 whitespace-nowrap">
                            Provinsi
                        </div>
                    </div>
                </div>


                <!-- Kerja Sama -->
                <div class="flex items-center justify-center gap-4 px-6 py-4 min-w-0">
                    <div
                        class="w-14 h-14 rounded-full bg-blue-50 text-blue-700 flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-users text-xl"></i>
                    </div>

                    <div class="text-left min-w-0">
                        <div class="text-sm text-gray-500 font-medium whitespace-nowrap">
                            Kerja Sama Aktif
                        </div>

                        <div class="text-2xl font-extrabold text-gray-900 whitespace-nowrap">
                            32
                        </div>

                        <div class="text-xs text-gray-400 whitespace-nowrap">
                            Mitra Strategis
                        </div>
                    </div>
                </div>


                <!-- Nilai Aset -->
                <div class="flex items-center justify-center gap-4 px-6 py-4 min-w-0">
                    <div
                        class="w-14 h-14 rounded-full bg-blue-50 text-blue-700 flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-chart-line text-xl"></i>
                    </div>

                    <div class="text-left min-w-0">
                        <div class="text-sm text-gray-500 font-medium whitespace-nowrap">
                            Nilai Aset
                        </div>

                        <div class="text-2xl font-extrabold text-blue-700 whitespace-nowrap">
                            Rp 68,45 T
                        </div>

                        <div class="text-xs text-gray-400 whitespace-nowrap">
                            Estimasi Nilai
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- ASET & PETA SECTION -->
    <div class="max-w-7xl mx-auto px-4 py-20 bg-white rounded-2xl shadow-sm">

        <div class="grid grid-cols-1 lg:grid-cols-[1.35fr_0.85fr] gap-10 bg-white rounded-2xl shadow-sm p-6">

            <!-- ========================= -->
            <!-- ASET PERSEDIAAN TANAH -->
            <!-- ========================= -->

            <div class="min-w-0 bg-white rounded-xl shadow-md p-5">

                <!-- HEADER -->
                <div class="flex items-end justify-between mb-5">

                    <div>
                        <h2 class="text-lg font-bold text-gray-900">
                            Aset Persediaan Tanah
                        </h2>
                    </div>

                    <a href="{{ route('assets') }}" class="text-[10px] font-semibold text-blue-700 hover:underline">
                        Lihat Semua
                    </a>

                </div>


                <!-- SLIDER -->
                <div class="relative overflow-hidden w-full">

                    <div id="assetSlider" class="flex transition-transform duration-500 ease-in-out">

                        @foreach ($asets as $aset)
                            <!-- CARD -->
                            <div class="asset-card w-1/3 flex-shrink-0 px-2">

                                <div class="bg-white rounded-2xl p-4 min-h-[150px] -mt-3 relative z-10">

                                    <!-- GAMBAR -->
                                    <div class="h-40 relative">

                                        <img src="{{ $aset->gambar ? asset('storage/' . $aset->gambar) : 'https://picsum.photos/600/400?random=' . $aset->id }}"
                                            class="w-full h-full object-cover" alt="{{ $aset->nama_lokasi }}">

                                        <!-- STATUS -->
                                        <span
                                            class="absolute top-3 left-3 text-white text-[10px] px-3 py-1 rounded font-bold uppercase
                                            {{ $aset->status == 'Tersedia' ? 'bg-green-700' : 'bg-blue-700' }}">

                                            {{ $aset->status }}

                                        </span>

                                    </div>

                                    <!-- BAGIAN PUTIH NAIK -->
                                    <div class="relative -mt-3 bg-white rounded-t-xl px-4 pt-4 pb-4">

                                        <h3 class="text-sm font-bold text-gray-900 leading-snug">
                                            {{ $aset->nama_lokasi }}
                                        </h3>

                                        <p class="text-xs text-gray-500 mt-1">
                                            {{ $aset->provinsi }}, {{ $aset->kabupaten }}
                                        </p>

                                        <p class="text-sm font-bold text-green-600 mt-2">
                                            {{ number_format($aset->luas_hektar, 2, ',', '.') }} Ha
                                        </p>

                                    </div>

                                </div>

                            </div>
                        @endforeach

                    </div>

                </div>


                <!-- DOT SLIDER -->
                <div id="assetDots" class="flex justify-center items-center gap-2 mt-4">

                    @foreach ($asets as $index => $aset)
                        <button type="button"
                            class="asset-dot w-2.5 h-2.5 rounded-full transition-all duration-300
                        {{ $index === 0 ? 'bg-blue-700' : 'bg-gray-300' }}"
                            data-slide="{{ $index }}" aria-label="Slide {{ $index + 1 }}">
                        </button>
                    @endforeach

                </div>
            </div>



            <!-- PETA INTERAKTIF -->
            <div class="min-w-0 bg-white rounded-2xl shadow-sm p-6">

                <!-- HEADER -->
                <div class="flex items-end justify-between mb-5">

                    <div>
                        <h2 class="text-lg font-bold text-gray-900">
                            Peta Interaktif
                        </h2>
                    </div>

                    <a href="{{ route('assets') }}" class="text-[10px] font-semibold text-blue-700 hover:underline">
                        Lihat Peta
                    </a>

                </div>

                <!-- MAP -->
                <div id="map" class="w-full h-[300px] rounded-xl shadow-md border border-gray-200 bg-blue-50">
                </div>

                <!-- LEGEND -->
                <div class="flex flex-wrap items-center gap-3 mt-4 text-[10px] text-gray-600">

                    <div class="flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-green-700"></span>
                        Tersedia
                    </div>

                    <div class="flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                        Dalam Pengembangan
                    </div>

                    <div class="flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-orange-500"></span>
                        Dalam Proses
                    </div>

                </div>

            </div>
        </div>

    </div>


    <!-- ===================================================== -->
    <!-- PEMANFAATAN & KERJA SAMA + PUBLIKASI TERBARU -->
    <!-- ===================================================== -->

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

        <div class="grid grid-cols-1 lg:grid-cols-5 gap-10">

            <!-- ========================================= -->
            <!-- PEMANFAATAN & KERJA SAMA -->
            <!-- ========================================= -->

            <div class="lg:col-span-3">

                <!-- HEADER -->
                <div class="flex items-end justify-between mb-7">

                    <h2 class="text-2xl font-bold text-gray-900">
                        Pemanfaatan & Kerja Sama
                    </h2>

                    <a href="{{ route('partnership') }}" class="text-xs font-semibold text-blue-700 hover:underline">
                        Lihat Semua
                    </a>

                </div>


                <!-- 4 ITEM -->
                <div class="grid grid-cols-4 gap-6 items-stretch">

                    <!-- INVESTASI -->
                    <div class="text-center flex flex-col items-center">

                        <div
                            class="w-16 h-16 rounded-full bg-blue-50
                                flex items-center justify-center mb-4">

                            <i class="fas fa-chart-line text-blue-600 text-2xl"></i>

                        </div>

                        <h3 class="text-base font-bold text-gray-900">
                            Investasi
                        </h3>

                        <div class="h-14 flex items-start justify-center mt-1">
                            <p class="text-xs text-gray-500 leading-relaxed">
                                Pemanfaatan tanah untuk investasi produktif.
                            </p>
                        </div>

                        <a href="{{ route('partnership') }}"
                            class="text-xs text-blue-700 font-semibold mt-auto pt-4 hover:underline">
                            Selengkapnya
                        </a>

                    </div>


                    <!-- REFORMA AGRARIA -->
                    <div class="text-center flex flex-col items-center">

                        <div
                            class="w-16 h-16 rounded-full bg-green-50
                                flex items-center justify-center mb-4">

                            <i class="fas fa-leaf text-green-600 text-2xl"></i>

                        </div>

                        <h3 class="text-base font-bold text-gray-900">
                            Reforma Agraria
                        </h3>

                        <div class="h-14 flex items-start justify-center mt-1">
                            <p class="text-xs text-gray-500 leading-relaxed">
                                Mendukung pemerataan akses dan pemanfaatan tanah.
                            </p>
                        </div>

                        <a href="{{ route('partnership') }}"
                            class="text-xs text-blue-700 font-semibold mt-auto pt-4 hover:underline">
                            Selengkapnya
                        </a>

                    </div>


                    <!-- KERJA SAMA -->
                    <div class="text-center flex flex-col items-center">

                        <div
                            class="w-16 h-16 rounded-full bg-yellow-50
                                flex items-center justify-center mb-4">

                            <i class="fas fa-handshake text-yellow-600 text-2xl"></i>

                        </div>

                        <h3 class="text-base font-bold text-gray-900">
                            Kerja Sama
                        </h3>

                        <div class="h-14 flex items-start justify-center mt-1">
                            <p class="text-xs text-gray-500 leading-relaxed">
                                Kolaborasi strategis dalam pengelolaan tanah.
                            </p>
                        </div>

                        <a href="{{ route('partnership') }}"
                            class="text-xs text-blue-700 font-semibold mt-auto pt-4 hover:underline">
                            Selengkapnya
                        </a>

                    </div>


                    <!-- DOKUMEN -->
                    <div class="text-center flex flex-col items-center">

                        <div
                            class="w-16 h-16 rounded-full bg-purple-50
                                flex items-center justify-center mb-4">

                            <i class="fas fa-file-lines text-purple-600 text-2xl"></i>

                        </div>

                        <h3 class="text-base font-bold text-gray-900">
                            Dokumen
                        </h3>

                        <div class="h-14 flex items-start justify-center mt-1">
                            <p class="text-xs text-gray-500 leading-relaxed">
                                Informasi dan dokumen terkait pemanfaatan tanah.
                            </p>
                        </div>

                        <a href="{{ route('publications') }}"
                            class="text-xs text-blue-700 font-semibold mt-auto pt-4 hover:underline">
                            Selengkapnya
                        </a>

                    </div>

                </div>

            </div>


            <!-- ========================================= -->
            <!-- PUBLIKASI TERBARU -->
            <!-- ========================================= -->

            <div class="lg:col-span-2">

                <!-- HEADER -->
                <div class="flex items-end justify-between mb-7">

                    <h2 class="text-2xl font-bold text-gray-900">
                        Publikasi Terbaru
                    </h2>

                    <a href="{{ route('publications') }}" class="text-xs font-semibold text-blue-700 hover:underline">
                        Lihat Semua
                    </a>

                </div>


                <!-- 3 CARD PUBLIKASI -->
                <div class="space-y-3">

                    @foreach ($berita->take(3) as $item)
                        <a href="{{ route('publications.show', $item->id) }}"
                            class="group flex items-center h-[72px]
                               bg-white rounded-lg overflow-hidden
                               border border-gray-100 shadow-sm
                               hover:shadow-md transition-all duration-300">

                            <!-- GAMBAR -->
                            <div
                                class="w-[76px] h-full flex-shrink-0
                                    overflow-hidden bg-gray-100">

                                @if ($item->gambar)
                                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}"
                                        class="w-full h-full object-cover
                                           group-hover:scale-105
                                           transition-transform duration-500">
                                @else
                                    <img src="https://picsum.photos/300/200?random={{ $item->id }}"
                                        alt="{{ $item->judul }}"
                                        class="w-full h-full object-cover
                                           group-hover:scale-105
                                           transition-transform duration-500">
                                @endif

                            </div>


                            <!-- INFORMASI -->
                            <div class="flex-1 min-w-0 px-3 py-2">

                                <!-- KATEGORI -->
                                <span
                                    class="inline-block text-[8px] font-bold uppercase
                                       px-1.5 py-0.5 rounded-full
                                       {{ $item->kategori == 'Siaran Pers' ? 'bg-blue-50 text-blue-700' : 'bg-green-50 text-green-700' }}">

                                    {{ $item->kategori }}

                                </span>


                                <!-- JUDUL -->
                                <h3
                                    class="text-[11px] font-bold text-gray-900
                                       leading-tight mt-1 line-clamp-1
                                       group-hover:text-blue-700
                                       transition-colors">

                                    {{ $item->judul }}

                                </h3>


                                <!-- TANGGAL -->
                                <p class="text-[8px] text-gray-400 mt-1">

                                    {{ $item->tanggal_publikasi
                                        ? \Carbon\Carbon::parse($item->tanggal_publikasi)->format('d M Y')
                                        : $item->created_at?->format('d M Y') }}

                                </p>

                            </div>

                        </a>
                    @endforeach

                </div>

            </div>

        </div>

    </section>


    <!-- CTA Section -->
    <div class="bg-[#0B2A4A] relative overflow-hidden">
        <div
            class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1441974231531-c6227db76b6e?q=80&w=1600&auto=format&fit=crop')] bg-cover bg-center opacity-20">
        </div>

        <div class="relative max-w-7xl mx-auto px-4 py-20 flex flex-col md:flex-row items-center justify-between gap-8">
            <div>
                <h2 class="text-4xl font-bold text-white mb-3">Bersama Mengelola Tanah</h2>
                <p class="text-blue-200 text-lg">untuk Masa Depan Indonesia yang lebih baik.</p>
            </div>
            <a href="{{ route('partnership') }}"
                class="self-start bg-white text-[#0B2A4A] hover:bg-gray-100 px-8 py-4 rounded font-bold transition shrink-0">
                Pelajari Lebih Lanjut
            </a>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var map = L.map('map').setView([-2.5, 118.0], 5);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        var markers = [{
                lat: -6.9,
                lng: 109.7,
                type: 'green'
            },
            {
                lat: -3.3,
                lng: 114.5,
                type: 'blue'
            },
            {
                lat: -8.5,
                lng: 140.4,
                type: 'orange'
            }
        ];

        markers.forEach(function(marker) {
            var color = marker.type === 'green' ? '#16a34a' : (marker.type === 'blue' ? '#3b82f6' : '#f97316');
            L.circleMarker([marker.lat, marker.lng], {
                color: color,
                fillColor: color,
                fillOpacity: 0.6,
                radius: 10
            }).addTo(map).bindPopup('<b>Lokasi Aset</b><br>Klik untuk detail');
        });
    </script>
@endpush
