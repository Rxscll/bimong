@extends('layouts.admin-theme')

@section('title', 'Detail Siswa')

@section('content')
<div class="max-w-6xl mx-auto">
    <!-- Header -->
    <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-black text-slate-900 tracking-tight">Detail Siswa</h1>
            <p class="text-slate-500 font-medium mt-1">Informasi lengkap dan rekam medis peminjaman siswa.</p>
        </div>
        <div>
            <a href="{{ route('admin.students.index') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-white border border-slate-200 rounded-xl text-slate-600 font-bold hover:bg-slate-50 hover:text-slate-900 transition-colors shadow-sm border-b-4 hover:translate-y-[2px] hover:border-b-2 active:border-b-0 active:translate-y-[4px]">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Sidebar Profile -->
        <div class="lg:col-span-1">
            <div class="glass-panel p-8 rounded-[2rem] bg-white border border-slate-200 shadow-sm text-center h-full flex flex-col">
                <div class="mb-6 flex justify-center">
                    <div class="w-24 h-24 rounded-full bg-indigo-50 border border-indigo-100 text-indigo-600 flex items-center justify-center font-black text-4xl shadow-inner">
                        {{ strtoupper(substr($student->name, 0, 1)) }}
                    </div>
                </div>
                
                <h4 class="font-black text-slate-900 text-xl mb-1">{{ $student->name }}</h4>
                <p class="text-slate-500 font-medium text-sm mb-6">{{ $student->email }}</p>

                <div class="bg-slate-50 p-5 rounded-2xl text-left border border-slate-100 mb-8 w-full">
                    <div class="mb-4">
                        <span class="text-[10px] text-slate-400 font-bold uppercase tracking-widest block mb-1">Nomor Induk Siswa</span>
                        <span class="font-bold text-slate-900">{{ $student->nis ?? '-' }}</span>
                    </div>
                    <div>
                        <span class="text-[10px] text-slate-400 font-bold uppercase tracking-widest block mb-1">Kelas Tingkat</span>
                        <span class="font-bold text-slate-900">{{ $student->kelas ?? '-' }}</span>
                    </div>
                </div>

                <div class="mt-auto pt-4">
                    <a href="{{ route('admin.students.edit', $student->id) }}" class="flex items-center justify-center gap-2 w-full px-5 py-3.5 bg-amber-400 text-amber-900 shadow-lg shadow-amber-400/20 font-bold rounded-xl hover:bg-amber-300 transition-all border-b-4 border-amber-500 hover:translate-y-[2px] hover:border-b-2 active:border-b-0 active:translate-y-[4px]">
                        <i class="bi bi-pencil-square"></i> Sunting Profil
                    </a>
                </div>
            </div>
        </div>

        <!-- Main Content Panel -->
        <div class="lg:col-span-2 flex flex-col gap-8">
            <!-- Reading History Table -->
            <div class="glass-panel p-8 rounded-[2rem] bg-white border border-slate-200 shadow-sm flex-grow">
                <h5 class="text-lg font-black text-slate-900 mb-6 flex items-center gap-3">
                    <i class="bi bi-clock-history text-indigo-500"></i> Riwayat Bacaan Terakhir
                </h5>

                <div class="overflow-x-auto rounded-xl border border-slate-200">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-200 text-slate-600 text-[11px] uppercase tracking-wider font-bold">
                                <th class="p-4 rounded-tl-xl whitespace-nowrap">Judul Buku</th>
                                <th class="p-4 whitespace-nowrap">Akses Terakhir</th>
                                <th class="p-4 rounded-tr-xl">Posisi Halaman</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse($student->readingHistories()->latest('updated_at')->take(5)->get() as $history)
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="p-4 font-bold text-slate-900">{{ $history->book->judul }}</td>
                                    <td class="p-4 text-xs font-semibold text-slate-500">{{ $history->updated_at->diffForHumans() }}</td>
                                    <td class="p-4">
                                        <span class="px-2.5 py-1 bg-indigo-50 text-indigo-600 border border-indigo-200 rounded-lg text-xs font-bold">Hal. {{ $history->last_page }}</span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="p-10 text-center text-slate-400 font-medium">
                                        Siswa ini belum pernah membaca satupun buku di perpustakaan digital.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Stats Module -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                <!-- Total Read -->
                <div class="glass-panel p-6 rounded-[2rem] bg-white border border-slate-200 shadow-sm flex items-center gap-5 border-l-4 border-l-indigo-500">
                    <div class="w-14 h-14 rounded-2xl bg-indigo-50 flex items-center justify-center text-indigo-600 text-2xl font-black">
                        <i class="bi bi-journals"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-black text-slate-900 leading-none mb-1">{{ $student->readingHistories()->count() }}</h3>
                        <p class="text-xs font-bold text-slate-500 uppercase tracking-widest">Total Dibaca</p>
                    </div>
                </div>

                <!-- Active Borrowings -->
                <div class="glass-panel p-6 rounded-[2rem] bg-white border border-slate-200 shadow-sm flex items-center gap-5 border-l-4 border-l-amber-500">
                    <div class="w-14 h-14 rounded-2xl bg-amber-50 flex items-center justify-center text-amber-600 text-2xl font-black">
                        <i class="bi bi-heart-fill"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-black text-slate-900 leading-none mb-1">{{ $student->favorites()->count() }}</h3>
                        <p class="text-xs font-bold text-slate-500 uppercase tracking-widest">Koleksi Tersimpan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection