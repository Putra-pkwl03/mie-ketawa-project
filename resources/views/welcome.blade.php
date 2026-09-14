<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mie Ketawa</title>

    <!-- Favicon / Logo Tab Browser -->
    <link rel="icon" type="image/png" href="{{ asset('assets/img/LOGO-MIE-KETAWA-TRANSPARANT.png') }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
      /* Scroll Halus */
      html {
        scroll-behavior: smooth;
      }

      /* Sembunyikan Kursor bawaan Browser */
      body, a, button, input {
        cursor: none !important;
      }

      /* Styling Custom Cursor */
      #cursor-big, #cursor-small {
        position: fixed;
        top: 0;
        left: 0;
        border-radius: 50%;
        pointer-events: none !important;
        z-index: 9999;
        transform: translate(-50%, -50%);
        transition: transform 0.15s ease-out, background 0.2s ease, width 0.2s ease, height 0.2s ease;
      }

      #cursor-big {
        width: 35px;
        height: 35px;
        background: rgba(78, 112, 78, 0.15);
        border: 1px solid rgba(47, 110, 45, 0.4);
      }

      #cursor-small {
        width: 8px;
        height: 8px;
        background: #2F6E2D;
      }

      .cursor-grow {
        transform: translate(-50%, -50%) scale(1.6) !important;
      }

      .cursor-hide-small {
        opacity: 0;
      }
    </style>
  </head>

  <body class="antialiased bg-white text-gray-800 overflow-x-hidden min-h-screen w-full">

    <!-- Memanggil Komponen -->
    <x-navbar />
    <x-header-section />
    <x-about />
    <x-features />
    <x-hero-section /> <!-- Atau file komponen tempat tombol WA berada -->
    <x-footer-section />

    <!-- Elemen Custom Cursor -->
    <div id="cursor-big"></div>
    <div id="cursor-small"></div>

    <!-- Script Custom Cursor (Berjalan untuk semua komponen di halaman ini) -->
    <script>
      document.addEventListener("DOMContentLoaded", () => {
        const big = document.getElementById("cursor-big");
        const small = document.getElementById("cursor-small");

        document.addEventListener("mousemove", (e) => {
          big.style.left = `${e.clientX}px`;
          big.style.top = `${e.clientY}px`;
          small.style.left = `${e.clientX}px`;
          small.style.top = `${e.clientY}px`;
        });

        // Deteksi hover ke semua tombol dan link
        const hoverTargets = document.querySelectorAll("a, button");

        hoverTargets.forEach((el) => {
          el.addEventListener("mouseenter", () => {
            big.classList.add("cursor-grow");
            small.classList.add("cursor-hide-small");

            const bg = window.getComputedStyle(el).backgroundColor;
            const color = window.getComputedStyle(el).color;
            const base = bg !== "rgba(0, 0, 0, 0)" ? bg : color;
            const finalColor = base.replace("rgb", "rgba").replace(")", ", 0.25)");

            big.style.background = finalColor;
          });

          el.addEventListener("mouseleave", () => {
            big.classList.remove("cursor-grow");
            small.classList.remove("cursor-hide-small");
            big.style.background = "rgba(78, 112, 78, 0.068)"; 
          });
        });
      });
    </script>
  </body>
</html>