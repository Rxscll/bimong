@extends('layouts.student-theme')

@section('title', 'Buku Favorit')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Header -->
    <div class="mb-12 pl-4 lg:pl-0">
        <p class="text-slate-500 text-sm font-bold tracking-widest uppercase mb-2">Koleksi Pribadi</p>
        <h1 class="text-4xl md:text-5xl font-black text-slate-900 tracking-tight">Buku <span class="text-slate-500">Favorit</span></h1>
        <p class="text-slate-600 font-medium mt-3 text-lg">Kumpulan buku yang telah Anda tandai sebagai favorit.</p>
    </div>

    <!-- Favorites Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
        @forelse($favorites as $favorite)
            <div class="glass-panel glass-panel-hover rounded-[1.5rem] overflow-hidden flex flex-col group bg-white border border-slate-200">
                <!-- Cover Image -->
                <div class="relative h-72 overflow-hidden bg-slate-100 border-b border-slate-100">
                    <img src="{{ $favorite->book->cover_url }}" alt="{{ $favorite->book->judul }}" 
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"></div>
                    
                    <!-- Favorite Badge -->
                    <div class="absolute top-4 left-4 z-10">
                        <span class="w-10 h-10 bg-white/90 text-rose-500 border border-slate-200 rounded-full shadow-md backdrop-blur-md flex items-center justify-center pointer-events-none">
                            <i class="bi bi-heart-fill text-lg"></i>
                        </span>
                    </div>

                    @if($favorite->book->file_pdf)
                        <div class="absolute top-4 right-4">
                            <span class="px-3 py-1.5 bg-slate-900/90 text-white text-xs font-bold uppercase tracking-wider rounded-lg shadow-md backdrop-blur-md">
                                <i class="bi bi-file-pdf mr-1 text-slate-300"></i> PDF
                            </span>
                        </div>
                    @endif
                </div>

                <!-- Book Info -->
                <div class="p-6 flex flex-col flex-grow relative z-10 bg-white">
                    <div class="mb-3">
                        <span class="px-2.5 py-1 bg-slate-100 text-slate-600 text-[10px] font-bold uppercase tracking-wider rounded border border-slate-200">
                            {{ $favorite->book->category->nama ?? 'Tak Berkategori' }}
                        </span>
                    </div>
                    
                    <h3 class="font-bold text-slate-900 text-xl mb-1.5 leading-tight line-clamp-2 truncate" title="{{ $favorite->book->judul }}">{{ $favorite->book->judul }}</h3>
                    <p class="text-sm font-medium text-slate-500 mb-4">{{ $favorite->book->penulis }} <span class="mx-1 font-normal">•</span> {{ $favorite->book->tahun_terbit }}</p>

                    <!-- Stats -->
                    <div class="flex items-center text-xs font-bold text-slate-400 mb-6 gap-4">
                        <span class="flex items-center gap-1.5 bg-slate-50 px-2 py-1 rounded-md border border-slate-100">
                            <i class="bi bi-eye-fill text-slate-300"></i>
                            {{ $favorite->book->jumlah_dibaca ?? 0 }}
                        </span>
                        <span class="flex items-center gap-1.5 text-slate-400">
                            <i class="bi bi-hash"></i>
                            {{ $favorite->book->kode_buku }}
                        </span>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-3 mt-auto">
                        <a href="{{ route('student.books.show', $favorite->book->id) }}" 
                           class="flex-[0.5] flex items-center justify-center p-3.5 bg-slate-50 text-slate-600 font-bold border border-slate-200 rounded-xl hover:bg-slate-100 hover:text-slate-900 transition-all tooltip" title="Detail">
                            <i class="bi bi-info-circle text-lg"></i>
                        </a>
                        
                        @if($favorite->book->file_pdf)
                            <a href="{{ route('student.books.read', $favorite->book->id) }}" 
                               class="flex-1 flex items-center justify-center gap-2 px-4 py-3.5 bg-slate-900 text-white rounded-xl hover:bg-slate-800 shadow-md shadow-slate-900/10 transition-all font-bold text-sm">
                                <i class="bi bi-book mr-1"></i>
                                Membaca
                            </a>
                        @else
                            <button disabled 
                                    class="flex-1 flex items-center justify-center gap-2 px-4 py-3.5 bg-slate-100 border border-slate-200 text-slate-400 rounded-xl cursor-not-allowed font-bold text-[11px] sm:text-xs p-1 line-clamp-1">
                                <i class="bi bi-lock-fill mr-1"></i>
                                Belum Bisa Dibaca
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full glass-panel rounded-[2rem] flex flex-col items-center justify-center py-20 text-center bg-white">
                <div class="w-24 h-24 bg-slate-50 border border-slate-100 rounded-full flex items-center justify-center mb-6 shadow-sm">
                    <i class="bi bi-heart text-5xl text-rose-300 block"></i>
                </div>
                <h3 class="text-2xl font-black text-slate-900 mb-2">Belum ada buku favorit</h3>
                <p class="text-slate-500 font-medium text-lg">Temukan bacaan kesukaan Anda di katalog utama.</p>
                <a href="{{ route('student.books.index') }}" class="mt-8 bg-slate-900 text-white font-bold px-8 py-4 rounded-full shadow-lg shadow-slate-900/20 hover:bg-slate-800 transition-all">Lihat Katalog</a>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($favorites->hasPages())
        <div class="mt-12 flex justify-center pb-12 user-pagination">
            {{ $favorites->links() }}
        </div>
    @endif
</div>
@endsection
