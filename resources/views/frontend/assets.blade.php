@extends('layouts.frontend')

@section('title', 'Aset Persediaan Tanah')

@section('content')
<!-- Header Halaman -->
<div class="bg-[#0B2A4A] py-20">
    <div class="max-w-7xl mx-auto px-4">
        <h1 class="text-4xl font-bold text-white">Aset Persediaan Tanah</h1>
        <p class="text-blue-200 mt-3">Temukan informasi sebaran aset tanah di seluruh wilayah Indonesia.</p>
        <div class="h-1 w-20 bg-blue-500 mt-4"></div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 py-16">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-10">
        
        <!-- Sidebar Filter (Alpine.js) -->
        <div class="lg:col-span-1" x-data="asetFilter()">
            <div class="bg-white p-7 rounded-xl shadow-sm border border-gray-200 sticky top-24">
                <h3 class="font-bold text-lg mb-6 pb-4 border-b border-gray-100">Filter Peta</h3>
                <div class="space-y-5">
                    <div>
                        <label class="text-sm font-semibold text-gray-700">Lokasi</label>
                        <select x-model="filters.provinsi" @change="applyFilter()" class="mt-2 w-full border-gray-300 rounded-md text-sm focus:ring-[#0B2A4A] focus:border-[#0B2A4A]">
                            <option value="">Semua Provinsi</option>
                            <option value="Jawa Tengah">Jawa Tengah</option>
                            <option value="Sumatera Selatan">Sumatera Selatan</option>
                            <option value="Papua Selatan">Papua Selatan</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-sm font-semibold text-gray-700">Peruntukan</label>
                        <select x-model="filters.peruntukan" @change="applyFilter()" class="mt-2 w-full border-gray-300 rounded-md text-sm focus:ring-[#0B2A4A] focus:border-[#0B2A4A]">
                            <option value="">Semua</option>
                            <option value="Industri">Industri</option>
                            <option value="Pertanian">Pertanian</option>
                            <option value="Perumahan">Perumahan</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-sm font-semibold text-gray-700">Skema</label>
                        <select x-model="filters.skema" @change="applyFilter()" class="mt-2 w-full border-gray-300 rounded-md text-sm focus:ring-[#0B2A4A] focus:border-[#0B2A4A]">
                            <option value="">Semua</option>
                            <option value="Sewa">Sewa</option>
                            <option value="Kerjasama">Kerjasama</option>
                        </select>
                    </div>
                    <button @click="applyFilter()" class="w-full bg-[#0B2A4A] hover:bg-[#0d355a] text-white p-3 rounded mt-4 text-sm font-bold transition">Terapkan Filter</button>
                    <button @click="resetFilter()" class="w-full text-gray-500 hover:text-gray-700 p-2 text-sm">Reset Filter</button>
                </div>
            </div>
        </div>

        <!-- List Aset (Dinamis) -->
        <div class="lg:col-span-3" x-data="asetList()">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <template x-for="item in asets" :key="item.id">
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-xl transition border border-gray-100 overflow-hidden">
                        <div class="h-48 bg-gray-200 relative">
                            <img :src="item.gambar ? '{{ asset('storage') }}/' + item.gambar : 'https://picsum.photos/600/400?random=' + item.id" class="w-full h-full object-cover" alt="">
                            <span class="absolute top-4 left-4 text-white text-xs px-3 py-1 rounded font-bold uppercase"
                                  :class="item.status === 'Tersedia' ? 'bg-[#006400]' : (item.status === 'Dalam Pengembangan' ? 'bg-blue-500' : 'bg-orange-500')"
                                  x-text="item.status"></span>
                        </div>
                        <div class="p-6">
                            <h3 class="font-bold text-lg text-gray-900" x-text="item.nama_lokasi"></h3>
                            <p class="text-sm text-gray-500 mt-1" x-text="item.provinsi + ', ' + item.kabupaten"></p>
                            <div class="mt-4 flex justify-between items-center border-t border-gray-100 pt-4">
                                <p class="font-extrabold text-[#006400]" x-text="formatNumber(item.luas_hektar) + ' Ha'"></p>
                                <p class="text-xs font-medium text-gray-500" x-text="item.peruntukan + ' / ' + item.skema"></p>
                            </div>
                            <a :href="'/aset/' + item.id" class="text-sm font-bold text-[#0B2A4A] mt-2 inline-block hover:underline">Baca Selengkapnya</a>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function asetFilter() {
        return {
            filters: {
                provinsi: '',
                peruntukan: '',
                skema: ''
            },
            applyFilter() {
                window.dispatchEvent(new CustomEvent('filter-aset', { detail: this.filters }));
            },
            resetFilter() {
                this.filters = { provinsi: '', peruntukan: '', skema: '' };
                this.applyFilter();
            }
        }
    }

    function asetList() {
        return {
            asets: [],
            async init() {
                await this.fetchAset();
                window.addEventListener('filter-aset', (event) => {
                    this.fetchAset(event.detail);
                });
            },
            async fetchAset(filters = {}) {
                const params = new URLSearchParams(filters).toString();
                const response = await fetch(`/aset/filter?${params}`);
                this.asets = await response.json();
            },
            formatNumber(num) {
                return parseFloat(num).toLocaleString('id-ID', { minimumFractionDigits: 2 });
            }
        }
    }
</script>
@endpush