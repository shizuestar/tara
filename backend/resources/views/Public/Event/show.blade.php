<x-layout>
    <div id="particles-js" class="fixed inset-0 z-[-1] opacity-40"></div>

    <!-- Notification Modal -->
    <div id="notification-modal" class="fixed inset-y-0 right-0 w-full max-w-sm bg-white border-l border-gray-200 z-50 transform translate-x-full transition-transform duration-300 ease-in-out">
        <i class="fas fa-times absolute top-4 right-4 text-xl text-gray-600 cursor-pointer hover:scale-110 transition-transform duration-300" onclick="toggleNotifications()"></i>
        <div class="p-6">
            <h2 class="text-2xl font-bold text-black mb-4 font-['Space_Grotesk']">Notifikasi</h2>
            <div class="flex gap-2 mb-4">
                <button class="filter-btn active px-3 py-1 bg-gray-100 text-gray-600 text-sm rounded-full border border-gray-200 hover:bg-gray-200 transition-colors duration-300" data-filter="all">Semua</button>
                <button class="filter-btn px-3 py-1 bg-gray-100 text-gray-600 text-sm rounded-full border border-gray-200 hover:bg-gray-200 transition-colors duration-300" data-filter="unread">Belum Dibaca</button>
            </div>
            <button id="mark-all-read" class="px-4 py-2 bg-black text-white text-sm rounded-full hover:bg-gray-800 transition-colors duration-300 mb-4">Tandai Semua Dibaca</button>
            <div id="notification-list" class="space-y-4"></div>
        </div>
    </div>

    <!-- Pre-Order Modal -->
    <div id="preorderModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-xl w-full max-w-md">
            <button class="close-modal absolute top-4 right-4 text-gray-600 hover:text-gray-800"><i class="fas fa-times"></i></button>
            <h2 class="text-xl font-bold text-gray-900 mb-4">Pre-Order Tiket</h2>
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-4 rounded-md mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('event.preorder', [$event->id, $event->tickets->first()->id]) }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <label for="preorderEmail" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" id="preorderEmail" name="email" placeholder="Masukkan email Tuan" value="{{ Auth::user()->email ?? '' }}" required class="w-full border border-gray-300 rounded-md p-2 text-gray-700 mb-4" />
                <label for="preorderQuantity" class="block text-sm font-medium text-gray-700 mb-1">Jumlah Tiket</label>
                <select id="preorderQuantity" name="quantity" required class="w-full border border-gray-300 rounded-md p-2 text-gray-700 mb-4">
                    <option value="" disabled selected>Pilih jumlah tiket</option>
                    <option value="1">1 Tiket</option>
                    <option value="2">2 Tiket</option>
                    <option value="3">3 Tiket</option>
                    <option value="4">4 Tiket</option>
                    <option value="5">5 Tiket</option>
                </select>
                <div class="flex gap-4">
                    <button type="submit" id="submitPreorderBtn" class="btn-primary px-4 py-2 bg-gray-900 text-white rounded-full text-sm font-medium hover:bg-gray-700 transition-colors duration-300 disabled:bg-gray-500 disabled:cursor-not-allowed" disabled>Pre-Order Sekarang</button>
                    <button type="button" id="cancelPreorderBtn" class="px-4 py-2 border border-gray-200 bg-gray-100 text-gray-600 rounded-full text-sm font-medium hover:bg-gray-200 transition-colors duration-300">Batal</button>
                </div>
            </form>
        </div>
    </div>

    <main class="pt-24 pb-12 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="event-detail-container bg-white p-6 md:p-10 rounded-lg border border-gray-200 shadow-xl opacity-0 translate-y-5">
                @if (session('success'))
                    <div class="bg-green-100 text-green-700 p-4 rounded-md mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="bg-red-100 text-red-700 p-4 rounded-md mb-4">
                        {{ session('error') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="bg-red-100 text-red-700 p-4 rounded-md mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div id="event-detail-content" class="flex flex-col md:flex-row gap-6">
                    <div class="w-full md:w-1/2 flex-shrink-0">
                        <div class="relative overflow-hidden">
                            <button class="gallery-btn absolute top-1/2 -translate-y-1/2 left-0 bg-black bg-opacity-70 text-white p-2 cursor-pointer z-10"><i class="fas fa-chevron-left"></i></button>
                            <div class="gallery-slider flex transition-transform duration-500 ease-in-out" id="gallerySlider">
                                @foreach($event->images ?? [$event->image_path] as $image)
                                    <img src="{{ $image ? asset('storage/' . $image) : 'https://via.placeholder.com/600x800?text=Image+Not+Available' }}" alt="{{ $event->title }}" class="gallery-image w-full flex-shrink-0 hover:scale-105 transition-transform duration-400">
                                @endforeach
                            </div>
                            <button class="gallery-btn absolute top-1/2 -translate-y-1/2 right-0 bg-black bg-opacity-70 text-white p-2 cursor-pointer z-10"><i class="fas fa-chevron-right"></i></button>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2">
                        <span class="event-status inline-block px-3 py-1 rounded-full text-xs font-medium {{ $event->status == 'upcoming' ? 'bg-yellow-100 text-yellow-800' : ($event->status == 'ongoing' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-600') }}">{{ ucfirst($event->status) }}</span>
                        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ $event->title }}</h1>
                        <p class="text-gray-700 mb-2"><i class="far fa-calendar-alt mr-2 text-yellow-400"></i> <strong>Tanggal:</strong> {{ $event->start_date->format('Y-m-d') }}</p>
                        <p class="text-gray-700 mb-2"><i class="far fa-clock mr-2 text-yellow-400"></i> <strong>Waktu:</strong> {{ $event->time_start }} - {{ $event->time_end }} WIB</p>
                        <p class="text-gray-700 mb-4"><i class="fas fa-map-marker-alt mr-2 text-yellow-400"></i> <strong>Lokasi:</strong> {{ $event->location }}</p>
                        <p class="text-gray-800 leading-relaxed mb-6">{{ $event->description }}</p>
                        <a href="{{ $event->registration_link ?? '#' }}" target="_blank" class="inline-flex items-center px-4 py-2 bg-gray-900 text-white rounded-full text-sm font-medium hover:bg-gray-700 transition-colors duration-300">
                            <i class="fas fa-external-link-alt mr-2"></i> Daftar Sekarang!
                        </a>
                    </div>
                </div>
                <div class="mt-8 flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('events.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-900 text-white rounded-full text-sm font-medium hover:bg-gray-700 transition-colors duration-300">
                        <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar Event
                    </a>
                    <button id="shareBtn" class="inline-flex items-center px-4 py-2 border border-gray-200 bg-gray-100 text-gray-600 rounded-full text-sm font-medium hover:bg-gray-200 transition-colors duration-300">
                        <i class="fas fa-share-alt mr-2"></i> Bagikan
                    </button>
                    <button id="bookmarkBtn" class="inline-flex items-center px-4 py-2 border border-gray-200 bg-gray-100 text-gray-600 rounded-full text-sm font-medium hover:bg-gray-200 transition-colors duration-300">
                        <i class="far fa-bookmark mr-2"></i> Bookmark
                    </button>
                </div>
                <div id="social-share" class="mt-4 flex gap-4 justify-center">
                    <a href="https://twitter.com/intent/tweet?text={{ urlencode($event->title . ' - ' . Str::limit($event->description, 100) . ' ' . route('events.show', $event->id)) }}" target="_blank" class="inline-flex items-center px-4 py-2 border border-gray-200 bg-gray-100 text-gray-600 rounded-full text-sm font-medium hover:bg-gray-200 transition-colors duration-300">
                        <i class="fab fa-twitter mr-2"></i> Twitter
                    </a>
                    <a href="https://www.instagram.com/?url={{ urlencode(route('events.show', $event->id)) }}" target="_blank" class="inline-flex items-center px-4 py-2 border border-gray-200 bg-gray-100 text-gray-600 rounded-full text-sm font-medium hover:bg-gray-200 transition-colors duration-300">
                        <i class="fab fa-instagram mr-2"></i> Instagram
                    </a>
                    <a href="https://api.whatsapp.com/send?text={{ urlencode($event->title . ' - ' . Str::limit($event->description, 100) . ' ' . route('events.show', $event->id)) }}" target="_blank" class="inline-flex items-center px-4 py-2 border border-gray-200 bg-gray-100 text-gray-600 rounded-full text-sm font-medium hover:bg-gray-200 transition-colors duration-300">
                        <i class="fab fa-whatsapp mr-2"></i> WhatsApp
                    </a>
                </div>
                <div id="event-additional-info" class="mt-10">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Informasi Tambahan</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div id="event-map" class="rounded-lg overflow-hidden shadow-md border border-gray-200">
                            @if($event->map_url)
                                <iframe src="{{ $event->map_url }}" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            @else
                                <p class="text-gray-700 p-4">Event ini diselenggarakan secara online.</p>
                            @endif
                        </div>
                        <div id="event-organizer-ticket" class="space-y-6">
                            <div id="event-countdown"></div>
                            <div class="border-t border-gray-200 pt-6">
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">Penyelenggara</h3>
                                <p class="text-gray-700 mb-1"><strong>Nama:</strong> {{ $event->organizer->name ?? 'TARA Art Collective' }}</p>
                                <p class="text-gray-700 mb-1"><strong>Email:</strong> <a href="mailto:{{ $event->organizer->email ?? 'events@tara-art.id' }}" class="text-yellow-400 hover:underline">{{ $event->organizer->email ?? 'events@tara-art.id' }}</a></p>
                                <p class="text-gray-700"><strong>Profil:</strong> <a href="{{ $event->organizer->profile_link ?? '/organizer/tara-art' }}" class="text-yellow-400 hover:underline">Lihat Profil</a></p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-md border border-gray-200">
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">Harga Tiket</h3>
                                @foreach($event->tickets as $ticket)
                                    <p class="text-gray-700 mb-2">{{ $ticket->type }}: Rp {{ number_format($ticket->price, 0, ',', '.') }}</p>
                                    <p class="text-gray-700 mb-2"><strong>Ketersediaan:</strong> <span id="ticketAvailability" class="inline-block px-3 py-1 rounded-full text-xs font-medium {{ $ticket->isAvailable() ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-600' }}">{{ $ticket->isAvailable() ? 'Tersedia' : 'Habis' }}</span></p>
                                    @php
                                        $registration = Auth::check() ? \App\Models\EventRegistration::where('event_id', $event->id)
                                            ->where('user_id', Auth::id())
                                            ->where('ticket_id', $ticket->id)
                                            ->first() : null;
                                    @endphp
                                    @if($registration && $registration->status == 'canceled')
                                        <form action="{{ route('event.preorder', [$event->id, $ticket->id]) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                            <input type="hidden" name="email" value="{{ Auth::user()->email ?? '' }}">
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-900 text-white rounded-full text-sm font-medium hover:bg-gray-700 transition-colors duration-300 mt-2"><i class="fas fa-ticket-alt mr-2"></i> Pesan Ulang Tiket</button>
                                        </form>
                                    @elseif($registration && $registration->status == 'booked')
                                        <a href="{{ route('event.payment', $registration->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-900 text-white rounded-full text-sm font-medium hover:bg-gray-700 transition-colors duration-300 mt-2"><i class="fas fa-ticket-alt mr-2"></i> Lanjutkan Pembayaran</a>
                                    @elseif($ticket->isAvailable())
                                        <form action="{{ route('event.preorder', [$event->id, $ticket->id]) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                            <input type="hidden" name="email" value="{{ Auth::user()->email ?? '' }}">
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-900 text-white rounded-full text-sm font-medium hover:bg-gray-700 transition-colors duration-300 mt-2"><i class="fas fa-ticket-alt mr-2"></i> Beli Tiket</button>
                                        </form>
                                    @endif
                                    <button id="preorderTicketBtn" class="inline-flex items-center px-4 py-2 mb-3 bg-yellow-400 text-gray-900 rounded-full text-sm font-semibold hover:bg-yellow-500 transition-transform duration-300 hover:scale-105 mt-2" data-event-id="{{ $event->id }}" data-ticket-id="{{ $ticket->id }}"><i class="fas fa-ticket-alt mr-2"></i> Pre-Order Tiket</button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div id="event-tags" class="mt-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Tag</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($event->tags ?? ['#Art', '#Exhibition'] as $tag)
                                <a href="{{ route('events.index') }}?tag={{ urlencode($tag) }}" class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-xs font-medium border border-gray-200 hover:bg-gray-200 transition-colors duration-300">{{ $tag }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div id="comment-section" class="mt-10 border-t border-gray-200 pt-6">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Komentar</h2>
                    <div class="comment-form">
                        <form action="{{ route('event.comment', $event->id) }}" method="POST">
                            @csrf
                            <textarea id="commentInput" name="comment" rows="4" placeholder="Tulis komentar Tuan..." class="w-full border border-gray-200 rounded-md p-2 text-gray-700 resize-y font-['Space_Grotesk']"></textarea>
                            <button id="submitComment" type="submit" class="mt-2 px-5 py-2 bg-gray-100 text-gray-700 font-semibold text-sm rounded-full hover:bg-gray-200 hover:text-gray-900 transition-all duration-300"> <i class="fas fa-comment mr-2"></i> Kirim Komentar </button>
                        </form>
                    </div>
                    <div id="comments-list" class="mt-6 space-y-4">
                        @foreach($event->comments->whereNull('parent_id') as $comment)
                            <div class="comment border-b border-gray-200 pb-4">
                                <p class="text-gray-900 font-semibold">{{ $comment->user->name }}</p>
                                <p class="text-gray-700">{{ $comment->comment }}</p>
                                <p class="text-sm text-gray-600">{{ $comment->created_at->format('d/m/Y, H:i') }}</p>
                                <button class="text-sm text-yellow-400 hover:underline mt-2 reply-btn" data-comment-id="{{ $comment->id }}">Balas</button>
                                <div class="reply-form hidden mt-4" data-comment-id="{{ $comment->id }}">
                                    <form action="{{ route('event.comment', $event->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                        <textarea name="comment" rows="3" placeholder="Tulis balasan Tuan..." class="w-full border border-gray-200 rounded-md p-2 text-gray-700"></textarea>
                                        <button type="submit" class="mt-2 px-3 py-2 bg-black text-white rounded-md text-sm font-medium hover:bg-gray-800 transition-colors duration-300"> <i class="fas fa-comment mr-2"></i> Kirim Balasan </button>
                                    </form>
                                </div>
                                @foreach($comment->replies as $reply)
                                    <div class="ml-8 mt-4 border-l-2 border-yellow-400 pl-4">
                                        <p class="text-gray-900 font-semibold">{{ $reply->user->name }}</p>
                                        <p class="text-gray-700">{{ $reply->comment }}</p>
                                        <p class="text-sm text-gray-600">{{ $reply->created_at->format('d/m/Y, H:i') }}</p>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
                <div id="related-events" class="mt-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Event Terkait</h2>
                    <div id="related-events-list" class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach($relatedEvents as $relatedEvent)
                            <a href="{{ route('events.show', $relatedEvent->id) }}" class="bg-white border border-gray-200 rounded-lg p-4 hover:shadow-lg hover:-translate-y-1 transition-transform duration-400">
                                <img src="{{ $relatedEvent->image_path ? asset('storage/' . $relatedEvent->image_path) : 'https://via.placeholder.com/600x400?text=Image+Not+Available' }}" alt="{{ $relatedEvent->title }}" class="w-full h-40 object-cover rounded-lg mb-4">
                                <h3 class="text-lg font-semibold text-gray-900">{{ $relatedEvent->title }}</h3>
                                <p class="text-sm text-gray-600">{{ $relatedEvent->start_date->format('Y-m-d') }} | {{ $relatedEvent->time_start }} - {{ $relatedEvent->time_end }} WIB</p>
                                <p class="text-sm text-gray-600">{{ $relatedEvent->location }}</p>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>

    @push('scripts')
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.2/anime.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
        <script>
            // Particles.js Initialization
            window.addEventListener("load", () => {
                particlesJS("particles-js", {
                    particles: {
                        number: { value: 50, density: { enable: true, value_area: 1000 } },
                        color: { value: "#4B5563" },
                        shape: { type: "circle" },
                        opacity: { value: 0.4, random: true },
                        size: { value: 2, random: true },
                        line_linked: { enable: false },
                        move: { enable: true, speed: 0.5, direction: "top", random: false, straight: false, out_mode: "out" }
                    },
                    interactivity: {
                        events: { onhover: { enable: true, mode: "repulse" }, onclick: { enable: false } },
                        modes: { repulse: { distance: 100, duration: 0.4 } }
                    },
                    retina_detect: true
                });
            });

            // Notification Modal
            function toggleNotifications() {
                const modal = document.getElementById('notification-modal');
                const isOpen = modal.classList.contains('open');
                modal.classList.toggle('open');
                gsap.to(modal, {
                    x: isOpen ? '100%' : '0%',
                    duration: 0.3,
                    ease: "power2.out"
                });
                if (!isOpen) {
                    renderNotifications();
                }
            }

            // Render Notifications
            function renderNotifications() {
                const notificationList = document.getElementById('notification-list');
                const notifications = JSON.parse(localStorage.getItem('notifications') || '[]');
                notificationList.innerHTML = notifications.length ? notifications.map(n => `
                    <div class="notification-card bg-white border border-gray-200 rounded-lg p-4 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 ${n.unread ? 'bg-gray-100' : ''}">
                        <p class="text-sm text-gray-600">${n.message}</p>
                        <p class="text-xs text-gray-500">${n.timestamp}</p>
                    </div>
                `).join('') : '<p class="text-gray-600 text-center">Tidak ada notifikasi.</p>';
            }

            // Mark All Notifications as Read
            document.getElementById('mark-all-read').addEventListener('click', () => {
                const notifications = JSON.parse(localStorage.getItem('notifications') || '[]');
                notifications.forEach(n => n.unread = false);
                localStorage.setItem('notifications', JSON.stringify(notifications));
                renderNotifications();
            });

            // Notification Filter
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
                    btn.classList.add('active');
                    const filter = btn.dataset.filter;
                    const notificationList = document.getElementById('notification-list');
                    const notifications = JSON.parse(localStorage.getItem('notifications') || '[]');
                    notificationList.innerHTML = filter === 'all' ? notifications.map(n => `
                        <div class="notification-card bg-white border border-gray-200 rounded-lg p-4 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 ${n.unread ? 'bg-gray-100' : ''}">
                            <p class="text-sm text-gray-600">${n.message}</p>
                            <p class="text-xs text-gray-500">${n.timestamp}</p>
                        </div>
                    `).join('') : notifications.filter(n => n.unread).map(n => `
                        <div class="notification-card bg-gray-100 border border-gray-200 rounded-lg p-4 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                            <p class="text-sm text-gray-600">${n.message}</p>
                            <p class="text-xs text-gray-500">${n.timestamp}</p>
                        </div>
                    `).join('') || '<p class="text-gray-600 text-center">Tidak ada notifikasi belum dibaca.</p>';
                });
            });

            // Gallery Slider
            const slider = document.getElementById('gallerySlider');
            if (slider) {
                let currentSlide = 0;
                const slides = slider.querySelectorAll('.gallery-image');
                const totalSlides = slides.length;
                const leftBtn = document.querySelector('.gallery-btn:first-child');
                const rightBtn = document.querySelector('.gallery-btn:last-child');

                if (leftBtn) {
                    leftBtn.addEventListener('click', () => {
                        if (currentSlide > 0) {
                            currentSlide--;
                            slider.style.transform = `translateX(-${currentSlide * 100}%)`;
                        }
                    });
                }
                if (rightBtn) {
                    rightBtn.addEventListener('click', () => {
                        if (currentSlide < totalSlides - 1) {
                            currentSlide++;
                            slider.style.transform = `translateX(-${currentSlide * 100}%)`;
                        }
                    });
                }
                setInterval(() => {
                    currentSlide = (currentSlide + 1) % totalSlides;
                    slider.style.transform = `translateX(-${currentSlide * 100}%)`;
                }, 5000);
            }

            // Countdown Timer
            function startCountdown(eventDate, elementId) {
                const eventDateObj = new Date(eventDate);
                const today = new Date();
                if (eventDateObj <= today) {
                    document.getElementById(elementId).innerHTML = '<p class="text-gray-700">Event telah dimulai!</p>';
                    return;
                }

                const countdown = setInterval(() => {
                    const now = new Date();
                    const distance = eventDateObj - now;
                    if (distance < 0) {
                        clearInterval(countdown);
                        document.getElementById(elementId).innerHTML = '<p class="text-gray-700">Event telah dimulai!</p>';
                        return;
                    }
                    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((distance % (1000 * 60)) / 1000);
                    document.getElementById(elementId).innerHTML = `
                        <div class="countdown-timer font-['Space_Grotesk'] text-lg text-gray-900">
                            <span>${days} Hari </span>
                            <span>${hours} Jam </span>
                            <span>${minutes} Menit </span>
                            <span>${seconds} Detik</span>
                        </div>
                    `;
                }, 1000);
            }

            // Start Countdown
            startCountdown('{{ $event->start_date->toDateTimeString() }}', 'event-countdown');

            // Share Event
            document.getElementById('shareBtn').addEventListener('click', () => {
                const shareUrl = '{{ route('events.show', $event->id) }}';
                if (navigator.share) {
                    navigator.share({
                        title: '{{ $event->title }}',
                        text: '{{ Str::limit($event->description, 100) }}',
                        url: shareUrl
                    });
                } else {
                    navigator.clipboard.writeText(shareUrl);
                    anime({
                        targets: '#shareBtn',
                        scale: [1, 1.1, 1],
                        backgroundColor: ['#F3F4F6', '#111827', '#F3F4F6'],
                        color: ['#374151', '#FFFFFF', '#374151'],
                        duration: 300,
                        easing: 'easeOutQuad'
                    });
                    alert('Link event telah disalin ke clipboard!');
                }
            });

            // Bookmark Event
            document.getElementById('bookmarkBtn').addEventListener('click', () => {
                const eventId = '{{ $event->id }}';
                const isBookmarked = localStorage.getItem(`bookmark_${eventId}`) === 'true';
                localStorage.setItem(`bookmark_${eventId}`, !isBookmarked);
                const bookmarkBtn = document.getElementById('bookmarkBtn');
                bookmarkBtn.innerHTML = `
                    <i class="${!isBookmarked ? 'fas' : 'far'} fa-bookmark mr-2"></i> ${!isBookmarked ? 'Bookmarked' : 'Bookmark'}
                `;
                anime({
                    targets: '#bookmarkBtn',
                    scale: [1, 1.1, 1],
                    backgroundColor: ['#F3F4F6', '#111827', '#F3F4F6'],
                    color: ['#374151', '#FFFFFF', '#374151'],
                    duration: 300,
                    easing: 'easeOutQuad'
                });
            });

            // Pre-Order Modal Logic
            function openPreorderModal(eventId, ticketId) {
                const modal = document.getElementById('preorderModal');
                const preorderEmailInput = document.getElementById('preorderEmail');
                const preorderQuantitySelect = document.getElementById('preorderQuantity');
                const submitPreorderBtn = document.getElementById('submitPreorderBtn');

                function validatePreorderForm() {
                    const email = preorderEmailInput.value;
                    const quantity = preorderQuantitySelect.value;
                    const isValid = email && email.match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/) && quantity;
                    submitPreorderBtn.disabled = !isValid;
                }

                preorderEmailInput.addEventListener('input', validatePreorderForm);
                preorderQuantitySelect.addEventListener('change', validatePreorderForm);

                preorderEmailInput.value = '{{ Auth::user()->email ?? '' }}';
                preorderQuantitySelect.value = '';
                submitPreorderBtn.disabled = true;
                modal.style.display = 'flex';
                anime({
                    targets: '#preorderModal .bg-white',
                    scale: [0.8, 1],
                    opacity: [0, 1],
                    duration: 300,
                    easing: 'easeOutQuad'
                });

                document.querySelector('#preorderModal .close-modal').addEventListener('click', closePreorderModal);
                document.getElementById('cancelPreorderBtn').addEventListener('click', closePreorderModal);
            }

            function closePreorderModal() {
                const modal = document.getElementById('preorderModal');
                anime({
                    targets: '#preorderModal .bg-white',
                    scale: [1, 0.8],
                    opacity: [1, 0],
                    duration: 300,
                    easing: 'easeOutQuad',
                    complete: () => { modal.style.display = 'none'; }
                });
            }

            // Initialize Event Listeners
            document.addEventListener('DOMContentLoaded', () => {
                document.querySelectorAll('#preorderTicketBtn').forEach(btn => {
                    btn.addEventListener('click', () => {
                        const eventId = btn.dataset.eventId;
                        const ticketId = btn.dataset.ticketId;
                        openPreorderModal(eventId, ticketId);
                    });
                });

                document.querySelectorAll('.reply-btn').forEach(btn => {
                    btn.addEventListener('click', () => {
                        const commentId = btn.dataset.commentId;
                        document.querySelector(`.reply-form[data-comment-id="${commentId}"]`).classList.toggle('hidden');
                    });
                });

                // GSAP Animations
                gsap.fromTo('.event-detail-container', { opacity: 0, y: 20 }, { opacity: 1, y: 0, duration: 1, ease: 'power3.out', delay: 0.2 });
                gsap.from('.gallery-image', { opacity: 0, scale: 0.9, duration: 0.8, stagger: 0.1, ease: 'power3.out' });
                gsap.from('.event-detail-container h1, .event-detail-container p, .event-detail-container a, .event-detail-container button, .event-status', {
                    opacity: 0,
                    y: 20,
                    duration: 0.8,
                    stagger: 0.1,
                    ease: 'power3.out',
                    delay: 0.4
                });
                gsap.from('#event-additional-info > div > div, #event-tags', {
                    opacity: 0,
                    y: 20,
                    duration: 0.8,
                    stagger: 0.1,
                    ease: 'power3.out',
                    scrollTrigger: { trigger: '#event-additional-info', start: 'top 80%' }
                });
                gsap.from('#comment-section, #comment-section > div', {
                    opacity: 0,
                    y: 20,
                    duration: 0.8,
                    stagger: 0.1,
                    ease: 'power3.out',
                    scrollTrigger: { trigger: '#comment-section', start: 'top 80%' }
                });
                gsap.from('#preorderTicketBtn', { opacity: 0, y: 20, duration: 0.8, ease: 'power3.out', delay: 0.6 });
                gsap.to('#preorderTicketBtn', { scale: [1, 1.1, 1], duration: 1.5, repeat: -1, ease: 'power1.inOut', delay: 1 });
                gsap.from('.event-card', {
                    opacity: 0,
                    y: 20,
                    duration: 0.8,
                    stagger: 0.1,
                    ease: 'power3.out',
                    scrollTrigger: { trigger: '#related-events', start: 'top 80%' }
                });
            });
        </script>
    @endpush
</x-layout>