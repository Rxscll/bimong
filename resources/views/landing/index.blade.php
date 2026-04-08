@extends('layouts.landing')

@section('title', 'PerpusSiswa - Perpustakaan Digital Sekolah')

@section('content')
<!-- Hero Section -->
<section id="home" class="hero-section">
    <div class="container">
        <div class="row align-items-center justify-content-center min-vh-100">
            <div class="col-lg-8">
                <div class="hero-content text-center">
                    <!-- Library Icons Background -->
                    <div class="position-absolute top-0 start-0 w-100 h-100" style="z-index: 1;">
                        <i class="bi bi-book position-absolute" style="top: 10%; left: 5%; font-size: 3rem; color: rgba(255,255,255,0.05);"></i>
                        <i class="bi bi-journal-text position-absolute" style="top: 20%; right: 10%; font-size: 2.5rem; color: rgba(255,255,255,0.04);"></i>
                        <i class="bi bi-bookmark-star position-absolute" style="top: 60%; left: 8%; font-size: 2rem; color: rgba(255,255,255,0.03);"></i>
                        <i class="bi bi-journal-bookmark position-absolute" style="top: 70%; right: 15%; font-size: 2.2rem; color: rgba(255,255,255,0.04);"></i>
                        <i class="bi bi-layers position-absolute" style="top: 40%; left: 12%; font-size: 1.8rem; color: rgba(255,255,255,0.03);"></i>
                        <i class="bi bi-stack position-absolute" style="top: 80%; left: 20%; font-size: 2.3rem; color: rgba(255,255,255,0.05);"></i>
                    </div>
                    
                    <div class="hero-text position-relative z-10">
                        <h1 class="display-3 fw-bold mb-4">
                            Selamat Datang di <span style="color: #F75D34;">PerpusSiswa</span>
                        </h1>
                        <p class="lead mb-4">
                            Jelajahi ribuan koleksi buku digital kami dan temukan pengetahuan tak terbatas di genggaman Anda. Perpustakaan modern untuk generasi pembelajar masa kini.
                        </p>
                        <div class="d-flex gap-2 flex-wrap justify-content-center">
                            <a href="{{ route('login') }}" class="btn btn-primary btn-lg px-4 py-3">
                                <i class="bi bi-box-arrow-in-right me-2"></i>Masuk Sekarang
                            </a>
                            <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg px-4 py-3">
                                <i class="bi bi-person-plus me-2"></i>Daftar Baru
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="features-section py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold mb-3">Fitur Unggulan Kami</h2>
            <p class="lead text-muted">Nikmati berbagai kemudahan dalam mengakses koleksi perpustakaan</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-card text-center">
                    <div class="feature-icon mb-3">
                        <i class="bi bi-book-fill text-primary"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Koleksi Lengkap</h4>
                    <p class="text-muted">Ratusan judul buku dari berbagai kategori ilmu pengetahuan dan sastra</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card text-center">
                    <div class="feature-icon mb-3">
                        <i class="bi bi-clock-history text-success"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Akses 24/7</h4>
                    <p class="text-muted">Pinjam dan baca buku kapan saja tanpa batasan waktu</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card text-center">
                    <div class="feature-icon mb-3">
                        <i class="bi bi-phone text-info"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Mobile Friendly</h4>
                    <p class="text-muted">Akses perpustakaan dari perangkat apa saja dengan mudah</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="stats-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="stat-item text-center">
                    <div class="stat-number text-white fw-bold display-4"></div>
                    <div class="stat-label text-white-50"></div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="stat-item text-center">
                    <div class="stat-number text-white fw-bold display-4"></div>
                    <div class="stat-label text-white-50"></div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="stat-item text-center">
                    <div class="stat-number text-white fw-bold display-4"></div>
                    <div class="stat-label text-white-50"></div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="stat-item text-center">
                    <div class="stat-number text-white fw-bold display-4"></div>
                    <div class="stat-label text-white-50"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section id="how-it-works" class="how-it-works py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold mb-3">Cara Kerja</h2>
            <p class="lead text-muted">Mulai perjalanan literasi Anda dalam 3 langkah mudah</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="step-card text-center">
                    <div class="step-icon mb-3">
                        <i class="bi bi-person-plus-fill text-primary"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Daftar Akun</h4>
                    <p class="text-muted">Buat akun gratis dan dapatkan akses ke seluruh koleksi perpustakaan</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="step-card text-center">
                    <div class="step-icon mb-3">
                        <i class="bi bi-search text-success"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Cari Buku</h4>
                    <p class="text-muted">Temukan buku yang Anda inginkan dengan sistem pencarian yang mudah</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="step-card text-center">
                    <div class="step-icon mb-3">
                        <i class="bi bi-bookmark-check-fill text-info"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Pinjam & Baca</h4>
                    <p class="text-muted">Pinjam buku dan nikmati membaca kapan saja dimana saja</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="display-4 fw-bold mb-4 text-white">Siap Memulai Perjalanan Literasi Anda?</h2>
                <p class="lead mb-4 text-white-50">Bergabunglah dengan ribuan siswa yang telah menikmati kemudahan akses perpustakaan digital</p>
                <a href="{{ route('register') }}" class="btn btn-light btn-lg px-5 py-3">
                    <i class="bi bi-rocket-takeoff me-2"></i>Mulai Sekarang
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
