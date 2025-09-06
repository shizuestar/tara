<x-admin-layout>
    @push('styles')
        <style>
            .sidebar-history {
                height: calc(100vh - 2rem);
            }
            @media (max-width: 1023px) {
                .main-content {
                    width: 100%;
                }
                .history-sidebar {
                    width: 100%;
                    margin-top: 1.5rem;
                }
            }
            /* Modal transition effects */
            .modal {
                transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
                transform: scale(0.95);
            }
            .modal.show {
                transform: scale(1);
                opacity: 1;
            }
            .modal-overlay {
                transition: opacity 0.3s ease-in-out;
            }
        </style>
    @endpush

    <div class="bg-gray-100">
        <div class="flex flex-col lg:flex-row gap-4">
            <!-- Konten Utama -->
            <div class="main-content bg-white rounded-lg p-6 shadow-sm lg:w-3/4">
                <!-- Page Header -->
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
                    <h1 class="text-xl font-semibold flex items-center gap-2 text-gray-900">
                        <i class="fas fa-users text-yellow-400 text-lg"></i>
                        Manajemen Pengguna
                    </h1>
                    <button onclick="showCreateModal()" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors">
                        <i class="fas fa-plus text-sm"></i>
                        Tambah Pengguna Baru
                    </button>
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
                                <option value="kurator">Kurator</option>
                                <option value="member">Member</option>
                            </select>
                        </div>
                        <div>
                            <label for="status-filter" class="block text-sm font-medium text-gray-700 mb-1.5">Status</label>
                            <select id="status-filter" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                                <option value="">Semua Status</option>
                                <option value="active">Aktif</option>
                                <option value="inactive">Tidak Aktif</option>
                                <option value="banned">Dibanned</option>
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
                                    <td class="p-3 text-[13px] font-medium text-gray-900">Andi Setiawan</td>
                                    <td class="p-3 text-[12px] text-gray-600">andi@example.com</td>
                                    <td class="p-3 text-[12px] text-gray-900">Admin</td>
                                    <td class="p-3"><span class="px-2 py-1 rounded-full bg-green-100 text-green-600 text-xs">Aktif</span></td>
                                    <td class="p-3 text-[12px] text-gray-900">2025-09-01</td>
                                    <td class="p-3">
                                        <div class="flex gap-2">
                                            <a href="#" class="w-8 h-8 rounded-md bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-[12px]" aria-label="Lihat Andi Setiawan"><i class="fas fa-eye"></i></a>
                                            <button onclick="showEditModal('Andi Setiawan')" class="w-8 h-8 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-[12px]" aria-label="Edit Andi Setiawan"><i class="fas fa-edit"></i></button>
                                            <button class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-[12px]" onclick="showDeleteModal('Andi Setiawan')" aria-label="Hapus Andi Setiawan"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="p-3 text-[12px] font-medium text-gray-900">Budi Santoso</td>
                                    <td class="p-3 text-[12px] text-gray-600">budi@example.com</td>
                                    <td class="p-3 text-[12px] text-gray-900">Member</td>
                                    <td class="p-3"><span class="px-2 py-1 rounded-full bg-green-100 text-green-600 text-xs">Aktif</span></td>
                                    <td class="p-3 text-[12px] text-gray-900">2025-08-15</td>
                                    <td class="p-3">
                                        <div class="flex gap-2">
                                            <a href="#" class="w-8 h-8 rounded-md bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-[12px]" aria-label="Lihat Budi Santoso"><i class="fas fa-eye"></i></a>
                                            <button onclick="showEditModal('Budi Santoso')" class="w-8 h-8 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-[12px]" aria-label="Edit Budi Santoso"><i class="fas fa-edit"></i></button>
                                            <button class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-[12px]" onclick="showDeleteModal('Budi Santoso')" aria-label="Hapus Budi Santoso"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="p-3 text-[12px] font-medium text-gray-900">Citra Dewi</td>
                                    <td class="p-3 text-[12px] text-gray-600">citra@example.com</td>
                                    <td class="p-3 text-[12px] text-gray-900">Kurator</td>
                                    <td class="p-3"><span class="px-2 py-1 rounded-full bg-red-100 text-red-600 text-xs">Tidak Aktif</span></td>
                                    <td class="p-3 text-[12px] text-gray-900">2024-12-10</td>
                                    <td class="p-3">
                                        <div class="flex gap-2">
                                            <a href="#" class="w-8 h-8 rounded-md bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-[12px]" aria-label="Lihat Citra Dewi"><i class="fas fa-eye"></i></a>
                                            <button onclick="showEditModal('Citra Dewi')" class="w-8 h-8 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-[12px]" aria-label="Edit Citra Dewi"><i class="fas fa-edit"></i></button>
                                            <button class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-[12px]" onclick="showDeleteModal('Citra Dewi')" aria-label="Hapus Citra Dewi"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="p-3 text-[12px] font-medium text-gray-900">Dedi Pratama</td>
                                    <td class="p-3 text-[12px] text-gray-600">dedi@example.com</td>
                                    <td class="p-3 text-[12px] text-gray-900">Member</td>
                                    <td class="p-3"><span class="px-2 py-1 rounded-full bg-green-100 text-green-600 text-xs">Aktif</span></td>
                                    <td class="p-3 text-[12px] text-gray-900">2025-09-05</td>
                                    <td class="p-3">
                                        <div class="flex gap-2">
                                            <a href="#" class="w-8 h-8 rounded-md bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-[12px]" aria-label="Lihat Dedi Pratama"><i class="fas fa-eye"></i></a>
                                            <button onclick="showEditModal('Dedi Pratama')" class="w-8 h-8 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-[12px]" aria-label="Edit Dedi Pratama"><i class="fas fa-edit"></i></button>
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
                                            <button onclick="showEditModal('Eka Sari')" class="w-8 h-8 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-[12px]" aria-label="Edit Eka Sari"><i class="fas fa-edit"></i></button>
                                            <button class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-[12px]" onclick="showDeleteModal('Eka Sari')" aria-label="Hapus Eka Sari"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="flex justify-center mt-5 gap-2">
                        <a href="#" class="w-9 h-8 flex items-center justify-center rounded-md bg-white border border-gray-200 text-gray-900 hover:bg-yellow-400 hover:border-yellow-400 text-[12px]" aria-label="Previous page"><i class="fas fa-chevron-left"></i></a>
                        <a href="#" class="w-9 h-8 flex items-center justify-center rounded-md bg-yellow-400 text-gray-900 font-medium border border-yellow-400 text-[12px]" aria-label="Page 1">1</a>
                        <a href="#" class="w-9 h-8 flex items-center justify-center rounded-md bg-white border border-gray-200 text-gray-900 hover:bg-yellow-400 hover:border-yellow-400 text-[12px]" aria-label="Page 2">2</a>
                        <a href="#" class="w-9 h-8 flex items-center justify-center rounded-md bg-white border border-gray-200 text-gray-900 hover:bg-yellow-400 hover:border-yellow-400 text-[12px]" aria-label="Page 3">3</a>
                        <span class="flex items-center px-3 text-gray-600 text-[12px]">...</span>
                        <a href="#" class="w-9 h-8 flex items-center justify-center rounded-md bg-white border border-gray-200 text-gray-900 hover:bg-yellow-400 hover:border-yellow-400 text-[12px]" aria-label="Page 5">5</a>
                        <a href="#" class="w-9 h-8 flex items-center justify-center rounded-md bg-white border border-gray-200 text-gray-900 hover:bg-yellow-400 hover:border-yellow-400 text-[12px]" aria-label="Next page"><i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Sidebar Riwayat Keseharian -->
            <div class="history-sidebar bg-white rounded-lg p-6 shadow-sm lg:w-1/4">
                <h2 class="text-lg font-semibold flex items-center gap-2 mb-4 text-gray-900">
                    <i class="fas fa-history text-yellow-400 text-lg"></i>
                    Riwayat Keseharian
                </h2>
                <div class="sidebar-history overflow-y-auto pr-2">
                    <div class="mb-4 pb-4 border-b border-gray-200">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-sm font-medium text-gray-900">Hari ini</span>
                            <span class="text-xs text-gray-500">12:45</span>
                        </div>
                        <p class="text-xs text-gray-600">Pengguna "Budi Santoso" berhasil diperbarui datanya</p>
                    </div>
                    <div class="mb-4 pb-4 border-b border-gray-200">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-sm font-medium text-gray-900">Hari ini</span>
                            <span class="text-xs text-gray-500">11:30</span>
                        </div>
                        <p class="text-xs text-gray-600">Pengguna baru "Dedi Pratama" telah ditambahkan</p>
                    </div>
                    <div class="mb-4 pb-4 border-b border-gray-200">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-sm font-medium text-gray-900">Hari ini</span>
                            <span class="text-xs text-gray-500">10:15</span>
                        </div>
                        <p class="text-xs text-gray-600">Pengguna "Citra Dewi" dinonaktifkan</p>
                    </div>
                    <div class="mb-4 pb-4 border-b border-gray-200">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-sm font-medium text-gray-900">Kemarin</span>
                            <span class="text-xs text-gray-500">16:20</span>
                        </div>
                        <p class="text-xs text-gray-600">Filter pengguna diterapkan: Peran=Admin, Status=Aktif</p>
                    </div>
                    <div class="mb-4 pb-4 border-b border-gray-200">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-sm font-medium text-gray-900">Kemarin</span>
                            <span class="text-xs text-gray-500">14:55</span>
                        </div>
                        <p class="text-xs text-gray-600">5 pengguna diekspor ke file CSV</p>
                    </div>
                    <div class="mb-4 pb-4 border-b border-gray-200">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-sm font-medium text-gray-900">Kemarin</span>
                            <span class="text-xs text-gray-500">13:10</span>
                        </div>
                        <p class="text-xs text-gray-600">Pengguna "Andi Setiawan" mengubah password</p>
                    </div>
                    <div class="mb-4">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-sm font-medium text-gray-900">2 hari lalu</span>
                            <span class="text-xs text-gray-500">17:40</span>
                        </div>
                        <p class="text-xs text-gray-600">Login berhasil dari perangkat baru</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Create User -->
        <div class="modal hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 modal-overlay" id="createModal">
            <div class="bg-white rounded-xl p-4 w-full max-w-md mx-4 shadow-xl">
                <div class="flex justify-between items-center mb-3 text-black rounded-t-xl p-3">
                    <h3 class="text-lg font-semibold">Tambah Pengguna Baru</h3>
                    <button class="text-2xl hover:text-gray-200 transition-colors" onclick="closeCreateModal()" aria-label="Tutup modal">&times;</button>
                </div>
                <form id="createUserForm">
                    <div class="mb-3">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1.5">Nama Lengkap</label>
                        <input type="text" id="name" name="name" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="block text-sm font-medium text-gray-700 mb-1.5">Username</label>
                        <input type="text" id="username" name="username" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5">Email</label>
                        <input type="email" id="email" name="email" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1.5">Password</label>
                        <input type="password" id="password" name="password" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1.5">Konfirmasi Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="block text-sm font-medium text-gray-700 mb-1.5">Peran</label>
                        <select id="role" name="role" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                            <option value="member">Member</option>
                            <option value="admin">Admin</option>
                            <option value="kurator">Kurator</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-1.5">Status</label>
                        <select id="status" name="status" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                            <option value="active">Aktif</option>
                            <option value="inactive">Tidak Aktif</option>
                            <option value="banned">Dibanned</option>
                        </select>
                    </div>
                    <div class="flex justify-end gap-3 mt-4">
                        <button type="button" class="bg-gray-200 hover:bg-gray-300 text-gray-900 text-sm font-medium px-4 py-1.5 rounded-md transition-colors" onclick="closeCreateModal()">Batal</button>
                        <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-1.5 rounded-md transition-colors">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal Edit User -->
        <div class="modal hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 modal-overlay" id="editModal">
            <div class="bg-white rounded-xl p-4 w-full max-w-md mx-4 shadow-xl">
                <div class="flex justify-between items-center mb-3 text-white rounded-t-xl p-3">
                    <h3 class="text-lg font-semibold">Edit Pengguna</h3>
                    <button class="text-2xl hover:text-gray-200 transition-colors" onclick="closeEditModal()" aria-label="Tutup modal">&times;</button>
                </div>
                <form id="editUserForm">
                    <input type="hidden" id="edit_id" name="id">
                    <div class="mb-3">
                        <label for="edit_name" class="block text-sm font-medium text-gray-700 mb-1.5">Nama Lengkap</label>
                        <input type="text" id="edit_name" name="name" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_username" class="block text-sm font-medium text-gray-700 mb-1.5">Username</label>
                        <input type="text" id="edit_username" name="username" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_email" class="block text-sm font-medium text-gray-700 mb-1.5">Email</label>
                        <input type="email" id="edit_email" name="email" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_password" class="block text-sm font-medium text-gray-700 mb-1.5">Password (biarkan kosong jika tidak diubah)</label>
                        <input type="password" id="edit_password" name="password" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                    </div>
                    <div class="mb-3">
                        <label for="edit_password_confirmation" class="block text-sm font-medium text-gray-700 mb-1.5">Konfirmasi Password</label>
                        <input type="password" id="edit_password_confirmation" name="password_confirmation" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                    </div>
                    <div class="mb-3">
                        <label for="edit_role" class="block text-sm font-medium text-gray-700 mb-1.5">Peran</label>
                        <select id="edit_role" name="role" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                            <option value="member">Member</option>
                            <option value="admin">Admin</option>
                            <option value="kurator">Kurator</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="edit_status" class="block text-sm font-medium text-gray-700 mb-1.5">Status</label>
                        <select id="edit_status" name="status" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                            <option value="active">Aktif</option>
                            <option value="inactive">Tidak Aktif</option>
                            <option value="banned">Dibanned</option>
                        </select>
                    </div>
                    <div class="flex justify-end gap-3 mt-4">
                        <button type="button" class="bg-gray-200 hover:bg-gray-300 text-gray-900 text-sm font-medium px-4 py-1.5 rounded-md transition-colors" onclick="closeEditModal()">Batal</button>
                        <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-1.5 rounded-md transition-colors">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Delete User Modal -->
        <div class="modal hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 modal-overlay" id="deleteModal">
            <div class="bg-white rounded-xl p-4 w-full max-w-md mx-4 shadow-xl">
                <div class="flex justify-between items-center mb-3 bg-gradient-to-r from-red-400 to-red-500 text-white rounded-t-xl p-3">
                    <h3 class="text-lg font-semibold">Hapus Pengguna</h3>
                    <button class="text-2xl hover:text-gray-200 transition-colors" onclick="closeDeleteModal()" aria-label="Tutup modal">&times;</button>
                </div>
                <div class="mb-3 text-sm text-gray-700">
                    <p class="mb-2">Apakah Anda yakin ingin menghapus pengguna <strong id="deleteUserName"></strong>?</p>
                    <p>Tindakan ini tidak dapat dibatalkan dan semua data terkait pengguna ini akan dihapus permanen.</p>
                </div>
                <div class="flex justify-end gap-3">
                    <button class="bg-gray-200 hover:bg-gray-300 text-gray-900 text-sm font-medium px-4 py-1.5 rounded-md transition-colors" onclick="closeDeleteModal()">Batal</button>
                    <button class="bg-red-500 hover:bg-red-600 text-white text-sm font-medium px-4 py-1.5 rounded-md transition-colors" onclick="deleteUser()">Hapus Pengguna</button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            let currentUserName = '';

            // Modal functions for Create
            function showCreateModal() {
                const modal = document.getElementById('createModal');
                modal.classList.remove('hidden');
                modal.classList.add('show');
            }

            function closeCreateModal() {
                const modal = document.getElementById('createModal');
                modal.classList.remove('show');
                setTimeout(() => modal.classList.add('hidden'), 300);
                document.getElementById('createUserForm').reset();
            }

            // Modal functions for Edit
            function showEditModal(userName) {
                currentUserName = userName;
                // In a real application, you would fetch user data from server
                // Here we're just populating with dummy data
                document.getElementById('edit_id').value = '1';
                document.getElementById('edit_name').value = userName;
                document.getElementById('edit_username').value = userName.toLowerCase().replace(' ', '');
                document.getElementById('edit_email').value = userName.toLowerCase().replace(' ', '') + '@example.com';
                document.getElementById('edit_role').value = 'member';
                document.getElementById('edit_status').value = 'active';
                document.getElementById('edit_password').value = '';
                document.getElementById('edit_password_confirmation').value = '';
                
                const modal = document.getElementById('editModal');
                modal.classList.remove('hidden');
                modal.classList.add('show');
            }

            function closeEditModal() {
                const modal = document.getElementById('editModal');
                modal.classList.remove('show');
                setTimeout(() => modal.classList.add('hidden'), 300);
                document.getElementById('editUserForm').reset();
            }

            // Modal functions for Delete
            function showDeleteModal(userName) {
                currentUserName = userName;
                const modal = document.getElementById('deleteModal');
                const userNameElement = document.getElementById('deleteUserName');
                userNameElement.textContent = userName;
                modal.classList.remove('hidden');
                modal.classList.add('show');
            }

            function closeDeleteModal() {
                const modal = document.getElementById('deleteModal');
                modal.classList.remove('show');
                setTimeout(() => modal.classList.add('hidden'), 300);
            }

            function deleteUser() {
                console.log('Deleting user:', currentUserName);
                // Implement actual delete logic here (e.g., API call)
                closeDeleteModal();
            }

            // Form submissions with password confirmation validation
            document.getElementById('createUserForm').addEventListener('submit', function(e) {
                e.preventDefault();
                const password = document.getElementById('password').value;
                const passwordConfirmation = document.getElementById('password_confirmation').value;
                if (password !== passwordConfirmation) {
                    alert('Password dan konfirmasi password tidak cocok!');
                    return;
                }
                console.log('Creating new user');
                // Implement actual create logic here
                closeCreateModal();
            });

            document.getElementById('editUserForm').addEventListener('submit', function(e) {
                e.preventDefault();
                const password = document.getElementById('edit_password').value;
                const passwordConfirmation = document.getElementById('edit_password_confirmation').value;
                if (password && password !== passwordConfirmation) {
                    alert('Password dan konfirmasi password tidak cocok!');
                    return;
                }
                console.log('Updating user:', currentUserName);
                // Implement actual update logic here
                closeEditModal();
            });

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
