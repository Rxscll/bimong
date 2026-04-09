@extends('layouts.admin')

@section('title', 'Kategori Buku')

@section('content')
    <div class="card p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-bold mb-1">Kategori Buku</h4>
                <p class="text-muted small mb-0">Kelola kategori untuk pengelompokan buku</p>
            </div>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary d-flex align-items-center">
                <i class="bi bi-plus-lg me-2"></i> Tambah Kategori
            </a>
        </div>

        <div class="table-responsive">
            <table class="table align-middle table-hover">
                <thead>
                    <tr>
                        <th width="80">ID</th>
                        <th>Nama Kategori</th>
                        <th>Jumlah Buku</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td><span class="text-muted fw-bold">#{{ $category->id }}</span></td>
                            <td class="fw-semibold text-dark">{{ $category->name }}</td>
                            <td>
                                <span class="badge bg-primary bg-opacity-10 text-primary px-3">
                                    {{ $category->books_count ?? $category->books->count() }} Buku
                                </span>
                            </td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('admin.categories.edit', $category->id) }}"
                                        class="btn btn-light btn-sm text-warning" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-light btn-sm text-danger" title="Hapus"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini? Semua buku dalam kategori ini akan terpengaruh.')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-5">
                                <i class="bi bi-tag fs-1 text-muted opacity-25 d-block mb-3"></i>
                                <span class="text-muted">Belum ada kategori buku</span>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4 d-flex justify-content-center">
            {{ $categories->links() }}
        </div>
    </div>
@endsection