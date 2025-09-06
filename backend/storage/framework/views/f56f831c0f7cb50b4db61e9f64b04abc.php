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
                <i class="fas fa-users text-yellow-400 text-lg"></i>
                Manajemen Komunitas
            </h1>
            <a href="#" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors">
                <i class="fas fa-plus text-sm"></i>
                Tambah Komunitas Baru
            </a>
        </div>

        <!-- Filter Section -->
        <div class="bg-white rounded-lg p-5 mb-8 border border-gray-200">
            <h3 class="text-lg font-semibold flex items-center gap-2 mb-4 text-gray-900">
                <i class="fas fa-filter text-yellow-400 text-base"></i>
                Filter Komunitas
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div>
                    <label for="category-filter" class="block text-sm font-medium text-gray-700 mb-1.5">Kategori</label>
                    <select id="category-filter" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                        <option value="">Semua Kategori</option>
                        <option value="fotografi">Fotografi</option>
                        <option value="desain">Desain</option>
                        <option value="ilustrasi">Ilustrasi</option>
                        <option value="koding">Koding</option>
                    </select>
                </div>
                <div>
                    <label for="member-filter" class="block text-sm font-medium text-gray-700 mb-1.5">Jumlah Anggota</label>
                    <select id="member-filter" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                        <option value="">Semua</option>
                        <option value="0-50">0-50</option>
                        <option value="51-100">51-100</option>
                        <option value="101+">101+</option>
                    </select>
                </div>
                <div>
                    <label for="status-filter" class="block text-sm font-medium text-gray-700 mb-1.5">Status</label>
                    <select id="status-filter" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                        <option value="">Semua Status</option>
                        <option value="aktif">Aktif</option>
                        <option value="tidak-aktif">Tidak Aktif</option>
                    </select>
                </div>
                <div>
                    <label for="keyword-filter" class="block text-sm font-medium text-gray-700 mb-1.5">Kata Kunci</label>
                    <input id="keyword-filter" type="text" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Cari nama atau deskripsi...">
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

        <div class="bg-white rounded-lg p-5 border border-gray-200">
            <div class="flex justify-between items-center gap-4 mb-5">
                <h2 class="text-lg font-semibold text-gray-900">Daftar Komunitas</h2>
                <div class="text-[12px] text-gray-600">Menampilkan 5 dari 20 komunitas</div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="p-3 text-left text-[12px] font-semibold text-gray-600">Nama Komunitas</th>
                            <th class="p-3 text-left text-[12px] font-semibold text-gray-600">Deskripsi Singkat</th>
                            <th class="p-3 text-left text-[12px] font-semibold text-gray-600">Status</th>
                            <th class="p-3 text-left text-[12px] font-semibold text-gray-600">Jumlah Anggota</th>
                            <th class="p-3 text-left text-[12px] font-semibold text-gray-600">Kategori</th>
                            <th class="p-3 text-left text-[12px] font-semibold text-gray-600 w-24">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="hover:bg-gray-50">
                            <td class="p-3 text-[12px] font-medium text-gray-900">Fotografi Enthusiast</td>
                            <td class="p-3 text-[12px] text-gray-600">Komunitas pecinta fotografi di Bali</td>
                            <td class="p-3"><span class="px-2 py-1 rounded-full bg-green-100 text-green-600 text-xs">Aktif</span></td>
                            <td class="p-3 text-[12px] text-gray-900">150</td>
                            <td class="p-3 text-[12px] text-gray-900">Fotografi</td>
                            <td class="p-3">
                                <div class="flex gap-2">
                                    <a href="#" class="w-8 h-8 rounded-md bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-[12px]" aria-label="Lihat Fotografi Enthusiast"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="w-8 h-8 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-[12px]" aria-label="Edit Fotografi Enthusiast"><i class="fas fa-edit"></i></a>
                                    <button class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-[12px]" onclick="showDeleteModal('Fotografi Enthusiast')" aria-label="Hapus Fotografi Enthusiast"><i class="fas fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="p-3 text-[12px] font-medium text-gray-900">Desain Grafis Indonesia</td>
                            <td class="p-3 text-[12px] text-gray-600">Tempat berbagi tips desain grafis</td>
                            <td class="p-3"><span class="px-2 py-1 rounded-full bg-green-100 text-green-600 text-xs">Aktif</span></td>
                            <td class="p-3 text-[12px] text-gray-900">200</td>
                            <td class="p-3 text-[12px] text-gray-900">Desain</td>
                            <td class="p-3">
                                <div class="flex gap-2">
                                    <a href="#" class="w-8 h-8 rounded-md bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-[12px]" aria-label="Lihat Desain Grafis Indonesia"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="w-8 h-8 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-[12px]" aria-label="Edit Desain Grafis Indonesia"><i class="fas fa-edit"></i></a>
                                    <button class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-[12px]" onclick="showDeleteModal('Desain Grafis Indonesia')" aria-label="Hapus Desain Grafis Indonesia"><i class="fas fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="p-3 text-[12px] font-medium text-gray-900">Ilustrator Muda</td>
                            <td class="p-3 text-[12px] text-gray-600">Komunitas ilustrator pemula</td>
                            <td class="p-3"><span class="px-2 py-1 rounded-full bg-red-100 text-red-600 text-xs">Tidak Aktif</span></td>
                            <td class="p-3 text-[12px] text-gray-900">80</td>
                            <td class="p-3 text-[12px] text-gray-900">Ilustrasi</td>
                            <td class="p-3">
                                <div class="flex gap-2">
                                    <a href="#" class="w-8 h-8 rounded-md bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-[12px]" aria-label="Lihat Ilustrator Muda"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="w-8 h-8 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-[12px]" aria-label="Edit Ilustrator Muda"><i class="fas fa-edit"></i></a>
                                    <button class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-[12px]" onclick="showDeleteModal('Ilustrator Muda')" aria-label="Hapus Ilustrator Muda"><i class="fas fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="p-3 text-[12px] font-medium text-gray-900">Koder Komunitas</td>
                            <td class="p-3 text-[12px] text-gray-600">Belajar coding bersama</td>
                            <td class="p-3"><span class="px-2 py-1 rounded-full bg-green-100 text-green-600 text-xs">Aktif</span></td>
                            <td class="p-3 text-[12px] text-gray-900">120</td>
                            <td class="p-3 text-[12px] text-gray-900">Koding</td>
                            <td class="p-3">
                                <div class="flex gap-2">
                                    <a href="#" class="w-8 h-8 rounded-md bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-[12px]" aria-label="Lihat Koder Komunitas"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="w-8 h-8 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-[12px]" aria-label="Edit Koder Komunitas"><i class="fas fa-edit"></i></a>
                                    <button class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-[12px]" onclick="showDeleteModal('Koder Komunitas')" aria-label="Hapus Koder Komunitas"><i class="fas fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="p-3 text-[12px] font-medium text-gray-900">Artist United</td>
                            <td class="p-3 text-[12px] text-gray-600">Seniman bersatu</td>
                            <td class="p-3"><span class="px-2 py-1 rounded-full bg-green-100 text-green-600 text-xs">Aktif</span></td>
                            <td class="p-3 text-[12px] text-gray-900">300</td>
                            <td class="p-3 text-[12px] text-gray-900">Desain, Ilustrasi</td>
                            <td class="p-3">
                                <div class="flex gap-2">
                                    <a href="#" class="w-8 h-8 rounded-md bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-[12px]" aria-label="Lihat Artist United"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="w-8 h-8 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-[12px]" aria-label="Edit Artist United"><i class="fas fa-edit"></i></a>
                                    <button class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-[12px]" onclick="showDeleteModal('Artist United')" aria-label="Hapus Artist United"><i class="fas fa-trash"></i></button>
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

        <!-- Delete Community Modal -->
        <div class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" id="deleteModal">
            <div class="bg-white rounded-lg p-6 w-full max-w-md">
                <div class="flex justify-between items-center mb-4 border-b border-gray-200 pb-3">
                    <h3 class="text-lg font-semibold text-gray-900">Hapus Komunitas</h3>
                    <button class="text-xl text-gray-600 hover:text-gray-900" onclick="closeDeleteModal()" aria-label="Tutup modal">&times;</button>
                </div>
                <div class="mb-4 text-sm text-gray-700">
                    <p class="mb-2">Apakah Anda yakin ingin menghapus komunitas <strong id="deleteCommunityName"></strong>?</p>
                    <p>Tindakan ini tidak dapat dibatalkan dan semua data terkait komunitas ini akan dihapus permanen.</p>
                </div>
                <div class="flex justify-end gap-3">
                    <button class="bg-gray-100 hover:bg-gray-200 text-gray-900 text-sm font-medium px-4 py-2 rounded-md" onclick="closeDeleteModal()">Batal</button>
                    <button class="bg-red-500 hover:bg-red-600 text-white text-sm font-medium px-4 py-2 rounded-md" onclick="deleteCommunity()">Hapus Komunitas</button>
                </div>
            </div>
        </div>

        <?php $__env->startPush('scripts'); ?>
        <script>
            let currentCommunityName = '';

            function showDeleteModal(communityName) {
                try {
                    currentCommunityName = communityName;
                    const modal = document.getElementById('deleteModal');
                    const communityNameElement = document.getElementById('deleteCommunityName');
                    if (!modal || !communityNameElement) {
                        console.error('Modal or community name element not found');
                        return;
                    }
                    communityNameElement.textContent = communityName;
                    modal.classList.remove('hidden');
                    modal.focus();
                    console.log('Delete modal opened for:', communityName);
                } catch (error) {
                    console.error('Error opening delete modal:', error);
                }
            }

            function closeDeleteModal() {
                try {
                    const modal = document.getElementById('deleteModal');
                    if (modal) {
                        modal.classList.add('hidden');
                        currentCommunityName = '';
                        console.log('Delete modal closed');
                    }
                } catch (error) {
                    console.error('Error closing delete modal:', error);
                }
            }

            function deleteCommunity() {
                console.log('Deleting community:', currentCommunityName);
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
                            const communityName = this.getAttribute('aria-label').replace('Hapus ', '');
                            showDeleteModal(communityName);
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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\lomba\tara\backend\resources\views/administrator/admin/komunitas/index.blade.php ENDPATH**/ ?>