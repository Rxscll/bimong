@extends('layouts.admin-theme')

@section('title', 'Kategori Buku')

@section('content')
<div class="max-w-3xl mx-auto py-10 px-4 sm:px-6">
    <div class="mb-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight">Kategori Baru</h1>
            <p class="text-slate-500 font-medium mt-2">Buat struktur klasifikasi kategori untuk buku.</p>
        </div>
        <a href="{{ route('admin.categories.index') }}" class="inline-flex px-5 py-2.5 bg-white border border-slate-200 text-slate-600 rounded-xl hover:bg-slate-50 hover:text-slate-900 font-bold shadow-sm transition-all items-center gap-2 w-max">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="glass-panel p-8 sm:p-10 rounded-[2.5rem] bg-white border border-slate-200 shadow-sm relative">
        <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="name" class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2">
                    Nama Kategori <span class="text-rose-500">*</span>
                </label>
                <input type="text" id="name" name="name" required placeholder="Contoh: Fiksi, Referensi Referensi, dll." autofocus
                       class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 font-bold focus:ring-2 focus:ring-slate-900 focus:border-slate-900 outline-none transition-all shadow-sm"
                       value="{{ old('name') }}">
                @error('name')
                    <p class="mt-2 text-xs font-bold text-rose-500"><i class="bi bi-exclamation-circle mr-1"></i>{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-8 pt-6 border-t border-slate-100 flex items-center gap-3">
                <button type="submit" class="px-8 py-3.5 bg-slate-900 text-white rounded-xl shadow-lg shadow-slate-900/20 hover:bg-slate-800 transition-all font-bold flex items-center justify-center gap-2">
                    <i class="bi bi-folder-plus mr-1"></i> Simpan Kategori
                </button>
                <button type="reset" class="px-6 py-3.5 bg-white border border-slate-200 text-slate-500 rounded-xl hover:bg-slate-50 hover:text-slate-900 font-bold transition-all shadow-sm">
                    Reset
                </button>
            </div>
        </form>
    </div>
</div>
@endsection