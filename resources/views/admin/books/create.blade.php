@extends('layouts.admin')

@section('title', 'Tambah Buku')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card p-4">
                <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
                    <div>
                        <h4 class="fw-bold mb-1">Tambah Buku Baru</h4>
                        <p class="text-muted small mb-0">Lengkapi data buku di bawah ini</p>
                    </div>
                    <a href="{{ route('admin.books.index') }}"
                        class="btn btn-light btn-sm d-flex align-items-center border">
                        <i class="bi bi-arrow-left me-2"></i> Kembali
                    </a>
                </div>

                <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-muted text-uppercase">Kode Buku</label>
                                <input type="text" class="form-control rounded-3 bg-light"
                                    value="{{ $kodeBuku ?? 'BK-0001' }}" readonly>
                                <input type="hidden" name="kode_buku" value="{{ $kodeBuku ?? 'BK-0001' }}">
                                <div class="form-text">Kode buku dibuat otomatis</div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-muted text-uppercase">Judul Buku</label>
                                <input type="text" class="form-control rounded-3 @error('judul') is-invalid @enderror"
                                    name="judul" value="{{ old('judul') }}" placeholder="Masukkan judul lengkap" required>
                                @error('judul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-muted text-uppercase">Penulis</label>
                                <input type="text" class="form-control rounded-3 @error('penulis') is-invalid @enderror"
                                    name="penulis" value="{{ old('penulis') }}" placeholder="Nama penulis" required>
                                @error('penulis')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-muted text-uppercase">Penerbit</label>
                                <input type="text" class="form-control rounded-3 @error('penerbit') is-invalid @enderror"
                                    name="penerbit" value="{{ old('penerbit') }}" placeholder="Nama penerbit" required>
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
                                    name="tahun_terbit" value="{{ old('tahun_terbit') }}" placeholder="YYYY" required>
                                @error('tahun_terbit')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-muted text-uppercase">Stok Buku</label>
                                <input type="number" class="form-control rounded-3 @error('stok') is-invalid @enderror"
                                    name="stok" value="{{ old('stok') }}" min="0" required>
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
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-muted text-uppercase">Sampul Buku</label>
                                <input type="file" class="form-control rounded-3 @error('image') is-invalid @enderror"
                                    name="image" accept="image/*">
                                <div class="form-text">Format: JPG, PNG, WEBP. Maks 2MB.</div>
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-muted text-uppercase">Deskripsi /
                                    Sinopsis</label>
                                <textarea class="form-control rounded-3" name="deskripsi" rows="4"
                                    placeholder="Tuliskan deskripsi singkat buku...">{{ old('deskripsi') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 pt-3 border-top">
                        <button type="submit" class="btn btn-primary px-5 py-2">
                            <i class="bi bi-save me-2"></i> Simpan Buku
                        </button>
                        <button type="reset" class="btn btn-light px-4 py-2 ms-2 border">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection