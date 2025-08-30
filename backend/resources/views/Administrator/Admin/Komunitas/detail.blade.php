```blade
<x-admin-layout>
    <div class="content-background">
        <div class="page-header">
            <h1 class="page-title">
                <i class="fas fa-users"></i>
                Detail Komunitas: Fotografi Enthusiast
            </h1>
            <button class="btn btn-primary">
                <i class="fas fa-edit"></i>
                Edit Komunitas
            </button>
        </div>

        <div class="content-section">
            <div class="detail-info">
                <h3>Informasi Lengkap</h3>
                <p><strong>Nama:</strong> Fotografi Enthusiast</p>
                <p><strong>Deskripsi:</strong> Komunitas ini didedikasikan untuk para pecinta fotografi di Bali dan sekitarnya. Kami mengadakan workshop, sharing session, dan kontes foto secara rutin untuk meningkatkan skill anggota.</p>
                <p><strong>Status:</strong> Aktif</p>
                <p><strong>Jumlah Anggota:</strong> 150</p>
                <p><strong>Kategori:</strong> Fotografi</p>
            </div>
            <div class="detail-list">
                <h3>Daftar Admin dan Petugas</h3>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Role</th>
                                <th>Email</th>
                                <th width="120">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Dewi Santika</td>
                                <td>Admin</td>
                                <td>dewi@example.com</td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="#" class="action-btn btn-view"><i class="fas fa-eye"></i></a>
                                        <a href="#" class="action-btn btn-edit"><i class="fas fa-edit"></i></a>
                                        <a href="#" class="action-btn btn-delete" onclick="showDeleteModal('Dewi Santika')"><i class="fas fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Aldi Pratama</td>
                                <td>Moderator</td>
                                <td>aldi@example.com</td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="#" class="action-btn btn-view"><i class="fas fa-eye"></i></a>
                                        <a href="#" class="action-btn btn-edit"><i class="fas fa-edit"></i></a>
                                        <a href="#" class="action-btn btn-delete" onclick="showDeleteModal('Aldi Pratama')"><i class="fas fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="detail-list">
                <h3>Aktivitas Terbaru Komunitas</h3>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Aktivitas</th>
                                <th>Tanggal</th>
                                <th>Deskripsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Workshop Fotografi Dasar</td>
                                <td>20 Agu 2023</td>
                                <td>Workshop untuk pemula di bidang fotografi.</td>
                            </tr>
                            <tr>
                                <td>Sharing Session</td>
                                <td>15 Agu 2023</td>
                                <td>Berbagi pengalaman fotografi landscape.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="detail-list">
                <h3>Proyek Kolaborasi Terbaru</h3>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Nama Proyek</th>
                                <th>Deskripsi</th>
                                <th>Tanggal Mulai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Proyek Foto Alam Bali</td>
                                <td>Kolaborasi memotret keindahan alam Bali.</td>
                                <td>10 Agu 2023</td>
                            </tr>
                            <tr>
                                <td>Exhibition Virtual</td>
                                <td>Pameran foto secara online.</td>
                                <td>05 Agu 2023</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="detail-list">
                <h3>Karya Galeri Terkait</h3>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Judul Karya</th>
                                <th>Kreator</th>
                                <th>Tanggal Upload</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Sunset at Bali Beach</td>
                                <td>Dewi Santika</td>
                                <td>12 Agu 2023</td>
                            </tr>
                            <tr>
                                <td>Urban Architecture</td>
                                <td>Sari Indah</td>
                                <td>03 Agu 2023</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="modal" id="deleteModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Hapus Anggota</h3>
                    <button class="modal-close" onclick="closeDeleteModal()">&times;</button>
                </div>
                <div class="modal-body">
                    <p class="modal-text">Apakah Anda yakin ingin menghapus anggota <strong id="deleteCommunityName"></strong> dari komunitas?</p>
                    <p class="modal-text">Tindakan ini tidak dapat dibatalkan.</p>
                </div>
                <div class="modal-footer">
                    <button class="btn" onclick="closeDeleteModal()">Batal</button>
                    <button class="btn btn-primary">Hapus Anggota</button>
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

        .content-section {
            background: var(--primary-bg);
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
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
    </style>
    @endpush

    @push('scripts')
    <script>
        function showDeleteModal(name) {
            document.getElementById('deleteCommunityName').textContent = name;
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
    </script>
    @endpush
</x-admin-layout>
```