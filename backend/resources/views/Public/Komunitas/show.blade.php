<x-layout>
    <style>
        body, * {
            font-family: 'Space Grotesk', sans-serif !important;
        }
        h1, h2, h3, h4, h5, h6, p, a, span, button, input, select, option, div, label {
            font-family: 'Space Grotesk', sans-serif !important;
        }
        .fas {
            font-family: 'Font Awesome 6 Free', sans-serif !important;
            font-weight: 900;
        }
        /* CSS Tambahan untuk JS */
        .hidden { display: none !important; }
    </style>
    
    <section class="pt-16 pb-12 mt-8 bg-white min-h-screen">
        <div class="px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row gap-4">

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

            <div class="flex-1 max-w-full space-y-4">

                {{-- Hapus div Kembali ke Index yang lama --}}

                <div class="community-header bg-white border border-gray-200 rounded-xl overflow-hidden shadow-xl">
                    <div class="w-full h-40 bg-gray-300 flex items-center justify-center relative">
                        
                        {{-- TOMBOL KEMBALI BARU, menyatu dengan gambar cover --}}
                        <a href="{{ route('komunitas.index') }}" 
                            class="absolute top-4 left-4 p-2 rounded-full text-white bg-black/30 hover:bg-black/50 transition z-20" 
                            title="Kembali ke Index Komunitas">
                            <i class="fas fa-arrow-left fa-lg"></i>
                        </a>
                        {{-- AKHIR TOMBOL KEMBALI BARU --}}

                        @if ($community->cover_image)
                            <img src="{{ Storage::url($community->cover_image) }}" alt="Cover {{ $community->name }}" class="w-full h-full object-cover object-center absolute inset-0 opacity-80" />
                        @else
                            <div class="w-full h-full bg-gray-300 flex items-center justify-center text-gray-500">
                                <i class="fas fa-image fa-3x"></i>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/50 to-transparent"></div>
                    </div>

                    <div class="p-4 bg-white border-b border-gray-200">
                        <div class="flex justify-between items-end">
                            <div class="flex items-center -mt-16 sm:-mt-12 ml-2">
                                <img
                                    src="{{ $community->avatar ?? 'https://i.pravatar.cc/64?img=3' }}"
                                    alt="Icon {{ $community->name }}"
                                    class="w-16 h-16 rounded-full border-4 border-white object-cover shadow-md"
                                />
                                <div class="ml-4 pt-10">
                                    <h1 class="text-2xl font-extrabold text-gray-900 font-space-grotesk">r/{{ $community->name }}</h1>
                                    <p class="text-sm text-gray-600 hidden sm:block">{{ $community->short_name ?? 'Komunitas' }}</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-2 pt-10">
                                @auth
                                    <a href="{{ route('posts.create', ['community' => $community->id]) }}" class="glare-button bg-gray-900 text-white border border-gray-900 rounded-full p-2 px-4 text-sm font-semibold text-center hover:bg-gray-700 transition duration-300 shadow-md">
                                        <i class="fas fa-plus mr-1"></i> Buat Post
                                    </a>
                                    
                                    <form action="{{ route('komunitas.join', $community->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        <button type="submit" class="glare-button rounded-full p-2 px-4 text-sm font-semibold text-center transition duration-300 shadow-md border
                                            @if ($isMember)
                                                bg-gray-200 text-gray-700 hover:bg-gray-300 border-gray-300
                                            @else
                                                bg-gray-900 text-white hover:bg-gray-700 border-gray-900
                                            @endif
                                        ">
                                            @if ($isMember)
                                                <i class="fas fa-check-circle mr-1"></i> Sudah Bergabung
                                            @else
                                                <i class="fas fa-plus mr-1"></i> Gabung
                                            @endif
                                        </button>
                                    </form>

                                    @if ($isAdmin || $isModerator)
                                        <div class="relative inline-block text-left">
                                            <button id="options-menu-button" class="p-2 rounded-full text-gray-700 hover:bg-gray-100 transition" title="Opsi Admin/Moderator">
                                                <i class="fas fa-ellipsis-h"></i>
                                            </button>
                                            
                                            <div id="options-menu-dropdown" 
                                                class="hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-10" 
                                                role="menu" aria-orientation="vertical" aria-labelledby="options-menu-button">
                                                <div class="py-1" role="none">
                                                    <a href="{{ route('komunitas.edit', $community->id) }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">
                                                        <i class="fas fa-edit mr-2 text-yellow-600"></i> Update Komunitas
                                                    </a>
                                                    <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">
                                                        <i class="fas fa-users-cog mr-2 text-gray-500"></i> Atur Moderasi
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                @else
                                    <a href="{{ route('login') }}" class="glare-button rounded-full p-2 px-4 text-sm font-semibold text-center transition duration-300 shadow-md bg-gray-200 text-gray-700 hover:bg-gray-300 border border-gray-200">
                                        <i class="fas fa-plus mr-1"></i> Buat Post/Login
                                    </a>
                                    <a href="{{ route('login') }}" class="glare-button rounded-full p-2 px-4 text-sm font-semibold text-center transition duration-300 shadow-md bg-gray-900 text-white hover:bg-gray-700 border border-gray-900">
                                        <i class="fas fa-sign-in-alt mr-1"></i> Gabung/Login
                                    </a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row gap-4">

                    <div class="flex-1 max-w-full space-y-4">

                        <div class="flex items-center gap-4 bg-white p-3 rounded-xl border border-gray-200 shadow-sm text-sm">
                            <span class="font-semibold text-gray-900">Sortir:</span>
                            
                            <a href="{{ request()->fullUrlWithoutQuery('sort') . '?sort=baru' }}" 
                               class="@if ($sort === 'baru' || !$sort) font-bold text-gray-900 @else text-gray-500 @endif hover:text-gray-700 transition">
                                Baru
                            </a>
                            
                            <a href="{{ request()->fullUrlWithoutQuery('sort') . '?sort=views' }}" 
                               class="@if ($sort === 'views') font-bold text-gray-900 @else text-gray-500 @endif hover:text-gray-700 transition">
                                Paling Banyak Dilihat
                            </a>
                        </div>

                        <div id="post-list" class="space-y-4">
                            @forelse ($posts as $post)
                                <div class="post-card bg-white border border-gray-200 rounded-xl p-4 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 cursor-pointer"
                                    onclick="window.location.href='{{ route('posts.show', [$community, $post]) }}'">
                                    <div class="flex items-start justify-between mb-2">
                                        <div>
                                            <h4 class="text-lg font-bold text-gray-900">{{ $post->title }}</h4>
                                            <span class="text-xs text-gray-500">Oleh: <span class="font-medium text-gray-700">{{ $post->user->name ?? 'Anonim' }}</span></span>
                                        </div>
                                        <span class="text-xs text-gray-500">{{ $post->created_at->diffForHumans() }}</span>
                                    </div>
                                    <p class="text-sm text-gray-600 line-clamp-2">{{ strip_tags($post->content) }}</p>
                                    <div class="flex items-center gap-4 mt-3 text-sm text-gray-500 border-t pt-2 border-gray-100">
                                        <span class="flex items-center"><i class="fas fa-comment-dots mr-1"></i> {{ $post->comments_count ?? 0 }} Komentar</span>
                                        <span class="flex items-center"><i class="fas fa-eye mr-1"></i> {{ $post->views ?? 0 }} Dilihat</span>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center text-gray-600 p-8 bg-white border border-gray-200 rounded-xl">
                                    <p class="text-lg">Belum ada postingan di komunitas ini. Jadilah yang pertama!</p>
                                </div>
                            @endforelse

                            <div class="mt-6">
                                {{ $posts->links() }}
                            </div>
                        </div>

                    </div>


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

                        <div class="text-sm text-gray-500 border-b pb-2">
                            <i class="fas fa-calendar-alt mr-1"></i> Dibuat: {{ $community->created_at->format('M j, Y') }}
                        </div>
                        
                        <div class="text-sm text-gray-500 border-b pb-4">
                            <i class="fas fa-crown mr-1 text-yellow-500"></i> Dibuat oleh: 
                            <span class="font-medium text-gray-700">
                                {{ $community->creator->name ?? 'Admin Tidak Diketahui' }}
                            </span>
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

            </div>
        </div>
    </section>

    @push('styles')
        <style>
            body { background-color: #f7f7f7; }
            .no-scrollbar::-webkit-scrollbar { display: none; }
            .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

            .left-sidebar {
                position: sticky;
                top: 1rem;
                height: calc(100vh - 2rem);
            }
            .right-sidebar {
                position: sticky;
                top: 1rem;
                height: fit-content;
                max-height: calc(100vh - 2rem);
                overflow-y: auto;
            }

            .sidebar {
                background-color: #ffffff !important;
                border: 1px solid #e5e7eb;
                border-radius: 0.75rem;
                padding: 1.5rem;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
                transition: all 0.3s ease;
            }
            .sidebar h3 { font-family: 'Space Grotesk', sans-serif; }

            .sidebar a.hover\:bg-gray-100:hover,
            .sidebar span.hover\:bg-gray-100:hover,
            .recent-activity.hover\:bg-gray-100:hover {
                background-color: #f3f4f6 !important;
            }

            .post-card {
                cursor: pointer;
                transition: all 0.3s ease;
            }
            .post-card:hover {
                border-color: #d1d5db;
                box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            }

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
                z-index: 2;
            }

            .text-gray-900 { color: #374151; }
            .text-gray-800 { color: #4b5563; }
            .text-gray-700 { color: #6b7280; }
            .text-gray-600 { color: #9ca3af; }
            .text-gray-500 { color: #a0a0a0; }

            .bg-white { background-color: #ffffff; }
            .bg-gray-50 { background-color: #f9fafb; }
            .bg-gray-100 { background-color: #f3f4f6; }
            .bg-gray-200 { background-color: #e5e7eb; }
            .bg-gray-300 { background-color: #d1d5db; }
            .bg-gray-900 { background-color: #374151; color: #f9fafb; }
            .bg-yellow-600 { background-color: #ca8a04; }
            .hover\:bg-yellow-700:hover { background-color: #a16207; }
            .border-yellow-600 { border-color: #ca8a04; }

            .border-gray-200 { border-color: #e5e7eb; }
            .border-gray-300 { border-color: #d1d5db; }

            .right-sidebar .glare-button.bg-gray-900 { background-color: #374151; color: #f9fafb; }
            .right-sidebar .glare-button.bg-gray-200 { background-color: #e5e7eb; color: #4b5563; }
        </style>
    @endpush

    @push('scripts')
        <script>
            function toggleNotifications() {
                // Implementasi Notifikasi
            }

            document.addEventListener('DOMContentLoaded', function() {
                const button = document.getElementById('options-menu-button');
                const dropdown = document.getElementById('options-menu-dropdown');

                if (button && dropdown) {
                    button.addEventListener('click', function(event) {
                        event.stopPropagation();
                        dropdown.classList.toggle('hidden');
                    });

                    document.addEventListener('click', function(event) {
                        if (!button.contains(event.target) && !dropdown.contains(event.target)) {
                            if (!dropdown.classList.contains('hidden')) {
                                dropdown.classList.add('hidden');
                            }
                        }
                    });
                }
            });
        </script>
    @endpush
</x-layout>