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

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const profileBtn = document.getElementById('profile-btn');
        const profileDropdown = document.getElementById('profile-dropdown');

        profileBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            profileDropdown.classList.toggle('hidden');
            setTimeout(() => {
                profileDropdown.classList.toggle('opacity-0');
                profileDropdown.classList.toggle('scale-95');
            }, 10);
        });

        profileDropdown.addEventListener('click', (e) => {
            e.stopPropagation();
        });

        document.addEventListener('click', (e) => {
            if (!profileBtn.contains(e.target) && !profileDropdown.contains(e.target)) {
                profileDropdown.classList.add('hidden', 'opacity-0', 'scale-95');
            }
        });
    });
</script>