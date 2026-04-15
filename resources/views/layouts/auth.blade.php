<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Auth') - PerpusSiswa</title>
    
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
</head>

<body class="bg-surface font-sans text-slate-900 antialiased overflow-x-hidden min-h-screen flex">
    
    <!-- Left Visual / Brand Side -->
    <div class="hidden lg:flex lg:w-1/2 relative bg-slate-900 border-r border-slate-200 shadow-2xl">
        <img src="https://images.unsplash.com/photo-1541339907198-e08756dedf3f?q=80&w=1470&auto=format&fit=crop" alt="Library Background" class="absolute inset-0 w-full h-full object-cover mix-blend-overlay opacity-30">
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 to-transparent"></div>
        
        <div class="relative z-10 p-16 flex flex-col justify-between h-full w-full">
            <a href="{{ url('/') }}" class="text-3xl font-extrabold tracking-tight text-white flex items-center">
                <i class="bi bi-book-half mr-3"></i> PerpusSiswa
            </a>
            
            <div class="mb-12">
                <h1 class="text-5xl font-black text-white leading-tight tracking-tight mb-6">
                    Akses Dunia Literasi <br /> Tanpa Batas.
                </h1>
                <p class="text-lg text-slate-300 max-w-md leading-relaxed">
                    Masuk ke platform perpustakaan modern Anda untuk menjelajahi koleksi digital terbaik dan memantau aktivitas literasi dengan mudah.
                </p>
                <div class="mt-8 flex items-center gap-6">
                    <div class="flex flex-col">
                        <span class="text-3xl font-bold text-white">500+</span>
                        <span class="text-sm font-semibold text-slate-400 uppercase tracking-wider">E-Books</span>
                    </div>
                    <div class="w-px h-10 bg-slate-700"></div>
                    <div class="flex flex-col">
                        <span class="text-3xl font-bold text-white">24/7</span>
                        <span class="text-sm font-semibold text-slate-400 uppercase tracking-wider">Akses</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Form Side -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 sm:p-12 lg:p-24 bg-white relative">
        <a href="{{ url('/') }}" class="lg:hidden absolute top-8 left-8 text-2xl font-black text-slate-900 flex items-center tracking-tight">
            <i class="bi bi-book-half mr-2"></i> PerpusSiswa
        </a>

        <div class="w-full max-w-md relative z-10">
            @yield('content')
        </div>
    </div>

</body>
</html>