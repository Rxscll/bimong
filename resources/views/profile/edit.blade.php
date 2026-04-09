@php
    $layout = auth()->user()->role === 'admin' ? 'layouts.admin' : 'layouts.student';
@endphp

@extends($layout)

@section('title', 'Profil Saya')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card p-4 mb-4">
                <h5 class="fw-bold mb-4 border-bottom pb-3">Informasi Profil</h5>
                <form method="post" action="{{ route('profile.update') }}">
                    @csrf
                    @method('patch')

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted text-uppercase">Nama</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                        @error('name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted text-uppercase">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}"
                            required>
                        @error('email') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    @if($user->role === 'siswa')
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label small fw-bold text-muted text-uppercase">NIS</label>
                                    <input type="text" name="nis" class="form-control" value="{{ old('nis', $user->nis) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label small fw-bold text-muted text-uppercase">Kelas</label>
                                    <input type="text" name="kelas" class="form-control"
                                        value="{{ old('kelas', $user->kelas) }}">
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary px-4 py-2 fw-bold">Simpan Perubahan</button>
                        @if (session('status') === 'profile-updated')
                            <span class="text-success small ms-3">Berhasil disimpan.</span>
                        @endif
                    </div>
                </form>
            </div>

            <div class="card p-4 mb-4">
                <h5 class="fw-bold mb-4 border-bottom pb-3">Ubah Kata Sandi</h5>
                <form method="post" action="{{ route('password.update') }}">
                    @csrf
                    @method('put')

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted text-uppercase">Kata Sandi Saat Ini</label>
                        <input type="password" name="current_password" class="form-control">
                        @error('current_password', 'updatePassword') <div class="text-danger small mt-1">{{ $message }}
                        </div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted text-uppercase">Kata Sandi Baru</label>
                        <input type="password" name="password" class="form-control">
                        @error('password', 'updatePassword') <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted text-uppercase">Konfirmasi Kata Sandi</label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary px-4 py-2 fw-bold">Update Password</button>
                        @if (session('status') === 'password-updated')
                            <span class="text-success small ms-3">Password berhasil diubah.</span>
                        @endif
                    </div>
                </form>
            </div>

            <div class="card border-danger bg-danger bg-opacity-10 p-4 mb-4">
                <h5 class="fw-bold mb-2 text-danger">Hapus Akun</h5>
                <p class="text-muted small mb-4">Setelah akun dihapus, semua datanya akan hilang secara permanen.</p>

                <button type="button" class="btn btn-danger px-4" data-bs-toggle="modal"
                    data-bs-target="#deleteAccountModal">
                    Hapus Akun Saya
                </button>

                <!-- Modal -->
                <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="post" action="{{ route('profile.destroy') }}">
                                @csrf
                                @method('delete')
                                <div class="modal-header">
                                    <h5 class="modal-title fw-bold">Peringatan Penghapusan Akun</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-start">
                                    <p>Apakah Anda yakin ingin menghapus akun Anda? Masukkan kata sandi untuk konfirmasi.
                                    </p>
                                    <div class="mb-3 text-start">
                                        <input type="password" name="password" class="form-control"
                                            placeholder="Kata Sandi Anda" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light border"
                                        data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-danger">Hapus Permanen</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection