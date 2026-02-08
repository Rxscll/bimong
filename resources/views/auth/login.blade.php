@extends('layouts.auth')

@section('title', 'Masuk')

@section('content')
    <h4 class="text-center fw-bold mb-1">Selamat Datang</h4>
    <p class="text-center text-muted small mb-4">Silakan masuk ke akun Anda</p>

    <!-- Session Status -->
    @if(session('status'))
        <div class="alert alert-success small border-0 mb-4" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label small fw-bold">Alamat Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                value="{{ old('email') }}" required autofocus autocomplete="username">
            @error('email')
                <div class="invalid-feedback small">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-3">
            <div class="d-flex justify-content-between">
                <label for="password" class="form-label small fw-bold">Kata Sandi</label>
                @if (Route::has('password.request'))
                    <a class="small text-decoration-none" href="{{ route('password.request') }}">
                        Lupa sandi?
                    </a>
                @endif
            </div>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                name="password" required autocomplete="current-password">
            @error('password')
                <div class="invalid-feedback small">{{ $message }}</div>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="form-check mb-4">
            <input class="form-check-input" type="checkbox" id="remember_me" name="remember">
            <label class="form-check-label small" for="remember_me">
                Ingat saya
            </label>
        </div>

        <button type="submit" class="btn btn-primary w-100 mb-3 mt-2">Masuk</button>

        @if (Route::has('register'))
            <p class="text-center small mb-0">
                Belum punya akun? <a href="{{ route('register') }}" class="text-decoration-none fw-bold">Daftar</a>
            </p>
        @endif
    </form>
@endsection