@extends('layouts.student')

@section('title', 'Riwayat Pinjaman')

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-1">Riwayat Pinjaman</h2>
                <p class="text-muted">Buku yang telah Anda kembalikan</p>
            </div>
            <div class="btn-group shadow-sm">
                <a href="{{ route('student.borrowings.index') }}"
                    class="btn btn-white bg-white px-4 fw-semibold border text-dark">Aktif</a>
                <a href="{{ route('student.borrowings.history') }}" class="btn btn-primary px-4 fw-bold">Riwayat</a>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4 py-3">Buku</th>
                            <th class="py-3">Tgl Pinjam</th>
                            <th class="py-3">Tgl Kembali</th>
                            <th class="py-3">Denda</th>
                            <th class="pe-4 py-3 text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($borrowings as $borrowing)
                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center py-2">
                                        <div class="bg-light rounded p-1 me-3 d-flex align-items-center justify-content-center"
                                            style="width: 40px; height: 50px;">
                                            @if($borrowing->book->image)
                                                <img src="{{ asset('storage/' . $borrowing->book->image) }}"
                                                    class="w-100 h-100 object-fit-cover rounded">
                                            @else
                                                <i class="bi bi-book text-muted opacity-50"></i>
                                            @endif
                                        </div>
                                        <div>
                                            <div class="fw-bold text-dark">{{ $borrowing->book->judul }}</div>
                                            <div class="small text-muted text-uppercase fw-bold" style="font-size: 10px;">
                                                {{ $borrowing->book->category->name }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($borrowing->tanggal_pinjam)->format('d M Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($borrowing->tanggal_kembali_real)->format('d M Y') }}</td>
                                <td>
                                    @if($borrowing->denda > 0)
                                        <span class="text-danger fw-bold">Rp
                                            {{ number_format($borrowing->denda, 0, ',', '.') }}</span>
                                    @else
                                        <span class="text-success small fw-semibold">Tidak ada</span>
                                    @endif
                                </td>
                                <td class="pe-4 text-end">
                                    <a href="{{ route('student.borrowings.show', $borrowing->id) }}"
                                        class="btn btn-light btn-sm rounded-pill px-3 fw-bold border">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted"> Belum ada riwayat peminjaman yang selesai.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-4 d-flex justify-content-center">
            {{ $borrowings->links() }}
        </div>
    </div>
@endsection