@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between mt-8 mb-8">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="relative inline-flex items-center px-6 py-3 ml-2 text-sm font-bold text-slate-400 bg-slate-100 border border-slate-200 cursor-not-allowed rounded-xl shadow-sm">
                <i class="bi bi-chevron-left mr-2"></i> Kembali
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center px-6 py-3 ml-2 text-sm font-bold text-slate-700 bg-white border border-slate-300 rounded-xl hover:bg-slate-50 hover:text-slate-900 transition-all shadow-sm">
                <i class="bi bi-chevron-left mr-2"></i> Kembali
            </a>
        @endif

        {{-- Pagination Elements (Hidden on mobile) --}}
        <div class="hidden sm:flex items-center gap-1.5 bg-white px-2 py-1.5 rounded-xl border border-slate-200 shadow-sm">
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="px-3 py-1.5 text-slate-400 text-sm font-medium">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="relative inline-flex items-center px-4 py-2 text-sm font-bold text-white bg-slate-900 border border-slate-900 shadow-md shadow-slate-900/20 rounded-lg">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}" class="relative inline-flex items-center px-4 py-2 text-sm font-bold text-slate-600 border border-transparent hover:border-slate-200 hover:bg-slate-50 hover:text-slate-900 rounded-lg transition-all">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="relative inline-flex items-center px-6 py-3 mr-2 bg-slate-900 text-white font-bold text-sm rounded-xl shadow-lg shadow-slate-900/20 hover:bg-slate-800 transition-all">
                Selanjutnya <i class="bi bi-chevron-right ml-2 text-slate-300"></i>
            </a>
        @else
            <span class="relative inline-flex items-center px-6 py-3 mr-2 text-sm font-bold text-slate-400 bg-slate-100 border border-slate-200 cursor-not-allowed rounded-xl shadow-sm">
                Selanjutnya <i class="bi bi-chevron-right ml-2"></i>
            </span>
        @endif
    </nav>
@endif
