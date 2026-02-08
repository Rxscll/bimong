@extends('layouts.student')

@section('title', 'Katalog Buku')

@section('content')
<div class="hero-section">
    <div class="container overflow-hidden">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-3">Temukan Pengetahuan di Genggaman Anda</h1>
                <p class="lead mb-4 opacity-75">Cari dan pinjam buku favoritmu dengan mudah dari koleksi perpustakaan sekolah kami.</p>
                <form action="{{ route('student.books.index') }}" method="GET" class="d-flex gap-2">
                    <div class="input-group input-group-lg shadow-sm">
                        <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
                        <input type="text" name="search" value="{{ $search }}" class="form-control border-start-0 ps-0" placeholder="Cari judul, penulis, atau kode buku...">
                        <button class="btn btn-warning px-4 fw-bold" type="submit">Cari</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 d-none d-lg-block">
                <img src="https://illustrations.popsy.co/white/reading-a-book.svg" alt="Ilustrasi Baca" class="img-fluid" style="max-height: 400px; filter: drop-shadow(0 0 20px rgba(0,0,0,0.1));">
            </div>
        </div>
    </div>
</div>

<div class="container mb-5">
    <!-- Filter Kategori -->
    <div class="d-flex flex-wrap gap-2 mb-5">
        <a href="{{ route('student.books.index') }}" class="btn {{ !$category_id ? 'btn-primary' : 'btn-light' }} rounded-pill px-4">Semua</a>
        @foreach($categories as $category)
            <a href="{{ route('student.books.index', ['category_id' => $category->id, 'search' => $search]) }}" 
               class="btn {{ $category_id == $category->id ? 'btn-primary' : 'btn-light' }} rounded-pill px-4">
                {{ $category->name }}
            </a>
        @endforeach
    </div>

    <!-- Alert Sukses/Error -->
    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm alert-dismissible fade show mb-4" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger border-0 shadow-sm alert-dismissible fade show mb-4" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
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