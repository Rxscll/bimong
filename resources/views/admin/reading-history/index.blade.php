@extends('layouts.admin')

@section('title', 'Riwayat Membaca')

@section('content')
<div class="container-fluid p-6">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Riwayat Membaca</h1>
            <p class="text-gray-600 mt-1">Lihat riwayat membaca buku oleh siswa</p>
        </div>
    </div>

    <!-- Search and Filter -->
    <div class="bg-white rounded-lg shadow-md p-4 mb-6">
        <form method="GET" class="flex flex-col md:flex-row gap-4">
            <div class="flex-1">
                <input type="text" name="search" value="{{ request('search') }}" 
                       placeholder="Cari siswa atau buku..." 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <button type="submit" 
                    class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200 transition-colors">
                <i class="bi bi-search"></i>
                Cari
            </button>
        </form>
    </div>

    <!-- Reading History Table -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Siswa</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Buku</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Waktu Baca</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Durasi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($readingHistories as $history)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900">{{ $history->user->name }}</div>
                                <div class="text-sm text-gray-500">{{ $history->user->email }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900">{{ $history->book->judul }}</div>
                                <div class="text-sm text-gray-500">{{ $history->book->kode_buku }}</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                {{ $history->created_at->format('d M Y H:i') }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                @if($history->duration)
                                    {{ $history->duration }} menit
                                @else
                                    <span class="text-gray-500">-</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm font-medium">
                                <a href="{{ route('admin.books.show', $history->book->id) }}" 
                                   class="text-blue-600 hover:text-blue-900">
                                    <i class="bi bi-eye"></i> Lihat Buku
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                <div class="py-8">
                                    <i class="bi bi-clock-history text-4xl text-gray-300 mb-4 block"></i>
                                    <p class="text-lg font-medium">Belum ada riwayat membaca</p>
                                    <p class="text-gray-500">Riwayat membaca akan muncul di sini saat siswa mulai membaca buku</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        @if($readingHistories->hasPages())
            <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                <div class="flex items-center justify-between">
                    <div class="text-sm text-gray-700">
                        Menampilkan {{ $readingHistories->firstItem() }} hingga {{ $readingHistories->lastItem() }} dari {{ $readingHistories->total() }} riwayat
                    </div>
                    {{ $readingHistories->links() }}
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
