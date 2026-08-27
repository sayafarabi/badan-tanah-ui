<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - Badan Bank Tanah</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        /* =========================================================
           RESET & BASE
        ========================================================= */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            overflow: hidden;
            overscroll-behavior: none;
            touch-action: manipulation;
        }

        body {
            font-family: 'Inter', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 16px;
            position: relative;
            background: #f0fdf4;
            min-height: 100vh;
            min-height: 100dvh;
        }

        /* =========================================================
           ANIMATED BACKGROUND - CERAH
        ========================================================= */
        .bg-container {
            position: fixed;
            inset: 0;
            z-index: 0;
            overflow: hidden;
            pointer-events: none;
        }

        /* Gradient Base - Cerah */
        .bg-gradient-base {
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 30%, #fef3c7 60%, #f0fdf4 100%);
        }

        /* Gradient Orbs - Warna Cerah */
        .bg-orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.4;
            animation: orbFloat 20s ease-in-out infinite alternate;
        }

        .bg-orb-1 {
            width: 500px;
            height: 500px;
            top: -150px;
            right: -100px;
            background: radial-gradient(circle, rgba(34, 197, 94, 0.25), rgba(34, 197, 94, 0.05));
            animation-duration: 25s;
            animation-delay: 0s;
        }

        .bg-orb-2 {
            width: 400px;
            height: 400px;
            bottom: -100px;
            left: -100px;
            background: radial-gradient(circle, rgba(251, 191, 36, 0.2), rgba(251, 191, 36, 0.05));
            animation-duration: 30s;
            animation-delay: 3s;
        }

        .bg-orb-3 {
            width: 300px;
            height: 300px;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: radial-gradient(circle, rgba(16, 185, 129, 0.15), transparent);
            animation-duration: 20s;
            animation-delay: 5s;
        }

        .bg-orb-4 {
            width: 350px;
            height: 350px;
            top: 15%;
            right: 15%;
            background: radial-gradient(circle, rgba(96, 165, 250, 0.12), transparent);
            animation-duration: 35s;
            animation-delay: 7s;
        }

        @keyframes orbFloat {
            0% { transform: translate(0, 0) scale(1); }
            33% { transform: translate(30px, -40px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(10px, -10px) scale(1.05); }
        }

        /* Grid Pattern Halus */
        .bg-grid {
            position: absolute;
            inset: 0;
            background-image: 
                linear-gradient(rgba(0, 100, 0, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0, 100, 0, 0.03) 1px, transparent 1px);
            background-size: 50px 50px;
            opacity: 0.6;
        }

        /* Decorative Line */
        .bg-line {
            position: absolute;
            background: linear-gradient(90deg, transparent, rgba(34, 197, 94, 0.08), transparent);
            height: 2px;
            width: 80%;
            top: 25%;
            left: 10%;
            animation: linePulse 8s ease-in-out infinite alternate;
        }

        .bg-line-2 {
            top: 75%;
            left: 10%;
            animation-delay: 2s;
            background: linear-gradient(90deg, transparent, rgba(251, 191, 36, 0.08), transparent);
        }

        @keyframes linePulse {
            0% { opacity: 0.2; transform: scaleX(0.8); }
            100% { opacity: 0.6; transform: scaleX(1); }
        }

        /* =========================================================
           LOGIN WRAPPER
        ========================================================= */
        .login-wrapper {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 400px;
            animation: fadeUp 0.6s ease forwards;
            max-height: 98vh;
            max-height: 98dvh;
            overflow: hidden;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(24px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* =========================================================
           LOGO HEADER
        ========================================================= */
        .login-header {
            text-align: center;
            margin-bottom: 24px;
        }

        .login-header .logo-wrap {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 2px;
        }

        .login-header .logo-wrap img {
            height: 64px;
            width: auto;
            object-fit: contain;
            filter: drop-shadow(0 2px 12px rgba(0, 100, 0, 0.08));
        }

        .login-header .title {
            font-size: 20px;
            font-weight: 700;
            color: #0f172a;
            letter-spacing: -0.5px;
            margin-top: 8px;
        }

        .login-header .subtitle {
            font-size: 13px;
            color: #64748b;
            margin-top: 2px;
        }

        .login-header .divider-line {
            width: 36px;
            height: 3px;
            background: linear-gradient(90deg, #22c55e, #16a34a);
            border-radius: 10px;
            margin: 10px auto 0;
        }

        /* =========================================================
           LOGIN CARD
        ========================================================= */
        .login-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-radius: 16px;
            padding: 28px 28px;
            border: 1px solid rgba(255, 255, 255, 0.5);
            box-shadow: 
                0 4px 24px rgba(0, 0, 0, 0.04),
                0 1px 2px rgba(0, 0, 0, 0.02);
        }

        /* =========================================================
           ALERT
        ========================================================= */
        .alert {
            padding: 10px 14px;
            border-radius: 10px;
            font-size: 12px;
            display: flex;
            align-items: flex-start;
            gap: 8px;
            margin-bottom: 16px;
            border: 1px solid;
        }

        .alert-success {
            background: rgba(34, 197, 94, 0.08);
            border-color: rgba(34, 197, 94, 0.15);
            color: #166534;
        }

        .alert-success i {
            color: #22c55e;
            margin-top: 1px;
            font-size: 13px;
        }

        .alert-error {
            background: rgba(239, 68, 68, 0.06);
            border-color: rgba(239, 68, 68, 0.12);
            color: #991b1b;
        }

        .alert-error i {
            color: #ef4444;
            margin-top: 1px;
            font-size: 13px;
        }

        .alert-error .alert-title {
            font-weight: 600;
            font-size: 12px;
        }

        .alert-error .alert-message {
            font-size: 11px;
            opacity: 0.8;
        }

        /* =========================================================
           FORM
        ========================================================= */
        .form-group {
            margin-bottom: 14px;
        }

        .form-group label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 4px;
        }

        .form-group .input-wrap {
            position: relative;
        }

        .form-group .input-wrap .input-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 13px;
            pointer-events: none;
            transition: color 0.2s ease;
        }

        .form-group .input-wrap input {
            width: 100%;
            padding: 11px 12px 11px 40px;
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            font-size: 13px;
            color: #0f172a;
            background: rgba(255, 255, 255, 0.8);
            transition: all 0.25s ease;
            font-family: 'Inter', sans-serif;
        }

        .form-group .input-wrap input:focus {
            border-color: #22c55e;
            background: #ffffff;
            box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.08);
        }

        .form-group .input-wrap input::placeholder {
            color: #94a3b8;
            font-weight: 400;
            font-size: 12px;
        }

        .form-group .input-wrap .toggle-password {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #94a3b8;
            cursor: pointer;
            font-size: 13px;
            padding: 4px;
            transition: color 0.2s ease;
        }

        .form-group .input-wrap .toggle-password:hover {
            color: #475569;
        }

        .form-error {
            font-size: 11px;
            color: #ef4444;
            margin-top: 3px;
            display: block;
        }

        /* =========================================================
           FORM FOOTER
        ========================================================= */
        .form-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 4px;
            margin-bottom: 18px;
            flex-wrap: wrap;
            gap: 4px;
        }

        .form-footer .remember-me {
            display: flex;
            align-items: center;
            gap: 6px;
            cursor: pointer;
            font-size: 12px;
            color: #475569;
        }

        .form-footer .remember-me input[type="checkbox"] {
            width: 14px;
            height: 14px;
            accent-color: #22c55e;
            border-radius: 4px;
            border: 1.5px solid #cbd5e1;
            cursor: pointer;
        }

        .form-footer .forgot-link {
            font-size: 12px;
            color: #16a34a;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .form-footer .forgot-link:hover {
            color: #15803d;
            text-decoration: underline;
        }

        /* =========================================================
           SUBMIT BUTTON
        ========================================================= */
        .btn-submit {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #22c55e, #16a34a);
            color: #ffffff;
            border: none;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-family: 'Inter', sans-serif;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(34, 197, 94, 0.3);
        }

        .btn-submit:active {
            transform: scale(0.97);
        }

        /* =========================================================
           DIVIDER
        ========================================================= */
        .divider {
            display: flex;
            align-items: center;
            gap: 14px;
            margin: 18px 0 14px;
        }

        .divider .line {
            flex: 1;
            height: 1px;
            background: #e2e8f0;
        }

        .divider .text {
            font-size: 9px;
            color: #94a3b8;
            font-weight: 600;
            white-space: nowrap;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        /* =========================================================
           FOOTER
        ========================================================= */
        .login-footer {
            text-align: center;
            margin-top: 10px;
        }

        .login-footer p {
            font-size: 11px;
            color: #94a3b8;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }

        .login-footer p i {
            color: #22c55e;
            opacity: 0.6;
            font-size: 11px;
        }

        /* =========================================================
           RESPONSIVE - NO SCROLL
        ========================================================= */
        @media (max-width: 480px) {
            body {
                padding: 12px;
            }

            .login-card {
                padding: 20px 16px;
                border-radius: 14px;
            }

            .login-header .logo-wrap img {
                height: 50px;
            }

            .login-header .title {
                font-size: 17px;
                margin-top: 6px;
            }

            .login-header .subtitle {
                font-size: 12px;
            }

            .login-header .divider-line {
                width: 30px;
                margin-top: 8px;
            }

            .login-header {
                margin-bottom: 18px;
            }

            .form-group .input-wrap input {
                padding: 10px 10px 10px 36px;
                font-size: 12px;
            }

            .form-group .input-wrap .input-icon {
                left: 10px;
                font-size: 12px;
            }

            .form-footer {
                margin-bottom: 14px;
            }

            .btn-submit {
                padding: 11px;
                font-size: 12px;
            }

            .login-wrapper {
                max-width: 100%;
            }

            .bg-orb-1 {
                width: 300px;
                height: 300px;
                top: -100px;
                right: -50px;
            }

            .bg-orb-2 {
                width: 250px;
                height: 250px;
                bottom: -50px;
                left: -50px;
            }
        }

        @media (max-height: 700px) {
            body {
                padding: 10px;
            }

            .login-header .logo-wrap img {
                height: 42px;
            }

            .login-header .title {
                font-size: 16px;
                margin-top: 4px;
            }

            .login-header .subtitle {
                font-size: 11px;
            }

            .login-header {
                margin-bottom: 14px;
            }

            .login-card {
                padding: 18px 16px;
            }

            .form-group {
                margin-bottom: 10px;
            }

            .form-group .input-wrap input {
                padding: 9px 10px 9px 36px;
                font-size: 12px;
            }

            .form-footer {
                margin-bottom: 12px;
            }

            .btn-submit {
                padding: 10px;
                font-size: 12px;
            }

            .divider {
                margin: 12px 0 10px;
            }

            .login-footer {
                margin-top: 6px;
            }

            .login-footer p {
                font-size: 10px;
            }
        }

        @media (max-height: 600px) {
            .login-header .logo-wrap img {
                height: 36px;
            }

            .login-header .title {
                font-size: 14px;
            }

            .login-header .subtitle {
                font-size: 10px;
            }

            .login-header {
                margin-bottom: 10px;
            }

            .login-card {
                padding: 14px 14px;
                border-radius: 12px;
            }

            .form-group {
                margin-bottom: 8px;
            }

            .form-group .input-wrap input {
                padding: 8px 8px 8px 34px;
                font-size: 11px;
            }

            .form-footer {
                margin-bottom: 10px;
            }

            .btn-submit {
                padding: 8px;
                font-size: 11px;
            }

            .alert {
                padding: 6px 10px;
                font-size: 11px;
                margin-bottom: 10px;
            }
        }

        /* Prevent scroll on all devices */
        @media (max-width: 480px) and (max-height: 700px) {
            .login-wrapper {
                max-height: 100vh;
                max-height: 100dvh;
            }
        }
    </style>
</head>
<body>

    <!-- ========================================================= -->
    <!-- ANIMATED BACKGROUND -->
    <!-- ========================================================= -->
    <div class="bg-container">
        <div class="bg-gradient-base"></div>
        <div class="bg-orb bg-orb-1"></div>
        <div class="bg-orb bg-orb-2"></div>
        <div class="bg-orb bg-orb-3"></div>
        <div class="bg-orb bg-orb-4"></div>
        <div class="bg-grid"></div>
        <div class="bg-line"></div>
        <div class="bg-line bg-line-2"></div>
    </div>

    <!-- ========================================================= -->
    <!-- LOGIN FORM -->
    <!-- ========================================================= -->
    <div class="login-wrapper">

        <!-- Header - Hanya Logo -->
        <div class="login-header">
            <div class="logo-wrap">
                <img src="{{ asset('images/Logo-badan-bank-tanah.png') }}" alt="Badan Bank Tanah">
            </div>
            <h2 class="title">Admin Panel</h2>
            <p class="subtitle">Masuk ke dashboard administrator</p>
            <div class="divider-line"></div>
        </div>

        <!-- Card -->
        <div class="login-card">

            <!-- Session Status -->
            @if (session('status'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    <span>{{ session('status') }}</span>
                </div>
            @endif

            <!-- Error -->
            @if ($errors->any())
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i>
                    <div>
                        <div class="alert-title">Login gagal</div>
                        <div class="alert-message">{{ $errors->first() }}</div>
                    </div>
                </div>
            @endif

            <!-- Form -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Alamat Email</label>
                    <div class="input-wrap">
                        <span class="input-icon"><i class="fas fa-envelope"></i></span>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" 
                            required autofocus placeholder="admin@banktanah.go.id">
                    </div>
                    @error('email')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password">Kata Sandi</label>
                    <div class="input-wrap">
                        <span class="input-icon"><i class="fas fa-lock"></i></span>
                        <input id="password" type="password" name="password" required 
                            placeholder="Masukkan kata sandi Anda">
                        <button type="button" class="toggle-password" onclick="togglePassword()">
                            <i id="passwordToggleIcon" class="fas fa-eye"></i>
                        </button>
                    </div>
                    @error('password')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Footer -->
                <div class="form-footer">
                    <label class="remember-me">
                        <input type="checkbox" name="remember" id="remember">
                        <span>Ingat saya</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot-link">
                            Lupa kata sandi?
                        </a>
                    @endif
                </div>

                <!-- Submit -->
                <button type="submit" class="btn-submit">
                    <i class="fas fa-sign-in-alt"></i>
                    Masuk ke Dashboard
                </button>

                <!-- Divider -->
                <div class="divider">
                    <span class="line"></span>
                    <span class="text">Akses Terbatas</span>
                    <span class="line"></span>
                </div>

                <!-- Footer -->
                <div class="login-footer">
                    <p>
                        <i class="fas fa-shield-alt"></i>
                        Hanya untuk administrator yang memiliki akses
                    </p>
                </div>

            </form>

        </div>

    </div>

    <!-- ========================================================= -->
    <!-- SCRIPTS -->
    <!-- ========================================================= -->
    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const icon = document.getElementById('passwordToggleIcon');
            
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('email')?.focus();
        });

        // Prevent scroll on touch devices
        document.addEventListener('touchmove', function(e) {
            if (e.target.closest('.login-wrapper')) {
                // Allow scroll inside wrapper if needed, but wrapper has overflow:hidden
            }
        }, { passive: true });
    </script>

</body>
</html>