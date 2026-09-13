<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Berita Mie Ketawa</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 min-h-screen flex antialiased">

    <!-- Sidebar Kiri -->
    <aside class="w-64 bg-white border-r border-slate-200 min-h-screen flex flex-col justify-between p-6">
        <div>
            <!-- Logo Header -->
            <div class="flex items-center gap-3 mb-10">
                <div class="w-10 h-10 rounded-full bg-indigo-600 text-white flex items-center justify-center shadow-md flex-shrink-0">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-[11px] font-extrabold tracking-wider text-indigo-600 uppercase leading-tight">
                        DASHBOARD<br>BERITA<br>MIE KETAWA
                    </h1>
                </div>
            </div>

            <!-- Menu Navigasi -->
            <nav class="space-y-3">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg text-indigo-600 font-semibold bg-indigo-50/60">
                    <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 00-1-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    <span>Dashboard</span>
                </a>

                <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg text-slate-700 hover:bg-slate-100 font-medium transition">
                    <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                    </svg>
                    <span>Input Berita</span>
                </a>

                <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg text-slate-700 hover:bg-slate-100 font-medium transition">
                    <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V7M3 7l9 6 9-6"/>
                    </svg>
                    <span>Daftar Berita</span>
                </a>
            </nav>
        </div>

        <!-- Menu Settings & Logout -->
        <div class="space-y-3">
            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider px-3">SETTINGS</p>
            
            <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg text-slate-700 hover:bg-slate-100 font-medium transition">
                <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <span>Settings</span>
            </a>

            <!-- Form Logout -->
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-3 py-2 rounded-lg text-red-500 hover:bg-red-50 font-medium transition">
                    <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Area Konten Utama -->
    <main class="flex-1 p-8">
        <!-- Judul Halaman -->
        <div class="border-b border-slate-400 pb-3 mb-6">
            <h1 class="text-sm font-extrabold text-slate-700 tracking-wider">DASHBOARD</h1>
        </div>

        <!-- Section Notifikasi & Card -->
        <div class="space-y-6 max-w-5xl">
            <h2 class="text-sm font-bold text-slate-800">Notifikasi & Peringatan</h2>

            <div class="space-y-3">
                <!-- Alert Gagal -->
                <div class="w-full p-3.5 bg-red-100/60 border border-red-300 rounded-lg text-slate-800 text-xs font-semibold">
                    5 Artikel Gagal Terkirim
                </div>

                <!-- Alert Berhasil -->
                <div class="w-full p-3.5 bg-emerald-100/60 border border-emerald-400 rounded-lg text-slate-800 text-xs font-semibold">
                    3 Artikel Berhasil Terkirim
                </div>
            </div>

            <!-- Card Total Artikel -->
            <div class="pt-2">
                <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-5 inline-flex items-center gap-4 pr-14">
                    <div class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center text-purple-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 01-6 0v-1m6 0H9"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-[11px] font-semibold text-slate-400">Total Artikel</p>
                        <p class="text-2xl font-black text-slate-800 leading-tight">124</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>
</html>