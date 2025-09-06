<?php if (isset($component)) { $__componentOriginal91fdd17964e43374ae18c674f95cdaa3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal91fdd17964e43374ae18c674f95cdaa3 = $attributes; } ?>
<?php $component = App\View\Components\AdminLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AdminLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="bg-white rounded-lg p-6 shadow-sm">
        <!-- Page Header -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
            <h1 class="text-xl font-semibold flex items-center gap-2 text-gray-900">
                <i class="fas fa-photo-video text-yellow-400 text-lg"></i>
                Galeri Karya
            </h1>
            <a href="#" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors">
                <i class="fas fa-plus text-sm"></i>
                Tambah Karya
            </a>
        </div>

        <!-- Filter Section -->
        <div class="bg-white rounded-lg p-5 mb-8 border border-gray-200">
            <h3 class="text-lg font-semibold flex items-center gap-2 mb-4 text-gray-900">
                <i class="fas fa-filter text-yellow-400 text-base"></i>
                Filter
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div>
                    <label for="category-filter" class="block text-sm font-medium text-gray-700 mb-1.5">Kategori</label>
                    <select id="category-filter" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                        <option value="">Semua Kategori</option>
                        <option value="photography">Fotografi</option>
                        <option value="design">Desain</option>
                        <option value="illustration">Ilustrasi</option>
                        <option value="coding">Koding</option>
                    </select>
                </div>
                <div>
                    <label for="status-filter" class="block text-sm font-medium text-gray-700 mb-1.5">Status</label>
                    <select id="status-filter" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                        <option value="">Semua Status</option>
                        <option value="published">Tayang</option>
                        <option value="pending">Menunggu</option>
                        <option value="rejected">Ditolak</option>
                        <option value="draft">Draft</option>
                    </select>
                </div>
                <div>
                    <label for="creator-filter" class="block text-sm font-medium text-gray-700 mb-1.5">Kreator</label>
                    <select id="creator-filter" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                        <option value="">Semua Kreator</option>
                        <option value="1">Dewi Santika</option>
                        <option value="2">Aldi Pratama</option>
                        <option value="3">Rina Andriani</option>
                    </select>
                </div>
                <div>
                    <label for="keyword-filter" class="block text-sm font-medium text-gray-700 mb-1.5">Kata Kunci</label>
                    <input id="keyword-filter" type="text" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Cari...">
                </div>
            </div>
            <div class="flex gap-3 mt-4">
                <button class="bg-gray-100 hover:bg-gray-200 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors">
                    <i class="fas fa-filter text-sm"></i>
                    Terapkan
                </button>
                <button class="bg-gray-100 hover:bg-gray-200 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors">
                    <i class="fas fa-redo text-sm"></i>
                    Reset
                </button>
            </div>
        </div>

        <!-- Artwork List Section -->
        <div class="bg-white rounded-lg p-5 border border-gray-200">
            <div class="flex justify-between items-center gap-4 mb-5">
                <h2 class="text-lg font-semibold text-gray-900">Daftar Karya</h2>
                <div class="text-sm text-gray-600">12 dari 85</div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="p-3 text-left text-sm font-semibold text-gray-600 w-12">Thumbnail</th>
                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Judul</th>
                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Kategori</th>
                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Kreator</th>
                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Tanggal</th>
                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Status</th>
                            <th class="p-3 text-left text-sm font-semibold text-gray-600 w-24">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="hover:bg-gray-50">
                            <td class="p-3"><div class="w-10 h-10 rounded-md bg-gray-100 flex items-center justify-center text-gray-400 text-sm"><i class="fas fa-image"></i></div></td>
                            <td class="p-3">
                                <div class="text-sm font-medium text-gray-900">Sunset at Bali Beach</div>
                                <div class="text-xs text-gray-600">1920x1080px · 2.4MB</div>
                            </td>
                            <td class="p-3 text-sm text-gray-900">Fotografi</td>
                            <td class="p-3 text-sm text-gray-900">Dewi Santika</td>
                            <td class="p-3 text-sm text-gray-900">12 Agu 2023</td>
                            <td class="p-3"><span class="px-2 py-1 rounded-full bg-green-100 text-green-600 text-xs">Tayang</span></td>
                            <td class="p-3">
                                <div class="flex gap-2">
                                    <a href="#" class="w-8 h-8 rounded-md bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-sm" aria-label="Lihat Sunset at Bali Beach"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="w-8 h-8 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-sm" aria-label="Edit Sunset at Bali Beach"><i class="fas fa-edit"></i></a>
                                    <button class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-sm" onclick="showDeleteModal('Sunset at Bali Beach')" aria-label="Hapus Sunset at Bali Beach"><i class="fas fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="p-3"><div class="w-10 h-10 rounded-md bg-gray-100 flex items-center justify-center text-gray-400 text-sm"><i class="fas fa-paint-brush"></i></div></td>
                            <td class="p-3">
                                <div class="text-sm font-medium text-gray-900">Digital Illustration Series</div>
                                <div class="text-xs text-gray-600">2500x2500px · 5.1MB</div>
                            </td>
                            <td class="p-3 text-sm text-gray-900">Ilustrasi</td>
                            <td class="p-3 text-sm text-gray-900">Aldi Pratama</td>
                            <td class="p-3 text-sm text-gray-900">10 Agu 2023</td>
                            <td class="p-3"><span class="px-2 py-1 rounded-full bg-green-100 text-green-600 text-xs">Tayang</span></td>
                            <td class="p-3">
                                <div class="flex gap-2">
                                    <a href="#" class="w-8 h-8 rounded-md bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-sm" aria-label="Lihat Digital Illustration Series"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="w-8 h-8 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-sm" aria-label="Edit Digital Illustration Series"><i class="fas fa-edit"></i></a>
                                    <button class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-sm" onclick="showDeleteModal('Digital Illustration Series')" aria-label="Hapus Digital Illustration Series"><i class="fas fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="p-3"><div class="w-10 h-10 rounded-md bg-gray-100 flex items-center justify-center text-gray-400 text-sm"><i class="fas fa-code"></i></div></td>
                            <td class="p-3">
                                <div class="text-sm font-medium text-gray-900">E-commerce Dashboard</div>
                                <div class="text-xs text-gray-600">Laravel · Vue.js</div>
                            </td>
                            <td class="p-3 text-sm text-gray-900">Koding</td>
                            <td class="p-3 text-sm text-gray-900">Rina Andriani</td>
                            <td class="p-3 text-sm text-gray-900">08 Agu 2023</td>
                            <td class="p-3"><span class="px-2 py-1 rounded-full bg-yellow-100 text-yellow-600 text-xs">Menunggu</span></td>
                            <td class="p-3">
                                <div class="flex gap-2">
                                    <a href="#" class="w-8 h-8 rounded-md bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-sm" aria-label="Lihat E-commerce Dashboard"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="w-8 h-8 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-sm" aria-label="Edit E-commerce Dashboard"><i class="fas fa-edit"></i></a>
                                    <button class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-sm" onclick="showDeleteModal('E-commerce Dashboard')" aria-label="Hapus E-commerce Dashboard"><i class="fas fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="p-3"><div class="w-10 h-10 rounded-md bg-gray-100 flex items-center justify-center text-gray-400 text-sm"><i class="fas fa-palette"></i></div></td>
                            <td class="p-3">
                                <div class="text-sm font-medium text-gray-900">Brand Identity Package</div>
                                <div class="text-xs text-gray-600">Logo · Guideline</div>
                            </td>
                            <td class="p-3 text-sm text-gray-900">Desain</td>
                            <td class="p-3 text-sm text-gray-900">Budi Santoso</td>
                            <td class="p-3 text-sm text-gray-900">05 Agu 2023</td>
                            <td class="p-3"><span class="px-2 py-1 rounded-full bg-red-100 text-red-600 text-xs">Ditolak</span></td>
                            <td class="p-3">
                                <div class="flex gap-2">
                                    <a href="#" class="w-8 h-8 rounded-md bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-sm" aria-label="Lihat Brand Identity Package"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="w-8 h-8 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-sm" aria-label="Edit Brand Identity Package"><i class="fas fa-edit"></i></a>
                                    <button class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-sm" onclick="showDeleteModal('Brand Identity Package')" aria-label="Hapus Brand Identity Package"><i class="fas fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="p-3"><div class="w-10 h-10 rounded-md bg-gray-100 flex items-center justify-center text-gray-400 text-sm"><i class="fas fa-image"></i></div></td>
                            <td class="p-3">
                                <div class="text-sm font-medium text-gray-900">Urban Architecture</div>
                                <div class="text-xs text-gray-600">3000x2000px · 4.8MB</div>
                            </td>
                            <td class="p-3 text-sm text-gray-900">Fotografi</td>
                            <td class="p-3 text-sm text-gray-900">Sari Indah</td>
                            <td class="p-3 text-sm text-gray-900">03 Agu 2023</td>
                            <td class="p-3"><span class="px-2 py-1 rounded-full bg-gray-100 text-gray-600 text-xs">Draft</span></td>
                            <td class="p-3">
                                <div class="flex gap-2">
                                    <a href="#" class="w-8 h-8 rounded-md bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-sm" aria-label="Lihat Urban Architecture"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="w-8 h-8 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-sm" aria-label="Edit Urban Architecture"><i class="fas fa-edit"></i></a>
                                    <button class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-sm" onclick="showDeleteModal('Urban Architecture')" aria-label="Hapus Urban Architecture"><i class="fas fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="flex justify-center mt-5 gap-2">
                <a href="#" class="w-9 h-9 flex items-center justify-center rounded-md bg-white border border-gray-200 text-gray-900 hover:bg-yellow-400 hover:border-yellow-400 text-sm" aria-label="Previous page"><i class="fas fa-chevron-left"></i></a>
                <a href="#" class="w-9 h-9 flex items-center justify-center rounded-md bg-yellow-400 text-gray-900 font-medium border border-yellow-400 text-sm" aria-label="Page 1">1</a>
                <a href="#" class="w-9 h-9 flex items-center justify-center rounded-md bg-white border border-gray-200 text-gray-900 hover:bg-yellow-400 hover:border-yellow-400 text-sm" aria-label="Page 2">2</a>
                <a href="#" class="w-9 h-9 flex items-center justify-center rounded-md bg-white border border-gray-200 text-gray-900 hover:bg-yellow-400 hover:border-yellow-400 text-sm" aria-label="Page 3">3</a>
                <span class="flex items-center px-3 text-gray-600 text-sm">...</span>
                <a href="#" class="w-9 h-9 flex items-center justify-center rounded-md bg-white border border-gray-200 text-gray-900 hover:bg-yellow-400 hover:border-yellow-400 text-sm" aria-label="Page 8">8</a>
                <a href="#" class="w-9 h-9 flex items-center justify-center rounded-md bg-white border border-gray-200 text-gray-900 hover:bg-yellow-400 hover:border-yellow-400 text-sm" aria-label="Next page"><i class="fas fa-chevron-right"></i></a>
            </div>
        </div>

        <!-- Delete Artwork Modal -->
        <div class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" id="deleteModal">
            <div class="bg-white rounded-lg p-6 w-full max-w-md">
                <div class="flex justify-between items-center mb-4 border-b border-gray-200 pb-3">
                    <h3 class="text-lg font-semibold text-gray-900">Hapus Karya</h3>
                    <button class="text-xl text-gray-600 hover:text-gray-900" onclick="closeDeleteModal()" aria-label="Tutup modal">&times;</button>
                </div>
                <div class="mb-4 text-sm text-gray-700">
                    <p class="mb-2">Apakah Anda yakin ingin menghapus karya <strong id="deleteArtworkName"></strong>?</p>
                    <p>Tindakan ini tidak dapat dibatalkan dan semua data terkait karya ini akan dihapus permanen.</p>
                </div>
                <div class="flex justify-end gap-3">
                    <button class="bg-gray-100 hover:bg-gray-200 text-gray-900 text-sm font-medium px-4 py-2 rounded-md" onclick="closeDeleteModal()">Batal</button>
                    <button class="bg-red-500 hover:bg-red-600 text-white text-sm font-medium px-4 py-2 rounded-md" onclick="deleteArtwork()">Hapus Karya</button>
                </div>
            </div>
        </div>

        <!-- Category Modal -->
        <div class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" id="categoryModal">
            <div class="bg-white rounded-lg p-6 w-full max-w-md">
                <div class="flex justify-between items-center mb-4 border-b border-gray-200 pb-3">
                    <h3 class="text-lg font-semibold text-gray-900" id="categoryModalTitle">Tambah Kategori</h3>
                    <button class="text-xl text-gray-600 hover:text-gray-900" onclick="closeCategoryModal()" aria-label="Tutup modal">&times;</button>
                </div>
                <div class="mb-4">
                    <div class="mb-4">
                        <label for="categoryName" class="block text-sm font-medium text-gray-700 mb-1.5">Nama</label>
                        <input type="text" id="categoryName" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Nama kategori..." required>
                    </div>
                    <div>
                        <label for="categoryDescription" class="block text-sm font-medium text-gray-700 mb-1.5">Deskripsi</label>
                        <textarea id="categoryDescription" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400" rows="4" placeholder="Deskripsi kategori..."></textarea>
                    </div>
                </div>
                <div class="flex justify-end gap-3">
                    <button class="bg-gray-100 hover:bg-gray-200 text-gray-900 text-sm font-medium px-4 py-2 rounded-md" onclick="closeCategoryModal()">Batal</button>
                    <button class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-2 rounded-md" onclick="saveCategory()">Simpan</button>
                </div>
            </div>
        </div>

        <!-- Delete Category Modal -->
        <div class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" id="categoryDeleteModal">
            <div class="bg-white rounded-lg p-6 w-full max-w-md">
                <div class="flex justify-between items-center mb-4 border-b border-gray-200 pb-3">
                    <h3 class="text-lg font-semibold text-gray-900">Hapus Kategori</h3>
                    <button class="text-xl text-gray-600 hover:text-gray-900" onclick="closeCategoryDeleteModal()" aria-label="Tutup modal">&times;</button>
                </div>
                <div class="mb-4 text-sm text-gray-700">
                    <p class="mb-2">Yakin hapus kategori <strong id="deleteCategoryName"></strong>?</p>
                    <p>Tindakan ini tidak dapat dibatalkan.</p>
                </div>
                <div class="flex justify-end gap-3">
                    <button class="bg-gray-100 hover:bg-gray-200 text-gray-900 text-sm font-medium px-4 py-2 rounded-md" onclick="closeCategoryDeleteModal()">Batal</button>
                    <button class="bg-red-500 hover:bg-red-600 text-white text-sm font-medium px-4 py-2 rounded-md">Hapus</button>
                </div>
            </div>
        </div>

        <?php $__env->startPush('scripts'); ?>
        <script>
            let currentArtworkName = '';

            function showDeleteModal(artworkName) {
                try {
                    currentArtworkName = artworkName;
                    const modal = document.getElementById('deleteModal');
                    const artworkNameElement = document.getElementById('deleteArtworkName');
                    if (!modal || !artworkNameElement) {
                        console.error('Modal or artwork name element not found');
                        return;
                    }
                    artworkNameElement.textContent = artworkName;
                    modal.classList.remove('hidden');
                    modal.focus();
                    console.log('Delete modal opened for:', artworkName);
                } catch (error) {
                    console.error('Error opening delete modal:', error);
                }
            }

            function closeDeleteModal() {
                try {
                    const modal = document.getElementById('deleteModal');
                    if (modal) {
                        modal.classList.add('hidden');
                        currentArtworkName = '';
                        console.log('Delete modal closed');
                    }
                } catch (error) {
                    console.error('Error closing delete modal:', error);
                }
            }

            function deleteArtwork() {
                console.log('Deleting artwork:', currentArtworkName);
                // Implement actual delete logic here (e.g., API call)
                closeDeleteModal();
            }

            function showCategoryModal(mode, name = '', description = '') {
                try {
                    const modal = document.getElementById('categoryModal');
                    const title = document.getElementById('categoryModalTitle');
                    const nameInput = document.getElementById('categoryName');
                    const descInput = document.getElementById('categoryDescription');

                    if (!modal || !title || !nameInput || !descInput) {
                        console.error('Category modal elements not found');
                        return;
                    }

                    title.textContent = mode === 'create' ? 'Tambah Kategori' : 'Edit Kategori';
                    nameInput.value = name;
                    descInput.value = description;
                    modal.classList.remove('hidden');
                    modal.focus();
                } catch (error) {
                    console.error('Error opening category modal:', error);
                }
            }

            function closeCategoryModal() {
                try {
                    const modal = document.getElementById('categoryModal');
                    if (modal) {
                        modal.classList.add('hidden');
                        document.getElementById('categoryName').value = '';
                        document.getElementById('categoryDescription').value = '';
                    }
                } catch (error) {
                    console.error('Error closing category modal:', error);
                }
            }

            function showCategoryDeleteModal(categoryName) {
                try {
                    const modal = document.getElementById('categoryDeleteModal');
                    const categoryNameElement = document.getElementById('deleteCategoryName');
                    if (!modal || !categoryNameElement) {
                        console.error('Category delete modal elements not found');
                        return;
                    }
                    categoryNameElement.textContent = categoryName;
                    modal.classList.remove('hidden');
                    modal.focus();
                } catch (error) {
                    console.error('Error opening category delete modal:', error);
                }
            }

            function closeCategoryDeleteModal() {
                try {
                    const modal = document.getElementById('categoryDeleteModal');
                    if (modal) {
                        modal.classList.add('hidden');
                    }
                } catch (error) {
                    console.error('Error closing category delete modal:', error);
                }
            }

            function saveCategory() {
                try {
                    const name = document.getElementById('categoryName').value.trim();
                    const description = document.getElementById('categoryDescription').value.trim();
                    
                    if (!name) {
                        alert('Nama kategori harus diisi!');
                        return;
                    }

                    console.log('Saving category:', { name, description });
                    closeCategoryModal();
                } catch (error) {
                    console.error('Error saving category:', error);
                }
            }

            window.onclick = function(event) {
                try {
                    const deleteModal = document.getElementById('deleteModal');
                    const categoryModal = document.getElementById('categoryModal');
                    const categoryDeleteModal = document.getElementById('categoryDeleteModal');
                    if (event.target === deleteModal) closeDeleteModal();
                    if (event.target === categoryModal) closeCategoryModal();
                    if (event.target === categoryDeleteModal) closeCategoryDeleteModal();
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

                    // Add keyboard accessibility for modals
                    document.querySelectorAll('.modal').forEach(modal => {
                        modal.addEventListener('keydown', function(e) {
                            if (e.key === 'Escape') {
                                if (modal.id === 'deleteModal') closeDeleteModal();
                                if (modal.id === 'categoryModal') closeCategoryModal();
                                if (modal.id === 'categoryDeleteModal') closeCategoryDeleteModal();
                            }
                        });
                    });

                    // Add click event listeners to delete buttons
                    document.querySelectorAll('button[aria-label*="Hapus"]').forEach(button => {
                        button.addEventListener('click', function() {
                            const artworkName = this.getAttribute('aria-label').replace('Hapus ', '');
                            showDeleteModal(artworkName);
                        });
                    });
                } catch (error) {
                    console.error('Error in DOMContentLoaded:', error);
                }
            });
        </script>
        <?php $__env->stopPush(); ?>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal91fdd17964e43374ae18c674f95cdaa3)): ?>
<?php $attributes = $__attributesOriginal91fdd17964e43374ae18c674f95cdaa3; ?>
<?php unset($__attributesOriginal91fdd17964e43374ae18c674f95cdaa3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal91fdd17964e43374ae18c674f95cdaa3)): ?>
<?php $component = $__componentOriginal91fdd17964e43374ae18c674f95cdaa3; ?>
<?php unset($__componentOriginal91fdd17964e43374ae18c674f95cdaa3); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\lomba\tara\backend\resources\views/administrator/admin/galeri/index.blade.php ENDPATH**/ ?>