@extends('layouts.admin-theme')

@section('title', 'Detail Buku | ' . $book->judul)

@section('content')
<div class="max-w-4xl mx-auto py-10 px-4 sm:px-6">
    <!-- Back Button -->
    <div class="mb-8 text-center max-w-3xl mx-auto">
        <a href="{{ route('admin.books.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-slate-500 hover:text-slate-900 transition-colors bg-white px-5 py-2.5 rounded-full border border-slate-200 shadow-sm">
            <i class="bi bi-arrow-left"></i> Kembali ke Manajemen Buku
        </a>
    </div>

    <!-- Centered Content Card -->
    <div class="glass-panel rounded-[2.5rem] bg-white border border-slate-200 shadow-xl shadow-slate-200/50 overflow-hidden text-center relative p-8 sm:p-12">
        
        <!-- Background Accent Blur -->
        <div class="absolute top-0 inset-x-0 h-40 bg-gradient-to-b from-blue-50 to-transparent opacity-60 z-0"></div>

        <div class="relative z-10 flex flex-col items-center">
            <!-- Cover Art -->
            <div class="w-48 h-64 sm:w-56 sm:h-80 rounded-2xl overflow-hidden shadow-2xl border border-slate-100 mb-8 transform hover:-translate-y-2 transition-transform duration-500 mx-auto">
                @if($book->cover_url)
                    <img src="{{ $book->cover_url }}" alt="{{ $book->judul }}" class="w-full h-full object-cover">
                @else
                    <div class="bg-slate-100 w-full h-full flex flex-col items-center justify-center">
                        <i class="bi bi-journal-x text-5xl text-slate-300 block mb-2"></i>
                        <span class="text-xs font-bold text-slate-400">Tanpa Sampul</span>
                    </div>
                @endif
            </div>

            <!-- Title & Category -->
            <div class="mb-5">
                <span class="inline-block px-3 py-1 bg-blue-50 text-blue-600 border border-blue-100 rounded-lg text-[10px] font-bold uppercase tracking-widest mb-3">
                    {{ $book->category->nama ?? $book->category->name ?? 'Tak Berkategori' }}
                </span>
                <h1 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight leading-tight mb-2">
                    {{ $book->judul }}
                </h1>
                <p class="text-lg text-slate-500 font-medium">Karya <span class="text-slate-900 font-bold">{{ $book->penulis }}</span></p>
                <div class="mt-4 flex justify-center gap-3">
                     @if($book->file_pdf)
                        <span class="px-3 py-1.5 bg-green-50 text-green-700 border border-green-200 rounded-lg text-xs font-bold shrink-0">
                            <i class="bi bi-file-earmark-pdf-fill mr-1"></i> Tersedia PDF (Digital)
                        </span>
                    @else
                        <span class="px-3 py-1.5 bg-slate-50 text-slate-500 border border-slate-200 rounded-lg text-xs font-bold shrink-0">
                            <i class="bi bi-journal mr-1"></i> Buku Fisik Sahaja
                        </span>
                    @endif
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-wrap items-center justify-center gap-4 mb-10 w-full mt-4">
                <a href="{{ route('admin.books.edit', $book->id) }}" 
                   class="px-8 py-3.5 bg-amber-50 text-amber-600 border border-amber-200 rounded-xl hover:bg-amber-100 hover:text-amber-700 transition-all font-bold flex items-center justify-center gap-2 shadow-sm">
                    <i class="bi bi-pencil-square text-lg"></i>
                    Edit Referensi
                </a>
                
                <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST" class="m-0">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="px-8 py-3.5 rounded-xl font-bold flex items-center justify-center gap-2 transition-all shadow-sm border bg-white text-rose-500 border-rose-200 hover:bg-rose-50 hover:text-rose-600"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini secara permanen?')">
                        <i class="bi bi-trash text-lg"></i>
                        Hapus Buku
                    </button>
                </form>
            </div>

            <hr class="w-24 border-slate-200 mx-auto mb-10">

            <!-- Specs Grid -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 w-full mb-10 text-center">
                <div class="bg-slate-50 border border-slate-100 p-4 rounded-2xl">
                    <p class="text-[10px] uppercase font-bold text-slate-400 tracking-wider mb-1">Kode Dokumen</p>
                    <p class="font-black text-slate-900">{{ $book->kode_buku }}</p>
                </div>
                <div class="bg-slate-50 border border-slate-100 p-4 rounded-2xl">
                    <p class="text-[10px] uppercase font-bold text-slate-400 tracking-wider mb-1">Tahun Terbit</p>
                    <p class="font-black text-slate-900">{{ $book->tahun_terbit }}</p>
                </div>
                <div class="bg-slate-50 border border-slate-100 p-4 rounded-2xl">
                    <p class="text-[10px] uppercase font-bold text-slate-400 tracking-wider mb-1">Visibilitas Akses</p>
                    <p class="font-black text-slate-900">{{ $book->jumlah_dibaca ?? 0 }}x</p>
                </div>
                <div class="bg-slate-50 border border-slate-100 p-4 rounded-2xl">
                    <p class="text-[10px] uppercase font-bold text-slate-400 tracking-wider mb-1">Penerbit</p>
                    <p class="font-black text-slate-900 truncate" title="{{ $book->penerbit }}">{{ explode(' ', $book->penerbit)[0] ?? '-' }}...</p>
                </div>
            </div>

            <!-- Synopsis / Description -->
            <div class="w-full text-left bg-white border border-slate-200 p-8 rounded-[2rem] shadow-sm">
                <h3 class="text-xl font-black text-slate-900 mb-4 flex items-center gap-3">
                    <i class="bi bi-blockquote-left text-slate-400"></i> Abstraksi Dokumen
                </h3>
                <p class="text-slate-600 leading-relaxed text-[15px] max-w-3xl text-justify mx-auto">
                    @if($book->deskripsi)
                        {!! nl2br(e($book->deskripsi)) !!}
                    @else
                        <span class="italic text-slate-400 font-medium">Buku ini belum diberikan ringkasan abstrak yang rinci di dalam database log.</span>
                    @endif
                </p>
            </div>
        </div>
    </div>
</div>
@endsection