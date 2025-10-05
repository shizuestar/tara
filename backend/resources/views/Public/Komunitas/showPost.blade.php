<x-layout>
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
    {{-- Partikel dan Latar Belakang --}}
    <div id="particles-js" class="fixed inset-0 z-[-1] opacity-40"></div>

    <section class="pt-16 pb-12 mt-8 bg-[#f7f7f7] min-h-screen">
        {{-- CONTAINER UTAMA: Mengubah lebar kontainer agar konten tengah lebih dominan jika diperlukan, atau tetap full-width --}}
        <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row gap-6"> 
            
            {{-- ASIDE KIRI (Navigasi Umum & Komunitas Saya) - BARU --}}
            {{-- Lebar Ditetapkan: md:w-64 (256px) --}}
            <aside class="w-full md:w-64 bg-white border border-gray-200 rounded-xl p-6 sticky top-4 h-[calc(100vh-2rem)] overflow-y-auto shadow-sm no-scrollbar sidebar left-sidebar space-y-6 flex-shrink-0">

                <h3 class="text-lg font-semibold text-gray-900 mb-4 font-space-grotesk">Navigasi Umum</h3>
                <div class="space-y-2 mb-6">
                    <a href="{{ route('komunitas.index') }}" class="block bg-white border border-gray-200 rounded-lg p-3 text-sm text-gray-700 hover:bg-gray-100 transition duration-300">
                        <i class="fas fa-list-alt mr-2 text-gray-600"></i> Semua Komunitas
                    </a>
                    <a href="{{ route('komunitas.create') }}" class="block bg-white border border-gray-200 rounded-lg p-3 text-sm text-gray-700 hover:bg-gray-100 transition duration-300">
                        <i class="fas fa-plus mr-2 text-gray-600"></i> Buat Komunitas
                    </a>
                    <span class="block bg-white border border-gray-200 rounded-lg p-3 text-sm text-gray-700 hover:bg-gray-100 transition duration-300 cursor-pointer" onclick="toggleNotifications()">
                        <i class="fas fa-bell mr-2 text-gray-600"></i> Notifikasi <span id="unread-count" class="ml-1 text-xs bg-gray-400 text-gray-900 rounded-full px-2 py-1">0</span>
                    </span>
                </div>

                <hr class="my-4 border-gray-200" />

                <h3 class="text-lg font-semibold text-gray-900 mb-4 font-space-grotesk">Komunitas Saya</h3>
                <div id="joined-communities" class="space-y-2 mb-6">
                    @auth
                        @forelse (auth()->user()->members->take(5) as $joinedCommunity)
                            <a href="{{ route('komunitas.show', $joinedCommunity->id) }}" class="block bg-white border border-gray-200 rounded-lg p-3 text-sm text-gray-700 hover:bg-gray-100 transition duration-300">
                                <div class="flex items-center gap-2">
                                    <img
                                        src="{{ $joinedCommunity->cover_image
                                                    ? Storage::url($joinedCommunity->cover_image)
                                                    : 'https://i.pravatar.cc/32?img=' . ($loop->index + 1) }}"
                                        alt="{{ $joinedCommunity->name }}"
                                        class="w-6 h-6 rounded-md border border-gray-300 object-cover"
                                    />
                                    <span class="truncate">r/{{ $joinedCommunity->name }} ({{ $joinedCommunity->pivot->role ?? 'Anggota' }})</span>
                                </div>
                            </a>
                        @empty
                            <p class="text-sm text-gray-500">Belum bergabung dengan komunitas.</p>
                        @endforelse

                        @if (auth()->user()->members->count() > 0)
                            <a href="{{ route('komunitas.saya') }}" class="mt-4 block w-full text-center px-4 py-2 rounded-lg text-sm font-medium text-gray-700 bg-gray-200 hover:bg-gray-300 transition duration-300 border border-gray-300">
                                <i class="fas fa-plus mr-1"></i> Semua Komunitas Saya ({{ auth()->user()->members->count() }})
                            </a>
                        @endif

                    @else
                        <p class="text-sm text-gray-500">Login untuk melihat komunitas Anda.</p>
                    @endauth
                </div>

                <hr class="my-4 border-gray-200" />

                <h3 class="text-lg font-semibold text-gray-900 mb-4 font-space-grotesk">Aktivitas Terbaru</h3>
                <div id="recent-activities" class="space-y-2">
                    @php
                        // Placeholder data
                        $recentActivitiesSidebar = [
                            ['id' => 1, 'text' => 'Diskusi baru di r/KomunitasTech', 'time' => '2 jam yang lalu', 'communityId' => 1],
                            ['id' => 2, 'text' => 'Anggota baru bergabung di r/KomunitasGamers', 'time' => '4 jam yang lalu', 'communityId' => 2],
                        ];
                    @endphp
                    @forelse ($recentActivitiesSidebar as $activity)
                        <div class="recent-activity bg-white border border-gray-200 rounded-lg p-3 hover:bg-gray-100 transition duration-300 cursor-pointer">
                            <p class="text-sm text-gray-700">{{ $activity['text'] }}</p>
                            <p class="text-xs text-gray-500">{{ $activity['time'] }}</p>
                        </div>
                    @empty
                        <p class="text-sm text-gray-500">Tidak ada aktivitas terbaru.</p>
                    @endforelse
                </div>
            </aside>

            {{-- KONTEN UTAMA: POSTINGAN DETAIL DAN KOMENTAR --}}
            {{-- Lebar dihitung otomatis untuk mengisi ruang tengah yang tersisa --}}
            <div class="flex-1 max-w-full space-y-6 flex-shrink-0 min-w-0">

                {{-- Breadcrumb/Header Sederhana --}}
                <div class="bg-white border border-gray-200 rounded-xl p-4 shadow-sm text-sm">
                    <p class="text-gray-600">
                        <a href="{{ route('komunitas.index') }}" class="hover:text-gray-900">Komunitas</a> / 
                        <a href="{{ route('komunitas.show', $community) }}" class="hover:text-gray-900">r/{{ $community->name }}</a> / 
                        <span class="font-semibold text-gray-900 truncate inline-block max-w-full">{{ $post->title }}</span>
                    </p>
                </div>
                
                {{-- Postingan Utama ($post) --}}
                <div class="post-detail bg-white border border-gray-200 rounded-xl p-6 shadow-xl">
                    <h1 class="text-3xl font-extrabold text-gray-900 mb-3">{{ $post->title }}</h1>
                    
                    <div class="flex items-center gap-4 text-sm text-gray-500 mb-4 border-b pb-4">
                        <div class="flex items-center gap-2">
                            <img src="{{ $post->user->avatar_url ?? 'https://i.pravatar.cc/32?img=10' }}" alt="Avatar" class="w-6 h-6 rounded-full object-cover border border-gray-200" />
                            <span class="font-medium text-gray-700 hover:text-gray-900 cursor-pointer">{{ $post->user->name ?? 'Anonim' }}</span>
                        </div>
                        <span><i class="fas fa-clock mr-1"></i> {{ $post->created_at->diffForHumans() }}</span>
                        <span><i class="fas fa-eye mr-1"></i> {{ $post->views ?? 0 }} Dilihat</span>

                        @if (Auth::id() === $post->user_id || $isAdmin || $isModerator)
                            <div class="ml-auto flex items-center gap-2">
                                <a href="{{ route('posts.edit', [$community, $post]) }}" class="p-1 rounded hover:bg-gray-100 text-gray-500 hover:text-gray-700 transition" title="Edit Postingan">
                                    <i class="fas fa-pen text-xs"></i>
                                </a>
                                {{-- Asumsi ada form DELETE untuk menghapus postingan --}}
                                <form action="{{ route('posts.destroy', [$community, $post]) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus postingan ini?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-1 rounded hover:bg-gray-100 text-gray-500 hover:text-red-500 transition" title="Hapus Postingan">
                                        <i class="fas fa-trash-alt text-xs"></i>
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>

                    <div class="content text-gray-800 leading-relaxed prose max-w-none">
                        {!! nl2br(e($post->content)) !!}
                    </div>
                </div>

                {{-- Bagian Komentar ($comments) --}}
                <div class="comments-section bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                    <h2 class="text-xl font-bold text-gray-900 mb-6 border-b pb-3">{{ $comments->total() }} Komentar</h2>


                    {{-- Daftar Komentar (Sesuai permintaan: Hanya menyisakan struktur, tetapi tidak menampilkan daftar/paginasi) --}}
                    <div class="space-y-6 mt-6">
                        @forelse ($comments as $comment)
                            <div class="comment-item p-4 bg-gray-50 border border-gray-200 rounded-lg shadow-sm">
                                <div class="flex items-start gap-3 mb-2">
                                    <img src="{{ $comment->user->avatar_url ?? 'https://i.pravatar.cc/32?img=' . ($loop->index + 15) }}" alt="{{ $comment->user->name ?? 'Anonim' }}" class="w-8 h-8 rounded-full object-cover border border-gray-200">
                                    <div class="flex-1">
                                        <p class="text-sm font-semibold text-gray-900">{{ $comment->user->name ?? 'Anonim' }}</p>
                                        <p class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                                    </div>
                                    @if (Auth::id() === $comment->user_id || $isAdmin || $isModerator)
                                    @endif
                                </div>
                                <p class="text-gray-700 text-sm mt-1">{{ $comment->content }}</p>
                            </div>
                        @empty
                            <p class="text-gray-500 italic text-center p-4">Belum ada komentar. Jadilah yang pertama berkomentar! 💬</p>
                        @endforelse
                        <div class="mt-4">{{ $comments->links() }}</div>
                    </div>
                </div>

            </div>

            {{-- ASIDE KANAN (Ringkasan Komunitas & Peraturan) - BARU --}}
            {{-- Lebar Ditetapkan: md:w-64 (256px) --}}
            <aside class="w-full md:w-64 bg-white border border-gray-200 rounded-xl p-6 shadow-sm no-scrollbar sidebar right-sidebar space-y-6 flex-shrink-0 sticky top-4 h-fit">

                <h3 class="text-xl font-bold text-gray-800 mb-4 font-space-grotesk border-b pb-4">
                    Ringkasan r/{{ $community->name }}
                </h3>

                <p class="text-gray-600 mt-2 text-sm">{{ $community->description ?? 'Deskripsi komunitas belum tersedia.' }}</p>

                <div class="grid grid-cols-2 gap-4 border-b pb-4">
                    <div>
                        <p class="text-lg font-bold text-gray-900">{{ $community->member_count }}</p>
                        <p class="text-xs text-gray-500">Anggota</p>
                    </div>
                    <div>
                        <p class="text-lg font-bold text-gray-900">{{ $community->online_count ?? 'N/A' }}</p>
                        <p class="text-xs text-gray-500">Online</p>
                    </div>
                </div>

                <div class="text-sm text-gray-500 border-b pb-4">
                    <i class="fas fa-calendar-alt mr-1"></i> Dibuat: {{ $community->created_at->format('M j, Y') }}
                </div>
                <hr class="my-4 border-gray-200" />

                <h3 class="text-lg font-semibold text-gray-800 mb-4 font-space-grotesk border-b pb-2">
                    <i class="fas fa-gavel mr-2 text-gray-500"></i> Peraturan Komunitas
                </h3>
                <div class="space-y-3 text-sm bg-white p-3 rounded-lg border border-gray-200">
                    @if ($community->rules)
                        @php
                            $rules = is_array($community->rules) ? $community->rules : explode("\n", $community->rules);
                        @endphp
                        <ol class="list-decimal pl-5 space-y-2 text-gray-700">
                            @foreach ($rules as $rule)
                                @if (trim($rule))
                                    <li>{{ trim($rule) }}</li>
                                @endif
                            @endforeach
                        </ol>
                    @else
                        <p class="text-sm text-gray-500">Komunitas ini belum memiliki peraturan yang ditetapkan.</p>
                    @endif
                </div>
            </aside>
        </div>
    </section>

    @push('styles')
        <style>
            /* --- Gaya Umum Monokrom --- */
            body { background-color: #f7f7f7; }
            .no-scrollbar::-webkit-scrollbar { display: none; }
            .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
            
            /* Sidebar Kiri: Sticky dan tinggi penuh */
            .left-sidebar { 
                position: sticky; 
                top: 1rem; 
                height: calc(100vh - 2rem);
            }
            /* Sidebar Kanan: Sticky dan tinggi menyesuaikan konten */
            .right-sidebar {
                position: sticky;
                top: 1rem; 
                height: fit-content; 
                max-height: calc(100vh - 2rem);
                overflow-y: auto;
            }

            .sidebar {
                background-color: #ffffff;
                border: 1px solid #e5e7eb;
                border-radius: 0.75rem;
                padding: 1.5rem;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
                transition: all 0.3s ease;
            }
            .sidebar h3 { font-family: 'Space Grotesk', sans-serif; }
            
            /* --- Gaya Glare Button (Monokrom Glare) --- */
            .glare-button {
                position: relative;
                z-index: 1;
                overflow: hidden; 
            }
            .glare-button::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 50%;
                height: 100%;
                background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.6), transparent);
                transition: all 0.5s ease;
                transform: skewX(-20deg);
                z-index: 0;
            }
            .glare-button:hover::before {
                left: 100%;
            }
            .glare-button > * {
                position: relative;
                z-index: 2; /* Pastikan konten teks di atas glare */
            }

            /* --- Penyesuaian Warna Monokrom (Untuk Konsistensi) --- */
            .text-gray-900 { color: #374151; }
            .text-gray-800 { color: #4b5563; }
            .text-gray-700 { color: #6b7280; }
            .text-gray-600 { color: #9ca3af; }
            .text-gray-500 { color: #a0a0a0; }
            
            .bg-gray-50 { background-color: #f9fafb; }
            .bg-gray-100 { background-color: #f3f4f6; }
            .bg-gray-200 { background-color: #e5e7eb; }
            .bg-gray-300 { background-color: #d1d5db; }
            .border-gray-200 { border-color: #e5e7eb; }
            .border-gray-300 { border-color: #d1d5db; }
            .bg-gray-900 { background-color: #374151; color: #f9fafb; }
        </style>
    @endpush

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
        <script>
            // Fungsi placeholder untuk notifikasi
            function toggleNotifications() {
                alert('Fungsi Notifikasi dipanggil!');
                // Tambahkan logika notifikasi di sini
            }

            window.addEventListener("load", () => {
                particlesJS("particles-js", {
                    particles: {
                        number: { value: 50, density: { enable: true, value_area: 1000 } },
                        color: { value: "#4b5563" },
                        shape: { type: "circle" },
                        opacity: { value: 0.4, random: true },
                        size: { value: 2, random: true },
                        line_linked: { enable: false },
                        move: { enable: true, speed: 0.5, direction: "top", out_mode: "out" },
                    },
                    interactivity: { events: { onhover: { enable: true, mode: "repulse" } }, modes: { repulse: { distance: 100, duration: 0.4 } } },
                    retina_detect: true,
                });

                gsap.from(".post-detail", { opacity: 0, y: 20, duration: 1, ease: "power4.out" });
                gsap.from(".comments-section", { opacity: 0, y: 30, duration: 1, ease: "power4.out", delay: 0.5 });
            });
        </script>
    @endpush
</x-layout>