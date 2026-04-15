@extends('layouts.student-theme')

@section('title', 'Membaca | ' . $book->judul)

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Header -->
    <div class="mb-10 flex flex-col md:flex-row md:items-end justify-between gap-6 pl-4 lg:pl-0">
        <div class="flex items-center gap-4">
            <a href="{{ route('student.books.index') }}" 
               class="w-12 h-12 flex items-center justify-center bg-white border border-slate-200 text-slate-500 rounded-2xl hover:bg-slate-50 hover:text-slate-900 transition-all shadow-sm">
                <i class="bi bi-arrow-left text-xl"></i>
            </a>
            <div>
                <p class="text-slate-500 text-xs font-bold tracking-widest uppercase mb-1">Mode Membaca</p>
                <h1 class="text-2xl md:text-3xl font-black text-slate-900 tracking-tight leading-tight line-clamp-1" title="{{ $book->judul }}">
                    {{ $book->judul }}
                </h1>
            </div>
        </div>
        <div class="flex gap-3">
            <form action="{{ route('student.favorites.toggle', $book->id) }}" method="POST">
                @csrf
                <button type="submit" 
                        class="px-5 py-3 rounded-2xl font-bold flex items-center gap-2 transition-all shadow-sm border {{ $book->isFavoritedBy(auth()->id()) ? 'bg-rose-50 text-rose-600 border-rose-200 hover:bg-rose-100 hover:border-rose-300' : 'bg-white text-slate-600 border-slate-200 hover:bg-slate-50 hover:text-slate-900' }}">
                    <i class="bi bi-{{ $book->isFavoritedBy(auth()->id()) ? 'heart-fill' : 'heart' }}"></i>
                    <span class="hidden sm:inline">{{ $book->isFavoritedBy(auth()->id()) ? 'Tersimpan' : 'Simpan Koleksi' }}</span>
                </button>
            </form>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <!-- Sidebar Book Cover & Info -->
        <div class="lg:col-span-1 space-y-6">
            <div class="glass-panel p-6 rounded-[2rem] bg-white border border-slate-200 shadow-sm text-center">
                <div class="relative w-3/4 mx-auto pt-[115%] rounded-xl overflow-hidden shadow-md mb-6 border border-slate-100">
                    <img src="{{ $book->cover_url }}" alt="{{ $book->judul }}" class="absolute inset-0 w-full h-full object-cover">
                </div>
                
                <h3 class="font-bold text-slate-900 mb-1 leading-tight">{{ $book->penulis }}</h3>
                <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-6">{{ $book->penerbit }} &bull; {{ $book->tahun_terbit }}</p>
                
                <div class="grid grid-cols-2 gap-3 text-left">
                    <div class="bg-slate-50 p-3 rounded-xl border border-slate-100">
                        <p class="text-[10px] uppercase font-bold text-slate-400 mb-1"><i class="bi bi-eye mr-1"></i> Dibaca</p>
                        <p class="font-bold text-slate-900">{{ $book->jumlah_dibaca }}x</p>
                    </div>
                    <div class="bg-slate-50 p-3 rounded-xl border border-slate-100">
                        <p class="text-[10px] uppercase font-bold text-slate-400 mb-1"><i class="bi bi-hash mr-1"></i> Kode</p>
                        <p class="font-bold text-slate-900">{{ $book->kode_buku }}</p>
                    </div>
                </div>
            </div>

            <!-- Reading Protections / DRM Notice -->
            <div class="bg-amber-50 border border-amber-200 p-5 rounded-[1.5rem] relative overflow-hidden">
                <div class="absolute -right-4 -top-4 w-16 h-16 bg-amber-100 rounded-full opacity-50 z-0"></div>
                <div class="relative z-10">
                    <div class="flex items-start gap-3">
                        <i class="bi bi-shield-lock-fill text-amber-500 text-lg mt-0.5"></i>
                        <div>
                            <h4 class="font-bold text-amber-900 text-sm mb-1">Proteksi Dokumen Aktif</h4>
                            <p class="text-xs text-amber-700 leading-relaxed font-medium">Buku ini dalam mode baca aman. Akses download, tangkapan layar (screenshot), dan fungsi klik kanan telah dinonaktifkan sistem untuk melindungi hak cipta.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Main PDF Reader Content -->
        <div class="lg:col-span-3">
            <div class="glass-panel p-2 sm:p-4 rounded-[2rem] bg-white border border-slate-200 shadow-sm h-full flex flex-col relative" id="pdfContainerWrapper">
                
                <!-- Anti-Screenshot Overlay (hidden by default) -->
                <div id="screenshotOverlay" class="hidden absolute inset-0 z-50 bg-slate-900/40 backdrop-blur-xl rounded-[2rem] flex items-center justify-center">
                    <div class="bg-white p-6 rounded-2xl shadow-2xl text-center max-w-sm mx-4 transform scale-95 border-2 border-slate-200">
                        <div class="w-16 h-16 bg-rose-50 rounded-full flex items-center justify-center mx-auto mb-4 border border-rose-100">
                            <i class="bi bi-camera-video-off-fill text-2xl text-rose-500 block"></i>
                        </div>
                        <h3 class="text-slate-900 font-black text-xl mb-2">Tangkapan Layar Dibatasi</h3>
                        <p class="text-slate-600 font-medium text-sm leading-relaxed">Penggunaan alat perekam layar atau snipping tool akan diblokir otomatis oleh sistem keamanan.</p>
                    </div>
                </div>

                <!-- PDF Frame -->
                <!-- Menghilangkan border asli PDF toolbar dengan hash navigasi 0 -->
                <div class="flex-grow w-full bg-slate-100 rounded-[1.5rem] overflow-hidden border border-slate-200 min-h-[750px] relative mt-1" id="pdfViewerContainer">
                    <iframe src="{{ $book->pdf_url }}#toolbar=0&navpanes=0&scrollbar=0&view=FitH" 
                            id="documentIframe"
                            width="100%" 
                            height="100%" 
                            class="border-0 absolute inset-0 w-full h-full pointer-events-auto"
                            frameborder="0"
                            style="border: none;"
                            oncontextmenu="return false;">
                    </iframe>
                    
                    <!-- Cover overlay layer that catches right-clicks but is pointer-events-none usually. 
                         For iframe dragging, we let pointer-events pass, but intercept contextmenu on body instead. -->
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Disable User Selection globally */
body {
    -webkit-user-select: none; /* Safari */
    -ms-user-select: none; /* IE 10 and IE 11 */
    user-select: none; /* Standard syntax */
}

