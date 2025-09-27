@props(['isIndex' => Route::is('home')])

<header class="py-6 px-8 flex justify-between items-center bg-white/80 backdrop-blur-md shadow-sm border-b border-gray-200 z-40 fixed top-0 left-0 w-full">
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-md shadow-sm">
        <div class="max-w-7xl mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <a href="{{ route('home') }}" class="text-3xl font-bold text-gray-900" style="font-family: 'Space Grotesk', sans-serif">
                        TARA
                    </a>
                    <div class="relative">
                        <span class="text-yellow-400 text-2xl">●</span>
                        <span class="absolute top-0 left-0 text-yellow-400 text-2xl animate-ping-slow">●</span>
                    </div>
                </div>

                @auth
                    @if(!$isIndex)
                        <div class="relative flex-1 max-w-sm md:max-w-md lg:max-w-lg mx-4">
                            <input type="text" placeholder="Cari..." class="w-full pl-10 pr-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-black text-gray-900 text-sm">
                            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                        </div>
                    @endif
                @endauth

                <button id="burger-toggle" class="md:hidden focus:outline-none z-[60] relative" aria-label="Buka Navigasi">
                    <svg class="w-7 h-7 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

                <div id="nav-menu" class="hidden md:flex md:flex-row flex-col md:items-center md:gap-8 absolute md:static top-full left-0 w-full md:w-auto bg-white md:bg-transparent shadow-md md:shadow-none px-6 py-6 md:p-0 z-50 transition-all duration-300">
                    <a href="{{ route('home') }}" class="nav-link block text-gray-700 hover:text-black font-medium py-2 {{ Route::is('home') ? 'text-black font-semibold' : '' }}">Beranda</a>
                    <a href="{{ route('galeri.index') }}" class="nav-link block text-gray-700 hover:text-black font-medium py-2 {{ Route::is('galeri') ? 'text-black font-semibold' : '' }}">Galeri</a>
                    <a href="{{ route('komunitas.index') }}" class="nav-link block text-gray-700 hover:text-black font-medium py-2 {{ Route::is('komunitas.index') ? 'text-black font-semibold' : '' }}">Komunitas</a>
                    <a href="{{ route('project.index') }}" class="nav-link block text-gray-700 hover:text-black font-medium py-2 {{ Route::is('Project') ? 'text-black font-semibold' : '' }}">Project</a>
                    <a href="{{ route('blogs.index') }}" class="nav-link block text-gray-700 hover:text-black font-medium py-2 {{ Route::is('blog') ? 'text-black font-semibold' : '' }}">Blog</a>
                    <a href="{{ route('events.index') }}" class="nav-link block text-gray-700 hover:text-black font-medium py-2 {{ Route::is('event.*') ? 'text-black font-semibold' : '' }}">Agenda</a>

                    @guest
                        <div class="flex flex-col md:flex-row items-center gap-3 md:gap-2 mt-4 md:mt-0">
                            <a href="{{ route('login') }}" class="px-4 py-2 text-gray-700 font-medium bg-white border border-gray-300 rounded-md hover:bg-gray-100 transition w-full md:w-auto text-center">
                                Log In
                            </a>
                            <a href="{{ route('register') }}" class="px-4 py-2 text-white font-medium bg-black rounded-md hover:bg-gray-800 transition w-full md:w-auto text-center">
                                Sign Up
                            </a>
                        </div>
                    @else
                        <div class="relative w-fit">
                            <i class="fas fa-bell text-gray-500 cursor-pointer text-xl" onclick="toggleNotifications()"></i>
                            <span class="absolute top-0 right-0 transform translate-x-1/2 -translate-y-1/2 bg-black text-white text-[10px] rounded-full w-4 h-4 flex items-center justify-center" id="unread-count">0</span>
                        </div>

                        <div class="relative w-fit">
                            <a href="{{ route('bookmarks.index') }}" class="hover:text-black text-gray-500 text-xl">
                                <i class="fas fa-bookmark"></i>
                            </a>
                        </div>

                        <div class="relative hidden md:block">
                            <button id="profile-toggle" class="flex items-center gap-2 focus:outline-none" aria-label="Buka Menu Profil">
                                <img src="{{ Auth::user()->avatar ? Storage::url(Auth::user()->avatar) : 'https://th.bing.com/th/id/OIP.8Mi9Qr8E5N1dP0GX6Nx3bQHaHa?w=166&h=180&c=7&r=0&o=5&dpr=1.5&pid=1.7' . Auth::user()->username }}" alt="Profile" class="w-8 h-8 rounded-full object-cover border border-gray-300">
                            </button>
                            <div id="profile-dropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-50 border border-gray-200">
                                <a href="{{ route('profile.edit', Auth::id()) }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 font-medium">Profil</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100 font-medium">Logout</button>
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </nav>
</header>

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .animate-ping-slow {
            animation: ping 2s cubic-bezier(0, 0, 0.2, 1) infinite;
        }
        @keyframes ping {
            75%, 100% {
                transform: scale(2);
                opacity: 0;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        const burgerToggle = document.getElementById('burger-toggle');
        const navMenu = document.getElementById('nav-menu');
        const profileToggle = document.getElementById('profile-toggle');
        const profileDropdown = document.getElementById('profile-dropdown');

        burgerToggle.addEventListener('click', () => {
            navMenu.classList.toggle('hidden');
        });

        profileToggle.addEventListener('click', () => {
            profileDropdown.classList.toggle('hidden');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', (event) => {
            if (!profileToggle.contains(event.target) && !profileDropdown.contains(event.target)) {
                profileDropdown.classList.add('hidden');
            }
        });

        function toggleNotifications() {
            console.log('Notifications toggled');
            document.getElementById('unread-count').textContent = '0';
        }
    </script>
@endpush