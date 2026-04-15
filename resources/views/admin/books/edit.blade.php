@extends('layouts.admin-theme')

@section('title', 'Edit Data Buku')

@section('content')
<div class="max-w-5xl mx-auto py-10 px-4 sm:px-6">
    <!-- Header -->
    <div class="mb-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight">Edit Buku</h1>
            <p class="text-slate-500 font-medium mt-2">Memperbarui katalog pustaka: <span class="text-slate-900 font-bold truncate">{{ $book->judul }}</span></p>
        </div>
        <a href="{{ route('admin.books.index') }}" class="inline-flex px-5 py-2.5 bg-white border border-slate-200 text-slate-600 rounded-xl hover:bg-slate-50 hover:text-slate-900 font-bold shadow-sm transition-all items-center gap-2 w-max">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>

    <!-- Form Container -->
    <div class="glass-panel p-8 sm:p-10 rounded-[2.5rem] bg-white border border-slate-200 shadow-sm relative">
        <form action="{{ route('admin.books.update', $book->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                <!-- Left Column -->
                <div class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2">
                                Kode Buku <span class="text-rose-500">*</span>
                            </label>
                            <input type="text" name="kode_buku" required
                                   class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 font-bold focus:ring-2 focus:ring-slate-900 focus:border-slate-900 outline-none transition-all shadow-sm"
                                   value="{{ old('kode_buku', $book->kode_buku) }}">
                            @error('kode_buku')
                                <p class="mt-2 text-xs font-bold text-rose-500"><i class="bi bi-exclamation-circle mr-1"></i>{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2">
                                Kategori <span class="text-rose-500">*</span>
                            </label>
                            <select name="category_id" required
                                    class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 font-bold focus:ring-2 focus:ring-slate-900 focus:border-slate-900 outline-none transition-all shadow-sm appearance-none cursor-pointer">
                                <option value="">Pilih Kategori</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->nama ?? $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="mt-2 text-xs font-bold text-rose-500"><i class="bi bi-exclamation-circle mr-1"></i>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2">
                            Judul Buku <span class="text-rose-500">*</span>
                        </label>
                        <input type="text" name="judul" required
                               class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 font-bold focus:ring-2 focus:ring-slate-900 focus:border-slate-900 outline-none transition-all shadow-sm"
                               value="{{ old('judul', $book->judul) }}">
                        @error('judul')
                            <p class="mt-2 text-xs font-bold text-rose-500"><i class="bi bi-exclamation-circle mr-1"></i>{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2">
                                Penulis <span class="text-rose-500">*</span>
                            </label>
                            <input type="text" name="penulis" required
                                   class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 font-bold focus:ring-2 focus:ring-slate-900 focus:border-slate-900 outline-none transition-all shadow-sm"
                                   value="{{ old('penulis', $book->penulis) }}">
                            @error('penulis')
                                <p class="mt-2 text-xs font-bold text-rose-500"><i class="bi bi-exclamation-circle mr-1"></i>{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2">
                                Penerbit <span class="text-rose-500">*</span>
                            </label>
                            <input type="text" name="penerbit" required
                                   class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 font-bold focus:ring-2 focus:ring-slate-900 focus:border-slate-900 outline-none transition-all shadow-sm"
                                   value="{{ old('penerbit', $book->penerbit) }}">
                            @error('penerbit')
                                <p class="mt-2 text-xs font-bold text-rose-500"><i class="bi bi-exclamation-circle mr-1"></i>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2">
                                Tahun Terbit <span class="text-rose-500">*</span>
                            </label>
                            <input type="number" name="tahun_terbit" required min="1900" max="{{ date('Y') }}"
                                   class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 font-bold focus:ring-2 focus:ring-slate-900 focus:border-slate-900 outline-none transition-all shadow-sm"
                                   value="{{ old('tahun_terbit', $book->tahun_terbit) }}">
                            @error('tahun_terbit')
                                <p class="mt-2 text-xs font-bold text-rose-500"><i class="bi bi-exclamation-circle mr-1"></i>{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2">
                                Stok Buku Fisik <span class="text-rose-500">*</span>
                            </label>
                            <input type="number" name="stok" required min="0" placeholder="0 jika hanya digital"
                                   class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 font-bold focus:ring-2 focus:ring-slate-900 focus:border-slate-900 outline-none transition-all shadow-sm"
                                   value="{{ old('stok', $book->stok) }}">
                            @error('stok')
                                <p class="mt-2 text-xs font-bold text-rose-500"><i class="bi bi-exclamation-circle mr-1"></i>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Right Column (Media & Description) -->
                <div class="space-y-6 flex flex-col justify-between">
                    <div>
                        <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2">
                            Deskripsi / Sinopsis
                        </label>
                        <textarea name="deskripsi" rows="5" placeholder="Rekam deskripsi buku di sini..."
                                  class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 font-medium focus:ring-2 focus:ring-slate-900 focus:border-slate-900 outline-none transition-all shadow-sm">{{ old('deskripsi', $book->deskripsi) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2">
                            Ganti Sampul (Opsional)
                        </label>
                        <div class="flex items-center gap-4 p-4 bg-slate-50 border border-slate-200 rounded-2xl">
                            @if($book->image)
                                <div class="w-16 h-20 rounded-lg overflow-hidden shadow-sm shrink-0 border border-slate-200">
                                    <img src="{{ asset('storage/' . $book->image) }}" class="w-full h-full object-cover">
                                </div>
                            @else
                                <div class="w-16 h-20 rounded-lg bg-slate-200 border border-slate-300 flex items-center justify-center shrink-0 shadow-inner">
                                    <i class="bi bi-journal-x text-slate-400"></i>
                                </div>
                            @endif
                            <div class="flex-grow">
                                <label for="image" class="block text-sm font-bold text-slate-900 hover:text-slate-600 cursor-pointer mb-1"><i class="bi bi-upload mr-1 text-slate-400"></i> Pilih File Sampul Baru</label>
                                <p class="text-xs font-medium text-slate-500 mb-2">Hanya unggah jika ingin mengubah sampul saat ini.</p>
                                <input type="file" id="image" class="text-xs file:bg-slate-200 file:border-0 file:rounded-md file:text-slate-700 file:font-semibold file:px-3 file:py-1 hover:file:bg-slate-300 transition-all cursor-pointer w-full text-slate-500"
                                       name="image" accept="image/*">
                            </div>
                        </div>
                        @error('image')
                            <p class="mt-2 text-xs font-bold text-rose-500"><i class="bi bi-exclamation-circle mr-1"></i>{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Submit Strip -->
            <div class="mt-10 pt-6 border-t border-slate-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.books.index') }}" class="px-6 py-3.5 bg-white border border-slate-200 text-slate-500 rounded-xl hover:bg-slate-50 hover:text-slate-900 font-bold transition-all shadow-sm">
                    Batal Edit
                </a>
                <button type="submit" class="px-8 py-3.5 bg-amber-400 text-amber-900 rounded-xl shadow-lg shadow-amber-400/20 hover:bg-amber-500 transition-all font-bold flex items-center justify-center gap-2">
                    <i class="bi bi-save mr-1"></i> Terapkan Pembaruan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection