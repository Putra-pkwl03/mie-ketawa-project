<header id="home"
    class="w-full relative overflow-x-hidden bg-[#6b91421c]  md:pb-2 lg:pt-18 lg:pb-8 xl:pb-0 mb-0 border-b-1 border-gray-200 ">
    <div class="max-w-full mx-auto px-6 lg:px-0 relative z-20 ml-0 lg:ml-16">
        <div class="flex items-center gap-2">
            <div id="searchBox"
                class="flex mt-24 md:mt-28 lg:mt-12 xl:mt-10  items-center bg-white/90 border-2 border-[#64a946] rounded-full overflow-hidden w-full max-w-[200px] md:max-w-[360px] -ml-1 lg:max-w-[600px] mx-auto lg:mr-auto">
                <div class="relative w-6 h-6 md:w-6 md:h-6 lg:w-8 lg:h-8">
                    <div
                        class="absolute left-1 md:left-2 lg:left-2 top-1/2 -translate-y-1/2 bg-[#FF8102] w-6 h-6 md:w-6 md:h-6 lg:w-8 lg:h-8 flex items-center justify-center rounded-full">
                        <img src="/assets/img/vector.png" class="w-4 h-4 md:w-4 md:h-4 lg:w-6 lg:h-6" />
                    </div>
                </div>
                <input id="searchInput" type="text" placeholder="Informasi apa yang anda butuhkan?"
                    class="ml-1 md:ml-4 lg:ml-4 text-[10px] md:text-[14px] lg:text-[18px] py-1.5 px-2 md:px-1 md:py-1 lg:px-2 lg:py-1.5 text-gray-700 bg-transparent focus:ring-0 focus:outline-none grow border-none" />

                <button
                    class="flex items-center bg-[#396426] hover:bg-[#195415] text-white font-normal py-2 px-2 md:font-medium md:py-2 md:px-4 lg:py-2 lg:px-2 gap-2 rounded-full transition duration-150 ease-in-out -ml-20 md:ml-4 lg:ml-4">
                    <img src="/assets/img/SearchOutline.png" alt="Search Icon"
                        class="w-3 h-3  md:w-3 md:h-3 lg:w-5 lg:h-5 object-contain" />
                    <h2 class="text-[10px] md:text-[14px] lg:text-[18px]">Search</h2>
                </button>
            </div>
        </div>

        <!-- Konten utama -->
        <div class="flex flex-col lg:flex-row items-center justify-between gap-10 w-full">
            <!-- Text di kiri -->
            <div class="w-full max-w-full ml-0 md:ml-0 lg:ml-10 mt-4 sm:mt-6 md:mt-8 lg:mt-10 xl:-mt-12 ">
                <h1 class="mb-6 -ml-0.5 text-[24px] sm:text-[36px] md:text-[45px] lg:text-[50px] xl:text-[65px] 
                    leading-[40px] sm:leading-[50px] md:leading-[60px] lg:leading-[80px]
                    text-[#2F6E2D] font-bold tracking-tight break-words"
                    style="font-family:'Merienda', cursive;">
                    Dari Alam, Untuk <br> Rasa dan Sehatmu.
                </h1>

                <p class="text-[#676767] mb-8 font-semibold text-[14px] lg:text-[20px] sm:text-[18px] md:text-[18px]"
                    style="font-family:'Poppins',sans-serif;">

                    <!-- Mobile -->
                    <span class="block sm:hidden">
                        Lezatnya mie berpadu dengan <br> kebaikan herbal alami.
                        Pilihan tepat <br> untuk gaya hidup sehat tanpa <br> meninggalkan cita rasa.
                    </span>

                    <!-- Tablet -->
                    <span class="hidden sm:block lg:hidden">
                        Lezatnya mie berpadu dengan kebaikan herbal <br> alami seperti Kelor dan Temulawak.
                        Pilihan tepat <br> untuk gaya hidup sehat tanpa meninggalkan <br> cita rasa nusantara.
                    </span>

                    <!-- Desktop -->
                    <span class="hidden lg:block">
                        Lezatnya mie berpadu dengan kebaikan herbal alami seperti Kelor dan Temulawak.
                        Pilihan tepat untuk gaya hidup sehat tanpa meninggalkan cita rasa nusantara.
                    </span>
                </p>

                <button
                    class="bg-[#FF8102] text-[14px] md:text-[16px] lg:text-[18px] flex items-center gap-2
                hover:bg-orange-500 text-white font-semibold cursor-pointer 
                py-2 px-4 md:py-2 md:px-3 lg:py-2 lg:px-4 rounded-md shadow-md 
                transform hover:scale-105 transition duration-300 ease-in-out">
                    <img src="/assets/img/iwa.png" alt="Icon"
                        class="w-6 h-6 md:w-8 md:h-8 lg:w-8 lg:h-8 object-contain">
                    <span>Pesan Sekarang</span>
                </button>
            </div>

            <!-- Gambar kanan -->
            <div class="w-full max-w-full flex justify-center lg:justify-end">
                <img src="/assets/img/Group-14.png" alt="Mie Ketawa" draggable="false" oncontextmenu="return false"
                    class="select-none pointer-events-none
                    w-[50%] sm:w-[50%] md:w-[55%] lg:w-[110%] xl:w-[160%] translate-x-28 sm:translate-x-57 md:translate-x-50 lg:translate-x-1 xl:translate-x-0.5 object-contain
                   -mt-138 sm:-mt-138 md:-mt-122 lg:-mt-20 xl:-mt-20" />
            </div>
        </div>
</header>

<script>
    const searchInput = document.getElementById("searchInput");
    const searchBox = document.getElementById('searchBox');

    searchBox.style.transition = "all 0.35s ease";

    function isMobile() {
        return window.innerWidth <= 767;
    }

    // ---- Placeholder Responsive ----
    function handlePlaceholder() {
        if (window.innerWidth >= 1024) {
            searchInput.placeholder = "Informasi apa yang anda butuhkan?";
        } else if (window.innerWidth >= 768) {
            searchInput.placeholder = "Cari informasi...";
        } else {
            searchInput.placeholder = "Cari...";
        }
    }

    // ---- Animasi Search di Mobile ----
    searchInput.addEventListener('focus', () => {
        if (isMobile()) {
            searchBox.style.maxWidth = "100%";
            searchBox.style.zIndex = "9999";
            searchBox.style.boxShadow = "0px 8px 18px rgba(0,0,0,0.18)";
            searchBox.style.transform = "scale(1.02)";
        }
    });

    searchInput.addEventListener('blur', () => {
        if (isMobile() && searchInput.value.trim() === "") {
            searchBox.style.maxWidth = "200px";
            searchBox.style.zIndex = "1";
            searchBox.style.boxShadow = "none";
            searchBox.style.transform = "scale(1)";
        }
    });

    // Jalankan saat load dan resize
    handlePlaceholder();
    window.addEventListener("resize", handlePlaceholder);
</script>
