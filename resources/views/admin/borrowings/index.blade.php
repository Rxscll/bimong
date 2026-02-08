@extends('layouts.admin')

@section('title', 'Daftar Peminjaman')

@section('content')
    <div class="card p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-bold mb-1">Daftar Peminjaman</h4>
                <p class="text-muted small mb-0">Kelola permintaan dan pengembalian buku</p>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table align-middle table-hover">
                <thead>
                    <tr>
                        <th>Siswa</th>
                        <th>Buku</th>
                        <th>Tgl Pinjam</th>
                        <th>Batas Kembali</th>
                        <th>Status</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($borrowings as $borrowing)
                        <tr>
                            <td>
                                <div class="fw-semibold">{{ $borrowing->user->name }}</div>
                                <div class="text-muted small">NIS: {{ $borrowing->user->nis ?? '-' }}</div>
                            </td>
                            <td>
                                <div class="fw-semibold">{{ $borrowing->book->judul }}</div>
                                <div class="text-muted small">Kode: {{ $borrowing->book->kode_buku }}</div>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($borrowing->tanggal_pinjam)->format('d M Y') }}</td>
                            <td>
                                <div
                                    class="{{ \Carbon\Carbon::parse($borrowing->tanggal_kembali_rencana)->isPast() && $borrowing->status == 'dipinjam' ? 'text-danger fw-bold' : '' }}">
                                    {{ \Carbon\Carbon::parse($borrowing->tanggal_kembali_rencana)->format('d M Y') }}
                                </div>
                            </td>
                            <td>
                                @if($borrowing->status == 'pending')
                                    <span class="badge bg-warning text-dark">Menunggu</span>
                                @elseif($borrowing->status == 'dipinjam')
                                    <span class="badge bg-primary">Dipinjam</span>
                                @elseif($borrowing->status == 'selesai')
                                    <span class="badge bg-success">Selesai</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('admin.borrowings.show', $borrowing->id) }}" class="btn btn-light btn-sm"
                                        title="Detail">
                                        <i class="bi bi-eye"></i>
                                    </a>

                                    @if($borrowing->status == 'pending')
                                        <form action="{{ route('admin.borrowings.approve', $borrowing->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm"
                                                onclick="return confirm('Setujui peminjaman ini?')">
                                                <i class="bi bi-check-lg pe-1"></i> Setujui
                                            </button>
                                        </form>
                                    @endif

                                    @if($borrowing->status == 'dipinjam')
                                        <form action="{{ route('admin.borrowings.return', $borrowing->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-warning btn-sm"
                                                onclick="return confirm('Konfirmasi pengembalian buku?')">
                                                <i class="bi bi-arrow-return-left pe-1"></i> Kembali
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <i class="bi bi-clipboard-x fs-1 text-muted d-block mb-2"></i>
                                <span class="text-muted">Tidak ada data peminjaman</span>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4 d-flex justify-content-center">
            {{ $borrowings->links() }}
        </div>
    </div>
@endsection