<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TARA Admin Panel</title>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
    @stack('styles')
</head>
<body>
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
                <a href="#" class="nav-item active">
                    <div class="nav-icon"><i class="fas fa-th-large"></i></div>
                    <span class="nav-text">Dashboard</span>
                </a>
                <a href="#" class="nav-item">
                    <div class="nav-icon"><i class="fas fa-users"></i></div>
                    <span class="nav-text">Komunitas</span>
                    <span class="nav-badge">50</span>
                </a>
                <a href="#" class="nav-item">
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
                <a href="#" class="nav-item">
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

    <main class="main-content">
        <header class="navbar">
            <div class="search-bar">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Cari sesuatu...">
            </div>
            <div class="navbar-actions">
                <a href="#" class="nav-action">
                    <i class="far fa-bell"></i>
                    <span class="notification-badge">3</span>
                </a>
                <a href="#" class="nav-action">
                    <i class="far fa-envelope"></i>
                    <span class="notification-badge">7</span>
                </a>
                <a href="#" class="nav-action">
                    <i class="fas fa-cog"></i>
                </a>
            </div>
        </header>

        <div class="content-wrapper">
            {{ $slot }}
        </div>
    </main>

    @stack('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navItems = document.querySelectorAll('.nav-item');
            navItems.forEach(item => {
                item.addEventListener('click', function() {
                    navItems.forEach(i => i.classList.remove('active'));
                    this.classList.add('active');
                });
            });

            const statValues = document.querySelectorAll('.stat-value');
            statValues.forEach(value => {
                const originalText = value.textContent;
                value.textContent = '0';
                let counter = 0;
                const target = parseInt(originalText.replace(/,/g, ''));
                const increment = target / 30;

                const updateCounter = () => {
                    if (counter < target) {
                        counter += increment;
                        value.textContent = Math.round(counter).toLocaleString();
                        setTimeout(updateCounter, 50);
                    } else {
                        value.textContent = originalText;
                    }
                };
                setTimeout(updateCounter, 500);
            });
        });
    </script>
</body>
</html>