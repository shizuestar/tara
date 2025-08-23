<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Abstract Expressionism Exhibit - TARA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.2/anime.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <style>
      body {
        font-family: "Space Grotesk", sans-serif;
        background: #ffffff;
        color: #111827;
        box-sizing: border-box;
        overflow-x: hidden;
      }
      *, *::before, *::after {
        box-sizing: inherit;
      }
      #particles-js {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        opacity: 0.4;
      }
      .event-detail-container {
        opacity: 0;
        transform: translateY(20px);
      }
      .btn-primary {
        padding: 0.5rem 1.5rem;
        border-radius: 9999px;
        font-size: 0.9rem;
        font-weight: 500;
        background: #111827;
        color: #ffffff;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      }
      .btn-primary:hover {
        background: #374151;
      }
      .btn-preorder {
        padding: 0.75rem 2rem;
        border-radius: 9999px;
        font-size: 1rem;
        font-weight: 600;
        background: #facc15;
        color: #111827;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      }
      .btn-preorder:hover {
        background: #eab308;
        transform: scale(1.05);
      }
      .btn-comment {
        padding: 0.5rem 1.5rem;
        border-radius: 9999px;
        font-size: 0.9rem;
        font-weight: 500;
        background: #f3f4f6;
        color: #374151;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      }
      .btn-comment:hover {
        background: #e5e7eb;
        color: #1f2937;
      }
      .event-status {
        display: inline-block;
        padding: 0.3rem 0.8rem;
        border-radius: 9999px;
        font-size: 0.8rem;
        font-weight: 500;
      }
      .event-status.upcoming {
        background: #fef3c7;
        color: #92400e;
      }
      .gallery-container {
        position: relative;
        overflow: hidden;
      }
      .gallery-slider {
        display: flex;
        transition: transform 0.5s ease;
      }
      .gallery-image {
        transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        width: 100%;
        flex-shrink: 0;
      }
      .gallery-image:hover {
        transform: scale(1.05);
      }
      .gallery-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(17, 24, 39, 0.7);
        color: #ffffff;
        border: none;
        padding: 0.5rem;
        cursor: pointer;
        z-index: 10;
      }
      .gallery-btn-left {
        left: 0;
      }
      .gallery-btn-right {
        right: 0;
      }
      .map-container {
        border-radius: 0.75rem;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        border: 1px solid #e5e7eb;
      }
      .countdown-timer {
        font-family: "Space Grotesk", sans-serif;
        font-size: 1.2rem;
        color: #111827;
      }
      .organizer-info {
        border-top: 1px solid #e5e7eb;
        padding-top: 1.5rem;
      }
      .ticket-info {
        background: #f9fafb;
        padding: 1rem;
        border-radius: 0.5rem;
        border: 1px solid #e5e7eb;
      }
      .tag {
        display: inline-block;
        padding: 0.3rem 0.8rem;
        border-radius: 9999px;
        font-size: 0.8rem;
        font-weight: 500;
        background: #f3f4f6;
        color: #374151;
        border: 1px solid #e5e7eb;
        margin-right: 0.5rem;
        transition: background 0.3s ease;
      }
      .tag:hover {
        background: #e5e7eb;
      }
      .comment-section {
        border-top: 1px solid #e5e7eb;
        padding-top: 1.5rem;
      }
      .comment-form {
        display: flex;
        flex-direction: column;
        gap: 1rem;
      }
      .comment-form textarea {
        border: 1px solid #e5e7eb;
        border-radius: 0.5rem;
        padding: 0.5rem;
        resize: vertical;
        font-family: "Space Grotesk", sans-serif;
        color: #111827;
      }
      .comment {
        border-bottom: 1px solid #e5e7eb;
        padding: 1rem 0;
      }
      .social-share-btn {
        padding: 0.5rem 1rem;
        border-radius: 9999px;
        font-size: 0.9rem;
        font-weight: 500;
        border: 1px solid #e5e7eb;
        background: #f3f4f6;
        color: #374151;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      }
      .social-share-btn:hover {
        background: #e5e7eb;
        color: #1f2937;
      }
      @media (max-width: 767px) {
        .event-detail-container {
          padding: 1rem;
        }
        .btn-primary, .btn-comment, .social-share-btn {
          font-size: 0.75rem;
          padding: 0.4rem 1rem;
        }
        .btn-preorder {
          font-size: 0.85rem;
          padding: 0.5rem 1.5rem;
        }
        .event-status, .tag {
          font-size: 0.7rem;
        }
        .countdown-timer {
          font-size: 1rem;
        }
      }
    </style>
</head>
<body class="relative overflow-x-hidden">
    <div id="particles-js"></div>

    <!-- Header -->
    <header class="py-6 px-8 flex justify-between items-center bg-white border-b border-gray-200 z-40 fixed top-0 left-0 w-full">
      <div class="text-2xl font-bold uppercase tracking-wide">
        TARA<span class="text-[#facc15]">●</span>
      </div>
      <nav class="hidden md:flex space-x-6 text-sm text-gray-700">
        <a href="/" class="hover:text-gray-900 transition">Beranda</a>
        <a href="/eksplor" class="hover:text-gray-900 transition">Eksplor</a>
        <a href="/komunitas" class="hover:text-gray-900 transition">Komunitas</a>
        <a href="/proyek" class="hover:text-gray-900 transition">Proyek</a>
        <a href="/blog" class="hover:text-gray-900 transition">Blog</a>
        <a href="/agenda" class="hover:text-gray-900 transition font-semibold">Agenda</a>
        <a href="/profil" class="hover:text-gray-900 transition">Profil</a>
      </nav>
      <div class="flex items-center gap-4">
        <input type="text" placeholder="Cari event..." class="px-4 py-1.5 rounded-full bg-gray-100 text-sm text-gray-700 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-900 transition" />
        <a href="/login" class="btn-primary">Login</a>
        <button id="mobileMenuBtn" class="md:hidden text-gray-900 focus:outline-none" aria-label="Open mobile menu">
          <i class="fas fa-bars text-lg"></i>
        </button>
      </div>
    </header>

    <!-- Mobile Menu -->
    <div id="mobileMenuOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden opacity-0 transition-opacity duration-300"></div>
    <div id="mobileMenu" class="fixed top-0 right-0 w-64 h-full bg-white border-l border-gray-200 shadow-lg z-50 transform translate-x-full transition-transform duration-300 md:hidden">
      <div class="p-4 flex justify-end">
        <button id="closeMobileMenuBtn" class="text-gray-900 focus:outline-none" aria-label="Close mobile menu">
          <i class="fas fa-times text-lg"></i>
        </button>
      </div>
      <nav class="flex flex-col p-4 space-y-4">
        <a href="/" class="text-lg font-semibold text-gray-700 hover:text-gray-900 transition">Beranda</a>
        <a href="/eksplor" class="text-lg font-semibold text-gray-700 hover:text-gray-900 transition">Eksplor</a>
        <a href="/komunitas" class="text-lg font-semibold text-gray-700 hover:text-gray-900 transition">Komunitas</a>
        <a href="/proyek" class="text-lg font-semibold text-gray-700 hover:text-gray-900 transition">Proyek</a>
        <a href="/blog" class="text-lg font-semibold text-gray-700 hover:text-gray-900 transition">Blog</a>
        <a href="/agenda" class="text-lg font-semibold text-gray-700 hover:text-gray-900 transition">Agenda</a>
        <a href="/profil" class="text-lg font-semibold text-gray-700 hover:text-gray-900 transition">Profil</a>
        <hr class="border-gray-200" />
        <a href="/login" class="text-lg font-semibold text-gray-700 hover:text-gray-900 transition">Login</a>
      </nav>
    </div>

    <!-- Main Content -->
    <main class="pt-24 pb-12 bg-white">
      <div class="max-w-7xl mx-auto px-6">
        <div class="event-detail-container bg-white p-6 md:p-10 rounded-lg border border-gray-200 shadow-xl">
          <div id="event-detail-content" class="flex flex-col md:flex-row gap-6">
            <div class="w-full md:w-1/2 flex-shrink-0">
              <div class="gallery-container">
                <button class="gallery-btn gallery-btn-left"><i class="fas fa-chevron-left"></i></button>
                <div class="gallery-slider" id="gallerySlider">
                  <img src="https://images.unsplash.com/photo-1505322022379-7c3353ee6291?auto=compress&cs=tinysrgb&w=600" alt="Abstract Expressionism Exhibit" class="gallery-image" />
                  <img src="https://images.unsplash.com/photo-1540574163026-643ea20ade25?auto=compress&cs=tinysrgb&w=600" alt="Abstract Expressionism Exhibit" class="gallery-image" />
                  <img src="https://images.unsplash.com/photo-1513366208864-8752b8bd20ac?auto=compress&cs=tinysrgb&w=600" alt="Abstract Expressionism Exhibit" class="gallery-image" />
                </div>
                <button class="gallery-btn gallery-btn-right"><i class="fas fa-chevron-right"></i></button>
              </div>
            </div>
            <div class="w-full md:w-1/2">
              <span class="event-status upcoming mb-4">Upcoming</span>
              <h1 class="text-3xl md:text-4xl font-bold mb-4 text-gray-900">Abstract Expressionism Exhibit</h1>
              <p class="text-gray-700 mb-2"><i class="far fa-calendar-alt mr-2 text-[#facc15]"></i> <strong>Tanggal:</strong> 2025-07-25</p>
              <p class="text-gray-700 mb-2"><i class="far fa-clock mr-2 text-[#facc15]"></i> <strong>Waktu:</strong> 10:00 - 14:00 WIB</p>
              <p class="text-gray-700 mb-4"><i class="fas fa-map-marker-alt mr-2 text-[#facc15]"></i> <strong>Lokasi:</strong> TARA Gallery, Jakarta</p>
              <p class="text-gray-800 leading-relaxed mb-6">Jelajahi karya abstrak penuh warna dengan tur yang dipandu oleh kurator. Pameran ini menampilkan warna-warna berani dan bentuk dinamis dari seniman kontemporer terkemuka.</p>
              <a href="https://example.com/register-painting" target="_blank" class="btn-primary inline-flex items-center">
                <i class="fas fa-external-link-alt mr-2"></i> Daftar Sekarang!
              </a>
            </div>
          </div>
          <div class="mt-8 flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/agenda" class="btn-primary inline-flex items-center">
              <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar Event
            </a>
            <button id="shareBtn" class="btn-secondary inline-flex items-center">
              <i class="fas fa-share-alt mr-2"></i> Bagikan
            </button>
            <button id="bookmarkBtn" class="btn-secondary inline-flex items-center">
              <i class="far fa-bookmark mr-2"></i> Bookmark
            </button>
          </div>
          <div id="social-share" class="mt-4 flex gap-4 justify-center">
            <a href="https://twitter.com/intent/tweet?text=Abstract%20Expressionism%20Exhibit%20-%20Jelajahi%20karya%20abstrak%20penuh%20warna%20dengan%20tur%20yang%20dipandu%20oleh%20kurator.%20http://example.com/detail_event1.html" target="_blank" class="social-share-btn"><i class="fab fa-twitter mr-2"></i> Twitter</a>
            <a href="https://www.instagram.com/?url=http://example.com/detail_event1.html" target="_blank" class="social-share-btn"><i class="fab fa-instagram mr-2"></i> Instagram</a>
            <a href="https://api.whatsapp.com/send?text=Abstract%20Expressionism%20Exhibit%20-%20Jelajahi%20karya%20abstrak%20penuh%20warna%20dengan%20tur%20yang%20dipandu%20oleh%20kurator.%20http://example.com/detail_event1.html" target="_blank" class="social-share-btn"><i class="fab fa-whatsapp mr-2"></i> WhatsApp</a>
          </div>
          <!-- Additional Event Info -->
          <div id="event-additional-info" class="mt-10">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Informasi Tambahan</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div id="event-map" class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.309070928172!2d106.82199931525864!3d-6.222999995493392!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3f8a0a8a8e5%3A0x4f6f8a8e5a8a8e5!2sJakarta%20Convention%20Center!5e0!3m2!1sen!2sid!4v1669999999999" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
              </div>
              <div id="event-organizer-ticket" class="space-y-6">
                <div id="event-countdown" class="countdown-timer"></div>
                <div class="organizer-info">
                  <h3 class="text-lg font-semibold text-gray-900 mb-2">Penyelenggara</h3>
                  <p class="text-gray-700 mb-1"><strong>Nama:</strong> TARA Art Collective</p>
                  <p class="text-gray-700 mb-1"><strong>Email:</strong> <a href="mailto:events@tara-art.id" class="text-[#facc15] hover:underline">events@tara-art.id</a></p>
                  <p class="text-gray-700"><strong>Profil:</strong> <a href="/organizer/tara-art" class="text-[#facc15] hover:underline">Lihat Profil</a></p>
                </div>
                <div class="ticket-info">
                  <h3 class="text-lg font-semibold text-gray-900 mb-2">Harga Tiket</h3>
                  <p class="text-gray-700 mb-2">Rp 100.000</p>
                  <p class="text-gray-700 mb-2"><strong>Ketersediaan:</strong> <span class="event-status upcoming">Tersedia</span></p>
                  <button class="p-3 py-2 bg-yellow-500 text-white rounded-md items-center mt-2">
                    <i class="fas fa-ticket-alt mr-2"></i> Pre-Order Tiket
                  </button>
                </div>
              </div>
            </div>
            <div id="event-tags" class="mt-6">
              <h3 class="text-lg font-semibold text-gray-900 mb-2">Tag</h3>
              <div class="flex flex-wrap gap-2">
                <a href="/eksplor?tag=%23Painting" class="tag">#Painting</a>
                <a href="/eksplor?tag=%23AbstractArt" class="tag">#AbstractArt</a>
                <a href="/eksplor?tag=%23Exhibition" class="tag">#Exhibition</a>
              </div>
            </div>
          </div>
          <!-- Comment Section -->
          <div id="comment-section" class="mt-10 comment-section">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Komentar</h2>
            <div class="comment-form">
              <textarea id="commentInput" rows="4" placeholder="Tulis komentar Tuan..." class="w-full text-gray-700"></textarea>
              <button id="submitComment" class="p-4 bg-black text-white rounded-md items-center">
                <i class="fas fa-comment mr-2"></i> Kirim Komentar
              </button>
            </div>
            <div id="comments-list" class="mt-6">
              <div class="comment">
                <p class="text-gray-900 font-semibold">Pengunjung</p>
                <p class="text-gray-700">Acara ini sangat menarik! Saya menantikan tur kurator.</p>
                <p class="text-sm text-gray-600">20/07/2025, 10:00</p>
              </div>
              <div class="comment">
                <p class="text-gray-900 font-semibold">Seniman</p>
                <p class="text-gray-700">Senang bisa berpartisipasi. Galeri ini luar biasa!</p>
                <p class="text-sm text-gray-600">20/07/2025, 12:00</p>
              </div>
            </div>
          </div>
          <!-- Related Events -->
          <div id="related-events" class="mt-12">
          <h2 class="text-2xl font-bold text-gray-900 mb-6">Event Terkait</h2>
          <div id="related-events-list" class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <a href="detail_event.html?id=2"
              class="bg-white border border-gray-200 rounded-lg p-4 cursor-pointer transform transition duration-400 ease-in-out hover:-translate-y-1 hover:shadow-lg">
              <img src="https://images.unsplash.com/photo-1505322022379-7c3353ee6291?auto=compress&cs=tinysrgb&w=60"
                  alt="Modern Sculpture Exhibit"
                  class="w-full h-40 object-cover rounded-lg mb-4">
              <h3 class="text-lg font-semibold text-gray-900">Modern Sculpture Exhibit</h3>
              <p class="text-sm text-gray-600">2025-07-30 | 11:00 - 16:00 WIB</p>
              <p class="text-sm text-gray-600">Downtown Gallery, Surabaya</p>
            </a>

            <a href="detail_event.html?id=5"
              class="bg-white border border-gray-200 rounded-lg p-4 cursor-pointer transform transition duration-400 ease-in-out hover:-translate-y-1 hover:shadow-lg">
              <img src="https://images.unsplash.com/photo-1513366208864-8752b8bd20ac?auto=compress&cs=tinysrgb&w=600"
                  alt="Contemporary Painting Workshop"
                  class="w-full h-40 object-cover rounded-lg mb-4">
              <h3 class="text-lg font-semibold text-gray-900">Contemporary Painting Workshop</h3>
              <p class="text-sm text-gray-600">2025-08-15 | 13:00 - 16:00 WIB</p>
              <p class="text-sm text-gray-600">Online (via Webex)</p>
            </a>
          </div>
          </div>
        </div>
      </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 text-gray-700 text-sm">
      <div class="max-w-7xl mx-auto px-6 py-16 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-10">
        <div class="col-span-1 sm:col-span-2">
          <div class="text-2xl font-bold tracking-normal uppercase">
            TARA<span class="text-[#facc15]">●</span>
          </div>
          <p class="mt-4">Rumah bagi karya visual menawan, inovasi muda, dan estetika web masa depan.</p>
          <div class="flex gap-4 mt-4 text-gray-700 text-lg">
            <a href="#" class="hover:text-gray-900 transition" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
            <a href="#" class="hover:text-gray-900 transition" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
            <a href="#" class="hover:text-gray-900 transition" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
            <a href="#" class="hover:text-gray-900 transition" aria-label="Dribbble"><i class="fab fa-dribbble"></i></a>
            <a href="#" class="hover:text-gray-900 transition" aria-label="Behance"><i class="fab fa-behance"></i></a>
          </div>
        </div>
        <div>
          <h3 class="font-semibold text-gray-900 mb-4 uppercase">Navigasi</h3>
          <ul class="space-y-2">
            <li><a href="/" class="hover:text-gray-900 transition">Beranda</a></li>
            <li><a href="/eksplor" class="hover:text-gray-900 transition">Eksplor Karya</a></li>
            <li><a href="/komunitas" class="hover:text-gray-900 transition">Komunitas</a></li>
            <li><a href="/proyek" class="hover:text-gray-900 transition">Proyek Sosial</a></li>
            <li><a href="/blog" class="hover:text-gray-900 transition">Blog</a></li>
            <li><a href="/agenda" class="hover:text-gray-900 transition">Agenda</a></li>
          </ul>
        </div>
        <div>
          <h3 class="font-semibold text-gray-900 mb-4 uppercase">Eksplorasi</h3>
          <ul class="space-y-2">
            <li><a href="/eksplor?kategori=painting" class="hover:text-gray-900 transition">Painting</a></li>
            <li><a href="/eksplor?kategori=sculpture" class="hover:text-gray-900 transition">Sculpture</a></li>
            <li><a href="/eksplor?kategori=digital-art" class="hover:text-gray-900 transition">Digital Art</a></li>
            <li><a href="/eksplor?kategori=photography" class="hover:text-gray-900 transition">Photography</a></li>
          </ul>
        </div>
        <div>
          <h3 class="font-semibold text-gray-900 mb-4 uppercase">Kolaborasi</h3>
          <ul class="space-y-2">
            <li><a href="/proyek/submit" class="hover:text-gray-900 transition">Submit Karya</a></li>
            <li><a href="/komunitas/gabung" class="hover:text-gray-900 transition">Gabung Komunitas</a></li>
            <li><a href="/proyek/buat" class="hover:text-gray-900 transition">Buat Proyek</a></li>
            <li><a href="/kontak" class="hover:text-gray-900 transition">Kontak</a></li>
          </ul>
        </div>
        <div>
          <h3 class="font-semibold text-gray-900 mb-4 uppercase">Newsletter</h3>
          <p class="mb-3">Dapatkan inspirasi mingguan di kotak masuk Tuan.</p>
          <div class="flex items-center gap-2">
            <input type="email" placeholder="Email Tuan..." class="w-full px-3 py-2 border border-gray-200 rounded-md text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-900" />
            <button class="btn-primary">Kirim</button>
          </div>
        </div>
      </div>
      <div class="border-t border-gray-200 text-center py-4 text-xs text-gray-700">
        © 2025 TARA. Dirakit dengan semangat di bumi Nusantara.
        <a href="/tentang" class="hover:text-gray-900 transition">Tentang Kami</a> |
        <a href="/ketentuan" class="hover:text-gray-900 transition">Ketentuan Layanan</a> |
        <a href="/privasi" class="hover:text-gray-900 transition">Privasi</a> |
        <a href="/bantuan" class="hover:text-gray-900 transition">Bantuan</a>
      </div>
    </footer>

    <script>
      // Particles.js Initialization
      window.addEventListener("load", () => {
        particlesJS("particles-js", {
          particles: {
            number: { value: 50, density: { enable: true, value_area: 1000 } },
            color: { value: "#4B5563" },
            shape: { type: "circle" },
            opacity: { value: 0.4, random: true },
            size: { value: 2, random: true },
            line_linked: { enable: false },
            move: {
              enable: true,
              speed: 0.5,
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
      });

      // Mobile Menu Logic
      const mobileMenuBtn = document.getElementById("mobileMenuBtn");
      const closeMobileMenuBtn = document.getElementById("closeMobileMenuBtn");
      const mobileMenu = document.getElementById("mobileMenu");
      const mobileMenuOverlay = document.getElementById("mobileMenuOverlay");

      mobileMenuBtn.addEventListener("click", () => {
        mobileMenu.classList.remove("translate-x-full");
        mobileMenuOverlay.classList.remove("hidden");
        mobileMenuOverlay.classList.add("opacity-100");
        anime({
          targets: "#mobileMenu",
          translateX: [300, 0],
          easing: "easeOutQuad",
          duration: 300,
        });
      });

      closeMobileMenuBtn.addEventListener("click", closeMobileMenu);
      mobileMenuOverlay.addEventListener("click", closeMobileMenu);

      function closeMobileMenu() {
        anime({
          targets: "#mobileMenu",
          translateX: [0, 300],
          easing: "easeOutQuad",
          duration: 300,
          complete: () => {
            mobileMenu.classList.add("translate-x-full");
            mobileMenuOverlay.classList.remove("opacity-100");
            mobileMenuOverlay.classList.add("hidden");
          },
        });
      }

      // Gallery Slider Logic
      const slider = document.getElementById("gallerySlider");
      let currentSlide = 0;
      const slides = slider.querySelectorAll(".gallery-image");
      const totalSlides = slides.length;
      const leftBtn = document.querySelector(".gallery-btn-left");
      const rightBtn = document.querySelector(".gallery-btn-right");

      leftBtn.addEventListener("click", () => {
        if (currentSlide > 0) {
          currentSlide--;
          slider.style.transform = `translateX(-${currentSlide * 100}%)`;
        }
      });

      rightBtn.addEventListener("click", () => {
        if (currentSlide < totalSlides - 1) {
          currentSlide++;
          slider.style.transform = `translateX(-${currentSlide * 100}%)`;
        }
      });

      setInterval(() => {
        currentSlide = (currentSlide + 1) % totalSlides;
        slider.style.transform = `translateX(-${currentSlide * 100}%)`;
      }, 5000);

      // Countdown Timer
      function startCountdown() {
        const eventDate = new Date("2025-07-25");
        const countdown = setInterval(() => {
          const now = new Date();
          const distance = eventDate - now;
          if (distance < 0) {
            clearInterval(countdown);
            document.getElementById("event-countdown").innerHTML = '<p class="text-gray-700">Event telah dimulai!</p>';
            return;
          }
          const days = Math.floor(distance / (1000 * 60 * 60 * 24));
          const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          const seconds = Math.floor((distance % (1000 * 60)) / 1000);
          document.getElementById("event-countdown").innerHTML = `
            <div class="countdown-timer">
              <span>${days} Hari </span>
              <span>${hours} Jam </span>
              <span>${minutes} Menit </span>
              <span>${seconds} Detik</span>
            </div>
          `;
        }, 1000);
      }

      // Share Button Logic
      document.getElementById("shareBtn").addEventListener("click", () => {
        const shareUrl = window.location.href;
        if (navigator.share) {
          navigator.share({
            title: "Abstract Expressionism Exhibit",
            text: "Jelajahi karya abstrak penuh warna dengan tur yang dipandu oleh kurator.",
            url: shareUrl,
          });
        } else {
          navigator.clipboard.writeText(shareUrl);
          anime({
            targets: "#shareBtn",
            scale: [1, 1.1, 1],
            backgroundColor: ["#F3F4F6", "#111827", "#F3F4F6"],
            color: ["#374151", "#FFFFFF", "#374151"],
            duration: 300,
            easing: "easeOutQuad",
          });
          alert("Link event telah disalin ke clipboard!");
        }
      });

      // Bookmark Button Logic
      document.getElementById("bookmarkBtn").addEventListener("click", () => {
        const isBookmarked = localStorage.getItem("bookmark_event1") === "true";
        localStorage.setItem("bookmark_event1", !isBookmarked);
        document.getElementById("bookmarkBtn").innerHTML = `
          <i class="${!isBookmarked ? "fas" : "far"} fa-bookmark mr-2"></i> ${!isBookmarked ? "Bookmarked" : "Bookmark"}
        `;
        anime({
          targets: "#bookmarkBtn",
          scale: [1, 1.1, 1],
          backgroundColor: ["#F3F4F6", "#111827", "#F3F4F6"],
          color: ["#374151", "#FFFFFF", "#374151"],
          duration: 300,
          easing: "easeOutQuad",
        });
      });

      // GSAP Animations
      document.addEventListener("DOMContentLoaded", () => {
        startCountdown();
        gsap.fromTo(
          ".event-detail-container",
          { opacity: 0, y: 20 },
          { opacity: 1, y: 0, duration: 1, ease: "power3.out", delay: 0.2 }
        );
        gsap.from(".gallery-image", {
          opacity: 0,
          scale: 0.9,
          duration: 0.8,
          stagger: 0.1,
          ease: "power3.out",
        });
        gsap.from(".event-detail-container h1, .event-detail-container p, .event-detail-container a, .event-detail-container button, .event-status", {
          opacity: 0,
          y: 20,
          duration: 0.8,
          stagger: 0.1,
          ease: "power3.out",
          delay: 0.4,
        });
        gsap.from("#event-additional-info > div > div, #event-tags", {
          opacity: 0,
          y: 20,
          duration: 0.8,
          stagger: 0.1,
          ease: "power3.out",
          scrollTrigger: {
            trigger: "#event-additional-info",
            start: "top 80%",
          },
        });
        gsap.from("#comment-section, #comment-section > div", {
          opacity: 0,
          y: 20,
          duration: 0.8,
          stagger: 0.1,
          ease: "power3.out",
          scrollTrigger: {
            trigger: "#comment-section",
            start: "top 80%",
          },
        });
        gsap.from(".event-card", {
          opacity: 0,
          y: 20,
          duration: 0.8,
          stagger: 0.1,
          ease: "power3.out",
          scrollTrigger: {
            trigger: "#related-events",
            start: "top 80%",
          },
        });
      });
    </script>
</body>
</html>