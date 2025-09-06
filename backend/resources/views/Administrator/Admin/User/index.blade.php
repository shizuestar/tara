<x-admin-layout>
    <div class="bg-white rounded-lg p-6 shadow-sm">
        <!-- Page Header -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
            <h1 class="text-xl font-semibold flex items-center gap-2 text-gray-900">
                <i class="fas fa-users text-yellow-400 text-lg"></i>
                Manajemen Pengguna
            </h1>
            <a href="#" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors">
                <i class="fas fa-plus text-sm"></i>
                Tambah Pengguna Baru
            </a>
        </div>

        <!-- Filter Section -->
        <div class="bg-white rounded-lg p-5 mb-8 border border-gray-200">
            <h3 class="text-lg font-semibold flex items-center gap-2 mb-4 text-gray-900">
                <i class="fas fa-filter text-yellow-400 text-base"></i>
                Filter Pengguna
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div>
                    <label for="role-filter" class="block text-sm font-medium text-gray-700 mb-1.5">Peran</label>
                    <select id="role-filter" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                        <option value="">Semua Peran</option>
                        <option value="admin">Admin</option>
                        <option value="pengguna">Pengguna</option>
                        <option value="moderator">Moderator</option>
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
                    <label for="date-filter" class="block text-sm font-medium text-gray-700 mb-1.5">Tanggal Bergabung</label>
                    <select id="date-filter" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                        <option value="">Semua</option>
                        <option value="2025">2025</option>
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                    </select>
                </div>
                <div>
                    <label for="keyword-filter" class="block text-sm font-medium text-gray-700 mb-1.5">Kata Kunci</label>
                    <input id="keyword-filter" type="text" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Cari nama atau email...">
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
                <h2 class="text-lg font-semibold text-gray-900">Daftar Pengguna</h2>
                <div class="text-[12px] text-gray-600">Menampilkan 5 dari 50 pengguna</div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="p-3 text-left text-[12px] font-semibold text-gray-600">Nama</th>
                            <th class="p-3 text-left text-[12px] font-semibold text-gray-600">Email</th>
                            <th class="p-3 text-left text-[12px] font-semibold text-gray-600">Peran</th>
                            <th class="p-3 text-left text-[12px] font-semibold text-gray-600">Status</th>
                            <th class="p-3 text-left text-[12px] font-semibold text-gray-600">Tanggal Bergabung</th>
                            <th class="p-3 text-left text-[12px] font-semibold text-gray-600 w-24">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="hover:bg-gray-50">
                            <td class="p-3 text-[12px] font-medium text-gray-900">Andi Setiawan</td>
                            <td class="p-3 text-[12px] text-gray-600">andi@example.com</td>
                            <td class="p-3 text-[12px] text-gray-900">Admin</td>
                            <td class="p-3"><span class="px-2 py-1 rounded-full bg-green-100 text-green-600 text-xs">Aktif</span></td>
                            <td class="p-3 text-[12px] text-gray-900">2025-09-01</td>
                            <td class="p-3">
                                <div class="flex gap-2">
                                    <a href="#" class="w-8 h-8 rounded-md bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-[12px]" aria-label="Lihat Andi Setiawan"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="w-8 h-8 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-[12px]" aria-label="Edit Andi Setiawan"><i class="fas fa-edit"></i></a>
                                    <button class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-[12px]" onclick="showDeleteModal('Andi Setiawan')" aria-label="Hapus Andi Setiawan"><i class="fas fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="p-3 text-[12px] font-medium text-gray-900">Budi Santoso</td>
                            <td class="p-3 text-[12px] text-gray-600">budi@example.com</td>
                            <td class="p-3 text-[12px] text-gray-900">Pengguna</td>
                            <td class="p-3"><span class="px-2 py-1 rounded-full bg-green-100 text-green-600 text-xs">Aktif</span></td>
                            <td class="p-3 text-[12px] text-gray-900">2025-08-15</td>
                            <td class="p-3">
                                <div class="flex gap-2">
                                    <a href="#" class="w-8 h-8 rounded-md bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-[12px]" aria-label="Lihat Budi Santoso"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="w-8 h-8 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-[12px]" aria-label="Edit Budi Santoso"><i class="fas fa-edit"></i></a>
                                    <button class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-[12px]" onclick="showDeleteModal('Budi Santoso')" aria-label="Hapus Budi Santoso"><i class="fas fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="p-3 text-[12px] font-medium text-gray-900">Citra Dewi</td>
                            <td class="p-3 text-[12px] text-gray-600">citra@example.com</td>
                            <td class="p-3 text-[12px] text-gray-900">Moderator</td>
                            <td class="p-3"><span class="px-2 py-1 rounded-full bg-red-100 text-red-600 text-xs">Tidak Aktif</span></td>
                            <td class="p-3 text-[12px] text-gray-900">2024-12-10</td>
                            <td class="p-3">
                                <div class="flex gap-2">
                                    <a href="#" class="w-8 h-8 rounded-md bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-[12px]" aria-label="Lihat Citra Dewi"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="w-8 h-8 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-[12px]" aria-label="Edit Citra Dewi"><i class="fas fa-edit"></i></a>
                                    <button class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-[12px]" onclick="showDeleteModal('Citra Dewi')" aria-label="Hapus Citra Dewi"><i class="fas fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="p-3 text-[12px] font-medium text-gray-900">Dedi Pratama</td>
                            <td class="p-3 text-[12px] text-gray-600">dedi@example.com</td>
                            <td class="p-3 text-[12px] text-gray-900">Pengguna</td>
                            <td class="p-3"><span class="px-2 py-1 rounded-full bg-green-100 text-green-600 text-xs">Aktif</span></td>
                            <td class="p-3 text-[12px] text-gray-900">2025-09-05</td>
                            <td class="p-3">
                                <div class="flex gap-2">
                                    <a href="#" class="w-8 h-8 rounded-md bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-[12px]" aria-label="Lihat Dedi Pratama"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="w-8 h-8 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-[12px]" aria-label="Edit Dedi Pratama"><i class="fas fa-edit"></i></a>
                                    <button class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-[12px]" onclick="showDeleteModal('Dedi Pratama')" aria-label="Hapus Dedi Pratama"><i class="fas fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="p-3 text-[12px] font-medium text-gray-900">Eka Sari</td>
                            <td class="p-3 text-[12px] text-gray-600">eka@example.com</td>
                            <td class="p-3 text-[12px] text-gray-900">Admin</td>
                            <td class="p-3"><span class="px-2 py-1 rounded-full bg-green-100 text-green-600 text-xs">Aktif</span></td>
                            <td class="p-3 text-[12px] text-gray-900">2025-08-20</td>
                            <td class="p-3">
                                <div class="flex gap-2">
                                    <a href="#" class="w-8 h-8 rounded-md bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-[12px]" aria-label="Lihat Eka Sari"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="w-8 h-8 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-[12px]" aria-label="Edit Eka Sari"><i class="fas fa-edit"></i></a>
                                    <button class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-[12px]" onclick="showDeleteModal('Eka Sari')" aria-label="Hapus Eka Sari"><i class="fas fa-trash"></i></button>
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

        <!-- Delete User Modal -->
        <div class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" id="deleteModal">
            <div class="bg-white rounded-lg p-6 w-full max-w-md">
                <div class="flex justify-between items-center mb-4 border-b border-gray-200 pb-3">
                    <h3 class="text-lg font-semibold text-gray-900">Hapus Pengguna</h3>
                    <button class="text-xl text-gray-600 hover:text-gray-900" onclick="closeDeleteModal()" aria-label="Tutup modal">&times;</button>
                </div>
                <div class="mb-4 text-sm text-gray-700">
                    <p class="mb-2">Apakah Anda yakin ingin menghapus pengguna <strong id="deleteUserName"></strong>?</p>
                    <p>Tindakan ini tidak dapat dibatalkan dan semua data terkait pengguna ini akan dihapus permanen.</p>
                </div>
                <div class="flex justify-end gap-3">
                    <button class="bg-gray-100 hover:bg-gray-200 text-gray-900 text-sm font-medium px-4 py-2 rounded-md" onclick="closeDeleteModal()">Batal</button>
                    <button class="bg-red-500 hover:bg-red-600 text-white text-sm font-medium px-4 py-2 rounded-md" onclick="deleteUser()">Hapus Pengguna</button>
                </div>
            </div>
        </div>

        @push('scripts')
        <script>
            let currentUserName = '';

            function showDeleteModal(userName) {
                try {
                    currentUserName = userName;
                    const modal = document.getElementById('deleteModal');
                    const userNameElement = document.getElementById('deleteUserName');
                    if (!modal || !userNameElement) {
                        console.error('Modal or user name element not found');
                        return;
                    }
                    userNameElement.textContent = userName;
                    modal.classList.remove('hidden');
                    modal.focus();
                    console.log('Delete modal opened for:', userName);
                } catch (error) {
                    console.error('Error opening delete modal:', error);
                }
            }

            function closeDeleteModal() {
                try {
                    const modal = document.getElementById('deleteModal');
                    if (modal) {
                        modal.classList.add('hidden');
                        currentUserName = '';
                        console.log('Delete modal closed');
                    }
                } catch (error) {
                    console.error('Error closing delete modal:', error);
                }
            }

            function deleteUser() {
                console.log('Deleting user:', currentUserName);
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

                    document.querySelectorAll('.modal').forEach(modal => {
                        modal.addEventListener('keydown', function(e) {
                            if (e.key === 'Escape') {
                                closeDeleteModal();
                            }
                        });
                    });

                    document.querySelectorAll('button[aria-label*="Hapus"]').forEach(button => {
                        button.addEventListener('click', function() {
                            const userName = this.getAttribute('aria-label').replace('Hapus ', '');
                            showDeleteModal(userName);
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