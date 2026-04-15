@extends('layouts.admin-theme')

@section('title', 'Kategori Buku')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Header -->
    <div class="mb-12 flex flex-col md:flex-row md:items-end justify-between gap-6 pl-4 lg:pl-0">
        <div>
            <p class="text-slate-500 text-sm font-bold tracking-widest uppercase mb-2">Manajemen Konten</p>
            <h1 class="text-4xl md:text-5xl font-black text-slate-900 tracking-tight">Kategori <span class="text-slate-500">Buku</span></h1>
            <p class="text-slate-600 font-medium mt-3 text-lg">Kelola klasifikasi kategori untuk mempermudah navigasi siswa.</p>
        </div>
        <div>
            <a href="{{ route('admin.categories.create') }}" class="inline-flex items-center gap-2 px-6 py-4 bg-slate-900 hover:bg-slate-800 text-white font-bold rounded-2xl shadow-lg shadow-slate-900/20 hover:shadow-slate-900/40 transition-all">
                <i class="bi bi-plus-lg"></i> Tambah Kategori
            </a>
        </div>
    </div>

    <div class="glass-panel overflow-hidden rounded-[2rem] bg-white border border-slate-200">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 uppercase tracking-wider text-xs">
                        <th class="px-8 py-5 text-slate-500 font-bold w-32 border-r border-slate-100">ID</th>
                        <th class="px-8 py-5 text-slate-500 font-bold">Nama Kategori</th>
                        <th class="px-8 py-5 text-slate-500 font-bold w-48 text-center">Jumlah Buku</th>
                        <th class="px-8 py-5 text-slate-500 font-bold w-32 text-center border-l border-slate-100">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($categories as $category)
                        <tr class="hover:bg-slate-50/50 transition-colors group">
                            <td class="px-8 py-6 border-r border-slate-50">
                                <span class="text-slate-400 font-bold">#{{ str_pad($category->id, 3, '0', STR_PAD_LEFT) }}</span>
                            </td>
                            <td class="px-8 py-6">
                                <span class="text-lg font-bold text-slate-900">{{ $category->nama ?? $category->name }}</span>
                            </td>
                            <td class="px-8 py-6 text-center">
                                <span class="inline-flex items-center px-4 py-1.5 rounded-lg text-sm font-bold bg-slate-100 text-slate-700 border border-slate-200">
                                    {{ $category->books_count ?? $category->books->count() }} Buku
                                </span>
                            </td>
                            <td class="px-8 py-6 border-l border-slate-50 align-middle">
                                <div class="flex items-center justify-center gap-3">
                                    <a href="{{ route('admin.categories.edit', $category->id) }}"
                                        class="p-2.5 text-slate-500 hover:text-slate-900 bg-white border border-slate-200 hover:border-slate-300 shadow-sm rounded-xl transition-all tooltip" title="Ubah Info">
                                        <i class="bi bi-pencil-square text-lg"></i>
                                    </a>
                                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST"
                                        class="inline-block m-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2.5 text-rose-500 hover:text-white bg-white hover:bg-rose-500 border border-slate-200 hover:border-rose-500 shadow-sm rounded-xl transition-all tooltip" title="Hapus Kategori"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini? Semua buku dalam kategori ini akan terpengaruh.')">
                                            <i class="bi bi-trash text-lg"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-8 py-20 text-center">
                                <div class="w-20 h-20 bg-slate-50 border border-slate-100 rounded-full flex items-center justify-center mx-auto mb-5 shadow-sm">
                                    <i class="bi bi-tags text-4xl text-slate-300"></i>
                                </div>
                                <h3 class="text-2xl font-black text-slate-900 mb-2">Belum ada kategori buku</h3>
                                <p class="text-lg font-medium text-slate-500">Buat klasifikasi sekarang untuk mengorganisasi koleksi Anda.</p>
                                <a href="{{ route('admin.categories.create') }}" class="inline-block mt-8 px-8 py-4 bg-slate-900 font-bold shadow-lg shadow-slate-900/20 text-white rounded-full hover:bg-slate-800 transition-all">Tambah Kategori Perdana</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($categories->hasPages())
            <div class="px-8 py-6 bg-slate-50 flex items-center justify-between border-t border-slate-200">
                <div class="text-sm font-bold text-slate-500 hidden sm:block">
                    Hal <span class="text-slate-900">{{ $categories->currentPage() }}</span> dari <span class="text-slate-900">{{ $categories->lastPage() }}</span>
                </div>
                <div class="user-pagination">
                    {{ $categories->links() }}
                </div>
            </div>
        @endif
    </div>
</div>

<style>
.user-pagination nav div.hidden.sm\:flex-1 { display: none !important; }
</style>
@endsection