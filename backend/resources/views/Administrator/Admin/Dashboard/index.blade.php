<x-admin-layout>
    <!-- Content -->
    <div class="bg-gray-100 min-h-screen max-w-[99.134%] overflow-x-hidden">
        <div class="bg-white rounded-2xl shadow-lg p-6 relative border-l-4 border-yellow-400 max-w-7xl mx-auto">
            <div class="relative z-10">
                <div class="flex flex-col md:flex-row justify-between items-center mb-6">
                    <div class="flex-1">
                        <h1 class="text-3xl font-bold text-gray-900 flex items-center gap-4">
                            Selamat Datang, <span class="text-yellow-400">Admin TARA</span>! 👋
                            <span class="flex-grow h-px bg-gradient-to-r from-transparent via-gray-900 to-yellow-400"></span>
                        </h1>
                        <p class="text-gray-600 text-lg mt-2 max-w-xl">
                            Senang melihat Anda kembali. Berikut ringkasan aktivitas platform hari ini.
                        </p>
                        <div class="flex flex-wrap gap-4 mt-6">
                            <div class="flex items-center bg-white p-4 rounded-xl rounded-lg shadow-sm border border-yellow-200">
                                <div class="w-10 h-10 flex items-center justify-center bg-yellow-100 rounded-lg text-yellow-400 mr-3">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <div>
                                    <span class="text-lg font-bold text-gray-900">{{ array_sum($visitorData['week']) }}</span>
                                    <span class="block text-sm text-gray-600">Traffic Hari Ini</span>
                                </div>
                            </div>
                            <div class="flex items-center bg-white p-4 rounded-xl shadow-sm border border-yellow-200">
                                <div class="w-10 h-10 flex items-center justify-center bg-yellow-100 rounded-lg text-yellow-400 mr-3">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div>
                                    <span class="text-lg font-bold text-gray-900">{{ $totalActiveUsers }}</span>
                                    <span class="block text-sm text-gray-600">User Aktif</span>
                                </div>
                            </div>
                            <div class="flex items-center bg-white p-4 rounded-xl shadow-sm border border-yellow-200">
                                <div class="w-10 h-10 flex items-center justify-center bg-yellow-100 rounded-lg text-yellow-400 mr-3">
                                    <i class="fas fa-image"></i>
                                </div>
                                <div>
                                    <span class="text-lg font-bold text-gray-900">{{ $totalArtworks }}</span>
                                    <span class="block text-sm text-gray-600">Karya Baru</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end mt-6 md:mt-0">
                        <div class="relative w-32 h-32 bg-gradient-to-br from-gray-900 to-black rounded-2xl border-2 border-gray-700 shadow-2xl p-4">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="w-16 h-16 bg-gradient-to-br from-black to-gray-800 rounded-full border-2 border-yellow-400 flex items-center justify-center text-yellow-400 text-2xl animate-pulse">
                                    <i class="fas fa-palette"></i>
                                </div>
                            </div>
                            <div class="absolute inset-0 animate-spin-slow">
                                <div class="absolute w-6 h-6 bg-yellow-400 rounded-full border-2 border-black top-0 left-1/2 transform -translate-x-1/2"></div>
                                <div class="absolute w-6 h-6 bg-yellow-400 rounded-full border-2 border-black top-1/2 right-0 transform -translate-y-1/2"></div>
                                <div class="absolute w-6 h-6 bg-yellow-400 rounded-full border-2 border-black bottom-0 left-1/2 transform -translate-x-1/2"></div>
                                <div class="absolute w-6 h-6 bg-yellow-400 rounded-full border-2 border-black top-1/2 left-0 transform -translate-y-1/2"></div>
                            </div>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="w-full h-full rounded-full bg-gradient-radial from-yellow-400/20 to-transparent animate-spin"></div>
                            </div>
                            <div class="absolute inset-0">
                                <span class="absolute w-1 h-1 bg-yellow-400 rounded-full top-1/5 left-1/5 animate-twinkle"></span>
                                <span class="absolute w-1 h-1 bg-yellow-400 rounded-full top-1/5 right-1/5 animate-twinkle delay-150"></span>
                                <span class="absolute w-1 h-1 bg-yellow-400 rounded-full bottom-1/5 left-1/5 animate-twinkle delay-300"></span>
                                <span class="absolute w-1 h-1 bg-yellow-400 rounded-full bottom-1/5 right-1/5 animate-twinkle delay-450"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap gap-4 mt-6 pt-6 border-t border-gray-200">
                    <a href="{{ route('admin.galeri.index') }}" class="flex items-center gap-2 px-4 py-2 bg-white border border-gray-200 rounded-lg text-gray-900 font-medium hover:bg-yellow-400 hover:border-yellow-400 hover:shadow-lg transition">
                        <i class="fas fa-plus-circle"></i>
                        <span>Buat Karya</span>
                    </a>
                    <a href="{{ route('admin.reports.index') }}" class="flex items-center gap-2 px-4 py-2 bg-white border border-gray-200 rounded-lg text-gray-900 font-medium hover:bg-yellow-400 hover:border-yellow-400 hover:shadow-lg transition">
                        <i class="fas fa-chart-pie"></i>
                        <span>Lihat Laporan</span>
                    </a>
                    <button class="relative flex items-center gap-2 px-4 py-2 bg-white border border-gray-200 rounded-lg text-gray-900 font-medium hover:bg-yellow-400 hover:border-yellow-400 hover:shadow-lg transition">
                        <i class="fas fa-bell"></i>
                        <span>Notifikasi</span>
                        <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs w-5 h-5 rounded-full flex items-center justify-center">0</span>
                    </button>
                </div>
                <div class="flex justify-between mt-4 pt-4 border-t border-gray-100 text-sm text-gray-600">
                    <div class="flex items-center gap-2 current-date">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Sabtu, 20 September 2025</span>
                    </div>
                    <div class="flex items-center gap-2 last-login">
                        <i class="fas fa-clock"></i>
                        <span>Login terakhir: Hari ini, {{ now()->format('H:i') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- 5 Card Statistik -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6 mb-5 mt-5 max-w-7xl mx-auto">
            <div class="bg-white rounded-lg p-4 flex items-center gap-4 shadow-sm border-l-4 border-yellow-400 hover:shadow-md hover:-translate-y-1 transition stat-card">
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center text-yellow-400">
                    <i class="fas fa-users"></i>
                </div>
                <div>
                    <div class="text-xl font-bold text-gray-900">{{ $totalCommunities }}</div>
                    <div class="text-sm text-gray-600">Total Komunitas</div>
                </div>
            </div>
            <div class="bg-white rounded-lg p-4 flex items-center gap-4 shadow-sm border-l-4 border-yellow-400 hover:shadow-md hover:-translate-y-1 transition stat-card">
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center text-yellow-400">
                    <i class="fas fa-project-diagram"></i>
                </div>
                <div>
                    <div class="text-xl font-bold text-gray-900">{{ $totalProjects }}</div>
                    <div class="text-sm text-gray-600">Total Proyek</div>
                </div>
            </div>
            <div class="bg-white rounded-lg p-4 flex items-center gap-4 shadow-sm border-l-4 border-yellow-400 hover:shadow-md hover:-translate-y-1 transition stat-card">
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center text-yellow-400">
                    <i class="fas fa-images"></i>
                </div>
                <div>
                    <div class="text-xl font-bold text-gray-900">{{ $totalArtworks }}</div>
                    <div class="text-sm text-gray-600">Total Karya</div>
                </div>
            </div>
            <div class="bg-white rounded-lg p-4 flex items-center gap-4 shadow-sm border-l-4 border-yellow-400 hover:shadow-md hover:-translate-y-1 transition stat-card">
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center text-yellow-400">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <div>
                    <div class="text-xl font-bold text-gray-900">{{ $totalEvents }}</div>
                    <div class="text-sm text-gray-600">Total Event</div>
                </div>
            </div>
            <div class="bg-white rounded-lg p-4 flex items-center gap-4 shadow-sm border-l-4 border-yellow-400 hover:shadow-md hover:-translate-y-1 transition stat-card">
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center text-yellow-400">
                    <i class="fas fa-user-check"></i>
                </div>
                <div>
                    <div class="text-xl font-bold text-gray-900">{{ $totalActiveUsers }}</div>
                    <div class="text-sm text-gray-600">Total User Aktif</div>
                </div>
            </div>
        </div>

        <!-- Grafik dan Aktivitas -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8 max-w-7xl mx-auto">
            <div class="bg-white rounded-lg p-6 shadow-sm col-span-2">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Statistik Pengunjung</h3>
                    <select id="chart-period" class="p-2 border rounded-md bg-white text-gray-900">
                        <option value="week">Minggu Ini</option>
                        <option value="month">Bulan Ini</option>
                        <option value="year">Tahun Ini</option>
                    </select>
                </div>
                <div class="h-64">
                    <canvas id="visitorChart"></canvas>
                </div>
            </div>
            <div class="bg-white rounded-lg p-6 shadow-sm">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Distribusi Kategori Karya</h3>
                </div>
                <div class="h-64">
                    <canvas id="categoryChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Grafik Interaksi dan Aktivitas Terbaru -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8 max-w-7xl mx-auto">
            <div class="bg-white rounded-lg p-6 shadow-sm col-span-2">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Tingkat Interaksi</h3>
                    <select id="interaction-period" class="p-2 border rounded-md bg-white text-gray-900">
                        <option value="week">Minggu Ini</option>
                        <option value="month">Bulan Ini</option>
                        <option value="year">Tahun Ini</option>
                    </select>
                </div>
                <div class="h-64">
                    <canvas id="interactionChart"></canvas>
                </div>
            </div>
            <div class="bg-white rounded-lg p-6 shadow-sm">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Aktivitas Terbaru</h3>
                    <a href="{{ route('admin.activity-logs.index') }}" class="text-yellow-400 font-medium">Lihat Semua</a>
                </div>
                <ul class="space-y-4">
                    @foreach ($activities as $activity)
                        <li class="activity-card" data-category="{{ $activity['category'] }}" data-date="{{ $activity['date'] }}" data-likes="{{ $activity['likes'] }}" data-comments="{{ $activity['comments'] }}" data-title="{{ $activity['title'] }}" data-author="{{ $activity['author'] }}">
                            <div class="flex items-start gap-3">
                                <div class="w-10 h-10 rounded-full bg-yellow-100 flex items-center justify-center text-yellow-400">
                                    <i class="fas {{ $activity['type'] == 'communitypost' ? 'fa-comment' : ($activity['type'] == 'event' ? 'fa-calendar-alt' : ($activity['type'] == 'project' ? 'fa-project-diagram' : ($activity['type'] == 'community' ? 'fa-users' : 'fa-image'))) }}"></i>
                                </div>
                                <div>
                                    <h4 class="text-sm font-semibold text-gray-900">{{ Str::limit($activity['description'], 50) }}</h4>
                                    <p class="text-xs text-gray-600">Oleh {{ $activity['author'] }} di {{ $activity['community'] }}</p>
                                    <p class="text-xs text-gray-500">{{ \Carbon\Carbon::createFromTimestamp($activity['date'])->diffForHumans() }}</p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Filtering Kategori Aktivitas -->
        <div class="bg-white rounded-lg p-6 shadow-sm mb-8 max-w-7xl mx-auto">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold text-gray-900">Filtering Kategori Aktivitas</h2>
            </div>
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-6">
                <div class="flex flex-wrap gap-2">
                    <button class="filter-tab active px-4 py-2 bg-gray-200 rounded-full text-gray-900 font-medium hover:bg-yellow-400 transition" data-category="all">Semua</button>
                    <button class="filter-tab px-4 py-2 bg-gray-200 rounded-full text-gray-900 font-medium hover:bg-yellow-400 transition" data-category="communitypost">Postingan</button>
                    <button class="filter-tab px-4 py-2 bg-gray-200 rounded-full text-gray-900 font-medium hover:bg-yellow-400 transition" data-category="event">Event</button>
                    <button class="filter-tab px-4 py-2 bg-gray-200 rounded-full text-gray-900 font-medium hover:bg-yellow-400 transition" data-category="project">Proyek</button>
                    <button class="filter-tab px-4 py-2 bg-gray-200 rounded-full text-gray-900 font-medium hover:bg-yellow-400 transition" data-category="community">Komunitas</button>
                    <button class="filter-tab px-4 py-2 bg-gray-200 rounded-full text-gray-900 font-medium hover:bg-yellow-400 transition" data-category="artwork">Karya</button>
                </div>
                <div class="flex gap-2 w-full md:w-auto">
                    <div class="relative flex-1">
                        <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        <input id="activity-search" type="text" class="pl-10 p-2 border rounded-md bg-white w-full" placeholder="Cari aktivitas...">
                    </div>
                    <button id="search-button" class="px-4 py-2 bg-yellow-400 text-gray-900 rounded-md font-medium hover:bg-yellow-300 transition">
                        <i class="fas fa-search"></i> Cari
                    </button>
                    <button id="reset-filters" class="px-4 py-2 border border-gray-200 rounded-md text-gray-600 hover:bg-gray-100 transition">
                        <i class="fas fa-sync-alt"></i> Reset
                    </button>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6" id="activities-container">
                @foreach ($activities as $activity)
                    <div class="activity-card bg-white rounded-lg border border-gray-200 shadow-sm hover:shadow-md transition" data-category="{{ $activity['category'] }}" data-date="{{ $activity['date'] }}" data-likes="{{ $activity['likes'] }}" data-comments="{{ $activity['comments'] }}" data-title="{{ $activity['title'] }}" data-author="{{ $activity['author'] }}">
                        <div class="relative">
                            <div class="w-full h-32 bg-gray-100"></div>
                            <div class="w-12 h-12 rounded-full bg-yellow-100 flex items-center justify-center text-yellow-400 text-sm relative z-10 ml-4 -mt-6">
                                <i class="fas {{ $activity['type'] == 'communitypost' ? 'fa-comment' : ($activity['type'] == 'event' ? 'fa-calendar-alt' : ($activity['type'] == 'project' ? 'fa-project-diagram' : ($activity['type'] == 'community' ? 'fa-users' : 'fa-image'))) }}"></i>
                            </div>
                        </div>
                        <div class="p-3">
                            <h4 class="text-sm font-semibold text-gray-900 font-['Space_Grotesk']">{{ Str::limit($activity['description'], 50) }}</h4>
                            <p class="text-xs text-gray-800 mb-2">Oleh {{ $activity['author'] }} di {{ $activity['community'] }}</p>
                            <div class="flex justify-between items-center mb-2">
                                <div class="flex items-center text-xs text-gray-800">
                                    <i class="fas fa-clock mr-1"></i>
                                    <span>{{ \Carbon\Carbon::createFromTimestamp($activity['date'])->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center mb-4">
                <button id="load-more-activities" class="px-6 py-3 border-2 border-yellow-400 text-yellow-400 rounded-md font-medium hover:bg-yellow-400 hover:text-gray-900 transition">
                    <i class="fas fa-plus"></i> Muat Lebih Banyak Aktivitas
                </button>
            </div>
            <div class="flex justify-between items-center bg-gray-100 p-4 rounded-md">
                <div class="text-gray-600">
                    Menampilkan <span id="results-number">{{ $activities->count() }}</span> dari <span id="total-results">{{ $activities->count() }}</span> aktivitas
                </div>
                <div class="flex items-center gap-2">
                    <label for="sort-by" class="text-gray-600">Urutkan:</label>
                    <select id="sort-by" class="p-2 border rounded-md bg-white text-gray-900">
                        <option value="newest">Terbaru</option>
                        <option value="oldest">Terlama</option>
                        <option value="popular">Terpopuler</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Proyek Terbaru -->
        <div class="bg-white rounded-lg p-6 shadow-sm mb-8 max-w-7xl mx-auto">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold text-gray-900">Proyek Kolaborasi Terbaru</h2>
                <a href="{{ route('admin.projects.index') }}" class="flex items-center gap-2 px-4 py-2 bg-yellow-400 text-gray-900 rounded-lg font-medium hover:bg-yellow-300 transition">
                    <i class="fas fa-plus"></i> Proyek Baru
                </a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @forelse ($recentProjects as $project)
                    <div class="bg-white rounded-lg border border-gray-200 overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                        <div class="relative">
                            <img src="{{ $project->cover_images ? asset('storage/' . $project->cover_images) : 'https://picsum.photos/id/' . ($project->id + 99) . '/400/120' }}" alt="Cover {{ $project->project_name }}" class="w-full h-32 object-cover">
                            <div class="w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center text-gray-400 text-sm relative z-10 ml-4 -mt-6">
                                <i class="{{ $project->category ? 'fas fa-' . ($project->category->name == 'Fotografi' ? 'camera' : ($project->category->name == 'Digital Art' ? 'paint-brush' : ($project->category->name == 'Lukisan' ? 'palette' : 'cube'))) : 'fas fa-project-diagram' }}"></i>
                            </div>
                        </div>
                        <div class="p-3">
                            <h3 class="font-semibold text-gray-900 mb-1 text-sm font-['Space_Grotesk']">{{ Str::limit($project->project_name, 30) }}</h3>
                            <p class="text-xs text-gray-800 mb-2">{{ $project->description ? Str::limit($project->description, 50) : 'Tidak ada deskripsi' }}</p>
                            <div class="flex justify-between items-center mb-2">
                                <div class="flex items-center text-xs text-gray-800">
                                    <i class="fas fa-user mr-1"></i>
                                    <span>{{ $project->creator ? $project->creator->name : 'Unknown' }}</span>
                                </div>
                                <span class="px-2 py-1 rounded-full {{ $project->status == 'ongoing' ? 'bg-green-100 text-green-600' : ($project->status == 'pending' ? 'bg-yellow-100 text-yellow-600' : 'bg-blue-100 text-blue-600') }} text-xs">{{ $project->status == 'ongoing' ? 'Berlangsung' : ($project->status == 'pending' ? 'Menunggu' : 'Selesai') }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-xs text-gray-800">{{ $project->category ? $project->category->name : '-' }}</span>
                                <div class="flex gap-2">
                                    <a href="{{ route('admin.projects.show', $project->id) }}" class="w-8 h-8 rounded-lg bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-xs" aria-label="Lihat {{ $project->project_name }}"><i class="fas fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center p-10 text-gray-600">
                        <i class="fas fa-project-diagram text-6xl mb-4"></i>
                        <h3 class="text-xl font-semibold">Tidak ada proyek terbaru</h3>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Distribusi Event dan Karya Populer -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8 max-w-7xl mx-auto">
            <div class="bg-white rounded-lg p-6 shadow-sm">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-semibold text-gray-900">Distribusi Event</h2>
                    <select id="event-period" class="p-2 border rounded-md bg-white text-gray-900">
                        <option value="month">Bulanan</option>
                        <option value="quarter">Triwulan</option>
                        <option value="year">Tahunan</option>
                    </select>
                </div>
                <div class="h-64">
                    <canvas id="eventChart"></canvas>
                </div>
            </div>
            <div class="bg-white rounded-lg p-6 shadow-sm">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-semibold text-gray-900">Karya Populer</h2>
                    <a href="{{ route('admin.galeri.index') }}" class="flex items-center gap-2 px-4 py-2 bg-yellow-400 text-gray-900 rounded-lg font-medium hover:bg-yellow-300 transition">
                        <i class="fas fa-chart-line"></i> Lihat Analitik
                    </a>
                </div>
                <div class="space-y-4">
                    @forelse ($popularArtworks as $artwork)
                        <div class="flex items-center gap-3">
                            <img src="{{ $artwork->thumbnail ? asset('storage/' . $artwork->thumbnail) : 'https://picsum.photos/id/' . ($artwork->id + 100) . '/80/80' }}" alt="{{ $artwork->title }}" class="w-16 h-16 rounded-lg object-cover">
                            <div>
                                <h4 class="text-sm font-semibold text-gray-900">{{ Str::limit($artwork->title, 30) }}</h4>
                                <p class="text-xs text-gray-600">Oleh {{ $artwork->creator->name ?? 'Unknown' }} | {{ $artwork->category->name ?? 'N/A' }}</p>
                                <p class="text-xs text-gray-500">{{ $artwork->created_at->diffForHumans() }} | {{ $artwork->likes_count }} Likes</p>
                            </div>
                        </div>
                    @empty
                        <div class="text-center p-10 text-gray-600">
                            <i class="fas fa-image text-6xl mb-4"></i>
                            <h3 class="text-xl font-semibold">Tidak ada karya populer</h3>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Postingan Terbaru di Galeri -->
        <div class="bg-white rounded-lg p-6 shadow-sm mb-8 max-w-7xl mx-auto">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold text-gray-900">Postingan Terbaru di Galeri</h2>
                <a href="{{ route('admin.galeri.index') }}" class="flex items-center gap-2 px-4 py-2 bg-yellow-400 text-gray-900 rounded-lg font-medium hover:bg-yellow-300 transition">
                    <i class="fas fa-eye"></i> Lihat Semua
                </a>
            </div>
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-6">
                <div class="flex flex-wrap gap-2">
                    <button class="gallery-filter-tab active px-4 py-2 bg-gray-200 rounded-full text-gray-900 font-medium hover:bg-yellow-400 transition" data-category="all">Semua Kategori</button>
                    @foreach ($categories as $category)
                        <button class="gallery-filter-tab px-4 py-2 bg-gray-200 rounded-full text-gray-900 font-medium hover:bg-yellow-400 transition" data-category="{{ $category->name }}">{{ $category->name }}</button>
                    @endforeach
                </div>
                <div class="flex gap-2 w-full md:w-auto">
                    <input id="gallery-search" type="text" class="p-2 border rounded-l-md bg-white flex-1" placeholder="Cari postingan...">
                    <button class="p-2 bg-yellow-400 text-gray-900 rounded-r-md hover:bg-yellow-300 transition">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6" id="gallery-container">
                @forelse ($recentArtworks as $artwork)
                    <div class="gallery-item bg-white rounded-lg border border-gray-200 shadow-sm hover:shadow-md transition" data-category="{{ $artwork->category->name ?? 'all' }}" data-title="{{ $artwork->title }}" data-author="{{ $artwork->creator->name ?? 'Unknown' }}">
                        <div class="relative">
                            <img src="{{ $artwork->thumbnail ? asset('storage/' . $artwork->thumbnail) : 'https://picsum.photos/id/' . ($artwork->id + 100) . '/400/120' }}" alt="{{ $artwork->title }}" class="w-full h-32 object-cover">
                            <div class="w-12 h-12 rounded-full bg-yellow-100 flex items-center justify-center text-yellow-400 text-sm relative z-10 ml-4 -mt-6">
                                <i class="fas {{ $artwork->category ? ($artwork->category->name == 'Fotografi' ? 'fa-camera' : ($artwork->category->name == 'Digital Art' ? 'fa-paint-brush' : ($artwork->category->name == 'Lukisan' ? 'fa-palette' : 'fa-cube'))) : 'fa-image' }}"></i>
                            </div>
                        </div>
                        <div class="p-3">
                            <h4 class="text-sm font-semibold text-gray-900 font-['Space_Grotesk']">{{ Str::limit($artwork->title, 30) }}</h4>
                            <p class="text-xs text-gray-800 mb-2">Oleh {{ $artwork->creator->name ?? 'Unknown' }}</p>
                            <div class="flex justify-between items-center mb-2">
                                <div class="flex items-center text-xs text-gray-800">
                                    <i class="fas fa-clock mr-1"></i>
                                    <span>{{ $artwork->created_at->diffForHumans() }}</span>
                                </div>
                                <span class="px-2 py-1 rounded-full bg-blue-100 text-blue-600 text-xs">{{ $artwork->category->name ?? 'N/A' }}</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center p-10 text-gray-600">
                        <i class="fas fa-image text-6xl mb-4"></i>
                        <h3 class="text-xl font-semibold">Tidak ada karya terbaru</h3>
                    </div>
                @endforelse
            </div>
            <div class="text-center">
                <button id="load-more" class="px-6 py-3 border-2 border-yellow-400 text-yellow-400 rounded-md font-medium hover:bg-yellow-400 hover:text-gray-900 transition">
                    <i class="fas fa-plus"></i> Muat Lebih Banyak
                </button>
            </div>
        </div>

        <!-- Event Baru -->
        <div class="bg-white rounded-lg p-6 shadow-sm mb-8 max-w-7xl mx-auto">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold text-gray-900">Event Baru</h2>
                <a href="{{ route('admin.events.index') }}" class="flex items-center gap-2 px-4 py-2 bg-yellow-400 text-gray-900 rounded-lg font-medium hover:bg-yellow-300 transition">
                    <i class="fas fa-plus"></i> Buat Event
                </a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @forelse ($newEvents as $event)
                    <div class="bg-white rounded-lg border border-gray-200 shadow-sm hover:shadow-md transition">
                        <div class="relative">
                            <img src="{{ $event->image_path ? asset('storage/' . $event->image_path) : 'https://picsum.photos/id/' . ($event->id + 100) . '/400/120' }}" alt="{{ $event->title }}" class="w-full h-32 object-cover">
                            <div class="w-12 h-12 rounded-full bg-yellow-100 flex items-center justify-center text-yellow-400 text-sm relative z-10 ml-4 -mt-6">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                        </div>
                        <div class="p-3">
                            <h4 class="text-sm font-semibold text-gray-900 font-['Space_Grotesk']">{{ Str::limit($event->title, 30) }}</h4>
                            <p class="text-xs text-gray-800 mb-2">{{ $event->description ? Str::limit($event->description, 50) : 'Tidak ada deskripsi' }}</p>
                            <div class="flex justify-between items-center mb-2">
                                <div class="flex items-center text-xs text-gray-800">
                                    <i class="fas fa-clock mr-1"></i>
                                    <span>{{ $event->start_date->format('d M Y') }}</span>
                                </div>
                                <span class="px-2 py-1 rounded-full {{ $event->status == 'active' ? 'bg-green-100 text-green-600' : 'bg-yellow-100 text-yellow-600' }} text-xs">{{ $event->status == 'active' ? 'Aktif' : 'Pending' }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-xs text-gray-800">{{ $event->category->name ?? 'N/A' }}</span>
                                <div class="flex gap-2">
                                    <a href="{{ route('admin.events.show', $event->id) }}" class="w-8 h-8 rounded-lg bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-xs" aria-label="Lihat {{ $event->title }}"><i class="fas fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center p-10 text-gray-600">
                        <i class="fas fa-calendar-alt text-6xl mb-4"></i>
                        <h3 class="text-xl font-semibold">Tidak ada event baru</h3>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Grafik Pertumbuhan Anggota Komunitas -->
        <div class="bg-white rounded-lg p-6 shadow-sm mb-8 max-w-7xl mx-auto">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold text-gray-900">Pertumbuhan Anggota Komunitas</h2>
                <select id="growth-period" class="p-2 border rounded-md bg-white text-gray-900">
                    <option value="month">Bulanan</option>
                    <option value="quarter">Triwulan</option>
                    <option value="year">Tahunan</option>
                </select>
            </div>
            <div class="h-64">
                <canvas id="growthChart"></canvas>
            </div>
        </div>

        <!-- Widget Analitik -->
        <div class="bg-white rounded-lg p-6 shadow-sm mb-8 max-w-7xl mx-auto">
            <h2 class="text-xl font-semibold text-gray-900 mb-4">Widget Analitik</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white rounded-lg p-4 shadow-sm border-l-4 border-yellow-400 hover:shadow-md hover:-translate-y-1 transition">
                    <div class="flex justify-between items-center mb-3">
                        <h3 class="text-base font-semibold text-gray-900">Traffic Pengunjung</h3>
                        <i class="fas fa-chart-line text-yellow-400 text-xl"></i>
                    </div>
                    <div class="text-2xl font-bold text-gray-900">{{ array_sum($visitorData['month']) }}</div>
                    <div class="text-green-600 text-sm flex items-center gap-1">
                        <i class="fas fa-arrow-up"></i> 0%
                    </div>
                    <div class="text-sm text-gray-600">dari bulan lalu</div>
                </div>
                <div class="bg-white rounded-lg p-4 shadow-sm border-l-4 border-yellow-400 hover:shadow-md hover:-translate-y-1 transition">
                    <div class="flex justify-between items-center mb-3">
                        <h3 class="text-base font-semibold text-gray-900">Engagement Rate</h3>
                        <i class="fas fa-users text-yellow-400 text-xl"></i>
                    </div>
                    <div class="text-2xl font-bold text-gray-900">{{ array_sum($interactionData['month']['likes']) + array_sum($interactionData['month']['comments']) }}</div>
                    <div class="text-green-600 text-sm flex items-center gap-1">
                        <i class="fas fa-arrow-up"></i> 0%
                    </div>
                    <div class="text-sm text-gray-600">dari bulan lalu</div>
                </div>
                <div class="bg-white rounded-lg p-4 shadow-sm border-l-4 border-yellow-400 hover:shadow-md hover:-translate-y-1 transition">
                    <div class="flex justify-between items-center mb-3">
                        <h3 class="text-base font-semibold text-gray-900">Postingan Baru</h3>
                        <i class="fas fa-image text-yellow-400 text-xl"></i>
                    </div>
                    <div class="text-2xl font-bold text-gray-900">{{ $totalArtworks }}</div>
                    <div class="text-green-600 text-sm flex items-center gap-1">
                        <i class="fas fa-arrow-up"></i> 0%
                    </div>
                    <div class="text-sm text-gray-600">dari bulan lalu</div>
                </div>
                <div class="bg-white rounded-lg p-4 shadow-sm border-l-4 border-yellow-400 hover:shadow-md hover:-translate-y-1 transition">
                    <div class="flex justify-between items-center mb-3">
                        <h3 class="text-base font-semibold text-gray-900">Event Aktif</h3>
                        <i class="fas fa-calendar-alt text-yellow-400 text-xl"></i>
                    </div>
                    <div class="text-2xl font-bold text-gray-900">{{ $totalEvents }}</div>
                    <div class="text-green-600 text-sm flex items-center gap-1">
                        <i class="fas fa-arrow-up"></i> 0%
                    </div>
                    <div class="text-sm text-gray-600">dari bulan lalu</div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-lg p-6 shadow-sm max-w-7xl mx-auto">
            <h2 class="text-xl font-semibold text-gray-900 mb-4">Aksi Cepat</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <a href="{{ route('admin.galeri.index') }}" class="flex flex-col items-center justify-center p-6 bg-white rounded-lg shadow-sm hover:bg-yellow-400 hover:text-gray-900 transition">
                    <div class="text-3xl mb-3 text-yellow-400"><i class="fas fa-plus-circle"></i></div>
                    <div class="font-medium">Tambah Karya</div>
                </a>
                <a href="{{ route('admin.communities.index') }}" class="flex flex-col items-center justify-center p-6 bg-white rounded-lg shadow-sm hover:bg-yellow-400 hover:text-gray-900 transition">
                    <div class="text-3xl mb-3 text-yellow-400"><i class="fas fa-users"></i></div>
                    <div class="font-medium">Kelola Komunitas</div>
                </a>
                <a href="{{ route('admin.events.index') }}" class="flex flex-col items-center justify-center p-6 bg-white rounded-lg shadow-sm hover:bg-yellow-400 hover:text-gray-900 transition">
                    <div class="text-3xl mb-3 text-yellow-400"><i class="fas fa-calendar-alt"></i></div>
                    <div class="font-medium">Buat Event</div>
                </a>
                <a href="{{ route('admin.reports.index') }}" class="flex flex-col items-center justify-center p-6 bg-white rounded-lg shadow-sm hover:bg-yellow-400 hover:text-gray-900 transition">
                    <div class="text-3xl mb-3 text-yellow-400"><i class="fas fa-chart-pie"></i></div>
                    <div class="font-medium">Lihat Laporan</div>
                </a>
            </div>
        </div>

        @push('styles')
            <style>
                @keyframes spin-slow { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
                @keyframes twinkle { 0%, 100% { opacity: 0.3; transform: scale(1); } 50% { opacity: 1; transform: scale(1.5); } }
                .animate-spin-slow { animation: spin-slow 20s linear infinite; }
                .animate-twinkle { animation: twinkle 3s infinite alternate; }
                .delay-150 { animation-delay: 0.5s; }
                .delay-300 { animation-delay: 1s; }
                .delay-450 { animation-delay: 1.5s; }
                html, body { overflow-x: hidden; }
                .gallery-item, .activity-card { transition: all 0.3s ease; }
            </style>
        @endpush

        @push('scripts')
            <script>
                // Visitor Chart
                const visitorData = @json($visitorData);
                const ctx = document.getElementById('visitorChart').getContext('2d');
                let visitorChart;

                function updateVisitorChart(period) {
                    let labels, data;
                    if (period === 'week') {
                        labels = ['Ming', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'];
                        data = Array(7).fill(0);
                        Object.keys(visitorData.week).forEach(day => {
                            data[parseInt(day) % 7] = visitorData.week[day];
                        });
                    } else if (period === 'month') {
                        labels = ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4'];
                        data = Object.values(visitorData.month);
                    } else {
                        labels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
                        data = Array(12).fill(0);
                        Object.keys(visitorData.year).forEach((month, index) => {
                            data[index] = visitorData.year[month];
                        });
                    }
                    if (visitorChart) visitorChart.destroy();
                    visitorChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Jumlah Pengunjung',
                                data: data,
                                backgroundColor: 'rgba(255, 215, 0, 0.1)',
                                borderColor: '#ffd700',
                                borderWidth: 2,
                                tension: 0.4,
                                fill: true,
                                pointBackgroundColor: '#ffd700',
                                pointRadius: 4,
                                pointHoverRadius: 6
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: { display: false },
                                tooltip: {
                                    backgroundColor: 'rgba(0, 0, 0, 0.7)',
                                    titleFont: { family: '"Space Grotesk", sans-serif' },
                                    bodyFont: { family: '"Space Grotesk", sans-serif' }
                                }
                            },
                            scales: {
                                y: { beginAtZero: true, grid: { color: 'rgba(0, 0, 0, 0.05)' } },
                                x: { grid: { display: false } }
                            }
                        }
                    });
                }

                // Category Chart (Pie)
                const categoryCtx = document.getElementById('categoryChart').getContext('2d');
                let categoryChart;

                function updateCategoryChart() {
                    if (categoryChart) categoryChart.destroy();
                    categoryChart = new Chart(categoryCtx, {
                        type: 'pie',
                        data: {
                            labels: @json($categoryNames),
                            datasets: [{
                                data: @json($categoryCounts),
                                backgroundColor: ['#ffd700', '#ffeb3b', '#fbc02d', '#f57f17', '#ff9800', '#ff5722'],
                                borderColor: '#fff',
                                borderWidth: 2
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: { position: 'bottom', labels: { font: { family: '"Space Grotesk", sans-serif' } } },
                                tooltip: { backgroundColor: 'rgba(0, 0, 0, 0.7)' }
                            }
                        }
                    });
                }

                // Interaction Chart (Bar)
                const interactionData = @json($interactionData);
                const interactionCtx = document.getElementById('interactionChart').getContext('2d');
                let interactionChart;

                function updateInteractionChart(period) {
                    let labels = ['Karya', 'Blog', 'Proyek'];
                    let likesData = interactionData[period].likes;
                    let commentsData = interactionData[period].comments;
                    if (interactionChart) interactionChart.destroy();
                    interactionChart = new Chart(interactionCtx, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [
                                {
                                    label: 'Suka',
                                    data: likesData,
                                    backgroundColor: 'rgba(255, 215, 0, 0.5)',
                                    borderColor: '#ffd700',
                                    borderWidth: 2
                                },
                                {
                                    label: 'Komentar',
                                    data: commentsData,
                                    backgroundColor: 'rgba(100, 100, 100, 0.5)',
                                    borderColor: '#666',
                                    borderWidth: 2
                                }
                            ]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: { position: 'top', labels: { font: { family: '"Space Grotesk", sans-serif' } } },
                                tooltip: { backgroundColor: 'rgba(0, 0, 0, 0.7)' }
                            },
                            scales: {
                                y: { beginAtZero: true, grid: { color: 'rgba(0, 0, 0, 0.05)' } },
                                x: { grid: { display: false } }
                            }
                        }
                    });
                }

                // Event Chart (Doughnut)
                const eventData = @json($eventData);
                const eventCtx = document.getElementById('eventChart').getContext('2d');
                let eventChart;

                function updateEventChart(period) {
                    let labels = Object.keys(eventData[period]);
                    let data = Object.values(eventData[period]);
                    if (eventChart) eventChart.destroy();
                    eventChart = new Chart(eventCtx, {
                        type: 'doughnut',
                        data: {
                            labels: labels,
                            datasets: [{
                                data: data,
                                backgroundColor: ['#ffd700', '#ffeb3b', '#fbc02d', '#f57f17', '#ff9800', '#ff5722'],
                                borderColor: '#fff',
                                borderWidth: 2
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: { position: 'bottom', labels: { font: { family: '"Space Grotesk", sans-serif' } } },
                                tooltip: { backgroundColor: 'rgba(0, 0, 0, 0.7)' }
                            }
                        }
                    });
                }

                // Growth Chart
                const growthData = @json($growthData);
                const growthCtx = document.getElementById('growthChart').getContext('2d');
                let growthChart;

                function updateGrowthChart(period) {
                    let labels = Object.keys(growthData[period]);
                    let data = Object.values(growthData[period]);
                    if (growthChart) growthChart.destroy();
                    growthChart = new Chart(growthCtx, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Jumlah Anggota',
                                data: data,
                                backgroundColor: 'rgba(255, 215, 0, 0.5)',
                                borderColor: '#ffd700',
                                borderWidth: 2,
                                borderRadius: 5,
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: { legend: { display: false } },
                            scales: {
                                y: { beginAtZero: true, grid: { color: 'rgba(0, 0, 0, 0.05)' } },
                                x: { grid: { display: false } }
                            }
                        }
                    });
                }

                // Initialize on page load
                document.addEventListener('DOMContentLoaded', function() {
                    updateVisitorChart('week');
                    document.getElementById('chart-period').addEventListener('change', function() { updateVisitorChart(this.value); });
                    updateCategoryChart();
                    updateInteractionChart('week');
                    document.getElementById('interaction-period').addEventListener('change', function() { updateInteractionChart(this.value); });
                    updateEventChart('month');
                    document.getElementById('event-period').addEventListener('change', function() { updateEventChart(this.value); });
                    updateGrowthChart('month');
                    document.getElementById('growth-period').addEventListener('change', function() { updateGrowthChart(this.value); });

                    // Toggle sidebar
                    const menuToggle = document.querySelector('.menu-toggle');
                    if (menuToggle) {
                        menuToggle.addEventListener('click', function() {
                            document.querySelector('.sidebar').classList.toggle('active');
                        });
                    }

                    // Active nav
                    const navItems = document.querySelectorAll('.nav-item');
                    navItems.forEach(item => {
                        item.addEventListener('click', function() {
                            navItems.forEach(i => i.classList.remove('active'));
                            this.classList.add('active');
                        });
                    });

                    // Stat hover
                    const statCards = document.querySelectorAll('.stat-card');
                    statCards.forEach(card => {
                        card.addEventListener('mouseenter', function() { this.style.transform = 'translateY(-5px)'; });
                        card.addEventListener('mouseleave', function() { this.style.transform = 'translateY(0)'; });
                    });

                    // Activity filter tabs
                    const filterTabs = document.querySelectorAll('.filter-tab');
                    const activitySearchInput = document.getElementById('activity-search');
                    const searchButton = document.getElementById('search-button');
                    const resetButton = document.getElementById('reset-filters');
                    const sortSelect = document.getElementById('sort-by');
                    const resultsNumber = document.getElementById('results-number');
                    const totalResults = document.getElementById('total-results');
                    const activitiesContainer = document.getElementById('activities-container');
                    const loadMoreBtn = document.getElementById('load-more-activities');
                    let visibleActivities = 8;

                    function filterAndSortActivities() {
                        const activeCategory = document.querySelector('.filter-tab.active').getAttribute('data-category');
                        const searchTerm = activitySearchInput.value.toLowerCase();
                        const sortBy = sortSelect.value;
                        const allActivities = Array.from(document.querySelectorAll('.activity-card'));

                        let filteredActivities = allActivities.filter(card => {
                            const category = card.getAttribute('data-category') || 'all';
                            const title = card.getAttribute('data-title').toLowerCase();
                            const author = card.getAttribute('data-author').toLowerCase();
                            const matchesCategory = activeCategory === 'all' || category === activeCategory;
                            const matchesSearch = searchTerm === '' || title.includes(searchTerm) || author.includes(searchTerm);
                            return matchesCategory && matchesSearch;
                        });

                        filteredActivities = sortActivities(filteredActivities, sortBy);
                        totalResults.textContent = filteredActivities.length;

                        let visibleCount = 0;
                        allActivities.forEach(card => card.style.display = 'none');

                        filteredActivities.slice(0, visibleActivities).forEach(card => {
                            card.style.display = 'block';
                            visibleCount++;
                        });

                        resultsNumber.textContent = visibleCount;
                        loadMoreBtn.style.display = filteredActivities.length > visibleActivities ? 'block' : 'none';
                        showNoResultsMessage(filteredActivities.length === 0);
                    }

                    function sortActivities(activities, sortBy) {
                        return activities.sort((a, b) => {
                            switch (sortBy) {
                                case 'newest':
                                    return parseInt(b.getAttribute('data-date') || 0) - parseInt(a.getAttribute('data-date') || 0);
                                case 'oldest':
                                    return parseInt(a.getAttribute('data-date') || 0) - parseInt(b.getAttribute('data-date') || 0);
                                case 'popular':
                                    const aPopularity = parseInt(a.getAttribute('data-likes') || 0) + parseInt(a.getAttribute('data-comments') || 0);
                                    const bPopularity = parseInt(b.getAttribute('data-likes') || 0) + parseInt(b.getAttribute('data-comments') || 0);
                                    return bPopularity - aPopularity;
                                default:
                                    return 0;
                            }
                        });
                    }

                    function showNoResultsMessage(show) {
                        let noResults = activitiesContainer.querySelector('.no-results');
                        if (show && !noResults) {
                            noResults = document.createElement('div');
                            noResults.className = 'no-results';
                            noResults.innerHTML = `
                                <div class="text-center p-10 text-gray-600 col-span-full">
                                    <i class="fas fa-search text-6xl mb-4"></i>
                                    <h3 class="text-xl font-semibold">Tidak ada aktivitas ditemukan</h3>
                                    <p>Coba gunakan kata kunci lain atau pilih kategori yang berbeda</p>
                                </div>
                            `;
                            activitiesContainer.appendChild(noResults);
                        } else if (!show && noResults) {
                            noResults.remove();
                        }
                    }

                    filterTabs.forEach(tab => {
                        tab.addEventListener('click', function() {
                            filterTabs.forEach(t => t.classList.remove('active'));
                            this.classList.add('active');
                            filterAndSortActivities();
                        });
                    });

                    activitySearchInput.addEventListener('input', filterAndSortActivities);
                    searchButton.addEventListener('click', filterAndSortActivities);
                    sortSelect.addEventListener('change', filterAndSortActivities);

                    resetButton.addEventListener('click', function() {
                        filterTabs.forEach(tab => tab.classList.remove('active'));
                        document.querySelector('.filter-tab[data-category="all"]').classList.add('active');
                        activitySearchInput.value = '';
                        sortSelect.value = 'newest';
                        visibleActivities = 8;
                        filterAndSortActivities();
                    });

                    loadMoreBtn.addEventListener('click', function() {
                        visibleActivities += 8;
                        filterAndSortActivities();
                        setTimeout(() => {
                            const newItems = Array.from(activitiesContainer.querySelectorAll('.activity-card[style="display: block"]')).slice(-4);
                            if (newItems.length > 0) {
                                newItems[0].scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                            }
                        }, 100);
                    });

                    // Gallery filter tabs
                    const galleryFilterTabs = document.querySelectorAll('.gallery-filter-tab');
                    const gallerySearchInput = document.getElementById('gallery-search');
                    const galleryContainer = document.getElementById('gallery-container');
                    const loadMoreButton = document.getElementById('load-more');
                    let visibleGalleryItems = 6;

                    function filterGallery(category, searchTerm) {
                        const allItems = Array.from(document.querySelectorAll('.gallery-item'));
                        let visibleCount = 0;
                        allItems.forEach(item => item.style.display = 'none');

                        const matchingItems = allItems.filter(item => {
                            const itemCategory = item.getAttribute('data-category') || 'all';
                            const itemTitle = item.getAttribute('data-title')?.toLowerCase() || '';
                            const itemAuthor = item.getAttribute('data-author')?.toLowerCase() || '';
                            const matchesCategory = category === 'all' || itemCategory === category;
                            const matchesSearch = searchTerm === '' || itemTitle.includes(searchTerm) || itemAuthor.includes(searchTerm);
                            return matchesCategory && matchesSearch;
                        });

                        matchingItems.slice(0, visibleGalleryItems).forEach(item => {
                            item.style.display = 'block';
                            visibleCount++;
                        });

                        loadMoreButton.style.display = matchingItems.length > visibleGalleryItems ? 'block' : 'none';
                        showNoGalleryResults(matchingItems.length === 0);
                    }

                    function showNoGalleryResults(show) {
                        let noResults = galleryContainer.querySelector('.no-results');
                        if (show && !noResults) {
                            noResults = document.createElement('div');
                            noResults.className = 'no-results';
                            noResults.innerHTML = `
                                <div class="text-center p-10 text-gray-600 col-span-full">
                                    <i class="fas fa-search text-6xl mb-4"></i>
                                    <h3 class="text-xl font-semibold">Tidak ada hasil ditemukan</h3>
                                    <p>Coba gunakan kata kunci lain atau filter yang berbeda</p>
                                </div>
                            `;
                            galleryContainer.appendChild(noResults);
                        } else if (!show && noResults) {
                            noResults.remove();
                        }
                    }

                    galleryFilterTabs.forEach(tab => {
                        tab.addEventListener('click', function() {
                            galleryFilterTabs.forEach(t => t.classList.remove('active'));
                            this.classList.add('active');
                            const category = this.getAttribute('data-category');
                            const searchTerm = gallerySearchInput.value.toLowerCase();
                            filterGallery(category, searchTerm);
                        });
                    });

                    gallerySearchInput.addEventListener('input', function() {
                        const activeCategory = document.querySelector('.gallery-filter-tab.active').getAttribute('data-category');
                        const searchTerm = this.value.toLowerCase();
                        filterGallery(activeCategory, searchTerm);
                    });

                    loadMoreButton.addEventListener('click', function() {
                        visibleGalleryItems += 3;
                        const activeCategory = document.querySelector('.gallery-filter-tab.active').getAttribute('data-category');
                        const searchTerm = gallerySearchInput.value.toLowerCase();
                        filterGallery(activeCategory, searchTerm);
                        const lastVisibleItem = document.querySelector('.gallery-item[style="display: block"]:last-child');
                        if (lastVisibleItem) {
                            lastVisibleItem.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                        }
                    });

                    // Update date and time
                    const updateDate = () => {
                        const now = new Date();
                        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                        const dateString = now.toLocaleDateString('id-ID', options);
                        document.querySelector('.current-date span').textContent = dateString;
                        const timeString = now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });
                        document.querySelector('.last-login span').textContent = `Login terakhir: Hari ini, ${timeString}`;
                    };
                    updateDate();
                    setInterval(updateDate, 60000);
                });
            </script>
        @endpush
    </div>
</x-admin-layout>