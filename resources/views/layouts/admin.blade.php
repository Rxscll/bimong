<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - PerpusSiswa</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        :root {
            --sidebar-width: 280px;
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
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-body);
            color: var(--text-main);
            letter-spacing: -0.01em;
            -webkit-font-smoothing: antialiased;
        }

        #wrapper { display: flex; width: 100%; }

        /* Floating Sidebar Concept */
        #sidebar-wrapper {
            width: var(--sidebar-width);
            height: calc(100vh - 2rem);
            margin: 1rem;
            background: var(--surface);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: var(--shadow-md);
            border-radius: var(--radius-lg);
            position: fixed;
            z-index: 1000;
            overflow-y: auto;
            border: 1px solid rgba(226, 232, 240, 0.8);
        }

        #sidebar-wrapper::-webkit-scrollbar { width: 5px; }
        #sidebar-wrapper::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 5px; }

        .sidebar-heading {
            padding: 2rem 1.5rem 1.5rem;
            display: flex;
            align-items: center;
            border-bottom: 1px solid #f1f5f9;
            margin-bottom: 1rem;
        }

        .logo-icon {
            width: 38px;
            height: 38px;
            background: linear-gradient(135deg, var(--primary) 0%, #c2410c 100%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            margin-right: 12px;
            box-shadow: 0 4px 10px rgba(234, 88, 12, 0.3);
        }

        .list-group-item {
            padding: 0.85rem 1.25rem;
            border: none;
            background: transparent;
            color: var(--text-muted);
            font-weight: 600;
            border-radius: 12px;
            margin: 0.25rem 1rem;
            display: flex;
            align-items: center;
            transition: all 0.2s ease;
        }

        .list-group-item i {
            font-size: 1.2rem;
            margin-right: 1rem;
            transition: transform 0.2s;
        }

        .list-group-item:hover {
            color: var(--primary);
            background: var(--primary-light);
            transform: translateX(4px);
        }

        .list-group-item.active {
            color: var(--primary);
            background: var(--primary-light);
            box-shadow: inset 3px 0 0 var(--primary);
        }

        #page-content-wrapper {
            width: 100%;
            padding-left: calc(var(--sidebar-width) + 2rem);
            transition: all 0.3s;
        }

        /* Navbar */
        .navbar {
            padding: 1rem 2rem;
            background: rgba(248, 250, 252, 0.8) !important;
            backdrop-filter: blur(12px);
            border-bottom: none;
            margin-bottom: 2rem;
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

        /* General Components */
        .card {
            border: 1px solid rgba(226, 232, 240, 0.8);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-sm);
            background: var(--surface);
            transition: box-shadow 0.3s;
        }

        .stat-card {
            padding: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1.5rem;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
        }

        .icon-box {
            width: 60px;
            height: 60px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            flex-shrink: 0;
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

        /* Modern Tables */
        .table { margin-bottom: 0; }
        .table th, .table td {
            vertical-align: middle;
            padding: 1rem 1.5rem;
            border-bottom-color: #f1f5f9;
            color: var(--text-main);
        }
        
        .table thead th {
            background: #f8fafc;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
            color: var(--text-muted);
            border-bottom: 2px solid #e2e8f0;
        }

        .table tbody tr {
            transition: background 0.2s;
        }

        .table tbody tr:hover { background: #f8fafc; }

        .badge {
            padding: 0.5em 0.8em;
            border-radius: 6px;
            font-weight: 600;
            letter-spacing: 0.02em;
        }

        /* Media Queries for Responsive Sidebar */
        @media (max-width: 991.98px) {
            #sidebar-wrapper {
                margin: 0;
                height: 100vh;
                border-radius: 0;
                transform: translateX(-100%);
            }
            #wrapper.toggled #sidebar-wrapper { transform: translateX(0); }
            #page-content-wrapper { padding-left: 0; }
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
                <a href="{{ route('admin.borrowings.index') }}"
                    class="list-group-item {{ request()->routeIs('admin.borrowings.*') ? 'active' : '' }}">
                    <i class="bi bi-arrow-left-right"></i> Peminjaman
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