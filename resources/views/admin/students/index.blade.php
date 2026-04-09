@extends('layouts.admin')

@section('title', 'Daftar Siswa')

@section('content')
    <div class="card p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-bold mb-1">Daftar Siswa</h4>
                <p class="text-muted small mb-0">Kelola data anggota perpustakaan</p>
            </div>
            <a href="{{ route('admin.students.create') }}" class="btn btn-primary d-flex align-items-center">
                <i class="bi bi-person-plus me-2"></i> Tambah Siswa
            </a>
        </div>

        <div class="table-responsive">
            <table class="table align-middle table-hover">
                <thead>
                    <tr>
                        <th>NIS</th>
                        <th>Nama Lengkap</th>
                        <th>Kelas</th>
                        <th>Email</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($students as $student)
                        <tr>
                            <td class="fw-bold"><span class="text-secondary">{{ $student->nis ?? '-' }}</span></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm me-3 rounded-circle bg-light d-flex align-items-center justify-content-center text-primary fw-bold"
                                        style="width: 32px; height: 32px; font-size: 12px;">
                                        {{ substr($student->name, 0, 1) }}
                                    </div>
                                    <span class="fw-semibold">{{ $student->name }}</span>
                                </div>
                            </td>
                            <td><span
                                    class="badge bg-secondary bg-opacity-10 text-secondary">{{ $student->kelas ?? '-' }}</span>
                            </td>
                            <td class="text-muted small">{{ $student->email }}</td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('admin.students.edit', $student->id) }}"
                                        class="btn btn-light btn-sm text-warning" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="{{ route('admin.students.destroy', $student->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-light btn-sm text-danger" title="Hapus"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus siswa ini?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                <i class="bi bi-people fs-1 text-muted opacity-25 d-block mb-3"></i>
                                <span class="text-muted">Belum ada data siswa</span>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4 d-flex justify-content-center">
            {{ $students->links() }}
        </div>
    </div>
@endsection