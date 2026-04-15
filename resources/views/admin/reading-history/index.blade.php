@extends('layouts.admin-theme')

@section('title', 'Riwayat Membaca')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Header -->
    <div class="mb-12 flex flex-col md:flex-row md:items-end justify-between gap-6 pl-4 lg:pl-0">
        <div>
            <p class="text-slate-500 text-sm font-bold tracking-widest uppercase mb-2">Aktivitas Sistem</p>
            <h1 class="text-4xl md:text-5xl font-black text-slate-900 tracking-tight">Log <span class="text-slate-500">Membaca</span></h1>
            <p class="text-slate-600 font-medium mt-3 text-lg">Pantau aktivitas literasi dan durasi bacaan seluruh siswa.</p>
        </div>
    </div>

    <!-- Search Panel -->
    <div class="glass-panel rounded-[2rem] p-6 mb-10 bg-white border border-slate-200">
        <form method="GET" class="flex flex-col md:flex-row gap-5">
            <div class="flex-1 relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <i class="bi bi-search text-slate-400"></i>
                </div>
                <input type="text" name="search" value="{{ request('search') }}" 
                       placeholder="Pencarian cepat nama siswa, email, atau judul buku..." 
                       class="w-full pl-11 pr-5 py-3.5 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-slate-900 focus:border-slate-900 text-slate-900 placeholder-slate-400 font-medium transition-all shadow-sm">
            </div>
            <button type="submit" 
                    class="bg-slate-900 hover:bg-slate-800 text-white px-8 py-3.5 rounded-xl shadow-lg shadow-slate-900/20 hover:shadow-slate-900/40 transition-all font-bold flex items-center justify-center gap-2">
                Pindai Data
            </button>
        </form>
    </div>

    <!-- Activity Log Table -->
    <div class="glass-panel overflow-hidden rounded-[2rem] bg-white border border-slate-200 shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 uppercase tracking-wider text-[11px] sm:text-xs">
                        <th class="px-8 py-5 text-slate-500 font-bold border-r border-slate-100">Profil Siswa</th>
                        <th class="px-8 py-5 text-slate-500 font-bold">Pustaka Terbaca</th>
                        <th class="px-8 py-5 text-slate-500 font-bold w-48 text-center">Akses Waktu</th>
                        <th class="px-8 py-5 text-slate-500 font-bold w-32 border-l border-slate-100 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($readingHistories as $history)
                        <tr class="hover:bg-slate-50/50 transition-colors group">
                            <!-- Student -->
                            <td class="px-8 py-6 border-r border-slate-50 align-top">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-full bg-slate-100 border border-slate-200 flex items-center justify-center overflow-hidden flex-shrink-0">
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($history->user->name) }}&background=f8fafc&color=0f172a&bold=true" class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <h3 class="text-sm font-bold text-slate-900 mb-0.5"><a href="{{ route('admin.students.index', ['search' => $history->user->email]) }}" class="hover:text-blue-600 transition-colors">{{ $history->user->name }}</a></h3>
                                        <p class="text-xs font-bold text-slate-500 lowercase">{{ $history->user->email }}</p>
                                    </div>
                                </div>
                            </td>
                            
                            <!-- Book -->
                            <td class="px-8 py-6 align-top max-w-sm">
                                <div class="flex items-start gap-4">
                                    <div class="w-10 h-14 bg-slate-100 rounded overflow-hidden flex-shrink-0 border border-slate-200 shadow-sm relative">
                                        <img src="{{ $history->book->cover_url }}" class="w-full h-full object-cover">
                                        <div class="absolute inset-0 bg-slate-900/5"></div>
                                    </div>
                                    <div class="truncate">
                                        <h3 class="text-sm font-bold text-slate-900 mb-1 truncate" title="{{ $history->book->judul }}">{{ $history->book->judul }}</h3>
                                        <div class="flex flex-wrap gap-2 text-xs font-bold text-slate-400">
                                            <span class="bg-white border border-slate-200 px-2 py-0.5 rounded shadow-sm">
                                                <i class="bi bi-hash"></i>{{ $history->book->kode_buku }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            
                            <!-- Duration & Time -->
                            <td class="px-8 py-6 align-top">
                                <div class="text-sm font-bold text-slate-900 flex items-center gap-2 mb-1.5 justify-center">
                                    <i class="bi bi-calendar2-day text-slate-400"></i> {{ $history->created_at->format('d M Y') }}
                                </div>
                                <div class="flex gap-2 text-[10px] uppercase tracking-wider font-bold text-slate-500 justify-center">
                                    <span class="bg-slate-100 border border-slate-200 px-2.5 py-1 rounded-md">{{ $history->created_at->format('H:i') }} WIB</span>
                                    @if($history->duration)
                                        <span class="bg-blue-50 text-blue-600 border border-blue-200 px-2.5 py-1 rounded-md">{{ $history->duration }} m</span>
                                    @endif
                                </div>
                            </td>
                            
                            <!-- Actions -->
                            <td class="px-8 py-6 border-l border-slate-50 text-center align-middle">
                                <a href="{{ route('admin.books.show', $history->book->id) }}"
                                   class="inline-block p-2 text-slate-500 hover:text-slate-900 bg-white border border-slate-200 hover:border-slate-300 shadow-sm rounded-lg transition-all tooltip" title="Tinjau Detail Buku">
                                    <i class="bi bi-file-text"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-8 py-24 text-center">
                                <div class="w-20 h-20 bg-slate-50 border border-slate-100 rounded-full flex items-center justify-center mx-auto mb-6 shadow-sm">
                                    <i class="bi bi-clock-history text-4xl text-slate-300 block"></i>
                                </div>
                                <h3 class="text-2xl font-black text-slate-900 mb-2">Riwayat Akses Kosong</h3>
                                <p class="text-lg font-medium text-slate-500 max-w-md mx-auto">Sistem belum merekam jejak aktivitas membaca apa pun.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($readingHistories->hasPages())
            <div class="px-8 py-6 bg-slate-50 flex items-center justify-between border-t border-slate-200">
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
.user-pagination nav div.hidden.sm\:flex-1 { display: none !important; }
</style>
@endsection
