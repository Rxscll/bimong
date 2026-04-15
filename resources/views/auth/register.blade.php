@extends('layouts.auth')

@section('title', 'Daftar')

@section('content')
    <div class="mb-10 lg:mt-0 mt-20">
        <h2 class="text-3xl font-black text-slate-900 tracking-tight mb-2">Daftar Akun.</h2>
        <p class="text-slate-500 font-medium">Buat akun untuk mulai meminjam buku secara digital.</p>
    </div>

    <!-- Session Status -->
    @if(session('status'))
        <div class="bg-emerald-50 text-emerald-600 border border-emerald-100 p-4 rounded-xl text-sm font-medium mb-6 flex items-center">
            <i class="bi bi-check-circle-fill mr-3 text-lg"></i> {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <!-- Name Address -->
        <div>
            <label for="name" class="block text-sm font-bold text-slate-900 mb-2">Nama Lengkap</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <i class="bi bi-person text-slate-400 text-lg"></i>
                </div>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus placeholder="Nama Anda"
                    class="block w-full pl-12 pr-4 py-4 bg-slate-50 border @error('name') border-red-300 focus:ring-red-500 focus:border-red-500 @else border-slate-200 focus:ring-slate-900 focus:border-slate-900 @enderror rounded-xl text-sm transition-all outline-none">
            </div>
            @error('name')
                <p class="mt-2 text-xs text-red-500 font-medium">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-bold text-slate-900 mb-2">Alamat Email</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <i class="bi bi-envelope text-slate-400 text-lg"></i>
                </div>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="nama@email.com"
                    class="block w-full pl-12 pr-4 py-4 bg-slate-50 border @error('email') border-red-300 focus:ring-red-500 focus:border-red-500 @else border-slate-200 focus:ring-slate-900 focus:border-slate-900 @enderror rounded-xl text-sm transition-all outline-none">
            </div>
            @error('email')
                <p class="mt-2 text-xs text-red-500 font-medium">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-bold text-slate-900 mb-2">Kata Sandi</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <i class="bi bi-lock text-slate-400 text-lg"></i>
                </div>
                <input type="password" id="password" name="password" required placeholder="Minimal 8 karakter"
                    class="block w-full pl-12 pr-4 py-4 bg-slate-50 border @error('password') border-red-300 focus:ring-red-500 focus:border-red-500 @else border-slate-200 focus:ring-slate-900 focus:border-slate-900 @enderror rounded-xl text-sm transition-all outline-none">
            </div>
            @error('password')
                <p class="mt-2 text-xs text-red-500 font-medium">{{ $message }}</p>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block text-sm font-bold text-slate-900 mb-2">Konfirmasi Sandi</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <i class="bi bi-shield-lock text-slate-400 text-lg"></i>
                </div>
                <input type="password" id="password_confirmation" name="password_confirmation" required placeholder="Ulangi sandi"
                    class="block w-full pl-12 pr-4 py-4 bg-slate-50 border border-slate-200 focus:ring-slate-900 focus:border-slate-900 rounded-xl text-sm transition-all outline-none">
            </div>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full flex items-center justify-center py-4 px-4 bg-slate-900 text-white font-bold rounded-xl hover:bg-slate-800 transition shadow-lg shadow-slate-900/20 text-lg">
            Daftar Sekarang <i class="bi bi-person-plus ml-2"></i>
        </button>

        <div class="mt-8 text-center">
            <p class="text-sm font-medium text-slate-500">
                Sudah punya akun? 
                <a href="{{ route('login') }}" class="text-slate-900 font-bold hover:underline transition">Masuk Saja</a>
            </p>
        </div>
    </form>
@endsection