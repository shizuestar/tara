<x-admin-layout>
    <div class="bg-gradient-to-b from-gray-50 to-gray-100 min-h-screen py-8 px-4 sm:px-6 lg:px-10">
        <div class="w-full max-w-7xl mx-auto bg-white rounded-xl p-6 sm:p-8 lg:p-10 shadow-lg">
            <div class="relative bottom-5  flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8 bg-white p-5 rounded-lg shadow-sm">
                <h1 class="text-2xl lg:text-3xl font-semibold flex items-center gap-3 text-gray-800" style="font-family: 'Space Grotesk', sans-serif;">
                    <i class="fas fa-palette text-yellow-500 text-xl"></i>
                    Detail Karya
                </h1>
                <div class="flex flex-wrap items-center gap-3">
                    <button id="edit-btn" class="bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-medium px-4 py-2 rounded-lg flex items-center gap-2 transition-all duration-300">
                        <i class="fas fa-edit text-xs"></i>
                        Edit
                    </button>
                    <button id="delete-btn" class="bg-red-600 hover:bg-red-700 text-white text-sm font-medium px-4 py-2 rounded-lg flex items-center gap-2 transition-all duration-300" onclick="showDeleteModal()">
                        <i class="fas fa-trash text-xs"></i>
                        Hapus
                    </button>
                    <div class="relative">
                        <select id="status-change" class="appearance-none bg-white border border-gray-200 rounded-lg pl-3 pr-8 py-2 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-amber-500 shadow-sm transition-all duration-300">
                            <option value="published">Tayang</option>
                            <option value="pending">Menunggu</option>
                            <option value="rejected">Ditolak</option>
                            <option value="draft">Draft</option>
                        </select>
                        <span class="absolute inset-y-0 right-2 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </span>
                    </div>
                </div>
            </div>

            <div class="mb-10 relative bottom-8">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                    <!-- Carousel -->
                    <div class="lg:col-span-6">
                        <div class="relative w-full h-[350px] sm:h-[450px] lg:h-[550px] overflow-hidden rounded-xl shadow-md">
                            <div id="carousel" class="flex transition-transform duration-500 ease-in-out h-full">
                                <img src="https://picsum.photos/1200/800?random=1" alt="Gambar Karya" class="w-full h-full object-cover flex-shrink-0 rounded-xl">
                                <img src="https://picsum.photos/1200/800?random=2" alt="Gambar Karya" class="w-full h-full object-cover flex-shrink-0 rounded-xl">
                                <img src="https://picsum.photos/1200/800?random=3" alt="Gambar Karya" class="w-full h-full object-cover flex-shrink-0 rounded-xl">
                                <img src="https://picsum.photos/1200/800?random=4" alt="Gambar Karya" class="w-full h-full object-cover flex-shrink-0 rounded-xl">
                                <img src="https://picsum.photos/1200/800?random=5" alt="Gambar Karya" class="w-full h-full object-cover flex-shrink-0 rounded-xl">
                            </div>
                            <button id="prev-btn" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-900 bg-opacity-60 text-white p-2 rounded-r-lg hover:bg-opacity-80 transition-all duration-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                </svg>
                            </button>
                            <button id="next-btn" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-900 bg-opacity-60 text-white p-2 rounded-l-lg hover:bg-opacity-80 transition-all duration-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>
                            <div class="absolute bottom-3 left-1/2 transform -translate-x-1/2 flex gap-2">
                                <div class="carousel-dot active" data-index="0"></div>
                                <div class="carousel-dot" data-index="1"></div>
                                <div class="carousel-dot" data-index="2"></div>
                                <div class="carousel-dot" data-index="3"></div>
                                <div class="carousel-dot" data-index="4"></div>
                            </div>
                        </div>
                        <div class="flex gap-2 mt-3 overflow-x-auto">
                            <img src="https://picsum.photos/1200/800?random=1" class="thumbnail w-14 h-14 sm:w-16 sm:h-16 object-cover rounded-lg active" data-index="0">
                            <img src="https://picsum.photos/1200/800?random=2" class="thumbnail w-14 h-14 sm:w-16 sm:h-16 object-cover rounded-lg" data-index="1">
                            <img src="https://picsum.photos/1200/800?random=3" class="thumbnail w-14 h-14 sm:w-16 sm:h-16 object-cover rounded-lg" data-index="2">
                            <img src="https://picsum.photos/1200/800?random=4" class="thumbnail w-14 h-14 sm:w-16 sm:h-16 object-cover rounded-lg" data-index="3">
                            <img src="https://picsum.photos/1200/800?random=5" class="thumbnail w-14 h-14 sm:w-16 sm:h-16 object-cover rounded-lg" data-index="4">
                        </div>
                    </div>
                    <!-- Details -->
                    <div class="lg:col-span-6">
                        <div id="view-mode">
                            <h2 id="gallery-title" class="text-xl sm:text-2xl font-semibold text-gray-800 mb-5" style="font-family: 'Space Grotesk', sans-serif;">Sunset at Bali Beach</h2>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-6">
                                <div>
                                    <label class="block text-xs font-medium text-gray-500 mb-1">Kategori</label>
                                    <div id="gallery-category" class="text-sm text-gray-800 font-medium">Fotografi</div>
                                </div>
                                <div>
                                    <label class="block text-xs font-medium text-gray-500 mb-1">Kreator</label>
                                    <div id="gallery-creator" class="text-sm text-gray-800 font-medium">Dewi Santika</div>
                                </div>
                                <div>
                                    <label class="block text-xs font-medium text-gray-500 mb-1">Tanggal</label>
                                    <div id="gallery-date" class="text-sm text-gray-800 font-medium">12 Agu 2023</div>
                                </div>
                                <div>
                                    <label class="block text-xs font-medium text-gray-500 mb-1">Status</label>
                                    <div id="gallery-status" class="px-3 py-1.5 rounded-full bg-amber-100 text-amber-700 text-xs font-semibold inline-block">Tayang</div>
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-500 mb-1">Deskripsi</label>
                                <div id="gallery-description" class="text-sm text-gray-700 leading-relaxed">Potret senja dengan nuansa hangat di tepi pantai Bali, menangkap keindahan alam dengan lensa 50mm. Karya ini menggambarkan harmoni warna oranye dan ungu di langit senja, dengan siluet pohon kelapa yang menambah kesan dramatis.</div>
                            </div>
                        </div>
                        <div id="edit-mode" class="hidden opacity-0 transition-all duration-500">
                            <div class="mb-5">
                                <label class="block text-xs font-medium text-gray-500 mb-1">Judul</label>
                                <input id="edit-title" type="text" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-amber-500 shadow-sm transition-all duration-300" value="Sunset at Bali Beach" />
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-5">
                                <div>
                                    <label class="block text-xs font-medium text-gray-500 mb-1">Kategori</label>
                                    <select id="edit-category" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-amber-500 shadow-sm transition-all duration-300">
                                        <option value="fotografi">Fotografi</option>
                                        <option value="desain">Desain</option>
                                        <option value="ilustrasi">Ilustrasi</option>
                                        <option value="koding">Koding</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-xs font-medium text-gray-500 mb-1">Kreator</label>
                                    <select id="edit-creator" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-amber-500 shadow-sm transition-all duration-300">
                                        <option value="1">Dewi Santika</option>
                                        <option value="2">Aldi Pratama</option>
                                        <option value="3">Rina Andriani</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-xs font-medium text-gray-500 mb-1">Tanggal</label>
                                    <input id="edit-date" type="date" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-amber-500 shadow-sm transition-all duration-300" value="2023-08-12" />
                                </div>
                                <div>
                                    <label class="block text-xs font-medium text-gray-500 mb-1">Status</label>
                                    <select id="edit-status" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-amber-500 shadow-sm transition-all duration-300">
                                        <option value="published">Tayang</option>
                                        <option value="pending">Menunggu</option>
                                        <option value="rejected">Ditolak</option>
                                        <option value="draft">Draft</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-500 mb-1">Deskripsi</label>
                                <textarea id="edit-description" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-amber-500 shadow-sm transition-all duration-300" rows="5">Potret senja dengan nuansa hangat di tepi pantai Bali, menangkap keindahan alam dengan lensa 50mm. Karya ini menggambarkan harmoni warna oranye dan ungu di langit senja, dengan siluet pohon kelapa yang menambah kesan dramatis.</textarea>
                            </div>
                            <div class="flex gap-3 mt-5">
                                <button id="save-btn" class="bg-amber-600 hover:bg-amber-700 text-white text-sm font-medium px-5 py-2 rounded-lg transition-all duration-300">Simpan</button>
                                <button id="cancel-btn" class="bg-gray-600 hover:bg-gray-700 text-white text-sm font-medium px-5 py-2 rounded-lg transition-all duration-300">Batal</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Comments Section -->
            <div>
                <style>
                    .comment-scroll::-webkit-scrollbar {
                        width: 6px;
                    }
                    .comment-scroll::-webkit-scrollbar-track {
                        background: #f3f4f6;
                        border-radius: 3px;
                    }
                    .comment-scroll::-webkit-scrollbar-thumb {
                        background: #4b5563;
                        border-radius: 3px;
                    }
                    .comment-scroll::-webkit-scrollbar-thumb:hover {
                        background: #374151;
                    }
                    .comment-scroll {
                        scrollbar-color: #4b5563 #f3f4f6;
                        scrollbar-width: thin;
                    }
                    .comment-table td {
                        vertical-align: top;
                        word-wrap: break-word;
                    }
                    .comment-table {
                        table-layout: fixed;
                    }
                </style>
                <div class="flex justify-between items-center mb-5">
                    <h2 class="text-lg sm:text-xl font-semibold text-gray-800" style="font-family: 'Space Grotesk', sans-serif;">Komentar</h2>
                    <div class="text-sm text-gray-500 font-medium" id="comment-count">4 Komentar</div>
                </div>
                <div class="comment-scroll max-h-[350px] overflow-y-auto rounded-lg shadow-sm bg-gray-50 p-4">
                    <table class="w-full border-collapse comment-table">
                        <thead>
                            <tr class="bg-gray-100 rounded-t-lg">
                                <th class="p-3 text-left text-xs font-semibold text-gray-500 w-1/5">Pengguna</th>
                                <th class="p-3 text-left text-xs font-semibold text-gray-500 w-3/5">Komentar</th>
                                <th class="p-3 text-left text-xs font-semibold text-gray-500 w-1/5">Tanggal</th>
                                <th class="p-3 text-left text-xs font-semibold text-gray-500 w-10">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="comment-list" class="divide-y divide-gray-200">
                            <tr class="hover:bg-gray-100 transition-all duration-300">
                                <td class="p-3 text-sm text-gray-800">Adi Nugroho</td>
                                <td class="p-3 text-sm text-gray-800">Sunset-nya sangat memukau! Warna langitnya begitu hidup.</td>
                                <td class="p-3 text-sm text-gray-800">12 Agu 2023, 10:00</td>
                                <td class="p-3">
                                    <a href="#" class="w-8 h-8 rounded-lg bg-red-600 text-white flex items-center justify-center hover:bg-red-700 text-sm transition-all duration-300" onclick="deleteComment(101)"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-100 transition-all duration-300">
                                <td class="p-3 text-sm text-gray-800">Siti Aisyah</td>
                                <td class="p-3 text-sm text-gray-800">Apa lensa yang digunakan untuk menangkap detail ini? Keren banget!</td>
                                <td class="p-3 text-sm text-gray-800">12 Agu 2023, 12:30</td>
                                <td class="p-3">
                                    <a href="#" class="w-8 h-8 rounded-lg bg-red-600 text-white flex items-center justify-center hover:bg-red-700 text-sm transition-all duration-300" onclick="deleteComment(102)"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-100 transition-all duration-300">
                                <td class="p-3 text-sm text-gray-800">Budi Santoso</td>
                                <td class="p-3 text-sm text-gray-800">Karya ini bikin saya ingin langsung ke Bali! 😍</td>
                                <td class="p-3 text-sm text-gray-800">13 Agu 2023, 09:15</td>
                                <td class="p-3">
                                    <a href="#" class="w-8 h-8 rounded-lg bg-red-600 text-white flex items-center justify-center hover:bg-red-700 text-sm transition-all duration-300" onclick="deleteComment(103)"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-100 transition-all duration-300">
                                <td class="p-3 text-sm text-gray-800">Lina Marlina</td>
                                <td class="p-3 text-sm text-gray-800">Komposisi fotonya sangat seimbang, siluetnya menambah estetika.</td>
                                <td class="p-3 text-sm text-gray-800">13 Agu 2023, 14:20</td>
                                <td class="p-3">
                                    <a href="#" class="w-8 h-8 rounded-lg bg-red-600 text-white flex items-center justify-center hover:bg-red-700 text-sm transition-all duration-300" onclick="deleteComment(104)"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Delete Modal -->
            <div class="hidden fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50 opacity-0 transition-all duration-500" id="deleteModal">
                <div class="bg-white rounded-xl p-5 w-full max-w-sm shadow-xl transform scale-95 transition-transform duration-300">
                    <div class="flex justify-between items-center mb-3 border-b border-gray-200 pb-2">
                        <h3 class="text-lg font-semibold text-gray-800" style="font-family: 'Space Grotesk', sans-serif;">Hapus Karya</h3>
                        <button class="text-lg text-gray-500 hover:text-gray-800 transition-all duration-300" onclick="closeDeleteModal()">&times;</button>
                    </div>
                    <div class="mb-5 text-sm text-gray-600 leading-relaxed">
                        <p class="mb-2">Yakin ingin menghapus karya <strong id="deleteArtworkName">Sunset at Bali Beach</strong>?</p>
                        <p>Tindakan ini tidak dapat dibatalkan.</p>
                    </div>
                    <div class="flex justify-end gap-3">
                        <button class="bg-gray-600 hover:bg-gray-700 text-white text-sm font-medium px-4 py-2 rounded-lg transition-all duration-300" onclick="closeDeleteModal()">Batal</button>
                        <button class="bg-red-600 hover:bg-red-700 text-white text-sm font-medium px-4 py-2 rounded-lg transition-all duration-300">Hapus</button>
                    </div>
                </div>
            </div>

            @push('styles')
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap');

                :root {
                    --amber-accent: #f59e0b;
                    --gray-dark: #1f2937;
                    --gray-muted: #6b7280;
                }

                body {
                    font-family: 'Space Grotesk', sans-serif;
                    background: #f9fafb;
                    color: var(--gray-dark);
                }

                h1, h2, h3, label, input, select, textarea, button {
                    font-family: 'Space Grotesk', sans-serif;
                }

                .transition-all {
                    transition: all 0.3s ease;
                }

                select {
                    background-image: none;
                }

                input:focus, select:focus, textarea:focus {
                    box-shadow: 0 0 0 2px rgba(245, 158, 11, 0.3);
                }

                .rounded-xl {
                    border-radius: 0.75rem;
                }

                .shadow-lg {
                    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                }

                .shadow-xl {
                    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.12);
                }

                .carousel-dot {
                    width: 8px;
                    height: 8px;
                    background-color: #d1d5db;
                    border-radius: 50%;
                    transition: background-color 0.3s ease;
                }

                .carousel-dot.active {
                    background-color: var(--amber-accent);
                }

                .thumbnail {
                    cursor: pointer;
                    opacity: 0.7;
                    transition: opacity 0.3s ease, transform 0.3s ease;
                }

                .thumbnail.active {
                    opacity: 1;
                    transform: scale(1.05);
                    border: 2px solid var(--amber-accent);
                }

                .thumbnail:hover {
                    opacity: 0.9;
                }

                @media (max-width: 640px) {
                    .sm\:grid-cols-2 {
                        grid-template-columns: 1fr;
                    }
                    .comment-table td {
                        font-size: 0.75rem;
                    }
                }
            </style>
            @endpush

            @push('scripts')
            <script>
                // Utility Function for Date Formatting
                function fmtDateISOtoDisplay(iso) {
                    if (!iso) return "";
                    const d = new Date(iso);
                    return d.toLocaleDateString('id-ID', { day: 'numeric', month: 'short', year: 'numeric', hour: '2-digit', minute: '2-digit' });
                }

                // Carousel Functionality
                let currentIndex = 0;
                const carousel = document.getElementById('carousel');
                const dotsContainer = document.querySelector('#carousel ~ .absolute.bottom-3');
                const thumbnailsContainer = document.querySelector('#carousel ~ .absolute.bottom-3 ~ .flex');

                function updateCarousel() {
                    carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
                    document.querySelectorAll('.carousel-dot').forEach((dot, index) => {
                        dot.classList.toggle('active', index === currentIndex);
                    });
                    document.querySelectorAll('.thumbnail').forEach((thumb, index) => {
                        thumb.classList.toggle('active', index === currentIndex);
                    });
                }

                document.getElementById('prev-btn').addEventListener('click', () => {
                    currentIndex = (currentIndex - 1 + 5) % 5; // 5 is the number of images
                    updateCarousel();
                });

                document.getElementById('next-btn').addEventListener('click', () => {
                    currentIndex = (currentIndex + 1) % 5; // 5 is the number of images
                    updateCarousel();
                });

                dotsContainer.addEventListener('click', (e) => {
                    if (e.target.classList.contains('carousel-dot')) {
                        currentIndex = Number(e.target.dataset.index);
                        updateCarousel();
                    }
                });

                thumbnailsContainer.addEventListener('click', (e) => {
                    if (e.target.classList.contains('thumbnail')) {
                        currentIndex = Number(e.target.dataset.index);
                        updateCarousel();
                    }
                });

                // Edit Mode Toggle
                const viewMode = document.getElementById('view-mode');
                const editMode = document.getElementById('edit-mode');
                document.getElementById('edit-btn').addEventListener('click', () => {
                    viewMode.classList.add('hidden', 'opacity-0');
                    editMode.classList.remove('hidden');
                    setTimeout(() => editMode.classList.remove('opacity-0'), 50);
                });
                document.getElementById('cancel-btn').addEventListener('click', () => {
                    editMode.classList.add('opacity-0');
                    setTimeout(() => {
                        editMode.classList.add('hidden');
                        viewMode.classList.remove('hidden', 'opacity-0');
                    }, 300);
                });
                document.getElementById('save-btn').addEventListener('click', () => {
                    console.log('Saving:', {
                        title: document.getElementById('edit-title').value,
                        category: document.getElementById('edit-category').value,
                        creator: document.getElementById('edit-creator').value,
                        date: document.getElementById('edit-date').value,
                        status: document.getElementById('edit-status').value,
                        description: document.getElementById('edit-description').value,
                    });
                    editMode.classList.add('opacity-0');
                    setTimeout(() => {
                        editMode.classList.add('hidden');
                        viewMode.classList.remove('hidden', 'opacity-0');
                    }, 300);
                });

                // Status Change Animation
                const statusSelect = document.getElementById('status-change');
                statusSelect.addEventListener('click', () => {
                    statusSelect.classList.add('scale-95');
                    setTimeout(() => statusSelect.classList.remove('scale-95'), 200);
                });
                statusSelect.addEventListener('change', (e) => {
                    console.log('Changing status to:', e.target.value);
                    document.getElementById('gallery-status').textContent = {
                        published: 'Tayang',
                        pending: 'Menunggu',
                        rejected: 'Ditolak',
                        draft: 'Draft'
                    }[e.target.value];
                    document.getElementById('gallery-status').className = `px-3 py-1.5 rounded-full text-xs font-semibold inline-block ${
                        e.target.value === 'published' ? 'bg-amber-100 text-amber-700' :
                        e.target.value === 'pending' ? 'bg-yellow-100 text-yellow-700' :
                        e.target.value === 'rejected' ? 'bg-red-100 text-red-700' : 'bg-gray-200 text-gray-700'
                    }`;
                });

                // Delete Modal
                function showDeleteModal() {
                    document.getElementById('deleteModal').classList.remove('hidden');
                    setTimeout(() => {
                        document.getElementById('deleteModal').classList.add('opacity-100');
                        document.querySelector('#deleteModal .transform').classList.remove('scale-95');
                    }, 50);
                }
                function closeDeleteModal() {
                    document.getElementById('deleteModal').classList.remove('opacity-100');
                    document.querySelector('#deleteModal .transform').classList.add('scale-95');
                    setTimeout(() => document.getElementById('deleteModal').classList.add('hidden'), 300);
                }
                document.getElementById('deleteModal').addEventListener('click', (e) => {
                    if (e.target === document.getElementById('deleteModal')) closeDeleteModal();
                });

                // Delete Comment
                function deleteComment(id) {
                    console.log('Deleting comment:', id);
                }
            </script>
            @endpush
        </div>
    </x-admin-layout>