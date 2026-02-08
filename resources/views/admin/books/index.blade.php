@extends('layouts.admin')

@section('title', 'Daftar Buku')

@section('content')
    <div class="card p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-bold mb-1">Daftar Buku</h4>
                <p class="text-muted small mb-0">Kelola koleksi buku perpustakaan</p>
            </div>
            <a href="{{ route('admin.books.create') }}" class="btn btn-primary d-flex align-items-center">
                <i class="bi bi-plus-lg me-2"></i> Tambah Buku
            </a>
        </div>

        <div class="table-responsive">
            <table class="table align-middle table-hover">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($books as $book)
                        <tr>
                            <td class="fw-bold">{{ $book->kode_buku }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    @if($book->image)
                                        <img src="{{ asset('storage/' . $book->image) }}" class="rounded me-2" width="32"
                                            height="40" style="object-fit: cover;">
                                    @else
                                        <div class="bg-light rounded d-flex align-items-center justify-content-center me-2"
                                            style="width: 32px; height: 40px;">
                                            <i class="bi bi-book text-muted"></i>
                                        </div>
                                    @endif
                                    <span class="fw-semibold">{{ $book->judul }}</span>
                                </div>
                            </td>
                            <td>{{ $book->penulis }}</td>
                            <td>
                                <span class="badge bg-primary bg-opacity-10 text-primary">
                                    {{ $book->category->name }}
                                </span>
                            </td>
                            <td>
                                <span class="fw-bold {{ $book->stok < 5 ? 'text-danger' : 'text-dark' }}">
                                    {{ $book->stok }}
                                </span>
                            </td>
                            <td class="text-end">
                                <div class="dropdown">
                                    <button class="btn btn-light btn-sm btn-icon rounded-circle" type="button"
                                        data-bs-toggle="dropdown">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm">
                                        <li><a class="dropdown-item" href="{{ route('admin.books.show', $book->id) }}"><i
                                                    class="bi bi-eye me-2"></i> Lihat</a></li>
                                        <li><a class="dropdown-item" href="{{ route('admin.books.edit', $book->id) }}"><i
                                                    class="bi bi-pencil me-2"></i> Edit</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                            <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item text-danger"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                                                    <i class="bi bi-trash me-2"></i> Hapus
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <i class="bi bi-journal-x fs-1 text-muted d-block mb-2"></i>
                                <span class="text-muted">Tidak ada buku pengadilan</span>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4 d-flex justify-content-center">
            {{ $books->links() }}
        </div>
    </div>
@endsection