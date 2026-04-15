@extends('layouts.landing')

@section('title', 'PerpusSiswa - Perpustakaan Digital Sekolah')

@section('content')

<!-- Hero Section -->
<section id="home" class="relative pt-32 pb-24 md:pt-40 md:pb-32 bg-surface overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row items-center gap-16">
            <!-- Text Content -->
            <div class="w-full lg:w-1/2 reveal">
                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-slate-100 text-slate-800 text-sm font-semibold tracking-wide mb-8">
                    <span class="w-2 h-2 rounded-full bg-slate-900"></span>
                    Platform Literasi Digital
                </div>
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-black text-slate-900 leading-[1.1] tracking-tight mb-8">
                    Tingkatkan <br />
                    <span class="text-slate-600">Literasi Digital</span><br />
                    Sekolah.
                </h1>
                <p class="text-lg md:text-xl text-slate-500 font-medium leading-relaxed max-w-lg mb-10">
                    Akses perpustakaan modern dengan ratusan koleksi buku digital. Bebas pinjam, baca PDF langsung dari perangkatmu kapan saja.
                </p>
                <div class="flex flex-wrap items-center gap-4">
                    <a href="{{ route('login') }}" class="px-8 py-4 rounded-full bg-slate-900 text-white font-bold text-lg hover:bg-slate-800 transition-all duration-300 shadow-xl shadow-slate-900/20">
                        Login Siswa
                    </a>
                    <a href="{{ route('student.dashboard') }}" class="px-8 py-4 rounded-full bg-transparent border-2 border-slate-200 text-slate-900 font-bold text-lg hover:border-slate-900 transition-all duration-300">
                        Jelajah Sebagai Tamu
                    </a>
                </div>
            </div>
            
            <!-- Image Content -->
            <div class="w-full lg:w-1/2 reveal">
                <div class="relative w-full aspect-[4/3] rounded-3xl overflow-hidden shadow-2xl">
                    <img src="https://images.unsplash.com/photo-1507842217343-583bb7270b66?q=80&w=1470&auto=format&fit=crop" alt="Perpustakaan Digital dan Deretan Buku" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/20 to-transparent"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-16 bg-white border-y border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 md:gap-16 divide-x-0 md:divide-x divide-slate-200">
            <div class="text-center md:text-left md:px-8 reveal">
                <span class="block text-5xl md:text-6xl font-black text-slate-900 tracking-tighter mb-2">500+</span>
                <span class="text-sm font-bold text-slate-500 uppercase tracking-widest">Koleksi E-Book</span>
            </div>
            <div class="text-center md:text-left md:px-8 reveal">
                <span class="block text-5xl md:text-6xl font-black text-slate-900 tracking-tighter mb-2">1.2K</span>
                <span class="text-sm font-bold text-slate-500 uppercase tracking-widest">Siswa Aktif</span>
            </div>
            <div class="text-center md:text-left md:px-8 reveal">
                <span class="block text-5xl md:text-6xl font-black text-slate-900 tracking-tighter mb-2">15+</span>
                <span class="text-sm font-bold text-slate-500 uppercase tracking-widest">Kategori</span>
            </div>
            <div class="text-center md:text-left md:px-8 reveal">
                <span class="block text-5xl md:text-6xl font-black text-slate-900 tracking-tighter mb-2">99%</span>
                <span class="text-sm font-bold text-slate-500 uppercase tracking-widest">Uptime</span>
            </div>
        </div>
    </div>
</section>

<!-- About / How It Works Section -->
<section id="how-it-works" class="py-24 md:py-32 bg-accent">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row items-center gap-20">
            <!-- Portrait Image -->
            <div class="w-full lg:w-5/12 reveal">
                <div class="relative w-full aspect-[3/4] rounded-2xl overflow-hidden shadow-2xl">
                    <img src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?q=80&w=1287&auto=format&fit=crop" alt="Student reading in a modern library" class="w-full h-full object-cover">
                </div>
            </div>
            
            <!-- Text Content -->
            <div class="w-full lg:w-7/12 reveal">
                <h2 class="text-4xl md:text-5xl font-black text-slate-900 tracking-tight leading-tight mb-8">
                    Bagaimana Kami <br/>Membantu Anda.
                </h2>
                <div class="space-y-12">
                    <div class="flex gap-6">
                        <div class="flex-shrink-0">
                            <span class="flex items-center justify-center w-14 h-14 rounded-full bg-white shadow-sm border border-slate-200 text-xl font-bold text-slate-900">1</span>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-slate-900 mb-3">Akses Mudah</h3>
                            <p class="text-slate-500 leading-relaxed text-lg">Masuk menggunakan email atau NISN yang telah diregistrasi. Semua riwayat akan terhubung dengan profil Anda.</p>
                        </div>
                    </div>
                    
                    <div class="flex gap-6">
                        <div class="flex-shrink-0">
                            <span class="flex items-center justify-center w-14 h-14 rounded-full bg-white shadow-sm border border-slate-200 text-xl font-bold text-slate-900">2</span>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-slate-900 mb-3">Eksplorasi Katalog</h3>
                            <p class="text-slate-500 leading-relaxed text-lg">Cari buku melalui kolom pencarian atau saring menggunakan kategori. Temukan literasi yang cocok untuk Anda.</p>
                        </div>
                    </div>

                    <div class="flex gap-6">
                        <div class="flex-shrink-0">
                            <span class="flex items-center justify-center w-14 h-14 rounded-full bg-slate-900 shadow-md text-xl font-bold text-white">3</span>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-slate-900 mb-3">Nikmati Bacaan</h3>
                            <p class="text-slate-500 leading-relaxed text-lg">Buku otomatis akan dipinjam, masuk ke riwayat, dan siap dibaca full-screen langsung di peramban Anda.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Catalogue / Popular Books Section -->
