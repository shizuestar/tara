<x-admin-layout>
    <div class="bg-white rounded-lg p-6 shadow-sm">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
            <h1 class="text-xl font-semibold flex items-center gap-2 text-gray-900">
                <i class="fas fa-photo-video text-yellow-400 text-lg"></i>
                Galeri Karya
            </h1>
            <button onclick="showCreateModal()" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors">
                <i class="fas fa-plus text-sm"></i>
                Tambah Karya
            </button>
        </div>

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
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
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

        <div class="bg-white rounded-lg p-5 border border-gray-200">
            <div class="flex justify-between items-center gap-4 mb-5">
                <h2 class="text-lg font-semibold text-gray-900">Daftar Karya</h2>
                <div class="text-sm text-gray-600">{{ $artworks->count() }} dari {{ $artworks->total() }}</div>
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
                        @foreach ($artworks as $artwork)
                        <tr class="hover:bg-gray-50">
                            <td class="p-3"><div class="w-10 h-10 rounded-md bg-gray-100 flex items-center justify-center text-gray-400 text-sm"><i class="fas fa-image"></i></div></td>
                            <td class="p-3">
                                <div class="text-sm font-medium text-gray-900">{{ $artwork->title }}</div>
                                <div class="text-xs text-gray-600">1920x1080px · 2.4MB</div>
                            </td>
                            <td class="p-3 text-sm text-gray-900">{{ $artwork->category->name }}</td>
                            <td class="p-3 text-sm text-gray-900">Tuan Pengguna</td>
                            <td class="p-3 text-sm text-gray-900">{{ $artwork->created_at->format('d M Y') }}</td>
                            <td class="p-3">
                                <span class="px-2 py-1 rounded-full {{ $artwork->status == 'published' ? 'bg-green-100 text-green-600' : ($artwork->status == 'pending' ? 'bg-yellow-100 text-yellow-600' : ($artwork->status == 'rejected' ? 'bg-red-100 text-red-600' : 'bg-gray-100 text-gray-600')) }} text-xs">{{ ucfirst($artwork->status) }}</span>
                            </td>
                            <td class="p-3">
                                <div class="flex gap-2">
                                    <a href="{{ route('admin.galeri.show', $artwork->id) }}" class="w-8 h-8 rounded-md bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-sm"><i class="fas fa-eye"></i></a>
                                    <button onclick="showEditModal('{{ js($artwork->id) }}', '{{ js($artwork->title) }}', '{{ js($artwork->description) }}', '{{ js($artwork->thumbnail) }}', '{{ js($artwork->palette) }}', '{{ js($artwork->typography) }}', '{{ js($artwork->period) }}', '{{ js($artwork->status) }}', '{{ js($artwork->category_id) }}')" class="w-8 h-8 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-sm"><i class="fas fa-edit"></i></a>
                                    <button onclick="showDeleteModal('{{ js($artwork->title) }}', '{{ js($artwork->id) }}')" class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-sm"><i class="fas fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="flex justify-center mt-5 gap-2">
                {{ $artworks->links() }}
            </div>
        </div>

        <div class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" id="createModal">
            <div class="bg-white rounded-lg p-6 w-[600px] max-h-[400px] overflow-y-auto">
                <div class="flex justify-between items-center mb-4 border-b border-gray-200 pb-3">
                    <h3 class="text-lg font-semibold text-gray-900">Tambah Karya</h3>
                    <button class="text-xl text-gray-600 hover:text-gray-900" onclick="closeCreateModal()" aria-label="Tutup modal">&times;</button>
                </div>
                <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($errors->any())
                        <div class="mb-4 p-3 bg-red-100 text-red-700 rounded-md text-sm">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-1.5">Judul</label>
                            <input type="text" id="title" name="title" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Masukkan judul..." required>
                        </div>
                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-1.5">Status</label>
                            <select id="status" name="status" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                                <option value="draft">Draft</option>
                                <option value="published">Tayang</option>
                                <option value="archived">Arsip</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-1.5">Deskripsi</label>
                            <textarea id="description" name="description" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400" rows="2" placeholder="Masukkan deskripsi..." required></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1.5">Kategori</label>
                            <select id="category_id" name="category_id" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="thumbnail" class="block text-sm font-medium text-gray-700 mb-1.5">Thumbnail</label>
                            <input type="file" id="thumbnail" name="thumbnail" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                        </div>
                        <div class="mb-4">
                            <label for="palette" class="block text-sm font-medium text-gray-700 mb-1.5">Palet</label>
                            <input type="text" id="palette" name="palette" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Masukkan palet..." required>
                        </div>
                        <div class="mb-4">
                            <label for="typography" class="block text-sm font-medium text-gray-700 mb-1.5">Tipografi</label>
                            <input type="text" id="typography" name="typography" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Masukkan tipografi..." required>
                        </div>
                        <div class="mb-4">
                            <label for="period" class="block text-sm font-medium text-gray-700 mb-1.5">Periode</label>
                            <input type="text" id="period" name="period" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Masukkan periode..." required>
                        </div>
                        <div class="mb-4 col-span-2 flex items-end">
                            <div id="carouselImagesContainer" class="flex-1 mr-4">
                                <label for="carousel_images_0" class="block text-sm font-medium text-gray-700 mb-1.5">Gambar Carousel</label>
                                <input type="file" id="carousel_images_0" name="carousel_images[]" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                            </div>
                            <button type="button" id="addCarouselImage" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors">
                                <i class="fas fa-plus text-sm"></i> Tambah
                            </button>
                        </div>
                    </div>
                    <div class="flex justify-end gap-3 mt-4">
                        <button type="button" class="bg-gray-100 hover:bg-gray-200 text-gray-900 text-sm font-medium px-4 py-2 rounded-md" onclick="closeCreateModal()">Batal</button>
                        <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-2 rounded-md">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" id="editModal">
            <div class="bg-white rounded-lg p-6 w-[600px] max-h-[400px] overflow-y-auto">
                <div class="flex justify-between items-center mb-4 border-b border-gray-200 pb-3">
                    <h3 class="text-lg font-semibold text-gray-900">Edit Karya</h3>
                    <button class="text-xl text-gray-600 hover:text-gray-900" onclick="closeEditModal()" aria-label="Tutup modal">&times;</button>
                </div>
                <form action="{{ route('admin.galeri.update', ':id') }}" method="POST" enctype="multipart/form-data" id="editForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit_id" name="id">
                    @if ($errors->any())
                        <div class="mb-4 p-3 bg-red-100 text-red-700 rounded-md text-sm">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label for="edit_title" class="block text-sm font-medium text-gray-700 mb-1.5">Judul</label>
                            <input type="text" id="edit_title" name="title" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Masukkan judul..." required>
                        </div>
                        <div class="mb-4">
                            <label for="edit_status" class="block text-sm font-medium text-gray-700 mb-1.5">Status</label>
                            <select id="edit_status" name="status" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                                <option value="draft">Draft</option>
                                <option value="published">Tayang</option>
                                <option value="archived">Arsip</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="edit_description" class="block text-sm font-medium text-gray-700 mb-1.5">Deskripsi</label>
                            <textarea id="edit_description" name="description" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400" rows="2" placeholder="Masukkan deskripsi..." required></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="edit_category_id" class="block text-sm font-medium text-gray-700 mb-1.5">Kategori</label>
                            <select id="edit_category_id" name="category_id" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="edit_thumbnail" class="block text-sm font-medium text-gray-700 mb-1.5">Thumbnail</label>
                            <input type="file" id="edit_thumbnail" name="thumbnail" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                            <input type="hidden" id="edit_thumbnail_hidden" name="thumbnail_hidden">
                        </div>
                        <div class="mb-4">
                            <label for="edit_palette" class="block text-sm font-medium text-gray-700 mb-1.5">Palet</label>
                            <input type="text" id="edit_palette" name="palette" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Masukkan palet..." required>
                        </div>
                        <div class="mb-4">
                            <label for="edit_typography" class="block text-sm font-medium text-gray-700 mb-1.5">Tipografi</label>
                            <input type="text" id="edit_typography" name="typography" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Masukkan tipografi..." required>
                        </div>
                        <div class="mb-4">
                            <label for="edit_period" class="block text-sm font-medium text-gray-700 mb-1.5">Periode</label>
                            <input type="text" id="edit_period" name="period" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Masukkan periode..." required>
                        </div>
                        <div class="mb-4 col-span-2 flex items-end">
                            <div id="editCarouselImagesContainer" class="flex-1 mr-4">
                                <label for="edit_carousel_images_0" class="block text-sm font-medium text-gray-700 mb-1.5">Gambar Carousel</label>
                                <input type="file" id="edit_carousel_images_0" name="carousel_images[]" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                            </div>
                            <button type="button" id="addEditCarouselImage" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors">
                                <i class="fas fa-plus text-sm"></i> Tambah
                            </button>
                        </div>
                    </div>
                    <div class="flex justify-end gap-3 mt-4">
                        <button type="button" class="bg-gray-100 hover:bg-gray-200 text-gray-900 text-sm font-medium px-4 py-2 rounded-md" onclick="closeEditModal()">Batal</button>
                        <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-2 rounded-md">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" id="deleteModal">
            <div class="bg-white rounded-lg p-6 w-full max-w-md">
                <div class="flex justify-between items-center mb-4 border-b border-gray-200 pb-3">
                    <h3 class="text-lg font-semibold text-gray-900">Hapus Karya</h3>
                    <button class="text-xl text-gray-600 hover:text-gray-900" onclick="closeDeleteModal()" aria-label="Tutup modal">&times;</button>
                </div>
                <div class="mb-4 text-sm text-gray-700">
                    <p class="mb-2">Apakah Tuan yakin hapus karya <strong id="deleteArtworkName"></strong>?</p>
                    <p>Tindakan ini tak dapat dibatalkan, data hilang selamanya.</p>
                </div>
                <div class="flex justify-end gap-3">
                    <button class="bg-gray-100 hover:bg-gray-200 text-gray-900 text-sm font-medium px-4 py-2 rounded-md" onclick="closeDeleteModal()">Batal</button>
                    <form action="{{ route('admin.galeri.destroy', ':id') }}" method="POST" id="deleteForm">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white text-sm font-medium px-4 py-2 rounded-md">Hapus Karya</button>
                    </form>
                </div>
            </div>
        </div>

        @push('scripts')
        <script>
            let currentArtworkId = '';
            let carouselImageCount = 1;
            let editCarouselImageCount = 1;

            function showCreateModal() {
                document.getElementById('createModal').classList.remove('hidden');
                carouselImageCount = 1;
                document.getElementById('carouselImagesContainer').innerHTML = `
                    <label for="carousel_images_0" class="block text-sm font-medium text-gray-700 mb-1.5">Gambar Carousel</label>
                    <input type="file" id="carousel_images_0" name="carousel_images[]" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                `;
            }

            function closeCreateModal() {
                document.getElementById('createModal').classList.add('hidden');
                document.getElementById('title').value = '';
                document.getElementById('description').value = '';
                document.getElementById('thumbnail').value = '';
                document.getElementById('palette').value = '';
                document.getElementById('typography').value = '';
                document.getElementById('period').value = '';
                document.getElementById('status').value = 'draft';
                document.getElementById('category_id').value = '';
                carouselImageCount = 1;
                document.getElementById('carouselImagesContainer').innerHTML = `
                    <label for="carousel_images_0" class="block text-sm font-medium text-gray-700 mb-1.5">Gambar Carousel</label>
                    <input type="file" id="carousel_images_0" name="carousel_images[]" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                `;
            }

            function showEditModal(id, title, description, thumbnail, palette, typography, period, status, category_id) {
                currentArtworkId = id;
                document.getElementById('edit_id').value = id;
                document.getElementById('edit_title').value = title;
                document.getElementById('edit_description').value = description;
                document.getElementById('edit_thumbnail_hidden').value = thumbnail;
                document.getElementById('edit_palette').value = palette;
                document.getElementById('edit_typography').value = typography;
                document.getElementById('edit_period').value = period;
                document.getElementById('edit_status').value = status;
                document.getElementById('edit_category_id').value = category_id;
                document.getElementById('editForm').action = '{{ route('admin.galeri.update', ':id') }}'.replace(':id', id);
                editCarouselImageCount = 1;
                document.getElementById('editCarouselImagesContainer').innerHTML = `
                    <label for="edit_carousel_images_0" class="block text-sm font-medium text-gray-700 mb-1.5">Gambar Carousel</label>
                    <input type="file" id="edit_carousel_images_0" name="carousel_images[]" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                `;
                document.getElementById('editModal').classList.remove('hidden');
            }

            function closeEditModal() {
                document.getElementById('editModal').classList.add('hidden');
                document.getElementById('edit_id').value = '';
                document.getElementById('edit_title').value = '';
                document.getElementById('edit_description').value = '';
                document.getElementById('edit_thumbnail').value = '';
                document.getElementById('edit_thumbnail_hidden').value = '';
                document.getElementById('edit_palette').value = '';
                document.getElementById('edit_typography').value = '';
                document.getElementById('edit_period').value = '';
                document.getElementById('edit_status').value = 'draft';
                document.getElementById('edit_category_id').value = '';
                editCarouselImageCount = 1;
                document.getElementById('editCarouselImagesContainer').innerHTML = `
                    <label for="edit_carousel_images_0" class="block text-sm font-medium text-gray-700 mb-1.5">Gambar Carousel</label>
                    <input type="file" id="edit_carousel_images_0" name="carousel_images[]" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                `;
            }

            function showDeleteModal(artworkName, id) {
                currentArtworkId = id;
                document.getElementById('deleteArtworkName').textContent = artworkName;
                document.getElementById('deleteForm').action = '{{ route('admin.galeri.destroy', ':id') }}'.replace(':id', id);
                document.getElementById('deleteModal').classList.remove('hidden');
            }

            function closeDeleteModal() {
                document.getElementById('deleteModal').classList.add('hidden');
                currentArtworkId = '';
            }

            document.getElementById('addCarouselImage').addEventListener('click', function() {
                carouselImageCount++;
                const container = document.getElementById('carouselImagesContainer');
                const newInput = document.createElement('div');
                newInput.className = 'mb-4';
                newInput.innerHTML = `
                    <label for="carousel_images_${carouselImageCount}" class="block text-sm font-medium text-gray-700 mb-1.5">Gambar Carousel ${carouselImageCount + 1}</label>
                    <input type="file" id="carousel_images_${carouselImageCount}" name="carousel_images[]" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                `;
                container.appendChild(newInput);
            });

            document.getElementById('addEditCarouselImage').addEventListener('click', function() {
                editCarouselImageCount++;
                const container = document.getElementById('editCarouselImagesContainer');
                const newInput = document.createElement('div');
                newInput.className = 'mb-4';
                newInput.innerHTML = `
                    <label for="edit_carousel_images_${editCarouselImageCount}" class="block text-sm font-medium text-gray-700 mb-1.5">Gambar Carousel ${editCarouselImageCount + 1}</label>
                    <input type="file" id="edit_carousel_images_${editCarouselImageCount}" name="carousel_images[]" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                `;
                container.appendChild(newInput);
            });

            window.onclick = function(event) {
                if (event.target === document.getElementById('createModal')) closeCreateModal();
                if (event.target === document.getElementById('editModal')) closeEditModal();
                if (event.target === document.getElementById('deleteModal')) closeDeleteModal();
            };

            document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('select, #keyword-filter').forEach(element => {
                    element.addEventListener('change', function() {
                        console.log('Filter changed:', this.id, this.value);
                    });
                });

                document.querySelectorAll('.modal').forEach(modal => {
                    modal.addEventListener('keydown', function(e) {
                        if (e.key === 'Escape') {
                            if (modal.id === 'createModal') closeCreateModal();
                            if (modal.id === 'editModal') closeEditModal();
                            if (modal.id === 'deleteModal') closeDeleteModal();
                        }
                    });
                });
            });
        </script>
        @endpush
    </div>
</x-admin-layout>