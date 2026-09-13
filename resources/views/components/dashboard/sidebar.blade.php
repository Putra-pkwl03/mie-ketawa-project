<aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
       class="fixed inset-y-0 left-0 z-50 w-64 bg-white border-r border-slate-200 h-screen flex flex-col justify-between p-6 shrink-0 overflow-y-auto transition-transform duration-300 ease-in-out lg:static lg:translate-x-0 lg:sticky lg:top-0">
    <div>
        <!-- Header Sidebar dengan Tombol Close (Mobile) -->
        <div class="flex items-center justify-between mb-10">
            <div class="flex items-center gap-3">
                <!-- Logo Image Asset -->
                <img src="{{ asset('assets/img/logo-mie-ketawa-transparant.png') }}" 
                     alt="Logo Mie Ketawa" 
                     class="w-12 h-12 object-contain flex-shrink-0">
                <div>
                    <h1 class="text-[11px] font-extrabold tracking-wider text-green-600 uppercase leading-tight">
                        DASHBOARD BERITA<br>MIE KETAWA
                    </h1>
                </div>
            </div>

            <!-- Tombol X Close (Hanya Tampil di Mobile) -->
            <button @click="sidebarOpen = false" class="p-1 rounded-lg text-slate-400 hover:bg-slate-100 lg:hidden">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <!-- Menu Navigasi -->
        <nav class="space-y-3">
            <a href="{{ route('dashboard') }}" 
               class="flex items-center gap-3 px-3 py-2 rounded-lg font-medium transition {{ request()->routeIs('dashboard') ? 'text-green-600 font-semibold bg-green-50/60' : 'text-slate-700 hover:bg-slate-100' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 00-1-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('berita.create') }}" 
               class="flex items-center gap-3 px-3 py-2 rounded-lg font-medium transition {{ request()->routeIs('berita.create') ? 'text-green-600 font-semibold bg-green-50/60' : 'text-slate-700 hover:bg-slate-100' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                </svg>
                <span>Input Berita</span>
            </a>

            <a href="{{ route('berita.index') }}" 
               class="flex items-center gap-3 px-3 py-2 rounded-lg font-medium transition {{ request()->routeIs('berita.index') ? 'text-green-600 font-semibold bg-green-50/60' : 'text-slate-700 hover:bg-slate-100' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V7M3 7l9 6 9-6"/>
                </svg>
                <span>Daftar Berita</span>
            </a>
        </nav>
    </div>

    <!-- Menu Logout -->
    <div class="space-y-3 pt-6">
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