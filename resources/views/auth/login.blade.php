<div>
    <!-- Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less. - Marie Curie -->
</div>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Mie Ketawa</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#4380f3] min-h-screen flex items-center justify-center p-4 antialiased relative overflow-hidden">

    <!-- Background Vektor Gelombang Fluid -->
    <div class="fixed inset-0 -z-10 overflow-hidden pointer-events-none">
        <svg class="absolute w-full h-full object-cover" viewBox="0 0 1440 900" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
            <!-- Gelombang Kiri Lengkung -->
            <path d="M-100 -100 C 350 200, 180 700, -100 1000 L -100 -100 Z" fill="#326ce5" opacity="0.6"/>
            
            <!-- Gelombang Kanan Atas -->
            <path d="M1540 -100 C 950 200, 1150 650, 1540 1000 L 1540 -100 Z" fill="#5c96f9" opacity="0.45"/>
            
            <!-- Gelombang Bawah Lengkung -->
            <path d="M-100 550 C 400 300, 800 850, 1540 450 L 1540 1000 L -100 1000 Z" fill="#3b78ec" opacity="0.5"/>
        </svg>
    </div>

    <!-- Card Container -->
    <div class="bg-white rounded-3xl shadow-2xl w-full max-w-md p-8 md:p-10 relative z-10">
        
        <!-- Header Title -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
                <span class="text-blue-600">Login</span> Admin
            </h1>
            <p class="text-xs font-medium text-gray-400 mt-1">Silakan masuk untuk melanjutkan</p>
        </div>

        <!-- Alert Error Notifikasi -->
        @if ($errors->any())
            <div class="mb-5 p-3.5 bg-red-50 border-l-4 border-red-500 rounded-r-lg shadow-sm">
                <div class="flex items-center mb-1">
                    <svg class="w-4 h-4 text-red-500 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="text-xs font-bold text-red-700">Gagal Login</span>
                </div>
                <ul class="list-disc list-inside text-xs text-red-600 space-y-0.5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form Login -->
        <form action="{{ route('login') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Field Email -->
            <div>
                <label for="email" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Email :</label>
                <input 
                    type="email" 
                    id="email"
                    name="email" 
                    value="{{ old('email') }}" 
                    placeholder="adminkami@gmail.com" 
                    required 
                    class="w-full px-4 py-3 bg-gray-100/80 rounded-xl text-sm text-gray-800 border border-gray-200 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-100 focus:outline-none transition-all duration-200"
                >
            </div>

            <!-- Field Password -->
            <div>
                <div class="flex justify-between items-center mb-1.5">
                    <label for="password" class="text-xs font-bold text-gray-700 uppercase tracking-wider">Password</label>
                    <a href="#" onclick="alert('Silakan hubungi Super Admin untuk reset password.'); return false;" class="text-xs font-semibold text-gray-500 hover:text-blue-600 transition">
                        Lupa Password?
                    </a>
                </div>
                <div class="relative">
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        placeholder="••••••••" 
                        required 
                        class="w-full px-4 py-3 pr-11 bg-gray-100/80 rounded-xl text-sm text-gray-800 border border-gray-200 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-100 focus:outline-none transition-all duration-200"
                    >
                    <!-- Toggle Mata Password -->
                    <button type="button" onclick="togglePasswordVisibility()" class="absolute right-3.5 top-1/2 -translate-y-1/2 text-gray-400 hover:text-blue-600 transition focus:outline-none">
                        <svg id="eye-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Remember Password Checkbox -->
            <div class="flex items-center">
                <input 
                    type="checkbox" 
                    id="remember" 
                    name="remember" 
                    class="w-4 h-4 text-blue-600 rounded border-gray-300 focus:ring-blue-500 cursor-pointer"
                >
                <label for="remember" class="ml-2 text-xs font-medium text-gray-600 cursor-pointer select-none">
                    Remember Password
                </label>
            </div>

            <!-- Tombol Masuk -->
            <button 
                type="submit" 
                class="w-full py-3 bg-blue-600 hover:bg-blue-700 active:bg-blue-800 text-white font-semibold text-sm rounded-xl shadow-md transition-all duration-200"
            >
                Masuk
            </button>
        </form>

        <!-- Footer Copyright -->
        <div class="mt-8 text-center pt-2">
            <p class="text-[11px] font-medium text-gray-400">© {{ date('Y') }} Admin Panel. All right reserved.</p>
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