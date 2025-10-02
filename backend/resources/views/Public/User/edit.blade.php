<x-layout>
    @push('styles')
        
        <style>
            body, * {
                font-family: 'Space Grotesk', sans-serif !important;
            }

            /* ... CSS lainnya di sini ... (Kode Anda yang lain) */
            .button-primary::before {
                content: "";
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
                transition: left 0.6s;
                z-index: 1;
            }
            .button-primary:hover::before {
                left: 100%;
            }
            .text-gradient {
                background: linear-gradient(135deg, var(--primary-black) 0%, #4a4a4a 50%, var(--primary-black) 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                background-size: 200% 200%;
                animation: gradientShift 4s ease-in-out infinite;
            }
            
            @keyframes gradientShift {
                0% { background-position: 0% 50%; }
                50% { background-position: 100% 50%; }
                100% { background-position: 0% 50%; }
            }
            
            .animate-float {
                animation: float 6s ease-in-out infinite;
            }
            
            @keyframes float {
                0% { transform: translateY(0px); }
                50% { transform: translateY(-10px); }
                100% { transform: translateY(0px); }
            }
            
            .animate-pulseOnce {
                animation: pulseOnce 2s ease-in-out;
            }
            
            @keyframes pulseOnce {
                0% { transform: scale(1); }
                50% { transform: scale(1.05); }
                100% { transform: scale(1); }
            }
            
            .animate-slideIn {
                animation: slideIn 0.5s ease-out;
            }
            
            @keyframes slideIn {
                from { 
                    opacity: 0;
                    transform: translateY(20px);
                }
                to { 
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            
            .animate-appear {
                animation: appear 0.6s ease-out;
            }
            
            @keyframes appear {
                from { 
                    opacity: 0;
                }
                to { 
                    opacity: 1;
                }
            }
        </style>
    @endpush
    
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-primary-black animate-appear">
            {{ __('Edit Profil: ') }} <span class="text-gradient">{{ $user->username }}</span>
        </h2>
    </x-slot>

    <main class="mt-16 max-w-5xl mx-auto px-4 min-h-[calc(100vh-80px-160px)]">
        <section class="py-16 flex flex-col md:flex-row gap-8 bg-white/50 backdrop-blur-sm relative overflow-hidden rounded-xl shadow-lg">
            <div class="absolute inset-0 z-0 opacity-5">
                <div class="w-1/2 h-full bg-black/5 rounded-full absolute top-0 left-0 blur-3xl transform -translate-x-1/2 -translate-y-1/2"></div>
                <div class="w-1/2 h-full bg-black/5 rounded-full absolute bottom-0 right-0 blur-3xl transform translate-x-1/2 translate-y-1/2"></div>
            </div>

            <div class="relative z-10 w-full">
                {{-- Status Messages --}}
                @if (session('success'))
                    <div class="card bg-green-100/90 backdrop-blur-md border border-green-200 text-green-700 px-6 py-4 rounded-xl mb-6 animate-pulseOnce shadow-md" role="alert">
                        <span class="block font-semibold text-sm">✅ Berhasil!</span>
                        <p class="text-sm">{{ session('success') }}</p>
                    </div>
                @endif
                @if (session('error'))
                    <div class="card bg-red-100/90 backdrop-blur-md border border-red-200 text-red-700 px-6 py-4 rounded-xl mb-6 animate-pulseOnce shadow-md" role="alert">
                        <span class="block font-semibold text-sm">❌ Gagal!</span>
                        <p class="text-sm">{{ session('error') }}</p>
                    </div>
                @endif

                <div class="card bg-white/90 backdrop-blur-sm border border-gray-100 shadow-lg p-8 sm:p-10 rounded-xl hover:shadow-xl transition-all duration-400 animate-slideIn">
                    
                    {{-- FORMULIR DIMULAI DI SINI --}}
                    {{-- Kontainer diubah agar sejajar dengan formulir --}}
                    <form method="POST" action="{{ route('profile.update', $user->username) }}" enctype="multipart/form-data" class="flex flex-col md:flex-row items-start gap-8">
                        @csrf
                        @method('PUT')
                    
                        {{-- Avatar Section --}}
                        <div class="flex flex-col items-center w-full md:w-1/3">
                            <label for="avatar_file" class="block text-sm font-bold text-primary-black mb-4 animate-appear">Ubah Foto Profil</label>
                            <div class="relative w-32 h-32 md:w-48 md:h-48 rounded-full overflow-hidden border-4 border-primary-white shadow-lg group animate-float cursor-pointer" id="avatar-container">
                                
                                {{-- PERBAIKAN PATH GAMBAR --}}
                                <img id="avatar-preview" 
                                    src="{{ $user->avatar ? asset('storage/' . $user->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&color=FFFFFF&background=000000'}}" 
                                    alt="{{ $user->name }}'s avatar" 
                                    class="w-full h-full object-cover transition-all duration-300 group-hover:scale-110 group-hover:opacity-70">
                                <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                    <span class="text-primary-white text-xs font-semibold">Ganti Foto</span>
                                </div>
                            </div>
                            
                            {{-- PERBAIKAN INPUT FILE: Dihapus 'hidden' dan diganti dengan properti CSS untuk menyembunyikan secara visual --}}
                            <input type="file" id="avatar_file" name="avatar_file" accept="image/*" 
                                class="absolute opacity-0 pointer-events-none" style="z-index: -1;">
                                
                            @error('avatar_file')
                                <p class="text-xs text-red-600 mt-2 font-medium animate-appear">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Form Section --}}
                        <div class="flex-1 w-full md:w-2/3">
                            <h3 class="text-2xl font-extrabold text-primary-black mb-8 border-b border-subtle-gray pb-4 animate-appear">
                                🛠️ Edit Informasi Akun Anda
                            </h3>

                            <div class="space-y-6">
                                {{-- Basic Information --}}
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label for="name" class="block text-sm font-medium text-primary-black animate-appear">Nama Lengkap</label>
                                        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required
                                            class="mt-1 block w-full rounded-lg border border-subtle-gray shadow-sm focus:border-primary-black focus:ring focus:ring-primary-black focus:ring-opacity-50 transition duration-300 text-primary-black px-4 py-2">
                                        @error('name')
                                            <p class="text-xs text-red-600 mt-1 font-medium animate-appear">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="username" class="block text-sm font-medium text-primary-black animate-appear">Nama Pengguna (Username)</label>
                                        <input type="text" id="username" name="username" value="{{ old('username', $user->username) }}" required
                                            class="mt-1 block w-full rounded-lg border border-subtle-gray shadow-sm focus:border-primary-black focus:ring focus:ring-primary-black focus:ring-opacity-50 transition duration-300 text-primary-black px-4 py-2">
                                        @error('username')
                                            <p class="text-xs text-red-600 mt-1 font-medium animate-appear">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <label for="bio" class="block text-sm font-medium text-primary-black animate-appear">Bio / Deskripsi Diri (Maks. 1000 Karakter)</label>
                                    <textarea id="bio" name="bio" rows="4" maxlength="1000"
                                        class="mt-1 block w-full rounded-lg border border-subtle-gray shadow-sm focus:border-primary-black focus:ring focus:ring-primary-black focus:ring-opacity-50 transition duration-300 text-primary-black px-4 py-2"
                                        placeholder="Jelaskan tentang diri Anda, minat, atau karya Anda...">{{ old('bio', $user->bio) }}</textarea>
                                    <div class="text-xs text-gray-500 mt-1 text-right" id="bio-counter">0/1000</div>
                                    @error('bio')
                                        <p class="text-xs text-red-600 mt-1 font-medium animate-appear">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Social Links --}}
                                <div class="pt-4 border-t border-subtle-gray">
                                    <h3 class="text-lg font-bold text-primary-black mb-4 animate-appear">Tautan Sosial</h3>
                                    @php
                                        // Gunakan ?? [] agar tidak error jika social_links null
                                        $social_links = json_decode($user->social_links, true) ?? [];
                                    @endphp
                                    <div class="space-y-4">
                                        <div class="flex items-center">
                                            <i class="fab fa-instagram text-gray-600 mr-3 w-5 text-center"></i>
                                            <div class="flex-1">
                                                <label for="social_instagram" class="block text-sm font-medium text-primary-black animate-appear">Instagram</label>
                                                <input type="url" id="social_instagram" name="social_links[instagram]" value="{{ old('social_links.instagram', $social_links['instagram'] ?? '') }}"
                                                    placeholder="https://instagram.com/nama_akun"
                                                    class="mt-1 block w-full rounded-lg border border-subtle-gray shadow-sm focus:border-primary-black focus:ring focus:ring-primary-black focus:ring-opacity-50 transition duration-300 text-primary-black px-4 py-2">
                                                @error('social_links.instagram')
                                                    <p class="text-xs text-red-600 mt-1 font-medium animate-appear">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="flex items-center">
                                            <i class="fab fa-twitter text-gray-600 mr-3 w-5 text-center"></i>
                                            <div class="flex-1">
                                                <label for="social_twitter" class="block text-sm font-medium text-primary-black animate-appear">Twitter/X</label>
                                                <input type="url" id="social_twitter" name="social_links[twitter]" value="{{ old('social_links.twitter', $social_links['twitter'] ?? '') }}"
                                                    placeholder="https://twitter.com/nama_akun"
                                                    class="mt-1 block w-full rounded-lg border border-subtle-gray shadow-sm focus:border-primary-black focus:ring focus:ring-primary-black focus:ring-opacity-50 transition duration-300 text-primary-black px-4 py-2">
                                                @error('social_links.twitter')
                                                    <p class="text-xs text-red-600 mt-1 font-medium animate-appear">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="flex items-center">
                                            <i class="fas fa-globe text-gray-600 mr-3 w-5 text-center"></i>
                                            <div class="flex-1">
                                                <label for="social_website" class="block text-sm font-medium text-primary-black animate-appear">Website/Portfolio</label>
                                                <input type="url" id="social_website" name="social_links[website]" value="{{ old('social_links.website', $social_links['website'] ?? '') }}"
                                                    placeholder="https://www.portfolio.com"
                                                    class="mt-1 block w-full rounded-lg border border-subtle-gray shadow-sm focus:border-primary-black focus:ring focus:ring-primary-black focus:ring-opacity-50 transition duration-300 text-primary-black px-4 py-2">
                                                @error('social_links.website')
                                                    <p class="text-xs text-red-600 mt-1 font-medium animate-appear">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Form Actions --}}
                                <div class="flex justify-end pt-6 border-t border-subtle-gray gap-4">
                                    {{-- Tombol Batal --}}
                                    <a href="{{ route('profile.show', $user->username) }}" 
                                        class="button-primary relative overflow-hidden text-sm bg-subtle-gray text-primary-black px-5 py-2 rounded-full font-semibold uppercase tracking-wide hover:bg-gray-300 hover:shadow-xl hover:-translate-y-0.5 transition-all duration-400 group">
                                        Batal
                                        <span class="absolute top-0 left-[-100%] w-full h-full bg-gradient-to-r from-transparent via-white/20 to-transparent transition-all duration-600 group-hover:left-[100%]"></span>
                                    </a>
                                    {{-- Tombol Simpan Perubahan (Submit) --}}
                                    <button type="submit" 
                                        class="button-primary relative overflow-hidden text-sm bg-gradient-to-br from-primary-black to-gray-700 text-primary-white px-5 py-2 rounded-full font-semibold uppercase tracking-wide hover:bg-gray-700 hover:shadow-xl hover:-translate-y-0.5 transition-all duration-400 group">
                                        Simpan Perubahan
                                        <span class="absolute top-0 left-[-100%] w-full h-full bg-gradient-to-r from-transparent via-white/20 to-transparent transition-all duration-600 group-hover:left-[100%]"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    {{-- FORMULIR SELESAI DI SINI --}}

                </div>
            </div>
        </section>
    </main>

    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const avatarInput = document.getElementById('avatar_file');
                const avatarPreview = document.getElementById('avatar-preview');
                const avatarContainer = document.getElementById('avatar-container');
                const bioTextarea = document.getElementById('bio');
                const bioCounter = document.getElementById('bio-counter');
                const form = document.querySelector('form');
                const inputs = form.querySelectorAll('input[required], textarea[required]');

                // Avatar click to trigger file input
                avatarContainer.addEventListener('click', () => {
                    // Pemicu klik ini sekarang berfungsi karena input file ada di dalam formulir dan tidak sepenuhnya disembunyikan
                    avatarInput.click();
                });

                // Avatar preview update
                avatarInput.addEventListener('change', (event) => {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            avatarPreview.src = e.target.result;
                        };
                        reader.readAsDataURL(file);
                    }
                });

                // Bio character counter
                if (bioTextarea && bioCounter) {
                    // Initialize counter
                    bioCounter.textContent = `${bioTextarea.value.length}/1000`;
                    
                    // Update counter on input
                    bioTextarea.addEventListener('input', () => {
                        bioCounter.textContent = `${bioTextarea.value.length}/1000`;
                        
                        // Change color when approaching limit
                        if (bioTextarea.value.length > 900) {
                            bioCounter.classList.remove('text-gray-500');
                            bioCounter.classList.add('text-red-500');
                        } else {
                            bioCounter.classList.remove('text-red-500');
                            bioCounter.classList.add('text-gray-500');
                        }
                    });
                }

                // Form validation with visual feedback
                inputs.forEach(input => {
                    input.addEventListener('blur', () => {
                        if (!input.value) {
                            input.classList.add('border-red-300');
                            input.classList.remove('border-subtle-gray');
                        } else {
                            input.classList.remove('border-red-300');
                            input.classList.add('border-subtle-gray');
                        }
                    });
                });

                // Intersection Observer for animations (Dibiarkan Sesuai Kode Asli Anda)
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            if (!entry.target.classList.contains('animated')) {
                                if (entry.target.classList.contains('animate-appear')) {
                                    entry.target.classList.add('animated');
                                } else if (entry.target.classList.contains('animate-slideIn')) {
                                    entry.target.classList.add('animated');
                                }
                                observer.unobserve(entry.target);
                            }
                        }
                    });
                }, { threshold: 0.1, rootMargin: '0px' });

                document.querySelectorAll('.animate-appear, .animate-slideIn').forEach((el) => observer.observe(el));
            });
        </script>
    @endpush
</x-layout>