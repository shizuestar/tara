<aside class="sidebar">
        <div class="sidebar-header">
            <div class="logo">
                <div class="logo-icon">T</div>
                <div class="logo-text">TARA</div>
            </div>
        </div>
        
        <nav class="sidebar-nav">
            <div class="nav-section">
                <div class="nav-title">Menu Utama</div>
                <a href="{{ route('admin.dashboard.index') }}" class="nav-item active">
                    <div class="nav-icon"><i class="fas fa-th-large"></i></div>
                    <span class="nav-text">Dashboard</span>
                </a>
                <a href="#" class="nav-item">
                    <div class="nav-icon"><i class="fas fa-users"></i></div>
                    <span class="nav-text">Komunitas</span>
                    <span class="nav-badge">50</span>
                </a>
                <a href="{{ route('admin.proyek.index') }}" class="nav-item">
                    <div class="nav-icon"><i class="fas fa-folder"></i></div>
                    <span class="nav-text">Proyek</span>
                    <span class="nav-badge">100</span>
                </a>
                <a href="#" class="nav-item">
                    <div class="nav-icon"><i class="fas fa-blog"></i></div>
                    <span class="nav-text">Blog</span>
                    <span class="nav-badge">200</span>
                </a>
            </div>
            
            <div class="nav-section">
                <div class="nav-title">Konten</div>
                <a href="#" class="nav-item">
                    <div class="nav-icon"><i class="fas fa-calendar-alt"></i></div>
                    <span class="nav-text">Agenda</span>
                    <span class="nav-badge">30</span>
                </a>
                <a href="#" class="nav-item">
                    <div class="nav-icon"><i class="fas fa-user-friends"></i></div>
                    <span class="nav-text">User</span>
                </a>
                <a href="{{ route('admin.galeri.index') }}" class="nav-item">
                    <div class="nav-icon"><i class="fas fa-photo-video"></i></div>
                    <span class="nav-text">Media</span>
                </a>
            </div>
            
            <div class="nav-section">
                <div class="nav-title">Pengaturan</div>
                <a href="#" class="nav-item">
                    <div class="nav-icon"><i class="fas fa-cog"></i></div>
                    <span class="nav-text">Pengaturan Sistem</span>
                </a>
                <a href="#" class="nav-item">
                    <div class="nav-icon"><i class="fas fa-shield-alt"></i></div>
                    <span class="nav-text">Hak Akses</span>
                </a>
                <a href="#" class="nav-item">
                    <div class="nav-icon"><i class="fas fa-bell"></i></div>
                    <span class="nav-text">Notifikasi</span>
                </a>
            </div>
        </nav>
        
        <div class="sidebar-footer">
            <div class="user-profile">
                <div class="user-avatar">A</div>
                <div class="user-info">
                    <div class="user-name">Admin User</div>
                    <div class="user-role">Super Admin</div>
                </div>
                <a href="#" class="nav-action">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>
        </div>
    </aside>