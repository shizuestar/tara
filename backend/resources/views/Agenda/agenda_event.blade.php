<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TARA – Art Gallery Showcase</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.2/anime.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet"/>

    <style>
        body {
            font-family: 'Space Grotesk', sans-serif;
            background: #FFFFFF;
            color: #000000;
            overflow-x: hidden;
            box-sizing: border-box;
        }

        *,
        *::before,
        *::after {
            box-sizing: inherit;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://www.transparenttextures.com/patterns/canvas.png');
            opacity: 0.05;
            z-index: -2;
        }

        #particles-js {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background-color: transparent;
            opacity: 0.2;
        }

        /* Event Card Styling */
        .event-card {
            background: #FFFFFF;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 16px;
            margin: 24px auto;
            max-width: 800px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            opacity: 0;
            transform: translateY(40px);
            position: relative;
        }

        .event-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
        }

        .event-card.hidden-by-filter {
            display: none !important;
        }

        .event-card::before {
            content: 'Exhibit';
            position: absolute;
            top: 10px;
            left: 10px;
            background: #000000;
            color: #FFFFFF;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .card-image-wrapper {
            position: relative;
            width: 100%;
            height: 250px;
            overflow: hidden;
            border-radius: 8px;
            margin-bottom: 12px;
            border: 2px solid #000000;
        }

        .card-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease, filter 0.4s ease;
        }

        .event-card:hover .card-image {
            transform: scale(1.1);
            filter: brightness(1.1) drop-shadow(0 0 8px rgba(0, 0, 0, 0.2));
        }

        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);
            color: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
            border-radius: 8px;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 1.25rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-decoration: none;
        }

        .event-card:hover .image-overlay {
            opacity: 1;
        }

        .card-text {
            text-align: left;
            padding: 0 8px;
        }

        .card-text h2 {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 8px;
            color: #000000;
        }

        .card-text p {
            font-size: 0.875rem;
            line-height: 1.5;
            color: #000000;
            margin-bottom: 6px;
        }

        .card-text .countdown {
            color: #000000;
            font-size: 0.75rem;
            font-weight: 600;
        }

        /* Sidebar Styling */
        #sidebar {
            background: linear-gradient(180deg, #F9FAFB 0%, #FFFFFF 100%);
            border-radius: 16px;
            padding: 24px;
            margin: 16px;
            margin-top: 80px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            opacity: 0;
            transform: translateX(-30px);
        }

        #sidebar h3 {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 1.25rem;
            font-weight: 700;
            color: #000000;
            margin-bottom: 12px;
            transition: color 0.3s ease;
        }

        #sidebar ul li a {
            display: block;
            padding: 8px 12px;
            background: transparent;
            border-radius: 8px;
            transition: background 0.3s ease, transform 0.2s ease, color 0.3s ease;
        }

        #sidebar ul li a:hover {
            background: #E5E5E5;
            color: #000000;
            transform: translateX(4px);
        }

        #sidebar .filter-btn {
            background: transparent;
            color: #000000;
            padding: 6px 12px;
            border: 1px solid #000000;
            border-radius: 16px;
            font-size: 0.75rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s ease, color 0.3s ease, transform 0.2s ease;
        }

        #sidebar .filter-btn:hover {
            background: #E5E5E5;
            color: #000000;
            transform: scale(1.05);
        }

        #toggleSidebar {
            background: transparent;
            color: #000000;
            padding: 8px 12px;
            border: 1px solid #000000;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 600;
            transition: background 0.3s ease, color 0.3s ease, transform 0.2s ease;
        }

        #toggleSidebar:hover {
            background: #E5E5E5;
            color: #000000;
            transform: scale(1.05);
        }

        /* Navbar Styling */
        header {
            padding: 1.5rem 2rem;
            background: #FFFFFF;
            border-bottom: 1px solid #000000;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 40;
        }

        .navbar-logo {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 1.75rem;
            font-weight: 700;
            color: #000000;
        }

        nav a {
            font-size: 0.875rem;
            font-weight: 500;
            color: #000000;
            padding: 0.5rem 0.75rem;
            transition: color 0.3s ease, transform 0.2s ease;
        }

        nav a:hover {
            color: #000000;
            transform: scale(1.05);
        }

        .search-input {
            padding: 0.5rem 1rem 0.5rem 2.5rem;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="%23000000"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M16.65 11.65a5.65 5.65 0 11-11.3 0 5.65 5.65 0 0111.3 0z" /></svg>') no-repeat 0.75rem center;
            background-size: 1rem;
            border: 1px solid #000000;
            border-radius: 9999px;
            font-size: 0.875rem;
            color: #000000;
            background-color: #FFFFFF;
            width: 200px;
            transition: transform 0.2s ease;
        }

        .search-input:hover {
            transform: scale(1.02);
        }

        .search-input::placeholder {
            color: #800000;
        }

        .login-btn {
            padding: 0.5rem 1rem;
            border-radius: 9999px;
            background: #000000;
            color: #FFFFFF;
            font-size: 0.875rem;
            font-weight: 600;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .login-btn:hover {
            background: #000000;
            transform: scale(1.05);
        }

        /* Mobile Menu Styling */
        #mobileMenuOverlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 30;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        #mobileMenuOverlay.open {
            opacity: 1;
            visibility: visible;
        }

        #mobileMenu {
            width: 75%;
            max-width: 260px;
            background: #FFFFFF;
            border-left: 1px solid #000000;
        }

        /* Hero Section */
        .hero {
            margin-top: 80px;
            height: 100vh;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .hero-content {
            transition: transform 0.3s ease;
        }

        .hero-content:hover {
            transform: scale(1.02);
        }

        /* Pagination Styling */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 12px;
            margin: 32px 0;
            font-family: 'Space Grotesk', sans-serif;
        }

        .pagination button {
            background: #FFFFFF;
            border: 1px solid #000000;
            border-radius: 8px;
            padding: 8px 16px;
            font-size: 0.875rem;
            font-weight: 600;
            color: #000000;
            cursor: pointer;
            transition: background 0.3s ease, color 0.3s ease, transform 0.2s ease;
        }

        .pagination button:hover {
            background: #000000;
            color: #FFFFFF;
            transform: scale(1.05);
        }

        .pagination button.active {
            background: #000000;
            color: #FFFFFF;
        }

        .pagination button:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        /* Text Gradient Animation */
        .text-gradient {
            background: linear-gradient(
                135deg,
                #000000 0%,
                #4a4a4a 50%,
                #000000 100%
            );
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            background-size: 200% 200%;
            animation: gradientShift 4s ease-in-out infinite;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Responsive Adjustments */
        @media (min-width: 768px) {
            main {
                flex-direction: row;
                align-items: flex-start;
            }

            .event-card {
                display: flex;
                align-items: center;
                padding: 24px;
            }

            .card-image-wrapper {
                width: 35%;
                height: 300px;
                margin-right: 16px;
                margin-bottom: 0;
            }

            #sidebar {
                width: 280px;
                position: sticky;
                top: 80px;
                margin-top: 80px;
                margin-right: 16px;
            }

            .hero {
                height: 100vh;
            }
        }

        @media (max-width: 767px) {
            .search-input {
                display: none;
            }

            .event-card {
                padding: 12px;
            }

            .card-text h2 {
                font-size: 1.5rem;
            }

            .card-text p {
                font-size: 0.75rem;
            }

            .card-image-wrapper {
                height: 200px;
            }

            .hero {
                height: 80vh;
            }
        }
    </style>
