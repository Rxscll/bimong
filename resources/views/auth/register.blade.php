@extends('layouts.auth')

@section('title', 'Daftar')

@section('content')
    <h4 class="text-center fw-bold mb-1">Daftar Akun</h4>
    <p class="text-center text-muted small mb-4">Buat akun untuk mulai meminjam</p>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label small fw-bold">Nama Lengkap</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ old('name') }}" required autofocus autocomplete="name">
            @error('name')
                <div class="invalid-feedback small">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label small fw-bold">Alamat Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                value="{{ old('email') }}" required autocomplete="username">
            @error('email')
                <div class="invalid-feedback small">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label small fw-bold">Kata Sandi</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                name="password" required autocomplete="new-password">
            @error('password')
                <div class="invalid-feedback small">{{ $message }}</div>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mb-4">
            <label for="password_confirmation" class="form-label small fw-bold">Konfirmasi Kata Sandi</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required
                autocomplete="new-password">
        </div>

        <button type="submit" class="btn btn-primary w-100 mb-3 mt-2">Daftar Sekarang</button>

        <p class="text-center small mb-0">
            Sudah punya akun? <a href="{{ route('login') }}" class="text-decoration-none fw-bold">Masuk</a>
        </p>
    </form>
@endsection