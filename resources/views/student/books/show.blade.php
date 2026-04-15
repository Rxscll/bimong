@extends('layouts.student-theme')

@section('title', 'Detail | ' . $book->judul)

@section('content')
<div class="max-w-4xl mx-auto py-10 px-4 sm:px-6">
    <!-- Back Button -->
    <div class="mb-8 text-center max-w-3xl mx-auto">
        <a href="{{ route('student.books.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-slate-500 hover:text-slate-900 transition-colors bg-white px-5 py-2.5 rounded-full border border-slate-200 shadow-sm">
            <i class="bi bi-arrow-left"></i> Kembali ke Katalog
        </a>
    </div>

    <!-- Centered Content Card -->
    <div class="glass-panel rounded-[2.5rem] bg-white border border-slate-200 shadow-xl shadow-slate-200/50 overflow-hidden text-center relative p-8 sm:p-12">
        
        <!-- Background Accent Blur -->
        <div class="absolute top-0 inset-x-0 h-64 bg-gradient-to-b from-slate-100 to-transparent opacity-50 z-0"></div>

        <div class="relative z-10 flex flex-col items-center">
            <!-- Cover Art -->
            <div class="w-48 h-64 sm:w-56 sm:h-80 rounded-2xl overflow-hidden shadow-2xl border border-slate-100 mb-8 transform hover:scale-105 transition-transform duration-500">
                <img src="{{ $book->cover_url }}" alt="{{ $book->judul }}" class="w-full h-full object-cover">
            </div>

            <!-- Title & Category -->
            <div class="mb-5">
                <span class="inline-block px-3 py-1 bg-slate-100 text-slate-600 border border-slate-200 rounded-lg text-xs font-bold uppercase tracking-widest mb-4">
                    {{ $book->category->nama ?? $book->category->name ?? 'Tak Berkategori' }}
                </span>
                <h1 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight leading-tight mb-3">
                    {{ $book->judul }}
                </h1>
                <p class="text-lg text-slate-500 font-medium">Buku oleh <span class="text-slate-900 font-bold">{{ $book->penulis }}</span></p>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-wrap items-center justify-center gap-4 mb-10 w-full mt-2">
                <!-- Toggle Favorite Button -->
                @auth
                <form action="{{ route('student.favorites.toggle', $book->id) }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" 
                            class="px-6 py-3.5 rounded-xl font-bold flex items-center justify-center gap-2 transition-all shadow-sm border {{ $book->isFavoritedBy(auth()->id()) ? 'bg-rose-50 text-rose-600 border-rose-200 hover:bg-rose-100' : 'bg-white text-slate-600 border-slate-200 hover:bg-slate-50 hover:text-slate-900' }}">
                        <i class="bi bi-{{ $book->isFavoritedBy(auth()->id()) ? 'heart-fill' : 'heart' }} text-lg"></i>
                        <span>{{ $book->isFavoritedBy(auth()->id()) ? 'Tersimpan' : 'Mulai Simpan' }}</span>
                    </button>
                </form>
                @else
                <a href="{{ route('login') }}" class="px-6 py-3.5 rounded-xl font-bold flex items-center justify-center gap-2 transition-all shadow-sm border bg-white text-slate-600 border-slate-200 hover:bg-slate-50 hover:text-slate-900">
                    <i class="bi bi-heart text-lg"></i>
                    <span>Mulai Simpan</span>
                </a>
                @endauth

                <!-- Read Document Button -->
                @if($book->file_pdf)
                    @auth
                    <a href="{{ route('student.books.read', $book->id) }}" 
                       class="px-8 py-3.5 bg-slate-900 text-white rounded-xl shadow-lg shadow-slate-900/20 hover:bg-slate-800 transition-all font-bold flex items-center justify-center gap-2">
                        <i class="bi bi-book text-lg"></i>
                        Mulai Membaca
                    </a>
                    @else
                    <a href="{{ route('login') }}" 
                       class="px-8 py-3.5 bg-slate-900 text-white rounded-xl shadow-lg shadow-slate-900/20 hover:bg-slate-800 transition-all font-bold flex items-center justify-center gap-2">
                        <i class="bi bi-book text-lg"></i>
                        Mulai Membaca
                    </a>
                    @endauth
                @else
                    <button disabled 
                            class="px-8 py-3.5 bg-slate-100 text-slate-400 border border-slate-200 rounded-xl cursor-not-allowed font-bold flex items-center justify-center gap-2 tooltip" title="Hanya tersedia buku fisik di perpustakaan">
                        <i class="bi bi-lock-fill text-lg text-slate-300"></i>
                        Belum Bisa Dibaca
                    </button>
                @endif
            </div>

            <hr class="w-24 border-slate-200 mx-auto mb-10">

            <!-- Rating Section -->
            <div class="w-full max-w-sm mx-auto bg-slate-50 border border-slate-200 p-6 rounded-2xl mb-10">
                <h4 class="text-xs font-bold text-slate-500 uppercase tracking-widest mb-3">Penilaian Anda</h4>
                <form action="{{ route('student.books.rate', $book->id) }}" method="POST" id="ratingForm">
                    @csrf
                    <div class="flex flex-row-reverse justify-center gap-2" id="star-rating">
                        @for($i = 5; $i >= 1; $i--)
                            @auth
                            <input type="radio" name="rating" id="star-{{ $i }}" value="{{ $i }}" class="peer hidden" {{ $book->userRating(auth()->id()) == $i ? 'checked' : '' }} onchange="this.form.submit();" />
                            <label for="star-{{ $i }}" class="cursor-pointer text-slate-200 peer-checked:text-amber-400 hover:text-amber-400 text-4xl transition-colors">
                                <i class="bi bi-star-fill drop-shadow-sm"></i>
                            </label>
                            @else
                            <input type="radio" name="rating" id="star-{{ $i }}" value="{{ $i }}" class="peer hidden" onclick="window.location='{{ route('login') }}'" />
                            <label for="star-{{ $i }}" class="cursor-pointer text-slate-200 hover:text-amber-400 text-4xl transition-colors">
                                <i class="bi bi-star-fill drop-shadow-sm"></i>
                            </label>
                            @endauth
                        @endfor
                    </div>
                </form>
            </div>
            
            <style>
                /* CSS Trick for star rating hover */
                #star-rating label:hover,
                #star-rating label:hover ~ label {
                    color: #fbbf24 !important; /* amber-400 */
                }
            </style>

            <!-- Specs Grid -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 w-full mb-10 text-center">
                <div class="bg-slate-50 border border-slate-100 p-4 rounded-2xl">
                    <p class="text-[10px] uppercase font-bold text-slate-400 tracking-wider mb-1">Kode Buku</p>
                    <p class="font-black text-slate-900">{{ $book->kode_buku }}</p>
                </div>
                <div class="bg-slate-50 border border-slate-100 p-4 rounded-2xl">
                    <p class="text-[10px] uppercase font-bold text-slate-400 tracking-wider mb-1">Tahun Terbit</p>
                    <p class="font-black text-slate-900">{{ $book->tahun_terbit }}</p>
                </div>
                <div class="bg-slate-50 border border-slate-100 p-4 rounded-2xl">
                    <p class="text-[10px] uppercase font-bold text-slate-400 tracking-wider mb-1">Total Dibaca</p>
                    <p class="font-black text-slate-900">{{ $book->jumlah_dibaca ?? 0 }}x</p>
                </div>
                <div class="bg-slate-50 border border-slate-100 p-4 rounded-2xl">
                    <p class="text-[10px] uppercase font-bold text-slate-400 tracking-wider mb-1">Penerbit</p>
                    <p class="font-black text-slate-900 truncate" title="{{ $book->penerbit }}">{{ explode(' ', $book->penerbit)[0] }}...</p>
                </div>
            </div>

            <!-- Synopsis / Description -->
            <div class="w-full text-left bg-white border border-slate-200 p-8 rounded-2xl shadow-sm">
                <h3 class="text-xl font-black text-slate-900 mb-4 flex items-center gap-3">
                    <i class="bi bi-body-text text-slate-400"></i> Sinopsis Dokumen
                </h3>
                <p class="text-slate-600 leading-relaxed text-[15px] max-w-3xl text-justify mx-auto">
                    @if($book->deskripsi)
                        {!! nl2br(e($book->deskripsi)) !!}
                    @else
                        <span class="italic text-slate-400">Belum ada rincian dan deskripsi mendalam yang dicatat untuk buku ini.</span>
                    @endif
                </p>
            </div>
        </div>
    </div>
</div>
@endsection