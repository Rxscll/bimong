<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Masuk') - PerpusSiswa</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Vite Assets -->
    @vite(['resources/css/app.css'])

    <style>
        :root {
            --primary: #ea580c;
            --secondary: #0f172a;
            --primary-gradient: linear-gradient(135deg, #ea580c 0%, #c2410c 100%);
            --glass-bg: rgba(255, 255, 255, 0.7);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #ffffff;
            min-height: 100vh;
            margin: 0;
            overflow-x: hidden;
            display: flex;
            flex-direction: column;
        }

        .auth-container {
            display: flex;
            min-height: 100vh;
            animation: fadeIn 0.8s ease-out;
        }

        /* Left side visual */
        .auth-visual {
            flex: 1;
            background: var(--secondary);
            background-image: 
                radial-gradient(at 0% 0%, rgba(234, 88, 12, 0.15) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(234, 88, 12, 0.1) 0px, transparent 50%);
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 80px;
            color: white;
            overflow: hidden;
        }

        /* Animated Mesh Gradient Overlay */
        .auth-visual::after {
            content: '';
            position: absolute;
            width: 150%;
            height: 150%;
            background: radial-gradient(circle, rgba(234, 88, 12, 0.05) 0%, transparent 70%);
            top: -25%;
            left: -25%;
            animation: rotateMesh 20s linear infinite;
            z-index: 1;
        }

        .visual-content {
            position: relative;
            z-index: 10;
            max-width: 520px;
            animation: fadeInUp 1s cubic-bezier(0.16, 1, 0.3, 1) decimal;
        }

        .visual-logo {
            font-size: 2.2rem;
            font-weight: 800;
            margin-bottom: 2.5rem;
            display: flex;
            align-items: center;
            gap: 12px;
            letter-spacing: -0.02em;
        }

        .visual-logo i {
            color: var(--primary);
            filter: drop-shadow(0 0 10px rgba(234, 88, 12, 0.3));
        }

        .visual-title {
            font-size: 3.8rem;
            font-weight: 800;
            line-height: 1.05;
            margin-bottom: 1.8rem;
            letter-spacing: -0.04em;
        }

        .visual-title span {
            color: var(--primary);
            position: relative;
        }

        .visual-text {
            font-size: 1.15rem;
            opacity: 0.8;
            line-height: 1.7;
            font-weight: 400;
        }

        /* Right side form */
        .auth-form-side {
            width: 550px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
            background: #fff;
            position: relative;
            z-index: 20;
            animation: fadeInRight 1s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .auth-card {
            width: 100%;
            max-width: 400px;
        }

        .auth-logo-mobile {
            display: none;
        }

        .btn-primary {
            background: var(--primary-gradient);
            border: none;
            border-radius: 14px;
            padding: 1rem;
            font-weight: 700;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 8px 20px -6px rgba(234, 88, 12, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 12px 25px -5px rgba(234, 88, 12, 0.4);
        }

        .form-label {
            font-weight: 600;
            margin-bottom: 0.6rem;
            color: var(--secondary);
            font-size: 0.9rem;
        }

        .form-control {
            border-radius: 14px;
            padding: 0.9rem 1.1rem;
            background: #f8fafc;
            border: 2px solid #f1f5f9;
            transition: all 0.3s ease;
            font-size: 0.95rem;
        }

        .form-control:focus {
            background: #fff;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(234, 88, 12, 0.08);
            transform: translateY(-1px);
        }

        .input-group-text {
            background: #f8fafc;
            border: 2px solid #f1f5f9;
            color: #94a3b8;
            transition: all 0.3s ease;
        }

        .form-control:focus + .input-group-text,
        .input-group:focus-within .input-group-text {
            border-color: var(--primary);
            color: var(--primary);
            background: #fff;
        }

        /* Decorative Elements */
        .decoration-blur {
            position: absolute;
            background: var(--primary);
            filter: blur(100px);
            border-radius: 50%;
            opacity: 0.05;
            z-index: 1;
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInRight {
            from { opacity: 0; transform: translateX(30px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes rotateMesh {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        @keyframes float {
            0% { transform: translateY(0px) rotate(45deg); }
            50% { transform: translateY(-20px) rotate(48deg); }
            100% { transform: translateY(0px) rotate(45deg); }
        }

        @keyframes pulse {
            0% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.05); opacity: 0.8; }
            100% { transform: scale(1); opacity: 1; }
        }

        .visual-logo i {
            animation: pulse 4s ease-in-out infinite;
        }

        .floating-shape {
            animation: float 8s ease-in-out infinite;
        }

        @media (max-width: 1200px) {
            .auth-form-side { width: 500px; }
            .auth-visual { padding: 60px; }
            .visual-title { font-size: 3rem; }
        }

        @media (max-width: 991px) {
            .auth-visual { display: none; }
            .auth-form-side { width: 100%; background: #fbfcfe; padding: 25px; }
            .auth-card {
                background: white;
                padding: 40px;
                border-radius: 28px;
                box-shadow: 0 25px 60px -15px rgba(0,0,0,0.06);
            }
            .auth-logo-mobile {
                display: flex;
                flex-direction: column;
                align-items: center;
                margin-bottom: 2.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="auth-container">
        <div class="auth-visual">
            <!-- Decorative shapes -->
            <div class="floating-shape" style="top: 10%; left: -5%; width: 100px; height: 100px;"></div>
            <div class="floating-shape" style="bottom: 15%; right: 5%; width: 150px; height: 150px; opacity: 0.1;"></div>
            
            <div class="visual-content">
                <div class="visual-logo">
                    <i class="bi bi-book-half"></i>
                    <span>PerpusSiswa</span>
                </div>
                <h1 class="visual-title">
                    Jendela <span>Dunia</span> Dalam Genggaman.
                </h1>
                <p class="visual-text">
                    Nikmati kemudahan mengakses ribuan koleksi buku digital dan fisik dengan sistem manajemen perpustakaan tercanggih. Belajar jadi lebih menyenangkan, kapan saja dan di mana saja.
                </p>
                
                <div class="mt-5 d-flex gap-4">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-check-circle-fill text-primary"></i>
                        <span class="small opacity-75">Akses Cepat</span>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-check-circle-fill text-primary"></i>
                        <span class="small opacity-75">Katalog Lengkap</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="auth-form-side">
            <div class="auth-card">
                <!-- Logo for mobile -->
                <div class="auth-logo-mobile">
                    <div class="auth-logo mb-3" style="margin: 0;">
                        <i class="bi bi-book-half"></i>
                    </div>
                    <h4 class="fw-800">PerpusSiswa</h4>
                </div>
                
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Vite Assets -->
    @vite(['resources/js/app.js'])
</body>

</html>