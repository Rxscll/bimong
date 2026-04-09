<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - Perpus Digital</title>
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
            <div class="flex items-center justify-center h-16 bg-blue-600 text-white">
                <i class="bi bi-book-half text-2xl mr-2"></i>
                <span class="font-bold text-lg">Perpus Digital</span>
            </div>
            
            <nav class="mt-5 px-4">
                <div class="space-y-2">
                    <a href="{{ route('admin.dashboard') }}" 
                       class="flex items-center px-4 py-2 text-sm font-medium rounded-lg {{ request()->is('admin/dashboard') ? 'bg-blue-100 text-blue-700' : 'text-gray-700 hover:bg-gray-100' }}">
                        <i class="bi bi-speedometer2 mr-3"></i>
                        Dashboard
                    </a>
                    <a href="{{ route('admin.books.index') }}" 
                       class="flex items-center px-4 py-2 text-sm font-medium rounded-lg {{ request()->is('admin/books*') ? 'bg-blue-100 text-blue-700' : 'text-gray-700 hover:bg-gray-100' }}">
                        <i class="bi bi-book mr-3"></i>
                        Buku
                    </a>
                    <a href="{{ route('admin.categories.index') }}" 
                       class="flex items-center px-4 py-2 text-sm font-medium rounded-lg {{ request()->is('admin/categories*') ? 'bg-blue-100 text-blue-700' : 'text-gray-700 hover:bg-gray-100' }}">
                        <i class="bi bi-tags mr-3"></i>
                        Kategori
                    </a>
                    <a href="{{ route('admin.students.index') }}" 
                       class="flex items-center px-4 py-2 text-sm font-medium rounded-lg {{ request()->is('admin/students*') ? 'bg-blue-100 text-blue-700' : 'text-gray-700 hover:bg-gray-100' }}">
                        <i class="bi bi-people mr-3"></i>
                        Siswa
                    </a>
                    <a href="{{ route('admin.reading-history.index') }}" 
                       class="flex items-center px-4 py-2 text-sm font-medium rounded-lg {{ request()->is('admin/reading-history*') ? 'bg-blue-100 text-blue-700' : 'text-gray-700 hover:bg-gray-100' }}">
                        <i class="bi bi-clock-history mr-3"></i>
                        Riwayat Baca
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
                                    class="text-sm text-gray-500 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
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
            width: 32px;
            height: 32px;
            background: var(--primary-color);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            margin-right: 10px;
        }

        #sidebar-wrapper .list-group-item {
            padding: 0.75rem 1.25rem;
            border: none;
            background: transparent;
            color: #6c757d;
            font-weight: 500;
            border-radius: 10px;
            margin: 0.25rem 1rem;
            display: flex;
            align-items: center;
        }

        #sidebar-wrapper .list-group-item i {
            font-size: 1.25rem;
            margin-right: 0.75rem;
        }

        #sidebar-wrapper .list-group-item:hover {
            color: var(--primary-color);
            background: rgba(67, 97, 238, 0.05);
        }

        #sidebar-wrapper .list-group-item.active {
            color: var(--primary-color);
            background: rgba(67, 97, 238, 0.1);
        }

        #page-content-wrapper {
            width: 100%;
            padding-left: var(--sidebar-width);
        }

        .navbar {
            padding: 1rem 1.5rem;
            background: rgba(255, 255, 255, 0.8) !important;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }

        .stat-card {
            transition: transform 0.2s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .icon-box {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            border-radius: 10px;
            padding: 0.5rem 1.25rem;
            font-weight: 600;
        }

        .table thead th {
            background: #f8f9fa;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
            color: #6c757d;
            border-top: none;
        }

        .badge {
            padding: 0.5em 0.75em;
            border-radius: 6px;
        }
    </style>
    @yield('styles')
</head>

<body>
    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <div class="sidebar-heading">
                <div class="logo-icon">
                    <i class="bi bi-book-half"></i>
                </div>
                <h5 class="mb-0 fw-bold text-dark">PerpusSiswa</h5>
            </div>
            <div class="list-group list-group-flush">
                <a href="{{ route('admin.dashboard') }}"
                    class="list-group-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-grid-1x2-fill"></i> Dasbor
                </a>
                <a href="{{ route('admin.categories.index') }}"
                    class="list-group-item {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                    <i class="bi bi-tags-fill"></i> Kategori
                </a>
                <a href="{{ route('admin.books.index') }}"
                    class="list-group-item {{ request()->routeIs('admin.books.*') ? 'active' : '' }}">
                    <i class="bi bi-book-fill"></i> Buku
                </a>
                <a href="{{ route('admin.students.index') }}"
                    class="list-group-item {{ request()->routeIs('admin.students.*') ? 'active' : '' }}">
                    <i class="bi bi-people-fill"></i> Siswa
                </a>
                <a href="{{ route('admin.reading-history.index') }}"
                    class="list-group-item {{ request()->routeIs('admin.reading-history.*') ? 'active' : '' }}">
                    <i class="bi bi-clock-history"></i> Riwayat Baca
                </a>
            </div>
        </div>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top mb-4">
                <div class="container-fluid">
                    <button class="btn d-md-none" type="button" data-bs-toggle="collapse"
                        data-bs-target="#sidebar-wrapper">
                        <i class="bi bi-list"></i>
                    </button>

                    <div class="ms-auto d-flex align-items-center">
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown">
                                <div class="avatar-sm me-2 d-flex align-items-center justify-content-center rounded-circle bg-primary text-white"
                                    style="width: 32px; height: 32px; font-size: 14px;">
                                    {{ substr(auth()->user()->name, 0, 1) }}
                                </div>
                                <span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm mt-3">
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
            </nav>

            <div class="container-fluid px-4 pb-5">
                <!-- Flash Messages -->
                @if(session('success'))
                    <div class="alert alert-success border-0 shadow-sm alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger border-0 shadow-sm alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>

</html>