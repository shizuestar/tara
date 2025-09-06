<x-admin-layout>
    <div class="bg-white rounded-lg p-6 shadow-sm">
        <!-- Page Header -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
            <h1 class="text-xl font-semibold flex items-center gap-2 text-gray-900">
                <i class="fas fa-project-diagram text-yellow-400 text-lg"></i>
                Daftar Proyek
            </h1>
            <a href="#" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors">
                <i class="fas fa-plus text-sm"></i>
                Tambah Proyek Baru
            </a>
        </div>

        <!-- Filter Section -->
        <div class="bg-white rounded-lg p-5 mb-8 border border-gray-200">
            <h3 class="text-lg font-semibold flex items-center gap-2 mb-4 text-gray-900">
                <i class="fas fa-filter text-yellow-400 text-base"></i>
                Filter Proyek
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div>
                    <label for="type-filter" class="block text-sm font-medium text-gray-700 mb-1.5">Tipe Proyek</label>
                    <select id="type-filter" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                        <option value="">Semua Tipe</option>
                        <option value="development">Pengembangan</option>
                        <option value="design">Desain</option>
                        <option value="research">Penelitian</option>
                        <option value="marketing">Pemasaran</option>
                    </select>
                </div>
                <div>
                    <label for="status-filter" class="block text-sm font-medium text-gray-700 mb-1.5">Status Proyek</label>
                    <select id="status-filter" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                        <option value="">Semua Status</option>
                        <option value="active">Aktif</option>
                        <option value="pending">Menunggu Persetujuan</option>
                        <option value="completed">Selesai</option>
                        <option value="onhold">Ditunda</option>
                    </select>
                </div>
                <div>
                    <label for="manager-filter" class="block text-sm font-medium text-gray-700 mb-1.5">Manajer</label>
                    <select id="manager-filter" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                        <option value="">Semua Manajer</option>
                        <option value="1">Dewi Santika</option>
                        <option value="2">Aldi Pratama</option>
                        <option value="3">Rina Andriani</option>
                    </select>
                </div>
                <div>
                    <label for="keyword-filter" class="block text-sm font-medium text-gray-700 mb-1.5">Kata Kunci</label>
                    <input id="keyword-filter" type="text" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Cari nama atau deskripsi proyek...">
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

        <!-- Project List Section -->
        <div class="bg-white rounded-lg p-5 border border-gray-200">
            <div class="flex justify-between items-center gap-4 mb-5">
                <h2 class="text-lg font-semibold text-gray-900">Daftar Proyek</h2>
                <div class="text-sm text-gray-600">Menampilkan 12 dari 85 hasil</div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="p-3 text-left text-sm font-semibold text-gray-600 w-12">Thumbnail</th>
                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Nama Proyek</th>
                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Tipe</th>
                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Manajer</th>
                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Tanggal Mulai</th>
                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Status</th>
                            <th class="p-3 text-left text-sm font-semibold text-gray-600 w-24">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="hover:bg-gray-50">
                            <td class="p-3"><div class="w-10 h-10 rounded-md bg-gray-100 flex items-center justify-center text-gray-400 text-sm"><i class="fas fa-code"></i></div></td>
                            <td class="p-3">
                                <div class="text-sm font-medium text-gray-900">E-commerce Platform</div>
                                <div class="text-xs text-gray-600">Laravel · Vue.js</div>
                            </td>
                            <td class="p-3 text-sm text-gray-900">Pengembangan</td>
                            <td class="p-3 text-sm text-gray-900">Dewi Santika</td>
                            <td class="p-3 text-sm text-gray-900">12 Agu 2023</td>
                            <td class="p-3"><span class="px-2 py-1 rounded-full bg-green-100 text-green-600 text-xs">Aktif</span></td>
                            <td class="p-3">
                                <div class="flex gap-2">
                                    <a href="#" class="w-8 h-8 rounded-md bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-sm" aria-label="Lihat E-commerce Platform"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="w-8 h-8 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-sm" aria-label="Edit E-commerce Platform"><i class="fas fa-edit"></i></a>
                                    <button class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-sm" onclick="showDeleteModal('E-commerce Platform')" aria-label="Hapus E-commerce Platform"><i class="fas fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="p-3"><div class="w-10 h-10 rounded-md bg-gray-100 flex items-center justify-center text-gray-400 text-sm"><i class="fas fa-paint-brush"></i></div></td>
                            <td class="p-3">
                                <div class="text-sm font-medium text-gray-900">Brand Redesign</div>
                                <div class="text-xs text-gray-600">Logo · Guideline</div>
                            </td>
                            <td class="p-3 text-sm text-gray-900">Desain</td>
                            <td class="p-3 text-sm text-gray-900">Aldi Pratama</td>
                            <td class="p-3 text-sm text-gray-900">10 Agu 2023</td>
                            <td class="p-3"><span class="px-2 py-1 rounded-full bg-green-100 text-green-600 text-xs">Aktif</span></td>
                            <td class="p-3">
                                <div class="flex gap-2">
                                    <a href="#" class="w-8 h-8 rounded-md bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-sm" aria-label="Lihat Brand Redesign"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="w-8 h-8 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-sm" aria-label="Edit Brand Redesign"><i class="fas fa-edit"></i></a>
                                    <button class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-sm" onclick="showDeleteModal('Brand Redesign')" aria-label="Hapus Brand Redesign"><i class="fas fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="p-3"><div class="w-10 h-10 rounded-md bg-gray-100 flex items-center justify-center text-gray-400 text-sm"><i class="fas fa-book"></i></div></td>
                            <td class="p-3">
                                <div class="text-sm font-medium text-gray-900">Market Research 2025</div>
                                <div class="text-xs text-gray-600">Survey · Analysis</div>
                            </td>
                            <td class="p-3 text-sm text-gray-900">Penelitian</td>
                            <td class="p-3 text-sm text-gray-900">Rina Andriani</td>
                            <td class="p-3 text-sm text-gray-900">08 Agu 2023</td>
                            <td class="p-3"><span class="px-2 py-1 rounded-full bg-yellow-100 text-yellow-600 text-xs">Menunggu Persetujuan</span></td>
                            <td class="p-3">
                                <div class="flex gap-2">
                                    <a href="#" class="w-8 h-8 rounded-md bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-sm" aria-label="Lihat Market Research 2025"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="w-8 h-8 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-sm" aria-label="Edit Market Research 2025"><i class="fas fa-edit"></i></a>
                                    <button class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-sm" onclick="showDeleteModal('Market Research 2025')" aria-label="Hapus Market Research 2025"><i class="fas fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="p-3"><div class="w-10 h-10 rounded-md bg-gray-100 flex items-center justify-center text-gray-400 text-sm"><i class="fas fa-bullhorn"></i></div></td>
                            <td class="p-3">
                                <div class="text-sm font-medium text-gray-900">Digital Campaign</div>
                                <div class="text-xs text-gray-600">Ads · Social Media</div>
                            </td>
                            <td class="p-3 text-sm text-gray-900">Pemasaran</td>
                            <td class="p-3 text-sm text-gray-900">Budi Santoso</td>
                            <td class="p-3 text-sm text-gray-900">05 Agu 2023</td>
                            <td class="p-3"><span class="px-2 py-1 rounded-full bg-green-100 text-green-600 text-xs">Selesai</span></td>
                            <td class="p-3">
                                <div class="flex gap-2">
                                    <a href="#" class="w-8 h-8 rounded-md bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-sm" aria-label="Lihat Digital Campaign"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="w-8 h-8 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-sm" aria-label="Edit Digital Campaign"><i class="fas fa-edit"></i></a>
                                    <button class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-sm" onclick="showDeleteModal('Digital Campaign')" aria-label="Hapus Digital Campaign"><i class="fas fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="p-3"><div class="w-10 h-10 rounded-md bg-gray-100 flex items-center justify-center text-gray-400 text-sm"><i class="fas fa-chart-line"></i></div></td>
                            <td class="p-3">
                                <div class="text-sm font-medium text-gray-900">Data Analytics Project</div>
                                <div class="text-xs text-gray-600">Python · SQL</div>
                            </td>
                            <td class="p-3 text-sm text-gray-900">Pengembangan</td>
                            <td class="p-3 text-sm text-gray-900">Sari Indah</td>
                            <td class="p-3 text-sm text-gray-900">03 Agu 2023</td>
                            <td class="p-3"><span class="px-2 py-1 rounded-full bg-gray-100 text-gray-600 text-xs">Ditunda</span></td>
                            <td class="p-3">
                                <div class="flex gap-2">
                                    <a href="#" class="w-8 h-8 rounded-md bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-sm" aria-label="Lihat Data Analytics Project"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="w-8 h-8 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-sm" aria-label="Edit Data Analytics Project"><i class="fas fa-edit"></i></a>
                                    <button class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-sm" onclick="showDeleteModal('Data Analytics Project')" aria-label="Hapus Data Analytics Project"><i class="fas fa-trash"></i></button>
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

        <!-- Delete Project Modal -->
        <div class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" id="deleteModal">
            <div class="bg-white rounded-lg p-6 w-full max-w-md">
                <div class="flex justify-between items-center mb-4 border-b border-gray-200 pb-3">
                    <h3 class="text-lg font-semibold text-gray-900">Hapus Proyek</h3>
                    <button class="text-xl text-gray-600 hover:text-gray-900" onclick="closeDeleteModal()" aria-label="Tutup modal">&times;</button>
                </div>
                <div class="mb-4 text-sm text-gray-700">
                    <p class="mb-2">Apakah Anda yakin ingin menghapus proyek <strong id="deleteProjectName"></strong>?</p>
                    <p>Tindakan ini tidak dapat dibatalkan dan semua data terkait proyek ini akan dihapus permanen.</p>
                </div>
                <div class="flex justify-end gap-3">
                    <button class="bg-gray-100 hover:bg-gray-200 text-gray-900 text-sm font-medium px-4 py-2 rounded-md" onclick="closeDeleteModal()">Batal</button>
                    <button class="bg-red-500 hover:bg-red-600 text-white text-sm font-medium px-4 py-2 rounded-md" onclick="deleteProject()">Hapus Proyek</button>
                </div>
            </div>
        </div>

        <!-- Category Modal -->
        <div class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" id="categoryModal">
            <div class="bg-white rounded-lg p-6 w-full max-w-md">
                <div class="flex justify-between items-center mb-4 border-b border-gray-200 pb-3">
                    <h3 class="text-lg font-semibold text-gray-900" id="categoryModalTitle">Tambah Tipe Proyek</h3>
                    <button class="text-xl text-gray-600 hover:text-gray-900" onclick="closeCategoryModal()" aria-label="Tutup modal">&times;</button>
                </div>
                <div class="mb-4">
                    <div class="mb-4">
                        <label for="categoryName" class="block text-sm font-medium text-gray-700 mb-1.5">Nama Tipe</label>
                        <input type="text" id="categoryName" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Masukkan nama tipe proyek...">
                    </div>
                    <div>
                        <label for="categoryDescription" class="block text-sm font-medium text-gray-700 mb-1.5">Deskripsi</label>
                        <textarea id="categoryDescription" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400" rows="4" placeholder="Masukkan deskripsi tipe proyek..."></textarea>
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
                    <h3 class="text-lg font-semibold text-gray-900">Hapus Tipe Proyek</h3>
                    <button class="text-xl text-gray-600 hover:text-gray-900" onclick="closeCategoryDeleteModal()" aria-label="Tutup modal">&times;</button>
                </div>
                <div class="mb-4 text-sm text-gray-700">
                    <p class="mb-2">Apakah Anda yakin ingin menghapus tipe proyek <strong id="deleteCategoryName"></strong>?</p>
                    <p>Tindakan ini tidak dapat dibatalkan dan semua data terkait tipe proyek ini akan dihapus permanen.</p>
                </div>
                <div class="flex justify-end gap-3">
                    <button class="bg-gray-100 hover:bg-gray-200 text-gray-900 text-sm font-medium px-4 py-2 rounded-md" onclick="closeCategoryDeleteModal()">Batal</button>
                    <button class="bg-red-500 hover:bg-red-600 text-white text-sm font-medium px-4 py-2 rounded-md" onclick="deleteCategory()">Hapus Tipe Proyek</button>
                </div>
            </div>
        </div>

        @push('scripts')
        <script>
            let currentProjectName = '';

            function showDeleteModal(projectName) {
                try {
                    currentProjectName = projectName;
                    const modal = document.getElementById('deleteModal');
                    const projectNameElement = document.getElementById('deleteProjectName');
                    if (!modal || !projectNameElement) {
                        console.error('Modal or project name element not found');
                        return;
                    }
                    projectNameElement.textContent = projectName;
                    modal.classList.remove('hidden');
                    modal.focus();
                    console.log('Delete modal opened for:', projectName);
                } catch (error) {
                    console.error('Error opening delete modal:', error);
                }
            }

            function closeDeleteModal() {
                try {
                    const modal = document.getElementById('deleteModal');
                    if (modal) {
                        modal.classList.add('hidden');
                        currentProjectName = '';
                        console.log('Delete modal closed');
                    }
                } catch (error) {
                    console.error('Error closing delete modal:', error);
                }
            }

            function deleteProject() {
                console.log('Deleting project:', currentProjectName);
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

                    title.textContent = mode === 'create' ? 'Tambah Tipe Proyek' : 'Edit Tipe Proyek';
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

            function deleteCategory() {
                console.log('Deleting category:', document.getElementById('deleteCategoryName').textContent);
                // Implement actual delete logic here (e.g., API call)
                closeCategoryDeleteModal();
            }

            function saveCategory() {
                try {
                    const name = document.getElementById('categoryName').value.trim();
                    const description = document.getElementById('categoryDescription').value.trim();
                    
                    if (!name) {
                        alert('Nama tipe proyek harus diisi!');
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
                            const projectName = this.getAttribute('aria-label').replace('Hapus ', '');
                            showDeleteModal(projectName);
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