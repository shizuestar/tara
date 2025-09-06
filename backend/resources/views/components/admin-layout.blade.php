<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TARA Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="//unpkg.com/alpinejs" defer></script>

    <style>
        body { font-family: 'Space Grotesk', sans-serif; }
        #search-results::-webkit-scrollbar { width: 6px; }
        #search-results::-webkit-scrollbar-track { background: #f3f4f6; border-radius: 3px; }
        #search-results::-webkit-scrollbar-thumb { background: #4b5563; border-radius: 3px; }
        #search-results::-webkit-scrollbar-thumb:hover { background: #374151; }
        #search-results { scrollbar-color: #4b5563 #f3f4f6; scrollbar-width: thin; }
        #notification-rightbar { z-index: 1000; }
    </style>
    @stack('styles')
</head>
<body class="flex min-h-screen bg-gray-100 overflow-x-hidden">

    <!-- Sidebar -->
    <x-admin-sidebar />

    <!-- Main content -->
    <main class="flex-1 ml-0 md:ml-64 transition-all duration-300">
        <header class="h-[70px] bg-white border-b border-gray-200 px-12 flex items-center justify-between z-40 w-full sticky top-0">
            <div class="flex items-center w-1/3">
                <div class="flex items-center bg-gray-50 rounded-lg p-2 w-full">
                    <i class="fas fa-search text-gray-900 mr-2"></i>
                    <input type="text" placeholder="Cari halaman atau fitur..." class="border-none bg-transparent p-1 w-full font-['Space_Grotesk'] text-sm text-gray-900 outline-none focus:ring-2 focus:ring-yellow-500" id="search-input-header">
                </div>
            </div>

            <div class="flex items-center gap-4">
                <!-- Tombol Notifikasi -->
                <a href="#" id="navbar-bell-btn" class="w-10 h-10 rounded-lg flex items-center justify-center bg-gray-50 text-gray-900 hover:bg-yellow-500 hover:text-white transition-all duration-300 relative">
                    <i class="far fa-bell"></i>
                    <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs w-[18px] h-[18px] rounded-full flex items-center justify-center">3</span>
                </a>

                <div class="relative">
                    <button id="profile-btn" class="w-10 h-10 rounded-full overflow-hidden flex items-center justify-center bg-gray-50 border border-gray-200 hover:border-yellow-500 transition-all duration-300">
                        <img src="https://picsum.photos/40/40?random=1" alt="Profile" class="w-full h-full object-cover">
                    </button>
                    <div id="profile-dropdown" class="hidden absolute left-1/2 transform -translate-x-1/2 mt-2 w-48 bg-white rounded-lg shadow-xl border border-gray-200 opacity-0 scale-95 transition-all duration-300">
                        <div class="p-3 border-b border-gray-200">
                            <p class="text-sm font-medium text-gray-800">Admin User</p>
                            <p class="text-xs text-gray-500">Super Admin</p>
                        </div>
                        <div class="py-1">
                            <div class="relative group">
                                <button class="w-full flex items-center justify-between px-4 py-2 text-sm text-gray-700 hover:bg-amber-50 hover:text-amber-700 transition-all duration-300">
                                    <span><i class="fas fa-user mr-2"></i> Profil</span>
                                    <i class="fas fa-chevron-right text-xs text-gray-500 group-hover:text-amber-700"></i>
                                </button>
                                <div class="hidden group-hover:block absolute left-full top-0 w-48 bg-white rounded-lg shadow-xl border border-gray-200">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-amber-50 hover:text-amber-700 transition-all duration-300">Lihat Data Diri</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-amber-50 hover:text-amber-700 transition-all duration-300">Edit Data Diri</a>
                                </div>
                            </div>
                            <div class="relative group">
                                <button class="w-full flex items-center justify-between px-4 py-2 text-sm text-gray-700 hover:bg-amber-50 hover:text-amber-700 transition-all duration-300">
                                    <span><i class="fas fa-cog mr-2"></i> Pengaturan</span>
                                    <i class="fas fa-chevron-right text-xs text-gray-500 group-hover:text-amber-700"></i>
                                </button>
                                <div class="hidden group-hover:block absolute left-full top-0 w-48 bg-white rounded-lg shadow-xl border border-gray-200">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-amber-50 hover:text-amber-700 transition-all duration-300">Pengaturan Akun</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-amber-50 hover:text-amber-700 transition-all duration-300">Preferensi</a>
                                </div>
                            </div>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-amber-50 hover:text-amber-700 transition-all duration-300"><i class="fas fa-history mr-2"></i> Jejak Aktivitas</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-amber-50 hover:text-amber-700 transition-all duration-300"><i class="fas fa-question-circle mr-2"></i> Bantuan</a>
                            <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50 hover:text-red-700 transition-all duration-300"><i class="fas fa-sign-out-alt mr-2"></i> Keluar</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Konten halaman -->
        <div class="p-6 ml-3 pt-0 mt-3 bg-gray-100 min-h-[calc(100vh)] w-[100%]">
            {{ $slot }}
        </div>
    </main>

    <div id="notification-rightbar" class="hidden fixed right-0 top-0 h-full w-80 bg-white shadow-xl border-l border-gray-200 z-1000 transform translate-x-full transition-transform duration-300 ease-in-out">
        <div class="p-4 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-semibold text-gray-900">Notifikasi</h3>
                <button id="close-rightbar-btn" class="text-lg text-gray-500 hover:text-gray-800 transition-all duration-300">&times;</button>
            </div>
        </div>
        <div class="p-4 overflow-y-auto h-[calc(100%-60px)]">
            <div class="space-y-4">
                <div class="flex items-start gap-3">
                    <div class="w-2 h-2 bg-yellow-400 rounded-full mt-2"></div>
                    <div>
                        <p class="text-sm font-medium text-gray-900">Pengguna Baru Terdaftar</p>
                        <p class="text-xs text-gray-500">Andi Setiawan bergabung pada 2025-09-01 09:00 WIB</p>
                        <p class="text-xs text-gray-500 mt-1">10 menit lalu</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <div class="w-2 h-2 bg-green-400 rounded-full mt-2"></div>
                    <div>
                        <p class="text-sm font-medium text-gray-900">Proyek Disetujui</p>
                        <p class="text-xs text-gray-500">Proyek "TARA 2025" disetujui oleh admin</p>
                        <p class="text-xs text-gray-500 mt-1">1 jam lalu</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <div class="w-2 h-2 bg-red-400 rounded-full mt-2"></div>
                    <div>
                        <p class="text-sm font-medium text-gray-900">Peringatan Sistem</p>
                        <p class="text-xs text-gray-500">Kapasitas server hampir penuh</p>
                        <p class="text-xs text-gray-500 mt-1">2 jam lalu</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const profileBtn = document.getElementById('profile-btn');
            const profileDropdown = document.getElementById('profile-dropdown');
            const bellBtn = document.getElementById('navbar-bell-btn');
            const rightbar = document.getElementById('notification-rightbar');
            const closeRightbarBtn = document.getElementById('close-rightbar-btn');

            // Toggle Profile Dropdown
            profileBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                profileDropdown.classList.toggle('hidden');
                setTimeout(() => {
                    profileDropdown.classList.toggle('opacity-0');
                    profileDropdown.classList.toggle('scale-95');
                }, 10);
            });

            // Prevent dropdown from closing when clicking inside
            profileDropdown.addEventListener('click', (e) => {
                e.stopPropagation();
            });

            // Toggle Notification Rightbar
            bellBtn.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                rightbar.classList.toggle('translate-x-full');
                rightbar.classList.toggle('translate-x-0');
                if (!rightbar.classList.contains('hidden')) {
                    rightbar.classList.remove('hidden');
                }
            });

            closeRightbarBtn.addEventListener('click', () => {
                rightbar.classList.add('translate-x-full');
                rightbar.classList.remove('translate-x-0');
            });

            // Close dropdown and rightbar when clicking outside
            document.addEventListener('click', (e) => {
                if (!profileBtn.contains(e.target) && !profileDropdown.contains(e.target)) {
                    profileDropdown.classList.add('hidden', 'opacity-0', 'scale-95');
                }
                if (!bellBtn.contains(e.target) && !rightbar.contains(e.target)) {
                    rightbar.classList.add('translate-x-full');
                    rightbar.classList.remove('translate-x-0');
                }
            });
        });
    </script>
    @stack('scripts')
</body>
</html>