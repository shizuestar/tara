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
    <div class="cursor" id="cursor"></div>

    <div id="loadingScreen">
        <lottie-player src="https://lottie.host/2c7998e7-175a-45d7-baf5-7c3c890cfe8f/xzx2zjGCZk.json"
            background="transparent" speed="1" style="width: 200px; height: 200px;" loop autoplay></lottie-player>
        <p class="text-sm text-gray-500 animate-pulse">Memuat kreativitas terbaik...</p>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const loadingScreen = document.getElementById("loadingScreen");
            if (!sessionStorage.getItem("hasVisitedIndex")) {
                loadingScreen.classList.remove("hidden");
                setTimeout(() => {
                    loadingScreen.style.opacity = "0";
                    setTimeout(() => {
                        loadingScreen.classList.add("hidden");
                        sessionStorage.setItem("hasVisitedIndex", "true");
                        console.log("Loading selesai bro, sabun colek mode: ON!");
                    }, 500);
                }, 3000);
            } else {
                loadingScreen.classList.add("hidden");
                console.log("Udah mampir, ga usah loading lagi, santai bro!");
            }
        });
    </script>
    <!-- Notification Modal -->
    <div id="notification-modal" class="notification-modal">
        <i class="fas fa-times close-btn" onclick="toggleNotifications()"></i>
        <div class="p-6">
            <h2 class="text-2xl font-bold text-black mb-4" style="font-family: 'Space Grotesk', sans-serif;">Notifikasi
            </h2>
            <div class="flex gap-2 mb-4">
                <button class="filter-btn active" data-filter="all">Semua</button>
                <button class="filter-btn" data-filter="unread">Belum Dibaca</button>
            </div>
            <button id="mark-all-read"
                class="px-4 py-2 bg-black text-white text-sm rounded-full hover:bg-gray-800 transition mb-4">Tandai
                Semua Dibaca</button>
            <div id="notification-list" class="space-y-4"></div>
        </div>
    </div>

    <!-- Hero Section -->
    <section
        class="min-h-screen relative flex flex-col lg:flex-row items-center justify-between px-6 md:px-16 pt-40 pb-20 gap-20">
        <div class="geometric-shape shape-1 top-32 left-16"></div>
        <div class="geometric-shape shape-2 top-48 right-20"></div>
        <div class="geometric-shape shape-3 bottom-40 left-32"></div>
        <div class="geometric-shape shape-1 bottom-32 right-40" style="width: 60px; height: 60px"></div>

        <div class="hero-text flex-1 max-w-2xl z-10">
            <div class="mb-8 text-appear">
                <span
                    class="inline-block px-6 py-3 bg-gray-900 text-white rounded-full text-sm font-semibold uppercase tracking-wide">
                    ● Premium Showcase
                </span>
            </div>
            <h1 class="text-6xl md:text-8xl font-bold uppercase mb-10 leading-none tracking-tighter text-appear">
                <span class="text-gradient">Selamat</span><br />
                <span class="text-gradient">Datang di</span><br />
                <span class="inline-flex items-center gap-4 text-gray-900">
                    TARA
                    <div class="relative">
                        <span class="text-yellow-400 text-6xl md:text-7xl">●</span>
                        <span
                            class="absolute top-0 left-0 text-yellow-400 text-6xl md:text-7xl animate-ping-slow">●</span>
                    </div>
                </span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-600 mb-12 leading-relaxed max-w-xl text-appear">
                Platform showcase eksklusif untuk memamerkan karya kreatif terbaik
                dari talenta Indonesia.
            </p>
            <div class="flex flex-col sm:flex-row gap-6 mb-16 text-appear">
                <a href="/register"
                    class="button-primary px-10 py-5 text-white rounded-full font-bold text-lg uppercase tracking-wide">
                    Gabung Sekarang
                </a>
                <a href="/galeri"
                    class="button-secondary px-10 py-5 rounded-full font-bold text-lg uppercase tracking-wide">
                    <span>Jelajahi Karya</span>
                </a>
            </div>
            <div class="grid grid-cols-3 gap-8 pt-8 border-t-2 border-gray-200 text-appear">
                <div class="text-center">
                    <div class="stats-number text-4xl font-bold mb-3" data-target="1000">0</div>
                    <div class="text-gray-600 font-medium uppercase tracking-wide text-sm">
                        Karya Seni
                    </div>
                </div>
                <div class="text-center">
                    <div class="stats-number text-4xl font-bold mb-3" data-target="500">0</div>
                    <div class="text-gray-600 font-medium uppercase tracking-wide text-sm">
                        Kreator
                    </div>
                </div>
                <div class="text-center">
                    <div class="stats-number text-4xl font-bold mb-3" data-target="50000">0</div>

                    <div class="text-gray-600 font-medium uppercase tracking-wide text-sm">
                        Pengunjung
                    </div>
                </div>
            </div>
        </div>

        <div class="hero-gallery flex-1 max-w-2xl z-10 mt-0 lg:-mt-52">
            <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
                <div class="gallery-item col-span-1 row-span-2" style="--rotate-angle: -2deg; --sway-duration: 6s">
                    <div class="relative h-full overflow-hidden bg-gray-900 border-4 border-gray-200">

                        <img src="assets/img/digitalart.png" alt="Digital Art"
                            class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-500" />
                        <div class="image-overlay"></div>
                        <div class="absolute bottom-6 left-6 text-white z-20">
                            <div class="text-lg font-bold uppercase tracking-wide">
                                Digital Art
                            </div>
                            <div class="text-sm opacity-80">Premium Collection</div>
                        </div>
                    </div>
                </div>
                <div class="gallery-item col-span-1" style="--rotate-angle: 3deg; --sway-duration: 7s">
                    <div class="relative overflow-hidden bg-gray-900 aspect-square border-4 border-gray-200">
                        <img src="assets/img/photography.png" alt="Photography"
                            class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-500" />
                        <div class="image-overlay"></div>
                        <div class="absolute bottom-4 left-4 text-white z-20">
                            <div class="text-sm font-bold uppercase tracking-wide">
                                Photography
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gallery-item col-span-1" style="--rotate-angle: -1deg; --sway-duration: 5.5s">
                    <div class="relative overflow-hidden bg-gray-900 aspect-square border-4 border-gray-200">
                        <img src="assets/img/ilustration.png" alt="Illustration"
                            class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-500" />
                        <div class="image-overlay"></div>
                        <div class="absolute bottom-4 left-4 text-white z-20">
                            <div class="text-sm font-bold uppercase tracking-wide">
                                Illustration
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gallery-item col-span-2" style="--rotate-angle: 2deg; --sway-duration: 6.5s">
                    <div class="relative overflow-hidden bg-gray-900 aspect-[2/1] border-4 border-gray-200">
                        <img src="assets/img/creativedesign.png" alt="Creative Design"
                            class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-500" />
                        <div class="image-overlay"></div>
                        <div class="absolute bottom-4 left-4 text-white z-20">
                            <div class="text-lg font-bold uppercase tracking-wide">
                                Creative Design
                            </div>
                            <div class="text-sm opacity-80">Featured Work</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 px-6 md:px-16 bg-white border-t-4 border-gray-200">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-20">
                <h2 class="text-5xl md:text-6xl font-bold text-gray-900 mb-8 uppercase tracking-tight">
                    Kategori Karya
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed">
                    Eksplorasi mendalam berbagai medium seni dari kreator terbaik
                    Indonesia
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <!-- Digital Art -->
                <div class="category-card p-10 text-center cursor-pointer group">
                    <div class="mb-6 text-black icon-3d flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 4l-6 8 6 8m4-16l6 8-6 8" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3 uppercase tracking-wide">Coding</h3>
                    <p class="text-gray-600 font-medium">120+ Karya Premium</p>
                </div>

                <!-- Photography -->
                <div class="category-card p-10 text-center cursor-pointer group">
                    <div class="mb-6 text-black icon-3d flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 7h4l1-2h8l1 2h4v13H3V7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3 uppercase tracking-wide">Photography</h3>
                    <p class="text-gray-600 font-medium">200+ Koleksi Eksklusif</p>
                </div>

                <!-- Illustration -->
                <div class="category-card p-10 text-center cursor-pointer group">
                    <div class="mb-6 text-black icon-3d flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 5l-4 4m0 0l-4 4m4-4L9 7m6 2l2 2m-2-2l4 4m-4-4l-2 2m0 0l-4 4m4-4l2 2m-2 2l-4 4m4-4l2 2" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3 uppercase tracking-wide">Illustration</h3>
                    <p class="text-gray-600 font-medium">150+ Karya Pilihan</p>
                </div>

                <!-- Design -->
                <div class="category-card p-10 text-center cursor-pointer group">
                    <div class="mb-6 text-black icon-3d flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path d="M12 20h9" />
                            <path d="M16.5 3.5a2.121 2.121 0 1 1 3 3L7 19l-4 1 1-4Z" />
                        </svg>

                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3 uppercase tracking-wide">Design</h3>
                    <p class="text-gray-600 font-medium">180+ Portfolio Terbaik</p>
                </div>
            </div>

        </div>
    </section>

    <section class="py-24 px-6 md:px-16 featured-bg relative">
        <div class="particle particle-1"></div>
        <div class="particle particle-2"></div>
        <div class="particle particle-3"></div>
        <div class="particle particle-4"></div>
        <div class="max-w-7xl mx-auto relative z-10">
            <div class="text-center mb-20">
                <h2 class="text-5xl md:text-6xl font-bold text-gradient uppercase tracking-tight text-appear">
                    Karya Unggulan
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed text-appear"
                    style="animation-delay: 0.2s">
                    Karya pilihan dari kreator Indonesia, digantung dengan penuh
                    keindahan
                </p>
            </div>
            <div class="flex justify-center mb-12">
                <div class="flex gap-4 flex-wrap justify-center">
                    <button
                        class="filter-button px-6 py-3 border-2 border-gray-200 rounded-full font-medium hover:bg-gray-900 hover:text-white transition">
                        Semua
                    </button>
                    <button
                        class="filter-button px-6 py-3 border-2 border-gray-200 rounded-full font-medium hover:bg-gray-900 hover:text-white transition">
                        Photography
                    </button>
                    <button
                        class="filter-button px-6 py-3 border-2 border-gray-200 rounded-full font-medium hover:bg-gray-900 hover:text-white transition">
                        Desain
                    </button>
                    <button
                        class="filter-button px-6 py-3 border-2 border-gray-200 rounded-full font-medium hover:bg-gray-900 hover:text-white transition">
                        Ilustrasi
                    </button>
                    <button
                        class="filter-button px-6 py-3 border-2 border-gray-200 rounded-full font-medium hover:bg-gray-900 hover:text-white transition">
                        Coding
                    </button>
                </div>
            </div>
            <div class="gallery-grid" id="gallery-grid"></div>
            <div class="text-center mt-12">
                <a href="/galeri"
                    class="button-primary px-10 py-5 text-white rounded-full font-bold text-lg uppercase tracking-wide">
                    Lihat Semua Karya
                </a>
            </div>
        </div>
        <script>
            const galleryData = [
                {
                    id: 1,
                    category: "Photography",
                    title: "Photography: focus",
                    author: "Aolon",
                    views: "1200",
                    image: "assets/img/photography2.png",
                    description: "Puisi tentang keindahan senja di tepi pantai, menggambarkan perasaan damai dan refleksi.",
                    rotateAngle: "-2deg",
                    ropeAngle: "-2deg",
                    swayDuration: "6s",
                    parallax: "0.2",
                },
                {
                    id: 2,
                    category: "Desain",
                    title: "Desain: Web",
                    author: "Budi",
                    views: "800",
                    image: "assets/img/design.png",
                    description: "Poster promosi dengan desain minimalis dan warna bold untuk acara seni lokal.",
                    rotateAngle: "3deg",
                    ropeAngle: "3deg",
                    swayDuration: "7s",
                    parallax: "0.15",
                },
                {
                    id: 3,
                    category: "Design",
                    title: "Design: UI/UX Mobile",
                    author: "Pandu",
                    views: "1500",
                    image: "assets/img/uiux.png",
                    description: "Lagu indie dengan nuansa akustik yang menggambarkan perjalanan hidup.",
                    rotateAngle: "-1deg",
                    ropeAngle: "-1deg",
                    swayDuration: "5.5s",
                    parallax: "0.25",
                },
                {
                    id: 4,
                    category: "Coding",
                    title: "Coding: Aplikasi",
                    author: "Dewi",
                    views: "900",
                    image: "assets/img/coding.png",
                    description: "Aplikasi Mobile dengan fitur modern.",
                    rotateAngle: "2deg",
                    ropeAngle: "2deg",
                    swayDuration: "6.5s",
                    parallax: "0.18",
                },
                {
                    id: 5,
                    category: "Ilustrasi",
                    title: "Ilustrasi: Manusia",
                    author: "Sari",
                    views: "1100",
                    image: "assets/img/ilustration.png",
                    description: "Ilustrasi Manusia menggunakan teknik countur.",
                    rotateAngle: "-3deg",
                    ropeAngle: "-3deg",
                    swayDuration: "6.8s",
                    parallax: "0.22",
                },
                {
                    id: 6,
                    category: "Photography",
                    title: "Photography: Potret",
                    author: "Joko",
                    views: "1300",
                    image: "assets/img/photography3.png",
                    description: "Potret manusia dengan ekspresi emosional dalam cahaya alami.",
                    rotateAngle: "1deg",
                    ropeAngle: "1deg",
                    swayDuration: "7.2s",
                    parallax: "0.17",
                },
                {
                    id: 7,
                    category: "UI/UX",
                    title: "UI/UX: Pengembangan Mobile App",
                    author: "Pandu",
                    views: "130JT",
                    image: "assets/img/uiux2.png",
                    description: "Pengembangan aplikasi berbasis mobile.",
                    rotateAngle: "1deg",
                    ropeAngle: "1deg",
                    swayDuration: "7.2s",
                    parallax: "0.17",
                },
                {
                    id: 8,
                    category: "Coding",
                    title: "Coding: Laravel 12",
                    author: "Joko",
                    views: "1300",
                    image: "assets/img/coding2.png",
                    description: "Belajar laravel 12.",
                    rotateAngle: "1deg",
                    ropeAngle: "1deg",
                    swayDuration: "7.2s",
                    parallax: "0.17",
                },
            ];

            document.addEventListener("DOMContentLoaded", () => {
                const galleryGrid = document.getElementById("gallery-grid");

                galleryData.forEach((item) => {
                    const galleryItem = document.createElement("div");
                    galleryItem.className = "gallery-item";
                    galleryItem.id = `gallery-${item.id}`; // element id unik
                    galleryItem.dataset.id = item.id;      // data-id numerik
                    galleryItem.dataset.category = item.category;
                    galleryItem.style.cssText = `--rotate-angle:${item.rotateAngle};--rope-angle:${item.ropeAngle};--sway-duration:${item.swayDuration};`;
                    galleryItem.setAttribute("data-parallax", item.parallax);

                    galleryItem.innerHTML = `
  <div class="rope"></div>
  <a href="/detail_galeri.html?id=project-${item.id}" class="block group">
    <div class="flip-card group-hover:scale-[1.01] transition">
      <div class="flip-card-front relative overflow-hidden bg-gray-900 aspect-[3/4] border-4 border-gray-200 rounded-2xl">
        <img src="${item.image}" alt="${item.title}" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700" />
        <div class="image-overlay"></div>
        <div class="absolute bottom-6 left-6 text-white z-20">
          <div class="text-lg font-bold uppercase tracking-wide">${item.title}</div>
          <div class="text-sm opacity-80">oleh ${item.author}</div>
          <div class="text-sm opacity-80">${item.views} views</div>
        </div>
      </div>
      <div class="flip-card-back flex flex-col items-center justify-center gap-4">
        <p class="text-gray-900 font-medium">${item.description}</p>
        <span class="text-blue-600 font-semibold group-hover:underline">Lihat Detail</span>
      </div>
    </div>
  </a>
`;


                    galleryGrid.appendChild(galleryItem);
                });

                /* ----------------------------------------------
                 * Detail link handler (gunakan id angka)
                 * ---------------------------------------------- */
                document.addEventListener("click", (e) => {
                    const link = e.target.closest('[data-detail-link]');
                    if (!link) return;
                    e.preventDefault();
                    const parentItem = link.closest('.gallery-item');
                    if (!parentItem) return;
                    const id = parentItem.dataset.id;
                    goToDetail(id);
                });
            });

            // navigate to detail page
            function goToDetail(id) {
                window.location.href = `/detail.html/${id}`;

            }
        </script>
    </section>

    <!-- Community Section -->
    <section id="komunitas" class="py-32 px-6 bg-white relative overflow-hidden">
        <div class="absolute inset-0 pointer-events-none">
            <div class="particle particle-1"></div>
            <div class="particle particle-2"></div>
            <div class="particle particle-3"></div>
        </div>
        <div class="max-w-7xl mx-4 relative z-10">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div>
                    <h2 class="text-6xl md:text-8xl font-bold text-gray-900 mb-10 uppercase tracking-tight text-appear">
                        Komunitas <span class="text-gradient">Kreatif</span>
                    </h2>
                    <p class="text-2xl text-gray-600 mb-10 leading-relaxed text-appear">
                        Bergabunglah dengan jiwa-jiwa kreatif Indonesia, berkolaborasi,
                        dan wujudkan inspirasi bersama.
                    </p>
                    <div class="space-y-8">
                        <div class="flex items-start gap-6 text-appear">
                            <div
                                class="w-12 h-12 bg-gray-900 text-white rounded-full flex items-center justify-center font-bold text-xl">
                                1
                            </div>
                            <div>
                                <h4 class="font-semibold text-xl mb-3">
                                    Ruang Diskusi Hidup
                                </h4>
                                <p class="text-gray-600 leading-relaxed">
                                    Tukar ide, dapatkan masukan, dan ikuti tren seni serta
                                    teknologi.
                                </p>
                            </div>
                        </div>
                        <div class="flex items-start gap-6 text-appear">
                            <div
                                class="w-12 h-12 bg-gray-900 text-white rounded-full flex items-center justify-center font-bold text-xl">
                                2
                            </div>
                            <div>
                                <h4 class="font-semibold text-xl mb-3">Workshop & Event</h4>
                                <p class="text-gray-600 leading-relaxed">
                                    Ikuti sesi pengembangan keterampilan dan pameran karya yang
                                    menginspirasi.
                                </p>
                            </div>
                        </div>
                        <div class="flex items-start gap-6 text-appear">
                            <div
                                class="w-12 h-12 bg-gray-900 text-white rounded-full flex items-center justify-center font-bold text-xl">
                                3
                            </div>
                            <div>
                                <h4 class="font-semibold text-xl mb-3">Jaringan Keren</h4>
                                <p class="text-gray-600 leading-relaxed">
                                    Terhubung dengan kreator dari berbagai penjuru dengan visi
                                    unik.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-10 text-appear">
                        <a href="/komunitas"
                            class="button-primary px-12 py-5 text-white rounded-full font-bold text-xl uppercase tracking-wide">
                            Join the Movement
                        </a>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-8">
                    <div class="gallery-item bg-white rounded-3xl shadow-xl p-8 animate-float"
                        style="--rotate-angle: -2deg; --sway-duration: 6s">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-full">
                            </div>
                            <div>
                                <div class="font-semibold text-lg">Aisyah R.</div>
                                <div class="text-sm text-gray-600">Poet, Jakarta</div>
                            </div>
                        </div>
                        <p class="text-gray-700 text-base">
                            "TARA membawa puisiku ke panggung yang lebih luas. Komunitas ini
                            seperti keluarga!"
                        </p>
                    </div>
                    <div class="gallery-item bg-white rounded-3xl shadow-xl p-8 animate-float mt-12"
                        style="--rotate-angle: 2deg; --sway-duration: 7s">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full">
                            </div>
                            <div>
                                <div class="font-semibold text-lg">Budi S.</div>
                                <div class="text-sm text-gray-600">Developer, Bandung</div>
                            </div>
                        </div>
                        <p class="text-gray-700 text-base">
                            "Kolaborasi dengan seniman lain di TARA membuat proyekku hidup!"
                        </p>
                    </div>
                    <div class="gallery-item bg-white rounded-3xl shadow-xl p-8 animate-float"
                        style="--rotate-angle: -1deg; --sway-duration: 5.5s">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-pink-400 to-pink-600 rounded-full">
                            </div>
                            <div>
                                <div class="font-semibold text-lg">Maya L.</div>
                                <div class="text-sm text-gray-600">Designer, Yogyakarta</div>
                            </div>
                        </div>
                        <p class="text-gray-700 text-base">
                            "Dukungan komunitas TARA membuat desainku lebih berani dan
                            inovatif."
                        </p>
                    </div>
                    <div class="gallery-item bg-white rounded-3xl shadow-xl p-8 animate-float mt-12"
                        style="--rotate-angle: 3deg; --sway-duration: 6.5s">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-green-600 rounded-full">
                            </div>
                            <div>
                                <div class="font-semibold text-lg">Rizky A.</div>
                                <div class="text-sm text-gray-600">Musician, Surabaya</div>
                            </div>
                        </div>
                        <p class="text-gray-700 text-base">
                            "TARA menghubungkan saya dengan musisi lain untuk proyek
                            impian."
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="projects-section bg-base-50">
        <!-- Projects Header -->
        <div class="projects-header text-center px-4">
            <h1 class="projects-title text-7xl sm:text-8xl md:text-9xlxl font-bold uppercase">
                PROYEK SOSIAL
            </h1>
            <p class="projects-subtitle text-base sm:text-lg mt-4 text-gray-600">
                Kolaborasi lintas disiplin untuk menciptakan perubahan melalui seni dan teknologi yang menginspirasi
            </p>
        </div>


        <!-- Projects Grid -->
        <div class="projects-grid">
            <!-- Project Card 1 -->
            <div class="project-card">
                <div class="project-image">
                    <img src="https://picsum.photos/300/400?random=23" alt="Edukasi Digital" />
                    <div class="project-icon"><i class="fas fa-laptop-code"></i></div>
                </div>
                <div class="project-content">
                    <h3 class="project-title">Edukasi Digital</h3>
                    <div class="project-stats">12 Anggota • 3 Bulan</div>
                    <p class="project-description">
                        Platform pembelajaran daring yang revolusioner untuk anak-anak di daerah terpencil,
                        menggabungkan teknologi
                        AI dengan pendekatan humanis.
                    </p>
                    <p class="project-needs">Butuh: Developer, Desainer UI/UX</p>
                    <a href="/proyek-detail" class="project-join-btn">
                        Gabung Sekarang <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Project Card 2 -->
            <div class="project-card">
                <div class="project-image">
                    <img src="https://picsum.photos/250/250?random=24" alt="Kampanye Lingkungan" />
                    <div class="project-icon"><i class="fas fa-leaf"></i></div>
                </div>
                <div class="project-content">
                    <h3 class="project-title">Kampanye Lingkungan</h3>
                    <div class="project-stats">8 Anggota • 2 Bulan</div>
                    <p class="project-description">
                        Konten kreatif multi-platform untuk meningkatkan kesadaran lingkungan melalui
                        storytelling yang
                        powerful dan
                        visual yang memukau.
                    </p>
                    <p class="project-needs">Butuh: Penulis, Videografer</p>
                    <a href="/proyek-detail" class="project-join-btn">
                        Gabung Sekarang <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Project Card 3 -->
            <div class="project-card">
                <div class="project-image">
                    <img src="https://picsum.photos/250/250?random=25" alt="Musik untuk Amal" />
                    <div class="project-icon"><i class="fas fa-music"></i></div>
                </div>
                <div class="project-content">
                    <h3 class="project-title">Musik untuk Amal</h3>
                    <div class="project-stats">15 Anggota • 4 Bulan</div>
                    <p class="project-description">
                        Konser virtual immersive dengan teknologi VR untuk penggalangan dana pendidikan,
                        menggabungkan
                        musik,
                        teknologi, dan kemanusiaan.
                    </p>
                    <p class="project-needs">Butuh: Musisi, Produser</p>
                    <a href="/proyek-detail" class="project-join-btn">
                        Gabung Sekarang <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Project Card 4 -->
            <div class="project-card">
                <div class="project-image">
                    <img src="https://picsum.photos/500/250?random=26" alt="Kreativitas Digital" />
                    <div class="project-icon"><i class="fas fa-paint-brush"></i></div>
                </div>
                <div class="project-content">
                    <h3 class="project-title">Kreativitas Digital</h3>
                    <div class="project-stats">10 Anggota • 5 Bulan</div>
                    <p class="project-description">
                        Inisiatif untuk mengembangkan karya seni digital interaktif yang memadukan teknologi dan
                        kreativitas untuk
                        dampak sosial.
                    </p>
                    <p class="project-needs">Butuh: Animator, Desainer Grafis</p>
                    <a href="/proyek-detail" class="project-join-btn">
                        Gabung Sekarang <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Explore More -->
        <div class="projects-explore">
            <a href="/proyek" class="projects-explore-btn">
                <span>Jelajahi Semua Proyek</span> <i class="fas fa-compass text-black"></i>
            </a>
        </div>
    </section>


    <section class="blog-section">
        <div class="blog-header">
            <h2 class="blog-title">Blog & Artikel</h2>
            <p class="blog-subtitle">
                Eksplorasi mendalam tentang seni, desain, dan filosofi kreatif dari para visioner kontemporer
                yang
                membentuk
                masa depan estetika.
            </p>
        </div>

        <div class="carousel-container">
            <div class="blog-grid">
                <!-- Blog 1 -->
                <div class="blog-card">
                    <div class="blog-img-container">
                        <img src="https://picsum.photos/id/1018/450/350" alt="Arsitektur Imajinasi" class="blog-img" />
                    </div>
                    <div class="blog-content">
                        <h3 class="blog-content-title">Arsitektur Imajinasi</h3>
                        <p class="blog-description">
                            Menjelajahi batas antara realitas dan mimpi dalam desain arsitektur kontemporer.
                            Bagaimana
                            ruang dapat
                            menjadi kanvas untuk ekspresi jiwa manusia.
                        </p>
                        <a href="#" class="btn-outline">Eksplorasi <i>→</i></a>
                    </div>
                </div>
                <div class="blog-card">
                    <div class="blog-img-container">
                        <img src="https://picsum.photos/id/1018/450/350" alt="Arsitektur Imajinasi" class="blog-img" />
                    </div>
                    <div class="blog-content">
                        <h3 class="blog-content-title">Arsitektur Imajinasi</h3>
                        <p class="blog-description">
                            Menjelajahi batas antara realitas dan mimpi dalam desain arsitektur kontemporer.
                            Bagaimana
                            ruang dapat
                            menjadi kanvas untuk ekspresi jiwa manusia.
                        </p>
                        <a href="#" class="btn-outline">Eksplorasi <i>→</i></a>
                    </div>
                </div>
                <div class="blog-card">
                    <div class="blog-img-container">
                        <img src="https://picsum.photos/id/1018/450/350" alt="Arsitektur Imajinasi" class="blog-img" />
                    </div>
                    <div class="blog-content">
                        <h3 class="blog-content-title">Arsitektur Imajinasi</h3>
                        <p class="blog-description">
                            Menjelajahi batas antara realitas dan mimpi dalam desain arsitektur kontemporer.
                            Bagaimana
                            ruang dapat
                            menjadi kanvas untuk ekspresi jiwa manusia.
                        </p>
                        <a href="#" class="btn-outline">Eksplorasi <i>→</i></a>
                    </div>
                </div>
                <div class="blog-card">
                    <div class="blog-img-container">
                        <img src="https://picsum.photos/id/1018/450/350" alt="Arsitektur Imajinasi" class="blog-img" />
                    </div>
                    <div class="blog-content">
                        <h3 class="blog-content-title">Arsitektur Imajinasi</h3>
                        <p class="blog-description">
                            Menjelajahi batas antara realitas dan mimpi dalam desain arsitektur kontemporer.
                            Bagaimana
                            ruang dapat
                            menjadi kanvas untuk ekspresi jiwa manusia.
                        </p>
                        <a href="#" class="btn-outline">Eksplorasi <i>→</i></a>
                    </div>
                </div>

                <!-- Blog 2 -->
                <div class="blog-card">
                    <div class="blog-img-container">
                        <img src="https://picsum.photos/id/1025/450/350" alt="Puisi Digital" class="blog-img" />
                    </div>
                    <div class="blog-content">
                        <h3 class="blog-content-title">Puisi Digital</h3>
                        <p class="blog-description">
                            Transformasi kata menjadi pixel, di mana sastra bertemu teknologi. Sebuah revolusi
                            dalam
                            cara kita
                            memahami dan mengalami puisi di era digital.
                        </p>
                        <a href="#" class="btn-outline">Temukan <i>→</i></a>
                    </div>
                </div>

                <!-- Blog 3 -->
                <div class="blog-card">
                    <div class="blog-img-container">
                        <img src="https://picsum.photos/id/1043/450/350" alt="Monokrom Manifes" class="blog-img" />
                    </div>
                    <div class="blog-content">
                        <h3 class="blog-content-title">Monokrom Manifes</h3>
                        <p class="blog-description">
                            Kekuatan filosofis hitam dan putih dalam seni visual kontemporer. Minimalis bukan
                            berarti
                            sederhana,
                            melainkan esensi yang dimurnikan.
                        </p>
                        <a href="#" class="btn-outline">Selami <i>→</i></a>
                    </div>
                </div>

                <!-- Cloned Blog 1 -->
                <div class="blog-card">
                    <div class="blog-img-container">
                        <img src="https://picsum.photos/id/1018/450/350" alt="Arsitektur Imajinasi" class="blog-img" />
                    </div>
                    <div class="blog-content">
                        <h3 class="blog-content-title">Arsitektur Imajinasi</h3>
                        <p class="blog-description">
                            Menjelajahi batas antara realitas dan mimpi dalam desain arsitektur kontemporer.
                            Bagaimana
                            ruang dapat
                            menjadi kanvas untuk ekspresi jiwa manusia.
                        </p>
                        <a href="#" class="btn-outline">Eksplorasi <i>→</i></a>
                    </div>
                </div>

                <!-- Cloned Blog 2 -->
                <div class="blog-card">
                    <div class="blog-img-container">
                        <img src="https://picsum.photos/id/1025/450/350" alt="Puisi Digital" class="blog-img" />
                    </div>
                    <div class="blog-content">
                        <h3 class="blog-content-title">Puisi Digital</h3>
                        <p class="blog-description">
                            Transformasi kata menjadi pixel, di mana sastra bertemu teknologi. Sebuah revolusi
                            dalam
                            cara kita
                            memahami dan mengalami puisi di era digital.
                        </p>
                        <a href="#" class="btn-outline">Temukan <i>→</i></a>
                    </div>
                </div>

                <!-- Cloned Blog 3 -->
                <div class="blog-card">
                    <div class="blog-img-container">
                        <img src="https://picsum.photos/id/1043/450/350" alt="Monokrom Manifes" class="blog-img" />
                    </div>
                    <div class="blog-content">
                        <h3 class="blog-content-title">Monokrom Manifes</h3>
                        <p class="blog-description">
                            Kekuatan filosofis hitam dan putih dalam seni visual kontemporer. Minimalis bukan
                            berarti
                            sederhana,
                            melainkan esensi yang dimurnikan.
                        </p>
                        <a href="#" class="btn-outline">Selami <i>→</i></a>
                    </div>
                </div>
            </div>

            <div class="carousel-nav">
                <button class="carousel-btn prev">←</button>
                <button class="carousel-btn next">→</button>
            </div>
            <div class="carousel-dots">
                <span class="dot active" data-index="0"></span>
                <span class="dot" data-index="1"></span>
                <span class="dot" data-index="2"></span>
            </div>
            <br>
        </div>

        <div class="cta-section">
            <a href="/blog" class="btn-outline text-lg">Jelajahi Semua Karya <i>⟶</i></a>
        </div>
    </section>

    <!-- Agenda & Events Section -->
    <section id="agenda" class="py-40 px-6 relative overflow-hidden section-bg">
        <div class="max-w-7xl mx-auto relative z-10">
            <div class="text-center mb-28">
                <h2 class="text-7xl font-bold mb-10 uppercase tracking-tight text-glow">
                    Agenda & Events
                </h2>
                <div class="w-28 h-1 bg-gradient-to-r from-transparent via-gray-300 to-transparent mx-auto mb-10">
                </div>
                <p class="text-2xl text-gray-500 max-w-3xl mx-auto leading-relaxed">
                    Temukan acara seni dan kreativitas yang menginspirasi jiwa dan
                    memicu inovasi
                </p>
            </div>

            <div class="timeline-container">
                <div class="timeline-line"></div>

                <div class="timeline-item">
                    <div class="timeline-marker"></div>
                    <div class="event-card">
                        <div class="relative">
                            <img src="https://picsum.photos/900/600?random=1" alt="Webinar Desain"
                                class="event-image" />
                            <div class="event-image-overlay"></div>
                            <div class="event-date">10 Agustus 2025</div>
                            <div class="event-icon">
                                <i class="fas fa-video"></i>
                            </div>
                            <div class="event-content">
                                <h3 class="event-title">Webinar Desain Masa Depan</h3>
                                <span class="event-category">Digital Workshop</span>
                                <p class="event-description">
                                    Menyelami inovasi desain dan teknologi mutakhir bersama para
                                    maestro industri kreatif.
                                </p>
                                <a href="/event-detail" class="event-link">
                                    Daftar Sekarang
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-marker"></div>
                    <div class="event-card">
                        <div class="relative">
                            <img src="https://picsum.photos/900/600?random=2" alt="Pameran Seni" class="event-image" />
                            <div class="event-image-overlay"></div>
                            <div class="event-date">15 Agustus 2025</div>
                            <div class="event-icon">
                                <i class="fas fa-palette"></i>
                            </div>
                            <div class="event-content">
                                <h3 class="event-title">Pameran Seni Kontemporer</h3>
                                <span class="event-category">Art Exhibition</span>
                                <p class="event-description">
                                    Koleksi karya seni global yang memukau, merangkai cerita
                                    visual nan abadi.
                                </p>
                                <a href="/event-detail" class="event-link">
                                    Kunjungi Pameran
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-marker"></div>
                    <div class="event-card">
                        <div class="relative">
                            <img src="https://picsum.photos/900/600?random=3" alt="Lomba Kreatif" class="event-image" />
                            <div class="event-image-overlay"></div>
                            <div class="event-date">Setiap Minggu</div>
                            <div class="event-icon">
                                <i class="fas fa-trophy"></i>
                            </div>
                            <div class="event-content">
                                <h3 class="event-title">Lomba Kreativitas Mingguan</h3>
                                <span class="event-category">Creative Challenge</span>
                                <p class="event-description">
                                    Tantang kreativitas Anda dan rebut penghargaan dalam
                                    kompetisi mingguan yang dinamis.
                                </p>
                                <a href="/event-detail" class="event-link">
                                    Ikuti Lomba
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-marker"></div>
                    <div class="event-card">
                        <div class="relative">
                            <img src="https://picsum.photos/900/600?random=4" alt="Workshop Fotografi"
                                class="event-image" />
                            <div class="event-image-overlay"></div>
                            <div class="event-date">25 Agustus 2025</div>
                            <div class="event-icon">
                                <i class="fas fa-camera"></i>
                            </div>
                            <div class="event-content">
                                <h3 class="event-title">Workshop Fotografi Artistik</h3>
                                <span class="event-category">Photography Session</span>
                                <p class="event-description">
                                    Kuasai seni fotografi dengan bimbingan mentor berpengalaman
                                    dalam sesi praktik langsung.
                                </p>
                                <a href="/event-detail" class="event-link">
                                    Reservasi Tempat
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-24">
                <a href="/agenda"
                    class="button-primary px-12 py-5 text-white rounded-full font-bold text-xl uppercase tracking-wide">
                    Lihat Semua Agenda
                </a>
            </div>
        </div>
    </section>


    <hr>

    <!-- Spacer Section with Quote -->
    <section class="py-24 px-6 bg-gradient-to-b from-white to-gray-100 relative overflow-hidden fade-section">
        <div class="absolute inset-0 pointer-events-none">
            <div class="geometric-shape shape-3 top-12 left-28 opacity-15"></div>
            <div class="geometric-shape shape-1 bottom-16 right-32 opacity-15"></div>
            <div class="particle particle-1"></div>
            <div class="particle particle-4"></div>
        </div>
        <div class="max-w-7xl mx-auto relative z-10 text-center">
            <blockquote
                class="text-5xl md:text-5xl font-bold text-gray-900 italic leading-relaxed max-w-4xl mx-auto text-appear">
                "Kreativitas adalah <span class="text-gradient">keberanian</span> untuk melihat dunia secara
                berbeda."
            </blockquote>
            <p class="text-lg text-gray-600 mt-6 text-appear" style="animation-delay: 0.2s">
                – TARA Community
            </p>
            <div class="w-28 h-1 bg-gradient-to-r from-transparent via-gray-300 to-transparent mx-auto mt-8">
            </div>
        </div>
    </section>

    <hr>

    <!-- Join Now Section -->
    <section id="join-now" class="py-32 px-6 relative overflow-hidden section-bg fade-section">
        <div class="absolute inset-0 pointer-events-none">
            <div class="geometric-shape shape-1 top-16 left-20 opacity-20"></div>
            <div class="geometric-shape shape-2 bottom-20 right-28 opacity-20"></div>
            <div class="particle particle-1"></div>
            <div class="particle particle-2"></div>
            <div class="particle particle-3"></div>
        </div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,<svg xmlns=\" http://www.w3.org/2000/svg\" viewBox=\"0
            0 100 100\">
            <circle cx=\"20\" cy=\"20\" r=\"1\" fill=\"%23000000\" opacity=\"0.03\" />
            <circle cx=\"80\" cy=\"60\" r=\"1\" fill=\"%23000000\" opacity=\"0.02\" />
            <circle cx=\"40\" cy=\"80\" r=\"1\" fill=\"%23000000\" opacity=\"0.02\" /></svg>
        </div>
        <div class="max-w-7xl mx-auto relative z-10 text-center">
            <!-- Heading with Animation -->
            <h2 class="text-6xl md:text-8xl font-bold uppercase tracking-tight text-glow mb-10 text-appear">
                Bergabung <span class="text-gradient">Sekarang</span>
            </h2>
            <div class="w-28 h-1 bg-gradient-to-r from-transparent via-gray-300 to-transparent mx-auto mb-10">
            </div>
            <p class="text-2xl text-gray-500 max-w-3xl mx-auto leading-relaxed mb-12 text-appear"
                style="animation-delay: 0.2s">
                Jadilah bagian dari komunitas kreatif TARA! Kolaborasi, ciptakan, dan wujudkan visi seni Anda
                bersama
                kami.
            </p>

            <!-- CTA Buttons with Animation -->
            <div class="flex justify-center gap-6 flex-wrap">
                <a href="/join" id="join-button"
                    class="button-primary px-12 py-5 text-white rounded-full font-bold text-xl uppercase tracking-wide text-appear">
                    Gabung Sekarang
                </a>
                <a href="/learn_more"
                    class="button-secondary px-12 py-5 rounded-full font-bold text-xl uppercase tracking-wide text-appear">
                    <span>Pelajari Lebih Lanjut</span>
                </a>

            </div>
        </div>
    </section>


    <!-- FAQ Section -->
    <section class="py-28 px-8 bg-white relative overflow-hidden fade-section">
        <div class="absolute inset-0 pointer-events-none">
            <div class="geometric-shape shape-1 top-16 left-20 opacity-15"></div>
            <div class="geometric-shape shape-2 bottom-20 right-24 opacity-15"></div>
            <div class="particle particle-1"></div>
            <div class="particle particle-3"></div>
        </div>
        <div class="max-w-7xl mx-auto relative z-10 text-center">
            <h2 class="text-5xl md:text-6xl font-bold text-gray-900 mb-10 text-appear">
                Tanya <span class="text-gradient">Jawab</span>
            </h2>
            <div class="w-32 h-1 bg-gradient-to-r from-transparent via-gray-300 to-transparent mx-auto mb-12">
            </div>
            <div class="max-w-4xl mx-auto text-left">
                <div class="mb-6">
                    <button
                        class="faq-question text-2xl font-semibold text-gray-900 w-full text-left flex justify-between items-center cursor-pointer"
                        onclick="toggleAnswer(this)">
                        Apa itu TARA?
                        <span class="text-gray-600 text-3xl">+</span>
                    </button>
                    <p
                        class="faq-answer text-gray-600 mt-3 max-h-0 overflow-hidden transition-all duration-300 ease-in-out text-lg">
                        TARA adalah komunitas kreatif untuk seniman berkolaborasi dan mewujudkan visi seni.</p>
                </div>
                <div class="mb-6">
                    <button
                        class="faq-question text-2xl font-semibold text-gray-900 w-full text-left flex justify-between items-center cursor-pointer"
                        onclick="toggleAnswer(this)">
                        Bagaimana cara bergabung?
                        <span class="text-gray-600 text-3xl">+</span>
                    </button>
                    <p
                        class="faq-answer text-gray-600 mt-3 max-h-0 overflow-hidden transition-all duration-300 ease-in-out text-lg">
                        Klik "Gabung Sekarang" dan isi formulir sederhana di situs kami.</p>
                </div>
                <div class="mb-6">
                    <button
                        class="faq-question text-2xl font-semibold text-gray-900 w-full text-left flex justify-between items-center cursor-pointer"
                        onclick="toggleAnswer(this)">
                        Apa manfaat menjadi anggota?
                        <span class="text-gray-600 text-3xl">+</span>
                    </button>
                    <p
                        class="faq-answer text-gray-600 mt-3 max-h-0 overflow-hidden transition-all duration-300 ease-in-out text-lg">
                        Akses kolaborasi, acara seni, dan dukungan untuk karya Anda.</p>
                </div>
                <div class="mb-6">
                    <button
                        class="faq-question text-2xl font-semibold text-gray-900 w-full text-left flex justify-between items-center cursor-pointer"
                        onclick="toggleAnswer(this)">
                        Apakah ada biaya bergabung?
                        <span class="text-gray-600 text-3xl">+</span>
                    </button>
                    <p
                        class="faq-answer text-gray-600 mt-3 max-h-0 overflow-hidden transition-all duration-300 ease-in-out text-lg">
                        Bergabung gratis! Beberapa acara khusus mungkin berbayar.</p>
                </div>
                <div>
                    <button
                        class="faq-question text-2xl font-semibold text-gray-900 w-full text-left flex justify-between items-center cursor-pointer"
                        onclick="toggleAnswer(this)">
                        Bagaimana cara mengikuti acara TARA?
                        <span class="text-gray-600 text-3xl">+</span>
                    </button>
                    <p
                        class="faq-answer text-gray-600 mt-3 max-h-0 overflow-hidden transition-all duration-300 ease-in-out text-lg">
                        Daftar sebagai anggota dan ikuti info acara di situs atau media sosial kami.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CSS for Smooth Animation -->
    <style>
        .faq-answer {
            transition: max-height 0.3s ease-in-out, opacity 0.3s ease-in-out;
            opacity: 0;
        }

        .faq-answer.show {
            max-height: 100px;
            /* Sesuaikan dengan tinggi konten */
            opacity: 1;
        }
    </style>

    <!-- JavaScript for FAQ Toggle -->
    <script>
        function toggleAnswer(button) {
            const answer = button.nextElementSibling;
            const toggleIcon = button.querySelector('span');
            answer.classList.toggle('show');
            toggleIcon.textContent = answer.classList.contains('show') ? '−' : '+';
        }
    </script>

    <style>
        .fade-section {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }

        .fade-section.animate-in {
            opacity: 1;
            transform: translateY(0);
        }
    </style>

    <?php $__env->startPush('styles'); ?>
        <style>
        * {
            font-family: "Space Grotesk", sans-serif;
        }

        :root {
            --primary-black: #000000;
            --primary-white: #ffffff;
            --gray-light: #f5f6f5;
            --gray-dark: #1a1a1a;
            --accent-silver: #b0b0b0;
            --accent-platinum: #e5e5e5;
        }

        #loadingScreen {
            position: fixed;
            inset: 0;
            z-index: 9999;
            background: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 1.5rem;
            opacity: 1;
            transition: opacity 0.5s ease;
        }

        #loadingScreen.hidden {
            display: none;
        }

        /* Apply black and white filter to Lottie animation */
        lottie-player {
            filter: grayscale(100%);
        }

        .animate-pulse {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.5;
            }
        }

        .animate-ping-slow {
            animation: ping-slow 2s cubic-bezier(0, 0, 0.2, 1) infinite;
        }

        @keyframes ping-slow {
            0% {
                transform: scale(1);
                opacity: 1;
            }

            75%,
            100% {
                transform: scale(1.5);
                opacity: 0;
            }
        }

        .animate-float {
            animation: float 8s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-30px) rotate(5deg);
            }
        }

        .text-gradient {
            background: linear-gradient(135deg,
                    #000000 0%,
                    #4a4a4a 50%,
                    #000000 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            background-size: 200% 200%;
            animation: gradientShift 4s ease-in-out infinite;
        }

        @keyframes gradientShift {

            0%,
            100% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            transform: rotate(var(--rotate-angle)) translateY(0);
            animation: sway var(--sway-duration) ease-in-out infinite;
            perspective: 1000px;
        }

        @keyframes sway {

            0%,
            100% {
                transform: rotate(var(--rotate-angle)) translateY(0);
            }

            50% {
                transform: rotate(calc(var(--rotate-angle) + 2deg)) translateY(5px);
            }
        }

        .gallery-item::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg,
                    transparent,
                    rgba(255, 255, 255, 0.2),
                    transparent);
            transition: left 0.6s;
            z-index: 10;
        }

        .gallery-item:hover::before {
            left: 100%;
        }

        .gallery-item:hover {
            transform: translateY(-20px) scale(1.1) rotate(0deg);
            box-shadow: 0 40px 80px rgba(0, 0, 0, 0.5);
        }

        .gallery-item.active {
            transform: scale(1.2) rotate(0deg);
            z-index: 20;
            box-shadow: 0 50px 100px rgba(0, 0, 0, 0.6);
        }

        .rope {
            position: absolute;
            top: -30px;
            left: 50%;
            width: 2px;
            height: 30px;
            background: #4a4a4a;
            transform-origin: top;
            transform: rotate(var(--rope-angle));
            z-index: 5;
            animation: rope-sway var(--sway-duration) ease-in-out infinite;
        }

        @keyframes rope-sway {

            0%,
            100% {
                transform: rotate(var(--rope-angle));
            }

            50% {
                transform: rotate(calc(var(--rope-angle) + 1deg));
            }
        }

        .hero-bg {
            background: radial-gradient(circle at 20% 50%,
                    rgba(0, 0, 0, 0.05) 0%,
                    transparent 50%),
                radial-gradient(circle at 80% 20%,
                    rgba(0, 0, 0, 0.05) 0%,
                    transparent 50%),
                radial-gradient(circle at 40% 80%,
                    rgba(0, 0, 0, 0.05) 0%,
                    transparent 50%),
                linear-gradient(135deg, #ffffff 0%, #f8f8f8 100%);
        }

        .glass-effect {
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(0, 0, 0, 0.1);
        }

        .button-primary {
            background: linear-gradient(135deg, #000000 0%, #2a2a2a 100%);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .button-primary::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg,
                    transparent,
                    rgba(255, 255, 255, 0.1),
                    transparent);
            transition: left 0.6s;
        }

        .button-primary:hover::before {
            left: 100%;
        }

        .button-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
        }

        .button-secondary {
            background: linear-gradient(135deg, #ffffff 0%, #f5f5f5 100%);
            border: 2px solid #000000;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .button-secondary::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: #000000;
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
            color: white;
        }

        .button-secondary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        .geometric-shape {
            position: absolute;
            border: 2px solid rgba(0, 0, 0, 0.15);
            z-index: 0;
        }

        /* Main container */
        .projects-section {
            min-height: 100vh;
            position: relative;
            padding: 8rem 2rem 6rem;
            max-width: 1400px;
            margin: 0 auto;
            z-index: 1;
        }

        /* Projects header */
        .projects-header {
            text-align: center;
            margin-bottom: 10rem;
            position: relative;
            perspective: 1200px;
        }

        .projects-title {
            font-size: clamp(3rem, 10vw, 3rem);
            font-weight: 800;
            letter-spacing: -4px;
            margin-bottom: 2.5rem;
            position: relative;
            color: #1a1a1a;
            text-shadow: 3px 3px 15px rgba(0, 0, 0, 0.3);
            animation: titlePulse 3s ease-in-out infinite;
        }

        @keyframes titlePulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.02);
            }
        }

        .projects-title::after {
            content: '';
            position: absolute;
            bottom: -30px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: linear-gradient(90deg, transparent, #1a1a1a, transparent);
            opacity: 0;
            animation: fadeInLine 1.5s ease-out 0.8s forwards;
        }

        @keyframes fadeInLine {
            to {
                opacity: 1;
                width: 150px;
            }
        }

        .projects-subtitle {
            font-size: clamp(1.2rem, 2.8vw, 1.6rem);
            color: #333;
            max-width: 800px;
            margin: 0 auto;
            font-weight: 400;
            line-height: 1.8;
            opacity: 0;
            animation: fadeInUp 1.2s ease-out 0.6s forwards;
            background: rgba(255, 255, 255, 0.9);
            padding: 1rem 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        /* Projects grid */
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(250px, 1fr));
            gap: 3rem;
            margin-bottom: 8rem;
            perspective: 1500px;
        }

        /* Project cards */
        .project-card {
            position: relative;
            transform: rotate(var(--rotate-angle)) translateY(40px);
            opacity: 0;
            animation: cardFadeIn 1s ease-in-out forwards;
            z-index: 2;
        }

        .project-card:nth-child(1) {
            animation-delay: 0.3s;
            --rotate-angle: -2deg;
            --sway-duration: 6s;
            grid-column: 1 / 2;
            grid-row: 1 / 3;
        }

        .project-card:nth-child(2) {
            animation-delay: 0.5s;
            --rotate-angle: 3deg;
            --sway-duration: 7s;
            grid-column: 2 / 3;
            grid-row: 1 / 2;
        }

        .project-card:nth-child(3) {
            animation-delay: 0.7s;
            --rotate-angle: -1deg;
            --sway-duration: 5.5s;
            grid-column: 3 / 4;
            grid-row: 1 / 2;
        }

        .project-card:nth-child(4) {
            animation-delay: 0.9s;
            --rotate-angle: 2deg;
            --sway-duration: 6.5s;
            grid-column: 2 / 4;
            grid-row: 2 / 3;
        }

        @keyframes cardFadeIn {
            to {
                opacity: 1;
                transform: rotate(0deg) translateY(0);
            }
        }

        .project-card:hover {
            transform: translateY(-15px) scale(1.05) rotate(0deg);
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.3);
        }

        /* Card image */
        .project-image {
            position: relative;
            overflow: hidden;
            background: #e8e8e8;
            border: 4px solid #1a1a1a;
            border-radius: 12px;
            aspect-ratio: var(--aspect-ratio);
        }

        .project-card:nth-child(1) .project-image {
            aspect-ratio: 3/4;
        }

        .project-card:nth-child(2) .project-image,
        .project-card:nth-child(3) .project-image {
            aspect-ratio: 1/1;
        }

        .project-card:nth-child(4) .project-image {
            aspect-ratio: 2/1;
        }

        .project-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: all 0.7s ease;
            filter: grayscale(100%) contrast(1.3);
        }

        .project-card:hover .project-image img {
            transform: scale(1.1);
            filter: grayscale(0%) contrast(1);
        }

        /* Image overlay */
        .project-image::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg,
                    rgba(0, 0, 0, 0.4) 0%,
                    rgba(0, 0, 0, 0.2) 50%,
                    transparent 100%);
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .project-card:hover .project-image::after {
            opacity: 1;
        }

        /* Decorative icon */
        .project-icon {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 40px;
            height: 40px;
            background: radial-gradient(circle, #ffffff, transparent);
            border: 2px solid #1a1a1a;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: #1a1a1a;
            opacity: 0.6;
            transition: all 0.5s ease;
        }

        .project-card:hover .project-icon {
            transform: rotate(360deg) scale(1.2);
            opacity: 1;
            background: radial-gradient(circle, #1a1a1a, transparent);
            color: #ffffff;
        }

        /* Card content */
        .project-content {
            padding: 2rem;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(255, 255, 255, 0.9);
            border-top: 2px solid #1a1a1a;
            border-radius: 0 0 12px 12px;
            transition: transform 5s ease-in-out;
        }

        .project-title {
            font-size: 1.5rem;
            font-weight: 800;
            margin-bottom: 0.8rem;
            color: #1a1a1a;
            letter-spacing: -0.8px;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
        }

        .project-stats {
            font-size: 0.9rem;
            color: #333;
            margin-bottom: 1rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .project-stats::before {
            content: '\f0c0';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            font-size: 0.9rem;
            color: #1a1a1a;
        }

        .project-description {
            display: block;
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease, transform 0.6s ease;
            max-height: 0;
            overflow: hidden;
        }

        .project-card:hover .project-description {
            opacity: 1;
            transform: translateY(0);
            max-height: 500px;
        }

        .project-needs {
            font-size: 0.95rem;
            color: #1a1a1a;
            font-weight: 600;
            margin-bottom: 0.7rem;
            position: relative;
            padding-left: 20px;
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease, transform 0.6s ease;
            max-height: 0;
            overflow: hidden;
        }

        .project-card:hover .project-needs {
            opacity: 1;
            transform: translateY(0);
            max-height: 500px;
        }

        .project-needs::before {
            content: '\f005';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            color: #1a1a1a;
            font-size: 0.9rem;
        }

        /* Join button */
        .project-join-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 0.8rem 2rem;
            background: #1a1a1a;
            color: #ffffff;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 700;
            font-size: 0.9rem;
            letter-spacing: 0.8px;
            transition: all 0.5s ease;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        .project-join-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg,
                    transparent,
                    rgba(255, 255, 255, 0.2),
                    transparent);
            transition: left 0.6s ease;
        }

        .project-join-btn:hover::before {
            left: 100%;
        }

        .project-join-btn:hover {
            background: #333;
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4);
        }

        .project-join-btn i {
            font-size: 0A.9rem;
            transition: transform 0.5s ease;
        }

        .project-join-btn:hover i {
            transform: translateX(5px);
        }

        /* Explore section */
        .projects-explore {
            text-align: center;
            margin-top: 6rem;
        }

        .projects-explore-btn {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            padding: 1.3rem 3.5rem;
            font-size: 1 .3rem;
            font-weight: 700;
            color: #1a1a1a;
            text-decoration: none;
            border: 3px solid #1a1a1a;
            border-radius: 12px;
            transition: all 0.5s ease;
            letter-spacing: 1.2px;
            position: relative;
            overflow: hidden;
            background: #ffffff;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
            opacity: 0;
            animation: fadeInUp 1s ease-out 1.2s forwards;
        }

        .projects-explore-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: #1a1a1a;
            color: #ffffff;
            transition: left 0.5s ease;
        }

        .projects-explore-btn:hover::before {
            left: 0;
            color: #ffffff;
        }

        .projects-explore-btn span {
            position: relative;
            z-index: 1;
            transition: color 0.5s ease;
        }

        .projects-explore-btn:hover span {
            color: #ffffff !important;
        }

        .projects-explore-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            color: #ffffff !important;
        }

        .projects-explore-btn i {
            font-size: 1.2rem;
            transition: transform 0.5s ease;
        }

        .projects-explore-btn:hover i {
            transform: rotate(360deg);
        }

        .projects-explore-btn:hover .fa-compass {
            color: white;
            transition: 0.5s ease;
        }


        /* Responsive design */
        @media (max-width: 1024px) {
            .projects-grid {
                grid-template-columns: repeat(2, minmax(250px, 1fr));
            }

            .project-card:nth-child(1) {
                grid-column: 1 / 2;
                grid-row: 1 / 3;
            }

            .project-card:nth-child(2) {
                grid-column: 2 / 3;
                grid-row: 1 / 2;
            }

            .project-card:nth-child(3) {
                grid-column: 2 / 3;
                grid-row: 2 / 3;
            }

            .project-card:nth-child(4) {
                grid-column: 1 / 3;
                grid-row: 3 / 4;
            }
        }

        @media (max-width: 768px) {
            .projects-section {
                padding: 5rem 1.5rem 4rem;
            }

            .projects-grid {
                grid-template-columns: 1fr;
            }

            .project-card:nth-child(1),
            .project-card:nth-child(2),
            .project-card:nth-child(3),
            .project-card:nth-child(4) {
                grid-column: 1 / 2;
                grid-row: auto;
            }

            .project-content {
                padding: 1.5rem;
            }

            .projects-header {
                margin-bottom: 6rem;
            }

            .projects-title {
                font-size: clamp(3rem, 9vw, 6rem);
            }

            .project-image {
                height: 250px;
            }

            .project-card:nth-child(1) .project-image,
            .project-card:nth-child(2) .project-image,
            .project-card:nth-child(3) .project-image,
            .project-card:nth-child(4) .project-image {
                aspect-ratio: 3/4;
            }
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes containerFadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        /* Micro-interactions */
        .project-card {
            cursor: pointer;
            position: relative;
        }

        .project-card::after {
            content: '';
            position: absolute;
            top: -10px;
            right: -10px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(0, 0, 0, 0.3), transparent);
            opacity: 0;
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        .project-card:hover::after {
            opacity: 0.7;
            transform: scale(1.2);
        }

        .shape-1 {
            width: 120px;
            height: 120px;
            transform: rotate(45deg);
            animation: float 10s ease-in-out infinite;
        }

        .shape-2 {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            animation: float 12s ease-in-out infinite reverse;
        }

        .shape-3 {
            width: 100px;
            height: 100px;
            clip-path: polygon(50% 0%, 0% 100%, 100% 100%);
            animation: float 8s ease-in-out infinite;
            background: rgba(0, 0, 0, 0.05);
        }

        .image-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(45deg,
                    rgba(0, 0, 0, 0.9) 0%,
                    rgba(0, 0, 0, 0.4) 100%);
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .gallery-item:hover .image-overlay {
            opacity: 1;
        }

        .category-card {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 1px solid rgba(0, 0, 0, 0.1);
        }

        .category-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            border-color: #000000;
        }

        .stats-number {
            background: linear-gradient(135deg, #000000, #4a4a4a);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .text-appear {
            opacity: 0;
            transform: translateY(30px);
            animation: appear 1s ease forwards;
        }

        @keyframes appear {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .text-appear:nth-child(1) {
            animation-delay: 0.1s;
        }

        .text-appear:nth-child(2) {
            animation-delay: 0.2s;
        }

        .text-appear:nth-child(3) {
            animation-delay: 0.3s;
        }

        .text-appear:nth-child(4) {
            animation-delay: 0.4s;
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

        .featured-bg {
            background: linear-gradient(135deg,
                    #f9f5f2 0%,
                    #ffffff 45%,
                    #f3f0ec 100%);
            position: relative;
            overflow: hidden;
        }

        .particle {
            position: absolute;
            background: rgba(255, 215, 0, 0.4);
            border-radius: 50%;
            animation: drift 12s linear infinite;
        }

        .particle-1 {
            width: 25px;
            height: 25px;
            top: 5%;
            left: 10%;
        }

        .particle-2 {
            width: 15px;
            height: 15px;
            top: 60%;
            left: 70%;
            animation-delay: 4s;
        }

        .particle-3 {
            width: 20px;
            height: 20px;
            top: 30%;
            left: 40%;
            animation-delay: 8s;
        }

        .particle-4 {
            width: 18px;
            height: 18px;
            top: 80%;
            left: 20%;
            animation-delay: 2s;
        }

        @keyframes drift {
            0% {
                transform: translate(0, 0);
                opacity: 0.4;
            }

            50% {
                opacity: 0.7;
            }

            100% {
                transform: translate(120vw, 100vh);
                opacity: 0;
            }
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            perspective: 1200px;
            padding: 40px 0;
        }

        .flip-card {
            position: relative;
            width: 100%;
            height: 100%;
            transform-style: preserve-3d;
            transition: transform 0.6s;
        }

        .gallery-item.flipped .flip-card {
            transform: rotateY(180deg);
        }

        .flip-card-front,
        .flip-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            border-radius: 16px;
        }

        .flip-card-back {
            transform: rotateY(180deg);
            background: rgba(255, 255, 255, 0.95);
            padding: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .flip-card-back p {
            text-align: center;
            margin-bottom: 1rem;
        }

        .flip-card-back a {
            color: #2563eb;
            font-weight: 600;
            text-decoration: underline;
        }

        .category-card .icon-3d {
            filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.4));
            transition: transform 0.3s ease, filter 0.3s ease;
        }

        .category-card:hover .icon-3d {
            transform: scale(1.1) rotate(5deg);
            filter: drop-shadow(0 6px 12px rgba(0, 0, 0, 0.6));
        }

        /* Agenda Section Styles */
        .section-bg {
            background: linear-gradient(135deg,
                    var(--primary-white) 0%,
                    var(--gray-light) 100%);
            position: relative;
        }

        .section-bg::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="1" fill="%23000000" opacity="0.03"/><circle cx="80" cy="60" r="1" fill="%23000000" opacity="0.02"/><circle cx="40" cy="80" r="1" fill="%23000000" opacity="0.02"/></svg>');
            pointer-events: none;
        }

        .text-glow {
            background: linear-gradient(135deg,
                    var(--primary-black) 0%,
                    var(--gray-dark) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            position: relative;
        }

        .text-glow::after {
            content: attr(data-text);
            position: absolute;
            top: 0;
            left: 0;
            background: linear-gradient(135deg,
                    var(--accent-silver) 0%,
                    var(--accent-platinum) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .text-glow:hover::after {
            opacity: 1;
        }

        .timeline-container {
            position: relative;
            max-width: 1200px;
            margin: 0 auto;
            padding: 80px 0;
            min-height: 90vh;
            overflow: visible;
        }

        .timeline-line {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            top: -730px;
            bottom: 730px;
            width: 4px;
            background: linear-gradient(to bottom,
                    transparent 0%,
                    var(--accent-silver) 10%,
                    var(--primary-black) 50%,
                    var(--accent-platinum) 90%,
                    transparent 100%);
            z-index: 0;
        }

        .timeline-line::before,
        .timeline-line::after {
            content: "";
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: var(--accent-silver);
            box-shadow: 0 0 15px var(--accent-silver);
        }

        .timeline-line::before {
            top: -6px;
        }

        .timeline-line::after {
            bottom: -6px;
            background: var(--accent-platinum);
            box-shadow: 0 0 15px var(--accent-platinum);
        }

        .timeline-item {
            position: relative;
            margin-bottom: 140px;
            opacity: 0;
            transform: translateY(60px);
            transition: all 0.9s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .timeline-item.animate-in {
            opacity: 1;
            transform: translateY(0);
        }

        .timeline-item:nth-child(odd) {
            padding-right: calc(50% + 40px);
            text-align: right;
        }

        .timeline-item:nth-child(even) {
            padding-left: calc(50% + 40px);
            text-align: left;
        }

        .timeline-item:nth-child(1) {
            animation-delay: 0.2s;
        }

        .timeline-item:nth-child(2) {
            animation-delay: 0.4s;
        }

        .timeline-item:nth-child(3) {
            animation-delay: 0.6s;
        }

        .timeline-item:nth-child(4) {
            animation-delay: 0.8s;
        }

        .timeline-marker {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: var(--primary-white);
            border: 4px solid var(--primary-black);
            z-index: 2;
            transition: all 0.3s ease;
            box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.2);
        }

        .timeline-item:nth-child(odd) .timeline-marker {
            right: calc(50% - 12px);
        }

        .timeline-item:nth-child(even) .timeline-marker {
            left: calc(50% - 12px);
        }

        .timeline-item:hover .timeline-marker {
            transform: translateY(-50%) scale(1.2);
            background: var(--accent-silver);
            border-color: var(--primary-black);
            box-shadow: 0 0 0 8px rgba(176, 176, 176, 0.2);
        }

        .event-card {
            background: var(--primary-white);
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.08),
                0 4px 24px rgba(0, 0, 0, 0.04);
            transition: all 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            position: relative;
            border: 1px solid var(--gray-light);
        }

        .event-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg,
                    var(--accent-silver),
                    var(--accent-platinum),
                    var(--accent-silver));
            transform: scaleX(0);
            transition: transform 0.4s ease;
        }

        .event-card:hover::before {
            transform: scaleX(1);
        }

        .event-card:hover {
            transform: translateY(-10px) scale(1.03);
            box-shadow: 0 24px 72px rgba(0, 0, 0, 0.12),
                0 8px 48px rgba(0, 0, 0, 0.08);
        }

        .timeline-item:nth-child(odd) .event-card::after {
            content: "";
            position: absolute;
            right: -16px;
            top: 50%;
            transform: translateY(-50%) rotate(45deg);
            width: 24px;
            height: 24px;
            background: var(--primary-white);
            border-right: 2px solid var(--gray-light);
            border-bottom: 2px solid var(--gray-light);
        }

        .timeline-item:nth-child(even) .event-card::after {
            content: "";
            position: absolute;
            left: -16px;
            top: 50%;
            transform: translateY(-50%) rotate(45deg);
            width: 24px;
            height: 24px;
            background: var(--primary-white);
            border-left: 2px solid var(--gray-light);
            border-top: 2px solid var(--gray-light);
        }

        .event-image {
            width: 100%;
            height: 420px;
            object-fit: cover;
            transition: all 0.7s ease;
            filter: grayscale(100%) contrast(1.3) brightness(0.7);
            position: relative;
        }

        .event-card:hover .event-image {
            transform: scale(1.03);
            filter: grayscale(0%) contrast(1) brightness(1);
        }

        .event-image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg,
                    rgba(0, 0, 0, 0.6) 0%,
                    rgba(0, 0, 0, 0.3) 30%,
                    rgba(0, 0, 0, 0.15) 60%,
                    rgba(0, 0, 0, 0.5) 100%);
            transition: all 0.5s ease;
        }

        .event-card:hover .event-image-overlay {
            background: linear-gradient(135deg,
                    rgba(0, 0, 0, 0.2) 0%,
                    rgba(0, 0, 0, 0.1) 30%,
                    rgba(0, 0, 0, 0.05) 60%,
                    rgba(0, 0, 0, 0.2) 100%);
        }

        .event-date {
            position: absolute;
            top: 30px;
            left: 30px;
            background: linear-gradient(135deg,
                    var(--primary-black),
                    var(--gray-dark));
            color: var(--primary-white);
            padding: 10px 20px;
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            z-index: 10;
            transition: all 0.4s ease;
        }

        .event-card:hover .event-date {
            background: linear-gradient(135deg,
                    var(--accent-silver),
                    var(--accent-platinum));
            color: var(--primary-black);
            transform: translateY(-4px) scale(1.06);
        }

        .event-content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 50px 35px 35px;
            background: linear-gradient(to top,
                    rgba(0, 0, 0, 0.85) 0%,
                    rgba(0, 0, 0, 0.65) 60%,
                    transparent 100%);
            color: var(--primary-white);
            transform: translateY(25px);
            transition: all 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .event-card:hover .event-content {
            transform: translateY(0);
            background: linear-gradient(to top,
                    rgba(0, 0, 0, 0.9) 0%,
                    rgba(0, 0, 0, 0.75) 70%,
                    transparent 100%);
        }

        .event-icon {
            position: absolute;
            top: 30px;
            right: 30px;
            background: linear-gradient(135deg,
                    var(--accent-silver),
                    var(--accent-platinum));
            color: var(--primary-black);
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            box-shadow: 0 5px 15px rgba(176, 176, 176, 0.3);
            transition: all 0.5s ease;
            z-index: 10;
            border: 2px solid rgba(255, 255, 255, 0.15);
        }

        .event-card:hover .event-icon {
            transform: rotate(360deg) scale(1.12);
            box-shadow: 0 6px 25px rgba(176, 176, 176, 0.5);
            background: var(--primary-white);
        }

        .event-title {
            font-size: 2rem;
            font-weight: 800;
            color: var(--primary-white);
            margin-bottom: 12px;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            line-height: 1.2;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.7);
            transition: all 0.4s ease;
        }

        .event-card:hover .event-title {
            color: var(--accent-silver);
            text-shadow: 2px 2px 15px rgba(0, 0, 0, 0.8);
        }

        .event-category {
            display: inline-block;
            background: rgba(255, 255, 255, 0.1);
            color: var(--primary-white);
            backdrop-filter: blur(8px);
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 12px;
            border: 1px solid rgba(255, 255, 255, 0.15);
            transition: all 0.4s ease;
        }

        .event-card:hover .event-category {
            background: rgba(176, 176, 176, 0.15);
            color: var(--accent-silver);
            border-color: rgba(176, 176, 176, 0.3);
        }

        .event-description {
            color: rgba(255, 255, 255, 0.85);
            line-height: 1.7;
            margin-bottom: 25px;
            font-size: 1rem;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.6);
            transition: all 0.4s ease;
        }

        .event-card:hover .event-description {
            color: var(--primary-white);
        }

        .event-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--primary-white);
            background: linear-gradient(135deg,
                    var(--accent-silver),
                    var(--accent-platinum));
            padding: 12px 24px;
            border-radius: 25px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-decoration: none;
            transition: all 0.5s ease;
            position: relative;
            overflow: hidden;
            font-size: 0.9rem;
            box-shadow: 0 5px 15px rgba(176, 176, 176, 0.2);
            border: 1px solid transparent;
        }

        .event-link::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg,
                    transparent,
                    rgba(255, 255, 255, 0.2),
                    transparent);
            transition: left 0.6s;
        }

        .event-link:hover::before {
            left: 100%;
        }

        .event-link:hover {
            color: var(--primary-black);
            background: var(--primary-white);
            transform: translateY(-3px) scale(1.06);
            box-shadow: 0 6px 25px rgba(255, 255, 255, 0.3);
            border-color: var(--accent-silver);
        }

        @media (max-width: 768px) {
            .timeline-line {
                left: 30px;
            }

            .timeline-item {
                padding-left: 80px !important;
                padding-right: 20px !important;
                text-align: left !important;
            }

            .timeline-marker {
                left: 18px !important;
                right: auto !important;
            }

            .timeline-item:nth-child(odd) .event-card::after,
            .timeline-item:nth-child(even) .event-card::after {
                left: -16px;
                right: auto;
                transform: translateY(-50%) rotate(45deg);
                border-left: 2px solid var(--gray-light);
                border-top: 2px solid var(--gray-light);
                border-right: none;
                border-bottom: none;
            }
        }

        /* Main container */
        .blog-section {
            min-height: 100vh;
            padding: 8rem 1rem 6rem;
            max-width: 1600px;
            background: #ffffff !important;
            margin: 0 auto;
        }

        /* Blog header */
        .blog-header {
            text-align: center;
            margin-bottom: 8rem;
        }

        .blog-title {
            font-size: clamp(3rem, 10vw, 5rem);
            font-weight: 900;
            letter-spacing: -4px;
            margin-bottom: 2rem;
            color: #000000;
        }

        .blog-subtitle {
            font-size: clamp(1.2rem, 2.5vw, 1.8rem);
            color: #333333;
            max-width: 800px;
            margin: 0 auto;
            font-weight: 300;
            line-height: 1.8;
            padding: 1.5rem 2rem;
            background: #ffffff;
            border-radius: 15px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }

        /* Carousel container */
        .carousel-container {
            position: relative;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            overflow: hidden;
            margin-bottom: 8rem;
        }

        /* Blog grid (carousel track) */
        .blog-grid {
            display: flex;
            transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            width: calc(450px * 6 + 2rem * 5);
            will-change: transform;
        }

        /* Blog cards */
        .blog-card {
            flex: 0 0 375px;
            background: #ffffff;
            border: 1px solid #000000;
            border-radius: 15px;
            overflow: hidden;
            margin-right: 2rem;
            position: relative;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            z-index: 1;
        }

        .blog-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 32px rgba(0, 0, 0, 0.2);
            z-index: 10;
        }

        /* Animated black line on hover */
        .blog-card::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 3px;
            background: #000000;
            transition: width 0.4s ease, left 0.4s ease;
            z-index: 3;
        }

        .blog-card:hover::before {
            width: 100%;
            left: 0;
        }

        /* Blog image */
        .blog-img-container {
            position: relative;
            overflow: hidden;
            height: 250px;
            /* Reduced from 350px */
        }

        .blog-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: grayscale(100%);
            transition: transform 0.4s ease, filter 0.4s ease;
        }

        .blog-card:hover .blog-img {
            transform: scale(1.1);
            filter: grayscale(0%);
        }

        /* Blog content */
        .blog-content {
            padding: 1.5rem;
            /* Reduced from 2rem */
            position: relative;
            z-index: 3;
        }

        .blog-content-title {
            font-size: 1.6rem;
            /* Reduced from 1.8rem */
            font-weight: 800;
            margin: 0.8rem 0;
            /* Reduced from 1rem */
            color: #000000;
        }

        .blog-description {
            font-size: 0.9rem;
            /* Reduced from 1rem */
            color: #444444;
            line-height: 1.5;
            /* Adjusted from 1.6 */
            margin-bottom: 1rem;
            /* Reduced from 1.5rem */
        }

        /* Artistic button */
        .btn-outline {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 1rem 2rem;
            background: #000000;
            color: #ffffff;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.9rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: background 0.4s ease, color 0.4s ease, transform 0.4s ease;
            border: 1px solid #000000;
            z-index: 3;
        }

        .btn-outline:hover {
            background: #ffffff;
            color: #000000;
            transform: translateY(-3px);
            border-color: #000000;
        }

        .btn-outline i {
            font-size: 1rem;
            transition: transform 0.4s ease;
            font-style: normal;
        }

        .btn-outline:hover i {
            transform: translateX(5px);
        }

        /* Carousel navigation buttons */
        .carousel-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            justify-content: space-between;
            width: 100%;
            padding: 0 1rem;
            z-index: 5;
        }

        .carousel-btn {
            background: #000000;
            color: #ffffff;
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            cursor: points;
            transition: background 0.3s ease, color 0.3s ease, transform 0.3s ease;
            border: 1px solid #000000;
        }

        .carousel-btn:hover {
            background: #ffffff;
            color: #000000;
            transform: scale(1.1);
        }

        .carousel-btn.prev {
            left: -60px;
        }

        .carousel-btn.next {
            right: -60px;
        }

        .carousel-btn:disabled {
            opacity: 0.3;
            cursor: not-allowed;
        }

        /* Carousel dots */
        .carousel-dots {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-top: 1.5rem;
        }

        .dot {
            width: 12px;
            height: 12px;
            background: #000000;
            border-radius: 50%;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.3s ease;
            opacity: 0.3;
        }

        .dot.active {
            opacity: 1;
            transform: scale(1.3);
        }

        .dot:hover {
            background: #ffffff;
            border: 1px solid #000000;
            transform: scale(1.3);
        }

        /* Final CTA section */
        .cta-section {
            text-align: center;
            margin-top: 8rem;
        }

        /* Responsive adjustments */
        @media (max-width: 1200px) {
            .carousel-container {
                max-width: 700px;
            }

            .blog-grid {
                width: calc(450px * 6 + 2rem * 5);
            }

            .carousel-btn.prev {
                left: -30px;
            }

            .carousel-btn.next {
                right: -30px;
            }
        }

        @media (max-width: 768px) {
            .blog-section {
                padding: 4rem 1rem;
            }

            .carousel-container {
                max-width: 100%;
            }

            .blog-grid {
                flex-direction: column;
                width: 100%;
            }

            .blog-card {
                flex: 0 0 auto;
                width: 100%;
                margin-right: 0;
                margin-bottom: 2rem;
            }

            .carousel-nav {
                display: none;
            }

            .carousel-dots {
                margin-top: 1rem;
            }

            .blog-title {
                font-size: 2.5rem;
                letter-spacing: -2px;
            }

            .blog-subtitle {
                font-size: 1rem;
            }
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

        /* Styling kursor */
        .cursor {
            width: 20px;
            height: 20px;
            border: 2px solid #333;
            border-radius: 50%;
            position: fixed;
            pointer-events: none;
            z-index: 9999;
            transition: all 0.1s ease;
            transform: translate(-50%, -50%);
            background: radial-gradient(circle, rgba(255, 255, 255, 0.8) 0%, rgba(128, 128, 128, 0.4) 50%, transparent 100%);
        }

        /* Efek smoke saat hover */
        .cursor.hover {
            transform: scale(2) translate(-25%, -25%);
            background: radial-gradient(circle, rgba(255, 255, 255, 0.9) 0%, rgba(200, 200, 200, 0.6) 30%, rgba(128, 128, 128, 0.3) 60%, transparent 100%);
            border: none;
            animation: smokeEffect 0.8s ease-out infinite;
            box-shadow:
                0 0 20px rgba(128, 128, 128, 0.4),
                0 0 40px rgba(128, 128, 128, 0.2),
                0 0 60px rgba(128, 128, 128, 0.1);
        }

        /* Animasi smoke effect */
        @keyframes smokeEffect {
            0% {
                opacity: 0.8;
                transform: scale(2) translate(-25%, -25%) rotate(0deg);
            }

            50% {
                opacity: 0.6;
                transform: scale(2.5) translate(-20%, -20%) rotate(180deg);
            }

            100% {
                opacity: 0.8;
                transform: scale(2) translate(-25%, -25%) rotate(360deg);
            }
        }

        /* Tambahan efek partikel smoke */
        .cursor::before,
        .cursor::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            opacity: 0;
            transition: all 0.3s ease;
        }

        .cursor.hover::before {
            animation: smokeParticle1 1.2s ease-out infinite;
            background: radial-gradient(circle, transparent 40%, rgba(150, 150, 150, 0.3) 70%, transparent 100%);
        }

        .cursor.hover::after {
            animation: smokeParticle2 1.5s ease-out infinite reverse;
            background: radial-gradient(circle, transparent 30%, rgba(180, 180, 180, 0.2) 60%, transparent 100%);
        }

        /* Animasi partikel smoke 1 */
        @keyframes smokeParticle1 {
            0% {
                opacity: 0;
                transform: scale(0.5) rotate(0deg);
            }

            30% {
                opacity: 0.6;
                transform: scale(1.8) rotate(120deg);
            }

            70% {
                opacity: 0.3;
                transform: scale(3) rotate(240deg);
            }

            100% {
                opacity: 0;
                transform: scale(4) rotate(360deg);
            }
        }

        /* Animasi partikel smoke 2 */
        @keyframes smokeParticle2 {
            0% {
                opacity: 0;
                transform: scale(0.8) rotate(0deg);
            }

            40% {
                opacity: 0.4;
                transform: scale(2.2) rotate(-150deg);
            }

            80% {
                opacity: 0.2;
                transform: scale(3.5) rotate(-300deg);
            }

            100% {
                opacity: 0;
                transform: scale(4.5) rotate(-360deg);
            }
        }

        /* Efek smoke trail (jejak asap) */
        .cursor.hover {
            position: relative;
        }

        .cursor.hover::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, transparent 20%, rgba(128, 128, 128, 0.1) 40%, transparent 70%);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            animation: smokeTrail 2s ease-out infinite;
            z-index: -1;
        }

        /* Animasi smoke trail */
        @keyframes smokeTrail {
            0% {
                opacity: 0;
                transform: translate(-50%, -50%) scale(0.5);
            }

            20% {
                opacity: 50;
                transform: translate(-50%, -50%) scale(1);
            }

            60% {
                opacity: 70;
                transform: translate(-50%, -50%) scale(2);
            }

            100% {
                opacity: 100;
                transform: translate(-50%, -50%) scale(3);
            }
        }

        .cursor.smoke-variant {
            background: radial-gradient(ellipse 150% 100%, rgba(240, 240, 240, 0.8) 0%, rgba(180, 180, 180, 0.4) 40%, rgba(120, 120, 120, 0.2) 70%, transparent 100%);
            filter: blur(1px);
            animation: smokeFloat 3s ease-in-out infinite;
        }

        @keyframes smokeFloat {

            0%,
            100% {
                transform: translate(-50%, -50%) translateY(0px) rotate(0deg);
                opacity: 0.8;
            }

            33% {
                transform: translate(-50%, -50%) translateY(-5px) rotate(120deg);
                opacity: 0.6;
            }

            66% {
                transform: translate(-50%, -50%) translateY(3px) rotate(240deg);
                opacity: 0.7;
            }
        }
    </style>
    <?php $__env->stopPush(); ?>

    <?php $__env->startPush('scripts'); ?>
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const cursor = document.querySelector('.cursor');
            let mouseX = 0, mouseY = 0;
            let cursorX = 0, cursorY = 0;
            const speed = 0.9; // Kamu bisa ubah ini biar lebih smooth

            function animateCursor() {
                cursorX += (mouseX - cursorX) * speed;
                cursorY += (mouseY - cursorY) * speed;

                cursor.style.left = cursorX + 'px';
                cursor.style.top = cursorY + 'px';

                requestAnimationFrame(animateCursor);
            }

            document.addEventListener('mousemove', (e) => {
                mouseX = e.clientX;
                mouseY = e.clientY;
            });

            const hoverElements = document.querySelectorAll('a, button, .hover-target'); // tambahkan kelas tambahan kalau perlu
            hoverElements.forEach(element => {
                element.addEventListener('mouseenter', () => {
                    cursor.classList.add('hover');
                });
                element.addEventListener('mouseleave', () => {
                    cursor.classList.remove('hover');
                });
            });

            animateCursor();

            const observer = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add("animate-in");
                            observer.unobserve(entry.target);
                        }
                    });
                },
                { threshold: 0.2, rootMargin: "0px 0px -60px 0px" }
            );

            document.querySelectorAll(".fade-section, .text-appear").forEach((item) => {
                observer.observe(item);
            });

            const joinButton = document.getElementById("join-button");
            if (joinButton) {
                joinButton.addEventListener("mouseover", () => {
                    joinButton.classList.add("animate-pulse");
                });
                joinButton.addEventListener("mouseout", () => {
                    joinButton.classList.remove("animate-pulse");
                });
            }

            // 🔢 Counter animation with 'K' format
            const counters = document.querySelectorAll(".stats-number");

            counters.forEach((counter) => {
                const target = +counter.getAttribute("data-target");
                let count = 0;
                const steps = 30;
                const increment = Math.ceil(target / steps);

                const updateCount = () => {
                    count += increment;
                    if (count < target) {
                        counter.innerText = formatK(count);
                        setTimeout(updateCount, 50);
                    } else {
                        counter.innerText = formatK(target);
                    }
                };

                const formatK = (val) => {
                    if (val >= 1000) {
                        return (val / 1000).toFixed(1).replace(/\.0$/, "") + "K+";
                    } else {
                        return val + "+";
                    }
                };

                updateCount();
            });
        });

        document.addEventListener("DOMContentLoaded", () => {
            const mobileMenuButton = document.querySelector(".md\\:hidden");
            const nav = document.querySelector("nav");
            mobileMenuButton.addEventListener("click", () => {
                nav.classList.toggle("mobile-nav-active");
            });

        });

        document.addEventListener("DOMContentLoaded", () => {
            // Intersection Observer untuk animasi masuk
            const observer = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            setTimeout(() => {
                                entry.target.classList.add("animate-in");
                            }, entry.target.dataset.delay || 0);
                            observer.unobserve(entry.target);
                        }
                    });
                },
                {
                    threshold: 0.2,
                    rootMargin: "0px 0px -60px 0px",
                }
            );

            // Observe timeline items dengan delay berbeda
            document.querySelectorAll(".timeline-item").forEach((item, index) => {
                item.dataset.delay = index * 250;
                observer.observe(item);
            });

            // Parallax effect untuk timeline line
            window.addEventListener("scroll", () => {
                const scrolled = window.pageYOffset;
                const parallaxElements = document.querySelectorAll(".timeline-line");

                parallaxElements.forEach((element) => {
                    const speed = 0.08;
                    element.style.transform = `translateY(${scrolled * speed
                        }px) translateX(-50%)`;
                });
            });

            // Smooth scroll untuk anchor links
            document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
                anchor.addEventListener("click", function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute("href"));
                    if (target) {
                        target.scrollIntoView({
                            behavior: "smooth",
                            block: "start",
                        });
                    }
                });
            });
        });

        document.addEventListener("DOMContentLoaded", () => {
            const observer = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add("animate-in");
                            observer.unobserve(entry.target);
                        }
                    });
                },
                {
                    threshold: 0.2,
                    rootMargin: "0px 0px -60px 0px",
                }
            );

            document.querySelectorAll(".project-card").forEach((card) => {
                observer.observe(card);
            });
        });

        const carousel = document.querySelector('.blog-grid');
        const prevBtn = document.querySelector('.carousel-btn.prev');
        const nextBtn = document.querySelector('.carousel-btn.next');
        const dots = document.querySelectorAll('.dot');
        let currentIndex = 0;
        const cardWidth = 450 + 32;
        const totalCards = 3; // Original cards

        function updateCarousel(transition = true) {
            if (transition) {
                carousel.style.transition = 'transform 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
            } else {
                carousel.style.transition = 'none';
            }
            carousel.style.transform = `translateX(-${currentIndex * cardWidth}px)`;
            prevBtn.disabled = currentIndex === 0;
            nextBtn.disabled = currentIndex >= totalCards;
            dots.forEach((dot, index) => {
                dot.classList.toggle('active', index === currentIndex);
            });
        }

        function handleTransitionEnd() {
            if (currentIndex >= totalCards) {
                currentIndex = 0;
                updateCarousel(false);
            } else if (currentIndex < 0) {
                currentIndex = totalCards - 1;
                updateCarousel(false);
            }
        }

        prevBtn.addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex--;
                updateCarousel();
            }
        });

        nextBtn.addEventListener('click', () => {
            currentIndex++;
            updateCarousel();
            if (currentIndex >= totalCards) {
                setTimeout(() => {
                    currentIndex = 0;
                    updateCarousel(false);
                }, 600);
            }
        });

        dots.forEach((dot) => {
            dot.addEventListener('click', () => {
                currentIndex = parseInt(dot.dataset.index);
                updateCarousel();
            });
        });

        carousel.addEventListener('transitionend', handleTransitionEnd);

        let autoScroll = setInterval(() => {
            nextBtn.click();
        }, 5000);

        carousel.addEventListener('mouseenter', () => clearInterval(autoScroll));
        carousel.addEventListener('mouseleave', () => {
            autoScroll = setInterval(() => {
                nextBtn.click();
            }, 5000);
        });

        updateCarousel();
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
<?php endif; ?><?php /**PATH C:\laragon\www\tara\backend\resources\views/main/index.blade.php ENDPATH**/ ?>