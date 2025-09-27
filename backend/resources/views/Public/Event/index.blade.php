<x-layout>
    <!-- Hero Section -->
    <section
      class="hero relative bg-cover bg-center"
      style="
        background-image: url('https://images.unsplash.com/photo-1540574163026-643ea20ade25?auto=compress&cs=tinysrgb&w=1260');
      "
    >
      <div
        class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center"
      >
        <div class="text-center text-white hero-content">
          <h1
            class="text-4xl md:text-6xl font-bold font-['Space Grotesk'] text-white mb-4"
          >
            TARA Art Showcase
          </h1>
          <p class="text-lg md:text-2xl mt-2 mb-6">
            Jelajahi Pameran & Acara Mendatang
          </p>
          <a
            href="#eventCardsList"
            class="mt-4 inline-block bg-black text-white px-8 py-3 rounded-full font-semibold hover:bg-gray-800 transition transform hover:scale-105"
            >Temukan Sekarang</a
          >
        </div>
      </div>
    </section>

    <main class="pt-24 flex flex-col md:flex-row min-h-screen px-4 relative bottom-36 md:bottom-28">
      <aside id="sidebar" class="w-full md:w-64 p-4">
        <button id="toggleSidebar" class="md:hidden text-black mb-4">
          <i class="fas fa-filter mr-2"></i>Filter
        </button>
        <div>
          <!-- Event Terbaru -->
          <div class="mb-8 border-b border-neutral-200 pb-4">
            <h3 class="text-lg font-bold mb-1 text-gradient">Event Terbaru</h3>
            <p class="text-xs text-neutral-600 mb-3">
              Ikuti pameran terkini untuk inspirasi seni
            </p>
            <ul class="space-y-2">
              @foreach($events->take(2) as $event)
                <li>
                  <a
                    href="{{ route('events.show', $event->id) }}"
                    class="block p-2 rounded-lg transition"
                  >
                    <p class="text-sm font-semibold text-black">{{ $event->title }}</p>
                    <p class="text-xs text-neutral-600 mt-1">
                      {{ $event->start_date->format('d M Y') }} · {{ $event->location }}
                    </p>
                  </a>
                </li>
              @endforeach
            </ul>
          </div>

          <!-- Sedang Berlangsung -->
          <div class="mb-8 border-b border-neutral-200 pb-4">
            <h3 class="text-lg font-bold mb-1 text-gradient">Sedang Berlangsung</h3>
            <p class="text-xs text-neutral-600 mb-3">
              Pameran yang sedang berlangsung
            </p>
            <ul class="space-y-2">
              @foreach($events->where('status', 'ongoing')->take(1) as $event)
                <li>
                  <a
                    href="{{ route('events.show', $event->id) }}"
                    class="block p-2 rounded-lg transition"
                  >
                    <p class="text-sm font-semibold text-black">{{ $event->title }}</p>
                    <p class="text-xs text-neutral-600 mt-1">
                      {{ $event->start_date->format('d M Y') }} · {{ $event->location }}
                    </p>
                  </a>
                </li>
              @endforeach
            </ul>
          </div>

          <!-- Kategori -->
          <div class="mb-8">
            <h3 class="text-lg font-bold mb-1 text-gradient">Kategori</h3>
            <p class="text-xs text-neutral-600 mb-3">Jelajahi berdasarkan jenis seni</p>
            <div class="flex flex-wrap gap-2">
              @foreach($categories as $category)
                <span class="filter-btn uppercase" data-filter-sidebar="{{ $category->name }}">{{ $category->name }}</span>
              @endforeach
              <span class="filter-btn uppercase" data-filter-sidebar="all">Semua</span>
            </div>
          </div>

          <!-- Featured Artist -->
          <div class="mb-8">
            <h3 class="text-lg font-bold mb-1 text-gradient">Featured Artist</h3>
            <p class="text-xs text-neutral-600 mb-3">
              Temui seniman unggulan kami
            </p>
            <a href="/artist-profile" class="block p-2 rounded-lg transition">
              <p class="text-sm font-semibold text-black">Anya Kovalenko</p>
              <p class="text-xs text-neutral-600 mt-1">Contemporary Painter</p>
            </a>
          </div>
        </div>
      </aside>

      <section class="flex-1 py-12 px-4 relative" id="eventCardsList">
        <div class="space-y-6" id="eventCardsContainer">
          @foreach($events as $event)
            <div class="event-card" data-event-id="{{ $event->id }}" data-category="{{ $event->category->name }}">
              <div class="card-image-wrapper">
                <img
                  src="{{ $event->image_path ? asset('storage/' . $event->image_path) : 'https://via.placeholder.com/600x400?text=Image+Not+Available' }}"
                  alt="{{ $event->title }}"
                  class="card-image"
                  loading="lazy"
                />
                <a href="{{ route('events.show', $event->id) }}" class="image-overlay">Lihat Pameran</a>
              </div>
              <div class="card-text">
                <h2 class="text-gradient">{{ $event->title }}</h2>
                <p class="flex items-center mb-1">
                  <i class="far fa-calendar-alt mr-2"></i>
                  <strong>Tanggal:</strong> {{ $event->start_date->format('d M Y') }}
                </p>
                <p class="flex items-center mb-1">
                  <i class="far fa-clock mr-2"></i>
                  <strong>Jam:</strong> {{ $event->time_start }} - {{ $event->time_end }}
                </p>
                <p class="flex items-center mb-2">
                  <i class="fas fa-map-marker-alt mr-2"></i>
                  <strong>Lokasi:</strong> {{ $event->location }}
                </p>
                <p>{{ Str::limit($event->description, 100) }}</p>
              </div>
            </div>
          @endforeach
        </div>
        <!-- Pagination -->
        <div class="pagination" id="pagination">
          {{ $events->links() }}
        </div>
      </section>
    </main>

    <!-- Event Modal -->
    <div id="eventModal" class="fixed inset-0 hidden">
      <div class="modal-content">
        <div class="flex justify-end">
          <button id="closeModalBtn" class="text-black hover:text-black transform hover:scale-110 transition" aria-label="Close modal">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </button>
        </div>
        <div id="modalContent" class="text-left">
          <img id="modalImage" src="" alt="" class="w-full h-40 object-cover rounded-lg mb-3" loading="lazy" />
          <h2 id="modalTitle" class="text-xl font-bold font-['Space Grotesk'] mb-3 text-gradient"></h2>
          <p id="modalDate" class="text-black mb-2 text-sm"></p>
          <p id="modalTime" class="text-black mb-2 text-sm"></p>
          <p id="modalLocation" class="text-black mb-3 text-sm"></p>
          <p id="modalDescription" class="text-black text-sm"></p>
        </div>
      </div>
    </div>

    @push('styles')
      <style>
        body {
          font-family: "Space Grotesk", sans-serif;
          background: #ffffff;
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
          content: "";
          position: fixed;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          background: url("https://www.transparenttextures.com/patterns/canvas.png");
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
          background: #ffffff;
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
          content: "Exhibit";
          position: absolute;
          top: 10px;
          z-index: 20;
          left: 10px;
          background: #000000;
          color: #ffffff;
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
          color: #ffffff;
          display: flex;
          align-items: center;
          justify-content: center;
          opacity: 0;
          transition: opacity 0.3s ease;
          border-radius: 8px;
          font-family: "Space Grotesk", sans-serif;
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
          font-family: "Space Grotesk", sans-serif;
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
          background: linear-gradient(180deg, #f9fafb 0%, #ffffff 100%);
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
          font-family: "Space Grotesk", sans-serif;
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
          background: #e5e5e5;
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
          background: #e5e5e5;
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
          background: #e5e5e5;
          color: #000000;
          transform: scale(1.05);
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
          font-family: "Space Grotesk", sans-serif;
        }

        .pagination button {
          background: #ffffff;
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
          color: #ffffff;
          transform: scale(1.05);
        }

        .pagination button.active {
          background: #000000;
          color: #ffffff;
        }

        .pagination button:disabled {
          opacity: 0.5;
          cursor: not-allowed;
        }

        /* Text Gradient Animation */
        .text-gradient {
          background: linear-gradient(135deg, #000000 0%, #4a4a4a 50%, #000000 100%);
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
            position: relative;
            z-index: 10;
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
    @endpush

    @push('scripts')
      <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.2/anime.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
      <script>
        // Initialize particles.js
        window.addEventListener("load", () => {
          particlesJS("particles-js", {
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

        // Filter Functionality
        const eventCards = document.querySelectorAll(".event-card");
        document.querySelectorAll("#sidebar .filter-btn").forEach((btn) => {
          btn.addEventListener("click", (e) => {
            const category = e.target.dataset.filterSidebar;
            eventCards.forEach((card) => {
              const isVisible =
                category === "all" || card.dataset.category === category;
              card.classList.toggle("hidden-by-filter", !isVisible);
              if (isVisible) {
                gsap.fromTo(
                  card,
                  { opacity: 0, y: 20 },
                  { opacity: 1, y: 0, duration: 0.4, ease: "power3.out" }
                );
              }
            });
          });
        });

        // Countdown Timer
        function addCountdownTimer() {
          eventCards.forEach((card) => {
            const dateStr = card
              .querySelector(".card-text p:nth-child(1)")
              .textContent.split(": ")[1];
            const eventDate = new Date(dateStr);
            const now = new Date();
            const timeDiff = eventDate - now;
            if (timeDiff > 0) {
              const daysLeft = Math.ceil(timeDiff / (1000 * 60 * 60 * 24));
              const countdown = document.createElement("p");
              countdown.className = "countdown";
              countdown.textContent = `${daysLeft} hari hingga pembukaan`;
              card.querySelector(".card-text").appendChild(countdown);
            }
          });
        }

        // Lightbox for Images
        document.querySelectorAll(".card-image").forEach((img) => {
          img.addEventListener("click", () => {
            const src = img.src;
            const lightbox = document.createElement("div");
            lightbox.className =
              "fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50";
            lightbox.innerHTML = `
              <img src="${src}" class="max-w-full max-h-full p-4" />
              <button class="absolute top-4 right-4 text-white text-2xl" aria-label="Close lightbox">×</button>
            `;
            document.body.appendChild(lightbox);
            lightbox
              .querySelector("button")
              .addEventListener("click", () => lightbox.remove());
          });
        });

        // GSAP Animations
        document.addEventListener("DOMContentLoaded", () => {
          gsap.fromTo(
            ".hero-content",
            { opacity: 0, scale: 0.9 },
            { opacity: 1, scale: 1, duration: 1, ease: "power3.out", delay: 0.5 }
          );
          gsap.fromTo(
            "#sidebar",
            { opacity: 0, x: -30 },
            { opacity: 1, x: 0, duration: 0.8, ease: "power3.out", delay: 0.1 }
          );
          gsap.fromTo(
            ".event-card",
            { opacity: 0, y: 40 },
            {
              opacity: 1,
              y: 0,
              duration: 0.8,
              ease: "power3.out",
              stagger: 0.15,
              delay: 0.2,
            }
          );
          gsap.fromTo(
            "footer",
            { opacity: 0, y: 30 },
            { opacity: 1, y: 0, duration: 0.8, ease: "power3.out", delay: 0.7 }
          );
          addCountdownTimer();
        });
      </script>
    @endpush
</x-layout>