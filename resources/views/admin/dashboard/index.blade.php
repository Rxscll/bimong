@extends('layouts.admin')

@section('title', 'Dasbor')

@section('content')
    <div class="row g-4 mb-4">
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card stat-card p-3">
                <div class="d-flex align-items-center">
                    <div class="icon-box bg-primary bg-opacity-10 text-primary me-3">
                        <i class="bi bi-book"></i>
                    </div>
                    <div>
                        <p class="text-muted small mb-1">Total Buku</p>
                        <h4 class="mb-0 fw-bold">{{ $totalBooks }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card stat-card p-3">
                <div class="d-flex align-items-center">
                    <div class="icon-box bg-success bg-opacity-10 text-success me-3">
                        <i class="bi bi-people"></i>
                    </div>
                    <div>
                        <p class="text-muted small mb-1">Total Siswa</p>
                        <h4 class="mb-0 fw-bold">{{ $totalStudents }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card stat-card p-3">
                <div class="d-flex align-items-center">
                    <div class="icon-box bg-info bg-opacity-10 text-info me-3">
                        <i class="bi bi-arrow-left-right"></i>
                    </div>
                    <div>
                        <p class="text-muted small mb-1">Buku Dipinjam</p>
                        <h4 class="mb-0 fw-bold">{{ $booksBorrowed }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card stat-card p-3 bg-danger bg-opacity-10">
                <div class="d-flex align-items-center">
                    <div class="icon-box bg-danger bg-opacity-10 text-danger me-3">
                        <i class="bi bi-clock-history"></i>
                    </div>
                    <div>
                        <p class="text-danger small mb-1">Butuh Disetujui</p>
                        <h4 class="mb-0 fw-bold text-danger">{{ $pendingBorrowings }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-12 col-lg-8">
            <div class="card p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="fw-bold mb-0">Aksi Cepat</h5>
                </div>
                <div class="row g-3">
                    <div class="col-6 col-md-3">
                        <a href="{{ route('admin.books.create') }}"
                            class="btn btn-outline-primary w-100 py-3 d-flex flex-column align-items-center">
                            <i class="bi bi-plus-circle fs-3 mb-2"></i>
                            <span class="small fw-semibold">Buku Baru</span>
                        </a>
                    </div>
                    <div class="col-6 col-md-3">
                        <a href="{{ route('admin.categories.create') }}"
                            class="btn btn-outline-primary w-100 py-3 d-flex flex-column align-items-center">
                            <i class="bi bi-tag fs-3 mb-2"></i>
                            <span class="small fw-semibold">Kategori</span>
                        </a>
                    </div>
                    <div class="col-6 col-md-3">
                        <a href="{{ route('admin.students.create') }}"
                            class="btn btn-outline-primary w-100 py-3 d-flex flex-column align-items-center">
                            <i class="bi bi-person-plus fs-3 mb-2"></i>
                            <span class="small fw-semibold">Siswa Baru</span>
                        </a>
                    </div>
                    <div class="col-6 col-md-3">
                        <a href="{{ route('admin.borrowings.index') }}"
                            class="btn btn-outline-primary w-100 py-3 d-flex flex-column align-items-center">
                            <i class="bi bi-card-list fs-3 mb-2"></i>
                            <span class="small fw-semibold">Pinjaman</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="card p-4 h-100">
                <h5 class="fw-bold mb-4">Informasi Sistem</h5>
                <div class="d-flex flex-column gap-3">
                    <div class="p-3 bg-light rounded-3 d-flex justify-content-between align-items-center">
                        <span class="small text-muted">Status</span>
                        <span class="badge bg-success-subtle text-success">Online</span>
                    </div>
                    <div class="p-3 bg-light rounded-3 d-flex justify-content-between align-items-center">
                        <span class="small text-muted">Buku Terlambat</span>
                        <span class="fw-bold text-danger">{{ $lateReturns }}</span>
                    </div>
                    <div class="p-3 bg-light rounded-3 d-flex justify-content-between align-items-center">
                        <span class="small text-muted">Versi</span>
                        <span class="fw-bold text-dark">v1.2.0</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection