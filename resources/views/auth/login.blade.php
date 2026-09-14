<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Mie Ketawa</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 min-h-screen antialiased font-sans">

    <!-- Wrapper Pembatas Overflow Supaya Tidak Scroll Horizontal -->
    <div class="relative w-full min-h-screen flex items-center justify-center p-4 overflow-hidden">

        <!-- Ambient Glowing Background (Efek Gradient Modern) -->
        <div class="absolute -top-40 -left-40 w-96 h-96 bg-emerald-500/20 rounded-full blur-[128px] pointer-events-none"></div>
        <div class="absolute -bottom-40 -right-40 w-96 h-96 bg-green-500/20 rounded-full blur-[128px] pointer-events-none"></div>

        <!-- Background Vektor Pattern Grid -->
        <div class="absolute inset-0 bg-[linear-gradient(to_right,#1e293b15_1px,transparent_1px),linear-gradient(to_bottom,#1e293b15_1px,transparent_1px)] bg-[size:4rem_4rem] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_50%,#000_70%,transparent_100%)] pointer-events-none"></div>

        <!-- Main Card Container (Modern Glassmorphism) -->
        <div class="w-full max-w-md relative z-10">
            
            <!-- Outer Glowing Card Accent -->
            <div class="bg-white/95 backdrop-blur-xl rounded-3xl p-6 sm:p-8 md:p-10 shadow-2xl border border-white/20 relative overflow-hidden">
                
                <!-- Top Accent Line -->
                <div class="absolute top-0 left-0 right-0 h-1.5 bg-gradient-to-r from-emerald-500 to-green-400"></div>

                <!-- Header Title & Branding -->
                <div class="text-center mb-8 space-y-1">
                    <div class="inline-flex items-center justify-center w-12 h-12 bg-emerald-50 rounded-2xl text-emerald-600 mb-2 border border-emerald-100 shadow-inner">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                    </div>
                    <h1 class="text-2xl md:text-3xl font-black text-slate-800 tracking-tight">
                        Login <span class="text-emerald-600">Admin</span>
                    </h1>
                    <p class="text-xs font-semibold text-slate-400">Panel Kelola Berita Mie Ketawa</p>
                </div>

                <!-- Alert Error Notifikasi -->
                @if ($errors->any())
                    <div class="mb-6 p-4 bg-rose-50 border border-rose-200/60 rounded-2xl shadow-sm">
                        <div class="flex items-center gap-2 mb-1">
                            <svg class="w-4 h-4 text-rose-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span class="text-xs font-bold text-rose-700">Akses Ditolak</span>
                        </div>
                        <ul class="list-disc list-inside text-[11px] text-rose-600 font-medium space-y-0.5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form Login -->
                <form action="{{ route('login') }}" method="POST" class="space-y-4">
                    @csrf

                    <!-- Field Email -->
                    <div class="space-y-1.5">
                        <label for="email" class="block text-[11px] font-extrabold text-slate-600 uppercase tracking-wider">Email Admin</label>
                        <div class="relative flex items-center">
                            <span class="absolute left-3.5 text-slate-400 pointer-events-none">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                                </svg>
                            </span>
                            <input 
                                type="email" 
                                id="email"
                                name="email" 
                                value="{{ old('email') }}" 
                                placeholder="nama@mieketawa.com" 
                                required 
                                class="w-full pl-10 pr-4 py-3 bg-slate-50 rounded-xl text-xs font-medium text-slate-800 border border-slate-200 focus:border-emerald-600 focus:bg-white focus:ring-4 focus:ring-emerald-500/10 focus:outline-none transition-all duration-200"
                            >
                        </div>
                    </div>

                    <!-- Field Password -->
                    <div class="space-y-1.5">
                        <div class="flex justify-between items-center">
                            <label for="password" class="text-[11px] font-extrabold text-slate-600 uppercase tracking-wider">Password</label>
                            <a href="#" onclick="alert('Silakan hubungi Super Admin untuk reset password.'); return false;" class="text-[11px] font-bold text-emerald-600 hover:text-emerald-700 transition">
                                Lupa Password?
                            </a>
                        </div>
                        <div class="relative flex items-center">
                            <span class="absolute left-3.5 text-slate-400 pointer-events-none">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </span>
                            <input 
                                type="password" 
                                id="password" 
                                name="password" 
                                placeholder="••••••••" 
                                required 
                                class="w-full pl-10 pr-11 py-3 bg-slate-50 rounded-xl text-xs font-medium text-slate-800 border border-slate-200 focus:border-emerald-600 focus:bg-white focus:ring-4 focus:ring-emerald-500/10 focus:outline-none transition-all duration-200"
                            >
                            <!-- Toggle Mata Password -->
                            <button type="button" onclick="togglePasswordVisibility()" class="absolute right-3.5 text-slate-400 hover:text-emerald-600 transition focus:outline-none">
                                <svg id="eye-icon" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Remember Password Checkbox -->
                    <div class="flex items-center pt-1">
                        <input 
                            type="checkbox" 
                            id="remember" 
                            name="remember" 
                            class="w-4 h-4 text-emerald-600 rounded border-slate-300 focus:ring-emerald-500 cursor-pointer accent-emerald-600"
                        >
                        <label for="remember" class="ml-2 text-xs font-semibold text-slate-600 cursor-pointer select-none">
                            Ingat Saya di Perangkat Ini
                        </label>
                    </div>

                    <!-- Tombol Masuk -->
                    <button 
                        type="submit" 
                        class="w-full py-3.5 bg-gradient-to-r from-emerald-600 to-green-600 hover:from-emerald-700 hover:to-green-700 text-white font-bold text-xs uppercase tracking-wider rounded-xl shadow-lg shadow-emerald-600/25 active:scale-[0.99] transition-all duration-200 mt-2"
                    >
                        Masuk ke Dashboard →
                    </button>
                </form>

                <!-- Footer Copyright -->
                <div class="mt-8 text-center border-t border-slate-100 pt-4">
                    <p class="text-[11px] font-semibold text-slate-400">© {{ date('Y') }} Mie Ketawa. All rights reserved.</p>
                </div>
            </div>
        </div>

    </div>

    <!-- Script Toggle Password -->
    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858-5.908a8.959 8.959 0 013.682-.782c4.478 0 8.268 2.943 9.542 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21f-9-9" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18" />
                `;
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                `;
            }
        }
    </script>
</body>
</html>