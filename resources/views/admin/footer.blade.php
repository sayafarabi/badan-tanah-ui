@extends('layouts.admin')

@section('title', 'Footer')

@section('content')

<div class="max-w-6xl mx-auto">

    {{-- HEADER --}}
    <div class="flex items-start gap-4 mb-8">
        <div class="w-14 h-14 bg-green-100 text-[#006400] rounded-xl flex items-center justify-center">
            <i class="fas fa-window-maximize text-xl"></i>
        </div>

        <div>
            <h1 class="text-2xl font-bold text-gray-900">
                Footer Website
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                Kelola seluruh informasi yang ditampilkan pada bagian footer website.
            </p>
        </div>
    </div>


    {{-- SUCCESS --}}
    @if(session('success'))
        <div class="mb-6 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
            <i class="fas fa-circle-check mr-2"></i>
            {{ session('success') }}
        </div>
    @endif


    {{-- VALIDATION --}}
    @if($errors->any())
        <div class="mb-6 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
            <ul class="list-disc ml-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form
        action="{{ route('admin.footer.update') }}"
        method="POST"
        class="space-y-6"
    >

        @csrf


        {{-- INFORMASI UTAMA --}}
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">

            <div class="px-6 py-5 border-b border-gray-200">
                <h2 class="text-lg font-bold text-gray-900">
                    Informasi Utama
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Informasi identitas yang ditampilkan pada footer.
                </p>
            </div>


            <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-5">

                {{-- DESKRIPSI --}}
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Deskripsi Footer
                    </label>

                    <textarea
                        name="footer_deskripsi"
                        rows="4"
                        class="w-full rounded-lg border-gray-300 focus:border-[#006400] focus:ring-[#006400]"
                        placeholder="Deskripsi singkat mengenai Badan Bank Tanah..."
                    >{{ old('footer_deskripsi', $pengaturan->footer_deskripsi ?? '') }}</textarea>
                </div>


                {{-- ALAMAT --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Alamat
                    </label>

                    <textarea
                        name="footer_alamat"
                        rows="3"
                        class="w-full rounded-lg border-gray-300 focus:border-[#006400] focus:ring-[#006400]"
                    >{{ old('footer_alamat', $pengaturan->footer_alamat ?? '') }}</textarea>
                </div>


                {{-- EMAIL --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Email
                    </label>

                    <input
                        type="email"
                        name="footer_email"
                        value="{{ old('footer_email', $pengaturan->footer_email ?? '') }}"
                        class="w-full rounded-lg border-gray-300 focus:border-[#006400] focus:ring-[#006400]"
                        placeholder="info@banktanah.id"
                    >
                </div>


                {{-- TELEPON --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Telepon
                    </label>

                    <input
                        type="text"
                        name="footer_telepon"
                        value="{{ old('footer_telepon', $pengaturan->footer_telepon ?? '') }}"
                        class="w-full rounded-lg border-gray-300 focus:border-[#006400] focus:ring-[#006400]"
                        placeholder="021-xxxxxxx"
                    >
                </div>

            </div>
        </div>


        {{-- SOCIAL MEDIA --}}
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">

            <div class="px-6 py-5 border-b border-gray-200">

                <h2 class="text-lg font-bold text-gray-900">
                    Media Sosial
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Masukkan URL akun media sosial resmi.
                </p>

            </div>


            <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-5">

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Facebook
                    </label>

                    <input
                        type="url"
                        name="footer_facebook"
                        value="{{ old('footer_facebook', $pengaturan->footer_facebook ?? '') }}"
                        class="w-full rounded-lg border-gray-300 focus:border-[#006400] focus:ring-[#006400]"
                        placeholder="https://facebook.com/..."
                    >
                </div>


                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Twitter / X
                    </label>

                    <input
                        type="url"
                        name="footer_twitter"
                        value="{{ old('footer_twitter', $pengaturan->footer_twitter ?? '') }}"
                        class="w-full rounded-lg border-gray-300 focus:border-[#006400] focus:ring-[#006400]"
                        placeholder="https://x.com/..."
                    >
                </div>


                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Instagram
                    </label>

                    <input
                        type="url"
                        name="footer_instagram"
                        value="{{ old('footer_instagram', $pengaturan->footer_instagram ?? '') }}"
                        class="w-full rounded-lg border-gray-300 focus:border-[#006400] focus:ring-[#006400]"
                        placeholder="https://instagram.com/..."
                    >
                </div>


                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        LinkedIn
                    </label>

                    <input
                        type="url"
                        name="footer_linkedin"
                        value="{{ old('footer_linkedin', $pengaturan->footer_linkedin ?? '') }}"
                        class="w-full rounded-lg border-gray-300 focus:border-[#006400] focus:ring-[#006400]"
                        placeholder="https://linkedin.com/company/..."
                    >
                </div>

            </div>
        </div>


        {{-- LEGAL --}}
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">

            <div class="px-6 py-5 border-b border-gray-200">

                <h2 class="text-lg font-bold text-gray-900">
                    Informasi Legal
                </h2>

            </div>


            <div class="p-6 space-y-5">

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Copyright
                    </label>

                    <input
                        type="text"
                        name="footer_copyright"
                        value="{{ old('footer_copyright', $pengaturan->footer_copyright ?? '') }}"
                        class="w-full rounded-lg border-gray-300 focus:border-[#006400] focus:ring-[#006400]"
                        placeholder="© 2026 Badan Bank Tanah"
                    >
                </div>


                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Kebijakan Privasi
                        </label>

                        <input
                            type="text"
                            name="footer_privacy"
                            value="{{ old('footer_privacy', $pengaturan->footer_privacy ?? '') }}"
                            class="w-full rounded-lg border-gray-300 focus:border-[#006400] focus:ring-[#006400]"
                        >
                    </div>


                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Syarat & Ketentuan
                        </label>

                        <input
                            type="text"
                            name="footer_terms"
                            value="{{ old('footer_terms', $pengaturan->footer_terms ?? '') }}"
                            class="w-full rounded-lg border-gray-300 focus:border-[#006400] focus:ring-[#006400]"
                        >
                    </div>


                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Aksesibilitas
                        </label>

                        <input
                            type="text"
                            name="footer_accessibility"
                            value="{{ old('footer_accessibility', $pengaturan->footer_accessibility ?? '') }}"
                            class="w-full rounded-lg border-gray-300 focus:border-[#006400] focus:ring-[#006400]"
                        >
                    </div>

                </div>

            </div>
        </div>


        {{-- BUTTON --}}
        <div class="flex justify-end">

            <button
                type="submit"
                class="inline-flex items-center gap-2 bg-[#006400] hover:bg-[#005500] text-white px-6 py-3 rounded-lg font-bold text-sm transition"
            >
                <i class="fas fa-save"></i>
                Simpan Footer
            </button>

        </div>

    </form>

</div>

@endsection