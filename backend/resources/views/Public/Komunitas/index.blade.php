<x-layout>
    <div id="particles-js" class="fixed inset-0 z-[-1] opacity-40"></div>
    <!-- Notification Modal -->
    <div id="notification-modal" class="fixed top-0 right-0 h-full w-full max-w-md bg-white border-l border-gray-200 z-50 transform translate-x-full transition-transform duration-300 ease-in-out md:w-96">
        <div class="p-6">
            <i class="fas fa-times absolute top-4 right-4 text-xl text-gray-700 cursor-pointer hover:scale-110 transition-transform duration-300" onclick="toggleNotifications()"></i>
            <h2 class="text-2xl font-bold text-gray-900 mb-4 font-space-grotesk">Notifikasi</h2>
            <div class="flex gap-2 mb-4">
                <button class="filter-btn px-4 py-2 bg-gray-100 text-sm text-gray-700 rounded-full hover:bg-gray-200 transition duration-300 active:bg-gray-900 active:text-white active:border-yellow-400" data-filter="all">Semua</button>
                <button class="filter-btn px-4 py-2 bg-gray-100 text-sm text-gray-700 rounded-full hover:bg-gray-200 transition duration-300" data-filter="unread">Belum Dibaca</button>
            </div>
            <button id="mark-all-read" class="px-4 py-2 bg-gray-900 text-white text-sm rounded-full hover:bg-yellow-400 hover:text-gray-900 transition duration-300">Tandai Semua Dibaca</button>
            <div id="notification-list" class="space-y-4 mt-4"></div>
        </div>
    </div>

    <section class="pt-24 pb-12 bg-white">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row gap-6">
            <!-- Left Sidebar -->
            <aside class="w-full md:w-64 bg-gray-50 border border-gray-200 rounded-xl p-6 sticky top-4 h-[calc(100vh-2rem)] overflow-y-auto">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 font-space-grotesk">Navigasi Komunitas</h3>
                <a href="{{ route('komunitas.create') }}" class="flex items-center gap-2 text-gray-700 hover:text-yellow-400 transition py-2"><i class="fas fa-plus"></i> Buat Komunitas</a>
                <a href="{{ route('komunitas.saya') }}" class="flex items-center gap-2 text-gray-700 hover:text-yellow-400 transition py-2"><i class="fas fa-user-friends"></i> Komunitas Saya</a>
                <a href="{{ route('komunitas.populer') }}" class="flex items-center gap-2 text-gray-700 hover:text-yellow-400 transition py-2"><i class="fas fa-fire"></i> Komunitas Populer</a>
                <hr class="my-4 border-gray-200" />
                <h3 class="text-lg font-semibold text-gray-900 mb-4 font-space-grotesk">Komunitas Saya</h3>
                <div id="joined-communities" class="space-y-2 mb-6">
                    <a href="/forum?community=1" class="flex items-center gap-2 text-sm text-gray-700 hover:text-yellow-400 transition"><i class="fas fa-circle text-xs text-gray-900"></i> Komunitas Lukis</a>
                    <a href="/forum?community=2" class="flex items-center gap-2 text-sm text-gray-700 hover:text-yellow-400 transition"><i class="fas fa-circle text-xs text-gray-900"></i> Komunitas Patung</a>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-4 font-space-grotesk">Aktivitas Terbaru</h3>
                <div id="recent-activities" class="space-y-2">
                    <div class="recent-activity cursor-pointer hover:translate-x-1 transition-transform duration-300">
                        <p class="text-sm text-gray-700">Karya baru di Komunitas Lukis: 'Lukisan Matahari'</p>
                        <p class="text-xs text-gray-500">2 jam lalu</p>
                    </div>
                    <div class="recent-activity cursor-pointer hover:translate-x-1 transition-transform duration-300">
                        <p class="text-sm text-gray-700">Workshop di Komunitas Patung: 'Ukiran Kayu'</p>
                        <p class="text-xs text-gray-500">4 jam lalu</p>
                    </div>
                </div>
            </aside>

            <!-- Main Content -->
            <div class="flex-1">
                <!-- Notification Bar -->
                <div id="notification-bar" class="bg-gray-100 border border-gray-200 rounded-lg p-4 mb-6 cursor-pointer hover:shadow-lg hover:-translate-y-1 transition-all duration-300" onclick="dismissNotification()">
                    <p class="text-sm text-gray-700">
                        Anda telah bergabung dengan Komunitas Lukis!
                        <a href="/forum?community=1" class="text-gray-900 hover:text-yellow-400">Kunjungi Komunitas</a>
                    </p>
                </div>

                <!-- Filters and Search -->
                <div class="flex flex-col sm:flex-row sm:items-center gap-3 mb-8">
                    <div class="flex gap-2 overflow-x-auto">
                        <button class="filter-btn px-4 py-2 bg-gray-100 text-sm text-gray-700 rounded-full hover:bg-gray-200 transition duration-300 active:bg-gray-900 active:text-white active:border-yellow-400" data-filter="all">Semua</button>
                        <button class="filter-btn px-4 py-2 bg-gray-100 text-sm text-gray-700 rounded-full hover:bg-gray-200 transition duration-300" data-filter="lukis">Lukis</button>
                        <button class="filter-btn px-4 py-2 bg-gray-100 text-sm text-gray-700 rounded-full hover:bg-gray-200 transition duration-300" data-filter="patung">Patung</button>
                        <button class="filter-btn px-4 py-2 bg-gray-100 text-sm text-gray-700 rounded-full hover:bg-gray-200 transition duration-300" data-filter="kerajinan">Kerajinan</button>
                        <button class="filter-btn px-4 py-2 bg-gray-100 text-sm text-gray-700 rounded-full hover:bg-gray-200 transition duration-300" data-filter="musik">Musik Seni</button>
                        <button class="filter-btn px-4 py-2 bg-gray-100 text-sm text-gray-700 rounded-full hover:bg-gray-200 transition duration-300" data-filter="populer">Populer</button>
                        <button class="filter-btn px-4 py-2 bg-gray-100 text-sm text-gray-700 rounded-full hover:bg-gray-200 transition duration-300" data-filter="baru">Baru</button>
                    </div>
                    <div class="sm:ml-auto mt-3 sm:mt-0">
                        <input type="text" id="community-search" placeholder="Cari komunitas..." class="px-4 py-2 rounded-full bg-gray-100 text-sm text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-900 transition w-full sm:w-64" />
                    </div>
                </div>

                <!-- Community List -->
                <div id="community-list" class="space-y-6"></div>
            </div>

            <!-- Right Sidebar -->
            <aside class="w-full md:w-48 bg-gray-50 border border-gray-200 rounded-xl p-6 sticky top-4 h-[calc(100vh-2rem)] overflow-y-auto">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 font-space-grotesk">Rekomendasi Komunitas</h3>
                <div id="recommended-communities" class="space-y-2 mb-6">
                    <div class="recommended-community flex items-center gap-3 cursor-pointer hover:translate-x-1 transition-transform duration-300">
                        <img src="https://picsum.photos/100/100?random=6" alt="Komunitas Lukis" class="w-16 h-16 object-cover rounded-lg" />
                        <div>
                            <p class="text-sm font-medium text-gray-700">Komunitas Lukis</p>
                            <p class="text-xs text-gray-500">1500 Anggota</p>
                        </div>
                    </div>
                    <div class="recommended-community flex items-center gap-3 cursor-pointer hover:translate-x-1 transition-transform duration-300">
                        <img src="https://picsum.photos/100/100?random=7" alt="Komunitas Patung" class="w-16 h-16 object-cover rounded-lg" />
                        <div>
                            <p class="text-sm font-medium text-gray-700">Komunitas Patung</p>
                            <p class="text-xs text-gray-500">900 Anggota</p>
                        </div>
                    </div>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-4 font-space-grotesk">Notifikasi Singkat</h3>
                <div id="quick-notifications" class="space-y-2">
                    <div class="quick-notification cursor-pointer hover:translate-x-1 transition-transform duration-300">
                        <p class="text-sm text-gray-700">Karya baru: 'Lukisan Matahari'</p>
                        <p class="time text-xs text-gray-500">2 jam lalu</p>
                    </div>
                    <div class="quick-notification cursor-pointer hover:translate-x-1 transition-transform duration-300">
                        <p class="text-sm text-gray-700">Event: 'Workshop Ukir'</p>
                        <p class="time text-xs text-gray-500">4 jam lalu</p>
                    </div>
                </div>
            </aside>
        </div>
    </section>

    @push('scripts')
        <script>
            const communities = [
                {
                    id: 1,
                    name: "Komunitas Lukis",
                    category: "lukis",
                    description: "Berbagi lukisan indah, teknik cat air hingga minyak oleh anggota berbakat.",
                    members: 1500,
                    image: "https://picsum.photos/600/400?random=1",
                    badge: "populer",
                    joined: true,
                },
                {
                    id: 2,
                    name: "Komunitas Patung",
                    category: "patung",
                    description: "Karya patung marmer, kayu, dan logam dari pengrajin mahir.",
                    members: 900,
                    image: "https://picsum.photos/600/400?random=2",
                    badge: "populer",
                    joined: true,
                },
                {
                    id: 3,
                    name: "Komunitas Kerajinan",
                    category: "kerajinan",
                    description: "Kerajinan tangan unik, anyaman hingga ukiran tradisional.",
                    members: 700,
                    image: "https://picsum.photos/600/400?random=3",
                    badge: "baru",
                    joined: false,
                },
                {
                    id: 4,
                    name: "Komunitas Musik Seni",
                    category: "musik",
                    description: "Komposisi musik seni, instrumen buatan tangan anggota.",
                    members: 500,
                    image: "https://picsum.photos/600/400?random=4",
                    badge: "baru",
                    joined: false,
                },
                {
                    id: 5,
                    name: "Komunitas Seni Digital",
                    category: "lukis",
                    description: "Karya digital lukis dan ilustrasi modern.",
                    members: 1200,
                    image: "https://picsum.photos/600/400?random=5",
                    badge: null,
                    joined: false,
                },
            ];

            // Simulated Notification Data
            const notifications = [
                {
                    id: 1,
                    text: "Karya baru di Komunitas Lukis: 'Lukisan Matahari Terbenam'",
                    time: "2 jam lalu",
                    communityId: 1,
                    read: false,
                },
                {
                    id: 2,
                    text: "Event baru di Komunitas Patung: 'Workshop Ukir'",
                    time: "4 jam lalu",
                    communityId: 2,
                    read: false,
                },
                {
                    id: 3,
                    text: "Diskusi baru di Komunitas Lukis: 'Teknik Seni Modern'",
                    time: "6 jam lalu",
                    communityId: 1,
                    read: true,
                },
            ];

            // Simulated Recent Activity Data
            const recentActivities = [
                {
                    id: 1,
                    text: "Karya baru di Komunitas Lukis: 'Lukisan Matahari Terbenam'",
                    time: "2 jam lalu",
                    communityId: 1,
                },
                {
                    id: 2,
                    text: "Event baru di Komunitas Patung: 'Workshop Ukir'",
                    time: "4 jam lalu",
                    communityId: 2,
                },
            ];

            // Render Communities
            function renderCommunities(filter = "all", searchQuery = "") {
                const communityList = document.getElementById("community-list");
                communityList.innerHTML = "";

                let filteredCommunities = filter === "all" ? communities
                    : filter === "populer" ? communities.filter(c => c.badge === "populer")
                    : filter === "baru" ? communities.filter(c => c.badge === "baru")
                    : communities.filter(c => c.category === filter);

                if (searchQuery) {
                    filteredCommunities = filteredCommunities.filter(c =>
                        c.name.toLowerCase().includes(searchQuery.toLowerCase()) ||
                        c.description.toLowerCase().includes(searchQuery.toLowerCase())
                    );
                }

                if (filteredCommunities.length === 0) {
                    communityList.innerHTML = `
                        <div class="text-center text-gray-600">
                            <p class="text-lg">Tidak ada komunitas ditemukan.</p>
                            <a href="{{ route('komunitas.index') }}" class="inline-block mt-4 px-6 py-3 bg-gray-900 text-white rounded-full font-semibold hover:bg-yellow-400 hover:text-gray-900 transition">Lihat Semua Komunitas</a>
                        </div>`;
                    return;
                }

                filteredCommunities.forEach(community => {
                    communityList.innerHTML += `
                        <a href="{{ route('komunitas.show', community.id) }}" class="block">
                            <div class="community-card bg-white border border-gray-200 rounded-xl overflow-hidden hover:shadow-xl hover:-translate-y-2 transition-all duration-300">
                                <div class="inner">
                                    <img src="${community.image}" alt="${community.name}" class="w-full h-52 object-cover hover:scale-105 transition-transform duration-300" />
                                    <div class="p-6">
                                        <div class="flex items-center gap-2">
                                            <h3 class="text-xl font-semibold text-gray-900">${community.name}</h3>
                                            ${community.badge ? `<span class="badge px-2 py-1 text-xs font-medium rounded-full ${community.badge === 'populer' ? 'bg-yellow-200 text-gray-900' : 'bg-green-100 text-green-800'}">${community.badge.charAt(0).toUpperCase() + community.badge.slice(1)}</span>` : ""}
                                        </div>
                                        <p class="text-gray-600 mt-2 line-clamp-3">${community.description}</p>
                                        <div class="flex items-center justify-between mt-4">
                                            <span class="text-sm text-gray-500"><i class="fas fa-user-friends mr-1"></i>${community.members} Anggota</span>
                                            <button class="join-btn px-4 py-2 rounded-full text-sm font-medium ${community.joined ? 'bg-gray-300 text-gray-700' : 'bg-gray-900 text-white'} hover:scale-105 transition-transform duration-300" onclick="event.preventDefault(); toggleJoin(${community.id}, this)">
                                                ${community.joined ? "Bergabung" : "Gabung"}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>`;
                });

                gsap.from(".community-card", {
                    opacity: 0,
                    y: 30,
                    duration: 0.8,
                    stagger: 0.1,
                    ease: "power3.out",
                });
            }

            // Render Joined Communities
            function renderJoinedCommunities() {
                const joinedCommunities = document.getElementById("joined-communities");
                const joined = communities.filter(c => c.joined);
                joinedCommunities.innerHTML = joined.length === 0
                    ? '<p class="text-sm text-gray-500">Belum bergabung dengan komunitas.</p>'
                    : joined.map(c => `
                        <a href="/forum?community=${c.id}" class="flex items-center gap-2 text-sm text-gray-700 hover:text-yellow-400 transition"><i class="fas fa-circle text-xs text-gray-900"></i> ${c.name}</a>`).join("");

                anime({
                    targets: "#joined-communities a",
                    translateY: [20, 0],
                    opacity: [0, 1],
                    duration: 600,
                    delay: anime.stagger(100),
                    easing: "easeOutQuad",
                });
            }

            // Render Recommended Communities
            function renderRecommendedCommunities() {
                const recommendedCommunities = document.getElementById("recommended-communities");
                const popular = communities.filter(c => c.badge === "populer").slice(0, 3);
                recommendedCommunities.innerHTML = popular.length === 0
                    ? '<p class="text-sm text-gray-500">Tidak ada rekomendasi saat ini.</p>'
                    : popular.map(c => `
                        <div class="recommended-community flex items-center gap-3 cursor-pointer hover:translate-x-1 transition-transform duration-300" onclick="filterByCategory('${c.category}')">
                            <img src="${c.image}" alt="${c.name}" class="w-16 h-16 object-cover rounded-lg" />
                            <div>
                                <p class="text-sm font-medium text-gray-700">${c.name}</p>
                                <p class="text-xs text-gray-500">${c.members} Anggota</p>
                            </div>
                        </div>`).join("");

                anime({
                    targets: ".recommended-community",
                    translateY: [20, 0],
                    opacity: [0, 1],
                    duration: 600,
                    delay: anime.stagger(100),
                    easing: "easeOutQuad",
                });
            }

            // Render Recent Activities
            function renderRecentActivities() {
                const recentActivitiesDiv = document.getElementById("recent-activities");
                recentActivitiesDiv.innerHTML = recentActivities.length === 0
                    ? '<p class="text-sm text-gray-500">Tidak ada aktivitas terbaru.</p>'
                    : recentActivities.map(a => `
                        <div class="recent-activity cursor-pointer hover:translate-x-1 transition-transform duration-300" onclick="viewActivity(${a.id})">
                            <p class="text-sm text-gray-700">${a.text}</p>
                            <p class="text-xs text-gray-500">${a.time}</p>
                        </div>`).join("");

                anime({
                    targets: ".recent-activity",
                    translateY: [20, 0],
                    opacity: [0, 1],
                    duration: 600,
                    delay: anime.stagger(100),
                    easing: "easeOutQuad",
                });
            }

            // Render Quick Notifications
            function renderQuickNotifications() {
                const quickNotifications = document.getElementById("quick-notifications");
                const unread = notifications.filter(n => !n.read).slice(0, 3);
                quickNotifications.innerHTML = unread.length === 0
                    ? '<p class="text-sm text-gray-500">Tidak ada notifikasi baru.</p>'
                    : unread.map(n => `
                        <div class="quick-notification cursor-pointer hover:translate-x-1 transition-transform duration-300" onclick="viewNotification(${n.id})">
                            <p class="text-sm text-gray-700">${n.text}</p>
                            <p class="time text-xs text-gray-500">${n.time}</p>
                        </div>`).join("");

                anime({
                    targets: ".quick-notification",
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

                let filteredNotifications = filter === "all" ? notifications : notifications.filter(n => !n.read);

                if (filteredNotifications.length === 0) {
                    notificationList.innerHTML = `
                        <div class="text-center text-gray-600">
                            <p class="text-sm">Tidak ada notifikasi ${filter === "all" ? "" : "belum dibaca"}.</p>
                        </div>`;
                    return;
                }

                filteredNotifications.forEach(notification => {
                    notificationList.innerHTML += `
                        <div class="notification-card bg-white border border-gray-200 rounded-lg p-4 ${notification.read ? '' : 'bg-gray-100'} hover:shadow-lg hover:-translate-y-1 transition-all duration-300 cursor-pointer" onclick="viewNotification(${notification.id})">
                            <p class="text-sm text-gray-700">${notification.text}</p>
                            <p class="time text-xs text-gray-500">${notification.time}</p>
                        </div>`;
                });

                const unreadCount = notifications.filter(n => !n.read).length;
                document.getElementById("unread-count") ? document.getElementById("unread-count").textContent = unreadCount : null;

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
                notifications.forEach(n => n.read = true);
                renderNotifications(document.querySelector("#notification-modal .filter-btn.active")?.dataset.filter || "all");
                renderQuickNotifications();
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
                const notification = notifications.find(n => n.id === notificationId);
                notification.read = true;
                renderNotifications(document.querySelector("#notification-modal .filter-btn.active")?.dataset.filter || "all");
                renderQuickNotifications();
                alert(`Melihat notifikasi ${notificationId} (placeholder).`);
            }

            // Toggle Join Community
            function toggleJoin(id, button) {
                const community = communities.find(c => c.id === id);
                community.joined = !community.joined;
                button.textContent = community.joined ? "Bergabung" : "Gabung";
                button.classList.toggle("bg-gray-300", community.joined);
                button.classList.toggle("text-gray-700", community.joined);
                button.classList.toggle("bg-gray-900", !community.joined);
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
                    renderNotifications(document.querySelector("#notification-modal .filter-btn.active")?.dataset.filter || "all");
                    renderQuickNotifications();
                }

                renderJoinedCommunities();
                renderRecentActivities();
            }

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

            // Filter by Category
            function filterByCategory(category) {
                const filterButtons = document.querySelectorAll(".filter-btn:not(#notification-modal .filter-btn)");
                filterButtons.forEach(f => f.classList.remove("active"));
                const targetButton = Array.from(filterButtons).find(btn => btn.dataset.filter === category);
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
                alert(`Melihat aktivitas ${activityId} (placeholder).`);
            }

            // Initialize
            renderCommunities();
            renderJoinedCommunities();
            renderRecommendedCommunities();
            renderRecentActivities();
            renderQuickNotifications();

            // Filter Functionality
            const filterButtons = document.querySelectorAll(".filter-btn:not(#notification-modal .filter-btn)");
            filterButtons.forEach(btn => {
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
                        filterButtons.forEach(f => f.classList.remove("active"));
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

            // Notification Filter Functionality
            const notificationFilterButtons = document.querySelectorAll("#notification-modal .filter-btn");
            notificationFilterButtons.forEach(btn => {
                btn.addEventListener("click", () => {
                    notificationFilterButtons.forEach(f => f.classList.remove("active"));
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

            // Mark All as Read
            document.getElementById("mark-all-read").addEventListener("click", markAllAsRead);

            // Search Functionality
            document.getElementById("community-search").addEventListener("input", e => {
                const activeFilter = document.querySelector(".filter-btn:not(#notification-modal .filter-btn).active")?.dataset.filter || "all";
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

            gsap.from(".sidebar", {
                opacity: 0,
                x: (index, target) => target.classList.contains("md:w-64") ? -50 : 50,
                duration: 1,
                ease: "power3.out",
                scrollTrigger: {
                    trigger: ".sidebar",
                    start: "top 80%",
                },
            });

            // Particles.js Initialization
            window.addEventListener("load", () => {
                particlesJS("particles-js", {
                    particles: {
                        number: { value: 50, density: { enable: true, value_area: 1000 } },
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