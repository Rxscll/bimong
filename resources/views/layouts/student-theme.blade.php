<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - Perpus Digital</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        slate: {
                            50: '#f8fafc',
                            100: '#f1f5f9',
                            200: '#e2e8f0',
                            400: '#94a3b8',
                            500: '#64748b',
                            600: '#475569',
                            800: '#1e293b',
                            900: '#0f172a',
                        }
                    }
                }
            }
        }
    </script>
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        body {
            background-color: #f8fafc; /* slate-50 */
            color: #0f172a; /* slate-900 */
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        /* Light Glassmorphism Base Utilities */
        .glass-panel {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(226, 232, 240, 0.8); /* slate-200 */
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .glass-panel-hover:hover {
            background: rgba(255, 255, 255, 1);
            border-color: rgba(203, 213, 225, 1); /* slate-300 */
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.08), 0 4px 6px -2px rgba(0, 0, 0, 0.04);
        }

        /* Custom Scrollbar for light theme */
        ::-webkit-scrollbar { width: 8px; height: 8px; background: transparent; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
        
        /* Links Active States */
        .nav-link-student { transition: all 0.2s ease; }
        .nav-link-student.active {
            background-color: #0f172a; /* slate-900 */
            color: #ffffff;
            box-shadow: 0 4px 6px -1px rgba(15, 23, 42, 0.2);
        }
    </style>
    @yield('styles')
</head>
<body class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <aside class="w-20 lg:w-64 flex flex-col h-full bg-white border-r border-slate-200 z-20 flex-shrink-0 shadow-sm relative">
        <!-- Logo -->
        <div class="h-24 flex items-center justify-center lg:justify-start lg:px-8 border-b border-slate-100">
            <div class="bg-slate-900 w-10 h-10 rounded-xl flex items-center justify-center shadow-md">
                <i class="bi bi-book-half text-white text-xl"></i>
            </div>
            <span class="ml-4 font-extrabold text-xl tracking-tight hidden lg:block text-slate-900">BacaKita</span>
        </div>

        <!-- Navigation Links -->
        <nav class="flex-1 py-8 flex flex-col gap-2 px-4 overflow-y-auto">
            <a href="{{ route('student.dashboard') }}" class="nav-link-student flex items-center px-4 py-3.5 rounded-xl font-semibold {{ request()->routeIs('student.dashboard') ? 'active' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}">
                <i class="bi bi-grid-1x2 text-xl"></i>
                <span class="ml-4 hidden lg:block tracking-wide">Dashboard</span>
            </a>
            <a href="{{ route('student.books.index') }}" class="nav-link-student flex items-center px-4 py-3.5 rounded-xl font-semibold {{ request()->routeIs('student.books.*') ? 'active' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}">
                <i class="bi bi-journal-text text-xl"></i>
                <span class="ml-4 hidden lg:block tracking-wide">Katalog</span>
            </a>
            <a href="{{ route('student.favorites.index') }}" class="nav-link-student flex items-center px-4 py-3.5 rounded-xl font-semibold {{ request()->routeIs('student.favorites.*') ? 'active' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}">
                <i class="bi bi-heart text-xl"></i>
                <span class="ml-4 hidden lg:block tracking-wide">Favorit</span>
            </a>
            <a href="{{ route('student.reading-history.index') }}" class="nav-link-student flex items-center px-4 py-3.5 rounded-xl font-semibold {{ request()->routeIs('student.reading-history.*') ? 'active' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}">
                <i class="bi bi-clock-history text-xl"></i>
                <span class="ml-4 hidden lg:block tracking-wide">Riwayat Membaca</span>
            </a>
        </nav>

        <!-- Bottom User info -->
        <div class="p-6 border-t border-slate-100 bg-slate-50/50">
            @auth
            <a href="{{ route('profile.edit') }}" class="flex flex-col items-center lg:items-start lg:flex-row lg:items-center px-2 py-3 mb-4 rounded-xl group cursor-pointer hover:bg-white transition-all border border-transparent hover:border-slate-200 hover:shadow-sm">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=0f172a&color=fff" alt="User" class="w-10 h-10 rounded-full shadow-sm">
                <div class="mt-2 lg:mt-0 lg:ml-3 hidden lg:block overflow-hidden">
                    <p class="text-sm font-bold text-slate-900 truncate">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-slate-500 font-medium mt-0.5">Siswa</p>
                </div>
            </a>
            
            <form action="{{ route('logout') }}" method="POST" class="w-full">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center lg:justify-start px-4 py-3 text-slate-600 font-semibold hover:text-red-600 hover:bg-red-50 rounded-xl transition-all">
                    <i class="bi bi-box-arrow-right text-xl"></i>
                    <span class="ml-3 hidden lg:block">Keluar Akun</span>
                </button>
            </form>
            @else
            <div class="flex flex-col items-center lg:items-start lg:flex-row lg:items-center px-2 py-3 mb-4 rounded-xl">
                <div class="w-10 h-10 rounded-full shadow-sm bg-slate-200 text-slate-500 flex items-center justify-center font-bold text-lg"><i class="bi bi-person"></i></div>
                <div class="mt-2 lg:mt-0 lg:ml-3 hidden lg:block overflow-hidden">
                    <p class="text-sm font-bold text-slate-900 truncate">Pengunjung Tamu</p>
                    <p class="text-xs text-slate-500 font-medium mt-0.5">Non-Member</p>
                </div>
            </div>
            
            <a href="{{ route('login') }}" class="w-full flex items-center justify-center lg:justify-start px-4 py-3 text-emerald-600 font-semibold bg-emerald-50 hover:bg-emerald-100 rounded-xl transition-all">
                <i class="bi bi-box-arrow-in-right text-xl"></i>
                <span class="ml-3 hidden lg:block">Masuk Akun</span>
            </a>
            @endauth
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 h-full overflow-y-auto relative z-10 px-4 py-6 md:p-8 lg:p-10 scroll-smooth">
        @yield('content')
    </main>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
