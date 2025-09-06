<x-admin-layout>
    <div class="bg-white rounded-xl shadow-sm p-4">
        <!-- Page Header -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 mb-6">
            <h1 class="text-lg font-semibold flex items-center gap-2 text-gray-900 font-['Space_Grotesk']">
                <i class="fas fa-users text-yellow-400 text-base"></i>
                Manajemen Komunitas
            </h1>
            <button onclick="showCreateModal()" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-3 py-1.5 rounded-lg flex items-center gap-2 transition-colors">
                <i class="fas fa-plus text-sm"></i>
                Tambah Komunitas Baru
            </button>
        </div>
        <!-- Filter Section -->
        <div class="bg-white rounded-lg p-4 mb-6 border border-gray-200">
            <h3 class="text-base font-semibold flex items-center gap-2 mb-3 text-gray-900 font-['Space_Grotesk']">
                <i class="fas fa-filter text-yellow-400 text-sm"></i>
                Filter Komunitas
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                <div>
                    <label for="type-filter" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Tipe</label>
                    <select id="type-filter" class="w-full p-2 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']">
                        <option value="">Semua Tipe</option>
                        <option value="public">Publik</option>
                        <option value="private">Privat</option>
                    </select>
                </div>
                <div>
                    <label for="member-filter" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Jumlah Anggota</label>
                    <select id="member-filter" class="w-full p-2 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']">
                        <option value="">Semua</option>
                        <option value="0-50">0-50</option>
                        <option value="51-100">51-100</option>
                        <option value="101+">101+</option>
                    </select>
                </div>
                <div>
                    <label for="status-filter" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Status</label>
                    <select id="status-filter" class="w-full p-2 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']">
                        <option value="">Semua Status</option>
                        <option value="active">Aktif</option>
                        <option value="inactive">Tidak Aktif</option>
                    </select>
                </div>
                <div>
                    <label for="keyword-filter" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Kata Kunci</label>
                    <input id="keyword-filter" type="text" class="w-full p-2 border border-gray-200 rounded-lg text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Cari nama atau deskripsi...">
                </div>
            </div>
            <div class="flex gap-3 mt-3">
                <button class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-3 py-1.5 rounded-lg flex items-center gap-2 transition-colors">
                    <i class="fas fa-filter text-sm"></i>
                    Terapkan
                </button>
                <button class="bg-gray-50 hover:bg-gray-100 text-gray-900 text-sm font-medium px-3 py-1.5 rounded-lg flex items-center gap-2 transition-colors">
                    <i class="fas fa-redo text-sm"></i>
                    Reset
                </button>
            </div>
        </div>
        <!-- Grid View -->
        <div class="mb-6">
            <div class="flex justify-between items-center gap-3 mb-4">
                <h2 class="text-base font-semibold text-gray-900 font-['Space_Grotesk']">Daftar Komunitas</h2>
                <div class="text-xs text-gray-800">Menampilkan 6 dari 20 komunitas</div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Komunitas 1 -->
                <div class="bg-white rounded-lg border border-gray-200 overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                    <div class="relative">
                        <img src="https://picsum.photos/id/100/400/120" alt="Cover Fotografi Enthusiast" class="w-full community-cover">
                        <img src="https://picsum.photos/id/101/100/100" alt="Avatar Fotografi Enthusiast" class="rounded-full community-avatar relative z-10 ml-4">
                    </div>
                    <div class="p-3">
                        <h3 class="font-semibold text-gray-900 mb-1 text-sm font-['Space_Grotesk']">Fotografi Enthusiast</h3>
                        <p class="text-xs text-gray-800 mb-2">Komunitas pecinta fotografi di Bali</p>
                        <div class="flex justify-between items-center mb-2">
                            <div class="flex items-center text-xs text-gray-800">
                                <i class="fas fa-users mr-1"></i>
                                <span>150 Anggota</span>
                            </div>
                            <span class="px-2 py-1 rounded-full bg-green-100 text-green-600 text-xs">Aktif</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-xs text-gray-800">Publik</span>
                            <div class="flex gap-2">
                                <button class="w-8 h-8 rounded-lg bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-xs" aria-label="Lihat Fotografi Enthusiast"><i class="fas fa-eye"></i></button>
                                <button onclick="showEditModal(1)" class="w-8 h-8 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-xs" aria-label="Edit Fotografi Enthusiast"><i class="fas fa-edit"></i></button>
                                <button class="w-8 h-8 rounded-lg bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-xs" onclick="showDeleteModal('Fotografi Enthusiast')" aria-label="Hapus Fotografi Enthusiast"><i class="fas fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Komunitas 2 -->
                <div class="bg-white rounded-lg border border-gray-200 overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                    <div class="relative">
                        <img src="https://picsum.photos/id/102/400/120" alt="Cover Desain Grafis Indonesia" class="w-full community-cover">
                        <img src="https://picsum.photos/id/103/100/100" alt="Avatar Desain Grafis Indonesia" class="rounded-full community-avatar relative z-10 ml-4">
                    </div>
                    <div class="p-3">
                        <h3 class="font-semibold text-gray-900 mb-1 text-sm font-['Space_Grotesk']">Desain Grafis Indonesia</h3>
                        <p class="text-xs text-gray-800 mb-2">Tempat berbagi tips desain grafis</p>
                        <div class="flex justify-between items-center mb-2">
                            <div class="flex items-center text-xs text-gray-800">
                                <i class="fas fa-users mr-1"></i>
                                <span>200 Anggota</span>
                            </div>
                            <span class="px-2 py-1 rounded-full bg-green-100 text-green-600 text-xs">Aktif</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-xs text-gray-800">Publik</span>
                            <div class="flex gap-2">
                                <button class="w-8 h-8 rounded-lg bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-xs" aria-label="Lihat Desain Grafis Indonesia"><i class="fas fa-eye"></i></button>
                                <button onclick="showEditModal(2)" class="w-8 h-8 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-xs" aria-label="Edit Desain Grafis Indonesia"><i class="fas fa-edit"></i></button>
                                <button class="w-8 h-8 rounded-lg bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-xs" onclick="showDeleteModal('Desain Grafis Indonesia')" aria-label="Hapus Desain Grafis Indonesia"><i class="fas fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Komunitas 3 -->
                <div class="bg-white rounded-lg border border-gray-200 overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                    <div class="relative">
                        <img src="https://picsum.photos/id/104/400/120" alt="Cover Ilustrator Muda" class="w-full community-cover">
                        <img src="https://picsum.photos/id/105/100/100" alt="Avatar Ilustrator Muda" class="rounded-full community-avatar relative z-10 ml-4">
                    </div>
                    <div class="p-3">
                        <h3 class="font-semibold text-gray-900 mb-1 text-sm font-['Space_Grotesk']">Ilustrator Muda</h3>
                        <p class="text-xs text-gray-800 mb-2">Komunitas ilustrator pemula</p>
                        <div class="flex justify-between items-center mb-2">
                            <div class="flex items-center text-xs text-gray-800">
                                <i class="fas fa-users mr-1"></i>
                                <span>80 Anggota</span>
                            </div>
                            <span class="px-2 py-1 rounded-full bg-red-100 text-red-600 text-xs">Tidak Aktif</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-xs text-gray-800">Privat</span>
                            <div class="flex gap-2">
                                <button class="w-8 h-8 rounded-lg bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-xs" aria-label="Lihat Ilustrator Muda"><i class="fas fa-eye"></i></button>
                                <button onclick="showEditModal(3)" class="w-8 h-8 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-xs" aria-label="Edit Ilustrator Muda"><i class="fas fa-edit"></i></button>
                                <button class="w-8 h-8 rounded-lg bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-xs" onclick="showDeleteModal('Ilustrator Muda')" aria-label="Hapus Ilustrator Muda"><i class="fas fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Komunitas 4 -->
                <div class="bg-white rounded-lg border border-gray-200 overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                    <div class="relative">
                        <img src="https://picsum.photos/id/106/400/120" alt="Cover Koder Komunitas" class="w-full community-cover">
                        <img src="https://picsum.photos/id/107/100/100" alt="Avatar Koder Komunitas" class="rounded-full community-avatar relative z-10 ml-4">
                    </div>
                    <div class="p-3">
                        <h3 class="font-semibold text-gray-900 mb-1 text-sm font-['Space_Grotesk']">Koder Komunitas</h3>
                        <p class="text-xs text-gray-800 mb-2">Belajar coding bersama</p>
                        <div class="flex justify-between items-center mb-2">
                            <div class="flex items-center text-xs text-gray-800">
                                <i class="fas fa-users mr-1"></i>
                                <span>120 Anggota</span>
                            </div>
                            <span class="px-2 py-1 rounded-full bg-green-100 text-green-600 text-xs">Aktif</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-xs text-gray-800">Publik</span>
                            <div class="flex gap-2">
                                <button class="w-8 h-8 rounded-lg bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-xs" aria-label="Lihat Koder Komunitas"><i class="fas fa-eye"></i></button>
                                <button onclick="showEditModal(4)" class="w-8 h-8 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-xs" aria-label="Edit Koder Komunitas"><i class="fas fa-edit"></i></button>
                                <button class="w-8 h-8 rounded-lg bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-xs" onclick="showDeleteModal('Koder Komunitas')" aria-label="Hapus Koder Komunitas"><i class="fas fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Komunitas 5 -->
                <div class="bg-white rounded-lg border border-gray-200 overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                    <div class="relative">
                        <img src="https://picsum.photos/id/108/400/120" alt="Cover Artist United" class="w-full community-cover">
                        <img src="https://picsum.photos/id/109/100/100" alt="Avatar Artist United" class="rounded-full community-avatar relative z-10 ml-4">
                    </div>
                    <div class="p-3">
                        <h3 class="font-semibold text-gray-900 mb-1 text-sm font-['Space_Grotesk']">Artist United</h3>
                        <p class="text-xs text-gray-800 mb-2">Seniman bersatu</p>
                        <div class="flex justify-between items-center mb-2">
                            <div class="flex items-center text-xs text-gray-800">
                                <i class="fas fa-users mr-1"></i>
                                <span>300 Anggota</span>
                            </div>
                            <span class="px-2 py-1 rounded-full bg-green-100 text-green-600 text-xs">Aktif</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-xs text-gray-800">Publik</span>
                            <div class="flex gap-2">
                                <button class="w-8 h-8 rounded-lg bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-xs" aria-label="Lihat Artist United"><i class="fas fa-eye"></i></button>
                                <button onclick="showEditModal(5)" class="w-8 h-8 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-xs" aria-label="Edit Artist United"><i class="fas fa-edit"></i></button>
                                <button class="w-8 h-8 rounded-lg bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-xs" onclick="showDeleteModal('Artist United')" aria-label="Hapus Artist United"><i class="fas fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Komunitas 6 -->
                <div class="bg-white rounded-lg border border-gray-200 overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                    <div class="relative">
                        <img src="https://picsum.photos/id/110/400/120" alt="Cover Creative Writing" class="w-full community-cover">
                        <img src="https://picsum.photos/id/111/100/100" alt="Avatar Creative Writing" class="rounded-full community-avatar relative z-10 ml-4">
                    </div>
                    <div class="p-3">
                        <h3 class="font-semibold text-gray-900 mb-1 text-sm font-['Space_Grotesk']">Creative Writing</h3>
                        <p class="text-xs text-gray-800 mb-2">Komunitas penulis kreatif</p>
                        <div class="flex justify-between items-center mb-2">
                            <div class="flex items-center text-xs text-gray-800">
                                <i class="fas fa-users mr-1"></i>
                                <span>95 Anggota</span>
                            </div>
                            <span class="px-2 py-1 rounded-full bg-green-100 text-green-600 text-xs">Aktif</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-xs text-gray-800">Privat</span>
                            <div class="flex gap-2">
                                <button class="w-8 h-8 rounded-lg bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-xs" aria-label="Lihat Creative Writing"><i class="fas fa-eye"></i></button>
                                <button onclick="showEditModal(6)" class="w-8 h-8 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-xs" aria-label="Edit Creative Writing"><i class="fas fa-edit"></i></button>
                                <button class="w-8 h-8 rounded-lg bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-xs" onclick="showDeleteModal('Creative Writing')" aria-label="Hapus Creative Writing"><i class="fas fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pagination -->
        <div class="flex justify-center mt-4 gap-2">
            <a href="#" class="w-8 h-8 flex items-center justify-center rounded-lg bg-white border border-gray-200 text-gray-900 hover:bg-yellow-400 hover:border-yellow-400 text-xs" aria-label="Previous page"><i class="fas fa-chevron-left"></i></a>
            <a href="#" class="w-8 h-8 flex items-center justify-center rounded-lg bg-yellow-400 text-gray-900 font-medium border border-yellow-400 text-xs" aria-label="Page 1">1</a>
            <a href="#" class="w-8 h-8 flex items-center justify-center rounded-lg bg-white border border-gray-200 text-gray-900 hover:bg-yellow-400 hover:border-yellow-400 text-xs" aria-label="Page 2">2</a>
            <a href="#" class="w-8 h-8 flex items-center justify-center rounded-lg bg-white border border-gray-200 text-gray-900 hover:bg-yellow-400 hover:border-yellow-400 text-xs" aria-label="Page 3">3</a>
            <span class="flex items-center px-2 text-gray-800 text-xs">...</span>
            <a href="#" class="w-8 h-8 flex items-center justify-center rounded-lg bg-white border border-gray-200 text-gray-900 hover:bg-yellow-400 hover:border-yellow-400 text-xs" aria-label="Page 5">5</a>
            <a href="#" class="w-8 h-8 flex items-center justify-center rounded-lg bg-white border border-gray-200 text-gray-900 hover:bg-yellow-400 hover:border-yellow-400 text-xs" aria-label="Next page"><i class="fas fa-chevron-right"></i></a>
        </div>
        <!-- Create Modal -->
        <div class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" id="createModal">
            <div class="bg-white rounded-lg p-6 w-full max-w-3xl mx-4 overflow-y-auto max-h-[90vh]">
                <div class="flex justify-between items-center mb-4 border-b border-gray-200 pb-3">
                    <h3 class="text-lg font-semibold text-gray-900 font-['Space_Grotesk']">Tambah Komunitas Baru</h3>
                    <button class="text-xl text-gray-800 hover:text-gray-900" onclick="closeCreateModal()" aria-label="Tutup modal">&times;</button>
                </div>
                <form id="createCommunityForm">
                    <div class="mb-4 col-span-2">
                        <label for="cover_image" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Gambar Cover</label>
                        <div class="w-full h-32 p-4 border-2 border-dashed border-gray-200 rounded-lg text-center cursor-pointer hover:border-yellow-400" ondragover="allowDrop(event)" ondrop="handleDrop(event, 'create')" onclick="document.getElementById('cover_image').click()">
                            <input type="file" id="cover_image" name="cover_image" accept="image/*" class="hidden" onchange="previewCoverImage(this, 'create_preview')">
                            <p class="text-sm text-gray-600">Seret dan lepas gambar atau klik untuk memilih</p>
                        </div>
                        <img id="create_preview" class="mt-2 w-full h-48 object-cover rounded-lg hidden" alt="Preview Cover">
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Nama Komunitas</label>
                            <input type="text" id="name" name="name" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required>
                        </div>
                        <div class="mb-4">
                            <label for="category" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Kategori</label>
                            <select id="category" name="category" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required>
                                <option value="">Pilih Kategori</option>
                                <option value="Puisi">Puisi</option>
                                <option value="Desain">Desain</option>
                                <option value="Musik">Musik</option>
                                <option value="Coding">Coding</option>
                                <option value="Fotografi">Fotografi</option>
                                <option value="Umum">Umum</option>
                            </select>
                        </div>
                        <div class="mb-4 col-span-2">
                            <label for="description" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Deskripsi</label>
                            <textarea id="description" name="description" rows="3" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="type" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Tipe Komunitas</label>
                            <select id="type" name="type" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required>
                                <option value="public">Publik</option>
                                <option value="private">Privat</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Status</label>
                            <select id="status" name="status" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required>
                                <option value="active">Aktif</option>
                                <option value="inactive">Tidak Aktif</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="user_id" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">ID Pembuat</label>
                            <input type="number" id="user_id" name="user_id" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required>
                        </div>
                        <div class="mb-4 col-span-2">
                            <label class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Moderator</label>
                            <div class="flex gap-2">
                                <input type="number" id="moderator_input" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Tambah ID Moderator">
                                <button type="button" onclick="addModerator('create')" class="bg-blue-400 hover:bg-blue-500 text-white text-sm font-medium px-3 py-2 rounded-lg flex items-center gap-2 transition-colors"><i class="fas fa-plus"></i> Tambah</button>
                            </div>
                            <div id="create_moderators" class="mt-2 flex flex-wrap gap-2"></div>
                            <input type="hidden" id="moderator_ids" name="moderator_ids">
                        </div>
                        <div class="mb-4 col-span-2">
                            <label class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Peraturan Komunitas</label>
                            <div id="create_rules_container">
                                <div class="flex gap-2 mb-2">
                                    <input type="text" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Masukkan peraturan" onkeydown="if(event.key === 'Enter') addRule('create')">
                                    <button type="button" onclick="addRule('create')" class="bg-blue-400 hover:bg-blue-500 text-white text-sm font-medium px-3 py-2 rounded-lg flex items-center gap-2 transition-colors"><i class="fas fa-plus"></i> Tambah</button>
                                </div>
                            </div>
                            <input type="hidden" id="rules" name="rules">
                        </div>
                    </div>
                    <div class="flex justify-end gap-3 mt-6">
                        <button type="button" class="bg-gray-50 hover:bg-gray-100 text-gray-900 text-sm font-medium px-4 py-2 rounded-lg transition-colors" onclick="closeCreateModal()">Batal</button>
                        <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-2 rounded-lg transition-colors">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Edit Modal -->
        <div class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" id="editModal">
            <div class="bg-white rounded-lg p-6 w-full max-w-3xl mx-4 overflow-y-auto max-h-[90vh]">
                <div class="flex justify-between items-center mb-4 border-b border-gray-200 pb-3">
                    <h3 class="text-lg font-semibold text-gray-900 font-['Space_Grotesk']">Edit Komunitas</h3>
                    <button class="text-xl text-gray-800 hover:text-gray-900" onclick="closeEditModal()" aria-label="Tutup modal">&times;</button>
                </div>
                <form id="editCommunityForm">
                    <input type="hidden" id="edit_id" name="id">
                    <div class="mb-4 col-span-2">
                        <label for="edit_cover_image" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Gambar Cover</label>
                        <div class="w-full p-4 border-2 border-dashed border-gray-200 rounded-lg text-center cursor-pointer hover:border-yellow-400" ondragover="allowDrop(event)" ondrop="handleDrop(event, 'edit')" onclick="document.getElementById('edit_cover_image').click()">
                            <input type="file" id="edit_cover_image" name="cover_image" accept="image/*" class="hidden" onchange="previewCoverImage(this, 'edit_preview')">
                            <p class="text-sm text-gray-600">Seret dan lepas gambar atau klik untuk memilih</p>
                        </div>
                        <img id="edit_preview" class="mt-2 w-full h-48 object-cover rounded-lg hidden" alt="Preview Cover">
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label for="edit_name" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Nama Komunitas</label>
                            <input type="text" id="edit_name" name="name" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required>
                        </div>
                        <div class="mb-4">
                            <label for="edit_category" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Kategori</label>
                            <select id="edit_category" name="category" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required>
                                <option value="Puisi">Puisi</option>
                                <option value="Desain">Desain</option>
                                <option value="Musik">Musik</option>
                                <option value="Coding">Coding</option>
                                <option value="Fotografi">Fotografi</option>
                                <option value="Umum">Umum</option>
                            </select>
                        </div>
                        <div class="mb-4 col-span-2">
                            <label for="edit_description" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Deskripsi</label>
                            <textarea id="edit_description" name="description" rows="3" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="edit_type" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Tipe Komunitas</label>
                            <select id="edit_type" name="type" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required>
                                <option value="public">Publik</option>
                                <option value="private">Privat</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="edit_status" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Status</label>
                            <select id="edit_status" name="status" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required>
                                <option value="active">Aktif</option>
                                <option value="inactive">Tidak Aktif</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="edit_user_id" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">ID Pembuat</label>
                            <input type="number" id="edit_user_id" name="user_id" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required>
                        </div>
                        <div class="mb-4 col-span-2">
                            <label class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Moderator</label>
                            <div class="flex gap-2">
                                <input type="number" id="edit_moderator_input" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Tambah ID Moderator">
                                <button type="button" onclick="addModerator('edit')" class="bg-blue-400 hover:bg-blue-500 text-white text-sm font-medium px-3 py-2 rounded-lg flex items-center gap-2 transition-colors"><i class="fas fa-plus"></i> Tambah</button>
                            </div>
                            <div id="edit_moderators" class="mt-2 flex flex-wrap gap-2"></div>
                            <input type="hidden" id="edit_moderator_ids" name="moderator_ids">
                        </div>
                        <div class="mb-4 col-span-2">
                            <label class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Peraturan Komunitas</label>
                            <div id="edit_rules_container">
                                <div class="flex gap-2 mb-2">
                                    <input type="text" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Masukkan peraturan" onkeydown="if(event.key === 'Enter') addRule('edit')">
                                    <button type="button" onclick="addRule('edit')" class="bg-blue-400 hover:bg-blue-500 text-white text-sm font-medium px-3 py-2 rounded-lg flex items-center gap-2 transition-colors"><i class="fas fa-plus"></i> Tambah</button>
                                </div>
                            </div>
                            <input type="hidden" id="edit_rules" name="rules">
                        </div>
                    </div>
                    <div class="flex justify-end gap-3 mt-6">
                        <button type="button" class="bg-gray-50 hover:bg-gray-100 text-gray-900 text-sm font-medium px-4 py-2 rounded-lg transition-colors" onclick="closeEditModal()">Batal</button>
                        <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-2 rounded-lg transition-colors">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Delete Modal -->
        <div class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" id="deleteModal">
            <div class="bg-white rounded-lg p-6 w-full max-w-md mx-4">
                <div class="flex justify-between items-center mb-4 border-b border-gray-200 pb-3">
                    <h3 class="text-lg font-semibold text-gray-900 font-['Space_Grotesk']">Konfirmasi Hapus</h3>
                    <button class="text-xl text-gray-800 hover:text-gray-900" onclick="closeDeleteModal()" aria-label="Tutup modal">&times;</button>
                </div>
                <p class="text-sm text-gray-800 mb-6">Apakah Anda yakin ingin menghapus komunitas <span id="deleteCommunityName" class="font-medium"></span>?</p>
                <div class="flex justify-end gap-3">
                    <button type="button" class="bg-gray-50 hover:bg-gray-100 text-gray-900 text-sm font-medium px-4 py-2 rounded-lg transition-colors" onclick="closeDeleteModal()">Batal</button>
                    <button type="button" class="bg-red-400 hover:bg-red-500 text-white text-sm font-medium px-4 py-2 rounded-lg transition-colors" onclick="deleteCommunity()">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <style>
            .community-cover {
                height: 120px;
                object-fit: cover;
            }
            .community-avatar {
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
            .moderator-tag, .rule-tag {
                background-color: #e0f2fe;
                color: #0369a1;
                padding: 4px 8px;
                border-radius: 9999px;
                display: flex;
                align-items: center;
                gap: 4px;
            }
            .moderator-tag button, .rule-tag button {
                color: #0369a1;
                font-weight: bold;
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            let currentCommunityName = '';
            let communities = {
                1: { name: 'Fotografi Enthusiast', category: 'Fotografi', description: 'Komunitas pecinta fotografi di Bali', type: 'public', cover_image: 'https://picsum.photos/id/100/400/120', status: 'active', user_id: 1, moderator_ids: '', rules: '' },
                2: { name: 'Desain Grafis Indonesia', category: 'Desain', description: 'Tempat berbagi tips desain grafis', type: 'public', cover_image: 'https://picsum.photos/id/102/400/120', status: 'active', user_id: 2, moderator_ids: '', rules: '' },
                3: { name: 'Ilustrator Muda', category: 'Desain', description: 'Komunitas ilustrator pemula', type: 'private', cover_image: 'https://picsum.photos/id/104/400/120', status: 'inactive', user_id: 3, moderator_ids: '', rules: '' },
                4: { name: 'Koder Komunitas', category: 'Coding', description: 'Belajar coding bersama', type: 'public', cover_image: 'https://picsum.photos/id/106/400/120', status: 'active', user_id: 4, moderator_ids: '', rules: '' },
                5: { name: 'Artist United', category: 'Umum', description: 'Seniman bersatu', type: 'public', cover_image: 'https://picsum.photos/id/108/400/120', status: 'active', user_id: 5, moderator_ids: '', rules: '' },
                6: { name: 'Creative Writing', category: 'Puisi', description: 'Komunitas penulis kreatif', type: 'private', cover_image: 'https://picsum.photos/id/110/400/120', status: 'active', user_id: 6, moderator_ids: '', rules: '' }
            };

            function showCreateModal() {
                document.getElementById('createModal').classList.remove('hidden');
                document.getElementById('createModal').classList.add('modal-open');
                document.getElementById('create_moderators').innerHTML = '';
                document.getElementById('moderator_ids').value = '';
                document.getElementById('create_rules_container').innerHTML = `
                    <div class="flex gap-2 mb-2">
                        <input type="text" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Masukkan peraturan" onkeydown="if(event.key === 'Enter') addRule('create')">
                        <button type="button" onclick="addRule('create')" class="bg-blue-400 hover:bg-blue-500 text-white text-sm font-medium px-3 py-2 rounded-lg flex items-center gap-2 transition-colors"><i class="fas fa-plus"></i> Tambah</button>
                    </div>
                `;
                document.getElementById('rules').value = '';
                document.getElementById('create_preview').classList.add('hidden');
            }

            function closeCreateModal() {
                document.getElementById('createModal').classList.add('hidden');
                document.getElementById('createModal').classList.remove('modal-open');
            }

            function showEditModal(communityId) {
                const community = communities[communityId];
                if (community) {
                    document.getElementById('edit_id').value = communityId;
                    document.getElementById('edit_name').value = community.name;
                    document.getElementById('edit_category').value = community.category;
                    document.getElementById('edit_description').value = community.description;
                    document.getElementById('edit_type').value = community.type;
                    document.getElementById('edit_status').value = community.status;
                    document.getElementById('edit_user_id').value = community.user_id;
                    previewCoverImage({ src: community.cover_image }, 'edit_preview');
                    const moderators = community.moderator_ids ? community.moderator_ids.split(',') : [];
                    const container = document.getElementById('edit_moderators');
                    container.innerHTML = '';
                    moderators.forEach(id => addModeratorTag(id.trim(), 'edit'));
                    document.getElementById('edit_moderator_ids').value = community.moderator_ids;
                    const rulesContainer = document.getElementById('edit_rules_container');
                    rulesContainer.innerHTML = `
                        <div class="flex gap-2 mb-2">
                            <input type="text" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Masukkan peraturan" onkeydown="if(event.key === 'Enter') addRule('edit')">
                            <button type="button" onclick="addRule('edit')" class="bg-blue-400 hover:bg-blue-500 text-white text-sm font-medium px-3 py-2 rounded-lg flex items-center gap-2 transition-colors"><i class="fas fa-plus"></i> Tambah</button>
                        </div>
                    `;
                    const rules = community.rules ? community.rules.split('\n') : [];
                    rules.forEach(rule => addRuleTag(rule, 'edit'));
                    document.getElementById('edit_rules').value = community.rules;
                    currentCommunityName = community.name;
                    document.getElementById('editModal').classList.remove('hidden');
                    document.getElementById('editModal').classList.add('modal-open');
                }
            }

            function closeEditModal() {
                document.getElementById('editModal').classList.add('hidden');
                document.getElementById('editModal').classList.remove('modal-open');
            }

            function showDeleteModal(communityName) {
                currentCommunityName = communityName;
                document.getElementById('deleteCommunityName').textContent = communityName;
                document.getElementById('deleteModal').classList.remove('hidden');
                document.getElementById('deleteModal').classList.add('modal-open');
            }

            function closeDeleteModal() {
                document.getElementById('deleteModal').classList.add('hidden');
                document.getElementById('deleteModal').classList.remove('modal-open');
            }

            function deleteCommunity() {
                console.log('Deleting community:', currentCommunityName);
                closeDeleteModal();
            }

            function allowDrop(event) {
                event.preventDefault();
                event.target.classList.add('border-yellow-400');
            }

            function handleDrop(event, mode) {
                event.preventDefault();
                event.target.classList.remove('border-yellow-400');
                const file = event.dataTransfer.files[0];
                if (file && file.type.startsWith('image/')) {
                    const input = document.getElementById(mode === 'create' ? 'cover_image' : 'edit_cover_image');
                    input.files = event.dataTransfer.files;
                    previewCoverImage(input, mode + '_preview');
                }
            }

            function previewCoverImage(input, previewId) {
                const preview = document.getElementById(previewId);
                if (input.files && input.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.classList.remove('hidden');
                    };
                    reader.readAsDataURL(input.files[0]);
                } else if (input.src) {
                    preview.src = input.src;
                    preview.classList.remove('hidden');
                } else {
                    preview.classList.add('hidden');
                }
            }

            function addModerator(mode) {
                const inputId = mode === 'create' ? 'moderator_input' : 'edit_moderator_input';
                const input = document.getElementById(inputId);
                const id = input.value.trim();
                if (id && !isNaN(id)) {
                    addModeratorTag(id, mode);
                    input.value = '';
                }
            }

            function addModeratorTag(id, mode) {
                const containerId = mode === 'create' ? 'create_moderators' : 'edit_moderators';
                const hiddenId = mode === 'create' ? 'moderator_ids' : 'edit_moderator_ids';
                const container = document.getElementById(containerId);
                const tag = document.createElement('span');
                tag.className = 'moderator-tag text-xs';
                tag.innerHTML = `ID: ${id} <button type="button" onclick="this.parentElement.remove(); updateModeratorIds('${mode}')">&times;</button>`;
                container.appendChild(tag);
                updateModeratorIds(mode);
            }

            function updateModeratorIds(mode) {
                const containerId = mode === 'create' ? 'create_moderators' : 'edit_moderators';
                const hiddenId = mode === 'create' ? 'moderator_ids' : 'edit_moderator_ids';
                const container = document.getElementById(containerId);
                const ids = Array.from(container.children).map(tag => tag.textContent.split('ID: ')[1].split(' ')[0]);
                document.getElementById(hiddenId).value = ids.join(',');
            }

            function addRule(mode) {
                const containerId = mode === 'create' ? 'create_rules_container' : 'edit_rules_container';
                const container = document.getElementById(containerId);
                const input = container.querySelector('input');
                const rule = input.value.trim();
                if (rule) {
                    addRuleTag(rule, mode);
                    input.value = '';
                }
            }

            function addRuleTag(rule, mode) {
                const containerId = mode === 'create' ? 'create_rules_container' : 'edit_rules_container';
                const hiddenId = mode === 'create' ? 'rules' : 'edit_rules';
                const container = document.getElementById(containerId);
                const tag = document.createElement('div');
                tag.className = 'rule-tag text-xs mb-2';
                tag.innerHTML = `${rule} <button type="button" onclick="this.parentElement.remove(); updateRules('${mode}')">&times;</button>`;
                container.insertBefore(tag, container.firstChild);
                updateRules(mode);
            }

            function updateRules(mode) {
                const containerId = mode === 'create' ? 'create_rules_container' : 'edit_rules_container';
                const hiddenId = mode === 'create' ? 'rules' : 'edit_rules';
                const container = document.getElementById(containerId);
                const rules = Array.from(container.querySelectorAll('.rule-tag')).map(tag => tag.textContent.split(' ')[0]);
                document.getElementById(hiddenId).value = rules.join('\n');
            }

            document.getElementById('createCommunityForm').addEventListener('submit', function(e) {
                e.preventDefault();
                console.log('Creating new community with data:', new FormData(this));
                closeCreateModal();
            });

            document.getElementById('editCommunityForm').addEventListener('submit', function(e) {
                e.preventDefault();
                const id = document.getElementById('edit_id').value;
                console.log('Updating community ID:', id, 'with data:', new FormData(this));
                closeEditModal();
            });

            window.onclick = function(event) {
                const createModal = document.getElementById('createModal');
                const editModal = document.getElementById('editModal');
                const deleteModal = document.getElementById('deleteModal');
                if (event.target === createModal) closeCreateModal();
                if (event.target === editModal) closeEditModal();
                if (event.target === deleteModal) closeDeleteModal();
            };

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