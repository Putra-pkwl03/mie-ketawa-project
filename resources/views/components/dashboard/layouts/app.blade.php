<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Mie Ketawa')</title>

    <!-- Favicon / Logo Tab Browser -->
    <link rel="icon" type="image/png" href="{{ asset('assets/img/LOGO-MIE-KETAWA-TRANSPARANT.png') }}">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<!-- Tambahkan sidebarOpen: false ke x-data -->
<body class="bg-slate-50 h-screen overflow-hidden flex antialiased" 
      x-data="{ openDropdown: false, showProfileModal: false, sidebarOpen: false }">

    <!-- Overlay Backdrop (Tampil hanya di mobile saat sidebar terbuka) -->
    <div x-show="sidebarOpen" 
         x-transition:enter="transition-opacity ease-linear duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-linear duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="sidebarOpen = false"
         class="fixed inset-0 z-40 bg-slate-900/50 backdrop-blur-sm lg:hidden"
         style="display: none;"></div>

    <!-- Sidebar Component -->
    <x-dashboard.sidebar />

    <!-- Main Content Wrapper -->
    <div class="flex-1 flex flex-col min-w-0 h-full">
        
        <!-- Topbar Header -->
        <header class="bg-white border-b border-slate-200/80 px-4 lg:px-8 py-2 flex items-center justify-between shrink-0 z-30 shadow-sm">
            
            <div class="flex items-center gap-3">
                <!-- Tombol Garis 3 / Hamburger (Hanya tampil di Mobile/Tablet < lg) -->
                <button @click="sidebarOpen = !sidebarOpen" 
                        class="p-2 rounded-xl text-slate-600 hover:bg-slate-100 focus:outline-none lg:hidden">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>

                <!-- Judul Halaman -->
                <h1 class="text-xs lg:text-sm font-extrabold text-slate-700 tracking-wider uppercase">
                    @yield('page_title', 'DASHBOARD')
                </h1>
            </div>

            <!-- Profile Dropdown Section -->
            <div class="relative">
                <button @click="openDropdown = !openDropdown" 
                        @click.outside="openDropdown = false"
                        class="flex items-center gap-3 p-1.5 rounded-xl hover:bg-slate-100 transition duration-150 focus:outline-none">
                    
                    <div class="w-9 h-9 rounded-xl bg-green-600 text-white flex items-center justify-center font-bold text-sm shadow-md shadow-indigo-100">
                        {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                    </div>

                    <div class="text-left hidden sm:block">
                        <p class="text-xs font-bold text-slate-800 leading-tight">
                            {{ Auth::user()->name ?? 'Administrator' }}
                        </p>
                        <p class="text-[10px] text-slate-400 font-medium">
                            {{ Auth::user()->email ?? 'admin@mieketawa.com' }}
                        </p>
                    </div>

                    <svg class="w-4 h-4 text-slate-400 transition-transform duration-200" :class="openDropdown ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <!-- Dropdown Menu -->
                <div x-show="openDropdown"
                     x-transition:enter="transition ease-out duration-100"
                     x-transition:enter-start="transform opacity-0 scale-95"
                     x-transition:enter-end="transform opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="transform opacity-100 scale-100"
                     x-transition:leave-end="transform opacity-0 scale-95"
                     class="absolute right-0 mt-2 w-48 bg-white rounded-2xl shadow-xl border border-slate-100 py-1.5 z-40 divide-y divide-slate-100"
                     style="display: none;">
                    
                    <div class="px-4 py-2.5 sm:hidden">
                        <p class="text-xs font-bold text-slate-800 truncate">{{ Auth::user()->name ?? 'Administrator' }}</p>
                        <p class="text-[10px] text-slate-400 truncate">{{ Auth::user()->email ?? 'admin@mieketawa.com' }}</p>
                    </div>

                    <div class="py-1">
                        <button type="button" @click="showProfileModal = true; openDropdown = false" class="w-full flex items-center gap-2.5 px-4 py-2 text-xs font-semibold text-slate-600 hover:text-green-600 hover:bg-slate-50 transition text-left">
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <span>Edit Profil</span>
                        </button>
                    </div>

                    <div class="py-1">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full flex items-center gap-2.5 px-4 py-2 text-xs font-bold text-red-600 hover:bg-red-50 transition">
                                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                </svg>
                                <span>Keluar (Logout)</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content Area -->
        <main class="flex-1 overflow-y-auto p-4 lg:p-8">
            <x-dashboard.alert />
            @yield('content')
        </main>
    </div>

    <!-- Modal Profil -->
    <div x-show="showProfileModal" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 bg-slate-900/40 backdrop-blur-sm flex items-center justify-center p-4"
         style="display: none;">
        
        <div @click.outside="showProfileModal = false" 
             class="bg-white rounded-3xl max-w-md w-full p-6 shadow-2xl border border-slate-100 space-y-5">
            <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                <div>
                    <h3 class="text-sm font-bold text-slate-800 uppercase tracking-wider">Edit Profil Saya</h3>
                    <p class="text-[11px] text-slate-400 mt-0.5">Perbarui informasi kredensial akun Anda</p>
                </div>
                <button type="button" @click="showProfileModal = false" class="p-1 text-slate-400 hover:text-slate-600 rounded-xl hover:bg-slate-50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <form action="{{ route('profile.update') }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-xs font-bold text-slate-600 mb-1">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ Auth::user()->name ?? '' }}" required
                           class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-700 focus:outline-none focus:border-indigo-600 focus:bg-white transition">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-600 mb-1">Email</label>
                    <input type="email" name="email" value="{{ Auth::user()->email ?? '' }}" required
                           class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-700 focus:outline-none focus:border-indigo-600 focus:bg-white transition">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-600 mb-1">Password Baru <span class="text-[10px] text-slate-400 font-normal">(Kosongkan jika tidak diganti)</span></label>
                    <input type="password" name="password" placeholder="••••••••"
                           class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-700 focus:outline-none focus:border-indigo-600 focus:bg-white transition">
                </div>

                <div class="flex gap-2 pt-2">
                    <button type="button" @click="showProfileModal = false" 
                            class="w-full py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold text-xs rounded-xl transition">
                        Batal
                    </button>
                    <button type="submit" 
                            class="w-full py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-xs rounded-xl shadow-lg shadow-indigo-100 transition">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>