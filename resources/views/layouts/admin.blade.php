<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'CMS Admin Panel')</title>

    @vite(['resources/css/app.css', 'resources/css/admin-dark-mode.css', 'resources/js/app.js', 'resources/js/admin-dark-mode.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 flex h-screen overflow-hidden text-gray-800 transition-colors duration-300">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-white text-white flex-shrink-0 flex flex-col">
        <!-- Logo -->
        <div class="p-6 border-b border-white/10">
            <div class="flex items-center gap-3">
                <div class="flex items-center justify-center w-13 h-12 bg-transparent rounded-lg overflow-hidden">
                    <img src="{{ asset('images/Logo-badan-bank-tanah.png') }}" alt="Logo Badan Bank Tanah"
                        class="w-full h-full object-contain">
                </div>
            </div>

            <p class="text-xs text-gray-900 mt-4 font-semibold">CMS Admin Panel</p>
        </div>

        <!-- Menu Navigasi -->
        <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center gap-3 p-3 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-[#006400] text-white' : 'text-gray-900 hover:bg-[#006400] hover:text-white' }} font-medium transition">
                <i class="fas fa-home w-5"></i> Dashboard
            </a>

            <div class="pt-4 pb-2">
                <p class="px-3 text-xs font-bold text-gray-400 uppercase">Website</p>
            </div>
            <div x-data="{ open: true }" class="relative">
                <button @click="open = !open"
                    class="flex items-center gap-3 w-full p-3 rounded-lg {{ request()->routeIs('admin.website') ? 'bg-[#006400] text-white' : 'text-gray-900 hover:bg-[#006400] hover:text-white' }} font-medium transition">
                    <i class="fas fa-globe w-5"></i> Website
                    <i class="fas fa-chevron-down ml-auto text-xs transition-transform"
                        :class="open ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="open" x-transition class="mt-1 pl-6 space-y-1">

                    <!-- TENTANG -->
                    <a href="{{ route('admin.halaman.edit.tentang') }}"
                        class="flex items-center gap-2 py-2 px-3 rounded-md text-xs font-medium transition
            {{ request()->routeIs('admin.halaman.edit.tentang')
            ? 'bg-green-50 text-[#006400] font-semibold'
            : 'text-gray-500 hover:bg-gray-50 hover:text-[#006400]' }}">
                        <i class="fas fa-circle-info w-4 text-center"></i>
                        <span>Tentang</span>
                    </a>

                    <!-- HALAMAN -->
                    <a href="{{ route('admin.halaman.index') }}"
                        class="flex items-center gap-2 py-2 px-3 rounded-md text-xs font-medium transition
            {{ request()->routeIs('admin.halaman.index')
            ? 'bg-green-50 text-[#006400] font-semibold'
            : 'text-gray-500 hover:bg-gray-50 hover:text-[#006400]' }}">
                        <i class="fas fa-file-lines w-4 text-center"></i>
                        <span>Halaman</span>
                    </a>

                    <!-- MENU NAVIGASI -->
                    <a href="{{ route('admin.menu_navigasi') }}"
                        class="flex items-center gap-2 py-2 px-3 rounded-md text-xs font-medium transition
            {{ request()->routeIs('admin.menu_navigasi')
            ? 'bg-green-50 text-[#006400] font-semibold'
            : 'text-gray-500 hover:bg-gray-50 hover:text-[#006400]' }}">
                        <i class="fas fa-bars w-4 text-center"></i>
                        <span>Menu Navigasi</span>
                    </a>

                    <!-- FOOTER -->
                    <a href="{{ route('admin.footer.index') }}"
                        class="flex items-center gap-2 py-2 px-3 rounded-md text-xs font-medium transition
            {{ request()->routeIs('admin.footer.index')
            ? 'bg-green-50 text-[#006400] font-semibold'
            : 'text-gray-500 hover:bg-gray-50 hover:text-[#006400]' }}">
                        <i class="fas fa-shoe-prints w-4 text-center"></i>
                        <span>Footer</span>
                    </a>

                    <!-- FAQ -->
                    <a href="{{ route('admin.faq.index') }}"
                        class="flex items-center gap-2 py-2 px-3 rounded-md text-xs font-medium transition
            {{ request()->routeIs('admin.faq.index')
            ? 'bg-green-50 text-[#006400] font-semibold'
            : 'text-gray-500 hover:bg-gray-50 hover:text-[#006400]' }}">
                        <i class="fas fa-circle-question w-4 text-center"></i>
                        <span>FAQ</span>
                    </a>

                    <!-- KARIER -->
                    <a href="{{ route('admin.karier.index') }}"
                        class="flex items-center gap-2 py-2 px-3 rounded-md text-xs font-medium transition
            {{ request()->routeIs('admin.karier.index')
            ? 'bg-green-50 text-[#006400] font-semibold'
            : 'text-gray-500 hover:bg-gray-50 hover:text-[#006400]' }}">
                        <i class="fas fa-briefcase w-4 text-center"></i>
                        <span>Karier</span>
                    </a>

                    <!-- KONTAK KAMI -->
                    <a href="{{ route('admin.kontak.index') }}"
                        class="flex items-center gap-2 py-2 px-3 rounded-md text-xs font-medium transition
            {{ request()->routeIs('admin.kontak.index')
            ? 'bg-green-50 text-[#006400] font-semibold'
            : 'text-gray-500 hover:bg-gray-50 hover:text-[#006400]' }}">
                        <i class="fas fa-envelope w-4 text-center"></i>
                        <span>Kontak Kami</span>
                    </a>

                </div>
            </div>

            <div class="pt-4 pb-2">
                <p class="px-3 text-xs font-bold text-gray-400 uppercase">Aset Persediaan Tanah</p>
            </div>
            <div x-data="{ open: true }" class="relative">
                <button @click="open = !open"
                    class="flex items-center gap-3 w-full p-3 rounded-lg {{ request()->routeIs('admin.aset.*') ? 'bg-[#006400] text-white' : 'text-gray-900 hover:bg-[#006400] hover:text-white' }} font-medium transition">
                    <i class="fas fa-map-marked-alt w-5"></i> Aset Persediaan Tanah
                    <i class="fas fa-chevron-down ml-auto text-xs transition-transform"
                        :class="open ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="open" x-transition class="mt-1 pl-6 space-y-1">

                    <!-- DATA ASET -->
                    <a href="{{ route('admin.aset.index') }}"
                        class="flex items-center gap-2 py-2 px-3 rounded-md text-xs font-medium transition
                        {{ request()->routeIs('admin.aset.index')
                            ? 'bg-green-50 text-[#006400] font-semibold'
                            : 'text-gray-500 hover:bg-gray-50 hover:text-[#006400]' }}">
                        <i class="fas fa-database w-4 text-center"></i>
                        <span>Data Aset</span>
                    </a>

                    <!-- PETA INTERAKTIF -->
                    <a href="{{ route('admin.aset.peta') }}"
                        class="flex items-center gap-2 py-2 px-3 rounded-md text-xs font-medium transition
                        {{ request()->routeIs('admin.aset.peta')
                            ? 'bg-green-50 text-[#006400] font-semibold'
                            : 'text-gray-500 hover:bg-gray-50 hover:text-[#006400]' }}">
                        <i class="fas fa-map-location-dot w-4 text-center"></i>
                        <span>Peta Interaktif</span>
                    </a>

                    <!-- PROFIL PERSEDIAAN -->
                    <a href="{{ route('admin.aset.profil') }}"
                        class="flex items-center gap-2 py-2 px-3 rounded-md text-xs font-medium transition
                        {{ request()->routeIs('admin.aset.profil')
                            ? 'bg-green-50 text-[#006400] font-semibold'
                            : 'text-gray-500 hover:bg-gray-50 hover:text-[#006400]' }}">
                        <i class="fas fa-layer-group w-4 text-center"></i>
                        <span>Profil Persediaan Tanah</span>
                    </a>

                    <!-- PENGELOLAAN -->
                    <a href="{{ route('admin.aset.pengelolaan') }}"
                        class="flex items-center gap-2 py-2 px-3 rounded-md text-xs font-medium transition
                        {{ request()->routeIs('admin.aset.pengelolaan')
                            ? 'bg-green-50 text-[#006400] font-semibold'
                            : 'text-gray-500 hover:bg-gray-50 hover:text-[#006400]' }}">
                        <i class="fas fa-gear w-4 text-center"></i>
                        <span>Pengelolaan Tanah</span>
                    </a>

                    <!-- PENGEMBANGAN -->
                    <a href="{{ route('admin.aset.pengembangan') }}"
                        class="flex items-center gap-2 py-2 px-3 rounded-md text-xs font-medium transition
                        {{ request()->routeIs('admin.aset.pengembangan')
                            ? 'bg-green-50 text-[#006400] font-semibold'
                            : 'text-gray-500 hover:bg-gray-50 hover:text-[#006400]' }}">
                        <i class="fas fa-chart-line w-4 text-center"></i>
                        <span>Pengembangan Tanah</span>
                    </a>

                    <!-- WILAYAH -->
                    <a href="{{ route('admin.aset.wilayah') }}"
                        class="flex items-center gap-2 py-2 px-3 rounded-md text-xs font-medium transition
                        {{ request()->routeIs('admin.aset.wilayah')
                            ? 'bg-green-50 text-[#006400] font-semibold'
                            : 'text-gray-500 hover:bg-gray-50 hover:text-[#006400]' }}">
                        <i class="fas fa-map w-4 text-center"></i>
                        <span>Wilayah</span>
                    </a>

                    <!-- STATUS TANAH -->
                    <a href="{{ route('admin.aset.status') }}"
                        class="flex items-center gap-2 py-2 px-3 rounded-md text-xs font-medium transition
                        {{ request()->routeIs('admin.aset.status')
                            ? 'bg-green-50 text-[#006400] font-semibold'
                            : 'text-gray-500 hover:bg-gray-50 hover:text-[#006400]' }}">
                        <i class="fas fa-circle-check w-4 text-center"></i>
                        <span>Status Tanah</span>
                    </a>

                    <!-- DOKUMEN -->
                    <a href="{{ route('admin.aset.dokumen') }}"
                        class="flex items-center gap-2 py-2 px-3 rounded-md text-xs font-medium transition
                        {{ request()->routeIs('admin.aset.dokumen')
                            ? 'bg-green-50 text-[#006400] font-semibold'
                            : 'text-gray-500 hover:bg-gray-50 hover:text-[#006400]' }}">
                        <i class="fas fa-file-lines w-4 text-center"></i>
                        <span>Dokumen</span>
                    </a>

                    <!-- STATISTIK -->
                    <a href="{{ route('admin.aset.statistik') }}"
                        class="flex items-center gap-2 py-2 px-3 rounded-md text-xs font-medium transition
                        {{ request()->routeIs('admin.aset.statistik')
                            ? 'bg-green-50 text-[#006400] font-semibold'
                            : 'text-gray-500 hover:bg-gray-50 hover:text-[#006400]' }}">
                        <i class="fas fa-chart-pie w-4 text-center"></i>
                        <span>Statistik</span>
                    </a>

                </div>
            </div>

            <div class="pt-4 pb-2">
                <p class="px-3 text-xs font-bold text-gray-400 uppercase">Pemanfaatan & Kerjasama</p>
            </div>
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open"
                    class="flex items-center gap-3 w-full p-3 rounded-lg {{ request()->routeIs('admin.halaman.edit.partnership') ? 'bg-[#006400] text-white' : 'text-gray-900 hover:bg-[#006400] hover:text-white' }} font-medium transition">
                    <i class="fas fa-handshake w-5"></i> Pemanfaatan & Kerjasama
                    <i class="fas fa-chevron-down ml-auto text-xs transition-transform"
                        :class="open ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="open" x-transition class="mt-1 pl-6 space-y-1">
                    <a href="{{ route('admin.halaman.edit.partnership') }}"
                        class="block py-1.5 text-xs font-medium text-gray-500 hover:text-black">Investasi</a>
                    <a href="{{ route('admin.halaman.edit.partnership') }}"
                        class="block py-1.5 text-xs font-medium text-gray-500 hover:text-black">Reforma Agraria</a>
                    <a href="{{ route('admin.halaman.edit.partnership') }}"
                        class="block py-1.5 text-xs font-medium text-gray-500 hover:text-black">Booklet</a>
                    <a href="{{ route('admin.halaman.edit.partnership') }}"
                        class="block py-1.5 text-xs font-medium text-gray-500 hover:text-black">Kerja Sama</a>
                    <a href="{{ route('admin.halaman.edit.partnership') }}"
                        class="block py-1.5 text-xs font-medium text-gray-500 hover:text-black">Formulir</a>
                    <a href="{{ route('admin.halaman.edit.partnership') }}"
                        class="block py-1.5 text-xs font-medium text-gray-500 hover:text-black">Permohonan</a>
                </div>
            </div>

            <div class="pt-4 pb-2">
                <p class="px-3 text-xs font-bold text-gray-400 uppercase">Publikasi</p>
            </div>
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open"
                    class="flex items-center gap-3 w-full p-3 rounded-lg {{ request()->routeIs('admin.berita.*') ? 'bg-[#006400] text-white' : 'text-gray-900 hover:bg-[#006400] hover:text-white' }} font-medium transition">
                    <i class="fas fa-newspaper w-5"></i> Publikasi
                    <i class="fas fa-chevron-down ml-auto text-xs transition-transform"
                        :class="open ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="open" x-transition class="mt-1 pl-6 space-y-1">
                    <a href="{{ route('admin.berita.index') }}"
                        class="block py-1.5 text-xs font-medium {{ request()->routeIs('admin.berita.index') ? 'text-white' : 'text-gray-500 hover:text-black' }}">Berita</a>
                    <a href="{{ route('admin.berita.index') }}"
                        class="block py-1.5 text-xs font-medium text-gray-500 hover:text-black">Siaran Pers</a>
                    <a href="{{ route('admin.berita.index') }}"
                        class="block py-1.5 text-xs font-medium text-gray-500 hover:text-black">Pengumuman</a>
                </div>
            </div>

            <div class="pt-4 pb-2">
                <p class="px-3 text-xs font-bold text-gray-400 uppercase">Lainnya</p>
            </div>
            <a href="{{ route('admin.kontak.index') }}"
                class="flex items-center gap-3 p-3 rounded-lg {{ request()->routeIs('admin.kontak.index') ? 'bg-[#006400] text-white' : 'text-gray-900 hover:bg-[#006400] hover:text-white' }} font-medium transition">
                <i class="fas fa-envelope w-5"></i> Kontak
            </a>
            <a href="{{ route('admin.user.index') }}"
                class="flex items-center gap-3 p-3 rounded-lg {{ request()->routeIs('admin.user.*') ? 'bg-[#006400] text-white' : 'text-gray-900 hover:bg-[#006400] hover:text-white' }} font-medium transition">
                <i class="fas fa-users w-5"></i> Pengguna
            </a>
            <a href="#"
                class="flex items-center gap-3 p-3 rounded-lg text-gray-900 hover:bg-[#006400] hover:text-white font-medium transition">
                <i class="fas fa-plug w-5"></i> Integrasi
            </a>
            <a href="#"
                class="flex items-center gap-3 p-3 rounded-lg text-gray-900 hover:bg-[#006400] hover:text-white font-medium transition">
                <i class="fas fa-cog w-5"></i> Pengaturan
            </a>
        </nav>

        <!-- PROFIL ADMIN (LOGOUT BENAR) -->
        <div class="p-4 border-t border-white/10 bg-[#0A2E23]">
            <div class="flex items-center gap-3">
                @if (auth()->user()->foto)
                    <img src="{{ asset('storage/' . auth()->user()->foto) }}"
                        class="w-10 h-10 rounded-full object-cover border-2 border-white/20">
                @else
                    <div
                        class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-[#0B3D2E] font-bold">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
                @endif
                <div>
                    <p class="text-sm font-bold text-white">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-gray-400 capitalize">{{ auth()->user()->role }}</p>
                </div>
                <form method="POST" action="{{ route('logout') }}" class="ml-auto">
                    @csrf
                    <button type="submit" class="text-gray-400 hover:text-white">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- KONTEN UTAMA -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- HEADER -->
        <header class="bg-white h-16 border-b border-gray-200 flex items-center justify-between px-6 shrink-0">
            <div class="flex items-center gap-4">
                <div class="relative">
                    <span class="absolute left-3 top-2.5 text-gray-400"><i class="fas fa-search"></i></span>
                    <form action="{{ route('search') }}" method="GET">
                        <input type="text" name="q" placeholder="Cari menu, konten, pengguna..."
                            class="bg-gray-50 border border-gray-200 rounded-lg pl-10 pr-4 py-2 text-sm w-96 focus:outline-none focus:ring-2 focus:ring-[#006400]">
                        <span
                            class="absolute right-3 top-3 text-[10px] text-gray-400 bg-gray-200 px-1.5 py-0.5 rounded">Ctrl
                            + K</span>
                    </form>
                </div>
            </div>

            <div class="flex items-center gap-4">
                <a href="{{ route('home') }}" class="text-sm text-gray-600 hover:text-[#006400]"><i
                        class="fas fa-external-link-alt mr-1"></i> Lihat Website</a>
                <button id="darkModeButton" type="button" class="text-gray-500 hover:text-gray-700 transition"
                    title="Aktifkan Dark Mode">

                    <i id="darkModeIcon" class="fas fa-moon"></i>

                </button>
                <button class="text-gray-500 hover:text-gray-700"><i class="fas fa-bell"></i></button>
                @if (auth()->user()->foto)
                    <img src="{{ asset('storage/' . auth()->user()->foto) }}"
                        class="w-8 h-8 rounded-full object-cover">
                @else
                    <div
                        class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold">
                        A</div>
                @endif

                <!-- LOGOUT YANG BENAR -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-gray-600 hover:text-red-600"><i
                            class="fas fa-sign-out-alt"></i></button>
                </form>
            </div>
        </header>

        <!-- ISI KONTEN -->
        <main class="flex-1 overflow-y-auto p-8">
            @yield('content')
        </main>
    </div>
</body>

</html>
