<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PerpusSiswa')</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Vite Assets -->
    @vite(['resources/css/app.css'])

    <style>
        :root {
            --primary-color: #F75D34;
            --secondary-color: #FF8C42;
            --accent-color: #FFB347;
            --light-bg: #ffffff;
            --text-dark: #212529;
            --text-muted: #6c757d;
            --gradient-primary: linear-gradient(135deg, #F75D34 0%, #FF8C42 100%);
            --gradient-hero: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            overflow-x: hidden;
            background: var(--light-bg);
            color: var(--text-dark);
        }

        /* Navigation */
        .navbar {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
            transition: all 0.3s ease;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--primary-color) !important;
            display: flex;
            align-items: center;
        }

        .navbar-brand i {
            margin-right: 8px;
            font-size: 1.8rem;
        }

        .nav-link {
            font-weight: 500;
            color: var(--text-muted) !important;
            padding: 0.5rem 1rem !important;
            transition: all 0.3s ease;
            border-radius: 8px;
            margin: 0 0.25rem;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--primary-color) !important;
            background: rgba(247, 93, 52, 0.1);
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(rgba(139, 69, 30, 0.4), rgba(139, 69, 30, 0.4)), url('{{ asset('images/landing/bg-perpus.jpg') }}');
            background-size: cover;
            background-position: center;
            background-blend-mode: overlay;
            position: relative;
            overflow: hidden;
            color: white;
            padding-top: 10rem;
            padding-bottom: 4rem;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.3);
        }

        .hero-section::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200"><g fill="%23ffffff" fill-opacity="0.03"><rect x="10" y="10" width="30" height="40" rx="2"/><rect x="50" y="20" width="25" height="35" rx="2"/><rect x="90" y="15" width="35" height="45" rx="2"/><rect x="140" y="25" width="20" height="30" rx="2"/><path d="M20,60 L40,60 M60,65 L85,65 M95,70 L125,70" stroke="%23ffffff" stroke-width="2" opacity="0.2"/><circle cx="30" cy="80" r="3" opacity="0.1"/><circle cx="100" cy="90" r="4" opacity="0.1"/><circle cx="160" cy="85" r="2" opacity="0.1"/></g></svg>') repeat;
            background-size: 200px 200px;
            animation: float-pattern 25s linear infinite;
        }

        .hero-content {
            position: relative;
            z-index: 15;
            text-align: center;
        }

        .hero-content h1 {
            color: white;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            animation: fadeInUp 1s ease;
            font-weight: 800;
            position: relative;
            z-index: 10;
        }

        .hero-content p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.2rem;
            font-weight: 500;
            text-shadow: 0 1px 5px rgba(0, 0, 0, 0.2);
            animation: fadeInUp 1s ease 0.2s;
            animation-fill-mode: both;
            position: relative;
            z-index: 10;
        }

        .hero-content .btn {
            position: relative;
            z-index: 20;
            pointer-events: auto;
        }

        .hero-illustration {
            position: relative;
            height: 500px;
        }

        .floating-element {
            position: absolute;
            top: 20%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 1;
            animation: float 6s ease-in-out infinite;
            z-index: 1;
        }

        .floating-element i {
            color: var(--primary-color) !important;
        }

        .clouds i {
            position: absolute;
            font-size: 3rem;
            opacity: 0.8;
            animation: float-cloud 20s linear infinite;
            color: var(--primary-color) !important;
            z-index: 1;
        }

        .cloud-1 {
            top: 15%;
            left: 15%;
            animation-delay: 0s;
        }

        .cloud-2 {
            top: 35%;
            right: 20%;
            animation-delay: 5s;
        }

        .cloud-3 {
            bottom: 35%;
            left: 25%;
            animation-delay: 10s;
        }

        .cloud-4 {
            bottom: 15%;
            right: 15%;
            animation-delay: 15s;
        }

        /* Buttons */
        .btn-primary {
            background: var(--gradient-primary);
            border: none;
            border-radius: 50px;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 10px 25px rgba(247, 93, 52, 0.3);
            color: white !important;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(247, 93, 52, 0.4);
        }

        .btn-outline-primary {
            border: 2px solid var(--primary-color);
            color: var(--primary-color) !important;
            border-radius: 50px;
            padding: 12px 30px;
            font-weight: 600;
            background: rgba(255, 255, 255, 0.9)
            transition: all 0.3s ease;
        }

        .btn-outline-primary:hover {
            background: var(--primary-color);
            border-color: var(--primary-color);
            transform: translateY(-3px);
            color: white !important;
        }

        /* Features Section */
        .features-section {
            background: white;
            position: relative;
        }

        .feature-card {
            padding: 2rem;
            border-radius: 20px;
            background: white;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: var(--gradient-primary);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            font-size: 2rem;
            color: white;
            animation: pulse 2s infinite;
        }

        /* Statistics Section */
        .stats-section {
            background: var(--gradient-primary);
            position: relative;
            overflow: hidden;
            padding: 4rem 0;
        }

        .stats-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 100px;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23ffffff" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,138.7C960,139,1056,117,1152,106.7C1248,96,1344,96,1392,96L1440,96L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>') no-repeat top;
            background-size: cover;
        }

        .stats-section::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 100px;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23ffffff" fill-opacity="1" d="M0,224L48,213.3C96,203,192,181,288,181.3C384,181,480,203,576,213.3C672,224,768,224,864,208C960,192,1056,160,1152,154.7C1248,149,1344,171,1392,181.3L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>') no-repeat bottom;
            background-size: cover;
        }

        .stat-item {
            padding: 2rem 1rem;
            position: relative;
            z-index: 1;
            margin-bottom: 1rem;
        }

        .stat-number {
            color: white !important;
            font-weight: bold;
            font-size: 3.5rem;
            line-height: 1.2;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: rgba(255, 255, 255, 0.9) !important;
            font-size: 1.1rem;
            font-weight: 500;
        }

        /* How It Works Section */
        .how-it-works {
            background: var(--light-bg);
        }

        .step-card {
            padding: 2rem;
            border-radius: 20px;
            background: white;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .step-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 8px;
            background: var(--gradient-primary);
        }

        .step-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .step-icon {
            width: 70px;
            height: 70px;
            background: var(--light-bg);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            font-size: 2rem;
        }

        .step-icon i {
            color: var(--primary-color);
        }

        /* CTA Section */
        .cta-section {
            background: var(--gradient-primary);
            position: relative;
            overflow: hidden;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23000000" fill-opacity="0.05" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,138.7C960,139,1056,117,1152,106.7C1248,96,1344,96,1392,96L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>') no-repeat center;
            background-size: cover;
        }

        .cta-section .container {
            position: relative;
            z-index: 1;
        }

        .btn-light {
            background: white;
            border: none;
            border-radius: 50px;
            padding: 15px 40px;
            font-weight: 600;
            color: var(--primary-color);
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .btn-light:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
            color: var(--secondary-color);
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translate(-50%, -50%) translateY(0);
            }
            50% {
                transform: translate(-50%, -50%) translateY(-20px);
            }
        }

        @keyframes float-cloud {
            0% {
                transform: translateX(-100px);
            }
            100% {
                transform: translateX(calc(100vw + 100px));
            }
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2rem;
            }
            
            .hero-illustration {
                height: 300px;
                margin-top: 2rem;
            }
            
            .floating-element i {
                font-size: 4rem !important;
            }

            .stats-section {
                padding: 3rem 0;
            }

            .stat-item {
                padding: 1.5rem 0.5rem;
                margin-bottom: 0.5rem;
            }

            .stat-number {
                font-size: 2.5rem;
            }

            .stat-label {
                font-size: 1rem;
            }

            .step-icon {
                width: 60px;
                height: 60px;
                font-size: 1.8rem;
            }
        }

        @keyframes float-pattern {
            0% { transform: translateX(0) translateY(0); }
            25% { transform: translateX(10px) translateY(-5px); }
            50% { transform: translateX(0) translateY(0); }
            75% { transform: translateX(-10px) translateY(5px); }
            100% { transform: translateX(0) translateY(0); }
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="bi bi-book-half"></i> PerpusSiswa
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#home">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Fitur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#how-it-works">Cara Kerja</a>
                    </li>
                    <li class="nav-item ms-2">
                        <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Masuk</a>
                    </li>
                    <li class="nav-item ms-2">
                        <a href="{{ route('register') }}" class="btn btn-outline-primary btn-sm">Daftar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer py-4 bg-white border-top">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="fw-bold">PerpusSiswa</h5>
                    <p class="text-muted">Perpustakaan digital modern untuk generasi pembelajar masa kini</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="text-muted mb-0">&copy; {{ date('Y') }} PerpusSiswa. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Vite Assets -->
    @vite(['resources/js/app.js'])

    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.style.padding = '0.5rem 0';
                navbar.style.boxShadow = '0 4px 30px rgba(0, 0, 0, 0.1)';
            } else {
                navbar.style.padding = '1rem 0';
                navbar.style.boxShadow = '0 2px 20px rgba(0, 0, 0, 0.1)';
            }
        });
    </script>
</body>

</html>
