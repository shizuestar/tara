<x-layout>
    @section('title', 'Daftar Project')
    <canvas id="particle-bg" class="fixed inset-0 w-full h-full -z-10 opacity-10"></canvas>

    <section class="pt-20 pb-20 bg-gradient-to-br from-white/95 to-gray-100/70 backdrop-blur-lg text-center font-['Space_Grotesk']">
        <div class="container mx-auto px-6 max-w-screen-2xl">
            <!-- Notification Bell -->
            <div class="flex justify-end mb-4 relative">
                <i class="fas fa-bell notification-icon text-xl text-gray-900 cursor-pointer hover:scale-110 hover:text-gray-800 transition-all"></i>
                <span id="unread-count" class="notification-badge absolute -top-2 -right-2 bg-gray-900 text-white text-xs font-medium rounded-full px-2 py-0.5"></span>
            </div>

            <div class="mb-12 mt-20">
                <h1 class="text-5xl md:text-7xl font-bold text-gray-900 inline-flex items-center font-['Space_Grotesk']">
                    Project & Kolaborasi<span class="text-gray-400 align-middle ml-2 text-3xl">●</span>
                </h1>
                <p class="mt-3 text-lg md:text-xl text-gray-600 leading-relaxed max-w-2xl mx-auto">
                    Jelajahi dan ciptakan bersama komunitas kreatif TARA
                </p>
            </div>
            <div class="flex justify-center mb-8">
                <input type="text" id="search-input" placeholder="Cari Project..."
                    class="w-full max-w-md px-4 py-2 border border-gray-200 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-gray-400 bg-gray-50 font-['Space_Grotesk']"
                    value="{{ request('search') }}" />
            </div>
            <div class="flex flex-col sm:flex-row justify-center gap-4 mb-8">
                <a href="{{ route('project.create') }}" class="create-btn inline-flex items-center px-6 py-3 rounded-lg text-sm font-medium bg-gray-900 text-white uppercase border-2 border-black hover:bg-white hover:text-gray-900 transition-all font-['Space_Grotesk']"><i class="fas fa-plus mr-2"></i> Buat Kolaborasi</a>
                <a href="#" class="join-btn inline-flex items-center px-6 py-3 rounded-lg text-sm font-medium bg-gray-900 text-white uppercase border-2 border-black hover:bg-white hover:text-gray-900 transition-all font-['Space_Grotesk']"><i class="fas fa-users mr-2"></i> Gabung Kolaborasi</a>
            </div>
            <div class="flex flex-col sm:flex-row gap-4 mb-8 justify-center">
                <div class="flex flex-wrap gap-3 justify-center">
                    <button class="filter-btn px-5 py-2 rounded-lg text-sm font-medium border border-gray-200 bg-transparent text-gray-900 hover:bg-gray-900 hover:text-white transition-all font-['Space_Grotesk'] {{ request('category') == 'all' || !request('category') ? 'bg-yellow-500 text-white border-yellow-500' : '' }}" data-filter="all">Semua</button>
                    @foreach($categories as $category)
                        <button class="filter-btn px-5 py-2 rounded-lg text-sm font-medium border border-gray-200 bg-transparent text-gray-900 hover:bg-gray-900 hover:text-white transition-all font-['Space_Grotesk'] {{ request('category') == $category->name ? 'bg-yellow-500 text-white border-yellow-500' : '' }}" data-filter="{{ $category->name }}">{{ $category->name }}</button>
                    @endforeach
                </div>
                <div class="flex gap-3 justify-center">
                    <button class="sort-btn px-5 py-2 rounded-lg text-sm font-medium border border-gray-200 bg-transparent text-gray-900 hover:bg-gray-900 hover:text-white transition-all font-['Space_Grotesk'] {{ request('sort') == 'default' || !request('sort') ? 'bg-yellow-500 text-white border-yellow-500' : '' }}" data-sort="default">Default</button>
                    <button class="sort-btn px-5 py-2 rounded-lg text-sm font-medium border border-gray-200 bg-transparent text-gray-900 hover:bg-gray-900 hover:text-white transition-all font-['Space_Grotesk'] {{ request('sort') == 'progress' ? 'bg-yellow-500 text-white border-yellow-500' : '' }}" data-sort="progress">Progress</button>
                    <button class="sort-btn px-5 py-2 rounded-lg text-sm font-medium border border-gray-200 bg-transparent text-gray-900 hover:bg-gray-900 hover:text-white transition-all font-['Space_Grotesk'] {{ request('sort') == 'members' ? 'bg-yellow-500 text-white border-yellow-500' : '' }}" data-sort="members">Anggota</button>
                </div>
            </div>
            <div id="project-list" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @forelse($projects as $project)
                    <div class="project-card bg-gradient-to-br from-white/90 to-gray-100/60 border border-white/20 rounded-3xl overflow-hidden transition-all hover:scale-105 hover:-translate-y-1 hover:shadow-2xl hover:shadow-black/15 hover:border-black/15" data-project-id="{{ $project->id }}" data-category="{{ $project->category->name }}">
                        <img src="{{ $project->cover_images ? asset('storage/' . $project->cover_images) : 'https://via.placeholder.com/600x400' }}"
                             alt="{{ $project->project_name }}" loading="lazy" class="w-full h-48 object-cover transition-transform hover:scale-105"/>
                        <div class="p-6 font-['Space_Grotesk']">
                            <div class="flex items-center mb-3">
                                <h3 class="text-lg font-semibold truncate font-['Space_Grotesk']">{{ $project->project_name }}</h3>
                            </div>
                            <div class="flex flex-wrap gap-2 mb-3">
                                <span class="badge px-3 py-1 text-sm font-medium rounded-md bg-gray-200 text-gray-900">{{ $project->category->name }}</span>
                                <span class="badge badge-{{ $project->status }} px-3 py-1 text-sm font-medium rounded-md {{ $project->status == 'ongoing' ? 'bg-yellow-500 text-white' : ($project->status == 'pending' ? 'bg-gray-200 text-gray-900' : 'bg-green-500 text-white') }}">
                                    {{ $project->status_text }}
                                </span>
                            </div>
                            <p class="text-base text-gray-600 line-clamp-2">{{ $project->description }}</p>
                            <div class="progress-circle relative w-16 h-16 mt-3 mx-auto">
                                <svg class="w-full h-full -rotate-90">
                                    <circle class="bg-circle" cx="30" cy="30" r="27" fill="none" stroke="#e5e7eb" stroke-width="6"/>
                                    <circle class="progress-ring transition-all" cx="30" cy="30" r="27" fill="none" stroke="#f59e0b" stroke-width="6" stroke-linecap="round" stroke-dasharray="169.65" stroke-dashoffset="{{ 169.65 - ($project->progress / 100 * 169.65) }}"/>
                                </svg>
                                <div class="progress-text absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-sm font-semibold text-gray-900">{{ $project->progress }}%</div>
                            </div>
                            <div class="flex justify-between items-center mt-4">
                                <span class="text-sm text-gray-600">{{ $project->members->count() }} Anggota</span>
                                <a href="{{ route('project.show', $project->id) }}" class="action-btn px-6 py-2 rounded-lg text-sm font-medium bg-gray-900 text-white uppercase border-2 border-black hover:bg-white hover:text-gray-900 transition-all font-['Space_Grotesk']">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center text-gray-600 col-span-full font-['Space_Grotesk']">
                        <p class="text-lg">Tidak ada Project ditemukan.</p>
                    </div>
                @endforelse
            </div>
            <div class="text-center mt-10 flex justify-center gap-3" id="pagination-container">
                {{ $projects->appends(request()->query())->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </section>

    <!-- Notification Modal -->
    <div id="notification-modal" class="notification-modal fixed top-0 right-0 h-full w-full max-w-md bg-white border-l border-gray-200 z-50 translate-x-full transition-transform font-['Space_Grotesk']">
        <i class="fas fa-times close-btn absolute top-4 right-4 text-xl text-gray-700 cursor-pointer hover:scale-110 transition-all"></i>
        <div class="p-6">
            <h2 class="text-xl font-semibold mb-4">Notifikasi</h2>
            <div class="flex justify-between mb-4">
                <div class="flex gap-2">
                    <button class="filter-btn px-4 py-1 rounded-md text-sm font-medium border border-gray-200 bg-transparent text-gray-900 hover:bg-gray-900 hover:text-white transition-all active">Semua</button>
                    <button class="filter-btn px-4 py-1 rounded-md text-sm font-medium border border-gray-200 bg-transparent text-gray-900 hover:bg-gray-900 hover:text-white transition-all" data-filter="unread">Belum Dibaca</button>
                </div>
                <button id="mark-all-read" class="text-sm text-gray-600 hover:text-gray-900">Tandai Semua Dibaca</button>
            </div>
            <div id="notification-list" class="space-y-4"></div>
        </div>
    </div>

    @push('scripts')
    <script>
        // Simulated Notification Data (replace with backend data in production)
        const notifications = [
            { id: 1, text: "New project update: Aplikasi Edukasi Kode", time: "2 jam lalu", read: false },
            { id: 2, text: "New collaboration request: Project Musik Kolaborasi", time: "4 jam lalu", read: false },
        ];

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

        // Update Notification Count
        function updateUnreadCount() {
            const unreadCount = notifications.filter(n => !n.read).length;
            document.getElementById('unread-count').textContent = unreadCount > 0 ? unreadCount : '';
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
                    <div class="notification-card ${notification.read ? 'bg-white' : 'bg-gray-100'} border border-gray-200 rounded-lg p-4 hover:-translate-y-1 hover:shadow-lg transition-all cursor-pointer">
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

            let url = new URL(window.location);
            url.searchParams.set('category', activeFilter);
            url.searchParams.set('sort', activeSort);
            url.searchParams.set('search', searchQuery);
            window.location = url;
        }

        // Event Listeners
        window.addEventListener('load', () => {
            initParticleAnimation();
            renderNotifications();
            updateUnreadCount();

            document.querySelectorAll('.filter-btn:not(#notification-modal .filter-btn)').forEach(btn => {
                btn.addEventListener('click', () => {
                    document.querySelectorAll('.filter-btn:not(#notification-modal .filter-btn)').forEach(f => f.classList.remove('active'));
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

            const searchInput = document.getElementById('search-input');
            if (searchInput) {
                searchInput.addEventListener('input', () => {
                    clearTimeout(searchInput.timeout);
                    searchInput.timeout = setTimeout(applyFiltersAndSort, 500);
                });
            }

            document.querySelector('.fa-bell').addEventListener('click', toggleNotifications);
            document.querySelector('.notification-modal .close-btn').addEventListener('click', toggleNotifications);
            document.getElementById('mark-all-read').addEventListener('click', markAllAsRead);

            document.querySelectorAll('#notification-modal .filter-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    document.querySelectorAll('#notification-modal .filter-btn').forEach(f => f.classList.remove('active'));
                    btn.classList.add('active');
                    const filter = btn.dataset.filter || 'all';
                    renderNotifications(filter);
                });
            });

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
    @endpush
</x-layout>