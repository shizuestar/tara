<x-layout>
    <!-- Reading Progress Bar -->
    <div id="reading-progress"></div>
    <!-- Particles Background -->
    <div id="particles-js"></div>
    <!-- Share Modal -->
    <div id="share-modal" role="dialog" aria-modal="true" aria-labelledby="share-modal-title" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-[1000]">
        <div class="share-modal-content bg-white rounded-lg p-6 w-full max-w-md mx-4 relative">
            <span onclick="closeShareModal()" class="absolute top-3 right-3 cursor-pointer text-black bg-gray-100 rounded px-2 py-1 shadow-sm hover:bg-gray-200 transition">X</span>
            <h3 id="share-modal-title" class="text-xl font-bold mb-4">Bagikan Karya</h3>
            <div class="space-y-3">
                <a id="share-whatsapp" href="#" class="block w-full px-4 py-2 bg-green-500 text-white text-center rounded-md hover:bg-green-600 transition">WhatsApp</a>
                <a id="share-instagram" href="#" class="block w-full px-4 py-2 bg-pink-500 text-white text-center rounded-md hover:bg-pink-600 transition">Instagram</a>
                <a id="share-x" href="#" class="block w-full px-4 py-2 bg-black text-white text-center rounded-md hover:bg-gray-800 transition">X</a>
                <button id="share-copy-link" class="block w-full px-4 py-2 bg-gray-600 text-white text-center rounded-md hover:bg-gray-700 transition">Salin Link</button>
            </div>
        </div>
    </div>
    <!-- Main Content -->
    <main class="w-full pt-32 pb-16 grid grid-cols-1 lg:grid-cols-12 gap-8 px-4 max-w-7xl mx-auto">
        <!-- Left Column - Gallery Content -->
        <div class="lg:col-span-8">
            <!-- Carousel Section -->
            <section class="carousel-wrapper px-4 max-w-4xl mx-auto" id="gallery-carousel">
                <div class="carousel relative overflow-hidden rounded-xl shadow-lg">
                    <div class="carousel-slides flex transition-transform duration-500 ease-in-out">
                        <div class="carousel-slide flex-shrink-0 w-full">
                            <img src="{{ $artwork->thumbnail ? asset('storage/' . $artwork->thumbnail) : 'https://picsum.photos/1200/800' }}" alt="{{ $artwork->title }}" class="w-full h-auto object-cover max-h-[600px]" />
                        </div>
                        @foreach($artwork->files as $file)
                            <div class="carousel-slide flex-shrink-0 w-full">
                                <img src="{{ asset('storage/' . $file->image_path) }}" alt="Artwork file" class="w-full h-auto object-cover max-h-[600px]" />
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-prev absolute top-1/2 left-4 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-full hover:bg-opacity-75 transition" aria-label="Previous slide">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="carousel-next absolute top-1/2 right-4 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-full hover:bg-opacity-75 transition" aria-label="Next slide">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                    <div class="carousel-indicators absolute bottom-4 left-1/2 transform -translate-x-1/2 flex gap-2">
                        @if($artwork->thumbnail || $artwork->files->count())
                            @for($i = 0; $i < ($artwork->files->count() + ($artwork->thumbnail ? 1 : 0)); $i++)
                                <button class="carousel-indicator w-2 h-2 rounded-full bg-gray-400 hover:bg-gray-600 transition {{ $i === 0 ? 'active bg-white' : '' }}" data-index="{{ $i }}" aria-label="Go to slide {{ $i + 1 }}"></button>
                            @endfor
                        @endif
                    </div>
                </div>
                <!-- Uploader Section -->
                <div class="uploader-section mt-4 flex items-center justify-between">
                    @if ($artwork->creator)
                        <a href="{{ route('profile', $artwork->creator->id) }}" class="flex items-center gap-3">
                            <div class="uploader-info flex items-center gap-2">
                                <img id="gallery-uploader-avatar" src="{{ $artwork->creator->avatar ?? 'https://i.pravatar.cc/60' }}" alt="avatar" class="w-10 h-10 rounded-full object-cover" />
                                <div class="text-left leading-tight">
                                    <div id="gallery-uploader-name" class="font-semibold text-[var(--tara-dark)] text-sm">{{ $artwork->creator->name }}</div>
                                    <div id="gallery-posted-rel" class="text-xs text-gray-500">Diposting {{ \Carbon\Carbon::parse($artwork->created_at)->diffForHumans() }}</div>
                                </div>
                            </div>
                        </a>
                        <button id="follow-btn" data-followed="0" class="px-3 py-1 text-xs rounded-full bg-[var(--tara-accent)] text-black font-semibold hover:bg-yellow-300 transition">Follow</button>
                    @else
                        <div class="uploader-info flex items-center gap-2">
                            <img id="gallery-uploader-avatar" src="https://placehold.co/60x60/cccccc/333333?text=User" alt="avatar" class="w-10 h-10 rounded-full object-cover" />
                            <div class="text-left leading-tight">
                                <div id="gallery-uploader-name" class="font-semibold text-gray-400 text-sm">Pengguna Dihapus</div>
                                <div id="gallery-posted-rel" class="text-xs text-gray-500">Diposting {{ \Carbon\Carbon::parse($artwork->created_at)->diffForHumans() }}</div>
                            </div>
                        </div>
                    @endif
                </div>
                <!-- Detailed Information Section -->
                <section class="info-section mt-4 px-4 max-w-4xl mx-auto">
                    <div class="flex flex-wrap gap-3 items-center">
                        <span class="px-3 py-1 bg-gray-100 text-gray-700 text-sm rounded-full shadow-md">{{ $artwork->title ?? 'Bakwe' }}</span>
                        <span class="px-3 py-1 bg-gray-100 text-gray-700 text-sm rounded-full shadow-md">{{ optional($artwork->category)->name ?? 'Seni' }}</span>
                        <span class="px-3 py-1 bg-gray-100 text-gray-700 text-sm rounded-full shadow-md">{{ optional($artwork->community)->name ?? 'Tidak ada' }}</span>
                        @foreach($artwork->tags as $tag)
                            <a href="{{ route('galeri.tag', $tag->tag) }}" class="px-3 py-1 bg-gray-100 text-gray-700 text-sm rounded-full shadow-md hover:bg-gray-200 transition">#{{ $tag->tag }}</a>
                        @endforeach
                        @if($artwork->tags->isEmpty())
                            <a href="{{ route('galeri.tag', 'ilustrasi') }}" class="px-3 py-1 bg-gray-100 text-gray-700 text-sm rounded-full shadow-md hover:bg-gray-200 transition">#ilustrasi</a>
                        @endif
                        <span class="px-3 py-1 bg-[var(--tara-accent)] text-[var(--tara-dark)] text-sm rounded-full shadow-md">{{ $artwork->status ?? 'Tayang' }}</span>
                        <span class="px-3 py-1 bg-gray-100 text-gray-700 text-sm rounded-full shadow-md">{{ \Carbon\Carbon::parse($artwork->created_at)->format('d M Y') ?? '27 Sep 2025' }}</span>
                        @if(Auth::check() && Auth::id() === $artwork->user_id)
                            <div class="flex gap-2">
                                <a href="{{ route('galeri.edit', $artwork) }}" class="flex items-center gap-2 px-3 py-1 bg-white text-blue-500 text-sm rounded-full shadow-md hover:bg-gray-100 transition">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('galeri.destroy', $artwork) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus karya ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="flex items-center gap-2 px-3 py-1 bg-white text-red-500 text-sm rounded-full shadow-md hover:bg-gray-100 transition">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                </section>
                <!-- Floating Actions -->
                <div class="float-actions fixed bottom-4 right-4 flex flex-col gap-3 z-50 lg:static lg:flex-row lg:mt-4">
                    @if (isset($artwork) && is_object($artwork) && $artwork->id)
                        <form action="{{ route('galeri.like', ['artwork' => $artwork->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="flex items-center gap-2 px-4 py-2 bg-white rounded-full shadow-md hover:bg-gray-100 transition">
                                <i class="fas fa-heart {{ Auth::check() && $artwork->likes->isNotEmpty() ? 'text-red-500' : 'text-gray-500' }}"></i>
                                <span id="float-like-badge" class="badge {{ $artwork->likes->count() == 0 ? 'hidden' : '' }}">{{ $artwork->likes->count() }}</span>
                            </button>
                        </form>
                    @endif
                    <button id="float-share" class="flex items-center gap-2 px-4 py-2 bg-white rounded-full shadow-md hover:bg-gray-100 transition">
                        <i class="fas fa-share text-gray-500"></i>
                    </button>
                </div>
            </section>
            <!-- Gallery Description -->
            <article id="gallery-body" class="gallery-content max-w-3xl mx-auto mt-12 px-4 prose prose-sm sm:prose-base lg:prose-lg prose-img:rounded-xl prose-headings:font-semibold prose-a:text-[var(--tara-dark)]">
                <h1 class="text-2xl md:text-3xl font-bold">{{ $artwork->title }}</h1>
                @if($artwork->description)
                    <p class="text-gray-700">{{ $artwork->description }}</p>
                @endif
            </article>
            <!-- Gallery Tags -->
            <section class="max-w-3xl mx-auto mt-8 px-4">
                <div class="flex flex-wrap gap-2 gallery-tags" id="gallery-tags">
                    @foreach($artwork->tags as $tag)
                        <button onclick="window.location.href='{{ route('galeri.tag', $tag->tag) }}'" class="px-3 py-1 bg-gray-100 text-gray-700 text-sm rounded-full hover:bg-gray-200 transition">#{{ $tag->tag }}</button>
                    @endforeach
                    @if($artwork->tags->isEmpty())
                        <button onclick="window.location.href='{{ route('galeri.tag', 'ilustrasi') }}'" class="px-3 py-1 bg-gray-100 text-gray-700 text-sm rounded-full hover:bg-gray-200 transition">#ilustrasi</button>
                    @endif
                </div>
            </section>
            <!-- Previous / Next Navigation -->
            <nav class="max-w-3xl mx-auto mt-12 px-4 grid grid-cols-1 sm:grid-cols-2 gap-4" id="gallery-prev-next">
                @if($previous)
                    <a href="{{ route('galeri.show', $previous) }}" class="group block p-4 border border-gray-200 rounded-lg hover:border-black transition text-left">
                        <div class="text-xs text-gray-500 mb-1">Karya Sebelumnya</div>
                        <div class="font-semibold group-hover:underline">{{ $previous->title }}</div>
                    </a>
                @endif
                @if($next)
                    <a href="{{ route('galeri.show', $next) }}" class="group block p-4 border border-gray-200 rounded-lg hover:border-black transition text-right sm:text-left">
                        <div class="text-xs text-gray-500 mb-1">Karya Selanjutnya</div>
                        <div class="font-semibold group-hover:underline">{{ $next->title }}</div>
                    </a>
                @endif
            </nav>
            <!-- Recommended Artworks -->
            <section class="max-w-6xl mx-auto mt-16 px-4" id="gallery-reco-wrapper">
                <h2 class="text-2xl md:text-3xl font-bold mb-8 text-center" style="font-family:'Space Grotesk',sans-serif;">Karya Galeri Lainnya<span class="text-[var(--tara-accent)] ml-1">●</span></h2>
                <div id="gallery-reco" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($recommended as $item)
                        <a href="{{ route('galeri.show', $item) }}" class="block group bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-md transition">
                            <img src="{{ $item->thumbnail ? asset('storage/' . $item->thumbnail) : 'https://picsum.photos/1200/800' }}" alt="{{ $item->title }}" class="w-full h-48 object-cover group-hover:scale-[1.03] group-hover:brightness-90 transition-transform duration-300" />
                            <div class="p-4 flex flex-col gap-2">
                                <span class="inline-block px-2 py-1 bg-gray-100 text-xs text-gray-700 rounded-full mb-1">{{ optional($item->category)->name ?? 'Uncategorized' }}</span>
                                <h3 class="text-lg font-semibold text-black leading-snug group-hover:underline">{{ $item->title }}</h3>
                                <p class="text-sm text-gray-600 line-clamp-2">{{ $item->description }}</p>
                                <div class="mt-auto flex items-center gap-4 text-xs text-gray-500">
                                    <span><i class="fas fa-calendar-alt mr-1"></i>{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</span>
                                    <span><i class="fas fa-eye mr-1"></i>{{ $item->views }} Dilihat</span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </section>
        </div>
        <!-- Right Column - Comment Section -->
        <div class="lg:col-span-4">
            <aside class="comment-panel bg-white rounded-lg shadow-md p-6" id="comment-panel" aria-labelledby="comment-panel-title">
                <div class="comment-panel-header flex items-center justify-between mb-4">
                    <h3 id="comment-panel-title" class="text-lg font-bold">Komentar</h3>
                    <span id="comment-count-top" class="text-xs text-gray-500">{{ $artwork->comments->count() + $artwork->comments->sum(fn($comment) => $comment->replies->count()) }} komentar</span>
                </div>
                <div class="comment-scroll max-h-[500px] overflow-y-auto" id="comment-list">
                    @if($artwork->comments->isEmpty())
                        <p class="text-sm text-gray-600">Belum ada komentar</p>
                    @else
                        @foreach($artwork->comments as $comment)
                            <div class="comment-card border-b border-gray-200 p-4" data-id="{{ $comment->id }}">
                                <div class="flex items-start gap-2">
                                    <img src="{{ $comment->user->avatar ?? 'https://i.pravatar.cc/60' }}" alt="{{ $comment->user->name ?? 'Pengguna Dihapus' }}" class="w-8 h-8 rounded-full object-cover"/>
                                    <div class="flex-1">
                                        <div class="comment-user font-semibold text-sm">{{ $comment->user->name ?? 'Pengguna Dihapus' }}</div>
                                        <div class="comment-meta text-xs text-gray-500">{{ $comment->created_at->format('d/m/Y H:i') }} ({{ $comment->created_at->diffForHumans() }})</div>
                                        <div class="mt-1 leading-relaxed">{{ $comment->text }}</div>
                                        <div class="comment-actions flex gap-4 mt-2">
                                            <form action="{{ route('galeri.comment.like', [$artwork, $comment]) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="comment-like flex items-center gap-1 text-xs text-gray-500 hover:text-gray-800 {{ Auth::check() && $comment->likes->where('user_id', Auth::id())->isNotEmpty() ? 'text-red-500' : '' }}">
                                                    <i class="fas fa-heart mr-1"></i><span>{{ $comment->likes->count() }}</span>
                                                </button>
                                            </form>
                                            <button onclick="document.getElementById('reply-form-{{ $comment->id }}').classList.toggle('hidden')" class="text-xs text-gray-500 hover:text-gray-800">Balas</button>
                                            @if($comment->replies->isNotEmpty())
                                                <button onclick="document.getElementById('replies-{{ $comment->id }}').classList.toggle('hidden')" class="text-xs text-gray-500 hover:text-gray-800">
                                                    {{ $comment->replies->classList.contains('hidden') ? 'Lihat balasan' : 'Sembunyikan balasan' }} ({{ $comment->replies->count() }})
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div id="reply-form-{{ $comment->id }}" class="comment-reply-form hidden mt-3">
                                    <form action="{{ route('galeri.comment', ['artwork' => $artwork->id]) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                        <textarea name="text" maxlength="300" placeholder="Balas komentar..." class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-black" required></textarea>
                                        <div class="text-right mt-1">
                                            <span class="comment-char text-xs text-gray-500 mr-2">0/300</span>
                                            <button type="button" onclick="document.getElementById('reply-form-{{ $comment->id }}').classList.add('hidden')" class="text-xs text-gray-500 hover:text-gray-800 mr-2">Batal</button>
                                            <button type="submit" class="text-xs px-3 py-1 bg-gray-800 text-white rounded-md">Kirim</button>
                                        </div>
                                    </form>
                                </div>
                                @if($comment->replies->isNotEmpty())
                                    <div id="replies-{{ $comment->id }}" class="comment-replies hidden mt-3 space-y-2">
                                        @foreach($comment->replies as $reply)
                                            <div class="comment-card reply border-l-2 border-[var(--tara-accent)] pl-4" data-id="{{ $reply->id }}">
                                                <div class="flex items-start gap-2">
                                                    <img src="{{ $reply->user->avatar ?? 'https://i.pravatar.cc/60' }}" alt="{{ $reply->user->name ?? 'Pengguna Dihapus' }}" class="w-8 h-8 rounded-full object-cover"/>
                                                    <div class="flex-1">
                                                        <div class="comment-user font-semibold text-sm">{{ $reply->user->name ?? 'Pengguna Dihapus' }}</div>
                                                        <div class="comment-meta text-xs text-gray-500">{{ $reply->created_at->format('d/m/Y H:i') }} ({{ $reply->created_at->diffForHumans() }})</div>
                                                        <div class="mt-1 leading-relaxed">{{ $reply->text }}</div>
                                                        <div class="comment-actions flex gap-4 mt-2">
                                                            <form action="{{ route('galeri.comment.like', [$artwork, $reply]) }}" method="POST">
                                                                @csrf
                                                                <button type="submit" class="comment-like flex items-center gap-1 text-xs text-gray-500 hover:text-gray-800 {{ Auth::check() && $reply->likes->where('user_id', Auth::id())->isNotEmpty() ? 'text-red-500' : '' }}">
                                                                    <i class="fas fa-heart mr-1"></i><span>{{ $reply->likes->count() }}</span>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="comment-form mt-4" id="comment-form-desktop">
                      <form action="{{ route('galeri.comment', ['artwork' => $artwork->id]) }}" method="POST">
                        @csrf
                        <textarea name="text" maxlength="300" placeholder="Tambahkan komentar... (Maks 300 karakter)" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-black" required></textarea>
                        <div class="text-right mt-1">
                            <span class="comment-char text-xs text-gray-500 mr-2">0/300</span>
                            <button type="submit" class="mt-2 w-full px-4 py-2 text-white text-sm rounded-md bg-gray-800 hover:bg-gray-700 transition">Kirim</button>
                        </div>
                    </form>
                </div>
            </aside>
        </div>
    </main>
    @push('styles')
        <style>
            :root {
                --tara-accent: #facc15;
                --tara-dark: #111827;
                --tara-muted: #6b7280;
                --tara-bg: #ffffff;
                --tara-border: #e5e7eb;
            }
            * {
                font-family: 'Outfit', sans-serif;
                box-sizing: border-box;
                scroll-behavior: smooth;
            }
            body {
                background: var(--tara-bg);
                color: var(--tara-dark);
                margin: 0;
                padding: 0;
                overflow-x: hidden;
            }
            /* Reading Progress Bar */
            #reading-progress {
                position: fixed;
                top: 0;
                left: 0;
                height: 4px;
                background: var(--tara-accent);
                z-index: 9999;
                transition: width 0.3s ease;
            }
            /* Particles Background */
            #particles-js {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: -1;
                pointer-events: none;
            }
            /* Share Modal */
            #share-modal.open {
                display: flex;
            }
            .share-modal-content {
                transform: scale(0.85);
                opacity: 0;
            }
            #share-modal.open .share-modal-content {
                transform: scale(1);
                opacity: 1;
            }
            /* Carousel */
            .carousel {
                position: relative;
                width: 100%;
                max-width: 100%;
                overflow: hidden;
            }
            .carousel-slides {
                display: flex;
                width: 100%;
                transition: transform 0.5s ease-in-out;
            }
            .carousel-slide {
                flex: 0 0 100%;
                width: 100%;
            }
            .carousel-slide img {
                width: 100%;
                height: auto;
                object-fit: cover;
                max-height: 600px;
            }
            .carousel-prev,
            .carousel-next {
                display: none;
                opacity: 0;
                transition: opacity 0.3s ease;
            }
            .carousel:hover .carousel-prev,
            .carousel:hover .carousel-next {
                display: block;
                opacity: 1;
            }
            .carousel-indicators {
                display: flex;
                justify-content: center;
                padding: 0.5rem;
            }
            .carousel-indicator.active {
                background-color: var(--tara-accent) !important;
            }
            /* Floating Actions */
            .float-actions button {
                transition: all 0.3s ease;
            }
            .badge {
                background: var(--tara-accent);
                color: var(--tara-dark);
                padding: 2px 8px;
                border-radius: 9999px;
                font-size: 0.75rem;
            }
            .badge.hidden {
                display: none;
            }
            /* Comment Section */
            .comment-panel {
                position: sticky;
                top: 1rem;
            }
            .comment-scroll::-webkit-scrollbar {
                width: 6px;
            }
            .comment-scroll::-webkit-scrollbar-thumb {
                background: var(--tara-muted);
                border-radius: 3px;
            }
            .comment-card {
                padding: 1rem;
                border-bottom: 1px solid var(--tara-border);
            }
            .comment-card.reply {
                margin-left: 2rem;
                border-left: 2px solid var(--tara-accent);
                padding-left: 1rem;
            }
            .comment-user {
                font-weight: 600;
                font-size: 0.875rem;
            }
            .comment-meta {
                color: var(--tara-muted);
                font-size: 0.75rem;
            }
            .comment-actions {
                display: flex;
                gap: 1rem;
                margin-top: 0.5rem;
            }
            .comment-actions button {
                color: var(--tara-muted);
                font-size: 0.75rem;
                background: none;
                border: none;
                cursor: pointer;
            }
            .comment-actions button:hover {
                color: var(--tara-dark);
            }
            .comment-like.text-red-500 {
                color: #ef4444;
            }
            .comment-reply-form textarea {
                resize: none;
                height: 80px;
            }
            /* Responsive Adjustments */
            @media (max-width: 1024px) {
                .carousel-slide img {
                    max-height: 400px;
                }
                .float-actions {
                    bottom: 5rem;
                    right: 1rem;
                }
                .comment-panel {
                    position: static;
                    margin-top: 2rem;
                }
            }
            @media (max-width: 640px) {
                main {
                    padding-top: 6rem;
                    padding-bottom: 8rem;
                }
                .carousel-slide img {
                    max-height: 300px;
                }
                .carousel-prev,
                .carousel-next {
                    padding: 0.4rem;
                }
                .carousel-indicators {
                    bottom: 0.5rem;
                }
                .carousel-indicator {
                    width: 1.5rem;
                    height: 0.25rem;
                    border-radius: 0;
                }
                .info-section .flex {
                    flex-direction: column;
                    align-items: flex-start;
                }
                #gallery-body {
                    margin-top: 2rem;
                }
                #gallery-reco-wrapper {
                    margin-top: 3rem;
                }
            }
        </style>
    @endpush
    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.2/anime.min.js"></script>
        <script>
            /* Utility Helpers */
            const qs = s => document.querySelector(s);
            const qsa = s => [...document.querySelectorAll(s)];
            /* Carousel */
            const carousel = qs('#gallery-carousel');
            const slides = carousel.querySelectorAll('.carousel-slide');
            const prevBtn = carousel.querySelector('.carousel-prev');
            const nextBtn = carousel.querySelector('.carousel-next');
            const indicators = carousel.querySelectorAll('.carousel-indicator');
            let currentIndex = 0;
            const totalSlides = slides.length;
            function updateCarousel() {
                const offset = -currentIndex * 100;
                carousel.querySelector('.carousel-slides').style.transform = `translateX(${offset}%)`;
                indicators.forEach((indicator, index) => {
                    indicator.classList.toggle('active', index === currentIndex);
                    indicator.classList.toggle('bg-white', index === currentIndex);
                    indicator.classList.toggle('bg-gray-400', index !== currentIndex);
                });
            }
            prevBtn.addEventListener('click', () => {
                currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
                updateCarousel();
            });
            nextBtn.addEventListener('click', () => {
                currentIndex = (currentIndex + 1) % totalSlides;
                updateCarousel();
            });
            indicators.forEach(indicator => {
                indicator.addEventListener('click', () => {
                    currentIndex = parseInt(indicator.dataset.index);
                    updateCarousel();
                });
            });
            let autoSlide = setInterval(() => {
                currentIndex = (currentIndex + 1) % totalSlides;
                updateCarousel();
            }, 5000);
            carousel.addEventListener('mouseenter', () => clearInterval(autoSlide));
            carousel.addEventListener('mouseleave', () => {
                autoSlide = setInterval(() => {
                    currentIndex = (currentIndex + 1) % totalSlides;
                    updateCarousel();
                }, 5000);
            });
            /* Share Modal */
            const floatShareBtn = qs('#float-share');
            floatShareBtn.addEventListener('click', () => {
                const modal = qs('#share-modal');
                modal.classList.add('open');
                gsap.fromTo(modal.querySelector('.share-modal-content'), {
                    scale: 0.85,
                    opacity: 0
                }, {
                    scale: 1,
                    opacity: 1,
                    duration: 0.3,
                    ease: 'power2.out'
                });
            });
            const shareUrl = encodeURIComponent(window.location.href);
            const shareTitle = encodeURIComponent('{{ $artwork->title }}');
            qs('#share-whatsapp').href = `https://api.whatsapp.com/send?text=${shareTitle}%20${shareUrl}`;
            qs('#share-instagram').href = `https://www.instagram.com/?url=${shareUrl}`;
            qs('#share-x').href = `https://x.com/intent/tweet?url=${shareUrl}&text=${shareTitle}`;
            qs('#share-copy-link').addEventListener('click', () => {
                navigator.clipboard.writeText(window.location.href).then(() => {
                    alert('Link berhasil disalin!');
                    closeShareModal();
                }).catch(() => alert('Gagal menyalin link.'));
            });
            qs('#share-modal').addEventListener('click', e => {
                if (e.target === qs('#share-modal')) closeShareModal();
            });
            qs('#share-modal').addEventListener('keydown', e => {
                if (e.key === 'Escape') closeShareModal();
            });
            function closeShareModal() {
                const modal = qs('#share-modal');
                gsap.to(modal.querySelector('.share-modal-content'), {
                    scale: 0.85,
                    opacity: 0,
                    duration: 0.3,
                    ease: 'power2.in',
                    onComplete: () => modal.classList.remove('open')
                });
            }
            /* Reading Progress Bar */
            const progressBar = qs('#reading-progress');
            function updateProgress() {
                const scrollTop = window.scrollY;
                const docHeight = document.body.scrollHeight - window.innerHeight;
                const p = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0;
                progressBar.style.width = p + '%';
            }
            window.addEventListener('scroll', updateProgress, { passive: true });
            updateProgress();
            /* Particles */
            particlesJS('particles-js', {
                particles: {
                    number: { value: 40, density: { enable: true, value_area: 1000 } },
                    color: { value: '#4b5563' },
                    shape: { type: 'circle' },
                    opacity: { value: 0.25, random: false },
                    size: { value: 2, random: false },
                    line_linked: { enable: false },
                    move: { enable: true, speed: 0.4, direction: 'top', random: false, straight: false, out_mode: 'out' }
                },
                interactivity: {
                    events: { onhover: { enable: true, mode: 'repulse' }, onclick: { enable: false } },
                    modes: { repulse: { distance: 100, duration: 0.4 } }
                },
                retina_detect: true
            });
            /* Animations */
            gsap.registerPlugin(ScrollTrigger);
            gsap.from('#gallery-carousel', { opacity: 0, y: 40, duration: 1, ease: 'power3.out' });
            gsap.from('.info-section', { opacity: 0, y: 20, duration: 0.8, ease: 'power3.out', scrollTrigger: { trigger: '.info-section', start: 'top 80%' } });
            gsap.from('#gallery-body', { opacity: 0, y: 40, duration: 1, ease: 'power3.out', scrollTrigger: { trigger: '#gallery-body', start: 'top 80%' } });
            gsap.from('#gallery-tags', { opacity: 0, y: 20, duration: 0.8, ease: 'power3.out', scrollTrigger: { trigger: '#gallery-tags', start: 'top 80%' } });
            gsap.from('#gallery-prev-next', { opacity: 0, y: 20, duration: 0.8, ease: 'power3.out', scrollTrigger: { trigger: '#gallery-prev-next', start: 'top 80%' } });
            gsap.from('#gallery-reco-wrapper', { opacity: 0, y: 40, duration: 1, ease: 'power3.out', scrollTrigger: { trigger: '#gallery-reco-wrapper', start: 'top 80%' } });
            gsap.from('#comment-panel', { opacity: 0, y: 40, duration: 1, ease: 'power3.out', scrollTrigger: { trigger: '#comment-panel', start: 'top 80%' } });
            /* Character Count for Comment Forms */
            qsa('textarea[maxlength]').forEach(textarea => {
                textarea.addEventListener('input', () => {
                    const charCount = textarea.parentElement.querySelector('.comment-char');
                    const length = textarea.value.length;
                    charCount.textContent = `${length}/300`;
                });
            });
        </script>
    @endpush
</x-layout>