@extends('layouts.auth')

@section('title', 'Masuk')

@section('content')
    <div class="mb-10 lg:mt-0 mt-20">
        <h2 class="text-3xl font-black text-slate-900 tracking-tight mb-2">Selamat Datang.</h2>
        <p class="text-slate-500 font-medium">Masuk ke akun Anda untuk mengakses dashboard.</p>
    </div>

    <!-- Session Status -->
    @if(session('status'))
        <div class="bg-emerald-50 text-emerald-600 border border-emerald-100 p-4 rounded-xl text-sm font-medium mb-6 flex items-center">
            <i class="bi bi-check-circle-fill mr-3 text-lg"></i> {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-bold text-slate-900 mb-2">Alamat Email</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <i class="bi bi-envelope text-slate-400 text-lg"></i>
                </div>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="nama@email.com"
                    class="block w-full pl-12 pr-4 py-4 bg-slate-50 border @error('email') border-red-300 focus:ring-red-500 focus:border-red-500 @else border-slate-200 focus:ring-slate-900 focus:border-slate-900 @enderror rounded-xl text-sm transition-all outline-none">
            </div>
            @error('email')
                <p class="mt-2 text-xs text-red-500 font-medium">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div>
            <div class="flex items-center justify-between mb-2">
                <label for="password" class="block text-sm font-bold text-slate-900">Kata Sandi</label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm font-bold text-slate-500 hover:text-slate-900 transition">
                        Lupa?
                    </a>
                @endif
            </div>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <i class="bi bi-lock text-slate-400 text-lg"></i>
                </div>
                <input type="password" id="password" name="password" required placeholder="••••••••"
                    class="block w-full pl-12 pr-4 py-4 bg-slate-50 border @error('password') border-red-300 focus:ring-red-500 focus:border-red-500 @else border-slate-200 focus:ring-slate-900 focus:border-slate-900 @enderror rounded-xl text-sm transition-all outline-none">
            </div>
            @error('password')
                <p class="mt-2 text-xs text-red-500 font-medium">{{ $message }}</p>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="flex items-center mt-4">
            <input id="remember_me" type="checkbox" name="remember" class="h-4 w-4 text-slate-900 border-slate-300 rounded focus:ring-slate-900 cursor-pointer">
            <label for="remember_me" class="ml-2 block text-sm font-medium text-slate-500 cursor-pointer">
                Biarkan saya tetap masuk
            </label>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full flex items-center justify-center py-4 px-4 bg-slate-900 text-white font-bold rounded-xl hover:bg-slate-800 transition shadow-lg shadow-slate-900/20 text-lg">
            Masuk Sekarang <i class="bi bi-arrow-right ml-2"></i>
        </button>

        @if (Route::has('register'))
            <div class="mt-8 text-center border-t border-slate-100 pt-6">
                <p class="text-sm font-medium text-slate-500">
                    Belum punya akun? 
                    <a href="{{ route('register') }}" class="text-slate-900 font-bold hover:underline transition">Daftar Gratis</a>
                </p>
            </div>
        @endif
    </form>
@endsection