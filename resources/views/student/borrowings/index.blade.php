@extends('layouts.student')

@section('title', 'Pinjaman Saya')

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-1">Pinjaman Aktif</h2>
                <p class="text-muted">Pantau status buku yang sedang Anda pinjam</p>
            </div>
            <div class="btn-group shadow-sm">
                <a href="{{ route('student.borrowings.index') }}" class="btn btn-primary px-4 fw-bold">Aktif</a>
                <a href="{{ route('student.borrowings.history') }}"
                    class="btn btn-white bg-white px-4 fw-semibold border text-dark">Riwayat</a>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4 py-3">Buku</th>
                            <th class="py-3">Tgl Pinjam</th>
                            <th class="py-3">Batas Kembali</th>
                            <th class="py-3">Status</th>
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
                                            <div class="small text-muted">{{ $borrowing->book->category->name }}</div>
                                        </div>
                                    </div>
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
                                        <span
                                            class="badge bg-warning bg-opacity-10 text-warning px-3 rounded-pill border border-warning border-opacity-25">Menunggu</span>
                                    @elseif($borrowing->status == 'dipinjam')
                                        <span
                                            class="badge bg-primary bg-opacity-10 text-primary px-3 rounded-pill border border-primary border-opacity-25">Dipinjam</span>
                                    @endif
                                </td>
                                <td class="pe-4 text-end">
                                    <a href="{{ route('student.borrowings.show', $borrowing->id) }}"
                                        class="btn btn-outline-primary btn-sm rounded-pill px-3 fw-bold">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5">
                                    <div class="py-4">
                                        <i class="bi bi-journal-check fs-1 text-muted opacity-25 d-block mb-3"></i>
                                        <h5 class="text-muted">Anda tidak memiliki pinjaman aktif saat ini.</h5>
                                        <a href="{{ route('student.books.index') }}" class="btn btn-primary mt-3 px-4">Pinjam
                                            Buku Sekarang</a>
                                    </div>
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