<x-layout>
    <div id="particles-js"></div>

    <!-- Daftar Bookmark -->
    <section class="relative pt-24 pb-8 mt-10 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="bookmark-header text-center">
                <h1 class="text-7xl font-bold text-black mb-6" style="font-family: 'Space Grotesk', sans-serif">
                    Bookmark Saya
                </h1>
                <p class="text-gray-600 text-xl mb-10">
                    Berikut adalah daftar artikel yang telah Tuan simpan untuk dibaca kembali nanti.
                </p>
            </div>

            <!-- Filter Kategori -->
            <div class="filter-section py-6 bg-white">
                <div class="flex justify-center gap-3 flex-wrap">
                    <button class="category-filter px-4 py-2 rounded-full bg-gray-100 text-sm text-gray-700 font-semibold border border-gray-200 hover:bg-gray-200 transition {{ request('category', 'all') == 'all' ? 'active' : '' }}" data-category="all">
                        Semua
                    </button>
                    <button class="category-filter px-4 py-2 rounded-full bg-gray-100 text-sm text-gray-700 font-semibold border border-gray-200 hover:bg-gray-200 transition {{ request('category') == 'wawancara' ? 'active' : '' }}" data-category="wawancara">
                        Wawancara
                    </button>
                    <button class="category-filter px-4 py-2 rounded-full bg-gray-100 text-sm text-gray-700 font-semibold border border-gray-200 hover:bg-gray-200 transition {{ request('category') == 'tutorial' ? 'active' : '' }}" data-category="tutorial">
                        Tutorial
                    </button>
                    <button class="category-filter px-4 py-2 rounded-full bg-gray-100 text-sm text-gray-700 font-semibold border border-gray-200 hover:bg-gray-200 transition {{ request('category') == 'tips' ? 'active' : '' }}" data-category="tips">
                        Tips & Trik
                    </button>
                </div>
            </div>

            <!-- Konten Bookmark -->
            <div id="bookmark-posts" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @forelse ($bookmarks as $bookmark)
                    <a href="{{ route('blog.show', $bookmark->post->id) }}" class="blog-card hover-3d">
                        <div class="inner flex flex-col h-full">
                            <img src="{{ $bookmark->post->image }}" alt="{{ $bookmark->post->title }}" class="w-full h-48 object-cover" />
                            <div class="blog-card-content">
                                <div class="content-main">
                                    <span class="inline-block px-2 py-1 bg-gray-100 text-xs text-gray-700 rounded-full mb-2">
                                        {{ ucfirst($bookmark->post->category) }}
                                    </span>
                                    <h3 class="text-lg font-semibold text-black">{{ $bookmark->post->title }}</h3>
                                    <p class="text-sm text-gray-700">{{ $bookmark->post->description }}</p>
                                </div>
                                <div class="content-footer">
                                    <div class="flex items-center gap-4 text-xs text-gray-500">
                                        <span><i class="fas fa-calendar-alt mr-1"></i>{{ $bookmark->post->date->format('d M Y') }}</span>
                                        <span><i class="fas fa-eye mr-1"></i>{{ $bookmark->post->views }} Dilihat</span>
                                    </div>
                                    <div class="flex gap-3 mt-3">
                                        <button class="text-gray-700 text-xs hover:text-accent transition"><i class="fas fa-heart"></i> Suka</button>
                                        <button class="text-gray-700 text-xs hover:text-accent transition"><i class="fas fa-share"></i> Bagikan</button>
                                        <button class="text-gray-700 text-xs hover:text-red-500 transition" onclick="removeBookmark({{ $bookmark->id }}); event.preventDefault();"><i class="fas fa-bookmark"></i> Hapus</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                    <div id="empty-message" class="text-center text-gray-700">
                        <p class="text-lg">Belum ada bookmark, Tuan. Mulai simpan artikel favorit Tuan!</p>
                        <a href="{{ route('blog.index') }}" class="inline-block mt-4 px-6 py-3 bg-black text-white rounded-full font-semibold hover:bg-gray-800 transition">Jelajahi Artikel</a>
                    </div>
                @endforelse
            </div>
            @if ($bookmarks->isNotEmpty() && $filteredBookmarks->isEmpty())
                <div id="no-category-message" class="text-center text-gray-700 mt-4">
                    <p class="text-lg">Tidak ada bookmark tersimpan dengan kategori <span id="category-name">{{ ucfirst(request('category')) }}</span>.</p>
                    <a href="{{ route('blog.index') }}" class="inline-block mt-4 px-6 py-3 bg-black text-white rounded-full font-semibold hover:bg-gray-800 transition">Jelajahi Artikel</a>
                </div>
            @endif
        </div>
    </section>

    @push('styles')
    <style>
        body {
            font-family: "Space Grotesk", sans-serif;
            background: #ffffff;
            color: #111827;
            box-sizing: border-box;
        }
        *, *::before, *::after {
            box-sizing: inherit;
        }
        .perspective { perspective: 1200px; }
        .hover-3d { transform-style: preserve-3d; transition: transform 0.3s ease; cursor: pointer; }
        .hover-3d .inner { transform: rotateY(0deg) rotateX(0deg); transition: transform 0.3s ease; }
        .hover-3d:hover .inner { transform: rotateY(8deg) rotateX(4deg); }
        #particles-js { position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: -1; }
        .blog-card {
            display: flex; flex-direction: column; height: 500px; background: #ffffff;
            border-radius: 0.5rem; overflow: hidden; transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .blog-card:hover { transform: translateY(-6px); box-shadow: 0 16px 20px -5px rgba(0, 0, 0, 0.08), 0 6px 8px -4px rgba(0, 0, 0, 0.05); }
        .blog-card img { width: 100%; height: 200px; object-fit: cover; transition: transform 0.4s ease, filter 0.4s ease; }
        .blog-card:hover img { transform: scale(1.05); filter: brightness(0.9); }
        .blog-card-content { flex: 1; display: flex; flex-direction: column; justify-content: space-between; padding: 1rem; overflow: hidden; }
        .blog-card-content .content-main { flex-grow: 1; display: flex; flex-direction: column; gap: 0.5rem; }
        .blog-card-content h3 { font-size: 1.125rem; font-weight: 600; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; margin: 0; }
        .blog-card-content p { font-size: 0.875rem; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; margin: 0; }
        .blog-card-content .content-footer { margin-top: auto; }
        .text-accent { color: #facc15; }
        .category-filter.active { background-color: #111827; color: #ffffff; border-color: #facc15; }
        .category-filter:hover { background-color: #1f2937; color: #ffffff; }
        #bookmark-posts { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 1.5rem; align-items: stretch; }
        .bookmark-header h1 { text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); }
        .bookmark-header p { font-weight: 300; }
    </style>
    @endpush

    @push('scripts')
    <script>
        // Data Bookmark
        let bookmarks = @json($bookmarks);

        // Fungsi Render Bookmark
        function renderBookmarks(category = "{{ request('category', 'all') }}") {
            const bookmarkPosts = document.getElementById("bookmark-posts");
            const emptyMessage = document.getElementById("empty-message");
            const noCategoryMessage = document.getElementById("no-category-message");
            const categoryNameSpan = document.getElementById("category-name");
            bookmarkPosts.innerHTML = "";

            const filteredBookmarks = category === "all" ? bookmarks : bookmarks.filter(bookmark => bookmark.post.category === category);

            if (bookmarks.length === 0) {
                emptyMessage?.classList.remove("hidden");
                noCategoryMessage?.classList.add("hidden");
                return;
            } else {
                emptyMessage?.classList.add("hidden");
            }

            if (filteredBookmarks.length === 0) {
                noCategoryMessage?.classList.remove("hidden");
                categoryNameSpan.textContent = category.charAt(0).toUpperCase() + category.slice(1);
                return;
            } else {
                noCategoryMessage?.classList.add("hidden");
            }

            filteredBookmarks.forEach(bookmark => {
                bookmarkPosts.innerHTML += `
                    <a href="/blog/${bookmark.post.id}" class="blog-card hover-3d">
                        <div class="inner flex flex-col h-full">
                            <img src="${bookmark.post.image}" alt="${bookmark.post.title}" class="w-full h-48 object-cover" />
                            <div class="blog-card-content">
                                <div class="content-main">
                                    <span class="inline-block px-2 py-1 bg-gray-100 text-xs text-gray-700 rounded-full mb-2">${bookmark.post.category.charAt(0).toUpperCase() + bookmark.post.category.slice(1)}</span>
                                    <h3 class="text-lg font-semibold text-black">${bookmark.post.title}</h3>
                                    <p class="text-sm text-gray-700">${bookmark.post.description}</p>
                                </div>
                                <div class="content-footer">
                                    <div class="flex items-center gap-4 text-xs text-gray-500">
                                        <span><i class="fas fa-calendar-alt mr-1"></i>${new Date(bookmark.post.date).toLocaleDateString('id-ID', { day: '2-digit', month: 'short', year: 'numeric' })}</span>
                                        <span><i class="fas fa-eye mr-1"></i>${bookmark.post.views} Dilihat</span>
                                    </div>
                                    <div class="flex gap-3 mt-3">
                                        <button class="text-gray-700 text-xs hover:text-accent transition"><i class="fas fa-heart"></i> Suka</button>
                                        <button class="text-gray-700 text-xs hover:text-accent transition"><i class="fas fa-share"></i> Bagikan</button>
                                        <button class="text-gray-700 text-xs hover:text-red-500 transition" onclick="removeBookmark(${bookmark.id}); event.preventDefault();"><i class="fas fa-bookmark"></i> Hapus</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                `;
            });

            gsap.from(".blog-card", { opacity: 0, y: 40, duration: 0.8, stagger: 0.1, ease: "power3.out" });
        }

        // Fungsi Hapus Bookmark
        function removeBookmark(id) {
            fetch(`/bookmark/${id}`, { method: 'DELETE', headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' } })
                .then(response => response.json())
                .then(data => {
                    bookmarks = bookmarks.filter(bookmark => bookmark.id !== id);
                    const activeCategory = document.querySelector(".category-filter.active")?.dataset.category || "all";
                    renderBookmarks(activeCategory);
                    anime({ targets: ".blog-card", opacity: 0, duration: 300, easing: "easeOutQuad", complete: () => renderBookmarks(activeCategory) });
                })
                .catch(error => console.error('Error:', error));
        }

        // Filter Kategori
        document.querySelectorAll(".category-filter").forEach(filter => {
            filter.addEventListener("click", () => {
                document.querySelectorAll(".category-filter").forEach(f => f.classList.remove("active"));
                filter.classList.add("active");
                window.history.pushState({}, '', `?category=${filter.dataset.category}`);
                renderBookmarks(filter.dataset.category);
                anime({ targets: filter, scale: [1, 1.1, 1], duration: 300, easing: "easeOutQuad" });
            });
        });

        // Animasi GSAP
        gsap.from(".bookmark-header h1, .bookmark-header p", { opacity: 0, y: 20, duration: 1, stagger: 0.2, ease: "power3.out", delay: 0.2 });
        gsap.registerPlugin(ScrollTrigger);
        gsap.utils.toArray("section").forEach((section, i) => {
            gsap.from(section, { opacity: 0, y: 60, duration: 1, ease: "power3.out", scrollTrigger: { trigger: section, start: "top 80%" }, delay: i * 0.1 });
        });

        // Inisialisasi Particles.js
        particlesJS("particles-js", {
            particles: {
                number: { value: 40, density: { enable: true, value_area: 1000 } },
                color: { value: "#4b5563" },
                shape: { type: "circle" },
                opacity: { value: 0.3, random: false },
                size: { value: 2, random: false },
                line_linked: { enable: false },
                move: { enable: true, speed: 0.4, direction: "top", random: false, straight: false, out_mode: "out" }
            },
            interactivity: { events: { onhover: { enable: true, mode: "repulse" }, onclick: { enable: false } }, modes: { repulse: { distance: 100, duration: 0.4 } } },
            retina_detect: true
        });
    </script>
    @endpush
</x-layout>