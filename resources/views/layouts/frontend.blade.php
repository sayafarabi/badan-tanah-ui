<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Badan Bank Tanah')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .leaflet-container {
            z-index: 0;
        }

        .sticky-header {
            z-index: 9999;
        }
    </style>
</head>

<body class="bg-white text-gray-800 antialiased">


    <!-- Top Bar -->
    <div class="text-white text-xs" style="background-color: {{ $pengaturan->warna_utama ?? '#0B2A4A' }};">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center py-2">
            <div class="flex items-center gap-2">
                <i class="fas fa-globe text-blue-300"></i>
                <span>Memajukan Pengelolaan Tanah yang Produktif, Transparan, dan Berkelanjutan</span>
            </div>
            <div class="flex items-center gap-4">
                <a href="{{ route('kontak') }}" class="hover:text-blue-300">Kontak</a>
                <a href="{{ route('search') }}" class="hover:text-blue-300">Pencarian</a>
                <i class="fas fa-search cursor-pointer hover:text-blue-300"></i>
            </div>
        </div>
    </div>

    <!-- Navbar Utama -->
    <header class="bg-white sticky top-0 z-[9999] shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center h-20">
                <a href="{{ route('home') }}" class="flex items-center gap-3 mr-8">
                    <div class="flex items-center justify-center w-13 h-12 bg-white rounded">
                        <img src="{{ asset('images/Logo-badan-bank-tanah.png') }}" alt="Logo Badan Bank Tanah"
                            class="w-full h-full object-contain">
                    </div>
                </a>

                <nav class="hidden md:flex items-center space-x-8 ml-16 text-sm font-semibold text-gray-700">

                    {{-- TENTANG --}}
                    <a href="{{ route('about') }}" class="hover:underline"
                        style="color: {{ $pengaturan->warna_utama ?? '#0B2A4A' }};">
                        Tentang
                    </a>

                    {{-- MENU LAINNYA --}}
                    @foreach ($menuNavigasi as $menu)
                        @if ($menu->status == 'Aktif' && strtolower($menu->nama) != 'tentang' && strtolower($menu->nama) != 'beranda')
                            <a href="{{ $menu->link }}" class="hover:underline"
                                style="color: {{ $pengaturan->warna_utama ?? '#0B2A4A' }};">

                                {{ $menu->nama }}

                            </a>
                        @endif
                    @endforeach

                </nav>

                <div class="flex items-center gap-4">
                    @auth
                        <a href="{{ route('dashboard') }}"
                            class="text-sm font-semibold text-gray-700 hover:text-[#0B2A4A]">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="text-sm font-semibold text-gray-700 hover:text-[#0B2A4A]">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}"
                            class="text-sm font-semibold text-gray-700 hover:underline">Masuk</a>
                        <a href="{{ route('register') }}"
                            class="text-white px-5 py-2.5 rounded text-sm font-semibold transition"
                            style="background-color: {{ $pengaturan->warna_utama ?? '#0B2A4A' }};">Layanan Digital</a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="text-white mt-20" style="background-color: {{ $pengaturan->warna_utama ?? '#0B2A4A' }};">
        <div
            class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 grid grid-cols-1 md:grid-cols-4 gap-10 border-b border-white/10">
            <div>
                <div class="flex items-center gap-3 mb-6">
                    <div class="flex items-center justify-center w-15 h-15 rounded">
                        <img src="{{ asset('images/Logo-badan-bank-tanah.png') }}" alt="Logo Badan Bank Tanah"
                            class="w-full h-full object-contain">
                    </div>
                </div>
                <p class="text-sm text-gray-300 leading-relaxed">
                    Mengelola tanah negara secara profesional, transparan, dan berkelanjutan untuk kepentingan rakyat.
                </p>
            </div>

            <div>
                <h4 class="font-bold text-white mb-6 uppercase text-sm tracking-wider">Tautan Cepat</h4>
                <ul class="space-y-3 text-sm text-gray-300">
                    <li><a href="{{ route('about') }}" class="hover:text-white">Tentang Kami</a></li>
                    <li><a href="{{ route('assets') }}" class="hover:text-white">Aset Persediaan</a></li>
                    <li><a href="{{ route('partnership') }}" class="hover:text-white">Pemanfaatan & Kerjasama</a></li>
                    <li><a href="{{ route('publications') }}" class="hover:text-white">Publikasi</a></li>
                    <li><a href="{{ route('kontak') }}" class="hover:text-white">Kontak</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-bold text-white mb-6 uppercase text-sm tracking-wider">Kontak</h4>
                <ul class="space-y-3 text-sm text-gray-300">
                    <li><i class="fas fa-map-marker-alt mr-2 text-blue-400"></i>Jl. H. Juanda No. 15, Jakarta Pusat</li>
                    <li><i class="fas fa-envelope mr-2 text-blue-400"></i>info@bantah.go.id</li>
                    <li><i class="fas fa-phone mr-2 text-blue-400"></i>(021) 3456-7890</li>
                </ul>
            </div>

            <div>
                <h4 class="font-bold text-white mb-6 uppercase text-sm tracking-wider">Newsletter</h4>
                <p class="text-sm text-gray-300 mb-4">Dapatkan informasi terbaru dari Badan Bank Tanah.</p>
                <div class="flex">
                    <input type="email" placeholder="Masukkan email Anda"
                        class="w-full bg-white/10 text-white p-3 rounded-l border border-white/20 focus:outline-none focus:border-blue-400 text-sm placeholder-gray-400">
                    <button class="px-4 rounded-r"
                        style="background-color: {{ $pengaturan->warna_sekunder ?? '#1D4ED8' }};"><i
                            class="fas fa-paper-plane"></i></button>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div
            class="max-w-7xl mx-auto px-4 py-6 flex flex-col md:flex-row justify-between items-center text-xs text-gray-400">
            <p>&copy; 2026 Badan Bank Tanah. Hak Cipta Dilindungi.</p>
            <div class="flex gap-6 mt-4 md:mt-0">
                <a href="#" class="hover:text-white">Kebijakan Privasi</a>
                <a href="#" class="hover:text-white">Syarat & Ketentuan</a>
                <a href="#" class="hover:text-white">Aksesibilitas</a>
            </div>
            <div class="flex gap-4 mt-4 md:mt-0">
                <a href="#" class="hover:text-white"><i class="fab fa-facebook-f text-lg"></i></a>
                <a href="#" class="hover:text-white"><i class="fab fa-twitter text-lg"></i></a>
                <a href="#" class="hover:text-white"><i class="fab fa-instagram text-lg"></i></a>
                <a href="#" class="hover:text-white"><i class="fab fa-linkedin-in text-lg"></i></a>
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    @stack('scripts')

    {{-- CHATBOT --}}
    @include('components.chatbot')
</body>

</html>
