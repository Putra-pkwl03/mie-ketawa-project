@extends('components.dashboard.layouts.app')

@section('title', 'Daftar Berita - Mie Ketawa')
@section('page_title', 'KELOLA DAFTAR BERITA')

@section('content')
<div class="space-y-6">

    <!-- Top Action Bar -->
    <div class="flex flex-col sm:flex-row justify-between items-center gap-4 bg-white p-4 rounded-2xl border border-slate-200/80 shadow-sm">
        <form action="{{ route('berita.index') }}" method="GET" class="relative w-full sm:w-96">
    <div class="relative flex items-center">
        <!-- Icon Kaca Pembesar di Kiri -->
        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-slate-400">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
        </span>

        <!-- Input Field (pr-12 agar teks tidak tertimpa tombol) -->
        <input type="text" 
               name="search" 
               value="{{ request('search') }}" 
               placeholder="Cari berita berdasarkan judul..." 
               class="w-full pl-10 pr-12 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-700 focus:outline-none focus:border-emerald-600 focus:bg-white transition shadow-sm">

        <!-- Tombol Submit Icon di Kanan (Tema Hijau) -->
        <button type="submit" 
                class="absolute right-1.5 p-1.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg transition-colors focus:outline-none"
                title="Cari">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
            </svg>
        </button>
    </div>
</form>

        <a href="{{ route('berita.create') }}" class="w-full sm:w-auto px-4 py-2.5 bg-green-600 hover:bg-green-700 text-white font-bold text-xs rounded-xl shadow-lg shadow-indigo-100 flex items-center justify-center gap-2 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <span>Tulis Berita Baru</span>
        </a>
    </div>

    <!-- Table Container -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="bg-slate-50/70 border-b border-slate-200 text-slate-500 uppercase tracking-wider font-bold">
                        <th class="p-4">Artikel</th>
                        <th class="p-4">Status</th>
                        <th class="p-4">Media</th>
                        <th class="p-4">Tanggal Tanggal</th>
                        <th class="p-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($beritas as $item)
                        <tr class="hover:bg-slate-50/80 transition-colors">
                            <td class="p-4">
                                <div class="flex items-center gap-3">
                                    @if($item->primaryImage)
                                        <img src="{{ asset('storage/' . $item->primaryImage->image_path) }}" class="w-12 h-12 object-cover rounded-xl shadow-sm border border-slate-100 flex-shrink-0">
                                    @else
                                        <div class="w-12 h-12 bg-slate-100 rounded-xl flex items-center justify-center text-[10px] text-slate-400 flex-shrink-0 font-medium">No Image</div>
                                    @endif
                                    <div>
                                        <p class="font-bold text-slate-800 text-sm line-clamp-1 mb-0.5">{{ $item->judul }}</p>
                                        <p class="text-[11px] text-slate-400 line-clamp-1">{{ Str::limit(strip_tags($item->konten), 60) }}</p>
                                    </div>
                                </div>
                            </td>

                            <td class="p-4 whitespace-nowrap">
                                @if(($item->status ?? 'published') == 'published')
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-emerald-50 text-emerald-600 font-bold rounded-full text-[10px]">
                                        <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></span> Published
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-amber-50 text-amber-600 font-bold rounded-full text-[10px]">
                                        <span class="w-1.5 h-1.5 bg-amber-500 rounded-full"></span> Draft
                                    </span>
                                @endif
                            </td>

                            <td class="p-4 whitespace-nowrap">
                                <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-slate-100 text-slate-600 font-bold rounded-lg text-[11px]">
                                    <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    {{ $item->images->count() }}
                                </span>
                            </td>

                            <td class="p-4 whitespace-nowrap text-slate-500 font-medium">
                                {{ $item->created_at->format('d M Y') }}
                            </td>

                            <td class="p-4 whitespace-nowrap text-center">
                                <div class="flex items-center justify-center gap-1">
                                    <button type="button" onclick="openPreviewModal('{{ addslashes($item->judul) }}', '{{ $item->created_at->format('d M Y') }}', '{{ $item->primaryImage ? asset('storage/' . $item->primaryImage->image_path) : '' }}', '{{ addslashes($item->konten) }}')" 
                                            class="p-2 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition" title="Preview Detail">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </button>

                                    <a href="{{ route('berita.edit', $item->id) }}" class="p-2 text-slate-400 hover:text-amber-600 hover:bg-amber-50 rounded-lg transition" title="Edit Artikel">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </a>

                                    <button type="button" onclick="confirmDelete('{{ route('berita.destroy', $item->id) }}', '{{ addslashes($item->judul) }}')" 
                                            class="p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition" title="Hapus Artikel">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-8 text-center text-slate-400">
                                <div class="space-y-1">
                                    <p class="font-semibold text-xs">Belum ada berita ditemukan.</p>
                                    <p class="text-[11px]">Coba cari kata kunci lain atau tulis berita baru.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($beritas->hasPages())
            <div class="p-4 border-t border-slate-100 bg-slate-50/50">
                {{ $beritas->links() }}
            </div>
        @endif
    </div>
