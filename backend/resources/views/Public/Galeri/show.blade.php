<x-layout>
      @push('styles')
    <style>
        body, * {
            font-family: 'Space Grotesk', sans-serif !important;
        }
        h1, h2, h3, h4, h5, h6, p, a, span, button, input, select, option, div, label {
            font-family: 'Space Grotesk', sans-serif !important;
        }
        [class*="fa-"] {
            font-family: 'Font Awesome 6 Free', sans-serif !important;
        }
    </style>
    @endpush


    <div id="reading-progress" class="fixed top-0 left-0 h-1 bg-yellow-400 z-50 transition-all duration-300"></div>
    <div id="particles-js" class="fixed top-0 left-0 w-full h-full -z-10 pointer-events-none"></div>

    <div id="share-modal" role="dialog" aria-modal="true" aria-labelledby="share-modal-title" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="share-modal-content bg-white rounded-lg p-6 w-full max-w-md mx-4 relative transform scale-95 opacity-0 transition-all duration-300">
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

    <main class="container mx-auto px-4 py-8 md:py-16">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2">
                <div class="rounded-xl overflow-hidden shadow-xl">
                    <div class="carousel relative overflow-hidden group">
                        <div class="carousel-slides flex transition-transform duration-500 ease-in-out">
                            <div class="carousel-slide flex-shrink-0 w-full">
                                <img src="{{ $galeri->thumbnail ? asset('storage/' . $galeri->thumbnail) : 'https://picsum.photos/1200/800' }}" alt="{{ $galeri->title }}" class="w-full h-auto object-cover max-h-[600px]" />
                            </div>
                            @foreach($galeri->files as $file)
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
                            @php $fileCount = $galeri->files->count() + 1 @endphp
                            @if($fileCount > 1)
                                @for($i = 0; $i < $fileCount; $i++)
                                    <button class="carousel-indicator w-2 h-2 rounded-full bg-gray-400 hover:bg-gray-600 transition {{ $i === 0 ? 'active bg-white' : '' }}" data-index="{{ $i }}" aria-label="Go to slide {{ $i + 1 }}"></button>
                                @endfor
                            @endif
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div class="flex items-center gap-4">
                        @if ($galeri->creator)
                            <a href="{{ route('profile', $galeri->creator->id) }}" class="flex items-center gap-2">
                                <img src="{{ $galeri->creator->avatar ?? 'https://i.pravatar.cc/60' }}" alt="avatar" class="w-10 h-10 rounded-full object-cover" />
                                <div>
                                    <p class="font-semibold text-gray-900">{{ $galeri->creator->name }}</p>
                                    <p class="text-xs text-gray-500">Diposting {{ \Carbon\Carbon::parse($galeri->created_at)->diffForHumans() }}</p>
                                </div>
                            </a>
                        @else
                            <div class="flex items-center gap-2">
                                <img src="https://placehold.co/60x60/cccccc/333333?text=User" alt="avatar" class="w-10 h-10 rounded-full object-cover" />
                                <div>
                                    <p class="font-semibold text-gray-400">Pengguna Dihapus</p>
                                    <p class="text-xs text-gray-500">Diposting {{ \Carbon\Carbon::parse($galeri->created_at)->diffForHumans() }}</p>
                                </div>
                            </div>
                        @endif
                        <button id="follow-btn" data-followed="0" class="px-3 py-1 text-xs rounded-full bg-yellow-400 text-black font-semibold hover:bg-yellow-300 transition">Follow</button>
                    </div>

                    <div class="flex gap-4">
                        <form id="like-form" action="{{ route('galeri.like', ['galeri' => $galeri->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="flex items-center gap-2 px-4 py-2 bg-white rounded-full shadow-md hover:bg-gray-100 transition-all duration-300">
                                @php
                                    $isLiked = $galeri->likes->isNotEmpty();
                                @endphp
                                <i class="fas fa-heart {{ $isLiked ? 'text-red-500' : 'text-gray-500' }}"></i>
                                <span id="float-like-badge" class="badge bg-yellow-400 text-gray-900 px-2 py-1 text-xs rounded-full {{ $galeri->likes->count() == 0 ? 'hidden' : '' }}">{{ $galeri->likes->count() }}</span>
                            </button>
                        </form>

                        <button id="float-bookmark" data-galeri-id="{{ $galeri->id }}" data-bookmarked="{{ $isBookmarked ? '1' : '0' }}"
                            class="flex items-center gap-2 px-4 py-2 bg-white rounded-full shadow-md hover:bg-gray-100 transition-all duration-300">
                            <i class="fas fa-bookmark {{ $isBookmarked ? 'text-yellow-500' : 'text-gray-500' }}"></i>
                        </button>
                        
                        <button id="float-share" class="flex items-center gap-2 px-4 py-2 bg-white rounded-full shadow-md hover:bg-gray-100 transition-all duration-300">
                            <i class="fas fa-share text-gray-500"></i>
                        </button>
                    </div>
                </div>

                <div class="mt-6 flex flex-wrap gap-2">
                    <span class="px-3 py-1 bg-gray-100 text-gray-700 text-sm rounded-full shadow-md">{{ $galeri->title }}</span>
                    <span class="px-3 py-1 bg-gray-100 text-gray-700 text-sm rounded-full shadow-md">{{ optional($galeri->category)->name ?? 'Seni' }}</span>
                    <span class="px-3 py-1 bg-gray-100 text-gray-700 text-sm rounded-full shadow-md">{{ optional($galeri->community)->name ?? 'Tidak ada' }}</span>
                    @foreach($galeri->tags as $tag)
                        <a href="{{ route('galeri.tag', $tag->tag) }}" class="px-3 py-1 bg-gray-100 text-gray-700 text-sm rounded-full shadow-md hover:bg-gray-200 transition">#{{ $tag->tag }}</a>
                    @endforeach
                    @if($galeri->tags->isEmpty())
                        <a href="#" class="px-3 py-1 bg-gray-100 text-gray-700 text-sm rounded-full shadow-md hover:bg-gray-200 transition">#ilustrasi</a>
                    @endif
                    <span class="px-3 py-1 bg-yellow-400 text-gray-900 text-sm rounded-full shadow-md">{{ $galeri->status }}</span>
                    <span class="px-3 py-1 bg-gray-100 text-gray-700 text-sm rounded-full shadow-md">{{ \Carbon\Carbon::parse($galeri->created_at)->format('d M Y') }}</span>
                </div>

                <article class="mt-8 prose prose-sm sm:prose-base lg:prose-lg prose-img:rounded-xl prose-headings:font-semibold prose-a:text-gray-900">
                    <h1 class="text-2xl md:text-3xl font-bold">{{ $galeri->title }}</h1>
                    @if($galeri->description)
                        <p class="text-gray-700">{{ $galeri->description }}</p>
                    @endif
                </article>

                <nav class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-4" id="gallery-prev-next">
                    @if($previous)
                        <a href="{{ route('galeri.show', ['galeri' => $previous->id]) }}" class="group block p-4 border border-gray-200 rounded-lg hover:border-black transition text-left">
                            <div class="text-xs text-gray-500 mb-1">Karya Sebelumnya</div>
                            <div class="font-semibold group-hover:underline">{{ $previous->title }}</div>
                        </a>
                    @endif
                    @if($next)
                        <a href="{{ route('galeri.show', ['galeri' => $next->id]) }}" class="group block p-4 border border-gray-200 rounded-lg hover:border-black transition text-right {{ !$previous ? 'sm:col-start-2' : '' }}">
                            <div class="text-xs text-gray-500 mb-1">Karya Selanjutnya</div>
                            <div class="font-semibold group-hover:underline">{{ $next->title }}</div>
                        </a>
                    @endif
                </nav>

                <section class="mt-16" id="gallery-reco-wrapper">
                    <h2 class="text-2xl md:text-3xl font-bold mb-8 text-center font-['Space_Grotesk']">Karya Galeri Lainnya<span class="text-yellow-400 ml-1">●</span></h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($recommended as $item)
                            <a href="{{ route('galeri.show', ['galeri' => $item->id]) }}" class="block group bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-md transition">
                                <img src="{{ $item->thumbnail ? asset('storage/' . $item->thumbnail) : 'https://picsum.photos/1200/800' }}" alt="{{ $item->title }}" class="w-full h-48 object-cover group-hover:scale-105 group-hover:brightness-90 transition-transform duration-300" />
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

            <div class="lg:col-span-1" id="comment-panel">
                <aside class="bg-white rounded-lg shadow-md p-6 sticky top-4">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-bold">Komentar</h3>
                        @if ($galeri->comments->count() > 0)
                            <span class="text-xs text-gray-500">{{ $galeri->comments->count() + $galeri->comments->sum(fn($comment) => $comment->replies->count()) }} komentar</span>
                        @else
                            <span class="text-xs text-gray-500">0 komentar</span>
                        @endif
                    </div>
                    
                    <div class="max-h-[500px] overflow-y-auto scrollbar-thin scrollbar-thumb-gray-500 scrollbar-track-transparent">
                        @if ($galeri->comments->isEmpty())
                            <p class="text-sm text-gray-600">Belum ada komentar</p>
                        @else
                            @foreach($galeri->comments as $comment)
                                <div class="border-b border-gray-200 p-4" data-id="{{ $comment->id }}">
                                    <div class="flex items-start gap-2">
                                        <img src="{{ $comment->user->avatar ?? 'https://i.pravatar.cc/60' }}" alt="{{ $comment->user->name ?? 'Pengguna Dihapus' }}" class="w-8 h-8 rounded-full object-cover"/>
                                        <div class="flex-1">
                                            <div class="font-semibold text-sm">{{ $comment->user->name ?? 'Pengguna Dihapus' }}</div>
                                            <div class="text-xs text-gray-500">{{ $comment->created_at->format('d/m/Y H:i') }} ({{ $comment->created_at->diffForHumans() }})</div>
                                            <div class="mt-1 leading-relaxed">{{ $comment->text }}</div>
                                            <div class="flex gap-4 mt-2">
                                                <form action="{{ route('galeri.comment.like', ['galeri' => $galeri->id, 'comment' => $comment->id]) }}" method="POST">
                                                    @csrf
                                                    @php
                                                        $likesCollection = is_numeric($comment->likes) ? collect() : $comment->likes;
                                                        $isCommentLiked = $likesCollection->isNotEmpty(); 
                                                    @endphp
                                                    <button type="submit" class="flex items-center gap-1 text-xs text-gray-500 hover:text-gray-800 {{ $isCommentLiked ? 'text-red-500' : '' }}">
                                                        <i class="fas fa-heart mr-1"></i><span>{{ $comment->likes_count }}</span>
                                                    </button>
                                                </form>
                                                <button type="button" onclick="toggleReplyForm('{{ $comment->id }}')" class="text-xs text-gray-500 hover:text-gray-800">Balas</button>
                                                @if($comment->replies->isNotEmpty())
                                                    <button type="button" onclick="toggleReplies('{{ $comment->id }}')" class="text-xs text-gray-500 hover:text-gray-800">
                                                        <span id="replies-toggle-text-{{ $comment->id }}">Lihat balasan</span> ({{ $comment->replies->count() }})
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div id="reply-form-{{ $comment->id }}" class="hidden mt-3">
                                        <form action="{{ route('galeri.comment', ['galeri' => $galeri->id]) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                            <textarea name="text" maxlength="300" placeholder="Balas komentar..." class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-black resize-none h-20" required></textarea>
                                            <div class="text-right mt-1">
                                                <span class="comment-char text-xs text-gray-500 mr-2">0/300</span>
                                                <button type="button" onclick="toggleReplyForm('{{ $comment->id }}')" class="text-xs text-gray-500 hover:text-gray-800 mr-2">Batal</button>
                                                <button type="submit" class="text-xs px-3 py-1 bg-gray-800 text-white rounded-md">Kirim</button>
                                            </div>
                                        </form>
                                    </div>
                                    @if($comment->replies->isNotEmpty())
                                        <div id="replies-{{ $comment->id }}" class="hidden mt-3 space-y-2">
                                            @foreach($comment->replies as $reply)
                                                <div class="border-l-2 border-yellow-400 pl-4" data-id="{{ $reply->id }}">
                                                    <div class="flex items-start gap-2">
                                                        <img src="{{ $reply->user->avatar ?? 'https://i.pravatar.cc/60' }}" alt="{{ $reply->user->name ?? 'Pengguna Dihapus' }}" class="w-8 h-8 rounded-full object-cover"/>
                                                        <div class="flex-1">
                                                            <div class="font-semibold text-sm">{{ $reply->user->name ?? 'Pengguna Dihapus' }}</div>
                                                            <div class="text-xs text-gray-500">{{ $reply->created_at->format('d/m/Y H:i') }} ({{ $reply->created_at->diffForHumans() }})</div>
                                                            <div class="mt-1 leading-relaxed">{{ $reply->text }}</div>
                                                            <div class="flex gap-4 mt-2">
                                                                <form action="{{ route('galeri.comment.like', ['galeri' => $galeri->id, 'comment' => $reply->id]) }}" method="POST">
                                                                    @csrf
                                                                    @php
                                                                        $replyLikesCollection = is_numeric($reply->likes) ? collect() : $reply->likes;
                                                                        $isReplyLiked = $replyLikesCollection->isNotEmpty(); 
                                                                    @endphp
                                                                    <button type="submit" class="flex items-center gap-1 text-xs text-gray-500 hover:text-gray-800 {{ $isReplyLiked ? 'text-red-500' : '' }}">
                                                                        <i class="fas fa-heart mr-1"></i><span>{{ $reply->likes_count }}</span>
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

                    <div class="mt-4">
                        <form action="{{ route('galeri.comment', ['galeri' => $galeri->id]) }}" method="POST">
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
        </div>
    </main>
    
    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.2/anime.min.js"></script>
        <script>
            const qs = s => document.querySelector(s);
            const qsa = s => [...document.querySelectorAll(s)];
            
            const carousel = qs('.carousel');
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
                    indicator.classList.toggle('bg-white', index === currentIndex);
                    indicator.classList.toggle('bg-gray-400', index !== currentIndex);
                });
                prevBtn.classList.toggle('hidden', totalSlides <= 1);
                nextBtn.classList.toggle('hidden', totalSlides <= 1);
                carousel.querySelector('.carousel-indicators').classList.toggle('hidden', totalSlides <= 1);
            }

            if (totalSlides > 0) {
                updateCarousel(); 
                
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

                if (totalSlides > 1) {
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
                }
            }

            const floatShareBtn = qs('#float-share');
            floatShareBtn.addEventListener('click', () => {
                const modal = qs('#share-modal');
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                gsap.fromTo(modal.querySelector('.share-modal-content'), { scale: 0.85, opacity: 0 }, { scale: 1, opacity: 1, duration: 0.3, ease: 'power2.out' });
            });

            const shareUrl = encodeURIComponent(window.location.href);
            const shareTitle = encodeURIComponent('{{ $galeri->title }}');
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
                gsap.to(modal.querySelector('.share-modal-content'), { scale: 0.85, opacity: 0, duration: 0.3, ease: 'power2.in', onComplete: () => {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                } });
            }

            const bookmarkBtn = qs('#float-bookmark');

            if (bookmarkBtn) {
                bookmarkBtn.addEventListener('click', async () => {
                    const galeriId = bookmarkBtn.dataset.galeriId;
                    const icon = bookmarkBtn.querySelector('i');

                    if (!{{ auth()->check() ? 'true' : 'false' }}) {
                        alert('Anda harus login untuk menyimpan karya.');
                        return;
                    }

                    try {
                        // PERBAIKAN: Menggunakan endpoint yang sesuai dengan route 'bookmarks/toggle'
                        const response = await fetch('{{ route('bookmarks.toggle') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: JSON.stringify({
                                bookmarkable_id: galeriId,
                                bookmarkable_type: 'App\\Models\\Artwork' 
                            })
                        });

                        if (!response.ok) {
                            const errorData = await response.json();
                            alert(errorData.message || 'Gagal memproses bookmark');
                            throw new Error('Gagal memproses bookmark');
                        }

                        const data = await response.json();

                        bookmarkBtn.dataset.bookmarked = data.bookmarked ? '1' : '0';

                        if (data.bookmarked) {
                            icon.classList.add('text-yellow-500');
                            icon.classList.remove('text-gray-500');
                        } else {
                            icon.classList.remove('text-yellow-500');
                            icon.classList.add('text-gray-500');
                        }

                    } catch (error) {
                        console.error('Error:', error);
                    }
                });
            }

            const progressBar = qs('#reading-progress');
            function updateProgress() {
                const scrollTop = window.scrollY;
                const docHeight = document.body.scrollHeight - window.innerHeight;
                const p = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0;
                progressBar.style.width = p + '%';
            }
            window.addEventListener('scroll', updateProgress, { passive: true });
            updateProgress();

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

            function toggleReplyForm(commentId) {
                const replyForm = document.getElementById(`reply-form-${commentId}`);
                replyForm.classList.toggle('hidden');
                if (!replyForm.classList.contains('hidden')) {
                    replyForm.querySelector('textarea').focus();
                }
            }

            function toggleReplies(commentId) {
                const replies = document.getElementById(`replies-${commentId}`);
                const toggleText = document.getElementById(`replies-toggle-text-${commentId}`);
                replies.classList.toggle('hidden');
                if (replies.classList.contains('hidden')) {
                    toggleText.textContent = 'Lihat balasan';
                } else {
                    toggleText.textContent = 'Sembunyikan balasan';
                }
            }
            
            qsa('textarea[maxlength]').forEach(textarea => {
                const updateCharCount = () => {
                    const charCount = textarea.parentElement.querySelector('.comment-char');
                    const length = textarea.value.length;
                    if (charCount) {
                        charCount.textContent = `${length}/${textarea.maxLength}`;
                    }
                };
                textarea.addEventListener('input', updateCharCount);
                updateCharCount();
            });

            gsap.registerPlugin(ScrollTrigger);
            
            gsap.from('.lg\\:col-span-2 > div', { opacity: 0, y: 40, duration: 1, ease: 'power3.out' });
            gsap.from('.lg\\:col-span-2 > .mt-6', { opacity: 0, y: 20, duration: 0.8, ease: 'power3.out', scrollTrigger: { trigger: '.lg\\:col-span-2 > .mt-6', start: 'top 90%' } });
            gsap.from('article', { opacity: 0, y: 40, duration: 1, ease: 'power3.out', scrollTrigger: { trigger: 'article', start: 'top 90%' } });
            gsap.from('#gallery-prev-next', { opacity: 0, y: 20, duration: 0.8, ease: 'power3.out', scrollTrigger: { trigger: '#gallery-prev-next', start: 'top 90%' } });
            gsap.from('#gallery-reco-wrapper', { opacity: 0, y: 40, duration: 1, ease: 'power3.out', scrollTrigger: { trigger: '#gallery-reco-wrapper', start: 'top 90%' } });
            gsap.from('#comment-panel', { opacity: 0, x: 40, duration: 1, ease: 'power3.out', scrollTrigger: { trigger: '#comment-panel', start: 'top 90%' } });
        </script>
    @endpush
</x-layout>