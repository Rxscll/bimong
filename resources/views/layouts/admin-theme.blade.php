<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - Perpus Digital</title>
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
                            300: '#cbd5e1',
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
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(226, 232, 240, 1); /* slate-200 */
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .glass-panel-hover:hover {
            background: rgba(255, 255, 255, 1);
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.08), 0 4px 6px -2px rgba(0, 0, 0, 0.04);
        }

        /* Custom Scrollbar for light theme */
        ::-webkit-scrollbar { width: 8px; height: 8px; background: transparent; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
        
        /* Nav Links Active States */
        .nav-link-admin { transition: all 0.2s ease; }
        .nav-link-admin.active {
            background-color: #f1f5f9; /* slate-100 */
            color: #0f172a; /* slate-900 */
            border-right: 4px solid #0f172a;
        }
    </style>
    @yield('styles')
</head>
<body class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <aside class="w-20 lg:w-64 flex flex-col h-full bg-white border-r border-slate-200 z-20 flex-shrink-0 relative shadow-sm">
        <!-- Logo -->
        <div class="h-24 flex items-center justify-center lg:justify-start lg:px-8 border-b border-slate-100">
            <div class="bg-slate-900 w-10 h-10 rounded-xl flex items-center justify-center shadow-md">
                <i class="bi bi-shield-check text-white text-xl"></i>
            </div>
            <span class="ml-4 font-extrabold text-xl tracking-tight hidden lg:block text-slate-900">AdminPanel</span>
        </div>

        <!-- Navigation Links -->
        <nav class="flex-1 py-8 flex flex-col gap-2 px-4 overflow-y-auto">
            <a href="{{ route('admin.dashboard') }}" class="nav-link-admin flex items-center px-4 py-3.5 rounded-xl font-semibold {{ request()->routeIs('admin.dashboard') ? 'active' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}">
                <i class="bi bi-grid-1x2 text-xl"></i>
                <span class="ml-4 hidden lg:block tracking-wide">Dasbor</span>
            </a>
            
            <a href="{{ route('admin.categories.index') }}" class="nav-link-admin flex items-center px-4 py-3.5 rounded-xl font-semibold {{ request()->routeIs('admin.categories.*') ? 'active' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}">
                <i class="bi bi-tags text-xl"></i>
                <span class="ml-4 hidden lg:block tracking-wide">Kategori</span>
            </a>
            
            <a href="{{ route('admin.books.index') }}" class="nav-link-admin flex items-center px-4 py-3.5 rounded-xl font-semibold {{ request()->routeIs('admin.books.*') ? 'active' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}">
                <i class="bi bi-journal-text text-xl"></i>
                <span class="ml-4 hidden lg:block tracking-wide">Katalog Buku</span>
            </a>
            
            <a href="{{ route('admin.students.index') }}" class="nav-link-admin flex items-center px-4 py-3.5 rounded-xl font-semibold {{ request()->routeIs('admin.students.*') ? 'active' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}">
                <i class="bi bi-people text-xl"></i>
                <span class="ml-4 hidden lg:block tracking-wide">Data Siswa</span>
            </a>
            
            <a href="{{ route('admin.reading-history.index') }}" class="nav-link-admin flex items-center px-4 py-3.5 rounded-xl font-semibold {{ request()->routeIs('admin.reading-history.*') ? 'active' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}">
                <i class="bi bi-clock-history text-xl"></i>
                <span class="ml-4 hidden lg:block tracking-wide">Riwayat Baca</span>
            </a>
        </nav>

        <!-- Bottom User info -->
        <div class="p-6 border-t border-slate-100 bg-slate-50/50">
            <a href="{{ route('profile.edit') }}" class="flex flex-col items-center lg:items-start lg:flex-row lg:items-center px-2 py-3 mb-4 rounded-xl group cursor-pointer hover:bg-white transition-all border border-transparent hover:border-slate-200 hover:shadow-sm">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=0f172a&color=fff" alt="Admin" class="w-10 h-10 rounded-full shadow-sm">
                <div class="mt-2 lg:mt-0 lg:ml-3 hidden lg:block overflow-hidden">
                    <p class="text-sm font-bold text-slate-900 truncate">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-slate-500 font-medium mt-0.5">Administrator</p>
                </div>
            </a>
            
            <form action="{{ route('logout') }}" method="POST" class="w-full">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center lg:justify-start px-4 py-3 text-slate-600 font-semibold hover:text-red-600 hover:bg-red-50 rounded-xl transition-all">
                    <i class="bi bi-box-arrow-right text-xl"></i>
                    <span class="ml-3 hidden lg:block">Logout System</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 h-full overflow-y-auto relative z-10 px-4 py-6 md:p-8 lg:p-10 scroll-smooth">
        
        <!-- Flash Messages Overlay -->
        @if(session('success') || session('error'))
        <div class="fixed top-6 right-6 z-50 flex flex-col gap-3">
            @if(session('success'))
            <div class="bg-white border border-green-200 text-green-700 px-6 py-4 rounded-xl shadow-lg flex items-center alert-dismissible" role="alert">
                <i class="bi bi-check-circle-fill mr-3 text-lg text-green-500"></i>
                <span class="font-semibold">{{ session('success') }}</span>
                <button type="button" onclick="this.parentElement.remove()" class="ml-6 text-gray-400 hover:text-gray-600 transition-colors"><i class="bi bi-x-lg"></i></button>
            </div>
            @endif
            @if(session('error'))
            <div class="bg-white border border-red-200 text-red-700 px-6 py-4 rounded-xl shadow-lg flex items-center alert-dismissible" role="alert">
                <i class="bi bi-exclamation-triangle-fill mr-3 text-lg text-red-500"></i>
                <span class="font-semibold">{{ session('error') }}</span>
                <button type="button" onclick="this.parentElement.remove()" class="ml-6 text-gray-400 hover:text-gray-600 transition-colors"><i class="bi bi-x-lg"></i></button>
            </div>
            @endif
        </div>
        @endif

        @yield('content')
    </main>

    @yield('scripts')
</body>
</html>
