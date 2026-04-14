@extends('layouts.auth')

@section('title', 'Daftar')

@section('content')
<<<<<<< HEAD
    <div class="text-start mb-5">
        <h2 class="fw-800 text-dark mb-2">Daftar</h2>
        <p class="text-muted">Buat akun untuk mulai meminjam buku</p>
    </div>
=======
    <h4 class="text-center fw-bold mb-1">Daftar Akun</h4>
    <p class="text-center text-muted small mb-4">Buat akun untuk mulai meminjam</p>
>>>>>>> 6b37c17e3702840205ac9bf66c9189f0da3983bb

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
<<<<<<< HEAD
        <div class="mb-4">
            <label for="name" class="form-label fw-bold">Nama Lengkap</label>
            <div class="input-group">
                <span class="input-group-text bg-white border-end-0 shadow-none" style="border-radius: 12px 0 0 12px;">
                    <i class="bi bi-person text-muted"></i>
                </span>
                <input type="text" class="form-control border-start-0 @error('name') is-invalid @enderror shadow-none" 
                    style="border-radius: 0 12px 12px 0;"
                    id="name" name="name" value="{{ old('name') }}" required autofocus placeholder="Nama Anda">
            </div>
            @error('name')
                <div class="text-danger mt-1 small" style="font-size: 0.75rem;">{{ $message }}</div>
=======
        <div class="mb-3">
            <label for="name" class="form-label small fw-bold">Nama Lengkap</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ old('name') }}" required autofocus autocomplete="name">
            @error('name')
                <div class="invalid-feedback small">{{ $message }}</div>
>>>>>>> 6b37c17e3702840205ac9bf66c9189f0da3983bb
            @enderror
        </div>

        <!-- Email Address -->
<<<<<<< HEAD
        <div class="mb-4">
            <label for="email" class="form-label fw-bold">Alamat Email</label>
            <div class="input-group">
                <span class="input-group-text bg-white border-end-0 shadow-none" style="border-radius: 12px 0 0 12px;">
                    <i class="bi bi-envelope text-muted"></i>
                </span>
                <input type="email" class="form-control border-start-0 @error('email') is-invalid @enderror shadow-none" 
                    style="border-radius: 0 12px 12px 0;"
                    id="email" name="email" value="{{ old('email') }}" required placeholder="nama@email.com">
            </div>
            @error('email')
                <div class="text-danger mt-1 small" style="font-size: 0.75rem;">{{ $message }}</div>
=======
        <div class="mb-3">
            <label for="email" class="form-label small fw-bold">Alamat Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                value="{{ old('email') }}" required autocomplete="username">
            @error('email')
                <div class="invalid-feedback small">{{ $message }}</div>
>>>>>>> 6b37c17e3702840205ac9bf66c9189f0da3983bb
            @enderror
        </div>

        <!-- Password -->
<<<<<<< HEAD
        <div class="mb-4">
            <label for="password" class="form-label fw-bold">Kata Sandi</label>
            <div class="input-group">
                <span class="input-group-text bg-white border-end-0 shadow-none" style="border-radius: 12px 0 0 12px;">
                    <i class="bi bi-lock text-muted"></i>
                </span>
                <input type="password" class="form-control border-start-0 @error('password') is-invalid @enderror shadow-none" 
                    style="border-radius: 0 12px 12px 0;"
                    id="password" name="password" required placeholder="Minimal 8 karakter">
            </div>
            @error('password')
                <div class="text-danger mt-1 small" style="font-size: 0.75rem;">{{ $message }}</div>
=======
        <div class="mb-3">
            <label for="password" class="form-label small fw-bold">Kata Sandi</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                name="password" required autocomplete="new-password">
            @error('password')
                <div class="invalid-feedback small">{{ $message }}</div>
>>>>>>> 6b37c17e3702840205ac9bf66c9189f0da3983bb
            @enderror
        </div>

        <!-- Confirm Password -->
<<<<<<< HEAD
        <div class="mb-5">
            <label for="password_confirmation" class="form-label fw-bold">Konfirmasi Sandi</label>
            <div class="input-group">
                <span class="input-group-text bg-white border-end-0 shadow-none" style="border-radius: 12px 0 0 12px;">
                    <i class="bi bi-shield-lock text-muted"></i>
                </span>
                <input type="password" class="form-control border-start-0 shadow-none" 
                    style="border-radius: 0 12px 12px 0;"
                    id="password_confirmation" name="password_confirmation" required placeholder="Ulangi sandi">
            </div>
        </div>

        <button type="submit" class="btn btn-primary w-100 py-3 mb-3 shadow-sm">
            Daftar Sekarang <i class="bi bi-person-plus ms-2"></i>
        </button>

        <div class="text-center mt-4">
            <p class="small text-muted mb-0">
                Sudah punya akun? <a href="{{ route('login') }}" class="text-decoration-none fw-bold" style="color: var(--primary);">Masuk Saja</a>
            </p>
        </div>
=======
        <div class="mb-4">
            <label for="password_confirmation" class="form-label small fw-bold">Konfirmasi Kata Sandi</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required
                autocomplete="new-password">
        </div>

        <button type="submit" class="btn btn-primary w-100 mb-3 mt-2">Daftar Sekarang</button>

        <p class="text-center small mb-0">
            Sudah punya akun? <a href="{{ route('login') }}" class="text-decoration-none fw-bold">Masuk</a>
        </p>
>>>>>>> 6b37c17e3702840205ac9bf66c9189f0da3983bb
    </form>
@endsection