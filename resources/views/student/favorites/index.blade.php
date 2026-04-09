@extends('layouts.student')

@section('title', 'Buku Favorit')

@section('content')
<div class="container-fluid p-6">
    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Buku Favorit</h1>
        <p class="text-gray-600 mt-1">Koleksi buku favorit Anda</p>
    </div>

    <!-- Favorites Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @forelse($favorites as $favorite)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                <!-- Cover Image -->
                <div class="relative h-48 bg-gray-100">
                    <img src="{{ $favorite->book->cover_url }}" alt="{{ $favorite->book->judul }}" 
                         class="w-full h-full object-cover">
                    <div class="absolute top-2 right-2">
                        <span class="px-2 py-1 bg-red-600 text-white text-xs font-semibold rounded-full">
                            <i class="bi bi-heart-fill mr-1"></i>Favorit
                        </span>
                    </div>
                </div>

                <!-- Book Info -->
                <div class="p-4">
                    <div class="mb-2">
                        <span class="px-2 py-1 bg-green-100 text-green-800 text-xs font-semibold rounded-full">
                            {{ $favorite->book->category->nama }}
                        </span>
                    </div>
                    
                    <h3 class="font-semibold text-gray-900 mb-1 line-clamp-2">{{ $favorite->book->judul }}</h3>
                    <p class="text-sm text-gray-600 mb-1">{{ $favorite->book->penulis }}</p>
                    <p class="text-xs text-gray-500 mb-3">{{ $favorite->book->tahun_terbit }}</p>
                    
                    <!-- Description -->
                    @if($favorite->book->deskripsi)
                        <p class="text-sm text-gray-700 mb-4 line-clamp-3">{{ $favorite->book->deskripsi }}</p>
                    @endif

                    <!-- Stats -->
                    <div class="flex items-center justify-between text-sm text-gray-600 mb-4">
                        <span class="flex items-center">
                            <i class="bi bi-eye mr-1"></i>
                            {{ $favorite->book->jumlah_dibaca }} dibaca
                        </span>
                        <span class="flex items-center">
                            <i class="bi bi-book mr-1"></i>
                            {{ $favorite->book->kode_buku }}
                        </span>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-2">
                        <a href="{{ route('student.books.show', $favorite->book->id) }}" 
                           class="flex-1 text-center px-3 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors text-sm font-medium">
                            <i class="bi bi-eye mr-1"></i>
                            Detail
                        </a>
                        
                        @if($favorite->book->file_pdf)
                            <a href="{{ route('student.books.read', $favorite->book->id) }}" 
                               class="flex-1 text-center px-3 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm font-medium">
                                <i class="bi bi-book mr-1"></i>
                                Baca
                            </a>
                        @else
                            <button disabled 
                                    class="flex-1 text-center px-3 py-2 bg-gray-300 text-gray-500 rounded-lg text-sm font-medium cursor-not-allowed">
                                <i class="bi bi-x-circle mr-1"></i>
                                Tidak Ada
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12">
                <i class="bi bi-heart text-6xl text-gray-300 mb-4 block"></i>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada buku favorit</h3>
                <p class="text-gray-600">Tambahkan buku ke favorit untuk akses cepat</p>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($favorites->hasPages())
        <div class="mt-8 flex justify-center">
            {{ $favorites->links() }}
        </div>
    @endif
</div>

<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endsection
