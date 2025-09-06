<?php if (isset($component)) { $__componentOriginal91fdd17964e43374ae18c674f95cdaa3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal91fdd17964e43374ae18c674f95cdaa3 = $attributes; } ?>
<?php $component = App\View\Components\AdminLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AdminLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="main-card">
         <header class="navbar">
            <div class="search-bar">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Cari sesuatu...">
            </div>
            <div class="navbar-actions">
                <a href="#" class="nav-action">
                    <i class="far fa-bell"></i>
                </a>
                <a href="#" class="nav-action">
                    <i class="far fa-envelope"></i>
                </a>
                <a href="#" class="nav-action">
                    <i class="fas fa-cog"></i>
                </a>
            </div>
        </header>

        <div class="content-wrapper">
            <div class="page-header">
                <h1 class="page-title">Pengaturan Sistem</h1>
                <p class="page-description">Kelola konfigurasi dan preferensi sistem sesuai kebutuhan Anda</p>
            </div>

            <div class="settings-container">
                <div class="settings-sidebar">
                    <div class="settings-menu-item active" data-target="logo-platform">
                        <i class="fas fa-palette"></i>
                        <span>Logo & Nama Platform</span>
                    </div>
                    <div class="settings-menu-item" data-target="role-access">
                        <i class="fas fa-user-lock"></i>
                        <span>Role & Hak Akses</span>
                    </div>
                    <div class="settings-menu-item" data-target="notification">
                        <i class="fas fa-bell"></i>
                        <span>Pengaturan Notifikasi</span>
                    </div>
                    <div class="settings-menu-item" data-target="backup-restore">
                        <i class="fas fa-database"></i>
                        <span>Backup & Restore Data</span>
                    </div>
                </div>

                <div class="settings-content">
                    <!-- Logo & Nama Platform Section -->
                    <div class="settings-section active" id="logo-platform">
                        <h2 class="section-title">Logo & Nama Platform</h2>

                        <div class="form-group">
                            <label class="form-label">Nama Platform</label>
                            <input type="text" class="form-control" value="TARA Admin Panel">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Logo Platform</label>
                            <div class="logo-preview">
                                <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwIiBoZWlnaHQ9IjEwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwIiBoZWlnaHQ9IjEwMCIgZmlsbD0iI2U0ZTVlNiIvPjx0ZXh0IHg9IjUwIiB5PSI1MCIgZG9taW5hbnQtYmFzZWxpbmU9Im1pZGRsZSIgdGV4dC1hbmNob3I9Im1pZGRsZSIgZm9udC1mYW1pbHk9IkFyaWFsIiBmb250LXNpemU9IjE4IiBmaWxsPSIjNjY2Ij5Mb2dvPC90ZXh0Pjwvc3ZnPg=="
                                    alt="Logo Preview">
                            </div>
                            <input type="file" id="logo-upload" class="file-input">
                            <label for="logo-upload" class="file-label">
                                <i class="fas fa-upload"></i> Unggah Logo
                            </label>
                            <div style="font-size: 13px; color: #666; margin-top: 5px;">Rekomendasi: 200x200px, format PNG
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Favicon</label>
                            <div class="logo-preview" style="width: 60px; height: 60px;">
                                <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzIiIGhlaWdodD0iMzIiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3NZnIiPjxyZWN0IHdpZHRoPSIzMiIgaGVpZ2h0PSIzMiIgZmlsbD0iI2ZmZDcwMCIvPjx0ZXh0IHg9IjE2IiB5PSIxNiIgZG9taW5hbnQtYmFzZWxpbmU9Im1pZGRsZSIgdGV4dC1hbmNob3I9Im1pZGRsZSIgZm9udC1mYW1pbHk9IkFyaWFsIiBmb250LXNpemU9IjEwIiBmaWxsPSJ3aGl0ZSI+VDwvdGV4dD48L3N2Zz4="
                                    alt="Favicon Preview">
                            </div>
                            <input type="file" id="favicon-upload" class="file-input">
                            <label for="favicon-upload" class="file-label">
                                <i class="fas fa-upload"></i> Unggah Favicon
                            </label>
                        </div>

                        <div class="action-buttons">
                            <button class="btn btn-outline">Batal</button>
                            <button class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </div>

                    <!-- Role & Hak Akses Section -->
                    <div class="settings-section" id="role-access">
                        <h2 class="section-title">Role & Hak Akses</h2>

                        <div class="form-group">
                            <label class="form-label">Tambah Role Baru</label>
                            <div style="display: flex; gap: 10px;">
                                <input type="text" class="form-control" placeholder="Nama Role">
                                <button class="btn btn-primary">Tambah</button>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Daftar Role</label>
                            <select class="form-control">
                                <option>Super Administrator</option>
                                <option>Administrator</option>
                                <option>Editor</option>
                                <option>Viewer</option>
                            </select>
                        </div>

                        <h3 style="margin: 20px 0 15px;">Hak Akses untuk: Administrator</h3>

                        <div class="permissions-list">
                            <div class="permission-item">
                                <label style="display: flex; align-items: center;">
                                    <input type="checkbox" checked style="margin-right: 10px;">
                                    <span>Lihat Dashboard</span>
                                </label>
                            </div>
                            <div class="permission-item">
                                <label style="display: flex; align-items: center;">
                                    <input type="checkbox" checked style="margin-right: 10px;">
                                    <span>Kelola Pengguna</span>
                                </label>
                            </div>
                            <div class="permission-item">
                                <label style="display: flex; align-items: center;">
                                    <input type="checkbox" checked style="margin-right: 10px;">
                                    <span>Kelola Konten</span>
                                </label>
                            </div>
                            <div class="permission-item">
                                <label style="display: flex; align-items: center;">
                                    <input type="checkbox" style="margin-right: 10px;">
                                    <span>Hapus Konten</span>
                                </label>
                            </div>
                            <div class="permission-item">
                                <label style="display: flex; align-items: center;">
                                    <input type="checkbox" checked style="margin-right: 10px;">
                                    <span>Kelola Pengaturan</span>
                                </label>
                            </div>
                            <div class="permission-item">
                                <label style="display: flex; align-items: center;">
                                    <input type="checkbox" style="margin-right: 10px;">
                                    <span>Akses Penuh</span>
                                </label>
                            </div>
                        </div>

                        <div class="action-buttons">
                            <button class="btn btn-outline">Reset</button>
                            <button class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </div>

                    <!-- Pengaturan Notifikasi Section -->
                    <div class="settings-section" id="notification">
                        <h2 class="section-title">Pengaturan Notifikasi</h2>

                        <div class="notification-item">
                            <div>
                                <div style="font-weight: 500;">Notifikasi Email</div>
                                <div style="font-size: 14px; color: #666;">Aktifkan notifikasi melalui email</div>
                            </div>
                            <label class="toggle-switch">
                                <input type="checkbox" checked>
                                <span class="slider"></span>
                            </label>
                        </div>

                        <div class="notification-item">
                            <div>
                                <div style="font-weight: 500;">Notifikasi Browser</div>
                                <div style="font-size: 14px; color: #666;">Tampilkan notifikasi di browser</div>
                            </div>
                            <label class="toggle-switch">
                                <input type="checkbox" checked>
                                <span class="slider"></span>
                            </label>
                        </div>

                        <div class="notification-item">
                            <div>
                                <div style="font-weight: 500;">Notifikasi SMS</div>
                                <div style="font-size: 14px; color: #666;">Aktifkan notifikasi melalui SMS</div>
                            </div>
                            <label class="toggle-switch">
                                <input type="checkbox">
                                <span class="slider"></span>
                            </label>
                        </div>

                        <div class="notification-item">
                            <div>
                                <div style="font-weight: 500;">Notifikasi Pengguna Baru</div>
                                <div style="font-size: 14px; color: #666;">Kirim notifikasi ketika ada pengguna baru</div>
                            </div>
                            <label class="toggle-switch">
                                <input type="checkbox" checked>
                                <span class="slider"></span>
                            </label>
                        </div>

                        <div class="notification-item">
                            <div>
                                <div style="font-weight: 500;">Notifikasi Pembaruan Sistem</div>
                                <div style="font-size: 14px; color: #666;">Kirim notifikasi pembaruan sistem</div>
                            </div>
                            <label class="toggle-switch">
                                <input type="checkbox" checked>
                                <span class="slider"></span>
                            </label>
                        </div>

                        <div class="action-buttons">
                            <button class="btn btn-outline">Reset ke Default</button>
                            <button class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </div>

                    <!-- Backup & Restore Data Section -->
                    <div class="settings-section" id="backup-restore">
                        <h2 class="section-title">Backup & Restore Data</h2>

                        <div class="backup-options">
                            <div class="backup-card">
                                <i class="fas fa-download"></i>
                                <div style="font-weight: 500;">Backup Database</div>
                                <div style="font-size: 13px; color: #666; margin-top: 5px;">Ekspor seluruh data database
                                </div>
                            </div>

                            <div class="backup-card">
                                <i class="fas fa-file-export"></i>
                                <div style="font-weight: 500;">Backup Media</div>
                                <div style="font-size: 13px; color: #666; margin-top: 5px;">Ekspor file media</div>
                            </div>

                            <div class="backup-card">
                                <i class="fas fa-upload"></i>
                                <div style="font-weight: 500;">Restore Data</div>
                                <div style="font-size: 13px; color: #666; margin-top: 5px;">Impor data dari backup</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Jadwal Backup Otomatis</label>
                            <select class="form-control">
                                <option>Nonaktif</option>
                                <option>Harian</option>
                                <option>Mingguan</option>
                                <option>Bulanan</option>
                            </select>
                        </div>

                        <div class="backup-history">
                            <h3 style="margin-bottom: 15px;">Riwayat Backup</h3>

                            <div class="history-item">
                                <div>
                                    <div style="font-weight: 500;">Backup Database</div>
                                    <div style="font-size: 13px; color: #666;">6 Sep 2025, 10:15:32</div>
                                </div>
                                <div>
                                    <button class="btn btn-outline"
                                        style="padding: 8px 12px; font-size: 14px;">Unduh</button>
                                </div>
                            </div>

                            <div class="history-item">
                                <div>
                                    <div style="font-weight: 500;">Backup Lengkap</div>
                                    <div style="font-size: 13px; color: #666;">5 Sep 2025, 08:30:15</div>
                                </div>
                                <div>
                                    <button class="btn btn-outline"
                                        style="padding: 8px 12px; font-size: 14px;">Unduh</button>
                                </div>
                            </div>

                            <div class="history-item">
                                <div>
                                    <div style="font-weight: 500;">Backup Media</div>
                                    <div style="font-size: 13px; color: #666;">4 Sep 2025, 14:45:20</div>
                                </div>
                                <div>
                                    <button class="btn btn-outline"
                                        style="padding: 8px 12px; font-size: 14px;">Unduh</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php $__env->startPush('styles'); ?>
        <style>
            /* Layout Utama */
            .main-content {
                flex-grow: 1;
                margin-left: var(--sidebar-width);
                display: flex;
                flex-direction: column;
                min-height: 100vh;
            }

            /* Navbar Styles */
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
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            }

            .search-bar {
                display: flex;
                align-items: center;
                background: var(--secondary-bg);
                border-radius: 8px;
                padding: 8px 15px;
                width: 300px;
                transition: all 0.3s ease;
            }

            .search-bar:focus-within {
                box-shadow: 0 0 0 2px rgba(255, 215, 0, 0.2);
            }

            .search-bar i {
                color: #666;
                font-size: 14px;
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
                gap: 15px;
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
                transition: all 0.3s ease;
            }

            .nav-action:hover {
                background: var(--accent-color);
                color: var(--text-color);
            }

            /* Content Area */
            .content-wrapper {
                padding: 30px;
                flex-grow: 1;
                overflow-y: auto;
                background: var(--secondary-bg);
            }

           .page-header {
                margin-bottom: 30px;
                padding-bottom: 15px;
                border-bottom: 1px solid var(--border-color);
                display: block;
                position: relative; /* Tambahkan position relative */
            }

            .page-title {
                font-size: 28px;
                font-weight: 700;
                margin-bottom: 8px;
                text-align: left;
            }

            .page-description {
                font-size: 16px;
                color: #666;
                margin-top: 10px;
                font-weight: 400;
                line-height: 1.5;
                text-align: left;
                display: block;
                width: 100%;
                padding-bottom: 15px; /* Tambahkan padding untuk garis */
            }

            .page-header::after {
                content: "";
                position: absolute;
                bottom: 0;
                left: 0;
                width: 100%;
                height: 3px;
                background: var(--accent-color);
                border-radius: 3px;
            }

            .settings-container {
                display: grid;
                grid-template-columns: 250px 1fr;
                gap: 30px;
                align-items: start;
            }

            .settings-sidebar {
                background: var(--primary-bg);
                border-radius: 12px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
                padding: 20px 0;
                position: sticky;
                top: 90px;
                height: fit-content;
            }

            .settings-menu-item {
                display: flex;
                align-items: center;
                padding: 14px 20px;
                color: var(--text-color);
                text-decoration: none;
                font-weight: 500;
                transition: all 0.3s ease;
                position: relative;
                border-left: 4px solid transparent;
                cursor: pointer;
            }

            .settings-menu-item:hover {
                background: var(--hover-color);
                border-left-color: var(--accent-color);
            }

            .settings-menu-item.active {
                background: rgba(255, 215, 0, 0.1);
                border-left-color: var(--accent-color);
                color: var(--text-color);
                font-weight: 600;
            }

            .settings-menu-item i {
                width: 24px;
                margin-right: 15px;
                display: flex;
                align-items: center;
                justify-content: center;
                color: #666;
                transition: color 0.3s ease;
            }

            .settings-menu-item.active i,
            .settings-menu-item:hover i {
                color: var(--accent-color);
            }

            .settings-content {
                background: var(--primary-bg);
                border-radius: 12px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
                padding: 25px;
            }

            .main-card {
                background: var(--primary-bg);
                border-radius: 12px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
                padding: 25px;
            }

            .settings-section {
                display: none;
            }

            .settings-section.active {
                display: block;
                animation: fadeIn 0.3s ease;
            }

            .section-title {
                font-size: 20px;
                font-weight: 600;
                margin-bottom: 25px;
                padding-bottom: 15px;
                border-bottom: 1px solid var(--border-color);
                display: flex;
                align-items: center;
            }

            .section-title::before {
                content: "";
                display: inline-block;
                width: 4px;
                height: 20px;
                background: var(--accent-color);
                margin-right: 10px;
                border-radius: 2px;
            }

            .form-group {
                margin-bottom: 20px;
            }

            .form-label {
                display: block;
                margin-bottom: 8px;
                font-weight: 500;
                color: var(--text-color);
            }

            .form-control {
                width: 100%;
                padding: 12px 15px;
                border: 1px solid var(--border-color);
                border-radius: 8px;
                font-size: 16px;
                font-family: "Space Grotesk", sans-serif;
                transition: all 0.3s ease;
                background: var(--primary-bg);
            }

            .form-control:focus {
                outline: none;
                border-color: var(--accent-color);
                box-shadow: 0 0 0 3px rgba(255, 215, 0, 0.2);
            }

            .btn {
                padding: 12px 20px;
                border: none;
                border-radius: 8px;
                font-size: 16px;
                font-weight: 500;
                cursor: pointer;
                transition: all 0.3s ease;
                font-family: "Space Grotesk", sans-serif;
                display: inline-flex;
                align-items: center;
                gap: 8px;
            }

            .btn-primary {
                background: var(--accent-color);
                color: var(--text-color);
            }

            .btn-primary:hover {
                background: #e6c300;
                transform: translateY(-2px);
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

            .btn-outline {
                background: transparent;
                border: 1px solid var(--border-color);
                color: #666;
            }

            .btn-outline:hover {
                background: var(--secondary-bg);
                transform: translateY(-2px);
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            }

            .logo-preview {
                width: 150px;
                height: 150px;
                border: 1px dashed var(--border-color);
                border-radius: 8px;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 15px;
                overflow: hidden;
                background: var(--secondary-bg);
                transition: border-color 0.3s ease;
            }

            .logo-preview:hover {
                border-color: var(--accent-color);
            }

            .logo-preview img {
                max-width: 100%;
                max-height: 100%;
                object-fit: contain;
            }

            .permissions-list {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 15px;
                margin-top: 20px;
            }

            .permission-item {
                background-color: var(--secondary-bg);
                padding: 15px;
                border-radius: 8px;
                border: 1px solid var(--border-color);
                transition: all 0.3s ease;
            }

            .permission-item:hover {
                border-color: var(--accent-color);
                transform: translateY(-2px);
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            }

            .notification-item {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 15px 0;
                border-bottom: 1px solid var(--border-color);
            }

            .notification-item:last-child {
                border-bottom: none;
            }

            .backup-options {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
                gap: 20px;
                margin-bottom: 30px;
            }

            .backup-card {
                background-color: var(--secondary-bg);
                padding: 20px;
                border-radius: 8px;
                text-align: center;
                border: 1px solid var(--border-color);
                cursor: pointer;
                transition: all 0.3s ease;
            }

            .backup-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
                border-color: var(--accent-color);
            }

            .backup-card i {
                font-size: 36px;
                margin-bottom: 15px;
                color: var(--accent-color);
            }

            .backup-history {
                margin-top: 30px;
            }

            .history-item {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 12px 15px;
                background-color: var(--secondary-bg);
                border-radius: 6px;
                margin-bottom: 10px;
                border: 1px solid var(--border-color);
                transition: all 0.3s ease;
            }

            .history-item:hover {
                border-color: var(--accent-color);
                transform: translateY(-2px);
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            }

            .toggle-switch {
                position: relative;
                display: inline-block;
                width: 60px;
                height: 30px;
            }

            .toggle-switch input {
                opacity: 0;
                width: 0;
                height: 0;
            }

            .slider {
                position: absolute;
                cursor: pointer;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: #ccc;
                transition: .4s;
                border-radius: 34px;
            }

            .slider:before {
                position: absolute;
                content: "";
                height: 22px;
                width: 22px;
                left: 4px;
                bottom: 4px;
                background-color: white;
                transition: .4s;
                border-radius: 50%;
            }

            input:checked + .slider {
                background-color: var(--accent-color);
            }

            input:checked + .slider:before {
                transform: translateX(30px);
            }

            .action-buttons {
                display: flex;
                gap: 10px;
                margin-top: 30px;
                justify-content: flex-end;
            }

            .file-input {
                display: none;
            }

            .file-label {
                display: inline-block;
                padding: 10px 15px;
                background: var(--secondary-bg);
                border: 1px solid var(--border-color);
                border-radius: 8px;
                cursor: pointer;
                transition: all 0.3s ease;
            }

            .file-label:hover {
                background: var(--hover-color);
                border-color: var(--accent-color);
            }

            /* Animations */
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(10px); }
                to { opacity: 1; transform: translateY(0); }
            }

            /* Responsive Design */
            @media (max-width: 992px) {
                .settings-container {
                    grid-template-columns: 1fr;
                }
                
                .settings-sidebar {
                    position: static;
                    margin-bottom: 20px;
                }
                
                .navbar {
                    padding: 0 15px;
                }
                
                .search-bar {
                    width: 200px;
                }
                
                .content-wrapper {
                    padding: 20px;
                }
            }

            @media (max-width: 768px) {
                .navbar {
                    flex-direction: column;
                    height: auto;
                    padding: 15px;
                }
                
                .search-bar {
                    width: 100%;
                    margin-bottom: 15px;
                }
                
                .navbar-actions {
                    width: 100%;
                    justify-content: center;
                }
                
                .backup-options {
                    grid-template-columns: 1fr;
                }
                
                .permissions-list {
                    grid-template-columns: 1fr;
                }
            }
        </style>
    <?php $__env->stopPush(); ?>

    <?php $__env->startPush('scripts'); ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Menu item click handler
                const menuItems = document.querySelectorAll('.settings-menu-item');
                const sections = document.querySelectorAll('.settings-section');

                menuItems.forEach(item => {
                    item.addEventListener('click', function() {
                        const target = this.getAttribute('data-target');

                        // Remove active class from all items and sections
                        menuItems.forEach(i => i.classList.remove('active'));
                        sections.forEach(s => s.classList.remove('active'));

                        // Add active class to clicked item and corresponding section
                        this.classList.add('active');
                        document.getElementById(target).classList.add('active');
                    });
                });

                // Nav item click handler
                const navItems = document.querySelectorAll('.nav-item');
                navItems.forEach(item => {
                    item.addEventListener('click', function() {
                        navItems.forEach(i => i.classList.remove('active'));
                        this.classList.add('active');
                    });
                });
            });
        </script>
    <?php $__env->stopPush(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal91fdd17964e43374ae18c674f95cdaa3)): ?>
<?php $attributes = $__attributesOriginal91fdd17964e43374ae18c674f95cdaa3; ?>
<?php unset($__attributesOriginal91fdd17964e43374ae18c674f95cdaa3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal91fdd17964e43374ae18c674f95cdaa3)): ?>
<?php $component = $__componentOriginal91fdd17964e43374ae18c674f95cdaa3; ?>
<?php unset($__componentOriginal91fdd17964e43374ae18c674f95cdaa3); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\tara\backend\resources\views/Administrator/Admin/Settings/index.blade.php ENDPATH**/ ?>