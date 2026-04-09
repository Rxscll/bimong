@extends('layouts.student')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid p-6">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Selamat Datang!</h1>
        <p class="text-gray-600 mt-2">{{ auth()->user()->name }}, jelajahi koleksi buku digital perpustakaan</p>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Books -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-blue-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 font-medium">Total Buku</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $totalBooks }}</p>
                </div>
                <div class="bg-blue-100 rounded-full p-3">
                    <i class="bi bi-book text-blue-600 text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Favorites -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-red-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 font-medium">Favorit</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $totalFavorites }}</p>
                </div>
                <div class="bg-red-100 rounded-full p-3">
                    <i class="bi bi-heart text-red-600 text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Read Books -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-green-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 font-medium">Sudah Dibaca</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $totalReadBooks }}</p>
                </div>
                <div class="bg-green-100 rounded-full p-3">
                    <i class="bi bi-check-circle text-green-600 text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Reading Progress -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-purple-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 font-medium">Progress</p>
                    <p class="text-2xl font-bold text-gray-900">{{ round(($totalReadBooks / max($totalBooks, 1)) * 100) }}%</p>
                </div>
                <div class="bg-purple-100 rounded-full p-3">
                    <i class="bi bi-graph-up text-purple-600 text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Recent Books -->
        <div class="lg:col-span-2 bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                <i class="bi bi-clock-history text-blue-500 mr-2"></i>
                Buku Terbaru
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @forelse($recentBooks as $book)
                    <div class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors cursor-pointer" onclick="window.location.href='{{ route('student.books.show', $book->id) }}'">
                        <img src="{{ $book->cover_url }}" alt="{{ $book->judul }}" 
                             class="w-12 h-16 object-cover rounded">
                        <div class="flex-1">
                            <h4 class="font-medium text-gray-900 text-sm">{{ Str::limit($book->judul, 25) }}</h4>
                            <p class="text-xs text-gray-600">{{ $book->penulis }}</p>
                        </div>
                    </div>
                @empty
                    <div class="col-span-2 text-center py-4 text-gray-500">
                        <p>Belum ada buku tersedia</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Popular Books -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                <i class="bi bi-fire text-orange-500 mr-2"></i>
                Populer
            </h3>
            <div class="space-y-3">
                @forelse($popularBooks as $book)
                    <div class="flex items-center space-x-3 p-2 hover:bg-gray-50 rounded-lg transition-colors cursor-pointer" onclick="window.location.href='{{ route('student.books.show', $book->id) }}'">
                        <img src="{{ $book->cover_url }}" alt="{{ $book->judul }}" 
                             class="w-10 h-14 object-cover rounded">
                        <div class="flex-1">
                            <h4 class="font-medium text-gray-900 text-sm">{{ Str::limit($book->judul, 20) }}</h4>
                            <p class="text-xs text-gray-600">{{ $book->jumlah_dibaca }} dibaca</p>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-4 text-gray-500">
                        <p>Belum ada buku populer</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Recent Reading Activity -->
    @if($recentReadings->count() > 0)
        <div class="mt-6 bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                <i class="bi bi-clock text-green-500 mr-2"></i>
                Aktivitas Terbaru
            </h3>
            <div class="space-y-3">
                @foreach($recentReadings as $reading)
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                        <div class="flex items-center space-x-3">
                            <img src="{{ $reading->book->cover_url }}" alt="{{ $reading->book->judul }}" 
                                 class="w-10 h-14 object-cover rounded">
                            <div>
                                <h4 class="font-medium text-gray-900">{{ $reading->book->judul }}</h4>
                                <p class="text-sm text-gray-600">{{ $reading->created_at->format('d M Y, H:i') }}</p>
                            </div>
                        </div>
                        <a href="{{ route('student.books.read', $reading->book->id) }}" 
                           class="px-3 py-1 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700 transition-colors">
                            <i class="bi bi-book mr-1"></i>
                            Lanjut Baca
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection
                    </div>
                    <button type="button" class="btn btn-sm btn-primary">
                        <i class="bi bi-plus-circle"></i> Pinjam Buku
                    </button>
                </div>
            </div>

            <!-- Welcome Card -->
            <div class="card mb-4 bg-primary text-white">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h3 class="card-title">Selamat Datang, {{ auth()->user()->name }}! </h3>
                            <p class="card-text opacity-75">Jelajahi koleksi buku perpustakaan kami dan temukan pengetahuan baru setiap hari.</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <i class="bi bi-book-half display-1 opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity & Quick Actions -->
            <div class="row">
                <!-- Recent Activity -->
                <div class="col-lg-8 mb-4">
                    <div class="card shadow">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Aktivitas Terbaru</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in">
                                    <a class="dropdown-item" href="#">Lihat Semua</a>
                                    <a class="dropdown-item" href="#">Export Data</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @if($recentReadings->count() > 0)
                                @foreach($recentReadings as $reading)
                                <div class="d-flex align-items-center mb-3">
                                    <div class="flex-shrink-0">
                                        <div class="bg-success bg-opacity-10 rounded-circle p-2">
                                            <i class="bi bi-book text-success"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-1">{{ $reading->book->judul }}</h6>
                                        <p class="text-muted small mb-0">
                                            {{ $reading->created_at->format('d M Y') }} - 
                                            Halaman {{ $reading->last_page ?? '1' }}
                                        </p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <a href="{{ route('student.books.read', $reading->book->id) }}" 
                                           class="btn btn-sm btn-primary">
                                            <i class="bi bi-book"></i> Lanjut Baca
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <div class="text-center py-4">
                                    <i class="bi bi-clock-history text-3xl text-muted mb-3 d-block"></i>
                                    <p class="text-muted">Belum ada aktivitas membaca</p>
                                    <a href="{{ route('student.books.index') }}" class="btn btn-primary btn-sm">
                                        <i class="bi bi-book me-1"></i> Mulai Membaca
                                    </a>
                                </div>
                            @endif 
                                            <span class="badge bg-{{ $borrowing->status_color }}">{{ $borrowing->status }}</span>
                                        </p>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <p class="text-muted text-center">Belum ada aktivitas pinjaman</p>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="col-lg-4 mb-4">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Akses Cepat</h6>
                        </div>
                        <div class="card-body">
                            <div class="d-grid gap-2">
                                <a href="{{ route('student.books.index') }}" class="btn btn-primary btn-sm">
                                    <i class="bi bi-search me-2"></i> Cari Buku
                                </a>
                                <a href="{{ route('student.borrowings.index') }}" class="btn btn-success btn-sm">
                                    <i class="bi bi-journal-text me-2"></i> Pinjaman Saya
                                </a>
                                <a href="{{ route('student.borrowings.history') }}" class="btn btn-info btn-sm">
                                    <i class="bi bi-clock-history me-2"></i> Riwayat
                                </a>
                                <a href="{{ route('profile.edit') }}" class="btn btn-secondary btn-sm">
                                    <i class="bi bi-person me-2"></i> Profil
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- User Info Card -->
            <div class="row">
                <div class="col-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Informasi Akun</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Nama:</strong> {{ auth()->user()->name }}</p>
                                    <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                                    <p><strong>NIS:</strong> {{ auth()->user()->nis ?? '-' }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Kelas:</strong> {{ auth()->user()->kelas ?? '-' }}</p>
                                    <p><strong>Status:</strong> <span class="badge bg-success">Aktif</span></p>
                                    <p><strong>Bergabung:</strong> {{ auth()->user()->created_at->format('d M Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<style>
.sidebar {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    z-index: 100;
    padding: 80px 0 0;
    box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
    width: 240px;
}

.sidebar-sticky {
    position: relative;
    top: 0;
    height: calc(100vh - 80px);
    padding-top: .5rem;
    overflow-x: hidden;
    overflow-y: auto;
}

.sidebar .nav-link {
    font-weight: 500;
    color: #333;
    padding: 0.75rem 1rem;
    border-radius: 0.25rem;
}

.sidebar .nav-link:hover {
    color: #F75D34 !important;
    background-color: rgba(247, 93, 52, 0.05);
}

.sidebar .nav-link.active {
    color: #F75D34 !important;
    background-color: rgba(247, 93, 52, 0.1);
}

.sidebar .nav-link i {
    margin-right: 0.5rem;
}

.border-left-primary {
    border-left: 0.25rem solid #F75D34 !important;
}

.border-left-success {
    border-left: 0.25rem solid #1cc88a !important;
}

.border-left-info {
    border-left: 0.25rem solid #36b9cc !important;
}

.border-left-warning {
    border-left: 0.25rem solid #f6c23e !important;
}

.text-primary {
    color: #F75D34 !important;
}

.bg-primary {
    background-color: #F75D34 !important;
}

.btn-primary {
    background-color: #F75D34 !important;
    border-color: #F75D34 !important;
}

.btn-primary:hover {
    background-color: #FF8C42 !important;
    border-color: #FF8C42 !important;
}

@media (max-width: 767.98px) {
    .sidebar {
        position: static;
        height: auto;
        padding-top: 0;
        width: 100%;
        box-shadow: none;
    }
    
    .sidebar-sticky {
        height: auto;
    }
    
    main {
        margin-left: 0 !important;
    }
}
</style>
@endsection