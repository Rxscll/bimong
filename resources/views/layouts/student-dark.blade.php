<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - Perpus Digital</title>
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
                        brand: {
                            glow: '#4f46e5', // subtle blue/indigo glow
                            accent: '#3b82f6',
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
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        body {
            background-color: #161625; /* Very deep navy/midnight */
            color: #ffffff;
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
        }

        /* Subtle radial gradient background effect */
        .bg-glow {
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: radial-gradient(circle at 50% -20%, rgba(79, 70, 229, 0.15) 0%, rgba(22, 22, 37, 1) 60%);
            z-index: -1;
            pointer-events: none;
        }

        /* Glassmorphism Utilities */
        .glass-panel {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
        }
        
        .glass-panel-hover:hover {
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(255, 255, 255, 0.15);
        }

        /* Custom Scrollbar for dark theme */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: rgba(255,255,255,0.02);
        }
        ::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,0.1);
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: rgba(255,255,255,0.2);
        }
    </style>
    @yield('styles')
</head>
<body class="antialiased flex h-screen overflow-hidden">
    <div class="bg-glow"></div>

    <!-- Sidebar -->
    <aside class="w-20 lg:w-64 flex flex-col h-full glass-panel border-r-0 border-white/10 z-20 flex-shrink-0">
        <!-- Logo -->
        <div class="h-24 flex items-center justify-center lg:justify-start lg:px-8 border-b border-white/5">
            <div class="bg-gradient-to-br from-blue-500 to-indigo-600 w-10 h-10 rounded-xl flex items-center justify-center shadow-lg shadow-blue-500/30">
                <i class="bi bi-box-seam text-white text-xl"></i>
            </div>
            <span class="ml-4 font-semibold text-xl tracking-wide hidden lg:block text-white">Library<span class="text-blue-500">.</span></span>
        </div>

        <!-- Navigation Links -->
        <nav class="flex-1 py-8 flex flex-col gap-3 px-4">
            <a href="{{ route('student.dashboard') }}" class="flex items-center px-4 py-3.5 rounded-xl transition-all {{ request()->routeIs('student.dashboard') ? 'bg-blue-600/20 text-blue-400 border border-blue-500/30 shadow-[0_0_15px_rgba(59,130,246,0.15)]' : 'text-gray-400 hover:text-white hover:bg-white/5' }}">
                <i class="bi bi-grid-1x2 text-xl"></i>
                <span class="ml-4 font-medium hidden lg:block tracking-wide">Dashboard</span>
            </a>
            <a href="{{ route('student.books.index') }}" class="flex items-center px-4 py-3.5 rounded-xl transition-all {{ request()->routeIs('student.books.*') ? 'bg-blue-600/20 text-blue-400 border border-blue-500/30 shadow-[0_0_15px_rgba(59,130,246,0.15)]' : 'text-gray-400 hover:text-white hover:bg-white/5' }}">
                <i class="bi bi-book text-xl"></i>
                <span class="ml-4 font-medium hidden lg:block tracking-wide">Katalog</span>
            </a>
            <a href="{{ route('student.favorites.index') }}" class="flex items-center px-4 py-3.5 rounded-xl transition-all {{ request()->routeIs('student.favorites.*') ? 'bg-blue-600/20 text-blue-400 border border-blue-500/30 shadow-[0_0_15px_rgba(59,130,246,0.15)]' : 'text-gray-400 hover:text-white hover:bg-white/5' }}">
                <i class="bi bi-heart text-xl"></i>
                <span class="ml-4 font-medium hidden lg:block tracking-wide">Favorit</span>
            </a>
            <a href="{{ route('student.reading-history.index') }}" class="flex items-center px-4 py-3.5 rounded-xl transition-all {{ request()->routeIs('student.reading-history.*') ? 'bg-blue-600/20 text-blue-400 border border-blue-500/30 shadow-[0_0_15px_rgba(59,130,246,0.15)]' : 'text-gray-400 hover:text-white hover:bg-white/5' }}">
                <i class="bi bi-clock-history text-xl"></i>
                <span class="ml-4 font-medium hidden lg:block tracking-wide">Riwayat</span>
            </a>
        </nav>

        <!-- Bottom User info -->
        <div class="p-6 border-t border-white/5 pb-8">
            <a href="{{ route('profile.edit') }}" class="flex flex-col items-center lg:items-start lg:flex-row lg:items-center px-2 py-3 mb-4 rounded-xl group cursor-pointer hover:bg-white/5 transition-all">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=3b82f6&color=fff" alt="User" class="w-10 h-10 rounded-full border-2 border-white/10 group-hover:border-blue-500/50 transition-colors">
                <div class="mt-2 lg:mt-0 lg:ml-3 hidden lg:block overflow-hidden">
                    <p class="text-sm font-semibold text-white truncate">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-gray-400 mt-0.5">Siswa</p>
                </div>
            </a>
            
            <form action="{{ route('logout') }}" method="POST" class="w-full">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center lg:justify-start px-4 py-3 text-gray-400 hover:text-white hover:bg-red-500/20 hover:border-red-500/30 border border-transparent rounded-xl transition-all">
                    <i class="bi bi-box-arrow-right text-xl text-red-400"></i>
                    <span class="ml-3 hidden lg:block font-medium">Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 h-full overflow-y-auto relative z-10 px-4 py-6 md:p-8 lg:p-10">
        @yield('content')
    </main>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
