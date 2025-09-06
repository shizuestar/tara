<aside class="w-[280px] bg-white border-r border-gray-200 shadow-sm flex flex-col fixed h-screen z-50">
    <div class="p-6 border-b border-gray-200 flex items-center justify-left bg-white">
        <div class="text-2xl font-bold tracking-normal uppercase" style="font-family: 'Space Grotesk', sans-serif;">
            TARA<span class="text-yellow-400">●</span>
        </div>
    </div>

    <nav class="p-5 flex-grow overflow-y-auto custom-scrollbar">
        <div class="mb-6">
            <div class="px-6 text-xs uppercase tracking-wide text-gray-500 font-semibold mb-4">Menu Utama</div>
            <a href="dashboard"
                class="nav-item flex items-center py-3 px-6 text-gray-900 font-medium transition-all border-l-4 border-yellow-400 bg-yellow-50 active">
                <div class="w-6 h-6 mr-4 flex items-center justify-center text-yellow-400"><i
                        class="fas fa-th-large"></i></div>
                <span class="flex-grow">Dashboard</span>
            </a>
            <a href="komunitas"
                class="nav-item flex items-center py-3 px-6 text-gray-900 font-medium transition-all border-l-4 border-transparent hover:bg-gray-100 hover:border-yellow-400">
                <div class="w-6 h-6 mr-4 flex items-center justify-center text-gray-500"><i class="fas fa-users"></i>
                </div>
                <span class="flex-grow">Komunitas</span>
                <span class="bg-yellow-400 text-gray-900 py-1 px-2 rounded-full text-xs font-semibold">50</span>
            </a>
            <a href="proyek"
                class="nav-item flex items-center py-3 px-6 text-gray-900 font-medium transition-all border-l-4 border-transparent hover:bg-gray-100 hover:border-yellow-400">
                <div class="w-6 h-6 mr-4 flex items-center justify-center text-gray-500"><i class="fas fa-folder"></i>
                </div>
                <span class="flex-grow">Proyek</span>
                <span class="bg-yellow-400 text-gray-900 py-1 px-2 rounded-full text-xs font-semibold">100</span>
            </a>
            <a href="blog"
                class="nav-item flex items-center py-3 px-6 text-gray-900 font-medium transition-all border-l-4 border-transparent hover:bg-gray-100 hover:border-yellow-400">
                <div class="w-6 h-6 mr-4 flex items-center justify-center text-gray-500"><i class="fas fa-blog"></i>
                </div>
                <span class="flex-grow">Blog</span>
                <span class="bg-yellow-400 text-gray-900 py-1 px-2 rounded-full text-xs font-semibold">200</span>
            </a>
        </div>

        <div class="mb-6">
            <div class="px-6 text-xs uppercase tracking-wide text-gray-500 font-semibold mb-4">Konten</div>
            <a href=""
                class="nav-item flex items-center py-3 px-6 text-gray-900 font-medium transition-all border-l-4 border-transparent hover:bg-gray-100 hover:border-yellow-400">
                <div class="w-6 h-6 mr-4 flex items-center justify-center text-gray-500"><i
                        class="fas fa-calendar-alt"></i></div>
                <span class="flex-grow">Agenda</span>
                <span class="bg-yellow-400 text-gray-900 py-1 px-2 rounded-full text-xs font-semibold">30</span>
            </a>
            <a href=""
                class="nav-item flex items-center py-3 px-6 text-gray-900 font-medium transition-all border-l-4 border-transparent hover:bg-gray-100 hover:border-yellow-400">
                <div class="w-6 h-6 mr-4 flex items-center justify-center text-gray-500"><i
                        class="fas fa-user-friends"></i></div>
                <span class="flex-grow">User</span>
            </a>
            <a href="{{ route('admin.galeri.index') }}"
                class="nav-item flex items-center py-3 px-6 text-gray-900 font-medium transition-all border-l-4 border-transparent hover:bg-gray-100 hover:border-yellow-400">
                <div class="w-6 h-6 mr-4 flex items-center justify-center text-gray-500"><i
                        class="fas fa-photo-video"></i></div>
                <span class="flex-grow">Media</span>
            </a>
        </div>

        <div class="mb-6">
            <div class="px-6 text-xs uppercase tracking-wide text-gray-500 font-semibold mb-4">Pengaturan</div>
            <a href="#"
                class="nav-item flex items-center py-3 px-6 text-gray-900 font-medium transition-all border-l-4 border-transparent hover:bg-gray-100 hover:border-yellow-400">
                <div class="w-6 h-6 mr-4 flex items-center justify-center text-gray-500"><i class="fas fa-cog"></i>
                </div>
                <span class="flex-grow">Pengaturan Sistem</span>
            </a>
            <a href="#"
                class="nav-item flex items-center py-3 px-6 text-gray-900 font-medium transition-all border-l-4 border-transparent hover:bg-gray-100 hover:border-yellow-400">
                <div class="w-6 h-6 mr-4 flex items-center justify-center text-gray-500"><i
                        class="fas fa-shield-alt"></i></div>
                <span class="flex-grow">Hak Akses</span>
            </a>
            <a href="#"
                class="nav-item flex items-center py-3 px-6 text-gray-900 font-medium transition-all border-l-4 border-transparent hover:bg-gray-100 hover:border-yellow-400">
                <div class="w-6 h-6 mr-4 flex items-center justify-center text-gray-500"><i class="fas fa-bell"></i>
                </div>
                <span class="flex-grow">Notifikasi</span>
            </a>
        </div>
    </nav>

    <div class="p-5 border-t border-gray-200 bg-gray-50">
        <div class="flex items-center gap-3">
            <div
                class="w-10 h-10 rounded-full bg-gradient-to-br from-yellow-400 to-yellow-500 flex items-center justify-center text-gray-900 font-semibold text-base">
                A
            </div>
            <div class="flex-grow">
                <div class="font-semibold text-sm">Admin User</div>
                <div class="text-gray-500 text-xs">Super Admin</div>
            </div>
            <a href="#"
                class="w-10 h-10 rounded-lg flex items-center justify-center bg-gray-50 text-gray-900 hover:bg-yellow-400 transition-all">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </div>
    </div>

    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 3px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #1f2937;
            border-radius: 3px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #111827;
        }
        .custom-scrollbar {
            scrollbar-width: thin;
            scrollbar-color: #1f2937 #f1f1f1;
        }
    </style>
</aside>