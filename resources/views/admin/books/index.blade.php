@extends('layouts.admin-theme')

@section('title', 'Kelola Buku Digital')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Header -->
    <div class="mb-10 flex flex-col md:flex-row md:items-end justify-between gap-6 pl-4 lg:pl-0">
        <div>
            <p class="text-slate-500 text-sm font-bold tracking-widest uppercase mb-2">Manajemen Konten</p>
            <h1 class="text-4xl md:text-5xl font-black text-slate-900 tracking-tight">Katalog <span class="text-slate-500">Buku Digital</span></h1>
            <p class="text-slate-600 font-medium mt-3 text-lg">Kelola dan update koleksi pustaka yang tersedia untuk siswa.</p>
        </div>
        <div>
            <a href="{{ route('admin.books.create') }}" class="inline-flex items-center gap-2 px-6 py-4 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-2xl shadow-lg shadow-blue-600/20 hover:shadow-blue-600/40 transition-all">
                <i class="bi bi-plus-lg text-lg"></i> Tambah Buku Baru
            </a>
        </div>
    </div>

    <!-- Search and Filter Panel -->
    <div class="glass-panel rounded-[2rem] p-6 mb-10 bg-white border border-slate-200">
        <form method="GET" class="flex flex-col md:flex-row gap-5">
            <div class="flex-1 relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <i class="bi bi-search text-slate-400"></i>
                </div>
                <input type="text" name="search" value="{{ request('search') }}" 
                       placeholder="Cari preferensi judul, kode buku, atau penulis..." 
                       class="w-full pl-11 pr-5 py-3.5 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-600 focus:border-blue-600 text-slate-900 placeholder-slate-400 font-medium transition-all shadow-sm">
            </div>
            <div class="md:w-72 relative">
                <select name="category_id" 
                        class="w-full pl-5 pr-10 py-3.5 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-600 focus:border-blue-600 text-slate-900 font-medium transition-all appearance-none cursor-pointer shadow-sm">
                    <option value="">Semua Kategori</option>
                    @foreach(\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->nama ?? $category->name }}
                        </option>
                    @endforeach
                </select>
                <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                    <i class="bi bi-chevron-down text-slate-400"></i>
                </div>
            </div>
            <button type="submit" 
                    class="bg-slate-900 hover:bg-slate-800 text-white px-8 py-3.5 rounded-xl shadow-lg shadow-slate-900/20 hover:shadow-slate-900/40 transition-all font-bold flex items-center justify-center gap-2">
                Filter Data
            </button>
        </form>
    </div>

    <!-- Data Table -->
    <div class="glass-panel overflow-hidden rounded-[2rem] bg-white border border-slate-200">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 uppercase tracking-wider text-[11px] sm:text-xs">
                        <th class="px-6 py-5 text-slate-500 font-bold w-20 text-center border-r border-slate-100">Cover</th>
                        <th class="px-6 py-5 text-slate-500 font-bold">Judul & Kode</th>
                        <th class="px-6 py-5 text-slate-500 font-bold">Penerbitan</th>
                        <th class="px-6 py-5 text-slate-500 font-bold text-center">Status File</th>
                        <th class="px-6 py-5 text-slate-500 font-bold text-center w-32 border-l border-slate-100">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($books as $book)
                        <tr class="hover:bg-slate-50/50 transition-colors group">
                            <!-- Cover -->
                            <td class="px-6 py-5 border-r border-slate-50 text-center">
                                <div class="w-12 h-16 bg-slate-100 rounded-lg overflow-hidden border border-slate-200 mx-auto group-hover:shadow-md transition-shadow inline-block relative">
                                    <img src="{{ $book->cover_url }}" alt="{{ $book->judul }}" class="w-full h-full object-cover">
                                    <div class="absolute inset-0 bg-slate-900/5"></div>
                                </div>
                            </td>
                            
                            <!-- Book Info -->
                            <td class="px-6 py-5 max-w-sm">
                                <h3 class="text-base font-bold text-slate-900 mb-1 truncate" title="{{ $book->judul }}">{{ $book->judul }}</h3>
                                <div class="flex items-center gap-3">
                                    <span class="text-xs font-bold text-slate-400 flex items-center bg-white border border-slate-200 px-2.5 py-0.5 rounded shadow-sm">
                                        <i class="bi bi-hash"></i>{{ $book->kode_buku }}
                                    </span>
                                    <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-slate-100 text-slate-600 border border-slate-200 uppercase tracking-wider">
                                        {{ $book->category->nama ?? $book->category->name ?? 'Tak Berkategori' }}
                                    </span>
                                </div>
                            </td>
                            
                            <!-- Author -->
                            <td class="px-6 py-5">
                                <p class="text-sm font-bold text-slate-700 mb-1 truncate">{{ $book->penulis }}</p>
                                <span class="text-xs font-bold text-slate-500">
                                    <i class="bi bi-eye mr-1"></i> Dibaca: <span class="text-slate-900">{{ $book->jumlah_dibaca ?? 0 }}x</span>
                                </span>
                            </td>
                            
                            <!-- Status -->
                            <td class="px-6 py-5 text-center">
                                @if($book->file_pdf)
                                    <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-xs font-bold bg-green-50 text-green-700 border border-green-200">
                                        <i class="bi bi-file-earmark-pdf-fill mr-1.5"></i>Tersedia PDF
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-xs font-bold bg-slate-100 text-slate-500 border border-slate-200">
                                        <i class="bi bi-journal mr-1.5"></i>PDF Belum Tersedia
                                    </span>
                                @endif
                            </td>
                            
                            <!-- Actions -->
                            <td class="px-6 py-5 border-l border-slate-50 align-middle">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.books.show', $book->id) }}"
                                        class="p-2 text-slate-500 hover:text-blue-600 bg-white border border-slate-200 hover:border-blue-300 shadow-sm rounded-lg transition-all tooltip" title="Detail">
                                        <i class="bi bi-info-circle"></i>
                                    </a>
                                    <a href="{{ route('admin.books.edit', $book->id) }}"
                                        class="p-2 text-slate-500 hover:text-amber-600 bg-white border border-slate-200 hover:border-amber-300 shadow-sm rounded-lg transition-all tooltip" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST"
                                        class="inline-block m-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-rose-500 bg-white border border-slate-200 hover:bg-rose-500 hover:text-white hover:border-rose-500 shadow-sm rounded-lg transition-all tooltip" title="Hapus"
                                            onclick="return confirm('Menghapus {{ $book->judul }}. Tindakan ini tidak dapat dibatalkan. Lanjutkan?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-8 py-24 text-center">
                                <div class="w-20 h-20 bg-slate-50 border border-slate-100 rounded-full flex items-center justify-center mx-auto mb-6 shadow-sm shadow-slate-200/50">
                                    <i class="bi bi-journal-x text-4xl text-slate-300"></i>
                                </div>
                                <h3 class="text-2xl font-black text-slate-900 mb-2">Buku tidak ditemukan</h3>
                                <p class="text-lg font-medium text-slate-500 max-w-md mx-auto">Kami tidak menemukan data buku yang sesuai dengan pencarian Anda saat ini.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($books->hasPages())
            <div class="px-8 py-6 bg-slate-50 flex items-center justify-between border-t border-slate-200">
                <div class="text-sm font-bold text-slate-500 hidden sm:block">
                    Menampilkan <span class="text-slate-900">{{ $books->firstItem() }}</span> ke <span class="text-slate-900">{{ $books->lastItem() }}</span> dari <span class="text-slate-900">{{ $books->total() }}</span> entri
                </div>
                <div class="user-pagination">
                    {{ $books->links() }}
                </div>
            </div>
        @endif
    </div>
</div>

<style>
.user-pagination nav div.hidden.sm\:flex-1 { display: none !important; }
</style>
@endsection