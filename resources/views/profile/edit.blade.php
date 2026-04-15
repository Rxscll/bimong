@php
    $layout = auth()->user()->role === 'admin' ? 'layouts.admin-theme' : 'layouts.student-theme';
@endphp

@extends($layout)

@section('title', 'Profil Saya')

@section('content')
<div class="max-w-4xl mx-auto py-10 px-4 sm:px-6">
    <div class="mb-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight">Profil Saya</h1>
            <p class="text-slate-500 font-medium mt-2">Kelola informasi pribadi dan pengaturan keamanan akun Anda.</p>
        </div>
    </div>

    <!-- Informasi Profil -->
    <div class="glass-panel p-8 sm:p-10 rounded-[2.5rem] bg-white border border-slate-200 shadow-sm relative mb-8">
        <h2 class="text-xl font-bold text-slate-900 mb-6 pb-4 border-b border-slate-100 flex items-center gap-2">
            <i class="bi bi-person-badge text-slate-500"></i> Informasi Profil
        </h2>
        
        <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
            @csrf
            @method('patch')

            <div class="space-y-6">
                <!-- Name -->
                <div>
                    <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2">
                        Nama Lengkap <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" name="name" required
                           class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 font-bold focus:ring-2 focus:ring-slate-900 focus:border-slate-900 outline-none transition-all shadow-sm"
                           value="{{ old('name', $user->name) }}">
                    @error('name')
                        <p class="mt-2 text-xs font-bold text-rose-500"><i class="bi bi-exclamation-circle mr-1"></i>{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2">
                        Alamat Email <span class="text-rose-500">*</span>
                    </label>
                    <input type="email" name="email" required
                           class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 font-bold focus:ring-2 focus:ring-slate-900 focus:border-slate-900 outline-none transition-all shadow-sm"
                           value="{{ old('email', $user->email) }}">
                    @error('email')
                        <p class="mt-2 text-xs font-bold text-rose-500"><i class="bi bi-exclamation-circle mr-1"></i>{{ $message }}</p>
                    @enderror
                </div>

                @if($user->role === 'siswa')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- NIS -->
                        <div>
                            <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2">
                                Nomor Induk Siswa (NIS)
                            </label>
                            <input type="text" name="nis"
                                   class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 font-bold focus:ring-2 focus:ring-slate-900 focus:border-slate-900 outline-none transition-all shadow-sm"
                                   value="{{ old('nis', $user->nis) }}">
                        </div>
                        <!-- Kelas -->
                        <div>
                            <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2">
                                Kelas Aktif
                            </label>
                            <input type="text" name="kelas"
                                   class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 font-bold focus:ring-2 focus:ring-slate-900 focus:border-slate-900 outline-none transition-all shadow-sm"
                                   value="{{ old('kelas', $user->kelas) }}">
                        </div>
                    </div>
                @endif
            </div>

            <div class="mt-8 pt-6 border-t border-slate-100 flex items-center gap-4">
                <button type="submit" class="px-8 py-3.5 bg-slate-900 text-white rounded-xl shadow-lg shadow-slate-900/20 hover:bg-slate-800 transition-all font-bold flex items-center justify-center gap-2">
                    <i class="bi bi-check-circle mr-1"></i> Simpan Perubahan
                </button>
                @if (session('status') === 'profile-updated')
                    <span class="text-sm font-bold text-emerald-600 flex items-center gap-1">
                        <i class="bi bi-check2"></i> Berhasil disimpan.
                    </span>
                @endif
            </div>
        </form>
    </div>

    <!-- Ubah Kata Sandi -->
    <div class="glass-panel p-8 sm:p-10 rounded-[2.5rem] bg-white border border-slate-200 shadow-sm relative mb-8">
        <h2 class="text-xl font-bold text-slate-900 mb-6 pb-4 border-b border-slate-100 flex items-center gap-2">
            <i class="bi bi-shield-lock text-slate-500"></i> Ubah Kata Sandi
        </h2>
        
        <form method="post" action="{{ route('password.update') }}" class="space-y-6">
            @csrf
            @method('put')

            <div class="space-y-6">
                <!-- Current Password -->
                <div>
                    <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2">
                        Kata Sandi Saat Ini <span class="text-rose-500">*</span>
                    </label>
                    <input type="password" name="current_password" required
                           class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 font-bold focus:ring-2 focus:ring-slate-900 focus:border-slate-900 outline-none transition-all shadow-sm">
                    @error('current_password', 'updatePassword')
                        <p class="mt-2 text-xs font-bold text-rose-500"><i class="bi bi-exclamation-circle mr-1"></i>{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- New Password -->
                    <div>
                        <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2">
                            Kata Sandi Baru <span class="text-rose-500">*</span>
                        </label>
                        <input type="password" name="password" required
                               class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 font-bold focus:ring-2 focus:ring-slate-900 focus:border-slate-900 outline-none transition-all shadow-sm">
                        @error('password', 'updatePassword')
                            <p class="mt-2 text-xs font-bold text-rose-500"><i class="bi bi-exclamation-circle mr-1"></i>{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2">
                            Konfirmasi Kata Sandi <span class="text-rose-500">*</span>
                        </label>
                        <input type="password" name="password_confirmation" required
                               class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 font-bold focus:ring-2 focus:ring-slate-900 focus:border-slate-900 outline-none transition-all shadow-sm">
                    </div>
                </div>
            </div>

            <div class="mt-8 pt-6 border-t border-slate-100 flex items-center gap-4">
                <button type="submit" class="px-8 py-3.5 bg-slate-900 text-white rounded-xl shadow-lg shadow-slate-900/20 hover:bg-slate-800 transition-all font-bold flex items-center justify-center gap-2">
                    <i class="bi bi-shield-check mr-1"></i> Update Password
                </button>
                @if (session('status') === 'password-updated')
                    <span class="text-sm font-bold text-emerald-600 flex items-center gap-1">
                        <i class="bi bi-check2"></i> Password berhasil diubah.
                    </span>
                @endif
            </div>
        </form>
    </div>

    <!-- Hapus Akun -->
    <div class="glass-panel p-8 sm:p-10 rounded-[2.5rem] bg-rose-50/50 border border-rose-200 shadow-sm relative">
        <h2 class="text-xl font-bold text-rose-600 mb-2 flex items-center gap-2">
            <i class="bi bi-exclamation-triangle"></i> Hapus Akun
        </h2>
        <p class="text-rose-500/80 font-medium mb-6 text-sm">Setelah akun dihapus, semua datanya akan hilang secara permanen. Operasi ini tidak dapat dibatalkan.</p>

        <button type="button" class="px-6 py-3 bg-rose-600 text-white rounded-xl shadow-lg shadow-rose-600/20 hover:bg-rose-700 transition-all font-bold flex items-center justify-center gap-2 w-max" onclick="document.getElementById('deleteAccountModal').classList.remove('hidden')">
            Hapus Akun Saya
        </button>

        <!-- Tailwind Modal -->
        <div id="deleteAccountModal" class="hidden fixed inset-0 z-[100] overflow-y-auto" aria-hidden="true">
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:p-0">
                <div class="fixed inset-0 transition-opacity bg-slate-900/60 backdrop-blur-sm" aria-hidden="true" onclick="document.getElementById('deleteAccountModal').classList.add('hidden')"></div>

                <div class="relative align-bottom bg-white rounded-[2rem] text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full border border-slate-100 opacity-100 translate-y-0 scale-100">
                    <form method="post" action="{{ route('profile.destroy') }}">
                        @csrf
                        @method('delete')
                        <div class="bg-rose-50 px-6 py-5 border-b border-rose-100 flex justify-between items-center">
                            <h5 class="font-black text-rose-600 text-xl flex items-center gap-2">
                                <i class="bi bi-exclamation-triangle"></i> Peringatan
                            </h5>
                            <button type="button" class="text-slate-400 hover:text-slate-600 transition-colors" onclick="document.getElementById('deleteAccountModal').classList.add('hidden')">
                                <i class="bi bi-x-lg text-lg"></i>
                            </button>
                        </div>
                        <div class="px-6 py-6 text-start">
                            <p class="text-slate-600 font-medium mb-4">Apakah Anda yakin ingin menghapus akun Anda? Masukkan kata sandi untuk mengkonfirmasi keputusan ini.</p>
                            <div>
                                <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2">
                                    Kata Sandi Anda <span class="text-rose-500">*</span>
                                </label>
                                <input type="password" name="password" required placeholder="Ketik kata sandi..."
                                       class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 font-bold focus:ring-2 focus:ring-rose-500 focus:border-rose-500 outline-none transition-all shadow-sm">
                            </div>
                        </div>
                        <div class="bg-slate-50 px-6 py-5 border-t border-slate-100 flex gap-3 justify-end">
                            <button type="button" class="px-5 py-2.5 bg-white border border-slate-200 text-slate-600 rounded-xl hover:bg-slate-50 font-bold transition-all" onclick="document.getElementById('deleteAccountModal').classList.add('hidden')">
                                Batal
                            </button>
                            <button type="submit" class="px-6 py-2.5 bg-rose-600 text-white rounded-xl shadow-lg shadow-rose-600/20 hover:bg-rose-700 transition-all font-bold">
                                Hapus Permanen
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection