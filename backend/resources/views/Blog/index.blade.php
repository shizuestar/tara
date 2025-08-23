<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TARA – Blog & Artikel Inspiratif</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.2/anime.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600&family=Space+Grotesk:wght@600&display=swap"
      rel="stylesheet"
    />

    <style>
      body {
        font-family: "Space Grotesk", sans-serif;
        background: #ffffff;
        color: #111827;
        box-sizing: border-box;
      }

      *,
      *::before,
      *::after {
        box-sizing: inherit;
      }

      .perspective {
        perspective: 1200px;
      }

      .hover-3d {
        transform-style: preserve-3d;
        transition: transform 0.3s ease;
        cursor: pointer;
        will-change: transform;
        /* Optimasi rendering */
      }

      .hover-3d .inner {
        transform: rotateY(0deg) rotateX(0deg);
        transition: transform 0.3s ease;
      }

      .hover-3d:hover .inner {
        transform: rotateY(8deg) rotateX(4deg);
      }

      #particles-js {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
      }

      .blog-card {
        display: flex;
        flex-direction: column;
        height: 500px;
        min-height: 500px;
        /* Fallback untuk konsistensi tinggi */
        background: #ffffff;
        border-radius: 0.5rem;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        margin: 0;
        /* Menghapus margin yang tidak diinginkan */
      }

      .blog-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 16px 20px -5px rgba(0, 0, 0, 0.08),
          0 6px 8px -4px rgba(0, 0, 0, 0.05);
      }

      .blog-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        transition: transform 0.4s ease, filter 0.4s ease;
      }

      .blog-card:hover img {
        transform: scale(1.05);
        filter: brightness(0.9);
      }

      .blog-card-content {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 1rem;
        overflow: hidden;
      }

      .blog-card-content .content-main {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
      }

      .blog-card-content h3 {
        font-size: 1.125rem;
        font-weight: 600;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        margin: 0;
        line-height: 1.5;
        /* Konsistensi tinggi baris */
      }

      .blog-card-content p {
        font-size: 0.875rem;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        margin: 0;
        line-height: 1.4;
      }

      .blog-card-content .content-footer {
        margin-top: auto;
      }

      .text-accent {
        color: #facc15;
      }

      .category-filter.active {
        background-color: #111827;
        color: #ffffff;
        border-color: #facc15;
      }

      .category-filter:hover {
        background-color: #1f2937;
        color: #ffffff;
      }

      .hero-image {
        position: relative;
        background-size: cover;
        background-position: center;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
      }

      .hero-overlay {
        background: linear-gradient(
          to bottom,
          rgba(255, 255, 255, 0.1),
          rgba(0, 0, 0, 0.4)
        );
      }

      .filter-section {
        background: #ffffff;
        border-bottom: 1px solid #e5e7eb;
        padding-top: 1rem;
        padding-bottom: 1rem;
      }

      .pagination-button {
        padding: 0.5rem 1rem;
        margin: 0 0.25rem;
        background-color: #f3f4f6;
        color: #111827;
        border-radius: 0.375rem;
        font-size: 0.875rem;
        font-weight: 600;
        transition: all 0.3s ease;
      }

      .pagination-button:hover {
        background-color: #1f2937;
        color: #ffffff;
      }

      .pagination-button.active {
        background-color: #111827;
        color: #ffffff;
        border-color: #facc15;
      }

      .pagination-button:disabled {
        background-color: #e5e7eb;
        color: #6b7280;
        cursor: not-allowed;
      }

      #blog-posts {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 1.5rem;
        align-items: stretch;
        align-content: start;
        /* Memastikan grid tidak bergeser */
      }

      .nav-link {
        position: relative;
        transition: color 0.3s;
      }

      .nav-link::after {
        content: "";
        position: absolute;
        width: 0;
        height: 2px;
        bottom: -5px;
        left: 0;
        background-color: #000000;
        transition: width 0.3s;
      }

      .nav-link:hover::after {
        width: 100%;
      }

      .nav-link.active {
        color: #1a202c;
        font-weight: 600;
      }

      .nav-link.active::after {
        width: 100%;
      }

      /* notification */
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

      /* notif end */
    </style>
  </head>

  <body class="relative overflow-x-hidden">
    <div id="particles-js"></div>
    <!-- Notification Modal -->
    <div id="notification-modal" class="notification-modal">
      <i class="fas fa-times close-btn" onclick="toggleNotifications()"></i>
      <div class="p-6">
        <h2
          class="text-2xl font-bold text-black mb-4"
          style="font-family: 'Space Grotesk', sans-serif"
        >
          Notifikasi
        </h2>
        <div class="flex gap-2 mb-4">
          <button class="filter-btn active" data-filter="all">Semua</button>
          <button class="filter-btn" data-filter="unread">Belum Dibaca</button>
        </div>
        <button
          id="mark-all-read"
          class="px-4 py-2 bg-black text-white text-sm rounded-full hover:bg-gray-800 transition mb-4"
        >
          Tandai Semua Dibaca
        </button>
        <div id="notification-list" class="space-y-4"></div>
      </div>
    </div>
    <!-- Header -->
    <header
      class="py-6 px-8 flex justify-between items-center bg-white shadow-sm border-b border-gray-200 z-40 fixed top-0 left-0 w-full"
    >
      <nav
        class="fixed top-0 left-0 right-0 z-50 glass-effect bg-white/80 backdrop-blur-md shadow-sm"
      >
        <div class="max-w-7xl mx-auto px-6 py-4">
          <div class="flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center gap-3">
              <a href="#" class="text-3xl font-bold text-gray-900">TARA</a>
              <div class="relative">
                <span class="text-yellow-400 text-2xl">●</span>
                <span
                  class="absolute top-0 left-0 text-yellow-400 text-2xl animate-ping-slow"
                  >●</span
                >
              </div>
            </div>
            <!-- Search Bar -->
            <div class="relative flex-1 max-w-sm md:max-w-md lg:max-w-lg mx-4">
              <input
                type="text"
                placeholder="Cari..."
                class="w-full pl-10 pr-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-black text-gray-900 text-sm"
              />
              <i
                class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500"
              ></i>
            </div>
            <!-- Burger Icon Mobile -->
            <button
              aria-label="asdasd"
              id="burger-toggle"
              class="md:hidden focus:outline-none z-[60] relative"
            >
              <svg
                class="w-7 h-7 text-gray-900"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M4 6h16M4 12h16M4 18h16"
                />
              </svg>
            </button>
            <!-- Menu Navigasi -->
            <div
              id="nav-menu"
              class="hidden md:flex md:flex-row flex-col md:items-center md:gap-8 absolute md:static top-full left-0 w-full md:w-auto bg-white md:bg-transparent shadow-md md:shadow-none px-6 py-6 md:p-0 z-50 transition-all duration-300"
            >
              <a
                href="/index.html"
                class="nav-link block text-gray-700 hover:text-black font-medium py-2"
                >Beranda</a
              >
              <a
                href="/galeri.html"
                class="nav-link block text-gray-700 hover:text-black font-medium py-2"
                >Galeri</a
              >
              <a
                href="/komunitas.html"
                class="nav-link block text-gray-700 hover:text-black font-medium py-2"
                >Komunitas</a
              >
              <a
                href="/proyek.html"
                class="nav-link block text-gray-700 hover:text-black font-medium py-2"
                >Proyek</a
              >
              <a
                href="/blog.html"
                class="nav-link block text-gray-700 hover:text-black font-medium py-2"
                >Blog</a
              >
              <a
                href="/agenda.html"
                class="nav-link block text-gray-700 hover:text-black font-medium py-2"
                >Agenda</a
              >

              <div
                class="flex flex-col md:flex-row items-center gap-3 md:gap-2 mt-4 md:mt-0"
              >
                <a
                  href="/login"
                  class="px-4 py-2 text-gray-700 font-medium bg-white border border-gray-300 rounded-md hover:bg-gray-100 transition w-full md:w-auto text-center"
                >
                  Log In
                </a>
                <a
                  href="/register"
                  class="px-4 py-2 text-white font-medium bg-black rounded-md hover:bg-gray-800 transition w-full md:w-auto text-center"
                >
                  Sign Up
                </a>
              </div>
            </div>
          </div>
        </div>
      </nav>
    </header>

    <script>
      const burger = document.getElementById("burger-toggle");
      const navMenu = document.getElementById("nav-menu");

      burger.addEventListener("click", () => {
        navMenu.classList.toggle("hidden");
      });

      function toggleNotifications() {
        const modal = document.getElementById("notification-modal");
        const isOpen = modal.classList.contains("open");
        modal.classList.toggle("open");
        gsap.to(modal, {
          x: isOpen ? "100%" : "0%",
          duration: 0.3,
          ease: "power2.out",
        });
        if (!isOpen) {
          renderNotifications();
        }
      }

      // Set active navigation link
      const currentPath =
        window.location.pathname.split("/").pop() || "index.html";
      const isDetailPage = window.location.search.includes("id=");
      document.querySelectorAll(".nav-link").forEach((link) => {
        const href = link.getAttribute("href").split("/").pop();
        const isActive =
          href === currentPath ||
          (href === "blog.html" &&
            isDetailPage &&
            currentPath === "blog.html") ||
          (href === "komunitas.html" &&
            isDetailPage &&
            currentPath === "komunitas.html") ||
          (href === "galeri.html" &&
            isDetailPage &&
            currentPath === "galeri.html") ||
          (href === "agenda.html" &&
            isDetailPage &&
            currentPath === "agenda.html");
        if (isActive) {
          link.classList.add("active");
        }
      });
    </script>

    <!-- Hero Section -->
    <section
      class="relative hero-image perspective overflow-hidden"
      style="background-image: url('https://picsum.photos/1200/600?featured')"
    >
      <div class="hero-overlay absolute inset-0"></div>
      <div
        id="hero-text"
        class="relative max-w-4xl mx-auto px-4 text-center text-white"
      >
        <h1
          class="text-4xl md:text-5xl font-bold tracking-tight"
          style="font-family: 'Space Grotesk', sans-serif"
        >
          Galeri Kreatif Anak Muda<span class="text-accent align-middle ml-1"
            >●</span
          >
        </h1>
        <p class="mt-4 text-lg leading-relaxed">
          Inspirasi wawancara, tutorial, dan tips Nusantara.
        </p>
        <a
          href="/blog/1"
          class="inline-block mt-6 px-6 py-3 bg-white text-black rounded-full font-semibold hover:bg-gray-100 transition"
          >Jelajahi Galeri</a
        >
      </div>
    </section>

    <!-- Filter Kategori -->
    <section class="filter-section py-6 bg-white">
      <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-center gap-3 flex-wrap">
          <button
            class="category-filter px-4 py-2 rounded-full bg-gray-100 text-sm text-gray-700 font-semibold border border-gray-200 hover:bg-gray-200 transition active"
            data-category="all"
          >
            Semua
          </button>
          <button
            class="category-filter px-4 py-2 rounded-full bg-gray-100 text-sm text-gray-700 font-semibold border border-gray-200 hover:bg-gray-200 transition"
            data-category="wawancara"
          >
            Wawancara
          </button>
          <button
            class="category-filter px-4 py-2 rounded-full bg-gray-100 text-sm text-gray-700 font-semibold border border-gray-200 hover:bg-gray-200 transition"
            data-category="tutorial"
          >
            Tutorial
          </button>
          <button
            class="category-filter px-4 py-2 rounded-full bg-gray-100 text-sm text-gray-700 font-semibold border border-gray-200 hover:bg-gray-200 transition"
            data-category="tips"
          >
            Tips & Trik
          </button>
        </div>
      </div>
    </section>

    <!-- Daftar Artikel -->
    <section class="relative top-8 pb-32 bg-white">
      <div class="max-w-7xl mx-auto px-6">
        <div
          id="blog-posts"
          class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6"
        ></div>
        <div id="pagination" class="mt-16 text-center hidden">
          <button class="pagination-button" id="prev-page" disabled>
            Sebelumnya
          </button>
          <span id="page-numbers"></span>
          <button class="pagination-button" id="next-page">Selanjutnya</button>
        </div>
        <div id="load-more-container" class="mt-16 text-center">
          <button
            id="load-more"
            class="px-6 py-3 bg-black text-white rounded-full font-semibold hover:bg-gray-800 transition"
          >
            Muat Lebih Banyak
          </button>
        </div>
      </div>
    </section>

    <!-- CTA -->
    <section id="cta-section" class="py-20 bg-white text-center">
      <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-4xl md:text-5xl font-bold text-black mb-4">
          Bagikan Ceritamu
        </h2>
        <p class="text-lg text-gray-700 mb-6">
          Tulis artikel, wawancara, atau tutorial untuk menginspirasi komunitas
          TARA.
        </p>
        <a
          href="/blog/submit"
          class="inline-block px-6 py-3 bg-black text-white rounded-full font-semibold hover:bg-gray-800 transition"
          >Kirim Artikel</a
        >
      </div>
    </section>

    <footer
            class="relative mt-12 bg-white border-t border-neutral-200 text-sm text-neutral-700 overflow-hidden">
            <div
                class="absolute bottom-0 left-0 w-full h-56 pointer-events-none z-0">
                <div
                    class="w-full h-full bg-gradient-to-t from-white via-white/80 to-transparent animate-[fadeUp_4s_infinite]"></div>
            </div>
            <div
                class="relative z-10 max-w-7xl mx-auto px-6 py-16 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-10">
                <div class="col-span-2">
                    <div
                        class="text-2xl font-bold tracking-normal uppercase"
                        style="font-family: 'Space Grotesk', sans-serif">
                        TARA<span class="text-yellow-400">●</span>
                    </div>
                    <p class="text-neutral-500 mb-4">
                        Rumah bagi karya visual menawan, inovasi muda, dan
                        estetika web masa depan. Temukan inspirasi. Bangun
                        impresi.
                    </p>
                    <div class="flex gap-4 mt-3 text-neutral-600 text-xl">
                        <a
                            href="#"
                            class="hover:text-yellow-400 transition"
                            aria-label="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a
                            href="#"
                            class="hover:text-yellow-400 transition"
                            aria-label="Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a
                            href="#"
                            class="hover:text-yellow-400 transition"
                            aria-label="LinkedIn">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a
                            href="#"
                            class="hover:text-yellow-400 transition"
                            aria-label="Dribbble">
                            <i class="fab fa-dribbble"></i>
                        </a>
                        <a
                            href="#"
                            class="hover:text-yellow-400 transition"
                            aria-label="Behance">
                            <i class="fab fa-behance"></i>
                        </a>
                    </div>
                </div>
                <div>
                    <h3 class="font-semibold text-black mb-4">Navigasi</h3>
                    <ul class="space-y-2">
                        <li>
                            <a href="#" class="hover:text-yellow-400 transition"
                                >Beranda</a
                            >
                        </li>
                        <li>
                            <a href="#" class="hover:text-yellow-400 transition"
                                >Galeri</a
                            >
                        </li>
                        <li>
                            <a href="#" class="hover:text-yellow-400 transition"
                                >Tentang</a
                            >
                        </li>
                        <li>
                            <a href="#" class="hover:text-yellow-400 transition"
                                >Kontak</a
                            >
                        </li>
                        <li>
                            <a href="#" class="hover:text-yellow-400 transition"
                                >FAQ</a
                            >
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold text-black mb-4">Eksplorasi</h3>
                    <ul class="space-y-2">
                        <li>
                            <a href="#" class="hover:text-yellow-400 transition"
                                >UI/UX</a
                            >
                        </li>
                        <li>
                            <a href="#" class="hover:text-yellow-400 transition"
                                >Efek GSAP</a
                            >
                        </li>
                        <li>
                            <a href="#" class="hover:text-yellow-400 transition"
                                >Halaman Utama</a
                            >
                        </li>
                        <li>
                            <a href="#" class="hover:text-yellow-400 transition"
                                >Mikrointeraksi</a
                            >
                        </li>
                        <li>
                            <a href="#" class="hover:text-yellow-400 transition"
                                >Tipografi</a
                            >
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold text-black mb-4">Kolaborasi</h3>
                    <ul class="space-y-2">
                        <li>
                            <a href="#" class="hover:text-yellow-400 transition"
                                >Kirim Karya</a
                            >
                        </li>
                        <li>
                            <a href="#" class="hover:text-yellow-400 transition"
                                >Gabung Kurator</a
                            >
                        </li>
                        <li>
                            <a href="#" class="hover:text-yellow-400 transition"
                                >Sponsor & Iklan</a
                            >
                        </li>
                        <li>
                            <a href="#" class="hover:text-yellow-400 transition"
                                >Mitra Media</a
                            >
                        </li>
                    </ul>
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <h3 class="font-semibold text-black mb-4">Newsletter</h3>
                    <p class="text-neutral-500 mb-3">
                        Dapatkan kurasi terbaik tiap pekan langsung ke kotak
                        masuk Tuan.
                    </p>
                    <div class="flex items-center gap-2">
                        <input
                            type="email"
                            placeholder="Email Tuan..."
                            class="w-full px-3 py-2 border border-neutral-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-black" />
                        <button
                            class="px-4 py-2 bg-black text-white text-sm rounded-md hover:bg-yellow-400 hover:text-black transition">
                            Kirim
                        </button>
                    </div>
                </div>
            </div>
            <div
                class="relative z-10 border-t border-neutral-200 text-center py-4 text-xs text-neutral-400">
                © 2025 TARA. Dirakit dengan semangat di bumi Nusantara.
                Estetika, teknologi, dan visi Tuan menyatu.
            </div>
        </footer>

    <script>
      // Data Artikel
      const articles = [
        {
          id: 1,
          title: "Wawancara: Kerennya Karya Anak Muda",
          category: "wawancara",
          description: "Inspirasi dari kreator muda Indonesia",
          image: "https://picsum.photos/600/400?blog1",
          date: "10 Jul 2025",
          views: Math.floor(Math.random() * 1000),
        },
        {
          id: 2,
          title: "Tutorial: Membuat Animasi GSAP",
          category: "tutorial",
          description: "Pelajari trik animasi modern",
          image: "https://picsum.photos/600/400?blog2",
          date: "8 Jul 2025",
          views: Math.floor(Math.random() * 1000),
        },
        {
          id: 3,
          title: "Tips: Desain UI yang Menarik",
          category: "tips",
          description: "Buat desain yang memukau dengan keren abis",
          image: "https://picsum.photos/600/400?blog3",
          date: "5 Jul 2025",
          views: Math.floor(Math.random() * 1000),
        },
        {
          id: 4,
          title: "Wawancara: Seniman Digital Nusantara",
          category: "wawancara",
          description: "Kisah kreator di balik karya digital",
          image: "https://picsum.photos/600/400?blog4",
          date: "2 Jul 2025",
          views: Math.floor(Math.random() * 1000),
        },
        {
          id: 5,
          title: "Tutorial: Coding Aplikasi Sederhana",
          category: "tutorial",
          description: "Bangun aplikasi dengan JavaScript",
          image: "https://picsum.photos/600/400?blog5",
          date: "28 Jun 2025",
          views: Math.floor(Math.random() * 1000),
        },
        {
          id: 6,
          title: "Tips: Menulis Puisi yang Menggugah",
          category: "tips",
          description: "Kiat menulis puisi bermakna",
          image: "https://picsum.photos/600/400?blog6",
          date: "25 Jun 2025",
          views: Math.floor(Math.random() * 1000),
        },
      ];

      // Pagination Variables
      const articlesPerPage = 6;
      let currentPage = 1;

      // Fungsi Render Artikel dengan Paginasi
      function renderArticles(category = "all", page = 1) {
        const blogPosts = document.getElementById("blog-posts");
        blogPosts.innerHTML = "";
        const filteredArticles =
          category === "all"
            ? articles
            : articles.filter((article) => article.category === category);
        const start = (page - 1) * articlesPerPage;
        const end = start + articlesPerPage;
        const paginatedArticles = filteredArticles.slice(start, end);

        paginatedArticles.forEach((article) => {
          blogPosts.innerHTML += `
                    <a href="detail_blog.html?id=${
                      article.id
                    }" class="blog-card hover-3d"> <!-- Updated link to detail page -->
                        <div class="inner flex flex-col h-full">
                            <img src="${article.image}" alt="${
            article.title
          }" class="w-full h-48 object-cover" />
                            <div class="blog-card-content">
                                <div class="content-main">
                                    <span class="inline-block px-2 py-1 bg-gray-100 text-xs text-gray-700 rounded-full mb-2">${
                                      article.category.charAt(0).toUpperCase() +
                                      article.category.slice(1)
                                    }</span>
                                    <h3 class="text-lg font-semibold text-black">${
                                      article.title
                                    }</h3>
                                    <p class="text-sm text-gray-700">${
                                      article.description
                                    }</p>
                                </div>
                                <div class="content-footer">
                                    <div class="flex items-center gap-4 text-xs text-gray-500">
                                        <span><i class="fas fa-calendar-alt mr-1"></i>${
                                          article.date
                                        }</span>
                                        <span><i class="fas fa-eye mr-1"></i>${
                                          article.views
                                        } Dilihat</span>
                                    </div>
                                    <div class="flex gap-3 mt-3">
                                        <button class="text-gray-700 text-xs hover:text-accent transition"><i class="fas fa-heart"></i> Suka</button>
                                        <button class="text-gray-700 text-xs hover:text-accent transition"><i class="fas fa-share"></i> Bagikan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                `;
        });

        // Animasi kartu setelah render, tanpa stagger untuk konsistensi
        gsap.from(".blog-card", {
          opacity: 0,
          y: 40,
          duration: 0.8,
          ease: "power3.out",
        });

        // Render Pagination
        renderPagination(filteredArticles.length, page, category);
      }

      // Fungsi Render Paginasi
      function renderPagination(totalArticles, page, category) {
        const totalPages = Math.ceil(totalArticles / articlesPerPage);
        const pageNumbers = document.getElementById("page-numbers");
        pageNumbers.innerHTML = "";

        for (let i = 1; i <= totalPages; i++) {
          pageNumbers.innerHTML += `
                    <button class="pagination-button ${
                      i === page ? "active" : ""
                    }" data-page="${i}">${i}</button>
                `;
        }

        // Update tombol Sebelumnya/Selanjutnya
        document.getElementById("prev-page").disabled = page === 1;
        document.getElementById("next-page").disabled = page === totalPages;

        // Event listener untuk tombol pagination
        document
          .querySelectorAll(".pagination-button[data-page]")
          .forEach((button) => {
            button.addEventListener("click", () => {
              currentPage = parseInt(button.dataset.page);
              renderArticles(category, currentPage);
              anime({
                targets: button,
                scale: [1, 1.1, 1],
                duration: 300,
                easing: "easeOutQuad",
              });
            });
          });

        // Event listener untuk tombol Sebelumnya
        document.getElementById("prev-page").addEventListener("click", () => {
          if (currentPage > 1) {
            currentPage--;
            renderArticles(category, currentPage);
            anime({
              targets: "#prev-page",
              scale: [1, 1.1, 1],
              duration: 300,
              easing: "easeOutQuad",
            });
          }
        });

        // Event listener untuk tombol Selanjutnya
        document.getElementById("next-page").addEventListener("click", () => {
          if (currentPage < totalPages) {
            currentPage++;
            renderArticles(category, currentPage);
            anime({
              targets: "#next-page",
              scale: [1, 1.1, 1],
              duration: 300,
              easing: "easeOutQuad",
            });
          }
        });
      }

      // Inisialisasi Artikel
      renderArticles();

      // Filter Kategori
      const filters = document.querySelectorAll(".category-filter");
      filters.forEach((filter) => {
        filter.addEventListener("click", () => {
          filters.forEach((f) => f.classList.remove("active"));
          filter.classList.add("active");
          currentPage = 1;
          renderArticles(filter.dataset.category, currentPage);
          anime({
            targets: filter,
            scale: [1, 1.1, 1],
            duration: 300,
            easing: "easeOutQuad",
          });
        });
      });

      // Animasi GSAP
      gsap.registerPlugin(ScrollTrigger);
      gsap.from("#hero-text", {
        opacity: 0,
        y: 60,
        duration: 1.2,
        ease: "power4.out",
      });
      gsap.from(".hero-image", {
        scale: 1.1,
        opacity: 0,
        duration: 1.5,
        ease: "power4.out",
      });
      gsap.utils
        .toArray("section:not(.filter-section)")
        .forEach((section, i) => {
          gsap.from(section, {
            opacity: 0,
            y: 60,
            duration: 1,
            ease: "power3.out",
            scrollTrigger: {
              trigger: section,
              start: "top 80%",
            },
            delay: i * 0.1,
          });
        });

      // Inisialisasi Particles.js
      particlesJS("particles-js", {
        particles: {
          number: { value: 40, density: { enable: true, value_area: 1000 } },
          color: { value: "#4b5563" },
          shape: { type: "circle" },
          opacity: { value: 0.3, random: false },
          size: { value: 2, random: false },
          line_linked: { enable: false },
          move: {
            enable: true,
            speed: 0.4,
            direction: "top",
            random: false,
            straight: false,
            out_mode: "out",
          },
        },
        interactivity: {
          events: {
            onhover: { enable: true, mode: "repulse" },
            onclick: { enable: false },
          },
          modes: {
            repulse: { distance: 100, duration: 0.4 },
          },
        },
        retina_detect: true,
      });

      // Load More (Simulasi)
      document.getElementById("load-more").addEventListener("click", () => {
        articles.push({
          id: articles.length + 1,
          title: `Artikel Baru ${articles.length + 1}`,
          category: ["wawancara", "tutorial", "tips"][
            Math.floor(Math.random() * 3)
          ],
          description: "Inspirasi baru untuk kreativitas",
          image: `https://picsum.photos/600/400?blog${articles.length + 1}`,
          date: "18 Jul 2025",
          views: Math.floor(Math.random() * 1000),
        });
        // Sembunyikan tombol load more dan tampilkan paginasi
        gsap.to("#load-more-container", {
          opacity: 0,
          duration: 0.5,
          ease: "power2.out",
          onComplete: () => {
            document.getElementById("load-more-container").style.display =
              "none";
            document.getElementById("pagination").classList.remove("hidden");
            gsap.from("#pagination", {
              opacity: 0,
              y: 20,
              duration: 0.5,
              ease: "power2.out",
            });
          },
        });
        // Animasi fade out untuk section CTA
        gsap.to("#cta-section", {
          opacity: 0,
          duration: 0.5,
          ease: "power2.out",
          onComplete: () => {
            document.getElementById("cta-section").style.display = "none";
          },
        });
        // Render artikel dengan paginasi
        renderArticles(
          document.querySelector(".category-filter.active")?.dataset.category ||
            "all",
          currentPage
        );
        // Animasi tombol load more
        anime({
          targets: "#load-more",
          scale: [1, 1.1, 1],
          duration: 300,
          easing: "easeOutQuad",
        });
      });
    </script>
  </body>
</html>
