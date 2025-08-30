<x-layout>

    <div id="lottie-bg" class="fixed inset-0 -z-10 opacity-10 pointer-events-none"></div>
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




    <section
        class="px-6 py-6 md:py-8 lg:py-10 flex flex-wrap items-center gap-4 bg-white/60 backdrop-blur-md border border-yellow-100 rounded-2xl shadow-md filter-section">
        <!-- Filter Utama -->
        <div class="flex flex-wrap gap-3 items-center">
            <!-- Kategori -->
            <select aria-label="asdasd" id="category-filter"
                class="px-4 py-2 rounded-xl bg-white shadow text-sm font-medium focus:ring-2 focus:ring-black focus:outline-none transition duration-300">
                <option value="">Semua Kategori</option>
                <option value="UI/UX">UI/UX</option>
                <option value="Graphic Design">Desain Grafis</option>
                <option value="Web Development">Pengembangan Web</option>
                <option value="Illustration">Ilustrasi</option>
            </select>

            <!-- Gaya Visual -->
            <select aria-label="asdasd"
                class="px-4 py-2 rounded-xl bg-white shadow text-sm font-medium focus:ring-2 focus:ring-black focus:outline-none transition duration-300">
                <option>Gaya Visual</option>
                <option>Minimalis</option>
                <option>Ekspresionis</option>
                <option>Retro</option>
                <option>Futuristik</option>
            </select>

            <!-- Periode -->
            <select aria-label="asdasd"
                class="px-5 py-2 relativ rounded-xl bg-white shadow text-sm font-medium focus:ring-2 focus:ring-black focus:outline-none transition duration-300">
                <option class="">Periode Karya</option>
                <option>2020 - Kini</option>
                <option>2010 - 2019</option>
                <option>2000 - 2009</option>
            </select>

            <!-- Media -->
            <select aria-label="asdasd"
                class="px-4 py-2 rounded-xl bg-white shadow text-sm font-medium focus:ring-2 focus:ring-black focus:outline-none transition duration-300">
                <option>Media</option>
                <option>Digital</option>
                <option>Cat Air</option>
                <option>3D</option>
                <option>Mixed Media</option>
            </select>

            <!-- Tipografi -->
            <select aria-label="asdasd" aria-label="asdasd"
                class="px-4 py-2 rounded-xl bg-white shadow text-sm font-medium focus:ring-2 focus:ring-black focus:outline-none transition duration-300">
                <option>Tipografi</option>
                <option>Sans-serif</option>
                <option>Serif</option>
                <option>Script</option>
                <option>Display</option>
            </select>

            <!-- Warna -->
            <select aria-label="asdasd"
                class="px-4 py-2 rounded-xl bg-white shadow text-sm font-medium focus:ring-2 focus:ring-black focus:outline-none transition duration-300">
                <option>Palet Warna</option>
                <option>Monokrom</option>
                <option>Pastel</option>
                <option>Kontras Tinggi</option>
                <option>Hangat</option>
                <option>Dingin</option>
            </select>
        </div>

        <!-- Reset -->
        <div class="ml-auto flex items-center gap-3 mt-4 md:mt-0">
            <div id="filter-count" class="bg-yellow-400 text-white text-xs rounded-full px-3 py-1 font-bold shadow">
                0
            </div>
            <button id="reset-filters"
                class="px-4 py-2 text-sm bg-white text-gray-700 rounded-xl shadow hover:bg-yellow-400 hover:text-white font-medium flex items-center gap-2 transition duration-300">
                Atur Ulang
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 4v5h.582M20 20v-5h-.581M4 9a9 9 0 0116 0M4 15a9 9 0 0016 0" />
                </svg>
            </button>
        </div>
    </section>

    <main class="px-6 py-8 max-w-7xl mx-auto" id="gallery-top">
        <div id="portfolio-gallery"
            class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 auto-rows-[200px] gap-6">
        </div>
        <div id="pagination" class="flex justify-center items-center gap-3 mt-12"></div>
    </main>

    <canvas id="ripple-canvas" class="fixed top-0 left-0 w-full h-full -z-20 pointer-events-none"></canvas>



    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>



    @push('styles')
        <style>
            body {
                font-family: "Space Grotesk", sans-serif;
                background: linear-gradient(180deg, #f5f5f5 0%, #ffffff 100%);
            }

            #ripple-canvas {
                position: fixed;
                top: 0;
                left: 0;
                z-index: -1;
                pointer-events: none;
                background: transparent !important;
            }

            @keyframes fadeUp {
                0% {
                    transform: translateY(20px);
                    opacity: 0.2;
                }

                50% {
                    transform: translateY(0);
                    opacity: 0.4;
                }

                100% {
                    transform: translateY(20px);
                    opacity: 0.2;
                }
            }

            .gallery-img {
                filter: grayscale(20%) contrast(1.1) brightness(1.05);
                transition: all 0.4s ease-in-out;
                transform: scale(1);
            }

            .gallery-img:hover {
                filter: grayscale(0%) contrast(1.2) brightness(1.15);
                transform: scale(1.03);
            }

            .gallery-overlay {
                background: linear-gradient(135deg,
                        rgba(0, 0, 0, 0.75),
                        rgba(0, 0, 0, 0.2));
                opacity: 0;
                transition: all 0.4s ease-in-out;
                transform: scale(0.95);
                border-radius: 12px;
            }

            .group:hover .gallery-overlay {
                opacity: 1;
                transform: scale(1);
            }

            .project-title {
                transform: translateY(15px);
                transition: all 0.4s ease-in-out;
                opacity: 0;
                font-family: "Space Grotesk", sans-serif;
                letter-spacing: 0.5px;
            }

            .group:hover .project-title {
                transform: translateY(0);
                opacity: 1;
            }

            .project-details {
                transform: translateY(20px);
                transition: all 0.4s ease-in-out;
                opacity: 0;
                font-size: 0.9rem;
            }

            .group:hover .project-details {
                transform: translateY(0);
                opacity: 1;
            }

            .pagination-btn {
                width: 48px;
                height: 48px;
                border-radius: 50%;
                background: #e5e5e5;
                color: #333;
                font-size: 1rem;
                font-weight: 500;
                display: flex;
                align-items: center;
                justify-content: center;
                transition: all 0.3s ease-in-out;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            .pagination-btn:hover {
                background: #000;
                color: #fff;
                transform: translateY(-2px);
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            }

            .pagination-btn.active {
                background: #000;
                color: #fff;
                transform: scale(1.1);
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            }

            .pagination-btn:disabled {
                background: #f5f5f5;
                color: #aaa;
                cursor: not-allowed;
                transform: none;
                box-shadow: none;
            }

            select {
                appearance: none;
                background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%23333'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'/%3E%3C/svg%3E");
                background-repeat: no-repeat;
                background-position: right 0.75rem center;
                background-size: 1rem;
            }

            /* Glass effect untuk navbar */
            .glass-effect {
                backdrop-filter: blur(20px);
                background: rgba(255, 255, 255, 0.9);
                border: 1px solid rgba(0, 0, 0, 0.1);
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

            /* Animasi ping untuk logo */
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

            /* Tambahan untuk memastikan kategori tidak tertutup navbar */
            .filter-section {
                margin-top: 5rem;
                /* Menyesuaikan jarak dari navbar fixed */
            }

            @media (max-width: 768px) {
                .filter-section {
                    margin-top: 4rem;
                    /* Jarak lebih kecil untuk layar mobile */
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
        </style>
    @endpush

    @push('scripts')
        <script>
            AOS.init({
                once: true,
                duration: 1000,
                easing: "ease-out-cubic"
            });

            const totalProjects = 45;
            const itemsPerPage = 17;
            let currentPage = 1;
            let currentCategory = "";

            const gallery = document.getElementById("portfolio-gallery");
            const pagination = document.getElementById("pagination");
            const categoryFilter = document.getElementById("category-filter");
            const filterCount = document.getElementById("filter-count");
            const resetFilters = document.getElementById("reset-filters");
            const showRoute = "{{ route('galeri.show', ':id') }}";

            // pakai angka, bukan 'project-1'
            const projectsData = Array.from({
                length: totalProjects
            }, (_, i) => ({
                id: i + 1,
                title: `Proyek ${i + 1}`,
                image: `https://picsum.photos/seed/${i + 1}/400/300`,
                height: ["row-span-2", "row-span-3", "row-span-2"][Math.floor(Math.random() * 3)],
                width: ["col-span-1", "col-span-2", "col-span-1"][Math.floor(Math.random() * 3)],
                category: ["UI/UX", "Desain Grafis", "Pengembangan Web", "Ilustrasi"][i % 4],
                description: `Deskripsi untuk Proyek ${i + 1}. Representasi unik dari kreativitas dan inovasi.`,
                uploader: `Pengunggah ${(i % 5) + 1}`,
                uploadTime: new Date().toISOString(),
            }));

            function renderProjects(page, category, shouldScroll = false) {
                gallery.innerHTML = "";

                const filteredProjects = category ?
                    projectsData.filter((project) => project.category === category) :
                    projectsData;

                const totalFiltered = filteredProjects.length;
                const start = (page - 1) * itemsPerPage;
                const end = start + itemsPerPage;

                filteredProjects.slice(start, end).forEach((project, idx) => {
                    // ganti placeholder :id dengan angka id project
                    const projectRoute = showRoute.replace(':id', project.id);

                    const card = document.createElement("div");
                    card.className =
                        `relative overflow-hidden rounded-lg shadow-md bg-neutral-100 cursor-pointer group ${project.height} ${project.width}`;
                    card.setAttribute("data-aos", "fade-up");
                    card.setAttribute("data-aos-delay", `${idx * 100}`);

                    card.innerHTML = `
                <a href="${projectRoute}">
                    <img src="${project.image}" alt="${project.title}" class="w-full h-full object-cover gallery-img"/>
                    <div class="absolute inset-0 gallery-overlay flex flex-col items-center justify-center text-white p-6">
                        <h3 class="project-title text-xl font-semibold">${project.title}</h3>
                        <p class="project-details text-sm">${project.category}</p>
                        <button class="bg-white text-black text-sm font-semibold px-5 py-2.5 rounded-lg shadow-md mt-4 hover:bg-yellow-400 hover:text-black transition">Lihat Detail</button>
                    </div>
                </a>
            `;
                    gallery.appendChild(card);
                });

                AOS.refresh();

                if (shouldScroll) {
                    document.getElementById("gallery-top").scrollIntoView({
                        behavior: "smooth"
                    });
                }

                filterCount.textContent = category ? "1" : "0";
                return totalFiltered;
            }

            renderProjects(1, "");

            function renderPagination(totalItems) {
                pagination.innerHTML = "";
                const totalPages = Math.ceil(totalItems / itemsPerPage);

                const prevBtn = document.createElement("button");
                prevBtn.className = `pagination-btn ${
          currentPage === 1 ? "disabled" : ""
        }`;
                prevBtn.innerHTML = `<i class="fas fa-chevron-left"></i>`;
                prevBtn.disabled = currentPage === 1;
                prevBtn.addEventListener("click", () => {
                    if (currentPage > 1) {
                        currentPage--;
                        renderProjects(currentPage, currentCategory, true);
                        renderPagination(
                            currentCategory ?
                            projectsData.filter(
                                (project) => project.category === currentCategory
                            ).length :
                            totalProjects
                        );
                    }
                });
                pagination.appendChild(prevBtn);

                for (let i = 1; i <= totalPages; i++) {
                    const btn = document.createElement("button");
                    btn.className = `pagination-btn ${i === currentPage ? "active" : ""}`;
                    btn.textContent = i;
                    btn.addEventListener("click", () => {
                        currentPage = i;
                        renderProjects(currentPage, currentCategory, true);
                        renderPagination(
                            currentCategory ?
                            projectsData.filter(
                                (project) => project.category === currentCategory
                            ).length :
                            totalProjects
                        );
                    });
                    pagination.appendChild(btn);
                }

                const nextBtn = document.createElement("button");
                nextBtn.className = `pagination-btn ${
          currentPage === totalPages ? "disabled" : ""
        }`;
                nextBtn.innerHTML = `<i class="fas fa-chevron-right"></i>`;
                nextBtn.disabled = currentPage === totalPages;
                nextBtn.addEventListener("click", () => {
                    if (currentPage < totalPages) {
                        currentPage++;
                        renderProjects(currentPage, currentCategory, true);
                        renderPagination(
                            currentCategory ?
                            projectsData.filter(
                                (project) => project.category === currentCategory
                            ).length :
                            totalProjects
                        );
                    }
                });
                pagination.appendChild(nextBtn);
            }

            categoryFilter.addEventListener("change", (e) => {
                currentCategory = e.target.value;
                currentPage = 1;
                const totalFiltered = renderProjects(
                    currentPage,
                    currentCategory,
                    true
                );
                renderPagination(totalFiltered);
            });

            resetFilters.addEventListener("click", () => {
                currentCategory = "";
                currentPage = 1;
                categoryFilter.value = "";
                renderProjects(currentPage, currentCategory, true);
                renderPagination(totalProjects);
            });

            // Inisialisasi tanpa gulir
            renderProjects(currentPage, currentCategory, false);
            renderPagination(totalProjects);

            lottie.loadAnimation({
                container: document.getElementById("lottie-bg"),
                renderer: "svg",
                loop: true,
                autoplay: true,
                path: "https://assets5.lottiefiles.com/packages/lf20_x62chJ.json",
            });

            const canvas = document.getElementById("ripple-canvas");
            const ctx = canvas.getContext("2d");
            let ripples = [];

            function resizeCanvas() {
                canvas.width = window.innerWidth;
                canvas.height = window.innerHeight;
            }
            resizeCanvas();
            window.addEventListener("resize", resizeCanvas);

            document.addEventListener("mousemove", (e) => {
                ripples.push({
                    x: e.clientX,
                    y: e.clientY,
                    radius: 0,
                    alpha: 0.8,
                    wavePhase: 0,
                    depth: Math.random() * 0.5 + 0.5,
                    rippleSpeed: Math.random() * 0.5 + 1.2,
                });
            });

            function animateRipples() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);

                ripples.forEach((ripple, index) => {
                    const maxRadius = 80;
                    const waveAmplitude = 2;
                    const waveFrequency = 0.15;

                    for (let i = 0; i < 3; i++) {
                        const radiusOffset = i * 8;
                        const depthAlpha = ripple.alpha * (1 - i * 0.3) * ripple.depth;

                        if (depthAlpha > 0) {
                            ctx.beginPath();
                            ctx.arc(
                                ripple.x + Math.sin(ripple.wavePhase + i * 0.5) * waveAmplitude,
                                ripple.y + Math.cos(ripple.wavePhase + i * 0.5) * waveAmplitude,
                                ripple.radius + radiusOffset,
                                0,
                                Math.PI * 2
                            );

                            const baseColor =
                                i === 0 ?
                                `rgba(173, 216, 230, ${depthAlpha})` :
                                i === 1 ?
                                `rgba(224, 255, 255, ${depthAlpha * 0.7})` :
                                `rgba(240, 248, 255, ${depthAlpha * 0.4})`;

                            ctx.strokeStyle = baseColor;
                            ctx.lineWidth = i === 0 ? 2.5 : i === 1 ? 1.8 : 1.2;
                            ctx.stroke();

                            if (i === 0) {
                                ctx.beginPath();
                                ctx.arc(
                                    ripple.x + Math.sin(ripple.wavePhase) * waveAmplitude,
                                    ripple.y + Math.cos(ripple.wavePhase) * waveAmplitude,
                                    ripple.radius - 2,
                                    0,
                                    Math.PI * 2
                                );
                                ctx.strokeStyle = `rgba(255, 255, 255, ${depthAlpha * 0.6})`;
                                ctx.lineWidth = 1;
                                ctx.stroke();
                            }
                        }
                    }

                    if (ripple.radius > 10 && ripple.radius < 40) {
                        ctx.beginPath();
                        ctx.arc(
                            ripple.x + Math.sin(ripple.wavePhase * 2) * (waveAmplitude * 0.5),
                            ripple.y + Math.cos(ripple.wavePhase * 2) * (waveAmplitude * 0.5),
                            ripple.radius * 0.3,
                            0,
                            Math.PI * 2
                        );
                        ctx.fillStyle = `rgba(255, 255, 255, ${ripple.alpha * 0.3})`;
                        ctx.fill();
                    }

                    ripple.radius += ripple.rippleSpeed;
                    ripple.alpha -= 0.006;
                    ripple.wavePhase += waveFrequency;

                    if (ripple.alpha <= 0 || ripple.radius > maxRadius) {
                        ripples.splice(index, 1);
                    }
                });

                requestAnimationFrame(animateRipples);
            }
            animateRipples();

            document.addEventListener("DOMContentLoaded", () => {
                const mobileMenuButton = document.querySelector(".md\\:hidden");
                const nav = document.querySelector("nav");
                mobileMenuButton.addEventListener("click", () => {
                    nav.classList.toggle("mobile-nav-active");
                });
            });
        </script>
    @endpush
</x-layout>
