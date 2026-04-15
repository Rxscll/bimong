@extends('layouts.admin-theme')

@section('title', 'Edit Otorisasi ' . $student->name)

@section('content')
<div class="max-w-4xl mx-auto py-10 px-4 sm:px-6">
    <div class="mb-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight">Profil Preferensi</h1>
            <p class="text-slate-500 font-medium mt-2">Mengedit metainformasi & otorisasi profil pengguna.</p>
        </div>
        <a href="{{ route('admin.students.index') }}" class="inline-flex px-5 py-2.5 bg-white border border-slate-200 text-slate-600 rounded-xl hover:bg-slate-50 hover:text-slate-900 font-bold shadow-sm transition-all items-center gap-2 w-max">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="glass-panel p-8 sm:p-10 rounded-[2.5rem] bg-white border border-slate-200 shadow-sm relative">
        <form action="{{ route('admin.students.update', $student->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Name -->
                <div>
                    <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2">
                        Nama Lengkap <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" name="name" required
                           class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 font-bold focus:ring-2 focus:ring-slate-900 focus:border-slate-900 outline-none transition-all shadow-sm"
                           value="{{ old('name', $student->name) }}">
                    @error('name')
                        <p class="mt-2 text-xs font-bold text-rose-500"><i class="bi bi-exclamation-circle mr-1"></i>{{ $message }}</p>
                    @enderror
                </div>
                <!-- Email -->
                <div>
                    <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2">
                        Alamat Email Aktif <span class="text-rose-500">*</span>
                    </label>
                    <input type="email" name="email" required 
                           class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 font-bold focus:ring-2 focus:ring-slate-900 focus:border-slate-900 outline-none transition-all shadow-sm"
                           value="{{ old('email', $student->email) }}">
                    @error('email')
                        <p class="mt-2 text-xs font-bold text-rose-500"><i class="bi bi-exclamation-circle mr-1"></i>{{ $message }}</p>
                    @enderror
                </div>

                <!-- NIS -->
                <div>
                    <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2">
                        Nomor Induk Siswa (NIS)
                    </label>
                    <input type="text" name="nis"
                           class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 font-bold focus:ring-2 focus:ring-slate-900 focus:border-slate-900 outline-none transition-all shadow-sm"
                           value="{{ old('nis', $student->nis) }}">
                    @error('nis')
                        <p class="mt-2 text-xs font-bold text-rose-500"><i class="bi bi-exclamation-circle mr-1"></i>{{ $message }}</p>
                    @enderror
                </div>
                <!-- Kelas -->
                <div>
                    <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2">
                        Kelas Aktif
                    </label>
                    <input type="text" name="kelas"
                           class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 font-bold focus:ring-2 focus:ring-slate-900 focus:border-slate-900 outline-none transition-all shadow-sm"
                           value="{{ old('kelas', $student->kelas) }}">
                    @error('kelas')
                        <p class="mt-2 text-xs font-bold text-rose-500"><i class="bi bi-exclamation-circle mr-1"></i>{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2 mt-2 pt-6 border-t border-slate-100">
                    <h3 class="text-sm font-bold text-slate-900 mb-1"><i class="bi bi-shield-lock text-slate-500 mr-2"></i> Kredensial Akses</h3>
                    <p class="text-[11px] font-medium text-slate-500 mb-4">Abaikan baris berikut ini jika Anda tidak ingin melakukan modifikasi pada kata sandi pengguna lama.</p>
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2">
                        Kata Sandi Baru (Opsional)
                    </label>
                    <input type="password" name="password" placeholder="Kosongkan jika tidak diganti"
                           class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 font-bold focus:ring-2 focus:ring-slate-900 focus:border-slate-900 outline-none transition-all shadow-sm">
                    @error('password')
                        <p class="mt-2 text-xs font-bold text-rose-500"><i class="bi bi-exclamation-circle mr-1"></i>{{ $message }}</p>
                    @enderror
                </div>
                <!-- Password Confirm -->
                <div>
                    <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2">
                        Konfirmasi Ulang Sandi
                    </label>
                    <input type="password" name="password_confirmation" placeholder="Tulis berulang di sini"
                           class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 font-bold focus:ring-2 focus:ring-slate-900 focus:border-slate-900 outline-none transition-all shadow-sm">
                </div>
            </div>

            <!-- Submit Strip -->
            <div class="mt-10 pt-6 border-t border-slate-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.students.index') }}" class="px-6 py-3.5 bg-white border border-slate-200 text-slate-500 rounded-xl hover:bg-slate-50 hover:text-slate-900 font-bold transition-all shadow-sm">
                    Batalkan Operasi
                </a>
                <button type="submit" class="px-8 py-3.5 bg-amber-400 text-amber-900 rounded-xl shadow-lg shadow-amber-400/20 hover:bg-amber-500 transition-all font-bold flex items-center justify-center gap-2">
                    <i class="bi bi-pencil-square mr-1"></i> Perbarui Catatan Profil
                </button>
            </div>
        </form>
    </div>
</div>
@endsection