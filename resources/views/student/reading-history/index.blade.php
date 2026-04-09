@extends('layouts.student')

@section('title', 'Riwayat Membaca')

@section('content')
<div class="container-fluid p-6">
    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Riwayat Membaca</h1>
        <p class="text-gray-600 mt-1">Histori buku yang telah Anda baca</p>
    </div>

    <!-- Reading History -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cover</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul Buku</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Penulis</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Halaman Terakhir</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Baca</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($readingHistories as $history)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <img src="{{ $history->book->cover_url }}" alt="{{ $history->book->judul }}" 
                                     class="h-12 w-10 object-cover rounded">
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900">{{ $history->book->judul }}</div>
                                <div class="text-sm text-gray-500">{{ $history->book->kode_buku }}</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $history->book->penulis }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                {{ $history->last_page ?? '-' }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $history->created_at->format('d M Y, H:i') }}</td>
                            <td class="px-6 py-4 text-sm font-medium">
                                <div class="flex space-x-2">
                                    @if($history->book->file_pdf)
                                        <a href="{{ route('student.books.read', $history->book->id) }}" 
                                           class="text-blue-600 hover:text-blue-900">
                                            <i class="bi bi-book"></i>
                                        </a>
                                    @endif
                                    <a href="{{ route('student.books.show', $history->book->id) }}" 
                                       class="text-indigo-600 hover:text-indigo-900">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                <div class="py-8">
                                    <i class="bi bi-clock-history text-4xl text-gray-300 mb-4 block"></i>
                                    <p class="text-lg font-medium">Belum ada riwayat membaca</p>
                                    <p class="text-gray-500">Mulai membaca buku untuk melihat riwayat Anda</p>
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
