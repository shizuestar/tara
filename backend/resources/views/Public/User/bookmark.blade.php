<x-layout>
  <div id="particles-js"></div>
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
      <div class="filter-section py-6 bg-white">
        <h3 class="text-lg font-semibold text-gray-800 mb-3 text-center">Jenis Konten</h3>
        <div class="flex justify-center gap-3 flex-wrap">
          @foreach ($types as $key => $label)
            <button class="type-filter px-4 py-2 rounded-full bg-gray-100 text-sm text-gray-700 font-semibold border border-gray-200 hover:bg-gray-200 transition {{ request('type', 'all') == $key ? 'active' : '' }}" data-type="{{ $key }}">
              {{ $label }}
            </button>
          @endforeach
        </div>
        <div id="empty-message" class="text-center text-gray-700 mt-6 hidden">
          <div class="inline-block bg-gray-50 p-6 rounded-lg shadow-sm border border-gray-200">
            <p class="text-lg font-medium text-gray-800">Belum ada bookmark, Tuan.</p>
            <p class="text-sm text-gray-600 mt-1">Mulai simpan artikel favorit Tuan!</p>
            <a href="{{ route('blogs.index') }}" class="inline-block mt-4 px-6 py-2 bg-black text-white rounded-full font-semibold hover:bg-gray-800 transition">Jelajahi Artikel</a>
          </div>
        </div>
      </div>
      <div class="flex flex-col md:flex-row gap-6">
        <div class="flex-1">
          <div id="bookmark-posts" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($filteredBookmarks as $bookmark)
              @php
                $post = $bookmark->bookmarkable;
                $type = class_basename($bookmark->bookmarkable_type);
                $route = match($type) {
                  'Artwork' => route('artworks.show', $post),
                  'Blog' => route('blogs.show', $post),
                  'CommunityPost' => route('community-posts.show', $post),
                  'Project' => route('projects.show', $post),
                  'Event' => route('events.show', $post),
                  default => '#',
                };
              @endphp
              <a href="{{ $route }}" class="blog-card hover-3d">
                <div class="inner flex flex-col h-full">
                  <img src="{{ 'storage/' . $post->cover_image ?? $post->image ?? 'https://picsum.photos/600/400' }}" alt="{{ $post->title }}" class="w-full h-48 object-cover" />
                  <div class="blog-card-content">
                    <div class="content-main">
                      <span class="inline-block px-2 py-1 bg-gray-100 text-xs text-gray-700 rounded-full mb-2">{{ $post->category->name ?? 'Uncategorized' }}</span>
                      <h3 class="text-lg font-semibold text-black">{{ $post->title }}</h3>
                      <p class="text-sm text-gray-700">{{ Str::limit(strip_tags($post->content ?? $post->description ?? ''), 100) }}</p>
                    </div>
                    <div class="content-footer">
                      <div class="flex items-center gap-4 text-xs text-gray-500">
                        <span><i class="fas fa-calendar-alt mr-1"></i>{{ $post->created_at->format('d M Y') }}</span>
                        <span><i class="fas fa-eye mr-1"></i>{{ $post->views ?? 0 }} Dilihat</span>
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
            @endforelse
          </div>
          @if ($bookmarks->isEmpty())
            <div id="empty-message-global" class="text-center text-gray-700 mt-10 ml-56">
              <div class="inline-block bg-gray-50 p-6 rounded-lg shadow-sm border border-gray-200">
                <p class="text-lg font-medium text-gray-800">Belum ada bookmark, Tuan.</p>
                <p class="text-sm text-gray-600 mt-1">Mulai simpan artikel favorit Tuan!</p>
                <a href="{{ route('home') }}" class="inline-block mt-4 px-6 py-2 bg-black text-white rounded-full font-semibold hover:bg-gray-800 transition">Jelajahi</a>
              </div>
            </div>
          @elseif ($filteredBookmarks->isEmpty())
            <div id="no-filter-results" class="text-center text-gray-700 mt-10">
              <div class="inline-block bg-gray-50 p-6 rounded-lg shadow-sm border border-gray-200">
                <p class="text-lg font-medium text-gray-800">Tidak ada bookmark tersimpan dengan filter yang dipilih.</p>
                <a href="{{ route('blogs.index') }}" class="inline-block mt-4 px-6 py-2 bg-black text-white rounded-full font-semibold hover:bg-gray-800 transition">Jelajahi Artikel</a>
              </div>
            </div>
          @endif
        </div>

        <div class="md:w-48 p-4 rounded-xl shadow-lg border border-gray-100 bg-white h-fit">
          <h3 class="text-sm uppercase tracking-wider text-gray-500 font-bold mb-3 border-b-2 border-yellow-400 pb-2">Kategori</h3>
          <div id="category-filters" class="flex flex-col gap-1 max-h-80 overflow-y-auto category-scroll-custom">
            <button class="category-filter text-left px-3 py-1 text-sm text-gray-700 hover:text-black hover:bg-gray-50 transition rounded-md {{ request('category', 'all') == 'all' ? 'active-cat' : '' }}" data-category="all">
              Semua
            </button>
            @foreach ($categories as $cat)
              <button class="category-filter text-left px-3 py-1 text-sm text-gray-700 hover:text-black hover:bg-gray-50 transition rounded-md {{ request('category') == $cat->name ? 'active-cat' : '' }}" data-category="{{ $cat->name }}">
                {{ $cat->name }}
              </button>
            @endforeach
          </div>
        </div>
      </div>
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
    .hover-3d { transform-style: preserve-3d; transition: transform 0.3s ease; cursor: pointer; will-change: transform; }
    .hover-3d .inner { transform: rotateY(0deg) rotateX(0deg); transition: transform 0.3s ease; }
    .hover-3d:hover .inner { transform: rotateY(8deg) rotateX(4deg); }
    #particles-js { position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: -1; }
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
    .blog-card:hover { transform: translateY(-6px); box-shadow: 0 16px 20px -5px rgba(0, 0, 0, 0.08), 0 6px 8px -4px rgba(0, 0, 0, 0.05); }
    .blog-card img { width: 100%; height: 200px; object-fit: cover; transition: transform 0.4s ease, filter 0.4s ease; }
    .blog-card:hover img { transform: scale(1.05); filter: brightness(0.9); }
    .blog-card-content { flex: 1; display: flex; flex-direction: column; justify-content: space-between; padding: 1rem; overflow: hidden; }
    .blog-card-content .content-main { flex-grow: 1; display: flex; flex-direction: column; gap: 0.5rem; }
    .blog-card-content h3 { font-size: 1.125rem; font-weight: 600; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; margin: 0; line-height: 1.5; }
    .blog-card-content p { font-size: 0.875rem; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; margin: 0; line-height: 1.4; }
    .blog-card-content .content-footer { margin-top: auto; }
    .text-accent { color: #facc15; }
    
    .type-filter.active { background-color: #111827; color: #ffffff; border-color: #facc15; }
    .category-filter.active-cat { 
      background-color: #fefce8; /* Very light yellow background */
      color: #111827; /* Darker text for contrast */
      font-weight: 600; 
      border-left: 4px solid #facc15; /* Kuning sebagai aksen */
      padding-left: 11px !important; 
    }
    .category-filter:hover:not(.active-cat) {
      background-color: #f9fafb;
    }
    
    #bookmark-posts { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 1.5rem; align-items: stretch; }
    .bookmark-header h1 { text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); }
    .bookmark-header p { font-weight: 300; }
    .md\:w-48 { width: 12rem; }
    
    /* Custom Scrollbar for Aesthetic & Yellow Accent */
    .category-scroll-custom::-webkit-scrollbar {
      width: 6px; /* Slightly wider for visibility */
    }
    .category-scroll-custom::-webkit-scrollbar-track {
      background: #f0f0f0; /* Light track */
      border-radius: 3px;
    }
    .category-scroll-custom::-webkit-scrollbar-thumb {
      background: #111827; /* Kuning */
      border-radius: 3px;
    }
    .category-scroll-custom::-webkit-scrollbar-thumb:hover {
      background: #111827;
    }

    /* Consolidated empty/no-results messages */
    #empty-message-global, #no-filter-results {
      transition: opacity 0.5s ease;
    }
    #empty-message-global div, #no-filter-results div {
      background: linear-gradient(145deg, #f9fafb, #e5e7eb);
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    @media (max-width: 768px) {
      .md\:flex-row { flex-direction: column; }
      .md\:w-48 { width: 100%; }
      #category-filters { flex-direction: row; flex-wrap: wrap; justify-content: center; max-height: none; overflow-y: visible; }
      .category-filter { flex: 1 1 auto; }
      #empty-message-global, #no-filter-results { max-width: 90%; margin: 0 auto; }
    }
  </style>
  @endpush

  @push('scripts')
  <script>
    let bookmarks = @json($bookmarks);
    let categories = @json($categories->pluck('name')->prepend('all')->toArray());

    function renderCategories(type = "{{ request('type', 'all') }}") {
      const categoryFilters = document.getElementById("category-filters");
      categoryFilters.innerHTML = "";
      let relevantCategories = ['all'];
      
      if (type !== "all") {
        relevantCategories = [...new Set(bookmarks
          .filter(bookmark => bookmark.bookmarkable_type.split('\\').pop() === type)
          .map(bookmark => bookmark.bookmarkable?.category?.name)
          .filter(name => name))];
        relevantCategories.unshift('all');
      } else {
        relevantCategories = categories;
      }
      
      relevantCategories.forEach(category => {
        const isActive = category === "{{ request('category', 'all') }}" ? 'active-cat' : '';
        categoryFilters.innerHTML += `
          <button class="category-filter text-left px-3 py-1 text-sm text-gray-700 hover:text-black hover:bg-gray-50 transition rounded-md ${isActive}" data-category="${category}">
            ${category === 'all' ? 'Semua' : category}
          </button>
        `;
      });
      
      document.querySelectorAll(".category-filter").forEach(filter => {
        filter.addEventListener("click", () => {
          document.querySelectorAll(".category-filter").forEach(f => f.classList.remove("active-cat"));
          filter.classList.add("active-cat");
          const activeType = document.querySelector(".type-filter.active")?.dataset.type || "all";
          renderBookmarks(activeType, filter.dataset.category);
          anime({ targets: filter, scale: [1, 1.05, 1], duration: 300, easing: "easeOutQuad" });

          const url = new URL(window.location);
          url.searchParams.set('category', filter.dataset.category);
          window.history.pushState({}, '', url);
        });
      });
      gsap.from(".category-filter", { opacity: 0, x: -10, duration: 0.4, stagger: 0.05, ease: "power2.out" });
    }

    function renderBookmarks(type = "{{ request('type', 'all') }}", category = "{{ request('category', 'all') }}") {
      const bookmarkPosts = document.getElementById("bookmark-posts");
      const emptyMessageGlobal = document.getElementById("empty-message-global");
      const noFilterResults = document.getElementById("no-filter-results");
      
      bookmarkPosts.innerHTML = ""; // Clear current posts

      // Hide all message containers initially
      if (emptyMessageGlobal) emptyMessageGlobal.classList.add("hidden");
      if (noFilterResults) noFilterResults.classList.add("hidden");

      let filteredBookmarks = bookmarks;
      
      if (type !== "all") {
        filteredBookmarks = filteredBookmarks.filter(bookmark => bookmark.bookmarkable_type.split('\\').pop() === type);
      }
      if (category !== "all") {
        filteredBookmarks = filteredBookmarks.filter(bookmark => bookmark.bookmarkable?.category?.name === category);
      }

      if (bookmarks.length === 0) {
        if (emptyMessageGlobal) emptyMessageGlobal.classList.remove("hidden");
        // No need to render anything if no bookmarks exist at all
        return;
      }

      if (filteredBookmarks.length === 0) {
        if (noFilterResults) noFilterResults.classList.remove("hidden");
        // No results for the current filter, so don't render posts
        return;
      }

      // If we reach here, there are bookmarks and some match the filter
      filteredBookmarks.forEach(bookmark => {
        const item = bookmark.bookmarkable;
        const itemType = bookmark.bookmarkable_type.split('\\').pop();
        const route = {
          'Artwork': '/artworks/' + item.id,
          'Blog': '/blogs/' + item.id,
          'CommunityPost': '/community/posts/' + item.id,
          'Project': '/projects/' + item.id,
          'Event': '/events/' + item.id
        }[itemType] || '#';
        const image = item.cover_image || item.image || 'https://picsum.photos/600/400?' + itemType + item.id;
        const title = item.title || 'Konten Tanpa Judul';
        const description = item.content ? item.content.replace(/<[^>]+>/g, '').substring(0, 100) : item.description?.substring(0, 100) || '';
        const categoryName = item.category?.name || 'Uncategorized';
        const date = new Date(item.created_at).toLocaleDateString('id-ID', { day: '2-digit', month: 'short', year: 'numeric' });
        const views = item.views || 0;

        bookmarkPosts.innerHTML += `
          <a href="${route}" class="blog-card hover-3d">
            <div class="inner flex flex-col h-full">
              <img src="storage/${image}" alt="${title}" class="w-full h-48 object-cover" />
              <div class="blog-card-content">
                <div class="content-main">
                  <span class="inline-block px-2 py-1 bg-gray-100 text-xs text-gray-700 rounded-full mb-2">${categoryName}</span>
                  <h3 class="text-lg font-semibold text-black">${title}</h3>
                  <p class="text-sm text-gray-700">${description}</p>
                </div>
                <div class="content-footer">
                  <div class="flex items-center gap-4 text-xs text-gray-500">
                    <span><i class="fas fa-calendar-alt mr-1"></i>${date}</span>
                    <span><i class="fas fa-eye mr-1"></i>${views} Dilihat</span>
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
      renderCategories(type); // Re-render categories based on selected type
      // gsap.from("#empty-message, #no-category-message", { opacity: 0, y: 20, duration: 0.8, ease: "power3.out" }); // No longer needed for specific elements
    }

    function removeBookmark(id) {
      fetch(`/bookmarks/${id}`, { 
        method: 'DELETE', 
        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' } 
      })
        .then(response => response.json())
        .then(data => {
          bookmarks = bookmarks.filter(bookmark => bookmark.id !== id);
          const activeType = document.querySelector(".type-filter.active")?.dataset.type || "all";
          const activeCategory = document.querySelector(".category-filter.active-cat")?.dataset.category || "all";
          // Re-render immediately without fading out current cards for simplicity
          renderBookmarks(activeType, activeCategory); 
          // If you want the fade-out/in effect, uncomment the anime line below and adjust.
          // anime({ targets: ".blog-card", opacity: 0, duration: 300, easing: "easeOutQuad", complete: () => renderBookmarks(activeType, activeCategory) });
        })
        .catch(error => console.error('Error:', error));
    }

    document.querySelectorAll(".type-filter").forEach(filter => {
      filter.addEventListener("click", () => {
        document.querySelectorAll(".type-filter").forEach(f => f.classList.remove("active"));
        filter.classList.add("active");
        const activeCategory = document.querySelector(".category-filter.active-cat")?.dataset.category || "all";
        renderBookmarks(filter.dataset.type, activeCategory);
        anime({ targets: filter, scale: [1, 1.1, 1], duration: 300, easing: "easeOutQuad" });
        const url = new URL(window.location);
        url.searchParams.set('type', filter.dataset.type);
        window.history.pushState({}, '', url);
      });
    });

    // Initial render when the page loads
    const initialType = "{{ request('type', 'all') }}";
    const initialCategory = "{{ request('category', 'all') }}";
    renderBookmarks(initialType, initialCategory); // Render bookmarks first
    renderCategories(initialType); // Then ensure categories are rendered correctly based on type

    gsap.from(".bookmark-header h1, .bookmark-header p", { opacity: 0, y: 20, duration: 1, stagger: 0.2, ease: "power3.out", delay: 0.2 });
    gsap.registerPlugin(ScrollTrigger);
    gsap.utils.toArray("section").forEach((section, i) => {
      gsap.from(section, { opacity: 0, y: 60, duration: 1, ease: "power3.out", scrollTrigger: { trigger: section, start: "top 80%" }, delay: i * 0.1 });
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
      retina_detect: true
    });
  </script>
  @endpush
</x-layout>