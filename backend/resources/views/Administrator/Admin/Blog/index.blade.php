<x-admin-layout>
    <div class="bg-white rounded-lg p-6 shadow-sm border border-gray-200">
        <!-- Page Header -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
            <h1 class="text-2xl font-bold flex items-center gap-2 text-gray-900" style="font-family: 'Space Grotesk', sans-serif;">
                <i class="fas fa-blog text-yellow-400 text-xl"></i>
                Manajemen Blog
            </h1>
            <div class="flex gap-3 flex-wrap">
                <button onclick="showCreateModal()" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors">
                    <i class="fas fa-plus text-sm"></i>
                    Tambah Blog Baru
                </button>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="bg-white rounded-lg p-5 mb-8 border border-gray-200">
            <h3 class="text-lg font-semibold flex items-center gap-2 mb-4 text-gray-900" style="font-family: 'Space Grotesk', sans-serif;">
                <i class="fas fa-filter text-yellow-400 text-base"></i>
                Filter Blog
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div>
                    <label for="type-filter" class="block text-sm font-medium text-gray-700 mb-1.5">Tipe</label>
                    <select id="type-filter" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                        <option value="">Semua Tipe</option>
                        <option value="public">Publik</option>
                        <option value="private">Privat</option>
                    </select>
                </div>
                <div>
                    <label for="category-filter" class="block text-sm font-medium text-gray-700 mb-1.5">Kategori</label>
                    <select id="category-filter" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                        <option value="">Semua Kategori</option>
                        <option value="Puisi">Puisi</option>
                        <option value="Desain">Desain</option>
                        <option value="Musik">Musik</option>
                        <option value="Coding">Coding</option>
                        <option value="Fotografi">Fotografi</option>
                        <option value="Umum">Umum</option>
                    </select>
                </div>
                <div>
                    <label for="status-filter" class="block text-sm font-medium text-gray-700 mb-1.5">Status</label>
                    <select id="status-filter" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                        <option value="">Semua Status</option>
                        <option value="published">Diterbitkan</option>
                        <option value="draft">Draf</option>
                    </select>
                </div>
                <div>
                    <label for="keyword-filter" class="block text-sm font-medium text-gray-700 mb-1.5">Kata Kunci</label>
                    <input id="keyword-filter" type="text" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Cari judul atau konten...">
                </div>
            </div>
            <div class="flex gap-3 mt-4">
                <button class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors">
                    <i class="fas fa-filter text-sm"></i>
                    Terapkan
                </button>
                <button class="bg-gray-100 hover:bg-gray-200 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors">
                    <i class="fas fa-redo text-sm"></i>
                    Reset
                </button>
            </div>
        </div>

        <!-- Grid View -->
        <div class="bg-white rounded-lg p-5 mb-8 border border-gray-200">
            <div class="flex justify-between items-center gap-4 mb-5">
                <h2 class="text-lg font-semibold text-gray-900" style="font-family: 'Space Grotesk', sans-serif;">Daftar Blog</h2>
                <div class="text-sm text-gray-600">Menampilkan 6 dari 20 blog</div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Blog 1 -->
                <div class="bg-white rounded-lg border border-gray-200 overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                    <div class="relative">
                        <img src="https://picsum.photos/600/400?poetry" alt="Cover Puisi Modern" class="w-full blog-cover">
                        <img src="https://picsum.photos/id/101/100/100" alt="Avatar Penulis" class="rounded-full blog-avatar relative z-10 ml-4">
                    </div>
                    <div class="p-3">
                        <h3 class="font-semibold text-gray-900 mb-1 text-sm" style="font-family: 'Space Grotesk', sans-serif;">Puisi Modern</h3>
                        <p class="text-xs text-gray-600 mb-2">Eksplorasi puisi modern dengan gaya baru...</p>
                        <div class="flex justify-between items-center mb-2">
                            <div class="flex items-center text-xs text-gray-600">
                                <i class="fas fa-user mr-1"></i>
                                <span>Rudi Santoso</span>
                            </div>
                            <span class="px-2 py-1 rounded-full bg-green-100 text-green-600 text-xs">Diterbitkan</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-xs text-gray-600">Publik</span>
                            <div class="flex gap-2">
                                <button class="w-8 h-8 rounded-md bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-xs" aria-label="Lihat Puisi Modern"><i class="fas fa-eye"></i></button>
                                <button onclick="showEditModal(1)" class="w-8 h-8 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-xs" aria-label="Edit Puisi Modern"><i class="fas fa-edit"></i></button>
                                <button class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-xs" onclick="showDeleteModal('Puisi Modern')" aria-label="Hapus Puisi Modern"><i class="fas fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Blog 2 -->
                <div class="bg-white rounded-lg border border-gray-200 overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                    <div class="relative">
                        <img src="https://picsum.photos/600/400?design" alt="Cover Tren Desain 2025" class="w-full blog-cover">
                        <img src="https://picsum.photos/id/103/100/100" alt="Avatar Penulis" class="rounded-full blog-avatar relative z-10 ml-4">
                    </div>
                    <div class="p-3">
                        <h3 class="font-semibold text-gray-900 mb-1 text-sm" style="font-family: 'Space Grotesk', sans-serif;">Tren Desain 2025</h3>
                        <p class="text-xs text-gray-600 mb-2">Melihat tren desain grafis untuk tahun depan...</p>
                        <div class="flex justify-between items-center mb-2">
                            <div class="flex items-center text-xs text-gray-600">
                                <i class="fas fa-user mr-1"></i>
                                <span>Lina Wijaya</span>
                            </div>
                            <span class="px-2 py-1 rounded-full bg-green-100 text-green-600 text-xs">Diterbitkan</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-xs text-gray-600">Publik</span>
                            <div class="flex gap-2">
                                <button class="w-8 h-8 rounded-md bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-xs" aria-label="Lihat Tren Desain 2025"><i class="fas fa-eye"></i></button>
                                <button onclick="showEditModal(2)" class="w-8 h-8 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-xs" aria-label="Edit Tren Desain 2025"><i class="fas fa-edit"></i></button>
                                <button class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-xs" onclick="showDeleteModal('Tren Desain 2025')" aria-label="Hapus Tren Desain 2025"><i class="fas fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Blog 3 -->
                <div class="bg-white rounded-lg border border-gray-200 overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                    <div class="relative">
                        <img src="https://picsum.photos/600/400?music" alt="Cover Musik Indie" class="w-full blog-cover">
                        <img src="https://picsum.photos/id/105/100/100" alt="Avatar Penulis" class="rounded-full blog-avatar relative z-10 ml-4">
                    </div>
                    <div class="p-3">
                        <h3 class="font-semibold text-gray-900 mb-1 text-sm" style="font-family: 'Space Grotesk', sans-serif;">Musik Indie</h3>
                        <p class="text-xs text-gray-600 mb-2">Mengupas pesona musik indie lokal...</p>
                        <div class="flex justify-between items-center mb-2">
                            <div class="flex items-center text-xs text-gray-600">
                                <i class="fas fa-user mr-1"></i>
                                <span>Aryo Pratama</span>
                            </div>
                            <span class="px-2 py-1 rounded-full bg-yellow-100 text-yellow-600 text-xs">Draf</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-xs text-gray-600">Privat</span>
                            <div class="flex gap-2">
                                <button class="w-8 h-8 rounded-md bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-xs" aria-label="Lihat Musik Indie"><i class="fas fa-eye"></i></button>
                                <button onclick="showEditModal(3)" class="w-8 h-8 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-xs" aria-label="Edit Musik Indie"><i class="fas fa-edit"></i></button>
                                <button class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-xs" onclick="showDeleteModal('Musik Indie')" aria-label="Hapus Musik Indie"><i class="fas fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Blog 4 -->
                <div class="bg-white rounded-lg border border-gray-200 overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                    <div class="relative">
                        <img src="https://picsum.photos/600/400?coding" alt="Cover Coding Tips" class="w-full blog-cover">
                        <img src="https://picsum.photos/id/107/100/100" alt="Avatar Penulis" class="rounded-full blog-avatar relative z-10 ml-4">
                    </div>
                    <div class="p-3">
                        <h3 class="font-semibold text-gray-900 mb-1 text-sm" style="font-family: 'Space Grotesk', sans-serif;">Coding Tips</h3>
                        <p class="text-xs text-gray-600 mb-2">Tips dan trik untuk coding lebih efisien...</p>
                        <div class="flex justify-between items-center mb-2">
                            <div class="flex items-center text-xs text-gray-600">
                                <i class="fas fa-user mr-1"></i>
                                <span>Sari Indah</span>
                            </div>
                            <span class="px-2 py-1 rounded-full bg-green-100 text-green-600 text-xs">Diterbitkan</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-xs text-gray-600">Publik</span>
                            <div class="flex gap-2">
                                <button class="w-8 h-8 rounded-md bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-xs" aria-label="Lihat Coding Tips"><i class="fas fa-eye"></i></button>
                                <button onclick="showEditModal(4)" class="w-8 h-8 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-xs" aria-label="Edit Coding Tips"><i class="fas fa-edit"></i></button>
                                <button class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-xs" onclick="showDeleteModal('Coding Tips')" aria-label="Hapus Coding Tips"><i class="fas fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Blog 5 -->
                <div class="bg-white rounded-lg border border-gray-200 overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                    <div class="relative">
                        <img src="https://picsum.photos/600/400?writing" alt="Cover Menulis Kreatif" class="w-full blog-cover">
                        <img src="https://picsum.photos/id/109/100/100" alt="Avatar Penulis" class="rounded-full blog-avatar relative z-10 ml-4">
                    </div>
                    <div class="p-3">
                        <h3 class="font-semibold text-gray-900 mb-1 text-sm" style="font-family: 'Space Grotesk', sans-serif;">Menulis Kreatif</h3>
                        <p class="text-xs text-gray-600 mb-2">Cara menulis cerita yang memikat...</p>
                        <div class="flex justify-between items-center mb-2">
                            <div class="flex items-center text-xs text-gray-600">
                                <i class="fas fa-user mr-1"></i>
                                <span>Dewi Lestari</span>
                            </div>
                            <span class="px-2 py-1 rounded-full bg-green-100 text-green-600 text-xs">Diterbitkan</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-xs text-gray-600">Privat</span>
                            <div class="flex gap-2">
                                <button class="w-8 h-8 rounded-md bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-xs" aria-label="Lihat Menulis Kreatif"><i class="fas fa-eye"></i></button>
                                <button onclick="showEditModal(5)" class="w-8 h-8 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-xs" aria-label="Edit Menulis Kreatif"><i class="fas fa-edit"></i></button>
                                <button class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-xs" onclick="showDeleteModal('Menulis Kreatif')" aria-label="Hapus Menulis Kreatif"><i class="fas fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Blog 6 -->
                <div class="bg-white rounded-lg border border-gray-200 overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                    <div class="relative">
                        <img src="https://picsum.photos/600/400?uiux" alt="Cover Desain UI/UX" class="w-full blog-cover">
                        <img src="https://picsum.photos/id/111/100/100" alt="Avatar Penulis" class="rounded-full blog-avatar relative z-10 ml-4">
                    </div>
                    <div class="p-3">
                        <h3 class="font-semibold text-gray-900 mb-1 text-sm" style="font-family: 'Space Grotesk', sans-serif;">Desain UI/UX</h3>
                        <p class="text-xs text-gray-600 mb-2">Mendesain antarmuka pengguna modern...</p>
                        <div class="flex justify-between items-center mb-2">
                            <div class="flex items-center text-xs text-gray-600">
                                <i class="fas fa-user mr-1"></i>
                                <span>Rian Nugraha</span>
                            </div>
                            <span class="px-2 py-1 rounded-full bg-green-100 text-green-600 text-xs">Diterbitkan</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-xs text-gray-600">Publik</span>
                            <div class="flex gap-2">
                                <button class="w-8 h-8 rounded-md bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-xs" aria-label="Lihat Desain UI/UX"><i class="fas fa-eye"></i></button>
                                <button onclick="showEditModal(6)" class="w-8 h-8 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-xs" aria-label="Edit Desain UI/UX"><i class="fas fa-edit"></i></button>
                                <button class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-xs" onclick="showDeleteModal('Desain UI/UX')" aria-label="Hapus Desain UI/UX"><i class="fas fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="flex justify-center mt-5 gap-2">
            <a href="#" class="w-9 h-9 flex items-center justify-center rounded-md bg-white border border-gray-200 text-gray-900 hover:bg-yellow-400 hover:border-yellow-400 text-sm" aria-label="Previous page"><i class="fas fa-chevron-left"></i></a>
            <a href="#" class="w-9 h-9 flex items-center justify-center rounded-md bg-yellow-400 text-gray-900 font-medium border border-yellow-400 text-sm" aria-label="Page 1">1</a>
            <a href="#" class="w-9 h-9 flex items-center justify-center rounded-md bg-white border border-gray-200 text-gray-900 hover:bg-yellow-400 hover:border-yellow-400 text-sm" aria-label="Page 2">2</a>
            <a href="#" class="w-9 h-9 flex items-center justify-center rounded-md bg-white border border-gray-200 text-gray-900 hover:bg-yellow-400 hover:border-yellow-400 text-sm" aria-label="Page 3">3</a>
            <span class="flex items-center px-3 text-gray-600 text-sm">...</span>
            <a href="#" class="w-9 h-9 flex items-center justify-center rounded-md bg-white border border-gray-200 text-gray-900 hover:bg-yellow-400 hover:border-yellow-400 text-sm" aria-label="Page 5">5</a>
            <a href="#" class="w-9 h-9 flex items-center justify-center rounded-md bg-white border border-gray-200 text-gray-900 hover:bg-yellow-400 hover:border-yellow-400 text-sm" aria-label="Next page"><i class="fas fa-chevron-right"></i></a>
        </div>

        <!-- Modal Create Blog -->
        <div class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4" id="createModal">
            <div class="bg-white rounded-lg p-6 w-full max-w-4xl max-h-screen overflow-y-auto">
                <div class="flex justify-between items-center mb-4 border-b border-gray-200 pb-3">
                    <h3 class="text-lg font-semibold text-gray-900" style="font-family: 'Space Grotesk', sans-serif;">Tambah Blog Baru</h3>
                    <button class="text-xl text-gray-600 hover:text-gray-900" onclick="closeCreateModal()" aria-label="Tutup modal">&times;</button>
                </div>
                <form id="createBlogForm" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-1.5">Judul Blog *</label>
                        <input type="text" id="title" name="title" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Masukkan judul blog" required>
                    </div>
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-1.5">Kategori *</label>
                        <select id="category" name="category" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                            <option value="">Pilih Kategori</option>
                            <option value="Puisi">Puisi</option>
                            <option value="Desain">Desain</option>
                            <option value="Musik">Musik</option>
                            <option value="Coding">Coding</option>
                            <option value="Fotografi">Fotografi</option>
                            <option value="Umum">Umum</option>
                        </select>
                    </div>
                    <div class="md:col-span-2">
                        <label for="content" class="block text-sm font-medium text-gray-700 mb-1.5">Konten *</label>
                        <div id="create_content" class="border border-gray-200 rounded-md"></div>
                        <input type="hidden" name="content" id="create_content_hidden">
                    </div>
                    <div>
                        <label for="cover_image" class="block text-sm font-medium text-gray-700 mb-1.5">URL Gambar Cover *</label>
                        <input type="url" id="cover_image" name="cover_image" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="https://..." required>
                    </div>
                    <div>
                        <label for="author" class="block text-sm font-medium text-gray-700 mb-1.5">Penulis *</label>
                        <input type="text" id="author" name="author" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Masukkan nama penulis" required>
                    </div>
                    <div>
                        <label for="created_date" class="block text-sm font-medium text-gray-700 mb-1.5">Tanggal Dibuat *</label>
                        <input type="text" id="created_date" name="created_date" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Contoh: Januari 2023" required>
                    </div>
                    <div>
                        <label for="type" class="block text-sm font-medium text-gray-700 mb-1.5">Tipe Blog *</label>
                        <select id="type" name="type" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                            <option value="public">Publik</option>
                            <option value="private">Privat</option>
                        </select>
                    </div>
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-1.5">Status *</label>
                        <select id="status" name="status" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                            <option value="published">Diterbitkan</option>
                            <option value="draft">Draf</option>
                        </select>
                    </div>
                    <div>
                        <label for="tags" class="block text-sm font-medium text-gray-700 mb-1.5">Tag (pisahkan dengan koma)</label>
                        <input type="text" id="tags" name="tags" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Contoh: puisi, inspirasi, kreativitas">
                    </div>
                    <div class="md:col-span-2 flex justify-end gap-3 mt-4">
                        <button type="button" class="bg-gray-100 hover:bg-gray-200 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors" onclick="closeCreateModal()">
                            <i class="fas fa-times text-sm"></i>
                            Batal
                        </button>
                        <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors">
                            <i class="fas fa-save text-sm"></i>
                            Simpan
                        </button>
                    </div>
                </form>
                <div id="createError" class="hidden mt-4 p-3 bg-red-100 text-red-700 rounded-md text-sm"></div>
                <div id="createLoading" class="hidden mt-4 p-3 bg-blue-100 text-blue-700 rounded-md text-sm flex items-center gap-2">
                    <i class="fas fa-spinner fa-spin"></i> Menyimpan...
                </div>
            </div>
        </div>

        <!-- Modal Edit Blog -->
        <div class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4" id="editModal">
            <div class="bg-white rounded-lg p-6 w-full max-w-4xl max-h-screen overflow-y-auto">
                <div class="flex justify-between items-center mb-4 border-b border-gray-200 pb-3">
                    <h3 class="text-lg font-semibold text-gray-900" style="font-family: 'Space Grotesk', sans-serif;">Edit Blog</h3>
                    <button class="text-xl text-gray-600 hover:text-gray-900" onclick="closeEditModal()" aria-label="Tutup modal">&times;</button>
                </div>
                <form id="editBlogForm" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <input type="hidden" id="edit_id" name="id">
                    <div>
                        <label for="edit_title" class="block text-sm font-medium text-gray-700 mb-1.5">Judul Blog *</label>
                        <input type="text" id="edit_title" name="title" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Masukkan judul blog" required>
                    </div>
                    <div>
                        <label for="edit_category" class="block text-sm font-medium text-gray-700 mb-1.5">Kategori *</label>
                        <select id="edit_category" name="category" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                            <option value="">Pilih Kategori</option>
                            <option value="Puisi">Puisi</option>
                            <option value="Desain">Desain</option>
                            <option value="Musik">Musik</option>
                            <option value="Coding">Coding</option>
                            <option value="Fotografi">Fotografi</option>
                            <option value="Umum">Umum</option>
                        </select>
                    </div>
                    <div class="md:col-span-2">
                        <label for="edit_content" class="block text-sm font-medium text-gray-700 mb-1.5">Konten *</label>
                        <div id="edit_content" class="border border-gray-200 rounded-md"></div>
                        <input type="hidden" name="content" id="edit_content_hidden">
                    </div>
                    <div>
                        <label for="edit_cover_image" class="block text-sm font-medium text-gray-700 mb-1.5">URL Gambar Cover *</label>
                        <input type="url" id="edit_cover_image" name="cover_image" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="https://...">
                    </div>
                    <div>
                        <label for="edit_author" class="block text-sm font-medium text-gray-700 mb-1.5">Penulis *</label>
                        <input type="text" id="edit_author" name="author" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Masukkan nama penulis" required>
                    </div>
                    <div>
                        <label for="edit_created_date" class="block text-sm font-medium text-gray-700 mb-1.5">Tanggal Dibuat *</label>
                        <input type="text" id="edit_created_date" name="created_date" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Contoh: Januari 2023" required>
                    </div>
                    <div>
                        <label for="edit_type" class="block text-sm font-medium text-gray-700 mb-1.5">Tipe Blog *</label>
                        <select id="edit_type" name="type" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                            <option value="public">Publik</option>
                            <option value="private">Privat</option>
                        </select>
                    </div>
                    <div>
                        <label for="edit_status" class="block text-sm font-medium text-gray-700 mb-1.5">Status *</label>
                        <select id="edit_status" name="status" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                            <option value="published">Diterbitkan</option>
                            <option value="draft">Draf</option>
                        </select>
                    </div>
                    <div>
                        <label for="edit_tags" class="block text-sm font-medium text-gray-700 mb-1.5">Tag (pisahkan dengan koma)</label>
                        <input type="text" id="edit_tags" name="tags" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Contoh: puisi, inspirasi, kreativitas">
                    </div>
                    <div class="md:col-span-2 flex justify-end gap-3 mt-4">
                        <button type="button" class="bg-gray-100 hover:bg-gray-200 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors" onclick="closeEditModal()">
                            <i class="fas fa-times text-sm"></i>
                            Batal
                        </button>
                        <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors">
                            <i class="fas fa-save text-sm"></i>
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
                <div id="editError" class="hidden mt-4 p-3 bg-red-100 text-red-700 rounded-md text-sm"></div>
                <div id="editLoading" class="hidden mt-4 p-3 bg-blue-100 text-blue-700 rounded-md text-sm flex items-center gap-2">
                    <i class="fas fa-spinner fa-spin"></i> Menyimpan...
                </div>
            </div>
        </div>

        <!-- Modal Delete Blog -->
        <div class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" id="deleteModal">
            <div class="bg-white rounded-lg p-6 w-full max-w-4xl max-h-screen overflow-y-auto">
                <div class="flex justify-between items-center mb-4 border-b border-gray-200 pb-3">
                    <h3 class="text-lg font-semibold text-gray-900" style="font-family: 'Space Grotesk', sans-serif;">Hapus Blog</h3>
                    <button class="text-xl text-gray-600 hover:text-gray-900" onclick="closeDeleteModal()" aria-label="Tutup modal">&times;</button>
                </div>
                <div class="mb-4 text-sm text-gray-700">
                    <p class="mb-2">Apakah Anda yakin ingin menghapus blog <strong id="deleteBlogTitle"></strong>?</p>
                    <p>Tindakan ini tidak bisa dibatalkan, data akan hilang selamanya.</p>
                </div>
                <div class="flex justify-end gap-3">
                    <button class="bg-gray-100 hover:bg-gray-200 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors" onclick="closeDeleteModal()">
                        <i class="fas fa-times text-sm"></i>
                        Batal
                    </button>
                    <button class="bg-red-500 hover:bg-red-600 text-white text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors" onclick="deleteBlog()">
                        <i class="fas fa-trash text-sm"></i>
                        Hapus Blog
                    </button>
                </div>
                <div id="deleteError" class="hidden mt-4 p-3 bg-red-100 text-red-700 rounded-md text-sm"></div>
                <div id="deleteLoading" class="hidden mt-4 p-3 bg-blue-100 text-blue-700 rounded-md text-sm flex items-center gap-2">
                    <i class="fas fa-spinner fa-spin"></i> Menghapus...
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
        <style>
            .blog-cover {
                height: 120px;
                object-fit: cover;
            }
            .blog-avatar {
                width: 64px;
                height: 64px;
                object-fit: cover;
                border: 3px solid white;
                margin-top: -40px;
            }
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(10px); }
                to { opacity: 1; transform: translateY(0); }
            }
            .modal-open {
                animation: fadeIn 0.3s ease;
            }
            .ql-container {
                min-height: 120px;
                border-radius: 0 0 8px 8px;
                font-family: 'Space Grotesk', sans-serif;
            }
            .ql-toolbar {
                border-radius: 8px 8px 0 0;
            }
        </style>
    @endpush

    @push('scripts')
        <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
        <script>
            // Initialize Quill editors
            const createQuill = new Quill('#create_content', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        ['bold', 'italic', 'underline'],
                        ['link', 'image'],
                        [{ list: 'ordered' }, { list: 'bullet' }],
                        ['clean']
                    ]
                }
            });
            const editQuill = new Quill('#edit_content', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        ['bold', 'italic', 'underline'],
                        ['link', 'image'],
                        [{ list: 'ordered' }, { list: 'bullet' }],
                        ['clean']
                    ]
                }
            });

            // Sample blog data
            const blogs = [
                {
                    id: 1,
                    title: "Puisi Modern",
                    category: "Puisi",
                    content: "<p>Eksplorasi <b>puisi modern</b> dengan gaya baru yang memadukan emosi dan imajinasi.</p>",
                    cover_image: "https://picsum.photos/600/400?poetry",
                    author: "Rudi Santoso",
                    created_date: "Januari 2023",
                    type: "public",
                    status: "published",
                    tags: ["puisi", "kreativitas", "seni"]
                },
                {
                    id: 2,
                    title: "Tren Desain 2025",
                    category: "Desain",
                    content: "<p>Melihat <b>tren desain grafis</b> untuk tahun depan yang penuh inovasi.</p>",
                    cover_image: "https://picsum.photos/600/400?design",
                    author: "Lina Wijaya",
                    created_date: "Maret 2022",
                    type: "public",
                    status: "published",
                    tags: ["desain", "tren", "grafis"]
                },
                {
                    id: 3,
                    title: "Musik Indie",
                    category: "Musik",
                    content: "<p>Mengupas pesona <b>musik indie lokal</b> dan kolaborasi musisi muda.</p>",
                    cover_image: "https://picsum.photos/600/400?music",
                    author: "Aryo Pratama",
                    created_date: "Juni 2024",
                    type: "private",
                    status: "draft",
                    tags: ["musik", "indie", "kolaborasi"]
                },
                {
                    id: 4,
                    title: "Coding Tips",
                    category: "Coding",
                    content: "<p>Tips dan trik untuk <b>coding</b> lebih efisien menggunakan teknologi modern.</p>",
                    cover_image: "https://picsum.photos/600/400?coding",
                    author: "Sari Indah",
                    created_date: "Agustus 2023",
                    type: "public",
                    status: "published",
                    tags: ["coding", "teknologi", "programming"]
                },
                {
                    id: 5,
                    title: "Menulis Kreatif",
                    category: "Puisi",
                    content: "<p>Cara menulis <b>cerita</b> dan puisi yang memikat hati pembaca.</p>",
                    cover_image: "https://picsum.photos/600/400?writing",
                    author: "Dewi Lestari",
                    created_date: "Februari 2024",
                    type: "private",
                    status: "published",
                    tags: ["menulis", "kreatif", "puisi"]
                },
                {
                    id: 6,
                    title: "Desain UI/UX",
                    category: "Desain",
                    content: "<p>Mendesain <b>antarmuka pengguna</b> modern dengan fokus pada pengalaman pengguna.</p>",
                    cover_image: "https://picsum.photos/600/400?uiux",
                    author: "Rian Nugraha",
                    created_date: "November 2022",
                    type: "public",
                    status: "published",
                    tags: ["uiux", "desain", "ux"]
                }
            ];

            // Modal functions for Create
            function showCreateModal() {
                const modal = document.getElementById('createModal');
                modal.classList.remove('hidden');
                modal.classList.add('modal-open');
                document.getElementById('createBlogForm').reset();
                createQuill.setContents([]);
                hideError('createError');
                hideLoading('createLoading');
            }

            function closeCreateModal() {
                const modal = document.getElementById('createModal');
                modal.classList.add('hidden');
                modal.classList.remove('modal-open');
            }

            // Modal functions for Edit
            function showEditModal(blogId) {
                showLoading('editLoading');
                hideError('editError');
                const blog = blogs.find(b => b.id === blogId);
                if (blog) {
                    document.getElementById('edit_id').value = blog.id;
                    document.getElementById('edit_title').value = blog.title;
                    document.getElementById('edit_category').value = blog.category;
                    editQuill.root.innerHTML = blog.content;
                    document.getElementById('edit_cover_image').value = blog.cover_image;
                    document.getElementById('edit_author').value = blog.author;
                    document.getElementById('edit_created_date').value = blog.created_date;
                    document.getElementById('edit_type').value = blog.type;
                    document.getElementById('edit_status').value = blog.status;
                    document.getElementById('edit_tags').value = blog.tags ? blog.tags.join(', ') : '';
                    currentBlogTitle = blog.title;
                    const modal = document.getElementById('editModal');
                    modal.classList.remove('hidden');
                    modal.classList.add('modal-open');
                } else {
                    showError('editError', 'Blog tidak ditemukan');
                }
                hideLoading('editLoading');
            }

            function closeEditModal() {
                const modal = document.getElementById('editModal');
                modal.classList.add('hidden');
                modal.classList.remove('modal-open');
            }

            // Modal functions for Delete
            let currentBlogTitle = '';
            function showDeleteModal(blogTitle) {
                currentBlogTitle = blogTitle;
                const modal = document.getElementById('deleteModal');
                const blogTitleElement = document.getElementById('deleteBlogTitle');
                blogTitleElement.textContent = blogTitle;
                modal.classList.remove('hidden');
                modal.classList.add('modal-open');
                hideError('deleteError');
                hideLoading('deleteLoading');
            }

            function closeDeleteModal() {
                const modal = document.getElementById('deleteModal');
                modal.classList.add('hidden');
                modal.classList.remove('modal-open');
            }

            function deleteBlog() {
                showLoading('deleteLoading');
                hideError('deleteError');
                console.log('Deleting blog:', currentBlogTitle);
                closeDeleteModal();
                hideLoading('deleteLoading');
            }

            // Form submissions
            document.getElementById('createBlogForm').addEventListener('submit', function(e) {
                e.preventDefault();
                showLoading('createLoading');
                hideError('createError');
                const formData = new FormData(this);
                const tags = formData.get('tags').split(',').map(tag => tag.trim()).filter(tag => tag);
                const content = createQuill.root.innerHTML;
                document.getElementById('create_content_hidden').value = content;
                console.log('Creating new blog:', {
                    title: formData.get('title'),
                    category: formData.get('category'),
                    content: content,
                    cover_image: formData.get('cover_image'),
                    author: formData.get('author'),
                    created_date: formData.get('created_date'),
                    type: formData.get('type'),
                    status: formData.get('status'),
                    tags: tags
                });
                closeCreateModal();
                hideLoading('createLoading');
            });

            document.getElementById('editBlogForm').addEventListener('submit', function(e) {
                e.preventDefault();
                showLoading('editLoading');
                hideError('editError');
                const formData = new FormData(this);
                const tags = formData.get('tags').split(',').map(tag => tag.trim()).filter(tag => tag);
                const content = editQuill.root.innerHTML;
                document.getElementById('edit_content_hidden').value = content;
                console.log('Updating blog:', {
                    id: formData.get('id'),
                    title: formData.get('title'),
                    category: formData.get('category'),
                    content: content,
                    cover_image: formData.get('cover_image'),
                    author: formData.get('author'),
                    created_date: formData.get('created_date'),
                    type: formData.get('type'),
                    status: formData.get('status'),
                    tags: tags
                });
                closeEditModal();
                hideLoading('editLoading');
            });

            // Helper functions for loading and error states
            function showLoading(id) {
                document.getElementById(id).classList.remove('hidden');
            }

            function hideLoading(id) {
                document.getElementById(id).classList.add('hidden');
            }

            function showError(id, message) {
                const errorEl = document.getElementById(id);
                errorEl.textContent = message;
                errorEl.classList.remove('hidden');
            }

            function hideError(id) {
                document.getElementById(id).classList.add('hidden');
            }

            // Close modals when clicking outside
            window.onclick = function(event) {
                const createModal = document.getElementById('createModal');
                const editModal = document.getElementById('editModal');
                const deleteModal = document.getElementById('deleteModal');
                if (event.target === createModal) closeCreateModal();
                if (event.target === editModal) closeEditModal();
                if (event.target === deleteModal) closeDeleteModal();
            };

            // Close modals with Escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    closeCreateModal();
                    closeEditModal();
                    closeDeleteModal();
                }
            });
        </script>
    @endpush
</x-admin-layout>