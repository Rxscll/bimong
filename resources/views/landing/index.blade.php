@extends('layouts.landing')

@section('title', 'BacaKita - Perpustakaan Digital Sekolah')

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
                        Login
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
                            <p class="text-slate-500 leading-relaxed text-lg">Masuk menggunakan email atau akun yang telah diregistrasi. Semua riwayat akan terhubung dengan profil Anda.</p>
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
                            <p class="text-slate-500 leading-relaxed text-lg">Buku otomatis akan terbuka, masuk ke riwayat, dan siap dibaca langsung di perangkat Anda.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== BUKU UNGGULAN SECTION (hanya muncul jika ada buku dengan rating tinggi) ===== -->
@if($featuredBooks->isNotEmpty())
<section id="featured" class="py-24 md:py-32 bg-gradient-to-br from-amber-50 via-orange-50 to-amber-100 relative overflow-hidden">
    <!-- Decorative background elements -->
    <div class="absolute top-0 left-0 w-72 h-72 bg-amber-200/40 rounded-full -translate-x-1/2 -translate-y-1/2 blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-orange-200/40 rounded-full translate-x-1/3 translate-y-1/3 blur-3xl pointer-events-none"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 reveal">
            <div class="max-w-2xl">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-amber-400/20 border border-amber-300/50 text-amber-800 text-sm font-bold tracking-wide mb-6">
                    <svg class="w-4 h-4 fill-amber-500" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    Buku Unggulan
                </div>
                <h2 class="text-4xl md:text-5xl font-black text-slate-900 tracking-tight leading-tight mb-4">
                    Pilihan Terbaik<br/>
                    <span class="text-amber-600">Berdasarkan Rating</span>
                </h2>
                <p class="text-lg text-slate-600">
                    Buku-buku dengan penilaian tertinggi dari komunitas pembaca BacaKita.
                </p>
            </div>
            <div class="mt-8 md:mt-0">
                <a href="{{ route('student.books.index') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-amber-500 hover:bg-amber-600 text-white font-bold transition-all duration-300 shadow-lg shadow-amber-500/30 hover:shadow-xl hover:shadow-amber-500/40 hover:-translate-y-0.5">
                    Jelajah Semua
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- Featured Books Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($featuredBooks as $book)
            <div class="group reveal">
                <div class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-amber-100/80">
                    <!-- Book Cover -->
                    <div class="relative w-full aspect-[3/4] overflow-hidden bg-slate-100">
                        <img src="{{ $book->cover_url }}" alt="{{ $book->judul }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700 ease-in-out">
                        <!-- Overlay gradient -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <!-- Rating badge on top -->
                        <div class="absolute top-3 right-3">
                            <div class="flex items-center gap-1 px-2.5 py-1 rounded-full bg-amber-400 text-slate-900 text-xs font-black shadow-lg">
                                <svg class="w-3 h-3 fill-current" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                {{ number_format($book->ratings_avg_rating, 1) }}
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="p-4">
                        <span class="text-xs font-bold text-amber-600 uppercase tracking-widest mb-1 block">
                            {{ $book->category->nama ?? 'Umum' }}
                        </span>
                        <h3 class="text-base font-bold text-slate-900 leading-snug mb-2 line-clamp-2">{{ $book->judul }}</h3>
                        <p class="text-sm text-slate-500 mb-3">{{ $book->penulis }}</p>
                        <!-- Star Rating Row -->
                        <div class="flex items-center gap-2">
                            <div class="flex items-center gap-0.5">
                                @php $avg = $book->ratings_avg_rating; @endphp
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= floor($avg))
                                        <svg class="w-3.5 h-3.5 fill-amber-400" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                    @elseif($i - $avg < 1 && $i - $avg > 0)
                                        <svg class="w-3.5 h-3.5 fill-amber-200" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                    @else
                                        <svg class="w-3.5 h-3.5 fill-slate-200" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                    @endif
                                @endfor
                            </div>
                            <span class="text-xs text-slate-400 font-medium">({{ $book->ratings_count }} ulasan)</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- ===== BUKU POPULER SECTION ===== -->
<section id="catalogue" class="py-24 md:py-32 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 reveal">
            <div class="max-w-2xl">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-slate-100 border border-slate-200 text-slate-700 text-sm font-bold tracking-wide mb-6">
                    <svg class="w-4 h-4 text-slate-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    Buku Populer
                </div>
                <h2 class="text-4xl md:text-5xl font-black text-slate-900 tracking-tight leading-tight mb-4">
                    Paling Banyak<br/>
                    <span class="text-slate-500">Dibaca Siswa</span>
                </h2>
                <p class="text-lg text-slate-500">
                    Buku-buku yang paling sering dibuka dan dibaca oleh seluruh siswa.
                </p>
            </div>
            <div class="mt-8 md:mt-0">
                <a href="{{ route('student.books.index') }}" class="inline-flex items-center text-slate-900 font-bold hover:text-slate-600 transition group">
                    Lihat Semua Koleksi
                    <i class="bi bi-arrow-right ml-2 transform group-hover:translate-x-1 transition"></i>
                </a>
            </div>
        </div>

        <!-- Popular Books Grid (2 rows x 4 cols) -->
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6 md:gap-8">
            @forelse($popularBooks as $index => $book)
            <div class="group cursor-default reveal">
                <!-- Vertical Card -->
                <div class="relative w-full aspect-[3/4] rounded-2xl overflow-hidden mb-4 bg-slate-100 shadow-sm hover:shadow-xl transition-all duration-500 hover:-translate-y-1">
                    <img src="{{ $book->cover_url }}" alt="{{ $book->judul }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700 ease-in-out">
                    <!-- Hover Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/70 via-slate-900/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <!-- Rank Badge -->
                    <div class="absolute top-3 left-3">
                        <span class="flex items-center justify-center w-7 h-7 rounded-full bg-slate-900/80 backdrop-blur-sm text-white text-xs font-black">
                            #{{ $index + 1 }}
                        </span>
                    </div>
                    <!-- Read count on hover -->
                    <div class="absolute bottom-3 left-3 right-3 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        <div class="flex items-center gap-1.5 text-white/90 text-xs font-semibold">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                            {{ number_format($book->jumlah_dibaca) }}x dibaca
                        </div>
                    </div>
                </div>
                <!-- Card Info -->
                <div>
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1 block">
                        {{ $book->category->nama ?? 'Umum' }}
                    </span>
                    <h3 class="text-sm md:text-base font-bold text-slate-900 group-hover:text-slate-600 transition-colors leading-snug line-clamp-2">
                        {{ $book->judul }}
                    </h3>
                    <p class="text-xs text-slate-400 mt-1">{{ $book->penulis }}</p>
                </div>
            </div>
            @empty
            <div class="col-span-2 sm:col-span-3 lg:col-span-4 text-center py-10">
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
