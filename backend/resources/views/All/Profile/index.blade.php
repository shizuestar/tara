```html
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TARA - Profil Saya</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        "primary-black": "#000000",
                        "primary-white": "#ffffff",
                        "yellow-400": "#facc15",
                        "accent-gray": "#4a4a4a",
                        "subtle-gray": "#d1d5db",
                    },
                    keyframes: {
                        fadeIn: {
                            "0%": { opacity: "0", transform: "translateY(10px)" },
                            "100%": { opacity: "1", transform: "translateY(0)" },
                        },
                        float: {
                            "0%, 100%": { transform: "translateY(0px) rotate(0deg)" },
                            "50%": { transform: "translateY(-20px) rotate(3deg)" },
                        },
                        pulse: {
                            "0%, 100%": { transform: "scale(1)" },
                            "50%": { transform: "scale(1.03)" },
                        },
                        gradientShift: {
                            "0%, 100%": { backgroundPosition: "0% 50%" },
                            "50%": { backgroundPosition: "100% 50%" },
                        },
                        sway: {
                            "0%, 100%": { transform: "rotate(var(--rotate-angle)) translateY(0)" },
                            "50%": { transform: "rotate(calc(var(--rotate-angle) + 1deg)) translateY(2px)" },
                        },
                        ropeSway: {
                            "0%, 100%": { transform: "rotate(var(--rope-angle))" },
                            "50%": { transform: "rotate(calc(var(--rope-angle) + 1deg))" },
                        },
                        appear: { to: { opacity: "1", transform: "translateY(0)" } },
                        drift: {
                            "0%": { transform: "translate(0, 0)", opacity: "0.4" },
                            "50%": { opacity: "0.7" },
                            "100%": { transform: "translate(120vw, 100vh)", opacity: "0" },
                        },
                        slideIn: {
                            "0%": { opacity: "0", transform: "translateX(-10px)" },
                            "100%": { opacity: "1", transform: "translateX(0)" },
                        },
                    },
                    animation: {
                        fadeIn: "fadeIn 0.6s ease-out forwards",
                        float: "float 8s ease-in-out infinite",
                        pulse: "pulse 2s ease-in-out infinite",
                        gradientShift: "gradientShift 4s ease-in-out infinite",
                        sway: "sway var(--sway-duration) ease-in-out infinite",
                        ropeSway: "ropeSway var(--sway-duration) ease-in-out infinite",
                        appear: "appear 1s ease forwards",
                        slideIn: "slideIn 0.6s ease-out forwards",
                    },
                },
            },
        };
    </script>
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.12.2/lottie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <style>
        :root {
            --primary-black: #000000;
            --primary-white: #ffffff;
            --yellow-400: #facc15;
            --accent-gray: #4a4a4a;
            --subtle-gray: #d1d5db;
        }

        @font-face {
            font-family: "Space Grotesk", sans-serif;
            src: url("./assets/fonts/VantageRegular-L3xY5.ttf") format("truetype");
        }

        * {
            font-family: "Space Grotesk", sans-serif;
        }

        .font-vantage {
            font-family: "Vantage", sans-serif;
            letter-spacing: 0.05em;
        }

        html,
        body {
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        body {
            background: var(--primary-white);
            color: var(--primary-black);
        }

        main {
            min-height: calc(100vh - 80px - 160px);
        }

        .gradient-bg {
            position: fixed;
            inset: 0;
            background: linear-gradient(to bottom right, #eff6ff, #ede9fe);
            z-index: -2;
            opacity: 0.3;
        }

        #particles-js {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            pointer-events: none;
        }

        .hero-bg {
            background: radial-gradient(circle at 20% 50%, rgba(0, 0, 0, 0.05) 0%, transparent 50%),
                        radial-gradient(circle at 80% 20%, rgba(0, 0, 0, 0.05) 0%, transparent 50%),
                        radial-gradient(circle at 40% 80%, rgba(0, 0, 0, 0.05) 0%, transparent 50%),
                        linear-gradient(135deg, #ffffff 0%, #f8f8f8 100%);
        }

        .glass-effect {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(0, 0, 0, 0.1);
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
        }

        .text-gradient {
            background: linear-gradient(135deg, var(--primary-black) 0%, #4a4a4a 50%, var(--primary-black) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            background-size: 200% 200%;
            animation: gradientShift 4s ease-in-out infinite;
        }

        .button-primary {
            background: linear-gradient(135deg, var(--primary-black) 0%, #2a2a2a 100%);
            color: var(--primary-white);
            padding: 0.3rem 1.25rem;
            border-radius: 999px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
            font-size: 0.9rem;
        }

        .button-primary::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s;
        }

        .button-primary:hover::before {
            left: 100%;
        }

        .button-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 16px 32px rgba(0, 0, 0, 0.4);
            background: #2a2a2a;
        }

        .button-secondary {
            background: linear-gradient(135deg, #ffffff 0%, #f5f5f5 100%);
            border: 2px solid var(--primary-black);
            padding: 0.5rem 1.25rem;
            border-radius: 999px;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
            font-size: 0.9rem;
        }

        .button-secondary::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--primary-black);
            transition: left 0.4s;
            z-index: 1;
        }

        .button-secondary:hover::before {
            left: 0;
        }

        .button-secondary span {
            position: relative;
            z-index: 2;
            transition: color 0.4s;
        }

        .button-secondary:hover span {
            color: var(--primary-white);
        }

        .button-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
        }

        .tab-link {
            position: relative;
            padding-bottom: 0.5rem;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }

        .tab-link.active {
            color: var(--primary-black);
            font-weight: 700;
        }

        .tab-link::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary-black);
            transition: width 0.3s ease;
        }

        .tab-link.active::after,
        .tab-link:hover::after {
            width: 100%;
        }

        .card {
            transition: all 0.4s ease;
            border-radius: 10px;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        }

        .portfolio-card img {
            transition: transform 0.5s ease, filter 0.5s ease;
        }

        .portfolio-card:hover img {
            transform: scale(1.03);
            filter: grayscale(0);
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            transition: all 0.5s ease;
            transform: rotate(var(--rotate-angle)) translateY(0);
            animation: sway var(--sway-duration) ease-in-out infinite;
            perspective: 800px;
        }

        .gallery-item::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s;
            z-index: 10;
        }

        .gallery-item:hover::before {
            left: 100%;
        }

        .gallery-item:hover {
            transform: translateY(-8px) scale(1.02) rotate(0deg);
            box-shadow: 0 16px 32px rgba(0, 0, 0, 0.3);
        }

        .gallery-item.active {
            transform: scale(1.03) rotate(0deg);
            z-index: 20;
            box-shadow: 0 24px 48px rgba(0, 0, 0, 0.4);
        }

        .rope {
            position: absolute;
            top: -15px;
            left: 50%;
            width: 2px;
            height: 15px;
            background: #4a4a4a;
            transform-origin: top;
            transform: rotate(var(--rope-angle));
            z-index: 5;
            animation: ropeSway var(--sway-duration) ease-in-out infinite;
        }

        .image-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(45deg, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0.3) 100%);
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .gallery-item:hover .image-overlay {
            opacity: 1;
        }

        .flip-card {
            position: relative;
            width: 100%;
            height: 100%;
            transform-style: preserve-3d;
            transition: transform 0.5s ease;
        }

        .gallery-item.flipped .flip-card {
            transform: rotateY(180deg) scale(1.02);
        }

        .flip-card-front,
        .flip-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            border-radius: 10px;
        }

        .flip-card-back {
            transform: rotateY(180deg);
            background: linear-gradient(135deg, #1a1a1a, #4a4a4a);
            padding: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .flip-card-back p {
            text-align: center;
            margin-bottom: 0.5rem;
            color: #ffffff;
            font-weight: 500;
            font-size: 0.85rem;
        }

        .flip-card-back a {
            color: #2563eb;
            font-weight: 600;
            text-decoration: none;
            font-size: 0.85rem;
        }

        .progress-bar {
            height: 3px;
            background: var(--subtle-gray);
            border-radius: 2px;
            overflow: hidden;
        }

        .progress-bar-fill {
            height: 100%;
            background: var(--primary-black);
            transition: width 0.3s ease;
        }

        .filter-button {
            padding: 0.4rem 0.8rem;
            border: 1px solid var(--subtle-gray);
            border-radius: 999px;
            background: var(--primary-white);
            transition: all 0.3s ease;
            font-size: 0.85rem;
        }

        .filter-button.active,
        .filter-button:hover {
            background: var(--primary-black);
            color: var(--primary-white);
            border-color: var(--primary-black);
        }

        .category-card {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 1px solid rgba(0, 0, 0, 0.1);
        }

        .category-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 16px 32px rgba(0, 0, 0, 0.15);
            border-color: var(--primary-black);
        }

        .badge-card {
            position: relative;
            background: var(--primary-black);
            border: 1px solid #333333;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            cursor: pointer;
            overflow: hidden;
            height: 180px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 12px;
        }

        .badge-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3), 0 0 6px rgba(255, 255, 255, 0.2);
        }

        .badge-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s;
            z-index: 10;
        }

        .badge-card:hover::before {
            left: 100%;
        }

        .badge-card.locked {
            background: #1a1a1a;
            border: 1px dashed #333333;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .badge-card.locked:hover {
            transform: translateY(-4px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        .badge-icon {
            position: relative;
            animation: pulse 2s ease-in-out infinite;
        }

        .badge-lottie {
            filter: grayscale(100%) brightness(1.2);
        }

        .badge-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.9);
            opacity: 0;
            transition: opacity 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 12px;
            border-radius: 10px;
        }

        .badge-card:hover .badge-overlay {
            opacity: 1;
        }

        .badge-animate {
            transition: all 0.5s ease;
        }

        .badge-animate.appear {
            opacity: 1;
            transform: translateY(0);
        }

        .badge-new {
            background: #1a1a1a;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
            border: 1px solid #444444;
        }

        .particle {
            position: absolute;
            background: rgba(255, 215, 0, 0.4);
            border-radius: 50%;
            animation: drift 12s linear infinite;
        }

        .particle-1 { width: 20px; height: 20px; top: 5%; left: 10%; }
        .particle-2 { width: 12px; height: 12px; top: 60%; left: 70%; animation-delay: 4s; }
        .particle-3 { width: 15px; height: 15px; top: 30%; left: 40%; animation-delay: 8s; }
        .particle-4 { width: 14px; height: 14px; top: 80%; left: 20%; animation-delay: 2s; }

        .notification-bar {
            background: #f3f4f6;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .notification-bar:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .notification-icon {
            transition: transform 0.3s ease, color 0.3s ease;
            position: relative;
        }

        .notification-icon:hover {
            transform: scale(1.2);
            color: #111827;
        }

        .notification-modal {
            position: fixed;
            top: 0;
            right: 0;
            height: 100%;
            width: 100%;
            max-width: 400px;
            background: #ffffff;
            border-left: 1px solid #e5e7eb;
            z-index: 50;
            transform: translateX(100%);
            transition: transform 0.3s ease;
        }

        .notification-modal.open {
            transform: translateX(0);
        }

        .notification-modal .close-btn {
            position: absolute;
            top: 1rem;
            right: 1rem;
            font-size: 1.5rem;
            color: #374151;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .notification-modal .close-btn:hover {
            transform: scale(1.2);
        }

        .notification-card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        .notification-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .notification-card.unread {
            background: #f3f4f6;
        }

        .notification-card p {
            font-size: 0.9rem;
            color: #4b5563;
        }

        .notification-card .time {
            font-size: 0.75rem;
            color: #6b7280;
        }

        .notification-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background: #111827;
            color: #ffffff;
            font-size: 0.75rem;
            font-weight: 500;
            border-radius: 9999px;
            padding: 0.1rem 0.5rem;
        }

        .sidebar-notification-container {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 0;
        }

        .empty-state {
            text-align: center;
            padding: 2rem;
            color: var(--accent-gray);
        }

        .empty-state i {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: var(--subtle-gray);
        }

        .empty-state p {
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        @media (max-width: 768px) {
            .portfolio-grid,
            .gallery-grid {
                grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
                gap: 10px;
            }

            .tab-link {
                font-size: 0.85rem;
            }

            .card:hover,
            .gallery-item:hover,
            .category-card:hover,
            .badge-card:hover,
            .badge-card.locked:hover {
                transform: translateY(0);
            }

            .portfolio-card img {
                transform: scale(1);
                filter: grayscale(0);
            }

            .gallery-item:hover .image-overlay,
            .badge-card:hover .badge-overlay {
                opacity: 0;
            }

            .gallery-item.active .image-overlay,
            .badge-card.active .badge-overlay {
                opacity: 1;
            }

            .badge-card {
                height: 160px;
                padding: 10px;
            }

            .badge-icon {
                transform: scale(0.7);
            }

            .flip-card-back p,
            .flip-card-back a {
                font-size: 0.8rem;
            }
        }
    </style>
</head>

<body class="relative font-vantage">
    <div class="gradient-bg"></div>
    <div id="particles-js"></div>

    <!-- Notification Modal -->
    <div id="notification-modal" class="notification-modal">
        <i class="fas fa-times close-btn" onclick="toggleNotifications()"></i>
        <div class="p-6">
            <h2 class="text-2xl font-bold text-black mb-4" style="font-family: 'Space Grotesk', sans-serif;">Notifikasi</h2>
            <div class="flex gap-2 mb-4">
                <button class="filter-button active" data-filter="all">Semua</button>
                <button class="filter-button" data-filter="unread">Belum Dibaca</button>
            </div>
            <button id="mark-all-read" class="px-4 py-2 bg-black text-white text-sm rounded-full hover:bg-gray-800 transition mb-4">
                Tandai Semua Dibaca
            </button>
            <div id="notification-list" class="space-y-4">
                @if(Auth::user()->notifications->isEmpty())
                    <div class="empty-state">
                        <i class="fas fa-bell-slash"></i>
                        <p>Belum ada notifikasi untuk Anda.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Header -->
    <header class="py-6 px-8 flex justify-between items-center bg-white shadow-sm border-b border-gray-200 z-40 fixed top-0 left-0 w-full">
        <nav class="fixed top-0 left-0 right-0 z-50 glass-effect bg-white/80 backdrop-blur-md shadow-sm">
            <div class="max-w-7xl mx-auto px-6 py-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <a href="{{ route('home') }}" class="text-3xl font-bold text-gray-900">TARA</a>
                        <div class="relative">
                            <span class="text-yellow-400 text-2xl">●</span>
                            <span class="absolute top-0 left-0 text-yellow-400 text-2xl animate-ping">●</span>
                        </div>
                    </div>
                    <button id="burger-toggle" class="md:hidden focus:outline-none z-[60] relative">
                        <svg class="w-7 h-7 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    <div id="nav-menu" class="hidden md:flex md:flex-row flex-col md:items-center md:gap-8 absolute md:static top-full left-0 w-full md:w-auto bg-white md:bg-transparent shadow-md md:shadow-none px-6 py-6 md:p-0 z-50 transition-all duration-300">
                        <a href="{{ route('home') }}" class="nav-link block text-gray-700 hover:text-black font-bold py-2">Beranda</a>
                        <a href="{{ route('gallery.index') }}" class="nav-link block text-gray-700 hover:text-black font-bold py-2">Galeri</a>
                        <a href="{{ route('communities.index') }}" class="nav-link block text-gray-700 hover:text-black font-bold py-2">Komunitas</a>
                        <a href="{{ route('projects.index') }}" class="nav-link block text-gray-700 hover:text-black font-bold py-2">Proyek</a>
                        <a href="{{ route('blogs.index') }}" class="nav-link block text-gray-700 hover:text-black font-bold py-2">Blog</a>
                        <a href="{{ route('agenda.index') }}" class="nav-link block text-gray-700 hover:text-black font-bold py-2">Agenda</a>
                        <div class="relative w-fit">
                            <i class="fas fa-bell text-gray-500 cursor-pointer text-xl" onclick="toggleNotifications()"></i>
                            <span class="notification-badge" id="unread-count">{{ Auth::user()->unreadNotifications()->count() }}</span>
                        </div>
                        <div class="relative w-fit">
                            <a href="{{ route('bookmarks.index') }}" class="hover:text-black text-gray-500 text-xl">
                                <i class="fas fa-bookmark"></i>
                            </a>
                        </div>
                        <div class="hidden md:block">
                            <a href="# #" class="flex items-center gap-2 focus:outline-none">
                                <img src="{{ Auth::user()->avatar ?? 'https://i.pravatar.cc/300?u=' . Auth::user()->username }}" alt="Profile" class="w-8 h-8 rounded-full object-cover border border-gray-300">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main class="mt-16 max-w-5xl mx-auto px-4">
        <!-- Hero Section -->
        <section class="py-16 flex flex-col md:flex-row items-center gap-8 hero-bg backdrop-blur-sm">
            <div class="relative w-32 h-32 md:w-48 md:h-48 rounded-full overflow-hidden border-4 border-primary-white shadow-lg animate-float">
                <img src="{{ Auth::user()->avatar ?? 'https://i.pravatar.cc/300?u=' . Auth::user()->username }}" alt="Profile picture" class="w-full h-full object-cover" />
            </div>
            <div class="flex-1 text-center md:text-left">
                <h1 class="text-2xl md:text-3xl font-bold text-primary-black animate-fadeIn">
                    {{ Auth::user()->name }}
                </h1>
                <p class="text-sm text-accent-gray mt-1 animate-fadeIn">@{{ Auth::user()->username }}</p>
                <p class="text-sm text-accent-gray mt-2 max-w-sm animate-fadeIn">
                    {{ Auth::user()->bio ?? 'Tulis sesuatu tentang diri Anda untuk menginspirasi orang lain.' }}
                </p>
                <div class="flex gap-2 mt-2 flex-wrap justify-center md:justify-start">
                    @if(Auth::user()->roles && Auth::user()->roles->isNotEmpty())
                        @foreach(Auth::user()->roles as $role)
                            <span class="text-xs bg-subtle-gray text-accent-gray px-2 py-1 rounded-full">{{ $role->name }}</span>
                        @endforeach
                    @else
                        <span class="text-xs bg-subtle-gray text-accent-gray px-2 py-1 rounded-full">Kontributor</span>
                    @endif
                </div>
                <div class="flex gap-3 mt-3 flex-wrap justify-center md:justify-start text-lg">
                    <a href="{{ route('settings') }}" class="button-primary">Pengaturan</a>
                    @if(Auth::user()->linkedin)
                        <a href="{{ Auth::user()->linkedin }}" class="text-accent-gray hover:text-primary-black"><i class="fab fa-linkedin"></i></a>
                    @endif
                    @if(Auth::user()->twitter)
                        <a href="{{ Auth::user()->twitter }}" class="text-accent-gray hover:text-primary-black"><i class="fab fa-twitter"></i></a>
                    @endif
                    @if(Auth::user()->instagram)
                        <a href="{{ Auth::user()->instagram }}" class="text-accent-gray hover:text-primary-black"><i class="fab fa-instagram"></i></a>
                    @endif
                    @if(Auth::user()->dribbble)
                        <a href="{{ Auth::user()->dribbble }}" class="text-accent-gray hover:text-primary-black"><i class="fab fa-dribbble"></i></a>
                    @endif
                    @if(Auth::user()->behance)
                        <a href="{{ Auth::user()->behance }}" class="text-accent-gray hover:text-primary-black"><i class="fab fa-behance"></i></a>
                    @endif
                </div>
            </div>
        </section>

        <!-- Navigation Tabs -->
        <nav class="flex gap-4 border-b border-subtle-gray mt-4 mb-6 overflow-x-auto">
            <button class="tab-link active" data-tab="overview">Ikhtisar</button>
            <button class="tab-link" data-tab="portfolio">Portofolio</button>
            <button class="tab-link" data-tab="projects">Proyek</button>
            <button class="tab-link" data-tab="activity">Aktivitas</button>
            <button class="tab-link" data-tab="community">Komunitas</button>
        </nav>

        <!-- Tab Content -->
        <div id="tab-content">
            <!-- Overview Tab -->
            <section id="overview" class="tab-section py-16 pt-6 bg-white/60 backdrop-blur-sm">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="card glass-effect p-6 animate-slideIn">
                        <h3 class="text-base font-semibold text-primary-black mb-3">Statistik Aktivitas</h3>
                        <div class="relative w-full" style="height: 350px">
                            <canvas id="userActivityChart"></canvas>
                        </div>
                    </div>
                    <div class="card glass-effect p-6 animate-slideIn">
                        <h3 class="text-base font-semibold text-primary-black mb-3 text-center">Lencana Saya</h3>
                        <div class="grid grid-cols-2 sm:grid-cols-2 gap-4">
                            @if($badges->isEmpty())
                                <div class="empty-state col-span-2">
                                    <i class="fas fa-medal"></i>
                                    <p>Belum ada lencana yang didapatkan.</p>
                                    <a href="{{ route('badges.index') }}" class="button-primary px-4 py-1.5 text-white rounded-full font-semibold text-sm">Jelajahi Lencana</a>
                                </div>
                            @else
                                @foreach($badges as $badge)
                                    <div class="badge-card badge-animate opacity-0 {{ $badge['locked'] ? 'locked' : '' }}"
                                        role="button" tabindex="0" aria-label="{{ $badge['name'] }} badge">
                                        <div class="relative badge-icon">
                                            @if($badge['lottie'])
                                                <div id="{{ str_replace(' ', '', $badge['name']) }}Lottie" class="w-24 h-24 badge-lottie"></div>
                                            @else
                                                <svg class="w-24 h-24 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 8v4m0 4h.01M12 2a5 5 0 00-5 5v3a2 2 0 00-2 2v7a2 2 0 002 2h10a2 2 0 002-2v-7a2 2 0 00-2-2V7a5 5 0 00-5-5z" />
                                                </svg>
                                            @endif
                                            @if($badge['is_new'])
                                                <span class="absolute -top-1 -right-1 text-xs badge-new text-white px-1.5 py-0.5 rounded-full animate-pulse">BARU</span>
                                            @endif
                                        </div>
                                        <h4 class="mt-2 text-base font-bold {{ $badge['locked'] ? 'text-gray-400' : 'text-gray-200' }}">
                                            {{ $badge['name'] }}
                                        </h4>
                                        <span class="text-xs {{ $badge['locked'] ? 'text-gray-500' : 'text-gray-400' }} font-light">
                                            {{ \Illuminate\Support\Str::limit($badge['description'], 30) }}
                                        </span>
                                        <div class="badge-overlay">
                                            <p class="text-white font-medium text-xs">{{ $badge['description'] }}</p>
                                            <a href="{{ route('badges.show', str_replace(' ', '-', strtolower($badge['name']))) }}"
                                                class="button-primary px-3 py-1 text-white rounded-full font-semibold text-xs mt-1">Lihat Detail</a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="text-center mt-6">
                            <a href="{{ route('badges.index') }}"
                                class="button-primary px-4 py-1.5 text-white rounded-full font-semibold uppercase text-sm">Lihat Semua Lencana</a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Portfolio Tab -->
            <section id="portfolio" class="tab-section hidden py-16 pt-6 bg-gradient-to-br from-gray-50 to-gray-100 relative overflow-hidden">
                <div class="absolute inset-0 pointer-events-none">
                    <div class="particle particle-1"></div>
                    <div class="particle particle-2"></div>
                    <div class="particle particle-3"></div>
                    <div class="particle particle-4"></div>
                </div>
                <div class="max-w-5xl mx-auto relative z-10">
                    <div class="mb-6 text-center">
                        <h2 class="text-2xl font-bold text-primary-black animate-fadeIn">Portofolio Saya</h2>
                        <p class="text-sm text-accent-gray mt-1 animate-fadeIn">Karya terbaru yang telah Anda buat</p>
                    </div>
                    <div class="flex flex-wrap gap-3 mb-4 justify-center">
                        <button class="filter-button active" data-filter="all">Semua</button>
                        @foreach(['puisi', 'desain', 'musik'] as $category)
                            <button class="filter-button" data-filter="{{ $category }}">{{ ucfirst($category) }}</button>
                        @endforeach
                        <select class="filter-button" data-filter="year">
                            <option value="all">Semua Tahun</option>
                            @for($year = now()->year; $year >= now()->year - 2; $year--)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="gallery-grid grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                        @if($artworks->isEmpty())
                            <div class="empty-state col-span-full">
                                <i class="fas fa-paint-brush"></i>
                                <p>Belum ada karya di portofolio Anda.</p>
                                <a href="{{ route('artworks.create') }}" class="button-primary px-4 py-1.5 text-white rounded-full font-semibold text-sm">Tambah Karya</a>
                            </div>
                        @else
                            @foreach($artworks as $artwork)
                                <div class="gallery-item portfolio-card" data-category="{{ $artwork->category }}"
                                    data-year="{{ $artwork->created_at->year }}"
                                    style="--rotate-angle: {{ rand(-1, 1) }}deg; --rope-angle: {{ rand(-1, 1) }}deg; --sway-duration: 5s;">
                                    <div class="rope"></div>
                                    <div class="flip-card">
                                        <div class="flip-card-front relative overflow-hidden bg-gray-900 aspect-[4/5] border-2 border-subtle-gray rounded-2xl">
                                            <img src="{{ $artwork->image_url ?? 'https://picsum.photos/300/400?random=' . rand(1,100) }}"
                                                alt="{{ $artwork->title }}"
                                                class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-700" />
                                            <div class="image-overlay"></div>
                                            <div class="absolute bottom-4 left-4 text-white z-20">
                                                <div class="text-base font-bold uppercase tracking-wide">{{ $artwork->title }}</div>
                                                <div class="text-xs opacity-80">{{ ucfirst($artwork->category) }} - {{ $artwork->created_at->year }}</div>
                                            </div>
                                        </div>
                                        <div class="flip-card-back">
                                            <p class="text-white font-medium text-xs">
                                                {{ $artwork->description ?? 'Deskripsi karya tidak tersedia.' }}
                                            </p>
                                            <a href="{{ route('artworks.show', $artwork->id) }}"
                                                class="text-blue-600 font-semibold hover:underline mt-2">Lihat Detail</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="text-center mt-6">
                        <a href="{{ route('artworks.index') }}"
                            class="button-primary px-6 py-2 text-white rounded-full font-bold text-base uppercase tracking-wide">Lihat Semua Karya</a>
                    </div>
                </div>
            </section>

            <!-- Projects Tab -->
            <section id="projects" class="tab-section hidden py-16 pt-6 bg-white/60 backdrop-blur-sm">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @if($projects->isEmpty())
                        <div class="empty-state col-span-full">
                            <i class="fas fa-project-diagram"></i>
                            <p>Belum ada proyek yang Anda ikuti.</p>
                            <a href="{{ route('projects.index') }}" class="button-primary px-4 py-1.5 text-white rounded-full font-semibold text-sm">Jelajahi Proyek</a>
                        </div>
                    @else
                        @foreach($projects as $project)
                            <div class="card glass-effect p-6">
                                <h3 class="text-base font-semibold text-primary-black">{{ $project->name }}</h3>
                                <p class="text-xs text-accent-gray mt-1">Posisi: {{ ucfirst($project->pivot->role) }}</p>
                                <p class="text-xs text-accent-gray">Status: {{ ucfirst($project->status ?? 'Berjalan') }}</p>
                                <div class="progress-bar mt-2">
                                    <div class="progress-bar-fill" style="width: {{ $project->progress ?? 50 }}%"></div>
                                </div>
                                <a href="{{ route('projects.show', $project->id) }}"
                                    class="text-blue-600 hover:underline mt-2 block text-xs">Lihat Proyek</a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </section>

            <!-- Activity Tab -->
            <section id="activity" class="tab-section hidden py-16 pt-6 bg-white/60 backdrop-blur-sm">
                <div class="space-y-4">
                    @if($activities->isEmpty())
                        <div class="empty-state">
                            <i class="fas fa-history"></i>
                            <p>Belum ada aktivitas yang tercatat.</p>
                            <a href="{{ route('home') }}" class="button-primary px-4 py-1.5 text-white rounded-full font-semibold text-sm">Mulai Beraktivitas</a>
                        </div>
                    @else
                        @foreach($activities as $activity)
                            <div class="card glass-effect p-6">
                                <p class="text-xs text-accent-gray">
                                    <span class="font-semibold text-primary-black">{{ ucfirst($activity['type']) }}:</span>
                                    {{ $activity['description'] }} - {{ $activity['created_at'] }}
                                </p>
                                <a href="{{ $activity['link'] }}"
                                    class="text-blue-600 hover:underline mt-2 block text-xs">
                                    @if($activity['type'] == 'blog')
                                        Baca Artikel
                                    @elseif($activity['type'] == 'task')
                                        Lihat Status
                                    @else
                                        Lihat Detail
                                    @endif
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </section>

            <!-- Community Tab -->
            <section id="community" class="tab-section hidden py-16 pt-6 bg-white/60 backdrop-blur-sm">
                <div class="max-w-5xl mx-auto">
                    <div class="mb-6 text-center">
                        <h2 class="text-2xl font-bold text-primary-black animate-fadeIn">Komunitas Saya</h2>
                        <p class="text-sm text-accent-gray mt-1 animate-fadeIn">Grup dan forum yang Anda ikuti 🌱</p>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @if($communities->isEmpty())
                            <div class="empty-state col-span-full">
                                <i class="fas fa-users"></i>
                                <p>Belum ada komunitas yang Anda ikuti.</p>
                                <a href="{{ route('communities.index') }}" class="button-primary px-4 py-1.5 text-white rounded-full font-semibold text-sm">Jelajahi Komunitas</a>
                            </div>
                        @else
                            @foreach($communities as $community)
                                <div class="category-card glass-effect p-6 rounded-xl hover:shadow-lg transition">
                                    <h3 class="text-base font-semibold text-primary-black">{{ $community->name }}</h3>
                                    <p class="text-xs text-accent-gray mt-1">
                                        {{ $community->description ?? 'Deskripsi komunitas tidak tersedia.' }}
                                    </p>
                                    <div class="flex items-center mt-3">
                                        <img class="w-6 h-6 rounded-full mr-2" src="https://i.pravatar.cc/32?img={{ rand(1,70) }}"
                                            alt="{{ $community->name }} member 1" />
                                        <img class="w-6 h-6 rounded-full mr-2" src="https://i.pravatar.cc/32?img={{ rand(1,70) }}"
                                            alt="{{ $community->name }} member 2" />
                                        <span class="text-xs text-accent-gray">+{{ $community->members_count ?? rand(500,1500) }} anggota</span>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </section>
        </div>
    </main>

    <footer class="bg-white border-t border-neutral-200 text-sm text-neutral-700">
        <div class="max-w-7xl mx-auto px-6 py-16 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-10">
            <div class="col-span-2">
                <div class="text-2xl font-bold tracking-normal uppercase" style="font-family: 'Space Grotesk', sans-serif">
                    TARA<span class="text-yellow-400">●</span>
                </div>
                <p class="text-neutral-500 mb-4">
                    Rumah bagi karya visual menawan, inovasi muda, dan estetika web masa depan. Temukan inspirasi. Bangun impresi.
                </p>
                <div class="flex gap-4 mt-3 text-neutral-600 text-xl">
                    <a href="https://instagram.com" class="hover:text-black transition" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="https://twitter.com" class="hover:text-black transition" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="https://linkedin.com" class="hover:text-black transition" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
                    <a href="https://dribbble.com" class="hover:text-black transition" aria-label="Dribbble"><i class="fab fa-dribbble"></i></a>
                    <a href="https://behance.net" class="hover:text-black transition" aria-label="Behance"><i class="fab fa-behance"></i></a>
                </div>
            </div>
            <div>
                <h3 class="font-semibold text-black mb-4">Navigasi</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="hover:text-black transition">Beranda</a></li>
                    <li><a href="{{ route('gallery.index') }}" class="hover:text-black transition">Galeri</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-black transition">Tentang</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-black transition">Kontak</a></li>
                    <li><a href="{{ route('faq') }}" class="hover:text-black transition">FAQ</a></li>
                </ul>
            </div>
            <div>
                <h3 class="font-semibold text-black mb-4">Eksplorasi</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('categories.uiux') }}" class="hover:text-black transition">UI/UX</a></li>
                    <li><a href="{{ route('categories.gsap') }}" class="hover:text-black transition">GSAP Effects</a></li>
                    <li><a href="{{ route('categories.landing') }}" class="hover:text-black transition">Landing Page</a></li>
                    <li><a href="{{ route('categories.microinteraction') }}" class="hover:text-black transition">Microinteraction</a></li>
                    <li><a href="{{ route('categories.typography') }}" class="hover:text-black transition">Typography</a></li>
                </ul>
            </div>
            <div>
                <h3 class="font-semibold text-black mb-4">Kolaborasi</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('submit.work') }}" class="hover:text-black transition">Submit Karya</a></li>
                    <li><a href="{{ route('join.curator') }}" class="hover:text-black transition">Gabung Kurator</a></li>
                    <li><a href="{{ route('sponsor') }}" class="hover:text-black transition">Sponsor & Iklan</a></li>
                    <li><a href="{{ route('media.partner') }}" class="hover:text-black transition">Media Partner</a></li>
                </ul>
            </div>
            <div class="col-span-2 sm:col-span-1">
                <h3 class="font-semibold text-black mb-4">Newsletter</h3>
                <p class="text-neutral-500 mb-3">Dapatkan kurasi terbaik tiap pekan langsung ke kotak masuk Anda.</p>
                <div class="flex items-center gap-2">
                    <input type="email" placeholder="Email Anda..." class="w-full px-3 py-2 border border-neutral-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-black" />
                    <button type="submit" class="px-4 py-2 bg-black text-white text-sm rounded-md hover:bg-neutral-800 transition">Kirim</button>
                </div>
            </div>
        </div>
        <div class="border-t border-neutral-200 text-center py-4 text-xs text-neutral-400">
            © 2025 Tara. Dirakit dengan semangat di bumi Nusantara. Estetika, teknologi, dan visi Anda menyatu.
        </div>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Particles.js
            particlesJS("particles-js", {
                particles: {
                    number: { value: 50, density: { enable: true, value_area: 800 } },
                    color: { value: "#000000" },
                    shape: { type: "circle" },
                    opacity: { value: 0.3, random: true },
                    size: { value: 3, random: true },
                    line_linked: {
                        enable: true,
                        distance: 80,
                        color: "#000000",
                        opacity: 0.2,
                        width: 1,
                    },
                    move: { enable: true, speed: 1, out_mode: "out" },
                },
                interactivity: {
                    events: { onhover: { enable: false }, onclick: { enable: false } },
                    modes: { repulse: { distance: 50 }, push: { particles_nb: 4 } },
                },
                retina_detect: true,
            });

            // Chart.js
            const ctx = document.getElementById("userActivityChart").getContext("2d");
            new Chart(ctx, {
                type: "bar",
                data: {
                    labels: @json($chartData['labels']),
                    datasets: [{
                        label: "Aktivitas",
                        data: @json($chartData['data']),
                        backgroundColor: ["#000000", "#333333", "#666666", "#999999"],
                        borderRadius: 6,
                        barThickness: 16,
                    }],
                },
                options: {
                    indexAxis: "y",
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            beginAtZero: true,
                            grid: { color: "rgba(0, 0, 0, 0.1)" },
                            ticks: { color: "#000000", font: { family: "Space Grotesk", size: 12 } },
                        },
                        y: {
                            grid: { display: false },
                            ticks: { color: "#000000", font: { family: "Space Grotesk", size: 12 } },
                        },
                    },
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: "rgba(0, 0, 0, 0.8)",
                            titleColor: "#ffffff",
                            bodyColor: "#ffffff",
                            callbacks: { label: (context) => context.raw + " poin" },
                        },
                    },
                },
            });

            // Lottie Animations for Badges
            const lotties = [
                @foreach($badges as $badge)
                    @if($badge['lottie'])
                        { id: "{{ str_replace(' ', '', $badge['name']) }}Lottie", path: "{{ $badge['lottie'] }}" },
                    @endif
                @endforeach
            ];
            lotties.forEach((b) => {
                lottie.loadAnimation({
                    container: document.getElementById(b.id),
                    renderer: "svg",
                    loop: true,
                    autoplay: true,
                    path: b.path,
                });
            });

            // Tab Functionality
            const tabLinks = document.querySelectorAll(".tab-link");
            const tabSections = document.querySelectorAll(".tab-section");
            tabLinks.forEach((link) => {
                link.addEventListener("click", () => {
                    tabLinks.forEach((l) => l.classList.remove("active"));
                    link.classList.add("active");
                    tabSections.forEach((s) => s.classList.add("hidden"));
                    document.getElementById(link.dataset.tab).classList.remove("hidden");
                });
            });

            // Portfolio Filter
            const filterButtons = document.querySelectorAll(".filter-button");
            const portfolioItems = document.querySelectorAll(".portfolio-card");
            filterButtons.forEach((button) => {
                button.addEventListener("click", () => {
                    filterButtons.forEach((btn) => btn.classList.remove("active"));
                    button.classList.add("active");
                    const category = button.dataset.filter;
                    const year = document.querySelector('[data-filter="year"]').value;
                    portfolioItems.forEach((item) => {
                        const itemCategory = item.dataset.category;
                        const itemYear = item.dataset.year;
                        if ((category === "all" || itemCategory === category) && (year === "all" || itemYear === year)) {
                            item.style.display = "block";
                        } else {
                            item.style.display = "none";
                        }
                    });
                });
            });

            document.querySelector('[data-filter="year"]').addEventListener("change", (e) => {
                const year = e.target.value;
                const activeCategory = document.querySelector(".filter-button.active")?.dataset.filter || "all";
                portfolioItems.forEach((item) => {
                    const itemCategory = item.dataset.category;
                    const itemYear = item.dataset.year;
                    if ((activeCategory === "all" || itemCategory === activeCategory) && (year === "all" || itemYear === year)) {
                        item.style.display = "block";
                    } else {
                        item.style.display = "none";
                    }
                });
            });

            // Badge Animations
            const animated = sessionStorage.getItem("badgesAnimated");
            const badgeItems = document.querySelectorAll(".badge-card");
            if (!animated) {
                badgeItems.forEach((item, idx) => {
                    setTimeout(() => {
                        item.classList.remove("opacity-0");
                        item.classList.add("animate-fadeIn", "appear");
                    }, idx * 150);
                });
                sessionStorage.setItem("badgesAnimated", "true");
            } else {
                badgeItems.forEach((item) => {
                    item.classList.remove("opacity-0");
                    item.classList.add("appear");
                });
            }

            // Badge Interactivity
            badgeItems.forEach((item) => {
                item.addEventListener("click", (e) => {
                    if (window.innerWidth <= 768) {
                        item.classList.toggle("active");
                    }
                    if (e.target.tagName === "A") {
                        window.location.href = e.target.href;
                    }
                });
                item.addEventListener("keydown", (e) => {
                    if (e.key === "Enter" || e.key === " ") {
                        e.preventDefault();
                        item.classList.toggle("active");
                    }
                });
            });

            // Gallery Flip Card Interactivity
            document.querySelectorAll(".gallery-item").forEach((item) => {
                item.addEventListener("click", () => {
                    item.classList.toggle("flipped");
                    item.classList.toggle("active");
                });
                item.addEventListener("keydown", (e) => {
                    if (e.key === "Enter" || e.key === " ") {
                        e.preventDefault();
                        item.classList.toggle("flipped");
                        item.classList.toggle("active");
                    }
                });
            });

            // Burger Menu Toggle
            const burger = document.getElementById('burger-toggle');
            const navMenu = document.getElementById('nav-menu');
            burger.addEventListener('click', () => {
                navMenu.classList.toggle('hidden');
            });

            // Notification Handling
            function toggleNotifications() {
                const modal = document.getElementById('notification-modal');
                modal.classList.toggle('open');
                if (modal.classList.contains('open')) {
                    fetchNotifications();
                }
            }

            function fetchNotifications(filter = 'all') {
                fetch('{{ route('profile.toggleNotifications') }}')
                    .then(response => response.json())
                    .then(data => {
                        const notificationList = document.getElementById('notification-list');
                        notificationList.innerHTML = '';
                        let notifications = @json(Auth::user()->notifications);
                        if (filter === 'unread') {
                            notifications = notifications.filter(n => !n.read_at);
                        }
                        if (notifications.length === 0) {
                            notificationList.innerHTML = `
                                <div class="empty-state">
                                    <i class="fas fa-bell-slash"></i>
                                    <p>Belum ada notifikasi untuk Anda.</p>
                                </div>
                            `;
                        } else {
                            notifications.forEach(notification => {
                                const div = document.createElement('div');
                                div.className = `notification-card ${notification.read_at ? '' : 'unread'}`;
                                div.innerHTML = `
                                    <p>${notification.data.message}</p>
                                    <p class="time">${new Date(notification.created_at).toLocaleString()}</p>
                                `;
                                notificationList.appendChild(div);
                            });
                        }
                        document.getElementById('unread-count').textContent = notifications.filter(n => !n.read_at).length;
                    });
            }

            document.getElementById('mark-all-read').addEventListener('click', () => {
                fetch('{{ route('profile.markAllNotificationsRead') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        fetchNotifications();
                    });
            });

            document.querySelectorAll('.filter-button').forEach(btn => {
                btn.addEventListener('click', () => {
                    document.querySelectorAll('.filter-buptton').forEach(b => b.classList.remove('active'));
                    btn.classList.add('active');
                    fetchNotifications(btn.dataset.filter);
                });
            });
        });
    </script>
</body>
</html>
```