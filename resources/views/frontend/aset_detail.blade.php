@extends('layouts.frontend')

@section('title', $aset->nama_lokasi)

@section('content')
<div class="max-w-7xl mx-auto px-4 py-16">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- KOLOM KIRI (2/3) -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Gambar & Info Utama -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
                <!-- Gambar -->
                <div class="h-96 bg-gray-200 relative">
                    @if ($aset->gambar)
                        <img src="{{ asset('storage/' . $aset->gambar) }}" class="w-full h-full object-cover" alt="">
                    @else
                        <img src="https://picsum.photos/800/600?random=1" class="w-full h-full object-cover" alt="">
                    @endif
                    <span class="absolute top-4 left-4 text-white text-xs px-3 py-1 rounded font-bold uppercase bg-[#006400]">{{ $aset->status }}</span>
                </div>

                <!-- Informasi Utama -->
                <div class="p-8">
                    <span class="text-[#0B2A4A] font-bold text-sm uppercase tracking-widest">Aset Persediaan Tanah</span>
                    <h1 class="text-3xl font-bold text-gray-900 mt-2">{{ $aset->nama_lokasi }}</h1>
                    <p class="text-sm text-gray-500 mt-2">{{ $aset->provinsi }}, {{ $aset->kabupaten }}</p>

                    <div class="mt-6 grid grid-cols-2 gap-6">
                        <div>
                            <p class="text-sm text-gray-500">Luas Tanah</p>
                            <p class="text-2xl font-bold text-[#006400]">{{ number_format($aset->luas_hektar, 2, ',', '.') }} Ha</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Status</p>
                            <p class="text-lg font-bold">
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded font-bold">{{ $aset->status }}</span>
                            </p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Peruntukan</p>
                            <p class="text-lg font-bold text-gray-800">{{ $aset->peruntukan }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Skema</p>
                            <p class="text-lg font-bold text-gray-800">{{ $aset->skema }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Deskripsi -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
                <div class="p-8">
                    <h3 class="font-bold text-lg mb-4">Deskripsi Aset</h3>
                    <p class="text-gray-600 leading-relaxed">{{ $aset->deskripsi ?? 'Deskripsi belum diisi.' }}</p>
                </div>
            </div>
        </div>

        <!-- KOLOM KANAN (1/3) -->
        <div class="space-y-6">
            <!-- Peta -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
                <div class="p-6">
                    <h3 class="font-bold text-lg mb-4">Lokasi Peta</h3>
                    <div id="map" class="h-[300px] rounded-xl border border-gray-200"></div>
                </div>
            </div>

            <!-- Dokumen Aset -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
                <div class="p-6">
                    <h3 class="font-bold text-lg mb-4">Dokumen Aset</h3>
                    <div class="space-y-2">
                        <div class="flex items-center gap-3 p-3 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
                            <div class="w-10 h-10 bg-blue-100 text-blue-700 rounded-lg flex items-center justify-center">
                                <i class="fas fa-file-pdf text-xl"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-bold text-gray-800">Sertifikat Tanah</p>
                                <p class="text-xs text-gray-500">PDF • 2 MB</p>
                            </div>
                            <a href="#" class="text-blue-600 text-sm font-bold">Unduh</a>
                        </div>
                        <div class="flex items-center gap-3 p-3 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
                            <div class="w-10 h-10 bg-green-100 text-green-700 rounded-lg flex items-center justify-center">
                                <i class="fas fa-file-pdf text-xl"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-bold text-gray-800">Peta Bidang</p>
                                <p class="text-xs text-gray-500">PDF • 1 MB</p>
                            </div>
                            <a href="#" class="text-green-600 text-sm font-bold">Unduh</a>
                        </div>
                        <div class="flex items-center gap-3 p-3 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
                            <div class="w-10 h-10 bg-orange-100 text-orange-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-file-alt text-xl"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-bold text-gray-800">Legalitas Lainnya</p>
                                <p class="text-xs text-gray-500">PDF • 3 MB</p>
                            </div>
                            <a href="#" class="text-orange-600 text-sm font-bold">Unduh</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    var lat = {{ $aset->lat ?? -2.5 }};
    var lng = {{ $aset->lng ?? 118.0 }};

    var map = L.map('map').setView([lat, lng], 12);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    L.marker([lat, lng]).addTo(map)
        .bindPopup('<b>{{ $aset->nama_lokasi }}</b>');
</script>
@endpush