<x-layout>
    <!-- Moderator Modal -->
    <div id="moderator-modal" class="moderator-modal">
        <div class="moderator-modal-content">
            <i class="fas fa-times close-btn" onclick="toggleModeratorModal()"></i>
            <h2 class="text-2xl font-bold text-black mb-4" style="font-family: 'Space Grotesk', sans-serif">
                Daftar Moderator
            </h2>
            <ul id="moderator-list" class="moderator-list"></ul>
        </div>
    </div>

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

    <!-- Community Detail Section -->
    <section class="relative pt-24 pb-12 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Notification Bar -->
            <div id="notification-bar" class="notification-bar hidden" onclick="dismissNotification()">
                <p class="text-sm text-gray-700">
                    Selamat datang di komunitas! Lihat aktivitas terbaru.
                </p>
            </div>

            <!-- Main Content and Sidebar -->
            <div class="forum-section">
                <!-- Main Content -->
                <div class="flex-1">
                    <div class="mb-8 flex items-center gap-3">
                        <a href="{{ route('komunitas.index') }}" 
                            class="relative inline-block px-5 py-2 text-sm text-black border border-black rounded-full overflow-hidden group"
                            style="font-family: 'Space Grotesk', sans-serif;">
                            <span class="absolute inset-0 bg-black transition-all duration-300 ease-in-out group-hover:translate-y-0 translate-y-full rounded-full"></span>
                            <span class="relative z-10 group-hover:text-white transition-colors duration-300">
                                ← Daftar Komunitas
                            </span>
                        </a>
                        <a href="{{ route('komunitas.show', $komunitas->id) }}" 
                            class="relative inline-block px-5 py-2 text-sm text-gray-700 border border-gray-400 rounded-full overflow-hidden group"
                            style="font-family: 'Space Grotesk', sans-serif;">
                            <span class="absolute inset-0 bg-gray-700 transition-all duration-300 ease-in-out group-hover:translate-y-0 translate-y-full rounded-full"></span>
                            <span class="relative z-10 group-hover:text-white transition-colors duration-300">
                                Kembali ke Komunitas
                            </span>
                        </a>
                    </div>

                    <div class="forum-header">
                        <div class="flex items-center gap-2 mb-4">
                            <h1 id="community-name" class="text-3xl font-bold text-black" style="font-family: 'Space Grotesk', sans-serif">
                                {{ $komunitas->name }}
                            </h1>
                            <span id="community-badge" class="badge badge-{{ $komunitas->badge }}">{{ ucfirst($komunitas->badge) }}</span>
                        </div>
                        <p id="community-description" class="text-lg text-gray-600 mb-4">{{ $komunitas->description }}</p>
                        <div class="flex items-center gap-4">
                            <button id="join-btn" class="join-btn relative inline-block px-5 py-2 text-sm text-white border border-black rounded-full overflow-hidden group"
                                style="font-family: 'Space Grotesk', sans-serif;" onclick="toggleJoin()">
                                <span class="absolute inset-0 bg-black transition-all duration-300 ease-in-out group-hover:translate-y-0 translate-y-full rounded-full"></span>
                                <span class="relative z-10 group-hover:text-white transition-colors duration-300">
                                    {{ $komunitas->joined ? 'Keluar' : 'Gabung' }}
                                </span>
                            </button>
                        </div>
                    </div>

                    <!-- New Thread Form -->
                    <div class="new-thread-form">
                        <h2 class="text-xl font-bold text-black mb-4" style="font-family: 'Space Grotesk', sans-serif">
                            Buat Diskusi Baru
                        </h2>
                        <input type="text" id="new-thread-title" placeholder="Judul Diskusi..." class="mb-4 w-full border border-gray-300 rounded-md p-2" />
                        <textarea id="new-thread-content" placeholder="Tulis isi diskusi Tuan..." class="mb-4 w-full border border-gray-300 rounded-md p-2"></textarea>
                        <div class="flex justify-end mt-3">
                            <button onclick="createNewThread()"
                                class="relative inline-block px-5 py-2 text-sm text-black border border-black rounded-full overflow-hidden group"
                                style="font-family: 'Space Grotesk', sans-serif;">
                                <span class="absolute inset-0 bg-black transition-all duration-300 ease-in-out group-hover:translate-y-0 translate-y-full rounded-full"></span>
                                <span class="relative z-10 group-hover:text-white transition-colors duration-300">
                                    Kirim
                                </span>
                            </button>
                        </div>
                    </div>

                    <!-- Threads -->
                    <div id="forum-threads" class="space-y-6"></div>
                    <div id="pagination" class="pagination"></div>
                </div>

                <!-- Sidebar (sama seperti kode Tuan, tapi dinamis) -->
                <aside class="sidebar md:w-80">
                    <!-- ... (nama, category, description, creator, created, discussions, moderators dari $komunitas) -->
                    <p id="sidebar-community-name" class="text-base font-semibold text-gray-700">{{ $komunitas->name }}</p>
                    <!-- Lainnya serupa, gunakan $komunitas->posts->count() untuk discussions, dll. -->
                    <!-- Jadwal Event -->
                    <div id="sidebar-community-events" class="space-y-4 mb-6">
                        @foreach ($komunitas->events as $event)
                            <div class="event-item" onclick="viewEvent({{ $event->id }})">
                                <p class="text-sm font-medium text-gray-700">{{ $event->name }}</p>
                                <p class="text-xs text-gray-500">{{ $event->date }} • {{ $event->type }}</p>
                            </div>
                        @endforeach
                    </div>
                    <!-- Peraturan (statis) -->
                    <!-- Komunitas Lain (rekomendasi dari model lain, atau query Komunitas::whereNot('id', $komunitas->id)->take(3)->get()) -->
                    <div id="recommended-communities" class="space-y-4">
                        @foreach ($recommended as $rec)
                            <div class="recommended-community">
                                <img src="{{ $rec->image }}" alt="{{ $rec->name }}" />
                                <div>
                                    <p class="text-sm font-medium text-gray-700">{{ $rec->name }}</p>
                                    <p class="text-xs text-gray-500">{{ $rec->members }} Anggota</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
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

        .community-banner {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .post-card {
            background: linear-gradient(145deg, #ffffff, #f9fafb);
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 1.5rem;
            position: relative;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .post-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .post-card-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 1rem;
        }

        .post-card-header h3 {
            font-size: 1.25rem;
            font-weight: 600;
            color: #111827;
            margin: 0;
            flex: 1;
            transition: color 0.2s ease;
        }

        .post-card-header h3:hover {
            color: #374151;
        }

        .post-card-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
            font-size: 0.875rem;
            color: #6b7280;
        }

        .post-card-content {
            font-size: 1rem;
            color: #4b5563;
            line-height: 1.5;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .post-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
            padding-top: 1rem;
            border-top: 1px solid #e5e7eb;
        }

        .vote-container {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .attachment-container {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
            margin-top: 1rem;
        }

        .attachment-container img {
            max-width: 120px;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease;
        }

        .attachment-container img:hover {
            transform: scale(1.05);
        }

        .attachment-container a {
            color: #374151;
            text-decoration: none;
            font-weight: 500;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            transition: background 0.2s ease;
        }

        .attachment-container a:hover {
            background: #e6f0ff;
        }

        .recommended-community {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.5rem 0;
        }

        .recommended-community img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
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

        .badge-moderator {
            background: linear-gradient(90deg, #3b82f6, #60a5fa);
            color: #ffffff;
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
        }

        .sidebar {
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
        }

        .notification-bar {
            background: linear-gradient(145deg, #f3f4f6, #e5e7eb);
            border: 1px solid #d1d5db;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            cursor: pointer;
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
        }

        .notification-card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1rem;
            cursor: pointer;
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

        .filter-btn {
            padding: 0.5rem 1rem;
            border-radius: 9999px;
            font-size: 0.8rem;
            font-weight: 500;
            border: 1px solid #e5e7eb;
            background: #f3f4f6;
            color: #374151;
            transition: all 0.3s ease;
        }

        .filter-btn.active {
            background: linear-gradient(90deg, #111827, #374151);
            color: #ffffff;
            border-color: #facc15;
        }

        .vote-btn {
            cursor: pointer;
            font-size: 1rem;
            transition: color 0.2s ease;
        }

        .vote-btn:hover {
            color: #374151;
        }

        .event-item {
            padding: 0.5rem;
            border-radius: 8px;
            cursor: pointer;
        }

        .community-section {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .highlight-post {
            border-left: 4px solid #facc15;
            background: linear-gradient(145deg, #f3f4f6, #f3f4f6);
        }

        .moderator-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 60;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        .moderator-modal.open {
            opacity: 1;
            visibility: visible;
        }

        .moderator-modal-content {
            background: #ffffff;
            border-radius: 12px;
            padding: 2rem;
            max-width: 500px;
            width: 90%;
            max-height: 80vh;
            overflow-y: auto;
            position: relative;
        }

        .moderator-modal-content .close-btn {
            position: absolute;
            top: 1rem;
            right: 1rem;
            font-size: 1.5rem;
            color: #374151;
            cursor: pointer;
        }

        .show-more-btn {
            color: #2563eb;
            font-size: 0.9rem;
            cursor: pointer;
            margin-top: 0.5rem;
            display: inline-block;
        }

        .moderator-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .moderator-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.75rem;
            border-bottom: 1px solid #e5e7eb;
            transition: background 0.2s ease;
        }

        .moderator-item:last-child {
            border-bottom: none;
        }

        .moderator-item:hover {
            background: #f9fafb;
        }

        .moderator-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #374151;
            font-size: 1.25rem;
        }

        .moderator-name {
            flex: 1;
            font-size: 1rem;
            font-weight: 500;
            color: #111827;
        }

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
            margin-top: 1.5rem;
        }

        .pagination-btn {
            padding: 0.5rem 1rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 500;
            border: 1px solid #e5e7eb;
            background: #f3f4f6;
            color: #374151;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .pagination-btn.active {
            background: linear-gradient(90deg, #111827, #374151);
            color: #ffffff;
            border-color: #facc15;
        }

        .pagination-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .post-menu {
            position: relative;
        }

        .post-menu-btn {
            cursor: pointer;
            font-size: 1rem;
            color: #6b7280;
            transition: color 0.2s ease;
        }

        .post-menu-btn:hover {
            color: #374151;
        }

        .post-menu-content {
            position: absolute;
            top: 100%;
            right: 0;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            min-width: 150px;
            z-index: 10;
            display: none;
        }

        .post-menu-content.open {
            display: block;
        }

        .post-menu-item {
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
            color: #374151;
            cursor: pointer;
            transition: background 0.2s ease;
        }

        .post-menu-item:hover {
            background: #f9fafb;
        }

        .post-menu-item.danger {
            color: #dc2626;
        }

        @media (min-width: 768px) {
            .community-section {
                flex-direction: row;
                align-items: flex-start;
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

            .post-footer {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }

            .moderator-item {
                padding: 0.5rem;
            }

            .moderator-icon {
                width: 32px;
                height: 32px;
                font-size: 1rem;
            }

            .pagination {
                flex-wrap: wrap;
            }
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

        .sidebar-notification-container {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 0;
        }

    </style>
    @endpush

    @push('scripts')
    <script>
        // Data dari backend
        const communities = @json([$getKomunitasById]);
        const communityPosts = @json($getKomunitasById->posts);
        const communityEvents = @json($getKomunitasById->events);
        const notifications = @json($getKomunitasById->notifications);

        // Pagination Settings
        const POSTS_PER_PAGE = 5;
        let currentPage = 1;

        // Get Community ID from URL
        function getCommunityId() {
            return {{ $getKomunitasById->id }};
        }

        // Render Community Details
        function renderCommunityDetails() {
            const community = communities[0];
            document.getElementById("community-image").src = community.image;
            document.getElementById("community-image").alt = community.name;
            document.getElementById("community-name").textContent = community.name;
            document.getElementById("community-badge").className = community.badge ? `badge badge-${community.badge}` : "";
            document.getElementById("community-badge").textContent = community.badge ? community.badge.charAt(0).toUpperCase() + community.badge.slice(1) : "";
            document.getElementById("community-description").textContent = community.description;
            document.getElementById("community-members").innerHTML = `<i class="fas fa-user-friends mr-1"></i>${community.members} Anggota`;
        }

        // Render Sidebar Community Details
        function renderSidebarDetails() {
            const community = communities[0];
            const posts = communityPosts.filter(p => p.community_id === community.id) || [];

            document.getElementById("sidebar-community-name").textContent = community.name;
            document.getElementById("sidebar-community-category").innerHTML = `<i class="fas fa-tag mr-1"></i>Kategori: ${community.category}`;
            document.getElementById("sidebar-community-description").textContent = community.description;
            document.getElementById("sidebar-community-creator").innerHTML = `<i class="fas fa-user mr-1"></i>Pembuat: ${community.creator}`;
            document.getElementById("sidebar-community-created").innerHTML = `<i class="fas fa-calendar-alt mr-1"></i>Dibuat: ${community.created_date}`;
            document.getElementById("sidebar-community-discussions").innerHTML = `<i class="fas fa-comment-alt mr-1"></i>Total Diskusi: ${posts.length}`;
            const moderators = community.moderators.slice(0, 1);
            document.getElementById("sidebar-community-moderators").innerHTML = `<i class="fas fa-user-shield mr-1"></i>Moderator: ${moderators.map(m => `${m.name} <span class="badge badge-moderator">Moderator</span>`).join(", ")}`;
            document.getElementById("sidebar-community-members").innerHTML = `<i class="fas fa-user-friends mr-1"></i>${community.members} Anggota`;
            document.getElementById("sidebar-community-online").innerHTML = `<i class="fas fa-circle text-green-500 mr-1 text-xs"></i>${community.online_members} Online`;

            const showMoreBtn = document.getElementById("show-more-moderators");
            if (community.moderators.length > 1) {
                showMoreBtn.classList.remove("hidden");
                showMoreBtn.onclick = toggleModeratorModal;
            } else {
                showMoreBtn.classList.add("hidden");
            }

            const events = communityEvents.filter(e => e.community_id === community.id) || [];
            const eventsContainer = document.getElementById("sidebar-community-events");
            eventsContainer.innerHTML = events.map(e => `
                <div class="event-item" onclick="viewEvent(${e.id})">
                    <p class="text-sm font-medium text-gray-700">${e.name}</p>
                    <p class="text-xs text-gray-500">${e.date} • ${e.type}</p>
                </div>
            `).join("");
        }

        // Render Moderator Modal
        function renderModeratorModal() {
            const community = communities[0];
            const moderatorList = document.getElementById("moderator-list");
            moderatorList.innerHTML = community.moderators.map(m => `
                <li class="moderator-item">
                    <div class="moderator-icon"><i class="fas fa-user"></i></div>
                    <span class="moderator-name">${m.name}</span>
                    ${m.is_moderator ? '<span class="badge badge-moderator">Moderator</span>' : ""}
                </li>
            `).join("");

            gsap.from(".moderator-item", {
                opacity: 0,
                y: 20,
                duration: 0.5,
                stagger: 0.1,
                ease: "power3.out",
            });
        }

        // JavaScript lainnya tetap sama seperti yang diberikan
        {{ $originalScripts }}
    </script>
    @endpush
</x-layout>