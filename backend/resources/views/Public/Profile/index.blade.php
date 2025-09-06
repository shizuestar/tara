```blade
<x-layout>
    <canvas id="particle-bg"></canvas>
    <!-- Notification Modal -->
    <div id="notification-modal" class="notification-modal">
        <i class="fas fa-times close-btn" role="button" aria-label="Close notifications" tabindex="0"></i>
        <div class="p-6">
            <h2 class="text-2xl font-bold text-black mb-4" style="font-family: 'Space Grotesk', sans-serif;">Notifikasi</h2>
            <div class="flex gap-2 mb-4">
                <button class="filter-btn active" data-filter="all">Semua</button>
                <button class="filter-btn" data-filter="unread">Belum Dibaca</button>
            </div>
            <button id="mark-all-read" class="px-4 py-2 bg-black text-white text-sm rounded-full hover:bg-gray-800 transition mb-4">Tandai Semua Dibaca</button>
            <div id="notification-list" class="space-y-4"></div>
        </div>
    </div>

    <!-- Hero Section -->
    <section class="pt-20 pb-20 section-gradient text-center">
        <div class="container">
            <div class="flex flex-col md:flex-row items-center gap-8 mb-12">
                <div class="relative w-32 h-32 md:w-48 md:h-48 rounded-full overflow-hidden border-4 border-white shadow-lg">
                    <img src="https://i.pravatar.cc/300?u=1" alt="Ahmad Rizki's profile picture" class="w-full h-full object-cover" />
                </div>
                <div class="flex-1 text-center md:text-left">
                    <h1 class="text-3xl md:text-5xl font-bold text-gray-900" style="font-family: 'Space Grotesk', sans-serif;">Ahmad Rizki</h1>
                    <p class="text-base text-gray-600 mt-1">@ahmadrizki</p>
                    <p class="text-base text-gray-600 mt-2 max-w-sm">Desainer dan pengembang kreatif, menggabungkan estetika dan teknologi untuk karya inspiratif.</p>
                    <div class="flex gap-2 mt-2 flex-wrap justify-center md:justify-start">
                        <span class="badge">Desainer</span>
                        <span class="badge">Pengembang</span>
                        <span class="badge">Kurator</span>
                    </div>
                    <div class="flex gap-3 mt-3 flex-wrap justify-center md:justify-start text-lg">
                        <a href="/profile/settings" class="action-btn">Pengaturan</a>
                        <a href="https://linkedin.com/in/ahmadrizki" class="social-icons"><i class="fab fa-linkedin"></i></a>
                        <a href="https://twitter.com/ahmadrizki" class="social-icons"><i class="fab fa-twitter"></i></a>
                        <a href="https://instagram.com/ahmadrizki" class="social-icons"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Navigation Tabs -->
    <section class="bg-white/60 backdrop-blur-sm">
        <div class="container">
            <nav class="flex gap-4 border-b border-gray-200 mt-4 mb-6 overflow-x-auto">
                <button class="nav-link active" data-tab="overview">Ikhtisar</button>
                <button class="nav-link" data-tab="portfolio">Portofolio</button>
                <button class="nav-link" data-tab="projects">Proyek</button>
                <button class="nav-link" data-tab="activity">Aktivitas</button>
                <button class="nav-link" data-tab="community">Komunitas</button>
            </nav>
        </div>
    </section>

    <!-- Tab Content -->
    <div id="tab-content" class="container">
        <!-- Overview Tab -->
        <section id="overview" class="tab-section py-16 pt-6 section-gradient">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="project-card p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3" style="font-family: 'Space Grotesk', sans-serif;">Statistik Aktivitas</h3>
                    <div class="relative w-full" style="height: 350px">
                        <canvas id="userActivityChart"></canvas>
                    </div>
                </div>
                <div class="project-card p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3 text-center" style="font-family: 'Space Grotesk', sans-serif;">Lencana Saya</h3>
                    <div class="grid grid-cols-2 sm:grid-cols-2 gap-4">
                        @foreach ([
                            ['id' => 'badge1', 'name' => 'Kreator Bintang', 'description_short' => 'Untuk 10 karya unggulan', 'description_long' => 'Diberikan kepada kreator yang telah menghasilkan 10 karya unggulan di platform.', 'unlocked' => true, 'is_new' => true, 'lottie_url' => 'https://lottie.host/1.json'],
                            ['id' => 'badge2', 'name' => 'Pionir Komunitas', 'description_short' => 'Memimpin komunitas aktif', 'description_long' => 'Diberikan kepada pengguna yang aktif memimpin dan berkontribusi dalam komunitas.', 'unlocked' => true, 'is_new' => false, 'lottie_url' => 'https://lottie.host/2.json'],
                            ['id' => 'badge3', 'name' => 'Master Kolaborasi', 'description_short' => 'Belum dibuka', 'description_long' => 'Diberikan untuk menyelesaikan 5 proyek kolaborasi.', 'unlocked' => false, 'is_new' => false]
                        ] as $badge)
                            <div class="badge-card {{ $badge['unlocked'] ? '' : 'locked' }}" role="button" tabindex="0" aria-label="{{ $badge['name'] }} badge">
                                <div class="relative badge-icon">
                                    @if ($badge['unlocked'])
                                        <div id="{{ $badge['id'] }}-lottie" class="w-24 h-24 badge-lottie"></div>
                                        @if ($badge['is_new'])
                                            <span class="notification-badge">BARU</span>
                                        @endif
                                    @else
                                        <svg class="w-24 h-24 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M12 2a5 5 0 00-5 5v3a2 2 0 00-2 2v7a2 2 0 002 2h10a2 2 0 002-2v-7a2 2 0 00-2-2V7a5 5 0 00-5-5z" />
                                        </svg>
                                    @endif
                                </div>
                                <h4 class="mt-2 text-base font-bold {{ $badge['unlocked'] ? 'text-gray-200' : 'text-gray-400' }}">{{ $badge['name'] }}</h4>
                                <span class="text-xs {{ $badge['unlocked'] ? 'text-gray-400' : 'text-gray-500' }} font-light">{{ $badge['description_short'] }}</span>
                                <div class="badge-overlay">
                                    <p class="text-white font-medium text-xs">{{ $badge['description_long'] }}</p>
                                    <a href="/badges/{{ $badge['id'] }}" class="action-btn mt-1"> {{ $badge['unlocked'] ? 'Lihat Detail' : 'Cari Tahu' }}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="text-center mt-6">
                        <a href="/badges" class="action-btn">Lihat Semua Lencana</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Portfolio Tab -->
        <section id="portfolio" class="tab-section hidden py-16 pt-6 section-gradient relative overflow-hidden">
            <div class="absolute inset-0 pointer-events-none">
                <div class="particle particle-1"></div>
                <div class="particle particle-2"></div>
                <div class="particle particle-3"></div>
                <div class="particle particle-4"></div>
            </div>
            <div class="relative z-10">
                <div class="mb-6 text-center">
                    <h2 class="text-3xl font-bold text-gray-900" style="font-family: 'Space Grotesk', sans-serif;">Portofolio Saya</h2>
                    <p class="text-base text-gray-600 mt-1">Karya terbaru yang telah dibuat</p>
                </div>
                <div class="flex flex-col sm:flex-row gap-4 mb-8">
                    <div class="flex flex-wrap gap-3 filter-container">
                        <button class="filter-btn active" data-filter="all">Semua</button>
                        @foreach ([
                            ['slug' => 'photography', 'name' => 'Fotografi'],
                            ['slug' => 'design', 'name' => 'Desain'],
                            ['slug' => 'illustration', 'name' => 'Ilustrasi']
                        ] as $category)
                            <button class="filter-btn" data-filter="{{ $category['slug'] }}">{{ $category['name'] }}</button>
                        @endforeach
                    </div>
                    <div class="flex gap-3">
                        <select class="filter-btn" data-filter="year">
                            <option value="all">Semua Tahun</option>
                            @foreach ([2025, 2024, 2023] as $year)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8" id="portfolio-list">
                    @foreach ([
                        ['id' => 1, 'title' => 'Sunset at Bali Beach', 'category' => ['slug' => 'photography', 'name' => 'Fotografi'], 'year' => 2025, 'description' => 'Foto matahari terbenam yang menakjubkan di pantai Bali.', 'image_url' => 'https://picsum.photos/300/400?random=1'],
                        ['id' => 2, 'title' => 'Digital Illustration Series', 'category' => ['slug' => 'illustration', 'name' => 'Ilustrasi'], 'year' => 2024, 'description' => 'Seri ilustrasi digital dengan tema futuristik.', 'image_url' => 'https://picsum.photos/300/400?random=2'],
                        ['id' => 3, 'title' => 'UI/UX Dashboard Design', 'category' => ['slug' => 'design', 'name' => 'Desain'], 'year' => 2023, 'description' => 'Desain dashboard modern untuk aplikasi web.', 'image_url' => 'https://picsum.photos/300/400?random=3']
                    ] as $item)
                        <div class="project-card portfolio-card" data-category="{{ $item['category']['slug'] }}" data-year="{{ $item['year'] }}">
                            <div class="flip-card">
                                <div class="flip-card-front relative overflow-hidden bg-gray-900 aspect-[4/5] border-2 border-gray-200 rounded-2xl">
                                    <img src="{{ $item['image_url'] }}" alt="{{ $item['title'] }}" class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-700" />
                                    <div class="image-overlay"></div>
                                    <div class="absolute bottom-4 left-4 text-white z-20">
                                        <div class="text-base font-bold uppercase tracking-wide">{{ $item['title'] }}</div>
                                        <div class="text-xs opacity-80">{{ $item['category']['name'] }} - {{ $item['year'] }}</div>
                                    </div>
                                </div>
                                <div class="flip-card-back">
                                    <p class="text-white font-medium text-xs">{{ $item['description'] }}</p>
                                    <a href="/portfolio/{{ $item['id'] }}" class="action-btn mt-2">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-center mt-10">
                    <a href="/portfolio" class="action-btn">Lihat Semua Karya</a>
                </div>
            </div>
        </section>

        <!-- Projects Tab -->
        <section id="projects" class="tab-section hidden py-16 pt-6 section-gradient">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                @foreach ([
                    ['id' => 1, 'title' => 'Job Fair 2025', 'role' => 'Koordinator UI/UX', 'status' => 'Sedang Berlangsung', 'progress' => 75],
                    ['id' => 2, 'title' => 'Aplikasi Mobile TARA', 'role' => 'Pengembang Front-end', 'status' => 'Selesai', 'progress' => 100]
                ] as $project)
                    <div class="project-card p-6">
                        <h3 class="text-lg font-semibold text-gray-900" style="font-family: 'Space Grotesk', sans-serif;">{{ $project['title'] }}</h3>
                        <p class="text-sm text-gray-600 mt-1">Posisi: {{ $project['role'] }}</p>
                        <p class="text-sm text-gray-600">Status: {{ $project['status'] }}</p>
                        <div class="progress-circle mt-4">
                            <svg>
                                <circle class="bg-circle" cx="30" cy="30" r="27"/>
                                <circle class="progress-ring" cx="30" cy="30" r="27" stroke-dasharray="169.65" stroke-dashoffset="{{ 169.65 - ($project['progress'] / 100 * 169.65) }}"/>
                            </svg>
                            <div class="progress-text">{{ $project['progress'] }}%</div>
                        </div>
                        <div class="flex justify-end mt-4">
                            <a href="/projects/{{ $project['id'] }}" class="action-btn">Lihat Proyek</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Activity Tab -->
        <section id="activity" class="tab-section hidden py-16 pt-6 section-gradient">
            <div class="space-y-4">
                @foreach ([
                    ['type' => 'Post Forum', 'description' => 'Berbagi tips desain UI/UX di forum TARA', 'created_at' => '2 jam lalu', 'link' => '/forum/1'],
                    ['type' => 'Karya Baru', 'description' => 'Mengunggah karya baru: Sunset at Bali Beach', 'created_at' => '1 hari lalu', 'link' => '/portfolio/1']
                ] as $activity)
                    <div class="notification-card p-6">
                        <p class="text-base text-gray-600">
                            <span class="font-semibold text-gray-900">{{ $activity['type'] }}:</span>
                            {{ $activity['description'] }} - {{ $activity['created_at'] }}
                        </p>
                        @if ($activity['link'])
                            <a href="{{ $activity['link'] }}" class="action-btn mt-2">Lihat Detail</a>
                        @endif
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Community Tab -->
        <section id="community" class="tab-section hidden py-16 pt-6 section-gradient">
            <div class="mb-6 text-center">
                <h2 class="text-3xl font-bold text-gray-900" style="font-family: 'Space Grotesk', sans-serif;">Komunitas Saya</h2>
                <p class="text-base text-gray-600 mt-1">Grup dan forum yang diikuti 🌱</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                @foreach ([
                    ['name' => 'Desainer Nusantara', 'description' => 'Komunitas untuk desainer Indonesia yang berfokus pada UI/UX dan branding.', 'members_count' => 120, 'members' => [['id' => 2, 'name' => 'Siti Nurhaliza'], ['id' => 3, 'name' => 'Budi Santoso']]],
                    ['name' => 'Fotografi Keren', 'description' => 'Berbagi inspirasi dan teknik fotografi.', 'members_count' => 85, 'members' => [['id' => 4, 'name' => 'Dewi Lestari'], ['id' => 5, 'name' => 'Rian Pratama']]]
                ] as $community)
                    <div class="project-card p-6">
                        <h3 class="text-lg font-semibold text-gray-900" style="font-family: 'Space Grotesk', sans-serif;">{{ $community['name'] }}</h3>
                        <p class="text-sm text-gray-600 mt-1">{{ $community['description'] }}</p>
                        <div class="flex items-center mt-3">
                            @foreach (array_slice($community['members'], 0, 2) as $member)
                                <img class="w-6 h-6 rounded-full mr-2" src="https://i.pravatar.cc/32?img={{ $member['id'] }}" alt="{{ $member['name'] }}'s avatar" />
                            @endforeach
                            <span class="text-sm text-gray-600">+{{ $community['members_count'] }} anggota</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>

    @push('styles')
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

        .portfolio-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .portfolio-card:hover img {
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

        .notification-bar,
        .notification-card {
            background: #f3f4f6;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .notification-bar:hover,
        .notification-card:hover {
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

        .notification-card.unread {
            background: #f3f4f6;
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

        .filter-btn,
        .nav-link {
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
        .nav-link.active {
            background: #f59e0b;
            color: #ffffff;
            border-color: #f59e0b;
        }

        .filter-btn:hover,
        .nav-link:hover {
            background: #1a202c;
            color: #ffffff;
            border-color: #1a202c;
        }

        .action-btn {
            padding: 0.6rem 1.5rem;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 500;
            background: #1a202c;
            color: #ffffff;
            transition: all 0.3s ease;
            text-transform: uppercase;
            border: solid #1a202c 2px;
        }

        .action-btn:hover {
            background: #ffffff;
            color: #1a202c;
            border: solid #1a202c 2px;
        }

        .nav-link {
            position: relative;
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

        .nav-link.active::after {
            width: 100%;
        }

        .social-icons {
            color: #6b7280;
            transition: color 0.3s ease;
        }

        .social-icons:hover {
            color: #1a202c;
        }

        .badge-card {
            position: relative;
            background: #1a202c;
            border: 1px solid #333333;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            cursor: pointer;
            overflow: hidden;
            height: 180px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 12px;
        }

        .badge-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3), 0 0 6px rgba(255, 255, 255, 0.2);
        }

        .badge-card.locked {
            background: #1a1a1a;
            border: 1px dashed #333333;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .badge-card.locked:hover {
            transform: translateY(-4px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        .badge-icon {
            position: relative;
            animation: pulse 2s ease-in-out infinite;
        }

        .badge-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.9);
            opacity: 0;
            transition: opacity 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 12px;
            border-radius: 10px;
        }

        .badge-card:hover .badge-overlay {
            opacity: 1;
        }

        .flip-card {
            position: relative;
            width: 100%;
            height: 100%;
            transform-style: preserve-3d;
            transition: transform 0.5s ease;
        }

        .portfolio-card.flipped .flip-card {
            transform: rotateY(180deg) scale(1.02);
        }

        .flip-card-front,
        .flip-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            border-radius: 10px;
        }

        .flip-card-back {
            transform: rotateY(180deg);
            background: linear-gradient(135deg, #1a1a1a, #4a4a4a);
            padding: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .image-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(45deg, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0.3) 100%);
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .portfolio-card:hover .image-overlay {
            opacity: 1;
        }

        .particle {
            position: absolute;
            background: rgba(255, 215, 0, 0.4);
            border-radius: 50%;
            animation: drift 12s linear infinite;
        }

        .particle-1 {
            width: 20px;
            height: 20px;
            top: 5%;
            left: 10%;
        }

        .particle-2 {
            width: 12px;
            height: 12px;
            top: 60%;
            left: 70%;
            animation-delay: 4s;
        }

        .particle-3 {
            width: 15px;
            height: 15px;
            top: 30%;
            left: 40%;
            animation-delay: 8s;
        }

        .particle-4 {
            width: 14px;
            height: 14px;
            top: 80%;
            left: 20%;
            animation-delay: 2s;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.03); }
        }

        @keyframes drift {
            0% { transform: translate(0, 0); opacity: 0.4; }
            50% { opacity: 0.7; }
            100% { transform: translate(120vw, 100vh); opacity: 0; }
        }

        @media (max-width: 1024px) {
            .notification-modal {
                max-width: 100%;
            }

            .portfolio-card img {
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
            .portfolio-card img {
                height: 140px;
            }

            .filter-container {
                flex-direction: column;
                align-items: stretch;
                gap: 0.75rem;
            }

            .action-btn {
                width: 100%;
                text-align: center;
            }

            .portfolio-card:hover .image-overlay,
            .badge-card:hover .badge-overlay {
                opacity: 0;
            }

            .portfolio-card.active .image-overlay,
            .badge-card.active .badge-overlay {
                opacity: 1;
            }

            .badge-card {
                height: 160px;
                padding: 10px;
            }

            .badge-icon {
                transform: scale(0.7);
            }
        }

        @media (max-width: 640px) {
            .portfolio-card img {
                height: 120px;
            }

            .action-btn,
            .filter-btn {
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
    @endpush

    @push('scripts')
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.2/anime.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.12.2/lottie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Simulated Data
        const notifications = [
            { id: 1, text: "New project update: Job Fair 2025", time: "2 jam lalu", read: false },
            { id: 2, text: "New portfolio added: Sunset at Bali Beach", time: "1 hari lalu", read: false }
        ];

        // Particle Wave Animation
        function initParticleAnimation() {
            const canvas = document.getElementById('particle-bg');
            if (!canvas) return;
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

            window.addEventListener('resize', () => {
                canvas.width = window.innerWidth;
                canvas.height = window.innerHeight;
            });
        }

        // Render Notifications
        function renderNotifications(filter = 'all') {
            const notificationList = document.getElementById('notification-list');
            if (!notificationList) return;

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
            const unreadElement = document.getElementById('unread-count');
            if (!unreadElement) return;
            const unreadCount = notifications.filter(n => !n.read).length;
            unreadElement.textContent = unreadCount;
            unreadElement.style.display = unreadCount > 0 ? 'inline-block' : 'none';
        }

        // Toggle Notifications
        function toggleNotifications() {
            const modal = document.getElementById('notification-modal');
            if (!modal) return;
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
            const markAllReadBtn = document.getElementById('mark-all-read');
            if (!markAllReadBtn) return;
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

        // Apply Portfolio Filters
        function applyPortfolioFilters() {
            const activeFilter = document.querySelector('.filter-btn.active')?.dataset.filter || 'all';
            const year = document.querySelector('[data-filter="year"]')?.value || 'all';
            const portfolioItems = document.querySelectorAll('.portfolio-card');
            portfolioItems.forEach(item => {
                const itemCategory = item.dataset.category;
                const itemYear = item.dataset.year;
                if ((activeFilter === 'all' || itemCategory === activeFilter) && (year === 'all' || itemYear === year)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
            gsap.from(".portfolio-card[style='display: block;']", {
                opacity: 0,
                y: 20,
                duration: 0.5,
                stagger: 0.1,
                ease: "power2.out"
            });
        }

        // Event Listeners
        document.addEventListener('DOMContentLoaded', () => {
            initParticleAnimation();
            renderNotifications();
            updateUnreadCount();

            // Chart.js
            const chartCanvas = document.getElementById("userActivityChart");
            if (chartCanvas) {
                const ctx = chartCanvas.getContext("2d");
                new Chart(ctx, {
                    type: "bar",
                    data: {
                        labels: ["Forum Post", "Materi Dibaca", "Tugas Selesai", "Hari Login"],
                        datasets: [{
                            label: "Aktivitas",
                            data: [128, 87, 21, 12],
                            backgroundColor: ["#000000", "#333333", "#666666", "#999999"],
                            borderRadius: 6,
                            barThickness: 16,
                        }],
                    },
                    options: {
                        indexAxis: "y",
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            x: { beginAtZero: true, grid: { color: "rgba(0, 0, 0, 0.1)" }, ticks: { color: "#000000", font: { family: "Space Grotesk", size: 12 } } },
                            y: { grid: { display: false }, ticks: { color: "#000000", font: { family: "Space Grotesk", size: 12 } } },
                        },
                        plugins: {
                            legend: { display: false },
                            tooltip: { backgroundColor: "rgba(0, 0, 0, 0.8)", titleColor: "#ffffff", bodyColor: "#ffffff", callbacks: { label: (context) => context.raw + " poin" } },
                        },
                    },
                });
            }

            // Lottie Animations for Badges
            const lotties = [
                { id: "badge1-lottie", path: "https://lottie.host/1.json" },
                { id: "badge2-lottie", path: "https://lottie.host/2.json" },
            ];
            lotties.forEach((b) => {
                const container = document.getElementById(b.id);
                if (container) {
                    lottie.loadAnimation({
                        container: container,
                        renderer: "svg",
                        loop: true,
                        autoplay: true,
                        path: b.path,
                    });
                }
            });

            // Tab Functionality
            const tabLinks = document.querySelectorAll(".nav-link");
            const tabSections = document.querySelectorAll(".tab-section");
            tabLinks.forEach((link) => {
                link.addEventListener("click", () => {
                    tabLinks.forEach((l) => l.classList.remove("active"));
                    link.classList.add("active");
                    tabSections.forEach((s) => s.classList.add("hidden"));
                    const targetSection = document.getElementById(link.dataset.tab);
                    if (targetSection) {
                        targetSection.classList.remove("hidden");
                        gsap.from(`#${link.dataset.tab} .project-card, #${link.dataset.tab} .notification-card`, {
                            opacity: 0,
                            y: 20,
                            duration: 0.5,
                            stagger: 0.1,
                            ease: "power2.out"
                        });
                    }
                });
            });

            // Portfolio Filter
            document.querySelectorAll(".filter-btn").forEach((btn) => {
                btn.addEventListener("click", () => {
                    document.querySelectorAll(".filter-btn").forEach((f) => f.classList.remove("active"));
                    btn.classList.add("active");
                    applyPortfolioFilters();
                    anime({
                        targets: btn,
                        scale: [1, 1.05, 1],
                        duration: 200,
                        easing: "easeOutQuad"
                    });
                });
            });

            const yearFilter = document.querySelector('[data-filter="year"]');
            if (yearFilter) {
                yearFilter.addEventListener("change", applyPortfolioFilters);
            }

            // Badge Interactivity
            document.querySelectorAll(".badge-card").forEach((item) => {
                item.addEventListener("click", (e) => {
                    if (window.innerWidth <= 768) {
                        item.classList.toggle("active");
                    }
                    if (e.target.tagName === "A") {
                        window.location.href = e.target.href;
                    }
                });
                item.addEventListener("keydown", (e) => {
                    if (e.key === "Enter" || e.key === " ") {
                        e.preventDefault();
                        item.classList.toggle("active");
                    }
                });
            });

            // Gallery Flip Card Interactivity
            document.querySelectorAll(".portfolio-card").forEach((item) => {
                item.addEventListener("click", (e) => {
                    if (e.target.tagName !== "A") {
                        item.classList.toggle("flipped");
                        item.classList.toggle("active");
                    }
                });
                item.addEventListener("keydown", (e) => {
                    if (e.key === "Enter" || e.key === " ") {
                        e.preventDefault();
                        item.classList.toggle("flipped");
                        item.classList.toggle("active");
                    }
                });
            });

            // Notification Bell
            const bell = document.querySelector('.fa-bell');
            if (bell) {
                bell.addEventListener('click', toggleNotifications);
                bell.addEventListener('keypress', (e) => {
                    if (e.key === 'Enter' || e.key === ' ') {
                        toggleNotifications();
                    }
                });
            }

            // Mark All as Read
            const markAllReadBtn = document.getElementById('mark-all-read');
            if (markAllReadBtn) {
                markAllReadBtn.addEventListener('click', markAllAsRead);
            }

            // Close Notification Modal
            const closeBtn = document.querySelector('.notification-modal .close-btn');
            if (closeBtn) {
                closeBtn.addEventListener('click', toggleNotifications);
                closeBtn.addEventListener('keypress', (e) => {
                    if (e.key === 'Enter' || e.key === ' ') {
                        toggleNotifications();
                    }
                });
            }

            // Close Modal with Escape Key
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') {
                    const modal = document.getElementById('notification-modal');
                    if (modal && modal.classList.contains('open')) {
                        toggleNotifications();
                    }
                }
            });
        });
    </script>
    @endpush
</x-layout>
```