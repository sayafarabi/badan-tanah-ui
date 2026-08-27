@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="space-y-6">

    {{-- HEADER --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">
                Dashboard
            </h1>
            <p class="text-sm text-gray-500 mt-1">
                Ringkasan pengelolaan sistem Badan Bank Tanah.
            </p>
        </div>

        <div class="flex items-center gap-2 text-xs text-gray-500">
            <span class="w-2 h-2 rounded-full bg-green-500"></span>
            Sistem aktif
        </div>
    </div>


    {{-- STATISTIK UTAMA --}}
    <div class="stats-grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

        {{-- TOTAL ASET --}}
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-5 hover:shadow-md transition">
            <div class="flex items-center justify-between">

                <div>
                    <p class="text-xs font-medium text-gray-500">
                        Total Aset Tanah
                    </p>

                    <p class="text-2xl font-bold text-gray-900 mt-1">
                        {{ number_format($totalAset ?? 0, 0, ',', '.') }}
                    </p>

                    <p class="text-[10px] text-gray-400 mt-1">
                        Data aset terdaftar
                    </p>
                </div>

                <div class="w-11 h-11 rounded-xl bg-green-50 flex items-center justify-center">
                    <i class="fas fa-map-location-dot text-[#006400]"></i>
                </div>

            </div>
        </div>


        {{-- TOTAL LUAS --}}
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-5 hover:shadow-md transition">
            <div class="flex items-center justify-between">

                <div>
                    <p class="text-xs font-medium text-gray-500">
                        Total Luas Tanah
                    </p>

                    <p class="text-2xl font-bold text-gray-900 mt-1">
                        {{ number_format($totalLuas ?? 0, 2, ',', '.') }}
                    </p>

                    <p class="text-[10px] text-gray-400 mt-1">
                        Hektare
                    </p>
                </div>

                <div class="w-11 h-11 rounded-xl bg-blue-50 flex items-center justify-center">
                    <i class="fas fa-ruler-combined text-blue-600"></i>
                </div>

            </div>
        </div>


        {{-- TOTAL BERITA --}}
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-5 hover:shadow-md transition">
            <div class="flex items-center justify-between">

                <div>
                    <p class="text-xs font-medium text-gray-500">
                        Total Berita
                    </p>

                    <p class="text-2xl font-bold text-gray-900 mt-1">
                        {{ number_format($totalBerita ?? 0, 0, ',', '.') }}
                    </p>

                    <p class="text-[10px] text-gray-400 mt-1">
                        Data publikasi
                    </p>
                </div>

                <div class="w-11 h-11 rounded-xl bg-purple-50 flex items-center justify-center">
                    <i class="fas fa-newspaper text-purple-600"></i>
                </div>

            </div>
        </div>


        {{-- PENGUNJUNG --}}
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-5 hover:shadow-md transition">
            <div class="flex items-center justify-between">

                <div>
                    <p class="text-xs font-medium text-gray-500">
                        Pengunjung
                    </p>

                    <p class="text-2xl font-bold text-gray-900 mt-1">
                        {{ number_format($totalPengunjung ?? 0, 0, ',', '.') }}
                    </p>

                    <p class="text-[10px] text-gray-400 mt-1">
                        Statistik kunjungan
                    </p>
                </div>

                <div class="w-11 h-11 rounded-xl bg-orange-50 flex items-center justify-center">
                    <i class="fas fa-users text-orange-500"></i>
                </div>

            </div>
        </div>

    </div>


    {{-- KONTEN --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- ASET TERBARU --}}
        <div class="lg:col-span-2 bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">

            <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">

                <div>
                    <h2 class="text-sm font-bold text-gray-900">
                        Aset Terbaru
                    </h2>

                    <p class="text-[10px] text-gray-400 mt-0.5">
                        Lima data aset tanah terbaru.
                    </p>
                </div>

                <a href="{{ route('admin.aset.index') }}"
                   class="text-xs font-semibold text-[#006400] hover:underline">
                    Lihat semua
                </a>

            </div>


            <div class="overflow-x-auto">

                <table class="w-full text-left text-sm">

                    <thead class="bg-gray-50 border-b border-gray-200">

                        <tr>

                            <th class="px-6 py-3 text-[10px] font-bold text-gray-500 uppercase">
                                Lokasi
                            </th>

                            <th class="px-6 py-3 text-[10px] font-bold text-gray-500 uppercase">
                                Luas
                            </th>

                            <th class="px-6 py-3 text-[10px] font-bold text-gray-500 uppercase">
                                Peruntukan
                            </th>

                            <th class="px-6 py-3 text-[10px] font-bold text-gray-500 uppercase">
                                Status
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-gray-100">

                        @forelse ($asets ?? [] as $aset)

                            <tr class="hover:bg-gray-50 transition">

                                <td class="px-6 py-4">

                                    <div class="font-medium text-gray-900">
                                        {{ $aset->nama_lokasi }}
                                    </div>

                                    <div class="text-[10px] text-gray-400 mt-0.5">
                                        {{ $aset->kabupaten ?? '-' }},
                                        {{ $aset->provinsi ?? '-' }}
                                    </div>

                                </td>


                                <td class="px-6 py-4 text-gray-700 whitespace-nowrap">

                                    {{ number_format($aset->luas_hektar ?? 0, 2, ',', '.') }}

                                    <span class="text-[10px] text-gray-400">
                                        Ha
                                    </span>

                                </td>


                                <td class="px-6 py-4">

                                    <span class="inline-flex px-2.5 py-1 rounded-full text-[10px] font-bold bg-blue-50 text-blue-700">
                                        {{ $aset->peruntukan ?? '-' }}
                                    </span>

                                </td>


                                <td class="px-6 py-4">

                                    @php
                                        $status = strtolower($aset->status ?? '');
                                    @endphp

                                    <span class="inline-flex px-2.5 py-1 rounded-full text-[10px] font-bold
                                        {{
                                            $status === 'tersedia'
                                                ? 'bg-green-50 text-green-700'
                                                : (
                                                    $status === 'disewa'
                                                        ? 'bg-blue-50 text-blue-700'
                                                        : 'bg-gray-50 text-gray-600'
                                                )
                                        }}">

                                        {{ $aset->status ?? '-' }}

                                    </span>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="4" class="px-6 py-12 text-center">

                                    <i class="fas fa-map text-3xl text-gray-300 mb-3"></i>

                                    <p class="text-sm text-gray-500">
                                        Belum ada data aset.
                                    </p>

                                    <a href="{{ route('admin.aset.create') }}"
                                       class="inline-block mt-2 text-xs font-semibold text-[#006400] hover:underline">
                                        Tambah aset
                                    </a>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>


        {{-- INFORMASI SISTEM --}}
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">

            <div class="px-6 py-4 border-b border-gray-100">

                <h2 class="text-sm font-bold text-gray-900">
                    Informasi Sistem
                </h2>

                <p class="text-[10px] text-gray-400 mt-0.5">
                    Ringkasan kondisi sistem.
                </p>

            </div>


            <div class="p-6 space-y-5">

                {{-- STATUS SISTEM --}}
                <div class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-lg bg-green-50 flex items-center justify-center">
                        <i class="fas fa-server text-green-600"></i>
                    </div>

                    <div class="flex-1">

                        <p class="text-xs font-semibold text-gray-800">
                            Status Sistem
                        </p>

                        <p class="text-[10px] text-gray-400">
                            Aplikasi berjalan normal
                        </p>

                    </div>

                    <span class="text-[10px] font-bold text-green-600">
                        Online
                    </span>

                </div>


                {{-- DATA ASET --}}
                <div class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-lg bg-blue-50 flex items-center justify-center">
                        <i class="fas fa-database text-blue-600"></i>
                    </div>

                    <div class="flex-1">

                        <p class="text-xs font-semibold text-gray-800">
                            Database Aset
                        </p>

                        <p class="text-[10px] text-gray-400">
                            Data tersedia di sistem
                        </p>

                    </div>

                    <span class="text-[10px] font-bold text-blue-600">
                        {{ $totalAset ?? 0 }} data
                    </span>

                </div>


                {{-- BERITA --}}
                <div class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-lg bg-purple-50 flex items-center justify-center">
                        <i class="fas fa-newspaper text-purple-600"></i>
                    </div>

                    <div class="flex-1">

                        <p class="text-xs font-semibold text-gray-800">
                            Publikasi
                        </p>

                        <p class="text-[10px] text-gray-400">
                            Data berita dalam sistem
                        </p>

                    </div>

                    <span class="text-[10px] font-bold text-purple-600">
                        {{ $totalBerita ?? 0 }} berita
                    </span>

                </div>


                {{-- WAKTU --}}
                <div class="pt-4 border-t border-gray-100">

                    <p class="text-[10px] text-gray-400">
                        Terakhir diperbarui
                    </p>

                    <p class="text-xs font-semibold text-gray-700 mt-1">
                        {{ now()->format('d F Y, H:i') }} WIB
                    </p>

                </div>

            </div>

        </div>

    </div>


    {{-- QUICK ACTION --}}
    <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6">

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

            <div>

                <h2 class="text-sm font-bold text-gray-900">
                    Akses Cepat
                </h2>

                <p class="text-[10px] text-gray-400 mt-0.5">
                    Kelola data utama sistem.
                </p>

            </div>


            <div class="flex flex-wrap gap-2">

                <a href="{{ route('admin.aset.create') }}"
                   class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg bg-[#006400] hover:bg-[#005500] text-white text-xs font-semibold transition">

                    <i class="fas fa-plus"></i>

                    Tambah Aset

                </a>


                <a href="{{ route('admin.berita.create') }}"
                   class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg border border-gray-200 hover:bg-gray-50 text-gray-700 text-xs font-semibold transition">

                    <i class="fas fa-newspaper"></i>

                    Tambah Berita

                </a>


                <a href="{{ route('admin.aset.peta') }}"
                   class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg border border-gray-200 hover:bg-gray-50 text-gray-700 text-xs font-semibold transition">

                    <i class="fas fa-map-location-dot"></i>

                    Peta Aset

                </a>

            </div>

        </div>

    </div>

</div>

@endsection