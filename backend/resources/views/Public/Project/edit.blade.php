<x-layout>
    @section('title', 'Edit Proyek: ' . $proyek->name)

    <section class="pt-20 pb-12 section-gradient">
        <div class="container">
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

            <h1 class="text-3xl font-bold mb-6">Edit Proyek: {{ $proyek->name }}</h1>
            <form action="{{ route('proyek.update', $proyek->id) }}" method="POST" enctype="multipart/form-data" class="max-w-2xl mx-auto">
                @csrf
                @method('PUT')
                <div class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-medium">Nama Proyek</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $proyek->name) }}"
                               class="w-full px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                               placeholder="Masukkan nama proyek" required />
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="description" class="block text-sm font-medium">Deskripsi</label>
                        <textarea name="description" id="description"
                                  class="w-full px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                                  rows="5" placeholder="Jelaskan tentang proyek Anda" required>{{ old('description', $proyek->description) }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="category_id" class="block text-sm font-medium">Kategori</label>
                        <select name="category_id" id="category_id"
                                class="w-full px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                                required>
                            <option value="">Pilih kategori</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $proyek->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="collaboration_goals" class="block text-sm font-medium">Tujuan Kolaborasi</label>
                        <textarea name="collaboration_goals" id="collaboration_goals"
                                  class="w-full px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                                  rows="5" placeholder="Apa tujuan kolaborasi proyek ini?" required>{{ old('collaboration_goals', $proyek->collaboration_goals) }}</textarea>
                        @error('collaboration_goals')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="image" class="block text-sm font-medium">Gambar Proyek (opsional)</label>
                        @if($proyek->image_path)
                            <img src="{{ asset('storage/' . $proyek->image_path) }}" alt="{{ $proyek->name }}"
                                 class="w-full h-40 object-cover rounded mb-2" />
                        @endif
                        <input type="file" name="image" id="image"
                               class="w-full px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                               accept="image/*" />
                        @error('image')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="status" class="block text-sm font-medium">Status</label>
                        <select name="status" id="status"
                                class="w-full px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                                required>
                            <option value="open" {{ old('status', $proyek->status) == 'open' ? 'selected' : '' }}>Buka Kolaborasi</option>
                            <option value="closed" {{ old('status', $proyek->status) == 'closed' ? 'selected' : '' }}>Kolaborasi Ditutup</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="progress" class="block text-sm font-medium">Progres (%)</label>
                        <input type="number" name="progress" id="progress" value="{{ old('progress', $proyek->progress) }}"
                               class="w-full px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                               min="0" max="100" required />
                        @error('progress')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex gap-4">
                        <label class="flex items-center">
                            <input type="checkbox" name="populer" {{ old('populer', $proyek->populer) ? 'checked' : '' }}
                                   class="mr-2 focus:ring-yellow-400" />
                            Tandai sebagai Populer
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" name="baru" {{ old('baru', $proyek->baru) ? 'checked' : '' }}
                                   class="mr-2 focus:ring-yellow-400" />
                            Tandai sebagai Baru
                        </label>
                    </div>
                    <div class="flex justify-end gap-4">
                        <a href="{{ route('proyek.show', $proyek->id) }}" class="action-btn">Batal</a>
                        <button type="submit" class="join-btn">Simpan Perubahan</button>
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