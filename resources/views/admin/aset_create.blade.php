@extends('layouts.admin')

@section('title', 'Tambah Aset Baru')

@section('content')
    <div class="max-w-7xl mx-auto">

        {{-- HEADER --}}
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">
                    Tambah Aset Baru
                </h1>

                <p class="text-sm text-gray-500 mt-1">
                    Lengkapi informasi aset tanah untuk proses verifikasi.
                </p>
            </div>

            <a
                href="{{ route('admin.aset.index') }}"
                class="text-sm text-gray-600 hover:text-[#006400]"
            >
                Kembali ke Daftar
            </a>
        </div>


        {{-- FORM --}}
        <form
            action="{{ route('admin.aset.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf


            {{-- TABS --}}
            <div class="flex gap-4 border-b border-gray-200 mb-6 overflow-x-auto">

                <button
                    type="button"
                    onclick="showTab('info')"
                    class="pb-3 border-b-2 border-[#006400] text-[#006400] font-semibold text-sm whitespace-nowrap"
                    id="tab-info"
                >
                    Informasi Dasar
                </button>

                <button
                    type="button"
                    onclick="showTab('lokasi')"
                    class="pb-3 border-b-2 border-transparent text-gray-500 font-medium text-sm whitespace-nowrap"
                    id="tab-lokasi"
                >
                    Lokasi & Peta
                </button>

                <button
                    type="button"
                    onclick="showTab('detail')"
                    class="pb-3 border-b-2 border-transparent text-gray-500 font-medium text-sm whitespace-nowrap"
                    id="tab-detail"
                >
                    Detail Aset
                </button>

                <button
                    type="button"
                    onclick="showTab('legalitas')"
                    class="pb-3 border-b-2 border-transparent text-gray-500 font-medium text-sm whitespace-nowrap"
                    id="tab-legalitas"
                >
                    Legalitas
                </button>

                <button
                    type="button"
                    onclick="showTab('dokumen')"
                    class="pb-3 border-b-2 border-transparent text-gray-500 font-medium text-sm whitespace-nowrap"
                    id="tab-dokumen"
                >
                    Dokumen
                </button>

                <button
                    type="button"
                    onclick="showTab('ringkasan')"
                    class="pb-3 border-b-2 border-transparent text-gray-500 font-medium text-sm whitespace-nowrap"
                    id="tab-ringkasan"
                >
                    Ringkasan
                </button>

            </div>


            {{-- MAIN GRID --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">


                {{-- =========================================================
                    KOLOM KIRI
                ========================================================== --}}
                <div class="lg:col-span-2 space-y-6">


                    {{-- =====================================================
                        TAB 1 : INFORMASI DASAR
                    ====================================================== --}}
                    <div
                        id="tab-content-info"
                        class="tab-section bg-white rounded-xl shadow-sm border border-gray-200 p-6"
                    >

                        <h2 class="font-bold text-lg mb-4">
                            Informasi Dasar
                        </h2>


                        <div class="space-y-4">


                            {{-- NAMA ASET --}}
                            <div>

                                <label class="block text-sm font-semibold mb-1">
                                    Nama Aset
                                    <span class="text-red-500">*</span>
                                </label>

                                <input
                                    type="text"
                                    name="nama_lokasi"
                                    value="{{ old('nama_lokasi') }}"
                                    class="w-full border-gray-300 rounded-lg p-3 text-sm focus:ring-[#006400]"
                                    placeholder="Masukkan nama aset"
                                    required
                                >

                            </div>


                            {{-- BIDANG TANAH --}}
                            <div>

                                <label class="block text-sm font-semibold mb-1">
                                    Bidang Tanah
                                </label>

                                <input
                                    type="text"
                                    name="bidang_tanah"
                                    value="{{ old('bidang_tanah') }}"
                                    placeholder="Contoh: Bidang Tanah"
                                    class="w-full border-gray-300 rounded-lg p-3 text-sm"
                                >

                            </div>


                            {{-- KODE ASET --}}
                            <div>

                                <label class="block text-sm font-semibold mb-1">
                                    Kode Aset
                                </label>

                                <input
                                    type="text"
                                    name="kode_aset"
                                    value="{{ old('kode_aset') }}"
                                    placeholder="Contoh: BT-2025-0001"
                                    class="w-full border-gray-300 rounded-lg p-3 text-sm"
                                >

                                <p class="text-xs text-gray-400 mt-1">
                                    Kode akan digenerate otomatis jika dikosongkan.
                                </p>

                            </div>


                            {{-- KATEGORI + STATUS --}}
                            <div class="grid grid-cols-2 gap-4">

                                {{-- KATEGORI --}}
                                <div>

                                    <label class="block text-sm font-semibold mb-1">
                                        Kategori Aset
                                        <span class="text-red-500">*</span>
                                    </label>

                                    <select
                                        name="peruntukan"
                                        class="w-full border-gray-300 rounded-lg p-3 text-sm"
                                        required
                                    >

                                        <option value="">
                                            Pilih kategori
                                        </option>

                                        <option
                                            value="Industri"
                                            {{ old('peruntukan') === 'Industri' ? 'selected' : '' }}
                                        >
                                            Industri
                                        </option>

                                        <option
                                            value="Pertanian"
                                            {{ old('peruntukan') === 'Pertanian' ? 'selected' : '' }}
                                        >
                                            Pertanian
                                        </option>

                                        <option
                                            value="Perumahan"
                                            {{ old('peruntukan') === 'Perumahan' ? 'selected' : '' }}
                                        >
                                            Perumahan
                                        </option>

                                    </select>

                                </div>


                                {{-- STATUS --}}
                                <div>

                                    <label class="block text-sm font-semibold mb-1">
                                        Status Aset
                                        <span class="text-red-500">*</span>
                                    </label>

                                    <select
                                        name="status"
                                        class="w-full border-gray-300 rounded-lg p-3 text-sm"
                                        required
                                    >

                                        <option value="Tersedia"
                                            {{ old('status', 'Tersedia') === 'Tersedia' ? 'selected' : '' }}>
                                            Tersedia
                                        </option>

                                        <option value="Dalam Pengembangan"
                                            {{ old('status') === 'Dalam Pengembangan' ? 'selected' : '' }}>
                                            Dalam Pengembangan
                                        </option>

                                        <option value="Dalam Proses"
                                            {{ old('status') === 'Dalam Proses' ? 'selected' : '' }}>
                                            Dalam Proses
                                        </option>

                                    </select>

                                </div>

                            </div>


                            {{-- LUAS --}}
                            <div class="grid grid-cols-2 gap-4">

                                <div>

                                    <label class="block text-sm font-semibold mb-1">
                                        Luas Tanah (m²)
                                        <span class="text-red-500">*</span>
                                    </label>

                                    <input
                                        type="number"
                                        name="luas_hektar"
                                        value="{{ old('luas_hektar') }}"
                                        step="0.01"
                                        min="0"
                                        class="w-full border-gray-300 rounded-lg p-3 text-sm"
                                        placeholder="Masukkan luas"
                                        required
                                    >

                                    <p class="text-xs text-gray-400 mt-1">
                                        Sesuai struktur database saat ini.
                                    </p>

                                </div>


                                <div>

                                    <label class="block text-sm font-semibold mb-1">
                                        Luas (Ha)
                                    </label>

                                    <input
                                        type="text"
                                        id="luasHaPreview"
                                        class="w-full border-gray-300 rounded-lg p-3 text-sm bg-gray-50"
                                        placeholder="Otomatis"
                                        readonly
                                    >

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- =====================================================
                        TAB 2 : LOKASI & PETA
                    ====================================================== --}}
                    <div
                        id="tab-content-lokasi"
                        class="tab-section bg-white rounded-xl shadow-sm border border-gray-200 p-6 hidden"
                    >

                        <h2 class="font-bold text-lg mb-4">
                            Lokasi & Peta
                        </h2>


                        <div class="space-y-4">


                            {{-- PROVINSI --}}
                            <div>

                                <label class="block text-sm font-semibold mb-1">
                                    Provinsi
                                    <span class="text-red-500">*</span>
                                </label>

                                <input
                                    type="text"
                                    name="provinsi"
                                    value="{{ old('provinsi') }}"
                                    class="w-full border-gray-300 rounded-lg p-3 text-sm"
                                    placeholder="Masukkan provinsi"
                                    required
                                >

                            </div>


                            {{-- KABUPATEN --}}
                            <div>

                                <label class="block text-sm font-semibold mb-1">
                                    Kabupaten
                                    <span class="text-red-500">*</span>
                                </label>

                                <input
                                    type="text"
                                    name="kabupaten"
                                    value="{{ old('kabupaten') }}"
                                    class="w-full border-gray-300 rounded-lg p-3 text-sm"
                                    placeholder="Masukkan kabupaten"
                                    required
                                >

                            </div>


                            {{-- KOORDINAT --}}
                            <div class="grid grid-cols-2 gap-4">

                                <div>

                                    <label class="block text-sm font-semibold mb-1">
                                        Koordinat Latitude (Lat)
                                        <span class="text-red-500">*</span>
                                    </label>

                                    <input
                                        type="number"
                                        step="0.0000001"
                                        name="lat"
                                        id="latInput"
                                        value="{{ old('lat') }}"
                                        class="w-full border-gray-300 rounded-lg p-3 text-sm"
                                        placeholder="Contoh: -6.7825"
                                        required
                                    >

                                </div>


                                <div>

                                    <label class="block text-sm font-semibold mb-1">
                                        Koordinat Longitude (Lng)
                                        <span class="text-red-500">*</span>
                                    </label>

                                    <input
                                        type="number"
                                        step="0.0000001"
                                        name="lng"
                                        id="lngInput"
                                        value="{{ old('lng') }}"
                                        class="w-full border-gray-300 rounded-lg p-3 text-sm"
                                        placeholder="Contoh: 106.7825"
                                        required
                                    >

                                </div>

                            </div>


                            {{-- BUTTON CARI KOORDINAT --}}
                            <div class="flex justify-end">

                                <button
                                    type="button"
                                    onclick="cariKoordinat()"
                                    class="inline-flex items-center gap-2 bg-[#006400] hover:bg-[#005500] text-white px-4 py-2 rounded-lg text-sm font-semibold"
                                >

                                    <i class="fas fa-location-crosshairs"></i>

                                    Cari Koordinat

                                </button>

                            </div>


                            {{-- MAP --}}
                            <div
                                id="assetMap"
                                class="w-full h-72 rounded-xl border border-gray-200 overflow-hidden bg-gray-100"
                            ></div>


                            <p class="text-xs text-gray-400">
                                Masukkan latitude dan longitude lalu klik
                                <strong>Cari Koordinat</strong>.
                                Marker juga dapat digeser secara manual.
                            </p>

                        </div>

                    </div>


                    {{-- =====================================================
                        TAB 3 : DETAIL ASET
                    ====================================================== --}}
                    <div
                        id="tab-content-detail"
                        class="tab-section bg-white rounded-xl shadow-sm border border-gray-200 p-6 hidden"
                    >

                        <h2 class="font-bold text-lg mb-4">
                            Detail Aset
                        </h2>


                        <div class="space-y-4">

                            <div>

                                <label class="block text-sm font-semibold mb-1">
                                    Deskripsi Aset
                                    <span class="text-red-500">*</span>
                                </label>

                                <textarea
                                    name="deskripsi"
                                    id="deskripsiInput"
                                    rows="6"
                                    maxlength="1000"
                                    class="w-full border-gray-300 rounded-lg p-3 text-sm"
                                    placeholder="Masukkan deskripsi aset"
                                    required
                                >{{ old('deskripsi') }}</textarea>

                                <p
                                    id="deskripsiCounter"
                                    class="text-right text-xs text-gray-400 mt-1"
                                >
                                    0/1000
                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- =====================================================
                        TAB 4 : LEGALITAS
                    ====================================================== --}}
                    <div
                        id="tab-content-legalitas"
                        class="tab-section bg-white rounded-xl shadow-sm border border-gray-200 p-6 hidden"
                    >

                        <h2 class="font-bold text-lg mb-4">
                            Legalitas
                        </h2>


                        <div class="space-y-4">


                            {{-- SUMBER PEROLEHAN --}}
                            <div>

                                <label class="block text-sm font-semibold mb-1">
                                    Sumber Perolehan
                                </label>

                                <select
                                    name="sumber_perolehan"
                                    class="w-full border-gray-300 rounded-lg p-3 text-sm"
                                >

                                    <option value="">
                                        Pilih sumber perolehan
                                    </option>

                                    <option
                                        value="Pembelian"
                                        {{ old('sumber_perolehan') === 'Pembelian' ? 'selected' : '' }}
                                    >
                                        Pembelian
                                    </option>

                                    <option
                                        value="Sewa"
                                        {{ old('sumber_perolehan') === 'Sewa' ? 'selected' : '' }}
                                    >
                                        Sewa
                                    </option>

                                    <option
                                        value="Hibah"
                                        {{ old('sumber_perolehan') === 'Hibah' ? 'selected' : '' }}
                                    >
                                        Hibah
                                    </option>

                                    <option
                                        value="Tukar Menukar"
                                        {{ old('sumber_perolehan') === 'Tukar Menukar' ? 'selected' : '' }}
                                    >
                                        Tukar Menukar
                                    </option>

                                    <option
                                        value="Lelang"
                                        {{ old('sumber_perolehan') === 'Lelang' ? 'selected' : '' }}
                                    >
                                        Lelang
                                    </option>

                                    <option
                                        value="Pengadaan"
                                        {{ old('sumber_perolehan') === 'Pengadaan' ? 'selected' : '' }}
                                    >
                                        Pengadaan
                                    </option>

                                </select>

                            </div>


                            {{-- NILAI --}}
                            <div>

                                <label class="block text-sm font-semibold mb-1">
                                    Nilai Perkiraan
                                </label>

                                <input
                                    type="number"
                                    name="nilai_perkiraan"
                                    value="{{ old('nilai_perkiraan') }}"
                                    min="0"
                                    step="0.01"
                                    placeholder="Masukkan nilai perkiraan"
                                    class="w-full border-gray-300 rounded-lg p-3 text-sm"
                                >

                            </div>

                        </div>

                    </div>


                    {{-- =====================================================
                        TAB 5 : DOKUMEN
                    ====================================================== --}}
                    <div
                        id="tab-content-dokumen"
                        class="tab-section bg-white rounded-xl shadow-sm border border-gray-200 p-6 hidden"
                    >

                        <h2 class="font-bold text-lg mb-4">
                            Dokumen
                        </h2>


                        <div
                            id="dokumenDropzone"
                            class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center cursor-pointer hover:bg-gray-50 transition"
                            onclick="document.getElementById('dokumenInput').click()"
                        >

                            <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-2"></i>

                            <p class="text-sm font-medium text-gray-600">
                                Drag & drop dokumen atau klik untuk upload
                            </p>

                            <p class="text-xs text-gray-400 mt-1">
                                Format: PDF, JPG, PNG, DOC, DOCX, XLS, XLSX
                            </p>

                            <p class="text-xs text-gray-400">
                                Maksimal 10MB per file
                            </p>

                            <input
                                type="file"
                                name="dokumen[]"
                                id="dokumenInput"
                                class="hidden"
                                multiple
                                accept=".pdf,.jpg,.jpeg,.png,.doc,.docx,.xls,.xlsx"
                            >

                        </div>


                        {{-- PREVIEW DOKUMEN --}}
                        <div
                            id="dokumenPreview"
                            class="mt-4 space-y-2"
                        ></div>

                    </div>


                    {{-- =====================================================
                        TAB 6 : RINGKASAN
                    ====================================================== --}}
                    <div
                        id="tab-content-ringkasan"
                        class="tab-section bg-white rounded-xl shadow-sm border border-gray-200 p-6 hidden"
                    >

                        <h2 class="font-bold text-lg mb-4">
                            Ringkasan
                        </h2>


                        <div class="grid grid-cols-2 gap-4">


                            {{-- SKEMA --}}
                            <div>

                                <label class="block text-sm font-semibold mb-1">
                                    Peruntukan Rencana
                                </label>

                                <select
                                    name="skema"
                                    class="w-full border-gray-300 rounded-lg p-3 text-sm"
                                >

                                    <option value="">
                                        Pilih peruntukan rencana
                                    </option>

                                    <option
                                        value="Sewa"
                                        {{ old('skema') === 'Sewa' ? 'selected' : '' }}
                                    >
                                        Sewa
                                    </option>

                                    <option
                                        value="Kerjasama"
                                        {{ old('skema') === 'Kerjasama' ? 'selected' : '' }}
                                    >
                                        Kerjasama
                                    </option>

                                </select>

                            </div>


                            {{-- TAHUN --}}
                            <div>

                                <label class="block text-sm font-semibold mb-1">
                                    Tahun Perolehan
                                </label>

                                <input
                                    type="number"
                                    name="tahun_perolehan"
                                    value="{{ old('tahun_perolehan') }}"
                                    min="1900"
                                    max="{{ date('Y') + 1 }}"
                                    placeholder="Pilih tahun"
                                    class="w-full border-gray-300 rounded-lg p-3 text-sm"
                                >

                            </div>

                        </div>

                    </div>

                </div>


                {{-- =========================================================
                    KOLOM KANAN
                ========================================================== --}}
                <div class="space-y-6">


                    {{-- =====================================================
                        UPLOAD GAMBAR
                    ====================================================== --}}
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

                        <h2 class="font-bold text-lg mb-4">
                            Gambar Aset
                        </h2>


                        <div
                            id="gambarDropzone"
                            class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center mb-4 cursor-pointer hover:bg-gray-50 transition"
                            onclick="document.getElementById('gambarInput').click()"
                        >

                            <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-2"></i>

                            <p class="text-sm font-medium text-gray-600">
                                Drag & drop gambar atau klik untuk upload
                            </p>

                            <p class="text-xs text-gray-400 mt-1">
                                Format: JPG, JPEG, PNG, GIF, WEBP
                            </p>

                            <p class="text-xs text-gray-400">
                                Maksimal 5MB
                            </p>

                            <input
                                type="file"
                                name="gambar"
                                class="hidden"
                                id="gambarInput"
                                accept="image/jpeg,image/png,image/jpg,image/gif,image/webp"
                            >

                        </div>


                        <button
                            type="button"
                            onclick="document.getElementById('gambarInput').click()"
                            class="w-full border border-gray-300 rounded-lg py-2 text-sm font-medium hover:bg-gray-50"
                        >
                            <i class="fas fa-image mr-2"></i>
                            Pilih Gambar
                        </button>


                        {{-- PREVIEW GAMBAR --}}
                        <div
                            id="gambarPreview"
                            class="mt-4 hidden"
                        >

                            <p class="text-sm font-semibold text-gray-700 mb-2">
                                Preview Gambar
                            </p>

                            <img
                                id="gambarPreviewImage"
                                src=""
                                alt="Preview gambar aset"
                                class="w-full h-48 object-cover rounded-lg border border-gray-200"
                            >

                            <p
                                id="gambarFileName"
                                class="text-xs text-gray-500 mt-2 truncate"
                            ></p>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =============================================================
                AKSI BAWAH
            ============================================================== --}}
            <div class="mt-8 flex justify-end gap-4">

                <a
                    href="{{ route('admin.aset.index') }}"
                    class="border border-gray-300 rounded-lg px-6 py-3 text-sm font-medium hover:bg-gray-50"
                >
                    Batal
                </a>

                <button
                    type="submit"
                    class="bg-[#006400] hover:bg-[#005500] text-white px-6 py-3 rounded-lg font-bold text-sm"
                >
                    <i class="fas fa-save mr-2"></i>
                    Simpan Data
                </button>

            </div>

        </form>

    </div>


    {{-- =============================================================
        LEAFLET
    ============================================================== --}}
    <link
        rel="stylesheet"
        href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIINfQ3rYkZ2F0f2Qv0R5j8M5Y4Z0mY0m5M="
        crossorigin=""
    />

    <script
        src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin=""
    ></script>


    <script>

        document.addEventListener('DOMContentLoaded', function () {

            /*
             * ============================================================
             * TAB
             * ============================================================
             */

            const firstTab =
                document.getElementById('tab-content-info');

            if (firstTab) {
                firstTab.classList.remove('hidden');
            }


            const firstButton =
                document.getElementById('tab-info');

            if (firstButton) {

                firstButton.classList.add(
                    'border-[#006400]',
                    'text-[#006400]'
                );

            }


            /*
             * ============================================================
             * DESKRIPSI COUNTER
             * ============================================================
             */

            const deskripsiInput =
                document.getElementById('deskripsiInput');

            const deskripsiCounter =
                document.getElementById('deskripsiCounter');


            function updateDeskripsiCounter() {

                if (!deskripsiInput || !deskripsiCounter) {
                    return;
                }

                deskripsiCounter.textContent =
                    `${deskripsiInput.value.length}/1000`;

            }


            if (deskripsiInput) {

                deskripsiInput.addEventListener(
                    'input',
                    updateDeskripsiCounter
                );

                updateDeskripsiCounter();

            }


            /*
             * ============================================================
             * LUAS M2 -> HA
             *
             * Field database bernama luas_hektar.
             * Kita tidak mengubah struktur database yang ada.
             *
             * 1 Ha = 10.000 m²
             * ============================================================
             */

            const luasInput =
                document.querySelector('[name="luas_hektar"]');

            const luasHaPreview =
                document.getElementById('luasHaPreview');


            function updateLuasHa() {

                if (!luasInput || !luasHaPreview) {
                    return;
                }

                const value =
                    parseFloat(luasInput.value);

                if (Number.isNaN(value)) {

                    luasHaPreview.value = '';

                    return;
                }

                luasHaPreview.value =
                    (value / 10000).toFixed(4) + ' Ha';

            }


            if (luasInput) {

                luasInput.addEventListener(
                    'input',
                    updateLuasHa
                );

                updateLuasHa();

            }


            /*
             * ============================================================
             * PREVIEW GAMBAR
             * ============================================================
             */

            const gambarInput =
                document.getElementById('gambarInput');

            const gambarPreview =
                document.getElementById('gambarPreview');

            const gambarPreviewImage =
                document.getElementById('gambarPreviewImage');

            const gambarFileName =
                document.getElementById('gambarFileName');


            if (gambarInput) {

                gambarInput.addEventListener(
                    'change',
                    function () {

                        const file = this.files[0];

                        if (!file) {

                            if (gambarPreview) {
                                gambarPreview.classList.add('hidden');
                            }

                            return;
                        }


                        /*
                         * Validasi tipe gambar
                         */

                        const allowedTypes = [
                            'image/jpeg',
                            'image/png',
                            'image/jpg',
                            'image/gif',
                            'image/webp'
                        ];


                        if (!allowedTypes.includes(file.type)) {

                            alert(
                                'Format gambar tidak didukung. Gunakan JPG, JPEG, PNG, GIF, atau WEBP.'
                            );

                            this.value = '';

                            if (gambarPreview) {
                                gambarPreview.classList.add('hidden');
                            }

                            return;
                        }


                        /*
                         * Validasi ukuran 5MB
                         */

                        if (file.size > 5 * 1024 * 1024) {

                            alert(
                                'Ukuran gambar maksimal 5MB.'
                            );

                            this.value = '';

                            if (gambarPreview) {
                                gambarPreview.classList.add('hidden');
                            }

                            return;
                        }


                        const reader =
                            new FileReader();


                        reader.onload =
                            function (event) {

                                if (gambarPreviewImage) {

                                    gambarPreviewImage.src =
                                        event.target.result;

                                }


                                if (gambarFileName) {

                                    gambarFileName.textContent =
                                        file.name;

                                }


                                if (gambarPreview) {

                                    gambarPreview.classList.remove(
                                        'hidden'
                                    );

                                }

                            };


                        reader.readAsDataURL(file);

                    }
                );

            }


            /*
             * ============================================================
             * PREVIEW DOKUMEN
             * ============================================================
             */

            const dokumenInput =
                document.getElementById('dokumenInput');

            const dokumenPreview =
                document.getElementById('dokumenPreview');


            if (dokumenInput) {

                dokumenInput.addEventListener(
                    'change',
                    function () {

                        if (!dokumenPreview) {
                            return;
                        }


                        dokumenPreview.innerHTML = '';


                        const files =
                            Array.from(this.files);


                        if (files.length === 0) {
                            return;
                        }


                        const allowedExtensions = [
                            'pdf',
                            'jpg',
                            'jpeg',
                            'png',
                            'doc',
                            'docx',
                            'xls',
                            'xlsx'
                        ];


                        files.forEach(
                            function (file) {

                                const extension =
                                    file.name
                                        .split('.')
                                        .pop()
                                        .toLowerCase();


                                /*
                                 * Validasi ekstensi
                                 */

                                if (
                                    !allowedExtensions.includes(
                                        extension
                                    )
                                ) {

                                    return;
                                }


                                /*
                                 * Validasi ukuran 10MB
                                 */

                                if (
                                    file.size >
                                    10 * 1024 * 1024
                                ) {

                                    const item =
                                        document.createElement('div');

                                    item.className =
                                        'flex items-center gap-3 bg-red-50 border border-red-200 rounded-lg px-3 py-3 text-sm';


                                    item.innerHTML = `
                                        <i class="fas fa-circle-exclamation text-red-500"></i>

                                        <div class="flex-1 min-w-0">

                                            <p class="font-medium text-red-700 truncate">
                                                ${escapeHtml(file.name)}
                                            </p>

                                            <p class="text-xs text-red-500">
                                                Ukuran file melebihi 10MB.
                                            </p>

                                        </div>
                                    `;


                                    dokumenPreview.appendChild(item);

                                    return;
                                }


                                /*
                                 * Preview normal
                                 */

                                const item =
                                    document.createElement('div');


                                item.className =
                                    'flex items-center gap-3 bg-gray-50 border border-gray-200 rounded-lg px-3 py-3 text-sm';


                                item.innerHTML = `
                                    <div class="w-9 h-9 rounded-lg bg-green-50 text-[#006400] flex items-center justify-center shrink-0">

                                        <i class="fas fa-file"></i>

                                    </div>

                                    <div class="flex-1 min-w-0">

                                        <p class="font-medium text-gray-800 truncate">
                                            ${escapeHtml(file.name)}
                                        </p>

                                        <p class="text-xs text-gray-400">
                                            ${(file.size / 1024 / 1024).toFixed(2)} MB
                                        </p>

                                    </div>

                                    <i class="fas fa-check text-green-600"></i>
                                `;


                                dokumenPreview.appendChild(item);

                            }
                        );

                    }
                );

            }


            /*
             * ============================================================
             * DRAG & DROP GAMBAR
             * ============================================================
             */

            const gambarDropzone =
                document.getElementById('gambarDropzone');


            if (gambarDropzone && gambarInput) {

                gambarDropzone.addEventListener(
                    'dragover',
                    function (event) {

                        event.preventDefault();

                        gambarDropzone.classList.add(
                            'bg-green-50',
                            'border-[#006400]'
                        );

                    }
                );


                gambarDropzone.addEventListener(
                    'dragleave',
                    function () {

                        gambarDropzone.classList.remove(
                            'bg-green-50',
                            'border-[#006400]'
                        );

                    }
                );


                gambarDropzone.addEventListener(
                    'drop',
                    function (event) {

                        event.preventDefault();

                        gambarDropzone.classList.remove(
                            'bg-green-50',
                            'border-[#006400]'
                        );


                        if (
                            event.dataTransfer.files &&
                            event.dataTransfer.files.length > 0
                        ) {

                            gambarInput.files =
                                event.dataTransfer.files;

                            gambarInput.dispatchEvent(
                                new Event('change', {
                                    bubbles: true
                                })
                            );

                        }

                    }
                );

            }


            /*
             * ============================================================
             * DRAG & DROP DOKUMEN
             * ============================================================
             */

            const dokumenDropzone =
                document.getElementById('dokumenDropzone');


            if (dokumenDropzone && dokumenInput) {

                dokumenDropzone.addEventListener(
                    'dragover',
                    function (event) {

                        event.preventDefault();

                        dokumenDropzone.classList.add(
                            'bg-green-50',
                            'border-[#006400]'
                        );

                    }
                );


                dokumenDropzone.addEventListener(
                    'dragleave',
                    function () {

                        dokumenDropzone.classList.remove(
                            'bg-green-50',
                            'border-[#006400]'
                        );

                    }
                );


                dokumenDropzone.addEventListener(
                    'drop',
                    function (event) {

                        event.preventDefault();

                        dokumenDropzone.classList.remove(
                            'bg-green-50',
                            'border-[#006400]'
                        );


                        if (
                            event.dataTransfer.files &&
                            event.dataTransfer.files.length > 0
                        ) {

                            dokumenInput.files =
                                event.dataTransfer.files;

                            dokumenInput.dispatchEvent(
                                new Event('change', {
                                    bubbles: true
                                })
                            );

                        }

                    }
                );

            }

        });


        /*
         * ================================================================
         * TAB SWITCHING
         * ================================================================
         */

        function showTab(tabName) {

            /*
             * Sembunyikan seluruh tab
             */

            document
                .querySelectorAll('.tab-section')
                .forEach(function (section) {

                    section.classList.add('hidden');

                });


            /*
             * Tampilkan tab yang dipilih
             */

            const selectedTab =
                document.getElementById(
                    'tab-content-' + tabName
                );


            if (selectedTab) {

                selectedTab.classList.remove('hidden');

            }


            /*
             * Reset semua button tab
             */

            document
                .querySelectorAll('button[id^="tab-"]')
                .forEach(function (button) {

                    button.classList.remove(
                        'border-[#006400]',
                        'text-[#006400]'
                    );

                    button.classList.add(
                        'border-transparent',
                        'text-gray-500'
                    );

                });


            /*
             * Aktifkan button
             */

            const selectedButton =
                document.getElementById(
                    'tab-' + tabName
                );


            if (selectedButton) {

                selectedButton.classList.add(
                    'border-[#006400]',
                    'text-[#006400]'
                );

                selectedButton.classList.remove(
                    'border-transparent',
                    'text-gray-500'
                );

            }


            /*
             * Jika pindah ke peta, paksa Leaflet menghitung ukuran ulang.
             */

            if (
                tabName === 'lokasi' &&
                typeof assetMap !== 'undefined' &&
                assetMap
            ) {

                setTimeout(function () {

                    assetMap.invalidateSize();

                }, 200);

            }

        }


        /*
         * ================================================================
         * LEAFLET MAP
         * ================================================================
         */

        let assetMap = null;

        let assetMarker = null;


        document.addEventListener(
            'DOMContentLoaded',
            function () {

                const mapElement =
                    document.getElementById('assetMap');


                if (!mapElement) {
                    return;
                }


                if (
                    typeof L === 'undefined'
                ) {

                    console.error(
                        'Leaflet belum berhasil dimuat.'
                    );

                    return;
                }


                /*
                 * Default Indonesia/Jakarta
                 */

                const defaultLat =
                    -6.200000;

                const defaultLng =
                    106.816666;


                assetMap =
                    L.map('assetMap')
                        .setView(
                            [
                                defaultLat,
                                defaultLng
                            ],
                            6
                        );


                L.tileLayer(
                    'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
                    {
                        attribution:
                            '&copy; OpenStreetMap contributors',

                        maxZoom: 19
                    }
                ).addTo(assetMap);


                assetMarker =
                    L.marker(
                        [
                            defaultLat,
                            defaultLng
                        ],
                        {
                            draggable: true
                        }
                    ).addTo(assetMap);


                /*
                 * Ketika marker digeser
                 */

                assetMarker.on(
                    'dragend',
                    function (event) {

                        const position =
                            event.target.getLatLng();


                        const latInput =
                            document.getElementById(
                                'latInput'
                            );

                        const lngInput =
                            document.getElementById(
                                'lngInput'
                            );


                        if (latInput) {

                            latInput.value =
                                position.lat.toFixed(7);

                        }


                        if (lngInput) {

                            lngInput.value =
                                position.lng.toFixed(7);

                        }

                    }
                );

            }
        );


        /*
         * ================================================================
         * CARI KOORDINAT
         * ================================================================
         */

        function cariKoordinat() {

            const latInput =
                document.getElementById('latInput');

            const lngInput =
                document.getElementById('lngInput');


            if (!latInput || !lngInput) {

                return;

            }


            const lat =
                parseFloat(latInput.value);

            const lng =
                parseFloat(lngInput.value);


            /*
             * Validasi kosong
             */

            if (
                Number.isNaN(lat) ||
                Number.isNaN(lng)
            ) {

                alert(
                    'Latitude dan longitude harus diisi.'
                );

                return;
            }


            /*
             * Validasi latitude
             */

            if (
                lat < -90 ||
                lat > 90
            ) {

                alert(
                    'Latitude harus berada antara -90 dan 90.'
                );

                latInput.focus();

                return;
            }


            /*
             * Validasi longitude
             */

            if (
                lng < -180 ||
                lng > 180
            ) {

                alert(
                    'Longitude harus berada antara -180 dan 180.'
                );

                lngInput.focus();

                return;
            }


            /*
             * Pastikan map sudah tersedia
             */

            if (!assetMap) {

                alert(
                    'Peta belum selesai dimuat. Silakan tunggu sebentar.'
                );

                return;
            }


            /*
             * Pindahkan map
             */

            assetMap.setView(
                [
                    lat,
                    lng
                ],
                16
            );


            /*
             * Pindahkan marker
             */

            if (assetMarker) {

                assetMarker.setLatLng(
                    [
                        lat,
                        lng
                    ]
                );

            }


            /*
             * Pastikan map tampil sempurna
             */

            setTimeout(function () {

                assetMap.invalidateSize();

            }, 200);

        }


        /*
         * ================================================================
         * ESCAPE HTML
         * ================================================================
         */

        function escapeHtml(value) {

            const div =
                document.createElement('div');

            div.textContent =
                value;

            return div.innerHTML;

        }

    </script>

@endsection