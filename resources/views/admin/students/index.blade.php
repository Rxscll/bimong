@extends('layouts.admin-theme')

@section('title', 'Data Siswa')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Header -->
    <div class="mb-12 flex flex-col md:flex-row md:items-end justify-between gap-6 pl-4 lg:pl-0">
        <div>
            <p class="text-slate-500 text-sm font-bold tracking-widest uppercase mb-2">Manajemen User</p>
            <h1 class="text-4xl md:text-5xl font-black text-slate-900 tracking-tight">Data <span class="text-slate-500">Siswa</span></h1>
            <p class="text-slate-600 font-medium mt-3 text-lg">Kelola dan awasi anggota perpustakaan yang terdaftar di platform.</p>
        </div>
        <div>
            <a href="{{ route('admin.students.create') }}" class="inline-flex items-center gap-2 px-6 py-4 bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded-2xl shadow-lg shadow-emerald-600/20 hover:shadow-emerald-600/40 transition-all">
                <i class="bi bi-person-plus-fill text-lg"></i> Tambah Anggota
            </a>
        </div>
    </div>

    <!-- Data Table -->
    <div class="glass-panel overflow-hidden rounded-[2rem] bg-white border border-slate-200 shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 uppercase tracking-wider text-[11px] sm:text-xs text-slate-500 font-bold">
                        <th class="px-8 py-5 border-r border-slate-100">Biodata Pribadi</th>
                        <th class="px-8 py-5">Identitas Akademik</th>
                        <th class="px-8 py-5">Kontak Edukasi</th>
                        <th class="px-8 py-5 text-center w-32 border-l border-slate-100">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($students as $student)
                        <tr class="hover:bg-slate-50/50 transition-colors group">
                            <!-- Name / Avatar -->
                            <td class="px-8 py-6 border-r border-slate-50">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 rounded-full border border-slate-200 bg-slate-100 flex items-center justify-center overflow-hidden flex-shrink-0 shadow-sm">
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($student->name) }}&background=f8fafc&color=0f172a&bold=true" class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <h3 class="text-base font-bold text-slate-900 mb-0.5">{{ $student->name }}</h3>
                                        <span class="inline-flex items-center text-[10px] uppercase tracking-widest font-bold bg-slate-100 px-2 py-0.5 rounded text-slate-500 border border-slate-200">
                                            Siswa Aktif
                                        </span>
                                    </div>
                                </div>
                            </td>
                            
                            <!-- NIS & Kelas -->
                            <td class="px-8 py-6">
                                <p class="text-sm font-bold text-slate-900 mb-1 flex items-center">
                                    <i class="bi bi-card-heading text-slate-400 mr-2"></i> {{ $student->nis ?? '-' }}
                                </p>
                                <span class="text-xs font-bold text-slate-500 flex items-center">
                                    <i class="bi bi-mortarboard text-slate-400 mr-2"></i> Kelas: <span class="text-slate-700 ml-1 bg-white border border-slate-200 px-2 py-0.5 rounded shadow-sm">{{ $student->kelas ?? '-' }}</span>
                                </span>
                            </td>
                            
                            <!-- Email -->
                            <td class="px-8 py-6 align-middle">
                                <a href="mailto:{{ $student->email }}" class="inline-flex items-center text-sm font-bold text-slate-600 hover:text-slate-900 transition-colors">
                                    <i class="bi bi-envelope-at text-slate-400 mr-2"></i> {{ $student->email }}
                                </a>
                            </td>
                            
                            <!-- Actions -->
                            <td class="px-8 py-6 border-l border-slate-50 align-middle">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.students.edit', $student->id) }}"
                                        class="p-2.5 text-slate-500 hover:text-slate-900 bg-white border border-slate-200 hover:border-slate-300 shadow-sm rounded-xl transition-all tooltip" title="Ubah Info">
                                        <i class="bi bi-pencil-square text-lg"></i>
                                    </a>
                                    <form action="{{ route('admin.students.destroy', $student->id) }}" method="POST"
                                        class="inline-block m-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2.5 text-rose-500 hover:text-white bg-white border border-slate-200 hover:bg-rose-500 hover:border-rose-500 shadow-sm rounded-xl transition-all tooltip" title="Hapus Siswa"
                                            onclick="return confirm('Aksi ini akan menghapus permanen data siswa. Konfirmasi penghapusan?')">
                                            <i class="bi bi-trash text-lg"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-8 py-24 text-center">
                                <div class="w-20 h-20 bg-slate-50 border border-slate-100 rounded-full flex items-center justify-center mx-auto mb-6 shadow-sm">
                                    <i class="bi bi-people text-4xl text-slate-300 block"></i>
                                </div>
                                <h3 class="text-2xl font-black text-slate-900 mb-2">Tabel Rekapitulasi Kosong</h3>
                                <p class="text-lg font-medium text-slate-500 max-w-md mx-auto">Kami belum menemukan data siswa apa pun yang terdaftar saat ini.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($students->hasPages())
            <div class="px-8 py-6 bg-slate-50 flex items-center justify-between border-t border-slate-200">
                <div class="text-sm font-bold text-slate-500 hidden sm:block">
                    Menampilkan hal <span class="text-slate-900">{{ $students->currentPage() }}</span> / <span class="text-slate-900">{{ $students->lastPage() }}</span>
                </div>
                <div class="user-pagination">
                    {{ $students->links() }}
                </div>
            </div>
        @endif
    </div>
</div>

<style>
.user-pagination nav div.hidden.sm\:flex-1 { display: none !important; }
</style>
@endsection