/* Make iframe hide its own scrollbar tracks visually if supported */
iframe::-webkit-scrollbar {
    width: 0px;
    background: transparent;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const overlay = document.getElementById('screenshotOverlay');
    const pdfContainer = document.getElementById('pdfViewerContainer');

    // 1. Prevent Right Click everywhere
    document.addEventListener('contextmenu', event => {
        event.preventDefault();
        return false;
    });

    // 2. Prevent Keyboard shortcuts (Save, Print, Inspect)
    document.addEventListener('keydown', function(e) {
        // Prevent F12
        if (e.key === 'F12' || e.keyCode === 123) {
            e.preventDefault();
            return false;
        }
        
        // Prevent Ctrl+S, Ctrl+P, Ctrl+C, Ctrl+U
        if (e.ctrlKey || e.metaKey) {
            const keys = ['s', 'p', 'c', 'u'];
            if (keys.includes(e.key.toLowerCase())) {
                e.preventDefault();
                return false;
            }
        }
        
        // Detect PrintScreen Key natively
        if (e.key === 'PrintScreen' || e.code === 'PrintScreen') {
            triggerAntiScreenshotWarning();
            
            // Try to clear clipboard API
            try {
                navigator.clipboard.writeText('');
            } catch(err) {}
            
            e.preventDefault();
            return false;
        }
    });

    // 3. Counter Windows Snipping Tool (Win+Shift+S) / Screen Recording focus loss
    // Snipping tool triggers window.blur() immediately.
    window.addEventListener('blur', function() {
        // Blur the PDF heavily when window loses focus (takes Snipping Tool capture target away)
        pdfContainer.style.filter = 'blur(20px) grayscale(100%)';
        pdfContainer.style.opacity = '0.1';
        overlay.classList.remove('hidden');
    });

    window.addEventListener('focus', function() {
        // Restore PDF when safely back in focus
        pdfContainer.style.filter = 'none';
        pdfContainer.style.opacity = '1';
        overlay.classList.add('hidden');
    });
    
    // 4. Specifically intercept Print commands if triggered by external menu
    window.addEventListener('beforeprint', function(e) {
        document.body.style.display = 'none';
    });
    window.addEventListener('afterprint', function(e) {
        document.body.style.display = 'block';
    });

    function triggerAntiScreenshotWarning() {
        pdfContainer.style.filter = 'blur(20px)';
        overlay.classList.remove('hidden');
        
        setTimeout(() => {
            if (document.hasFocus()) {
                pdfContainer.style.filter = 'none';
                overlay.classList.add('hidden');
            }
        }, 1500);
    }
});
</script>
@endsection
