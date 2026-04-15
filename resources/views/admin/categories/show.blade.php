@extends('layouts.admin-theme')

@section('title', 'Detail Kategori')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-black text-slate-900 tracking-tight">Detail Kategori</h1>
            <p class="text-slate-500 font-medium mt-1">Koleksi buku pada rincian kategori <span class="text-slate-900 font-bold capitalize">{{ $category->name ?? $category->nama ?? 'Tak Diketahui' }}</span>.</p>
        </div>
        <div>
            <a href="{{ route('admin.categories.index') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-white border border-slate-200 rounded-xl text-slate-600 font-bold hover:bg-slate-50 hover:text-slate-900 transition-colors shadow-sm border-b-4 hover:translate-y-[2px] hover:border-b-2 active:border-b-0 active:translate-y-[4px]">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>

    <!-- Content Panel -->
    <div class="glass-panel p-8 rounded-[2rem] bg-white border border-slate-200 shadow-sm">
        <div class="flex items-center justify-between mb-8 pb-4 border-b border-slate-100">
            <h2 class="text-2xl font-black text-slate-800 flex items-center gap-3">
                <i class="bi bi-tags-fill text-indigo-500 drop-shadow-sm"></i> {{ $category->name ?? $category->nama }}
            </h2>
            <a href="{{ route('admin.categories.edit', $category->id) }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-amber-400 text-amber-900 shadow-lg shadow-amber-400/20 font-bold rounded-xl hover:bg-amber-300 transition-all border-b-4 border-amber-500 hover:translate-y-[2px] hover:border-b-2 active:border-b-0 active:translate-y-[4px]">
                <i class="bi bi-pencil-square"></i> Edit
            </a>
        </div>

        <h3 class="text-xs font-bold text-slate-500 uppercase tracking-widest mb-4">Daftar Buku Terkait</h3>
        
        <div class="overflow-x-auto rounded-xl border border-slate-200">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-slate-600 text-xs uppercase tracking-wider font-bold">
                        <th class="p-4 rounded-tl-xl whitespace-nowrap">Kode</th>
                        <th class="p-4 min-w-[200px]">Judul</th>
                        <th class="p-4 min-w-[150px]">Penulis</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($category->books as $book)
                        <tr class="hover:bg-slate-50 transition-colors group">
                            <td class="p-4 text-xs font-bold text-slate-500 whitespace-nowrap">{{ $book->kode_buku }}</td>
                            <td class="p-4 font-bold text-slate-900">{{ $book->judul }}</td>
                            <td class="p-4 text-sm font-medium text-slate-500">{{ $book->penulis }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="p-12 text-center text-slate-400 font-medium">
                                <i class="bi bi-journal-x text-4xl block mb-3 text-slate-300"></i>
                                Belum ada buku yang didaftarkan dalam kategori ini.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection