<header id="home"
    class="w-full relative overflow-x-hidden bg-[#6b91421c] pb-8 md:pb-8 lg:pt-18 lg:pb-8 xl:pb-0 mb-0 border-b-1 border-gray-200">
    <div class="max-w-full mx-auto px-6 lg:px-0 relative z-20 ml-0 lg:ml-16">
        
        <!-- Konten utama -->
        <div class="flex flex-col lg:flex-row items-center justify-between gap-10 w-full pt-8 sm:pt-14 md:pt-20 lg:pt-0">
            <!-- Text di kiri -->
            <div class="w-full max-w-full ml-0 md:ml-0 lg:ml-10 mt-14 sm:mt-4 md:mt-6 lg:mt-10 xl:-mt-12 relative z-30">
                <h1 class="mb-6 -ml-0.5 text-[28px] sm:text-[36px] md:text-[45px] lg:text-[50px] xl:text-[65px] 
                    leading-[40px] sm:leading-[50px] md:leading-[60px] lg:leading-[80px]
                    text-[#2F6E2D] font-bold tracking-tight break-words"
                    style="font-family:'Merienda', cursive;">
                    Dari Alam, Untuk <br> Rasa dan Sehatmu.
                </h1>

                <p class="text-[#676767] mb-8 font-semibold text-[14px] lg:text-[20px] sm:text-[18px] md:text-[18px]"
                    style="font-family:'Poppins',sans-serif;">

                    <!-- Mobile -->
                    <span class="block sm:hidden">
                        Lezatnya mie berpadu dengan kebaikan herbal alami.
                        Pilihan tepat untuk gaya hidup sehat tanpa meninggalkan cita rasa.
                    </span>

                    <!-- Tablet -->
                    <span class="hidden sm:block lg:hidden">
                        Lezatnya mie berpadu dengan kebaikan herbal alami seperti Kelor dan Temulawak.
                        Pilihan tepat untuk gaya hidup sehat tanpa meninggalkan cita rasa nusantara.
                    </span>

                    <!-- Desktop -->
                    <span class="hidden lg:block">
                        Lezatnya mie berpadu dengan kebaikan herbal alami seperti Kelor dan Temulawak.
                        Pilihan tepat untuk gaya hidup sehat tanpa meninggalkan cita rasa nusantara.
                    </span>
                </p>

                <!-- Tombol WA (Diubah ke tag <a> + z-50 & fallback window.open) -->
                <a href="https://api.whatsapp.com/send?phone=6285178165746&text=Halo%20Admin%20Mie%20Ketawa,%20saya%20mau%20pesan%20mie%20sehatnya.%0A%0A*Format%20Pemesanan*%0A-%20Nama:%20%0A-%20Jumlah%20Pesanan:%20%0A-%20Varian:%20%0A-%20Alamat%20Pengiriman:%20" 
                    target="_blank"
                    rel="noopener noreferrer"
                    onclick="window.open(this.href, '_blank'); return false;"
                    class="inline-flex items-center gap-2 bg-[#FF8102] text-[14px] md:text-[16px] lg:text-[18px]
                    hover:bg-orange-500 text-white font-semibold cursor-pointer 
                    py-2.5 px-5 md:py-3 md:px-6 lg:py-2 lg:px-4 rounded-md shadow-md 
                    transform hover:scale-105 transition duration-300 ease-in-out
                    relative z-50 pointer-events-auto">
                    <img src="/assets/img/iwa.png" alt="Icon"
                        class="w-5 h-5 md:w-6 md:h-6 lg:w-8 lg:h-8 object-contain pointer-events-none">
                    <span>Pesan Sekarang</span>
                </a>
            </div>

            <!-- Gambar kanan -->
            <div class="hidden lg:flex w-full max-w-full justify-end relative z-10 pointer-events-none">
                <img src="/assets/img/Group-14.png" alt="Mie Ketawa" draggable="false" oncontextmenu="return false"
                    class="select-none pointer-events-none
                    w-[110%] xl:w-[160%] translate-x-1 xl:translate-x-0.5 object-contain
                    -mt-20 xl:mt-20" />
            </div>
        </div>
    </div>
</header>