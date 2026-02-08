@extends('layouts.admin')

@section('title', 'Detail Kategori')

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card p-4">
                <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
                    <h4 class="fw-bold mb-0">Detail Kategori: {{ $category->name }}</h4>
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-light btn-sm border">
                        <i class="bi bi-arrow-left me-1"></i> Kembali
                    </a>
                </div>

                <h6 class="fw-bold mb-3">Daftar Buku di Kategori Ini:</h6>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($category->books as $book)
                                <tr>
                                    <td class="small fw-bold">{{ $book->kode_buku }}</td>
                                    <td class="fw-semibold">{{ $book->judul }}</td>
                                    <td class="text-muted">{{ $book->penulis }}</td>
                                    <td>{{ $book->stok }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-muted small">Belum ada buku dalam kategori ini.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4 pt-3 border-top">
                    <a href="{{ route('admin.categories.edit', $category->id) }}"
                        class="btn btn-warning px-4 text-white fw-bold">
                        <i class="bi bi-pencil-square me-2"></i> Edit Kategori
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection