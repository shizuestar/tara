<x-admin-layout>
    <div class="bg-white rounded-lg p-4 shadow-sm">
        <!-- Page Header -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 mb-6">
            <h1 class="text-lg font-semibold flex items-center gap-2 text-gray-900">
                <i class="fas fa-photo-video text-yellow-400 text-base"></i>
                Galeri Karya
            </h1>
            <a href="#" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-3 py-1.5 rounded-md flex items-center gap-1.5 transition-colors">
                <i class="fas fa-plus text-xs"></i>
                Tambah Karya
            </a>
        </div>

        <!-- Filter Section -->
        <div class="bg-white rounded-md p-4 mb-6 border border-gray-100">
            <h3 class="text-base font-semibold flex items-center gap-2 mb-3 text-gray-900">
                <i class="fas fa-filter text-yellow-400 text-sm"></i>
                Filter
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1">Kategori</label>
                    <select class="w-full p-1.5 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-1 focus:ring-yellow-400">
                        <option value="">Semua Kategori</option>
                        <option value="photography">Fotografi</option>
                        <option value="design">Desain</option>
                        <option value="illustration">Ilustrasi</option>
                        <option value="coding">Koding</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1">Status</label>
                    <select class="w-full p-1.5 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-1 focus:ring-yellow-400">
                        <option value="">Semua Status</option>
                        <option value="published">Tayang</option>
                        <option value="pending">Menunggu</option>
                        <option value="rejected">Ditolak</option>
                        <option value="draft">Draft</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1">Kreator</label>
                    <select class="w-full p-1.5 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-1 focus:ring-yellow-400">
                        <option value="">Semua Kreator</option>
                        <option value="1">Dewi Santika</option>
                        <option value="2">Aldi Pratama</option>
                        <option value="3">Rina Andriani</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1">Kata Kunci</label>
                    <input type="text" class="w-full p-1.5 border border-gray-200 rounded-md text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-yellow-400" placeholder="Cari...">
                </div>
            </div>
            <div class="flex gap-2 mt-3">
                <button class="bg-gray-100 hover:bg-gray-200 text-gray-900 text-sm font-medium px-3 py-1.5 rounded-md flex items-center gap-1.5 transition-colors">
                    <i class="fas fa-filter text-xs"></i>
                    Terapkan
                </button>
                <button class="bg-gray-100 hover:bg-gray-200 text-gray-900 text-sm font-medium px-3 py-1.5 rounded-md flex items-center gap-1.5 transition-colors">
                    <i class="fas fa-redo text-xs"></i>
                    Reset
                </button>
            </div>
        </div>

        <!-- Artwork List Section -->
        <div class="bg-white rounded-md p-4 border border-gray-100">
            <div class="flex justify-between items-center gap-3 mb-4">
                <h2 class="text-base font-semibold text-gray-900">Daftar Karya</h2>
                <div class="text-xs text-gray-600">12 dari 85</div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="p-2 text-left text-xs font-semibold text-gray-600 w-12">Thumbnail</th>
                            <th class="p-2 text-left text-xs font-semibold text-gray-600">Judul</th>
                            <th class="p-2 text-left text-xs font-semibold text-gray-600">Kategori</th>
                            <th class="p-2 text-left text-xs font-semibold text-gray-600">Kreator</th>
                            <th class="p-2 text-left text-xs font-semibold text-gray-600">Tanggal</th>
                            <th class="p-2 text-left text-xs font-semibold text-gray-600">Status</th>
                            <th class="p-2 text-left text-xs font-semibold text-gray-600 w-24">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="hover:bg-gray-50">
                            <td class="p-2"><div class="w-10 h-10 rounded-md bg-gray-100 flex items-center justify-center text-gray-400 text-sm"><i class="fas fa-image"></i></div></td>
                            <td class="p-2">
                                <div class="text-sm font-medium text-gray-900">Sunset at Bali Beach</div>
                                <div class="text-xs text-gray-600">1920x1080px · 2.4MB</div>
                            </td>
                            <td class="p-2 text-sm text-gray-900">Fotografi</td>
                            <td class="p-2 text-sm text-gray-900">Dewi Santika</td>
                            <td class="p-2 text-sm text-gray-900">12 Agu 2023</td>
                            <td class="p-2"><span class="px-2 py-1 rounded-full bg-green-100 text-green-600 text-xs">Tayang</span></td>
                            <td class="p-2">
                                <div class="flex gap-1.5">
                                    <a href="#" class="w-7 h-7 rounded-md bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-sm"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="w-7 h-7 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-sm"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="w-7 h-7 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-sm" onclick="showDeleteModal('Sunset at Bali Beach')"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="p-2"><div class="w-10 h-10 rounded-md bg-gray-100 flex items-center justify-center text-gray-400 text-sm"><i class="fas fa-paint-brush"></i></div></td>
                            <td class="p-2">
                                <div class="text-sm font-medium text-gray-900">Digital Illustration Series</div>
                                <div class="text-xs text-gray-600">2500x2500px · 5.1MB</div>
                            </td>
                            <td class="p-2 text-sm text-gray-900">Ilustrasi</td>
                            <td class="p-2 text-sm text-gray-900">Aldi Pratama</td>
                            <td class="p-2 text-sm text-gray-900">10 Agu 2023</td>
                            <td class="p-2"><span class="px-2 py-1 rounded-full bg-green-100 text-green-600 text-xs">Tayang</span></td>
                            <td class="p-2">
                                <div class="flex gap-1.5">
                                    <a href="#" class="w-7 h-7 rounded-md bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-sm"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="w-7 h-7 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-sm"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="w-7 h-7 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-sm" onclick="showDeleteModal('Digital Illustration Series')"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="p-2"><div class="w-10 h-10 rounded-md bg-gray-100 flex items-center justify-center text-gray-400 text-sm"><i class="fas fa-code"></i></div></td>
                            <td class="p-2">
                                <div class="text-sm font-medium text-gray-900">E-commerce Dashboard</div>
                                <div class="text-xs text-gray-600">Laravel · Vue.js</div>
                            </td>
                            <td class="p-2 text-sm text-gray-900">Koding</td>
                            <td class="p-2 text-sm text-gray-900">Rina Andriani</td>
                            <td class="p-2 text-sm text-gray-900">08 Agu 2023</td>
                            <td class="p-2"><span class="px-2 py-1 rounded-full bg-yellow-100 text-yellow-600 text-xs">Menunggu</span></td>
                            <td class="p-2">
                                <div class="flex gap-1.5">
                                    <a href="#" class="w-7 h-7 rounded-md bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-sm"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="w-7 h-7 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-sm"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="w-7 h-7 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-sm" onclick="showDeleteModal('E-commerce Dashboard')"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="p-2"><div class="w-10 h-10 rounded-md bg-gray-100 flex items-center justify-center text-gray-400 text-sm"><i class="fas fa-palette"></i></div></td>
                            <td class="p-2">
                                <div class="text-sm font-medium text-gray-900">Brand Identity Package</div>
                                <div class="text-xs text-gray-600">Logo · Guideline</div>
                            </td>
                            <td class="p-2 text-sm text-gray-900">Desain</td>
                            <td class="p-2 text-sm text-gray-900">Budi Santoso</td>
                            <td class="p-2 text-sm text-gray-900">05 Agu 2023</td>
                            <td class="p-2"><span class="px-2 py-1 rounded-full bg-red-100 text-red-600 text-xs">Ditolak</span></td>
                            <td class="p-2">
                                <div class="flex gap-1.5">
                                    <a href="#" class="w-7 h-7 rounded-md bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-sm"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="w-7 h-7 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-sm"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="w-7 h-7 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-sm" onclick="showDeleteModal('Brand Identity Package')"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="p-2"><div class="w-10 h-10 rounded-md bg-gray-100 flex items-center justify-center text-gray-400 text-sm"><i class="fas fa-image"></i></div></td>
                            <td class="p-2">
                                <div class="text-sm font-medium text-gray-900">Urban Architecture</div>
                                <div class="text-xs text-gray-600">3000x2000px · 4.8MB</div>
                            </td>
                            <td class="p-2 text-sm text-gray-900">Fotografi</td>
                            <td class="p-2 text-sm text-gray-900">Sari Indah</td>
                            <td class="p-2 text-sm text-gray-900">03 Agu 2023</td>
                            <td class="p-2"><span class="px-2 py-1 rounded-full bg-gray-100 text-gray-600 text-xs">Draft</span></td>
                            <td class="p-2">
                                <div class="flex gap-1.5">
                                    <a href="#" class="w-7 h-7 rounded-md bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-sm"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="w-7 h-7 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-sm"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="w-7 h-7 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-sm" onclick="showDeleteModal('Urban Architecture')"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="flex justify-center mt-4 gap-1.5">
                <a href="#" class="w-8 h-8 flex items-center justify-center rounded-md bg-white border border-gray-200 text-gray-900 hover:bg-yellow-400 hover:border-yellow-400 text-sm"><i class="fas fa-chevron-left"></i></a>
                <a href="#" class="w-8 h-8 flex items-center justify-center rounded-md bg-yellow-400 text-gray-900 font-medium border border-yellow-400 text-sm">1</a>
                <a href="#" class="w-8 h-8 flex items-center justify-center rounded-md bg-white border border-gray-200 text-gray-900 hover:bg-yellow-400 hover:border-yellow-400 text-sm">2</a>
                <a href="#" class="w-8 h-8 flex items-center justify-center rounded-md bg-white border border-gray-200 text-gray-900 hover:bg-yellow-400 hover:border-yellow-400 text-sm">3</a>
                <span class="flex items-center px-2 text-gray-600 text-xs">...</span>
                <a href="#" class="w-8 h-8 flex items-center justify-center rounded-md bg-white border border-gray-200 text-gray-900 hover:bg-yellow-400 hover:border-yellow-400 text-sm">8</a>
                <a href="#" class="w-8 h-8 flex items-center justify-center rounded-md bg-white border border-gray-200 text-gray-900 hover:bg-yellow-400 hover:border-yellow-400 text-sm"><i class="fas fa-chevron-right"></i></a>
            </div>
        </div>

        <!-- Category List Section -->
        <div class="bg-white rounded-md p-4 border border-gray-100">
            <div class="flex justify-between items-center gap-3 mb-4">
                <h2 class="text-base font-semibold text-gray-900">Kategori</h2>
                <button class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-3 py-1.5 rounded-md flex items-center gap-1.5 transition-colors" onclick="showCategoryModal('create')">
                    <i class="fas fa-plus text-xs"></i>
                    Tambah
                </button>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="p-2 text-left text-xs font-semibold text-gray-600">Nama</th>
                            <th class="p-2 text-left text-xs font-semibold text-gray-600">Deskripsi</th>
                            <th class="p-2 text-left text-xs font-semibold text-gray-600 w-16">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="hover:bg-gray-50">
                            <td class="p-2 text-sm text-gray-900">Fotografi</td>
                            <td class="p-2 text-sm text-gray-900">Gambar diambil dengan kamera profesional.</td>
                            <td class="p-2">
                                <div class="flex gap-1.5">
                                    <a href="#" class="w-7 h-7 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-sm" onclick="showCategoryModal('edit', 'Fotografi', 'Gambar diambil dengan kamera profesional.')"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="w-7 h-7 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-sm" onclick="showCategoryDeleteModal('Fotografi')"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="p-2 text-sm text-gray-900">Desain</td>
                            <td class="p-2 text-sm text-gray-900">Desain grafis seperti logo dan poster.</td>
                            <td class="p-2">
                                <div class="flex gap-1.5">
                                    <a href="#" class="w-7 h-7 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-sm" onclick="showCategoryModal('edit', 'Desain', 'Desain grafis seperti logo dan poster.')"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="w-7 h-7 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-sm" onclick="showCategoryDeleteModal('Desain')"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="p-2 text-sm text-gray-900">Ilustrasi</td>
                            <td class="p-2 text-sm text-gray-900">Ilustrasi digital atau tradisional.</td>
                            <td class="p-2">
                                <div class="flex gap-1.5">
                                    <a href="#" class="w-7 h-7 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-sm" onclick="showCategoryModal('edit', 'Ilustrasi', 'Ilustrasi digital atau tradisional.')"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="w-7 h-7 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-sm" onclick="showCategoryDeleteModal('Ilustrasi')"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="p-2 text-sm text-gray-900">Koding</td>
                            <td class="p-2 text-sm text-gray-900">Proyek perangkat lunak atau aplikasi.</td>
                            <td class="p-2">
                                <div class="flex gap-1.5">
                                    <a href="#" class="w-7 h-7 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-sm" onclick="showCategoryModal('edit', 'Koding', 'Proyek perangkat lunak atau aplikasi.')"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="w-7 h-7 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-sm" onclick="showCategoryDeleteModal('Koding')"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="flex justify-center mt-4 gap-1.5">
                <a href="#" class="w-8 h-8 flex items-center justify-center rounded-md bg-white border border-gray-200 text-gray-900 hover:bg-yellow-400 hover:border-yellow-400 text-sm"><i class="fas fa-chevron-left"></i></a>
                <a href="#" class="w-8 h-8 flex items-center justify-center rounded-md bg-yellow-400 text-gray-900 font-medium border border-yellow-400 text-sm">1</a>
                <a href="#" class="w-8 h-8 flex items-center justify-center rounded-md bg-white border border-gray-200 text-gray-900 hover:bg-yellow-400 hover:border-yellow-400 text-sm">2</a>
                <a href="#" class="w-8 h-8 flex items-center justify-center rounded-md bg-white border border-gray-200 text-gray-900 hover:bg-yellow-400 hover:border-yellow-400 text-sm">3</a>
                <span class="flex items-center px-2 text-gray-600 text-xs">...</span>
                <a href="#" class="w-8 h-8 flex items-center justify-center rounded-md bg-white border border-gray-200 text-gray-900 hover:bg-yellow-400 hover:border-yellow-400 text-sm">5</a>
                <a href="#" class="w-8 h-8 flex items-center justify-center rounded-md bg-white border border-gray-200 text-gray-900 hover:bg-yellow-400 hover:border-yellow-400 text-sm"><i class="fas fa-chevron-right"></i></a>
            </div>
        </div>

        <!-- Delete Artwork Modal -->
        <div class="hidden fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50" id="deleteModal">
            <div class="bg-white rounded-md p-4 w-full max-w-sm">
                <div class="flex justify-between items-center mb-3 border-b border-gray-200 pb-2">
                    <h3 class="text-sm font-semibold text-gray-900">Hapus Karya</h3>
                    <button class="text-lg text-gray-600 hover:text-gray-900" onclick="closeDeleteModal()">&times;</button>
                </div>
                <div class="mb-3 text-sm text-gray-700">
                    <p class="mb-2">Yakin hapus karya <strong id="deleteArtworkName"></strong>?</p>
                    <p>Tindakan ini tidak dapat dibatalkan.</p>
                </div>
                <div class="flex justify-end gap-2">
                    <button class="bg-gray-100 hover:bg-gray-200 text-gray-900 text-sm font-medium px-3 py-1 rounded-md" onclick="closeDeleteModal()">Batal</button>
                    <button class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-3 py-1 rounded-md">Hapus</button>
                </div>
            </div>
        </div>

        <!-- Category Modal -->
        <div class="hidden fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50" id="categoryModal">
            <div class="bg-white rounded-md p-4 w-full max-w-sm">
                <div class="flex justify-between items-center mb-3 border-b border-gray-200 pb-2">
                    <h3 class="text-sm font-semibold text-gray-900" id="categoryModalTitle">Tambah Kategori</h3>
                    <button class="text-lg text-gray-600 hover:text-gray-900" onclick="closeCategoryModal()">&times;</button>
                </div>
                <div class="mb-3">
                    <div class="mb-3">
                        <label class="block text-xs font-medium text-gray-700 mb-1">Nama</label>
                        <input type="text" id="categoryName" class="w-full p-1.5 border border-gray-200 rounded-md text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-yellow-400" placeholder="Nama kategori...">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">Deskripsi</label>
                        <textarea id="categoryDescription" class="w-full p-1.5 border border-gray-200 rounded-md text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-yellow-400" rows="3" placeholder="Deskripsi kategori..."></textarea>
                    </div>
                </div>
                <div class="flex justify-end gap-2">
                    <button class="bg-gray-100 hover:bg-gray-200 text-gray-900 text-sm font-medium px-3 py-1 rounded-md" onclick="closeCategoryModal()">Batal</button>
                    <button class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-3 py-1 rounded-md" onclick="saveCategory()">Simpan</button>
                </div>
            </div>
        </div>

        <!-- Delete Category Modal -->
        <div class="hidden fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50" id="categoryDeleteModal">
            <div class="bg-white rounded-md p-4 w-full max-w-sm">
                <div class="flex justify-between items-center mb-3 border-b border-gray-200 pb-2">
                    <h3 class="text-sm font-semibold text-gray-900">Hapus Kategori</h3>
                    <button class="text-lg text-gray-600 hover:text-gray-900" onclick="closeCategoryDeleteModal()">&times;</button>
                </div>
                <div class="mb-3 text-sm text-gray-700">
                    <p class="mb-2">Yakin hapus kategori <strong id="deleteCategoryName"></strong>?</p>
                    <p>Tindakan ini tidak dapat dibatalkan.</p>
                </div>
                <div class="flex justify-end gap-2">
                    <button class="bg-gray-100 hover:bg-gray-200 text-gray-900 text-sm font-medium px-3 py-1 rounded-md" onclick="closeCategoryDeleteModal()">Batal</button>
                    <button class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-3 py-1 rounded-md">Hapus</button>
                </div>
            </div>
        </div>

        @push('scripts')
        <script>
            function showDeleteModal(artworkName) {
                document.getElementById('deleteArtworkName').textContent = artworkName;
                document.getElementById('deleteModal').classList.remove('hidden');
            }

            function closeDeleteModal() {
                document.getElementById('deleteModal').classList.add('hidden');
            }

            function showCategoryModal(mode, name = '', description = '') {
                const modal = document.getElementById('categoryModal');
                const title = document.getElementById('categoryModalTitle');
                const nameInput = document.getElementById('categoryName');
                const descInput = document.getElementById('categoryDescription');

                title.textContent = mode === 'create' ? 'Tambah Kategori' : 'Edit Kategori';
                nameInput.value = name;
                descInput.value = description;
                modal.classList.remove('hidden');
            }

            function closeCategoryModal() {
                document.getElementById('categoryModal').classList.add('hidden');
            }

            function showCategoryDeleteModal(categoryName) {
                document.getElementById('deleteCategoryName').textContent = categoryName;
                document.getElementById('categoryDeleteModal').classList.remove('hidden');
            }

            function closeCategoryDeleteModal() {
                document.getElementById('categoryDeleteModal').classList.add('hidden');
            }

            function saveCategory() {
                const name = document.getElementById('categoryName').value;
                const description = document.getElementById('categoryDescription').value;
                console.log('Saving category:', { name, description });
                closeCategoryModal();
            }

            window.onclick = function(event) {
                const deleteModal = document.getElementById('deleteModal');
                const categoryModal = document.getElementById('categoryModal');
                const categoryDeleteModal = document.getElementById('categoryDeleteModal');
                if (event.target === deleteModal) closeDeleteModal();
                if (event.target === categoryModal) closeCategoryModal();
                if (event.target === categoryDeleteModal) closeCategoryDeleteModal();
            };

            document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('select').forEach(select => {
                    select.addEventListener('change', function() {
                        console.log('Filter changed:', this.value);
                    });
                });
            });
        </script>
        @endpush
    </div>
</x-admin-layout>