<x-app-layout>
    <x-slot name="title">Kabar & Berita Terbaru - Mie Ketawa</x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header Banner Section -->
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
            <span class="px-4 py-1.5 bg-emerald-100 text-emerald-700 rounded-full text-xs font-bold uppercase tracking-wider inline-block">
                Informasi & Artikel
            </span>
            <h1 class="text-3xl md:text-5xl font-black text-slate-900 tracking-tight font-['Merienda']">
                Kabar Terbaru <span class="text-emerald-600">Mie Ketawa</span>
            </h1>
            <p class="text-slate-600 text-sm md:text-base leading-relaxed">
                Dapatkan info terbaru seputar promo, inovasi menu, kegiatan sosial, dan cerita menarik di balik kelezatan sajian Mie Ketawa.
            </p>
        </div>

        <!-- Grid Berita Cards -->
        @if($beritas->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($beritas as $item)
                    <article class="bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 flex flex-col group">
                        <!-- Thumbnail Image -->
                        <div class="relative aspect-[16/10] overflow-hidden bg-slate-100">
                            @if($item->primaryImage)
                                <img 
                                    src="{{ asset('storage/' . $item->primaryImage->image_path) }}" 
                                    alt="{{ $item->judul }}" 
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-out"
                                >
                            @else
                                <div class="w-full h-full flex items-center justify-center text-slate-300 bg-slate-100">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            @endif
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 bg-white/90 backdrop-blur-md text-emerald-700 text-[11px] font-bold rounded-full shadow-sm">
                                    {{ $item->created_at->translatedFormat('d M Y') }}
                                </span>
                            </div>
                        </div>

                        <!-- Content Card -->
                        <div class="p-6 flex flex-col flex-grow justify-between space-y-4">
                            <div class="space-y-2">
                                <h2 class="text-xl font-bold text-slate-800 group-hover:text-emerald-600 transition-colors line-clamp-2">
                                    <a href="{{ route('berita.show', $item->slug) }}">
                                        {{ $item->judul }}
                                    </a>
                                </h2>
                                <p class="text-slate-600 text-xs leading-relaxed line-clamp-3">
                                    {{ $item->ringkasan }}
                                </p>
                            </div>

                            <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                                <span class="text-xs font-medium text-slate-400">Mie Ketawa News</span>
                                <a href="{{ route('berita.show', $item->slug) }}" class="inline-flex items-center gap-1 text-xs font-bold text-emerald-600 hover:text-emerald-700 group/link">
                                    Baca Selengkapnya 
                                    <svg class="w-4 h-4 transform group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Pagination Links -->
            <div class="mt-12">
                {{ $beritas->links() }}
            </div>
        @else
            <!-- State Kosong -->
            <div class="bg-white rounded-3xl p-12 text-center max-w-md mx-auto border border-slate-100 shadow-sm">
                <div class="w-16 h-16 bg-emerald-50 text-emerald-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-slate-800">Belum Ada Berita</h3>
                <p class="text-slate-500 text-xs mt-1">Saat ini belum ada berita atau artikel yang dapat ditampilkan.</p>
            </div>
        @endif

    </div>
</x-app-layout>