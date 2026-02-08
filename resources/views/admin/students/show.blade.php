@extends('layouts.admin')

@section('title', 'Detail Siswa')

@section('content')
    <div class="row g-4">
        <div class="col-lg-4">
            <div class="card p-4 text-center h-100">
                <div class="mb-4 d-flex justify-content-center">
                    <div class="avatar-lg rounded-circle bg-primary bg-opacity-10 text-primary d-flex align-items-center justify-content-center fw-bold"
                        style="width: 100px; height: 100px; font-size: 40px;">
                        {{ strtoupper(substr($student->name, 0, 1)) }}
                    </div>
                </div>
                <h4 class="fw-bold text-dark mb-1">{{ $student->name }}</h4>
                <p class="text-muted small mb-4">{{ $student->email }}</p>

                <div class="p-3 bg-light rounded-4 text-start mb-4">
                    <div class="mb-2">
                        <span class="text-muted small fw-bold text-uppercase d-block" style="font-size: 10px;">Nomor Induk
                            Siswa</span>
                        <span class="fw-bold text-dark">{{ $student->nis ?? '-' }}</span>
                    </div>
                    <div class="mb-0">
                        <span class="text-muted small fw-bold text-uppercase d-block" style="font-size: 10px;">Kelas</span>
                        <span class="fw-bold text-dark">{{ $student->kelas ?? '-' }}</span>
                    </div>
                </div>

                <div class="d-grid gap-2">
                    <a href="{{ route('admin.students.edit', $student->id) }}" class="btn btn-warning fw-bold text-white">
                        <i class="bi bi-pencil-square me-2"></i> Edit Profil
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card p-4 mb-4">
                <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
                    <h5 class="fw-bold mb-0">Aktivitas Peminjaman</h5>
                    <a href="{{ route('admin.students.index') }}" class="btn btn-light btn-sm border">
                        <i class="bi bi-arrow-left me-1"></i> Kembali
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>Buku</th>
                                <th>Tanggal Pinjam</th>
                                <th>Status</th>
                                <th>Denda</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($student->borrowings()->latest()->take(5)->get() as $borrowing)
                                <tr>
                                    <td class="fw-semibold">{{ $borrowing->book->judul }}</td>
                                    <td>{{ \Carbon\Carbon::parse($borrowing->tanggal_pinjam)->format('d M Y') }}</td>
                                    <td>
                                        @if($borrowing->status == 'pending')
                                            <span class="badge bg-warning text-dark rounded-pill">Menunggu</span>
                                        @elseif($borrowing->status == 'dipinjam')
                                            <span class="badge bg-primary rounded-pill">Dipinjam</span>
                                        @elseif($borrowing->status == 'selesai')
                                            <span class="badge bg-success rounded-pill">Selesai</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($borrowing->denda > 0)
                                            <span class="text-danger fw-bold small">Rp
                                                {{ number_format($borrowing->denda, 0, ',', '.') }}</span>
                                        @else
                                            <span class="text-muted small">-</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-muted small">Belum ada riwayat peminjaman buku.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row g-4 text-center">
                <div class="col-md-6">
                    <div class="card p-4 border-start border-4 border-primary">
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="me-3 fs-2 text-primary opacity-50">
                                <i class="bi bi-clock-history"></i>
                            </div>
                            <div class="text-start">
                                <h3 class="fw-bold mb-0">{{ $student->borrowings()->count() }}</h3>
                                <p class="text-muted small mb-0">Total Peminjaman</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card p-4 border-start border-4 border-info">
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="me-3 fs-2 text-info opacity-50">
                                <i class="bi bi-book"></i>
                            </div>
                            <div class="text-start">
                                <h3 class="fw-bold mb-0">{{ $student->borrowings()->where('status', 'dipinjam')->count() }}
                                </h3>
                                <p class="text-muted small mb-0">Buku di Tangan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection