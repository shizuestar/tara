<?php if (isset($component)) { $__componentOriginal1f9e5f64f242295036c059d9dc1c375c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1f9e5f64f242295036c059d9dc1c375c = $attributes; } ?>
<?php $component = App\View\Components\Layout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Layout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

  <div id="particles-js"></div>
  <!-- Notification Modal -->
  <div id="notification-modal" class="notification-modal">
    <i class="fas fa-times close-btn" onclick="toggleNotifications()"></i>
    <div class="p-6">
      <h2 class="text-2xl font-bold text-black mb-4" style="font-family: 'Space Grotesk', sans-serif">
        Notifikasi
      </h2>
      <div class="flex gap-2 mb-4">
        <button class="filter-btn active" data-filter="all">Semua</button>
        <button class="filter-btn" data-filter="unread">Belum Dibaca</button>
      </div>
      <button id="mark-all-read"
        class="px-4 py-2 bg-black text-white text-sm rounded-full hover:bg-gray-800 transition mb-4">
        Tandai Semua Dibaca
      </button>
      <div id="notification-list" class="space-y-4"></div>
    </div>
  </div>

  <!-- Hero Section -->
  <section class="relative hero-image perspective overflow-hidden"
    style="background-image: url('https://picsum.photos/1200/600?featured')">
    <div class="hero-overlay absolute inset-0"></div>
    <div id="hero-text" class="relative max-w-4xl mx-auto px-4 text-center text-white">
      <h1 class="text-4xl md:text-5xl font-bold tracking-tight" style="font-family: 'Space Grotesk', sans-serif">
        Galeri Kreatif Anak Muda<span class="text-accent align-middle ml-1">●</span>
      </h1>
      <p class="mt-4 text-lg leading-relaxed">
        Inspirasi wawancara, tutorial, dan tips Nusantara.
      </p>
      <a href="/blog/1"
        class="inline-block mt-6 px-6 py-3 bg-white text-black rounded-full font-semibold hover:bg-gray-100 transition">Jelajahi
        Galeri</a>
    </div>
  </section>

  <!-- Filter Kategori -->
  <section class="filter-section py-6 bg-white">
    <div class="max-w-7xl mx-auto px-6">
      <div class="flex justify-center gap-3 flex-wrap">
        <button
          class="category-filter px-4 py-2 rounded-full bg-gray-100 text-sm text-gray-700 font-semibold border border-gray-200 hover:bg-gray-200 transition active"
          data-category="all">
          Semua
        </button>
        <button
          class="category-filter px-4 py-2 rounded-full bg-gray-100 text-sm text-gray-700 font-semibold border border-gray-200 hover:bg-gray-200 transition"
          data-category="wawancara">
          Wawancara
        </button>
        <button
          class="category-filter px-4 py-2 rounded-full bg-gray-100 text-sm text-gray-700 font-semibold border border-gray-200 hover:bg-gray-200 transition"
          data-category="tutorial">
          Tutorial
        </button>
        <button
          class="category-filter px-4 py-2 rounded-full bg-gray-100 text-sm text-gray-700 font-semibold border border-gray-200 hover:bg-gray-200 transition"
          data-category="tips">
          Tips & Trik
        </button>
      </div>
    </div>
  </section>

  <!-- Daftar Artikel -->
  <section class="relative top-8 pb-32 bg-white">
    <div class="max-w-7xl mx-auto px-6">
      <div id="blog-posts" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6"></div>
      <div id="pagination" class="mt-16 text-center hidden">
        <button class="pagination-button" id="prev-page" disabled>
          Sebelumnya
        </button>
        <span id="page-numbers"></span>
        <button class="pagination-button" id="next-page">Selanjutnya</button>
      </div>
      <div id="load-more-container" class="mt-16 text-center">
        <button id="load-more"
          class="px-6 py-3 bg-black text-white rounded-full font-semibold hover:bg-gray-800 transition">
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
      <a href="/blog/submit"
        class="inline-block px-6 py-3 bg-black text-white rounded-full font-semibold hover:bg-gray-800 transition">Kirim
        Artikel</a>
    </div>
  </section>
  <?php $__env->startPush('styles'); ?>
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
      background: linear-gradient(to bottom,
          rgba(255, 255, 255, 0.1),
          rgba(0, 0, 0, 0.4));
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
  <?php $__env->stopPush(); ?>

  <?php $__env->startPush('scripts'); ?>
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
                    <a href="detail_blog.html?id=${article.id
          }" class="blog-card hover-3d"> <!-- Updated link to detail page -->
                        <div class="inner flex flex-col h-full">
                            <img src="${article.image}" alt="${article.title
          }" class="w-full h-48 object-cover" />
                            <div class="blog-card-content">
                                <div class="content-main">
                                    <span class="inline-block px-2 py-1 bg-gray-100 text-xs text-gray-700 rounded-full mb-2">${article.category.charAt(0).toUpperCase() +
          article.category.slice(1)
          }</span>
                                    <h3 class="text-lg font-semibold text-black">${article.title
          }</h3>
                                    <p class="text-sm text-gray-700">${article.description
          }</p>
                                </div>
                                <div class="content-footer">
                                    <div class="flex items-center gap-4 text-xs text-gray-500">
                                        <span><i class="fas fa-calendar-alt mr-1"></i>${article.date
          }</span>
                                        <span><i class="fas fa-eye mr-1"></i>${article.views
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
                    <button class="pagination-button ${i === page ? "active" : ""
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
  <?php $__env->stopPush(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1f9e5f64f242295036c059d9dc1c375c)): ?>
<?php $attributes = $__attributesOriginal1f9e5f64f242295036c059d9dc1c375c; ?>
<?php unset($__attributesOriginal1f9e5f64f242295036c059d9dc1c375c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1f9e5f64f242295036c059d9dc1c375c)): ?>
<?php $component = $__componentOriginal1f9e5f64f242295036c059d9dc1c375c; ?>
<?php unset($__componentOriginal1f9e5f64f242295036c059d9dc1c375c); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\lomba\tara\backend\resources\views/public/blog/index.blade.php ENDPATH**/ ?>