<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? 'Mie Ketawa' }}</title>

    <!-- Favicon / Logo Tab Browser -->
    <link rel="icon" type="image/png" href="{{ asset('assets/img/LOGO-MIE-KETAWA-TRANSPARANT.png') }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body class="antialiased bg-slate-50 text-gray-800 overflow-x-hidden min-h-screen w-full flex flex-col justify-between">

    <!-- Navbar -->
    <x-navbar />

    <!-- Main Content Dynamic Slot -->
    <main class="flex-grow pt-24 pb-16">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <x-footer-section />

    <!-- Custom Cursor -->
    <div id="cursor-big"></div>
    <div id="cursor-small"></div>

    <script>
        const big = document.getElementById("cursor-big");
        const small = document.getElementById("cursor-small");

        document.addEventListener("mousemove", (e) => {
            if(big && small) {
                big.style.left = `${e.clientX}px`;
                big.style.top = `${e.clientY}px`;
                small.style.left = `${e.clientX}px`;
                small.style.top = `${e.clientY}px`;
            }
        });

        const hoverTargets = document.querySelectorAll("a, button");
        hoverTargets.forEach((el) => {
            el.addEventListener("mouseenter", () => {
                big?.classList.add("cursor-grow");
                small?.classList.add("cursor-hide-small");

                const bg = window.getComputedStyle(el).backgroundColor;
                const color = window.getComputedStyle(el).color;
                const base = bg !== "rgba(0, 0, 0, 0)" ? bg : color;
                const finalColor = base.replace("rgb", "rgba").replace(")", ", 0.25)");

                if(big) big.style.background = finalColor;
            });

            el.addEventListener("mouseleave", () => {
                big?.classList.remove("cursor-grow");
                small?.classList.remove("cursor-hide-small");
                if(big) big.style.background = "rgba(78, 112, 78, 0.068)"; 
            });
        });
    </script>
</body>
</html>