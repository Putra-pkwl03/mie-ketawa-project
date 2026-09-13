@extends('components.dashboard.layouts.app')

@section('title', ($berita->exists ? 'Edit Berita' : 'Input Berita') . ' - Mie Ketawa')
@section('page_title', $berita->exists ? 'EDIT BERITA' : 'TULIS BERITA BARU')

@section('content')
<form action="{{ $berita->exists ? route('berita.update', $berita->id) : route('berita.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    @csrf
    @if($berita->exists)
        @method('PUT')
    @endif

    <!-- KOLOM KIRI (Editor Utama) -->
    <div class="lg:col-span-2 space-y-6">
        <!-- Input Judul -->
        <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm">
            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Judul Artikel</label>
            <input type="text" name="judul" value="{{ old('judul', $berita->judul) }}" placeholder="Masukkan judul berita yang menarik..." required
                   class="w-full text-xl font-bold text-slate-800 placeholder-slate-300 border-0 border-b border-slate-200 focus:border-indigo-600 focus:ring-0 pb-2 transition-all">
        </div>

        <!-- Rich Text Editor Container -->
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden flex flex-col">
            <!-- Toolbar ala Word -->
            <div class="bg-slate-50 border-b border-slate-200 p-2 flex flex-wrap items-center gap-1 text-slate-600">
                <button type="button" onclick="formatDoc('bold')" class="p-2 hover:bg-slate-200 rounded-lg text-xs font-bold transition">B</button>
                <button type="button" onclick="formatDoc('italic')" class="p-2 hover:bg-slate-200 rounded-lg text-xs italic transition">I</button>
                <button type="button" onclick="formatDoc('underline')" class="p-2 hover:bg-slate-200 rounded-lg text-xs underline transition">U</button>
                <button type="button" onclick="formatDoc('strikeThrough')" class="p-2 hover:bg-slate-200 rounded-lg text-xs line-through transition">S</button>
                
                <div class="h-4 w-[1px] bg-slate-300 mx-1"></div>

                <button type="button" onclick="formatDoc('justifyLeft')" class="p-2 hover:bg-slate-200 rounded-lg transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h10M4 18h14"/></svg>
                </button>
                <button type="button" onclick="formatDoc('justifyCenter')" class="p-2 hover:bg-slate-200 rounded-lg transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M7 12h10M5 18h14"/></svg>
                </button>
                <button type="button" onclick="formatDoc('justifyRight')" class="p-2 hover:bg-slate-200 rounded-lg transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M10 12h10M6 18h14"/></svg>
                </button>

                <div class="h-4 w-[1px] bg-slate-300 mx-1"></div>

                <button type="button" onclick="formatDoc('insertUnorderedList')" class="p-2 hover:bg-slate-200 rounded-lg transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
                <button type="button" onclick="formatDoc('insertOrderedList')" class="p-2 hover:bg-slate-200 rounded-lg transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 6h14M7 12h14M7 18h14M3 6h.01M3 12h.01M3 18h.01"/></svg>
                </button>

                <div class="h-4 w-[1px] bg-slate-300 mx-1"></div>

                <select onchange="formatHeading(this.value)" class="bg-white border border-slate-200 text-xs rounded-lg px-2 py-1 text-slate-700 focus:outline-none">
                    <option value="p">Paragraf</option>
                    <option value="h1">Judul Besar (H1)</option>
                    <option value="h2">Sub Judul (H2)</option>
                    <option value="h3">Sub Sub-Judul (H3)</option>
                </select>
            </div>

            <!-- Area Editor -->
            <div id="editor" contenteditable="true" 
                 class="p-6 min-h-[350px] focus:outline-none text-slate-700 leading-relaxed text-sm prose max-w-none">
                {!! old('konten', $berita->konten ?? '<p>Tuliskan konten berita secara lengkap di sini...</p>') !!}
            </div>
            
            <textarea name="konten" id="kontenHidden" class="hidden">{{ old('konten', $berita->konten) }}</textarea>
        </div>
    </div>

    <!-- KOLOM KANAN (Sidebar Setting & Media) -->
    <div class="space-y-6">
        <!-- Card Upload Gambar -->
        <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm space-y-4">
            <h3 class="text-xs font-bold text-slate-500 uppercase tracking-wider">Galeri dan Gambar Utama</h3>
            
            <div class="border-2 border-dashed border-slate-200 hover:border-indigo-400 rounded-xl p-6 text-center transition group bg-slate-50/50 cursor-pointer relative">
                <input type="file" name="images[]" multiple accept="image/*" {{ $berita->exists ? '' : 'required' }} onchange="previewImages(event)"
                       class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                
                <div class="space-y-2">
                    <div class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-full flex items-center justify-center mx-auto group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                    <p class="text-xs font-semibold text-slate-700">Upload Media Baru</p>
                    <p class="text-[11px] text-slate-400">Pilih file jika ingin memperbarui gambar</p>
                </div>
            </div>

            <!-- Preview Grid Gambar yang Sudah Ada / Baru -->
            <div id="imagePreviewContainer" class="grid grid-cols-3 gap-2 pt-2">
                @if($berita->exists && $berita->images->count() > 0)
                    @foreach($berita->images as $index => $img)
                        <div class="relative group rounded-lg overflow-hidden border border-slate-200 aspect-square">
                            <img src="{{ asset('storage/' . $img->image_path) }}" class="w-full h-full object-cover">
                            @if($img->is_primary)
                                <span class="absolute bottom-1 left-1 bg-indigo-600 text-white text-[9px] font-extrabold px-1.5 py-0.5 rounded shadow">UTAMA</span>
                            @endif
                        </div>
                    @endforeach
                @endif
            </div>
            <p class="text-[11px] text-slate-400 italic">*Gambar pertama otomatis diplot sebagai gambar utama.</p>
        </div>

        <!-- Card Publish / Status -->
        <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm space-y-4">
            <h3 class="text-xs font-bold text-slate-500 uppercase tracking-wider">Pengaturan Publikasi</h3>

            <div>
                <label class="block text-xs text-slate-600 mb-1 font-medium">Status Berita</label>
                <select name="status" class="w-full bg-slate-50 border border-slate-200 text-xs rounded-xl p-2.5 text-slate-700 focus:outline-none focus:border-indigo-600 font-semibold">
                    <option value="published" {{ old('status', $berita->status ?? '') == 'published' ? 'selected' : '' }}>Langsung Terbitkan (Published)</option>
                    <option value="draft" {{ old('status', $berita->status ?? '') == 'draft' ? 'selected' : '' }}>Simpan Sebagai Draft</option>
                </select>
            </div>

            <hr class="border-slate-100 my-2">

            <div class="flex items-center gap-3">
                <button type="submit" onclick="syncEditorContent()"
                        class="w-full py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-xs rounded-xl shadow-lg shadow-indigo-200 transition-all text-center">
                    {{ $berita->exists ? 'Update Berita' : 'Terbitkan Berita' }}
                </button>
            </div>
        </div>
    </div>
</form>

<script>
    function formatDoc(cmd, value = null) {
        document.execCommand(cmd, false, value);
    }

    function formatHeading(value) {
        if (value) {
            document.execCommand('formatBlock', false, value);
        }
    }

    function syncEditorContent() {
        const editor = document.getElementById('editor');
        const hiddenInput = document.getElementById('kontenHidden');
        hiddenInput.value = editor.innerHTML;
    }

    function previewImages(event) {
        const container = document.getElementById('imagePreviewContainer');
        container.innerHTML = '';
        const files = event.target.files;

        if (files) {
            Array.from(files).forEach((file, index) => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const imgDiv = document.createElement('div');
                    imgDiv.className = 'relative group rounded-lg overflow-hidden border border-slate-200 aspect-square';
                    imgDiv.innerHTML = `
                        <img src="${e.target.result}" class="w-full h-full object-cover">
                        ${index === 0 ? '<span class="absolute bottom-1 left-1 bg-indigo-600 text-white text-[9px] font-extrabold px-1.5 py-0.5 rounded shadow">UTAMA</span>' : ''}
                    `;
                    container.appendChild(imgDiv);
                }
                reader.readAsDataURL(file);
            });
        }
    }
</script>
@endsection