</head>
<body class="relative overflow-x-hidden">
    <div id="particles-js"></div>

    <!-- Header -->
    <header class="py-6 px-8 flex justify-between items-center shadow-sm z-40 fixed top-0 left-0 w-full">
        <div class="navbar-logo text-2xl uppercase tracking-wide text-gradient">TARA</div>
        <nav class="hidden md:flex space-x-6 text-sm">
            <a href="/" class="hover:text-black transition">Beranda</a>
            <a href="/eksplor" class="hover:text-black transition">Eksplor</a>
            <a href="/komunitas" class="hover:text-black transition">Komunitas</a>
            <a href="/proyek" class="hover:text-black transition">Proyek</a>
            <a href="/blog" class="hover:text-black transition">Blog</a>
            <a href="/agenda" class="hover:text-black transition font-semibold">Agenda</a>
            <a href="/profil" class="hover:text-black transition">Profil</a>
        </nav>
        <div class="flex items-center gap-4">
            <input type="text" placeholder="Cari karya, komunitas, pameran..." class="search-input" aria-label="Search artworks or events" />
            <a href="/login" class="login-btn">Login</a>
            <button id="mobileMenuBtn" class="md:hidden text-black focus:outline-none" aria-label="Open mobile menu">
                <i class="fas fa-bars text-lg"></i>
            </button>
        </div>
    </header>

    <!-- Mobile Menu -->
    <div id="mobileMenuOverlay" class="fixed inset-0 z-30 hidden"></div>
    <div id="mobileMenu" class="fixed top-0 right-0 h-full shadow-lg z-50 transform translate-x-full md:hidden">
        <div class="p-4 flex justify-end">
            <button id="closeMobileMenuBtn" class="text-black focus:outline-none" aria-label="Close mobile menu">
                <i class="fas fa-times text-lg"></i>
            </button>
        </div>
        <nav class="flex flex-col p-4 space-y-4">
            <a href="/" class="text-lg font-semibold text-black hover:text-black transition">Beranda</a>
            <a href="/eksplor" class="text-lg font-semibold text-black hover:text-black transition">Eksplor</a>
            <a href="/komunitas" class="text-lg font-semibold text-black hover:text-black transition">Komunitas</a>
            <a href="/proyek" class="text-lg font-semibold text-black hover:text-black transition">Proyek</a>
            <a href="/blog" class="text-lg font-semibold text-black hover:text-black transition">Blog</a>
            <a href="/agenda" class="text-lg font-semibold text-black hover:text-black transition">Agenda</a>
            <a href="/profil" class="text-lg font-semibold text-black hover:text-black transition">Profil</a>
            <hr class="border-black">
            <a href="/login" class="text-lg font-semibold text-black hover:text-black transition">Login</a>
        </nav>
    </div>

    <!-- Hero Section -->
    <section class="hero relative bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1540574163026-643ea20ade25?auto=compress&cs=tinysrgb&w=1260');">
        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
            <div class="text-center text-white hero-content">
                <h1 class="text-4xl md:text-6xl font-bold font-['Space Grotesk'] text-white mb-4">TARA Art Showcase</h1>
                <p class="text-lg md:text-2xl mt-2 mb-6">Explore Upcoming Exhibitions & Events</p>
                <a href="#eventCardsList" class="mt-4 inline-block bg-black text-white px-8 py-3 rounded-full font-semibold hover:bg-black transition transform hover:scale-105">Discover Now</a>
            </div>
        </div>
    </section>

    <main class="pt-24 relative bottom-24 flex flex-col md:flex-row min-h-screen px-4">
        <aside id="sidebar" class="w-full md:w-64 p-4">
            <button id="toggleSidebar" class="md:hidden text-black mb-4"><i class="fas fa-filter mr-2"></i>Filters</button>
            <div>
                <!-- Event Terbaru -->
                <div class="mb-8 border-b border-neutral-200 pb-4">
                    <h3 class="text-lg font-bold mb-1 text-gradient">Event Terbaru</h3>
                    <p class="text-xs text-neutral-600 mb-3">Ikuti pameran terkini untuk inspirasi seni</p>
                    <ul class="space-y-2">
                        <li>
                            <a href="detail_event1.html" class="block p-2 rounded-lg transition">
                                <p class="text-sm font-semibold text-black">Abstract Expressionism</p>
                                <p class="text-xs text-neutral-600 mt-1">25 Jul 2025 · TARA Gallery</p>
                            </a>
                        </li>
                        <li>
                            <a href="detail_event.html?id=4" class="block p-2 rounded-lg transition">
                                <p class="text-sm font-semibold text-black">Photography Showcase</p>
                                <p class="text-xs text-neutral-600 mt-1">28 Jul 2025 · Downtown</p>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Sedang Berlangsung -->
                <div class="mb-8 border-b border-neutral-200 pb-4">
                    <h3 class="text-lg font-bold mb-1 text-gradient">Sedang Berlangsung</h3>
                    <p class="text-xs text-neutral-600 mb-3">Pameran yang sedang berlangsung</p>
                    <ul class="space-y-2">
                        <li>
                            <a href="detail_event.html?id=3" class="block p-2 rounded-lg transition">
                                <p class="text-sm font-semibold text-black">Sculpture Symposium</p>
                                <p class="text-xs text-neutral-600 mt-1">18–20 Jul 2025 · TARA Studio</p>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Kategori -->
                <div class="mb-8">
                    <h3 class="text-lg font-bold mb-1 text-gradient">Medium</h3>
                    <p class="text-xs text-neutral-600 mb-3">Explore by art form</p>
                    <div class="flex flex-wrap gap-2">
                        <span class="filter-btn uppercase" data-filter-sidebar="painting">Painting</span>
                        <span class="filter-btn uppercase" data-filter-sidebar="sculpture">Sculpture</span>
                        <span class="filter-btn uppercase" data-filter-sidebar="digital-art">Digital Art</span>
                        <span class="filter-btn uppercase" data-filter-sidebar="photography">Photography</span>
                        <span class="filter-btn uppercase" data-filter-sidebar="all">All</span>
                    </div>
                </div>

                <!-- Featured Artist -->
                <div class="mb-8">
                    <h3 class="text-lg font-bold mb-1 text-gradient">Featured Artist</h3>
                    <p class="text-xs text-neutral-600 mb-3">Meet our spotlight creator</p>
                    <a href="/artist-profile" class="block p-2 rounded-lg transition">
                        <p class="text-sm font-semibold text-black">Anya Kovalenko</p>
                        <p class="text-xs text-neutral-600 mt-1">Contemporary Painter</p>
                    </a>
                </div>
            </div>
        </aside>

        <section class="flex-1 py-12 px-4" id="eventCardsList">
            <div class="space-y-6" id="eventCardsContainer">
                <div class="event-card" data-event-id="1" data-category="painting">
                    <div class="card-image-wrapper">
                        <img src="https://images.unsplash.com/photo-1505322022379-7c3353ee6291?auto=compress&cs=tinysrgb&w=600" alt="Abstract Expressionism Exhibit at TARA Gallery" class="card-image" loading="lazy" onerror="this.src='https://via.placeholder.com/600x400?text=Image+Not+Available'" />
                        <a href="detail_event1.html" class="image-overlay">View Exhibition</a>
                    </div>
                    <div class="card-text">
                        <h2 class="text-gradient">Abstract Expressionism Exhibit</h2>
                        <p class="flex items-center mb-1"><i class="far fa-calendar-alt mr-2"></i> <strong>Tanggal:</strong> 25 Jul 2025</p>
                        <p class="flex items-center mb-1"><i class="far fa-clock mr-2"></i> <strong>Jam:</strong> 10:00 - 14:00</p>
                        <p class="flex items-center mb-2"><i class="fas fa-map-marker-alt mr-2"></i> <strong>Lokasi:</strong> TARA Gallery</p>
                        <p>Explore vibrant abstract works with a guided tour by the curator.</p>
                    </div>
                </div>

                <div class="event-card" data-category="sculpture" data-event-id="2">
                    <div class="card-image-wrapper">
                        <img src="https://images.unsplash.com/photo-1579783900882-c0d3dad7b119?auto=compress&cs=tinysrgb&w=600" alt="Modern Sculpture Exhibit at Downtown Gallery" class="card-image" loading="lazy" onerror="this.src='https://via.placeholder.com/600x400?text=Image+Not+Available'" />
                        <a href="detail_event.html?id=2" class="image-overlay">View Exhibition</a>
                    </div>
                    <div class="card-text">
                        <h2 class="text-gradient">Modern Sculpture Exhibit</h2>
                        <p class="flex items-center mb-1"><i class="far fa-calendar-alt mr-2"></i> <strong>Tanggal:</strong> 30 Jul 2025</p>
                        <p class="flex items-center mb-1"><i class="far fa-clock mr-2"></i> <strong>Jam:</strong> 11:00 - 16:00</p>
                        <p class="flex items-center mb-2"><i class="fas fa-map-marker-alt mr-2"></i> <strong>Lokasi:</strong> Downtown Gallery</p>
                        <p>Discover bold sculptural forms in an immersive setting.</p>
                    </div>
                </div>

                <div class="event-card" data-category="digital-art" data-event-id="3">
                    <div class="card-image-wrapper">
                        <img src="https://images.unsplash.com/photo-1618005182380-4c0e9b451873?auto=compress&cs=tinysrgb&w=600" alt="Digital Art Symposium Online" class="card-image" loading="lazy" onerror="this.src='https://via.placeholder.com/600x400?text=Image+Not+Available'" />
                        <a href="detail_event.html?id=3" class="image-overlay">View Exhibition</a>
                    </div>
                    <div class="card-text">
                        <h2 class="text-gradient">Digital Art Symposium</h2>
                        <p class="flex items-center mb-1"><i class="far fa-calendar-alt mr-2"></i> <strong>Tanggal:</strong> 18 Jul 2025</p>
                        <p class="flex items-center mb-1"><i class="far fa-clock mr-2"></i> <strong>Jam:</strong> 15:00 - 17:00</p>
                        <p class="flex items-center mb-2"><i class="fas fa-globe mr-2"></i> <strong>Lokasi:</strong> Zoom</p>
                        <p>Join artists discussing the future of digital creativity.</p>
                    </div>
                </div>

                <div class="event-card" data-category="photography" data-event-id="4">
                    <div class="card-image-wrapper">
                        <img src="https://images.unsplash.com/photo-1558978441-5e2b1b4d8188?auto=compress&cs=tinysrgb&w=600" alt="Photography Showcase at TARA Studio" class="card-image" loading="lazy" onerror="this.src='https://via.placeholder.com/600x400?text=Image+Not+Available'" />
                        <a href="detail_event.html?id=4" class="image-overlay">View Exhibition</a>
                    </div>
                    <div class="card-text">
                        <h2 class="text-gradient">Photography Showcase</h2>
                        <p class="flex items-center mb-1"><i class="far fa-calendar-alt mr-2"></i> <strong>Tanggal:</strong> 28 Jul 2025</p>
                        <p class="flex items-center mb-1"><i class="far fa-clock mr-2"></i> <strong>Jam:</strong> 09:00 - 17:00</p>
                        <p class="flex items-center mb-2"><i class="fas fa-building mr-2"></i> <strong>Lokasi:</strong> TARA Studio</p>
                        <p>Captivating moments captured by emerging photographers.</p>
                    </div>
                </div>

                <div class="event-card" data-category="painting" data-event-id="5">
                    <div class="card-image-wrapper">
                        <img src="https://images.unsplash.com/photo-1513366208864-8752b8bd20ac?auto=compress&cs=tinysrgb&w=600" alt="Contemporary Painting Workshop Online" class="card-image" loading="lazy" onerror="this.src='https://via.placeholder.com/600x400?text=Image+Not+Available'" />
                        <a href="detail_event.html?id=5" class="image-overlay">View Exhibition</a>
                    </div>
                    <div class="card-text">
                        <h2 class="text-gradient">Contemporary Painting Workshop</h2>
                        <p class="flex items-center mb-1"><i class="far fa-calendar-alt mr-2"></i> <strong>Tanggal:</strong> 15 Aug 2025</p>
                        <p class="flex items-center mb-1"><i class="far fa-clock mr-2"></i> <strong>Jam:</strong> 13:00 - 16:00</p>
                        <p class="flex items-center mb-2"><i class="fas fa-globe mr-2"></i> <strong>Lokasi:</strong> Webex</p>
                        <p>Learn painting techniques with renowned artists.</p>
                    </div>
                </div>
            </div>
            <!-- Pagination -->
            <div class="pagination" id="pagination">
                <button id="prevPage" disabled>← Prev</button>
                <button class="active" data-page="1">1</button>
                <button data-page="2">2</button>
                <button id="nextPage">Next →</button>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-neutral-200 text-sm text-neutral-700">
        <div class="max-w-7xl mx-auto px-6 py-16 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-10">
            <div class="col-span-2">
                <div class="text-2xl font-bold tracking-normal uppercase" style="font-family: 'Space Grotesk', sans-serif;">
                    TARA<span class="text-yellow-400">●</span>
                </div>
                <p class="text-neutral-500 mb-4">Rumah bagi karya visual menawan, inovasi muda, dan estetika web masa depan. Temukan inspirasi. Bangun impresi.</p>
                <div class="flex gap-4 mt-3 text-neutral-600 text-xl">
                    <a href="#" class="hover:text-black transition" aria-label="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="hover:text-black transition" aria-label="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="hover:text-black transition" aria-label="LinkedIn">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="#" class="hover:text-black transition" aria-label="Dribbble">
                        <i class="fab fa-dribbble"></i>
                    </a>
                    <a href="#" class="hover:text-black transition" aria-label="Behance">
                        <i class="fab fa-behance"></i>
                    </a>
                </div>
            </div>
            <div>
                <h3 class="font-semibold text-black mb-4">Navigasi</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:text-black transition">Beranda</a></li>
                    <li><a href="#" class="hover:text-black transition">Galeri</a></li>
                    <li><a href="#" class="hover:text-black transition">Tentang</a></li>
                    <li><a href="#" class="hover:text-black transition">Kontak</a></li>
                    <li><a href="#" class="hover:text-black transition">FAQ</a></li>
                </ul>
            </div>
            <div>
                <h3 class="font-semibold text-black mb-4">Eksplorasi</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:text-black transition">UI/UX</a></li>
                    <li><a href="#" class="hover:text-black transition">GSAP Effects</a></li>
                    <li><a href="#" class="hover:text-black transition">Landing Page</a></li>
                    <li><a href="#" class="hover:text-black transition">Microinteraction</a></li>
                    <li><a href="#" class="hover:text-black transition">Typography</a></li>
                </ul>
            </div>
            <div>
                <h3 class="font-semibold text-black mb-4">Kolaborasi</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:text-black transition">Submit Karya</a></li>
                    <li><a href="#" class="hover:text-black transition">Gabung Kurator</a></li>
                    <li><a href="#" class="hover:text-black transition">Sponsor & Iklan</a></li>
                    <li><a href="#" class="hover:text-black transition">Media Partner</a></li>
                </ul>
            </div>
            <div class="col-span-2 sm:col-span-1">
                <h3 class="font-semibold text-black mb-4">Newsletter</h3>
                <p class="text-neutral-500 mb-3">Dapatkan kurasi terbaik tiap pekan langsung ke kotak masuk Anda.</p>
                <div class="flex items-center gap-2">
                    <input type="email" placeholder="Email Tuan..." class="w-full px-3 py-2 border border-neutral-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-black" />
                    <button type="submit" class="px-4 py-2 bg-black text-white text-sm rounded-md hover:bg-neutral-800 transition">Kirim</button>
                </div>
            </div>
        </div>
        <div class="border-t border-neutral-200 text-center py-4 text-xs text-neutral-400">
            © 2025 Tara. Dirakit dengan semangat di bumi Nusantara. Estetika, teknologi, dan visi Tuan menyatu.
        </div>
    </footer>

    <script>
        // Initialize particles.js
        window.addEventListener('load', () => {
            particlesJS('particles-js', {
                particles: {
                    number: { value: 30, density: { enable: true, value_area: 1000 } },
                    color: { value: "#000000" },
                    shape: { type: "circle" },
                    opacity: { value: 0.3, random: true },
                    size: { value: 2, random: true },
                    line_linked: { enable: false },
                    move: {
                        enable: true,
                        speed: 0.3,
                        direction: "top",
                        random: false,
                        straight: false,
                        out_mode: "out"
                    }
                },
                interactivity: {
                    events: {
                        onhover: { enable: true, mode: "repulse" },
                        onclick: { enable: false }
                    },
                    modes: {
                        repulse: { distance: 100, duration: 0.4 }
                    }
                },
                retina_detect: true
            });
        });

        // Mobile Menu Logic
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const closeMobileMenuBtn = document.getElementById('closeMobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        const mobileMenuOverlay = document.getElementById('mobileMenuOverlay');

        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.remove('translate-x-full');
            mobileMenuOverlay.classList.remove('hidden');
            mobileMenuOverlay.classList.add('open');
            anime({
                targets: '#mobileMenu',
                translateX: [300, 0],
                easing: 'easeOutQuad',
                duration: 300
            });
        });

        closeMobileMenuBtn.addEventListener('click', closeMobileMenu);
        mobileMenuOverlay.addEventListener('click', closeMobileMenu);

        function closeMobileMenu() {
            anime({
                targets: '#mobileMenu',
                translateX: [0, 300],
                easing: 'easeOutQuad',
                duration: 300,
                complete: () => {
                    mobileMenu.classList.add('translate-x-full');
                    mobileMenuOverlay.classList.remove('open');
                    mobileMenuOverlay.classList.add('hidden');
                }
            });
        }

        // Sidebar Toggle for Mobile
        document.getElementById('toggleSidebar').addEventListener('click', () => {
            document.querySelector('#sidebar > div').classList.toggle('hidden');
        });

        // Filter Functionality
        const eventCards = document.querySelectorAll('.event-card');
        document.querySelectorAll('#sidebar .filter-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                const category = e.target.dataset.filterSidebar;
                eventCards.forEach(card => {
                    const isVisible = category === 'all' || card.dataset.category === category;
                    card.classList.toggle('hidden-by-filter', !isVisible);
                    if (isVisible) {
                        gsap.fromTo(card, 
                            { opacity: 0, y: 20 }, 
                            { opacity: 1, y: 0, duration: 0.4, ease: 'power3.out' }
                        );
                    }
                });
            });
        });

        // Pagination Logic
        const cardsPerPage = 3;
        let currentPage = 1;
        const totalPages = Math.ceil(eventCards.length / cardsPerPage);

        function updatePagination() {
            const start = (currentPage - 1) * cardsPerPage;
            const end = start + cardsPerPage;
            eventCards.forEach((card, index) => {
                card.classList.toggle('hidden-by-filter', index < start || index >= end);
                if (index >= start && index < end) {
                    gsap.fromTo(card, 
                        { opacity: 0, y: 20 }, 
                        { opacity: 1, y: 0, duration: 0.4, ease: 'power3.out' }
                    );
                }
            });

            document.querySelectorAll('.pagination button[data-page]').forEach(btn => {
                btn.classList.toggle('active', parseInt(btn.dataset.page) === currentPage);
            });

            document.getElementById('prevPage').disabled = currentPage === 1;
            document.getElementById('nextPage').disabled = currentPage === totalPages;
        }

        document.getElementById('prevPage').addEventListener('click', () => {
            if (currentPage > 1) {
                currentPage--;
                updatePagination();
            }
        });

        document.getElementById('nextPage').addEventListener('click', () => {
            if (currentPage < totalPages) {
                currentPage++;
                updatePagination();
            }
        });

        document.querySelectorAll('.pagination button[data-page]').forEach(btn => {
            btn.addEventListener('click', () => {
                currentPage = parseInt(btn.dataset.page);
                updatePagination();
            });
        });

        // Countdown Timer
        function addCountdownTimer() {
            eventCards.forEach(card => {
                const dateStr = card.querySelector('.card-text p:nth-child(1)').textContent.split(': ')[1];
                const eventDate = new Date(dateStr);
                const now = new Date();
                const timeDiff = eventDate - now;
                if (timeDiff > 0) {
                    const daysLeft = Math.ceil(timeDiff / (1000 * 60 * 60 * 24));
                    const countdown = document.createElement('p');
                    countdown.className = 'countdown';
                    countdown.textContent = `${daysLeft} days until opening`;
                    card.querySelector('.card-text').appendChild(countdown);
                }
            });
        }

        // Lightbox for Images
        document.querySelectorAll('.card-image').forEach(img => {
            img.addEventListener('click', () => {
                const src = img.src;
                const lightbox = document.createElement('div');
                lightbox.className = 'fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50';
                lightbox.innerHTML = `
                    <img src="${src}" class="max-w-full max-h-full p-4" />
                    <button class="absolute top-4 right-4 text-white text-2xl" aria-label="Close lightbox">×</button>
                `;
                document.body.appendChild(lightbox);
                lightbox.querySelector('button').addEventListener('click', () => lightbox.remove());
            });
        });

        // GSAP Animations
        document.addEventListener('DOMContentLoaded', () => {
            gsap.fromTo(".hero", 
                { opacity: 0, y: 50 }, 
                { opacity: 1, y: 0, duration: 1, ease: "power3.out", delay: 0.3 }
            );
            gsap.fromTo(".hero-content", 
                { opacity: 0, scale: 0.9 }, 
                { opacity: 1, scale: 1, duration: 1, ease: "power3.out", delay: 0.5 }
            );
            gsap.fromTo("#sidebar", 
                { opacity: 0, x: -30 }, 
                { opacity: 1, x: 0, duration: 0.8, ease: "power3.out", delay: 0.1 }
            );
            gsap.fromTo(".event-card", 
                { opacity: 0, y: 40 }, 
                { opacity: 1, y: 0, duration: 0.8, ease: "power3.out", stagger: 0.15, delay: 0.2 }
            );
            gsap.fromTo("header", 
                { opacity: 0, y: -30 }, 
                { opacity: 1, y: 0, duration: 0.8, ease: "power3.out", delay: 0.05 }
            );
            gsap.fromTo("footer", 
                { opacity: 0, y: 30 }, 
                { opacity: 1, y: 0, duration: 0.8, ease: "power3.out", delay: 0.7 }
            );
            addCountdownTimer();
            updatePagination();
        });
    </script>
</body>
</html>