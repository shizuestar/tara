<x-layout>
    @push('styles')
        <style>
            body,
            * {
                font-family: 'Space Grotesk', sans-serif !important;
            }

            h1,
            h2,
            h3,
            h4,
            h5,
            h6,
            p,
            a,
            span,
            button,
            input,
            select,
            option,
            div,
            label {
                font-family: 'Space Grotesk', sans-serif !important;
            }

            [class*="fa-"] {
                font-family: 'Font Awesome 6 Free', sans-serif !important;
            }
        </style>
    @endpush

    @section('title', 'Buat Proyek Baru')

    <section class="pt-20 pb-12 section-gradient">
        <div class="container">
            {{-- Notifikasi sukses/error --}}
            @if (session('success'))
                <div id="notification-bar" class="notification-bar" onclick="dismissNotification()">
                    <p class="text-sm">{{ session('success') }}</p>
                </div>
            @endif
            @if (session('error'))
                <div id="notification-bar" class="notification-bar error" onclick="dismissNotification()">
                    <p class="text-sm">{{ session('error') }}</p>
                </div>
            @endif

            <h1 class="text-3xl font-bold mb-6">Buat Proyek Baru</h1>

            <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data"
                class="max-w-2xl mx-auto">
                @csrf

                <div class="space-y-6">

                    {{-- Nama Proyek --}}
                    <div>
                        <label for="project_name" class="block text-sm font-medium">Nama Proyek</label>
                        <input type="text" name="project_name" id="project_name" value="{{ old('project_name') }}"
                            class="w-full px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                            placeholder="Masukkan nama proyek" required>
                        @error('project_name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Deskripsi --}}
                    <div>
                        <label for="description" class="block text-sm font-medium">Deskripsi</label>
                        <textarea name="description" id="description" rows="5"
                            class="w-full px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                            placeholder="Jelaskan tentang proyek Anda" required>{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Kategori --}}
                    <div>
                        <label for="category_id" class="block text-sm font-medium">Kategori</label>
                        <select name="category_id" id="category_id"
                            class="w-full px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                            required>
                            <option value="">Pilih kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Komunitas --}}
                    <div>
                        <label for="community_id" class="block text-sm font-medium">Komunitas</label>
                        <select name="community_id" id="community_id"
                            class="w-full px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                            required>
                            <option value="">Pilih komunitas</option>
                            @foreach ($communities as $community)
                                <option value="{{ $community->id }}"
                                    {{ old('community_id') == $community->id ? 'selected' : '' }}>
                                    {{ $community->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('community_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                  

                    {{-- Gambar Cover --}}
                    <div>
                        <label for="cover_images" class="block text-sm font-medium">Gambar Proyek (opsional)</label>
                        <input type="file" name="cover_images" id="cover_images"
                            class="w-full px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                            accept="image/*">
                        @error('cover_images')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Tanggal Mulai & Selesai --}}
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="start_date" class="block text-sm font-medium">Tanggal Mulai</label>
                            <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}"
                                class="w-full px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                                required>
                            @error('start_date')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="end_date" class="block text-sm font-medium">Tanggal Selesai (opsional)</label>
                            <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}"
                                class="w-full px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400">
                            @error('end_date')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Progress --}}
                    <div>
                        <label for="progress" class="block text-sm font-medium">Progress (%)</label>
                        <input type="number" name="progress" id="progress" min="0" max="100"
                            value="{{ old('progress', 0) }}"
                            class="w-full px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                            required>
                        @error('progress')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Status --}}
                    <div>
                        <label for="status" class="block text-sm font-medium">Status</label>
                        <select name="status" id="status"
                            class="w-full px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                            required>
                            <option value="ongoing" {{ old('status') == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                            <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed
                            </option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Anggota (ID & Role dipisah koma) --}}
                    <div>
                        <label for="member_ids" class="block text-sm font-medium">ID Anggota (pisahkan dengan
                            koma)</label>
                        <input type="text" name="member_ids" id="member_ids" value="{{ old('member_ids') }}"
                            class="w-full px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                            placeholder="Contoh: 2, 3, 4">
                        @error('member_ids')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="member_roles" class="block text-sm font-medium">Peran Anggota (sesuai urutan,
                            pisahkan dengan koma)</label>
                        <input type="text" name="member_roles" id="member_roles"
                            value="{{ old('member_roles') }}"
                            class="w-full px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                            placeholder="Contoh: Designer, Programmer, Editor">
                        @error('member_roles')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Milestone --}}
                    <div>
                        <label for="milestones" class="block text-sm font-medium">Milestones (format:
                            tanggal:title:deskripsi:status)</label>
                        <textarea name="milestones" id="milestones" rows="5"
                            class="w-full px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                            placeholder="Contoh:
2025-10-20:Desain Awal:UI/UX selesai:in_progress
2025-11-01:Testing:Mulai testing internal:upcoming">{{ old('milestones') }}</textarea>
                        @error('milestones')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Tombol --}}
                    <div class="flex justify-end gap-4">
                        <a href="{{ route('projects.index') }}" class="action-btn">Batal</a>
                        <button type="submit" class="join-btn">Buat Proyek</button>
                    </div>
                </div>
            </form>
        </div>
    </section>


    @push('styles')
        <style>
            .section-gradient {
                background: linear-gradient(145deg, rgba(255, 255, 255, 0.95), rgba(240, 240, 240, 0.7));
                backdrop-filter: blur(10px);
                -webkit-backdrop-filter: blur(10px);
            }

            .container {
                max-width: 1280px;
                margin: 0 auto;
                padding: 0 1.5rem;
            }

            .notification-bar {
                background: #ffffff;
                border: 1px solid #e5e7eb;
                border-radius: 12px;
                padding: 1.25rem;
                margin-bottom: 2rem;
                cursor: pointer;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .notification-bar.error {
                background: #fef2f2;
                border-color: #f87171;
                color: #b91c1c;
            }

            .notification-bar:hover {
                transform: translateY(-4px);
                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            }

            .action-btn,
            .join-btn {
                padding: 0.6rem 1.5rem;
                border-radius: 8px;
                font-size: 0.9rem;
                font-weight: 500;
                background: #1a202c;
                color: #ffffff;
                transition: all 0.3s ease;
                text-transform: uppercase;
                border: solid black 2px;
            }

            .action-btn:hover,
            .join-btn:hover {
                background: #ffffff;
                color: #1a202c;
                border: solid black 2px;
            }

            @media (max-width: 768px) {

                .action-btn,
                .join-btn {
                    width: 100%;
                    text-align: center;
                }
            }

            @media (max-width: 640px) {
                .container {
                    padding: 0 1rem;
                }

                .action-btn,
                .join-btn {
                    padding: 0.4rem 1rem;
                    font-size: 0.8rem;
                }
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            // Dismiss Notification Bar
            function dismissNotification() {
                const notificationBar = document.getElementById('notification-bar');
                notificationBar.classList.add('hidden');
            }

            // Initialize Page
            window.addEventListener('load', () => {
                // Animate form fields
                gsap.from('form > div', {
                    opacity: 0,
                    y: 20,
                    duration: 0.5,
                    stagger: 0.1,
                    ease: 'power2.out'
                });
            });
        </script>
    @endpush
</x-layout>
