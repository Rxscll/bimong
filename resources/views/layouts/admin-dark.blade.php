<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - Perpus Digital</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        dark: {
                            base: '#1a1a2e',
                            surface: 'rgba(255, 255, 255, 0.05)',
                            surfaceHover: 'rgba(255, 255, 255, 0.1)',
                            border: 'rgba(255, 255, 255, 0.1)',
                        },
                        admin: {
                            glow: '#8b5cf6', // A purple/indigo primary theme for admin
                            accent: '#6366f1',
                        }
                    }
                }
            }
        }
    </script>
    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        body {
            background-color: #161625; /* Very deep navy/midnight */
            color: #ffffff;
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
        }

        /* Subtle radial gradient background effect */
        .bg-glow-admin {
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: radial-gradient(circle at 10% 0%, rgba(139, 92, 246, 0.12) 0%, rgba(22, 22, 37, 1) 60%);
            z-index: -1;
            pointer-events: none;
        }

        /* Glassmorphism Utilities */
        .glass-panel {
            background: rgba(255, 255, 255, 0.04);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }
        
        .glass-panel-hover:hover {
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(255, 255, 255, 0.15);
        }

        /* Custom Scrollbar for dark theme */
        ::-webkit-scrollbar { width: 8px; height: 8px; }
        ::-webkit-scrollbar-track { background: rgba(255,255,255,0.02); }
        ::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.1); border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: rgba(255,255,255,0.2); }
        
        /* Tooltip overrides if any */
        .admin-nav-link {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .admin-nav-link.active {
            background: rgba(99, 102, 241, 0.15); /* Indigo tint */
            color: #818cf8; /* Indigo text */
            border: 1px solid rgba(99, 102, 241, 0.3);
            box-shadow: 0 0 15px rgba(99, 102, 241, 0.15);
        }
    </style>
    @yield('styles')
</head>
<body class="antialiased flex h-screen overflow-hidden">
    <div class="bg-glow-admin"></div>

    <!-- Sidebar -->
    <aside class="w-20 lg:w-64 flex flex-col h-full glass-panel border-r-0 border-white/10 z-20 flex-shrink-0 relative shadow-xl shadow-black">
        <!-- Logo -->
        <div class="h-24 flex items-center justify-center lg:justify-start lg:px-8 border-b border-white/5">
            <div class="bg-gradient-to-br from-indigo-500 to-purple-600 w-10 h-10 rounded-xl flex items-center justify-center shadow-lg shadow-purple-500/30">
                <i class="bi bi-shield-lock text-white text-xl"></i>
            </div>
            <span class="ml-4 font-semibold text-xl tracking-wide hidden lg:block text-white">Admin<span class="text-indigo-400">Panel</span></span>
        </div>

        <!-- Navigation Links -->
        <nav class="flex-1 py-8 flex flex-col gap-3 px-4 overflow-y-auto">
            <a href="{{ route('admin.dashboard') }}" class="admin-nav-link flex items-center px-4 py-3.5 rounded-xl {{ request()->routeIs('admin.dashboard') ? 'active' : 'text-gray-400 hover:text-white hover:bg-white/5' }}">
                <i class="bi bi-grid-1x2 text-xl {{ request()->routeIs('admin.dashboard') ? 'text-indigo-400' : '' }}"></i>
                <span class="ml-4 font-medium hidden lg:block tracking-wide">Dasbor</span>
            </a>
            
            <a href="{{ route('admin.categories.index') }}" class="admin-nav-link flex items-center px-4 py-3.5 rounded-xl {{ request()->routeIs('admin.categories.*') ? 'active' : 'text-gray-400 hover:text-white hover:bg-white/5' }}">
                <i class="bi bi-tags text-xl {{ request()->routeIs('admin.categories.*') ? 'text-indigo-400' : '' }}"></i>
                <span class="ml-4 font-medium hidden lg:block tracking-wide">Kategori</span>
            </a>
            
            <a href="{{ route('admin.books.index') }}" class="admin-nav-link flex items-center px-4 py-3.5 rounded-xl {{ request()->routeIs('admin.books.*') ? 'active' : 'text-gray-400 hover:text-white hover:bg-white/5' }}">
                <i class="bi bi-book text-xl {{ request()->routeIs('admin.books.*') ? 'text-indigo-400' : '' }}"></i>
                <span class="ml-4 font-medium hidden lg:block tracking-wide">Katalog Buku</span>
            </a>
            
            <a href="{{ route('admin.students.index') }}" class="admin-nav-link flex items-center px-4 py-3.5 rounded-xl {{ request()->routeIs('admin.students.*') ? 'active' : 'text-gray-400 hover:text-white hover:bg-white/5' }}">
                <i class="bi bi-people text-xl {{ request()->routeIs('admin.students.*') ? 'text-indigo-400' : '' }}"></i>
                <span class="ml-4 font-medium hidden lg:block tracking-wide">Data Siswa</span>
            </a>
            
            <a href="{{ route('admin.reading-history.index') }}" class="admin-nav-link flex items-center px-4 py-3.5 rounded-xl {{ request()->routeIs('admin.reading-history.*') ? 'active' : 'text-gray-400 hover:text-white hover:bg-white/5' }}">
                <i class="bi bi-clock-history text-xl {{ request()->routeIs('admin.reading-history.*') ? 'text-indigo-400' : '' }}"></i>
                <span class="ml-4 font-medium hidden lg:block tracking-wide">Riwayat Baca</span>
            </a>
        </nav>

        <!-- Bottom User info -->
        <div class="p-6 border-t border-white/5 pb-8 relative z-30 bg-[#1a1a2e]/60 backdrop-blur-sm">
            <a href="{{ route('profile.edit') }}" class="flex flex-col items-center lg:items-start lg:flex-row lg:items-center px-2 py-3 mb-4 rounded-xl group cursor-pointer hover:bg-white/5 transition-all">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=6366f1&color=fff" alt="Admin" class="w-10 h-10 rounded-full border-2 border-white/10 group-hover:border-indigo-400/50 transition-colors shadow-lg">
                <div class="mt-2 lg:mt-0 lg:ml-3 hidden lg:block overflow-hidden">
                    <p class="text-sm font-semibold text-white truncate">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-indigo-400 font-medium mt-0.5">Administrator</p>
                </div>
            </a>
            
            <form action="{{ route('logout') }}" method="POST" class="w-full">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center lg:justify-start px-4 py-3 text-gray-400 hover:text-white hover:bg-red-500/10 hover:border-red-500/20 border border-transparent rounded-xl transition-all shadow-sm">
                    <i class="bi bi-box-arrow-right text-xl text-red-400"></i>
                    <span class="ml-3 hidden lg:block font-medium">Logout System</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 h-full overflow-y-auto relative z-10 px-4 py-6 md:p-8 lg:p-10">
        <!-- Flash Messages Overlay -->
        @if(session('success') || session('error'))
        <div class="fixed top-6 right-6 z-50 flex flex-col gap-3">
            @if(session('success'))
            <div class="bg-green-500/10 border border-green-500/30 text-green-400 px-6 py-4 rounded-xl shadow-[0_0_20px_rgba(34,197,94,0.15)] backdrop-blur-md flex items-center alert-dismissible" role="alert">
                <i class="bi bi-check-circle-fill mr-3 text-lg"></i>
                <span class="font-medium">{{ session('success') }}</span>
                <button type="button" onclick="this.parentElement.remove()" class="ml-6 text-green-400/70 hover:text-green-300 transition-colors"><i class="bi bi-x-lg"></i></button>
            </div>
            @endif
            @if(session('error'))
            <div class="bg-red-500/10 border border-red-500/30 text-red-400 px-6 py-4 rounded-xl shadow-[0_0_20px_rgba(239,68,68,0.15)] backdrop-blur-md flex items-center alert-dismissible" role="alert">
                <i class="bi bi-exclamation-triangle-fill mr-3 text-lg"></i>
                <span class="font-medium">{{ session('error') }}</span>
                <button type="button" onclick="this.parentElement.remove()" class="ml-6 text-red-400/70 hover:text-red-300 transition-colors"><i class="bi bi-x-lg"></i></button>
            </div>
            @endif
        </div>
        @endif

        @yield('content')
    </main>

    @yield('scripts')
</body>
</html>
