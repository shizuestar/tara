<x-admin-layout>
    <div id="reading-progress"></div>
    <div id="particles-js"></div>

    <!-- Notification Modal -->
    <div id="notification-modal" class="notification-modal">
        <i class="fas fa-times close-btn" onclick="toggleNotifications()"></i>
        <div class="p-6">
            <h2 class="text-2xl font-bold text-black mb-4" style="font-family: 'Space Grotesk', sans-serif">
                Notifikasi
            </h2>
            <div class="flex gap-2 mb-4">
                <button class="filter-btn active" data-filter="all">
                    Semua
                </button>
                <button class="filter-btn" data-filter="unread">
                    Belum Dibaca
                </button>
            </div>
            <button id="mark-all-read"
                class="px-4 py-2 bg-black text-white text-sm rounded-full hover:bg-gray-800 transition mb-4">
                Tandai Semua Dibaca
            </button>
            <div id="notification-list" class="space-y-4"></div>
        </div>
    </div>

    <!-- Share Modal -->
    <div id="share-modal" role="dialog" aria-modal="true" aria-labelledby="share-modal-title">
        <div class="share-modal-content">
            <button class="close" onclick="closeShareModal()" style="top: 0.5rem; right: -8rem">
                ✖
            </button>
            <h3 id="share-modal-title" class="text-xl font-bold mb-4">
                Bagikan Artikel
            </h3>
            <div class="space-y-3">
                <a id="share-whatsapp" href="#" class="bg-green-500 text-white">WhatsApp</a>
                <a id="share-instagram" href="#" class="bg-pink-500 text-white">Instagram</a>
                <a id="share-x" href="#" class="bg-black text-white">X</a>
                <button id="share-copy-link" class="bg-gray-600 text-white">
                    Salin Link
                </button>
            </div>
        </div>
    </div>

    <main class="w-full pt-32 pb-32 grid grid-cols-1 lg:grid-cols-12 gap-8 px-4">
        <!-- Left Column - Article Content -->
        <div class="lg:col-span-8">
            <!-- Article Header / Hero -->
            <section class="hero-wrapper px-4" id="article-hero">
                <div class="uploader-section">
                    <div class="uploader-info">
                        <img id="article-author-avatar" src="https://i.pravatar.cc/60?img=22" alt="avatar"
                            class="w-10 h-10 rounded-full object-cover" />
                        <div class="text-left leading-tight">
                            <div id="article-author-name" class="font-semibold text-[var(--tara-dark)]">
                                Uploader Contoh
                            </div>
                            <div id="article-posted-rel" class="text-xs text-gray-500">
                                Diposting hari ini
                            </div>
                        </div>
                    </div>
                    <button id="follow-btn"
                        class="px-3 py-1 text-xs rounded-full bg-[var(--tara-accent)] text-black font-semibold hover:bg-yellow-300 transition">
                        Follow
                    </button>
                </div>
                <div class="flex flex-col items-center text-center gap-6">
                    <!-- hero image -->
                    <div class="hero-img-wrapper group" id="article-hero-image-wrapper">
                        <img id="article-hero-image" src="https://picsum.photos/id/1015/1200/800"
                            alt="Gambar Artikel" />
                    </div>
                    <!-- title -->
                    <h1 id="article-title" class="text-3xl md:text-4xl font-bold max-w-3xl leading-tight"
                        style="font-family: 'Space Grotesk', sans-serif">
                        Judul Artikel
                    </h1>
                    <!-- floating actions -->
                    <div class="float-actions" id="float-actions">
                        <button id="float-share" title="Bagikan">
                            <i class="fas fa-share"></i>
                        </button>
                        <div class="relative">
                            <button id="float-like" title="Suka">
                                <i class="fas fa-heart"></i>
                            </button>
                            <span id="float-like-badge" class="badge hidden">0</span>
                        </div>
                    </div>
                    <!-- meta -->
                    <div class="flex flex-wrap items-center justify-center gap-4 text-xs text-gray-500">
                        <span id="article-date-meta"><i class="fas fa-calendar-alt mr-1"></i>–</span>
                        <span id="article-readtime-meta"><i class="fas fa-book-open mr-1"></i>– menit
                            baca</span>
                        <span id="article-views-meta"><i class="fas fa-eye mr-1"></i>0 Dilihat</span>
                        <span id="article-category-meta"
                            class="inline-flex items-center px-2 py-1 bg-gray-100 rounded-full text-gray-700"></span>
                    </div>
                </div>
            </section>

            <!-- Article Body -->
            <article id="article-body"
                class="article-content max-w-3xl mx-auto mt-16 px-4 prose prose-sm sm:prose-base lg:prose-lg prose-img:rounded-xl prose-headings:font-semibold prose-a:text-[var(--tara-dark)]">
                <!-- body injected by JS -->
            </article>

            <!-- Article Tags -->
            <section class="max-w-3xl mx-auto mt-10 px-4">
                <div class="flex flex-wrap gap-2 article-tags" id="article-tags"></div>
            </section>

            <!-- Prev / Next -->
            <nav class="max-w-3xl mx-auto mt-16 px-4 grid grid-cols-1 sm:grid-cols-2 gap-4" id="article-prev-next">
                <!-- injected -->
            </nav>

            <!-- Recommended -->
            <section class="max-w-3xl mx-auto mt-24 px-4" id="article-reco-wrapper">
                <h2 class="text-2xl md:text-3xl font-bold mb-8 text-center"
                    style="font-family: 'Space Grotesk', sans-serif">
                    Artikel Rekomendasi Lainnya<span class="text-[var(--tara-accent)] ml-1">●</span>
                </h2>
                <div id="article-reco" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- cards injected -->
                </div>
            </section>
        </div>

        <!-- Right Column - Comment Section -->
        <div class="lg:col-span-4">
            <!-- Desktop Comment Panel -->
            <aside class="comment-panel" id="comment-panel" aria-labelledby="comment-panel-title">
                <div class="comment-panel-header">
                    <h3 id="comment-panel-title">Komentar</h3>
                    <span id="comment-count-top" class="text-xs text-gray-500"></span>
                </div>
                <div class="comment-scroll" id="comment-list"></div>
                <div class="comment-form" id="comment-form-desktop">
                    <textarea id="new-comment-text" maxlength="300"
                        placeholder="Tambahkan komentar... (Maks 300 karakter)"
                        class="px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-black"></textarea>
                    <div class="comment-char" id="comment-char-count">
                        0/300
                    </div>
                    <button id="submit-comment"
                        class="mt-2 w-full px-4 py-2 bg-black text-white text-sm rounded-md hover:bg-gray-800 transition">
                        Kirim
                    </button>
                </div>
            </aside>
        </div>
    </main>

    <!-- Mobile Comment Toggle -->
    <button id="mobile-comment-toggle">
        <i class="fas fa-comments"></i><span>Komentar</span><span class="count" id="mobile-comment-count">0</span>
    </button>

    <!-- Mobile Comment Drawer -->
    <div id="comment-drawer" class="comment-drawer" role="dialog" aria-modal="true"
        aria-labelledby="comment-drawer-title">
        <div class="comment-drawer-header">
            <span id="comment-drawer-title">Komentar</span>
            <button id="comment-drawer-close" class="text-xl leading-none">
                ×
            </button>
        </div>
        <div class="comment-drawer-body" id="comment-drawer-body"></div>
        <div class="comment-drawer-footer">
            <textarea id="new-comment-mobile" maxlength="300" placeholder="Tambahkan komentar..."
                class="px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-black"></textarea>
            <div class="comment-char" id="comment-char-count-mobile">
                0/300
            </div>
            <button id="submit-comment-mobile"
                class="mt-2 w-full px-4 py-2 bg-black text-white text-sm rounded-md hover:bg-gray-800 transition">
                Kirim
            </button>
        </div>
    </div>

    <style>
        :root {
            --tara-accent: #facc15;
            --tara-dark: #111827;
            --tara-muted: #6b7280;
        }

        html,
        body {
            font-family: "Space Grotesk", sans-serif;
            scroll-behavior: smooth;
        }

        body {
            font-family: "Outfit", sans-serif;
            background: #ffffff;
            color: var(--tara-dark);
            box-sizing: border-box;
        }

        *,
        *::before,
        *::after {
            box-sizing: inherit;
        }

        /* reading progress */
        #reading-progress {
            position: fixed;
            top: 0;
            left: 0;
            height: 4px;
            width: 0;
            background: var(--tara-accent);
            z-index: 60;
            transition: width 0.1s linear;
        }

        /* particles bg */
        #particles-js {
            position: fixed;
            inset: 0;
            z-index: -1;
        }

        /* hero */
        .hero-wrapper {
            max-width: min(100%, 900px);
            margin-inline: auto;
        }

        .hero-img-wrapper {
            position: relative;
            overflow: hidden;
            border-radius: 1rem;
            cursor: pointer;
        }

        .hero-img-wrapper img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.6s ease, filter 0.6s ease;
            will-change: transform;
        }

        .hero-img-wrapper:hover img {
            transform: scale(1.03);
            filter: brightness(0.95);
        }

        /* floating actions */
        .float-actions {
            display: flex;
            gap: 0.75rem;
            justify-content: center;
            margin: 1rem 0;
        }

        .float-actions button {
            width: 2.25rem;
            height: 2.25rem;
            border-radius: 9999px;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            display: grid;
            place-items: center;
            font-size: 0.9rem;
            line-height: 1;
            transition: all 0.2s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .float-actions button:hover {
            background: var(--tara-dark);
            color: #fff;
            transform: scale(1.05);
        }

        .float-actions .badge {
            position: absolute;
            top: -0.4rem;
            right: -0.4rem;
            background: var(--tara-accent);
            color: #000;
            font-size: 0.65rem;
            font-weight: 700;
            line-height: 1;
            padding: 0 0.3rem;
            border-radius: 0.375rem;
        }

        /* uploader section */
        .uploader-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            max-width: 900px;
            margin: 0 auto 1.5rem;
        }

        .uploader-info {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-align: left;
        }

        /* article content */
        .article-content h2 {
            font-family: "Space Grotesk", sans-serif;
            font-weight: 600;
            margin-top: 2.5rem;
            margin-bottom: 1rem;
            font-size: 1.75rem;
            line-height: 1.2;
        }

        .article-content h3 {
            font-family: "Space Grotesk", sans-serif;
            font-weight: 600;
            margin-top: 2rem;
            margin-bottom: 0.75rem;
            font-size: 1.35rem;
        }

        .article-content p {
            margin-bottom: 1.25rem;
            line-height: 1.7;
            color: #374151;
        }

        .article-content blockquote {
            margin: 2rem 0;
            padding: 1.25rem 1.5rem;
            border-left: 4px solid var(--tara-accent);
            background: #fffbeb;
            border-radius: 0.25rem;
            font-style: italic;
            color: #92400e;
        }

        .article-content pre {
            margin: 2rem 0;
            padding: 1rem 1.25rem;
            overflow-x: auto;
            background: #1f2937;
            color: #f9fafb;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            line-height: 1.5;
            font-family: ui-monospace, monospace;
        }

        .article-content code {
            background: rgba(0, 0, 0, 0.05);
            padding: 0.15rem 0.35rem;
            border-radius: 0.25rem;
            font-size: 0.85em;
        }

        .article-content img {
            margin: 2rem auto;
            border-radius: 0.75rem;
            max-width: 100%;
            height: auto;
            display: block;
        }

        .article-tags button {
            padding: 0.25rem 0.75rem;
            font-size: 0.75rem;
            border: 1px solid #e5e7eb;
            border-radius: 9999px;
            background: #f9fafb;
            color: #374151;
            transition: 0.2s;
        }

        .article-tags button:hover {
            background: var(--tara-dark);
            color: #fff;
        }

        /* comment panel */
        .comment-panel {
            position: sticky;
            top: 6rem;
            right: auto;
            width: 100%;
            max-height: calc(100vh - 8rem);
            display: flex;
            flex-direction: column;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 1rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            z-index: 30;
            padding: 1rem;
            margin-bottom: 2rem;
        }

        .comment-panel-header {
            z-index: 40;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 0.75rem;
        }

        .comment-panel-header h3 {
            font-weight: 600;
            font-size: 1rem;
        }

        .comment-scroll {
            flex: 1;
            overflow-y: auto;
            scrollbar-width: thin;
            padding-right: 0.25rem;
        }

        .comment-card {
            position: relative;
            padding: 0.75rem;
            border: 1px solid #f3f4f6;
            border-radius: 0.75rem;
            background: #fff;
            margin-bottom: 0.75rem;
            font-size: 0.875rem;
        }

        .comment-card.reply {
            margin-left: 1.75rem;
            border-color: #e5e7eb;
            background: #fcfcfc;
        }

        .comment-user {
            font-weight: 600;
            color: var(--tara-dark);
        }

        .comment-meta {
            font-size: 0.7rem;
            color: var(--tara-muted);
            margin-top: 0.1rem;
        }

        .comment-actions {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-top: 0.5rem;
            font-size: 0.75rem;
            color: var(--tara-muted);
        }

        .comment-actions button {
            transition: 0.15s;
        }

        .comment-actions button:hover {
            color: var(--tara-dark);
        }

        .comment-menu {
            position: absolute;
            top: 0.5rem;
            right: 0.5rem;
        }

        .comment-menu button {
            width: 1.5rem;
            height: 1.5rem;
            border-radius: 9999px;
            display: grid;
            place-items: center;
            font-size: 0.75rem;
            color: var(--tara-muted);
            transition: 0.15s;
        }

        .comment-menu button:hover {
            color: var(--tara-dark);
        }

        .comment-menu-pop {
            position: absolute;
            top: 1.75rem;
            right: 0;
            min-width: 7.5rem;
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 0.5rem;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.12);
            padding: 0.25rem;
            display: none;
            z-index: 10;
        }

        .comment-menu-pop.open {
            display: block;
        }

        .comment-menu-pop button {
            display: block;
            width: 100%;
            text-align: left;
            padding: 0.35rem 0.5rem;
            font-size: 0.75rem;
            color: #374151;
            border-radius: 0.25rem;
        }

        .comment-menu-pop button:hover {
            background: #f3f4f6;
            color: #000;
        }

        .comment-like.active {
            color: #ef4444;
        }

        /* new comment form */
        .comment-form {
            margin-top: 0.75rem;
            border-top: 1px solid #e5e7eb;
            padding-top: 0.75rem;
        }

        .comment-form textarea {
            resize: none;
            width: 100%;
            min-height: 60px;
            max-height: 160px;
        }

        .comment-char {
            text-align: right;
            font-size: 0.7rem;
            color: var(--tara-muted);
            margin-top: 0.25rem;
        }

        /* mobile comment toggle */
        #mobile-comment-toggle {
            z-index: 55;
            position: fixed;
            bottom: 1.25rem;
            right: 1rem;
            padding: 0.5rem 0.875rem;
            font-size: 0.875rem;
            border-radius: 9999px;
            background: var(--tara-dark);
            color: #fff;
            display: none;
            align-items: center;
            gap: 0.35rem;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
        }

        #mobile-comment-toggle .count {
            background: var(--tara-accent);
            color: #000;
            font-size: 0.75rem;
            padding: 0 0.4rem;
            border-radius: 0.375rem;
            font-weight: 700;
        }

        /* responsive */
        @media (max-width: 1023.98px) {
            .comment-panel {
                display: none;
            }

            #mobile-comment-toggle {
                display: inline-flex;
            }

            .float-actions {
                flex-direction: row;
                justify-content: center;
                margin-top: 1rem;
            }
        }

        /* show comment drawer on mobile */
        .comment-drawer {
            z-index: 70;
            position: fixed;
            inset: 0 0 auto 0;
            bottom: 0;
            background: #fff;
            display: none;
            flex-direction: column;
            max-height: 85vh;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
            box-shadow: 0 -8px 32px rgba(0, 0, 0, 0.25);
        }

        .comment-drawer.open {
            display: flex;
        }

        .comment-drawer-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem 1.25rem;
            border-bottom: 1px solid #e5e7eb;
            font-weight: 600;
        }

        .comment-drawer-body {
            flex: 1;
            padding: 1rem 1.25rem;
            overflow-y: auto;
        }

        .comment-drawer-footer {
            padding: 1rem 1.25rem;
            border-top: 1px solid #e5e7eb;
        }

        .comment-drawer-footer textarea {
            resize: none;
            width: 100%;
            min-height: 60px;
            max-height: 120px;
        }

        /* notification */
        .notification-bar {
            background: #f3f4f6;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .notification-bar:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .notification-icon {
            transition: transform 0.3s ease, color 0.3s ease;
            position: relative;
        }

        .notification-icon:hover {
            transform: scale(1.2);
            color: #111827;
        }

        .notification-modal {
            position: fixed;
            top: 0;
            right: 0;
            height: 100%;
            width: 100%;
            max-width: 400px;
            background: #ffffff;
            border-left: 1px solid #e5e7eb;
            z-index: 50;
            transform: translateX(100%);
            transition: transform 0.3s ease;
        }

        .notification-modal.open {
            transform: translateX(0);
        }

        .notification-modal .close-btn {
            position: absolute;
            top: 1rem;
            right: 1rem;
            font-size: 1.5rem;
            color: #374151;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .notification-modal .close-btn:hover {
            transform: scale(1.2);
        }

        .notification-card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        .notification-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .notification-card.unread {
            background: #f3f4f6;
        }

        .notification-card p {
            font-size: 0.9rem;
            color: #4b5563;
        }

        .notification-card .time {
            font-size: 0.75rem;
            color: #6b7280;
        }

        .notification-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background: #111827;
            color: #ffffff;
            font-size: 0.75rem;
            font-weight: 500;
            border-radius: 9999px;
            padding: 0.1rem 0.5rem;
        }

        .sidebar-notification-container {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 0;
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

        /* Share Modal */
        #share-modal {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 120;
        }

        #share-modal.open {
            display: flex;
        }

        .share-modal-content {
            background: #ffffff;
            border-radius: 0.5rem;
            padding: 1.5rem;
            width: 100%;
            max-width: 320px;
            position: relative;
        }

        .share-modal-content a,
        .share-modal-content button {
            display: block;
            width: 100%;
            padding: 0.75rem;
            text-align: center;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            margin-bottom: 0.75rem;
            transition: background 0.2s;
        }

        .share-modal-content a:hover,
        .share-modal-content button:hover {
            filter: brightness(0.9);
        }
    </style>

    <script>
        /* --------------------------------------------------
     DEMO DATA (You can replace w/ real API)
  -------------------------------------------------- */
        const demoArticles = [
            {
                id: 1,
                title: "Wawancara: Kerennya Karya Anak Muda",
                category: "wawancara",
                description: "Inspirasi dari kreator kreatif muda Indonesia",
                image: "https://picsum.photos/seed/blog1/1200/800",
                date: "2025-07-10",
                views: 534,
                tags: ["kreatif", "wawancara", "anak muda"],
                body: [
                    {
                        t: "p",
                        c: "Di artikel ini kita ngobrol santai dengan beberapa kreator muda yang karyanya viral di komunitas TARA.",
                    },
                    { t: "h2", c: "Awal Perjalanan" },
                    {
                        t: "p",
                        c: "Semua berawal dari rasa penasaran dan sering mencoba. Banyak yang memulai dari kamar kos dengan alat seadanya.",
                    },
                    {
                        t: "blockquote",
                        c: "Jangan tunggu sempurna. Mulai aja dulu. – Naya, ilustrator",
                    },
                    {
                        t: "p",
                        c: "Platform digital membuat distribusi karya jadi mudah. Namun menjaga konsistensi tetap tantangan utama.",
                    },
                    {
                        t: "img",
                        src: "https://picsum.photos/seed/blog1b/1100/600",
                        alt: "Studio kreator",
                    },
                    { t: "h3", c: "Tools Favorit" },
                    {
                        t: "p",
                        c: "Mayoritas pakai tablet gambar, Canva, Figma, dan kadang AI untuk ide warna.",
                    },
                    { t: "code", c: "console.log('Halo kreator TARA!');" },
                ],
            },
            {
                id: 2,
                title: "Tutorial: Membuat Animasi GSAP",
                category: "tutorial",
                description: "Pelajari trik animasi modern",
                image: "https://picsum.photos/seed/blog2/1200/800",
                date: "2025-07-08",
                views: 880,
                tags: ["gsap", "animasi", "web"],
                body: [
                    {
                        t: "p",
                        c: "GSAP bikin animasi web halus dan powerful. Kita mulai dari basic timeline.",
                    },
                    { t: "h2", c: "Setup" },
                    { t: "code", c: "gsap.to('.box',{x:100,duration:1});" },
                    {
                        t: "img",
                        src: "https://picsum.photos/seed/blog2b/900/500",
                        alt: "Contoh animasi",
                    },
                    { t: "h3", c: "ScrollTrigger" },
                    {
                        t: "p",
                        c: "Plugin ini memicu animasi saat elemen masuk viewport.",
                    },
                ],
            },
            {
                id: 3,
                title: "Tips: Desain UI yang Menarik",
                category: "tips",
                description: "Buat desain yang memukau",
                image: "https://picsum.photos/seed/blog3/1200/800",
                date: "2025-07-05",
                views: 456,
                tags: ["ui", "tips", "desain"],
                body: [
                    {
                        t: "p",
                        c: "Kunci: hirarki visual, kontras, spasi, dan tipografi konsisten.",
                    },
                    { t: "h2", c: "Gunakan Skala" },
                    {
                        t: "p",
                        c: "Elemen penting harus lebih menonjol. Jangan ragu pakai ukuran besar.",
                    },
                ],
            },
            {
                id: 7,
                title: "KARYA #7: TV Tua di Bukit Pasir",
                category: "wawancara",
                description:
                    "Representasi unik dari kreativitas dan inovasi.",
                image: "https://picsum.photos/seed/tvpasir/1200/800",
                date: "2025-07-19",
                views: 1020,
                tags: ["fotografi", "konsep", "retro"],
                body: [
                    {
                        t: "p",
                        c: "Gambar TV tabung yang tertanam di bukit pasir ini simbol transisi media lama ke dunia digital.",
                    },
                    { t: "h2", c: "Simbolisme" },
                    {
                        t: "p",
                        c: "Pasir = waktu, TV = nostalgia, langit luas = masa depan kreatif.",
                    },
                    {
                        t: "img",
                        src: "https://picsum.photos/seed/tvpasir-b/1100/600",
                        alt: "TV di pasir",
                    },
                    {
                        t: "blockquote",
                        c: "Setiap medium yang ditinggalkan membuka ruang eksperimen baru.",
                    },
                    { t: "h3", c: "Teknik Pemotretan" },
                    {
                        t: "p",
                        c: "Menggunakan lensa wide 24mm, aperture f/4, dan cahaya alami sore.",
                    },
                    {
                        t: "code",
                        c: "// pseudo setting kamera\nISO 100\nAperture f/4\nShutter 1/500",
                    },
                ],
            },
        ];

        // Quick map by id for lookup
        const demoArticleMap = new Map(demoArticles.map((a) => [a.id, a]));

        /* --------------------------------------------------
     Utility helpers
  -------------------------------------------------- */
        const qs = (s) => document.querySelector(s);
        const qsa = (s) => [...document.querySelectorAll(s)];
        function getQueryParam(name) {
            return new URLSearchParams(window.location.search).get(name);
        }
        function fmtDateISOtoDisplay(iso) {
            if (!iso) return "";
            const d = new Date(iso);
            const locale = "id-ID";
            return d.toLocaleDateString(locale, {
                day: "numeric",
                month: "short",
                year: "numeric",
            });
        }
        function relDate(iso) {
            const d = new Date(iso);
            const now = new Date();
            const diff = (now - d) / 1000; // seconds
            if (diff < 60) return "baru saja";
            if (diff < 3600) return Math.floor(diff / 60) + " menit lalu";
            if (diff < 86400) return Math.floor(diff / 3600) + " jam lalu";
            if (diff < 172800) return "kemarin";
            return fmtDateISOtoDisplay(iso);
        }
        function estimateReadTimeFromBody(body) {
            // crude: count words in p + blockquote + code text
            const text = body
                .filter((b) =>
                    ["p", "blockquote", "code", "h2", "h3"].includes(b.t)
                )
                .map((b) => b.c || "")
                .join(" ");
            const words = text.trim().split(/\s+/).filter(Boolean).length;
            const wpm = 220; // avg
            return Math.max(1, Math.round(words / wpm));
        }

        /* --------------------------------------------------
     Render Article
  -------------------------------------------------- */
        const articleId = Number(getQueryParam("id") || 7); // default 7 to match screenshot
        const articleData =
            demoArticleMap.get(articleId) || demoArticles[0];

        // hero + meta
        qs("#article-title").textContent = articleData.title;
        qs("#article-hero-image").src = articleData.image;
        qs("#article-category-meta").textContent =
            articleData.category.charAt(0).toUpperCase() +
            articleData.category.slice(1);
        qs(
            "#article-date-meta"
        ).innerHTML = `<i class="fas fa-calendar-alt mr-1"></i>${fmtDateISOtoDisplay(
            articleData.date
        )}`;
        qs("#article-posted-rel").textContent =
            "Diposting " + relDate(articleData.date);
        qs(
            "#article-views-meta"
        ).innerHTML = `<i class="fas fa-eye mr-1"></i>${articleData.views.toLocaleString(
            "id-ID"
        )} Dilihat`;
        const rt = estimateReadTimeFromBody(articleData.body);
        qs(
            "#article-readtime-meta"
        ).innerHTML = `<i class=\"fas fa-book-open mr-1"></i>${rt} menit baca`;

        // tags
        const tagWrap = qs("#article-tags");
        (articleData.tags || []).forEach((t) => {
            const btn = document.createElement("button");
            btn.textContent = "#" + t;
            btn.addEventListener("click", () => {
                window.location.href = `/blog?tag=${encodeURIComponent(t)}`;
            });
            tagWrap.appendChild(btn);
        });

        // body renderer
        const bodyWrap = qs("#article-body");
        articleData.body.forEach((block) => {
            let el;
            switch (block.t) {
                case "h2":
                    el = document.createElement("h2");
                    el.textContent = block.c;
                    break;
                case "h3":
                    el = document.createElement("h3");
                    el.textContent = block.c;
                    break;
                case "p":
                    el = document.createElement("p");
                    el.textContent = block.c;
                    break;
                case "blockquote":
                    el = document.createElement("blockquote");
                    el.textContent = block.c;
                    break;
                case "code":
                    el = document.createElement("pre");
                    el.innerHTML = `<code>${block.c.replace(
                        /[&<>]/g,
                        (ch) => ({ "&": "&", "<": "<", ">": ">" }[ch])
                    )}</code>`;
                    break;
                case "img":
                    el = document.createElement("img");
                    el.src = block.src;
                    el.alt = block.alt || "";
                    break;
                default:
                    return;
            }
            bodyWrap.appendChild(el);
        });

        /* --------------------------------------------------
     Prev / Next (pick based on index in demo array order)
  -------------------------------------------------- */
        const idx = demoArticles.findIndex((a) => a.id === articleData.id);
        const prev = demoArticles[idx - 1];
        const next = demoArticles[idx + 1];
        const pnWrap = qs("#article-prev-next");
        if (prev) {
            pnWrap.insertAdjacentHTML(
                "beforeend",
                `<a href='?id=${prev.id}' class='group block p-4 border border-gray-200 rounded-lg hover:border-black transition text-left'>
            <div class='text-xs text-gray-500 mb-1'>Artikel Sebelumnya</div>
            <div class='font-semibold group-hover:underline'>${prev.title}</div>
        </a>`
            );
        }
        if (next) {
            pnWrap.insertAdjacentHTML(
                "beforeend",
                `<a href='?id=${next.id}' class='group block p-4 border border-gray-200 rounded-lg hover:border-black transition text-right sm:text-left'>
            <div class='text-xs text-gray-500 mb-1'>Artikel Selanjutnya</div>
            <div class='font-semibold group-hover:underline'>${next.title}</div>
        </a>`
            );
        }

        /* --------------------------------------------------
     Recommended (take top 3 excluding current)
  -------------------------------------------------- */
        const recoWrap = qs("#article-reco");
        demoArticles
            .filter((a) => a.id !== articleData.id)
            .slice(0, 3)
            .forEach((a) => {
                const html = `<a href='?id=${a.id
                    }' class='block group bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-md transition'>
            <img src='${a.image}' alt='${a.title
                    }' class='w-full h-48 object-cover group-hover:scale-[1.03] group-hover:brightness-90 transition-transform duration-300' />
            <div class='p-4 flex flex-col gap-2'>
                <span class='inline-block px-2 py-1 bg-gray-100 text-xs text-gray-700 rounded-full mb-1'>${a.category.charAt(0).toUpperCase() + a.category.slice(1)
                    }</span>
                <h3 class='text-lg font-semibold text-black leading-snug group-hover:underline'>${a.title
                    }</h3>
                <p class='text-sm text-gray-600 line-clamp-2'>${a.description
                    }</p>
                <div class='mt-auto flex items-center gap-4 text-xs text-gray-500'>
                    <span><i class='fas fa-calendar-alt mr-1'></i>${fmtDateISOtoDisplay(
                        a.date
                    )}</span>
                    <span><i class='fas fa-eye mr-1'></i>${a.views
                    } Dilihat</span>
                </div>
            </div>
        </a>`;
                recoWrap.insertAdjacentHTML("beforeend", html);
            });

        /* --------------------------------------------------
     Comment Data (demo)
     Each comment: {id,user,handle,avatar,text,dateISO,likes,replies:[...]}
  -------------------------------------------------- */
        const demoComments = [
            {
                id: 101,
                user: "Pengguna Anonim",
                handle: "@anon",
                avatar: "https://i.pravatar.cc/60?img=5",
                text: `Ini Karya ID ${articleId}`,
                dateISO: "2025-07-19T23:46:25",
                likes: 0,
                replies: [
                    {
                        id: 102,
                        user: "Pengguna Lain",
                        handle: "@pengguna",
                        avatar: "https://i.pravatar.cc/60?img=14",
                        text: "Mantap konsepnya!",
                        dateISO: "2025-07-19T23:46:30",
                        likes: 0,
                    },
                ],
            },
            {
                id: 103,
                user: "Brian RB Keren",
                handle: "@rizky",
                avatar: "https://i.pravatar.cc/60?img=18",
                text: "Keren banget idenya, boleh tau gear kameranya?",
                dateISO: "2025-07-20T08:12:10",
                likes: 2,
                replies: [],
            },
        ];

        /* --------------------------------------------------
     Comment Rendering (desktop & mobile share helpers)
  -------------------------------------------------- */
        function fmtDateTime(iso) {
            const d = new Date(iso);
            return d.toLocaleString("id-ID", {
                day: "numeric",
                month: "numeric",
                year: "numeric",
                hour: "2-digit",
                minute: "2-digit",
                second: "2-digit",
            });
        }

        function buildCommentHTML(c, { isReply = false } = {}) {
            const hasReplies =
                Array.isArray(c.replies) && c.replies.length > 0;
            const safeHandle = encodeURIComponent(c.handle || "");
            const safeUser = escapeHTML(c.user || "");
            const safeAvatar = escapeHTML(c.avatar || "");
            const safeText = escapeHTML(c.text || "");
            const safeDate = fmtDateTime(c.dateISO || "");

            return `
    <div class='comment-card ${isReply ? "reply" : ""}' data-id='${c.id}'>
      <div class='flex items-start gap-2'>
        <a href='profil_user_lain.html' class='inline-block'>
          <img src='${safeAvatar}' alt='${safeUser}' class='w-8 h-8 rounded-full object-cover'/>
        </a>
        <div class='flex-1'>
          <a href='profil_user_lain.html' class='comment-user hover:underline'>
            ${safeUser}
          </a>
          <div class='comment-meta'>${safeDate}</div>
          <div class='mt-1 leading-relaxed'>${safeText}</div>
          <div class='comment-actions'>
            <button class='comment-like${c.likes > 0 ? " active" : ""
                }' data-action='like'>
              <i class='fas fa-heart mr-1'></i><span>${c.likes}</span>
            </button>
            <button data-action='reply'>Balas</button>
            ${hasReplies && !isReply
                    ? `<button data-action='toggle'>Lihat balasan (${c.replies.length})</button>`
                    : ""
                }
          </div>
        </div>
      </div>

      <div class='comment-menu'>
        <button data-action='menu'><i class='fas fa-ellipsis-h'></i></button>
        <div class='comment-menu-pop' role='menu'>
          <button data-action='report'>Laporkan</button>
          <button data-action='mute'>Bisukan</button>
          <button data-action='reply'>Balas</button>
        </div>
      </div>

      ${hasReplies && !isReply
                    ? `<div class='comment-replies hidden mt-3 space-y-2'>
            ${c.replies
                        .map((r) => buildCommentHTML(r, { isReply: true }))
                        .join("")}
          </div>`
                    : ""
                }

      <div class='comment-reply-form hidden mt-3'>
        <textarea maxlength='300' placeholder='Balas komentar...'
          class='w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-black'></textarea>
        <div class='text-right mt-1'>
          <button data-action='cancel-reply' class='text-xs text-gray-500 hover:text-gray-800 mr-2'>Batal</button>
          <button data-action='submit-reply' class='text-xs px-3 py-1 bg-black text-white rounded-md'>Kirim</button>
        </div>
      </div>
    </div>
  `;
        }

        function escapeHTML(str) {
            return str.replace(
                /[&<>"']/g,
                (ch) =>
                ({
                    "&": "&amp;",
                    "<": "&lt;",
                    ">": "&gt;",
                    '"': "&quot;",
                    "'": "&#39;",
                }[ch])
            );
        }

        function renderCommentsDesktop() {
            const wrap = qs("#comment-list");
            wrap.innerHTML = demoComments
                .map((c) => buildCommentHTML(c))
                .join("");
            attachCommentEvents(wrap, false);
        }
        function renderCommentsMobile() {
            const wrap = qs("#comment-drawer-body");
            wrap.innerHTML = demoComments
                .map((c) => buildCommentHTML(c))
                .join("");
            attachCommentEvents(wrap, true);
        }
        function updateCommentCounts() {
            const count =
                demoComments.length +
                demoComments.reduce(
                    (s, c) => s + (c.replies ? c.replies.length : 0),
                    0
                );
            qs("#comment-count-top").textContent = `${count} komentar`;
            qs("#mobile-comment-count").textContent = count;
        }

        /* --------------------------------------------------
     Comment Interactions
  -------------------------------------------------- */
        function attachCommentEvents(root, isMobile) {
            // menu toggle
            root.querySelectorAll('[data-action="menu"]').forEach((btn) => {
                btn.addEventListener("click", (e) => {
                    const pop = e.currentTarget.nextElementSibling;
                    pop.classList.toggle("open");
                });
            });
            // like
            root.querySelectorAll('[data-action="like"]').forEach((btn) => {
                btn.addEventListener("click", (e) => {
                    const card = e.currentTarget.closest(".comment-card");
                    const id = Number(card.dataset.id);
                    const { comment, reply } = findCommentById(id);
                    if (reply) {
                        reply.likes++;
                    } else if (comment) {
                        comment.likes++;
                    }
                    e.currentTarget.classList.add("active");
                    e.currentTarget.querySelector("span").textContent =
                        reply ? reply.likes : comment.likes;
                    syncBadges();
                });
            });
            // toggle replies
            root.querySelectorAll('[data-action="toggle"]').forEach(
                (btn) => {
                    btn.addEventListener("click", (e) => {
                        const card =
                            e.currentTarget.closest(".comment-card");
                        const rep = card.querySelector(".comment-replies");
                        if (!rep) return;
                        rep.classList.toggle("hidden");
                        e.currentTarget.textContent =
                            rep.classList.contains("hidden")
                                ? `Lihat balasan (${rep.children.length})`
                                : "Sembunyikan Balas";
                    });
                }
            );
            // open reply form
            root.querySelectorAll('[data-action="reply"]').forEach(
                (btn) => {
                    btn.addEventListener("click", (e) => {
                        const card =
                            e.currentTarget.closest(".comment-card");
                        card.querySelector(
                            ".comment-reply-form"
                        ).classList.remove("hidden");
                    });
                }
            );
            // cancel reply
            root.querySelectorAll('[data-action="cancel-reply"]').forEach(
                (btn) => {
                    btn.addEventListener("click", (e) => {
                        const form = e.currentTarget.closest(
                            ".comment-reply-form"
                        );
                        form.classList.add("hidden");
                        form.querySelector("textarea").value = "";
                    });
                }
            );
            // submit reply
            root.querySelectorAll('[data-action="submit-reply"]').forEach(
                (btn) => {
                    btn.addEventListener("click", (e) => {
                        const card =
                            e.currentTarget.closest(".comment-card");
                        const id = Number(card.dataset.id);
                        const textarea = card.querySelector(
                            ".comment-reply-form textarea"
                        );
                        const text = textarea.value.trim();
                        if (!text) return;
                        addReply(id, text);
                        renderCommentsDesktop();
                        renderCommentsMobile();
                        updateCommentCounts();
                    });
                }
            );
            // report / mute stub
            root.querySelectorAll('[data-action="report"]').forEach((btn) =>
                btn.addEventListener("click", () =>
                    alert("Dilaporkan (demo).")
                )
            );
            root.querySelectorAll('[data-action="mute"]').forEach((btn) =>
                btn.addEventListener("click", () =>
                    alert("Pengguna dibisukan (demo).")
                )
            );
        }

        function findCommentById(id) {
            for (const c of demoComments) {
                if (c.id === id) return { comment: c, reply: null };
                for (const r of c.replies || []) {
                    if (r.id === id) return { comment: c, reply: r };
                }
            }
            return { comment: null, reply: null };
        }
        function addComment(text) {
            const now = new Date();
            demoComments.unshift({
                id: Date.now(),
                user: "Anda",
                handle: "@anda",
                avatar: "https://i.pravatar.cc/60?u=self",
                text,
                dateISO: now.toISOString(),
                likes: 0,
                replies: [],
            });
        }
        function addReply(parentId, text) {
            const now = new Date();
            const { comment } = findCommentById(parentId);
            if (!comment) return;
            comment.replies = comment.replies || [];
            comment.replies.push({
                id: Date.now(),
                user: "Anda",
                handle: "@anda",
                avatar: "https://i.pravatar.cc/60?u=self",
                text,
                dateISO: now.toISOString(),
                likes: 0,
            });
        }
        function syncBadges() {
            // update float like badge with total likes across all comments? Instead just article like count.
            const likeCount = Number(
                localStorage.getItem(
                    "tara-article-like-" + articleData.id
                ) || 0
            );
            const badge = qs("#float-like-badge");
            if (likeCount > 0) {
                badge.textContent = likeCount;
                badge.classList.remove("hidden");
            } else {
                badge.classList.add("hidden");
            }
        }

        /* --------------------------------------------------
     New Comment Forms
  -------------------------------------------------- */
        const newCommentText = qs("#new-comment-text");
        const charCount = qs("#comment-char-count");
        newCommentText?.addEventListener("input", () => {
            charCount.textContent = `${newCommentText.value.length}/300`;
        });
        qs("#submit-comment")?.addEventListener("click", () => {
            const text = newCommentText.value.trim();
            if (!text) return;
            addComment(text);
            newCommentText.value = "";
            charCount.textContent = "0/300";
            renderCommentsDesktop();
            renderCommentsMobile();
            updateCommentCounts();
        });
        const newCommentMobile = qs("#new-comment-mobile");
        const charCountMobile = qs("#comment-char-count-mobile");
        newCommentMobile?.addEventListener("input", () => {
            charCountMobile.textContent = `${newCommentMobile.value.length}/300`;
        });
        qs("#submit-comment-mobile")?.addEventListener("click", () => {
            const text = newCommentMobile.value.trim();
            if (!text) return;
            addComment(text);
            newCommentMobile.value = "";
            charCountMobile.textContent = "0/300";
            renderCommentsDesktop();
            renderCommentsMobile();
            updateCommentCounts();
        });

        /* --------------------------------------------------
     Mobile Drawer Toggle
  -------------------------------------------------- */
        const drawer = qs("#comment-drawer");
        qs("#mobile-comment-toggle").addEventListener("click", () => {
            drawer.classList.add("open");
        });
        qs("#comment-drawer-close").addEventListener("click", () => {
            drawer.classList.remove("open");
        });

        /* --------------------------------------------------
     Floating Like / Share
  -------------------------------------------------- */
        const floatLikeBtn = qs("#float-like");
        const floatShareBtn = qs("#float-share");
        floatLikeBtn.addEventListener("click", () => {
            const key = "tara-article-like-" + articleData.id;
            let count = Number(localStorage.getItem(key) || 0);
            count++;
            localStorage.setItem(key, count);
            syncBadges();
            anime({
                targets: floatLikeBtn,
                scale: [1, 1.2, 1],
                duration: 300,
                easing: "easeOutQuad",
            });
        });
        floatShareBtn.addEventListener("click", () => {
            const modal = qs("#share-modal");
            modal.classList.add("open");
            gsap.fromTo(
                modal.querySelector(".share-modal-content"),
                { scale: 0.85, opacity: 0 },
                { scale: 1, opacity: 1, duration: 0.3, ease: "power2.out" }
            );
        });
        syncBadges();

        /* --------------------------------------------------
     Share Modal
  -------------------------------------------------- */
        const shareUrl = encodeURIComponent(window.location.href);
        const shareTitle = encodeURIComponent(articleData.title);
        qs(
            "#share-whatsapp"
        ).href = `https://api.whatsapp.com/send?text=${shareTitle}%20${shareUrl}`;
        qs(
            "#share-instagram"
        ).href = `https://www.instagram.com/?url=${shareUrl}`; // Instagram doesn't support direct sharing with title
        qs(
            "#share-x"
        ).href = `https://x.com/intent/tweet?url=${shareUrl}&text=${shareTitle}`;
        qs("#share-copy-link").addEventListener("click", () => {
            navigator.clipboard
                .writeText(window.location.href)
                .then(() => {
                    alert("Link berhasil disalin!");
                })
                .catch(() => {
                    alert("Gagal menyalin link.");
                });
        });
        qs("#share-modal").addEventListener("click", (e) => {
            if (e.target === qs("#share-modal")) closeShareModal();
        });
        qs("#share-modal").addEventListener("keydown", (e) => {
            if (e.key === "Escape") closeShareModal();
        });
        function closeShareModal() {
            const modal = qs("#share-modal");
            modal.classList.remove("open");
        }

        /* --------------------------------------------------
     Follow Button
  -------------------------------------------------- */
        const followBtn = qs("#follow-btn");
        followBtn.addEventListener("click", () => {
            const followed = followBtn.dataset.followed === "1";
            followBtn.dataset.followed = followed ? "0" : "1";
            followBtn.textContent = followed ? "Follow" : "Mengikuti";
            anime({
                targets: followBtn,
                scale: [1, 1.1, 1],
                duration: 300,
                easing: "easeOutQuad",
            });
        });

        /* --------------------------------------------------
     Reading Progress Bar
  -------------------------------------------------- */
        const progressBar = qs("#reading-progress");
        function updateProgress() {
            const scrollTop = window.scrollY;
            const docHeight =
                document.body.scrollHeight - window.innerHeight;
            const p = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0;
            progressBar.style.width = p + "%";
        }
        window.addEventListener("scroll", updateProgress, {
            passive: true,
        });
        updateProgress();

        /* --------------------------------------------------
     Particles
  -------------------------------------------------- */
        particlesJS("particles-js", {
            particles: {
                number: {
                    value: 40,
                    density: { enable: true, value_area: 1000 },
                },
                color: { value: "#4b5563" },
                shape: { type: "circle" },
                opacity: { value: 0.25, random: false },
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
                modes: { repulse: { distance: 100, duration: 0.4 } },
            },
            retina_detect: true,
        });

        /* --------------------------------------------------
     Animate in sections
  -------------------------------------------------- */
        gsap.registerPlugin(ScrollTrigger);
        gsap.from("#article-hero-image-wrapper", {
            opacity: 0,
            y: 40,
            duration: 1,
            ease: "power3.out",
        });
        gsap.from("#article-body", {
            opacity: 0,
            y: 40,
            duration: 1,
            ease: "power3.out",
            scrollTrigger: { trigger: "#article-body", start: "top 80%" },
        });
        gsap.from("#article-reco-wrapper", {
            opacity: 0,
            y: 40,
            duration: 1,
            ease: "power3.out",
            scrollTrigger: {
                trigger: "#article-reco-wrapper",
                start: "top 80%",
            },
        });

        /* --------------------------------------------------
     Notification Toggle
  -------------------------------------------------- */
        function toggleNotifications() {
            const modal = document.getElementById("notification-modal");
            const isOpen = modal.classList.contains("open");
            modal.classList.toggle("open");
            gsap.to(modal, {
                x: isOpen ? "100%" : "0%",
                duration: 0.3,
                ease: "power2.out",
            });
            if (!isOpen) {
                renderNotifications();
            }
        }

        function renderNotifications() {
            const notificationList = qs("#notification-list");
            notificationList.innerHTML =
                '<p class="text-sm text-gray-600">Belum ada notifikasi</p>';
        }

        /* --------------------------------------------------
     Initial Comment Render
  -------------------------------------------------- */
        renderCommentsDesktop();
        renderCommentsMobile();
        updateCommentCounts();

        /* --------------------------------------------------
     Set Active Navigation Link
  -------------------------------------------------- */
        const currentPath =
            window.location.pathname.split("/").pop() || "blog.html";
        document.querySelectorAll(".nav-link").forEach((link) => {
            const href = link.getAttribute("href").split("/").pop();
            if (href === "blog.html") {
                link.classList.add("active");
            }
        });
    </script>
</x-admin-layout>