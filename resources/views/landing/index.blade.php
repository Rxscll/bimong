@extends('layouts.landing')

@section('title', 'PerpusSiswa - Perpustakaan Digital Sekolah')

@section('content')
<!-- Hero Section -->
<section id="home" class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="hero-content reveal">
                    <h1>
                        Tingkatkan <br>
                        <span>Literasi Digital</span><br>
                        Sekolah Anda
                    </h1>
                    <p>
                        Akses perpustakaan modern dengan ribuan koleksi buku digital. Mudah dipinjam, nyaman dibaca, kapan saja dan di mana saja.
                    </p>
                    <div class="actions d-flex gap-3 flex-wrap">
                        <a href="{{ route('login') }}" class="btn btn-primary px-5 py-3">
                            <i class="bi bi-rocket-takeoff me-2"></i>Mulai Sekarang
                        </a>
                        <a href="#popular-books" class="btn btn-outline-primary px-5 py-3">
                            Lihat Koleksi <i class="bi bi-chevron-down ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 d-none d-lg-block">
                <div class="hero-illustration-wrapper reveal">
                    <!-- Premium CSS Mockup -->
                    <div class="floating-mockup">
                        <div class="mockup-card main-card shadow-lg">
                            <div class="card-header-mock">
                                <div class="dots"><span class="dot red"></span><span class="dot orange"></span><span class="dot green"></span></div>
                                <div class="bar"></div>
                            </div>
                            <div class="card-body-mock">
                                <div class="side-nav"></div>
                                <div class="main-content-mock">
                                    <div class="grid-mock">
                                        <div class="item-mock"></div><div class="item-mock"></div><div class="item-mock"></div>
                                    </div>
                                    <div class="line-mock"></div>
                                    <div class="line-mock w-75"></div>
                                </div>
                            </div>
                        </div>
                        <div class="mockup-card floating-card-1 shadow-md">
                            <div class="icon-circle"><i class="bi bi-person-check"></i></div>
                            <div class="text-lines">
                                <div class="line"></div>
                                <div class="line w-50"></div>
                            </div>
                        </div>
                        <div class="mockup-card floating-card-2 shadow-md">
                            <i class="bi bi-star-fill text-warning"></i>
                            <span>4.9 Rating</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="section-padding" style="background: white;">
    <div class="container">
        <div class="text-center reveal">
            <h2 class="section-title">Kenapa Pilih PerpusSiswa?</h2>
            <p class="section-subtitle">Satu ekosistem lengkap untuk mendukung kegiatan belajar mengajar yang lebih efisien.</p>
        </div>
        <div class="row g-4 mt-2">
            <div class="col-md-4 reveal">
                <div class="feature-card">
                    <div class="feature-icon-wrapper">
                        <i class="bi bi-lightning-charge"></i>
                    </div>
                    <h4>Akses Instan</h4>
                    <p>Cukup satu klik untuk meminjam buku. Tidak perlu antri panjang di loket fisik perpustakaan lagi.</p>
                </div>
            </div>
            <div class="col-md-4 reveal">
                <div class="feature-card">
                    <div class="feature-icon-wrapper">
                        <i class="bi bi-phone-vibrate"></i>
                    </div>
                    <h4>Mobile Friendly</h4>
                    <p>Tampilan yang sangat responsif di perangkat apa pun, memudahkan siswa belajar dari smartphone.</p>
                </div>
            </div>
            <div class="col-md-4 reveal">
                <div class="feature-card">
                    <div class="feature-icon-wrapper">
                        <i class="bi bi-safe2"></i>
                    </div>
                    <h4>Sistem Terintegrasi</h4>
                    <p>Seluruh riwayat peminjaman, denda, dan inventaris buku tercatat otomatis secara transparan.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Popular Books Section (New) -->
<section id="popular-books" class="section-padding bg-light">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-5 reveal">
            <div>
                <h2 class="section-title">Koleksi Terpopuler</h2>
                <p class="section-subtitle mb-0">Buku yang paling sering dibaca minggu ini.</p>
            </div>
            <a href="{{ route('login') }}" class="btn btn-outline-primary d-none d-md-inline-block">Lihat Semua <i class="bi bi-arrow-right ms-1"></i></a>
        </div>
        <div class="row g-4">
            @php
                $popularBooks = [
                    ['title' => 'Filosofi Teras', 'author' => 'Henry Manampiring', 'cat' => 'Self Improvement', 'color' => '#fed7aa'],
                    ['title' => 'Atomic Habits', 'author' => 'James Clear', 'cat' => 'Psychology', 'color' => '#fde68a'],
                    ['title' => 'Laskar Pelangi', 'author' => 'Andrea Hirata', 'cat' => 'Fiction', 'color' => '#bae6fd'],
                    ['title' => 'Bumi', 'author' => 'Tere Liye', 'cat' => 'Fantasy', 'color' => '#fbcfe8'],
                ];
            @endphp
            @foreach($popularBooks as $book)
            <div class="col-sm-6 col-lg-3 reveal">
                <div class="feature-card p-0 overflow-hidden" style="text-align: left;">
                    <div style="height: 250px; background: {{ $book['color'] }}; display: flex; align-items: center; justify-content: center; position: relative;">
                        <i class="bi bi-journal-text" style="font-size: 5rem; color: rgba(0,0,0,0.1);"></i>
                        <span class="badge bg-white text-dark position-absolute top-0 right-0 m-3 shadow-sm">{{ $book['cat'] }}</span>
                    </div>
                    <div class="p-4">
                        <h6 class="fw-bold mb-1 text-truncate">{{ $book['title'] }}</h6>
                        <p class="text-muted small mb-3">{{ $book['author'] }}</p>
                        <a href="{{ route('login') }}" class="btn btn-primary w-100 btn-sm">Pinjam Buku</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section reveal">
    <div class="container">
        <div class="row g-4">
            <div class="col-6 col-md-3">
                <div class="stat-card">
                    <span class="stat-number">25K+</span>
                    <span class="stat-label">Total Buku</span>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card">
                    <span class="stat-number">4.8K</span>
                    <span class="stat-label">Siswa Aktif</span>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card">
                    <span class="stat-number">12K</span>
                    <span class="stat-label">Buku Dipinjam</span>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card">
                    <span class="stat-number">98%</span>
                    <span class="stat-label">Kepuasan</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section id="how-it-works" class="section-padding">
    <div class="container">
        <div class="text-center mb-5 reveal">
            <h2 class="section-title">Cara Kerja Sistem</h2>
            <p class="section-subtitle">Tiga langkah mudah untuk mulai menjelajahi jendela dunia.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4 reveal">
                <div class="step-card">
                    <div class="step-badge">01</div>
                    <div class="step-icon">
                        <i class="bi bi-box-arrow-in-right"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Login Akun</h5>
                    <p class="text-muted mb-0">Masuk menggunakan akun NISN yang telah didaftarkan oleh admin sekolah Anda.</p>
                </div>
            </div>
            <div class="col-md-4 reveal">
                <div class="step-card">
                    <div class="step-badge">02</div>
                    <div class="step-icon">
                        <i class="bi bi-search-heart"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Cari Buku</h5>
                    <p class="text-muted mb-0">Temukan buku favorit Anda melalui katalog yang lengkap dan kategori yang teratur.</p>
                </div>
            </div>
            <div class="col-md-4 reveal">
                <div class="step-card">
                    <div class="step-badge">03</div>
                    <div class="step-icon">
                        <i class="bi bi-qrcode-scan"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Ambil & Baca</h5>
                    <p class="text-muted mb-0">Setelah reservasi, tunjukkan QR Code ke petugas atau langsung baca E-Book jika tersedia.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section (New) -->
<section class="section-padding bg-white">
    <div class="container">
        <div class="text-center mb-5 reveal">
            <h2 class="section-title">Apa Kata Mereka?</h2>
            <p class="section-subtitle">Pengalaman nyata dari siswa dan guru pengguna PerpusSiswa.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4 reveal">
                <div class="feature-card" style="text-align: left; padding: 2.5rem;">
                    <i class="bi bi-quote text-primary" style="font-size: 2.5rem; opacity: 0.3;"></i>
                    <p class="mb-4 italic">"Sekarang pinjam buku nggak perlu ribet bawa kartu fisik. Semuanya beres dalam satu genggaman HP!"</p>
                    <div class="d-flex align-items-center">
                        <div class="rounded-circle bg-primary-light me-3" style="width: 45px; height: 45px;"></div>
                        <div>
                            <h6 class="mb-0 fw-bold">Andi Pratama</h6>
                            <small class="text-muted">Siswa Kelas XII</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 reveal">
                <div class="feature-card" style="text-align: left; padding: 2.5rem;">
                    <i class="bi bi-quote text-primary" style="font-size: 2.5rem; opacity: 0.3;"></i>
                    <p class="mb-4 italic">"Sistemnya sangat membantu untuk mencari referensi tugas sekolah. Sangat direkomendasikan!"</p>
                    <div class="d-flex align-items-center">
                        <div class="rounded-circle bg-warning bg-opacity-10 me-3" style="width: 45px; height: 45px;"></div>
                        <div>
                            <h6 class="mb-0 fw-bold">Siti Aisyah</h6>
                            <small class="text-muted">Guru Literasi</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 reveal">
                <div class="feature-card" style="text-align: left; padding: 2.5rem;">
                    <i class="bi bi-quote text-primary" style="font-size: 2.5rem; opacity: 0.3;"></i>
                    <p class="mb-4 italic">"Fitur notifikasinya oke banget, jadi inget kalau sudah mendekati waktu pengembalian buku."</p>
                    <div class="d-flex align-items-center">
                        <div class="rounded-circle bg-info bg-opacity-10 me-3" style="width: 45px; height: 45px;"></div>
                        <div>
                            <h6 class="mb-0 fw-bold">Budi Santoso</h6>
                            <small class="text-muted">Siswa Kelas XI</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section (New) -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 reveal">
                <h2 class="section-title">Pertanyaan Umum</h2>
                <p class="section-subtitle ms-0">Kami merangkum beberapa hal yang sering ditanyakan pengguna.</p>
                <div class="accordion accordion-flush" id="faqAccordion">
                    <div class="accordion-item bg-transparent border-0 mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed rounded bg-white shadow-sm fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                Bagaimana cara mendaftar akun?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted"> Akun siswa biasanya didaftarkan secara kolektif oleh pihak sekolah. Gunakan alamat email aktif Anda untuk masuk pertama kali. </div>
                        </div>
                    </div>
                    <div class="accordion-item bg-transparent border-0 mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed rounded bg-white shadow-sm fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                Berapa lama durasi peminjaman buku?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted"> Standar durasi peminjaman adalah 7 hari kerja. Anda dapat melakukan perpanjangan satu kali melalui dashboard siswa. </div>
                        </div>
                    </div>
                    <div class="accordion-item bg-transparent border-0">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed rounded bg-white shadow-sm fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                Apa yang terjadi jika terlambat mengembalikan?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted"> Keterlambatan akan dikenakan denda harian sesuai kebijakan sekolah yang berlaku. Riwayat denda dapat dilihat pada menu dashboard. </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1 d-none d-lg-block reveal">
                <div class="p-5 bg-primary-light rounded-4 h-100 d-flex flex-column justify-content-center text-center">
                    <i class="bi bi-chat-dots-fill text-primary mb-4" style="font-size: 3.5rem;"></i>
                    <h4 class="fw-bold">Masih bingung?</h4>
                    <p class="text-muted">Tim petugas perpustakaan kami siap membantu Anda di sekolah.</p>
                    <a href="mailto:support@library.edu" class="btn btn-primary mt-3">Hubungi CS Perpustakaan</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section reveal">
    <div class="container reveal">
        <div class="cta-content">
            <h2>Mulai Petualangan Literasi Anda</h2>
            <p>Ribuan koleksi buku menunggu untuk dibuka. Jadilah bagian dari komunitasi pembaca aktif.</p>
            <div class="d-flex gap-3 justify-content-center flex-wrap">
                <a href="{{ route('login') }}" class="btn btn-light-custom">Buka Dashboard</a>
                <a href="{{ route('register') }}" class="btn btn-outline-light px-5 py-3 rounded-pill text-white" style="border-width: 2px;">Daftar Akun Baru</a>
            </div>
        </div>
    </div>
</section>

<!-- Enhanced Footer -->
<footer class="footer">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="footer-brand">
                    <i class="bi bi-journal-bookmark-fill text-primary" style="margin-right: 10px;"></i>
                    PerpusSiswa
                </div>
                <p class="small">Sistem manajemen perpustakaan sekolah modern yang dirancang untuk memperluas jangkauan literasi dunia pendidikan di era digital.</p>
                <div class="social-links d-flex gap-2">
                    <a href="#" class="btn btn-sm btn-outline-primary rounded-circle" style="width: 35px; height: 35px; padding: 0.4rem;"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="btn btn-sm btn-outline-primary rounded-circle" style="width: 35px; height: 35px; padding: 0.4rem;"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="btn btn-sm btn-outline-primary rounded-circle" style="width: 35px; height: 35px; padding: 0.4rem;"><i class="bi bi-twitter-x"></i></a>
                </div>
            </div>
            <div class="col-sm-6 col-lg-2 offset-lg-2">
                <h6 class="fw-bold text-dark mb-4">Navigasi</h6>
                <ul class="list-unstyled">
                    <li><a href="#home" class="text-decoration-none text-muted small">Beranda</a></li>
                    <li><a href="#features" class="text-decoration-none text-muted small">Fitur</a></li>
                    <li><a href="#popular-books" class="text-decoration-none text-muted small">Koleksi</a></li>
                    <li><a href="#how-it-works" class="text-decoration-none text-muted small">Cara Kerja</a></li>
                </ul>
            </div>
            <div class="col-sm-6 col-lg-2">
                <h6 class="fw-bold text-dark mb-4">Dukungan</h6>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-decoration-none text-muted small">Pusat Bantuan</a></li>
                    <li><a href="#" class="text-decoration-none text-muted small">Panduan Siswa</a></li>
                    <li><a href="#" class="text-decoration-none text-muted small">Kontak Kami</a></li>
                    <li><a href="#" class="text-decoration-none text-muted small">Kebijakan Privasi</a></li>
                </ul>
            </div>
            <div class="col-lg-2">
                <h6 class="fw-bold text-dark mb-4">Kontak</h6>
                <p class="small mb-1"><i class="bi bi-geo-alt me-2"></i>Jl. Edukasi No. 42</p>
                <p class="small mb-1"><i class="bi bi-envelope me-2"></i>perpus@sekolah.sch.id</p>
                <p class="small"><i class="bi bi-telephone me-2"></i>(021) 1234567</p>
            </div>
        </div>
        <hr class="my-5 opacity-10">
        <div class="text-center">
            <p class="small mb-0">&copy; {{ date('Y') }} PerpusSiswa Digital. Built with <i class="bi bi-heart-fill text-danger mx-1"></i> for better literacy.</p>
        </div>
    </div>
</footer>
@endsection
