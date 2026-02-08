@extends('layouts.admin')

@section('title', 'Edit Buku')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card p-4">
                <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
                    <div>
                        <h4 class="fw-bold mb-1">Edit Buku: {{ $book->judul }}</h4>
                        <p class="text-muted small mb-0">Perbarui informasi buku di bawah ini</p>
                    </div>
                    <a href="{{ route('admin.books.index') }}"
                        class="btn btn-light btn-sm d-flex align-items-center border">
                        <i class="bi bi-arrow-left me-2"></i> Kembali
                    </a>
                </div>

                <form action="{{ route('admin.books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-muted text-uppercase">Kode Buku</label>
                                <input type="text" class="form-control rounded-3 @error('kode_buku') is-invalid @enderror"
                                    name="kode_buku" value="{{ old('kode_buku', $book->kode_buku) }}" required>
                                @error('kode_buku')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-muted text-uppercase">Judul Buku</label>
                                <input type="text" class="form-control rounded-3 @error('judul') is-invalid @enderror"
                                    name="judul" value="{{ old('judul', $book->judul) }}" required>
                                @error('judul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-muted text-uppercase">Penulis</label>
                                <input type="text" class="form-control rounded-3 @error('penulis') is-invalid @enderror"
                                    name="penulis" value="{{ old('penulis', $book->penulis) }}" required>
                                @error('penulis')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-muted text-uppercase">Penerbit</label>
                                <input type="text" class="form-control rounded-3 @error('penerbit') is-invalid @enderror"
                                    name="penerbit" value="{{ old('penerbit', $book->penerbit) }}" required>
                                @error('penerbit')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-muted text-uppercase">Tahun Terbit</label>
                                <input type="number"
                                    class="form-control rounded-3 @error('tahun_terbit') is-invalid @enderror"
                                    name="tahun_terbit" value="{{ old('tahun_terbit', $book->tahun_terbit) }}" required>
                                @error('tahun_terbit')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-muted text-uppercase">Stok Buku</label>
                                <input type="number" class="form-control rounded-3 @error('stok') is-invalid @enderror"
                                    name="stok" value="{{ old('stok', $book->stok) }}" min="0" required>
                                @error('stok')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-muted text-uppercase">Kategori</label>
                                <select class="form-select rounded-3 @error('category_id') is-invalid @enderror"
                                    name="category_id" required>
                                    <option value="">Pilih Kategori</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-muted text-uppercase">Ganti Sampul
                                    (Opsional)</label>
                                @if($book->image)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $book->image) }}" class="rounded shadow-sm" width="100"
                                            height="130" style="object-fit: cover;">
                                    </div>
                                @endif
                                <input type="file" class="form-control rounded-3 @error('image') is-invalid @enderror"
                                    name="image" accept="image/*">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-muted text-uppercase">Deskripsi /
                                    Sinopsis</label>
                                <textarea class="form-control rounded-3" name="deskripsi"
                                    rows="4">{{ old('deskripsi', $book->deskripsi) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 pt-3 border-top">
                        <button type="submit" class="btn btn-primary px-5 py-2">
                            <i class="bi bi-save me-2"></i> Update Buku
                        </button>
                        <a href="{{ route('admin.books.index') }}" class="btn btn-light px-4 py-2 ms-2 border">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection