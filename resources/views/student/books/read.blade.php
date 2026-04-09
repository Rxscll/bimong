@extends('layouts.student')

@section('title', 'Baca Buku')

@section('content')
<div class="container-fluid p-6">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">{{ $book->judul }}</h1>
            <p class="text-gray-600 mt-1">Baca buku digital online</p>
        </div>
        <div class="flex space-x-4">
            <a href="{{ route('student.books.index') }}" 
               class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                <i class="bi bi-arrow-left mr-2"></i>
                Kembali
            </a>
            <form action="{{ route('student.favorites.toggle', $book->id) }}" method="POST">
                @csrf
                <button type="submit" 
                        class="px-4 py-2 {{ $book->isFavoritedBy(auth()->id()) ? 'bg-red-600 hover:bg-red-700' : 'bg-yellow-400 hover:bg-yellow-500' }} text-white rounded-lg transition-colors">
                    <i class="bi bi-{{ $book->isFavoritedBy(auth()->id()) ? 'heart-fill' : 'heart' }} mr-2"></i>
                    {{ $book->isFavoritedBy(auth()->id()) ? 'Hapus dari Favorit' : 'Tambah ke Favorit' }}
                </button>
            </form>
        </div>
    </div>

    <!-- Book Info -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 space-y-4">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Informasi Buku</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-600">Penulis</p>
                            <p class="font-medium text-gray-900">{{ $book->penulis }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Penerbit</p>
                            <p class="font-medium text-gray-900">{{ $book->penerbit }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Tahun Terbit</p>
                            <p class="font-medium text-gray-900">{{ $book->tahun_terbit }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Kategori</p>
                            <p class="font-medium text-gray-900">{{ $book->category->nama }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Kode Buku</p>
                            <p class="font-medium text-gray-900">{{ $book->kode_buku }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Jumlah Dibaca</p>
                            <p class="font-medium text-gray-900">{{ $book->jumlah_dibaca }} kali</p>
                        </div>
                    </div>
                </div>
                
                @if($book->deskripsi)
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Deskripsi</h3>
                        <p class="text-gray-700 leading-relaxed">{{ $book->deskripsi }}</p>
                    </div>
                @endif
            </div>
            
            <div>
                <img src="{{ $book->cover_url }}" alt="{{ $book->judul }}" 
                     class="w-full rounded-lg shadow-md">
            </div>
        </div>
    </div>

    <!-- PDF Reader -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="p-4 bg-gray-50 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-semibold text-gray-900">Pembaca PDF</h3>
                <div class="flex items-center space-x-4 text-sm text-gray-600">
                    <span><i class="bi bi-eye mr-1"></i> {{ $book->jumlah_dibaca }} dibaca</span>
                    <span><i class="bi bi-clock mr-1"></i> {{ now()->format('d M Y, H:i') }}</span>
                </div>
            </div>
        </div>
        
        <div class="p-4">
            <iframe src="{{ $book->pdf_url }}" 
                    width="100%" 
                    height="700px" 
                    class="border-0 rounded-lg"
                    frameborder="0">
            </iframe>
        </div>
    </div>

    <!-- Reading Tips -->
    <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-4">
        <div class="flex">
            <div class="flex-shrink-0">
                <i class="bi bi-info-circle text-blue-600 text-xl"></i>
            </div>
            <div class="ml-3">
                <h4 class="text-sm font-semibold text-blue-900 mb-1">Tips Membaca</h4>
                <ul class="text-sm text-blue-800 space-y-1">
                    <li>• Gunakan scroll untuk navigasi halaman</li>
                    <li>• Zoom in/out untuk kenyamanan membaca</li>
                    <li>• Progress membaca akan tersimpan otomatis</li>
                    <li>• Tambahkan ke favorit untuk akses cepat</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
