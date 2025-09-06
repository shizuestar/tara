<x-admin-layout>
    <div class="bg-white rounded-lg p-6 shadow-sm border border-gray-200">
        <!-- Page Header -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
            <h1 class="text-2xl font-bold flex items-center gap-2 text-gray-900" style="font-family: 'Space Grotesk', sans-serif;">
                <i class="fas fa-project-diagram text-yellow-400 text-xl"></i>
                Daftar Proyek
            </h1>
            <div class="flex gap-3 flex-wrap">
                <button onclick="showCreateModal()" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors">
                    <i class="fas fa-plus text-sm"></i>
                    Tambah Proyek Baru
                </button>
                <button onclick="showCategoryModal()" class="bg-gray-800 hover:bg-gray-900 text-white text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors">
                    <i class="fas fa-tags text-sm"></i>
                    Kelola Tipe Proyek
                </button>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="bg-white rounded-lg p-5 mb-8 border border-gray-200">
            <h3 class="text-lg font-semibold flex items-center gap-2 mb-4 text-gray-900" style="font-family: 'Space Grotesk', sans-serif;">
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
                        <option value="4">Budi Santoso</option>
                        <option value="5">Sari Indah</option>
                    </select>
                </div>
                <div>
                    <label for="keyword-filter" class="block text-sm font-medium text-gray-700 mb-1.5">Kata Kunci</label>
                    <input id="keyword-filter" type="text" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Cari nama atau deskripsi proyek...">
                </div>
            </div>
            <div class="flex gap-3 mt-4">
                <button id="applyFilter" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors">
                    <i class="fas fa-filter text-sm"></i>
                    Terapkan
                </button>
                <button id="resetFilter" class="bg-gray-100 hover:bg-gray-200 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors">
                    <i class="fas fa-redo text-sm"></i>
                    Reset
                </button>
            </div>
        </div>

        <!-- Modal Create -->
        <div id="createModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
            <div class="bg-white rounded-lg p-6 w-full max-w-6xl max-h-screen overflow-y-auto">
                <div class="flex justify-between items-center mb-4 border-b border-gray-200 pb-3">
                    <h3 class="text-lg font-semibold text-gray-900" style="font-family: 'Space Grotesk', sans-serif;">Tambah Proyek Baru</h3>
                    <button class="text-xl text-gray-600 hover:text-gray-900" onclick="closeModal('createModal')" aria-label="Tutup">&times;</button>
                </div>
                <form id="createForm" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Informasi Dasar Proyek -->
                    <div class="md:col-span-2">
                        <h4 class="text-md font-semibold mb-3 text-gray-800 flex items-center gap-2">
                            <i class="fas fa-info-circle text-yellow-400"></i>
                            Informasi Dasar Proyek
                        </h4>
                    </div>
                    <div class="md:col-span-2">
                        <label for="project_name" class="block text-sm font-medium text-gray-700 mb-1">Nama Proyek *</label>
                        <input type="text" id="project_name" class="w-full p-2 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                    </div>
                    <div>
                        <label for="creator_id" class="block text-sm font-medium text-gray-700 mb-1">Pemilik Proyek *</label>
                        <select id="creator_id" class="w-full p-2 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                            <option value="">Pilih Pemilik Proyek</option>
                            <option value="1">Dewi Santika</option>
                            <option value="2">Aldi Pratama</option>
                            <option value="3">Rina Andriani</option>
                            <option value="4">Budi Santoso</option>
                            <option value="5">Sari Indah</option>
                        </select>
                    </div>
                    <div>
                        <label for="community_id" class="block text-sm font-medium text-gray-700 mb-1">Komunitas *</label>
                        <select id="community_id" class="w-full p-2 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                            <option value="">Pilih Komunitas</option>
                            <option value="101">Komunitas Web Developer</option>
                            <option value="102">Komunitas UI/UX Designer</option>
                            <option value="103">Komunitas Data Science</option>
                            <option value="104">Komunitas Digital Marketing</option>
                        </select>
                    </div>
                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Proyek</label>
                        <textarea id="description" class="w-full p-2 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400" rows="3" placeholder="Jelaskan detail proyek, tujuan, dan manfaatnya..."></textarea>
                    </div>
                    
                    <!-- Timeline Proyek -->
                    <div class="md:col-span-2">
                        <h4 class="text-md font-semibold mb-3 text-gray-800 flex items-center gap-2">
                            <i class="fas fa-calendar-alt text-yellow-400"></i>
                            Timeline Proyek
                        </h4>
                    </div>
                    <div>
                        <label for="start_date" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Mulai *</label>
                        <input type="date" id="start_date" class="w-full p-2 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                    </div>
                    <div>
                        <label for="end_date" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Selesai (Estimasi)</label>
                        <input type="date" id="end_date" class="w-full p-2 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400">
                    </div>
                    
                    <!-- Anggota Tim -->
                    <div class="md:col-span-2">
                        <h4 class="text-md font-semibold mb-3 text-gray-800 flex items-center gap-2">
                            <i class="fas fa-users text-yellow-400"></i>
                            Anggota Tim
                            <button type="button" onclick="addMemberRow()" class="ml-auto text-xs bg-yellow-400 text-gray-900 px-2 py-1 rounded-md flex items-center gap-1">
                                <i class="fas fa-plus"></i> Tambah
                            </button>
                        </h4>
                        <div id="members-container" class="space-y-3">
                            <div class="member-row grid grid-cols-1 md:grid-cols-12 gap-2 items-end">
                                <div class="md:col-span-5">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Anggota</label>
                                    <select class="w-full p-2 border border-gray-200 rounded-md text-sm">
                                        <option value="">Pilih Anggota</option>
                                        <option value="1">Dewi Santika</option>
                                        <option value="2">Aldi Pratama</option>
                                        <option value="3">Rina Andriani</option>
                                        <option value="4">Budi Santoso</option>
                                        <option value="5">Sari Indah</option>
                                    </select>
                                </div>
                                <div class="md:col-span-5">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                                    <select class="w-full p-2 border border-gray-200 rounded-md text-sm">
                                        <option value="">Pilih Role</option>
                                        <option value="developer">Developer</option>
                                        <option value="designer">Designer</option>
                                        <option value="project_manager">Project Manager</option>
                                        <option value="qa">Quality Assurance</option>
                                        <option value="content_creator">Content Creator</option>
                                    </select>
                                </div>
                                <div class="md:col-span-2">
                                    <button type="button" class="w-full bg-red-500 text-white p-2 rounded-md text-sm flex items-center justify-center" onclick="removeMemberRow(this)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Linimasa Proyek -->
                    <div class="md:col-span-2">
                        <h4 class="text-md font-semibold mb-3 text-gray-800 flex items-center gap-2">
                            <i class="fas fa-road text-yellow-400"></i>
                            Linimasa Proyek
                            <button type="button" onclick="addTimelineEvent()" class="ml-auto text-xs bg-yellow-400 text-gray-900 px-2 py-1 rounded-md flex items-center gap-1">
                                <i class="fas fa-plus"></i> Tambah
                            </button>
                        </h4>
                        <div id="timeline-container" class="space-y-3">
                            <div class="timeline-event grid grid-cols-1 md:grid-cols-12 gap-2 items-end">
                                <div class="md:col-span-3">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal</label>
                                    <input type="date" class="w-full p-2 border border-gray-200 rounded-md text-sm">
                                </div>
                                <div class="md:col-span-7">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Kegiatan</label>
                                    <input type="text" class="w-full p-2 border border-gray-200 rounded-md text-sm" placeholder="Deskripsi kegiatan">
                                </div>
                                <div class="md:col-span-2">
                                    <button type="button" class="w-full bg-red-500 text-white p-2 rounded-md text-sm flex items-center justify-center" onclick="removeTimelineEvent(this)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Informasi Tambahan -->
                    <div class="md:col-span-2">
                        <h4 class="text-md font-semibold mb-3 text-gray-800 flex items-center gap-2">
                            <i class="fas fa-cog text-yellow-400"></i>
                            Informasi Tambahan
                        </h4>
                    </div>
                    <div>
                        <label for="cover_images" class="block text-sm font-medium text-gray-700 mb-1">Gambar Sampul (URL)</label>
                        <input type="url" id="cover_images" class="w-full p-2 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="https://example.com/image.jpg">
                    </div>
                    <div>
                        <label for="progress" class="block text-sm font-medium text-gray-700 mb-1">Progres (%)</label>
                        <input type="range" id="progress" class="w-full" step="1" min="0" max="100" value="0" oninput="updateProgressValue(this.value)">
                        <div class="flex justify-between items-center mt-1">
                            <span class="text-xs text-gray-500">0%</span>
                            <span id="progress-value" class="text-sm font-medium">0%</span>
                            <span class="text-xs text-gray-500">100%</span>
                        </div>
                    </div>
                    <div class="md:col-span-2">
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select id="status" class="w-full p-2 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400">
                            <option value="ongoing">Berlangsung</option>
                            <option value="pending">Menunggu Persetujuan</option>
                            <option value="completed">Selesai</option>
                            <option value="onhold">Ditunda</option>
                        </select>
                    </div>
                    
                    <div class="md:col-span-2 flex justify-end gap-3 mt-4">
                        <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2">
                            <i class="fas fa-save text-sm"></i> Simpan Proyek
                        </button>
                        <button type="button" onclick="closeModal('createModal')" class="bg-gray-100 hover:bg-gray-200 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2">
                            <i class="fas fa-times text-sm"></i> Batal
                        </button>
                    </div>
                </form>
                <div id="createError" class="hidden mt-4 p-3 bg-red-100 text-red-700 rounded-md text-sm"></div>
                <div id="createLoading" class="hidden mt-4 p-3 bg-blue-100 text-blue-700 rounded-md text-sm flex items-center gap-2">
                    <i class="fas fa-spinner fa-spin"></i> Menyimpan...
                </div>
            </div>
        </div>

        <!-- Modal Edit -->
        <div id="editModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
            <div class="bg-white rounded-lg p-6 w-full max-w-6xl max-h-screen overflow-y-auto">
                <div class="flex justify-between items-center mb-4 border-b border-gray-200 pb-3">
                    <h3 class="text-lg font-semibold text-gray-900" style="font-family: 'Space Grotesk', sans-serif;">Edit Proyek</h3>
                    <button class="text-xl text-gray-600 hover:text-gray-900" onclick="closeModal('editModal')" aria-label="Tutup">&times;</button>
                </div>
                <form id="editForm" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <input type="hidden" id="edit_id">
                    
                    <!-- Informasi Dasar Proyek -->
                    <div class="md:col-span-2">
                        <h4 class="text-md font-semibold mb-3 text-gray-800 flex items-center gap-2">
                            <i class="fas fa-info-circle text-yellow-400"></i>
                            Informasi Dasar Proyek
                        </h4>
                    </div>
                    <div class="md:col-span-2">
                        <label for="edit_project_name" class="block text-sm font-medium text-gray-700 mb-1">Nama Proyek *</label>
                        <input type="text" id="edit_project_name" class="w-full p-2 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                    </div>
                    <div>
                        <label for="edit_creator_id" class="block text-sm font-medium text-gray-700 mb-1">Pemilik Proyek *</label>
                        <select id="edit_creator_id" class="w-full p-2 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                            <option value="">Pilih Pemilik Proyek</option>
                            <option value="1">Dewi Santika</option>
                            <option value="2">Aldi Pratama</option>
                            <option value="3">Rina Andriani</option>
                            <option value="4">Budi Santoso</option>
                            <option value="5">Sari Indah</option>
                        </select>
                    </div>
                    <div>
                        <label for="edit_community_id" class="block text-sm font-medium text-gray-700 mb-1">Komunitas *</label>
                        <select id="edit_community_id" class="w-full p-2 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                            <option value="">Pilih Komunitas</option>
                            <option value="101">Komunitas Web Developer</option>
                            <option value="102">Komunitas UI/UX Designer</option>
                            <option value="103">Komunitas Data Science</option>
                            <option value="104">Komunitas Digital Marketing</option>
                        </select>
                    </div>
                    <div class="md:col-span-2">
                        <label for="edit_description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Proyek</label>
                        <textarea id="edit_description" class="w-full p-2 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400" rows="3" placeholder="Jelaskan detail proyek, tujuan, dan manfaatnya..."></textarea>
                    </div>
                    
                    <!-- Timeline Proyek -->
                    <div class="md:col-span-2">
                        <h4 class="text-md font-semibold mb-3 text-gray-800 flex items-center gap-2">
                            <i class="fas fa-calendar-alt text-yellow-400"></i>
                            Timeline Proyek
                        </h4>
                    </div>
                    <div>
                        <label for="edit_start_date" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Mulai *</label>
                        <input type="date" id="edit_start_date" class="w-full p-2 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                    </div>
                    <div>
                        <label for="edit_end_date" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Selesai (Estimasi)</label>
                        <input type="date" id="edit_end_date" class="w-full p-2 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400">
                    </div>
                    
                    <!-- Anggota Tim -->
                    <div class="md:col-span-2">
                        <h4 class="text-md font-semibold mb-3 text-gray-800 flex items-center gap-2">
                            <i class="fas fa-users text-yellow-400"></i>
                            Anggota Tim
                            <button type="button" onclick="addMemberRow('edit')" class="ml-auto text-xs bg-yellow-400 text-gray-900 px-2 py-1 rounded-md flex items-center gap-1">
                                <i class="fas fa-plus"></i> Tambah
                            </button>
                        </h4>
                        <div id="edit-members-container" class="space-y-3">
                            <!-- Anggota akan diisi secara dinamis -->
                        </div>
                    </div>
                    
                    <!-- Linimasa Proyek -->
                    <div class="md:col-span-2">
                        <h4 class="text-md font-semibold mb-3 text-gray-800 flex items-center gap-2">
                            <i class="fas fa-road text-yellow-400"></i>
                            Linimasa Proyek
                            <button type="button" onclick="addTimelineEvent('edit')" class="ml-auto text-xs bg-yellow-400 text-gray-900 px-2 py-1 rounded-md flex items-center gap-1">
                                <i class="fas fa-plus"></i> Tambah
                            </button>
                        </h4>
                        <div id="edit-timeline-container" class="space-y-3">
                            <!-- Timeline akan diisi secara dinamis -->
                        </div>
                    </div>
                    
                    <!-- Informasi Tambahan -->
                    <div class="md:col-span-2">
                        <h4 class="text-md font-semibold mb-3 text-gray-800 flex items-center gap-2">
                            <i class="fas fa-cog text-yellow-400"></i>
                            Informasi Tambahan
                        </h4>
                    </div>
                    <div>
                        <label for="edit_cover_images" class="block text-sm font-medium text-gray-700 mb-1">Gambar Sampul (URL)</label>
                        <input type="url" id="edit_cover_images" class="w-full p-2 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="https://example.com/image.jpg">
                    </div>
                    <div>
                        <label for="edit_progress" class="block text-sm font-medium text-gray-700 mb-1">Progres (%)</label>
                        <input type="range" id="edit_progress" class="w-full" step="1" min="0" max="100" value="0" oninput="updateEditProgressValue(this.value)">
                        <div class="flex justify-between items-center mt-1">
                            <span class="text-xs text-gray-500">0%</span>
                            <span id="edit-progress-value" class="text-sm font-medium">0%</span>
                            <span class="text-xs text-gray-500">100%</span>
                        </div>
                    </div>
                    <div class="md:col-span-2">
                        <label for="edit_status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select id="edit_status" class="w-full p-2 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400">
                            <option value="ongoing">Berlangsung</option>
                            <option value="pending">Menunggu Persetujuan</option>
                            <option value="completed">Selesai</option>
                            <option value="onhold">Ditunda</option>
                        </select>
                    </div>
                    
                    <div class="md:col-span-2 flex justify-end gap-3 mt-4">
                        <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2">
                            <i class="fas fa-save text-sm"></i> Simpan Perubahan
                        </button>
                        <button type="button" onclick="closeModal('editModal')" class="bg-gray-100 hover:bg-gray-200 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2">
                            <i class="fas fa-times text-sm"></i> Batal
                        </button>
                    </div>
                </form>
                <div id="editError" class="hidden mt-4 p-3 bg-red-100 text-red-700 rounded-md text-sm"></div>
                <div id="editLoading" class="hidden mt-4 p-3 bg-blue-100 text-blue-700 rounded-md text-sm flex items-center gap-2">
                    <i class="fas fa-spinner fa-spin"></i> Menyimpan...
                </div>
            </div>
        </div>

        <!-- Modal Delete -->
        <div id="deleteModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg p-6 w-full max-w-4xl max-h-screen overflow-y-auto">
                <div class="flex justify-between items-center mb-4 border-b border-gray-200 pb-3">
                    <h3 class="text-lg font-semibold text-gray-900" style="font-family: 'Space Grotesk', sans-serif;">Hapus Proyek</h3>
                    <button class="text-xl text-gray-600 hover:text-gray-900" onclick="closeModal('deleteModal')" aria-label="Tutup">&times;</button>
                </div>
                <div class="mb-4 text-sm text-gray-700">
                    <p class="mb-2">Apakah Anda yakin ingin menghapus proyek <strong id="deleteProjectName"></strong>?</p>
                    <p>Tindakan ini tidak bisa dibatalkan, data akan hilang selamanya.</p>
                </div>
                <div class="flex justify-end gap-3">
                    <button class="bg-gray-100 hover:bg-gray-200 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2" onclick="closeModal('deleteModal')">
                        <i class="fas fa-times text-sm"></i> Batal
                    </button>
                    <button id="confirmDelete" class="bg-red-500 hover:bg-red-600 text-white text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2">
                        <i class="fas fa-trash text-sm"></i> Hapus Proyek
                    </button>
                </div>
                <div id="deleteError" class="hidden mt-4 p-3 bg-red-100 text-red-700 rounded-md text-sm"></div>
                <div id="deleteLoading" class="hidden mt-4 p-3 bg-blue-100 text-blue-700 rounded-md text-sm flex items-center gap-2">
                    <i class="fas fa-spinner fa-spin"></i> Menghapus...
                </div>
            </div>
        </div>

        <!-- Modal Category -->
        <div id="categoryModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg p-6 w-full max-w-4xl max-h-screen overflow-y-auto">
                <div class="flex justify-between items-center mb-4 border-b border-gray-200 pb-3">
                    <h3 class="text-lg font-semibold text-gray-900" id="categoryModalTitle" style="font-family: 'Space Grotesk', sans-serif;">Tambah Tipe Proyek</h3>
                    <button class="text-xl text-gray-600 hover:text-gray-900" onclick="closeModal('categoryModal')" aria-label="Tutup">&times;</button>
                </div>
                <form id="categoryForm" class="space-y-4">
                    <div>
                        <label for="categoryName" class="block text-sm font-medium text-gray-700 mb-1">Nama Tipe</label>
                        <input type="text" id="categoryName" class="w-full p-2 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Masukkan nama tipe proyek..." required>
                    </div>
                    <div>
                        <label for="categoryDescription" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                        <textarea id="categoryDescription" class="w-full p-2 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400" rows="3" placeholder="Masukkan deskripsi tipe proyek..."></textarea>
                    </div>
                    <div class="flex justify-end gap-3">
                        <button type="button" class="bg-gray-100 hover:bg-gray-200 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2" onclick="closeModal('categoryModal')">
                            <i class="fas fa-times text-sm"></i> Batal
                        </button>
                        <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2">
                            <i class="fas fa-save text-sm"></i> Simpan
                        </button>
                    </div>
                </form>
                <div id="categoryError" class="hidden mt-4 p-3 bg-red-100 text-red-700 rounded-md text-sm"></div>
                <div id="categoryLoading" class="hidden mt-4 p-3 bg-blue-100 text-blue-700 rounded-md text-sm flex items-center gap-2">
                    <i class="fas fa-spinner fa-spin"></i> Menyimpan...
                </div>
            </div>
        </div>

        <!-- Modal Delete Category -->
        <div id="categoryDeleteModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg p-6 w-full max-w-4xl max-h-screen overflow-y-auto">
                <div class="flex justify-between items-center mb-4 border-b border-gray-200 pb-3">
                    <h3 class="text-lg font-semibold text-gray-900" style="font-family: 'Space Grotesk', sans-serif;">Hapus Tipe Proyek</h3>
                    <button class="text-xl text-gray-600 hover:text-gray-900" onclick="closeModal('categoryDeleteModal')" aria-label="Tutup">&times;</button>
                </div>
                <div class="mb-4 text-sm text-gray-700">
                    <p class="mb-2">Apakah Anda yakin ingin menghapus tipe proyek <strong id="deleteCategoryName"></strong>?</p>
                    <p>Tindakan ini tidak bisa dibatalkan, data akan hilang selamanya.</p>
                </div>
                <div class="flex justify-end gap-3">
                    <button class="bg-gray-100 hover:bg-gray-200 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2" onclick="closeModal('categoryDeleteModal')">
                        <i class="fas fa-times text-sm"></i> Batal
                    </button>
                    <button class="bg-red-500 hover:bg-red-600 text-white text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2" onclick="deleteCategory()">
                        <i class="fas fa-trash text-sm"></i> Hapus Tipe Proyek
                    </button>
                </div>
                <div id="categoryDeleteError" class="hidden mt-4 p-3 bg-red-100 text-red-700 rounded-md text-sm"></div>
                <div id="categoryDeleteLoading" class="hidden mt-4 p-3 bg-blue-100 text-blue-700 rounded-md text-sm flex items-center gap-2">
                    <i class="fas fa-spinner fa-spin"></i> Menghapus...
                </div>
            </div>
        </div>

        <!-- Project List Section -->
        <div class="bg-white rounded-lg p-5 border border-gray-200">
            <div class="flex justify-between items-center gap-4 mb-5">
                <h2 class="text-lg font-semibold text-gray-900" style="font-family: 'Space Grotesk', sans-serif;">Daftar Proyek</h2>
                <div id="paginationInfo" class="text-sm text-gray-600">Menampilkan 0 dari 0 hasil</div>
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
                    <tbody id="projectTableBody">
                        <!-- Data will be loaded dynamically -->
                    </tbody>
                </table>
            </div>
            <div id="pagination" class="flex justify-center mt-5 gap-2">
                <!-- Pagination buttons will be generated dynamically -->
            </div>
            <div id="tableLoading" class="hidden p-4 text-center text-gray-600 flex items-center justify-center gap-2">
                <i class="fas fa-spinner fa-spin"></i> Memuat data...
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // Dummy data for projects
        let dummyProjects = [
            {
                id: 1,
                creator_id: 1,
                community_id: 101,
                project_name: "E-commerce Platform",
                description: "Pengembangan platform e-commerce menggunakan Laravel dan Vue.js",
                cover_images: "https://example.com/images/ecommerce.jpg",
                start_date: "2023-08-12",
                end_date: "2023-12-31",
                progress: 75,
                status: "active",
                type: "development",
                manager_id: 1,
                members: [
                    { id: 1, name: "Dewi Santika", role: "Project Manager" },
                    { id: 2, name: "Aldi Pratama", role: "Fullstack Developer" }
                ],
                timeline: [
                    { date: "2023-08-12", event: "Kickoff Meeting" },
                    { date: "2023-09-15", event: "UI/UX Design Selesai" },
                    { date: "2023-10-20", event: "Development Phase 1" }
                ]
            },
            {
                id: 2,
                creator_id: 2,
                community_id: 102,
                project_name: "Brand Redesign",
                description: "Redesign logo dan guideline untuk branding perusahaan",
                cover_images: "https://example.com/images/brand.jpg",
                start_date: "2023-08-10",
                end_date: "2023-11-30",
                progress: 60,
                status: "active",
                type: "design",
                manager_id: 2,
                members: [
                    { id: 3, name: "Rina Andriani", role: "UI/UX Designer" },
                    { id: 4, name: "Budi Santoso", role: "Graphic Designer" }
                ],
                timeline: [
                    { date: "2023-08-10", event: "Research & Analysis" },
                    { date: "2023-09-05", event: "Concept Development" }
                ]
            }
        ];

        let currentPage = 1;
        const perPage = 10;
        let deleteId = null;

        // Fungsi untuk menambah baris anggota
        function addMemberRow(context = 'create') {
            const container = context === 'create' ? 
                document.getElementById('members-container') : 
                document.getElementById('edit-members-container');
            
            const memberRow = document.createElement('div');
            memberRow.className = 'member-row grid grid-cols-1 md:grid-cols-12 gap-2 items-end';
            memberRow.innerHTML = `
                <div class="md:col-span-5">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Anggota</label>
                    <select class="w-full p-2 border border-gray-200 rounded-md text-sm">
                        <option value="">Pilih Anggota</option>
                        <option value="1">Dewi Santika</option>
                        <option value="2">Aldi Pratama</option>
                        <option value="3">Rina Andriani</option>
                        <option value="4">Budi Santoso</option>
                        <option value="5">Sari Indah</option>
                    </select>
                </div>
                <div class="md:col-span-5">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                    <select class="w-full p-2 border border-gray-200 rounded-md text-sm">
                        <option value="">Pilih Role</option>
                        <option value="developer">Developer</option>
                        <option value="designer">Designer</option>
                        <option value="project_manager">Project Manager</option>
                        <option value="qa">Quality Assurance</option>
                        <option value="content_creator">Content Creator</option>
                    </select>
                </div>
                <div class="md:col-span-2">
                    <button type="button" class="w-full bg-red-500 text-white p-2 rounded-md text-sm flex items-center justify-center" onclick="removeMemberRow(this)">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            `;
            container.appendChild(memberRow);
        }

        // Fungsi untuk menghapus baris anggota
        function removeMemberRow(button) {
            const memberRow = button.closest('.member-row');
            if (document.querySelectorAll('.member-row').length > 1) {
                memberRow.remove();
            }
        }

        // Fungsi untuk menambah event timeline
        function addTimelineEvent(context = 'create') {
            const container = context === 'create' ? 
                document.getElementById('timeline-container') : 
                document.getElementById('edit-timeline-container');
            
            const timelineEvent = document.createElement('div');
            timelineEvent.className = 'timeline-event grid grid-cols-1 md:grid-cols-12 gap-2 items-end';
            timelineEvent.innerHTML = `
                <div class="md:col-span-3">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal</label>
                    <input type="date" class="w-full p-2 border border-gray-200 rounded-md text-sm">
                </div>
                <div class="md:col-span-7">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kegiatan</label>
                    <input type="text" class="w-full p-2 border border-gray-200 rounded-md text-sm" placeholder="Deskripsi kegiatan">
                </div>
                <div class="md:col-span-2">
                    <button type="button" class="w-full bg-red-500 text-white p-2 rounded-md text-sm flex items-center justify-center" onclick="removeTimelineEvent(this)">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            `;
            container.appendChild(timelineEvent);
        }

        // Fungsi untuk menghapus event timeline
        function removeTimelineEvent(button) {
            const timelineEvent = button.closest('.timeline-event');
            if (document.querySelectorAll('.timeline-event').length > 1) {
                timelineEvent.remove();
            }
        }

        // Fungsi untuk update nilai progress
        function updateProgressValue(value) {
            document.getElementById('progress-value').textContent = `${value}%`;
        }

        // Fungsi untuk update nilai progress di modal edit
        function updateEditProgressValue(value) {
            document.getElementById('edit-progress-value').textContent = `${value}%`;
        }

        function showCreateModal() {
            document.getElementById('createModal').classList.remove('hidden');
        }

        function showEditModal(id) {
            showLoading('editLoading');
            hideError('editError');
            const project = dummyProjects.find(p => p.id === id);
            if (!project) {
                showError('editError', 'Proyek tidak ditemukan');
                hideLoading('editLoading');
                return;
            }
            
            // Isi form dengan data proyek
            document.getElementById('edit_id').value = project.id;
            document.getElementById('edit_creator_id').value = project.creator_id;
            document.getElementById('edit_community_id').value = project.community_id;
            document.getElementById('edit_project_name').value = project.project_name;
            document.getElementById('edit_description').value = project.description || '';
            document.getElementById('edit_cover_images').value = project.cover_images || '';
            document.getElementById('edit_start_date').value = project.start_date ? project.start_date : '';
            document.getElementById('edit_end_date').value = project.end_date ? project.end_date : '';
            document.getElementById('edit_progress').value = project.progress || 0;
            document.getElementById('edit_status').value = project.status;
            
            // Update nilai progress
            updateEditProgressValue(project.progress || 0);
            
            // Isi anggota tim
            const membersContainer = document.getElementById('edit-members-container');
            membersContainer.innerHTML = '';
            
            if (project.members && project.members.length > 0) {
                project.members.forEach(member => {
                    const memberRow = document.createElement('div');
                    memberRow.className = 'member-row grid grid-cols-1 md:grid-cols-12 gap-2 items-end';
                    memberRow.innerHTML = `
                        <div class="md:col-span-5">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Anggota</label>
                            <select class="w-full p-2 border border-gray-200 rounded-md text-sm">
                                <option value="">Pilih Anggota</option>
                                <option value="1" ${member.id == 1 ? 'selected' : ''}>Dewi Santika</option>
                                <option value="2" ${member.id == 2 ? 'selected' : ''}>Aldi Pratama</option>
                                <option value="3" ${member.id == 3 ? 'selected' : ''}>Rina Andriani</option>
                                <option value="4" ${member.id == 4 ? 'selected' : ''}>Budi Santoso</option>
                                <option value="5" ${member.id == 5 ? 'selected' : ''}>Sari Indah</option>
                            </select>
                        </div>
                        <div class="md:col-span-5">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                            <input type="text" class="w-full p-2 border border-gray-200 rounded-md text-sm" value="${member.role}" placeholder="Role anggota">
                        </div>
                        <div class="md:col-span-2">
                            <button type="button" class="w-full bg-red-500 text-white p-2 rounded-md text-sm flex items-center justify-center" onclick="removeMemberRow(this)">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    `;
                    membersContainer.appendChild(memberRow);
                });
            } else {
                addMemberRow('edit');
            }
            
            // Isi timeline
            const timelineContainer = document.getElementById('edit-timeline-container');
            timelineContainer.innerHTML = '';
            
            if (project.timeline && project.timeline.length > 0) {
                project.timeline.forEach(event => {
                    const timelineEvent = document.createElement('div');
                    timelineEvent.className = 'timeline-event grid grid-cols-1 md:grid-cols-12 gap-2 items-end';
                    timelineEvent.innerHTML = `
                        <div class="md:col-span-3">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal</label>
                            <input type="date" class="w-full p-2 border border-gray-200 rounded-md text-sm" value="${event.date}">
                        </div>
                        <div class="md:col-span-7">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Kegiatan</label>
                            <input type="text" class="w-full p-2 border border-gray-200 rounded-md text-sm" value="${event.event}" placeholder="Deskripsi kegiatan">
                        </div>
                        <div class="md:col-span-2">
                            <button type="button" class="w-full bg-red-500 text-white p-2 rounded-md text-sm flex items-center justify-center" onclick="removeTimelineEvent(this)">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    `;
                    timelineContainer.appendChild(timelineEvent);
                });
            } else {
                addTimelineEvent('edit');
            }
            
            document.getElementById('editModal').classList.remove('hidden');
            hideLoading('editLoading');
        }

        function showDeleteModal(projectName, id) {
            document.getElementById('deleteProjectName').textContent = projectName;
            deleteId = id;
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function showCategoryModal() {
            document.getElementById('categoryModal').classList.remove('hidden');
        }

        function showCategoryDeleteModal(categoryName) {
            document.getElementById('deleteCategoryName').textContent = categoryName;
            document.getElementById('categoryDeleteModal').classList.remove('hidden');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
            const forms = document.querySelectorAll('#createForm, #editForm, #categoryForm');
            forms.forEach(form => form.reset());
            hideError(`${modalId.replace('Modal', '')}Error`);
            hideLoading(`${modalId.replace('Modal', '')}Loading`);
        }

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

        function loadProjects(page = 1) {
            showLoading('tableLoading');
            const type = document.getElementById('type-filter').value;
            const status = document.getElementById('status-filter').value;
            const manager = document.getElementById('manager-filter').value;
            const keyword = document.getElementById('keyword-filter').value.toLowerCase();

            let filteredProjects = dummyProjects.filter(project => {
                return (!type || project.type === type) &&
                       (!status || project.status === status) &&
                       (!manager || project.manager_id === parseInt(manager)) &&
                       (!keyword || project.project_name.toLowerCase().includes(keyword) || project.description.toLowerCase().includes(keyword));
            });

            const total = filteredProjects.length;
            const lastPage = Math.ceil(total / perPage);
            const start = (page - 1) * perPage;
            const paginatedProjects = filteredProjects.slice(start, start + perPage);

            renderTable(paginatedProjects);
            renderPagination(page, lastPage);
            document.getElementById('paginationInfo').textContent = `Menampilkan ${start + 1}-${Math.min(start + perPage, total)} dari ${total} hasil`;
            hideLoading('tableLoading');
        }

        function renderTable(projects) {
            const tbody = document.getElementById('projectTableBody');
            tbody.innerHTML = '';
            projects.forEach(project => {
                const statusBadge = getStatusBadge(project.status);
                const thumbnailIcon = getThumbnailIcon(project.type);
                const managerName = getManagerName(project.manager_id);

                const row = `
                    <tr class="hover:bg-gray-50">
                        <td class="p-3"><div class="w-10 h-10 rounded-md bg-gray-100 flex items-center justify-center text-gray-400 text-sm"><i class="${thumbnailIcon}"></i></div></td>
                        <td class="p-3">
                            <div class="text-sm font-medium text-gray-900">${project.project_name}</div>
                            <div class="text-xs text-gray-600">${project.description.substring(0, 50)}...</div>
                        </td>
                        <td class="p-3 text-sm text-gray-900">${project.type.charAt(0).toUpperCase() + project.type.slice(1)}</td>
                        <td class="p-3 text-sm text-gray-900">${managerName}</td>
                        <td class="p-3 text-sm text-gray-900">${formatDate(project.start_date)}</td>
                        <td class="p-3">${statusBadge}</td>
                        <td class="p-3">
                            <div class="flex gap-2">
                                <a href="/projects/${project.id}" class="w-8 h-8 rounded-md bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-sm" aria-label="Lihat ${project.project_name}"><i class="fas fa-eye"></i></a>
                                <button onclick="showEditModal(${project.id})" class="w-8 h-8 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-sm" aria-label="Edit ${project.project_name}"><i class="fas fa-edit"></i></button>
                                <button onclick="showDeleteModal('${project.project_name}', ${project.id})" class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-sm" aria-label="Hapus ${project.project_name}"><i class="fas fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                `;
                tbody.insertAdjacentHTML('beforeend', row);
            });
        }

        function renderPagination(current, last) {
            const pagination = document.getElementById('pagination');
            pagination.innerHTML = '';
            if (last <= 1) return;

            const prev = document.createElement('a');
            prev.href = '#';
            prev.className = 'w-9 h-9 flex items-center justify-center rounded-md bg-white border border-gray-200 text-gray-900 hover:bg-yellow-400 hover:border-yellow-400 text-sm';
            prev.innerHTML = '<i class="fas fa-chevron-left"></i>';
            prev.onclick = () => { if (current > 1) { currentPage = current - 1; loadProjects(currentPage); } };
            pagination.appendChild(prev);

            for (let i = 1; i <= last; i++) {
                if (i === 1 || i === last || (i >= current - 2 && i <= current + 2)) {
                    const pageBtn = document.createElement('a');
                    pageBtn.href = '#';
                    pageBtn.className = `w-9 h-9 flex items-center justify-center rounded-md ${i === current ? 'bg-yellow-400 text-gray-900 font-medium border border-yellow-400' : 'bg-white border border-gray-200 text-gray-900 hover:bg-yellow-400 hover:border-yellow-400'} text-sm`;
                    pageBtn.textContent = i;
                    pageBtn.onclick = () => { currentPage = i; loadProjects(i); };
                    pagination.appendChild(pageBtn);
                } else if ((i === current - 3 || i === current + 3) && last > 5) {
                    const ellipsis = document.createElement('span');
                    ellipsis.className = 'flex items-center px-3 text-gray-600 text-sm';
                    ellipsis.textContent = '...';
                    pagination.appendChild(ellipsis);
                }
            }

            const next = document.createElement('a');
            next.href = '#';
            next.className = 'w-9 h-9 flex items-center justify-center rounded-md bg-white border border-gray-200 text-gray-900 hover:bg-yellow-400 hover:border-yellow-400 text-sm';
            next.innerHTML = '<i class="fas fa-chevron-right"></i>';
            next.onclick = () => { if (current < last) { currentPage = current + 1; loadProjects(currentPage); } };
            pagination.appendChild(next);
        }

        function getStatusBadge(status) {
            let color = 'bg-gray-100 text-gray-600';
            let text = 'Tidak Diketahui';
            if (status === 'active' || status === 'ongoing') {
                color = 'bg-green-100 text-green-600';
                text = 'Aktif';
            } else if (status === 'pending') {
                color = 'bg-yellow-100 text-yellow-600';
                text = 'Menunggu Persetujuan';
            } else if (status === 'completed') {
                color = 'bg-blue-100 text-blue-600';
                text = 'Selesai';
            } else if (status === 'onhold') {
                color = 'bg-gray-100 text-gray-600';
                text = 'Ditunda';
            }
            return `<span class="px-2 py-1 rounded-full ${color} text-xs">${text}</span>`;
        }

        function getThumbnailIcon(type) {
            if (type === 'development') return 'fas fa-code';
            if (type === 'design') return 'fas fa-paint-brush';
            if (type === 'research') return 'fas fa-book';
            if (type === 'marketing') return 'fas fa-bullhorn';
            return 'fas fa-question';
        }

        function getManagerName(managerId) {
            const managers = {
                1: 'Dewi Santika',
                2: 'Aldi Pratama',
                3: 'Rina Andriani',
                4: 'Budi Santoso',
                5: 'Sari Indah'
            };
            return managers[managerId] || 'Tidak Diketahui';
        }

        function formatDate(dateStr) {
            if (!dateStr) return '-';
            const date = new Date(dateStr);
            return date.toLocaleDateString('id-ID', { day: '2-digit', month: 'short', year: 'numeric' });
        }

        document.getElementById('createForm').addEventListener('submit', function(e) {
            e.preventDefault();
            showLoading('createLoading');
            hideError('createError');
            
            // Ambil data anggota
            const members = [];
            document.querySelectorAll('#members-container .member-row').forEach(row => {
                const memberSelect = row.querySelector('select:first-child');
                const roleSelect = row.querySelector('select:last-child');
                
                if (memberSelect.value && roleSelect.value) {
                    members.push({
                        id: parseInt(memberSelect.value),
                        name: memberSelect.options[memberSelect.selectedIndex].text,
                        role: roleSelect.value
                    });
                }
            });
            
            // Ambil data timeline
            const timeline = [];
            document.querySelectorAll('#timeline-container .timeline-event').forEach(event => {
                const dateInput = event.querySelector('input[type="date"]');
                const eventInput = event.querySelector('input[type="text"]');
                
                if (dateInput.value && eventInput.value) {
                    timeline.push({
                        date: dateInput.value,
                        event: eventInput.value
                    });
                }
            });
            
            const formData = {
                id: dummyProjects.length + 1,
                creator_id: parseInt(this.creator_id.value),
                community_id: parseInt(this.community_id.value),
                project_name: this.project_name.value,
                description: this.description.value,
                cover_images: this.cover_images.value,
                start_date: this.start_date.value,
                end_date: this.end_date.value || null,
                progress: parseFloat(this.progress.value),
                status: this.status.value,
                type: document.getElementById('type-filter').value || 'development',
                manager_id: parseInt(document.getElementById('manager-filter').value || 1),
                members: members,
                timeline: timeline
            };
            
            dummyProjects.push(formData);
            closeModal('createModal');
            loadProjects(currentPage);
            hideLoading('createLoading');
        });

        document.getElementById('editForm').addEventListener('submit', function(e) {
            e.preventDefault();
            showLoading('editLoading');
            hideError('editError');
            const id = parseInt(this.edit_id.value);
            
            // Ambil data anggota
            const members = [];
            document.querySelectorAll('#edit-members-container .member-row').forEach(row => {
                const memberSelect = row.querySelector('select');
                const roleInput = row.querySelector('input[type="text"]');
                
                if (memberSelect && memberSelect.value && roleInput && roleInput.value) {
                    members.push({
                        id: parseInt(memberSelect.value),
                        name: memberSelect.options[memberSelect.selectedIndex].text,
                        role: roleInput.value
                    });
                }
            });
            
            // Ambil data timeline
            const timeline = [];
            document.querySelectorAll('#edit-timeline-container .timeline-event').forEach(event => {
                const dateInput = event.querySelector('input[type="date"]');
                const eventInput = event.querySelector('input[type="text"]');
                
                if (dateInput.value && eventInput.value) {
                    timeline.push({
                        date: dateInput.value,
                        event: eventInput.value
                    });
                }
            });
            
            const formData = {
                creator_id: parseInt(this.edit_creator_id.value),
                community_id: parseInt(this.edit_community_id.value),
                project_name: this.edit_project_name.value,
                description: this.edit_description.value,
                cover_images: this.edit_cover_images.value,
                start_date: this.edit_start_date.value,
                end_date: this.edit_end_date.value || null,
                progress: parseFloat(this.edit_progress.value),
                status: this.edit_status.value,
                type: document.getElementById('type-filter').value || dummyProjects.find(p => p.id === id).type,
                manager_id: parseInt(document.getElementById('manager-filter').value || dummyProjects.find(p => p.id === id).manager_id),
                members: members,
                timeline: timeline
            };
            
            const index = dummyProjects.findIndex(p => p.id === id);
            if (index !== -1) {
                dummyProjects[index] = { ...dummyProjects[index], ...formData, id };
                closeModal('editModal');
                loadProjects(currentPage);
            } else {
                showError('editError', 'Proyek tidak ditemukan');
            }
            hideLoading('editLoading');
        });

        document.getElementById('confirmDelete').addEventListener('click', function() {
            showLoading('deleteLoading');
            hideError('deleteError');
            dummyProjects = dummyProjects.filter(p => p.id !== deleteId);
            closeModal('deleteModal');
            loadProjects(currentPage);
            hideLoading('deleteLoading');
        });

        document.getElementById('categoryForm').addEventListener('submit', function(e) {
            e.preventDefault();
            showLoading('categoryLoading');
            hideError('categoryError');
            const formData = {
                name: this.categoryName.value,
                description: this.categoryDescription.value
            };
            console.log('Simulate saving category:', formData);
            closeModal('categoryModal');
            hideLoading('categoryLoading');
        });

        function deleteCategory() {
            showLoading('categoryDeleteLoading');
            hideError('categoryDeleteError');
            console.log('Simulate deleting category:', document.getElementById('deleteCategoryName').textContent);
            closeModal('categoryDeleteModal');
            hideLoading('categoryDeleteLoading');
        }

        document.getElementById('applyFilter').addEventListener('click', () => loadProjects(1));
        document.getElementById('resetFilter').addEventListener('click', () => {
            document.getElementById('type-filter').value = '';
            document.getElementById('status-filter').value = '';
            document.getElementById('manager-filter').value = '';
            document.getElementById('keyword-filter').value = '';
            loadProjects(1);
        });

        window.onclick = function(event) {
            const modals = ['createModal', 'editModal', 'deleteModal', 'categoryModal', 'categoryDeleteModal'];
            modals.forEach(modalId => {
                if (event.target.id === modalId) closeModal(modalId);
            });
        };

        loadProjects();
    </script>
    @endpush
</x-admin-layout>