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
<<<<<<< HEAD
            --primary: #ea580c; /* Rich Orange */
            --primary-light: #ffedd5;
            --primary-dark: #c2410c;
            --secondary: #0f172a; /* Slate Deep */
            --accent: #f59e0b;
            --surface: #ffffff;
            --bg-body: #f8fafc;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --gradient-primary: linear-gradient(135deg, #f97316 0%, #ea580c 100%);
            --shadow-subtle: 0 4px 20px rgba(0, 0, 0, 0.04);
            --shadow-hover: 0 14px 28px rgba(0, 0, 0, 0.08);
            --radius-default: 1rem;
            --radius-lg: 1.5rem;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg-body);
            color: var(--text-main);
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
            letter-spacing: -0.01em;
        }

        /* Navbar - Glassmorphism */
        .navbar {
            background: rgba(255, 255, 255, 0.7) !important;
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.5);
            padding: 1.25rem 0;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02);
        }

        .navbar.scrolled {
            padding: 0.75rem 0;
            background: rgba(255, 255, 255, 0.95) !important;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 1.5rem;
            color: var(--secondary) !important;
            display: flex;
            align-items: center;
            letter-spacing: -0.03em;
        }

        .navbar-brand i {
            margin-right: 12px;
            font-size: 1.8rem;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .nav-link {
            font-weight: 600;
            color: var(--text-muted) !important;
            padding: 0.5rem 1.25rem !important;
            transition: all 0.3s ease;
            border-radius: 50px;
            margin: 0 0.25rem;
            font-size: 0.95rem;
        }

        .nav-link:hover, .nav-link.active {
            color: var(--primary) !important;
            background: rgba(234, 88, 12, 0.08); /* Primary tint */
        }

        /* Buttons */
        .btn {
            padding: 0.65rem 1.5rem;
            font-weight: 600;
            font-size: 0.95rem;
            border-radius: 50px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .btn-primary {
            background: var(--gradient-primary);
            border: none;
            color: white !important;
            box-shadow: 0 4px 14px 0 rgba(234, 88, 12, 0.39);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(234, 88, 12, 0.5);
            background: linear-gradient(135deg, #ea580c 0%, #c2410c 100%);
        }

        .btn-outline-primary {
            border: 2px solid rgba(234, 88, 12, 0.2);
            color: var(--primary) !important;
            background: var(--surface);
        }
        
        .btn-outline-primary:hover {
            background: var(--primary-light);
            border-color: var(--primary);
            transform: translateY(-2px);
        }

        /* Animations Logic - Scroll Reveal */
        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        /* Hero Section Enhanced */
        .hero-section {
            background: radial-gradient(circle at top right, #fff7ed 0%, #ffffff 100%);
            position: relative;
            padding: 12rem 0 6rem;
            min-height: auto;
            overflow: hidden;
=======
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
>>>>>>> 6b37c17e3702840205ac9bf66c9189f0da3983bb
        }

        .hero-section::before {
            content: '';
            position: absolute;
<<<<<<< HEAD
            top: -150px;
            right: -150px;
            width: 600px;
            height: 600px;
            background: var(--primary);
            filter: blur(160px);
            opacity: 0.12;
            z-index: 0;
            border-radius: 50%;
            animation: pulse-glow 8s infinite alternate;
=======
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.3);
>>>>>>> 6b37c17e3702840205ac9bf66c9189f0da3983bb
        }

        .hero-section::after {
            content: '';
            position: absolute;
<<<<<<< HEAD
            bottom: -100px;
            left: -150px;
            width: 500px;
            height: 500px;
            background: var(--accent);
            filter: blur(140px);
            opacity: 0.08;
            z-index: 0;
            border-radius: 50%;
            animation: pulse-glow 10s infinite alternate-reverse;
        }

        @keyframes pulse-glow {
            0% { transform: scale(1); opacity: 0.08; }
            100% { transform: scale(1.2); opacity: 0.15; }
=======
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200"><g fill="%23ffffff" fill-opacity="0.03"><rect x="10" y="10" width="30" height="40" rx="2"/><rect x="50" y="20" width="25" height="35" rx="2"/><rect x="90" y="15" width="35" height="45" rx="2"/><rect x="140" y="25" width="20" height="30" rx="2"/><path d="M20,60 L40,60 M60,65 L85,65 M95,70 L125,70" stroke="%23ffffff" stroke-width="2" opacity="0.2"/><circle cx="30" cy="80" r="3" opacity="0.1"/><circle cx="100" cy="90" r="4" opacity="0.1"/><circle cx="160" cy="85" r="2" opacity="0.1"/></g></svg>') repeat;
            background-size: 200px 200px;
            animation: float-pattern 25s linear infinite;
>>>>>>> 6b37c17e3702840205ac9bf66c9189f0da3983bb
        }

        .hero-content {
            position: relative;
<<<<<<< HEAD
            z-index: 10;
        }

        .hero-content h1 {
            color: var(--secondary);
            font-weight: 800;
            font-size: 4.5rem;
            line-height: 1.1;
            letter-spacing: -0.04em;
            margin-bottom: 1.5rem;
        }

        .hero-content h1 span {
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-content p {
            color: var(--text-muted);
            font-size: 1.25rem;
            line-height: 1.6;
            margin-bottom: 2.5rem;
            max-width: 600px;
        }

        /* Sections Layout */
        .section-padding { padding: 7rem 0; }
        .section-title { font-weight: 800; color: var(--secondary); letter-spacing: -0.03em; margin-bottom: 0.75rem; }
        .section-subtitle { color: var(--text-muted); font-size: 1.15rem; max-width: 650px; margin: 0 auto 3.5rem; }

        /* Feature Cards */
        .feature-card {
            background: var(--surface);
            padding: 3rem 2rem;
            border-radius: var(--radius-lg);
            border: 1px solid rgba(226, 232, 240, 0.8);
            box-shadow: var(--shadow-subtle);
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            height: 100%;
            text-align: center;
        }

        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-hover);
            border-color: rgba(234, 88, 12, 0.2);
        }

        .feature-icon-wrapper {
            width: 70px; height: 70px;
            background: var(--primary-light);
            border-radius: 20px;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 2rem;
            color: var(--primary);
            font-size: 2rem;
            transition: 0.3s;
        }

        .feature-card:hover .feature-icon-wrapper {
            background: var(--gradient-primary);
            color: white;
            transform: rotate(10deg) scale(1.1);
        }

        /* Enhanced Stats Section */
        .stats-section {
            background: var(--secondary);
            padding: 5rem 0;
            position: relative;
            overflow: hidden;
        }
        
        .stat-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
            padding: 2.5rem;
            border-radius: var(--radius-default);
            text-align: center;
            transition: 0.3s;
        }
        
        .stat-card:hover { background: rgba(255, 255, 255, 0.05); }

        .stat-number {
            font-size: 3.5rem; font-weight: 800;
            color: white; line-height: 1; margin-bottom: 0.75rem;
            display: block;
        }

        .stat-label { color: #94a3b8; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; font-size: 0.9rem; }

        /* How It Works Steps */
        .step-card {
            background: white; border-radius: var(--radius-lg);
            padding: 3rem 2.5rem; height: 100%;
            position: relative; overflow: hidden;
            border: 1px solid rgba(226, 232, 240, 0.8);
        }

        .step-badge {
            position: absolute; top: -15px; right: -15px;
            font-size: 5rem; font-weight: 900;
            color: rgba(249, 115, 22, 0.05); line-height: 1;
        }

        /* Footer Stylings */
        .footer { background: var(--surface); padding: 4rem 0 2rem; border-top: 1px solid #f1f5f9; }
        .footer-logo { font-weight: 800; font-size: 1.4rem; color: var(--secondary); margin-bottom: 1rem; display: block; }
        .footer-links h6 { font-weight: 700; color: var(--secondary); margin-bottom: 1.5rem; }
        .footer-links a { color: var(--text-muted); text-decoration: none; display: block; margin-bottom: 0.75rem; transition: 0.3s; }
        .footer-links a:hover { color: var(--primary); padding-left: 5px; }

        /* Floating Mockup (Pure CSS Illustration) */
        .floating-mockup {
            position: relative;
            width: 100%;
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            perspective: 1000px;
        }

        .mockup-card {
            background: white;
            border-radius: 12px;
            position: absolute;
            border: 1px solid rgba(0,0,0,0.05);
            animation: floating 6s infinite ease-in-out;
        }

        .main-card {
            width: 320px;
            height: 220px;
            z-index: 2;
            padding: 0;
            overflow: hidden;
            transform: rotateY(-15deg) rotateX(10deg);
        }

        .card-header-mock {
            height: 30px;
            background: #f8fafc;
            display: flex;
            align-items: center;
            padding: 0 12px;
            gap: 8px;
            border-bottom: 1px solid #f1f5f9;
        }

        .dots { display: flex; gap: 4px; }
        .dot { width: 6px; height: 6px; border-radius: 50%; }
        .dot.red { background: #ff5f57; }
        .dot.orange { background: #febc2e; }
        .dot.green { background: #28c840; }
        .card-header-mock .bar { height: 6px; width: 40px; background: #e2e8f0; border-radius: 10px; }

        .card-body-mock { display: flex; height: calc(100% - 30px); }
        .side-nav { width: 60px; background: #f1f5f9; border-right: 1px solid #f1f5f9; }
        .main-content-mock { flex: 1; padding: 15px; }
        .grid-mock { display: flex; gap: 8px; margin-bottom: 15px; }
        .item-mock { height: 30px; flex: 1; background: #f8fafc; border-radius: 4px; border: 1px solid #f1f5f9; }
        .line-mock { height: 6px; background: #f1f5f9; border-radius: 10px; margin-bottom: 8px; }
        .line-mock.w-75 { width: 75%; }

        .floating-card-1 {
            width: 160px;
            height: 70px;
            bottom: 40px;
            right: -20px;
            z-index: 3;
            padding: 12px;
            display: flex;
            align-items: center;
            gap: 12px;
            transform: rotateY(10deg) translateZ(50px);
            animation-delay: 1s;
        }

        .icon-circle {
            width: 36px;
            height: 36px;
            background: var(--primary-light);
            color: var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        .text-lines .line { height: 6px; width: 60px; background: #f1f5f9; border-radius: 10px; margin-bottom: 6px; }

        .floating-card-2 {
            top: 40px;
            left: -30px;
            z-index: 1;
            padding: 10px 15px;
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 700;
            font-size: 0.9rem;
            color: var(--secondary);
            animation-delay: 2s;
        }

        @keyframes floating {
            0% { transform: translateY(0px) rotateY(-15deg) rotateX(10deg); }
            50% { transform: translateY(-15px) rotateY(-10deg) rotateX(5deg); }
            100% { transform: translateY(0px) rotateY(-15deg) rotateX(10deg); }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Custom Responsive Adjustments */
        @media (max-width: 991px) {
            .hero-content h1 { font-size: 3.2rem; }
            .section-padding { padding: 4rem 0; }
=======
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
>>>>>>> 6b37c17e3702840205ac9bf66c9189f0da3983bb
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
<<<<<<< HEAD
        // Scroll Reveal Animation
        const revealCallback = (entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                }
            });
        };

        const revealObserver = new IntersectionObserver(revealCallback, {
            threshold: 0.15
        });

        document.querySelectorAll('.reveal').forEach(el => {
            revealObserver.observe(el);
        });

=======
>>>>>>> 6b37c17e3702840205ac9bf66c9189f0da3983bb
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
<<<<<<< HEAD
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const target = document.querySelector(targetId);
=======
                const target = document.querySelector(this.getAttribute('href'));
>>>>>>> 6b37c17e3702840205ac9bf66c9189f0da3983bb
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
<<<<<<< HEAD
                    
                    document.querySelectorAll('.nav-link').forEach(link => link.classList.remove('active'));
                    this.classList.add('active');
                    
                    // Close mobile menu if open
                    const navbarCollapse = document.querySelector('.navbar-collapse');
                    if (navbarCollapse.classList.contains('show')) {
                        bootstrap.Collapse.getInstance(navbarCollapse).hide();
                    }
=======
>>>>>>> 6b37c17e3702840205ac9bf66c9189f0da3983bb
                }
            });
        });

<<<<<<< HEAD
        // Navbar scroll & Scrollspy effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }

            // Scrollspy
            const sections = document.querySelectorAll("section[id]");
            const navLinks = document.querySelectorAll(".nav-link");
            let current = "";

            sections.forEach((section) => {
                const sectionTop = section.offsetTop;
                if (window.pageYOffset >= sectionTop - 200) {
                    current = section.getAttribute("id");
                }
            });

            navLinks.forEach((link) => {
                link.classList.remove("active");
                if (link.getAttribute("href").includes(current) && current !== "") {
                    link.classList.add("active");
                }
            });
=======
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
>>>>>>> 6b37c17e3702840205ac9bf66c9189f0da3983bb
        });
    </script>
</body>

</html>
