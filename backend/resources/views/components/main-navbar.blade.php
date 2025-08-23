<header
    class="py-6 px-8 flex justify-between items-center bg-white shadow-sm border-b border-gray-200 z-40 fixed top-0 left-0 w-full">
    <nav class="fixed top-0 left-0 right-0 z-50 glass-effect bg-white/80 backdrop-blur-md shadow-sm">
        <div class="max-w-7xl mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <div class="flex items-center gap-3">
                    <a href="#" class="text-3xl font-bold text-gray-900">TARA</a>
                    <div class="relative">
                        <span class="text-yellow-400 text-2xl">●</span>
                        <span class="absolute top-0 left-0 text-yellow-400 text-2xl animate-ping-slow">●</span>
                    </div>
                </div>

                <button aria-label="Buka Navigasi" id="burger-toggle"
                    class="md:hidden focus:outline-none z-[60] relative">
                    <svg class="w-7 h-7 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

                <!-- Menu Navigasi -->
                <div id="nav-menu"
                    class="hidden md:flex md:flex-row flex-col md:items-center md:gap-8 absolute md:static top-full left-0 w-full md:w-auto bg-white md:bg-transparent shadow-md md:shadow-none px-6 py-6 md:p-0 z-50 transition-all duration-300">
                    <a href="/index.html"
                        class="nav-link block text-gray-700 hover:text-black font-medium py-2">Beranda</a>
                    <a href="/galeri.html"
                        class="nav-link block text-gray-700 hover:text-black font-medium py-2">Galeri</a>
                    <a href="/komunitas.html"
                        class="nav-link block text-gray-700 hover:text-black font-medium py-2">Komunitas</a>
                    <a href="/proyek.html"
                        class="nav-link block text-gray-700 hover:text-black font-medium py-2">Proyek</a>
                    <a href="/blog.html" class="nav-link block text-gray-700 hover:text-black font-medium py-2">Blog</a>
                    <a href="/agenda.html"
                        class="nav-link block text-gray-700 hover:text-black font-medium py-2">Agenda</a>

                    <div class="flex flex-col md:flex-row items-center gap-3 md:gap-2 mt-4 md:mt-0">
                        <a href="/login"
                            class="px-4 py-2 text-gray-700 font-medium bg-white border border-gray-300 rounded-md hover:bg-gray-100 transition w-full md:w-auto text-center">
                            Log In
                        </a>
                        <a href="/register"
                            class="px-4 py-2 text-white font-medium bg-black rounded-md hover:bg-gray-800 transition w-full md:w-auto text-center">
                            Sign Up
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </nav>
</header>