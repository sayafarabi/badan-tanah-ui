<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <title>@yield('title', 'Badan Bank Tanah')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        /* =========================================================
           BASE
        ========================================================= */
        * {
            -webkit-tap-highlight-color: transparent;
        }
        body {
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }
        .leaflet-container {
            z-index: 0;
        }

        /* =========================================================
           SCROLLBAR
        ========================================================= */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #006400;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #005500;
        }

        /* =========================================================
           NAVBAR IMPROVEMENTS
        ========================================================= */
        /* Navbar link spacing - lebih renggang */
        nav a {
            position: relative;
            padding: 6px 4px;
            letter-spacing: 0.5px;
            font-size: 0.95rem;
        }

        /* Active indicator */
        nav a.text-\[\#006400\]::after,
        nav a.active-nav::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            right: 0;
            height: 3px;
            background: #006400;
            border-radius: 10px;
        }

        /* Dropdown menu items spacing */
        .dropdown-desktop .dropdown-menu a {
            padding: 12px 20px;
            font-size: 0.9rem;
            letter-spacing: 0.3px;
        }

        /* =========================================================
           MOBILE NAV - PROFESSIONAL
        ========================================================= */
        .mobile-nav {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            width: 300px;
            max-width: 85vw;
            background: #ffffff;
            z-index: 99999;
            transform: translateX(100%);
            transition: transform 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            overflow-y: auto;
            padding: 24px 20px 30px;
            display: flex;
            flex-direction: column;
            box-shadow: -10px 0 40px rgba(0,0,0,0.15);
        }
        .mobile-nav.open {
            transform: translateX(0);
        }

        .mobile-nav-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-bottom: 16px;
            border-bottom: 1px solid #f3f4f6;
            margin-bottom: 8px;
        }
        .mobile-nav-header .logo-text {
            font-size: 1rem;
            font-weight: 700;
            color: #0B2A4A;
        }
        .mobile-nav-header .logo-text span {
            color: #006400;
        }
        .mobile-nav-close {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #f3f4f6;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s ease;
            color: #374151;
            font-size: 1rem;
        }
        .mobile-nav-close:hover,
        .mobile-nav-close:active {
            background: #e5e7eb;
            transform: rotate(90deg);
        }

        .mobile-nav .nav-list {
            flex: 1;
            padding: 8px 0;
        }
        .mobile-nav .nav-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            border-radius: 10px;
            color: #374151;
            font-size: 0.95rem;
            font-weight: 500;
            transition: all 0.2s ease;
            text-decoration: none;
            margin-bottom: 2px;
            position: relative;
        }
        .mobile-nav .nav-item:active,
        .mobile-nav .nav-item.active {
            background: #f0fdf4;
            color: #006400;
        }
        .mobile-nav .nav-item i {
            width: 20px;
            text-align: center;
            color: #9ca3af;
            font-size: 1rem;
            transition: color 0.2s ease;
        }
        .mobile-nav .nav-item:active i,
        .mobile-nav .nav-item.active i {
            color: #006400;
        }
        .mobile-nav .nav-item .nav-badge {
            margin-left: auto;
            font-size: 0.6rem;
            background: #f3f4f6;
            color: #9ca3af;
            padding: 2px 10px;
            border-radius: 20px;
            font-weight: 600;
        }
        .mobile-nav .nav-item:active .nav-badge,
        .mobile-nav .nav-item.active .nav-badge {
            background: #dcfce7;
            color: #006400;
        }

        .mobile-nav .nav-divider {
            height: 1px;
            background: #f3f4f6;
            margin: 8px 14px;
        }

        .mobile-nav .nav-section-title {
            font-size: 0.6rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: #9ca3af;
            font-weight: 600;
            padding: 12px 14px 6px;
        }

        .mobile-nav .nav-item.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 8px;
            bottom: 8px;
            width: 3px;
            background: #006400;
            border-radius: 0 4px 4px 0;
        }

        .mobile-nav-footer {
            border-top: 1px solid #f3f4f6;
            padding-top: 16px;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        .mobile-nav-footer .btn-nav {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px;
            border-radius: 10px;
            font-size: 0.9rem;
            font-weight: 600;
            transition: all 0.2s ease;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }
        .mobile-nav-footer .btn-nav-login {
            background: #f3f4f6;
            color: #374151;
        }
        .mobile-nav-footer .btn-nav-login:active {
            background: #e5e7eb;
        }
        .mobile-nav-footer .btn-nav-register {
            background: #006400;
            color: white;
        }
        .mobile-nav-footer .btn-nav-register:active {
            background: #005500;
        }

        .mobile-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.4);
            z-index: 99998;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.35s ease;
        }
        .mobile-overlay.active {
            opacity: 1;
            pointer-events: all;
        }

        .hamburger {
            width: 28px;
            height: 20px;
            position: relative;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 0;
            border: none;
            background: transparent;
        }
        .hamburger span {
            display: block;
            height: 2.5px;
            background: #1f2937;
            border-radius: 10px;
            transition: all 0.3s ease;
            transform-origin: center;
        }
        .hamburger.active span:nth-child(1) {
            transform: translateY(8.5px) rotate(45deg);
            background: #006400;
        }
        .hamburger.active span:nth-child(2) {
            opacity: 0;
            transform: scaleX(0);
        }
        .hamburger.active span:nth-child(3) {
            transform: translateY(-8.5px) rotate(-45deg);
            background: #006400;
        }

        /* =========================================================
           DROPDOWN (Desktop)
        ========================================================= */
        @media (min-width: 1024px) {
            .dropdown-desktop {
                position: relative;
            }
            .dropdown-desktop .dropdown-menu {
                position: absolute;
                top: 100%;
                left: 0;
                margin-top: 10px;
                min-width: 220px;
                background: white;
                border-radius: 14px;
                box-shadow: 0 20px 60px rgba(0,0,0,0.12);
                border: 1px solid rgba(0,0,0,0.04);
                padding: 8px 0;
                opacity: 0;
                visibility: hidden;
                transform: translateY(-10px) scale(0.96);
                transition: all 0.25s ease;
                z-index: 50;
            }
            .dropdown-desktop:hover .dropdown-menu {
                opacity: 1;
                visibility: visible;
                transform: translateY(0) scale(1);
            }
            .dropdown-desktop .dropdown-menu a {
                display: flex;
                align-items: center;
                gap: 12px;
                padding: 12px 22px;
                color: #374151;
                font-size: 0.9rem;
                font-weight: 500;
                transition: all 0.15s ease;
                border-radius: 0;
                letter-spacing: 0.3px;
            }
            .dropdown-desktop .dropdown-menu a:hover {
                background: #f0fdf4;
                color: #006400;
            }
            .dropdown-desktop .dropdown-menu a i {
                width: 20px;
                color: #9ca3af;
                font-size: 0.9rem;
            }
        }

        @media (min-width: 1024px) {
            .hamburger {
                display: none !important;
            }
        }

        @media (max-width: 640px) {
            .text-hero-mobile {
                font-size: 2rem !important;
                line-height: 1.2 !important;
            }
        }

        /* =========================================================
           LOGO RESPONSIVE - LEBIH BESAR
        ========================================================= */
        .logo-container {
            display: flex;
            align-items: center;
            justify-content: center;
            background: transparent;
            border-radius: 8px;
        }

        .logo-container img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        @media (max-width: 480px) {
            .logo-container {
                width: 60px;
                height: 54px;
            }
            .logo-container img {
                max-width: 58px;
                max-height: 52px;
            }
        }

        @media (min-width: 481px) and (max-width: 767px) {
            .logo-container {
                width: 70px;
                height: 62px;
            }
            .logo-container img {
                max-width: 68px;
                max-height: 60px;
            }
        }

        @media (min-width: 768px) and (max-width: 1023px) {
            .logo-container {
                width: 80px;
                height: 72px;
            }
            .logo-container img {
                max-width: 78px;
                max-height: 70px;
            }
        }

        @media (min-width: 1024px) {
            .logo-container {
                width: 90px;
                height: 80px;
            }
            .logo-container img {
                max-width: 88px;
                max-height: 78px;
            }
        }
    </style>
