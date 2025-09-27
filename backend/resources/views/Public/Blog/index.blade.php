<x-layout>
  <div id="particles-js"></div>
  <section class="relative hero-image perspective overflow-hidden"
    style="background-image: url('https://picsum.photos/1200/600?grayscale')">
    <div class="hero-overlay absolute inset-0 bg-gradient-to-b from-gray-100/10 to-gray-900/40"></div>
    <div id="hero-text" class="relative max-w-4xl mx-auto px-4 text-center text-gray-100">
      <h1 class="text-4xl md:text-5xl font-bold tracking-tight" style="font-family: 'Space Grotesk', sans-serif">
        Galeri Kreatif Anak Muda<span class="text-gray-400 align-middle ml-1">●</span>
      </h1>
      <p class="mt-4 text-lg leading-relaxed">
        Inspirasi wawancara, tutorial, dan tips Nusantara.
      </p>
      <a href="{{ $blogs->first() ? route('blogs.show', $blogs->first()) : '#' }}"
        class="inline-block mt-6 px-6 py-3 bg-gray-100 text-gray-900 rounded-full font-semibold hover:bg-gray-300 transition">
        Jelajahi Galeri
      </a>
    </div>
  </section>
  <section class="filter-section py-6 bg-gray-100">
    <div class="max-w-7xl mx-auto px-6">
      <div class="flex justify-center gap-3 flex-wrap">
        <a href="{{ route('blogs.index', ['category' => 'all']) }}"
           class="category-filter px-4 py-2 rounded-full bg-gray-200 text-sm text-gray-700 font-semibold border border-gray-300 hover:bg-gray-300 transition {{ $category === 'all' ? 'active' : '' }}"
           data-category="all">
          Semua
        </a>
        @foreach($categories as $cat)
          <a href="{{ route('blogs.index', ['category' => $cat->name]) }}"
             class="category-filter px-4 py-2 rounded-full bg-gray-200 text-sm text-gray-700 font-semibold border border-gray-300 hover:bg-gray-300 transition {{ $category === $cat->name ? 'active' : '' }}"
             data-category="{{ $cat->name }}">
            {{ $cat->name }}
          </a>
        @endforeach
      </div>
    </div>
  </section>
  <section class="relative top-8 pb-32 bg-gray-100">
    <div class="max-w-7xl mx-auto px-6">
      <div id="blog-posts" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach($blogs as $blog)
          <div class="blog-card hover-3d relative">
            <a href="{{ route('blogs.show', $blog) }}" class="inner flex flex-col h-full">
              <img src="{{ $blog->cover_image ? asset('storage/' . $blog->cover_image) : 'https://picsum.photos/600/400?grayscale&blog' . $blog->id }}"
                   alt="{{ $blog->title }}" class="w-full h-48 object-cover" />
              <div class="blog-card-content">
                <div class="content-main">
                  <span class="inline-block px-2 py-1 bg-gray-200 text-xs text-gray-700 rounded-full mb-2">{{ $blog->category->name }}</span>
                  <h3 class="text-lg font-semibold text-gray-900">{{ $blog->title }}</h3>
                  <p class="text-sm text-gray-600">{{ Str::limit(strip_tags($blog->content), 100) }}</p>
                </div>
                <div class="content-footer">
                  <div class="flex items-center gap-4 text-xs text-gray-500">
                    <span><i class="fas fa-calendar-alt mr-1"></i>{{ $blog->created_at->format('d M Y') }}</span>
                    <span><i class="fas fa-eye mr-1"></i>{{ $blog->views }} Dilihat</span>
                  </div>
                  <div class="flex gap-3 mt-3">
                    <button type="button" class="like-btn text-gray-600 text-xs hover:text-gray-900 transition {{ in_array($blog->id, $userLikes ?? []) ? 'text-red-600' : '' }}"
                            data-id="{{ $blog->id }}">
                      <i class="fas fa-heart"></i> <span class="like-count">{{ $blog->likes->count() ?? 0 }}</span> Suka
                    </button>
                    <button class="text-gray-600 text-xs hover:text-gray-900 transition"><i class="fas fa-comment"></i> {{ $blog->comments->count() ?? 0 }} Komentar</button>
                    <button type="button" class="bookmark-btn text-gray-600 text-xs hover:text-gray-900 transition {{ in_array($blog->id, $userBookmarks ?? []) ? 'text-gray-900' : '' }}"
                            data-id="{{ $blog->id }}" data-type="App\Models\Blog">
                      <i class="fas fa-bookmark"></i> Bookmark
                    </button>
                  </div>
                </div>
              </div>
            </a>
            <div class="bookmark-notification hidden absolute top-2 right-2 bg-gray-900 text-gray-100 text-xs font-bold px-3 py-1 rounded-full"></div>
          </div>
        @endforeach
      </div>
      <div id="pagination" class="mt-16 text-center">
        {{ $blogs->links() }}
      </div>
      <div id="load-more-container" class="mt-16 text-center hidden">
        <button id="load-more"
          class="px-6 py-3 bg-gray-900 text-gray-100 rounded-full font-semibold hover:bg-gray-700 transition">
          Muat Lebih Banyak
        </button>
      </div>
    </div>
  </section>
  <section id="cta-section" class="py-20 bg-gray-100 text-center">
    <div class="max-w-6xl mx-auto px-6">
      <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
        Bagikan Ceritamu
      </h2>
      <p class="text-lg text-gray-600 mb-6">
        Tulis artikel, wawancara, atau tutorial untuk menginspirasi komunitas TARA.
      </p>
    </div>
  </section>

  @push('styles')
  <style>
    body {
      font-family: "Space Grotesk", sans-serif;
      background: #f5f5f5;
      color: #1f1f1f;
      box-sizing: border-box;
    }

    *,
    *::before,
    *::after {
      box-sizing: inherit;
    }

    .perspective {
      perspective: 1200px;
    }

    .hover-3d {
      transform-style: preserve-3d;
      transition: transform 0.3s ease;
      cursor: pointer;
      will-change: transform;
    }

    .hover-3d .inner {
      transform: rotateY(0deg) rotateX(0deg);
      transition: transform 0.3s ease;
    }

    .hover-3d:hover .inner {
      transform: rotateY(8deg) rotateX(4deg);
    }

    #particles-js {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -1;
    }

    .blog-card {
      display: flex;
      flex-direction: column;
      height: 500px;
      min-height: 500px;
      background: #ffffff;
      border-radius: 0.5rem;
      overflow: hidden;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      margin: 0;
    }

    .blog-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 16px 20px -5px rgba(0, 0, 0, 0.08),
        0 6px 8px -4px rgba(0, 0, 0, 0.05);
    }

    .blog-card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
      transition: transform 0.4s ease, filter 0.4s ease;
    }

    .blog-card:hover img {
      transform: scale(1.05);
      filter: brightness(0.9);
    }

    .blog-card-content {
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      padding: 1rem;
      overflow: hidden;
    }

    .blog-card-content .content-main {
      flex-grow: 1;
      display: flex;
      flex-direction: column;
      gap: 0.5rem;
    }

    .blog-card-content h3 {
      font-size: 1.125rem;
      font-weight: 600;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
      overflow: hidden;
      text-overflow: ellipsis;
      margin: 0;
      line-height: 1.5;
    }

    .blog-card-content p {
      font-size: 0.875rem;
      display: -webkit-box;
      -webkit-line-clamp: 3;
      -webkit-box-orient: vertical;
      overflow: hidden;
      text-overflow: ellipsis;
      margin: 0;
      line-height: 1.4;
    }

    .blog-card-content .content-footer {
      margin-top: auto;
    }

    .text-accent {
      color: #facc15;
    }

    .category-filter.active {
      background-color: #111827;
      color: #ffffff;
      border-color: #facc15;
    }

    .category-filter:hover {
      background-color: #1f2937;
      color: #ffffff;
    }

    .hero-image {
      position: relative;
      background-size: cover;
      background-position: center;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .hero-overlay {
      background: linear-gradient(to bottom,
          rgba(255, 255, 255, 0.1),
          rgba(0, 0, 0, 0.4));
    }

    .filter-section {
      background: #ffffff;
      border-bottom: 1px solid #e5e7eb;
      padding-top: 1rem;
      padding-bottom: 1rem;
    }

    .pagination-button {
      padding: 0.5rem 1rem;
      margin: 0 0.25rem;
      background-color: #f3f4f6;
      color: #111827;
      border-radius: 0.375rem;
      font-size: 0.875rem;
      font-weight: 600;
      transition: all 0.3s ease;
    }

    .pagination-button:hover {
      background-color: #1f2937;
      color: #ffffff;
    }

    .pagination-button.active {
      background-color: #111827;
      color: #ffffff;
      border-color: #facc15;
    }

    .pagination-button:disabled {
      background-color: #e5e7eb;
      color: #6b7280;
      cursor: not-allowed;
    }

    #blog-posts {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 1.5rem;
      align-items: stretch;
      align-content: start;
    }

    .nav-link {
      position: relative;
      transition: color 0.3s;
    }

    .nav-link::after {
      content: "";
      position: absolute;
      width: 0;
      height: 2px;
      bottom: -5px;
      left: 0;
      background-color: #000000;
      transition: width 0.3s;
    }

    .nav-link:hover::after {
      width: 100%;
    }

    .nav-link.active {
      color: #1a202c;
      font-weight: 600;
    }

    .nav-link.active::after {
      width: 100%;
    }

    .bookmark-notification {
      opacity: 0;
      transform: translateY(-10px);
      transition: opacity 0.3s ease, transform 0.3s ease;
    }

    .bookmark-notification.show {
      opacity: 1;
      transform: translateY(0);
    }
  </style>
  @endpush

  @push('scripts')
  <script>
    // Logika untuk tombol Like
    document.querySelectorAll('.like-btn').forEach(button => {
      button.addEventListener('click', function (e) {
        e.preventDefault();
        e.stopPropagation(); // Mencegah klik memicu tautan kartu
        const blogId = this.dataset.id;

        fetch('{{ route('blogs.like', ':id') }}'.replace(':id', blogId), {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          }
        })
        .then(response => response.json())
        .then(data => {
          const likeCount = this.querySelector('.like-count');
          likeCount.textContent = data.likes;
          if (data.liked) {
            this.classList.add('text-red-600');
            this.classList.remove('text-gray-600');
          } else {
            this.classList.remove('text-red-600');
            this.classList.add('text-gray-600');
          }
        })
        .catch(error => {
          console.error('Error:', error);
          alert('Terjadi kesalahan saat memproses like.');
        });
      });
    });

    // Logika untuk tombol Bookmark
    document.querySelectorAll('.bookmark-btn').forEach(button => {
      button.addEventListener('click', function (e) {
        e.preventDefault();
        e.stopPropagation(); // Mencegah klik memicu tautan kartu
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
          // Perbarui status tombol
          if (data.bookmarked) {
            this.classList.add('text-gray-900');
            this.classList.remove('text-gray-600');
          } else {
            this.classList.remove('text-gray-900');
            this.classList.add('text-gray-600');
          }

          // Tampilkan notifikasi
          notification.textContent = data.message;
          notification.classList.add('show');
          setTimeout(() => {
            notification.classList.remove('show');
          }, 2000);
        })
        .catch(error => {
          console.error('Error:', error);
          alert('Terjadi kesalahan saat memproses bookmark.');
        });
      });
    });

    // Skrip animasi dan partikel dari kode asli
    const filters = document.querySelectorAll(".category-filter");
    filters.forEach((filter) => {
      filter.addEventListener("click", () => {
        filters.forEach((f) => f.classList.remove("active"));
        filter.classList.add("active");
        const category = filter.dataset.category;
        window.location.href = `/blogs?category=${category}`;
      });
    });
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
    gsap.utils
      .toArray("section:not(.filter-section)")
      .forEach((section, i) => {
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