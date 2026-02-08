@extends('layouts.student')

@section('title', 'Beranda')

@section('content')
    <div class="hero-section mb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <h1 class="display-5 fw-bold mb-3">Halo, {{ auth()->user()->name }}! 👋</h1>
                    <p class="lead opacity-75 mb-0">Selamat datang kembali di perpustakaan digital sekolah. Jelajahi ribuan
                        koleksi buku kami dan mulai meminjam hari ini.</p>
                </div>
                <div class="col-lg-5 text-end d-none d-lg-block">
                    <i class="bi bi-bookmarks-fill opacity-25" style="font-size: 8rem;"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="container pb-5">
        <!-- Statistik -->
        <div class="row g-4 mb-5">
            <div class="col-6 col-md-3">
                <div class="card p-4 text-center border-0 shadow-sm rounded-4 h-100">
                    <div class="mb-3">
                        <div class="icon-box bg-primary bg-opacity-10 text-primary mx-auto">
                            <i class="bi bi-journals"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-1">{{ $totalBorrowed }}</h3>
                    <p class="text-muted small mb-0 text-uppercase fw-bold">Total Pinjam</p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card p-4 text-center border-0 shadow-sm rounded-4 h-100">
                    <div class="mb-3">
                        <div class="icon-box bg-success bg-opacity-10 text-success mx-auto">
                            <i class="bi bi-book-half"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-1">{{ $activeBorrowings }}</h3>
                    <p class="text-muted small mb-0 text-uppercase fw-bold">Sedang Dipinjam</p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card p-4 text-center border-0 shadow-sm rounded-4 h-100">
                    <div class="mb-3">
                        <div class="icon-box bg-warning bg-opacity-10 text-warning mx-auto">
                            <i class="bi bi-hourglass-split"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-1">{{ $pendingBorrowings }}</h3>
                    <p class="text-muted small mb-0 text-uppercase fw-bold">Menunggu</p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card p-4 text-center border-0 shadow-sm rounded-4 h-100">
                    <div class="mb-3">
                        <div class="icon-box bg-info bg-opacity-10 text-info mx-auto">
                            <i class="bi bi-check2-circle"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-1">{{ $completedBorrowings }}</h3>
                    <p class="text-muted small mb-0 text-uppercase fw-bold">Selesai</p>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm rounded-4 p-4 h-100">
                    <h5 class="fw-bold mb-4">Akses Cepat</h5>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <a href="{{ route('student.books.index') }}"
                                class="text-decoration-none text-dark d-block p-4 bg-light rounded-4 hover-lift shadow-none border">
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary text-white rounded-3 p-3 me-3">
                                        <i class="bi bi-search fs-4"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-1">Cari Buku</h6>
                                        <p class="text-muted small mb-0">Temukan koleksi buku terbaru.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('student.borrowings.index') }}"
                                class="text-decoration-none text-dark d-block p-4 bg-light rounded-4 hover-lift shadow-none border">
                                <div class="d-flex align-items-center">
                                    <div class="bg-success text-white rounded-3 p-3 me-3">
                                        <i class="bi bi-card-checklist fs-4"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-1">Pinjaman Aktif</h6>
                                        <p class="text-muted small mb-0">Kelola buku yang Anda pinjam.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('student.borrowings.history') }}"
                                class="text-decoration-none text-dark d-block p-4 bg-light rounded-4 hover-lift shadow-none border">
                                <div class="d-flex align-items-center">
                                    <div class="bg-info text-white rounded-3 p-3 me-3">
                                        <i class="bi bi-history fs-4"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-1">Riwayat</h6>
                                        <p class="text-muted small mb-0">Lihat semua sejarah pinjaman.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('profile.edit') }}"
                                class="text-decoration-none text-dark d-block p-4 bg-light rounded-4 hover-lift shadow-none border">
                                <div class="d-flex align-items-center">
                                    <div class="bg-secondary text-white rounded-3 p-3 me-3">
                                        <i class="bi bi-person-gear fs-4"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-1">Profil Saya</h6>
                                        <p class="text-muted small mb-0">Ubah info dan kata sandi.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card border-0 shadow-sm rounded-4 p-4 h-100">
                    <h5 class="fw-bold mb-4">Informasi Akun</h5>
                    <div class="p-4 bg-light rounded-4">
                        <div class="d-flex justify-content-between py-2 border-bottom">
                            <span class="text-muted small">Alamat Email</span>
                            <span class="fw-semibold">{{ auth()->user()->email }}</span>
                        </div>
                        <div class="d-flex justify-content-between py-2 border-bottom">
                            <span class="text-muted small">Nomor Induk Siswa</span>
                            <span class="fw-semibold">{{ auth()->user()->nis ?? '-' }}</span>
                        </div>
                        <div class="d-flex justify-content-between py-2 border-bottom">
                            <span class="text-muted small">Kelas</span>
                            <span class="fw-semibold">{{ auth()->user()->kelas ?? '-' }}</span>
                        </div>
                        <div class="d-flex justify-content-between py-2 border-bottom">
                            <span class="text-muted small">Status Keanggotaan</span>
                            <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-2">Aktif</span>
                        </div>
                    </div>
                    <div class="mt-4 text-center">
                        <p class="text-muted small">Jika terdapat kesalahan data, silakan hubungi petugas perpustakaan untuk
                            pembaruan data anggota.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .hover-lift {
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .hover-lift:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05) !important;
            border-color: var(--primary-color) !important;
        }
    </style>
@endsection