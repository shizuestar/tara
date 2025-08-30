<header class="h-[70px] bg-white border-b border-gray-200 px-12 flex items-center justify-between z-40 w-full sticky top-0">
    <div class="flex items-center w-1/3">

        <div class="flex items-center bg-gray-50 rounded-lg p-2 w-full">
            <i class="fas fa-search text-gray-900 mr-2"></i>
            <input type="text" placeholder="Cari halaman atau fitur..." class="border-none bg-transparent p-1 w-full font-['Space_Grotesk'] text-sm text-gray-900 outline-none focus:ring-2 focus:ring-yellow-500" id="search-input-header">
        </div>
    </div>
    <div class="flex items-center gap-4">
        <a href="#" class="w-10 h-10 rounded-lg flex items-center justify-center bg-gray-50 text-gray-900 hover:bg-yellow-500 hover:text-white transition-all duration-300 relative">
            <i class="far fa-bell"></i>
            <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs w-[18px] h-[18px] rounded-full flex items-center justify-center">3</span>
        </a>
        <div class="relative">
            <button id="profile-btn" class="w-10 h-10 rounded-full overflow-hidden flex items-center justify-center bg-gray-50 border border-gray-200 hover:border-yellow-500 transition-all duration-300">
                <img src="https://picsum.photos/40/40?random=1" alt="Profile" class="w-full h-full object-cover">
            </button>
            <div id="profile-dropdown" class="hidden absolute left-1/2 transform -translate-x-1/2 mt-2 w-48 bg-white rounded-lg shadow-xl border border-gray-200 opacity-0 transform scale-95 transition-all duration-300">
                <div class="p-3 border-b border-gray-200">
                    <p class="text-sm font-medium text-gray-800" style="font-family: 'Space Grotesk', sans-serif;">Admin User</p>
                    <p class="text-xs text-gray-500">Super Admin</p>
                </div>
                <div class="py-1">
                    <div class="relative group">
                        <button class="w-full flex items-center justify-between px-4 py-2 text-sm text-gray-700 hover:bg-amber-50 hover:text-amber-700 transition-all duration-300" style="font-family: 'Space Grotesk', sans-serif;">
                            <span><i class="fas fa-user mr-2"></i> Profil</span>
                            <i class="fas fa-chevron-right text-xs text-gray-500 group-hover:text-amber-700"></i>
                        </button>
                        <div class="hidden group-hover:block absolute left-full top-0 w-48 bg-white rounded-lg shadow-xl border border-gray-200">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-amber-50 hover:text-amber-700 transition-all duration-300" style="font-family: 'Space Grotesk', sans-serif;">
                                Lihat Data Diri
                            </a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-amber-50 hover:text-amber-700 transition-all duration-300" style="font-family: 'Space Grotesk', sans-serif;">
                                Edit Data Diri
                            </a>
                        </div>
                    </div>
                    <!-- Pengaturan Submenu -->
                    <div class="relative group">
                        <button class="w-full flex items-center justify-between px-4 py-2 text-sm text-gray-700 hover:bg-amber-50 hover:text-amber-700 transition-all duration-300" style="font-family: 'Space Grotesk', sans-serif;">
                            <span><i class="fas fa-cog mr-2"></i> Pengaturan</span>
                            <i class="fas fa-chevron-right text-xs text-gray-500 group-hover:text-amber-700"></i>
                        </button>
                        <div class="hidden group-hover:block absolute left-full top-0 w-48 bg-white rounded-lg shadow-xl border border-gray-200">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-amber-50 hover:text-amber-700 transition-all duration-300" style="font-family: 'Space Grotesk', sans-serif;">
                                Pengaturan Akun
                            </a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-amber-50 hover:text-amber-700 transition-all duration-300" style="font-family: 'Space Grotesk', sans-serif;">
                                Preferensi
                            </a>
                        </div>
                    </div>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-amber-50 hover:text-amber-700 transition-all duration-300" style="font-family: 'Space Grotesk', sans-serif;">
                        <i class="fas fa-history mr-2"></i> Jejak Aktivitas
                    </a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-amber-50 hover:text-amber-700 transition-all duration-300" style="font-family: 'Space Grotesk', sans-serif;">
                        <i class="fas fa-question-circle mr-2"></i> Bantuan
                    </a>
                    <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50 hover:text-red-700 transition-all duration-300" style="font-family: 'Space Grotesk', sans-serif;">
                        <i class="fas fa-sign-out-alt mr-2"></i> Keluar
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Search Modal -->
    <div class="hidden fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50 opacity-0 transition-all duration-500" id="searchModal">
        <div class="bg-white rounded-xl p-5 w-full max-w-lg shadow-xl transform scale-95 transition-transform duration-300">
            <div class="flex justify-between items-center mb-4 border-b border-gray-200 pb-3">
                <h3 class="text-lg font-semibold text-gray-800" style="font-family: 'Space Grotesk', sans-serif;">Pencarian Admin</h3>
                <button id="close-search-btn" class="text-lg text-gray-500 hover:text-gray-800 transition-all duration-300" aria-label="Tutup modal">&times;</button>
            </div>
            <div class="flex items-center bg-gray-50 rounded-lg p-2 mb-4">
                <i class="fas fa-search text-gray-900 mr-2"></i>
                <input type="text" placeholder="Cari halaman atau fitur..." class="border-none bg-transparent p-1 w-full font-['Space_Grotesk'] text-sm text-gray-900 outline-none focus:ring-2 focus:ring-yellow-500" id="search-input-modal">
            </div>
            <div id="search-results" class="max-h-[300px] overflow-y-auto">
                <!-- Search results will be populated here -->
            </div>
            <div class="mt-4">
                <button id="search-submit-btn" class="bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-medium px-4 py-2 rounded-lg w-full transition-all duration-300">Cari</button>
            </div>
        </div>
    </div>

    @push('styles')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap');

        :root {
            --amber-accent: #f59e0b;
            --gray-dark: #1f2937;
            --gray-muted: #6b7280;
        }

        .transition-all {
            transition: all 0.3s ease;
        }

        #profile-dropdown:not(.hidden) {
            opacity: 1;
            transform: translateX(-50%) scale(1);
        }

        #searchModal:not(.hidden) {
            opacity: 1;
        }

        #searchModal .transform:not(.scale-95) {
            transform: scale(1);
        }

        #profile-btn:focus, #profile-btn:hover {
            outline: none;
            box-shadow: 0 0 0 2px rgba(245, 158, 11, 0.3);
        }

        input:focus {
            box-shadow: 0 0 0 2px rgba(245, 158, 11, 0.3);
        }

        #search-results::-webkit-scrollbar {
            width: 6px;
        }

        #search-results::-webkit-scrollbar-track {
            background: #f3f4f6;
            border-radius: 3px;
        }

        #search-results::-webkit-scrollbar-thumb {
            background: #4b5563;
            border-radius: 3px;
        }

        #search-results::-webkit-scrollbar-thumb:hover {
            background: #374151;
        }

        #search-results {
            scrollbar-color: #4b5563 #f3f4f6;
            scrollbar-width: thin;
        }

        .group:hover .group-hover\:block {
            display: block;
        }
    </style>
    @endpush

    @push('scripts')
    <script>
        // Admin Pages and Features for Search (based on sidebar)
        const adminItems = [
            { name: "Dashboard", url: "/admin/dashboard", category: "Menu Utama" },
            { name: "Komunitas", url: "/admin/community", category: "Menu Utama" },
            { name: "Proyek", url: "/admin/projects", category: "Menu Utama" },
            { name: "Blog", url: "/admin/blog", category: "Menu Utama" },
            { name: "Agenda", url: "/admin/agenda", category: "Konten" },
            { name: "User", url: "/admin/users", category: "Konten" },
            { name: "Media", url: "/admin/media", category: "Konten" },
            { name: "Pengaturan Sistem", url: "/admin/settings", category: "Pengaturan" },
            { name: "Hak Akses", url: "/admin/permissions", category: "Pengaturan" },
            { name: "Notifikasi", url: "/admin/notifications", category: "Pengaturan" },
        ];

        document.getElementById('profile-btn').addEventListener('click', () => {
            const dropdown = document.getElementById('profile-dropdown');
            dropdown.classList.toggle('hidden');
            setTimeout(() => {
                dropdown.classList.toggle('opacity-0');
                dropdown.classList.toggle('scale-95');
            }, 10);
        });

        document.addEventListener('click', (e) => {
            const profileBtn = document.getElementById('profile-btn');
            const dropdown = document.getElementById('profile-dropdown');
            if (!profileBtn.contains(e.target) && !dropdown.contains(e.target)) {
                dropdown.classList.add('hidden', 'opacity-0', 'scale-95');
            }
        });

        document.getElementById('search-input-header').addEventListener('click', () => {
            const modal = document.getElementById('searchModal');
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.add('opacity-100');
                document.querySelector('#searchModal .transform').classList.remove('scale-95');
                const modalInput = document.getElementById('search-input-modal');
                modalInput.value = document.getElementById('search-input-header').value;
                modalInput.focus();
                renderSearchResults(modalInput.value);
            }, 10);
        });

        function closeSearchModal() {
            const modal = document.getElementById('searchModal');
            modal.classList.remove('opacity-100');
            document.querySelector('#searchModal .transform').classList.add('scale-95');
            setTimeout(() => {
                modal.classList.add('hidden');
                document.getElementById('search-input-header').value = '';
                document.getElementById('search-input-modal').value = '';
                renderSearchResults('');
            }, 300);
        }

        document.getElementById('close-search-btn').addEventListener('click', closeSearchModal);

        document.getElementById('searchModal').addEventListener('click', (e) => {
            if (e.target === document.getElementById('searchModal')) {
                closeSearchModal();
            }
        });

        function renderSearchResults(query) {
            const searchResults = document.getElementById('search-results');
            const filteredItems = query
                ? adminItems.filter(item => item.name.toLowerCase().includes(query.toLowerCase()))
                : adminItems;

            searchResults.innerHTML = filteredItems.length > 0
                ? filteredItems.map(item => `
                    <a href="${item.url}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-amber-50 hover:text-amber-700 transition-all duration-300" style="font-family: 'Space Grotesk', sans-serif;">
                        <span class="font-medium">${item.name}</span>
                        <span class="text-xs text-gray-500">(${item.category})</span>
                    </a>
                `).join('')
                : '<p class="px-4 py-2 text-sm text-gray-500" style="font-family: \'Space Grotesk\', sans-serif;">Tidak ada hasil ditemukan</p>';
        }

        document.getElementById('search-input-header').addEventListener('input', (e) => {
            document.getElementById('search-input-modal').value = e.target.value;
            renderSearchResults(e.target.value);
        });

        document.getElementById('search-input-modal').addEventListener('input', (e) => {
            document.getElementById('search-input-header').value = e.target.value;
            renderSearchResults(e.target.value);
        });

        document.getElementById('search-submit-btn').addEventListener('click', () => {
            const query = document.getElementById('search-input-modal').value;
            console.log('Searching for:', query);

            closeSearchModal();
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                document.getElementById('profile-dropdown').classList.add('hidden', 'opacity-0', 'scale-95');
                closeSearchModal();
            }
        });

        document.addEventListener('DOMContentLoaded', () => {
            renderSearchResults('');
        });
    </script>
    @endpush
</header>