<x-admin-layout>
    <style>
        /* Anda bisa menaruh ini di file CSS utama Anda */
        .custom-option {
            background-color: white;
            color: #4B5563;
            /* Tailwind: text-gray-700 */
        }

        /* Pseudo-class :hover ini mencoba menerapkan styling saat kursor berada di atas option */
        .custom-option:hover {
            background-color: #E0E7FF;
            /* Tailwind: bg-indigo-100 */
            color: #4338CA;
            /* Tailwind: text-indigo-700 */
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        warning: '#FFC900',
                        'warning-dark': '#FF9B00',
                        secondary: '#FFD700',
                        'secondary-dark': '#FFC400',
                        dark: '#1F2937',
                        darker: '#111827',
                        light: '#F9FAFB',
                        'gray-light': '#F3F4F6',
                        success: '#10B981',
                        warning: '#FFBF00',
                        danger: '#EF4444',
                        info: '#3B82F6',
                    },
                    fontFamily: {
                        'space-grotesk': ['Space Grotesk', 'sans-serif'],
                    },
                    animation: {
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'fade-in': 'fadeIn 0.5s ease-out forwards',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': {
                                opacity: '0',
                                transform: 'translateY(10px)'
                            },
                            '100%': {
                                opacity: '1',
                                transform: 'translateY(0)'
                            },
                        }
                    }
                }
            }
        }
    </script>
    </head>

    <body class="bg-gray-50 font-space-grotesk text-dark min-h-screen">
        <div class="flex flex-col min-h-screen">
            <!-- Header -->


            <!-- Main Content -->
            <main class="flex-1 py-8">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <!-- Page Title -->
                    <div class="mb-8">
                        <h2 class="text-2xl font-bold text-darker flex items-center">
                            <i class="fas fa-calendar-alt text-warning mr-3"></i>
                            Daftar Event
                        </h2>
                        <p class="text-gray-600 mt-2">Kelola semua event dan agenda dengan mudah</p>
                    </div>

                    <!-- Stats Overview -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <div class="bg-white rounded-xl p-5 shadow-sm border-l-4 border-warning">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-gray-600 text-sm">Total Event</p>
                                    <h3 class="text-2xl font-bold text-darker mt-1">24</h3>
                                </div>
                                <div class="bg-yellow-100 p-3 rounded-lg">
                                    <i class="fas fa-calendar-check text-warning text-xl"></i>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-xl p-5 shadow-sm border-l-4 border-success">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-gray-600 text-sm">Event Berlangsung</p>
                                    <h3 class="text-2xl font-bold text-darker mt-1">5</h3>
                                </div>
                                <div class="bg-green-100 p-3 rounded-lg">
                                    <i class="fas fa-play-circle text-success text-xl"></i>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-xl p-5 shadow-sm border-l-4 border-warning">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-gray-600 text-sm">Event Mendatang</p>
                                    <h3 class="text-2xl font-bold text-darker mt-1">8</h3>
                                </div>
                                <div class="bg-yellow-100 p-3 rounded-lg">
                                    <i class="fas fa-clock text-warning text-xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Bar -->
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
                        <!-- Search Box -->
                        <div class="relative w-full sm:w-64">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                            <input type="text"
                                class="pl-10 pr-4 py-2.5 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-warning focus:border-warning"
                                placeholder="Cari event...">
                        </div>

                        <!-- Add Event Button -->
                        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
                            <h2 class="text-xl font-semibold flex items-center gap-2 text-gray-900">
                                <i class="fas fa-calendar-alt text-warning text-lg"></i>
                                Daftar Event
                            </h2>
                            <div x-data="{ openModal: false }">
                                <!-- Tombol buka -->
                                <button @click="openModal = true"
                                    class="bg-warning hover:bg-warning-dark text-gray-900 font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors">
                                    <i class="fas fa-plus text-sm"></i>
                                    Tambah Event
                                </button>
                                <!-- Modal -->
                                <div x-show="openModal" x-cloak x-transition:enter="ease-out duration-300"
                                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                    x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
                                    x-transition:leave-end="opacity-0"
                                    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 p-4">

                                    <div x-show="openModal" x-transition:enter="ease-out duration-300"
                                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                        x-transition:leave="ease-in duration-200"
                                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                        class="bg-white rounded-xl shadow-2xl w-full max-w-2xl max-h-[95vh] overflow-y-auto">

                                        <div class="p-7">
                                            <!-- Header -->
                                            <div
                                                class="flex justify-between items-center mb-6 pb-4 border-b border-gray-200">
                                                <h2 class="text-2xl font-bold text-gray-800 flex items-center">

                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />

                                                    Tambah Event Baru
                                                </h2>
                                                <button @click="openModal = false"
                                                    class="text-gray-400 hover:text-gray-600 transition-colors duration-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </div>

                                            <form method="POST" action="{{ route('admin.events.store') }}"
                                                enctype="multipart/form-data">
                                                @csrf

                                                <!-- Kategori -->
                                                <div class="mb-5">
                                                    <label
                                                        class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                                                    <select id="category_id" name="category_id" required
                                                        class="w-full border border-gray-300 rounded-xl p-3.5 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-200">
                                                        <option value="" class="">-- Pilih Kategori --
                                                        </option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}"
                                                                {{ old('category_id') == $category->id ? 'selected' : '' }}
                                                                class="custom-option">
                                                                {{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                </div>

                                                <!-- Judul -->
                                                <div class="mb-5">
                                                    <label class="block text-sm font-medium text-gray-700 mb-2">Judul
                                                        Event</label>
                                                    <input type="text" name="title"
                                                        class="w-full border border-gray-300 rounded-xl p-3.5 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-200"
                                                        placeholder="Masukkan judul event" required>
                                                </div>

                                                <!-- Tanggal Mulai & Selesai -->
                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                                                    <div>
                                                        <label
                                                            class="block text-sm font-medium text-gray-700 mb-2">Tanggal
                                                            Mulai</label>
                                                        <input type="date" name="start_date"
                                                            class="w-full border border-gray-300 rounded-xl p-3.5 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-200"
                                                            required>
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="block text-sm font-medium text-gray-700 mb-2">Tanggal
                                                            Selesai</label>
                                                        <input type="date" name="end_date"
                                                            class="w-full border border-gray-300 rounded-xl p-3.5 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-200"
                                                            required>
                                                    </div>
                                                </div>

                                                <!-- Jam Mulai & Selesai -->
                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                                                    <div>
                                                        <label class="block text-sm font-medium text-gray-700 mb-2">Jam
                                                            Mulai</label>
                                                        <input type="time" name="time_start"
                                                            class="w-full border border-gray-300 rounded-xl p-3.5 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-200"
                                                            required>
                                                    </div>
                                                    <div>
                                                        <label class="block text-sm font-medium text-gray-700 mb-2">Jam
                                                            Selesai</label>
                                                        <input type="time" name="time_end"
                                                            class="w-full border border-gray-300 rounded-xl p-3.5 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-200"
                                                            required>
                                                    </div>
                                                </div>

                                                <!-- Lokasi -->
                                                <div class="mb-5">
                                                    <label
                                                        class="block text-sm font-medium text-gray-700 mb-2">Lokasi</label>
                                                    <input type="text" name="location"
                                                        class="w-full border border-gray-300 rounded-xl p-3.5 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-200"
                                                        placeholder="Masukkan lokasi event" required>
                                                </div>

                                                <!-- Deskripsi -->
                                                <div class="mb-5">
                                                    <label
                                                        class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                                                    <textarea name="description"
                                                        class="w-full border border-gray-300 rounded-xl p-3.5 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-200"
                                                        rows="4" placeholder="Tambahkan deskripsi event" required></textarea>
                                                </div>

                                                <!-- Status -->
                                                <div class="mb-5">
                                                    <label
                                                        class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                                                        <div class="relative flex items-center">
                                                            <input type="radio" name="status" id="upcoming"
                                                                value="upcoming" class="hidden peer" checked>
                                                            <label for="upcoming"
                                                                class="w-full p-3 border border-gray-300 rounded-xl text-center cursor-pointer peer-checked:border-yellow-500 peer-checked:bg-yellow-50 peer-checked:text-yellow-700 transition-all duration-200">
                                                                Upcoming
                                                            </label>
                                                        </div>
                                                        <div class="relative flex items-center">
                                                            <input type="radio" name="status" id="ongoing"
                                                                value="ongoing" class="hidden peer">
                                                            <label for="ongoing"
                                                                class="w-full p-3 border border-gray-300 rounded-xl text-center cursor-pointer peer-checked:border-yellow-500 peer-checked:bg-yellow-50 peer-checked:text-yellow-700 transition-all duration-200">
                                                                Ongoing
                                                            </label>
                                                        </div>
                                                        <div class="relative flex items-center">
                                                            <input type="radio" name="status" id="past"
                                                                value="past" class="hidden peer">
                                                            <label for="past"
                                                                class="w-full p-3 border border-gray-300 rounded-xl text-center cursor-pointer peer-checked:border-yellow-500 peer-checked:bg-yellow-50 peer-checked:text-yellow-700 transition-all duration-200">
                                                                Past
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Upload Gambar -->
                                                <div class="mb-6">
                                                    <label class="block text-sm font-medium text-gray-700 mb-2">Gambar
                                                        Event</label>
                                                    <input type="file" name="image"
                                                        class="w-full border border-gray-300 rounded-xl p-3.5">
                                                </div>

                                                <!-- Tombol -->
                                                <div class="flex justify-end gap-3 pt-5 border-t border-gray-200">
                                                    <button type="button" @click="openModal = false"
                                                        class="px-5 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl font-medium transition-all duration-200 transform hover:scale-105">
                                                        Batal
                                                    </button>
                                                    <button type="submit"
                                                        class="bg-warning hover:bg-warning-dark text-gray-900 font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors">
                                                        Simpan Event
                                                    </button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Filter Section -->
                    <div class="bg-white rounded-xl p-6 shadow-sm mb-6 border border-gray-200">
                        <h3 class="text-lg font-semibold text-darker mb-4 flex items-center">
                            <i class="fas fa-filter text-warning mr-2"></i>
                            Filter Event
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1.5">Kategori</label>
                                <select
                                    class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-warning focus:border-warning">
                                    <option>Semua Kategori</option>
                                    <option>Webinar</option>
                                    <option>Workshop</option>
                                    <option>Konferensi</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1.5">Status</label>
                                <select
                                    class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-warning focus:border-warning">
                                    <option>Semua Status</option>
                                    <option>Akan Datang</option>
                                    <option>Sedang Berlangsung</option>
                                    <option>Selesai</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1.5">Tanggal</label>
                                <select
                                    class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-warning focus:border-warning">
                                    <option>Semua Tanggal</option>
                                    <option>Hari Ini</option>
                                    <option>Minggu Ini</option>
                                    <option>Bulan Ini</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1.5">Cari</label>
                                <div class="relative">
                                    <input type="text"
                                        class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-warning focus:border-warning"
                                        placeholder="Masukkan nama event...">
                                </div>
                            </div>
                        </div>

                        <div class="flex gap-3 mt-5">
                            <button
                                class="bg-warning hover:bg-warning-dark text-white font-medium px-4 py-2.5 rounded-lg flex items-center gap-2 transition-colors duration-300">
                                <i class="fas fa-filter"></i>
                                Terapkan Filter
                            </button>
                            <button
                                class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium px-4 py-2.5 rounded-lg flex items-center gap-2 transition-colors duration-300">
                                <i class="fas fa-redo"></i>
                                Reset
                            </button>
                        </div>
                    </div>

                    <!-- Events Table -->
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Nama Event</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Kategori</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Tanggal</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Status</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Partisipan</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($events as $event)
                                        <!-- Event 1 -->
                                        <tr>
                                            <td class="px-6 py-4">{{ $event->title }}</td>
                                            <td class="px-6 py-4">{{ $event->category->name ?? '-' }}</td>
                                            <td class="px-6 py-4">
                                                {{ $event->start_date->format('d M Y') }} -
                                                {{ $event->end_date->format('d M Y') }}
                                            </td>
                                            <td class="px-6 py-4">
                                                <span class="badge">{{ ucfirst($event->status) }}</span>
                                            </td>
                                            <td class="px-6 py-4">{{ $event->registrations->count() }}</td>
                                            <td class="px-6 py-4 flex gap-2 ">
                                                <div class="flex items-center">
                                                    <button>
                                                        <a href="{{ route('admin.events.show', $event->id) }}"
                                                            class="w-8 h-8 rounded-md bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-[12px] mr-1">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                    </button>
                                                    <form action="{{ route('admin.events.destroy', $event) }}"
                                                        method="POST" onsubmit="return confirm('Hapus agenda?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-[12px]"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="bg-white px-6 py-3 flex items-center justify-between border-t border-gray-200">
                            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                                <div>
                                    <p class="text-sm text-gray-700">
                                        Menampilkan
                                        <span class="font-medium">1</span>
                                        sampai
                                        <span class="font-medium">3</span>
                                        dari
                                        <span class="font-medium">24</span>
                                        hasil
                                    </p>
                                </div>
                                <div>
                                    <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px"
                                        aria-label="Pagination">
                                        <a href="#"
                                            class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                            <span class="sr-only">Previous</span>
                                            <i class="fas fa-chevron-left"></i>
                                        </a>

                                        <a href="#"
                                            class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                            <span class="sr-only">Next</span>
                                            <i class="fas fa-chevron-right"></i>
                                        </a>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>


        </div>

        <script>
            function updateDateTime() {
                const now = new Date();
                const options = {
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: true,
                    timeZone: 'Asia/Jakarta',
                    weekday: 'long',
                    day: '2-digit',
                    month: 'short',
                    year: 'numeric'
                };
                const formatter = new Intl.DateTimeFormat('id-ID', options);
                const formattedDate = formatter.format(now);
                document.getElementById('current-time')?.textContent = formattedDate;
            }

            setInterval(updateDateTime, 60000);
            updateDateTime();
        </script>
    </body>
</x-admin-layout>
