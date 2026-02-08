@extends('layouts.student')

@section('title', $book->judul)

@section('content')
<div class="container py-5">
    <div class="mb-4">
        <a href="{{ route('student.books.index') }}" class="text-decoration-none d-flex align-items-center text-muted">
            <i class="bi bi-arrow-left me-2"></i> Kembali ke Katalog
        </a>
    </div>

    <div class="card border-0 shadow-sm p-4 rounded-4">
        <div class="row g-5">
            <div class="col-lg-4">
                <div class="rounded-4 overflow-hidden shadow-sm bg-light d-flex align-items-center justify-content-center" style="aspect-ratio: 3/4;">
                    @if($book->image)
                        <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->judul }}" class="w-100 h-100 object-fit-cover">
                    @else
                        <i class="bi bi-book text-muted opacity-25" style="font-size: 8rem;"></i>
                    @endif
                </div>
            </div>
            <div class="col-lg-8">
                <div class="mb-3">
                    <span class="badge-category">{{ $book->category->name }}</span>
                </div>
                <h1 class="fw-bold mb-2">{{ $book->judul }}</h1>
                <p class="fs-5 text-muted mb-4">oleh <span class="text-dark fw-semibold">{{ $book->penulis }}</span></p>

                <div class="row g-3 mb-5">
                    <div class="col-6 col-sm-3">
                        <div class="p-3 bg-light rounded-3">
                            <div class="small text-muted mb-1 text-uppercase fw-bold" style="font-size: 10px;">Kode Buku</div>
                            <div class="fw-bold text-dark">{{ $book->kode_buku }}</div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-3">
                        <div class="p-3 bg-light rounded-3">
                            <div class="small text-muted mb-1 text-uppercase fw-bold" style="font-size: 10px;">Stok</div>
                            <div class="fw-bold text-dark">{{ $book->stok }} eks</div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-3">
                        <div class="p-3 bg-light rounded-3">
                            <div class="small text-muted mb-1 text-uppercase fw-bold" style="font-size: 10px;">Penerbit</div>
                            <div class="fw-bold text-dark text-truncate">{{ $book->penerbit }}</div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-3">
                        <div class="p-3 bg-light rounded-3">
                            <div class="small text-muted mb-1 text-uppercase fw-bold" style="font-size: 10px;">Tahun</div>
                            <div class="fw-bold text-dark">{{ $book->tahun_terbit }}</div>
                        </div>
                    </div>
                </div>

                <div class="mb-5">
                    <h5 class="fw-bold mb-3">Sinopsis / Deskripsi</h5>
                    <p class="text-secondary leading-relaxed" style="font-size: 1.1rem;">
                        {{ $book->deskripsi ?? 'Tidak ada deskripsi tersedia untuk buku ini.' }}
                    </p>
                </div>

                <div class="d-grid gap-2 d-md-flex mt-auto">
                    <form action="{{ route('student.books.borrow', $book->id) }}" method="POST" class="flex-grow-1">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-lg w-100 py-3 fw-bold shadow-sm" 
                                onclick="return confirm('Apakah Anda yakin ingin meminjam buku ini?')"
                                {{ $book->stok < 1 ? 'disabled' : '' }}>
                            <i class="bi bi-bookmark-plus me-2"></i> {{ $book->stok < 1 ? 'Stok Habis' : 'Pinjam Sekarang' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection