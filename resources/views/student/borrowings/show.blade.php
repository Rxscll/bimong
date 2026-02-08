@extends('layouts.student')

@section('title', 'Detail Peminjaman')

@section('content')
    <div class="container py-5 text-center" style="max-width: 800px;">
        <div class="mb-4 d-flex justify-content-start">
            <a href="{{ route('student.borrowings.index') }}"
                class="text-decoration-none d-flex align-items-center text-muted">
                <i class="bi bi-arrow-left me-2"></i> Kembali
            </a>
        </div>

        <div class="card border-0 shadow-sm p-4 p-md-5 rounded-4 overflow-hidden mb-4">
            <div class="row g-4 align-items-center">
                <div class="col-md-4">
                    <div class="rounded-4 overflow-hidden shadow-sm bg-light mx-auto" style="width: 150px; height: 210px;">
                        @if($borrowing->book->image)
                            <img src="{{ asset('storage/' . $borrowing->book->image) }}" class="w-100 h-100 object-fit-cover">
                        @else
                            <div class="w-100 h-100 d-flex align-items-center justify-content-center text-muted opacity-25">
                                <i class="bi bi-book fs-1"></i>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-8 text-md-start">
                    <div class="mb-2">
                        <span class="badge-category">{{ $borrowing->book->category->name }}</span>
                    </div>
                    <h2 class="fw-bold mb-1">{{ $borrowing->book->judul }}</h2>
                    <p class="text-muted mb-4 text-md-start">oleh {{ $borrowing->book->penulis }}</p>

                    <div class="row text-start g-3">
                        <div class="col-6">
                            <div class="small text-muted fw-bold text-uppercase" style="font-size: 10px;">Status</div>
                            @if($borrowing->status == 'pending')
                                <div class="fw-bold text-warning"><i class="bi bi-hourglass-split me-1"></i> Menunggu</div>
                            @elseif($borrowing->status == 'dipinjam')
                                <div class="fw-bold text-primary"><i class="bi bi-book-half me-1"></i> Dipinjam</div>
                            @elseif($borrowing->status == 'selesai')
                                <div class="fw-bold text-success"><i class="bi bi-check-circle-fill me-1"></i> Selesai</div>
                            @endif
                        </div>
                        <div class="col-6">
                            <div class="small text-muted fw-bold text-uppercase" style="font-size: 10px;">Batas Kembali
                            </div>
                            <div class="fw-bold text-dark">
                                {{ \Carbon\Carbon::parse($borrowing->tanggal_kembali_rencana)->format('d M Y') }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5 p-4 bg-light rounded-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="fw-bold mb-0">Rincian Transaksi</h6>
                    @if($borrowing->denda > 0)
                        <span class="badge bg-danger rounded-pill">Terlambat</span>
                    @endif
                </div>
                <div class="d-flex justify-content-between py-2 border-bottom">
                    <span class="text-muted small">Tanggal Peminjaman</span>
                    <span
                        class="fw-semibold">{{ \Carbon\Carbon::parse($borrowing->tanggal_pinjam)->format('d F Y') }}</span>
                </div>
                @if($borrowing->tanggal_kembali_real)
                    <div class="d-flex justify-content-between py-2 border-bottom">
                        <span class="text-muted small">Tanggal Pengembalian</span>
                        <span
                            class="fw-semibold">{{ \Carbon\Carbon::parse($borrowing->tanggal_kembali_real)->format('d F Y') }}</span>
                    </div>
                @endif
                <div class="d-flex justify-content-between py-2 border-bottom">
                    <span class="text-muted small">Status Buku</span>
                    <span class="fw-semibold text-capitalize">{{ $borrowing->status }}</span>
                </div>
                <div class="d-flex justify-content-between py-3">
                    <span class="fw-bold">Total Denda</span>
                    <span class="fw-bold text-danger fs-5">Rp {{ number_format($borrowing->denda, 0, ',', '.') }}</span>
                </div>
            </div>
        </div>

        @if($borrowing->status == 'pending')
            <div class="alert alert-warning border-0 shadow-sm rounded-4 p-4 text-start">
                <div class="d-flex">
                    <div class="me-3 fs-3 text-warning">
                        <i class="bi bi-info-circle-fill"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1">Menunggu Persetujuan</h6>
                        <p class="text-muted small mb-0">Permintaan peminjaman Anda sedang ditinjau oleh petugas. Silakan datang
                            ke meja perpustakaan untuk mengambil buku fisik setelah status berubah menjadi "Dipinjam".</p>
                    </div>
                </div>
            </div>
        @elseif($borrowing->status == 'dipinjam')
            <div class="alert alert-primary border-0 shadow-sm rounded-4 p-4 text-start">
                <div class="d-flex">
                    <div class="me-3 fs-3 text-primary">
                        <i class="bi bi-clock-history"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1">Sedang Dipinjam</h6>
                        <p class="text-muted small mb-0">Buku ada pada Anda. Pastikan dikembalikan tepat waktu sebelum
                            <strong>{{ \Carbon\Carbon::parse($borrowing->tanggal_kembali_rencana)->format('d F Y') }}</strong>
                            untuk menghindari denda keterlambatan Rp 1.000/hari.</p>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection