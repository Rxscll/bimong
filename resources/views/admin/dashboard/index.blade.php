@extends('layouts.admin-theme')

@section('title', 'Dashboard Admin')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Header -->
    <div class="mb-12 pl-4 lg:pl-0 flex flex-col md:flex-row md:items-end justify-between">
        <div>
            <p class="text-slate-500 text-sm font-bold tracking-widest uppercase mb-2">Overview</p>
            <h1 class="text-4xl md:text-5xl font-black text-slate-900 tracking-tight">Administrator <span class="text-slate-500">Dashboard</span></h1>
        </div>
        <div class="mt-4 md:mt-0 flex gap-4">
            <div class="glass-panel px-6 py-3.5 rounded-xl flex items-center gap-3 bg-white border border-slate-200">
                <i class="bi bi-calendar2-day text-slate-500 text-lg"></i>
                <p class="text-sm font-bold text-slate-700">{{ date('d M Y') }}</p>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
        <!-- Total Books -->
        <div class="glass-panel glass-panel-hover rounded-[1.5rem] p-6 relative overflow-hidden group bg-white">
            <div class="absolute -top-10 -right-10 w-32 h-32 bg-blue-50 rounded-full group-hover:scale-150 transition-transform duration-500"></div>
            <div class="flex items-center justify-between relative z-10">
                <div>
                    <p class="text-xs text-slate-500 font-bold uppercase tracking-wider mb-2">Total Koleksi</p>
                    <p class="text-4xl font-black text-slate-900 tracking-tight">{{ $totalBooks ?? 0 }}</p>
                </div>
                <div class="w-16 h-16 rounded-2xl bg-blue-100 border border-blue-200 flex items-center justify-center text-blue-600 shadow-sm group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
                    <i class="bi bi-journal-check text-3xl"></i>
                </div>
            </div>
        </div>

        <!-- Total Users -->
        <div class="glass-panel glass-panel-hover rounded-[1.5rem] p-6 relative overflow-hidden group bg-white">
            <div class="absolute -top-10 -right-10 w-32 h-32 bg-emerald-50 rounded-full group-hover:scale-150 transition-transform duration-500"></div>
            <div class="flex items-center justify-between relative z-10">
                <div>
                    <p class="text-xs text-slate-500 font-bold uppercase tracking-wider mb-2">Total Siswa</p>
                    <p class="text-4xl font-black text-slate-900 tracking-tight">{{ $totalUsers ?? 0 }}</p>
                </div>
                <div class="w-16 h-16 rounded-2xl bg-emerald-100 border border-emerald-200 flex items-center justify-center text-emerald-600 shadow-sm group-hover:bg-emerald-600 group-hover:text-white transition-colors duration-300">
                    <i class="bi bi-people-fill text-3xl"></i>
                </div>
            </div>
        </div>

        <!-- Reading Sessions -->
        <div class="glass-panel glass-panel-hover rounded-[1.5rem] p-6 relative overflow-hidden group bg-white">
            <div class="absolute -top-10 -right-10 w-32 h-32 bg-purple-50 rounded-full group-hover:scale-150 transition-transform duration-500"></div>
            <div class="flex items-center justify-between relative z-10">
                <div>
                    <p class="text-xs text-slate-500 font-bold uppercase tracking-wider mb-2">Sesi Membaca</p>
                    <p class="text-4xl font-black text-slate-900 tracking-tight">{{ $totalReadingSessions ?? 0 }}</p>
                </div>
                <div class="w-16 h-16 rounded-2xl bg-purple-100 border border-purple-200 flex items-center justify-center text-purple-600 shadow-sm group-hover:bg-purple-600 group-hover:text-white transition-colors duration-300">
                    <i class="bi bi-activity text-3xl"></i>
                </div>
            </div>
        </div>

        <!-- Categories -->
        <div class="glass-panel glass-panel-hover rounded-[1.5rem] p-6 relative overflow-hidden group bg-white">
            <div class="absolute -top-10 -right-10 w-32 h-32 bg-amber-50 rounded-full group-hover:scale-150 transition-transform duration-500"></div>
            <div class="flex items-center justify-between relative z-10">
                <div>
                    <p class="text-xs text-slate-500 font-bold uppercase tracking-wider mb-2">Kategori Buku</p>
                    <p class="text-4xl font-black text-slate-900 tracking-tight">{{ \App\Models\Category::count() ?? 0 }}</p>
                </div>
                <div class="w-16 h-16 rounded-2xl bg-amber-100 border border-amber-200 flex items-center justify-center text-amber-600 shadow-sm group-hover:bg-amber-500 group-hover:text-white transition-colors duration-300">
                    <i class="bi bi-tags-fill text-3xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="mb-12">
        <h2 class="text-2xl font-black text-slate-900 mb-6 flex items-center gap-3">
            <i class="bi bi-rocket-takeoff text-slate-400"></i> Pintasan Akses
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <a href="{{ route('admin.books.create') }}" 
               class="glass-panel glass-panel-hover px-6 py-5 rounded-[1.25rem] flex items-center gap-5 bg-white border-2 hover:border-slate-300 transition-all font-bold text-slate-700 hover:text-slate-900 hover:bg-slate-50 shadow-sm group">
                <div class="w-12 h-12 rounded-xl bg-slate-100 border border-slate-200 flex items-center justify-center text-slate-600 group-hover:bg-white group-hover:shadow-sm transition-all">
                    <i class="bi bi-journal-plus text-xl"></i>
                </div>
                Tambah Buku
            </a>
            
            <a href="{{ route('admin.categories.create') }}" 
               class="glass-panel glass-panel-hover px-6 py-5 rounded-[1.25rem] flex items-center gap-5 bg-white border-2 hover:border-slate-300 transition-all font-bold text-slate-700 hover:text-slate-900 hover:bg-slate-50 shadow-sm group">
                <div class="w-12 h-12 rounded-xl bg-slate-100 border border-slate-200 flex items-center justify-center text-slate-600 group-hover:bg-white group-hover:shadow-sm transition-all">
                    <i class="bi bi-folder-plus text-xl"></i>
                </div>
                Kategori Baru
            </a>
            
            <a href="{{ route('admin.reading-history.index') }}" 
               class="glass-panel glass-panel-hover px-6 py-5 rounded-[1.25rem] flex items-center gap-5 bg-white border-2 hover:border-slate-300 transition-all font-bold text-slate-700 hover:text-slate-900 hover:bg-slate-50 shadow-sm group">
                <div class="w-12 h-12 rounded-xl bg-slate-100 border border-slate-200 flex items-center justify-center text-slate-600 group-hover:bg-white group-hover:shadow-sm transition-all">
                    <i class="bi bi-clock-history text-xl"></i>
                </div>
                Aktivitas Baca
            </a>
            
            <a href="{{ route('admin.students.create') }}" 
               class="glass-panel glass-panel-hover px-6 py-5 rounded-[1.25rem] flex items-center gap-5 bg-white border-2 hover:border-slate-300 transition-all font-bold text-slate-700 hover:text-slate-900 hover:bg-slate-50 shadow-sm group">
                <div class="w-12 h-12 rounded-xl bg-slate-100 border border-slate-200 flex items-center justify-center text-slate-600 group-hover:bg-white group-hover:shadow-sm transition-all">
                    <i class="bi bi-person-plus text-xl"></i>
                </div>
                Siswa Baru
            </a>
        </div>
    </div>

    <!-- Lists Columns -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
        <!-- Popular Books -->
        <div class="glass-panel rounded-[2rem] p-8 flex flex-col h-full bg-white border border-slate-200">
            <div class="flex items-center justify-between mb-8 pb-4 border-b border-slate-100">
                <h3 class="text-xl font-black text-slate-900 flex items-center gap-3">
                    <i class="bi bi-graph-up-arrow text-slate-400"></i> Buku Paling Populer
                </h3>
                <a href="{{ route('admin.books.index') }}" class="text-sm text-slate-500 hover:text-slate-900 font-bold transition-colors">Semua Buku</a>
            </div>
            
            <div class="flex flex-col gap-4 flex-grow">
                @forelse($popularBooks as $book)
                    <div class="flex items-center justify-between p-4 bg-slate-50 border border-slate-100 rounded-2xl hover:bg-white hover:border-slate-300 hover:shadow-md transition-all group cursor-default">
                        <div class="flex items-center gap-5">
                            <div class="w-12 h-16 rounded-lg overflow-hidden flex-shrink-0 border border-slate-200 shadow-sm">
                                <img src="{{ $book->cover_url }}" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1 min-w-0 pr-4">
                                <h4 class="font-bold text-slate-900 text-base truncate">{{ $book->judul }}</h4>
                                <p class="text-sm text-slate-500 mt-0.5">{{ count(explode(' ', $book->penulis)) > 2 ? implode(' ', array_slice(explode(' ', $book->penulis), 0, 2)).'...' : $book->penulis }}</p>
                            </div>
                        </div>
                        <div class="text-right flex-shrink-0">
                            <span class="inline-flex items-center justify-center px-3 py-1.5 bg-slate-200 text-slate-700 border border-slate-300 rounded-lg text-xs font-bold group-hover:bg-slate-900 group-hover:text-white group-hover:border-slate-900 transition-colors">
                                <i class="bi bi-eye mr-2"></i>{{ $book->jumlah_dibaca ?? 0 }}
                            </span>
                        </div>
                    </div>
                @empty
                    <div class="flex flex-col items-center justify-center py-10 text-center flex-grow">
                        <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mb-4">
                            <i class="bi bi-inbox text-3xl text-slate-300 block"></i>
                        </div>
                        <p class="text-slate-500 font-medium">Belum ada data buku populer teratas.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Recent Books -->
        <div class="glass-panel rounded-[2rem] p-8 flex flex-col h-full bg-white border border-slate-200">
            <div class="flex items-center justify-between mb-8 pb-4 border-b border-slate-100">
                <h3 class="text-xl font-black text-slate-900 flex items-center gap-3">
                    <i class="bi bi-journal-arrow-down text-slate-400"></i> Baru Ditambahkan
                </h3>
                <a href="{{ route('admin.books.index') }}" class="text-sm text-slate-500 hover:text-slate-900 font-bold transition-colors">Semua Buku</a>
            </div>
            
            <div class="flex flex-col gap-4 flex-grow">
                @forelse($recentBooks as $book)
                    <div class="flex items-center justify-between p-4 bg-slate-50 border border-slate-100 rounded-2xl hover:bg-white hover:border-slate-300 hover:shadow-md transition-all group cursor-default">
                        <div class="flex items-center gap-5">
                            <div class="w-12 h-16 rounded-lg overflow-hidden flex-shrink-0 border border-slate-200 shadow-sm relative">
                                <img src="{{ $book->cover_url }}" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-slate-900/5"></div>
                            </div>
                            <div class="flex-1 min-w-0 pr-4">
                                <h4 class="font-bold text-slate-900 text-base truncate">{{ $book->judul }}</h4>
                                <p class="text-xs font-bold text-slate-400 mt-1 flex items-center gap-2">
                                    <span class="bg-white px-2 py-0.5 rounded border border-slate-200"><i class="bi bi-hash"></i>{{ $book->kode_buku }}</span>
                                    <span class="w-1 h-1 bg-slate-300 rounded-full"></span>
                                    <span class="text-slate-500">{{ $book->category->nama ?? $book->category->name ?? '-' }}</span>
                                </p>
                            </div>
                        </div>
                        <div class="text-right flex-shrink-0">
                            <span class="text-xs font-bold text-slate-400 bg-slate-100 px-3 py-1.5 rounded-lg border border-slate-200">{{ $book->created_at->format('d M y') }}</span>
                        </div>
                    </div>
                @empty
                    <div class="flex flex-col items-center justify-center py-10 text-center flex-grow">
                        <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mb-4">
                            <i class="bi bi-journal-x text-3xl text-slate-300 block"></i>
                        </div>
                        <p class="text-slate-500 font-medium">Belum ada buku baru yang diunggah.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection