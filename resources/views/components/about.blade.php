<section id="tentangKamiDesktop" class="hidden lg:block relative overflow-visible">
    <!-- Background -->
    <div class="absolute inset-0 bg-[#ff8c000c] -z-10"></div>
    <div class="max-w-8xl mx-auto grid grid-cols-1 lg:grid-cols-[60%_40%] items-start gap-12 px-6 lg:px-24 pt-14 pb-24">
        <!-- Kiri: Teks -->
        <div class="w-full relative">
            <h2 class="text-4xl font-bold text-[#2F6E2D] mb-12" style="font-family: 'Merienda', cursive;">
                Tentang Kami
            </h2>
            <p class="text-gray-700 text-lg leading-relaxed font-normal text-justify mb-2 mt-4"
                style="font-family: 'Poppins', sans-serif;">
                Mie Ketawa hadir sebagai inovasi mie sehat yang memadukan
                cita rasa klasik mie Indonesia dengan bahan alami berkhasiat dari alam.
                Kami percaya bahwa makanan bukan sekadar mengenyangkan,
                tetapi juga harus memberikan kebaikan bagi tubuh. Dengan bahan utama
                seperti daun kelor, temulawak, dan rempah pilihan, setiap gigitan Mie
                Ketawa menghadirkan keseimbangan antara rasa, aroma, dan manfaat kesehatan.
            </p>

            <!-- Gambar Tepung Diturunkan Lagi (Nilai -bottom- diperbesar) -->
            <img src="/assets/img/tml2.png" alt="Tepung"
                class="absolute -bottom-64 lg:-bottom-96 xl:-bottom-[300px] left-0 sm:left-0 md:left-0 lg:-left-24 xl:-left-24 w-[585px] h-[291px] z-0 pointer-events-none" />
        </div>

        <!-- Kanan: Gambar Mie + Dekorasi -->
        <div class="max-w-full relative flex justify-center">
            <img src="/assets/img/Group-20.png"
                class="w-[56%] sm:w-[40%] md:w-[60%] lg:w-[150%] z-10 mt-6 xl:translate-x-18 lg:translate-x-12" />
            <img src="/assets/img/kelor3.png" alt="miedekorasi"
                class="absolute -top-24 lg:-top-32 lg:-right-12 w-54 lg:w-54 z-0" />
        </div>
    </div>
</section>

<section id="tentangKami" class="block lg:hidden relative bg-[#ff8c000c] px-6 pt-12 pb-48 overflow-hidden">
    <div class="max-w-7xl mx-auto relative flex flex-col items-center">
        
        <!-- 1. Gambar Mie + Dekorasi Daun di Atas (Menggunakan w-fit agar daun selalu menempel) -->
        <div class="relative w-fit flex justify-center mb-6">
            <img src="/assets/img/Group-20.png" alt="Mie Ketawa" class="w-64 sm:w-80 relative z-10" />
            <!-- Daun Kelor (Menempel di kanan atas gambar mie) -->
            <img src="/assets/img/kelor3.png" alt="Daun" class="absolute -top-4 -right-4 sm:-right-6 w-20 sm:w-24 z-0" />
        </div>

        <!-- 2. Judul & Teks di Bawah -->
        <div class="w-full text-center relative z-10">
            <h2 class="text-3xl font-bold text-[#2F6E2D] mb-4" style="font-family: 'Merienda', cursive;">
                Tentang Kami
            </h2>
            <p class="text-gray-700 text-base leading-relaxed font-normal text-justify" style="font-family: 'Poppins', sans-serif;">
                Mie Ketawa hadir sebagai inovasi mie sehat yang memadukan cita rasa klasik mie Indonesia dengan bahan alami berkhasiat dari alam. Kami percaya bahwa makanan bukan sekadar mengenyangkan, tetapi juga harus memberikan kebaikan bagi tubuh. Dengan bahan utama seperti daun kelor, temulawak, dan rempah pilihan, setiap gigitan Mie Ketawa menghadirkan keseimbangan antara rasa, aroma, dan manfaat kesehatan.
            </p>
        </div>

        <!-- 3. Gambar Tepung -->
        <img src="/assets/img/tml2.png" alt="Tepung" class="absolute -bottom-40 left-1/2 -translate-x-1/2 w-80 opacity-80 z-0 pointer-events-none" />

    </div>
</section>

<style>
    /* shape-outside agar teks mengelilingi gambar */
    .shape-mie {
        float: right;
        shape-outside: circle(50% at 50% 50%);
        clip-path: circle(50% at 50% 50%);
        margin-left: 1rem;
        margin-bottom: 1rem;
    }
</style>