<section id="catalogue" class="py-24 md:py-32 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 reveal">
            <div class="max-w-2xl">
                <h2 class="text-4xl md:text-5xl font-black text-slate-900 tracking-tight leading-tight mb-4">
                    Katalog Populer
                </h2>
                <p class="text-lg text-slate-500">
                    Pilihan bacaan teratas minggu ini dari seluruh siswa.
                </p>
            </div>
            <div class="mt-8 md:mt-0">
                <a href="{{ route('student.books.index') }}" class="inline-flex items-center text-slate-900 font-bold hover:text-slate-600 transition group">
                    Lihat Semua Koleksi 
                    <i class="bi bi-arrow-right ml-2 transform group-hover:translate-x-1 transition"></i>
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($popularBooks as $book)
            <div class="group cursor-default reveal">
                <!-- Vertical Card: Image -->
                <div class="relative w-full aspect-[3/4] rounded-2xl overflow-hidden mb-6 bg-slate-100 shadow-md">
                    <img src="{{ $book->cover_url }}" alt="{{ $book->judul }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700 ease-in-out">
                    <div class="absolute inset-0 bg-slate-900/10 group-hover:bg-transparent transition-colors duration-500"></div>
                </div>
                <div>
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-2 block">Buku Populer</span>
                    <h3 class="text-xl font-bold text-slate-900 group-hover:text-slate-600 transition-colors">{{ $book->judul }}</h3>
                </div>
            </div>
            @empty
            <div class="col-span-1 sm:col-span-2 lg:col-span-4 text-center py-10">
                <p class="text-slate-500 font-medium">Buku belum tersedia.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Value Proposition Section -->
<section id="features" class="py-24 md:py-32 bg-slate-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl md:text-5xl font-black tracking-tight leading-tight mb-16 reveal">
            Fasilitas Terbaik untuk Anda.
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 max-w-5xl mx-auto">
            <div class="reveal">
                <i class="bi bi-file-earmark-pdf text-4xl text-slate-400 mb-6 block"></i>
                <h4 class="text-xl font-bold mb-4">Lingkungan Tanpa Kertas</h4>
                <p class="text-slate-400 leading-relaxed">
                    Baca buku langsung dari peramban tanpa perlu mengunduh. Akses literasi digital lebih ramah lingkungan.
                </p>
            </div>
            
            <div class="reveal">
                <i class="bi bi-phone text-4xl text-slate-400 mb-6 block"></i>
                <h4 class="text-xl font-bold mb-4">Aksesibilitas Mobile</h4>
                <p class="text-slate-400 leading-relaxed">
                    Dirancang dengan presisi untuk kenyamanan membaca via smartphone kapan saja, di mana saja.
                </p>
            </div>
            
            <div class="reveal">
                <i class="bi bi-shield-check text-4xl text-slate-400 mb-6 block"></i>
                <h4 class="text-xl font-bold mb-4">Sistem Terpusat</h4>
                <p class="text-slate-400 leading-relaxed">
                    Admin dapat memantau serta mengelola aktivitas dan inventaris dengan aman dan terorganisasi.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-24 bg-surface border-b border-slate-100">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center reveal">
        <h2 class="text-4xl md:text-5xl font-black text-slate-900 tracking-tight leading-tight mb-8">
            Siap untuk memulai perjalanan membaca yang baru?
        </h2>
        <div class="flex justify-center">
            <a href="{{ route('student.dashboard') }}" class="px-10 py-5 rounded-full bg-slate-900 text-white font-bold text-lg hover:bg-slate-800 transition-all duration-300 shadow-2xl shadow-slate-900/20">
                Mulai Sebagai Tamu
            </a>
        </div>
    </div>
</section>

@endsection
