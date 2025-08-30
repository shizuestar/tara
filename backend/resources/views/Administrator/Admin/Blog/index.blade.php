<x-admin-layout>
    <div class="ml-3 bg-white rounded-lg p-6 shadow-sm">

        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
            <h1 class="text-xl font-semibold flex items-center gap-2 text-gray-900">
                <i class="fas fa-blog text-yellow-400 text-lg"></i>
                Manajemen Artikel
            </h1>
            <a href="#" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-[12px] font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors">
                <i class="fas fa-plus text-[12px]"></i>
                Tambah Artikel Baru
            </a>
        </div>

        <!-- Filter Section -->
        <div class="bg-white rounded-lg p-5 mb-8 border border-gray-200">
            <h3 class="text-lg font-semibold flex items-center gap-2 mb-4 text-gray-900">
                <i class="fas fa-filter text-yellow-400 text-base"></i>
                Filter Artikel
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div>
                    <label for="category-filter" class="block text-[12px] font-medium text-gray-700 mb-1.5">Kategori</label>
                    <select id="category-filter" class="w-full p-2 border border-gray-200 rounded-md text-[12px] text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                        <option value="">Semua Kategori</option>
                        <option value="tech">Teknologi</option>
                        <option value="lifestyle">Gaya Hidup</option>
                        <option value="health">Kesehatan</option>
                        <option value="education">Pendidikan</option>
                    </select>
                </div>
                <div>
                    <label for="status-filter" class="block text-[12px] font-medium text-gray-700 mb-1.5">Status</label>
                    <select id="status-filter" class="w-full p-2 border border-gray-200 rounded-md text-[12px] text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                        <option value="">Semua Status</option>
                        <option value="draft">Draft</option>
                        <option value="published">Published</option>
                        <option value="archived">Archived</option>
                    </select>
                </div>
                <div>
                    <label for="author-filter" class="block text-[12px] font-medium text-gray-700 mb-1.5">Author</label>
                    <select id="author-filter" class="w-full p-2 border border-gray-200 rounded-md text-[12px] text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                        <option value="">Semua Author</option>
                        <option value="john-doe">John Doe</option>
                        <option value="jane-smith">Jane Smith</option>
                        <option value="alex-johnson">Alex Johnson</option>
                    </select>
                </div>
                <div>
                    <label for="keyword-filter" class="block text-[12px] font-medium text-gray-700 mb-1.5">Kata Kunci</label>
                    <input id="keyword-filter" type="text" class="w-full p-2 border border-gray-200 rounded-md text-[12px] text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Cari judul atau deskripsi...">
                </div>
            </div>
            <div class="flex gap-3 mt-4">
                <button class="bg-gray-100 hover:bg-gray-200 text-gray-900 text-[12px] font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors">
                    <i class="fas fa-filter text-[12px]"></i>
                    Terapkan
                </button>
                <button class="bg-gray-100 hover:bg-gray-200 text-gray-900 text-[12px] font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors">
                    <i class="fas fa-redo text-[12px]"></i>
                    Reset
                </button>
            </div>
        </div>

        <!-- Article List Section -->
        <div class="bg-white rounded-lg p-5 border border-gray-200">
            <div class="flex justify-between items-center gap-4 mb-5">
                <h2 class="text-lg font-semibold text-gray-900">Daftar Artikel</h2>
                <div class="text-[12px] text-gray-600">Menampilkan 5 dari 20 artikel</div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="p-3 text-left text-[12px] font-semibold text-gray-600">Judul Artikel</th>
                            <th class="p-3 text-left text-[12px] font-semibold text-gray-600">Deskripsi Singkat</th>
                            <th class="p-3 text-left text-[12px] font-semibold text-gray-600">Status</th>
                            <th class="p-3 text-left text-[12px] font-semibold text-gray-600">Author</th>
                            <th class="p-3 text-left text-[12px] font-semibold text-gray-600">Kategori</th>
                            <th class="p-3 text-left text-[12px] font-semibold text-gray-600 w-24">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="hover:bg-gray-50">
                            <td class="p-3 text-[12px] font-medium text-gray-900">Panduan Fotografi Pemula</td>
                            <td class="p-3 text-[12px] text-gray-600">Tips dasar untuk memulai fotografi</td>
                            <td class="p-3"><span class="px-2 py-1 rounded-full bg-green-100 text-green-600 text-xs">Published</span></td>
                            <td class="p-3 text-[12px] text-gray-900">John Doe</td>
                            <td class="p-3 text-[12px] text-gray-900">Teknologi</td>
                            <td class="p-3">
                                <div class="flex gap-2">
                                    <a href="#" class="w-8 h-8 rounded-md bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-[12px]" aria-label="Lihat Panduan Fotografi Pemula"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="w-8 h-8 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-[12px]" aria-label="Edit Panduan Fotografi Pemula"><i class="fas fa-edit"></i></a>
                                    <button class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-[12px]" onclick="showDeleteModal('Panduan Fotografi Pemula')" aria-label="Hapus Panduan Fotografi Pemula"><i class="fas fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="p-3 text-[12px] font-medium text-gray-900">Desain Grafis Modern</td>
                            <td class="p-3 text-[12px] text-gray-600">Tren desain grafis tahun ini</td>
                            <td class="p-3"><span class="px-2 py-1 rounded-full bg-green-100 text-green-600 text-xs">Published</span></td>
                            <td class="p-3 text-[12px] text-gray-900">Jane Smith</td>
                            <td class="p-3 text-[12px] text-gray-900">Gaya Hidup</td>
                            <td class="p-3">
                                <div class="flex gap-2">
                                    <a href="#" class="w-8 h-8 rounded-md bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-[12px]" aria-label="Lihat Desain Grafis Modern"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="w-8 h-8 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-[12px]" aria-label="Edit Desain Grafis Modern"><i class="fas fa-edit"></i></a>
                                    <button class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-[12px]" onclick="showDeleteModal('Desain Grafis Modern')" aria-label="Hapus Desain Grafis Modern"><i class="fas fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="p-3 text-[12px] font-medium text-gray-900">Tips Sehat Sehari-hari</td>
                            <td class="p-3 text-[12px] text-gray-600">Cara menjaga kesehatan harian</td>
                            <td class="p-3"><span class="px-2 py-1 rounded-full bg-red-100 text-red-600 text-xs">Draft</span></td>
                            <td class="p-3 text-[12px] text-gray-900">Alex Johnson</td>
                            <td class="p-3 text-[12px] text-gray-900">Kesehatan</td>
                            <td class="p-3">
                                <div class="flex gap-2">
                                    <a href="#" class="w-8 h-8 rounded-md bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-[12px]" aria-label="Lihat Tips Sehat Sehari-hari"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="w-8 h-8 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-[12px]" aria-label="Edit Tips Sehat Sehari-hari"><i class="fas fa-edit"></i></a>
                                    <button class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-[12px]" onclick="showDeleteModal('Tips Sehat Sehari-hari')" aria-label="Hapus Tips Sehat Sehari-hari"><i class="fas fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="p-3 text-[12px] font-medium text-gray-900">Belajar Coding dari Nol</td>
                            <td class="p-3 text-[12px] text-gray-600">Panduan pemula untuk coding</td>
                            <td class="p-3"><span class="px-2 py-1 rounded-full bg-green-100 text-green-600 text-xs">Published</span></td>
                            <td class="p-3 text-[12px] text-gray-900">John Doe</td>
                            <td class="p-3 text-[12px] text-gray-900">Pendidikan</td>
                            <td class="p-3">
                                <div class="flex gap-2">
                                    <a href="#" class="w-8 h-8 rounded-md bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-[12px]" aria-label="Lihat Belajar Coding dari Nol"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="w-8 h-8 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-[12px]" aria-label="Edit Belajar Coding dari Nol"><i class="fas fa-edit"></i></a>
                                    <button class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-[12px]" onclick="showDeleteModal('Belajar Coding dari Nol')" aria-label="Hapus Belajar Coding dari Nol"><i class="fas fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="p-3 text-[12px] font-medium text-gray-900">Seni Ilustrasi Digital</td>
                            <td class="p-3 text-[12px] text-gray-600">Teknik ilustrasi menggunakan software</td>
                            <td class="p-3"><span class="px-2 py-1 rounded-full bg-green-100 text-green-600 text-xs">Published</span></td>
                            <td class="p-3 text-[12px] text-gray-900">Jane Smith</td>
                            <td class="p-3 text-[12px] text-gray-900">Gaya Hidup, Teknologi</td>
                            <td class="p-3">
                                <div class="flex gap-2">
                                    <a href="#" class="w-8 h-8 rounded-md bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-[12px]" aria-label="Lihat Seni Ilustrasi Digital"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="w-8 h-8 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-[12px]" aria-label="Edit Seni Ilustrasi Digital"><i class="fas fa-edit"></i></a>
                                    <button class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-[12px]" onclick="showDeleteModal('Seni Ilustrasi Digital')" aria-label="Hapus Seni Ilustrasi Digital"><i class="fas fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="flex justify-center mt-5 gap-2">
                <a href="#" class="w-9 h-9 flex items-center justify-center rounded-md bg-white border border-gray-200 text-gray-900 hover:bg-yellow-400 hover:border-yellow-400 text-[12px]" aria-label="Previous page"><i class="fas fa-chevron-left"></i></a>
                <a href="#" class="w-9 h-9 flex items-center justify-center rounded-md bg-yellow-400 text-gray-900 font-medium border border-yellow-400 text-[12px]" aria-label="Page 1">1</a>
                <a href="#" class="w-9 h-9 flex items-center justify-center rounded-md bg-white border border-gray-200 text-gray-900 hover:bg-yellow-400 hover:border-yellow-400 text-[12px]" aria-label="Page 2">2</a>
                <a href="#" class="w-9 h-9 flex items-center justify-center rounded-md bg-white border border-gray-200 text-gray-900 hover:bg-yellow-400 hover:border-yellow-400 text-[12px]" aria-label="Page 3">3</a>
                <span class="flex items-center px-3 text-gray-600 text-[12px]">...</span>
                <a href="#" class="w-9 h-9 flex items-center justify-center rounded-md bg-white border border-gray-200 text-gray-900 hover:bg-yellow-400 hover:border-yellow-400 text-[12px]" aria-label="Page 5">5</a>
                <a href="#" class="w-9 h-9 flex items-center justify-center rounded-md bg-white border border-gray-200 text-gray-900 hover:bg-yellow-400 hover:border-yellow-400 text-[12px]" aria-label="Next page"><i class="fas fa-chevron-right"></i></a>
            </div>
        </div>

        <!-- Delete Article Modal -->
        <div class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" id="deleteModal">
            <div class="bg-white rounded-lg p-6 w-full max-w-md">
                <div class="flex justify-between items-center mb-4 border-b border-gray-200 pb-3">
                    <h3 class="text-lg font-semibold text-gray-900">Hapus Artikel</h3>
                    <button class="text-xl text-gray-600 hover:text-gray-900" onclick="closeDeleteModal()" aria-label="Tutup modal">&times;</button>
                </div>
                <div class="mb-4 text-[12px] text-gray-700">
                    <p class="mb-2">Apakah Anda yakin ingin menghapus artikel <strong id="deleteArticleTitle"></strong>?</p>
                    <p>Tindakan ini tidak dapat dibatalkan dan semua data terkait artikel ini akan dihapus permanen.</p>
                </div>
                <div class="flex justify-end gap-3">
                    <button class="bg-gray-100 hover:bg-gray-200 text-gray-900 text-[12px] font-medium px-4 py-2 rounded-md" onclick="closeDeleteModal()">Batal</button>
                    <button class="bg-red-500 hover:bg-red-600 text-white text-[12px] font-medium px-4 py-2 rounded-md" onclick="deleteArticle()">Hapus Artikel</button>
                </div>
            </div>
        </div>

        @push('scripts')
        <script>
            let currentArticleTitle = '';

            function showDeleteModal(articleTitle) {
                try {
                    currentArticleTitle = articleTitle;
                    const modal = document.getElementById('deleteModal');
                    const articleTitleElement = document.getElementById('deleteArticleTitle');
                    if (!modal || !articleTitleElement) {
                        console.error('Modal or article title element not found');
                        return;
                    }
                    articleTitleElement.textContent = articleTitle;
                    modal.classList.remove('hidden');
                    modal.focus();
                    console.log('Delete modal opened for:', articleTitle);
                } catch (error) {
                    console.error('Error opening delete modal:', error);
                }
            }

            function closeDeleteModal() {
                try {
                    const modal = document.getElementById('deleteModal');
                    if (modal) {
                        modal.classList.add('hidden');
                        currentArticleTitle = '';
                        console.log('Delete modal closed');
                    }
                } catch (error) {
                    console.error('Error closing delete modal:', error);
                }
            }

            function deleteArticle() {
                console.log('Deleting article:', currentArticleTitle);
                // Implement actual delete logic here (e.g., API call)
                closeDeleteModal();
            }

            window.onclick = function(event) {
                try {
                    const deleteModal = document.getElementById('deleteModal');
                    if (event.target === deleteModal) closeDeleteModal();
                } catch (error) {
                    console.error('Error in window click handler:', error);
                }
            };

            document.addEventListener('DOMContentLoaded', function() {
                try {
                    document.querySelectorAll('select, #keyword-filter').forEach(element => {
                        element.addEventListener('change', function() {
                            console.log('Filter changed:', this.id, this.value);
                        });
                    });

                    // Add keyboard accessibility for modal
                    document.querySelectorAll('.modal').forEach(modal => {
                        modal.addEventListener('keydown', function(e) {
                            if (e.key === 'Escape') {
                                closeDeleteModal();
                            }
                        });
                    });

                    // Add click event listeners to delete buttons
                    document.querySelectorAll('button[aria-label*="Hapus"]').forEach(button => {
                        button.addEventListener('click', function() {
                            const articleTitle = this.getAttribute('aria-label').replace('Hapus ', '');
                            showDeleteModal(articleTitle);
                        });
                    });
                } catch (error) {
                    console.error('Error in DOMContentLoaded:', error);
                }
            });
        </script>
        @endpush
    </div>
</x-admin-layout>