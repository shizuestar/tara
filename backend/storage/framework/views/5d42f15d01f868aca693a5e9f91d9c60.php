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
    <canvas id="particle-bg"></canvas>
    <!-- Notification Modal -->
    <div id="notification-modal" class="notification-modal">
        <i class="fas fa-times close-btn" role="button" aria-label="Close notifications" tabindex="0"></i>
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

    <!-- Project Section -->
    <section class="pt-20 pb-20 section-gradient text-center">
        <div class="container">
            <div class="mb-12 mt-20">
                <h1 class="text-5xl md:text-7xl font-bold text-gray-900 inline-flex items-center"
                    style="font-family: 'Space Grotesk', sans-serif;">
                    Proyek & Kolaborasi<span class="text-gray-400 align-middle ml-2 text-3xl">●</span>
                </h1>
                <p class="mt-3 text-lg md:text-xl text-gray-600 leading-relaxed max-w-2xl mx-auto">Jelajahi dan ciptakan
                    bersama komunitas kreatif TARA</p>
            </div>
            <div class="flex justify-center mb-8">
                <input type="text" id="search-input" placeholder="Cari proyek..."
                    class="w full max-w-md px-4 py-2 border border-gray-200 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-gray-400 bg-gray-50" />
            </div>
            <div class="flex flex-col sm:flex-row justify-center gap-4 mb-8">
                <a href="./buat-kolaborasi" class="create-btn"><i class="fas fa-plus mr-2"></i> Buat Kolaborasi</a>
                <a href="./gabung-kolaborasi" class="join-btn"><i class="fas fa-users mr-2"></i> Gabung Kolaborasi</a>
            </div>
            <div class="flex flex-col sm:flex-row gap-4 mb-8">
                <div class="flex flex-wrap gap-3 filter-container">
                    <button class="filter-btn active" data-filter="all">Semua</button>
                    <button class="filter-btn" data-filter="coding">Coding</button>
                    <button class="filter-btn" data-filter="musik">Musik</button>
                    <button class="filter-btn" data-filter="desain">Desain</button>
                    <button class="filter-btn" data-filter="sastra">Sastra</button>
                    <button class="filter-btn" data-filter="populer">Populer</button>
                    <button class="filter-btn" data-filter="baru">Baru</button>
                </div>
                <div class="flex gap-3 sort-container">
                    <button class="sort-btn active" data-sort="default">Default</button>
                    <button class="sort-btn" data-sort="progress">Progress</button>
                    <button class="sort-btn" data-sort="members">Anggota</button>
                </div>
            </div>
            <div id="project-list" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8"></div>
            <div class="text-center mt-10 flex justify-center gap-3" id="pagination-container"></div>
        </div>
    </section>

    <?php $__env->startPush('styles'); ?>
    <style>
        body {
            font-family: "Space Grotesk", sans-serif;
            background: #f8fafc;
            color: #1a202c;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        #particle-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0.1;
        }

        .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        .section-gradient {
            background: linear-gradient(145deg, rgba(255, 255, 255, 0.95), rgba(240, 240, 240, 0.7));
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .project-card {
            background: linear-gradient(145deg, rgba(255, 255, 255, 0.9), rgba(240, 240, 240, 0.6));
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 1.5rem;
            overflow: hidden;
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            position: relative;
        }

        .project-card:hover {
            transform: scale(1.05) translateY(-5px);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.15), inset 0 0 10px rgba(255, 255, 255, 0.3);
            border-color: rgba(0, 0, 0, 0.15);
        }

        .project-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .project-card:hover img {
            transform: scale(1.05);
        }

        .progress-circle {
            position: relative;
            width: 60px;
            height: 60px;
            margin-top: 0.75rem;
        }

        .progress-circle svg {
            width: 100%;
            height: 100%;
            transform: rotate(-90deg);
        }

        .progress-circle .bg-circle {
            fill: none;
            stroke: #e5e7eb;
            stroke-width: 6;
        }

        .progress-circle .progress-ring {
            fill: none;
            stroke: #f59e0b;
            stroke-width: 6;
            stroke-linecap: round;
            transition: stroke-dashoffset 0.4s ease;
        }

        .progress-circle .progress-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 0.85rem;
            font-weight: 600;
            color: #1a202c;
        }

        .badge {
            padding: 0.4rem 0.9rem;
            font-size: 0.85rem;
            font-weight: 500;
            border-radius: 6px;
            margin-right: 0.5rem;
            background: #e5e7eb;
            color: #1a202c;
            transition: all 0.3s ease;
        }

        .badge-populer {
            background: #1a202c;
            color: #ffffff;
        }

        .badge-baru {
            background: #1a202c;
            color: #ffffff;
        }

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

        .filter-btn,
        .sort-btn,
        .pagination-btn {
            padding: 0.5rem 1.25rem;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 500;
            border: 1px solid #e5e7eb;
            background: transparent;
            color: #1a202c;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .filter-btn.active,
        .sort-btn.active,
        .pagination-btn.active {
            background: #f59e0b;
            color: #ffffff;
            border-color: #f59e0b;
        }

        .filter-btn:hover,
        .sort-btn:hover,
        .pagination-btn:hover {
            background: #1a202c;
            color: #ffffff;
            border-color: #1a202c;
        }

        .action-btn,
        .create-btn,
        .join-btn {
            padding: 0.6rem 1.5rem;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 500;
            background: #1a202c;
            color: #ffffff;
            transition: all 0.3s ease;
            text-transform: uppercase;
            border: solid black 2px;
        }

        .action-btn:hover,
        .create-btn:hover,
        .join-btn:hover {
            background: #ffffff;
            color: #1a202c;
            border: solid black 2px;
        }

        header {
            background: linear-gradient(145deg, rgba(255, 255, 255, 0.9), rgba(240, 240, 240, 0.6));
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
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

        #search-input {
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid #e5e7eb;
            transition: all 0.3s ease;
        }

        #search-input:focus {
            border-color: #1a202c;
            box-shadow: 0 0 0 3px rgba(255, 215, 0, 0.2);
        }

        .fa-bell,
        .theme-toggle {
            color: #6b7280;
            transition: color 0.3s ease;
        }

        .fa-bell:hover,
        .theme-toggle:hover {
            color: #1a202c;
        }

        footer {
            background: linear-gradient(145deg, rgba(255, 255, 255, 0.9), rgba(240, 240, 240, 0.6));
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .social-icons a {
            color: #6b7280;
            transition: color 0.3s ease;
        }

        .social-icons a:hover {
            color: #1a202c;
        }

        @media (max-width: 1024px) {
            .notification-modal {
                max-width: 100%;
            }

            .project-card img {
                height: 160px;
            }

            .progress-circle {
                width: 50px;
                height: 50px;
            }

            .progress-circle .progress-text {
                font-size: 0.75rem;
            }
        }

        @media (max-width: 768px) {
            .project-card img {
                height: 140px;
            }

            .filter-container,
            .sort-container {
                flex-direction: column;
                align-items: stretch;
                gap: 0.75rem;
            }

            .create-btn,
            .join-btn {
                width: 100%;
                text-align: center;
            }
        }

        @media (max-width: 640px) {
            .notification-modal {
                max-width: 100%;
            }

            .project-card img {
                height: 120px;
            }

            .create-btn,
            .join-btn,
            .action-btn,
            .pagination-btn {
                padding: 0.4rem 1rem;
                font-size: 0.8rem;
            }

            .progress-circle {
                width: 40px;
                height: 40px;
            }

            .progress-circle .progress-text {
                font-size: 0.7rem;
            }
        }
    </style>
    <?php $__env->stopPush(); ?>

    <?php $__env->startPush('scripts'); ?>
    <script>
        // Simulated Project Data
        const projects = [
            {
                id: 1,
                name: "Aplikasi Edukasi Kode",
                category: "coding",
                progress: 70,
                members: [
                    { name: "Budi Santoso", role: "Lead Developer", profileUrl: "/profil/budi", avatar: "https://picsum.photos/100/100?person1" },
                    { name: "Siti Aisyah", role: "UI/UX Designer", profileUrl: "/profil/siti", avatar: "https://picsum.photos/100/100?person2" },
                    { name: "Ahmad Yani", role: "Backend Developer", profileUrl: "/profil/ahmad", avatar: "https://picsum.photos/100/100?person3" },
                    { name: "Rina Putri", role: "Content Creator", profileUrl: "/profil/rina", avatar: "https://picsum.photos/100/100?person4" },
                    { name: "Dewi Lestari", role: "QA Engineer", profileUrl: "/profil/dewi", avatar: "https://picsum.photos/100/100?person5" }
                ],
                description: "Aplikasi interaktif untuk belajar pemrograman dengan cara menyenangkan.",
                image: "https://images.unsplash.com/photo-1662638600476-d563fffbb072?w=600&auto=format&fit=crop&q=60",
                created: "15 Juli 2025",
                populer: true,
                joined: true
            },
            {
                id: 2,
                name: "Proyek Musik Kolaborasi",
                category: "musik",
                progress: 45,
                members: [
                    { name: "Andi Pratama", role: "Komposer", profileUrl: "/profil/andi", avatar: "https://picsum.photos/100/100?person6" },
                    { name: "Lina Sari", role: "Vokalis", profileUrl: "/profil/lina", avatar: "https://picsum.photos/100/100?person7" },
                    { name: "Rudi Hartono", role: "Produser", profileUrl: "/profil/rudi", avatar: "https://picsum.photos/100/100?person8" }
                ],
                description: "Album indie dengan perpaduan musik tradisional dan modern.",
                image: "https://images.unsplash.com/photo-1471478331149-c72f17e33c73?w=600&auto=format&fit=crop&q=60",
                created: "10 Juli 2025",
                joined: false
            },
            {
                id: 3,
                name: "Desain Poster Kreatif",
                category: "desain",
                progress: 88,
                members: [
                    { name: "Tina Melati", role: "Graphic Designer", profileUrl: "/profil/tina", avatar: "https://picsum.photos/100/100?person9" },
                    { name: "Eko Wijaya", role: "Art Director", profileUrl: "/profil/eko", avatar: "https://picsum.photos/100/100?person10" }
                ],
                description: "Poster futuristik untuk acara seni tahunan.",
                image: "https://images.unsplash.com/photo-1541701494587-cb58502866ab?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&h=400&q=80",
                created: "5 Juli 2025",
                joined: false
            },
            {
                id: 4,
                name: "Antologi Puisi Baru",
                category: "sastra",
                progress: 60,
                members: [
                    { name: "Sari Puspita", role: "Penulis", profileUrl: "/profil/sari", avatar: "https://picsum.photos/100/100?person11" },
                    { name: "Adi Nugroho", role: "Editor", profileUrl: "/profil/adi", avatar: "https://picsum.photos/100/100?person12" },
                    { name: "Lia Amalia", role: "Penulis", profileUrl: "/profil/lia", avatar: "https://picsum.photos/100/100?person13" },
                    { name: "Bima Sakti", role: "Ilustrator", profileUrl: "/profil/bima", avatar: "https://picsum.photos/100/100?person14" }
                ],
                description: "Antologi puisi dari penulis muda berbakat.",
                image: "https://images.unsplash.com/photo-1473186505569-9c61870c11f9?w=600&auto=format&fit=crop&q=60",
                created: "12 Juli 2025",
                populer: true,
                joined: true
            },
            {
                id: 5,
                name: "Aplikasi AI Sederhana",
                category: "coding",
                progress: 20,
                members: [
                    { name: "Fajar Ramadhan", role: "AI Developer", profileUrl: "/profil/fajar", avatar: "https://picsum.photos/100/100?person15" }
                ],
                description: "Aplikasi AI untuk analisis data dasar.",
                image: "https://images.unsplash.com/photo-1712002641088-9d76f9080889?w=600&auto=format&fit=crop&q=60",
                created: "18 Juli 2025",
                baru: true,
                joined: false
            }
        ];

        // Simulated Notification Data
        const notifications = [
            { id: 1, text: "New project update: Aplikasi Edukasi Kode", time: "2 jam lalu", read: false },
            { id: 2, text: "New collaboration request: Proyek Musik Kolaborasi", time: "4 jam lalu", read: false }
        ];

        // Pagination State
        let currentPage = 1;
        const projectsPerPage = 3;

        // Render Projects
        function renderProjects(filter = 'all', sort = 'default', search = '') {
            const projectList = document.getElementById('project-list');
            projectList.innerHTML = '';

            let filteredProjects = filter === 'all' ? projects :
                filter === 'populer' ? projects.filter(p => p.populer) :
                    filter === 'baru' ? projects.filter(p => p.baru) :
                        projects.filter(p => p.category === filter);

            if (search) {
                filteredProjects = filteredProjects.filter(p =>
                    p.name.toLowerCase().includes(search.toLowerCase()) ||
                    p.description.toLowerCase().includes(search.toLowerCase())
                );
            }

            filteredProjects = [...filteredProjects].sort((a, b) => {
                if (sort === 'progress') return b.progress - a.progress;
                if (sort === 'members') return b.members.length - a.members.length;
                return a.id - b.id;
            });

            const start = (currentPage - 1) * projectsPerPage;
            const end = start + projectsPerPage;
            const paginatedProjects = filteredProjects.slice(start, end);

            if (paginatedProjects.length === 0) {
                projectList.innerHTML = '<div class="text-center text-gray-600 col-span-full"><p class="text-lg">Tidak ada proyek ditemukan.</p></div>';
                updatePagination(filteredProjects.length);
                return;
            }

            paginatedProjects.forEach(project => {
                const radius = 27;
                const circumference = 2 * Math.PI * radius;
                const offset = circumference - (project.progress / 100) * circumference;
                projectList.innerHTML += `
                    <div class="project-card">
                        <img src="${project.image}" alt="${project.name}" loading="lazy"/>
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <h3 class="text-lg font-semibold truncate" style="font-family: 'Space Grotesk', sans-serif;">${project.name}</h3>
                            </div>
                            <div class="flex flex-wrap gap-2 mb-3">
                                <span class="badge">${project.category.charAt(0).toUpperCase() + project.category.slice(1)}</span>
                                ${project.populer ? '<span class="badge badge-populer">Populer</span>' : ''}
                                ${project.baru ? '<span class="badge badge-baru">Baru</span>' : ''}
                            </div>
                            <p class="text-base text-gray-600 line-clamp-2">${project.description}</p>
                            <div class="progress-circle">
                                <svg>
                                    <circle class="bg-circle" cx="30" cy="30" r="27"/>
                                    <circle class="progress-ring" cx="30" cy="30" r="27" stroke-dasharray="${circumference}" stroke-dashoffset="${offset}"/>
                                </svg>
                                <div class="progress-text">${project.progress}%</div>
                            </div>
                            <div class="flex justify-between items-center mt-4">
                                <span class="text-sm text-gray-600">${project.members.length} Anggota</span>
                                <a href="./detail_proyek.html?id=${project.id}" class="action-btn">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                `;
            });

            updatePagination(filteredProjects.length);
            gsap.from(".project-card", {
                opacity: 0,
                y: 20,
                duration: 0.5,
                stagger: 0.1,
                ease: "power2.out"
            });
            anime({
                targets: '.progress-ring',
                strokeDashoffset: [anime.setDashoffset, (el) => {
                    const circumference = 2 * Math.PI * 27;
                    const progress = parseInt(el.getAttribute('stroke-dashoffset'));
                    return progress;
                }],
                easing: 'easeInOutSine',
                duration: 1000,
                delay: (el, i) => i * 100
            });
        }

        // Update Pagination
        function updatePagination(totalProjects) {
            const totalPages = Math.max(1, Math.ceil(totalProjects / projectsPerPage));
            currentPage = Math.min(currentPage, totalPages);
            const paginationContainer = document.getElementById('pagination-container');
            paginationContainer.innerHTML = `
                <button class="pagination-btn" data-page="prev" ${currentPage === 1 ? 'disabled' : ''}><i class="fas fa-chevron-left"></i> Prev</button>
                ${Array.from({ length: totalPages }, (_, i) => `
                    <button class="pagination-btn ${currentPage === i + 1 ? 'active' : ''}" data-page="${i + 1}">${i + 1}</button>
                `).join('')}
                <button class="pagination-btn" data-page="next" ${currentPage === totalPages || totalProjects === 0 ? 'disabled' : ''}><i class="fas fa-chevron-right"></i> Next</button>
            `;
        }

        // Render Notifications
        function renderNotifications(filter = 'all') {
            const notificationList = document.getElementById('notification-list');
            notificationList.innerHTML = '';

            let filteredNotifications = filter === 'all' ? notifications : notifications.filter(n => !n.read);

            if (filteredNotifications.length === 0) {
                notificationList.innerHTML = '<div class="text-center text-gray-600"><p class="text-base">Tidak ada notifikasi.</p></div>';
                updateUnreadCount();
                return;
            }

            filteredNotifications.forEach(notification => {
                notificationList.innerHTML += `
                    <div class="notification-card ${notification.read ? '' : 'unread'}">
                        <p class="text-base">${notification.text}</p>
                        <p class="text-sm text-gray-600 mt-1">${notification.time}</p>
                    </div>
                `;
            });

            updateUnreadCount();
            gsap.from(".notification-card", {
                opacity: 0,
                x: 20,
                duration: 0.5,
                stagger: 0.1,
                ease: "power2.out"
            });
        }

        // Update Unread Notification Count
        function updateUnreadCount() {
            const unreadCount = notifications.filter(n => !n.read).length;
            document.getElementById('unread-count').textContent = unreadCount;
        }

        // Toggle Notifications
        function toggleNotifications() {
            const modal = document.getElementById('notification-modal');
            const isOpen = modal.classList.contains('open');
            modal.classList.toggle('open');
            gsap.to(modal, {
                x: isOpen ? '100%' : '0%',
                duration: 0.3,
                ease: "power2.out"
            });
            if (!isOpen) renderNotifications();
        }

        // Mark All as Read
        function markAllAsRead() {
            notifications.forEach(n => n.read = true);
            renderNotifications(document.querySelector('#notification-modal .filter-btn.active')?.dataset.filter || 'all');
            updateUnreadCount();
            anime({
                targets: '#mark-all-read',
                scale: [1, 1.05, 1],
                duration: 200,
                easing: 'easeOutQuad'
            });
        }

        // Apply Filters and Sort
        function applyFiltersAndSort() {
            const activeFilter = document.querySelector('.filter-btn.active')?.dataset.filter || 'all';
            const activeSort = document.querySelector('.sort-btn.active')?.dataset.sort || 'default';
            const searchQuery = document.getElementById('search-input').value;
            currentPage = 1;
            renderProjects(activeFilter, activeSort, searchQuery);
        }

        // Particle Wave Animation
        function initParticleAnimation() {
            const canvas = document.getElementById('particle-bg');
            const ctx = canvas.getContext('2d');
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;

            const particles = [];
            const numParticles = 50;
            const waveAmplitude = 50;
            const waveFrequency = 0.01;
            const waveSpeed = 0.02;

            for (let i = 0; i < numParticles; i++) {
                particles.push({
                    x: Math.random() * canvas.width,
                    y: Math.random() * canvas.height,
                    baseY: Math.random() * canvas.height,
                    size: 2 + Math.random() * 3,
                    speed: 1 + Math.random() * 2,
                    phase: Math.random() * Math.PI * 2
                });
            }

            let isAnimating = true;

            function animate() {
                if (!isAnimating) return;
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                ctx.fillStyle = '#1a202c';
                ctx.globalAlpha = 0.1;

                particles.forEach(particle => {
                    const waveY = particle.baseY + Math.sin(particle.x * waveFrequency + particle.phase) * waveAmplitude;
                    particle.x += particle.speed;
                    particle.y = waveY;

                    if (particle.x > canvas.width) particle.x = -particle.size;

                    ctx.beginPath();
                    ctx.arc(particle.x, particle.y, particle.size, 0, Math.PI * 2);
                    ctx.fill();

                    particle.phase += waveSpeed;
                });

                requestAnimationFrame(animate);
            }

            animate();

            window.addEventListener('blur', () => {
                isAnimating = false;
            });

            window.addEventListener('focus', () => {
                if (!isAnimating) {
                    isAnimating = true;
                    animate();
                }
            });
        }

        // Event Listeners
        window.addEventListener('load', () => {
            initParticleAnimation();
            renderProjects();
            renderNotifications();
            updateUnreadCount();

            // Set active navigation link
            const currentPath = window.location.pathname.split('/').pop() || 'index.html';
            document.querySelectorAll('.nav-link').forEach(link => {
                const href = link.getAttribute('href').split('/').pop();
                if (href === currentPath) {
                    link.classList.add('active');
                }
            });

            // Filter Buttons
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    document.querySelectorAll('.filter-btn').forEach(f => f.classList.remove('active'));
                    btn.classList.add('active');
                    applyFiltersAndSort();
                    anime({
                        targets: btn,
                        scale: [1, 1.05, 1],
                        duration: 200,
                        easing: 'easeOutQuad'
                    });
                });
            });

            // Sort Buttons
            document.querySelectorAll('.sort-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    document.querySelectorAll('.sort-btn').forEach(f => f.classList.remove('active'));
                    btn.classList.add('active');
                    applyFiltersAndSort();
                    anime({
                        targets: btn,
                        scale: [1, 1.05, 1],
                        duration: 200,
                        easing: 'easeOutQuad'
                    });
                });
            });

            // Search Input
            const searchInput = document.getElementById('search-input');
            if (searchInput) {
                searchInput.addEventListener('input', applyFiltersAndSort);
            }

            // Pagination
            document.getElementById('pagination-container').addEventListener('click', (e) => {
                const btn = e.target.closest('.pagination-btn');
                if (!btn || btn.disabled) return;

                const page = btn.dataset.page;
                const activeFilter = document.querySelector('.filter-btn.active')?.dataset.filter || 'all';
                const activeSort = document.querySelector('.sort-btn.active')?.dataset.sort || 'default';
                const searchQuery = document.getElementById('search-input').value;

                let filteredProjects = activeFilter === 'all' ? projects :
                    activeFilter === 'populer' ? projects.filter(p => p.populer) :
                        activeFilter === 'baru' ? projects.filter(p => p.baru) :
                            projects.filter(p => p.category === activeFilter);

                if (searchQuery) {
                    filteredProjects = filteredProjects.filter(p =>
                        p.name.toLowerCase().includes(searchQuery.toLowerCase()) ||
                        p.description.toLowerCase().includes(searchQuery.toLowerCase())
                    );
                }

                const totalPages = Math.max(1, Math.ceil(filteredProjects.length / projectsPerPage));

                if (page === 'prev' && currentPage > 1) {
                    currentPage--;
                } else if (page === 'next' && currentPage < totalPages) {
                    currentPage++;
                } else if (!isNaN(parseInt(page))) {
                    currentPage = parseInt(page);
                }

                currentPage = Math.max(1, Math.min(currentPage, totalPages));
                renderProjects(activeFilter, activeSort, searchQuery);
                anime({
                    targets: btn,
                    scale: [1, 1.05, 1],
                    duration: 200,
                    easing: 'easeOutQuad'
                });
            });

            // Notification Bell
            document.querySelector('.fa-bell').addEventListener('click', toggleNotifications);
            document.querySelector('.fa-bell').addEventListener('keypress', (e) => {
                if (e.key === 'Enter' || e.key === ' ') {
                    toggleNotifications();
                }
            });

            // Mark All as Read
            const markAllReadBtn = document.getElementById('mark-all-read');
            if (markAllReadBtn) {
                markAllReadBtn.addEventListener('click', markAllAsRead);
            }

            // Close Notification Modal
            document.querySelector('.notification-modal .close-btn').addEventListener('click', toggleNotifications);
            document.querySelector('.notification-modal .close-btn').addEventListener('keypress', (e) => {
                if (e.key === 'Enter' || e.key === ' ') {
                    toggleNotifications();
                }
            });

            // Close Modal with Escape Key
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') {
                    const modal = document.getElementById('notification-modal');
                    if (modal.classList.contains('open')) {
                        toggleNotifications();
                    }
                }
            });
        });

        window.addEventListener('resize', () => {
            const canvas = document.getElementById('particle-bg');
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\lomba\tara\backend\resources\views/public/proyek/index.blade.php ENDPATH**/ ?>