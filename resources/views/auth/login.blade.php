@extends('layouts.auth')

@section('title', 'Masuk')

@section('content')
    <div class="text-start mb-5">
        <h2 class="fw-800 text-dark mb-2">Masuk</h2>
        <p class="text-muted">Gunakan akun Anda untuk mengakses dashboard</p>
    </div>

    <!-- Session Status -->
    @if(session('status'))
        <div class="alert alert-success border-0 shadow-sm small mb-4" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-4">
            <label for="email" class="form-label fw-bold">Alamat Email</label>
            <div class="input-group">
                <span class="input-group-text bg-white border-end-0 shadow-none" style="border-radius: 12px 0 0 12px;">
                    <i class="bi bi-envelope text-muted"></i>
                </span>
                <input type="email" class="form-control border-start-0 @error('email') is-invalid @enderror shadow-none" 
                    style="border-radius: 0 12px 12px 0;"
                    id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="nama@email.com">
            </div>
            @error('email')
                <div class="text-danger mt-1 small" style="font-size: 0.75rem;">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-4">
            <div class="d-flex justify-content-between">
                <label for="password" class="form-label fw-bold">Kata Sandi</label>
                @if (Route::has('password.request'))
                    <a class="small text-decoration-none fw-bold" href="{{ route('password.request') }}" style="color: var(--primary);">
                        Lupa?
                    </a>
                @endif
            </div>
            <div class="input-group">
                <span class="input-group-text bg-white border-end-0 shadow-none" style="border-radius: 12px 0 0 12px;">
                    <i class="bi bi-lock text-muted"></i>
                </span>
                <input type="password" class="form-control border-start-0 @error('password') is-invalid @enderror shadow-none" 
                    style="border-radius:0 12px 12px 0;"
                    id="password" name="password" required placeholder="••••••••">
            </div>
            @error('password')
                <div class="text-danger mt-1 small" style="font-size: 0.75rem;">{{ $message }}</div>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="form-check mb-4">
            <input class="form-check-input shadow-none" type="checkbox" id="remember_me" name="remember" style="cursor:pointer;">
            <label class="form-check-label small text-muted" for="remember_me" style="cursor:pointer;">
                Biarkan saya tetap masuk
            </label>
        </div>

        <button type="submit" class="btn btn-primary w-100 py-3 mt-2 shadow-sm">
            Masuk Sekarang <i class="bi bi-arrow-right ms-2"></i>
        </button>

        @if (Route::has('register'))
            <div class="text-center mt-4">
                <p class="small text-muted mb-0">
                    Belum punya akun? <a href="{{ route('register') }}" class="text-decoration-none fw-bold" style="color: var(--primary);">Daftar Gratis</a>
                </p>
            </div>
        @endif
    </form>
@endsection