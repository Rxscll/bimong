@extends('layouts.student-theme')

@section('title', 'Riwayat Membaca')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Header -->
    <div class="mb-12 pl-4 lg:pl-0">
        <p class="text-slate-500 text-sm font-bold tracking-widest uppercase mb-2">Aktivitas</p>
        <h1 class="text-4xl md:text-5xl font-black text-slate-900 tracking-tight">Riwayat <span class="text-slate-500">Membaca</span></h1>
        <p class="text-slate-600 font-medium mt-3 text-lg">Histori buku dan catatan bacaan Anda.</p>
    </div>

    <!-- Reading History List -->
    <div class="glass-panel overflow-hidden rounded-[2rem] bg-white border border-slate-200">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 uppercase tracking-wider text-[10px] sm:text-xs">
                        <th class="px-8 py-5 text-slate-500 font-bold">Cover</th>
                        <th class="px-8 py-5 text-slate-500 font-bold">Identitas Buku</th>
                        <th class="px-8 py-5 text-slate-500 font-bold">Informasi</th>
                        <th class="px-8 py-5 text-slate-500 font-bold">Waktu Akses</th>
                        <th class="px-8 py-5 text-slate-500 font-bold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 border-b border-slate-200">
                    @forelse($readingHistories as $history)
                        <tr class="hover:bg-slate-50/50 transition-colors group">
                            <!-- Cover -->
                            <td class="px-8 py-6 whitespace-nowrap w-24">
                                <div class="relative w-16 h-24 bg-slate-100 rounded-xl overflow-hidden border border-slate-200 shadow-sm group-hover:shadow-md transition-all">
                                    <img src="{{ $history->book->cover_url }}" alt="{{ $history->book->judul }}" class="w-full h-full object-cover">
                                </div>
                            </td>
                            <!-- Book details -->
                            <td class="px-8 py-6 max-w-xs">
                                <h3 class="text-base font-bold text-slate-900 mb-1.5">{{ $history->book->judul }}</h3>
                                <p class="text-xs font-bold text-slate-400"><i class="bi bi-hash"></i>{{ $history->book->kode_buku }}</p>
                                @if(!$history->book->file_pdf)
                                    <span class="mt-3 inline-flex items-center px-2 py-1 rounded text-[10px] font-bold bg-slate-100 text-slate-500 border border-slate-200 uppercase tracking-widest">
                                        Fisik Saja
                                    </span>
                                @endif
                            </td>
                            <!-- Author & Halaman -->
                            <td class="px-8 py-6">
                                <div class="text-sm font-bold text-slate-600 mb-1.5">{{ $history->book->penulis }}</div>
                                <div class="text-xs font-medium text-slate-400 bg-white border border-slate-200 px-2.5 py-1 rounded-md inline-block shadow-sm">
                                    Hal: <span class="text-slate-900 font-bold ml-1">{{ $history->last_page ?? '-' }}</span>
                                </div>
                            </td>
                            <!-- Date -->
                            <td class="px-8 py-6">
                                <div class="text-sm font-bold text-slate-900 mb-1">{{ $history->created_at->format('d M Y') }}</div>
                                <div class="text-xs font-medium text-slate-400">{{ $history->created_at->format('H:i') }} WIB</div>
                            </td>
                            <!-- Actions -->
                            <td class="px-8 py-6 align-middle">
                                <div class="flex items-center justify-center gap-3">
                                    <a href="{{ route('student.books.show', $history->book->id) }}" 
                                       class="p-2.5 text-slate-500 hover:text-slate-900 bg-white border border-slate-200 hover:border-slate-300 shadow-sm rounded-xl transition-all tooltip" title="Detail">
                                        <i class="bi bi-info-circle text-lg"></i>
                                    </a>
                                    
                                    @if($history->book->file_pdf)
                                        <a href="{{ route('student.books.read', $history->book->id) }}" 
                                           class="p-2.5 text-white bg-slate-900 hover:bg-slate-800 shadow-sm rounded-xl transition-all tooltip" title="Lanjut Baca">
                                            <i class="bi bi-book text-lg"></i>
                                        </a>
                                    @else
                                        <button disabled 
                                           class="p-2.5 text-slate-400 bg-slate-100 border border-slate-200 rounded-xl cursor-not-allowed tooltip" title="Buku fisik tidak dapat dibaca online">
                                            <i class="bi bi-dash-circle text-lg"></i>
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-8 py-20 text-center">
                                <div class="w-20 h-20 bg-slate-50 border border-slate-100 rounded-full flex items-center justify-center mx-auto mb-5 shadow-sm">
                                    <i class="bi bi-clock-history text-4xl text-slate-300"></i>
                                </div>
                                <p class="text-2xl font-black text-slate-900 mb-2">Belum ada riwayat aktivitas</p>
                                <p class="text-lg font-medium text-slate-500">Jejak bacaan Anda akan muncul di halaman ini.</p>
                                <a href="{{ route('student.books.index') }}" class="inline-block mt-8 px-8 py-4 bg-slate-900 font-bold shadow-lg shadow-slate-900/20 text-white rounded-full hover:bg-slate-800 transition-all">Telusuri Katalog</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        @if($readingHistories->hasPages())
            <div class="px-8 py-6 bg-slate-50 flex items-center justify-between border-t-0">
                <div class="text-sm font-bold text-slate-500 hidden sm:block">
                    Hal <span class="text-slate-900">{{ $readingHistories->currentPage() }}</span> dari <span class="text-slate-900">{{ $readingHistories->lastPage() }}</span>
                </div>
                <div class="user-pagination">
                    {{ $readingHistories->links() }}
                </div>
            </div>
        @endif
    </div>
</div>

<style>
/* Adjust laravel pagination styling for light theme if needed */
.user-pagination nav div.hidden.sm\:flex-1 {
    display: none !important;
}
</style>
@endsection
