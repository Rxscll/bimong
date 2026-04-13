<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Katalog') - Perpus Siswa</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        :root {
<<<<<<< HEAD
            --primary: #ea580c;
            --primary-light: #ffedd5;
            --secondary: #0f172a;
            --bg-body: #f8fafc;
            --surface: #ffffff;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --shadow-sm: 0 1px 2px 0 rgba(0,0,0,0.05);
            --shadow-md: 0 4px 6px -1px rgba(0,0,0,0.1), 0 2px 4px -1px rgba(0,0,0,0.06);
            --radius-lg: 1rem;
=======
            --primary-color: #F75D34;
            --secondary-color: #FF8C42;
>>>>>>> 6b37c17e3702840205ac9bf66c9189f0da3983bb
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
<<<<<<< HEAD
            background-color: var(--bg-body);
            color: var(--text-main);
            letter-spacing: -0.01em;
            -webkit-font-smoothing: antialiased;
        }

        .navbar {
            padding: 1.25rem 0;
            background: rgba(255, 255, 255, 0.8) !important;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(226, 232, 240, 0.6);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02);
            transition: all 0.3s;
        }

        .navbar-brand {
            font-weight: 800;
            color: var(--secondary) !important;
            display: flex;
            align-items: center;
            letter-spacing: -0.02em;
        }

        .navbar-brand i {
            margin-right: 12px;
            font-size: 1.6rem;
            background: linear-gradient(135deg, var(--primary) 0%, #c2410c 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .nav-link {
            font-weight: 600;
            color: var(--text-muted) !important;
            padding: 0.5rem 1.25rem !important;
            transition: all 0.2s;
            border-radius: 50px;
=======
            background-color: #f8fafc;
        }

        .navbar {
            padding: 1rem 0;
            background-color: #fff !important;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .navbar-brand {
            font-weight: 700;
            color: var(--primary-color) !important;
            display: flex;
            align-items: center;
        }

        .navbar-brand i {
            margin-right: 8px;
            font-size: 1.5rem;
        }

        .nav-link {
            font-weight: 500;
            color: #64748b !important;
            padding: 0.5rem 1rem !important;
            transition: all 0.2s;
>>>>>>> 6b37c17e3702840205ac9bf66c9189f0da3983bb
        }

        .nav-link:hover,
        .nav-link.active {
<<<<<<< HEAD
            color: var(--primary) !important;
            background: rgba(234, 88, 12, 0.08);
        }

        .dropdown-menu {
            border: 1px solid rgba(226, 232, 240, 0.8);
            border-radius: 12px;
            box-shadow: var(--shadow-md);
            padding: 0.5rem;
        }

        .dropdown-item {
            border-radius: 8px;
            font-weight: 500;
            padding: 0.5rem 1rem;
        }
        
        .dropdown-item:hover { background: #f1f5f9; }

        .hero-section {
            background: radial-gradient(circle at top right, #fff7ed 0%, #ffffff 100%);
            padding: 80px 0;
            position: relative;
            overflow: hidden;
            margin-bottom: 40px;
            border-bottom: 1px solid rgba(226, 232, 240, 0.8);
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: -100px;
            right: -50px;
            width: 400px;
            height: 400px;
            background: var(--primary);
            filter: blur(120px);
            opacity: 0.1;
            border-radius: 50%;
        }

        .hero-section { color: var(--secondary) }

        .card {
            border: 1px solid rgba(226, 232, 240, 0.8);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-sm);
            background: var(--surface);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
=======
            color: var(--primary-color) !important;
        }

        .hero-section {
            background: linear-gradient(135deg, #F75D34 0%, #FF8C42 100%);
            padding: 60px 0;
            color: white;
            margin-bottom: 40px;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s, box-shadow 0.2s;
>>>>>>> 6b37c17e3702840205ac9bf66c9189f0da3983bb
            overflow: hidden;
        }

        .card:hover {
<<<<<<< HEAD
            transform: translateY(-8px);
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.08);
            border-color: rgba(234, 88, 12, 0.2);
        }

        .book-img-wrapper {
            height: 220px;
            background: #f1f5f9;
=======
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .book-img-wrapper {
            height: 200px;
            background-color: #f1f5f9;
>>>>>>> 6b37c17e3702840205ac9bf66c9189f0da3983bb
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
<<<<<<< HEAD
            position: relative;
        }

        .book-img-wrapper::after {
            content: '';
            position: absolute;
            bottom: 0; left: 0; right: 0;
            height: 40px;
            background: linear-gradient(to top, rgba(0,0,0,0.5), transparent);
            opacity: 0;
            transition: opacity 0.3s;
        }
        
        .card:hover .book-img-wrapper::after { opacity: 1; }

        .book-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            padding: 1rem;
            transition: transform 0.5s ease;
        }
        
        .card:hover .book-img-wrapper img {
            transform: scale(1.05);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary) 0%, #c2410c 100%);
            border: none;
            border-radius: 10px;
            padding: 0.6rem 1.5rem;
            font-weight: 600;
            box-shadow: 0 4px 10px rgba(234, 88, 12, 0.2);
            transition: all 0.3s;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(234, 88, 12, 0.3);
        }

        .badge-category {
            font-size: 11px;
            text-transform: uppercase;
            font-weight: 700;
            padding: 6px 10px;
            border-radius: 6px;
            background-color: var(--primary-light);
            color: var(--primary);
            letter-spacing: 0.05em;
=======
        }

        .book-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            border-radius: 10px;
            font-weight: 600;
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .badge-category {
            font-size: 10px;
            text-transform: uppercase;
            font-weight: 700;
            padding: 4px 8px;
            border-radius: 4px;
            background-color: rgba(67, 97, 238, 0.1);
            color: var(--primary-color);
>>>>>>> 6b37c17e3702840205ac9bf66c9189f0da3983bb
        }

        .footer {
            margin-top: 80px;
            padding: 40px 0;
<<<<<<< HEAD
            background-color: var(--surface);
            border-top: 1px solid rgba(226, 232, 240, 0.8);
=======
            background-color: #fff;
            border-top: 1px solid #e2e8f0;
>>>>>>> 6b37c17e3702840205ac9bf66c9189f0da3983bb
        }
    </style>
    @yield('styles')
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('student.dashboard') }}">
                <i class="bi bi-book-half"></i> PerpusSiswa
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('student.dashboard') ? 'active' : '' }}"
                            href="{{ route('student.dashboard') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('student.books.*') ? 'active' : '' }}"
                            href="{{ route('student.books.index') }}">Katalog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('student.borrowings.*') ? 'active' : '' }}"
                            href="{{ route('student.borrowings.index') }}">Pinjaman Saya</a>
                    </li>
                </ul>
                <div class="navbar-nav">
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#"
                            data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle me-2"></i> {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm">
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i
                                        class="bi bi-person me-2"></i> Profil</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger"><i
                                            class="bi bi-box-arrow-right me-2"></i> Keluar</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container text-center">
            <p class="text-muted mb-0">&copy; {{ date('Y') }} Deden Library System. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>

</html>