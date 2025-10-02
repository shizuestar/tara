<x-layout>
    @push('styles')
    <style>
        body, * {
            font-family: 'Space Grotesk', sans-serif !important;
        }

        /* --- CSS Kustom untuk Efek Shine pada Tombol CTA --- */
        .cta-shine-btn {
            position: relative;
            overflow: hidden;
            z-index: 10;
        }

        .cta-shine-btn::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%; /* Mulai dari luar kiri */
            width: 50%;
            height: 100%;
            background: rgba(255, 255, 255, 0.4); /* Warna berkilau putih transparan */
            transform: skewX(-20deg); /* Membuat sudut miring */
            transition: all 0.5s;
            z-index: -1;
        }

        .cta-shine-btn:hover::after {
            left: 150%; /* Pindah ke luar kanan */
        }
        /* --- Akhir CSS Kustom --- */

    </style>
    @endpush

    <div id="particles-js" class="fixed inset-0 -z-10"></div>
    
    {{-- HERO SECTION: Menggunakan gambar awal --}}
    <section class="relative hero-image perspective overflow-hidden flex items-center justify-center h-screen bg-cover bg-center"
        style="background-image: url('https://picsum.photos/1200/600?grayscale')">
        <div class="absolute inset-0 bg-gradient-to-b from-gray-100/10 to-gray-900/40"></div>
        <div id="hero-text" class="relative max-w-4xl mx-auto px-4 text-center text-gray-100">
            <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight">
                Galeri Kreatif Anak Muda<span class="text-gray-400 align-middle ml-1">●</span>
            </h1>
            <p class="mt-4 text-lg leading-relaxed">
                Inspirasi wawancara, tutorial, dan tips Nusantara.
            </p>
            <a href="{{ $blogs->first() ? route('blogs.show', $blogs->first()) : '#' }}"
                class="inline-block mt-6 px-6 py-3 bg-gray-100 text-gray-900 rounded-full font-semibold hover:bg-gray-300 transition duration-300 shadow-xl">
                Jelajahi Galeri
            </a>
        </div>
    </section>
    
    <hr>

    {{-- FILTER SECTION --}}
    <section class="py-4 bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-center gap-3 flex-wrap">
                <a href="{{ route('blogs.index', ['category' => 'all']) }}"
                    class="category-filter px-4 py-2 rounded-full text-sm font-semibold transition duration-300 border border-gray-300 hover:bg-gray-900 hover:text-white
                        {{ request('category', 'all') === 'all' ? 'bg-gray-900 text-white border-yellow-500' : 'bg-gray-200 text-gray-700' }}"
                    data-category="all">
                    Semua
                </a>
                @foreach($categories as $cat)
                    <a href="{{ route('blogs.index', ['category' => $cat->name]) }}"
                        class="category-filter px-4 py-2 rounded-full text-sm font-semibold transition duration-300 border border-gray-300 hover:bg-gray-900 hover:text-white
                            {{ request('category') === $cat->name ? 'bg-gray-900 text-white border-yellow-500' : 'bg-gray-200 text-gray-700' }}"
                        data-category="{{ $cat->name }}">
                        {{ $cat->name }}
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <hr>

    {{-- BLOG POSTS SECTION: Menggunakan kelas kustom hover-3d dan blog-card --}}
    <section class="relative top-8 pb-32 bg-gray-100">
        <div class="max-w-7xl mx-auto px-6">
            <div id="blog-posts" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($blogs as $blog)
                    <div class="blog-card hover-3d relative flex flex-col h-[500px] min-h-[500px] bg-white rounded-xl overflow-hidden shadow-md transition duration-300">
                        <a href="{{ route('blogs.show', $blog) }}" class="inner flex flex-col h-full">
                            <img src="{{ $blog->cover_image ? asset('storage/' . $blog->cover_image) : 'https://picsum.photos/600/400?grayscale&blog' . $blog->id }}"
                                alt="{{ $blog->title }}" class="w-full h-48 object-cover transition duration-500 group-hover:scale-105 group-hover:brightness-90" />
                            
                            <div class="p-4 flex flex-col flex-grow">
                                <div class="flex-grow">
                                    <span class="inline-block px-3 py-1 bg-gray-200 text-xs text-gray-700 rounded-full mb-3 font-medium">{{ $blog->category->name }}</span>
                                    <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-2">
                                        {{ $blog->title }}
                                    </h3>
                                    <p class="text-sm text-gray-600 line-clamp-3">
                                        {{ Str::limit(strip_tags($blog->content), 100) }}
                                    </p>
                                </div>
                                
                                <div class="mt-4 pt-4 border-t border-gray-100">
                                    <div class="flex items-center justify-between text-xs text-gray-500 mb-3">
                                        <div class="flex items-center gap-4">
                                            <span><i class="fas fa-calendar-alt mr-1"></i>{{ $blog->created_at->format('d M Y') }}</span>
                                            <span><i class="fas fa-eye mr-1"></i>{{ $blog->views }} Dilihat</span>
                                        </div>
                                    </div>

                                    <div class="flex gap-4">
                                        {{-- Tombol Like --}}
                                        <button type="button" class="like-btn text-gray-600 text-sm hover:text-red-600 transition duration-300 focus:outline-none 
                                                     {{ in_array($blog->id, $userLikes ?? []) ? 'text-red-600' : '' }}"
                                            data-id="{{ $blog->id }}">
                                            <i class="fas fa-heart"></i> <span class="like-count">{{ $blog->likes->count() ?? 0 }}</span> Suka
                                        </button>
                                        
                                        {{-- Tombol Komentar --}}
                                        <button class="text-gray-600 text-sm hover:text-gray-900 transition duration-300 focus:outline-none">
                                            <i class="fas fa-comment"></i> {{ $blog->comments->count() ?? 0 }} Komentar
                                        </button>
                                        
                                        {{-- Tombol Bookmark --}}
                                        <button type="button" class="bookmark-btn text-gray-600 text-sm hover:text-gray-900 transition duration-300 focus:outline-none 
                                                     {{ in_array($blog->id, $userBookmarks ?? []) ? 'text-gray-900' : '' }}"
                                            data-id="{{ $blog->id }}" data-type="App\Models\Blog">
                                            <i class="fas fa-bookmark"></i> Bookmark
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="bookmark-notification hidden absolute top-4 right-4 bg-gray-900 text-white text-xs font-bold px-3 py-1 rounded-full opacity-0 transition duration-300 transform -translate-y-4 shadow-xl"></div>
                    </div>
                @endforeach
            </div>
            
            {{-- PAGINATION --}}
            <div id="pagination" class="mt-16 text-center">
                {{ $blogs->links() }}
            </div>
            <div id="load-more-container" class="mt-16 text-center hidden">
                <button id="load-more"
                    class="px-6 py-3 bg-gray-900 text-gray-100 rounded-full font-semibold hover:bg-gray-700 transition duration-300 shadow-lg">
                    Muat Lebih Banyak
                </button>
            </div>
        </div>
    </section>

    <hr>

    {{-- CTA SECTION (Call to Action) --}}
    <section id="cta-section" class="relative py-20 bg-gradient-to-b from-gray-100 to-white text-center border-t border-gray-200 overflow-hidden">
        {{-- Dekorasi Latar Belakang --}}
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            {{-- Tambahkan pola abstrak atau ikon --}}
            <svg class="absolute top-1/4 left-1/4 w-32 h-32 text-yellow-500 transform rotate-45" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.83-7-7.93 0-1.79.62-3.46 1.63-4.79L10 10h4l4.37-4.79C17.38 8.54 18 10.21 18 12c0 4.1-3.05 7.44-7 7.93zM12 4.07c3.95.49 7 3.83 7 7.93s-3.05 7.44-7 7.93V4.07z"/></svg>
            <svg class="absolute bottom-1/4 right-1/4 w-40 h-40 text-gray-700 transform -rotate-12" fill="currentColor" viewBox="0 0 24 24"><path d="M19 12h-2v3h2v-3zm0 5h-2v2h2v-2zm0-8h-2v3h2V9zm-5 5h-2v5h2v-5zm0-7h-2v3h2V7zm0 8h-2v2h2v-2zm-5-3H7v5h2v-5zm0-7H7v3h2V7zm0 8H7v2h2v-2z"/></svg>
        </div>

        <div class="relative max-w-6xl mx-auto px-6 z-10">
            {{-- Ikon Pemisah --}}
            <div class="inline-block mb-4 text-4xl text-gray-900">
                 <i class="fas fa-feather-alt text-yellow-500"></i>
            </div>
            
            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4 tracking-tight">
                Bagikan Ceritamu
            </h2>
            <p class="text-xl text-gray-700 mb-10 max-w-2xl mx-auto leading-relaxed">
                Tulis artikel, wawancara, atau tutorial untuk menginspirasi komunitas dan mendapatkan pengakuan.
            </p>
            {{-- PENYESUAIAN DI SINI: Tambahkan kelas cta-shine-btn --}}
            <a href="{{ route('blogs.create') }}"
                class="inline-block px-10 py-4 bg-gray-900 text-white rounded-full font-extrabold text-lg hover:bg-gray-700 transition duration-300 shadow-2xl transform hover:scale-105 cta-shine-btn">
                Mulai Menulis Sekarang
            </a>
        </div>
    </section>

    @push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
        // Logika Like (tetap menggunakan AJAX/JSON)
        document.querySelectorAll('.like-btn').forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                const blogId = this.dataset.id;

                fetch('{{ route('blogs.like', ':id') }}'.replace(':id', blogId), {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => {
                    if (response.status === 401) {
                        alert('Silakan login untuk menyukai karya.');
                        return;
                    }
                    return response.json();
                })
                .then(data => {
                    if (data) {
                        const likeCount = this.querySelector('.like-count');
                        likeCount.textContent = data.likes;
                        if (data.liked) {
                            this.classList.replace('text-gray-600', 'text-red-600');
                        } else {
                            this.classList.replace('text-red-600', 'text-gray-600');
                        }
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            });
        });

        // Logika Bookmark (tetap menggunakan AJAX/JSON)
        document.querySelectorAll('.bookmark-btn').forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                const bookmarkableId = this.dataset.id;
                const bookmarkableType = this.dataset.type;
                const notification = this.closest('.blog-card').querySelector('.bookmark-notification');

                fetch('{{ route('bookmarks.toggle') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        bookmarkable_id: bookmarkableId,
                        bookmarkable_type: bookmarkableType
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data) {
                        // Perbarui status tombol
                        if (data.bookmarked) {
                            this.classList.replace('text-gray-600', 'text-gray-900');
                        } else {
                            this.classList.replace('text-gray-900', 'text-gray-600');
                        }

                        // Tampilkan notifikasi
                        notification.textContent = data.message;
                        notification.classList.add('opacity-100', 'translate-y-0');
                        setTimeout(() => {
                            notification.classList.remove('opacity-100', 'translate-y-0');
                        }, 2000);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat memproses bookmark.');
                });
            });
        });

        // Logika Animasi (GSAP & Particles)
        
        gsap.registerPlugin(ScrollTrigger);

        gsap.from("#hero-text", {
            opacity: 0,
            y: 60,
            duration: 1.2,
            ease: "power4.out",
        });

        gsap.from(".hero-image", {
            scale: 1.1,
            opacity: 0,
            duration: 1.5,
            ease: "power4.out",
        });

        gsap.utils.toArray("section:not(:first-child)").forEach((section, i) => {
            gsap.from(section, {
                opacity: 0,
                y: 60,
                duration: 1,
                ease: "power3.out",
                scrollTrigger: {
                    trigger: section,
                    start: "top 80%",
                },
                delay: i * 0.1,
            });
        });

        // Animasi tambahan untuk CTA
        gsap.from("#cta-section h2", {
            scrollTrigger: {
                trigger: "#cta-section",
                start: "top 80%",
            },
            y: 30,
            opacity: 0,
            duration: 0.6
        });
        gsap.from("#cta-section a", {
            scrollTrigger: {
                trigger: "#cta-section",
                start: "top 80%",
            },
            scale: 0.8,
            opacity: 0,
            duration: 0.6,
            delay: 0.3
        });

        particlesJS("particles-js", {
            particles: {
                number: { value: 40, density: { enable: true, value_area: 1000 } },
                color: { value: "#4b5563" },
                shape: { type: "circle" },
                opacity: { value: 0.3, random: false },
                size: { value: 2, random: false },
                line_linked: { enable: false },
                move: {
                    enable: true,
                    speed: 0.4,
                    direction: "top",
                    random: false,
                    straight: false,
                    out_mode: "out",
                },
            },
            interactivity: {
                events: {
                    onhover: { enable: true, mode: "repulse" },
                    onclick: { enable: false },
                },
                modes: {
                    repulse: { distance: 100, duration: 0.4 },
                },
            },
            retina_detect: true,
        });
    </script>
    @endpush
</x-layout>