@extends('layouts.student-theme')

@section('title', 'Katalog Buku')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Header -->
    <div class="mb-12 pl-4 lg:pl-0">
        <p class="text-slate-500 text-sm font-bold tracking-widest uppercase mb-2">Eksplorasi</p>
        <h1 class="text-4xl md:text-5xl font-black text-slate-900 tracking-tight">Katalog <span class="text-slate-500">Buku Digital</span></h1>
        <p class="text-slate-600 font-medium mt-3 text-lg">Jelajahi lanskap pustaka digital perpustakaan kami.</p>
    </div>

    <!-- Search and Filter -->
    <div class="glass-panel rounded-[2rem] p-6 mb-12 bg-white">
        <form method="GET" class="flex flex-col md:flex-row gap-5">
            <div class="flex-1 relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <i class="bi bi-search text-slate-400"></i>
                </div>
                <input type="text" name="search" value="{{ request('search') }}" 
                       placeholder="Cari preferensi judul atau penulis..." 
                       class="w-full pl-11 pr-5 py-4 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-slate-900 focus:border-slate-900 text-slate-900 placeholder-slate-400 font-medium transition-all shadow-sm">
            </div>
            <div class="md:w-72 relative">
                <select name="category_id" 
                        class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-slate-900 focus:border-slate-900 text-slate-900 font-medium transition-all appearance-none cursor-pointer shadow-sm">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                    <i class="bi bi-chevron-down text-slate-400"></i>
                </div>
            </div>
            <button type="submit" 
                    class="bg-slate-900 hover:bg-slate-800 text-white px-8 py-4 rounded-xl shadow-lg shadow-slate-900/20 hover:shadow-slate-900/40 transition-all font-bold flex items-center justify-center gap-2">
                Temukan Buku
            </button>
        </form>
    </div>

    <!-- Books Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
        @forelse($books as $book)
            <div class="glass-panel glass-panel-hover rounded-[1.5rem] overflow-hidden flex flex-col group bg-white border border-slate-200">
                <!-- Cover Image -->
                <a href="{{ route('student.books.show', $book->id) }}" class="relative h-72 overflow-hidden bg-slate-100 border-b border-slate-100 block">
                    <img src="{{ $book->cover_url }}" alt="{{ $book->judul }}" 
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    
                    <!-- Gradient overlay on hover for better visibility -->
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"></div>
                    
                    @if($book->file_pdf)
                        <div class="absolute top-4 right-4">
                            <span class="px-3 py-1.5 bg-slate-900/90 text-white text-xs font-bold uppercase tracking-wider rounded-lg shadow-md backdrop-blur-md">
                                <i class="bi bi-file-pdf mr-1 text-slate-300"></i> PDF
                            </span>
                        </div>
                    @else
                        <div class="absolute top-4 right-4 z-10">
                            <span class="px-3 py-1.5 bg-white/90 text-slate-600 border border-slate-200 text-xs font-bold uppercase tracking-wider rounded-lg shadow-md backdrop-blur-md">
                                PDF Tidak Tersedia
                            </span>
                        </div>
                    @endif
                    
                    <!-- Quick action on hover -->
                    <div class="absolute inset-x-0 bottom-0 p-4 opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-y-4 group-hover:translate-y-0 text-center">
                        <span class="text-white font-bold text-sm bg-white/20 backdrop-blur-md px-4 py-2 rounded-xl border border-white/30 inline-block pointer-events-none shadow-lg">Lihat Detail</span>
                    </div>
                </a>

                <!-- Book Info -->
                <div class="p-6 flex flex-col flex-grow relative z-10 bg-white">
                    <div class="mb-3">
                        <span class="px-2.5 py-1 bg-slate-100 text-slate-600 text-[10px] font-bold uppercase tracking-wider rounded border border-slate-200">
                            {{ $book->category->name ?? 'Tak Berkategori' }}
                        </span>
                    </div>
                    
                    <h3 class="font-bold text-slate-900 text-xl mb-1.5 leading-tight line-clamp-2 truncate" title="{{ $book->judul }}">{{ $book->judul }}</h3>
                    <p class="text-sm font-medium text-slate-500 mb-4">{{ $book->penulis }} <span class="mx-1 font-normal">•</span> {{ $book->tahun_terbit }}</p>
                    
                    <!-- Stats -->
                    <div class="flex items-center flex-wrap text-xs font-bold text-slate-400 mb-6 gap-3">
                        <span class="flex items-center gap-1.5 bg-amber-50 text-amber-600 px-2 py-1 rounded-md border border-amber-200" title="Rating Rata-Rata">
                            <i class="bi bi-star-fill drop-shadow-sm"></i>
                            {{ $book->averageRating }}
                        </span>
                        <span class="flex items-center gap-1.5 bg-slate-50 px-2 py-1 rounded-md border border-slate-100" title="Total Dibaca">
                            <i class="bi bi-eye-fill text-slate-300"></i>
                            {{ $book->jumlah_dibaca ?? 0 }}
                        </span>
                        <span class="flex items-center gap-1.5 text-slate-400">
                            <i class="bi bi-hash"></i>
                            {{ $book->kode_buku }}
                        </span>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-3 mt-auto">
                        <a href="{{ route('student.books.show', $book->id) }}" 
                           class="flex-[0.5] flex items-center justify-center p-3.5 bg-slate-50 text-slate-600 font-bold border border-slate-200 rounded-xl hover:bg-slate-100 hover:text-slate-900 transition-all tooltip" title="Detail">
                            <i class="bi bi-info-circle text-lg"></i>
                        </a>
                        
                        @if($book->file_pdf)
                            <a href="{{ route('student.books.read', $book->id) }}" 
                               class="flex-1 flex items-center justify-center gap-2 px-4 py-3.5 bg-slate-900 text-white rounded-xl hover:bg-slate-800 shadow-md shadow-slate-900/10 transition-all font-bold">
                                <i class="bi bi-book mr-1"></i>
                                Membaca
                            </a>
                        @else
                            <button disabled 
                                    class="flex-1 flex items-center justify-center gap-2 px-4 py-3.5 bg-slate-100 border border-slate-200 text-slate-400 rounded-xl cursor-not-allowed font-bold text-[11px] sm:text-xs text-center line-clamp-1 p-1">
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
                    <i class="bi bi-journal-x text-5xl text-slate-300 block"></i>
                </div>
                <h3 class="text-2xl font-black text-slate-900 mb-2">Tiada Hasil Ditemukan</h3>
                <p class="text-slate-500 font-medium text-lg">Coba ganti filter atau ejaan pencarian Anda.</p>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($books->hasPages())
        <div class="mt-12 flex justify-center pb-12 user-pagination">
            {{ $books->links() }}
        </div>
    @endif
</div>
@endsection