<x-admin-layout>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#FFD700',
                        'primary-dark': '#FFC400',
                        dark: '#212121',
                        'gray-light': '#F5F5F5',
                    },
                    fontFamily: {
                            'space-grotesk': ['Space Grotesk', 'sans-serif'],
                        },
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Space Grotesk', sans-serif;
        }

        [x-cloak] {
            display: none !important;
        }

        /* Custom scrollbar untuk dropdown */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #c5c5c5;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }
    </style>
    </head>

    <body class="bg-gray-50 text-dark font-poppins">
        <!-- Content Area (menggantikan x-admin-layout) -->
        <div class="">
            <!-- Agenda Section -->
            <div class="bg-white rounded-lg p-6 shadow-sm mb-8">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
                    <h2 class="text-xl font-semibold flex items-center gap-2 text-gray-900">
                        <i class="fas fa-calendar-alt text-primary text-lg"></i>
                        Daftar Event
                    </h2>
                    <div x-data="{ openModal: false }">
                        <!-- Tombol buka -->
                        <button @click="openModal = true"
                            class="bg-primary hover:bg-primary-dark text-gray-900 font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors">
                            <i class="fas fa-plus text-sm"></i>
                            Tambah Event
                        </button>

                        <!-- Modal -->
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
                                    <div class="flex justify-between items-center mb-6 pb-4 border-b border-gray-200">
                                        <h2 class="text-2xl font-bold text-gray-800 flex items-center">

                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />

                                            Tambah Event Baru
                                        </h2>
                                        <button @click="openModal = false"
                                            class="text-gray-400 hover:text-gray-600 transition-colors duration-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>

                                    <form>
                                        <!-- Kategori -->
                                        <div class="mb-5">
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                                            <div x-data="{ open: false, selected: '' }" class="relative">
                                                <button @click="open = !open" type="button"
                                                    class="w-full flex justify-between items-center border border-gray-300 rounded-xl p-3.5 text-left focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                                                    <span x-text="selected ? selected : '-- Pilih Kategori --'"
                                                        :class="selected ? 'text-gray-800' : 'text-gray-400'"></span>
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-5 w-5 text-gray-400 transition-transform duration-200"
                                                        :class="open ? 'transform rotate-180' : ''" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M19 9l-7 7-7-7" />
                                                    </svg>
                                                </button>
                                                <div x-show="open" @click.away="open = false"
                                                    class="absolute z-10 mt-1 w-full bg-white rounded-xl shadow-lg border border-gray-200 max-h-60 overflow-y-auto custom-scrollbar">
                                                    <ul class="py-1">
                                                        <li @click="selected = 'Seminar'; open = false"
                                                            class="px-4 py-2.5 hover:bg-blue-50 cursor-pointer transition-colors duration-150">
                                                            Seminar</li>
                                                        <li @click="selected = 'Workshop'; open = false"
                                                            class="px-4 py-2.5 hover:bg-blue-50 cursor-pointer transition-colors duration-150">
                                                            Workshop</li>
                                                        <li @click="selected = 'Konferensi'; open = false"
                                                            class="px-4 py-2.5 hover:bg-blue-50 cursor-pointer transition-colors duration-150">
                                                            Konferensi</li>
                                                        <li @click="selected = 'Pelatihan'; open = false"
                                                            class="px-4 py-2.5 hover:bg-blue-50 cursor-pointer transition-colors duration-150">
                                                            Pelatihan</li>
                                                        <li @click="selected = 'Webinar'; open = false"
                                                            class="px-4 py-2.5 hover:bg-blue-50 cursor-pointer transition-colors duration-150">
                                                            Webinar</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Judul -->
                                        <div class="mb-5">
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Judul
                                                Event</label>
                                            <input type="text"
                                                class="w-full border border-gray-300 rounded-xl p-3.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
                                                placeholder="Masukkan judul event" required>
                                        </div>

                                        <!-- Tanggal Mulai & Selesai -->
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal
                                                    Mulai</label>
                                                <div class="relative">
                                                    <input type="date"
                                                        class="w-full border border-gray-300 rounded-xl p-3.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
                                                        required>

                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />

                                                </div>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal
                                                    Selesai</label>
                                                <div class="relative">
                                                    <input type="date"
                                                        class="w-full border border-gray-300 rounded-xl p-3.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
                                                        required>

                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />

                                                </div>
                                            </div>
                                        </div>

                                        <!-- Jam Mulai & Selesai -->
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Jam
                                                    Mulai</label>
                                                <div class="relative">
                                                    <input type="time"
                                                        class="w-full border border-gray-300 rounded-xl p-3.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
                                                        required>

                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />

                                                </div>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Jam
                                                    Selesai</label>
                                                <div class="relative">
                                                    <input type="time"
                                                        class="w-full border border-gray-300 rounded-xl p-3.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
                                                        required>

                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />

                                                </div>
                                            </div>
                                        </div>

                                        <!-- Lokasi -->
                                        <div class="mb-5">
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Lokasi</label>
                                            <input type="text"
                                                class="w-full border border-gray-300 rounded-xl p-3.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
                                                placeholder="Masukkan lokasi event" required>
                                        </div>

                                        <!-- Deskripsi -->
                                        <div class="mb-5">
                                            <label
                                                class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                                            <textarea
                                                class="w-full border border-gray-300 rounded-xl p-3.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
                                                rows="4" placeholder="Tambahkan deskripsi event" required></textarea>
                                        </div>

                                        <!-- Status -->
                                        <div class="mb-5">
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
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
                                            <div class="flex items-center justify-center w-full">
                                                <label
                                                    class="flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-xl cursor-pointer bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                        <svg class="w-10 h-10 mb-3 text-gray-400" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                            </path>
                                                        </svg>
                                                        <p class="mb-2 text-sm text-gray-500"><span
                                                                class="font-semibold">Klik untuk upload</span> atau
                                                            drag and drop</p>
                                                        <p class="text-xs text-gray-500">SVG, PNG, JPG (MAX. 5MB)</p>
                                                    </div>
                                                    <input type="file" class="hidden" />
                                                </label>
                                            </div>
                                        </div>

                                        <!-- Tombol -->
                                        <div class="flex justify-end gap-3 pt-5 border-t border-gray-200">
                                            <button type="button" @click="openModal = false"
                                                class="px-5 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl font-medium transition-all duration-200 transform hover:scale-105">
                                                Batal
                                            </button>
                                            <button type="submit"
                                                class="bg-primary hover:bg-primary-dark text-gray-900 font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>
                                                Simpan Event
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filter Section -->

                <div class="bg-gray-50 rounded-lg p-5 mb-6 border border-gray-200">
                    <h3 class="text-lg font-semibold flex items-center gap-2 mb-4 text-gray-900">
                        <i class="fas fa-filter text-primary text-base"></i>
                        Filter Event
                    </h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div>
                            <label for="category-filter"
                                class="block text-sm font-medium text-gray-700 mb-1.5">Kategori
                                Event</label>
                            <select id="category-filter"
                                class="w-full p-2.5 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-primary">
                                <option value="">Semua Kategori</option>
                                <option value="seni-rupa">Seni Rupa</option>
                                <option value="fotografi">Fotografi</option>
                                <option value="musik">Musik</option>
                                <option value="teater">Teater</option>
                            </select>
                        </div>
                        <div>
                            <label for="status-filter" class="block text-sm font-medium text-gray-700 mb-1.5">Status
                                Event</label>
                            <select id="status-filter"
                                class="w-full p-2.5 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-primary">
                                <option value="">Semua Status</option>
                                <option value="active">Aktif</option>
                                <option value="upcoming">Akan Datang</option>
                                <option value="completed">Selesai</option>
                            </select>
                        </div>
                        <div>
                            <label for="date-filter"
                                class="block text-sm font-medium text-gray-700 mb-1.5">Tanggal</label>
                            <select id="date-filter"
                                class="w-full p-2.5 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-primary">
                                <option value="">Semua Tanggal</option>
                                <option value="today">Hari Ini</option>
                                <option value="week">Minggu Ini</option>
                                <option value="month">Bulan Ini</option>
                            </select>
                        </div>
                        <div>
                            <label for="keyword-filter" class="block text-sm font-medium text-gray-700 mb-1.5">Cari
                                Event</label>
                            <input id="keyword-filter" type="text"
                                class="w-full p-2.5 border border-gray-200 rounded-md text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary"
                                placeholder="Masukkan nama event...">
                        </div>
                    </div>
                    <div class="flex gap-3 mt-4">
                        <button
                            class="bg-primary hover:bg-primary-dark text-gray-900 font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors">
                            <i class="fas fa-filter text-sm"></i>
                            Terapkan Filter
                        </button>
                        <button
                            class="bg-gray-100 hover:bg-gray-200 text-gray-900 font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors">
                            <i class="fas fa-redo text-sm"></i>
                            Reset
                        </button>
                    </div>
                </div>

                <!-- Event List -->
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="p-3 text-left text-sm font-semibold text-gray-600">Nama Event</th>
                                <th class="p-3 text-left text-sm font-semibold text-gray-600">Kategori</th>
                                <th class="p-3 text-left text-sm font-semibold text-gray-600">Tanggal</th>
                                <th class="p-3 text-left text-sm font-semibold text-gray-600">Status</th>
                                <th class="p-3 text-left text-sm font-semibold text-gray-600">Partisipan</th>
                                <th class="p-3 text-left text-sm font-semibold text-gray-600 w-24">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="hover:bg-gray-50 border-b border-gray-100">
                                <td class="p-3">
                                    <div class="text-sm font-medium text-gray-900">Pameran Seni Kontemporer 2025
                                    </div>
                                    <div class="text-xs text-gray-600">Galeri Nasional, Jakarta</div>
                                </td>
                                <td class="p-3 text-sm text-gray-900">Seni Rupa</td>
                                <td class="p-3 text-sm text-gray-900">06-10 Sep 2025</td>
                                <td class="p-3"><span
                                        class="px-2 py-1 rounded-full bg-green-100 text-green-600 text-xs">Aktif</span>
                                </td>
                                <td class="p-3 text-sm text-gray-900">324</td>
                                <td class="p-3">
                                    <div class="flex gap-2">
                                        <a href="#"
                                            class="w-8 h-8 rounded-md bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-sm"><i
                                                class="fas fa-eye"></i></a>
                                        <a href="#"
                                            class="w-8 h-8 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-sm"><i
                                                class="fas fa-edit"></i></a>
                                        <button
                                            class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-sm"><i
                                                class="fas fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 border-b border-gray-100">
                                <td class="p-3">
                                    <div class="text-sm font-medium text-gray-900">Workshop Fotografi Dasar</div>
                                    <div class="text-xs text-gray-600">Studio Foto TARA, Bandung</div>
                                </td>
                                <td class="p-3 text-sm text-gray-900">Fotografi</td>
                                <td class="p-3 text-sm text-gray-900">12 Sep 2025</td>
                                <td class="p-3"><span
                                        class="px-2 py-1 rounded-full bg-blue-100 text-blue-600 text-xs">Akan
                                        Datang</span></td>
                                <td class="p-3 text-sm text-gray-900">48</td>
                                <td class="p-3">
                                    <div class="flex gap-2">
                                        <a href="#"
                                            class="w-8 h-8 rounded-md bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-sm"><i
                                                class="fas fa-eye"></i></a>
                                        <a href="#"
                                            class="w-8 h-8 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-sm"><i
                                                class="fas fa-edit"></i></a>
                                        <button
                                            class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-sm"><i
                                                class="fas fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 border-b border-gray-100">
                                <td class="p-3">
                                    <div class="text-sm font-medium text-gray-900">Konser Amal "Suara Hati"</div>
                                    <div class="text-xs text-gray-600">Aula Serbaguna, Surabaya</div>
                                </td>
                                <td class="p-3 text-sm text-gray-900">Musik</td>
                                <td class="p-3 text-sm text-gray-900">20 Agu 2025</td>
                                <td class="p-3"><span
                                        class="px-2 py-1 rounded-full bg-gray-100 text-gray-600 text-xs">Selesai</span>
                                </td>
                                <td class="p-3 text-sm text-gray-900">512</td>
                                <td class="p-3">
                                    <div class="flex gap-2">
                                        <a href="#"
                                            class="w-8 h-8 rounded-md bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-sm"><i
                                                class="fas fa-eye"></i></a>
                                        <a href="#"
                                            class="w-8 h-8 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-sm"><i
                                                class="fas fa-edit"></i></a>
                                        <button
                                            class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-sm"><i
                                                class="fas fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="flex justify-between items-center mt-5">
                    <div class="text-sm text-gray-600">Menampilkan 3 dari 24 hasil</div>
                    <div class="flex gap-2">
                        <a href="#"
                            class="w-9 h-9 flex items-center justify-center rounded-md bg-gray-100 text-gray-900 hover:bg-primary text-sm"><i
                                class="fas fa-chevron-left"></i></a>
                        <a href="#"
                            class="w-9 h-9 flex items-center justify-center rounded-md bg-primary text-gray-900 font-medium text-sm">1</a>
                        <a href="#"
                            class="w-9 h-9 flex items-center justify-center rounded-md bg-gray-100 text-gray-900 hover:bg-primary text-sm">2</a>
                        <a href="#"
                            class="w-9 h-9 flex items-center justify-center rounded-md bg-gray-100 text-gray-900 hover:bg-primary text-sm">3</a>
                        <a href="#"
                            class="w-9 h-9 flex items-center justify-center rounded-md bg-gray-100 text-gray-900 hover:bg-primary text-sm"><i
                                class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Detail Event Section -->
            <div class="bg-white rounded-lg p-6 shadow-sm">
                <h2 class="text-xl font-semibold flex items-center gap-2 text-gray-900 mb-6">
                    <i class="fas fa-info-circle text-primary text-lg"></i>
                    Detail Event: Pameran Seni Kontemporer 2025
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="bg-gray-50 rounded-lg p-5 border border-gray-200">
                        <h3 class="text-lg font-semibold flex items-center gap-2 text-gray-900 mb-4">
                            <i class="fas fa-map-marker-alt text-primary"></i>
                            Lokasi & Waktu
                        </h3>
                        <div class="space-y-3">
                            <div class="flex items-start">
                                <i class="fas fa-map-pin text-primary mt-1 mr-3"></i>
                                <div>
                                    <h4 class="font-medium text-gray-900">Lokasi</h4>
                                    <p class="text-sm text-gray-600">Galeri Nasional, Jakarta</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="far fa-calendar-alt text-primary mt-1 mr-3"></i>
                                <div>
                                    <h4 class="font-medium text-gray-900">Tanggal</h4>
                                    <p class="text-sm text-gray-600">06-10 September 2025</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="far fa-clock text-primary mt-1 mr-3"></i>
                                <div>
                                    <h4 class="font-medium text-gray-900">Waktu</h4>
                                    <p class="text-sm text-gray-600">09:00 - 17:00 WIB</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-lg p-5 border border-gray-200">
                        <h3 class="text-lg font-semibold flex items-center gap-2 text-gray-900 mb-4">
                            <i class="fas fa-tasks text-primary"></i>
                            Deskripsi & Agenda
                        </h3>
                        <div>
                            <h4 class="font-medium text-gray-900 mb-2">Deskripsi Event</h4>
                            <p class="text-sm text-gray-600 mb-4">Pameran seni kontemporer tahunan dengan karya
                                dari 20
                                seniman lokal. Agenda meliputi pembukaan pada 06 Sep 2025, 11:00 WIB.</p>

                            <h4 class="font-medium text-gray-900 mb-2">Agenda</h4>
                            <ul class="text-sm text-gray-600 list-disc pl-5">
                                <li>Pembukaan: 06 Sep 2025, 11:00 WIB</li>
                                <li>Diskusi Seni: 07 Sep 2025, 14:00 WIB</li>
                                <li>Workshop: 08 Sep 2025, 10:00 WIB</li>
                                <li>Penutupan: 10 Sep 2025, 16:00 WIB</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-gray-50 rounded-lg p-5 border border-gray-200">
                        <h3 class="text-lg font-semibold flex items-center gap-2 text-gray-900 mb-4">
                            <i class="fas fa-link text-primary"></i>
                            Event Terkait
                        </h3>
                        <ul class="text-sm text-gray-600 list-disc pl-5">
                            <li>Diskusi Seni Modern</li>
                            <li>Lokakarya Lukis</li>
                            <li>Pameran Fotografi Urban</li>
                        </ul>
                    </div>

                    <div class="bg-gray-50 rounded-lg p-5 border border-gray-200">
                        <h3 class="text-lg font-semibold flex items-center gap-2 text-gray-900 mb-4">
                            <i class="fas fa-comments text-primary"></i>
                            Komentar Terbaru
                        </h3>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div
                                    class="w-8 h-8 rounded-full bg-primary flex items-center justify-center text-white font-medium mr-3">
                                    A</div>
                                <div>
                                    <div class="flex items-center">
                                        <h4 class="font-medium text-gray-900">Andi</h4>
                                        <span class="text-xs text-gray-500 ml-2">10 menit lalu</span>
                                    </div>
                                    <p class="text-sm text-gray-600">"Bagus sekali pamerannya! Karya-karyanya
                                        sangat
                                        inspiratif."</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div
                                    class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center text-white font-medium mr-3">
                                    S</div>
                                <div>
                                    <div class="flex items-center">
                                        <h4 class="font-medium text-gray-900">Sari</h4>
                                        <span class="text-xs text-gray-500 ml-2">45 menit lalu</span>
                                    </div>
                                    <p class="text-sm text-gray-600">"Apakah ada tur khusus untuk pelajar? Saya
                                        ingin
                                        membawa siswa-siswa saya."</p>
                                </div>
                            </div>
                        </div>
                        <button
                            class="mt-4 text-primary hover:text-primary-dark text-sm font-medium flex items-center">
                            Lihat semua 5 komentar <i class="fas fa-chevron-right ml-1 text-xs"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Overlay Modal -->



        <script>
            // Fungsi untuk update waktu real-time
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

                document.getElementById('current-time').textContent = formattedDate;
            }

            // Update waktu setiap menit
            setInterval(updateDateTime, 60000);

            // Inisialisasi pertama kali
            updateDateTime();
        </script>
        <script src="//unpkg.com/alpinejs" defer></script>

    </body>
</x-admin-layout>
