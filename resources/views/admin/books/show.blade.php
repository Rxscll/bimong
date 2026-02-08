@extends('layouts.admin')

@section('title', 'Detail Buku')

@section('content')
    <div class="row g-4">
        <div class="col-lg-4">
            <div class="card p-2 h-100">
                <div class="rounded-4 overflow-hidden bg-light d-flex align-items-center justify-content-center"
                    style="aspect-ratio: 3/4;">
                    @if($book->image)
                        <img src="{{ asset('storage/' . $book->image) }}" class="w-100 h-100 object-fit-cover">
                    @else
                        <div class="text-center py-5">
                            <i class="bi bi-book fs-1 text-muted opacity-25"></i>
                            <p class="text-muted small">Tanpa Sampul</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card p-4 h-100">
                <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
                    <h4 class="fw-bold mb-0">Informasi Lengkap Buku</h4>
                    <a href="{{ route('admin.books.index') }}" class="btn btn-light btn-sm border">
                        <i class="bi bi-arrow-left me-1"></i> Kembali
                    </a>
                </div>

                <div class="mb-4">
                    <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill mb-2">
                        {{ $book->category->name }}
                    </span>
                    <h2 class="fw-bold text-dark">{{ $book->judul }}</h2>
                    <p class="text-muted fs-5">oleh <span class="text-primary fw-semibold">{{ $book->penulis }}</span></p>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-3">
                            <div class="text-muted small fw-bold text-uppercase mb-1" style="font-size: 10px;">Kode Buku
                            </div>
                            <div class="fw-bold">{{ $book->kode_buku }}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-3">
                            <div class="text-muted small fw-bold text-uppercase mb-1" style="font-size: 10px;">Stok Tersedia
                            </div>
                            <div class="fw-bold {{ $book->stok < 5 ? 'text-danger' : 'text-dark' }}">{{ $book->stok }}
                                Eksemplar</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-3">
                            <div class="text-muted small fw-bold text-uppercase mb-1" style="font-size: 10px;">Penerbit
                            </div>
                            <div class="fw-bold">{{ $book->penerbit }}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-3">
                            <div class="text-muted small fw-bold text-uppercase mb-1" style="font-size: 10px;">Tahun Terbit
                            </div>
                            <div class="fw-bold">{{ $book->tahun_terbit }}</div>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <h6 class="fw-bold text-muted text-uppercase mb-2" style="font-size: 11px;">Deskripsi / Sinopsis</h6>
                    <div class="p-3 bg-light rounded-3">
                        <p class="mb-0 text-secondary leading-relaxed">
                            {{ $book->deskripsi ?? 'Tidak ada deskripsi tersedia.' }}</p>
                    </div>
                </div>

                <div class="mt-auto pt-3 border-top d-flex gap-2">
                    <a href="{{ route('admin.books.edit', $book->id) }}"
                        class="btn btn-warning px-4 py-2 fw-bold text-white">
                        <i class="bi bi-pencil-square me-2"></i> Edit Data
                    </a>
                    <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger px-4 py-2"
                            onclick="return confirm('Hapus buku ini secara permanen?')">
                            <i class="bi bi-trash me-2"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection