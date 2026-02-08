@extends('layouts.admin')

@section('title', 'Edit Siswa')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card p-4">
                <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
                    <div>
                        <h4 class="fw-bold mb-1">Edit Data Siswa: {{ $student->name }}</h4>
                        <p class="text-muted small mb-0">Perbarui informasi anggota perpustakaan</p>
                    </div>
                    <a href="{{ route('admin.students.index') }}"
                        class="btn btn-light btn-sm d-flex align-items-center border">
                        <i class="bi bi-arrow-left me-2"></i> Kembali
                    </a>
                </div>

                <form action="{{ route('admin.students.update', $student->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-muted text-uppercase">Nama Lengkap</label>
                                <input type="text" class="form-control rounded-3 @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name', $student->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-muted text-uppercase">Alamat Email</label>
                                <input type="email" class="form-control rounded-3 @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email', $student->email) }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-muted text-uppercase">NIS</label>
                                <input type="text" class="form-control rounded-3 @error('nis') is-invalid @enderror"
                                    name="nis" value="{{ old('nis', $student->nis) }}">
                                @error('nis')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-muted text-uppercase">Kelas</label>
                                <input type="text" class="form-control rounded-3 @error('kelas') is-invalid @enderror"
                                    name="kelas" value="{{ old('kelas', $student->kelas) }}">
                                @error('kelas')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 mt-4 pt-3 border-top">
                            <h6 class="fw-bold mb-3 text-secondary">Ubah Kata Sandi (Opsional)</h6>
                            <p class="text-muted small mb-3">Kosongkan jika tidak ingin mengubah kata sandi.</p>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-muted text-uppercase">Kata Sandi Baru</label>
                                <input type="password"
                                    class="form-control rounded-3 @error('password') is-invalid @enderror" name="password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-muted text-uppercase">Konfirmasi Kata Sandi
                                    Baru</label>
                                <input type="password" class="form-control rounded-3" name="password_confirmation">
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 pt-3 border-top">
                        <button type="submit" class="btn btn-primary px-5 py-2">
                            <i class="bi bi-save me-2"></i> Perbarui Data
                        </button>
                        <a href="{{ route('admin.students.index') }}" class="btn btn-light px-4 py-2 ms-2 border">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection