@extends('layouts.admin')

@section('title', 'Tambah Aset Baru')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Tambah Aset Baru</h1>
            <p class="text-sm text-gray-500 mt-1">Lengkapi informasi aset tanah untuk proses verifikasi.</p>
        </div>
        <a href="{{ route('admin.aset.index') }}" class="text-sm text-gray-600 hover:text-[#006400]">Kembali ke Daftar</a>
    </div>

    <form action="{{ route('admin.aset.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <!-- TABS -->
        <div class="flex gap-4 border-b border-gray-200 mb-6">
            <button type="button" onclick="showTab('info')" class="pb-3 border-b-2 border-[#006400] text-[#006400] font-semibold text-sm" id="tab-info">Informasi Dasar</button>
            <button type="button" onclick="showTab('lokasi')" class="pb-3 border-b-2 border-transparent text-gray-500 font-medium text-sm" id="tab-lokasi">Lokasi & Peta</button>
            <button type="button" onclick="showTab('detail')" class="pb-3 border-b-2 border-transparent text-gray-500 font-medium text-sm" id="tab-detail">Detail Aset</button>
            <button type="button" onclick="showTab('legalitas')" class="pb-3 border-b-2 border-transparent text-gray-500 font-medium text-sm" id="tab-legalitas">Legalitas</button>
            <button type="button" onclick="showTab('dokumen')" class="pb-3 border-b-2 border-transparent text-gray-500 font-medium text-sm" id="tab-dokumen">Dokumen</button>
            <button type="button" onclick="showTab('ringkasan')" class="pb-3 border-b-2 border-transparent text-gray-500 font-medium text-sm" id="tab-ringkasan">Ringkasan</button>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- KOLOM KIRI: FORM UTAMA -->
            <div class="lg:col-span-2 space-y-6">
                <!-- TAB 1: INFORMASI DASAR -->
                <div id="tab-content-info" class="tab-section bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <h2 class="font-bold text-lg mb-4">Informasi Dasar</h2>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold mb-1">Nama Aset <span class="text-red-500">*</span></label>
                            <input type="text" name="nama_lokasi" class="w-full border-gray-300 rounded-lg p-3 text-sm focus:ring-[#006400]" required>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-1">Bidang Tanah</label>
                            <input type="text" placeholder="Contoh: Bidang Tanah" class="w-full border-gray-300 rounded-lg p-3 text-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-1">Kode Aset</label>
                            <input type="text" placeholder="Contoh: BT-2025-0001" class="w-full border-gray-300 rounded-lg p-3 text-sm">
                            <p class="text-xs text-gray-400 mt-1">Kode akan digenerate otomatis jika dikosongkan.</p>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold mb-1">Kategori Aset <span class="text-red-500">*</span></label>
                                <select name="peruntukan" class="w-full border-gray-300 rounded-lg p-3 text-sm" required>
                                    <option value="">Pilih kategori</option>
                                    <option value="Industri">Industri</option>
                                    <option value="Pertanian">Pertanian</option>
                                    <option value="Perumahan">Perumahan</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold mb-1">Status Aset <span class="text-red-500">*</span></label>
                                <select name="status" class="w-full border-gray-300 rounded-lg p-3 text-sm" required>
                                    <option value="Tersedia">Tersedia</option>
                                    <option value="Dalam Pengembangan">Dalam Pengembangan</option>
                                    <option value="Dalam Proses">Dalam Proses</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold mb-1">Luas Tanah (m²) <span class="text-red-500">*</span></label>
                                <input type="number" name="luas_hektar" class="w-full border-gray-300 rounded-lg p-3 text-sm" placeholder="Masukkan luas total" required>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold mb-1">Luas (Ha)</label>
                                <input type="text" class="w-full border-gray-300 rounded-lg p-3 text-sm" placeholder="Masukkan luas dalam hektar">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TAB 2: LOKASI & PETA -->
                <div id="tab-content-lokasi" class="tab-section bg-white rounded-xl shadow-sm border border-gray-200 p-6 hidden">
                    <h2 class="font-bold text-lg mb-4">Lokasi & Peta</h2>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold mb-1">Provinsi <span class="text-red-500">*</span></label>
                            <input type="text" name="provinsi" class="w-full border-gray-300 rounded-lg p-3 text-sm" required>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-1">Kabupaten <span class="text-red-500">*</span></label>
                            <input type="text" name="kabupaten" class="w-full border-gray-300 rounded-lg p-3 text-sm" required>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold mb-1">Koordinat Latitude (Lat) <span class="text-red-500">*</span></label>
                                <input type="number" step="0.0000001" name="lat" class="w-full border-gray-300 rounded-lg p-3 text-sm" placeholder="Contoh: -6.7825" required>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold mb-1">Koordinat Longitude (Lng) <span class="text-red-500">*</span></label>
                                <input type="number" step="0.0000001" name="lng" class="w-full border-gray-300 rounded-lg p-3 text-sm" placeholder="Contoh: 106.7825" required>
                            </div>
                        </div>
                        
                        <div class="h-64 bg-gray-100 rounded-lg border border-gray-200 relative">
                            <div class="absolute inset-0 flex items-center justify-center text-gray-400">
                                <div class="text-center">
                                    <i class="fas fa-map-marker-alt text-3xl mb-2"></i>
                                    <p class="text-sm">Peta akan muncul di sini</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TAB 3: DETAIL ASET -->
                <div id="tab-content-detail" class="tab-section bg-white rounded-xl shadow-sm border border-gray-200 p-6 hidden">
                    <h2 class="font-bold text-lg mb-4">Detail Aset</h2>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold mb-1">Deskripsi Aset <span class="text-red-500">*</span></label>
                            <textarea name="deskripsi" rows="6" class="w-full border-gray-300 rounded-lg p-3 text-sm" required></textarea>
                            <p class="text-right text-xs text-gray-400 mt-1">0/1000</p>
                        </div>
                    </div>
                </div>

<!-- TAB 4: LEGALITAS -->
<div id="tab-content-legalitas" class="tab-section bg-white rounded-xl shadow-sm border border-gray-200 p-6 hidden">
    <h2 class="font-bold text-lg mb-4">Legalitas</h2>
    
    <div class="space-y-4">
        <div>
            <label class="block text-sm font-semibold mb-1">Sumber Perolehan</label>
            <select name="sumber_perolehan" class="w-full border-gray-300 rounded-lg p-3 text-sm">
                <option value="">Pilih sumber perolehan</option>
                <option value="Pembelian">Pembelian</option>
                <option value="Sewa">Sewa</option>
                <option value="Hibah">Hibah</option>
                <option value="Tukar Menukar">Tukar Menukar</option>
                <option value="Lelang">Lelang</option>
                <option value="Pengadaan">Pengadaan</option>
            </select>
        </div>
        <div>
            <label class="block text-sm font-semibold mb-1">Nilai Perkiraan</label>
            <input type="text" placeholder="Rp" class="w-full border-gray-300 rounded-lg p-3 text-sm">
        </div>
    </div>
</div>

                <!-- TAB 5: DOKUMEN -->
                <div id="tab-content-dokumen" class="tab-section bg-white rounded-xl shadow-sm border border-gray-200 p-6 hidden">
                    <h2 class="font-bold text-lg mb-4">Dokumen</h2>
                    
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center">
                        <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-2"></i>
                        <p class="text-sm font-medium text-gray-600">Drag & drop dokumen atau klik untuk upload</p>
                        <p class="text-xs text-gray-400 mt-1">Format: PDF, JPG, PNG (Max 2MB)</p>
                        <input type="file" class="hidden">
                    </div>
                </div>

                <!-- TAB 6: RINGKASAN -->
                <div id="tab-content-ringkasan" class="tab-section bg-white rounded-xl shadow-sm border border-gray-200 p-6 hidden">
                    <h2 class="font-bold text-lg mb-4">Ringkasan</h2>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold mb-1">Peruntukan Rencana</label>
                            <select name="skema" class="w-full border-gray-300 rounded-lg p-3 text-sm">
                                <option value="">Pilih peruntukan rencana</option>
                                <option value="Sewa">Sewa</option>
                                <option value="Kerjasama">Kerjasama</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-1">Tahun Perolehan</label>
                            <input type="number" placeholder="Pilih tahun" class="w-full border-gray-300 rounded-lg p-3 text-sm">
                        </div>
                    </div>
                </div>
            </div>

            <!-- KOLOM KANAN: LOKASI & PREVIEW -->
            <div class="space-y-6">
                <!-- Upload Gambar -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <h2 class="font-bold text-lg mb-4">Gambar Aset</h2>
                    
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center mb-4">
                        <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-2"></i>
                        <p class="text-sm font-medium text-gray-600">Drag & drop gambar atau klik untuk upload</p>
                        <p class="text-xs text-gray-400 mt-1">Format: JPG, PNG (Max 2MB)</p>
                        <input type="file" name="gambar" class="hidden" id="gambarInput">
                    </div>
                    <button type="button" onclick="document.getElementById('gambarInput').click()" class="w-full border border-gray-300 rounded-lg py-2 text-sm font-medium">Pilih Gambar</button>
                </div>
            </div>
        </div>

        <!-- AKSI BAWAH -->
        <div class="mt-8 flex justify-end gap-4">
            <a href="{{ route('admin.aset.index') }}" class="border border-gray-300 rounded-lg px-6 py-3 text-sm font-medium">Batal</a>
            <button type="submit" class="bg-[#006400] hover:bg-[#005500] text-white px-6 py-3 rounded-lg font-bold text-sm">Simpan Data</button>
        </div>
    </form>
</div>

<script>
    // Tampilkan tab pertama secara default (Informasi Dasar)
    document.getElementById('tab-content-info').classList.remove('hidden');
    document.getElementById('tab-info').classList.add('border-[#006400]', 'text-[#006400]');

    function showTab(tabName) {
        // Sembunyikan semua tab-section
        document.querySelectorAll('.tab-section').forEach(function(section) {
            section.classList.add('hidden');
        });
        
        // Tampilkan tab yang dipilih
        document.getElementById('tab-content-' + tabName).classList.remove('hidden');
        
        // Reset border semua button
        document.querySelectorAll('button[id^="tab-"]').forEach(function(btn) {
            btn.classList.remove('border-[#006400]', 'text-[#006400]');
            btn.classList.add('border-transparent', 'text-gray-500');
        });
        
        // Tampilkan button yang aktif
        document.getElementById('tab-' + tabName).classList.add('border-[#006400]', 'text-[#006400]');
        document.getElementById('tab-' + tabName).classList.remove('border-transparent', 'text-gray-500');
    }
</script>
@endsection