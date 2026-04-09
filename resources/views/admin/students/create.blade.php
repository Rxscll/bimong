@extends('layouts.admin')

@section('title', 'Tambah Siswa')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card p-4">
                <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
                    <div>
                        <h4 class="fw-bold mb-1">Tambah Siswa Baru</h4>
                        <p class="text-muted small mb-0">Daftarkan anggota perpustakaan baru</p>
                    </div>
                    <a href="{{ route('admin.students.index') }}"
                        class="btn btn-light btn-sm d-flex align-items-center border">
                        <i class="bi bi-arrow-left me-2"></i> Kembali
                    </a>
                </div>

                <form action="{{ route('admin.students.store') }}" method="POST">
                    @csrf
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-muted text-uppercase">Nama Lengkap</label>
                                <input type="text" class="form-control rounded-3 @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" placeholder="Contoh: Ahmad Dhani" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-muted text-uppercase">Alamat Email</label>
                                <input type="email" class="form-control rounded-3 @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" placeholder="siswa@sekolah.sch.id" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-muted text-uppercase">NIS</label>
                                <input type="text" class="form-control rounded-3 @error('nis') is-invalid @enderror"
                                    name="nis" value="{{ old('nis') }}" placeholder="Nomor Induk Siswa">
                                @error('nis')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-muted text-uppercase">Kelas</label>
                                <input type="text" class="form-control rounded-3 @error('kelas') is-invalid @enderror"
                                    name="kelas" value="{{ old('kelas') }}" placeholder="Contoh: XII RPL 1">
                                @error('kelas')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-muted text-uppercase">Kata Sandi</label>
                                <input type="password"
                                    class="form-control rounded-3 @error('password') is-invalid @enderror" name="password"
                                    required>
                                <div class="form-text">Gunakan kombinasi yang aman.</div>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-muted text-uppercase">Konfirmasi Kata
                                    Sandi</label>
                                <input type="password" class="form-control rounded-3" name="password_confirmation" required>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 pt-3 border-top">
                        <button type="submit" class="btn btn-primary px-5 py-2">
                            <i class="bi bi-save me-2"></i> Simpan Siswa
                        </button>
                        <button type="reset" class="btn btn-light px-4 py-2 ms-2 border">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection