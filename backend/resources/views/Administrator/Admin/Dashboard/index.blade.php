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
                            <div class="flex items-center bg-white p-4 rounded-xl shadow-sm border border-yellow-200">
                                <div class="w-10 h-10 flex items-center justify-center bg-yellow-100 rounded-lg text-yellow-400 mr-3">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <div>
                                    <span class="text-lg font-bold text-gray-900">0%</span>
                                    <span class="block text-sm text-gray-600">Traffic Hari Ini</span>
                                </div>
                            </div>
                            <div class="flex items-center bg-white p-4 rounded-xl shadow-sm border border-yellow-200">
                                <div class="w-10 h-10 flex items-center justify-center bg-yellow-100 rounded-lg text-yellow-400 mr-3">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div>
                                    <span class="text-lg font-bold text-gray-900">0</span>
                                    <span class="block text-sm text-gray-600">User Baru</span>
                                </div>
                            </div>
                            <div class="flex items-center bg-white p-4 rounded-xl shadow-sm border border-yellow-200">
                                <div class="w-10 h-10 flex items-center justify-center bg-yellow-100 rounded-lg text-yellow-400 mr-3">
                                    <i class="fas fa-image"></i>
                                </div>
                                <div>
                                    <span class="text-lg font-bold text-gray-900">0</span>
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
                    <button class="flex items-center gap-2 px-4 py-2 bg-white border border-gray-200 rounded-lg text-gray-900 font-medium hover:bg-yellow-400 hover:border-yellow-400 hover:shadow-lg transition">
                        <i class="fas fa-plus-circle"></i>
                        <span>Buat Konten</span>
                    </button>
                    <button class="flex items-center gap-2 px-4 py-2 bg-white border border-gray-200 rounded-lg text-gray-900 font-medium hover:bg-yellow-400 hover:border-yellow-400 hover:shadow-lg transition">
                        <i class="fas fa-chart-pie"></i>
                        <span>Lihat Laporan</span>
                    </button>
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
                        <span>Login terakhir: Hari ini, 11:01</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- 5 Card Statistik -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6 mb-8 max-w-7xl mx-auto">
            <div class="bg-white rounded-lg p-4 flex items-center gap-4 shadow-sm border-l-4 border-yellow-400 hover:shadow-md hover:-translate-y-1 transition stat-card">
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center text-yellow-400">
                    <i class="fas fa-users"></i>
                </div>
                <div>
                    <div class="text-xl font-bold text-gray-900">0</div>
                    <div class="text-sm text-gray-600">Total Komunitas</div>
                </div>
            </div>
            <div class="bg-white rounded-lg p-4 flex items-center gap-4 shadow-sm border-l-4 border-yellow-400 hover:shadow-md hover:-translate-y-1 transition stat-card">
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center text-yellow-400">
                    <i class="fas fa-project-diagram"></i>
                </div>
                <div>
                    <div class="text-xl font-bold text-gray-900">0</div>
                    <div class="text-sm text-gray-600">Total Proyek Kolaborasi</div>
                </div>
            </div>
            <div class="bg-white rounded-lg p-4 flex items-center gap-4 shadow-sm border-l-4 border-yellow-400 hover:shadow-md hover:-translate-y-1 transition stat-card">
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center text-yellow-400">
                    <i class="fas fa-images"></i>
                </div>
                <div>
                    <div class="text-xl font-bold text-gray-900">0</div>
                    <div class="text-sm text-gray-600">Total Karya di Galeri</div>
                </div>
            </div>
            <div class="bg-white rounded-lg p-4 flex items-center gap-4 shadow-sm border-l-4 border-yellow-400 hover:shadow-md hover:-translate-y-1 transition stat-card">
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center text-yellow-400">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <div>
                    <div class="text-xl font-bold text-gray-900">0</div>
                    <div class="text-sm text-gray-600">Total Event</div>
                </div>
            </div>
            <div class="bg-white rounded-lg p-4 flex items-center gap-4 shadow-sm border-l-4 border-yellow-400 hover:shadow-md hover:-translate-y-1 transition stat-card">
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center text-yellow-400">
                    <i class="fas fa-user-check"></i>
                </div>
                <div>
                    <div class="text-xl font-bold text-gray-900">0</div>
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
                    <a href="#" class="text-yellow-400 font-medium">Lihat Semua</a>
                </div>
                <ul class="space-y-4">
                    <!-- Kosong -->
                </ul>
            </div>
        </div>

        <!-- Proyek Terbaru -->
        <div class="bg-white rounded-lg p-6 shadow-sm mb-8 max-w-7xl mx-auto">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold text-gray-900">Proyek Kolaborasi Terbaru</h2>
                <button class="flex items-center gap-2 px-4 py-2 bg-yellow-400 text-gray-900 rounded-lg font-medium hover:bg-yellow-300 transition">
                    <i class="fas fa-plus"></i> Proyek Baru
                </button>
            </div>
            <div class="overflow-x-auto rounded-lg shadow-sm">
                <table class="w-full min-w-max">
                    <thead>
                        <tr class="bg-gray-100 text-gray-600 uppercase text-sm">
                            <th class="p-4 text-left">Nama Proyek</th>
                            <th class="p-4 text-left">Komunitas</th>
                            <th class="p-4 text-left">Tanggal Mulai</th>
                            <th class="p-4 text-left">Status</th>
                            <th class="p-4 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Kosong -->
                    </tbody>
                </table>
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
                    <button class="filter-tab px-4 py-2 bg-gray-200 rounded-full text-gray-900 font-medium hover:bg-yellow-400 transition" data-category="post">Postingan</button>
                    <button class="filter-tab px-4 py-2 bg-gray-200 rounded-full text-gray-900 font-medium hover:bg-yellow-400 transition" data-category="event">Event</button>
                    <button class="filter-tab px-4 py-2 bg-gray-200 rounded-full text-gray-900 font-medium hover:bg-yellow-400 transition" data-category="project">Proyek</button>
                    <button class="filter-tab px-4 py-2 bg-gray-200 rounded-full text-gray-900 font-medium hover:bg-yellow-400 transition" data-category="community">Komunitas</button>
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
                <!-- Kosong -->
            </div>
            <div class="text-center mb-4">
                <button id="load-more-activities" class="px-6 py-3 border-2 border-yellow-400 text-yellow-400 rounded-md font-medium hover:bg-yellow-400 hover:text-gray-900 transition">
                    <i class="fas fa-plus"></i> Muat Lebih Banyak Aktivitas
                </button>
            </div>
            <div class="flex justify-between items-center bg-gray-100 p-4 rounded-md">
                <div class="text-gray-600">
                    Menampilkan <span id="results-number">0</span> dari <span id="total-results">0</span> aktivitas
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
                    <a href="#" class="flex items-center gap-2 px-4 py-2 bg-yellow-400 text-gray-900 rounded-lg font-medium hover:bg-yellow-300 transition">
                        <i class="fas fa-chart-line"></i> Lihat Analitik
                    </a>
                </div>
                <div class="space-y-4">
                    <!-- Kosong -->
                </div>
            </div>
        </div>

        <!-- Postingan Terbaru di Galeri -->
        <div class="bg-white rounded-lg p-6 shadow-sm mb-8 max-w-7xl mx-auto">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold text-gray-900">Postingan Terbaru di Galeri</h2>
                <a href="#" class="flex items-center gap-2 px-4 py-2 bg-yellow-400 text-gray-900 rounded-lg font-medium hover:bg-yellow-300 transition">
                    <i class="fas fa-eye"></i> Lihat Semua
                </a>
            </div>
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-6">
                <div class="flex flex-wrap gap-2">
                    <button class="gallery-filter-tab active px-4 py-2 bg-gray-200 rounded-full text-gray-900 font-medium hover:bg-yellow-400 transition" data-category="all">Semua Kategori</button>
                    <button class="gallery-filter-tab px-4 py-2 bg-gray-200 rounded-full text-gray-900 font-medium hover:bg-yellow-400 transition" data-category="photography">Fotografi</button>
                    <button class="gallery-filter-tab px-4 py-2 bg-gray-200 rounded-full text-gray-900 font-medium hover:bg-yellow-400 transition" data-category="digital">Digital Art</button>
                    <button class="gallery-filter-tab px-4 py-2 bg-gray-200 rounded-full text-gray-900 font-medium hover:bg-yellow-400 transition" data-category="painting">Lukisan</button>
                    <button class="gallery-filter-tab px-4 py-2 bg-gray-200 rounded-full text-gray-900 font-medium hover:bg-yellow-400 transition" data-category="sculpture">Patung</button>
                </div>
                <div class="flex gap-2 w-full md:w-auto">
                    <input id="gallery-search" type="text" class="p-2 border rounded-l-md bg-white flex-1" placeholder="Cari postingan...">
                    <button class="p-2 bg-yellow-400 text-gray-900 rounded-r-md hover:bg-yellow-300 transition">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6" id="gallery-container">
                <!-- Kosong -->
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
                <a href="#" class="flex items-center gap-2 px-4 py-2 bg-yellow-400 text-gray-900 rounded-lg font-medium hover:bg-yellow-300 transition">
                    <i class="fas fa-plus"></i> Buat Event
                </a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Kosong -->
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
                    <div class="text-2xl font-bold text-gray-900">0</div>
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
                    <div class="text-2xl font-bold text-gray-900">0%</div>
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
                    <div class="text-2xl font-bold text-gray-900">0</div>
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
                    <div class="text-2xl font-bold text-gray-900">0</div>
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
                <a href="#" class="flex flex-col items-center justify-center p-6 bg-white rounded-lg shadow-sm hover:bg-yellow-400 hover:text-gray-900 transition">
                    <div class="text-3xl mb-3 text-yellow-400"><i class="fas fa-plus-circle"></i></div>
                    <div class="font-medium">Tambah Karya</div>
                </a>
                <a href="#" class="flex flex-col items-center justify-center p-6 bg-white rounded-lg shadow-sm hover:bg-yellow-400 hover:text-gray-900 transition">
                    <div class="text-3xl mb-3 text-yellow-400"><i class="fas fa-users"></i></div>
                    <div class="font-medium">Kelola Komunitas</div>
                </a>
                <a href="#" class="flex flex-col items-center justify-center p-6 bg-white rounded-lg shadow-sm hover:bg-yellow-400 hover:text-gray-900 transition">
                    <div class="text-3xl mb-3 text-yellow-400"><i class="fas fa-calendar-alt"></i></div>
                    <div class="font-medium">Buat Event</div>
                </a>
                <a href="#" class="flex flex-col items-center justify-center p-6 bg-white rounded-lg shadow-sm hover:bg-yellow-400 hover:text-gray-900 transition">
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
            </style>
        @endpush

        @push('scripts')
            <script>
                // Visitor Chart
                const ctx = document.getElementById('visitorChart').getContext('2d');
                let visitorChart;

                function updateVisitorChart(period) {
                    let labels, data;
                    if (period === 'week') {
                        labels = ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'];
                        data = [0, 0, 0, 0, 0, 0, 0];
                    } else if (period === 'month') {
                        labels = ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4'];
                        data = [0, 0, 0, 0];
                    } else {
                        labels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
                        data = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
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
                            labels: ['Fotografi', 'Digital Art', 'Lukisan', 'Patung'],
                            datasets: [{
                                data: [0, 0, 0, 0],
                                backgroundColor: ['#ffd700', '#ffeb3b', '#fbc02d', '#f57f17'],
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
                const interactionCtx = document.getElementById('interactionChart').getContext('2d');
                let interactionChart;

                function updateInteractionChart(period) {
                    let labels, likesData, commentsData;
                    if (period === 'week') {
                        labels = ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'];
                        likesData = [0, 0, 0, 0, 0, 0, 0];
                        commentsData = [0, 0, 0, 0, 0, 0, 0];
                    } else if (period === 'month') {
                        labels = ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4'];
                        likesData = [0, 0, 0, 0];
                        commentsData = [0, 0, 0, 0];
                    } else {
                        labels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
                        likesData = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
                        commentsData = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
                    }
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
                const eventCtx = document.getElementById('eventChart').getContext('2d');
                let eventChart;

                function updateEventChart(period) {
                    let labels, data;
                    if (period === 'month') {
                        labels = ['Workshop', 'Pameran', 'Kompetisi', 'Lainnya'];
                        data = [0, 0, 0, 0];
                    } else if (period === 'quarter') {
                        labels = ['Q1', 'Q2', 'Q3', 'Q4'];
                        data = [0, 0, 0, 0];
                    } else {
                        labels = ['2020', '2021', '2022', '2023'];
                        data = [0, 0, 0, 0];
                    }
                    if (eventChart) eventChart.destroy();
                    eventChart = new Chart(eventCtx, {
                        type: 'doughnut',
                        data: {
                            labels: labels,
                            datasets: [{
                                data: data,
                                backgroundColor: ['#ffd700', '#ffeb3b', '#fbc02d', '#f57f17'],
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
                const growthCtx = document.getElementById('growthChart').getContext('2d');
                let growthChart;

                function updateGrowthChart(period) {
                    let labels, data;
                    if (period === 'month') {
                        labels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
                        data = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
                    } else if (period === 'quarter') {
                        labels = ['Q1', 'Q2', 'Q3', 'Q4'];
                        data = [0, 0, 0, 0];
                    } else {
                        labels = ['2020', '2021', '2022', '2023'];
                        data = [0, 0, 0, 0];
                    }
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
                    filterTabs.forEach(tab => {
                        tab.addEventListener('click', function() {
                            filterTabs.forEach(t => t.classList.remove('active'));
                            this.classList.add('active');
                        });
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

                    // Activity filtering
                    const activityFilterTabs = document.querySelectorAll('.filter-tab');
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
                            const title = card.querySelector('h4')?.textContent.toLowerCase() || '';
                            const author = card.querySelector('p')?.textContent.toLowerCase() || '';
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

                    activityFilterTabs.forEach(tab => {
                        tab.addEventListener('click', filterAndSortActivities);
                    });

                    activitySearchInput.addEventListener('input', filterAndSortActivities);
                    searchButton.addEventListener('click', filterAndSortActivities);
                    sortSelect.addEventListener('change', filterAndSortActivities);

                    resetButton.addEventListener('click', function() {
                        activityFilterTabs.forEach(tab => tab.classList.remove('active'));
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

                    // Prevent horizontal overflow on load
                    document.body.style.overflowX = 'hidden';
                    window.addEventListener('resize', () => {
                        document.body.style.overflowX = 'hidden';
                    });
                });
            </script>
        @endpush
    </div>
</x-admin-layout>