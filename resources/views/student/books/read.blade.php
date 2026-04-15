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

                <!-- PDF Frame using PDF.js -->
                <div class="flex-grow w-full bg-slate-100 rounded-[1.5rem] overflow-hidden border border-slate-200 mt-1 flex flex-col relative" id="pdfViewerContainer">
                    
                    <!-- Custom Toolbar -->
                    <div class="w-full flex justify-between items-center p-4 bg-white border-b border-slate-200 z-10 shrink-0">
                        <button id="prevBtn" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg font-bold transition-colors disabled:opacity-50 flex items-center gap-2">
                            <i class="bi bi-chevron-left"></i> <span class="hidden sm:inline">Sebelumnya</span>
                        </button>
                        
                        <div class="text-sm font-bold text-slate-600 flex items-center gap-2">
                            Hal. <input type="number" id="pageNumberInput" value="{{ $history->last_page ?? 1 }}" min="1" class="w-16 text-center border-2 border-slate-200 focus:border-slate-500 rounded p-1 text-slate-800 outline-none" /> / <span id="pageCount">-</span>
                        </div>

                        <button id="nextBtn" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg font-bold transition-colors disabled:opacity-50 flex items-center gap-2">
                            <span class="hidden sm:inline">Selanjutnya</span> <i class="bi bi-chevron-right"></i>
                        </button>
                    </div>

                    <!-- PDF Canvas Area -->
                    <div class="flex-grow overflow-auto flex justify-center items-start p-4 relative" id="canvasContainer">
                        <canvas id="pdfCanvas" class="shadow-xl rounded-lg bg-white max-w-full pointer-events-none select-none" oncontextmenu="return false;"></canvas>
                        
                        <!-- Loading spinner -->
                        <div id="pdfLoader" class="absolute inset-0 flex items-center justify-center bg-slate-100/90 z-20">
                            <div class="flex flex-col items-center">
                                <div class="animate-spin rounded-full h-12 w-12 border-4 border-slate-200 border-b-slate-900 mb-3"></div>
                                <p class="text-slate-500 font-bold text-sm tracking-wide">Memuat Dokumen...</p>
                            </div>
                        </div>
                    </div>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
<script>
    // Konfigurasi Worker PDF.js
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';

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

    // --- PDF.js Logic ---
    const url = "{{ $book->pdf_url }}";
    let pdfDoc = null,
        pageNum = {{ $history->last_page ?? 1 }},
        pageIsRendering = false,
        pageNumIsPending = null;

    const scale = 1.5,
          canvas = document.getElementById('pdfCanvas'),
          ctx = canvas.getContext('2d'),
          pdfLoader = document.getElementById('pdfLoader'),
          pageCountEl = document.getElementById('pageCount'),
          pageInput = document.getElementById('pageNumberInput'),
          prevBtn = document.getElementById('prevBtn'),
          nextBtn = document.getElementById('nextBtn');

    // Render the page
    const renderPage = num => {
        pageIsRendering = true;
        
        // Fetch page
        pdfDoc.getPage(num).then(page => {
            // Setup viewport
            
            // Adjust scale based on container width to make it responsive
            const containerWidth = document.getElementById('canvasContainer').clientWidth - 40; // 40 is padding
            let viewport = page.getViewport({ scale: 1.0 });
            let renderScale = containerWidth / viewport.width;
            
            // Don't upscale too much
            if (renderScale > 2) renderScale = 2;
            if (renderScale < 0.5) renderScale = 0.5;

            viewport = page.getViewport({ scale: renderScale });

            canvas.height = viewport.height;
            canvas.width = viewport.width;

            const renderCtx = {
                canvasContext: ctx,
                viewport: viewport
            };

            page.render(renderCtx).promise.then(() => {
                pageIsRendering = false;

                if (pageNumIsPending !== null) {
                    renderPage(pageNumIsPending);
                    pageNumIsPending = null;
                }
            });

            // Update UI
            pageInput.value = num;
            updateButtons();
            
            // Send update to server
            saveCurrentPageToServer(num);
        });
    };

    // Check for pages rendering
    const queueRenderPage = num => {
        if (pageIsRendering) {
            pageNumIsPending = num;
        } else {
            renderPage(num);
        }
    };

    // Show Prev Page
    const showPrevPage = () => {
        if (pageNum <= 1) return;
        pageNum--;
        queueRenderPage(pageNum);
    };

    // Show Next Page
    const showNextPage = () => {
        if (pageNum >= pdfDoc.numPages) return;
        pageNum++;
        queueRenderPage(pageNum);
    };

    // Validate and jump to page
    const jumpToPage = () => {
        let val = parseInt(pageInput.value);
        if (isNaN(val) || val < 1) val = 1;
        if (val > pdfDoc.numPages) val = pdfDoc.numPages;
        
        pageNum = val;
        queueRenderPage(pageNum);
    };

    // Save page to server via AJAX
    let saveTimeout = null;
    const saveCurrentPageToServer = (num) => {
        // debounce save
        if(saveTimeout) clearTimeout(saveTimeout);
        saveTimeout = setTimeout(() => {
            fetch("{{ route('student.books.update-page', $book->id) }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({ page: num })
            }).catch(e => console.error("Could not save page history", e));
        }, 1000);
    };

    const updateButtons = () => {
        prevBtn.disabled = pageNum <= 1;
        nextBtn.disabled = pageNum >= pdfDoc.numPages;
    };

    // Event listeners
    prevBtn.addEventListener('click', showPrevPage);
    nextBtn.addEventListener('click', showNextPage);
    pageInput.addEventListener('change', jumpToPage);

    // Initial Load PDF
    pdfjsLib.getDocument(url).promise.then(pdfDoc_ => {
        pdfDoc = pdfDoc_;
        pageCountEl.textContent = pdfDoc.numPages;
        
        // Ensure starting page doesn't exceed bounds
        if (pageNum > pdfDoc.numPages) pageNum = pdfDoc.numPages;
        
        renderPage(pageNum);
        
        // Hide loader
        pdfLoader.classList.add('hidden');
    }).catch(err => {
        pdfLoader.innerHTML = `<div class="text-rose-500 font-bold bg-rose-50 p-4 rounded text-center border border-rose-200">
            <i class="bi bi-exclamation-triangle block text-3xl mb-2"></i>
            <div>Gagal memuat dokumen PDF.</div>
            <div class="text-xs text-rose-400 mt-1 font-medium">${err.message}</div>
        </div>`;
    });
});
</script>
@endsection
