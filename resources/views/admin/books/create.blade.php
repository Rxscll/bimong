@extends('layouts.admin')

@section('title', 'Tambah Buku Digital')

@section('content')
<div class="container-fluid p-6">
    <div class="max-w-2xl mx-auto">
        <!-- Header -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Tambah Buku Digital</h1>
            <p class="text-gray-600 mt-1">Upload buku digital baru ke perpustakaan</p>
        </div>

        <!-- Form -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <!-- Judul -->
                        <div>
                            <label for="judul" class="block text-sm font-medium text-gray-700 mb-2">
                                Judul Buku <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="judul" name="judul" required
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                   value="{{ old('judul') }}">
                            @error('judul')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Penulis -->
                        <div>
                            <label for="penulis" class="block text-sm font-medium text-gray-700 mb-2">
                                Penulis <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="penulis" name="penulis" required
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                   value="{{ old('penulis') }}">
                            @error('penulis')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Penerbit -->
                        <div>
                            <label for="penerbit" class="block text-sm font-medium text-gray-700 mb-2">
                                Penerbit <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="penerbit" name="penerbit" required
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                   value="{{ old('penerbit') }}">
                            @error('penerbit')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Tahun Terbit -->
                        <div>
                            <label for="tahun_terbit" class="block text-sm font-medium text-gray-700 mb-2">
                                Tahun Terbit <span class="text-red-500">*</span>
                            </label>
                            <input type="number" id="tahun_terbit" name="tahun_terbit" required
                                   min="1900" max="{{ date('Y') }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                   value="{{ old('tahun_terbit') }}">
                            @error('tahun_terbit')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Kategori -->
                        <div>
                            <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">
                                Kategori <span class="text-red-500">*</span>
                            </label>
                            <select id="category_id" name="category_id" required
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="">Pilih Kategori</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <!-- Deskripsi -->
                        <div>
                            <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">
                                Deskripsi
                            </label>
                            <textarea id="deskripsi" name="deskripsi" rows="4"
                                      class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Cover -->
                        <div>
                            <label for="cover" class="block text-sm font-medium text-gray-700 mb-2">
                                Cover Buku
                            </label>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-gray-400 transition-colors">
                                <div class="space-y-1 text-center">
                                    <i class="bi bi-image mx-auto text-3xl text-gray-400"></i>
                                    <div class="flex text-sm text-gray-600">
                                        <label for="cover" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                            <span>Upload file</span>
                                            <input id="cover" name="cover" type="file" class="sr-only" accept="image/*">
                                        </label>
                                        <p class="pl-1">atau drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, GIF hingga 2MB</p>
                                </div>
                            </div>
                            @error('cover')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- PDF File -->
                        <div>
                            <label for="file_pdf" class="block text-sm font-medium text-gray-700 mb-2">
                                File PDF <span class="text-red-500">*</span>
                            </label>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-gray-400 transition-colors">
                                <div class="space-y-1 text-center">
                                    <i class="bi bi-file-pdf mx-auto text-3xl text-gray-400"></i>
                                    <div class="flex text-sm text-gray-600">
                                        <label for="file_pdf" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                            <span>Upload file</span>
                                            <input id="file_pdf" name="file_pdf" type="file" class="sr-only" accept=".pdf" required>
                                        </label>
                                        <p class="pl-1">atau drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">PDF hingga 10MB</p>
                                </div>
                            </div>
                            @error('file_pdf')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="mt-8 flex justify-end space-x-4">
                    <a href="{{ route('admin.books.index') }}" 
                       class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Batal
                    </a>
                    <button type="submit" 
                            class="px-4 py-2 border border-transparent rounded-lg shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <i class="bi bi-save mr-2"></i>
                        Simpan Buku
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection