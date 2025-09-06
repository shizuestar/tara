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
    <div class="content-background">
        <div class="page-header">
            <h1 class="page-title">
                <i class="fas fa-project-diagram"></i>
                Daftar Proyek
            </h1>
            <a href="#" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                Tambah Proyek Baru
            </a>
        </div>

        <div class="filter-section">
            <h3 class="filter-title">
                <i class="fas fa-filter"></i>
                Filter Proyek
            </h3>
            <div class="filter-grid">
                <div class="filter-group">
                    <label class="filter-label">Tipe Proyek</label>
                    <select class="filter-select">
                        <option value="">Semua Tipe</option>
                        <option value="development">Pengembangan</option>
                        <option value="design">Desain</option>
                        <option value="research">Penelitian</option>
                        <option value="marketing">Pemasaran</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label class="filter-label">Status Proyek</label>
                    <select class="filter-select">
                        <option value="">Semua Status</option>
                        <option value="active">Aktif</option>
                        <option value="pending">Menunggu Persetujuan</option>
                        <option value="completed">Selesai</option>
                        <option value="onhold">Ditunda</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label class="filter-label">Manajer</label>
                    <select class="filter-select">
                        <option value="">Semua Manajer</option>
                        <option value="1">Dewi Santika</option>
                        <option value="2">Aldi Pratama</option>
                        <option value="3">Rina Andriani</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label class="filter-label">Kata Kunci</label>
                    <input type="text" class="filter-input" placeholder="Cari nama atau deskripsi proyek...">
                </div>
            </div>
            <div class="filter-actions">
                <button class="btn">
                    <i class="fas fa-filter"></i>
                    Terapkan Filter
                </button>
                <button class="btn">
                    <i class="fas fa-redo"></i>
                    Reset
                </button>
            </div>
        </div>

        <div class="content-section">
            <div class="section-header">
                <h2 class="section-title">Daftar Proyek</h2>
                <div class="results-count">Menampilkan 12 dari 85 hasil</div>
            </div>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th width="80">Thumbnail</th>
                            <th>Nama Proyek</th>
                            <th>Tipe</th>
                            <th>Manajer</th>
                            <th>Tanggal Mulai</th>
                            <th>Status</th>
                            <th width="120">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><div class="thumbnail"><i class="fas fa-code"></i></div></td>
                            <td>
                                <div class="table-title">E-commerce Platform</div>
                                <div class="table-meta">Laravel · Vue.js</div>
                            </td>
                            <td>Pengembangan</td>
                            <td>Dewi Santika</td>
                            <td>12 Agu 2023</td>
                            <td><span class="status-badge status-active">Aktif</span></td>
                            <td>
                                <div class="action-buttons">
                                    <a href="#" class="action-btn btn-view"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="action-btn btn-edit"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="action-btn btn-delete" onclick="showDeleteModal('E-commerce Platform')"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><div class="thumbnail"><i class="fas fa-paint-brush"></i></div></td>
                            <td>
                                <div class="table-title">Brand Redesign</div>
                                <div class="table-meta">Logo · Guideline</div>
                            </td>
                            <td>Desain</td>
                            <td>Aldi Pratama</td>
                            <td>10 Agu 2023</td>
                            <td><span class="status-badge status-active">Aktif</span></td>
                            <td>
                                <div class="action-buttons">
                                    <a href="#" class="action-btn btn-view"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="action-btn btn-edit"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="action-btn btn-delete" onclick="showDeleteModal('Brand Redesign')"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><div class="thumbnail"><i class="fas fa-book"></i></div></td>
                            <td>
                                <div class="table-title">Market Research 2025</div>
                                <div class="table-meta">Survey · Analysis</div>
                            </td>
                            <td>Penelitian</td>
                            <td>Rina Andriani</td>
                            <td>08 Agu 2023</td>
                            <td><span class="status-badge status-pending">Menunggu Persetujuan</span></td>
                            <td>
                                <div class="action-buttons">
                                    <a href="#" class="action-btn btn-view"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="action-btn btn-edit"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="action-btn btn-delete" onclick="showDeleteModal('Market Research 2025')"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><div class="thumbnail"><i class="fas fa-bullhorn"></i></div></td>
                            <td>
                                <div class="table-title">Digital Campaign</div>
                                <div class="table-meta">Ads · Social Media</div>
                            </td>
                            <td>Pemasaran</td>
                            <td>Budi Santoso</td>
                            <td>05 Agu 2023</td>
                            <td><span class="status-badge status-completed">Selesai</span></td>
                            <td>
                                <div class="action-buttons">
                                    <a href="#" class="action-btn btn-view"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="action-btn btn-edit"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="action-btn btn-delete" onclick="showDeleteModal('Digital Campaign')"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><div class="thumbnail"><i class="fas fa-chart-line"></i></div></td>
                            <td>
                                <div class="table-title">Data Analytics Project</div>
                                <div class="table-meta">Python · SQL</div>
                            </td>
                            <td>Pengembangan</td>
                            <td>Sari Indah</td>
                            <td>03 Agu 2023</td>
                            <td><span class="status-badge status-onhold">Ditunda</span></td>
                            <td>
                                <div class="action-buttons">
                                    <a href="#" class="action-btn btn-view"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="action-btn btn-edit"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="action-btn btn-delete" onclick="showDeleteModal('Data Analytics Project')"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="pagination">
                <a href="#" class="pagination-item"><i class="fas fa-chevron-left"></i></a>
                <a href="#" class="pagination-item active">1</a>
                <a href="#" class="pagination-item">2</a>
                <a href="#" class="pagination-item">3</a>
                <span class="pagination-ellipsis">...</span>
                <a href="#" class="pagination-item">8</a>
                <a href="#" class="pagination-item"><i class="fas fa-chevron-right"></i></a>
            </div>
        </div>

        <div class="content-section">
            <div class="section-header">
                <h2 class="section-title">Daftar Kategori Proyek</h2>
                <button class="btn btn-primary" onclick="showCategoryModal('create')">
                    <i class="fas fa-plus"></i>
                    Tambah Tipe Proyek
                </button>
            </div>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Nama Tipe</th>
                            <th>Deskripsi</th>
                            <th width="120">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Pengembangan</td>
                            <td>Proyek pengembangan perangkat lunak atau aplikasi.</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="#" class="action-btn btn-edit" onclick="showCategoryModal('edit', 'Pengembangan', 'Proyek pengembangan perangkat lunak atau aplikasi.')"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="action-btn btn-delete" onclick="showCategoryDeleteModal('Pengembangan')"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Desain</td>
                            <td>Proyek desain grafis seperti logo dan panduan merek.</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="#" class="action-btn btn-edit" onclick="showCategoryModal('edit', 'Desain', 'Proyek desain grafis seperti logo dan panduan merek.')"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="action-btn btn-delete" onclick="showCategoryDeleteModal('Desain')"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Penelitian</td>
                            <td>Proyek penelitian dan analisis data.</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="#" class="action-btn btn-edit" onclick="showCategoryModal('edit', 'Penelitian', 'Proyek penelitian dan analisis data.')"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="action-btn btn-delete" onclick="showCategoryDeleteModal('Penelitian')"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Pemasaran</td>
                            <td>Proyek kampanye pemasaran dan promosi.</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="#" class="action-btn btn-edit" onclick="showCategoryModal('edit', 'Pemasaran', 'Proyek kampanye pemasaran dan promosi.')"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="action-btn btn-delete" onclick="showCategoryDeleteModal('Pemasaran')"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="pagination">
                <a href="#" class="pagination-item"><i class="fas fa-chevron-left"></i></a>
                <a href="#" class="pagination-item active">1</a>
                <a href="#" class="pagination-item">2</a>
                <a href="#" class="pagination-item">3</a>
                <span class="pagination-ellipsis">...</span>
                <a href="#" class="pagination-item">5</a>
                <a href="#" class="pagination-item"><i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
    </div>

    <div class="modal" id="deleteModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Hapus Proyek</h3>
                <button class="modal-close" onclick="closeDeleteModal()">&times;</button>
            </div>
            <div class="modal-body">
                <p class="modal-text">Apakah Anda yakin ingin menghapus proyek <strong id="deleteArtworkName"></strong>?</p>
                <p class="modal-text">Tindakan ini tidak dapat dibatalkan dan semua data terkait proyek ini akan dihapus permanen.</p>
            </div>
            <div class="modal-footer">
                <button class="btn" onclick="closeDeleteModal()">Batal</button>
                <button class="btn btn-primary">Hapus Proyek</button>
            </div>
        </div>
    </div>

    <div class="modal" id="categoryModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="categoryModalTitle">Tambah Tipe Proyek</h3>
                <button class="modal-close" onclick="closeCategoryModal()">&times;</button>
            </div>
            <div class="modal-body">
                <div class="filter-group">
                    <label class="filter-label">Nama Tipe</label>
                    <input type="text" id="categoryName" class="filter-input" placeholder="Masukkan nama tipe proyek...">
                </div>
                <div class="filter-group">
                    <label class="filter-label">Deskripsi</label>
                    <textarea id="categoryDescription" class="filter-input" rows="4" placeholder="Masukkan deskripsi tipe proyek..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" onclick="closeCategoryModal()">Batal</button>
                <button class="btn btn-primary" onclick="saveCategory()">Simpan</button>
            </div>
        </div>
    </div>

    <div class="modal" id="categoryDeleteModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Hapus Tipe Proyek</h3>
                <button class="modal-close" onclick="closeCategoryDeleteModal()">&times;</button>
            </div>
            <div class="modal-body">
                <p class="modal-text">Apakah Anda yakin ingin menghapus tipe proyek <strong id="deleteCategoryName"></strong>?</p>
                <p class="modal-text">Tindakan ini tidak dapat dibatalkan dan semua data terkait tipe proyek ini akan dihapus permanen.</p>
            </div>
            <div class="modal-footer">
                <button class="btn" onclick="closeCategoryDeleteModal()">Batal</button>
                <button class="btn btn-primary">Hapus Tipe Proyek</button>
            </div>
        </div>
    </div>

    <?php $__env->startPush('styles'); ?>
    <style>
        :root {
            --primary-bg: #ffffff;
            --secondary-bg: #f8f8f8;
            --text-color: #1a1a1a;
            --accent-color: #FFD700;
            --border-color: #e0e0e0;
            --hover-color: #f5f5f5;
            --sidebar-width: 280px;
            --content-margin: 40px;
            --navbar-height: 70px;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Space Grotesk', sans-serif;
            background: var(--secondary-bg);
            color: var(--text-color);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
        }

        /* Sidebar Styling */
        .sidebar {
            width: var(--sidebar-width);
            background: var(--primary-bg);
            border-right: 1px solid var(--border-color);
            box-shadow: 2px 0 10px rgba(0,0,0,0.05);
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
            z-index: 100;
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
            background: linear-gradient(135deg, var(--accent-color) 0%, #FFC000 100%);
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
            overflow-y: auto;
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
            background: linear-gradient(135deg, var(--accent-color) 0%, #FFC000 100%);
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

        /* Navbar Styles */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: var(--primary-bg);
            padding: 15px var(--content-margin);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            position: fixed;
            top: 0;
            left: var(--sidebar-width);
            right: 0;
            z-index: 900;
        }

        .search-bar {
            display: flex;
            align-items: center;
            gap: 10px;
            background: var(--secondary-bg);
            padding: 10px 15px;
            border-radius: 8px;
            width: 300px;
        }

        .search-bar input {
            border: none;
            background: none;
            width: 100%;
            font-family: 'Space Grotesk', sans-serif;
            outline: none;
        }

        .navbar-actions {
            display: flex;
            gap: 15px;
        }

        .nav-action {
            position: relative;
            color: var(--text-color);
            text-decoration: none;
            font-size: 18px;
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: var(--accent-color);
            color: var(--text-color);
            border-radius: 50%;
            padding: 2px 6px;
            font-size: 12px;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            padding-top: 80px; /* Account for fixed navbar height */
        }

        .content-background {
            background: var(--primary-bg);
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }

        .content-wrapper {
            margin: 0 var(--content-margin);
        }

        /* Page Header */
        .page-header {
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .page-title {
            font-size: 28px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .page-title i {
            color: var(--accent-color);
        }

        .btn {
            padding: 10px 20px;
            background: var(--text-color);
            color: var(--primary-bg);
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-family: 'Space Grotesk', sans-serif;
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

        /* Filter Section */
        .filter-section {
            background: var(--primary-bg);
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .filter-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .filter-title i {
            color: var(--accent-color);
        }

        .filter-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 15px;
        }

        .filter-group {
            margin-bottom: 15px;
        }

        .filter-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            font-size: 14px;
        }

        .filter-select,
        .filter-input,
        textarea.filter-input {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-family: 'Space Grotesk', sans-serif;
            background: var(--primary-bg);
            color: var(--text-color);
            resize: vertical;
        }

        .filter-actions {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        /* Content Section */
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
            flex-wrap: wrap;
            gap: 15px;
        }

        .section-title {
            font-size: 20px;
            font-weight: 600;
        }

        .results-count {
            color: #666;
            font-size: 14px;
        }

        .table-container {
            overflow-x: auto;
            margin-top: 20px;
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
            background: var(--secondary-bg);
        }

        tr:hover {
            background: var(--secondary-bg);
        }

        .table-title {
            font-weight: 500;
        }

        .table-meta {
            font-size: 13px;
            color: #666;
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

        .status-completed {
            background: rgba(46, 204, 113, 0.2);
            color: #27ae60;
        }

        .status-onhold {
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
            background: var(--secondary-bg);
            color: var(--text-color);
            text-decoration: none;
            transition: all 0.3s;
        }

        .action-btn:hover {
            background: var(--accent-color);
            color: var(--text-color);
        }

        .btn-view {
            background: rgba(46, 213, 115, 0.1);
            color: #2ed573;
        }

        .btn-edit {
            background: rgba(52, 152, 219, 0.1);
            color: #3498db;
        }

        .btn-delete {
            background: rgba(255, 71, 87, 0.1);
            color: #ff4757;
        }

        .thumbnail {
            width: 60px;
            height: 60px;
            border-radius: 8px;
            background: var(--secondary-bg);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #999;
            font-size: 12px;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 30px;
            gap: 8px;
        }

        .pagination-item {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            background: var(--primary-bg);
            color: var(--text-color);
            text-decoration: none;
            font-weight: 500;
            border: 1px solid var(--border-color);
            transition: all 0.3s;
        }

        .pagination-item:hover,
        .pagination-item.active {
            background: var(--accent-color);
            color: var(--text-color);
            border-color: var(--accent-color);
        }

        .pagination-ellipsis {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 10px;
            color: #666;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background: var(--primary-bg);
            border-radius: 12px;
            width: 100%;
            max-width: 500px;
            padding: 25px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--border-color);
        }

        .modal-title {
            font-size: 20px;
            font-weight: 600;
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #666;
        }

        .modal-body {
            margin-bottom: 20px;
        }

        .modal-text {
            margin-bottom: 15px;
            line-height: 1.6;
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s;
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }
        }

        @media (max-width: 768px) {
            :root {
                --sidebar-width: 100%;
            }
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                box-shadow: none;
                transform: none;
            }
            .navbar {
                position: relative;
                left: 0;
                padding: 15px 20px;
            }
            .main-content {
                margin-left: 0;
                padding-top: 0;
            }
            .content-wrapper {
                margin: 0 20px;
            }
            .content-background {
                margin: 0 20px;
                padding: 15px;
            }
            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }
            .filter-grid {
                grid-template-columns: 1fr;
            }
            .search-bar {
                width: 100%;
            }
            .action-buttons {
                flex-direction: column;
            }
        }
    </style>
    <?php $__env->stopPush(); ?>

    <?php $__env->startPush('scripts'); ?>
    <script>
        function showDeleteModal(artworkName) {
            document.getElementById('deleteArtworkName').textContent = artworkName;
            document.getElementById('deleteModal').style.display = 'flex';
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').style.display = 'none';
        }

        function showCategoryModal(mode, name = '', description = '') {
            const modal = document.getElementById('categoryModal');
            const title = document.getElementById('categoryModalTitle');
            const nameInput = document.getElementById('categoryName');
            const descInput = document.getElementById('categoryDescription');

            if (mode === 'create') {
                title.textContent = 'Tambah Tipe Proyek';
                nameInput.value = '';
                descInput.value = '';
            } else {
                title.textContent = 'Edit Tipe Proyek';
                nameInput.value = name;
                descInput.value = description;
            }
            modal.style.display = 'flex';
        }

        function closeCategoryModal() {
            document.getElementById('categoryModal').style.display = 'none';
        }

        function showCategoryDeleteModal(categoryName) {
            document.getElementById('deleteCategoryName').textContent = categoryName;
            document.getElementById('categoryDeleteModal').style.display = 'flex';
        }

        function closeCategoryDeleteModal() {
            document.getElementById('categoryDeleteModal').style.display = 'none';
        }

        function saveCategory() {
            const name = document.getElementById('categoryName').value;
            const description = document.getElementById('categoryDescription').value;
            console.log('Saving category:', { name, description });
            closeCategoryModal();
        }

        window.onclick = function(event) {
            const deleteModal = document.getElementById('deleteModal');
            const categoryModal = document.getElementById('categoryModal');
            const categoryDeleteModal = document.getElementById('categoryDeleteModal');
            if (event.target === deleteModal) {
                closeDeleteModal();
            } else if (event.target === categoryModal) {
                closeCategoryModal();
            } else if (event.target === categoryDeleteModal) {
                closeCategoryDeleteModal();
            }
        };

        document.addEventListener('DOMContentLoaded', function() {
            const filterSelects = document.querySelectorAll('.filter-select');
            filterSelects.forEach(select => {
                select.addEventListener('change', function() {
                    console.log('Filter changed:', this.value);
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
<?php endif; ?><?php /**PATH C:\laragon\www\tara\backend\resources\views/administrator/admin/proyek/index.blade.php ENDPATH**/ ?>