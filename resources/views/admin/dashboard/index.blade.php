@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container-fluid p-6">
    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Books -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-blue-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 font-medium">Total Buku</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $totalBooks }}</p>
                </div>
                <div class="bg-blue-100 rounded-full p-3">
                    <i class="bi bi-book text-blue-600 text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Total Users -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-green-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 font-medium">Total Siswa</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $totalUsers }}</p>
                </div>
                <div class="bg-green-100 rounded-full p-3">
                    <i class="bi bi-people text-green-600 text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Reading Sessions -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-purple-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 font-medium">Sesi Membaca</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $totalReadingSessions }}</p>
                </div>
                <div class="bg-purple-100 rounded-full p-3">
                    <i class="bi bi-eye text-purple-600 text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Categories -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-orange-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 font-medium">Kategori</p>
                    <p class="text-2xl font-bold text-gray-900">{{ \App\Models\Category::count() }}</p>
                </div>
                <div class="bg-orange-100 rounded-full p-3">
                    <i class="bi bi-tags text-orange-600 text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Popular Books -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                <i class="bi bi-fire text-orange-500 mr-2"></i>
                Buku Populer
            </h3>
            <div class="space-y-3">
                @forelse($popularBooks as $book)
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                        <div class="flex-1">
                            <h4 class="font-medium text-gray-900">{{ Str::limit($book->judul, 30) }}</h4>
                            <p class="text-sm text-gray-600">{{ $book->penulis }}</p>
                        </div>
                        <div class="text-right">
                            <span class="text-sm font-semibold text-blue-600">{{ $book->jumlah_dibaca }} dibaca</span>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 text-center py-4">Belum ada buku yang dibaca</p>
                @endforelse
            </div>
        </div>

        <!-- Recent Books -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                <i class="bi bi-clock-history text-blue-500 mr-2"></i>
                Buku Terbaru
            </h3>
            <div class="space-y-3">
                @forelse($recentBooks as $book)
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                        <div class="flex-1">
                            <h4 class="font-medium text-gray-900">{{ Str::limit($book->judul, 30) }}</h4>
                            <p class="text-sm text-gray-600">{{ $book->penulis }}</p>
                        </div>
                        <div class="text-right">
                            <span class="text-xs text-gray-500">{{ $book->created_at->format('d M Y') }}</span>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 text-center py-4">Belum ada buku</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="mt-8 bg-white rounded-lg shadow-md p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Aksi Cepat</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <a href="{{ route('admin.books.create') }}" 
               class="flex items-center p-4 bg-blue-50 text-blue-700 rounded-lg hover:bg-blue-100 transition-colors">
                <i class="bi bi-plus-circle mr-3 text-xl"></i>
                <span class="font-medium">Tambah Buku</span>
            </a>
            <a href="{{ route('admin.categories.create') }}" 
               class="flex items-center p-4 bg-green-50 text-green-700 rounded-lg hover:bg-green-100 transition-colors">
                <i class="bi bi-tag mr-3 text-xl"></i>
                <span class="font-medium">Kategori Baru</span>
            </a>
            <a href="{{ route('admin.reading-history.index') }}" 
               class="flex items-center p-4 bg-purple-50 text-purple-700 rounded-lg hover:bg-purple-100 transition-colors">
                <i class="bi bi-clock-history mr-3 text-xl"></i>
                <span class="font-medium">Riwayat Membaca</span>
            </a>
            <a href="{{ route('admin.students.create') }}" 
               class="flex items-center p-4 bg-orange-50 text-orange-700 rounded-lg hover:bg-orange-100 transition-colors">
                <i class="bi bi-person-plus mr-3 text-xl"></i>
                <span class="font-medium">Siswa Baru</span>
            </a>
        </div>
    </div>
</div>
@endsection