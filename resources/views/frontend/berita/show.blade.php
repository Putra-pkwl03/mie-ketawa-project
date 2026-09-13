<x-app-layout>
    <x-slot name="title">{{ $berita->judul }} - Mie Ketawa</x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumb navigation -->
        <nav class="flex items-center gap-2 text-xs font-medium text-slate-500 mb-8">
            <a href="{{ route('landing') }}" class="hover:text-emerald-600 transition">Beranda</a>
            <span>/</span>
            <a href="{{ route('berita.public') }}" class="hover:text-emerald-600 transition">Berita</a>
            <span>/</span>
            <span class="text-slate-800 truncate max-w-[200px] md:max-w-xs">{{ $berita->judul }}</span>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- Main News Article Area -->
            <article class="lg:col-span-8 bg-white rounded-3xl p-6 md:p-10 border border-slate-100 shadow-sm space-y-8">
                
                <!-- Header Berita -->
                <div class="space-y-4">
                    <div class="flex items-center gap-3 text-xs font-semibold text-emerald-600">
                        <span class="px-3 py-1 bg-emerald-50 border border-emerald-100 rounded-full uppercase tracking-wider">Berita Resmi</span>
                        <span class="text-slate-400">•</span>
                        <span class="text-slate-500">{{ $berita->created_at->translatedFormat('d F Y') }}</span>
                    </div>
                    <h1 class="text-2xl md:text-4xl font-extrabold text-slate-900 leading-tight">
                        {{ $berita->judul }}
                    </h1>
                </div>

                <!-- Gallery / Image Featured -->
                @if($berita->images->count() > 0)
                    <div x-data="{ activeImage: '{{ asset('storage/' . $berita->images->first()->image_path) }}' }" class="space-y-3">
                        <!-- Main Display Image -->
                        <div class="aspect-[16/9] rounded-2xl overflow-hidden bg-slate-100 shadow-inner border border-slate-100">
                            <img :src="activeImage" alt="{{ $berita->judul }}" class="w-full h-full object-cover transition-all duration-300">
                        </div>

                        <!-- Thumbnail Carousel if images > 1 -->
                        @if($berita->images->count() > 1)
                            <div class="flex items-center gap-3 overflow-x-auto pb-2">
                                @foreach($berita->images as $img)
                                    <button 
                                        @click="activeImage = '{{ asset('storage/' . $img->image_path) }}'"
                                        class="shrink-0 w-20 h-20 rounded-xl overflow-hidden border-2 focus:outline-none transition-all duration-200"
                                        :class="activeImage === '{{ asset('storage/' . $img->image_path) }}' ? 'border-emerald-600 scale-95 shadow-md' : 'border-transparent opacity-70 hover:opacity-100'"
                                    >
                                        <img src="{{ asset('storage/' . $img->image_path) }}" class="w-full h-full object-cover">
                                    </button>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endif

                <!-- Content Text -->
                <div class="prose prose-slate max-w-none text-slate-700 leading-relaxed text-sm md:text-base">
                    {!! $berita->konten !!}
                </div>

                <!-- Social Share Bar -->
                <div class="pt-8 border-t border-slate-100 flex items-center justify-between">
                    <span class="text-xs font-bold text-slate-600 uppercase tracking-wider">Bagikan Artikel</span>
                    <div class="flex items-center gap-2">
                        <a href="https://api.whatsapp.com/send?text={{ urlencode($berita->judul . ' ' . url()->current()) }}" target="_blank" class="w-9 h-9 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center hover:bg-emerald-600 hover:text-white transition-all">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                        </a>
                    </div>
                </div>

            </article>

            <!-- Sidebar: Berita Terkait -->
            <aside class="lg:col-span-4 space-y-6">
                <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm space-y-6 sticky top-28">
                    <h3 class="text-lg font-extrabold text-slate-900 border-b border-slate-100 pb-3">
                        Berita Terkait
                    </h3>

                    <div class="space-y-4">
                        @forelse($relatedBerita as $rel)
                            <a href="{{ route('berita.show', $rel->slug) }}" class="flex gap-4 group items-center">
                                <div class="w-20 h-20 rounded-2xl overflow-hidden bg-slate-100 shrink-0">
                                    @if($rel->primaryImage)
                                        <img src="{{ asset('storage/' . $rel->primaryImage->image_path) }}" alt="{{ $rel->judul }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                    @else
                                        <div class="w-full h-full bg-slate-100"></div>
                                    @endif
                                </div>
                                <div class="space-y-1">
                                    <h4 class="text-xs font-bold text-slate-800 group-hover:text-emerald-600 transition-colors line-clamp-2 leading-snug">
                                        {{ $rel->judul }}
                                    </h4>
                                    <span class="text-[10px] text-slate-400 font-medium block">
                                        {{ $rel->created_at->translatedFormat('d M Y') }}
                                    </span>
                                </div>
                            </a>
                        @empty
                            <p class="text-xs text-slate-400">Belum ada berita terkait lainnya.</p>
                        @endforelse
                    </div>
                </div>
            </aside>

        </div>
    </div>
</x-app-layout>