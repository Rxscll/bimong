<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Katalog') - Perpus Digital</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2563EB',
                        secondary: '#38BDF8',
                        background: '#F8FAFC',
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-50 font-sans antialiased">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-lg">
            <div class="flex items-center justify-center h-16 bg-primary text-white">
                <i class="bi bi-book-half text-2xl mr-2"></i>
                <span class="font-bold text-lg">Perpus Digital</span>
            </div>
            
            <nav class="mt-5 px-4">
                <div class="space-y-2">
                    <a href="{{ route('student.dashboard') }}" 
                       class="flex items-center px-4 py-2 text-sm font-medium rounded-lg {{ request()->is('student/dashboard') ? 'bg-primary text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                        <i class="bi bi-speedometer2 mr-3"></i>
                        Dashboard
                    </a>
                    <a href="{{ route('student.books.index') }}" 
                       class="flex items-center px-4 py-2 text-sm font-medium rounded-lg {{ request()->is('student/books*') ? 'bg-primary text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                        <i class="bi bi-book mr-3"></i>
                        Katalog Buku
                    </a>
                    <a href="{{ route('student.favorites.index') }}" 
                       class="flex items-center px-4 py-2 text-sm font-medium rounded-lg {{ request()->is('student/favorites*') ? 'bg-primary text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                        <i class="bi bi-heart mr-3"></i>
                        Favorit
                    </a>
                    <a href="{{ route('student.reading-history.index') }}" 
                       class="flex items-center px-4 py-2 text-sm font-medium rounded-lg {{ request()->is('student/reading-history*') ? 'bg-primary text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                        <i class="bi bi-clock-history mr-3"></i>
                        Riwayat Bacaan
                    </a>
                    <a href="{{ route('profile.edit') }}" 
                       class="flex items-center px-4 py-2 text-sm font-medium rounded-lg {{ request()->is('profile*') ? 'bg-primary text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                        <i class="bi bi-person mr-3"></i>
                        Profil
                    </a>
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Navigation -->
            <header class="bg-white shadow-sm">
                <div class="flex items-center justify-between px-6 py-4">
                    <h1 class="text-xl font-semibold text-gray-900">@yield('title')</h1>
                    <div class="flex items-center space-x-4">
                        <span class="text-sm text-gray-600">
                            <i class="bi bi-person-circle mr-1"></i>
                            {{ auth()->user()->name }}
                        </span>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" 
                                    class="text-sm text-gray-500 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                                <i class="bi bi-box-arrow-right"></i>
                                Keluar
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto bg-gray-50">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>

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
                        <a class="nav-link {{ request()->routeIs('student.favorites.*') ? 'active' : '' }}"
                            href="{{ route('student.favorites.index') }}">Favorit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('student.reading-history.*') ? 'active' : '' }}"
                            href="{{ route('student.reading-history.index') }}">Riwayat Bacaan</a>
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