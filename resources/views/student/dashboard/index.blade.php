@extends('layouts.student-theme')

@section('title', 'Dashboard')

@section('styles')
<style>
    /* Swiper Coverflow specific styles */
    .hero-swiper {
        width: 100%;
        padding-top: 20px;
        padding-bottom: 50px;
    }

    .swiper-slide {
        background-position: center;
        background-size: cover;
        width: 200px; /* Base width */
        height: 300px;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(15, 23, 42, 0.15); /* slate-900 shadow */
        position: relative;
    }
    
    @media (min-width: 768px) {
        .swiper-slide {
            width: 250px;
            height: 360px;
        }
    }

    .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease, filter 0.5s;
    }

    /* Blur inactive slides slightly and add overlay */
    .swiper-slide:not(.swiper-slide-active) img {
        filter: blur(2px) grayscale(10%);
        transform: scale(1.02);
    }
    .swiper-slide:not(.swiper-slide-active)::after {
        content: '';
        position: absolute;
        inset: 0;
        background: rgba(248, 250, 252, 0.4); /* slate-50 overlay */
        z-index: 10;
        pointer-events: none;
    }

    .swiper-slide-active {
        box-shadow: 0 0 30px rgba(15, 23, 42, 0.2);
        border: 2px solid #0f172a;
    }

    .swiper-slide-active img {
        filter: brightness(1.05);
    }

    /* Custom swiper pagination */
    .swiper-pagination-bullet {
        background: #cbd5e1;
        opacity: 1;
    }
    .swiper-pagination-bullet-active {
        background: #0f172a;
        box-shadow: 0 0 10px rgba(15, 23, 42, 0.3);
    }

    /* Hover effects for grid cards */
    .book-card-hover {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .book-card-hover:hover {
        transform: translateY(-5px);
        background: #ffffff;
        border-color: #cbd5e1;
        box-shadow: 0 15px 30px -5px rgba(15, 23, 42, 0.1);
    }
    
    .book-card-hover img {
        transition: transform 0.4s ease;
    }
    .book-card-hover:hover img {
        transform: scale(1.05);
    }

    /* Title styling */
    .section-title {
        color: #0f172a;
        font-weight: 800;
        letter-spacing: -0.02em;
    }
</style>
@endsection

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Header Summary Section -->
    <div class="mb-12 pl-4 lg:pl-0 flex flex-col md:flex-row md:items-end justify-between">
        <div>
            <p class="text-slate-500 text-sm font-bold uppercase tracking-widest mb-2">Dashboard Koleksi</p>
            <h1 class="text-4xl md:text-5xl font-black text-slate-900 tracking-tight">Selamat Datang, <span class="text-slate-600">{{ explode(' ', auth()->user()->name)[0] }}</span></h1>
        </div>
        <div class="mt-4 md:mt-0 flex gap-4">
            <div class="glass-panel px-6 py-3 rounded-2xl flex items-center gap-4">
                <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-900">
                    <i class="bi bi-book text-xl"></i>
                </div>
                <div>
                    <p class="text-xs text-slate-500 uppercase tracking-widest font-bold">Total Buku</p>
                    <p class="text-2xl font-black text-slate-900 leading-none mt-1">{{ $totalBooks ?? 0 }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Hero Section / Top Carousel (Cover Flow) -->
    <div class="mb-16 relative overflow-hidden rounded-[2rem] glass-panel p-8 pb-4">
        <h2 class="section-title text-2xl mb-2 flex items-center">
            Pilihan Teratas Minggu Ini <i class="bi bi-stars text-slate-400 ml-3"></i>
        </h2>
        <p class="text-slate-500 font-medium mb-6">Buku yang paling banyak direkomendasikan untuk Anda.</p>
        
        <!-- Swiper -->
        <div class="swiper hero-swiper">
            <div class="swiper-wrapper">
                @forelse($recentBooks as $book)
                <div class="swiper-slide cursor-pointer group rounded-2xl" onclick="window.location.href='{{ route('student.books.show', $book->id) }}'">
                    <img src="{{ $book->cover_url }}" alt="{{ $book->judul }}" class="rounded-2xl relative z-0">
                    
                    <!-- Title Overlay when active -->
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-slate-900 via-slate-900/80 to-transparent p-5 opacity-0 group-[.swiper-slide-active]:opacity-100 transition-opacity duration-300 z-20 flex flex-col justify-end">
                        <h3 class="text-white font-bold text-base truncate">{{ $book->judul }}</h3>
                        <p class="text-slate-300 text-sm truncate font-medium">{{ $book->penulis }}</p>
                    </div>
                </div>
                @empty
                <div class="swiper-slide"><div class="w-full h-full bg-slate-200 flex items-center justify-center rounded-2xl"><span class="text-slate-500 font-semibold">Tunggu Buku Baru</span></div></div>
                @endforelse
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <!-- Grid Content: 2 Columns -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
        
        <!-- Left Column: Featured/Best Book -->
        <div class="xl:col-span-1">
            <h2 class="section-title text-3xl mb-8">Buku Unggulan</h2>
            
            @php 
                $featuredBook = $recentBooks->first(); 
            @endphp

            @if($featuredBook)
            <div class="glass-panel p-8 rounded-[2rem] relative flex flex-col h-full bg-white border border-slate-200 group">
                <!-- Highlight Indicator -->
                <div class="absolute top-0 right-8 w-16 h-1 bg-slate-900 rounded-b-lg"></div>
                
                <div class="flex justify-center mb-8 mt-2">
                    <div class="relative w-56 h-72 rounded-2xl overflow-hidden shadow-2xl border border-slate-100 group-hover:-translate-y-2 transition-transform duration-500">
                        <img src="{{ $featuredBook->cover_url }}" alt="{{ $featuredBook->judul }}" class="w-full h-full object-cover">
                    </div>
                </div>
                
                <div class="flex flex-col flex-grow text-center">
                    <div class="flex items-center justify-center gap-2 mx-auto mb-4">
                        <span class="px-4 py-1.5 bg-slate-100 text-slate-800 text-xs font-bold uppercase tracking-wider rounded-full border border-slate-200">
                            Pilihan Utama
                        </span>
                    </div>
                    <h3 class="text-slate-900 font-extrabold text-2xl mb-2 leading-tight">{{ $featuredBook->judul }}</h3>
                    <p class="text-slate-500 font-medium text-sm mb-4">{{ $featuredBook->penulis }}</p>
                    
                    <!-- Dummy Rating -->
                    <div class="flex items-center justify-center gap-1 mb-6">
                        <i class="bi bi-star-fill text-slate-800 text-sm"></i>
                        <i class="bi bi-star-fill text-slate-800 text-sm"></i>
                        <i class="bi bi-star-fill text-slate-800 text-sm"></i>
                        <i class="bi bi-star-fill text-slate-800 text-sm"></i>
                        <i class="bi bi-star-half text-slate-800 text-sm"></i>
                        <span class="text-slate-500 font-semibold text-xs ml-2">(4.8)</span>
                    </div>

                    <p class="text-slate-600 leading-relaxed text-sm mb-8 flex-grow line-clamp-3">
                        Dapatkan wawasan baru dan perluas pengetahuanmu dengan menjadikan buku ini sebagai bacaan utama di minggu ini.
                    </p>

                    <a href="{{ route('student.books.show', $featuredBook->id) }}" class="mt-auto w-full py-4 bg-slate-900 hover:bg-slate-800 text-white font-bold rounded-2xl shadow-lg shadow-slate-900/20 transition-all hover:scale-[1.02] active:scale-95">
                        Lihat Selengkapnya
                    </a>
                </div>
            </div>
            @endif
        </div>

        <!-- Right Column: Popular Books Grid -->
        <div class="xl:col-span-2">
            <div class="flex items-center justify-between mb-8">
                <h2 class="section-title text-3xl">Buku Populer</h2>
                <a href="{{ route('student.books.index') }}" class="text-sm font-bold text-slate-600 hover:text-slate-900 transition-colors group">
                    Semua Koleksi <i class="bi bi-arrow-right ml-1 transform group-hover:translate-x-1 transition-transform inline-block"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-6">
                @forelse($popularBooks as $book)
                <div class="glass-panel book-card-hover rounded-[1.5rem] p-5 cursor-pointer flex items-center gap-5 bg-white" onclick="window.location.href='{{ route('student.books.show', $book->id) }}'">
                    <div class="w-24 h-32 flex-shrink-0 rounded-xl overflow-hidden border border-slate-100 shadow-md relative">
                        <img src="{{ $book->cover_url }}" alt="{{ $book->judul }}" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1 min-w-0">
                        <h4 class="text-slate-900 font-bold text-lg mb-1 truncate">{{ $book->judul }}</h4>
                        <p class="text-slate-500 font-medium text-sm mb-3 truncate">{{ $book->penulis }}</p>
                        
                        <div class="flex items-center gap-3">
                            <span class="flex items-center text-xs font-bold text-slate-600 bg-slate-100 px-2.5 py-1.5 rounded-lg border border-slate-200">
                                <i class="bi bi-eye mr-2"></i> {{ $book->jumlah_dibaca ?? max(12, rand(10,50)) }}
                            </span>
                            @if($book->kategori)
                            <span class="text-xs font-bold text-slate-500 px-2.5 py-1.5 rounded-lg border border-slate-200 truncate max-w-[100px]">
                                {{ $book->kategori->nama }}
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-1 sm:col-span-2 glass-panel p-10 rounded-[2rem] text-center bg-white border border-slate-200">
                    <i class="bi bi-journal-x text-5xl text-slate-300 mb-4 block"></i>
                    <p class="text-slate-500 font-medium">Belum ada koleksi yang populer saat ini.</p>
                </div>
                @endforelse
            </div>
            
            <!-- Optional: Activity snippet if exists -->
            @if(isset($recentReadings) && $recentReadings->count() > 0)
            <h2 class="section-title text-2xl mb-6 mt-12">Lanjut Membaca</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($recentReadings->take(2) as $reading)
                <div class="glass-panel border-l-4 border-l-slate-900 bg-white p-5 rounded-[1.5rem] shadow-sm flex items-center justify-between group cursor-pointer hover:shadow-md transition-all">
                    <div class="flex items-center gap-4 w-3/4">
                        <div class="w-14 h-14 bg-slate-100 rounded-xl overflow-hidden flex-shrink-0 relative border border-slate-200">
                             <img src="{{ $reading->book->cover_url }}" class="w-full h-full object-cover">
                             <div class="absolute inset-0 flex items-center justify-center bg-slate-900/10 group-hover:bg-slate-900/30 transition-colors"><i class="bi bi-play-fill text-white opacity-0 group-hover:opacity-100 transition-opacity"></i></div>
                        </div>
                        <div class="min-w-0">
                            <h4 class="text-slate-900 font-bold text-base truncate">{{ $reading->book->judul }}</h4>
                            <p class="text-slate-500 font-medium text-xs mt-1">Terakhir dibaca: {{ $reading->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    <a href="{{ route('student.books.read', $reading->book->id) }}" class="text-slate-400 group-hover:text-slate-900 p-2 rounded-xl bg-slate-50 group-hover:bg-slate-100 transition-colors border border-slate-100">
                        <i class="bi bi-arrow-right text-xl"></i>
                    </a>
                </div>
                @endforeach
            </div>
            @endif

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize Swiper Coverflow
        const swiper = new Swiper('.hero-swiper', {
            effect: 'coverflow',
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: 'auto',
            initialSlide: 1, // Start on the second slide
            coverflowEffect: {
                rotate: 15, // Rotate effect
                stretch: -10, // Stretch space between slides
                depth: 100, // Depth
                modifier: 1, // Effect multiplier
                slideShadows: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            keyboard: {
                enabled: true,
            },
            autoplay: {
                delay: 4500,
                disableOnInteraction: false,
            },
        });
    });
</script>
@endsection
