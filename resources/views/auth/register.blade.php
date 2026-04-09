@extends('layouts.auth')

@section('title', 'Daftar')

@section('content')
    <div class="text-start mb-5">
        <h2 class="fw-800 text-dark mb-2">Daftar</h2>
        <p class="text-muted">Buat akun untuk mulai meminjam buku</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
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
            @enderror
        </div>

        <!-- Email Address -->
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
            @enderror
        </div>

        <!-- Password -->
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
            @enderror
        </div>

        <!-- Confirm Password -->
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
    </form>
@endsection