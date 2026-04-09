@extends('layouts.admin')

@section('title', 'Kelola Buku Digital')

@section('content')
<div class="container-fluid p-6">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Kelola Buku Digital</h1>
            <p class="text-gray-600 mt-1">Kelola koleksi buku digital perpustakaan</p>
        </div>
        <a href="{{ route('admin.books.create') }}" 
           class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors flex items-center">
            <i class="bi bi-plus-circle mr-2"></i>
            Tambah Buku
        </a>
    </div>

    <!-- Search and Filter -->
    <div class="bg-white rounded-lg shadow-md p-4 mb-6">
        <form method="GET" class="flex flex-col md:flex-row gap-4">
            <div class="flex-1">
                <input type="text" name="search" value="{{ request('search') }}" 
                       placeholder="Cari buku..." 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <div class="md:w-48">
                <select name="category_id" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">Semua Kategori</option>
                    @foreach(\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" 
                    class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200 transition-colors">
                <i class="bi bi-search"></i>
                Cari
            </button>
        </form>
    </div>

    <!-- Books Table -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cover</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Penulis</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dibaca</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">PDF</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($books as $book)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <img src="{{ $book->cover_url }}" alt="{{ $book->judul }}" 
                                     class="h-12 w-10 object-cover rounded">
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900">{{ $book->judul }}</div>
                                <div class="text-sm text-gray-500">{{ $book->kode_buku }}</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $book->penulis }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    {{ $book->category->nama }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $book->jumlah_dibaca }}</td>
                            <td class="px-6 py-4">
                                @if($book->file_pdf)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                        <i class="bi bi-file-pdf mr-1"></i>PDF
                                    </span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                        Tidak Ada
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm font-medium">
                                <div class="flex space-x-2">
                                    <a href="{{ route('admin.books.show', $book->id) }}" 
                                       class="text-blue-600 hover:text-blue-900">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.books.edit', $book->id) }}" 
                                       class="text-indigo-600 hover:text-indigo-900">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST" 
                                          onsubmit="return confirm('Hapus buku {{ $book->judul }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                <div class="py-8">
                                    <i class="bi bi-inbox text-4xl text-gray-300 mb-4 block"></i>
                                    <p class="text-lg font-medium">Belum ada buku</p>
                                    <p class="text-gray-500">Mulai dengan menambahkan buku digital pertama</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        @if($books->hasPages())
            <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                <div class="flex items-center justify-between">
                    <div class="text-sm text-gray-700">
                        Menampilkan {{ $books->firstItem() }} hingga {{ $books->lastItem() }} dari {{ $books->total() }} buku
                    </div>
                    {{ $books->links() }}
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
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
                                <span class="text-muted">Perpustakaan Sedang Kosong</span>
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