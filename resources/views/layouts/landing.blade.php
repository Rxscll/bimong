<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PerpusSiswa - Perpustakaan Digital Sekolah')</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Bootstrap Icons for icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        surface: '#FFFFFF',
                        accent: '#F8F9FA',
                        slate: {
                            50: '#f8fafc',
                            100: '#f1f5f9',
                            400: '#94a3b8',
                            600: '#475569',
                            800: '#1e293b',
                            900: '#0f172a',
                        }
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #FFFFFF;
            color: #0f172a;
            -webkit-font-smoothing: antialiased;
        }

        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>

<body class="bg-surface text-slate-900">
    <!-- Navbar -->
    <nav id="navbar" class="fixed w-full z-50 transition-all duration-300 py-6 px-4 md:px-8 bg-white/80 backdrop-blur-md border-b border-gray-100">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-2xl font-extrabold tracking-tight text-slate-900 flex items-center">
                <i class="bi bi-book-half mr-3"></i> PerpusSiswa
            </a>
            
            <div class="hidden md:flex space-x-8 items-center">
                <a href="#home" class="nav-link text-sm font-semibold text-slate-500 hover:text-slate-900 transition">Beranda</a>
                <a href="#features" class="nav-link text-sm font-semibold text-slate-500 hover:text-slate-900 transition">Fitur</a>
                <a href="#catalogue" class="nav-link text-sm font-semibold text-slate-500 hover:text-slate-900 transition">Katalog</a>
            </div>

            <div class="hidden md:flex space-x-6 items-center">
                <a href="{{ route('student.dashboard') }}" class="text-sm font-semibold text-slate-900 hover:text-slate-600 transition">Akses Tamu</a>
                <a href="{{ route('login') }}" class="px-6 py-2.5 rounded-full bg-slate-900 text-white text-sm font-semibold hover:bg-slate-800 transition shadow-sm">Login Siswa</a>
            </div>

            <!-- Mobile menu button -->
            <button class="md:hidden text-slate-900 focus:outline-none">
                <i class="bi bi-list text-2xl"></i>
            </button>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-surface border-t border-accent py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-12">
            <div class="col-span-1 md:col-span-1">
                <a href="#" class="text-xl font-extrabold tracking-tight text-slate-900 mb-4 block">PerpusSiswa</a>
                <p class="text-sm text-slate-500 leading-relaxed">
                    Sistem manajemen perpustakaan modern, dirancang untuk memudahkan literasi ekosistem pendidikan sekolah.
                </p>
            </div>
            
            <div>
                <h4 class="text-sm font-bold text-slate-900 uppercase tracking-widest mb-4">Navigasi</h4>
                <ul class="space-y-3">
                    <li><a href="#home" class="text-sm text-slate-500 hover:text-slate-900">Beranda</a></li>
                    <li><a href="#features" class="text-sm text-slate-500 hover:text-slate-900">Fitur Kami</a></li>
                    <li><a href="#catalogue" class="text-sm text-slate-500 hover:text-slate-900">Katalog Buku</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-sm font-bold text-slate-900 uppercase tracking-widest mb-4">Dukungan</h4>
                <ul class="space-y-3">
                    <li><a href="#" class="text-sm text-slate-500 hover:text-slate-900">Pusat Bantuan</a></li>
                    <li><a href="#" class="text-sm text-slate-500 hover:text-slate-900">Syarat Ketentuan</a></li>
                    <li><a href="#" class="text-sm text-slate-500 hover:text-slate-900">Kebijakan Privasi</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-sm font-bold text-slate-900 uppercase tracking-widest mb-4">Kontak</h4>
                <div class="space-y-2 text-sm text-slate-500">
                    <p>Jl. Edukasi No. 42</p>
                    <p>hello@sekolah.sch.id</p>
                    <p>(021) 1234567</p>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto mt-16 pt-8 border-t border-accent text-center text-sm text-slate-400">
            &copy; {{ date('Y') }} PerpusSiswa Digital Literacy. All rights reserved.
        </div>
    </footer>

    <script>
        // Scroll Reveal
        const observerOptions = {
            threshold: 0.1
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.reveal').forEach((el) => {
            observer.observe(el);
        });

        // Navbar Scroll
        window.addEventListener('scroll', () => {
            const nav = document.getElementById('navbar');
            if (window.scrollY > 20) {
                nav.classList.add('py-4', 'shadow-sm');
                nav.classList.remove('py-6');
            } else {
                nav.classList.remove('py-4', 'shadow-sm');
                nav.classList.add('py-6');
            }
        });
    </script>
</body>
</html>
