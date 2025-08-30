
<x-admin-layout>
    <div class="content-background">
        <div class="page-header">
            <h1 class="page-title">
                <i class="fas fa-users"></i>
                Manajemen Komunitas
            </h1>
            <a href="#" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                Tambah Komunitas Baru
            </a>
        </div>

        <div class="filter-section">
            <h3 class="filter-title">
                <i class="fas fa-filter"></i>
                Filter Komunitas
            </h3>
            <div class="filter-grid">
                <div class="filter-group">
                    <label class="filter-label">Kategori</label>
                    <select class="filter-select">
                        <option value="">Semua Kategori</option>
                        <option value="fotografi">Fotografi</option>
                        <option value="desain">Desain</option>
                        <option value="ilustrasi">Ilustrasi</option>
                        <option value="koding">Koding</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label class="filter-label">Jumlah Anggota</label>
                    <select class="filter-select">
                        <option value="">Semua</option>
                        <option value="0-50">0-50</option>
                        <option value="51-100">51-100</option>
                        <option value="101+">101+</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label class="filter-label">Status</label>
                    <select class="filter-select">
                        <option value="">Semua Status</option>
                        <option value="aktif">Aktif</option>
                        <option value="tidak-aktif">Tidak Aktif</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label class="filter-label">Kata Kunci</label>
                    <input type="text" class="filter-input" placeholder="Cari nama atau deskripsi...">
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
                <h2 class="section-title">Daftar Komunitas</h2>
                <div class="results-count">Menampilkan 5 dari 20 komunitas</div>
            </div>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Nama Komunitas</th>
                            <th>Deskripsi Singkat</th>
                            <th>Status</th>
                            <th>Jumlah Anggota</th>
                            <th>Kategori</th>
                            <th width="120">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Fotografi Enthusiast</td>
                            <td>Komunitas pecinta fotografi di Bali</td>
                            <td><span class="status-badge status-published">Aktif</span></td>
                            <td>150</td>
                            <td>Fotografi</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="#" class="action-btn btn-view"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="action-btn btn-edit"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="action-btn btn-delete" onclick="showDeleteModal('Fotografi Enthusiast')"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Desain Grafis Indonesia</td>
                            <td>Tempat berbagi tips desain grafis</td>
                            <td><span class="status-badge status-published">Aktif</span></td>
                            <td>200</td>
                            <td>Desain</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="#" class="action-btn btn-view"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="action-btn btn-edit"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="action-btn btn-delete" onclick="showDeleteModal('Desain Grafis Indonesia')"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Ilustrator Muda</td>
                            <td>Komunitas ilustrator pemula</td>
                            <td><span class="status-badge status-rejected">Tidak Aktif</span></td>
                            <td>80</td>
                            <td>Ilustrasi</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="#" class="action-btn btn-view"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="action-btn btn-edit"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="action-btn btn-delete" onclick="showDeleteModal('Ilustrator Muda')"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Koder Komunitas</td>
                            <td>Belajar coding bersama</td>
                            <td><span class="status-badge status-published">Aktif</span></td>
                            <td>120</td>
                            <td>Koding</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="#" class="action-btn btn-view"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="action-btn btn-edit"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="action-btn btn-delete" onclick="showDeleteModal('Koder Komunitas')"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Artist United</td>
                            <td>Seniman bersatu</td>
                            <td><span class="status-badge status-published">Aktif</span></td>
                            <td>300</td>
                            <td>Desain, Ilustrasi</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="#" class="action-btn btn-view"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="action-btn btn-edit"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="action-btn btn-delete" onclick="showDeleteModal('Artist United')"><i class="fas fa-trash"></i></a>
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

        <div class="modal" id="deleteModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Hapus Komunitas</h3>
                    <button class="modal-close" onclick="closeDeleteModal()">&times;</button>
                </div>
                <div class="modal-body">
                    <p class="modal-text">Apakah Anda yakin ingin menghapus komunitas <strong id="deleteCommunityName"></strong>?</p>
                    <p class="modal-text">Tindakan ini tidak dapat dibatalkan dan semua data terkait komunitas ini akan dihapus permanen.</p>
                </div>
                <div class="modal-footer">
                    <button class="btn" onclick="closeDeleteModal()">Batal</button>
                    <button class="btn btn-primary">Hapus Komunitas</button>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
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

        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            padding-top: 80px;
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

        .status-published {
            background: rgba(46, 213, 115, 0.2);
            color: #2ed573;
        }

        .status-pending {
            background: rgba(255, 165, 2, 0.2);
            color: #ffa502;
        }

        .status-rejected {
            background: rgba(255, 71, 87, 0.2);
            color: #ff4757;
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

        .detail-info {
            margin-bottom: 30px;
        }

        .detail-info h3 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .detail-info p {
            margin-bottom: 10px;
        }

        .detail-list {
            margin-bottom: 30px;
        }

        .detail-list h3 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 15px;
        }
    </style>
    @endpush

    @push('scripts')
    <script>
        function showDeleteModal(communityName) {
            document.getElementById('deleteCommunityName').textContent = communityName;
            document.getElementById('deleteModal').style.display = 'flex';
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').style.display = 'none';
        }

        window.onclick = function(event) {
            const deleteModal = document.getElementById('deleteModal');
            if (event.target === deleteModal) {
                closeDeleteModal();
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
    @endpush
</x-admin-layout>
```