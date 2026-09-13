@extends('components.dashboard.layouts.app')

@section('title', 'Dashboard - Mie Ketawa')
@section('page_title', 'DASHBOARD ANALYTICS')

@section('content')
<div class="space-y-6">

<div class="relative bg-gradient-to-r from-gray-100 via-slate-50 to-emerald-100/80 rounded-3xl p-6 md:p-8 text-slate-800 shadow-sm border border-emerald-100 overflow-hidden flex items-center justify-between">
    <div class="relative z-10 max-w-xl space-y-2">
        <span class="inline-block px-3 py-1 bg-emerald-100/70 border border-emerald-200/60 text-emerald-800 text-[10px] font-extrabold uppercase tracking-widest rounded-full">Ringkasan Sistem</span>
        <h2 class="text-2xl md:text-3xl font-black leading-tight text-slate-800">Selamat Datang di Panel Berita</h2>
        <p class="text-xs text-slate-600 font-medium leading-relaxed">Kelola artikel, pantau tren performa konten, dan tingkatkan visibilitas Mie Ketawa secara efisien.</p>
    </div>

    <!-- Hiasan Sisi Kanan -->
    <div class="hidden md:flex items-center justify-center relative z-10 shrink-0 pl-6">
        <div class="w-24 h-24 bg-white/80 rounded-2xl border border-emerald-100 flex items-center justify-center shadow-sm transform rotate-6 hover:rotate-0 transition-transform duration-300">
            <svg class="w-12 h-12 text-emerald-600/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
            </svg>
        </div>
    </div>
</div>

    <!-- Section Stat Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <!-- Card Total Artikel -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm flex items-center gap-4 hover:border-emerald-400 transition group">
            <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
            </div>
            <div>
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Total Artikel</p>
                <p class="text-2xl font-black text-slate-800 leading-tight">{{ $totalBerita }}</p>
            </div>
        </div>

        <!-- Card Published (Teal Tone) -->
<div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm flex items-center gap-4 hover:border-teal-300 transition group">
    <div class="w-12 h-12 rounded-2xl bg-teal-50 text-teal-600 flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
    </div>
    <div>
        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Terbit (Published)</p>
        <p class="text-2xl font-black text-slate-800 leading-tight">{{ $totalPublished }}</p>
    </div>
</div>

        <!-- Card Draft -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm flex items-center gap-4 hover:border-amber-300 transition group">
            <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
            </div>
            <div>
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Draf Konsep</p>
                <p class="text-2xl font-black text-slate-800 leading-tight">{{ $totalDraft }}</p>
            </div>
        </div>
    </div>

    <!-- Section Main Content (Grafik & Berita Terbaru) -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Chart Container (Kolom Kiri - Wider) -->
        <div class="lg:col-span-2 bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm space-y-4">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-xs font-extrabold text-slate-800 uppercase tracking-wider">Tren Publikasi Artikel</h3>
                    <p class="text-[11px] text-slate-400">Statistik aktivitas unggah berita bulanan</p>
                </div>
                <span class="px-2.5 py-1 bg-emerald-50 text-emerald-700 text-[10px] font-bold rounded-lg border border-emerald-100">6 Bulan Terakhir</span>
            </div>
            
            <div class="h-64 relative w-full">
                <canvas id="beritaChart"></canvas>
            </div>
        </div>

        <!-- Berita Terbaru List (Kolom Kanan) -->
        <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm flex flex-col justify-between space-y-4">
            <div>
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-xs font-extrabold text-slate-800 uppercase tracking-wider">Artikel Terbaru</h3>
                    <a href="{{ route('berita.index') }}" class="text-[11px] text-emerald-600 hover:text-emerald-800 font-bold transition">Lihat Semua →</a>
                </div>

                <div class="divide-y divide-slate-100">
                    @forelse($beritaTerbaru as $item)
                        <div class="py-3 flex items-center gap-3 first:pt-0 last:pb-0">
                            @if($item->primaryImage)
                                <img src="{{ asset('storage/' . $item->primaryImage->image_path) }}" class="w-10 h-10 object-cover rounded-xl shrink-0 border border-slate-100">
                            @else
                                <div class="w-10 h-10 bg-slate-100 rounded-xl flex items-center justify-center text-[9px] text-slate-400 shrink-0 font-medium">No Image</div>
                            @endif
                            <div class="min-w-0 flex-1">
                                <p class="text-xs font-bold text-slate-800 truncate hover:text-emerald-600 transition">{{ $item->judul }}</p>
                                <p class="text-[10px] text-slate-400 mt-0.5">{{ $item->created_at->format('d M Y') }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="py-8 text-center text-slate-400">
                            <p class="text-xs font-semibold">Belum ada berita terbit.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <a href="{{ route('berita.create') }}" class="w-full py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs rounded-xl shadow-lg shadow-emerald-100 transition text-center block">
                + Tulis Artikel Baru
            </a>
        </div>
    </div>
</div>

<!-- Chart.js Engine -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('beritaChart').getContext('2d');
    
    // Gradient Background Chart Tema Hijau
    const gradient = ctx.createLinearGradient(0, 0, 0, 300);
    gradient.addColorStop(0, 'rgba(5, 150, 105, 0.35)'); // Emerald-600 dengan opacity
    gradient.addColorStop(1, 'rgba(5, 150, 105, 0.0)');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($chartLabels) !!},
            datasets: [{
                label: 'Jumlah Artikel',
                data: {!! json_encode($chartData) !!},
                borderColor: '#059669', // Emerald 600
                borderWidth: 3,
                backgroundColor: gradient,
                fill: true,
                tension: 0.4,
                pointBackgroundColor: '#059669',
                pointBorderColor: '#ffffff',
                pointBorderWidth: 2,
                pointRadius: 4,
                pointHoverRadius: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { precision: 0, font: { size: 10 } },
                    grid: { color: '#f1f5f9' }
                },
                x: {
                    ticks: { font: { size: 10 } },
                    grid: { display: false }
                }
            }
        }
    });
</script>
@endsection