<x-admin-layout>
    <!-- Content -->
    <div class="content">
        <div class="header-card">
            <div class="welcome-container">
                <div class="welcome-content">
                    <div class="welcome-text">
                        <h1 class="page-title">Selamat Datang, <span class="user-name">Admin TARA</span>! 👋</h1>
                        <p class="page-subtitle">Senang melihat Anda kembali. Berikut ringkasan aktivitas platform hari ini.</p>
                        
                        <div class="welcome-stats">
                            <div class="welcome-stat">
                                <div class="stat-icon">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <div class="stat-details">
                                    <span class="stat-value">+12.5%</span>
                                    <span class="stat-label">Traffic Hari Ini</span>
                                </div>
                            </div>
                            
                            <div class="welcome-stat">
                                <div class="stat-icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="stat-details">
                                    <span class="stat-value">24</span>
                                    <span class="stat-label">User Baru</span>
                                </div>
                            </div>
                            
                            <div class="welcome-stat">
                                <div class="stat-icon">
                                    <i class="fas fa-image"></i>
                                </div>
                                <div class="stat-details">
                                    <span class="stat-value">18</span>
                                    <span class="stat-label">Karya Baru</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="welcome-visual">
                        <div class="visual-container black-theme">
                            <div class="floating-icons">
                                <div class="floating-icon black-floating">
                                    <i class="fas fa-paint-brush"></i>
                                </div>
                                <div class="floating-icon black-floating">
                                    <i class="fas fa-camera"></i>
                                </div>
                                <div class="floating-icon black-floating">
                                    <i class="fas fa-music"></i>
                                </div>
                                <div class="floating-icon black-floating">
                                    <i class="fas fa-pencil-alt"></i>
                                </div>
                            </div>
                            <div class="main-icon-container">
                                <div class="main-icon black-main">
                                    <i class="fas fa-palette"></i>
                                </div>
                                <div class="icon-ring black-ring"></div>
                                <div class="icon-glow"></div>
                            </div>
                            <div class="decoration-dots">
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot"></span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="quick-actions-header">
                    <button class="quick-action-btn">
                        <i class="fas fa-plus-circle"></i>
                        <span>Buat Konten</span>
                    </button>
                    <button class="quick-action-btn">
                        <i class="fas fa-chart-pie"></i>
                        <span>Lihat Laporan</span>
                    </button>
                    <button class="quick-action-btn">
                        <i class="fas fa-bell"></i>
                        <span>Notifikasi</span>
                        <span class="notification-count">3</span>
                    </button>
                </div>
                
                <div class="date-info">
                    <div class="current-date">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Sabtu, 30 Agustus 2025</span>
                    </div>
                    <div class="last-login">
                        <i class="fas fa-clock"></i>
                        <span>Login terakhir: Hari ini, 12:45</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- 5 Card Statistik yang selalu sejajar -->
        <div class="dashboard-stats">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-info">
                    <div class="stat-value">24</div>
                    <div class="stat-label">Total Komunitas</div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-project-diagram"></i>
                </div>
                <div class="stat-info">
                    <div class="stat-value">12</div>
                    <div class="stat-label">Total Proyek Kolaborasi</div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-images"></i>
                </div>
                <div class="stat-info">
                    <div class="stat-value">156</div>
                    <div class="stat-label">Total Karya di Galeri</div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <div class="stat-info">
                    <div class="stat-value">8</div>
                    <div class="stat-label">Total Event</div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-user-check"></i>
                </div>
                <div class="stat-info">
                    <div class="stat-value">342</div>
                    <div class="stat-label">Total User Aktif</div>
                </div>
            </div>
        </div>

        <!-- Grafik dan Aktivitas -->
        <div class="chart-container">
            <div class="chart">
                <div class="chart-header">
                    <h3 class="chart-title">Statistik Pengunjung</h3>
                    <div class="chart-options">
                        <select class="chart-select" id="chart-period">
                            <option value="week">Minggu Ini</option>
                            <option value="month">Bulan Ini</option>
                            <option value="year">Tahun Ini</option>
                        </select>
                    </div>
                </div>
                <div class="chart-canvas-container">
                    <canvas id="visitorChart"></canvas>
                </div>
            </div>

            <div class="recent-activity">
                <div class="activity-header">
                    <h3 class="chart-title">Aktivitas Terbaru</h3>
                    <a href="#" class="view-all-link">Lihat Semua</a>
                </div>

                <ul class="activity-list">
                    <li class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-image"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Karya baru ditambahkan oleh Andi</div>
                            <div class="activity-time">2 jam yang lalu</div>
                        </div>
                    </li>

                    <li class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Komunitas Fotografi bergabung</div>
                            <div class="activity-time">5 jam yang lalu</div>
                        </div>
                    </li>

                    <li class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-calendar"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Event Pameran Seni dibuat</div>
                            <div class="activity-time">Kemarin</div>
                        </div>
                    </li>

                    <li class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-comment"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">25 komentar baru pada karya</div>
                            <div class="activity-time">2 hari yang lalu</div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Proyek Terbaru -->
        <div class="content-section">
            <div class="section-header">
                <h2 class="section-title">Proyek Kolaborasi Terbaru</h2>
                <button class="btn btn-primary">
                    <i class="fas fa-plus"></i> Proyek Baru
                </button>
            </div>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Nama Proyek</th>
                            <th>Komunitas</th>
                            <th>Tanggal Mulai</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Pameran Seni Digital</td>
                            <td>Digital Artists</td>
                            <td>15 Agu 2023</td>
                            <td><span class="status-badge status-active">Aktif</span></td>
                            <td>
                                <div class="action-buttons">
                                    <a href="#" class="action-btn btn-view"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="action-btn btn-edit"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="action-btn btn-delete"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Lomba Fotografi Alam</td>
                            <td>Nature Photography</td>
                            <td>10 Sep 2023</td>
                            <td><span class="status-badge status-pending">Pending</span></td>
                            <td>
                                <div class="action-buttons">
                                    <a href="#" class="action-btn btn-view"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="action-btn btn-edit"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="action-btn btn-delete"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Workshop Melukis</td>
                            <td>Art Lovers</td>
                            <td>5 Jul 2023</td>
                            <td><span class="status-badge status-active">Aktif</span></td>
                            <td>
                                <div class="action-buttons">
                                    <a href="#" class="action-btn btn-view"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="action-btn btn-edit"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="action-btn btn-delete"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Filtering Kategori Aktivitas -->
        <div class="content-section">
            <div class="section-header">
                <h2 class="section-title">Filtering Kategori Aktivitas</h2>
            </div>

            <div class="filter-options">
                <div class="filter-tabs">
                    <button class="filter-tab active" data-category="all">Semua</button>
                    <button class="filter-tab" data-category="post">Postingan</button>
                    <button class="filter-tab" data-category="event">Event</button>
                    <button class="filter-tab" data-category="project">Proyek</button>
                    <button class="filter-tab" data-category="community">Komunitas</button>
                </div>

                <div class="filter-search">
                    <div class="search-input-with-icon">
                        <i class="fas fa-search"></i>
                        <input type="text" id="activity-search" placeholder="Cari aktivitas...">
                        <button class="search-btn" id="search-button">
                            <i class="fas fa-search"></i> Cari
                        </button>
                    </div>
                    <button class="filter-reset" id="reset-filters">
                        <i class="fas fa-sync-alt"></i> Reset
                    </button>
                </div>
            </div>
            <!-- Container untuk Aktivitas Cards -->
            <div class="activities-grid" id="activities-container">
                <!-- Aktivitas 1 -->
                <div class="activity-card" data-category="post" data-date="2" data-likes="24" data-comments="8">
                    <div class="activity-image">
                        <img src="https://via.placeholder.com/300x200/4A6572/FFFFFF?text=Postingan+Baru"
                            alt="Postingan Baru">
                        <div class="activity-overlay">
                            <button class="btn-icon"><i class="fas fa-heart"></i> 24</button>
                            <button class="btn-icon"><i class="fas fa-comment"></i> 8</button>
                            <button class="btn-icon view-btn"><i class="fas fa-expand"></i></button>
                        </div>
                    </div>
                    <div class="activity-info">
                        <div class="activity-type-badge post-badge">Postingan</div>
                        <h4>Sunset di Pantai Sanur</h4>
                        <p>Oleh: Budi Santoso</p>
                        <div class="activity-meta">
                            <span><i class="fas fa-clock"></i> 2 jam lalu</span>
                            <span><i class="fas fa-eye"></i> 142 dilihat</span>
                        </div>
                    </div>
                </div>

                <!-- Aktivitas 2 -->
                <div class="activity-card" data-category="event" data-date="5" data-likes="42" data-comments="12">
                    <div class="activity-image">
                        <img src="https://via.placeholder.com/300x200/FF6B6B/FFFFFF?text=Event+Baru" alt="Event Baru">
                        <div class="activity-overlay">
                            <button class="btn-icon"><i class="fas fa-heart"></i> 42</button>
                            <button class="btn-icon"><i class="fas fa-comment"></i> 12</button>
                            <button class="btn-icon view-btn"><i class="fas fa-expand"></i></button>
                        </div>
                    </div>
                    <div class="activity-info">
                        <div class="activity-type-badge event-badge">Event</div>
                        <h4>Pameran Seni Digital 2023</h4>
                        <p>Oleh: Galeri Nasional</p>
                        <div class="activity-meta">
                            <span><i class="fas fa-clock"></i> 5 jam lalu</span>
                            <span><i class="fas fa-users"></i> 78 peserta</span>
                        </div>
                    </div>
                </div>

                <!-- Aktivitas 3 -->
                <div class="activity-card" data-category="project" data-date="24" data-likes="31"
                    data-comments="5">
                    <div class="activity-image">
                        <img src="https://via.placeholder.com/300x200/4ECDC4/FFFFFF?text=Proyek+Kolaborasi"
                            alt="Proyek Kolaborasi">
                        <div class="activity-overlay">
                            <button class="btn-icon"><i class="fas fa-heart"></i> 31</button>
                            <button class="btn-icon"><i class="fas fa-comment"></i> 5</button>
                            <button class="btn-icon view-btn"><i class="fas fa-expand"></i></button>
                        </div>
                    </div>
                    <div class="activity-info">
                        <div class="activity-type-badge project-badge">Proyek</div>
                        <h4>Kolaborasi Mural Kota</h4>
                        <p>Oleh: Komunitas Street Art</p>
                        <div class="activity-meta">
                            <span><i class="fas fa-clock"></i> 1 hari lalu</span>
                            <span><i class="fas fa-users"></i> 15 anggota</span>
                        </div>
                    </div>
                </div>

                <!-- Aktivitas 4 -->
                <div class="activity-card" data-category="community" data-date="48" data-likes="56"
                    data-comments="9">
                    <div class="activity-image">
                        <img src="https://via.placeholder.com/300x200/45B7D1/FFFFFF?text=Komunitas+Baru"
                            alt="Komunitas Baru">
                        <div class="activity-overlay">
                            <button class="btn-icon"><i class="fas fa-heart"></i> 56</button>
                            <button class="btn-icon"><i class="fas fa-comment"></i> 9</button>
                            <button class="btn-icon view-btn"><i class="fas fa-expand"></i></button>
                        </div>
                    </div>
                    <div class="activity-info">
                        <div class="activity-type-badge community-badge">Komunitas</div>
                        <h4>Fotografi Alam Bergabung</h4>
                        <p>25 anggota baru</p>
                        <div class="activity-meta">
                            <span><i class="fas fa-clock"></i> 2 hari lalu</span>
                            <span><i class="fas fa-image"></i> 45 karya</span>
                        </div>
                    </div>
                </div>

                <!-- Aktivitas 5 -->
                <div class="activity-card" data-category="post" data-date="72" data-likes="38" data-comments="6">
                    <div class="activity-image">
                        <img src="https://via.placeholder.com/300x200/96C93D/FFFFFF?text=Tutorial+Seni"
                            alt="Tutorial Seni">
                        <div class="activity-overlay">
                            <button class="btn-icon"><i class="fas fa-heart"></i> 38</button>
                            <button class="btn-icon"><i class="fas fa-comment"></i> 6</button>
                            <button class="btn-icon view-btn"><i class="fas fa-expand"></i></button>
                        </div>
                    </div>
                    <div class="activity-info">
                        <div class="activity-type-badge post-badge">Postingan</div>
                        <h4>Tutorial Melukis Digital</h4>
                        <p>Oleh: Sari Dewi</p>
                        <div class="activity-meta">
                            <span><i class="fas fa-clock"></i> 3 hari lalu</span>
                            <span><i class="fas fa-download"></i> 89 unduhan</span>
                        </div>
                    </div>
                </div>

                <!-- Aktivitas 6 -->
                <div class="activity-card" data-category="event" data-date="96" data-likes="67" data-comments="14">
                    <div class="activity-image">
                        <img src="https://via.placeholder.com/300x200/3498DB/FFFFFF?text=Webinar+Seni"
                            alt="Webinar Seni">
                        <div class="activity-overlay">
                            <button class="btn-icon"><i class="fas fa-heart"></i> 67</button>
                            <button class="btn-icon"><i class="fas fa-comment"></i> 14</button>
                            <button class="btn-icon view-btn"><i class="fas fa-expand"></i></button>
                        </div>
                    </div>
                    <div class="activity-info">
                        <div class="activity-type-badge event-badge">Event</div>
                        <h4>Webinar Seni Kontemporer</h4>
                        <p>Oleh: Kurator Seni</p>
                        <div class="activity-meta">
                            <span><i class="fas fa-clock"></i> 4 hari lalu</span>
                            <span><i class="fas fa-video"></i> Online</span>
                        </div>
                    </div>
                </div>

                <!-- Aktivitas 7 -->
                <div class="activity-card" data-category="project" data-date="120" data-likes="29"
                    data-comments="3">
                    <div class="activity-image">
                        <img src="https://via.placeholder.com/300x200/9B59B6/FFFFFF?text=Proyek+Komunitas"
                            alt="Proyek Komunitas">
                        <div class="activity-overlay">
                            <button class="btn-icon"><i class="fas fa-heart"></i> 29</button>
                            <button class="btn-icon"><i class="fas fa-comment"></i> 3</button>
                            <button class="btn-icon view-btn"><i class="fas fa-expand"></i></button>
                        </div>
                    </div>
                    <div class="activity-info">
                        <div class="activity-type-badge project-badge">Proyek</div>
                        <h4>Restorasi Lukisan Tua</h4>
                        <p>Oleh: Tim Konservasi</p>
                        <div class="activity-meta">
                            <span><i class="fas fa-clock"></i> 5 hari lalu</span>
                            <span><i class="fas fa-history"></i> 90% selesai</span>
                        </div>
                    </div>
                </div>

                <!-- Aktivitas 8 -->
                <div class="activity-card" data-category="community" data-date="144" data-likes="83"
                    data-comments="17">
                    <div class="activity-image">
                        <img src="https://via.placeholder.com/300x200/E67E22/FFFFFF?text=Komunitas+Seni"
                            alt="Komunitas Seni">
                        <div class="activity-overlay">
                            <button class="btn-icon"><i class="fas fa-heart"></i> 83</button>
                            <button class="btn-icon"><i class="fas fa-comment"></i> 17</button>
                            <button class="btn-icon view-btn"><i class="fas fa-expand"></i></button>
                        </div>
                    </div>
                    <div class="activity-info">
                        <div class="activity-type-badge community-badge">Komunitas</div>
                        <h4>Komunitas Seni Rupa Baru</h4>
                        <p>12 anggota founding</p>
                        <div class="activity-meta">
                            <span><i class="fas fa-clock"></i> 6 hari lalu</span>
                            <span><i class="fas fa-trophy"></i> 3 penghargaan</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Load More Button -->
            <div class="activities-load-more">
                <button class="btn btn-outline" id="load-more-activities">
                    <i class="fas fa-plus"></i> Muat Lebih Banyak Aktivitas
                </button>
            </div>

            <div class="filter-results">
                <div class="results-count">
                    Menampilkan <span id="results-number">8</span> dari <span id="total-results">20</span> aktivitas
                </div>
                <div class="sort-options">
                    <label for="sort-by">Urutkan:</label>
                    <select id="sort-by" class="sort-select">
                        <option value="newest">Terbaru</option>
                        <option value="oldest">Terlama</option>
                        <option value="popular">Terpopuler</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Postingan Terbaru di Galeri -->
        <div class="content-section">
            <div class="section-header">
                <h2 class="section-title">Postingan Terbaru di Galeri</h2>
                <a href="#" class="btn btn-primary">
                    <i class="fas fa-eye"></i> Lihat Semua
                </a>
            </div>

            <div class="gallery-filter-options">
                <div class="gallery-filter-tabs">
                    <button class="gallery-filter-tab active" data-category="all">Semua Kategori</button>
                    <button class="gallery-filter-tab" data-category="photography">Fotografi</button>
                    <button class="gallery-filter-tab" data-category="digital">Digital Art</button>
                    <button class="gallery-filter-tab" data-category="painting">Lukisan</button>
                    <button class="gallery-filter-tab" data-category="sculpture">Patung</button>
                </div>
                <div class="gallery-search">
                    <input type="text" id="gallery-search" placeholder="Cari postingan...">
                    <button class="search-btn">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>

            <div class="gallery-grid" id="gallery-container">
                <div class="gallery-item" data-category="photography" data-title="Sunset di Pantai Sanur"
                    data-author="Budi Santoso" data-date="2">
                    <div class="gallery-image">
                        <img src="https://via.placeholder.com/300x200/4A6572/FFFFFF?text=Fotografi" alt="Karya Seni">
                        <div class="gallery-overlay">
                            <button class="btn-icon"><i class="fas fa-heart"></i> 24</button>
                            <button class="btn-icon"><i class="fas fa-comment"></i> 8</button>
                            <button class="btn-icon view-btn"><i class="fas fa-expand"></i></button>
                        </div>
                    </div>
                    <div class="gallery-info">
                        <h4>Sunset di Pantai Sanur</h4>
                        <p>Oleh: Budi Santoso</p>
                        <div class="gallery-meta">
                            <span><i class="fas fa-clock"></i> 2 jam lalu</span>
                            <span><i class="fas fa-tag"></i> Fotografi</span>
                        </div>
                    </div>
                </div>

                <div class="gallery-item" data-category="digital" data-title="Abstract Colors"
                    data-author="Sari Dewi" data-date="5">
                    <div class="gallery-image">
                        <img src="https://via.placeholder.com/300x200/FF6B6B/FFFFFF?text=Digital+Art"
                            alt="Karya Seni">
                        <div class="gallery-overlay">
                            <button class="btn-icon"><i class="fas fa-heart"></i> 42</button>
                            <button class="btn-icon"><i class="fas fa-comment"></i> 12</button>
                            <button class="btn-icon view-btn"><i class="fas fa-expand"></i></button>
                        </div>
                    </div>
                    <div class="gallery-info">
                        <h4>Abstract Colors</h4>
                        <p>Oleh: Sari Dewi</p>
                        <div class="gallery-meta">
                            <span><i class="fas fa-clock"></i> 5 jam lalu</span>
                            <span><i class="fas fa-tag"></i> Lukisan Digital</span>
                        </div>
                    </div>
                </div>

                <div class="gallery-item" data-category="photography" data-title="Potret Budaya"
                    data-author="Ahmad Junaedi" data-date="24">
                    <div class="gallery-image">
                        <img src="https://via.placeholder.com/300x200/4A6572/FFFFFF?text=Potret" alt="Karya Seni">
                        <div class="gallery-overlay">
                            <button class="btn-icon"><i class="fas fa-heart"></i> 31</button>
                            <button class="btn-icon"><i class="fas fa-comment"></i> 5</button>
                            <button class="btn-icon view-btn"><i class="fas fa-expand"></i></button>
                        </div>
                    </div>
                    <div class="gallery-info">
                        <h4>Potret Budaya</h4>
                        <p>Oleh: Ahmad Junaedi</p>
                        <div class="gallery-meta">
                            <span><i class="fas fa-clock"></i> 1 hari lalu</span>
                            <span><i class="fas fa-tag"></i> Fotografi</span>
                        </div>
                    </div>
                </div>

                <div class="gallery-item" data-category="painting" data-title="Lukisan Alam"
                    data-author="Dewi Lestari" data-date="48">
                    <div class="gallery-image">
                        <img src="https://via.placeholder.com/300x200/4ECDC4/FFFFFF?text=Lukisan" alt="Karya Seni">
                        <div class="gallery-overlay">
                            <button class="btn-icon"><i class="fas fa-heart"></i> 56</button>
                            <button class="btn-icon"><i class="fas fa-comment"></i> 9</button>
                            <button class="btn-icon view-btn"><i class="fas fa-expand"></i></button>
                        </div>
                    </div>
                    <div class="gallery-info">
                        <h4>Lukisan Alam</h4>
                        <p>Oleh: Dewi Lestari</p>
                        <div class="gallery-meta">
                            <span><i class="fas fa-clock"></i> 2 hari lalu</span>
                            <span><i class="fas fa-tag"></i> Lukisan</span>
                        </div>
                    </div>
                </div>

                <div class="gallery-item" data-category="sculpture" data-title="Patung Kayu"
                    data-author="Joko Widodo" data-date="72">
                    <div class="gallery-image">
                        <img src="https://via.placeholder.com/300x200/45B7D1/FFFFFF?text=Patung" alt="Karya Seni">
                        <div class="gallery-overlay">
                            <button class="btn-icon"><i class="fas fa-heart"></i> 38</button>
                            <button class="btn-icon"><i class="fas fa-comment"></i> 6</button>
                            <button class="btn-icon view-btn"><i class="fas fa-expand"></i></button>
                        </div>
                    </div>
                    <div class="gallery-info">
                        <h4>Patung Kayu Tradisional</h4>
                        <p>Oleh: Joko Widodo</p>
                        <div class="gallery-meta">
                            <span><i class="fas fa-clock"></i> 3 hari lalu</span>
                            <span><i class="fas fa-tag"></i> Patung</span>
                        </div>
                    </div>
                </div>

                <div class="gallery-item" data-category="digital" data-title="Digital Fantasy"
                    data-author="Rina Melati" data-date="96">
                    <div class="gallery-image">
                        <img src="https://via.placeholder.com/300x200/FF6B6B/FFFFFF?text=Fantasy+Art"
                            alt="Karya Seni">
                        <div class="gallery-overlay">
                            <button class="btn-icon"><i class="fas fa-heart"></i> 67</button>
                            <button class="btn-icon"><i class="fas fa-comment"></i> 14</button>
                            <button class="btn-icon view-btn"><i class="fas fa-expand"></i></button>
                        </div>
                    </div>
                    <div class="gallery-info">
                        <h4>Digital Fantasy</h4>
                        <p>Oleh: Rina Melati</p>
                        <div class="gallery-meta">
                            <span><i class="fas fa-clock"></i> 4 hari lalu</span>
                            <span><i class="fas fa-tag"></i> Digital Art</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="gallery-load-more">
                <button class="btn btn-outline" id="load-more">
                    <i class="fas fa-plus"></i> Muat Lebih Banyak
                </button>
            </div>
        </div>

        <!-- Event Baru dibuat -->
        <div class="content-section">
            <div class="section-header">
                <h2 class="section-title">Event Baru</h2>
                <a href="#" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Buat Event
                </a>
            </div>

            <div class="events-grid">
                <div class="event-card">
                    <div class="event-date">
                        <div class="event-day">15</div>
                        <div class="event-month">Sep</div>
                    </div>
                    <div class="event-info">
                        <h4>Pameran Seni Digital</h4>
                        <p><i class="fas fa-map-marker-alt"></i> Galeri Seni Jakarta</p>
                        <div class="event-meta">
                            <span><i class="fas fa-users"></i> 42 Peserta</span>
                            <span class="status-badge status-active">Aktif</span>
                        </div>
                    </div>
                </div>

                <div class="event-card">
                    <div class="event-date">
                        <div class="event-day">22</div>
                        <div class="event-month">Sep</div>
                    </div>
                    <div class="event-info">
                        <h4>Workshop Fotografi</h4>
                        <p><i class="fas fa-map-marker-alt"></i> Online</p>
                        <div class="event-meta">
                            <span><i class="fas fa-users"></i> 78 Peserta</span>
                            <span class="status-badge status-pending">Pending</span>
                        </div>
                    </div>
                </div>

                <div class="event-card">
                    <div class="event-date">
                        <div class="event-day">30</div>
                        <div class="event-month">Sep</div>
                    </div>
                    <div class="event-info">
                        <h4>Lukis Bersama Komunitas</h4>
                        <p><i class="fas fa-map-marker-alt"></i> Taman Seni Surabaya</p>
                        <div class="event-meta">
                            <span><i class="fas fa-users"></i> 25 Peserta</span>
                            <span class="status-badge status-active">Aktif</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grafik Pertumbuhan Anggota Komunitas -->
        <div class="content-section">
            <div class="section-header">
                <h2 class="section-title">Pertumbuhan Anggota Komunitas</h2>
                <div class="chart-options">
                    <select class="chart-select" id="growth-period">
                        <option value="month">Bulanan</option>
                        <option value="quarter">Triwulan</option>
                        <option value="year">Tahunan</option>
                    </select>
                </div>
            </div>

            <div class="chart-canvas-container">
                <canvas id="growthChart"></canvas>
            </div>
        </div>

        <!-- Karya Popular -->
        <div class="content-section">
            <div class="section-header">
                <h2 class="section-title">Karya Popular</h2>
                <a href="#" class="btn btn-primary">
                    <i class="fas fa-chart-line"></i> Lihat Analitik
                </a>
            </div>

            <div class="popular-grid">
                <div class="popular-item">
                    <div class="popular-rank">1</div>
                    <div class="popular-image">
                        <img src="https://via.placeholder.com/80x80" alt="Karya Popular">
                    </div>
                    <div class="popular-info">
                        <h4>Sunset Reflection</h4>
                        <p>Oleh: Dian Sastrowardoyo</p>
                        <div class="popular-stats">
                            <span><i class="fas fa-heart"></i> 245</span>
                            <span><i class="fas fa-eye"></i> 1.2K</span>
                        </div>
                    </div>
                </div>

                <div class="popular-item">
                    <div class="popular-rank">2</div>
                    <div class="popular-image">
                        <img src="https://via.placeholder.com/80x80" alt="Karya Popular">
                    </div>
                    <div class="popular-info">
                        <h4>Urban Architecture</h4>
                        <p>Oleh: Rizky Pratama</p>
                        <div class="popular-stats">
                            <span><i class="fas fa-heart"></i> 198</span>
                            <span><i class="fas fa-eye"></i> 987</span>
                        </div>
                    </div>
                </div>

                <div class="popular-item">
                    <div class="popular-rank">3</div>
                    <div class="popular-image">
                        <img src="https://via.placeholder.com/80x80" alt="Karya Popular">
                    </div>
                    <div class="popular-info">
                        <h4>Natural Patterns</h4>
                        <p>Oleh: Sinta Nuriyah</p>
                        <div class="popular-stats">
                            <span><i class="fas fa-heart"></i> 176</span>
                            <span><i class="fas fa-eye"></i> 845</span>
                        </div>
                    </div>
                </div>

                <div class="popular-item">
                    <div class="popular-rank">4</div>
                    <div class="popular-image">
                        <img src="https://via.placeholder.com/80x80" alt="Karya Popular">
                    </div>
                    <div class="popular-info">
                        <h4>Colorful Abstract</h4>
                        <p>Oleh: Bayu Skak</p>
                        <div class="popular-stats">
                            <span><i class="fas fa-heart"></i> 152</span>
                            <span><i class="fas fa-eye"></i> 732</span>
                        </div>
                    </div>
                </div>

                <div class="popular-item">
                    <div class="popular-rank">5</div>
                    <div class="popular-image">
                        <img src="https://via.placeholder.com/80x80" alt="Karya Popular">
                    </div>
                    <div class="popular-info">
                        <h4>Portrait of Wisdom</h4>
                        <p>Oleh: Maria Silva</p>
                        <div class="popular-stats">
                            <span><i class="fas fa-heart"></i> 138</span>
                            <span><i class="fas fa-eye"></i> 689</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Widget Analitik -->
        <div class="content-section">
            <div class="section-header">
                <h2 class="section-title">Widget Analitik</h2>
            </div>

            <div class="analytics-widgets">
                <div class="analytics-widget">
                    <div class="widget-header">
                        <h3>Traffic Pengunjung</h3>
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="widget-value">4,582</div>
                    <div class="widget-change positive">
                        <i class="fas fa-arrow-up"></i> 12.5%
                    </div>
                    <div class="widget-label">dari bulan lalu</div>
                </div>

                <div class="analytics-widget">
                    <div class="widget-header">
                        <h3>Waktu Rata-rata</h3>
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="widget-value">3m 42s</div>
                    <div class="widget-change positive">
                        <i class="fas fa-arrow-up"></i> 8.3%
                    </div>
                    <div class="widget-label">dari bulan lalu</div>
                </div>

                <div class="analytics-widget">
                    <div class="widget-header">
                        <h3>Rasio Engagement</h3>
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="widget-value">24.8%</div>
                    <div class="widget-change negative">
                        <i class="fas fa-arrow-down"></i> 3.2%
                    </div>
                    <div class="widget-label">dari bulan lalu</div>
                </div>

                <div class="analytics-widget">
                    <div class="widget-header">
                        <h3>Karya Baru</h3>
                        <i class="fas fa-image"></i>
                    </div>
                    <div class="widget-value">87</div>
                    <div class="widget-change positive">
                        <i class="fas fa-arrow-up"></i> 15.7%
                    </div>
                    <div class="widget-label">dari bulan lalu</div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="content-section">
            <div class="section-header">
                <h2 class="section-title">Aksi Cepat</h2>
            </div>

            <div class="quick-actions">
                <a href="#" class="quick-action-btn">
                    <div class="quick-action-icon"><i class="fas fa-plus-circle"></i></div>
                    <div class="quick-action-text">Tambah Karya</div>
                </a>

                <a href="#" class="quick-action-btn">
                    <div class="quick-action-icon"><i class="fas fa-calendar-plus"></i></div>
                    <div class="quick-action-text">Buat Event</div>
                </a>

                <a href="#" class="quick-action-btn">
                    <div class="quick-action-icon"><i class="fas fa-users-cog"></i></div>
                    <div class="quick-action-text">Kelola Komunitas</div>
                </a>

                <a href="#" class="quick-action-btn">
                    <div class="quick-action-icon"><i class="fas fa-chart-bar"></i></div>
                    <div class="quick-action-text">Lihat Laporan</div>
                </a>
            </div>
        </div>
    </div>


    @push('styles')
        <style>
            :root {
                --primary-bg: #ffffff;
                --secondary-bg: #f8f8f8;
                --text-color: #1a1a1a;
                --accent-color: #ffd700;
                --border-color: #e0e0e0;
                --hover-color: #f5f5f5;
                --sidebar-width: 280px;
                --navbar-height: 70px;
                --view-color: #2ed573;
                --edit-color: #3498db;
                --delete-color: #ff4757;
            }

            * {
                box-sizing: border-box;
                margin: 0;
                padding: 0;
            }

            body {
                font-family: "Space Grotesk", sans-serif;
                background: var(--primary-bg);
                color: var(--text-color);
                line-height: 1.6;
            }

            /* Layout utama */
            .admin-container {
                display: flex;
                min-height: 100vh;
            }

            /* Sidebar */
            .sidebar {
                width: var(--sidebar-width);
                background: var(--primary-bg);
                border-right: 1px solid var(--border-color);
                box-shadow: 2px 0 10px rgba(0, 0, 0, 0.05);
                display: flex;
                flex-direction: column;
                position: fixed;
                height: 100vh;
                z-index: 100;
                overflow-y: auto;
            }

            .sidebar-header {
                padding: 25px 20px;
                border-bottom: 1px solid var(--border-color);
                display: flex;
                align-items: center;
                justify-content: center;
                background: var(--primary-bg);
            }

            .logo {
                display: flex;
                align-items: center;
                gap: 12px;
            }

            .logo-icon {
                width: 40px;
                height: 40px;
                background: linear-gradient(135deg, var(--accent-color) 0%, #ffc000 100%);
                border-radius: 10px;
                display: flex;
                align-items: center;
                justify-content: center;
                color: var(--text-color);
                font-weight: 700;
                font-size: 20px;
                box-shadow: 0 4px 8px rgba(255, 215, 0, 0.2);
            }

            .logo-text {
                font-size: 22px;
                font-weight: 700;
                color: var(--text-color);
            }

            .sidebar-nav {
                padding: 20px 0;
                flex-grow: 1;
            }

            .nav-section {
                margin-bottom: 25px;
            }

            .nav-title {
                padding: 0 25px;
                font-size: 12px;
                text-transform: uppercase;
                letter-spacing: 1px;
                color: #888;
                margin-bottom: 15px;
                font-weight: 600;
            }

            .nav-item {
                display: flex;
                align-items: center;
                padding: 14px 25px;
                color: var(--text-color);
                text-decoration: none;
                font-weight: 500;
                transition: all 0.3s;
                position: relative;
                border-left: 4px solid transparent;
            }

            .nav-item:hover {
                background: var(--hover-color);
                border-left-color: var(--accent-color);
            }

            .nav-item.active {
                background: rgba(255, 215, 0, 0.1);
                border-left-color: var(--accent-color);
                color: var(--text-color);
                font-weight: 600;
            }

            .nav-icon {
                width: 24px;
                height: 24px;
                margin-right: 15px;
                display: flex;
                align-items: center;
                justify-content: center;
                color: #666;
            }

            .nav-item.active .nav-icon {
                color: var(--accent-color);
            }

            .nav-text {
                flex-grow: 1;
            }

            .nav-badge {
                background: var(--accent-color);
                color: var(--text-color);
                padding: 3px 8px;
                border-radius: 12px;
                font-size: 11px;
                font-weight: 600;
            }

            .sidebar-footer {
                padding: 20px;
                border-top: 1px solid var(--border-color);
                background: var(--secondary-bg);
            }

            .user-profile {
                display: flex;
                align-items: center;
                gap: 12px;
            }

            .user-avatar {
                width: 40px;
                height: 40px;
                border-radius: 50%;
                background: linear-gradient(135deg, var(--accent-color) 0%, #ffc000 100%);
                display: flex;
                align-items: center;
                justify-content: center;
                color: var(--text-color);
                font-weight: 600;
                font-size: 16px;
            }

            .user-info {
                flex-grow: 1;
            }

            .user-name {
                font-weight: 600;
                font-size: 14px;
            }

            .user-role {
                font-size: 12px;
                color: #666;
            }

            /* Main Content Area */
            .main-content {
                flex-grow: 1;
                margin-left: var(--sidebar-width);
                display: flex;
                flex-direction: column;
            }

            /* Navbar */
            .navbar {
                height: var(--navbar-height);
                background: var(--primary-bg);
                border-bottom: 1px solid var(--border-color);
                padding: 0 30px;
                display: flex;
                align-items: center;
                justify-content: space-between;
                position: sticky;
                top: 0;
                z-index: 90;
            }

            .search-bar {
                display: flex;
                align-items: center;
                background: var(--secondary-bg);
                border-radius: 8px;
                padding: 8px 15px;
                width: 300px;
            }

            .search-bar input {
                border: none;
                background: transparent;
                padding: 5px 10px;
                width: 100%;
                font-family: "Space Grotesk", sans-serif;
                font-size: 14px;
                color: var(--text-color);
                outline: none;
            }

            .navbar-actions {
                display: flex;
                align-items: center;
                gap: 20px;
            }

            .nav-action {
                width: 40px;
                height: 40px;
                border-radius: 8px;
                display: flex;
                align-items: center;
                justify-content: center;
                background: var(--secondary-bg);
                color: var(--text-color);
                text-decoration: none;
                position: relative;
                transition: all 0.3s;
            }

            .nav-action:hover {
                background: var(--accent-color);
                color: var(--text-color);
            }

            .notification-badge {
                position: absolute;
                top: -5px;
                right: -5px;
                background: #ff4757;
                color: white;
                font-size: 10px;
                width: 18px;
                height: 18px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            /* Content Area */
            .content {
                padding: 30px;
                flex-grow: 1;
                overflow-y: auto;
                background: var(--secondary-bg);
            }

            .page-header {
                margin-bottom: 5px;
            }
            
            .page-title::after {
                content: "";
                flex-grow: 1;
                height: 2px;
                background: linear-gradient(
                    90deg, 
                    rgba(0, 0, 0, 0.1),
                    #1a1a1a 25%, 
                    var(--accent-color) 45%, 
                    var(--accent-color) 55%, 
                    #1a1a1a 75%, 
                    rgba(0, 0, 0, 0.1)
                );
                margin-left: 15px;
                box-shadow: 0 0 10px rgba(255, 215, 0, 0.3);
            }
            .page-title::after {
                content: "";
                flex-grow: 1;
                height: 1px;
                background: var(--border-color);
            }

            .page-subtitle {
                color: #666;
                font-size: 16px;
                font-weight: 400;
            }

            /* Dashboard Stats - 5 cards yang selalu sejajar */
            .dashboard-stats {
                display: grid;
                grid-template-columns: repeat(5, 1fr);
                gap: 20px;
                margin-bottom: 30px;
            }

            /* Responsive untuk grid stats */
            @media (max-width: 1800px) {
                .dashboard-stats {
                    grid-template-columns: repeat(5, 1fr);
                }
            }

            @media (max-width: 1400px) {
                .dashboard-stats {
                    grid-template-columns: repeat(3, 1fr);
                }
            }

            @media (max-width: 1100px) {
                .dashboard-stats {
                    grid-template-columns: repeat(2, 1fr);
                }
            }

            @media (max-width: 768px) {
                .dashboard-stats {
                    grid-template-columns: 1fr;
                }
            }

            .stat-card {
                background: var(--primary-bg);
                border-radius: 12px;
                padding: 20px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
                display: flex;
                align-items: center;
                gap: 15px;
                transition: transform 0.3s, box-shadow 0.3s;
                min-width: 0;
                border-left: 4px solid; /* Border kiri tanpa warna spesifik */
                border: 1px solid var(--border-color);
                position: relative;
                overflow: hidden;
            }

            /* Warna border kiri yang berbeda untuk setiap card */
            .stat-card.traffic {
                border-left-color: #7e3af2; /* Ungu */
            }

            .stat-card.users {
                border-left-color: #0e9f6e; /* Hijau */
            }

            .stat-card.content {
                border-left-color: #ff5a1f; /* Oranye */
            }

            .stat-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            }

            /* Efek hover - border kiri menjadi lebih lebar */
            .stat-card:hover::before {
                content: "";
                position: absolute;
                left: 0;
                top: 0;
                bottom: 0;
                width: 6px; /* Lebar border saat hover */
                background: inherit;
            }

            .stat-icon {
                flex-shrink: 0;
                width: 60px;
                height: 60px;
                border-radius: 12px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 24px;
                background: rgba(255, 215, 0, 0.1);
                color: var(--accent-color);
            }

            .stat-info {
                flex-grow: 1;
                min-width: 0;
            }

            .stat-value {
                font-size: 28px;
                font-weight: 700;
                margin-bottom: 5px;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            .stat-label {
                color: #666;
                font-size: 14px;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            /* Konten lainnya */
            .content-section {
                background: var(--primary-bg);
                border-radius: 12px;
                padding: 25px;
                margin-bottom: 30px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            }

            .section-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 20px;
                padding-bottom: 15px;
                border-bottom: 1px solid var(--border-color);
            }

            .section-title {
                font-size: 20px;
                font-weight: 600;
            }

            .btn {
                padding: 10px 20px;
                background: var(--text-color);
                color: var(--primary-bg);
                border: none;
                border-radius: 8px;
                cursor: pointer;
                font-family: "Space Grotesk", sans-serif;
                font-weight: 500;
                transition: all 0.3s;
                display: inline-flex;
                align-items: center;
                gap: 8px;
                text-decoration: none;
            }

            .btn:hover {
                background: #333;
            }

            .btn-primary {
                background: var(--accent-color);
                color: var(--text-color);
            }

            .btn-primary:hover {
                background: #e6c300;
            }

            .table-container {
                overflow-x: auto;
                border-radius: 8px;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            th,
            td {
                padding: 15px;
                text-align: left;
                border-bottom: 1px solid var(--border-color);
            }

            th {
                font-weight: 600;
                color: #666;
                font-size: 14px;
                background-color: var(--secondary-bg);
            }

            tr:hover {
                background: var(--secondary-bg);
            }

            .status-badge {
                padding: 6px 12px;
                border-radius: 20px;
                font-size: 12px;
                font-weight: 500;
                display: inline-block;
            }

            .status-active {
                background: rgba(46, 213, 115, 0.2);
                color: #2ed573;
            }

            .status-pending {
                background: rgba(255, 165, 2, 0.2);
                color: #ffa502;
            }

            .status-draft {
                background: rgba(116, 125, 140, 0.2);
                color: #747d8c;
            }

            .action-buttons {
                display: flex;
                gap: 8px;
            }

            .action-btn {
                width: 34px;
                height: 34px;
                border-radius: 8px;
                display: flex;
                align-items: center;
                justify-content: center;
                text-decoration: none;
                transition: all 0.3s;
            }

            .action-btn:hover {
                transform: scale(1.1);
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

            .btn-view {
                background: rgba(46, 213, 115, 0.1);
                color: var(--view-color);
            }

            .btn-view:hover {
                background: var(--view-color);
                color: white;
            }

            .btn-edit {
                background: rgba(52, 152, 219, 0.1);
                color: var(--edit-color);
            }

            .btn-edit:hover {
                background: var(--edit-color);
                color: white;
            }

            .btn-delete {
                background: rgba(255, 71, 87, 0.1);
                color: var(--delete-color);
            }

            /* Improved Header Card Styles */
           .header-card {
                background: linear-gradient(135deg, var(--primary-bg) 0%, #f8f9fa 100%);
                border-radius: 16px;
                padding: 25px 30px;
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
                margin-bottom: 2em;
                position: relative;
                overflow: hidden;
            }

            .header-card::before {
                content: "";
                position: absolute;
                left: 0;
                top: 0;
                height: 100%;
                width: 5px;
                background: linear-gradient(
                    to bottom,
                    var(--accent-color) 0%,
                    var(--accent-color) 50%,
                    #1a1a1a 50%,
                    #1a1a1a 100%
                );
                border-radius: 1px 0 0 1px;
            }


            .welcome-container {
                position: relative;
                z-index: 2;
            }

            .welcome-content {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 20px;
            }

            .welcome-text {
                flex: 2;
            }

            .page-title {
                font-size: 2.2rem;
                font-weight: 800;
                margin-bottom: 10px;
                color: var(--text-color);
                display: flex;
                align-items: center;
                gap: 15px;
            }

            .page-title::after {
                content: "";
                flex-grow: 1;
                height: 2px;
                background: linear-gradient(
                    90deg,
                    transparent,
                    #1a1a1a 20%,
                    var(--accent-color) 40%,
                    var(--accent-color) 60%,
                    #1a1a1a 80%,
                    transparent
                );
                margin-left: 15px;
                border-radius: 2px;
                box-shadow: 0 0 10px rgba(255, 215, 0, 0.3);
            }

            .user-name {
                color: var(--accent-color);
                position: relative;
            }

            .user-name::after {
                content: '🎨';
                position: relative;
                margin-left: 5px;
            }

            .page-subtitle {
                color: #666;
                font-size: 1.1rem;
                margin-bottom: 25px;
                max-width: 600px;
                line-height: 1.5;
            }

            .welcome-stats {
                display: flex;
                gap: 20px;
                margin-top: 20px;
            }

            .welcome-stat {
                display: flex;
                align-items: center;
                background: rgba(255, 255, 255, 0.8);
                padding: 12px 15px;
                border-radius: 12px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
                border: 1px solid rgba(255, 215, 0, 0.2);
            }

            .welcome-stat .stat-icon {
                width: 40px;
                height: 40px;
                border-radius: 10px;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-right: 12px;
                background: rgba(255, 215, 0, 0.1);
                color: var(--accent-color);
                font-size: 16px;
            }

            .stat-details {
                display: flex;
                flex-direction: column;
            }

            .stat-value {
                font-size: 18px;
                font-weight: 700;
                color: var(--text-color);
            }

            .stat-label {
                font-size: 12px;
                color: #666;
                margin-top: 2px;
            }

            .welcome-visual {
                flex: 1;
                display: flex;
                justify-content: flex-end;
            }
            @keyframes pulse {
                0% { transform: scale(1); }
                50% { transform: scale(1.05); }
                100% { transform: scale(1); }
            }

            .floating-icons {
                position: absolute;
                width: 100%;
                height: 100%;
                animation: rotate 20s linear infinite;
            }

            /* ADD these missing styles for the new structure */
            .main-icon-container {
                position: relative;
                width: 80px;
                height: 80px;
                display: flex;
                justify-content: center;
                align-items: center;
                z-index: 2;
            }

            .main-icon.black-main {
                width: 60px;
                height: 60px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 24px;
            }

            .icon-ring {
                position: absolute;
                width: 80px;
                height: 80px;
                border-radius: 50%;
                animation: rotate 8s linear infinite;
                z-index: 1;
            }

            .icon-ring::before {
                content: '';
                position: absolute;
                width: 10px;
                height: 10px;
                border-radius: 50%;
                top: -5px;
                left: 50%;
                transform: translateX(-50%);
            }

            .floating-icon {
                position: absolute;
                width: 30px;
                height: 30px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 12px;
            }

            .floating-icon:nth-child(1) { top: 0; left: 50%; transform: translateX(-50%); }
            .floating-icon:nth-child(2) { top: 50%; right: 0; transform: translateY(-50%); }
            .floating-icon:nth-child(3) { bottom: 0; left: 50%; transform: translateX(-50%); }
            .floating-icon:nth-child(4) { top: 50%; left: 0; transform: translateY(-50%); }

            /* Black Theme for Visual Container */
            .visual-container.black-theme {
                background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 100%);
                border: 2px solid #333;
                border-radius: 20px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4),
                            inset 0 0 0 1px rgba(255, 215, 0, 0.1);
                padding: 15px;
            }

            /* Main Icon with Black Theme */
            .main-icon.black-main {
                background: linear-gradient(135deg, #000000 0%, #2d2d2d 100%);
                color: var(--accent-color);
                border: 2px solid var(--accent-color);
                box-shadow: 0 0 20px rgba(255, 215, 0, 0.3),
                            0 0 40px rgba(255, 215, 0, 0.1),
                            inset 0 0 15px rgba(255, 215, 0, 0.1);
                position: relative;
                z-index: 3;
            }

            .main-icon.black-main::before {
                content: '';
                position: absolute;
                top: -5px;
                left: -5px;
                right: -5px;
                bottom: -5px;
                border: 1px solid rgba(255, 215, 0, 0.3);
                border-radius: 50%;
                animation: pulse-glow 2s infinite;
            }

            @keyframes pulse-glow {
                0%, 100% { opacity: 0.5; }
                50% { opacity: 1; }
            }

            /* Icon Ring with Black Theme */
            .icon-ring.black-ring {
                border: 2px solid #333;
                box-shadow: 0 0 15px rgba(255, 215, 0, 0.2);
            }

            .icon-ring.black-ring::before {
                background: var(--accent-color);
                border: 2px solid #000;
                box-shadow: 0 0 8px var(--accent-color);
            }

            /* Icon Glow Effect */
            .icon-glow {
                position: absolute;
                width: 100%;
                height: 100%;
                border-radius: 50%;
                background: radial-gradient(circle, rgba(255,215,0,0.2) 0%, transparent 70%);
                animation: rotate-glow 10s linear infinite;
                z-index: 1;
            }

            @keyframes rotate-glow {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }

            /* Floating Icons with Black Theme */
            .floating-icon.black-floating {
                background: #000;
                color: var(--accent-color);
                border: 2px solid #333;
                box-shadow: 0 0 15px rgba(255, 215, 0, 0.3),
                            inset 0 0 10px rgba(255, 215, 0, 0.1);
                transition: all 0.3s ease;
            }

            .floating-icon.black-floating:hover {
                background: var(--accent-color);
                color: #000;
                border-color: var(--accent-color);
                box-shadow: 0 0 20px var(--accent-color),
                            inset 0 0 15px rgba(0, 0, 0, 0.2);
                transform: scale(1.2) !important;
            }

            /* Decoration Dots */
            .decoration-dots {
                position: absolute;
                width: 100%;
                height: 100%;
                pointer-events: none;
            }

            .dot {
                position: absolute;
                width: 4px;
                height: 4px;
                background: var(--accent-color);
                border-radius: 50%;
                opacity: 0.6;
                animation: twinkle 3s infinite alternate;
            }

            .dot:nth-child(1) { top: 20%; left: 20%; animation-delay: 0s; }
            .dot:nth-child(2) { top: 20%; right: 20%; animation-delay: 0.5s; }
            .dot:nth-child(3) { bottom: 20%; left: 20%; animation-delay: 1s; }
            .dot:nth-child(4) { bottom: 20%; right: 20%; animation-delay: 1.5s; }

            @keyframes twinkle {
                0%, 100% { opacity: 0.3; transform: scale(1); }
                50% { opacity: 1; transform: scale(1.5); }
            }

            /* Enhanced Animations for Black Theme */
            @keyframes float-black {
                0%, 100% { 
                    transform: translate(0, 0) scale(1);
                    box-shadow: 0 0 15px rgba(255, 215, 0, 0.3);
                }
                50% { 
                    transform: translate(0, -8px) scale(1.1);
                    box-shadow: 0 0 25px var(--accent-color);
                }
            }

            .floating-icon.black-floating {
                animation: float-black 4s infinite ease-in-out;
            }

            .floating-icon.black-floating:nth-child(1) { animation-delay: 0s; }
            .floating-icon.black-floating:nth-child(2) { animation-delay: 1s; }
            .floating-icon.black-floating:nth-child(3) { animation-delay: 2s; }
            .floating-icon.black-floating:nth-child(4) { animation-delay: 3s; }

            /* Main Icon Pulse Animation for Black Theme */
            @keyframes pulse-black {
                0%, 100% { 
                    transform: scale(1);
                    box-shadow: 0 0 20px rgba(255, 215, 0, 0.3);
                }
                50% { 
                    transform: scale(1.05);
                    box-shadow: 0 0 30px rgba(255, 215, 0, 0.5);
                }
            }

            .main-icon.black-main {
                animation: pulse-black 3s infinite ease-in-out;
            }

            /* Responsive Adjustments for Black Theme */
            @media (max-width: 768px) {
                .visual-container.black-theme {
                    padding: 12px;
                }
                
                .main-icon.black-main {
                    width: 50px;
                    height: 50px;
                    font-size: 20px;
                }
                
                .floating-icon.black-floating {
                    width: 25px;
                    height: 25px;
                    font-size: 10px;
                }
                
                .dot {
                    width: 3px;
                    height: 3px;
                }
            }

            @media (max-width: 480px) {
                .visual-container.black-theme {
                    padding: 10px;
                    border-radius: 15px;
                }
                
                .main-icon.black-main {
                    width: 40px;
                    height: 40px;
                    font-size: 16px;
                }
                
                .floating-icon.black-floating {
                    width: 20px;
                    height: 20px;
                    font-size: 8px;
                }
            }

            @keyframes rotate {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }

            .quick-actions-header {
                display: flex;
                gap: 15px;
                margin: 25px 0;
                padding-top: 20px;
                border-top: 1px solid rgba(0, 0, 0, 0.1);
            }

            .quick-action-btn {
                display: flex;
                align-items: center;
                gap: 8px;
                padding: 10px 18px;
                background: white;
                border: 1px solid var(--border-color);
                border-radius: 10px;
                color: var(--text-color);
                font-weight: 500;
                cursor: pointer;
                transition: all 0.3s ease;
                position: relative;
            }

            .quick-action-btn:hover {
                background: var(--accent-color);
                color: var(--text-color);
                transform: translateY(-2px);
                box-shadow: 0 6px 15px rgba(255, 215, 0, 0.3);
                border-color: var(--accent-color);
            }

            .notification-count {
                position: absolute;
                top: -8px;
                right: -8px;
                background: #ff4757;
                color: white;
                font-size: 10px;
                width: 20px;
                height: 20px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-weight: 600;
            }

            .date-info {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding-top: 15px;
                border-top: 1px solid rgba(0, 0, 0, 0.05);
                font-size: 14px;
                color: #666;
            }

            .current-date, .last-login {
                display: flex;
                align-items: center;
                gap: 8px;
            }

            /* Responsive Design */
            @media (max-width: 992px) {
                .welcome-content {
                    flex-direction: column;
                    text-align: center;
                }
                
                .welcome-visual {
                    margin-top: 25px;
                    justify-content: center;
                }
                
                .welcome-stats {
                    justify-content: center;
                    flex-wrap: wrap;
                }
                
                .quick-actions-header {
                    flex-wrap: wrap;
                    justify-content: center;
                }
            }

            @media (max-width: 768px) {
                .header-card {
                    padding: 20px;
                }
                
                .page-title {
                    font-size: 1.8rem;
                    flex-direction: column;
                    gap: 10px;
                }
                
                .page-title::after {
                    width: 100%;
                    margin-top: 10px;
                }
                
                .welcome-stats {
                    flex-direction: column;
                    align-items: center;
                }
                
                .welcome-stat {
                    width: 100%;
                    max-width: 250px;
                }
                
                .date-info {
                    flex-direction: column;
                    gap: 10px;
                    align-items: flex-start;
                }
            }

            @media (max-width: 480px) {
                .page-title {
                    font-size: 1.5rem;
                }
                
                .visual-container {
                    width: 90px;
                    height: 90px;
                }
                
                .main-icon {
                    font-size: 30px;
                }
                
                .floating-icons i {
                    width: 25px;
                    height: 25px;
                    font-size: 12px;
                }
            }

            .btn-delete:hover {
                background: var(--delete-color);
                color: white;
            }

            /* Chart container */
            .chart-container {
                display: grid;
                grid-template-columns: 2fr 1fr;
                gap: 20px;
                margin-bottom: 30px;
            }

            @media (max-width: 1200px) {
                .chart-container {
                    grid-template-columns: 1fr;
                }
            }

            .chart {
                background: var(--primary-bg);
                border-radius: 12px;
                padding: 20px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            }

            .chart-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 20px;
            }

            .chart-title {
                font-size: 18px;
                font-weight: 600;
            }

            .chart-options {
                display: flex;
                align-items: center;
                gap: 10px;
            }

            .chart-select {
                padding: 8px 12px;
                border-radius: 6px;
                border: 1px solid var(--border-color);
                background: var(--primary-bg);
                font-family: "Space Grotesk", sans-serif;
                font-size: 14px;
                color: var(--text-color);
                outline: none;
                cursor: pointer;
            }

            .chart-select:focus {
                border-color: var(--accent-color);
            }

            .recent-activity {
                background: var(--primary-bg);
                border-radius: 12px;
                padding: 20px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            }

            .activity-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 20px;
            }

            .view-all-link {
                color: var(--accent-color);
                text-decoration: none;
                font-weight: 500;
                font-size: 14px;
            }

            .activity-list {
                list-style: none;
            }

            .activity-item {
                display: flex;
                padding: 15px 0;
                border-bottom: 1px solid var(--border-color);
            }

            .activity-item:last-child {
                border-bottom: none;
            }

            .activity-icon {
                width: 40px;
                height: 40px;
                border-radius: 10px;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-right: 15px;
                background: rgba(255, 215, 0, 0.1);
                color: var(--accent-color);
            }

            .activity-content {
                flex-grow: 1;
            }

            .activity-title {
                font-weight: 500;
                margin-bottom: 5px;
            }

            .activity-time {
                font-size: 12px;
                color: #888;
            }

            .quick-actions {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 15px;
                margin-top: 20px;
            }

            .quick-action-btn {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                padding: 25px 15px;
                background: var(--primary-bg);
                border-radius: 12px;
                text-decoration: none;
                color: var(--text-color);
                transition: all 0.3s;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            }

            .quick-action-btn:hover {
                transform: translateY(-5px);
                background: var(--accent-color);
                color: var(--text-color);
                box-shadow: 0 8px 20px rgba(255, 215, 0, 0.3);
            }

            .quick-action-icon {
                font-size: 28px;
                margin-bottom: 12px;
            }

            .quick-action-text {
                font-weight: 500;
                font-size: 14px;
                text-align: center;
            }

            .chart-canvas-container {
                position: relative;
                height: 300px;
                width: 100%;
            }

            /* Responsive untuk mobile */
            .menu-toggle {
                display: none;
                background: none;
                border: none;
                font-size: 24px;
                cursor: pointer;
                color: var(--text-color);
            }

            @media (max-width: 992px) {
                .sidebar {
                    transform: translateX(-100%);
                    transition: transform 0.3s ease;
                }

                .sidebar.active {
                    transform: translateX(0);
                }

                .main-content {
                    margin-left: 0;
                }

                .menu-toggle {
                    display: block;
                }

                .navbar {
                    padding: 0 15px;
                }

                .content {
                    padding: 15px;
                }

                .search-bar {
                    width: 200px;
                }
            }

            @media (max-width: 576px) {
                .section-header {
                    flex-direction: column;
                    align-items: flex-start;
                    gap: 15px;
                }

                .chart-header {
                    flex-direction: column;
                    align-items: flex-start;
                    gap: 15px;
                }

                .activity-header {
                    flex-direction: column;
                    align-items: flex-start;
                    gap: 10px;
                }

                .search-bar {
                    display: none;
                }
            }

            /* Filtering Options Improvements */
            .filter-options {
                display: flex;
                flex-wrap: wrap;
                gap: 20px;
                margin-bottom: 20px;
                align-items: center;
            }

            .filter-tabs {
                display: flex;
                flex-wrap: wrap;
                gap: 10px;
            }

            .filter-tab {
                padding: 8px 16px;
                background: var(--secondary-bg);
                border: none;
                border-radius: 20px;
                font-family: "Space Grotesk", sans-serif;
                font-size: 14px;
                cursor: pointer;
                transition: all 0.3s;
            }

            .filter-tab:hover,
            .filter-tab.active {
                background: var(--accent-color);
                color: var(--text-color);
                transform: translateY(-2px);
                box-shadow: 0 4px 8px rgba(255, 215, 0, 0.3);
            }

            .filter-search {
                display: flex;
                align-items: center;
                gap: 15px;
            }

            .search-input-with-icon {
                position: relative;
                display: flex;
                align-items: center;
                background: var(--primary-bg);
                border: 1px solid var(--border-color);
                border-radius: 8px;
                overflow: hidden;
            }

            .search-input-with-icon i {
                padding: 0 12px;
                color: #888;
            }

            .search-input-with-icon input {
                border: none;
                padding: 10px 0;
                width: 250px;
                font-family: "Space Grotesk", sans-serif;
                outline: none;
            }

            .search-btn {
                background: var(--accent-color);
                color: var(--text-color);
                border: none;
                padding: 10px 15px;
                cursor: pointer;
                font-family: "Space Grotesk", sans-serif;
                font-weight: 500;
                transition: background 0.3s;
            }

            .search-btn:hover {
                background: #e6c300;
            }

            .filter-reset {
                background: transparent;
                border: 1px solid var(--border-color);
                color: #666;
                padding: 8px 12px;
                border-radius: 6px;
                cursor: pointer;
                font-family: "Space Grotesk", sans-serif;
                font-size: 14px;
                transition: all 0.3s;
            }

            .filter-reset:hover {
                background: var(--secondary-bg);
                color: var(--text-color);
            }

            .filter-results {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-top: 15px;
                padding: 15px;
                background: var(--secondary-bg);
                border-radius: 8px;
            }

            /* Activities Grid Styles */
            .activities-grid {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
                gap: 20px;
                margin-top: 25px;
            }

            .activity-card {
                background: var(--primary-bg);
                border-radius: 12px;
                overflow: hidden;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
                transition: all 0.3s ease;
                position: relative;
            }

            .activity-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            }

            .activity-image {
                position: relative;
                height: 180px;
                overflow: hidden;
            }

            .activity-image img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.5s ease;
            }

            .activity-card:hover .activity-image img {
                transform: scale(1.05);
            }

            .activity-overlay {
                position: absolute;
                bottom: 0;
                left: 0;
                right: 0;
                background: linear-gradient(transparent, rgba(0, 0, 0, 0.7));
                padding: 15px;
                display: flex;
                gap: 10px;
                opacity: 0;
                transition: opacity 0.3s ease;
            }

            .activity-card:hover .activity-overlay {
                opacity: 1;
            }

            .activity-info {
                padding: 15px;
            }

            .activity-type-badge {
                position: absolute;
                top: 15px;
                right: 15px;
                padding: 5px 10px;
                border-radius: 15px;
                font-size: 11px;
                font-weight: 600;
                text-transform: uppercase;
                z-index: 2;
            }

            .post-badge {
                background: rgba(52, 152, 219, 0.9);
                color: white;
            }

            .event-badge {
                background: rgba(231, 76, 60, 0.9);
                color: white;
            }

            .project-badge {
                background: rgba(46, 204, 113, 0.9);
                color: white;
            }

            .community-badge {
                background: rgba(155, 89, 182, 0.9);
                color: white;
            }

            .activity-info h4 {
                margin: 10px 0 5px;
                font-size: 16px;
                line-height: 1.3;
            }

            .activity-info p {
                color: #666;
                font-size: 14px;
                margin-bottom: 12px;
            }

            .activity-meta {
                display: flex;
                justify-content: space-between;
                font-size: 12px;
                color: #888;
            }

            .activities-load-more {
                text-align: center;
                margin-top: 30px;
            }

            /* Responsive adjustments */
            @media (max-width: 768px) {
                .activities-grid {
                    grid-template-columns: 1fr;
                }

                .activity-card {
                    max-width: 400px;
                    margin: 0 auto;
                }
            }

            .results-count {
                font-size: 14px;
                color: #666;
            }

            .results-count span {
                font-weight: 600;
                color: var(--text-color);
            }

            .sort-options {
                display: flex;
                align-items: center;
                gap: 10px;
            }

            .sort-options label {
                font-size: 14px;
                color: #666;
            }

            .sort-select {
                padding: 6px 10px;
                border-radius: 6px;
                border: 1px solid var(--border-color);
                background: var(--primary-bg);
                font-family: "Space Grotesk", sans-serif;
                font-size: 14px;
                color: var(--text-color);
                outline: none;
                cursor: pointer;
            }

            /* Gallery Filter Improvements */
            .gallery-filter-options {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 20px;
                flex-wrap: wrap;
                gap: 15px;
            }

            .gallery-filter-tabs {
                display: flex;
                flex-wrap: wrap;
                gap: 10px;
            }

            .gallery-filter-tab {
                padding: 8px 16px;
                background: var(--secondary-bg);
                border: none;
                border-radius: 20px;
                font-family: "Space Grotesk", sans-serif;
                font-size: 14px;
                cursor: pointer;
                transition: all 0.3s;
            }

            .gallery-filter-tab:hover,
            .gallery-filter-tab.active {
                background: var(--accent-color);
                color: var(--text-color);
                transform: translateY(-2px);
                box-shadow: 0 4px 8px rgba(255, 215, 0, 0.3);
            }

            .gallery-search {
                display: flex;
                align-items: center;
            }

            .gallery-search input {
                padding: 8px 12px;
                border: 1px solid var(--border-color);
                border-radius: 6px 0 0 6px;
                font-family: "Space Grotesk", sans-serif;
                outline: none;
                width: 200px;
            }

            .gallery-search .search-btn {
                border-radius: 0 6px 6px 0;
                padding: 8px 12px;
            }

            /* Gallery Grid Improvements - 3 columns */
            .gallery-grid {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 20px;
                margin-bottom: 20px;
            }

            .gallery-item {
                background: var(--primary-bg);
                border-radius: 12px;
                overflow: hidden;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
                transition: all 0.3s;
                position: relative;
                display: flex;
                flex-direction: column;
                height: 100%;
                transform: translateY(0);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .gallery-item:hover {
                transform: translateY(-5px);
                box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
            }


            .gallery-image {
                position: relative;
                height: 200px;
                overflow: hidden;
                flex-shrink: 0;
                /* Prevent image from shrinking */
            }

            .gallery-image img {
                transition: transform 0.5s ease;
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .gallery-info {
                padding: 15px;
                flex-grow: 1;
                /* Allow info section to grow */
                display: flex;
                flex-direction: column;
            }

            .gallery-info h4 {
                margin-bottom: 8px;
                font-size: 16px;
                line-height: 1.3;
            }

            .gallery-info p {
                color: #666;
                font-size: 14px;
                margin-bottom: 12px;
            }

            .gallery-meta {
                margin-top: auto;
                /* Push meta to bottom */
                display: flex;
                justify-content: space-between;
                font-size: 12px;
                color: #888;
            }

            /* Responsive adjustments for gallery grid */
            @media (max-width: 1200px) {
                .gallery-grid {
                    grid-template-columns: repeat(2, 1fr);
                }
            }

            @media (max-width: 768px) {
                .gallery-grid {
                    grid-template-columns: 1fr;
                }

                .gallery-item {
                    max-width: 400px;
                    margin: 0 auto;
                }
            }

            .btn-icon {
                background: rgba(255, 255, 255, 0.2);
                color: white;
                border: none;
                border-radius: 20px;
                padding: 5px 12px;
                backdrop-filter: blur(10px);
                font-size: 12px;
                cursor: pointer;
                transition: background 0.3s;
            }

            .btn-icon:hover {
                background: rgba(255, 255, 255, 0.3);
            }

            .view-btn {
                margin-left: auto;
            }

            .gallery-info {
                padding: 15px;
            }

            .gallery-info h4 {
                margin-bottom: 5px;
                font-size: 16px;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            .gallery-info p {
                color: #666;
                font-size: 14px;
                margin-bottom: 10px;
            }

            .gallery-meta {
                display: flex;
                justify-content: space-between;
                font-size: 12px;
                color: #888;
            }

            .gallery-overlay {
                position: absolute;
                bottom: 0;
                left: 0;
                right: 0;
                background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
                padding: 20px 15px 15px;
                display: flex;
                gap: 10px;
                opacity: 0;
                transition: opacity 0.3s ease;
                flex-wrap: wrap;
            }

            .gallery-item:hover .gallery-overlay {
                opacity: 1;
            }

            /* Load more button styling */
            .gallery-load-more {
                text-align: center;
                margin-top: 40px;
                grid-column: 1 / -1;
                /* Span across all columns */
            }

            .btn-outline {
                background: transparent;
                border: 2px solid var(--accent-color);
                color: var(--accent-color);
                padding: 12px 25px;
                border-radius: 8px;
                cursor: pointer;
                font-family: "Space Grotesk", sans-serif;
                font-weight: 500;
                transition: all 0.3s ease;
                display: inline-flex;
                align-items: center;
                gap: 8px;
            }

            .btn-outline:hover {
                background: var(--accent-color);
                color: var(--text-color);
                transform: translateY(-2px);
                box-shadow: 0 6px 15px rgba(255, 215, 0, 0.3);
            }

            /* Responsive design for gallery */
            @media (max-width: 1400px) {
                .gallery-grid {
                    grid-template-columns: repeat(3, 1fr);
                }
            }

            @media (max-width: 1200px) {
                .gallery-grid {
                    grid-template-columns: repeat(2, 1fr);
                }
            }

            @media (max-width: 900px) {
                .gallery-grid {
                    grid-template-columns: repeat(2, 1fr);
                    gap: 15px;
                }

                .gallery-image {
                    height: 180px;
                }
            }

            @media (max-width: 650px) {
                .gallery-grid {
                    grid-template-columns: 1fr;
                    max-width: 400px;
                    margin: 0 auto;
                }

                .gallery-item {
                    margin-bottom: 15px;
                }
            }

            @media (max-width: 480px) {
                .gallery-grid {
                    grid-template-columns: 1fr;
                }

                .gallery-image {
                    height: 160px;
                }

                .gallery-info {
                    padding: 12px;
                }

                .gallery-info h4 {
                    font-size: 15px;
                }
            }

            /* Responsive adjustments */
            @media (max-width: 768px) {

                .filter-options,
                .gallery-filter-options {
                    flex-direction: column;
                    align-items: flex-start;
                }

                .filter-tabs,
                .gallery-filter-tabs {
                    overflow-x: auto;
                    width: 100%;
                    padding-bottom: 10px;
                }

                .filter-search {
                    width: 100%;
                    justify-content: space-between;
                }

                .search-input-with-icon {
                    flex-grow: 1;
                }

                .search-input-with-icon input {
                    width: 100%;
                }

                .filter-results {
                    flex-direction: column;
                    gap: 15px;
                    align-items: flex-start;
                }

                .gallery-search input {
                    width: 150px;
                }
            }

            /* Events Grid */
            .events-grid {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
                gap: 20px;
            }

            .event-card {
                display: flex;
                align-items: center;
                background: var(--primary-bg);
                border-radius: 12px;
                padding: 20px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
                transition: transform 0.3s;
            }

            .event-card:hover {
                transform: translateY(-5px);
            }

            .event-date {
                text-align: center;
                margin-right: 15px;
                flex-shrink: 0;
            }

            .event-day {
                font-size: 24px;
                font-weight: 700;
                color: var(--accent-color);
            }

            .event-month {
                font-size: 14px;
                text-transform: uppercase;
                font-weight: 600;
            }

            .event-info h4 {
                margin-bottom: 5px;
                font-size: 16px;
            }

            .event-info p {
                color: #666;
                font-size: 14px;
                margin-bottom: 10px;
            }

            .event-meta {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            /* Popular Items */
            .popular-grid {
                display: flex;
                flex-direction: column;
                gap: 15px;
            }

            .popular-item {
                display: flex;
                align-items: center;
                padding: 15px;
                background: var(--primary-bg);
                border-radius: 12px;
                transition: transform 0.3s;
            }

            .popular-item:hover {
                transform: translateX(5px);
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            }

            .popular-rank {
                width: 30px;
                height: 30px;
                border-radius: 50%;
                background: var(--accent-color);
                color: var(--text-color);
                display: flex;
                align-items: center;
                justify-content: center;
                font-weight: 700;
                margin-right: 15px;
                flex-shrink: 0;
            }

            .popular-image {
                width: 60px;
                height: 60px;
                border-radius: 8px;
                overflow: hidden;
                margin-right: 15px;
                flex-shrink: 0;
            }

            .popular-image img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .popular-info {
                flex-grow: 1;
            }

            .popular-info h4 {
                margin-bottom: 5px;
                font-size: 16px;
            }

            .popular-info p {
                color: #666;
                font-size: 14px;
                margin-bottom: 5px;
            }

            .popular-stats {
                display: flex;
                gap: 15px;
                font-size: 12px;
                color: #888;
            }

            /* Analytics Widgets */
            .analytics-widgets {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 20px;
            }

            .analytics-widget {
                background: var(--primary-bg);
                border-radius: 12px;
                padding: 20px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            }

            .widget-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 15px;
            }

            .widget-header h3 {
                font-size: 16px;
                font-weight: 600;
            }

            .widget-header i {
                font-size: 24px;
                color: var(--accent-color);
            }

            .widget-value {
                font-size: 28px;
                font-weight: 700;
                margin-bottom: 5px;
            }

            .widget-change {
                font-size: 14px;
                font-weight: 600;
                margin-bottom: 5px;
            }

            .widget-change.positive {
                color: #2ed573;
            }

            .widget-change.negative {
                color: #ff4757;
            }

            .widget-label {
                font-size: 12px;
                color: #888;
            }

            /* Responsive adjustments */
            @media (max-width: 768px) {
                .filter-options {
                    flex-direction: column;
                }

                .filter-tabs {
                    overflow-x: auto;
                    padding-bottom: 10px;
                }

                .search-input-with-icon {
                    max-width: 100%;
                }

                .gallery-grid,
                .events-grid,
                .analytics-widgets {
                    grid-template-columns: 1fr;
                }

                .event-card {
                    flex-direction: column;
                    text-align: center;
                }

                .event-date {
                    margin-right: 0;
                    margin-bottom: 15px;
                }

                .event-meta {
                    flex-direction: column;
                    gap: 10px;
                }
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            // Visitor Chart
            const ctx = document.getElementById('visitorChart').getContext('2d');
            let visitorChart;

            // Function to update chart based on selected period
            function updateChart(period) {
                let labels, data;

                if (period === 'week') {
                    labels = ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'];
                    data = [120, 150, 180, 90, 200, 170, 220];
                } else if (period === 'month') {
                    labels = ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4'];
                    data = [650, 800, 720, 950];
                } else {
                    labels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
                    data = [1200, 1500, 1800, 2100, 2400, 2800, 3000, 3200, 2900, 3100, 3300, 3500];
                }

                if (visitorChart) {
                    visitorChart.destroy();
                }

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
                            legend: {
                                display: false
                            },
                            tooltip: {
                                backgroundColor: 'rgba(0, 0, 0, 0.7)',
                                titleFont: {
                                    family: '"Space Grotesk", sans-serif'
                                },
                                bodyFont: {
                                    family: '"Space Grotesk", sans-serif'
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: {
                                    color: 'rgba(0, 0, 0, 0.05)'
                                }
                            },
                            x: {
                                grid: {
                                    display: false
                                }
                            }
                        }
                    }
                });
            }

            // Initialize chart with default period
            document.addEventListener('DOMContentLoaded', function() {
                updateChart('week');

                // Add event listener for period change
                document.getElementById('chart-period').addEventListener('change', function() {
                    updateChart(this.value);
                });

                // Toggle sidebar on mobile
                document.querySelector('.menu-toggle').addEventListener('click', function() {
                    document.querySelector('.sidebar').classList.toggle('active');
                });

                // Highlight active nav item
                const navItems = document.querySelectorAll('.nav-item');
                navItems.forEach(item => {
                    item.addEventListener('click', function() {
                        navItems.forEach(i => i.classList.remove('active'));
                        this.classList.add('active');
                    });
                });

                // Animate stat cards on hover
                const statCards = document.querySelectorAll('.stat-card');
                statCards.forEach(card => {
                    card.addEventListener('mouseenter', function() {
                        this.style.transform = 'translateY(-5px)';
                    });

                    card.addEventListener('mouseleave', function() {
                        this.style.transform = 'translateY(0)';
                    });
                });
            });

            // Growth Chart
            const growthCtx = document.getElementById('growthChart').getContext('2d');
            let growthChart;

            function updateGrowthChart(period) {
                let labels, data;

                if (period === 'month') {
                    labels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
                    data = [120, 150, 180, 210, 240, 280, 300, 320, 350, 380, 400, 420];
                } else if (period === 'quarter') {
                    labels = ['Q1', 'Q2', 'Q3', 'Q4'];
                    data = [450, 520, 580, 650];
                } else {
                    labels = ['2020', '2021', '2022', '2023'];
                    data = [1200, 1850, 2450, 3200];
                }

                if (growthChart) {
                    growthChart.destroy();
                }

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
                        plugins: {
                            legend: {
                                display: false
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: {
                                    color: 'rgba(0, 0, 0, 0.05)'
                                }
                            },
                            x: {
                                grid: {
                                    display: false
                                }
                            }
                        }
                    }
                });
            }

            // Initialize growth chart
            document.addEventListener('DOMContentLoaded', function() {
                updateGrowthChart('month');

                // Add event listener for period change
                document.getElementById('growth-period').addEventListener('change', function() {
                    updateGrowthChart(this.value);
                });

                // Filter tabs functionality
                const filterTabs = document.querySelectorAll('.filter-tab');
                filterTabs.forEach(tab => {
                    tab.addEventListener('click', function() {
                        filterTabs.forEach(t => t.classList.remove('active'));
                        this.classList.add('active');
                        // Here you would filter activities based on data-category
                        const category = this.getAttribute('data-category');
                        console.log('Filter by:', category);
                    });
                });
            });

            // Filtering functionality
            document.addEventListener('DOMContentLoaded', function() {
                // Activity filtering
                const activityFilterTabs = document.querySelectorAll('.filter-tab');
                const activitySearchInput = document.getElementById('activity-search');
                const searchButton = document.getElementById('search-button');
                const resetButton = document.getElementById('reset-filters');
                const sortSelect = document.getElementById('sort-by');
                const resultsNumber = document.getElementById('results-number');
                const totalResults = document.getElementById('total-results');

                // Gallery filtering
                const galleryFilterTabs = document.querySelectorAll('.gallery-filter-tab');
                const gallerySearchInput = document.getElementById('gallery-search');
                const galleryContainer = document.getElementById('gallery-container');
                const galleryItems = document.querySelectorAll('.gallery-item');
                const loadMoreButton = document.getElementById('load-more');

                let visibleGalleryItems = 3;

                // Initialize the gallery with grid layout
                function initializeGallery() {
                    // Show first 6 items (2 rows) initially for better UX
                    visibleGalleryItems = 6;

                    const activeCategoryTab = document.querySelector('.gallery-filter-tab.active');
                    const category = activeCategoryTab.getAttribute('data-category');

                    filterGallery(category, '');
                }

                // Initialize the gallery when page loads
                document.addEventListener('DOMContentLoaded', function() {
                    initializeGallery();

                    // Other initialization code...
                });

                // Filter gallery items
                function filterGallery(category, searchTerm) {
                    let visibleCount = 0;
                    const allItems = Array.from(galleryItems);

                    // First hide all items
                    galleryItems.forEach(item => {
                        item.style.display = 'none';
                    });

                    // Filter and show matching items
                    const matchingItems = allItems.filter(item => {
                        const itemCategory = item.getAttribute('data-category');
                        const itemTitle = item.getAttribute('data-title').toLowerCase();
                        const itemAuthor = item.getAttribute('data-author').toLowerCase();

                        const matchesCategory = category === 'all' || itemCategory === category;
                        const matchesSearch = searchTerm === '' ||
                            itemTitle.includes(searchTerm) ||
                            itemAuthor.includes(searchTerm);

                        return matchesCategory && matchesSearch;
                    });

                    // Show items up to visibleGalleryItems limit
                    matchingItems.slice(0, visibleGalleryItems).forEach(item => {
                        item.style.display = 'block';
                        visibleCount++;
                    });

                    // Show or hide load more button
                    if (matchingItems.length > visibleGalleryItems) {
                        loadMoreButton.style.display = 'block';
                    } else {
                        loadMoreButton.style.display = 'none';
                    }

                    // Update results count
                    resultsNumber.textContent = visibleCount;
                    totalResults.textContent = matchingItems.length;

                    // If no items match, show message
                    if (matchingItems.length === 0) {
                        const noResults = document.createElement('div');
                        noResults.className = 'no-results';
                        noResults.innerHTML = `
                            <div style="text-align: center; padding: 40px; color: #666;">
                                <i class="fas fa-search" style="font-size: 48px; margin-bottom: 15px;"></i>
                                <h3>Tidak ada hasil ditemukan</h3>
                                <p>Coba gunakan kata kunci lain atau filter yang berbeda</p>
                            </div>
                        `;

                        // Remove previous no results message if exists
                        const existingNoResults = galleryContainer.querySelector('.no-results');
                        if (existingNoResults) {
                            existingNoResults.remove();
                        }

                        galleryContainer.appendChild(noResults);
                    } else {
                        // Remove no results message if it exists
                        const noResults = galleryContainer.querySelector('.no-results');
                        if (noResults) {
                            noResults.remove();
                        }
                    }
                }

                // Activity filter tabs
                activityFilterTabs.forEach(tab => {
                    tab.addEventListener('click', function() {
                        activityFilterTabs.forEach(t => t.classList.remove('active'));
                        this.classList.add('active');

                        const category = this.getAttribute('data-category');
                        const searchTerm = activitySearchInput.value.toLowerCase();

                        // Here you would filter activities based on category and search term
                        console.log('Filter activities by:', category, 'Search:', searchTerm);

                        // For demo purposes, we'll just update the results count
                        resultsNumber.textContent = Math.floor(Math.random() * 5) + 1;
                    });
                });

                // Gallery filter tabs
                galleryFilterTabs.forEach(tab => {
                    tab.addEventListener('click', function() {
                        galleryFilterTabs.forEach(t => t.classList.remove('active'));
                        this.classList.add('active');

                        const category = this.getAttribute('data-category');
                        const searchTerm = gallerySearchInput.value.toLowerCase();

                        filterGallery(category, searchTerm);
                    });
                });

                // Search functionality
                searchButton.addEventListener('click', function() {
                    const activeCategoryTab = document.querySelector('.filter-tab.active');
                    const category = activeCategoryTab.getAttribute('data-category');
                    const searchTerm = activitySearchInput.value.toLowerCase();

                    console.log('Search activities:', searchTerm, 'Category:', category);

                    // For demo purposes, we'll just update the results count
                    resultsNumber.textContent = Math.floor(Math.random() * 5) + 1;
                });

                // Gallery search
                gallerySearchInput.addEventListener('input', function() {
                    const activeCategoryTab = document.querySelector('.gallery-filter-tab.active');
                    const category = activeCategoryTab.getAttribute('data-category');
                    const searchTerm = this.value.toLowerCase();

                    filterGallery(category, searchTerm);
                });

                // Reset filters
                resetButton.addEventListener('click', function() {
                    activityFilterTabs.forEach(tab => tab.classList.remove('active'));
                    document.querySelector('.filter-tab[data-category="all"]').classList.add('active');

                    activitySearchInput.value = '';
                    sortSelect.value = 'newest';

                    console.log('Filters reset');

                    // For demo purposes, we'll just update the results count
                    resultsNumber.textContent = '6';
                    totalResults.textContent = '15';
                });

                // Load more functionality
                loadMoreButton.addEventListener('click', function() {
                    visibleGalleryItems += 3; // Load 3 more items (one full row)

                    const activeCategoryTab = document.querySelector('.gallery-filter-tab.active');
                    const category = activeCategoryTab.getAttribute('data-category');
                    const searchTerm = gallerySearchInput.value.toLowerCase();

                    filterGallery(category, searchTerm);

                    // Scroll to the newly loaded items
                    const lastVisibleItem = document.querySelector(
                        '.gallery-item[style="display: block"]:last-child');
                    if (lastVisibleItem) {
                        lastVisibleItem.scrollIntoView({
                            behavior: 'smooth',
                            block: 'nearest'
                        });
                    }
                });

                // Initialize the gallery
                initializeGallery();
            });

            // Activities Filtering and Sorting functionality
            document.addEventListener('DOMContentLoaded', function() {
                // Elements
                const activityFilterTabs = document.querySelectorAll('.filter-tab');
                const activitySearchInput = document.getElementById('activity-search');
                const searchButton = document.getElementById('search-button');
                const resetButton = document.getElementById('reset-filters');
                const sortSelect = document.getElementById('sort-by');
                const resultsNumber = document.getElementById('results-number');
                const totalResults = document.getElementById('total-results');
                const activitiesContainer = document.getElementById('activities-container');
                const activityCards = document.querySelectorAll('.activity-card');
                const loadMoreBtn = document.getElementById('load-more-activities');

                let visibleActivities = 8;
                let allActivities = Array.from(activityCards);

                // Initialize activities
                function initializeActivities() {
                    filterAndSortActivities();
                }

                // Filter and sort activities
                function filterAndSortActivities() {
                    const activeCategory = document.querySelector('.filter-tab.active').getAttribute('data-category');
                    const searchTerm = activitySearchInput.value.toLowerCase();
                    const sortBy = sortSelect.value;

                    // Filter by category and search term
                    let filteredActivities = allActivities.filter(card => {
                        const category = card.getAttribute('data-category');
                        const title = card.querySelector('h4').textContent.toLowerCase();
                        const author = card.querySelector('p').textContent.toLowerCase();

                        const matchesCategory = activeCategory === 'all' || category === activeCategory;
                        const matchesSearch = searchTerm === '' ||
                            title.includes(searchTerm) ||
                            author.includes(searchTerm);

                        return matchesCategory && matchesSearch;
                    });

                    // Sort activities
                    filteredActivities = sortActivities(filteredActivities, sortBy);

                    // Update total results
                    totalResults.textContent = filteredActivities.length;

                    // Show/hide activities
                    let visibleCount = 0;
                    activityCards.forEach(card => card.style.display = 'none');

                    filteredActivities.slice(0, visibleActivities).forEach(card => {
                        card.style.display = 'block';
                        visibleCount++;
                    });

                    resultsNumber.textContent = visibleCount;

                    // Show/hide load more button
                    if (filteredActivities.length > visibleActivities) {
                        loadMoreBtn.style.display = 'block';
                    } else {
                        loadMoreBtn.style.display = 'none';
                    }

                    // Show no results message if needed
                    showNoResultsMessage(filteredActivities.length === 0);
                }

                // Sort activities based on selected option
                function sortActivities(activities, sortBy) {
                    return activities.sort((a, b) => {
                        switch (sortBy) {
                            case 'newest':
                                return parseInt(b.getAttribute('data-date')) - parseInt(a.getAttribute(
                                    'data-date'));
                            case 'oldest':
                                return parseInt(a.getAttribute('data-date')) - parseInt(b.getAttribute(
                                    'data-date'));
                            case 'popular':
                                const aPopularity = parseInt(a.getAttribute('data-likes')) + parseInt(a
                                    .getAttribute('data-comments'));
                                const bPopularity = parseInt(b.getAttribute('data-likes')) + parseInt(b
                                    .getAttribute('data-comments'));
                                return bPopularity - aPopularity;
                            default:
                                return 0;
                        }
                    });
                }

                // Show no results message
                function showNoResultsMessage(show) {
                    let noResults = activitiesContainer.querySelector('.no-results');

                    if (show && !noResults) {
                        noResults = document.createElement('div');
                        noResults.className = 'no-results';
                        noResults.innerHTML = `
                            <div style="text-align: center; padding: 40px; color: #666; grid-column: 1 / -1;">
                                <i class="fas fa-search" style="font-size: 48px; margin-bottom: 15px;"></i>
                                <h3>Tidak ada aktivitas ditemukan</h3>
                                <p>Coba gunakan kata kunci lain atau pilih kategori yang berbeda</p>
                            </div>
                        `;
                        activitiesContainer.appendChild(noResults);
                    } else if (!show && noResults) {
                        noResults.remove();
                    }
                }

                // Event listeners
                activityFilterTabs.forEach(tab => {
                    tab.addEventListener('click', function() {
                        activityFilterTabs.forEach(t => t.classList.remove('active'));
                        this.classList.add('active');
                        filterAndSortActivities();
                    });
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

                    // Scroll to newly loaded items
                    setTimeout(() => {
                        const newItems = Array.from(activitiesContainer.querySelectorAll(
                                '.activity-card[style="display: block"]'))
                            .slice(-4);
                        if (newItems.length > 0) {
                            newItems[0].scrollIntoView({
                                behavior: 'smooth',
                                block: 'nearest'
                            });
                        }
                    }, 100);
                });

                // Initialize
                initializeActivities();
            });

            document.addEventListener('DOMContentLoaded', function() {
                // Animasi teks selamat datang
                const welcomeText = document.querySelector('.welcome-text');
                welcomeText.style.opacity = '0';
                welcomeText.style.transform = 'translateY(20px)';
                
                setTimeout(() => {
                    welcomeText.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
                    welcomeText.style.opacity = '1';
                    welcomeText.style.transform = 'translateY(0)';
                }, 300);
                
                // Animasi statistik
                const stats = document.querySelectorAll('.welcome-stat');
                stats.forEach((stat, index) => {
                    stat.style.opacity = '0';
                    stat.style.transform = 'translateX(-20px)';
                    
                    setTimeout(() => {
                        stat.style.transition = `opacity 0.6s ease ${index * 0.2}s, transform 0.6s ease ${index * 0.2}s`;
                        stat.style.opacity = '1';
                        stat.style.transform = 'translateX(0)';
                    }, 500 + (index * 200));
                });
                
                // Update tanggal secara dinamis
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
                
                // Enhanced animations for black theme - ONLY if elements exist
                const visualContainer = document.querySelector('.visual-container.black-theme');
                const mainIcon = document.querySelector('.main-icon.black-main');
                const floatingIcons = document.querySelectorAll('.floating-icon.black-floating');
                const dots = document.querySelectorAll('.dot');
                
                if (visualContainer && mainIcon) {
                    // Animate container entrance
                    visualContainer.style.opacity = '0';
                    visualContainer.style.transform = 'scale(0.9) translateY(20px)';
                    
                    setTimeout(() => {
                        visualContainer.style.transition = 'all 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
                        visualContainer.style.opacity = '1';
                        visualContainer.style.transform = 'scale(1) translateY(0)';
                    }, 500);
                    
                    // Animate main icon with special effect
                    mainIcon.style.transform = 'scale(0) rotate(-180deg)';
                    
                    setTimeout(() => {
                        mainIcon.style.transition = 'transform 1s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
                        mainIcon.style.transform = 'scale(1) rotate(0deg)';
                        
                        // Add sparkle effect after main icon appears
                        setTimeout(() => {
                            mainIcon.style.boxShadow = '0 0 30px var(--accent-color), 0 0 60px rgba(255, 215, 0, 0.2)';
                            setTimeout(() => {
                                mainIcon.style.boxShadow = '0 0 20px rgba(255, 215, 0, 0.3), 0 0 40px rgba(255, 215, 0, 0.1)';
                            }, 300);
                        }, 200);
                    }, 800);
                    
                    // Animate floating icons sequentially
                    if (floatingIcons.length > 0) {
                        floatingIcons.forEach((icon, index) => {
                            icon.style.opacity = '0';
                            icon.style.transform = 'scale(0) translate(0, 50px)';
                            
                            setTimeout(() => {
                                icon.style.transition = `opacity 0.6s ease ${index * 0.3}s, transform 0.6s ease ${index * 0.3}s`;
                                icon.style.opacity = '1';
                                icon.style.transform = 'scale(1) translate(0, 0)';
                            }, 1000 + (index * 300));
                        });
                    }
                    
                    // Animate decoration dots
                    if (dots.length > 0) {
                        dots.forEach((dot, index) => {
                            dot.style.opacity = '0';
                            dot.style.transform = 'scale(0)';
                            
                            setTimeout(() => {
                                dot.style.transition = `opacity 0.5s ease ${index * 0.2}s, transform 0.5s ease ${index * 0.2}s`;
                                dot.style.opacity = '0.6';
                                dot.style.transform = 'scale(1)';
                            }, 1500 + (index * 200));
                        });
                    }
                }
            });
        </script>
    @endpush
</x-admin-layout>
