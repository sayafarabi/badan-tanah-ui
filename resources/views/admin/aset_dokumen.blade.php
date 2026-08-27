@extends('layouts.admin')

@section('title', 'Dokumen')

@section('content')

    <div class="max-w-7xl mx-auto">

        {{-- =====================================================
        HEADER
    ====================================================== --}}

        <div class="mb-5">

            <h1 class="text-2xl font-bold text-gray-900">
                Aset Persediaan Tanah
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                Kelola dan pantau informasi persediaan tanah.
            </p>

        </div>


        {{-- =====================================================
        NAVIGASI ASET
    ====================================================== --}}

        <div class="overflow-x-auto">
            @include('admin.aset._navigation')
        </div>


        {{-- =====================================================
        HEADER DOKUMEN
    ====================================================== --}}

        <div class="bg-white rounded-xl border border-gray-200
                shadow-sm p-6 mb-5">

            <div class="flex items-start gap-4">

                <div
                    class="w-12 h-12
                        rounded-xl
                        bg-green-50
                        text-[#006400]
                        flex items-center
                        justify-center
                        flex-shrink-0">

                    <i class="fas fa-folder-open text-xl"></i>

                </div>

                <div class="flex-1">

                    <h2 class="text-lg font-bold text-gray-900">
                        Dokumen
                    </h2>

                    <p class="text-sm text-gray-500 mt-1 leading-relaxed">
                        Kelola dan pantau dokumen pendukung
                        aset persediaan tanah Badan Bank Tanah.
                    </p>

                </div>

            </div>

        </div>


        {{-- =====================================================
        RINGKASAN DOKUMEN
    ====================================================== --}}

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-5">

            {{-- TOTAL DOKUMEN --}}

            <div class="bg-white rounded-xl
                    border border-gray-200
                    shadow-sm p-5">

                <div class="flex items-center justify-between">

                    <div>

                        <p
                            class="text-[10px] font-semibold
                              uppercase tracking-wide
                              text-gray-400">

                            Total Dokumen

                        </p>

                        <h3 class="text-2xl font-bold
                               text-gray-900 mt-2">

                            0

                        </h3>

                        <p class="text-[10px] text-gray-500 mt-1">
                            Dokumen pendukung aset
                        </p>

                    </div>

                    <div
                        class="w-10 h-10 rounded-lg
                            bg-green-50
                            text-[#006400]
                            flex items-center justify-center">

                        <i class="fas fa-folder"></i>

                    </div>

                </div>

            </div>


            {{-- DOKUMEN TERSEDIA --}}

            <div class="bg-white rounded-xl
                    border border-gray-200
                    shadow-sm p-5">

                <div class="flex items-center justify-between">

                    <div>

                        <p
                            class="text-[10px] font-semibold
                              uppercase tracking-wide
                              text-gray-400">

                            Tersedia

                        </p>

                        <h3 class="text-2xl font-bold
                               text-gray-900 mt-2">

                            0

                        </h3>

                        <p class="text-[10px] text-gray-500 mt-1">
                            Dokumen dapat diakses
                        </p>

                    </div>

                    <div
                        class="w-10 h-10 rounded-lg
                            bg-blue-50
                            text-blue-600
                            flex items-center justify-center">

                        <i class="fas fa-file-circle-check"></i>

                    </div>

                </div>

            </div>


            {{-- DOKUMEN DIPERBARUI --}}

            <div class="bg-white rounded-xl
                    border border-gray-200
                    shadow-sm p-5">

                <div class="flex items-center justify-between">

                    <div>

                        <p
                            class="text-[10px] font-semibold
                              uppercase tracking-wide
                              text-gray-400">

                            Diperbarui

                        </p>

                        <h3 class="text-2xl font-bold
                               text-gray-900 mt-2">

                            0

                        </h3>

                        <p class="text-[10px] text-gray-500 mt-1">
                            Dokumen diperbarui bulan ini
                        </p>

                    </div>

                    <div
                        class="w-10 h-10 rounded-lg
                            bg-orange-50
                            text-orange-500
                            flex items-center justify-center">

                        <i class="fas fa-clock-rotate-left"></i>

                    </div>

                </div>

            </div>

        </div>


        {{-- =====================================================
        DAFTAR DOKUMEN
    ====================================================== --}}

        <div class="bg-white rounded-xl
                border border-gray-200
                shadow-sm overflow-hidden">

            {{-- HEADER TABLE --}}

            <div
                class="px-5 py-4
                    border-b border-gray-100
                    flex items-center justify-between">

                <div>

                    <h2 class="text-sm font-bold text-gray-900">
                        Daftar Dokumen Aset
                    </h2>

                    <p class="text-[9px] text-gray-400 mt-1">
                        Dokumen pendukung informasi aset persediaan tanah.
                    </p>

                </div>

                <a href="{{ route('admin.aset.index') }}"
                    class="px-3 py-1.5
                      bg-[#006400]
                      hover:bg-[#005500]
                      text-white
                      rounded-md
                      text-[9px]
                      font-semibold
                      transition">

                    <i class="fas fa-database mr-1"></i>

                    Lihat Data Aset

                </a>

            </div>


            {{-- TABLE --}}

            <div class="overflow-x-auto">

                <table class="w-full text-left">

                    <thead class="bg-gray-50
                              border-b border-gray-200">

                        <tr>

                            <th
                                class="px-5 py-3
                                   text-[9px]
                                   font-semibold
                                   uppercase
                                   tracking-wide
                                   text-gray-500">

                                Dokumen

                            </th>

                            <th
                                class="px-5 py-3
                                   text-[9px]
                                   font-semibold
                                   uppercase
                                   tracking-wide
                                   text-gray-500">

                                Lokasi Aset

                            </th>

                            <th
                                class="px-5 py-3
                                   text-[9px]
                                   font-semibold
                                   uppercase
                                   tracking-wide
                                   text-gray-500">

                                Jenis

                            </th>

                            <th
                                class="px-5 py-3
                                   text-[9px]
                                   font-semibold
                                   uppercase
                                   tracking-wide
                                   text-gray-500">

                                Tahun

                            </th>

                            <th
                                class="px-5 py-3
                                   text-[9px]
                                   font-semibold
                                   uppercase
                                   tracking-wide
                                   text-gray-500">

                                Status

                            </th>

                            <th
                                class="px-5 py-3
                                   text-[9px]
                                   font-semibold
                                   uppercase
                                   tracking-wide
                                   text-gray-500
                                   text-right">

                                Aksi

                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-gray-100">

                        @if ($asets->count() > 0)
                            <tr>
                                <td colspan="6" class="px-5 py-10 text-center">

                                    <div class="text-gray-400">

                                        <i class="fas fa-folder-open text-3xl mb-3"></i>

                                        <p class="text-sm font-medium text-gray-600">
                                            Belum ada dokumen aset yang tersimpan.
                                        </p>

                                        <p class="text-xs text-gray-400 mt-1">
                                            Fitur dokumen akan menampilkan file setelah
                                            dukungan penyimpanan dokumen diaktifkan.
                                        </p>

                                    </div>

                                </td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="6" class="px-5 py-10 text-center">

                                    <div class="text-gray-400">

                                        <i class="fas fa-database text-3xl mb-3"></i>

                                        <p class="text-sm font-medium text-gray-600">
                                            Belum ada data aset.
                                        </p>

                                    </div>

                                </td>
                            </tr>
                        @endif

                    </tbody>

                </table>

            </div>


            {{-- =====================================================
            FOOTER
        ====================================================== --}}

            <div
                class="px-5 py-3
                    border-t border-gray-100
                    flex items-center
                    justify-between">

                <p class="text-[8px] text-gray-400">

                    Data dokumen menggunakan data dummy
                    untuk kebutuhan antarmuka.

                </p>

                <a href="{{ route('admin.aset.index') }}"
                    class="text-[9px]
                      font-semibold
                      text-[#006400]
                      hover:underline">

                    Kelola seluruh aset

                    <i class="fas fa-arrow-right ml-1"></i>

                </a>

            </div>

        </div>

    </div>

@endsection