</head>

<body class="bg-white text-gray-800 antialiased">

    @php
        $mainMenus = $menuNavigasi->filter(function($menu) {
            return $menu->status == 'Aktif' &&
                   !in_array(strtolower($menu->nama), ['faq', 'karier', 'kontak', 'beranda']);
        });
        $otherMenus = $menuNavigasi->filter(function($menu) {
            return $menu->status == 'Aktif' &&
                   in_array(strtolower($menu->nama), ['faq', 'karier', 'kontak']);
        });
    @endphp

    <!-- ========================================================= -->
    <!-- MOBILE OVERLAY -->
    <!-- ========================================================= -->
    <div class="mobile-overlay" id="mobileOverlay"></div>

    <!-- ========================================================= -->
    <!-- MOBILE NAV -->
    <!-- ========================================================= -->
    <nav class="mobile-nav" id="mobileNav">
        <div class="mobile-nav-header">
            <span class="logo-text">Badan <span>Bank Tanah</span></span>
            <button class="mobile-nav-close" id="mobileNavClose" aria-label="Tutup menu">
                <i class="fas fa-xmark"></i>
            </button>
        </div>

        <div class="nav-list">
            <div class="nav-section-title">Menu Utama</div>

            <a href="{{ route('home') }}" class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                <i class="fas fa-house"></i>
                Beranda
            </a>

            <a href="{{ route('about') }}" class="nav-item {{ request()->routeIs('about') ? 'active' : '' }}">
                <i class="fas fa-circle-info"></i>
                Tentang
            </a>

            <a href="{{ route('assets') }}" class="nav-item {{ request()->routeIs('assets*') ? 'active' : '' }}">
                <i class="fas fa-map-pin"></i>
                Aset Persediaan Tanah
            </a>

            <a href="{{ route('partnership') }}" class="nav-item {{ request()->routeIs('partnership') ? 'active' : '' }}">
                <i class="fas fa-handshake"></i>
                Pemanfaatan & Kerjasama
            </a>

            <a href="{{ route('publications') }}" class="nav-item {{ request()->routeIs('publications*') ? 'active' : '' }}">
                <i class="fas fa-newspaper"></i>
                Publikasi
            </a>

            <div class="nav-divider"></div>

            <div class="nav-section-title">Lainnya</div>

            <a href="{{ route('faq') }}" class="nav-item {{ request()->routeIs('faq') ? 'active' : '' }}">
                <i class="fas fa-circle-question"></i>
                FAQ
                <span class="nav-badge">Tanya</span>
            </a>

            <a href="{{ route('karier') }}" class="nav-item {{ request()->routeIs('karier') ? 'active' : '' }}">
                <i class="fas fa-briefcase"></i>
                Karier
                <span class="nav-badge">Karir</span>
            </a>

            <a href="{{ route('kontak') }}" class="nav-item {{ request()->routeIs('kontak') ? 'active' : '' }}">
                <i class="fas fa-envelope"></i>
                Kontak
                <span class="nav-badge">Hubungi</span>
            </a>
        </div>

        <!-- Footer Auth (Opsional) -->
        <div class="mobile-nav-footer">
            <a href="{{ route('login') }}" class="btn-nav btn-nav-login">
                <i class="fas fa-sign-in-alt"></i> Masuk Admin
            </a>
        </div>
    </nav>

    <!-- ========================================================= -->
    <!-- TOP BAR -->
    <!-- ========================================================= -->
    <div class="text-white text-xs hidden sm:block" style="background-color: {{ $pengaturan->warna_utama ?? '#0B2A4A' }};">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center py-2">
            <div class="flex items-center gap-2">
                <i class="fas fa-globe text-blue-300"></i>
                <span class="truncate">Memajukan Pengelolaan Tanah yang Produktif, Transparan, dan Berkelanjutan</span>
            </div>
            <div class="flex items-center gap-4">
                <a href="{{ route('kontak') }}" class="hover:text-blue-300 transition">Kontak</a>
                <a href="{{ route('search') }}" class="hover:text-blue-300 transition">Pencarian</a>
                <i class="fas fa-search cursor-pointer hover:text-blue-300 transition"></i>
            </div>
        </div>
    </div>

    <!-- ========================================================= -->
    <!-- NAVBAR UTAMA - Hanya Logo -->
    <!-- ========================================================= -->
    <header class="bg-white sticky top-0 z-[9999] shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 md:h-20">

                <!-- Logo - Lebih Besar -->
                <a href="{{ route('home') }}" class="flex items-center flex-shrink-0">
                    <div class="logo-container">
                        <img src="{{ asset('images/Logo-badan-bank-tanah.png') }}" alt="Logo Badan Bank Tanah">
                    </div>
                </a>

                <!-- ========================================================= -->
                <!-- DESKTOP NAVIGATION - Jarak Lebih Renggang -->
                <!-- ========================================================= -->
                <nav class="hidden lg:flex items-center space-x-8 xl:space-x-10 text-gray-700">

                    <a href="{{ route('about') }}"
                        class="hover:text-[#006400] transition font-medium {{ request()->routeIs('about') ? 'text-[#006400] font-semibold active-nav' : '' }}">
                        Tentang
                    </a>

                    <a href="{{ route('assets') }}"
                        class="hover:text-[#006400] transition font-medium {{ request()->routeIs('assets*') ? 'text-[#006400] font-semibold active-nav' : '' }}">
                        Aset Persediaan Tanah
                    </a>

                    <a href="{{ route('partnership') }}"
                        class="hover:text-[#006400] transition font-medium {{ request()->routeIs('partnership') ? 'text-[#006400] font-semibold active-nav' : '' }}">
                        Pemanfaatan & Kerjasama
                    </a>

                    <a href="{{ route('publications') }}"
                        class="hover:text-[#006400] transition font-medium {{ request()->routeIs('publications*') ? 'text-[#006400] font-semibold active-nav' : '' }}">
                        Publikasi
                    </a>

                    <!-- Dropdown Lainnya (Desktop) -->
                    @if ($otherMenus->count() > 0)
                    <div class="dropdown-desktop">
                        <button class="flex items-center gap-1 hover:text-[#006400] transition font-medium {{ request()->routeIs('faq') || request()->routeIs('karier') || request()->routeIs('kontak') ? 'text-[#006400] font-semibold' : '' }}">
                            Lainnya
                            <i class="fas fa-chevron-down text-[10px]"></i>
                        </button>
                        <div class="dropdown-menu">
                            @foreach ($otherMenus as $menu)
                                @php
                                    $icon = match(strtolower($menu->nama)) {
                                        'faq' => 'fa-circle-question',
                                        'karier' => 'fa-briefcase',
                                        'kontak' => 'fa-envelope',
                                        default => 'fa-circle'
                                    };
                                    $routeName = match(strtolower($menu->nama)) {
                                        'faq' => 'faq',
                                        'karier' => 'karier',
                                        'kontak' => 'kontak',
                                        default => ''
                                    };
                                @endphp
                                <a href="{{ route($routeName) }}">
                                    <i class="fas {{ $icon }}"></i>
                                    {{ $menu->nama }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                    @endif

                </nav>

                <!-- ========================================================= -->
                <!-- RIGHT SIDE -->
                <!-- ========================================================= -->
                <div class="flex items-center gap-2 md:gap-3">

                    <!-- Hamburger Menu (Mobile) -->
                    <button class="lg:hidden hamburger" id="hamburgerBtn" aria-label="Toggle menu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>

                </div>

            </div>
        </div>
    </header>

    <!-- ========================================================= -->
    <!-- MAIN CONTENT -->
    <!-- ========================================================= -->
    <main>
        @yield('content')
    </main>

    <!-- ========================================================= -->
    <!-- FOOTER -->
    <!-- ========================================================= -->
    <footer class="text-white mt-20" style="background-color: {{ $pengaturan->warna_utama ?? '#0B2A4A' }};">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 md:gap-10 border-b border-white/10">

            <!-- Kolom 1 -->
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div class="flex items-center justify-center w-12 h-12 rounded">
                        <img src="{{ asset('images/Logo-badan-bank-tanah.png') }}" alt="Logo"
                            class="w-full h-full object-contain">
                    </div>
                </div>
                <p class="text-sm text-gray-300 leading-relaxed">
                    Mengelola tanah negara secara profesional, transparan, dan berkelanjutan untuk kepentingan rakyat.
                </p>
            </div>

            <!-- Kolom 2 -->
            <div>
                <h4 class="font-bold text-white mb-4 uppercase text-xs tracking-wider">Tautan Cepat</h4>
                <ul class="space-y-2 text-sm text-gray-300">
                    <li><a href="{{ route('about') }}" class="hover:text-white transition">Tentang Kami</a></li>
                    <li><a href="{{ route('assets') }}" class="hover:text-white transition">Aset Persediaan</a></li>
                    <li><a href="{{ route('partnership') }}" class="hover:text-white transition">Pemanfaatan & Kerjasama</a></li>
                    <li><a href="{{ route('publications') }}" class="hover:text-white transition">Publikasi</a></li>
                    <li><a href="{{ route('faq') }}" class="hover:text-white transition">FAQ</a></li>
                    <li><a href="{{ route('karier') }}" class="hover:text-white transition">Karier</a></li>
                    <li><a href="{{ route('kontak') }}" class="hover:text-white transition">Kontak</a></li>
                </ul>
            </div>

            <!-- Kolom 3 -->
            <div>
                <h4 class="font-bold text-white mb-4 uppercase text-xs tracking-wider">Kontak</h4>
                <ul class="space-y-3 text-sm text-gray-300">
                    <li class="flex items-start gap-3">
                        <i class="fas fa-map-marker-alt text-blue-400 mt-0.5"></i>
                        <span>Jl. H. Juanda No. 15, Jakarta Pusat</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fas fa-envelope text-blue-400"></i>
                        <a href="mailto:info@bantah.go.id" class="hover:text-white transition">info@bantah.go.id</a>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fas fa-phone text-blue-400"></i>
                        <a href="tel:02134567890" class="hover:text-white transition">(021) 3456-7890</a>
                    </li>
                </ul>
                <div class="flex gap-3 mt-4">
                    <a href="#" class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/20 transition"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/20 transition"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/20 transition"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/20 transition"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            <!-- Kolom 4 -->
            <div>
                <h4 class="font-bold text-white mb-4 uppercase text-xs tracking-wider">Newsletter</h4>
                <p class="text-sm text-gray-300 mb-3">Dapatkan informasi terbaru dari Badan Bank Tanah.</p>
                <div class="flex">
                    <input type="email" placeholder="Email Anda"
                        class="flex-1 bg-white/10 text-white px-4 py-3 rounded-l-lg border border-white/20 focus:outline-none focus:border-blue-400 text-sm placeholder-gray-400">
                    <button class="px-4 rounded-r-lg transition hover:opacity-90"
                        style="background-color: {{ $pengaturan->warna_sekunder ?? '#1D4ED8' }};">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
            </div>

        </div>

        <!-- Copyright -->
        <div class="max-w-7xl mx-auto px-4 py-5 flex flex-col md:flex-row justify-between items-center gap-2 text-[10px] md:text-xs text-gray-400">
            <p>&copy; {{ date('Y') }} Badan Bank Tanah. Hak Cipta Dilindungi.</p>
            <div class="flex gap-4">
                <a href="#" class="hover:text-white transition">Kebijakan Privasi</a>
                <a href="#" class="hover:text-white transition">Syarat & Ketentuan</a>
                <a href="#" class="hover:text-white transition">Aksesibilitas</a>
            </div>
        </div>
    </footer>

    <!-- ========================================================= -->
    <!-- SCRIPTS -->
    <!-- ========================================================= -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    @stack('scripts')

    <!-- Mobile Nav Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const hamburger = document.getElementById('hamburgerBtn');
            const mobileNav = document.getElementById('mobileNav');
            const overlay = document.getElementById('mobileOverlay');
            const closeBtn = document.getElementById('mobileNavClose');
            const body = document.body;

            function openMobileNav() {
                mobileNav.classList.add('open');
                overlay.classList.add('active');
                hamburger.classList.add('active');
                body.style.overflow = 'hidden';
            }

            function closeMobileNav() {
                mobileNav.classList.remove('open');
                overlay.classList.remove('active');
                hamburger.classList.remove('active');
                body.style.overflow = '';
            }

            function toggleMobileNav() {
                if (mobileNav.classList.contains('open')) {
                    closeMobileNav();
                } else {
                    openMobileNav();
                }
            }

            if (hamburger) {
                hamburger.addEventListener('click', toggleMobileNav);
            }

            if (closeBtn) {
                closeBtn.addEventListener('click', closeMobileNav);
            }

            if (overlay) {
                overlay.addEventListener('click', closeMobileNav);
            }

            if (mobileNav) {
                mobileNav.querySelectorAll('.nav-item').forEach(link => {
                    link.addEventListener('click', function() {
                        if (mobileNav.classList.contains('open')) {
                            closeMobileNav();
                        }
                    });
                });
            }

            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && mobileNav && mobileNav.classList.contains('open')) {
                    closeMobileNav();
                }
            });
        });
    </script>

    {{-- CHATBOT --}}
    @include('components.chatbot')
</body>

</html>