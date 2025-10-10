<x-layout>
    <style>
        body, * {
            font-family: 'Space Grotesk', sans-serif !important;
        }
        h1, h2, h3, h4, h5, h6, p, a, span, button, input, select, option, div, label {
            font-family: 'Space Grotesk', sans-serif !important;
        }
        [class*="fa-"] {
            font-family: 'Font Awesome 6 Free', sans-serif !important;
        }
    </style>
    <div id="particles-js" class="fixed inset-0 z-[-1] opacity-40"></div>

    <section class="pt-16 pb-12 mt-8 bg-white min-h-screen">
        <div class="w-full mx-auto px-4 sm:px-6 flex flex-col md:flex-row gap-4">
            <aside class="w-full md:w-64 bg-white border border-gray-200 rounded-xl p-6 sticky top-4 h-[calc(100vh-2rem)] overflow-y-auto shadow-sm no-scrollbar sidebar left-sidebar">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Navigasi Komunitas</h3>
                <div class="space-y-2 mb-6">
                    <a href="{{ route('komunitas.index') }}" class="block bg-white border border-gray-200 rounded-lg p-3 text-sm text-gray-700 hover:text-gray-900 hover:bg-gray-100 hover:shadow-md transition duration-300">
                        <i class="fas fa-list-alt mr-2"></i> Semua Komunitas
                    </a>
                    <a href="{{ route('komunitas.create') }}" class="block bg-white border border-gray-200 rounded-lg p-3 text-sm text-gray-700 hover:text-gray-900 hover:bg-gray-100 hover:shadow-md transition duration-300">
                        <i class="fas fa-plus mr-2"></i> Buat Komunitas
                    </a>
                    <span class="block bg-white border border-gray-200 rounded-lg p-3 text-sm text-gray-700 hover:text-gray-900 hover:bg-gray-100 hover:shadow-md transition duration-300 cursor-pointer" onclick="toggleNotifications()">
                        <i class="fas fa-bell mr-2"></i> Notifikasi <span id="unread-count" class="ml-1 text-xs bg-gray-200 text-gray-900 rounded-full px-2 py-1">0</span>
                    </span>
                </div>

                <hr class="my-4 border-gray-200" />

                <h3 class="text-lg font-semibold text-gray-900 mb-4">Komunitas Saya</h3>
                <div id="joined-communities" class="space-y-2 mb-6">
                    @auth
                        @forelse (auth()->user()->members->take(5) as $community)
                            <a href="{{ route('komunitas.show', $community->id) }}" class="block bg-white border border-gray-200 rounded-lg p-3 text-sm text-gray-700 hover:text-gray-900 hover:bg-gray-100 hover:shadow-md transition duration-300" data-community-id="{{ $community->id }}">
                                <div class="flex items-center gap-2">
                                    <img
                                        src="{{ $community->cover_image ? Storage::url($community->cover_image) : 'https://i.pravatar.cc/32?img=' . ($loop->index + 1) }}"
                                        alt="{{ $community->name }}"
                                        class="w-6 h-6 rounded-md border border-gray-200 object-cover"
                                    />
                                    <span class="truncate">r/{{ $community->name }} ({{ $community->pivot->role ?? 'Anggota' }})</span>
                                </div>
                            </a>
                        @empty
                            <p class="text-sm text-gray-500">Belum bergabung dengan komunitas.</p>
                        @endforelse

                        @if (auth()->user()->members->count() > 0)
                            <a href="{{ route('komunitas.saya') }}" class="mt-4 block w-full text-center px-4 py-2 rounded-lg text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 transition duration-300 border border-gray-300">
                                <i class="fas fa-plus mr-1"></i> Semua Komunitas Saya ({{ auth()->user()->members->count() }})
                            </a>
                        @endif
                    @else
                        <p class="text-sm text-gray-500">Login untuk melihat komunitas Anda.</p>
                    @endauth
                </div>

                <hr class="my-4 border-gray-200" />

                <h3 class="text-lg font-semibold text-gray-900 mb-4">Aktivitas Terbaru</h3>
                <div id="recent-activities" class="space-y-2">
                    @php
                        $recentActivities = [
                            ['id' => 1, 'text' => 'Diskusi baru di r/KomunitasTech', 'time' => '2 jam yang lalu', 'communityId' => 1],
                            ['id' => 2, 'text' => 'Anggota baru bergabung di r/KomunitasGamers', 'time' => '4 jam yang lalu', 'communityId' => 2],
                            ['id' => 3, 'text' => 'Acara diumumkan di r/KomunitasMusik', 'time' => '6 jam yang lalu', 'communityId' => 3],
                        ];
                    @endphp
                    @if (empty($recentActivities))
                        <p class="text-sm text-gray-500">Tidak ada aktivitas terbaru.</p>
                    @else
                        @foreach ($recentActivities as $activity)
                            <div class="recent-activity bg-white border border-gray-200 rounded-lg p-3 hover:shadow-md transition duration-300 cursor-pointer" onclick="viewActivity({{ $activity['id'] }})">
                                <p class="text-sm text-gray-700">{{ $activity['text'] }}</p>
                                <p class="text-xs text-gray-500">{{ $activity['time'] }}</p>
                            </div>
                        @endforeach
                    @endif
                </div>
            </aside>

            <div class="flex-1 max-w-full space-y-5">
                @if (session('success'))
                    <div class="bg-white border border-gray-200 rounded-lg p-4 mb-6 cursor-pointer hover:shadow-lg hover:-translate-y-1 transition-all duration-300" onclick="this.classList.add('hidden')">
                        <p class="text-sm text-gray-700">{{ session('success') }}</p>
                    </div>
                @endif
                
                <div class="flex items-center gap-4 mb-6">
                    <div class="relative w-full sm:w-48">
                        <div class="custom-dropdown">
                            <button id="dropdown-button" class="flex items-center justify-between w-full px-4 py-2 bg-gray-900 text-sm text-white rounded-full border border-gray-900 transition duration-300 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-700">
                                <span id="selected-category">{{ request()->category ? request()->category : 'Semua Kategori' }}</span>
                                <i class="fas fa-chevron-down text-xs"></i>
                            </button>
                            <div id="dropdown-menu" class="hidden absolute z-10 w-[200px] mt-1 bg-white border border-gray-200 rounded-lg shadow-xl right-0">
                                <div class="grid grid-cols-1 gap-2 p-2">
                                    <a href="{{ route('komunitas.index') }}" class="block px-4 py-2 text-sm text-gray-900 hover:bg-gray-100 hover:text-gray-900 transition {{ !request()->category ? 'bg-gray-100 text-gray-900 font-semibold' : '' }}">Semua Kategori</a>
                                    @foreach ($categories as $category)
                                        <a href="{{ route('komunitas.index', ['category' => $category]) }}" class="block px-4 py-2 text-sm text-gray-900 hover:bg-gray-100 hover:text-gray-900 transition {{ request()->category == $category ? 'bg-gray-100 text-gray-900 font-semibold' : '' }}">{{ $category }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sm:ml-auto w-full">
                        <form action="{{ route('komunitas.index') }}" method="GET" class="flex">
                            @if (request()->category)
                                <input type="hidden" name="category" value="{{ request()->category }}">
                            @endif
                            <input type="text" name="search" id="community-search" value="{{ request()->search }}" placeholder="Cari komunitas..." class="px-4 py-2 rounded-l-full bg-white text-sm text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-900 transition w-full border border-gray-200" />
                            <button type="submit" class="px-4 py-2 bg-gray-900 text-white rounded-r-full hover:bg-gray-700 transition duration-300">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </div>
                </div>

                <div id="community-list" class="space-y-6">
                    @forelse ($communities as $community)
                        <div class="block">
                            <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-md hover:shadow-xl hover:-translate-y-2 transition-all duration-300">
                                <div class="inner">
                                    @if ($community->cover_image)
                                        <a href="{{ route('komunitas.show', $community->id) }}" class="community-link" data-community-id="{{ $community->id }}">
                                            <img src="{{ Storage::url($community->cover_image) }}" alt="{{ $community->name }}" class="w-full h-52 object-cover hover:scale-105 transition-transform duration-300" />
                                        </a>
                                    @else
                                        <a href="{{ route('komunitas.show', $community->id) }}" class="community-link" data-community-id="{{ $community->id }}">
                                            <div class="w-full h-52 bg-gray-200 flex items-center justify-center text-gray-500">No Cover Image</div>
                                        </a>
                                    @endif
                                    
                                    <div class="p-6">
                                        <div class="flex items-center gap-2">
                                            <a href="{{ route('komunitas.show', $community->id) }}" class="community-link" data-community-id="{{ $community->id }}">
                                                <h3 class="text-xl font-semibold text-gray-900 hover:text-gray-700 transition duration-300">r/{{ $community->name }}</h3>
                                            </a>
                                            @if ($community->members_count > 100)
                                                <span class="badge px-2 py-1 text-xs font-medium rounded-full bg-gray-200 text-gray-900">Populer</span>
                                            @elseif (isset($community->created_at) && $community->created_at->isToday())
                                                <span class="badge px-2 py-1 text-xs font-medium rounded-full bg-gray-100 text-gray-600">Baru</span>
                                            @endif
                                        </div>
                                        
                                        <a href="{{ route('komunitas.show', $community->id) }}" class="community-link" data-community-id="{{ $community->id }}">
                                            <p class="text-gray-600 mt-2 line-clamp-3">{{ $community->description ?? 'Deskripsi komunitas belum tersedia.' }}</p>
                                        </a>
                                        
                                        <div class="flex items-center justify-between mt-4">
                                            <span class="text-sm text-gray-500"><i class="fas fa-user-friends mr-1"></i>{{ $community->members_count }} Anggota</span>
                                            @auth
                                                <form action="{{ route('komunitas.join', $community->id) }}" method="POST" onclick="event.stopPropagation();" class="join-form">
                                                    @csrf
                                                    <input type="hidden" name="has_viewed" class="has-viewed-input" value="0">
                                                    @if ($community->members()->where('user_id', Auth::id())->exists())
                                                        <button type="submit" class="join-btn px-4 py-2 rounded-full text-sm font-medium bg-gray-300 text-gray-700 hover:bg-gray-400 hover:text-gray-900 transition-transform duration-300" title="Klik untuk keluar dari komunitas">
                                                            <i class="fas fa-check-circle mr-1"></i> Sudah Bergabung
                                                        </button>
                                                    @else
                                                        <button type="submit" class="join-btn px-4 py-2 rounded-full text-sm font-medium bg-gray-900 text-white hover:bg-gray-700 transition-transform duration-300">
                                                            <i class="fas fa-plus mr-1"></i> Gabung
                                                        </button>
                                                    @endif
                                                </form>
                                            @else
                                                <a href="{{ route('login') }}" class="join-btn px-4 py-2 rounded-full text-sm font-medium bg-gray-900 text-white hover:bg-gray-700 transition-transform duration-300" title="Klik untuk login dan bergabung dengan komunitas">
                                                    <i class="fas fa-sign-in-alt mr-1"></i> Gabung
                                                </a>
                                            @endauth
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center text-gray-600">
                            <p class="text-lg">Tidak ada komunitas ditemukan.</p>
                            <a href="{{ route('komunitas.index') }}" class="inline-block mt-4 px-6 py-3 bg-gray-900 text-white rounded-full font-semibold hover:bg-gray-700 transition">Lihat Semua Komunitas</a>
                        </div>
                    @endforelse
                    <div class="mt-6">
                        {{ $communities->links() }}
                    </div>
                </div>
            </div>

            <aside class="w-full md:w-64 bg-white border border-gray-200 rounded-xl p-6 sticky top-4 h-[calc(100vh-2rem)] overflow-y-auto shadow-sm no-scrollbar sidebar right-sidebar">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Rekomendasi Komunitas</h3>
                <div id="recommended-communities" class="space-y-2 mb-6">
                    @forelse ($recommendedCommunities as $community)
                        <div class="recommended-community bg-white border border-gray-200 rounded-lg p-3 hover:shadow-md transition duration-300 cursor-pointer" onclick="window.location.href='{{ route('komunitas.show', $community->id) }}'" data-community-id="{{ $community->id }}">
                            <div class="flex items-center gap-3">
                                <img
                                    src="{{ $community->cover_image ? Storage::url($community->cover_image) : 'https://i.pravatar.cc/32?img=' . $loop->index }}" 
                                    alt="{{ $community->name }}"
                                    class="w-12 h-12 object-cover rounded-lg border border-gray-200"
                                />
                                <div>
                                    <p class="text-sm font-medium text-gray-700">r/{{ $community->name }}</p>
                                    <p class="text-xs text-gray-500"><i class="fas fa-user-friends mr-1"></i>{{ $community->members_count }} Anggota</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-sm text-gray-500">Tidak ada rekomendasi saat ini.</p>
                    @endforelse
                </div>
                
                <hr class="my-4 border-gray-200" />
                
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Notifikasi Singkat</h3>
                <div id="quick-notifications" class="space-y-2">
                    @php
                        $quickNotifications = [
                            ['id' => 1, 'text' => 'Anggota baru di r/KomunitasTech', 'time' => '1 jam yang lalu', 'communityId' => 1],
                            ['id' => 2, 'text' => 'Diskusi baru di r/KomunitasGamers', 'time' => '3 jam yang lalu', 'communityId' => 2],
                        ];
                    @endphp
                    @if (empty($quickNotifications))
                        <p class="text-sm text-gray-500">Tidak ada notifikasi baru.</p>
                    @else
                        @foreach ($quickNotifications as $notification)
                            <div class="quick-notification bg-white border border-gray-200 rounded-lg p-3 hover:shadow-md transition duration-300 cursor-pointer" onclick="viewNotification({{ $notification['id'] }})">
                                <p class="text-sm text-gray-700">{{ $notification['text'] }}</p>
                                <p class="text-xs text-gray-500">{{ $notification['time'] }}</p>
                            </div>
                        @endforeach
                    @endif
                </div>
            </aside>
        </div>

        <div id="notification-modal" class="fixed inset-y-0 right-0 w-full sm:w-96 bg-white shadow-xl transform translate-x-full transition-transform duration-300 z-50">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Notifikasi</h3>
                    <button id="mark-all-read" class="text-sm text-gray-700 hover:text-gray-900">Tandai semua dibaca</button>
                </div>
                <div class="flex gap-2 mb-4">
                    <button class="filter-btn px-4 py-2 bg-gray-900 text-white text-sm rounded-full hover:bg-gray-700 transition duration-300 active" data-filter="all">Semua</button>
                    <button class="filter-btn px-4 py-2 bg-white text-sm text-gray-700 rounded-full border border-gray-200 hover:bg-gray-100 transition duration-300" data-filter="unread">Belum Dibaca</button>
                </div>
                <div id="notification-list" class="space-y-4"></div>
            </div>
        </div>
    </section>

    @push('styles')
        <style>
            .no-scrollbar::-webkit-scrollbar {
                display: none;
            }
            .no-scrollbar {
                -ms-overflow-style: none;
                scrollbar-width: none;
            }
            .sidebar {
                background-color: #ffffff;
                border: 1px solid #e5e7eb;
                border-radius: 0.75rem;
                padding: 1.5rem;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
                transition: all 0.3s ease;
            }
            .sidebar h3 {
                color: #1f2937;
                font-size: 1.125rem;
                font-weight: 600;
                margin-bottom: 1rem;
                font-family: 'Space Grotesk', sans-serif;
            }
            .sidebar a, .sidebar span, .recent-activity, .recommended-community, .quick-notification {
                border: 1px solid #e5e7eb;
                border-radius: 0.5rem;
                background-color: #ffffff;
                transition: all 0.3s ease;
            }
            .sidebar a:hover, .sidebar span:hover {
                color: #1f2937;
                background-color: #f3f4f6;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
                transform: translateY(-2px);
            }
            .custom-dropdown a.active {
                background-color: #f3f4f6 !important;
                color: #1f2937 !important;
                font-weight: 500;
            }
            .custom-dropdown .dropdown-menu {
                max-height: 240px;
                overflow-y: auto;
                right: 0;
                width: 200px;
            }
            .custom-dropdown .dropdown-menu .grid {
                display: grid;
                grid-template-columns: 1fr;
                gap: 0.5rem;
            }
            .custom-dropdown .dropdown-menu a {
                padding: 0.5rem 1rem;
                text-align: left;
                border-radius: 0.375rem;
                transition: all 0.3s ease;
            }
            .custom-dropdown .dropdown-menu a:hover {
                background-color: #f3f4f6;
                color: #1f2937;
            }
            .filter-btn.active {
                background-color: #1f2937 !important;
                color: #ffffff !important;
            }
            .filter-btn:not(.active) {
                background-color: #ffffff !important;
                border: 1px solid #e5e7eb;
            }
            [title] {
                position: relative;
            }
            [title]:hover:after {
                content: attr(title);
                position: absolute;
                bottom: 100%;
                left: 50%;
                transform: translateX(-50%);
                background-color: #1f2937;
                color: #ffffff;
                padding: 0.5rem 1rem;
                border-radius: 0.375rem;
                font-size: 0.75rem;
                white-space: nowrap;
                z-index: 10;
                margin-bottom: 0.5rem;
            }
        </style>
    @endpush

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/animejs@3.2.2/lib/anime.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
        <script>
            const routes = {
                communitiesShow: id => `/komunitas/${id}`,
            };
            let notifications = [
                { id: 1, text: "Anggota baru di r/KomunitasTech", time: "1 jam yang lalu", communityId: 1, read: false },
                { id: 2, text: "Diskusi baru di r/KomunitasGamers", time: "3 jam yang lalu", communityId: 2, read: false },
                { id: 3, text: "Anda mendapatkan badge di r/KomunitasMusik", time: "5 jam yang lalu", communityId: 3, read: true },
            ];
            let recentActivities = [
                { id: 1, text: "Diskusi baru di r/KomunitasTech", time: "2 jam yang lalu", communityId: 1 },
                { id: 2, text: "Anggota baru bergabung di r/KomunitasGamers", time: "4 jam yang lalu", communityId: 2 },
                { id: 3, text: "Acara diumumkan di r/KomunitasMusik", time: "6 jam yang lalu", communityId: 3 },
            ];
            
            const dropdownButton = document.getElementById('dropdown-button');
            const dropdownMenu = document.getElementById('dropdown-menu');
            dropdownButton.addEventListener('click', () => {
                dropdownMenu.classList.toggle('hidden');
                anime({
                    targets: dropdownMenu,
                    opacity: dropdownMenu.classList.contains('hidden') ? [1, 0] : [0, 1],
                    translateY: dropdownMenu.classList.contains('hidden') ? [0, -10] : [-10, 0],
                    duration: 300,
                    easing: 'easeOutQuad'
                });
            });
            document.addEventListener('click', (event) => {
                if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.add('hidden');
                }
            });

            const notificationModal = document.getElementById("notification-modal");
            
            function renderNotifications(filter = "all") {
                const notificationList = document.getElementById("notification-list");
                let filteredNotifications = filter === "all" ? notifications : notifications.filter(n => !n.read);
                notificationList.innerHTML = filteredNotifications.length === 0
                    ? `<div class="text-center text-gray-600 p-4"><p class="text-sm">Tidak ada notifikasi ${filter === "all" ? "" : "belum dibaca"}.</p></div>`
                    : filteredNotifications.map(n => `
                        <div class="notification-card bg-white border border-gray-200 rounded-lg p-4 ${n.read ? '' : 'bg-gray-100'} hover:shadow-lg hover:border-gray-900 transition-all duration-300 cursor-pointer" onclick="viewNotification(${n.id})">
                            <p class="text-sm text-gray-700">${n.text}</p>
                            <p class="text-xs text-gray-500">${n.time}</p>
                        </div>`).join("");
                
                document.getElementById("unread-count").textContent = notifications.filter(n => !n.read).length;
                
                gsap.from(".notification-card", {
                    opacity: 0,
                    y: 20,
                    duration: 0.8,
                    stagger: 0.1,
                    ease: "power3.out",
                });
            }

            function toggleNotifications() {
                const isOpen = notificationModal.classList.contains("open");
                notificationModal.classList.toggle("open");
                gsap.to(notificationModal, {
                    x: isOpen ? "100%" : "0%",
                    duration: 0.4,
                    ease: "power2.out",
                });
                if (!isOpen) {
                    document.querySelectorAll("#notification-modal .filter-btn").forEach(f => {
                        f.classList.remove("active", "bg-gray-900", "text-white");
                        f.classList.add("bg-white", "text-gray-700");
                        if (f.dataset.filter === 'all') {
                            f.classList.add("active", "bg-gray-900", "text-white");
                            f.classList.remove("bg-white", "text-gray-700");
                        }
                    });
                    renderNotifications("all");
                }
            }

            function markAllAsRead() {
                notifications.forEach(n => n.read = true);
                renderNotifications(document.querySelector("#notification-modal .filter-btn.active")?.dataset.filter || "all");
                renderQuickNotifications();
                anime({
                    targets: "#mark-all-read",
                    scale: [1, 1.05, 1],
                    duration: 300,
                    easing: "easeOutQuad",
                });
            }
            
            function viewNotification(notificationId) {
                const notification = notifications.find(n => n.id === notificationId);
                if (notification) {
                    notification.read = true;
                    renderNotifications(document.querySelector("#notification-modal .filter-btn.active")?.dataset.filter || "all");
                    renderQuickNotifications();
                }
            }
            
            document.querySelectorAll("#notification-modal .filter-btn").forEach(btn => {
                btn.addEventListener("click", () => {
                    document.querySelectorAll("#notification-modal .filter-btn").forEach(f => {
                        f.classList.remove("active", "bg-gray-900", "text-white");
                        f.classList.add("bg-white", "text-gray-700");
                    });
                    btn.classList.remove("bg-white", "text-gray-700");
                    btn.classList.add("active", "bg-gray-900", "text-white");
                    renderNotifications(btn.dataset.filter);
                });
            });
            
            document.querySelector('.left-sidebar span').addEventListener('click', toggleNotifications);
            document.getElementById("mark-all-read").addEventListener("click", markAllAsRead);

            function renderQuickNotifications() {
                const quickNotificationsDiv = document.getElementById("quick-notifications");
                const unread = notifications.filter(n => !n.read).slice(0, 3);
                quickNotificationsDiv.innerHTML = unread.length === 0
                    ? '<p class="text-sm text-gray-500">Tidak ada notifikasi baru.</p>'
                    : unread.map(n => `
                        <div class="quick-notification bg-white border border-gray-200 rounded-lg p-3 hover:shadow-md transition duration-300 cursor-pointer" onclick="viewNotification(${n.id})">
                            <p class="text-sm text-gray-700">${n.text}</p>
                            <p class="text-xs text-gray-500">${n.time}</p>
                        </div>`).join("");
            }
            
            function viewActivity(activityId) {
                const activity = recentActivities.find(a => a.id === activityId);
                if (activity) {
                    window.location.href = routes.communitiesShow(activity.communityId);
                }
            }

            // View tracking logic
            function trackView(communityId, type = 'community') {
                const viewedItems = JSON.parse(localStorage.getItem('viewedItems') || '{}');
                const key = `${type}_${communityId}`;
                
                if (!viewedItems[key]) {
                    viewedItems[key] = true;
                    localStorage.setItem('viewedItems', JSON.stringify(viewedItems));
                    return false; // Not viewed before, allow increment
                }
                return true; // Already viewed
            }

            function attachViewTracking() {
                document.querySelectorAll('.community-link').forEach(link => {
                    const communityId = link.getAttribute('data-community-id');
                    const hasViewed = trackView(communityId, 'community');
                    
                    link.addEventListener('click', (e) => {
                        // Modify the link to include has_viewed parameter
                        const url = new URL(link.href);
                        url.searchParams.set('has_viewed', hasViewed ? '1' : '0');
                        link.href = url.toString();
                    });
                });

                document.querySelectorAll('.join-form').forEach(form => {
                    const communityId = form.closest('.block').querySelector('.community-link').getAttribute('data-community-id');
                    const hasViewed = trackView(communityId, 'community');
                    const input = form.querySelector('.has-viewed-input');
                    input.value = hasViewed ? '1' : '0';
                });
            }

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
                        events: { onhover: { enable: true, mode: "repulse" } },
                        modes: { repulse: { distance: 100, duration: 0.4 } },
                    },
                    retina_detect: true,
                });
                renderQuickNotifications();
                gsap.from(".inner", {
                    opacity: 0,
                    y: 50,
                    duration: 1,
                    stagger: 0.1,
                    ease: "power4.out",
                });
                attachViewTracking();
            });
        </script>
    @endpush
</x-layout>