<x-layout>
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
            <button id="mark-all-read" class="px-4 py-2 bg-black text-white text-sm rounded-full hover:bg-yellow-400 hover:text-black transition mb-4">
                Tandai Semua Dibaca
            </button>
            <div id="notification-list" class="space-y-4"></div>
        </div>
    </div>

    <!-- Komunitas Section -->
    <section class="relative pt-24 pb-12 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col lg:flex-row gap-6">
                <!-- Left Sidebar -->
                <aside class="left-sidebar lg:w-64">
                    <h3 class="text-lg font-semibold text-black mb-4" style="font-family: 'Space Grotesk', sans-serif">
                        Navigasi
                    </h3>
                    <a href="/" class="flex items-center gap-2"><i class="fas fa-home"></i> Beranda</a>
                    <a href="/galeri" class="flex items-center gap-2"><i class="fas fa-image"></i> Galeri</a>
                    <a href="/event" class="flex items-center gap-2"><i class="fas fa-calendar"></i> Event</a>
                    <a href="/tentang" class="flex items-center gap-2"><i class="fas fa-info-circle"></i> Tentang</a>
                    <hr class="my-4 border-gray-200" />
                    <h3 class="text-lg font-semibold text-black mb-4" style="font-family: 'Space Grotesk', sans-serif">
                        Kategori Komunitas
                    </h3>
                    <a href="#" class="flex items-center gap-2" onclick="filterByCategory('puisi')"><i class="fas fa-pen"></i> Puisi</a>
                    <a href="#" class="flex items-center gap-2" onclick="filterByCategory('desain')"><i class="fas fa-paint-brush"></i> Desain</a>
                    <a href="#" class="flex items-center gap-2" onclick="filterByCategory('musik')"><i class="fas fa-music"></i> Musik</a>
                    <a href="#" class="flex items-center gap-2" onclick="filterByCategory('coding')"><i class="fas fa-code"></i> Coding</a>
                </aside>

                <!-- Main Content -->
                <div class="flex-1">
                    <!-- Notification Bar -->
                    <div id="notification-bar" class="notification-bar" onclick="dismissNotification()">
                        <p class="text-sm text-gray-700">
                            Anda telah bergabung dengan Komunitas Puisi!
                            <a href="/forum?community=1" class="text-black hover:text-yellow-400">Kunjungi Forum</a>
                        </p>
                    </div>

                    <!-- Filters and Search -->
                    <div class="flex flex-col sm:flex-row sm:items-center gap-3 mb-8">
                        <div class="flex gap-2 overflow-x-auto">
                            <button class="filter-btn active" data-filter="all">Semua</button>
                            <button class="filter-btn" data-filter="puisi">Puisi</button>
                            <button class="filter-btn" data-filter="desain">Desain</button>
                            <button class="filter-btn" data-filter="musik">Musik</button>
                            <button class="filter-btn" data-filter="coding">Coding</button>
                            <button class="filter-btn" data-filter="populer">Populer</button>
                            <button class="filter-btn" data-filter="baru">Baru</button>
                        </div>
                        <div class="sm:ml-auto mt-3 sm:mt-0">
                            <input type="text" id="community-search" placeholder="Cari komunitas..." class="px-4 py-2 rounded-full bg-gray-100 text-sm text-gray-700 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-black transition w-full sm:w-64" />
                        </div>
                    </div>

                    <!-- Community List -->
                    <div id="community-list" class="space-y-6"></div>
                </div>

                <!-- Right Sidebar -->
                <aside class="right-sidebar lg:w-64">
                    <h3 class="text-lg font-semibold text-black mb-4" style="font-family: 'Space Grotesk', sans-serif">
                        Komunitas Saya
                    </h3>
                    <div id="joined-communities" class="space-y-2 mb-6"></div>
                    <h3 class="text-lg font-semibold text-black mb-4" style="font-family: 'Space Grotesk', sans-serif">
                        Rekomendasi Komunitas
                    </h3>
                    <div id="recommended-communities" class="space-y-2 mb-6"></div>
                    <h3 class="text-lg font-semibold text-black mb-4" style="font-family: 'Space Grotesk', sans-serif">
                        Aktivitas Terbaru
                    </h3>
                    <div id="recent-activities" class="space-y-2"></div>
                </aside>
            </div>
        </div>
    </section>

    @push('styles')
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

            /* navlink */
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
                background: linear-gradient(90deg, #111827, #374151);
                transition: width 0.3s;
            }

            .nav-link:hover::after {
                width: 100%;
            }

            .nav-link.active {
                color: #111827;
                font-weight: 600;
            }

            .nav-link.active::after {
                width: 100%;
            }

            .perspective {
                perspective: 1200px;
            }

            .hover-3d {
                transform-style: preserve-3d;
                transition: transform 0.4s ease, box-shadow 0.4s ease;
                cursor: pointer;
            }

            .hover-3d .inner {
                transform: rotateY(0deg) rotateX(0deg);
                transition: transform 0.4s ease;
            }

            .hover-3d:hover .inner {
                transform: rotateY(8deg) rotateX(4deg);
            }

            .hover-3d:hover {
                transform: translateY(-8px);
                box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
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

            .community-card {
                background: linear-gradient(145deg, #ffffff, #f9fafb);
                border: 1px solid #e5e7eb;
                border-radius: 12px;
                overflow: hidden;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .community-card img {
                width: 100%;
                height: 400px;
                object-fit: cover;
                transition: transform 0.4s ease;
            }

            .community-card:hover img {
                transform: scale(1.05);
            }

            .community-card-content {
                padding: 1.5rem;
            }

            .community-card h3 {
                font-size: 1.5rem;
                font-weight: 600;
                color: #111827;
                margin: 0 0 0.75rem;
            }

            .community-card p {
                font-size: 1rem;
                color: #4b5563;
                margin: 0 0 1.25rem;
                display: -webkit-box;
                -webkit-line-clamp: 3;
                -webkit-box-orient: vertical;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            .recommended-community {
                display: flex;
                align-items: center;
                gap: 0.75rem;
                padding: 0.5rem 0;
                transition: transform 0.3s ease;
            }

            .recommended-community img {
                width: 80px;
                height: 80px;
                object-fit: cover;
                border-radius: 8px;
            }

            .recommended-community:hover {
                transform: translateX(4px);
            }

            .recent-activity {
                padding: 0.5rem 0;
                transition: transform 0.3s ease;
            }

            .recent-activity:hover {
                transform: translateX(4px);
            }

            .badge {
                display: inline-flex;
                align-items: center;
                padding: 0.25rem 0.75rem;
                font-size: 0.75rem;
                font-weight: 500;
                border-radius: 9999px;
                margin-left: 0.5rem;
            }

            .badge-populer {
                background: linear-gradient(90deg, #facc15, #fde68a);
                color: #111827;
            }

            .badge-baru {
                background: linear-gradient(90deg, #d1fae5, #a7f3d0);
                color: #065f46;
            }

            .notification-badge {
                position: absolute;
                top: -8px;
                right: -8px;
                background: #facc15;
                color: #111827;
                font-size: 0.75rem;
                font-weight: 500;
                border-radius: 9999px;
                padding: 0.1rem 0.5rem;
            }

            .join-btn {
                padding: 0.5rem 1.5rem;
                border-radius: 9999px;
                font-size: 0.875rem;
                font-weight: 500;
                background: linear-gradient(90deg, #111827, #374151);
                color: #ffffff;
                transition: all 0.3s ease;
            }

            .join-btn:hover {
                transform: scale(1.05);
                background: linear-gradient(90deg, #374151, #4b5563);
            }

            .filter-btn {
                padding: 0.5rem 1rem;
                border-radius: 9999px;
                font-size: 0.8rem;
                font-weight: 500;
                border: 1px solid #e5e7eb;
                background: #f3f4f6;
                color: #374151;
                transition: all 0.3s ease;
                white-space: nowrap;
            }

            .filter-btn.active {
                background: linear-gradient(90deg, #111827, #374151);
                color: #ffffff;
                border-color: #facc15;
            }

            .filter-btn:hover {
                background: #e5e7eb;
                color: #1f2937;
            }

            .left-sidebar, .right-sidebar {
                background: #f9fafb;
                border: 1px solid #e5e7eb;
                border-radius: 12px;
                padding: 2rem;
            }

            .sidebar a {
                display: block;
                padding: 0.5rem 0;
                color: #374151;
                font-weight: 500;
                transition: color 0.3s ease;
            }

            .sidebar a:hover {
                color: #facc15;
            }

            .notification-bar {
                background: linear-gradient(145deg, #f3f4f6, #e5e7eb);
                border: 1px solid #d1d5db;
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
                color: #facc15;
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
                background: linear-gradient(145deg, #f3f4f6, #e5e7eb);
            }

            .notification-card p {
                font-size: 0.9rem;
                color: #4b5563;
            }

            .notification-card .time {
                font-size: 0.75rem;
                color: #6b7280;
            }

            @media (max-width: 1024px) {
                .left-sidebar, .right-sidebar {
                    max-width: none;
                    margin-bottom: 1.5rem;
                }

                .notification-modal {
                    width: 100%;
                    max-width: 100%;
                }
            }

            @media (max-width: 768px) {
                .notification-modal {
                    width: 100%;
                    max-width: 100%;
                }

                .sidebar {
                    padding: 1.5rem;
                }
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            // Simulated Community Data
            const communities = [
                {
                    id: 1,
                    name: "Komunitas Puisi",
                    category: "puisi",
                    description: "Berbagi kata, menenun makna dalam puisi. Bergabunglah untuk mengeksplorasi keindahan bahasa dan emosi.",
                    members: 1200,
                    image: "https://picsum.photos/600/400?poetry",
                    badge: "populer",
                    joined: true,
                },
                {
                    id: 2,
                    name: "Komunitas Desain",
                    category: "desain",
                    description: "Ciptakan visual yang memukau bersama desainer berbakat dari seluruh Indonesia.",
                    members: 850,
                    image: "https://picsum.photos/600/400?design",
                    badge: "populer",
                    joined: true,
                },
                {
                    id: 3,
                    name: "Komunitas Musik",
                    category: "musik",
                    description: "Melodi yang menginspirasi dari musisi muda. Diskusikan karya dan kolaborasi musik.",
                    members: 600,
                    image: "https://picsum.photos/600/400?music",
                    badge: "baru",
                    joined: false,
                },
                {
                    id: 4,
                    name: "Komunitas Coding",
                    category: "coding",
                    description: "Inovasi teknologi dari para developer. Berbagi kode dan proyek open-source.",
                    members: 450,
                    image: "https://picsum.photos/600/400?coding",
                    badge: "baru",
                    joined: false,
                },
                {
                    id: 5,
                    name: "Penulis Kreatif",
                    category: "puisi",
                    description: "Menulis cerita dan puisi yang menyentuh hati. Untuk penulis yang ingin berkembang.",
                    members: 300,
                    image: "https://picsum.photos/600/400?writing",
                    badge: null,
                    joined: false,
                },
                {
                    id: 6,
                    name: "Desain UI/UX",
                    category: "desain",
                    description: "Mendesain antarmuka pengguna modern dengan fokus pada pengalaman pengguna.",
                    members: 700,
                    image: "https://picsum.photos/600/400?uiux",
                    badge: "populer",
                    joined: false,
                },
            ];

            // Simulated Notification Data
            const notifications = [
                {
                    id: 1,
                    text: "New post in Komunitas Puisi: 'Puisi Senja'",
                    time: "2 jam lalu",
                    communityId: 1,
                    read: false,
                },
                {
                    id: 2,
                    text: "Event baru di Komunitas Desain: 'Workshop UI'",
                    time: "4 jam lalu",
                    communityId: 2,
                    read: false,
                },
                {
                    id: 3,
                    text: "Diskusi baru di Komunitas Puisi: 'Sastra Modern'",
                    time: "6 jam lalu",
                    communityId: 1,
                    read: false,
                },
                {
                    id: 4,
                    text: "New post in Komunitas Desain: 'Tips Desain Minimalis'",
                    time: "1 hari lalu",
                    communityId: 2,
                    read: true,
                },
            ];

            // Simulated Recent Activity Data
            const recentActivities = [
                {
                    id: 1,
                    text: "New post in Komunitas Puisi: 'Puisi Senja'",
                    time: "2 jam lalu",
                    communityId: 1,
                },
                {
                    id: 2,
                    text: "Event baru di Komunitas Desain: 'Workshop UI'",
                    time: "4 jam lalu",
                    communityId: 2,
                },
                {
                    id: 3,
                    text: "Diskusi baru di Komunitas Puisi: 'Sastra Modern'",
                    time: "6 jam lalu",
                    communityId: 1,
                },
            ];

            // Render Communities
            function renderCommunities(filter = "all", searchQuery = "") {
                const communityList = document.getElementById("community-list");
                communityList.innerHTML = "";

                let filteredCommunities =
                    filter === "all"
                        ? communities
                        : filter === "populer"
                        ? communities.filter((c) => c.badge === "populer")
                        : filter === "baru"
                        ? communities.filter((c) => c.badge === "baru")
                        : communities.filter((c) => c.category === filter);

                if (searchQuery) {
                    filteredCommunities = filteredCommunities.filter(
                        (c) =>
                            c.name.toLowerCase().includes(searchQuery.toLowerCase()) ||
                            c.description.toLowerCase().includes(searchQuery.toLowerCase())
                    );
                }

                if (filteredCommunities.length === 0) {
                    communityList.innerHTML = `
                        <div class="text-center text-gray-600">
                            <p class="text-lg">Tidak ada komunitas ditemukan.</p>
                            <a href="/komunitas" class="inline-block mt-4 px-6 py-3 bg-black text-white rounded-full font-semibold hover:bg-yellow-400 hover:text-black transition">Lihat Semua Komunitas</a>
                        </div>
                    `;
                    return;
                }

                filteredCommunities.forEach((community) => {
                    communityList.innerHTML += `
                        <a href="/detail_komunitas.html?community=${community.id}" class="block">
                            <div class="community-card hover-3d">
                                <div class="inner">
                                    <img src="${community.image}" alt="${community.name}" />
                                    <div class="community-card-content">
                                        <div class="flex items-center gap-2">
                                            <h3>${community.name}</h3>
                                            ${community.badge
                                                ? `<span class="badge badge-${community.badge}">${community.badge.charAt(0).toUpperCase() + community.badge.slice(1)}</span>`
                                                : ""
                                            }
                                        </div>
                                        <p>${community.description}</p>
                                        <div class="flex items-center justify-between">
                                            <span class="text-sm text-gray-500"><i class="fas fa-user-friends mr-1"></i>${community.members} Anggota</span>
                                            <button class="join-btn ${community.joined ? "bg-gray-300 text-gray-700" : ""}" onclick="event.preventDefault(); toggleJoin(${community.id}, this)">
                                                ${community.joined ? "Bergabung" : "Gabung"}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    `;
                });

                gsap.from(".community-card", {
                    opacity: 0,
                    y: 30,
                    duration: 0.8,
                    stagger: 0.1,
                    ease: "power3.out",
                });
            }

            // Render Joined Communities in Right Sidebar
            function renderJoinedCommunities() {
                const joinedCommunities = document.getElementById("joined-communities");
                const joined = communities.filter((c) => c.joined);
                joinedCommunities.innerHTML =
                    joined.length === 0
                        ? '<p class="text-sm text-gray-500">Belum bergabung dengan komunitas.</p>'
                        : joined
                              .map(
                                  (c) => `
                        <a href="/forum?community=${c.id}" class="flex items-center gap-2 text-sm">
                            <i class="fas fa-circle text-xs text-black"></i> ${c.name}
                        </a>
                    `
                              )
                              .join("");

                anime({
                    targets: "#joined-communities a",
                    translateY: [20, 0],
                    opacity: [0, 1],
                    duration: 600,
                    delay: anime.stagger(100),
                    easing: "easeOutQuad",
                });
            }

            // Render Recommended Communities in Right Sidebar
            function renderRecommendedCommunities() {
                const recommendedCommunities = document.getElementById("recommended-communities");
                const popular = communities.filter((c) => c.badge === "populer").slice(0, 3);
                recommendedCommunities.innerHTML =
                    popular.length === 0
                        ? '<p class="text-sm text-gray-500">Tidak ada rekomendasi saat ini.</p>'
                        : popular
                              .map(
                                  (c) => `
                        <div class="recommended-community cursor-pointer" onclick="filterByCategory('${c.category}')">
                            <img src="${c.image}" alt="${c.name}" />
                            <div>
                                <p class="text-sm font-medium text-gray-700">${c.name}</p>
                                <p class="text-xs text-gray-500">${c.members} Anggota</p>
                            </div>
                        </div>
                    `
                              )
                              .join("");

                anime({
                    targets: ".recommended-community",
                    translateY: [20, 0],
                    opacity: [0, 1],
                    duration: 600,
                    delay: anime.stagger(100),
                    easing: "easeOutQuad",
                });
            }

            // Render Recent Activities in Right Sidebar
            function renderRecentActivities() {
                const recentActivitiesDiv = document.getElementById("recent-activities");
                recentActivitiesDiv.innerHTML =
                    recentActivities.length === 0
                        ? '<p class="text-sm text-gray-500">Tidak ada aktivitas terbaru.</p>'
                        : recentActivities
                              .map(
                                  (a) => `
                        <div class="recent-activity cursor-pointer" onclick="viewActivity(${a.id})">
                            <p class="text-sm text-gray-700">${a.text}</p>
                            <p class="text-xs text-gray-500">${a.time}</p>
                        </div>
                    `
                              )
                              .join("");

                anime({
                    targets: ".recent-activity",
                    translateY: [20, 0],
                    opacity: [0, 1],
                    duration: 600,
                    delay: anime.stagger(100),
                    easing: "easeOutQuad",
                });
            }

            // Render Notifications in Modal
            function renderNotifications(filter = "all") {
                const notificationList = document.getElementById("notification-list");
                notificationList.innerHTML = "";

                let filteredNotifications =
                    filter === "all" ? notifications : notifications.filter((n) => !n.read);

                if (filteredNotifications.length === 0) {
                    notificationList.innerHTML = `
                        <div class="text-center text-gray-600">
                            <p class="text-sm">Tidak ada notifikasi ${filter === "all" ? "" : "belum dibaca"}.</p>
                        </div>
                    `;
                    return;
                }

                filteredNotifications.forEach((notification) => {
                    notificationList.innerHTML += `
                        <div class="notification-card ${notification.read ? "" : "unread"}" onclick="viewNotification(${notification.id})">
                            <p>${notification.text}</p>
                            <p class="time">${notification.time}</p>
                        </div>
                    `;
                });

                const unreadCount = notifications.filter((n) => !n.read).length;
                document.getElementById("unread-count").textContent = unreadCount;

                gsap.from(".notification-card", {
                    opacity: 0,
                    y: 20,
                    duration: 0.8,
                    stagger: 0.1,
                    ease: "power3.out",
                });
            }

            // Toggle Notifications Modal
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

            // Mark All Notifications as Read
            function markAllAsRead() {
                notifications.forEach((n) => (n.read = true));
                renderNotifications(
                    document.querySelector("#notification-modal .filter-btn.active")?.dataset.filter || "all"
                );
                anime({
                    targets: "#mark-all-read",
                    scale: [1, 1.1, 1],
                    backgroundColor: ["#111827", "#374151", "#111827"],
                    color: ["#ffffff", "#facc15", "#ffffff"],
                    duration: 300,
                    easing: "easeOutQuad",
                });
            }

            // View Notification
            function viewNotification(notificationId) {
                const notification = notifications.find((n) => n.id === notificationId);
                notification.read = true;
                renderNotifications(
                    document.querySelector("#notification-modal .filter-btn.active")?.dataset.filter || "all"
                );
                alert(`Viewing notification ${notificationId} (placeholder).`);
            }

            // Toggle Join Community
            function toggleJoin(id, button) {
                const community = communities.find((c) => c.id === id);
                community.joined = !community.joined;
                button.textContent = community.joined ? "Bergabung" : "Gabung";
                button.classList.toggle("bg-gray-300", community.joined);
                button.classList.toggle("text-gray-700", community.joined);
                button.classList.toggle("bg-black", !community.joined);
                button.classList.toggle("text-white", !community.joined);

                anime({
                    targets: button,
                    scale: [1, 1.1, 1],
                    backgroundColor: community.joined ? "#d1d5db" : "#111827",
                    color: community.joined ? "#4b5563" : "#ffffff",
                    duration: 300,
                    easing: "easeOutQuad",
                });

                const notificationBar = document.getElementById("notification-bar");
                notificationBar.querySelector("p").textContent = community.joined
                    ? `Anda telah bergabung dengan ${community.name}!`
                    : `Anda telah keluar dari ${community.name}.`;
                notificationBar.classList.remove("hidden");
                gsap.from(notificationBar, {
                    opacity: 0,
                    y: -20,
                    duration: 0.5,
                    ease: "power2.out",
                });

                if (community.joined) {
                    notifications.unshift({
                        id: notifications.length + 1,
                        text: `Anda telah bergabung dengan ${community.name}!`,
                        time: "Baru saja",
                        communityId: community.id,
                        read: false,
                    });
                    renderNotifications(
                        document.querySelector("#notification-modal .filter-btn.active")?.dataset.filter || "all"
                    );
                }

                renderJoinedCommunities();
                renderRecentActivities();
            }

            // Dismiss Notification Bar
            function dismissNotification() {
                const notificationBar = document.getElementById("notification-bar");
                gsap.to(notificationBar, {
                    opacity: 0,
                    y: -20,
                    duration: 0.5,
                    ease: "power2.in",
                    onComplete: () => notificationBar.classList.add("hidden"),
                });
            }

            // Filter by Category from Sidebars or Filters
            function filterByCategory(category) {
                const filterButtons = document.querySelectorAll(".filter-btn:not(#notification-modal .filter-btn)");
                filterButtons.forEach((f) => f.classList.remove("active"));
                const targetButton = Array.from(filterButtons).find((btn) => btn.dataset.filter === category);
                if (targetButton) {
                    targetButton.classList.add("active");
                    anime({
                        targets: targetButton,
                        scale: [1, 1.1, 1],
                        backgroundColor: ["#f3f4f6", "#111827"],
                        color: ["#374151", "#ffffff"],
                        duration: 300,
                        easing: "easeOutQuad",
                    });
                }
                renderCommunities(category, document.getElementById("community-search").value);
            }

            // View Activity
            function viewActivity(activityId) {
                alert(`Viewing activity ${activityId} (placeholder).`);
            }

            // Initialize
            renderCommunities();
            renderJoinedCommunities();
            renderRecommendedCommunities();
            renderRecentActivities();

            // Filter Functionality for Community Filters
            const filterButtons = document.querySelectorAll(".filter-btn:not(#notification-modal .filter-btn)");
            filterButtons.forEach((btn) => {
                btn.addEventListener("click", () => {
                    const isActive = btn.classList.contains("active");
                    if (isActive) {
                        btn.classList.remove("active");
                        anime({
                            targets: btn,
                            scale: [1.1, 1],
                            backgroundColor: ["#111827", "#f3f4f6"],
                            color: ["#ffffff", "#374151"],
                            duration: 300,
                            easing: "easeOutQuad",
                        });
                        renderCommunities(null, document.getElementById("community-search").value);
                    } else {
                        filterButtons.forEach((f) => f.classList.remove("active"));
                        btn.classList.add("active");
                        anime({
                            targets: btn,
                            scale: [1, 1.1, 1],
                            backgroundColor: ["#f3f4f6", "#111827"],
                            color: ["#374151", "#ffffff"],
                            duration: 300,
                            easing: "easeOutQuad",
                        });
                        renderCommunities(btn.dataset.filter, document.getElementById("community-search").value);
                    }
                });
            });

            // Filter Functionality for Notifications
            const notificationFilterButtons = document.querySelectorAll("#notification-modal .filter-btn");
            notificationFilterButtons.forEach((btn) => {
                btn.addEventListener("click", () => {
                    notificationFilterButtons.forEach((f) => f.classList.remove("active"));
                    btn.classList.add("active");
                    renderNotifications(btn.dataset.filter);
                    anime({
                        targets: btn,
                        scale: [1, 1.1, 1],
                        backgroundColor: ["#f3f4f6", "#111827"],
                        color: ["#374151", "#ffffff"],
                        duration: 300,
                        easing: "easeOutQuad",
                    });
                });
            });

            // Mark All as Read Button
            document.getElementById("mark-all-read").addEventListener("click", markAllAsRead);

            // Search Functionality
            document.getElementById("community-search").addEventListener("input", (e) => {
                const activeFilter =
                    document.querySelector(".filter-btn:not(#notification-modal .filter-btn).active")?.dataset.filter || "all";
                renderCommunities(activeFilter, e.target.value);
            });

            // GSAP Animations
            gsap.registerPlugin(ScrollTrigger);
            gsap.from("h1, p", {
                opacity: 0,
                y: 20,
                duration: 1,
                stagger: 0.2,
                ease: "power3.out",
                delay: 0.2,
            });

            gsap.from(".left-sidebar", {
                opacity: 0,
                x: -50,
                duration: 1,
                ease: "power3.out",
                scrollTrigger: {
                    trigger: ".left-sidebar",
                    start: "top 80%",
                },
            });

            gsap.from(".right-sidebar", {
                opacity: 0,
                x: 50,
                duration: 1,
                ease: "power3.out",
                scrollTrigger: {
                    trigger: ".right-sidebar",
                    start: "top 80%",
                },
            });

            // Particles.js Initialization
            window.addEventListener("load", () => {
                particlesJS("particles-js", {
                    particles: {
                        number: {
                            value: 50,
                            density: { enable: true, value_area: 1000 },
                        },
                        color: { value: "#4b5563" },
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
        </script>
    @endpush
</x-layout>