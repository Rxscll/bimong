@extends('layouts.admin')

@section('title', 'Edit Kategori')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card p-4">
                <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
                    <div>
                        <h4 class="fw-bold mb-1">Edit Kategori</h4>
                        <p class="text-muted small mb-0">Ubah nama kategori buku</p>
                    </div>
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-light btn-sm border">
                        <i class="bi bi-arrow-left me-1"></i> Kembali
                    </a>
                </div>

                <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="form-label fw-bold small text-muted text-uppercase">Nama Kategori</label>
                        <input type="text" class="form-control rounded-3 py-2 @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name', $category->name) }}" required autofocus>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2 mt-4 pt-3 border-top">
                        <button type="submit" class="btn btn-primary px-4 py-2">
                            <i class="bi bi-save me-2"></i> Update
                        </button>
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-light px-4 py-2 border">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection