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
            --primary-color: #F75D34;
            --secondary-color: #FF8C42;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
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
        }

        .nav-link:hover,
        .nav-link.active {
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
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .book-img-wrapper {
            height: 200px;
            background-color: #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
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
        }

        .footer {
            margin-top: 80px;
            padding: 40px 0;
            background-color: #fff;
            border-top: 1px solid #e2e8f0;
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