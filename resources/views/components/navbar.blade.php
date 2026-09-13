<nav id="navbar"
    class="bg-[#6b91421c] border-b border-gray-300 shadow-sm fixed top-0 left-0 w-full z-50 transition-all duration-300">
    <div class="max-w-8xl mx-auto px-6 flex justify-between items-center h-16">

        <!-- Group Logo -->
        <div class="flex items-center gap-3 md:gap-5 flex-shrink">
            <a href="{{ route('landing') }}">
                <img src="/assets/img/Universitas_Jenderal_Achmad_Yani_Yogyakarta.png" class="h-6 md:h-10 object-contain inline" />
                <img src="/assets/img/WhatsApp_Image_2022-09-21_at_20.47.53-removebg-preview.png" class="h-6 md:h-10 object-contain inline" />
                <img src="/assets/img/Diktisaintek-Warna.png" class="h-6 md:h-10 object-contain inline" />
                <img src="/assets/img/LOGO-MIE-KETAWA-TRANSPARANT.png" class="h-8 md:h-14 object-contain inline" />
            </a>
        </div>

        <!-- MENU + ICONS GROUP -->
        <div class="flex items-center gap-4">

            <!-- Menu Desktop -->
            <div class="hidden lg:flex lg:space-x-8 text-[14px]">
                <a href="{{ route('landing') }}#home" class="nav-link text-gray-700 hover:text-green-700 font-medium transition" data-section="home">Home</a>
                <a href="{{ route('landing') }}#tentangKamiDesktop" class="nav-link text-gray-700 hover:text-green-700 font-medium transition" data-section="tentangKamiDesktop">Tentang Kami</a>
                <a href="{{ route('landing') }}#varianKami" class="nav-link text-gray-700 hover:text-green-700 font-medium transition" data-section="varianKami">Varian Kami</a>
                
                <!-- Link Berita Desktop -->
                <a href="{{ route('berita.public') }}" class="text-gray-700 hover:text-green-700 font-medium transition {{ request()->routeIs('berita.*') ? 'text-green-800 font-bold' : '' }}">Berita</a>
                
                <a href="{{ route('landing') }}#faq" class="nav-link text-gray-700 hover:text-green-700 font-medium transition" data-section="faq">FAQ</a>
                <a href="{{ route('landing') }}#hubungiKami" class="nav-link text-gray-700 hover:text-green-700 font-medium transition" data-section="hubungiKami">Hubungi Kami</a>
            </div>

            <!-- WhatsApp Desktop -->
            <div class="relative hidden lg:block">
                <img src="/assets/img/Group-21.png" class="w-10 h-10">
                <span class="absolute -top-1 -right-1 bg-red-600 text-white text-xs font-bold rounded-full px-2 py-0.5">2</span>
            </div>

            <!-- WhatsApp Tablet -->
            <div class="relative hidden md:block lg:hidden">
                <img src="/assets/img/Group-21.png" class="w-9 h-9">
                <span class="absolute -top-1 -right-1 bg-red-600 text-white text-xs font-bold rounded-full px-2 py-0.5">2</span>
            </div>

            <!-- Hamburger -->
            <button id="menu-btn" class="lg:hidden text-green-800 focus:outline-none focus:ring-2 focus:ring-green-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Menu Mobile -->
    <div id="mobile-menu" class="hidden flex-col text-[12px] bg-white border-t border-gray-200 px-6 py-4 space-y-3 lg:hidden transition-all duration-300">
        <a href="{{ route('landing') }}#home" class="nav-link block text-gray-700 hover:text-green-800 font-medium transition" data-section="home">Home</a>
        <a href="{{ route('landing') }}#tentangKami" class="nav-link block text-gray-700 hover:text-green-800 font-medium transition" data-section="tentangKami">Tentang Kami</a>
        <a href="{{ route('landing') }}#varianKami" class="nav-link block text-gray-700 hover:text-green-800 font-medium transition" data-section="varianKami">Varian Kami</a>
        
        <!-- Link Berita Mobile -->
        <a href="{{ route('berita.public') }}" class="block text-gray-700 hover:text-green-800 font-medium transition {{ request()->routeIs('berita.*') ? 'text-green-800 font-bold' : '' }}">Berita</a>
        
        <a href="{{ route('landing') }}#faq" class="nav-link block text-gray-700 hover:text-green-800 font-medium transition" data-section="faq">FAQ</a>
        <a href="{{ route('landing') }}#hubungiKami" class="nav-link block text-gray-700 hover:text-green-800 font-medium transition" data-section="hubungiKami">Hubungi Kami</a>
    </div>
</nav>

<script>
    const menuBtn = document.getElementById("menu-btn");
    const mobileMenu = document.getElementById("mobile-menu");
    menuBtn.addEventListener("click", (e) => {
        e.stopPropagation(); 
        mobileMenu.classList.toggle("hidden");
    });

    document.querySelectorAll("#mobile-menu a").forEach(link => {
        link.addEventListener("click", () => {
            mobileMenu.classList.add("hidden");
        });
    });

    document.addEventListener("click", (e) => {
        if (!mobileMenu.classList.contains("hidden") && !mobileMenu.contains(e.target) && e.target !== menuBtn) {
            mobileMenu.classList.add("hidden");
        }
    });
</script>

<script>
    const navbar = document.getElementById("navbar");

    window.addEventListener("scroll", () => {
        if (window.scrollY > 10) {
            navbar.classList.add("bg-white", "shadow-md");
            navbar.classList.remove("bg-[#6b91421c]");
        } else {
            navbar.classList.remove("bg-white", "shadow-md");
            navbar.classList.add("bg-[#6b91421c]");
        }
    });
</script>

<script>
    const links = document.querySelectorAll('.nav-link');

    // Klik = langsung aktifkan menu
    links.forEach(link => {
        link.addEventListener("click", () => {
            links.forEach(a => {
                a.classList.remove('text-green-700', 'font-bold');
                a.classList.add('text-gray-700');
            });

            link.classList.remove('text-gray-700');
            link.classList.add('text-green-700', 'font-bold');
        });
    });

    // Scroll detect active section
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;

            const id = entry.target.getAttribute('id');
            const activeLink = document.querySelector(`a[data-section="${id}"]`);

            if (activeLink) {
                links.forEach(a => {
                    a.classList.remove('text-green-700', 'font-bold');
                    a.classList.add('text-gray-700');
                });

                activeLink.classList.remove('text-gray-700');
                activeLink.classList.add('text-green-700', 'font-bold');
            }
        });
    }, {
        threshold: 0.4
    });

    const homeSec = document.getElementById('home');
    const tentangKamiDeskSec = document.getElementById('tentangKamiDesktop');
    const tentangKamiSec = document.getElementById('tentangKami');
    const varianKamiSec = document.getElementById('varianKami');
    const faqSec = document.getElementById('faq');

    if(homeSec) observer.observe(homeSec);
    if(tentangKamiDeskSec) observer.observe(tentangKamiDeskSec);
    if(tentangKamiSec) observer.observe(tentangKamiSec);
    if(varianKamiSec) observer.observe(varianKamiSec);
    if(faqSec) observer.observe(faqSec);
</script>