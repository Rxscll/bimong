@extends('layouts.admin-theme')

@section('title', 'Tambah Buku Digital')

@section('content')
<div class="max-w-5xl mx-auto py-10 px-4 sm:px-6">
    <!-- Header -->
    <div class="mb-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight">Tambah Buku Baru</h1>
            <p class="text-slate-500 font-medium mt-2">Daftarkan koleksi buku digital atau fisik ke dalam sistem perpustakaan.</p>
        </div>
        <a href="{{ route('admin.books.index') }}" class="inline-flex px-5 py-2.5 bg-white border border-slate-200 text-slate-600 rounded-xl hover:bg-slate-50 hover:text-slate-900 font-bold shadow-sm transition-all items-center gap-2 w-max">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>

    <!-- Form Container -->
    <div class="glass-panel p-8 sm:p-10 rounded-[2.5rem] bg-white border border-slate-200 shadow-sm relative">
        <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                <!-- Left Column -->
                <div class="space-y-6">
                    <div>
                        <label for="judul" class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2">
                            Judul Buku <span class="text-rose-500">*</span>
                        </label>
                        <input type="text" id="judul" name="judul" required placeholder="Masukkan judul lengkap"
                               class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 font-bold focus:ring-2 focus:ring-slate-900 focus:border-slate-900 outline-none transition-all shadow-sm"
                               value="{{ old('judul') }}">
                        @error('judul')
                            <p class="mt-2 text-xs font-bold text-rose-500"><i class="bi bi-exclamation-circle mr-1"></i>{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="penulis" class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2">
                                Penulis <span class="text-rose-500">*</span>
                            </label>
                            <input type="text" id="penulis" name="penulis" required placeholder="Nama penulis utama"
                                   class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 font-bold focus:ring-2 focus:ring-slate-900 focus:border-slate-900 outline-none transition-all shadow-sm"
                                   value="{{ old('penulis') }}">
                            @error('penulis')
                                <p class="mt-2 text-xs font-bold text-rose-500"><i class="bi bi-exclamation-circle mr-1"></i>{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="penerbit" class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2">
                                Penerbit <span class="text-rose-500">*</span>
                            </label>
                            <input type="text" id="penerbit" name="penerbit" required placeholder="Instansi / Penerbit"
                                   class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 font-bold focus:ring-2 focus:ring-slate-900 focus:border-slate-900 outline-none transition-all shadow-sm"
                                   value="{{ old('penerbit') }}">
                            @error('penerbit')
                                <p class="mt-2 text-xs font-bold text-rose-500"><i class="bi bi-exclamation-circle mr-1"></i>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="tahun_terbit" class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2">
                                Tahun Terbit <span class="text-rose-500">*</span>
                            </label>
                            <input type="number" id="tahun_terbit" name="tahun_terbit" required min="1900" max="{{ date('Y') }}" placeholder="{{ date('Y') }}"
                                   class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 font-bold focus:ring-2 focus:ring-slate-900 focus:border-slate-900 outline-none transition-all shadow-sm"
                                   value="{{ old('tahun_terbit') }}">
                            @error('tahun_terbit')
                                <p class="mt-2 text-xs font-bold text-rose-500"><i class="bi bi-exclamation-circle mr-1"></i>{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="category_id" class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2">
                                Kategori Spesifik <span class="text-rose-500">*</span>
                            </label>
                            <select id="category_id" name="category_id" required
                                    class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 font-bold focus:ring-2 focus:ring-slate-900 focus:border-slate-900 outline-none transition-all shadow-sm appearance-none cursor-pointer">
                                <option value="" disabled {{ !old('category_id') ? 'selected' : '' }}>Pilih Label Kategori</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                        <label for="deskripsi" class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2">
                            Sinopsis Buku
                        </label>
                        <textarea id="deskripsi" name="deskripsi" rows="5" placeholder="Tuliskan latar belakang atau ringkasan dokumen"
                                  class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 font-medium focus:ring-2 focus:ring-slate-900 focus:border-slate-900 outline-none transition-all shadow-sm">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <p class="mt-2 text-xs font-bold text-rose-500"><i class="bi bi-exclamation-circle mr-1"></i>{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Right Column (Media) -->
                <div class="space-y-6">
                    <!-- Cover -->
                    <div>
                        <label for="cover" class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2">
                            Sampul Buku (Cover)
                        </label>
                        <div class="mt-1 flex flex-col items-center justify-center p-8 bg-slate-50 border-2 border-slate-200 border-dashed rounded-2xl hover:border-slate-400 hover:bg-slate-100 transition-all cursor-pointer relative" onclick="document.getElementById('cover').click()">
                            <i class="bi bi-image text-4xl text-slate-300 mb-3 block"></i>
                            <p class="text-sm font-bold text-slate-900">Klik untuk mencari file cover</p>
                            <p class="text-xs font-medium text-slate-500 mt-1">PNG, JPG, JPEG hingga 2MB</p>
                            <input id="cover" name="cover" type="file" class="hidden" accept="image/*">
                        </div>
                        @error('cover')
                            <p class="mt-2 text-xs font-bold text-rose-500"><i class="bi bi-exclamation-circle mr-1"></i>{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- PDF -->
                    <div>
                        <label for="file_pdf" class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2">
                            Dokumen Bacaan (E-Book)
                        </label>
                        <div class="relative bg-amber-50 border border-amber-200 rounded-2xl p-4 mb-3 flex items-start gap-3">
                            <i class="bi bi-info-circle-fill text-amber-500 mt-0.5"></i>
                            <p class="text-[11px] text-amber-700 font-medium">Buku tanpa PDF akan dicatat dalam database sebagai buku fisik murni/referensi pustaka cetak di perpustakaan.</p>
                        </div>
                        <div class="mt-1 flex flex-col items-center justify-center p-8 bg-slate-50 border-2 border-slate-200 border-dashed rounded-2xl hover:border-slate-400 hover:bg-slate-100 transition-all cursor-pointer relative" onclick="document.getElementById('file_pdf').click()">
                            <i class="bi bi-file-earmark-pdf text-4xl text-slate-300 mb-3 block"></i>
                            <p class="text-sm font-bold text-slate-900">Upload format PDF</p>
                            <p class="text-xs font-medium text-slate-500 mt-1">Batas ukuran file hingga 10MB</p>
                            <input id="file_pdf" name="file_pdf" type="file" class="hidden" accept=".pdf">
                        </div>
                        @error('file_pdf')
                            <p class="mt-2 text-xs font-bold text-rose-500"><i class="bi bi-exclamation-circle mr-1"></i>{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Submit Strip -->
            <div class="mt-10 pt-6 border-t border-slate-100 flex items-center justify-end gap-3">
                <button type="reset" class="px-6 py-3.5 bg-white border border-slate-200 text-slate-500 rounded-xl hover:bg-slate-50 hover:text-slate-900 font-bold transition-all shadow-sm">
                    Reset Kolom
                </button>
                <button type="submit" class="px-8 py-3.5 bg-slate-900 text-white rounded-xl shadow-lg shadow-slate-900/20 hover:bg-slate-800 transition-all font-bold flex items-center justify-center gap-2">
                    <i class="bi bi-save mr-1"></i> Daftarkan Buku Baru
                </button>
            </div>
        </form>
    </div>
</div>
@endsection