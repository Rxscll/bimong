@extends('layouts.student')

@section('title', 'Katalog Buku')

@section('content')
<div class="container-fluid p-6">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Katalog Buku Digital</h1>
            <p class="text-gray-600 mt-1">Jelajahi koleksi buku digital perpustakaan</p>
        </div>
    </div>

    <!-- Search and Filter -->
    <div class="bg-white rounded-lg shadow-md p-4 mb-6">
        <form method="GET" class="flex flex-col md:flex-row gap-4">
            <div class="flex-1">
                <input type="text" name="search" value="{{ $search }}" 
                       placeholder="Cari judul atau penulis..." 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <div class="md:w-48">
                <select name="category_id" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" 
                    class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200 transition-colors">
                <i class="bi bi-search"></i>
                Cari
            </button>
        </form>
    </div>

    <!-- Books Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @forelse($books as $book)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                <!-- Cover Image -->
                <div class="relative h-48 bg-gray-100">
                    <img src="{{ $book->cover_url }}" alt="{{ $book->judul }}" 
                         class="w-full h-full object-cover">
                    @if($book->file_pdf)
                        <div class="absolute top-2 right-2">
                            <span class="px-2 py-1 bg-blue-600 text-white text-xs font-semibold rounded-full">
                                <i class="bi bi-file-pdf mr-1"></i>PDF
                            </span>
                        </div>
                    @endif
                </div>

                <!-- Book Info -->
                <div class="p-4">
                    <div class="mb-2">
                        <span class="px-2 py-1 bg-green-100 text-green-800 text-xs font-semibold rounded-full">
                            {{ $book->category->nama }}
                        </span>
                    </div>
                    
                    <h3 class="font-semibold text-gray-900 mb-1 line-clamp-2">{{ $book->judul }}</h3>
                    <p class="text-sm text-gray-600 mb-1">{{ $book->penulis }}</p>
                    <p class="text-xs text-gray-500 mb-3">{{ $book->tahun_terbit }}</p>
                    
                    <!-- Description -->
                    @if($book->deskripsi)
                        <p class="text-sm text-gray-700 mb-4 line-clamp-3">{{ $book->deskripsi }}</p>
                    @endif

                    <!-- Stats -->
                    <div class="flex items-center justify-between text-sm text-gray-600 mb-4">
                        <span class="flex items-center">
                            <i class="bi bi-eye mr-1"></i>
                            {{ $book->jumlah_dibaca }} dibaca
                        </span>
                        <span class="flex items-center">
                            <i class="bi bi-book mr-1"></i>
                            {{ $book->kode_buku }}
                        </span>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-2">
                        <a href="{{ route('student.books.show', $book->id) }}" 
                           class="flex-1 text-center px-3 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors text-sm font-medium">
                            <i class="bi bi-eye mr-1"></i>
                            Detail
                        </a>
                        
                        @if($book->file_pdf)
                            <a href="{{ route('student.books.read', $book->id) }}" 
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
                <i class="bi bi-inbox text-6xl text-gray-300 mb-4 block"></i>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Tidak ada buku ditemukan</h3>
                <p class="text-gray-600">Coba ubah kata kunci pencarian atau filter kategori</p>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($books->hasPages())
        <div class="mt-8 flex justify-center">
            {{ $books->links() }}
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
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Grid Buku -->
    <div class="row g-4">
        @forelse($books as $book)
            <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                <div class="card h-100">
                    <div class="book-img-wrapper">
                        @if($book->image)
                            <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->judul }}">
                        @else
                            <i class="bi bi-book text-muted opacity-25" style="font-size: 4rem;"></i>
                        @endif
                    </div>
                    <div class="card-body p-3">
                        <div class="mb-2">
                            <span class="badge-category">{{ $book->category->name }}</span>
                        </div>
                        <h6 class="card-title fw-bold text-dark mb-1 text-truncate" title="{{ $book->judul }}">{{ $book->judul }}</h6>
                        <p class="card-text text-muted small mb-3 text-truncate">{{ $book->penulis }}</p>
                        
                        <div class="d-flex justify-content-between align-items-center mt-auto">
                            <span class="small text-muted"><i class="bi bi-box me-1"></i>{{ $book->stok }}</span>
                            <div class="d-flex gap-1">
                                <a href="{{ route('student.books.show', $book->id) }}" class="btn btn-light btn-sm px-2 text-primary" title="Detail">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <form action="{{ route('student.books.borrow', $book->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary btn-sm px-3 fw-bold" 
                                            onclick="return confirm('Pinjam buku {{ $book->judul }}?')"
                                            {{ $book->stok < 1 ? 'disabled' : '' }}>
                                        Pinjam
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <i class="bi bi-journal-x fs-1 text-muted opacity-25 d-block mb-3"></i>
                <h5 class="text-muted">Maaf, buku yang Anda cari tidak ditemukan.</h5>
                <a href="{{ route('student.books.index') }}" class="btn btn-primary mt-3">Reset Pencarian</a>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-5 d-flex justify-content-center">
        {{ $books->links() }}
    </div>
</div>
@endsection