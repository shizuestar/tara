<x-layout>

    @push('styles')
    <style>
        body, * {
            font-family: 'Space Grotesk', sans-serif !important;
        }

    </style>
   @endpush

    <main class="mt-16 max-w-5xl mx-auto px-4 min-h-[calc(100vh-80px-160px)]">
        <section class="py-16 flex flex-col md:flex-row items-center gap-8 bg-white/50 backdrop-blur-sm relative overflow-hidden">
            <div class="absolute inset-0 z-0 opacity-5">
                <div class="w-1/2 h-full bg-black/5 rounded-full absolute top-0 left-0 blur-3xl transform -translate-x-1/2 -translate-y-1/2"></div>
                <div class="w-1/2 h-full bg-black/5 rounded-full absolute bottom-0 right-0 blur-3xl transform translate-x-1/2 translate-y-1/2"></div>
            </div>
            
            <div class="relative w-32 h-32 md:w-48 md:h-48 rounded-full overflow-hidden border-4 border-white shadow-lg animate-float z-10">
                <img src="{{ $user->avatar ?? 'https://th.bing.com/th/id/OIP.8Mi9Qr8E5N1dP0GX6Nx3bQHaHa?w=166&h=180&c=7&r=0&o=5&dpr=1.5&pid=1.7' . $user->id }}" alt="{{ $user->name }}'s profile picture" class="w-full h-full object-cover" />
            </div>
            <div class="flex-1 text-center md:text-left z-10">
                <h1 class="text-2xl md:text-3xl font-bold text-black animate-appear">{{ $user->name }}</h1>
                <p class="text-md font-bold text-gray-600 mt-1 animate-appear">{{ $user->username }}</p>
                <p class="text-sm text-gray-600 mt-2 max-w-sm animate-appear">{{ $user->bio ?? 'Tulis sesuatu tentang diri Anda untuk menginspirasi orang lain.' }}</p>
                <div class="flex gap-2 mt-2 flex-wrap justify-center md:justify-start">
                    @foreach($user->roles as $role)
                        <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded-full">{{ $role }}</span>
                    @endforeach
                </div>
                <div class="flex gap-3 mt-3 flex-wrap justify-center md:justify-start text-lg">
                    @if(auth()->id() === $user->id)
                        <a href="{{ route('profile.edit', $user->username) }}" class="button-primary relative overflow-hidden text-sm bg-gradient-to-br from-black to-gray-700 text-white px-5 py-1.5 rounded-full shadow-2xl hover:bg-gray-700 hover:shadow-xl hover:-translate-y-0.5 transition-all duration-400 group">
                            Pengaturan
                            <span class="absolute top-0 left-[-100%] w-full h-full bg-gradient-to-r from-transparent via-white/20 to-transparent transition-all duration-600 group-hover:left-[100%]"></span>
                        </a>
                    @endif
                    @if($user->social_links['instagram'] ?? false)
                        <a href="{{ $user->social_links['instagram'] }}" class="text-gray-600 hover:text-black"><i class="fab fa-instagram"></i></a>
                    @endif
                    @if($user->social_links['twitter'] ?? false)
                        <a href="{{ $user->social_links['twitter'] }}" class="text-gray-600 hover:text-black"><i class="fab fa-twitter"></i></a>
                    @endif
                    @if($user->social_links['website'] ?? false)
                        <a href="{{ $user->social_links['website'] }}" class="text-gray-600 hover:text-black"><i class="fas fa-globe"></i></a>
                    @endif
                </div>
            </div>
        </section>

        <hr class="border-t border-gray-100" />
        
        <nav class="flex gap-4 border-b border-gray-200 mt-4 mb-6 overflow-x-auto">
            <button class="tab-link active relative pb-2 text-sm font-bold text-black transition-all duration-300 hover:font-bold before:absolute before:bottom-0 before:left-0 before:w-full before:h-0.5 before:bg-black before:scale-x-100 before:hover:scale-x-100 before:transition-transform before:duration-300" data-tab="overview">Ikhtisar</button>
            <button class="tab-link relative pb-2 text-sm text-gray-600 hover:text-black hover:font-bold transition-all duration-300 before:absolute before:bottom-0 before:left-0 before:w-full before:h-0.5 before:bg-black before:scale-x-0 before:hover:scale-x-100 before:transition-transform before:duration-300" data-tab="portfolio">Portofolio</button>
            <button class="tab-link relative pb-2 text-sm text-gray-600 hover:text-black hover:font-bold transition-all duration-300 before:absolute before:bottom-0 before:left-0 before:w-full before:h-0.5 before:bg-black before:scale-x-0 before:hover:scale-x-100 before:transition-transform before:duration-300" data-tab="projects">Project</button>
            <button class="tab-link relative pb-2 text-sm text-gray-600 hover:text-black hover:font-bold transition-all duration-300 before:absolute before:bottom-0 before:left-0 before:w-full before:h-0.5 before:bg-black before:scale-x-0 before:hover:scale-x-100 before:transition-transform before:duration-300" data-tab="activity">Aktivitas</button>
            <button class="tab-link relative pb-2 text-sm text-gray-600 hover:text-black hover:font-bold transition-all duration-300 before:absolute before:bottom-0 before:left-0 before:w-full before:h-0.5 before:bg-black before:scale-x-0 before:hover:scale-x-100 before:transition-transform before:duration-300" data-tab="community">Komunitas</button>
        </nav>

        <div id="tab-content">
            <section id="overview" class="tab-section py-16 pt-6 bg-white/60 backdrop-blur-sm">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="card bg-white/90 backdrop-blur-md border border-gray-100 shadow-lg p-6 rounded-xl hover:shadow-xl hover:-translate-y-2 transition-all duration-400 animate-slideIn">
                        <h3 class="text-base font-semibold text-black mb-3">Statistik Aktivitas</h3>
                        <div class="relative w-full h-[350px]">
                            <canvas id="userActivityChart"></canvas>
                        </div>
                    </div>
                    <div class="card bg-white/90 backdrop-blur-md border border-gray-100 shadow-lg p-6 rounded-xl hover:shadow-xl hover:-translate-y-2 transition-all duration-400 animate-slideIn">
                        <h3 class="text-base font-semibold text-black mb-3 text-center">Lencana Saya</h3>
                        <div class="grid grid-cols-2 sm:grid-cols-2 gap-4">
                            @foreach($badges as $badge)
                                <div class="badge-card relative border rounded-xl shadow-md flex flex-col items-center justify-center p-3 h-44 hover:shadow-lg hover:-translate-y-2 transition-all duration-300 cursor-pointer overflow-hidden badge-animate opacity-0 
                                    {{ $badge['unlocked'] ? 'bg-black border-gray-700' : 'bg-gray-900 border-dashed border-gray-700 locked' }}" 
                                    role="button" tabindex="0" aria-label="{{ $badge['name'] }} badge">
                                    
                                    <div class="relative badge-icon animate-pulse">
                                        @if($badge['unlocked'] && $badge['lottie_path'])
                                            <div id="{{ $badge['id'] }}" class="w-24 h-24 badge-lottie grayscale brightness-125"></div>
                                            @if($badge['new'])
                                                <span class="absolute -top-1 -right-1 text-xs bg-gray-900 text-white px-1.5 py-0.5 rounded-full shadow-sm border border-gray-600 animate-pulse" aria-hidden="true">BARU</span>
                                            @endif
                                        @else
                                            <svg class="w-24 h-24 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M12 2a5 5 0 00-5 5v3a2 2 0 00-2 2v7a2 2 0 002 2h10a2 2 0 002-2v-7a2 2 0 00-2-2V7a5 5 0 00-5-5z" />
                                            </svg>
                                        @endif
                                    </div>
                                    
                                    <h4 class="mt-2 text-base font-bold {{ $badge['unlocked'] ? 'text-gray-200' : 'text-gray-400' }}">{{ $badge['name'] }}</h4>
                                    <span class="text-xs {{ $badge['unlocked'] ? 'text-gray-400' : 'text-gray-500' }} font-light">{{ $badge['description'] }}</span>
                                    
                                    <div class="badge-overlay absolute inset-0 bg-black/90 opacity-0 hover:opacity-100 transition-opacity duration-300 flex flex-col items-center justify-center p-3 rounded-xl">
                                        <p class="text-white font-medium text-xs text-center">{{ $badge['details'] }}</p>
                                        <a href="/badge-detail" class="button-primary relative overflow-hidden text-xs bg-gradient-to-br from-black to-gray-700 text-white px-3 py-1 rounded-full font-semibold hover:bg-gray-700 hover:shadow-xl hover:-translate-y-0.5 transition-all duration-400 mt-1 group">
                                            {{ $badge['unlocked'] ? 'Lihat Detail' : 'Cari Tahu' }}
                                            <span class="absolute top-0 left-[-100%] w-full h-full bg-gradient-to-r from-transparent via-white/20 to-transparent transition-all duration-500 group-hover:left-[100%]"></span>
                                        </a>
                                    </div>

                                    <span class="absolute top-0 left-[-100%] w-full h-full bg-gradient-to-r from-transparent via-white/30 to-transparent transition-all duration-500 group-hover:left-[100%] z-10"></span>
                                </div>
                            @endforeach
                        </div>
                        <div class="text-center mt-6">
                            <a href="/badge" class="button-primary relative overflow-hidden text-sm bg-gradient-to-br from-black to-gray-700 text-white px-4 py-1.5 rounded-full font-semibold uppercase hover:bg-gray-700 hover:shadow-xl hover:-translate-y-0.5 transition-all duration-400 group">
                                Lihat Semua Lencana
                                <span class="absolute top-0 left-[-100%] w-full h-full bg-gradient-to-r from-transparent via-white/20 to-transparent transition-all duration-600 group-hover:left-[100%]"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <section id="portfolio" class="tab-section hidden py-16 pt-6 bg-gradient-to-br from-gray-50 to-gray-100 relative overflow-hidden">
                <div class="absolute inset-0 pointer-events-none">
                    <div class="absolute w-5 h-5 bg-yellow-400/40 rounded-full top-[5%] left-[10%] animate-drift"></div>
                    <div class="absolute w-3 h-3 bg-yellow-400/40 rounded-full top-[60%] left-[70%] animate-drift delay-4000"></div>
                    <div class="absolute w-4 h-4 bg-yellow-400/40 rounded-full top-[30%] left-[40%] animate-drift delay-8000"></div>
                    <div class="absolute w-3.5 h-3.5 bg-yellow-400/40 rounded-full top-[80%] left-[20%] animate-drift delay-2000"></div>
                </div>
                
                <div class="max-w-5xl mx-auto relative z-10">
                    <div class="mb-6 text-center">
                        <h2 class="text-2xl font-bold text-black animate-appear">Portofolio Saya</h2>
                        <p class="text-sm text-gray-600 mt-1 animate-appear">Karya terbaru yang telah Anda buat</p>
                    </div>
                    
                    <div class="flex flex-wrap gap-3 mb-4 justify-center">
                        <button class="filter-button active px-4 py-1.5 bg-white border border-gray-200 rounded-full text-sm hover:bg-black hover:text-white hover:border-black transition-all duration-300" data-filter="all">Semua</button>
                        @foreach($categories as $category)
                            <button class="filter-button px-4 py-1.5 bg-white border border-gray-200 rounded-full text-sm hover:bg-black hover:text-white hover:border-black transition-all duration-300" data-filter="{{ $category->name }}">{{ $category->name }}</button>
                        @endforeach
                        <select class="filter-button px-4 py-1.5 bg-white border border-gray-200 rounded-full text-sm hover:bg-black hover:text-white hover:border-black transition-all duration-300" data-filter="year">
                            <option value="all">Semua Tahun</option>
                            @foreach($years as $year)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="gallery-grid grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                        @foreach($artworks as $artwork)
                            <div class="gallery-item portfolio-card relative overflow-hidden transition-all duration-500 [perspective:1000px]" 
                                data-category="{{ $artwork->category->name }}" data-year="{{ $artwork->created_at->year }}" 
                                style="--rotate-angle: -{{ rand(0, 1) }}deg; --rope-angle: -{{ rand(0, 1) }}deg; --sway-duration: 5s;">
                                
                                <div class="rope absolute top-[-15px] left-1/2 w-0.5 h-4 bg-gray-600 origin-top animate-ropeSway z-20"></div>
                                <div class="flip-card relative w-full h-full [transform-style:preserve-3d] transition-transform duration-500">
                                    
                                    <div class="flip-card-front absolute w-full h-full [backface-visibility:hidden] bg-gray-900 aspect-[4/5] border-2 border-gray-200 rounded-2xl overflow-hidden">
                                        <img src="{{ $artwork->thumbnail ?? 'https://picsum.photos/300/400?random=' . $artwork->id }}" alt="{{ $artwork->title }}" class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-700" />
                                        <div class="image-overlay absolute inset-0 bg-gradient-to-tl from-black/80 to-black/30 opacity-0 hover:opacity-100 transition-opacity duration-500"></div>
                                        <div class="absolute bottom-4 left-4 text-white z-20">
                                            <div class="text-base font-bold uppercase tracking-wide">{{ $artwork->title }}</div>
                                            <div class="text-xs opacity-80">{{ $artwork->category->name }} - {{ $artwork->created_at->year }}</div>
                                        </div>
                                    </div>
                                    
                                    <div class="flip-card-back absolute w-full h-full [backface-visibility:hidden] bg-gradient-to-br from-gray-900 to-gray-700 p-3 rounded-2xl shadow-lg flex flex-col justify-center items-center rotate-y-180">
                                        <p class="text-white font-medium text-xs text-center">{{ $artwork->description }}</p>
                                        <a href="{{ route('artwork.detail', $artwork->id) }}" class="text-blue-400 font-semibold hover:underline mt-2 text-xs">Lihat Detail</a>
                                    </div>
                                </div>
                                
                                <span class="absolute top-0 left-[-100%] w-full h-full bg-gradient-to-r from-transparent via-white/20 to-transparent transition-all duration-600 group-hover:left-[100%] z-10"></span>
                            </div>
                        @endforeach
                    </div>
                    
                    <div class="text-center mt-6">
                        <a href="/portfolio" class="button-primary relative overflow-hidden text-base bg-gradient-to-br from-black to-gray-700 text-white px-6 py-2 rounded-full font-bold uppercase tracking-wide hover:bg-gray-700 hover:shadow-xl hover:-translate-y-0.5 transition-all duration-400 group">
                            Lihat Semua Karya
                            <span class="absolute top-0 left-[-100%] w-full h-full bg-gradient-to-r from-transparent via-white/20 to-transparent transition-all duration-600 group-hover:left-[100%]"></span>
                        </a>
                    </div>
                </div>
            </section>

            <section id="projects" class="tab-section hidden py-16 pt-6 bg-white/60 backdrop-blur-sm">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach($projects as $project)
                        <div class="card bg-white/90 backdrop-blur-md border border-gray-100 shadow-lg p-6 rounded-xl hover:shadow-xl hover:-translate-y-2 transition-all duration-400">
                            <h3 class="text-base font-semibold text-black">{{ $project->title }}</h3>
                            <p class="text-xs text-gray-600 mt-1">Posisi: {{ $project->pivot->role ?? 'Penggagas' }}</p>
                            <p class="text-xs text-gray-600">Status: {{ $project->status }}</p>
                            <div class="h-0.5 bg-gray-200 rounded-full mt-2 overflow-hidden">
                                <div class="h-full bg-black w-[{{ $project->status === 'completed' ? 100 : rand(40, 70) }}%] transition-all duration-300" 
                                    style="width: {{ $project->status === 'completed' ? 100 : rand(40, 70) }}%;"></div>
                            </div>
                            <a href="{{ route('project.dashboard', $project->id) }}" class="text-blue-600 hover:underline mt-2 block text-xs">Lihat Dashboard</a>
                        </div>
                    @endforeach
                </div>
            </section>

            <section id="activity" class="tab-section hidden py-16 pt-6 bg-white/60 backdrop-blur-sm">
                <div class="space-y-4">
                    @foreach($activities as $activity)
                        <div class="card bg-white/90 backdrop-blur-md border border-gray-100 shadow-lg p-6 rounded-xl hover:shadow-xl hover:-translate-y-2 transition-all duration-400">
                            <p class="text-xs text-gray-600"><span class="font-semibold text-black">{{ ucfirst($activity->type) }}:</span> {{ $activity->description }} - {{ $activity->created_at->diffForHumans() }}</p>
                            @if($activity->subject_route)
                                <a href="{{ $activity->subject_route }}" class="text-blue-600 hover:underline mt-2 block text-xs">{{ $activity->subject_action }}</a>
                            @endif
                        </div>
                    @endforeach
                </div>
            </section>

            <section id="community" class="tab-section hidden py-16 pt-6 bg-white/60 backdrop-blur-sm">
                <div class="max-w-5xl mx-auto">
                    <div class="mb-6 text-center">
                        <h2 class="text-2xl font-bold text-black animate-appear">Komunitas Saya</h2>
                        <p class="text-sm text-gray-600 mt-1 animate-appear">Grup dan forum yang Anda ikuti 🌱</p>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @foreach($user->communities as $community)
                            <div class="category-card bg-white/90 backdrop-blur-md border border-gray-100 p-6 rounded-xl hover:shadow-lg hover:-translate-y-2 hover:border-black transition-all duration-400">
                                <h3 class="text-base font-semibold text-black">{{ $community->name }}</h3>
                                <p class="text-xs text-gray-600 mt-1">{{ $community->description }}</p>
                                <div class="flex items-center mt-3">
                                    <img class="w-6 h-6 rounded-full mr-2" src="https://i.pravatar.cc/32?img={{ $community->id }}" alt="{{ $community->name }} member 1" />
                                    <img class="w-6 h-6 rounded-full mr-2" src="https://i.pravatar.cc/32?img={{ $community->id + 1 }}" alt="{{ $community->name }} member 2" />
                                    <span class="text-xs text-gray-600">+{{ $community->member_count }} anggota</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </main>

    @push('styles')
        <style>
            /* CATATAN: Animasi kustom seperti 'animate-float', 'animate-appear', 'animate-slideIn', 
               'animate-drift', 'animate-ropeSway', 'animate-fadeIn' dan properti kustom 
               seperti '[perspective:1000px]', 'rotate-y-180', '[backface-visibility:hidden]' 
               membutuhkan konfigurasi di tailwind.config.js (atau plugin kustom) 
               agar sepenuhnya "Tailwind". Untuk tujuan demo, nama kelas dipertahankan 
               dengan asumsi kustomisasi sudah diatur, dan CSS mentah dihapus. 
               
               Saya menambahkan kelas 'group' dan menggunakan sintaks 'group-hover:' 
               untuk menggantikan beberapa pseudo-element logic.
            */

            .tab-link.active::after {
                transform: scaleX(1);
            }
            .tab-link::after {
                content: "";
                position: absolute;
                bottom: 0;
                left: 0;
                width: 100%; /* Ubah dari 0 ke 100% untuk transisi scale */
                height: 2px;
                background-color: black;
                transition: transform 0.3s ease;
                transform: scaleX(0); /* Awalnya 0 */
                transform-origin: bottom left; /* Transisi dari kiri */
            }
            .tab-link:hover::after {
                transform: scaleX(1);
            }

            /* Gallery Item Flip Logic - Menggunakan utilitas transform dan backface */
            .gallery-item.flipped .flip-card {
                transform: rotateY(180deg);
            }
            .flip-card-back {
                transform: rotateY(180deg); /* Awalnya putar 180 */
            }
            
            /* Shine effects untuk button dan card diganti dengan utilitas group-hover */
            
        </style>
    @endpush

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.12.2/lottie.min.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const ctx = document.getElementById("userActivityChart").getContext("2d");
                // Konversi warna chart ke utilitas Tailwind yang digunakan (black, gray-700, gray-600, gray-500)
                const chartColors = ["#000000", "#374151", "#4b5563", "#6b7280"]; 

                new Chart(ctx, {
                    type: "bar",
                    data: {
                        labels: ["Forum Post", "Materi Dibaca", "Tugas Selesai", "Hari Login"],
                        datasets: [{
                            label: "Aktivitas",
                            data: @json($activityStats),
                            backgroundColor: chartColors, // Menggunakan array warna yang diubah
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

                const lotties = @json($badges->where('unlocked', true)->map(function($badge) {
                    return ['id' => $badge['id'], 'path' => $badge['lottie_path']];
                })->filter(function($badge) { return $badge['path'] !== null; })->values());
                lotties.forEach((b) => {
                    lottie.loadAnimation({
                        container: document.getElementById(b.id),
                        renderer: "svg",
                        loop: true,
                        autoplay: true,
                        path: b.path,
                    });
                });

                const tabLinks = document.querySelectorAll(".tab-link");
                const tabSections = document.querySelectorAll(".tab-section");
                tabLinks.forEach((link) => {
                    link.addEventListener("click", () => {
                        tabLinks.forEach((l) => {
                            l.classList.remove("active", "font-bold", "text-black");
                            l.classList.add("text-gray-600");
                        });
                        link.classList.add("active", "font-bold", "text-black");
                        link.classList.remove("text-gray-600");

                        tabSections.forEach((s) => s.classList.add("hidden"));
                        document.getElementById(link.dataset.tab).classList.remove("hidden");
                    });
                });

                const filterButtons = document.querySelectorAll(".filter-button");
                const portfolioItems = document.querySelectorAll(".portfolio-card");
                filterButtons.forEach((button) => {
                    button.addEventListener("click", () => {
                        filterButtons.forEach((btn) => btn.classList.remove("active", "bg-black", "text-white", "border-black"));
                        button.classList.add("active", "bg-black", "text-white", "border-black");
                        const category = button.dataset.filter;
                        const year = document.querySelector('[data-filter="year"]').value;
                        portfolioItems.forEach((item) => {
                            const itemCategory = item.dataset.category;
                            const itemYear = item.dataset.year;
                            if ((category === "all" || itemCategory === category) && (year === "all" || itemYear === year)) {
                                item.style.display = "block";
                            } else {
                                item.style.display = "none";
                            }
                        });
                    });
                });

                document.querySelector('[data-filter="year"]').addEventListener("change", (e) => {
                    const year = e.target.value;
                    // Pastikan tombol kategori aktif juga disorot saat tahun berubah
                    const activeCategoryButton = document.querySelector(".filter-button.active:not([data-filter='year'])");
                    const activeCategory = activeCategoryButton ? activeCategoryButton.dataset.filter : "all";
                    
                    portfolioItems.forEach((item) => {
                        const itemCategory = item.dataset.category;
                        const itemYear = item.dataset.year;
                        if ((activeCategory === "all" || itemCategory === activeCategory) && (year === "all" || itemYear === year)) {
                            item.style.display = "block";
                        } else {
                            item.style.display = "none";
                        }
                    });
                });

                const animated = sessionStorage.getItem("badgesAnimated");
                const badgeItems = document.querySelectorAll(".badge-card");
                if (!animated) {
                    badgeItems.forEach((item, idx) => {
                        setTimeout(() => {
                            item.classList.remove("opacity-0");
                            item.classList.add("animate-fadeIn", "appear");
                        }, idx * 150);
                    });
                    sessionStorage.setItem("badgesAnimated", "true");
                } else {
                    badgeItems.forEach((item) => {
                        item.classList.remove("opacity-0");
                        item.classList.add("appear");
                    });
                }

                // Toggle logic untuk badge dan portfolio item
                badgeItems.forEach((item) => {
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

                document.querySelectorAll(".gallery-item").forEach((item) => {
                    item.addEventListener("click", () => {
                        item.classList.toggle("flipped");
                        item.classList.toggle("active");
                    });
                    item.addEventListener("keydown", (e) => {
                        if (e.key === "Enter" || e.key === " ") {
                            e.preventDefault();
                            item.classList.toggle("flipped");
                            item.classList.toggle("active");
                        }
                    });
                });

                // Intersection Observer (for scroll animations)
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add("text-appear", "animate-fadeIn");
                            observer.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.1, rootMargin: "0px" });
                document.querySelectorAll(".animate-slideIn, .text-appear, .animate-fadeIn").forEach((el) => observer.observe(el));
            });
        </script>
    @endpush
</x-layout>