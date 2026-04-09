@extends('layouts.admin')

@section('title', 'Detail Peminjaman')

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card p-4 mb-4">
                <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
                    <h4 class="fw-bold mb-0">Informasi Peminjaman</h4>
                    <a href="{{ route('admin.borrowings.index') }}" class="btn btn-light btn-sm border">
                        <i class="bi bi-arrow-left me-1"></i> Kembali
                    </a>
                </div>

                <div class="row g-4 mb-4">
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-4 border-start border-4 border-primary">
                            <h6 class="fw-bold mb-3 text-primary"><i class="bi bi-person-fill me-2"></i> Data Siswa</h6>
                            <table class="table table-sm table-borderless mb-0">
                                <tr>
                                    <td class="text-muted small py-1">Nama</td>
                                    <td class="fw-semibold py-1">{{ $borrowing->user->name }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted small py-1">NIS</td>
                                    <td class="fw-semibold py-1">{{ $borrowing->user->nis ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted small py-1">Kelas</td>
                                    <td class="fw-semibold py-1">{{ $borrowing->user->kelas ?? '-' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-4 border-start border-4 border-info">
                            <h6 class="fw-bold mb-3 text-info"><i class="bi bi-book-fill me-2"></i> Data Buku</h6>
                            <table class="table table-sm table-borderless mb-0">
                                <tr>
                                    <td class="text-muted small py-1">Judul</td>
                                    <td class="fw-semibold py-1">{{ $borrowing->book->judul }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted small py-1">Kode</td>
                                    <td class="fw-semibold py-1">{{ $borrowing->book->kode_buku }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted small py-1">Kategori</td>
                                    <td class="fw-semibold py-1">{{ $borrowing->book->category->name }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold mb-3">Linimasa Waktu</h6>
                <div class="table-responsive">
                    <table class="table align-middle">
                        <tr class="border-bottom">
                            <td class="text-muted py-3">Status Saat Ini</td>
                            <td class="py-3">
                                @if($borrowing->status == 'pending')
                                    <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">Menunggu Persetujuan</span>
                                @elseif($borrowing->status == 'dipinjam')
                                    <span class="badge bg-primary px-3 py-2 rounded-pill">Sedang Dipinjam</span>
                                @elseif($borrowing->status == 'selesai')
                                    <span class="badge bg-success px-3 py-2 rounded-pill">Selesai Dikembalikan</span>
                                @endif
                            </td>
                        </tr>
                        <tr class="border-bottom">
                            <td class="text-muted py-3">Tanggal Pinjam</td>
                            <td class="fw-bold py-3">
                                {{ \Carbon\Carbon::parse($borrowing->tanggal_pinjam)->format('d F Y') }}</td>
                        </tr>
                        <tr class="border-bottom">
                            <td class="text-muted py-3">Batas Kembali</td>
                            <td class="fw-bold py-3">
                                {{ \Carbon\Carbon::parse($borrowing->tanggal_kembali_rencana)->format('d F Y') }}</td>
                        </tr>
                        @if($borrowing->tanggal_kembali_real)
                            <tr class="border-bottom">
                                <td class="text-muted py-3">Tanggal Kembali Riil</td>
                                <td class="fw-bold py-3 text-success">
                                    {{ \Carbon\Carbon::parse($borrowing->tanggal_kembali_real)->format('d F Y') }}</td>
                            </tr>
                        @endif
                        <tr>
                            <td class="text-muted py-3">Total Denda</td>
                            <td class="py-3 py-3">
                                @if($borrowing->denda > 0)
                                    <h5 class="fw-bold text-danger mb-0">Rp {{ number_format($borrowing->denda, 0, ',', '.') }}
                                    </h5>
                                @else
                                    <span class="badge bg-success bg-opacity-10 text-success">Tidak Ada Denda</span>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card p-4 sticky-top" style="top: 100px;">
                <h5 class="fw-bold mb-4">Aksi Operator</h5>

                @if($borrowing->status == 'pending')
                    <div class="alert alert-warning border-0 small mb-4">
                        <i class="bi bi-info-circle me-2"></i> Permintaan peminjaman baru. Silakan periksa stok buku sebelum
                        menyetujui.
                    </div>
                    <form action="{{ route('admin.borrowings.approve', $borrowing->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success w-100 py-3 fw-bold rounded-3 shadow-sm mb-2"
                            onclick="return confirm('Setujui peminjaman ini?')">
                            <i class="bi bi-check-circle me-2"></i> Setujui Peminjaman
                        </button>
                    </form>
                @elseif($borrowing->status == 'dipinjam')
                    <div class="alert alert-primary border-0 small mb-4">
                        <i class="bi bi-book me-2"></i> Buku masih di tangan siswa. Klik tombol di bawah jika buku sudah
                        dikembalikan secara fisik.
                    </div>
                    <form action="{{ route('admin.borrowings.return', $borrowing->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary w-100 py-3 fw-bold rounded-3 shadow-sm mb-2"
                            onclick="return confirm('Konfirmasi pengembalian buku?')">
                            <i class="bi bi-arrow-return-left me-2"></i> Konfirmasi Kembali
                        </button>
                    </form>
                @else
                    <div class="text-center py-4">
                        <div class="bg-success bg-opacity-10 text-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                            style="width: 60px; height: 60px;">
                            <i class="bi bi-check-lg fs-2"></i>
                        </div>
                        <h6>Transaksi Selesai</h6>
                        <p class="text-muted small">Buku telah dikembalikan dan status transaksi sudah ditutup.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection