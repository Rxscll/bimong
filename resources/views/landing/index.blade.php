@extends('layouts.landing')

@section('title', 'PerpusSiswa - Perpustakaan Digital Sekolah')

@section('content')
<!-- Hero Section -->
<section id="home" class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="hero-content reveal">
                    <div class="badge bg-primary-light text-primary fw-bold px-3 py-2 rounded-pill mb-3 shadow-sm" style="background-color: var(--primary-light);">
                        <i class="bi bi-star-fill text-warning me-1"></i> Perpustakaan Digital Sekolah #1
                    </div>
                    <h1>
                        Tingkatkan <br>
                        <span>Literasi Digital</span><br>
                        Sekolah Anda
                    </h1>
                    <p>
                        Akses perpustakaan modern dengan ratusan koleksi buku digital. Bebas pinjam, praktis baca PDF langsung dari perangkatmu, kapan saja dan di mana saja.
                    </p>
                    <div class="actions d-flex gap-3 flex-wrap">
                        <a href="{{ route('login') }}" class="btn btn-primary px-5 py-3 shadow">
                            <i class="bi bi-rocket-takeoff me-2"></i>Mulai Membaca
                        </a>
                        <a href="#popular-books" class="btn btn-outline-primary px-5 py-3">
                            Lihat Koleksi <i class="bi bi-chevron-down ms-1"></i>
                        </a>
                    </div>
                    <div class="mt-4 pt-3 d-flex align-items-center gap-4 text-muted small fw-semibold">
                        <div><i class="bi bi-check-circle-fill text-success me-1"></i> 500+ Koleksi E-Book</div>
                        <div><i class="bi bi-check-circle-fill text-success me-1"></i> 1.200+ Siswa Aktif</div>
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
<section id="features" class="section-padding bg-white">
    <div class="container">
        <div class="text-center reveal mb-5">
            <h2 class="section-title">Kenapa Pilih PerpusSiswa?</h2>
            <p class="section-subtitle">Satu ekosistem lengkap untuk mendukung kegiatan belajar mengajar yang lebih cerdas dan efisien.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4 reveal">
                <div class="feature-card">
                    <div class="feature-icon-wrapper">
                        <i class="bi bi-file-earmark-pdf"></i>
                    </div>
                    <h4>Koleksi PDF Digital</h4>
                    <p class="text-muted">Baca buku langsung di peramban tanpa perlu mengunduh. Akses literasi jadi jauh lebih praktis.</p>
                </div>
            </div>
            <div class="col-md-4 reveal">
                <div class="feature-card">
                    <div class="feature-icon-wrapper">
                        <i class="bi bi-lightning-charge"></i>
                    </div>
                    <h4>Akses Instan</h4>
                    <p class="text-muted">Cari dan pinjam buku hanya dengan satu klik. Tidak perlu lagi antri panjang di loket perpustakaan.</p>
                </div>
            </div>
            <div class="col-md-4 reveal">
                <div class="feature-card">
                    <div class="feature-icon-wrapper">
                        <i class="bi bi-phone-vibrate"></i>
                    </div>
                    <h4>Mobile Friendly</h4>
                    <p class="text-muted">Antarmuka yang sangat responsif, dirancang agar nyaman digunakan bahkan lewat smartphone.</p>
                </div>
            </div>
            <div class="col-md-4 reveal">
                <div class="feature-card">
                    <div class="feature-icon-wrapper">
                        <i class="bi bi-heart"></i>
                    </div>
                    <h4>Daftar Favorit</h4>
                    <p class="text-muted">Simpan buku-buku menarik ke daftar favorit Anda agar lebih mudah dibaca kembali di waktu luang.</p>
                </div>
            </div>
            <div class="col-md-4 reveal">
                <div class="feature-card">
                    <div class="feature-icon-wrapper">
                        <i class="bi bi-clock-history"></i>
                    </div>
                    <h4>Riwayat Bacaan</h4>
                    <p class="text-muted">Sistem melacak histori peminjaman secara otomatis untuk memudahkan Anda memantau progres belajar.</p>
                </div>
            </div>
            <div class="col-md-4 reveal">
                <div class="feature-card">
                    <div class="feature-icon-wrapper">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <h4>Sistem Terintegrasi</h4>
                    <p class="text-muted">Admin dapat mengelola stok, kategori, dan laporan siswa dalam satu dashboard terpusat yang aman.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Popular Books Section -->
<section id="popular-books" class="section-padding bg-light">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-5 reveal">
            <div>
                <h2 class="section-title">Koleksi Terpopuler</h2>
                <p class="section-subtitle mb-0">Buku yang paling sering dibaca pengunjung minggu ini.</p>
            </div>
            <a href="{{ route('login') }}" class="btn btn-outline-primary d-none d-md-inline-block rounded-pill">Lihat Semua <i class="bi bi-arrow-right ms-1"></i></a>
        </div>
        <div class="row g-4">
            @php
                $popularBooks = [
                    ['title' => 'Filosofi Teras', 'author' => 'Henry Manampiring', 'cat' => 'Self Improvement', 'color' => '#fed7aa'],
                    ['title' => 'Atomic Habits', 'author' => 'James Clear', 'cat' => 'Psychology', 'color' => '#fde68a'],
                    ['title' => 'Laskar Pelangi', 'author' => 'Andrea Hirata', 'cat' => 'Fiksi', 'color' => '#bae6fd'],
                    ['title' => 'Bumi', 'author' => 'Tere Liye', 'cat' => 'Fantasi', 'color' => '#fbcfe8'],
                ];
            @endphp
            @foreach($popularBooks as $book)
            <div class="col-sm-6 col-lg-3 reveal">
                <div class="feature-card p-0 overflow-hidden shadow-sm h-100" style="text-align: left; border: none; border-radius: 1.25rem;">
                    <div style="height: 220px; background: {{ $book['color'] }}; display: flex; align-items: center; justify-content: center; position: relative; transition: 0.3s; cursor: pointer;" class="book-cover-hover">
                        <i class="bi bi-journal-text" style="font-size: 5rem; color: rgba(0,0,0,0.1);"></i>
                        <span class="badge bg-white text-dark position-absolute top-0 end-0 m-3 shadow-sm rounded-pill">{{ $book['cat'] }}</span>
                    </div>
                    <div class="p-4 bg-white">
                        <h6 class="fw-bold mb-1 text-truncate" title="{{ $book['title'] }}">{{ $book['title'] }}</h6>
                        <p class="text-muted small mb-3"><i class="bi bi-pen me-1"></i>{{ $book['author'] }}</p>
                        <a href="{{ route('login') }}" class="btn btn-primary w-100 btn-sm rounded-pill">Mulai Baca</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Features for Roles (New Section) -->
<section class="section-padding bg-white">
    <div class="container reveal">
        <div class="text-center mb-5">
            <h2 class="section-title">Sistem Fleksibel Sesuai Peran Anda</h2>
            <p class="section-subtitle">Didesain khusus untuk memenuhi kebutuhan pengelola maupun pembaca.</p>
        </div>
        <div class="row align-items-stretch g-4">
            <div class="col-lg-6">
                <div class="p-5 rounded-4 h-100 shadow-sm border" style="background-color: var(--bg-body);">
                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3 shadow-sm" style="width: 50px; height: 50px;">
                            <i class="bi bi-person-badge fs-4"></i>
                        </div>
                        <h3 class="fw-bold mb-0">Untuk Admin</h3>
                    </div>
                    <ul class="list-unstyled mb-0 d-flex flex-column gap-3">
                        <li class="d-flex"><i class="bi bi-check-lg text-primary me-3 mt-1 fs-5"></i> <span>Dashboard analitik untuk memantau buku yang paling sering dibaca.</span></li>
                        <li class="d-flex"><i class="bi bi-check-lg text-primary me-3 mt-1 fs-5"></i> <span>Manajemen inventaris buku digital (unggah PDF & Cover) dengan mudah.</span></li>
                        <li class="d-flex"><i class="bi bi-check-lg text-primary me-3 mt-1 fs-5"></i> <span>Kelola data siswa, melihat riwayat peminjaman, serta status buku.</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="p-5 rounded-4 h-100 shadow-sm border" style="background-color: var(--bg-body);">
                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-dark text-white rounded-circle d-flex align-items-center justify-content-center me-3 shadow-sm" style="width: 50px; height: 50px;">
                            <i class="bi bi-emoji-smile fs-4"></i>
                        </div>
                        <h3 class="fw-bold mb-0">Untuk Siswa</h3>
                    </div>
                    <ul class="list-unstyled mb-0 d-flex flex-column gap-3">
                        <li class="d-flex"><i class="bi bi-check-lg text-dark me-3 mt-1 fs-5"></i> <span>Navigasi katalog buku interaktif berbasis kategori.</span></li>
                        <li class="d-flex"><i class="bi bi-check-lg text-dark me-3 mt-1 fs-5"></i> <span>Membaca file E-Book (PDF) dengan PDF Viewer yang nyaman.</span></li>
                        <li class="d-flex"><i class="bi bi-check-lg text-dark me-3 mt-1 fs-5"></i> <span>Menyimpan daftar buku favorit & melacak histori bacaan pribadi.</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section reveal">
    <div class="container">
        <div class="row g-4">
            <div class="col-6 col-md-3">
                <div class="stat-card shadow">
                    <span class="stat-number">500+</span>
                    <span class="stat-label">Total Buku</span>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card shadow">
                    <span class="stat-number">1.2K</span>
                    <span class="stat-label">Siswa Aktif</span>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card shadow">
                    <span class="stat-number">15+</span>
                    <span class="stat-label">Kategori</span>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card shadow">
                    <span class="stat-number">10K+</span>
                    <span class="stat-label">Total Baca</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section id="how-it-works" class="section-padding bg-light">
    <div class="container">
        <div class="text-center mb-5 reveal">
            <h2 class="section-title">Bagaimana Cara Memilih Buku Anda?</h2>
            <p class="section-subtitle">Tiga langkah kilat untuk mulai menjelajahi jendela dunia.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4 reveal">
                <div class="step-card shadow-sm">
                    <div class="step-badge text-primary opacity-25">01</div>
                    <div class="step-icon mb-4 text-primary bg-primary-light rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 60px; height: 60px; font-size: 1.5rem;">
                        <i class="bi bi-door-open"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Akses Akun</h4>
                    <p class="text-muted mb-0">Masuk menggunakan email atau NISN yang telah diregistrasi. Semua riwayat akan terhubung dengan profil Anda.</p>
                </div>
            </div>
            <div class="col-md-4 reveal">
                <div class="step-card shadow-sm">
                    <div class="step-badge text-primary opacity-25">02</div>
                    <div class="step-icon mb-4 text-primary bg-primary-light rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 60px; height: 60px; font-size: 1.5rem;">
                        <i class="bi bi-search"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Eksplorasi Katalog</h4>
                    <p class="text-muted mb-0">Cari buku melalui kolom pencarian atau saring menggunakan kategori pintar. Temukan literasi yang cocok dengan Anda.</p>
                </div>
            </div>
            <div class="col-md-4 reveal">
                <div class="step-card shadow-sm">
                    <div class="step-badge text-primary opacity-25">03</div>
                    <div class="step-icon mb-4 text-primary bg-primary-light rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 60px; height: 60px; font-size: 1.5rem;">
                        <i class="bi bi-book"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Nikmati Bacaan</h4>
                    <p class="text-muted mb-0">Klik tombol "Mulai Baca". Buku otomatis akan dipinjam, masuk ke riwayat, dan siap dibaca full-screen.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="section-padding bg-white">
    <div class="container">
        <div class="text-center mb-5 reveal">
            <h2 class="section-title">Apa Kata Pengguna Kami?</h2>
            <p class="section-subtitle">Pengalaman nyata dari sivitas akademika pengguna produk inovatif ini.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4 reveal">
                <div class="feature-card shadow-sm" style="text-align: left; padding: 2.5rem; border: none; background: #fdfdfd;">
                    <i class="bi bi-quote text-primary" style="font-size: 2.5rem; opacity: 0.3;"></i>
                    <p class="mb-4 fst-italic text-secondary">"Semenjak ada PerpusSiswa, anak-anak jadi lebih sering membaca. Mereka nggak perlu repot ke ruangan, cukup dari tablet masing-masing."</p>
                    <div class="d-flex align-items-center mt-auto">
                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3 fw-bold shadow-sm" style="width: 45px; height: 45px;">SI</div>
                        <div>
                            <h6 class="mb-0 fw-bold">Siti Aisyah</h6>
                            <small class="text-muted">Guru Literasi</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 reveal">
                <div class="feature-card shadow-sm" style="text-align: left; padding: 2.5rem; border: none; background: #fdfdfd;">
                    <i class="bi bi-quote text-primary" style="font-size: 2.5rem; opacity: 0.3;"></i>
                    <p class="mb-4 fst-italic text-secondary">"Aplikasinya keren dan gampang dipakai. Fitur favorit ngebantu banget biar nggak lupa buku yang mau dibaca pas weekend."</p>
                    <div class="d-flex align-items-center mt-auto">
                        <div class="rounded-circle bg-dark text-white d-flex align-items-center justify-content-center me-3 fw-bold shadow-sm" style="width: 45px; height: 45px;">AP</div>
                        <div>
                            <h6 class="mb-0 fw-bold">Andi Pratama</h6>
                            <small class="text-muted">Siswa Kelas XII</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 reveal">
                <div class="feature-card shadow-sm" style="text-align: left; padding: 2.5rem; border: none; background: #fdfdfd;">
                    <i class="bi bi-quote text-primary" style="font-size: 2.5rem; opacity: 0.3;"></i>
                    <p class="mb-4 fst-italic text-secondary">"Sangat membantu manajemen perpustakaan. Panel adminnya simpel, saya bisa memantau tren buku anak-anak dengan sangat akurat."</p>
                    <div class="d-flex align-items-center mt-auto">
                        <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center me-3 fw-bold shadow-sm" style="width: 45px; height: 45px;">BR</div>
                        <div>
                            <h6 class="mb-0 fw-bold">Budi Raharjo</h6>
                            <small class="text-muted">Admin Perpustakaan</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 reveal">
                <h2 class="section-title">Pertanyaan Umum</h2>
                <p class="section-subtitle ms-0">Kami merangkum keraguan yang paling sering ditanyakan.</p>
                
                <div class="accordion accordion-flush mt-4" id="faqAccordion">
                    <div class="accordion-item bg-transparent border-0 mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed rounded bg-white shadow-sm fw-bold border" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                Bagaimana cara mendaftar akun?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted bg-transparent pt-3 pb-1"> Akun siswa biasanya didaftarkan oleh admin. Gunakan alamat email aktif Anda di halaman <a href="{{ route('register') }}" class="text-primary fw-bold text-decoration-none">Daftar</a> bila diperbolehkan registrasi mandiri. </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item bg-transparent border-0 mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed rounded bg-white shadow-sm fw-bold border" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                Apakah bisa dibaca tanpa koneksi internet?
                            </button>
                        </h2>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted bg-transparent pt-3 pb-1"> Saat ini belum mendukung mode luring (offline). Sistem pemutar PDF digital kami membutuhkan koneksi internet minimal agar progress riwayat baca selalu tersinkronisasi. </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item bg-transparent border-0 mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed rounded bg-white shadow-sm fw-bold border" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                Berapa lama durasi peminjaman buku?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted bg-transparent pt-3 pb-1"> Karena buku berbentuk digital (E-Book), pengguna tidak dibatasi tenggat denda. Buku akan tercatat dipinjam selama masih Anda baca atau masuk di Favorit. </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item bg-transparent border-0">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed rounded bg-white shadow-sm fw-bold border" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                Bagaimana cara mencari buku tertentu?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted bg-transparent pt-3 pb-1"> Setelah login, buka menu Katalog Buku. Anda bisa mengetik judul atau penulis langsung, atau mengklik filter label Kategori di sisi kiri halaman. </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1 d-none d-lg-block reveal">
                <div class="p-5 bg-primary rounded-4 h-100 d-flex flex-column justify-content-center text-center text-white position-relative overflow-hidden shadow-lg">
                    <div class="position-absolute top-0 end-0 p-4 opacity-25">
                        <i class="bi bi-question-circle-fill text-white shadow-sm" style="font-size: 15rem;"></i>
                    </div>
                    <div class="position-relative z-10">
                        <i class="bi bi-headset mb-4 d-block" style="font-size: 3.5rem;"></i>
                        <h4 class="fw-bold text-white mb-3">Masih bingung?</h4>
                        <p class="text-white-50 mb-4">Tim admin perpustakaan kami selalu terbuka dan menantikan sapaan Anda.</p>
                        <a href="mailto:support@sekolah.sch.id" class="btn btn-light text-primary rounded-pill fw-bold px-4">Hubungi Support</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section reveal py-5" style="background: var(--gradient-primary); position: relative; overflow: hidden;">
    <div class="position-absolute top-0 start-0 w-100 h-100 bg-black opacity-10"></div>
    <div class="container position-relative z-10 text-center py-5">
        <h2 class="display-5 fw-bold text-white mb-3">Bergabunglah, Mulai Perjalanan Literasi Anda</h2>
        <p class="lead text-white-50 mb-5 mx-auto" style="max-width: 600px;">Akses tak terbatas ke samudra ilmu pengetahuan. Tingkatkan minat baca Anda dengan platform revolusioner kami.</p>
        <div class="d-flex gap-3 justify-content-center flex-wrap">
            <a href="{{ route('login') }}" class="btn btn-light text-primary px-5 py-3 rounded-pill fw-bold shadow">
                <i class="bi bi-box-arrow-in-right me-2"></i>Masuk Sekarang
            </a>
            <a href="{{ route('register') }}" class="btn btn-outline-light px-5 py-3 rounded-pill text-white fw-bold" style="border-width: 2px;">
                Daftar Akun Baru
            </a>
        </div>
    </div>
</section>

<!-- Enhanced Footer -->
<footer class="footer">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="footer-logo d-flex align-items-center mb-3">
                    <i class="bi bi-book-half text-primary me-2 shadow-sm"></i>
                    <span class="fs-4">PerpusSiswa</span>
                </div>
                <p class="small text-muted pe-md-4">Sistem manajemen perpustakaan sekolah modern yang dirancang untuk memperluas jangkauan literasi dunia pendidikan di era digital, di mana saja, kapan saja.</p>
                <div class="social-links d-flex gap-2 mt-4">
                    <a href="#" class="btn btn-sm btn-outline-secondary rounded-circle d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="btn btn-sm btn-outline-secondary rounded-circle d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="btn btn-sm btn-outline-secondary rounded-circle d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;"><i class="bi bi-twitter-x"></i></a>
                </div>
            </div>
            <div class="col-sm-6 col-lg-2 offset-lg-2 pt-2">
                <h6 class="fw-bold text-dark mb-4 text-uppercase fw-bolder" style="letter-spacing: 1px;">Navigasi Utama</h6>
                <ul class="footer-links list-unstyled">
                    <li><a href="#home">Beranda Area</a></li>
                    <li><a href="#features">Fitur Unggulan</a></li>
                    <li><a href="#popular-books">Katalog Populer</a></li>
                    <li><a href="#how-it-works">Panduan Singkat</a></li>
                </ul>
            </div>
            <div class="col-sm-6 col-lg-2 pt-2">
                <h6 class="fw-bold text-dark mb-4 text-uppercase fw-bolder" style="letter-spacing: 1px;">Dukungan Sitem</h6>
                <ul class="footer-links list-unstyled">
                    <li><a href="#">Pusat Resolusi</a></li>
                    <li><a href="#">Pedoman Mutu</a></li>
                    <li><a href="#">Hubungi Admin</a></li>
                    <li><a href="#">Syarat & Ketentuan</a></li>
                </ul>
            </div>
            <div class="col-lg-2 pt-2">
                <h6 class="fw-bold text-dark mb-4 text-uppercase fw-bolder" style="letter-spacing: 1px;">Kontak Kami</h6>
                <p class="small mb-2 text-muted"><i class="bi bi-geo-alt-fill text-primary me-2"></i>Jl. Edukasi No. 42</p>
                <p class="small mb-2 text-muted"><i class="bi bi-envelope-fill text-primary me-2"></i>hello@sekolah.sch.id</p>
                <p class="small text-muted"><i class="bi bi-telephone-fill text-primary me-2"></i>(021) 1234567</p>
            </div>
        </div>
        <hr class="mt-5 mb-4 opacity-10">
        <div class="text-center">
            <p class="small text-muted mb-0 fw-semibold">&copy; {{ date('Y') }} PerpusSiswa Digital Literacy. Dibuat dengan <i class="bi bi-heart-fill text-danger mx-1"></i> untuk masa depan.</p>
        </div>
    </div>
</footer>
@endsection
