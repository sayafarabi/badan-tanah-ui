@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

    <div class="max-w-7xl mx-auto space-y-6">

    
        {{-- HEADER DASHBOARD --}}

        <div class="flex items-center justify-between">

            <div>
                <h1 class="text-2xl font-bold text-gray-900">
                    Dashboard
                </h1>

                <p class="text-sm text-gray-500 mt-1">
                    Kelola dan pantau aktivitas Badan Bank Tanah melalui dashboard admin.
                </p>
            </div>

            <div class="text-xs text-gray-400">
                {{ now()->format('d M Y') }}
            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- PESAN ROLE --}}
        {{-- ========================================================= --}}

        <div class="bg-green-50 border border-green-100 rounded-xl px-4 py-3">

            <div class="flex items-center gap-3">

                <div class="w-9 h-9 rounded-lg bg-green-100 flex items-center justify-center">
                    <i class="fas fa-shield-halved text-green-600"></i>
                </div>

                <div class="text-sm text-green-800">

                    @if (auth()->user()->role == 'super_admin')
                        <strong>Selamat datang, Super Admin!</strong>
                        Anda memiliki akses penuh ke semua fitur termasuk Manajemen Pengguna.
                    @elseif(auth()->user()->role == 'admin')
                        <strong>Selamat datang, Admin!</strong>
                        Anda dapat mengelola Aset, Berita, dan Halaman Statis.
                    @elseif(auth()->user()->role == 'editor')
                        <strong>Selamat datang, Editor!</strong>
                        Anda hanya dapat membuat dan mengedit draft Berita.
                    @elseif(auth()->user()->role == 'publisher')
                        <strong>Selamat datang, Publisher!</strong>
                        Anda dapat mereview dan mempublikasikan Berita.
                    @else
                        <strong>Selamat datang!</strong>
                        Anda hanya dapat mengakses beberapa fitur terbatas.
                    @endif

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- STATISTIK --}}
        {{-- ========================================================= --}}

        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">

            {{-- TOTAL ASET --}}
            <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-5">

                <div class="flex items-center justify-between">

                    <div>
                        <p class="text-xs font-medium text-gray-500">
                            Total Aset
                        </p>

                        <h3 class="text-2xl font-bold text-gray-900 mt-2">
                            {{ $totalAset }}
                        </h3>

                        <p class="text-[11px] text-green-600 mt-1">
                            <i class="fas fa-arrow-up mr-1"></i>
                            12% dari bulan lalu
                        </p>
                    </div>

                    <div class="w-11 h-11 rounded-xl bg-green-50 flex items-center justify-center">
                        <i class="fas fa-map-location-dot text-green-600"></i>
                    </div>

                </div>

            </div>


            {{-- TOTAL BERITA --}}
            <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-5">

                <div class="flex items-center justify-between">

                    <div>
                        <p class="text-xs font-medium text-gray-500">
                            Total Berita
                        </p>

                        <h3 class="text-2xl font-bold text-gray-900 mt-2">
                            {{ $totalBerita }}
                        </h3>

                        <p class="text-[11px] text-blue-600 mt-1">
                            <i class="fas fa-arrow-up mr-1"></i>
                            14% dari bulan lalu
                        </p>
                    </div>

                    <div class="w-11 h-11 rounded-xl bg-blue-50 flex items-center justify-center">
                        <i class="fas fa-newspaper text-blue-600"></i>
                    </div>

                </div>

            </div>


            {{-- TOTAL PENGUNJUNG --}}
            <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-5">

                <div class="flex items-center justify-between">

                    <div>
                        <p class="text-xs font-medium text-gray-500">
                            Total Pengunjung
                        </p>

                        <h3 class="text-2xl font-bold text-gray-900 mt-2">
                            {{ number_format($totalPengunjung, 0, ',', '.') }}
                        </h3>

                        <p class="text-[11px] text-purple-600 mt-1">
                            <i class="fas fa-arrow-up mr-1"></i>
                            23% dari bulan lalu
                        </p>
                    </div>

                    <div class="w-11 h-11 rounded-xl bg-purple-50 flex items-center justify-center">
                        <i class="fas fa-users text-purple-600"></i>
                    </div>

                </div>

            </div>


            {{-- TOTAL LUAS --}}
            <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-5">

                <div class="flex items-center justify-between">

                    <div>
                        <p class="text-xs font-medium text-gray-500">
                            Total Luas
                        </p>

                        <h3 class="text-2xl font-bold text-gray-900 mt-2">
                            {{ number_format($totalLuas, 0, ',', '.') }}
                        </h3>

                        <p class="text-[11px] text-orange-600 mt-1">
                            Hektar
                        </p>
                    </div>

                    <div class="w-11 h-11 rounded-xl bg-orange-50 flex items-center justify-center">
                        <i class="fas fa-ruler-combined text-orange-600"></i>
                    </div>

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- GRAFIK + PUBLIKASI --}}
        {{-- ========================================================= --}}

        <div class="grid grid-cols-1 xl:grid-cols-[1.7fr_1fr] gap-5">

            {{-- GRAFIK --}}
            <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-5">

                <div class="flex items-center justify-between mb-5">

                    <div>
                        <h3 class="text-sm font-bold text-gray-900">
                            Statistik Pengunjung
                        </h3>

                        <p class="text-[11px] text-gray-400 mt-1">
                            Perkembangan jumlah pengunjung website
                        </p>
                    </div>

                    <select
                        class="text-xs border border-gray-200 rounded-lg px-3 py-2
                           text-gray-500 bg-white focus:outline-none">

                        <option>Mingguan</option>
                        <option>Bulanan</option>
                        <option>Tahunan</option>

                    </select>

                </div>

                <div class="h-[260px]">
                    <canvas id="visitorChart"></canvas>
                </div>

            </div>


            {{-- PUBLIKASI TERBARU --}}
            <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-5">

                <div class="flex items-center justify-between mb-4">

                    <div>
                        <h3 class="text-sm font-bold text-gray-900">
                            Publikasi Terbaru
                        </h3>

                        <p class="text-[11px] text-gray-400 mt-1">
                            Konten yang baru diterbitkan
                        </p>
                    </div>

                    <a href="{{ route('admin.berita.index') }}"
                        class="text-[11px] font-semibold text-blue-600 hover:underline">
                        Lihat Semua
                    </a>

                </div>


                @php
                    $publikasiTerbaru = \App\Models\Berita::latest()->take(4)->get();
                @endphp


                <div class="space-y-3">

                    @forelse($publikasiTerbaru as $item)
                        <a href="{{ route('admin.berita.index') }}" class="flex items-center gap-3 group">

                            {{-- GAMBAR --}}
                            <div class="w-12 h-12 rounded-lg overflow-hidden bg-gray-100 shrink-0">

                                @if ($item->gambar)
                                    <img src="{{ asset('storage/' . $item->gambar) }}" class="w-full h-full object-cover">
                                @else
                                    <img src="https://picsum.photos/100/100?random={{ $item->id }}"
                                        class="w-full h-full object-cover">
                                @endif

                            </div>


                            {{-- INFO --}}
                            <div class="min-w-0 flex-1">

                                <div class="flex items-center gap-2">

                                    <span
                                        class="text-[8px] font-bold uppercase px-1.5 py-0.5 rounded-full
                                    {{ $item->kategori == 'Siaran Pers' ? 'bg-blue-50 text-blue-600' : 'bg-green-50 text-green-600' }}">

                                        {{ $item->kategori }}

                                    </span>

                                </div>

                                <h4
                                    class="text-[11px] font-semibold text-gray-900
                                       truncate mt-1
                                       group-hover:text-blue-600">

                                    {{ $item->judul }}

                                </h4>

                                <p class="text-[9px] text-gray-400 mt-1">

                                    {{ $item->tanggal_publikasi
                                        ? \Carbon\Carbon::parse($item->tanggal_publikasi)->format('d M Y')
                                        : $item->created_at?->format('d M Y') }}

                                </p>

                            </div>

                        </a>

                    @empty

                        <div class="text-center py-10 text-gray-400 text-xs">
                            Belum ada publikasi.
                        </div>
                    @endforelse

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- BAGIAN BAWAH --}}
        {{-- ========================================================= --}}

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">


            {{-- AKTIVITAS TERBARU --}}
            <div class="lg:col-span-2 bg-white rounded-xl border border-gray-100 shadow-sm">

                <div class="px-5 py-4 border-b border-gray-100 flex items-center justify-between">

                    <div>
                        <h3 class="text-sm font-bold text-gray-900">
                            Aktivitas Terbaru
                        </h3>

                        <p class="text-[11px] text-gray-400 mt-1">
                            Aktivitas pengelolaan sistem
                        </p>
                    </div>

                    <span class="text-[10px] text-gray-400">
                        Hari ini
                    </span>

                </div>


                <div class="divide-y divide-gray-100">

                    {{-- AKTIVITAS 1 --}}
                    <div class="flex items-center gap-3 px-5 py-3">

                        <div class="w-8 h-8 rounded-lg bg-green-50 flex items-center justify-center">
                            <i class="fas fa-plus text-green-600 text-xs"></i>
                        </div>

                        <div class="flex-1">

                            <p class="text-xs font-medium text-gray-800">
                                Data aset baru ditambahkan
                            </p>

                            <p class="text-[10px] text-gray-400 mt-0.5">
                                Sistem pengelolaan aset tanah
                            </p>

                        </div>

                        <span class="text-[9px] text-gray-400">
                            Baru saja
                        </span>

                    </div>


                    {{-- AKTIVITAS 2 --}}
                    <div class="flex items-center gap-3 px-5 py-3">

                        <div class="w-8 h-8 rounded-lg bg-blue-50 flex items-center justify-center">
                            <i class="fas fa-newspaper text-blue-600 text-xs"></i>
                        </div>

                        <div class="flex-1">

                            <p class="text-xs font-medium text-gray-800">
                                Publikasi berita diperbarui
                            </p>

                            <p class="text-[10px] text-gray-400 mt-0.5">
                                Modul publikasi website
                            </p>

                        </div>

                        <span class="text-[9px] text-gray-400">
                            Hari ini
                        </span>

                    </div>


                    {{-- AKTIVITAS 3 --}}
                    <div class="flex items-center gap-3 px-5 py-3">

                        <div class="w-8 h-8 rounded-lg bg-purple-50 flex items-center justify-center">
                            <i class="fas fa-user text-purple-600 text-xs"></i>
                        </div>

                        <div class="flex-1">

                            <p class="text-xs font-medium text-gray-800">
                                Aktivitas pengguna
                            </p>

                            <p class="text-[10px] text-gray-400 mt-0.5">
                                Pengguna mengakses dashboard
                            </p>

                        </div>

                        <span class="text-[9px] text-gray-400">
                            Hari ini
                        </span>

                    </div>


                    {{-- AKTIVITAS 4 --}}
                    <div class="flex items-center gap-3 px-5 py-3">

                        <div class="w-8 h-8 rounded-lg bg-orange-50 flex items-center justify-center">
                            <i class="fas fa-edit text-orange-600 text-xs"></i>
                        </div>

                        <div class="flex-1">

                            <p class="text-xs font-medium text-gray-800">
                                Konten website diperbarui
                            </p>

                            <p class="text-[10px] text-gray-400 mt-0.5">
                                Pengelolaan halaman website
                            </p>

                        </div>

                        <span class="text-[9px] text-gray-400">
                            Kemarin
                        </span>

                    </div>

                </div>

            </div>


            {{-- DISTRIBUSI PENGUNJUNG --}}
            <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-5">

                <div class="mb-3">

                    <h3 class="text-sm font-bold text-gray-900">
                        Distribusi Pengunjung
                    </h3>

                    <p class="text-[11px] text-gray-400 mt-1">
                        Sumber kunjungan website
                    </p>

                </div>

                <div class="h-[190px] flex items-center justify-center">
                    <canvas id="pieChart"></canvas>
                </div>


                <div class="grid grid-cols-2 gap-y-2 mt-3">

                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-green-600"></span>
                        <span class="text-[10px] text-gray-500">Langsung</span>
                    </div>

                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-orange-500"></span>
                        <span class="text-[10px] text-gray-500">Mesin Pencari</span>
                    </div>

                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                        <span class="text-[10px] text-gray-500">Media Sosial</span>
                    </div>

                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                        <span class="text-[10px] text-gray-500">Referensi</span>
                    </div>

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- ASET TERBARU --}}
        {{-- ========================================================= --}}

        <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">

            <div class="px-5 py-4 border-b border-gray-100 flex items-center justify-between">

                <div>
                    <h3 class="text-sm font-bold text-gray-900">
                        Aset Terbaru
                    </h3>

                    <p class="text-[11px] text-gray-400 mt-1">
                        Data aset tanah yang terakhir ditambahkan
                    </p>
                </div>

                <a href="{{ route('admin.aset.index') }}"
                    class="text-[11px] font-semibold text-blue-600 hover:underline">
                    Lihat Semua
                </a>

            </div>


            <div class="overflow-x-auto">

                <table class="w-full text-left">

                    <thead class="bg-gray-50">

                        <tr>

                            <th class="px-5 py-3 text-[10px] font-bold text-gray-500 uppercase">
                                Nama Lokasi
                            </th>

                            <th class="px-5 py-3 text-[10px] font-bold text-gray-500 uppercase">
                                Provinsi
                            </th>

                            <th class="px-5 py-3 text-[10px] font-bold text-gray-500 uppercase">
                                Luas
                            </th>

                            <th class="px-5 py-3 text-[10px] font-bold text-gray-500 uppercase">
                                Status
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-gray-100">

                        @forelse($asets->take(5) as $aset)
                            <tr class="hover:bg-gray-50 transition">

                                <td class="px-5 py-3">

                                    <p class="text-xs font-semibold text-gray-900">
                                        {{ $aset->nama_lokasi }}
                                    </p>

                                </td>

                                <td class="px-5 py-3 text-xs text-gray-500">
                                    {{ $aset->provinsi }}
                                </td>

                                <td class="px-5 py-3 text-xs font-semibold text-gray-700">
                                    {{ number_format($aset->luas_hektar, 2, ',', '.') }} Ha
                                </td>

                                <td class="px-5 py-3">

                                    <span
                                        class="inline-flex items-center px-2 py-1 rounded-full
                                           bg-green-50 text-green-700
                                           text-[9px] font-bold">

                                        {{ $aset->status }}

                                    </span>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="4" class="px-5 py-8 text-center text-xs text-gray-400">

                                    Belum ada data aset.

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>


    {{-- ============================================================= --}}
    {{-- CHART.JS --}}
    {{-- ============================================================= --}}

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            /* =========================================================
               LINE CHART
            ========================================================= */

            const visitorCanvas = document.getElementById('visitorChart');

            if (visitorCanvas) {

                const ctx = visitorCanvas.getContext('2d');

                const gradient = ctx.createLinearGradient(0, 0, 0, 260);

                gradient.addColorStop(0, 'rgba(0, 100, 0, 0.20)');
                gradient.addColorStop(1, 'rgba(0, 100, 0, 0.00)');


                new Chart(ctx, {

                    type: 'line',

                    data: {

                        labels: [
                            '1 Mei',
                            '8 Mei',
                            '15 Mei',
                            '22 Mei',
                            '29 Mei',
                            '5 Jun',
                            '12 Jun'
                        ],

                        datasets: [{

                            label: 'Pengunjung',

                            data: [
                                12000,
                                19000,
                                15000,
                                27000,
                                22000,
                                32000,
                                28500
                            ],

                            borderColor: '#006400',

                            backgroundColor: gradient,

                            borderWidth: 2,

                            pointRadius: 3,

                            pointHoverRadius: 5,

                            tension: 0.4,

                            fill: true

                        }]

                    },

                    options: {

                        responsive: true,

                        maintainAspectRatio: false,

                        interaction: {
                            intersect: false,
                            mode: 'index'
                        },

                        plugins: {

                            legend: {
                                display: false
                            }

                        },

                        scales: {

                            x: {
                                grid: {
                                    display: false
                                },

                                ticks: {
                                    font: {
                                        size: 9
                                    },

                                    color: '#9CA3AF'
                                }
                            },

                            y: {

                                beginAtZero: true,

                                border: {
                                    display: false
                                },

                                grid: {
                                    color: '#F3F4F6'
                                },

                                ticks: {

                                    font: {
                                        size: 9
                                    },

                                    color: '#9CA3AF',

                                    callback: function(value) {

                                        if (value >= 1000) {
                                            return (value / 1000) + 'K';
                                        }

                                        return value;

                                    }

                                }

                            }

                        }

                    }

                });

            }


            /* =========================================================
               DONUT CHART
            ========================================================= */

            const pieCanvas = document.getElementById('pieChart');

            if (pieCanvas) {

                const pieCtx = pieCanvas.getContext('2d');

                new Chart(pieCtx, {

                    type: 'doughnut',

                    data: {

                        labels: [
                            'Langsung',
                            'Mesin Pencari',
                            'Media Sosial',
                            'Referensi'
                        ],

                        datasets: [{

                            data: [
                                45,
                                32,
                                12,
                                11
                            ],

                            backgroundColor: [
                                '#006400',
                                '#F97316',
                                '#3B82F6',
                                '#10B981'
                            ],

                            borderWidth: 0,

                            cutout: '68%'

                        }]

                    },

                    options: {

                        responsive: true,

                        maintainAspectRatio: false,

                        plugins: {

                            legend: {
                                display: false
                            }

                        }

                    }

                });

            }

        });
    </script>

@endsection