</div>

<!-- MODAL PREVIEW -->
<div id="previewModal" class="fixed inset-0 z-50 bg-slate-900/40 backdrop-blur-sm hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-2xl w-full max-h-[85vh] overflow-hidden shadow-2xl flex flex-col">
        <div class="p-5 border-b border-slate-100 flex items-center justify-between">
            <span class="text-[11px] font-extrabold text-indigo-600 uppercase tracking-wider">Preview Detail Berita</span>
            <button type="button" onclick="closePreviewModal()" class="p-1 text-slate-400 hover:text-slate-600 rounded-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <div class="p-6 overflow-y-auto space-y-4">
            <h2 id="modalTitle" class="text-xl font-bold text-slate-800 leading-snug"></h2>
            <p id="modalDate" class="text-xs font-semibold text-slate-400"></p>

            <div id="modalImageContainer" class="rounded-xl overflow-hidden hidden">
                <img id="modalImage" src="" class="w-full max-h-64 object-cover">
            </div>

            <div id="modalContent" class="text-xs text-slate-600 leading-relaxed prose max-w-none pt-2 border-t border-slate-100"></div>
        </div>
    </div>
</div>

<!-- MODAL KONFIRMASI HAPUS -->
<div id="deleteModal" class="fixed inset-0 z-50 bg-slate-900/40 backdrop-blur-sm hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-sm w-full p-6 text-center shadow-2xl space-y-4">
        <div class="w-12 h-12 bg-red-50 text-red-500 rounded-full flex items-center justify-center mx-auto">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
        </div>
        <div>
            <h3 class="text-sm font-bold text-slate-800">Hapus Berita Ini?</h3>
            <p class="text-xs text-slate-500 mt-1" id="deleteTargetTitle"></p>
        </div>
        <form id="deleteForm" method="POST" class="flex gap-2 pt-2">
            @csrf
            @method('DELETE')
            <button type="button" onclick="closeDeleteModal()" class="w-full py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold text-xs rounded-xl transition">Batal</button>
            <button type="submit" class="w-full py-2.5 bg-red-600 hover:bg-red-700 text-white font-bold text-xs rounded-xl shadow-lg shadow-red-100 transition">Ya, Hapus</button>
        </form>
    </div>
</div>

<script>
    // Preview
    function openPreviewModal(title, date, imageSrc, content) {
        document.getElementById('modalTitle').innerText = title;
        document.getElementById('modalDate').innerText = 'Diterbitkan pada: ' + date;
        document.getElementById('modalContent').innerHTML = content;

        const imgContainer = document.getElementById('modalImageContainer');
        const img = document.getElementById('modalImage');

        if (imageSrc) {
            img.src = imageSrc;
            imgContainer.classList.remove('hidden');
        } else {
            imgContainer.classList.add('hidden');
        }

        document.getElementById('previewModal').classList.remove('hidden');
    }

    function closePreviewModal() {
        document.getElementById('previewModal').classList.add('hidden');
    }

    // Modal Delete
    function confirmDelete(actionUrl, title) {
        document.getElementById('deleteForm').action = actionUrl;
        document.getElementById('deleteTargetTitle').innerText = '"' + title + '"';
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
</script>
@endsection