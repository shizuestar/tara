<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TARA - Gallery Showcase</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <script src="https://unpkg.com/cursor-effects@latest/dist/browser.js"></script>
    <script>
        new cursoreffects.fairyDustCursor({ colors: ["#5ec5ff", "#ffffff", "#ff57a3"] });
    </script>
    @stack('styles')
</head>

<body class="hero-bg min-h-screen">
    <x-main-navbar />
    {{ $slot }}
    <x-main-footer />
    @stack('scripts')
    <script>
        const burger = document.getElementById('burger-toggle');
        const navMenu = document.getElementById('nav-menu');

        burger.addEventListener('click', () => {
            navMenu.classList.toggle('hidden');
        });

        function toggleNotifications() {
            const modal = document.getElementById('notification-modal');
            const isOpen = modal.classList.contains('open');
            modal.classList.toggle('open');
            gsap.to(modal, {
                x: isOpen ? '100%' : '0%',
                duration: 0.3,
                ease: "power2.out"
            });
            if (!isOpen) {
                renderNotifications();
            }
        }

        const currentPath = window.location.pathname.split('/').pop() || 'index.blade.php';
        const isDetailPage = window.location.search.includes('id=');

        document.querySelectorAll('.nav-link').forEach(link => {
            const href = link.getAttribute('href').split('/').pop();

            const detailPages = ['blog.html', 'komunitas.html', 'galeri.html', 'agenda.html'];

            const isActive = 
                href === currentPath || 
                (detailPages.includes(href) && isDetailPage && currentPath === href);

            if (isActive) {
                link.classList.add('active');
            } else {
                link.classList.remove('active');
            }
        });

    </script>
</body>

</html>