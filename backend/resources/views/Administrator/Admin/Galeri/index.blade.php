<x-admin-layout>
    @push('styles')
        <style>
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

    <div class="bg-gray-100 p-6">
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

            <!-- Filter Section -->
            <div class="bg-white rounded-lg p-5 mb-8 border border-gray-200">
                <h3 class="text-lg font-semibold flex items-center gap-2 mb-4 text-gray-900">
                    <i class="fas fa-filter text-yellow-400 text-base"></i>
                    Filter
                </h3>
                <form id="filterForm" action="{{ route('admin.galeri.index') }}" method="GET">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div>
                            <label for="category-filter" class="block text-sm font-medium text-gray-700 mb-1.5">Kategori</label>
                            <select id="category-filter" name="category_id" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                                <option value="">Semua Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="community-filter" class="block text-sm font-medium text-gray-700 mb-1.5">Komunitas</label>
                            <select id="community-filter" name="community_id" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                                <option value="">Semua Komunitas</option>
                                @foreach ($communities as $community)
                                    <option value="{{ $community->id }}" {{ request('community_id') == $community->id ? 'selected' : '' }}>{{ $community->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="status-filter" class="block text-sm font-medium text-gray-700 mb-1.5">Status</label>
                            <select id="status-filter" name="status" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                                <option value="">Semua Status</option>
                                <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Tayang</option>
                                <option value="archived" {{ request('status') == 'archived' ? 'selected' : '' }}>Arsip</option>
                            </select>
                        </div>
                        <div>
                            <label for="keyword-filter" class="block text-sm font-medium text-gray-700 mb-1.5">Kata Kunci</label>
                            <input id="keyword-filter" name="keyword" type="text" value="{{ request('keyword') }}" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Cari judul, deskripsi, atau tag...">
                        </div>
                    </div>
                    <div class="flex gap-3 mt-4">
                        <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors">
                            <i class="fas fa-filter text-sm"></i>
                            Terapkan
                        </button>
                        <a href="{{ route('admin.galeri.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors">
                            <i class="fas fa-redo text-sm"></i>
                            Reset
                        </a>
                    </div>
                </form>
            </div>

            <!-- Artwork List -->
            <div class="bg-white rounded-lg p-5 border border-gray-200">
                <div class="flex justify-between items-center gap-4 mb-5">
                    <h2 class="text-lg font-semibold text-gray-900">Daftar Karya</h2>
                    <div class="text-sm text-gray-600">Menampilkan {{ $artworks->count() }} dari {{ $artworks->total() }} karya</div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="p-3 text-left text-sm font-semibold text-gray-600 w-12">Thumbnail</th>
                                <th class="p-3 text-left text-sm font-semibold text-gray-600">Judul</th>
                                <th class="p-3 text-left text-sm font-semibold text-gray-600">Kategori</th>
                                <th class="p-3 text-left text-sm font-semibold text-gray-600">Komunitas</th>
                                <th class="p-3 text-left text-sm font-semibold text-gray-600">Tag</th>
                                <th class="p-3 text-left text-sm font-semibold text-gray-600">Status</th>
                                <th class="p-3 text-left text-sm font-semibold text-gray-600">Tanggal</th>
                                <th class="p-3 text-left text-sm font-semibold text-gray-600 w-24">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($artworks as $artwork)
                                <tr class="hover:bg-gray-50">
                                    <td class="p-3">
                                        @if ($artwork->thumbnail)
                                            <img src="{{ asset('storage/' . $artwork->thumbnail) }}" alt="{{ $artwork->title }}" class="w-10 h-10 rounded-md object-cover">
                                        @else
                                            <div class="w-10 h-10 rounded-md bg-gray-100 flex items-center justify-center text-gray-400 text-sm"><i class="fas fa-image"></i></div>
                                        @endif
                                    </td>
                                    <td class="p-3">
                                        <div class="text-sm font-medium text-gray-900">{{ $artwork->title }}</div>
                                        <div class="text-xs text-gray-600">{{ Str::limit($artwork->description, 30) }}</div>
                                    </td>
                                    <td class="p-3 text-sm text-gray-900">{{ $artwork->category ? $artwork->category->name : 'Tidak ada' }}</td>
                                    <td class="p-3 text-sm text-gray-900">{{ $artwork->community ? $artwork->community->name : 'Tidak ada' }}</td>
                                    <td class="p-3 text-sm text-gray-900">
                                        @foreach ($artwork->tags as $tag)
                                            <span class="inline-block bg-gray-100 text-gray-600 px-2 py-1 rounded-full text-xs mr-1">{{ $tag->tag }}</span>
                                        @endforeach
                                    </td>
                                    <td class="p-3">
                                        <span class="px-2 py-1 rounded-full {{ $artwork->status == 'published' ? 'bg-green-100 text-green-600' : ($artwork->status == 'draft' ? 'bg-gray-100 text-gray-600' : 'bg-yellow-100 text-yellow-600') }} text-xs">
                                            {{ ucfirst($artwork->status == 'published' ? 'Tayang' : ($artwork->status == 'draft' ? 'Draft' : 'Arsip')) }}
                                        </span>
                                    </td>
                                    <td class="p-3 text-sm text-gray-900">{{ $artwork->created_at->format('d M Y') }}</td>
                                    <td class="p-3">
                                        <div class="flex gap-2">
                                            <a href="{{ route('admin.galeri.show', $artwork->id) }}" class="w-8 h-8 rounded-md bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-sm" aria-label="Lihat {{ $artwork->title }}"><i class="fas fa-eye"></i></a>
                                            <button onclick="showEditModal({{ $artwork->id }})" class="w-8 h-8 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-sm" aria-label="Edit {{ $artwork->title }}"><i class="fas fa-edit"></i></button>
                                            <button onclick="showDeleteModal('{{ $artwork->title }}', {{ $artwork->id }})" class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-sm" aria-label="Hapus {{ $artwork->title }}"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="p-3 text-center text-sm text-gray-600">Tidak ada karya ditemukan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="flex justify-center mt-5 gap-2">
                    {{ $artworks->appends(request()->query())->links('pagination::tailwind') }}
                </div>
            </div>

            <!-- Modal Create Artwork -->
            <div class="modal hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 modal-overlay" id="createModal">
                <div class="bg-white rounded-xl p-6 w-full max-w-2xl max-h-[80vh] overflow-y-auto shadow-xl">
                    <div class="flex justify-between items-center mb-4 bg-gradient-to-r from-blue-400 to-blue-500 text-white rounded-t-xl p-3">
                        <h3 class="text-lg font-semibold">Tambah Karya</h3>
                        <button class="text-2xl hover:text-gray-200 transition-colors" onclick="closeCreateModal()" aria-label="Tutup modal">&times;</button>
                    </div>
                    <form id="createArtworkForm" action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
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
                                <input type="text" id="title" name="title" value="{{ old('title') }}" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Masukkan judul..." required>
                                @error('title')
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="status" class="block text-sm font-medium text-gray-700 mb-1.5">Status</label>
                                <select id="status" name="status" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                                    <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                                    <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Tayang</option>
                                    <option value="archived" {{ old('status') == 'archived' ? 'selected' : '' }}>Arsip</option>
                                </select>
                                @error('status')
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="description" class="block text-sm font-medium text-gray-700 mb-1.5">Deskripsi</label>
                                <textarea id="description" name="description" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" rows="3" placeholder="Masukkan deskripsi...">{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1.5">Kategori</label>
                                <select id="category_id" name="category_id" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="community_id" class="block text-sm font-medium text-gray-700 mb-1.5">Komunitas</label>
                                <select id="community_id" name="community_id" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                                    <option value="">Pilih Komunitas (opsional)</option>
                                    @foreach ($communities as $community)
                                        <option value="{{ $community->id }}" {{ old('community_id') == $community->id ? 'selected' : '' }}>{{ $community->name }}</option>
                                    @endforeach
                                </select>
                                @error('community_id')
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="thumbnail" class="block text-sm font-medium text-gray-700 mb-1.5">Thumbnail</label>
                                <input type="file" id="thumbnail" name="thumbnail" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" accept="image/*">
                                @error('thumbnail')
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="palette" class="block text-sm font-medium text-gray-700 mb-1.5">Palet</label>
                                <input type="text" id="palette" name="palette" value="{{ old('palette') }}" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Masukkan palet...">
                                @error('palette')
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="typography" class="block text-sm font-medium text-gray-700 mb-1.5">Tipografi</label>
                                <input type="text" id="typography" name="typography" value="{{ old('typography') }}" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Masukkan tipografi...">
                                @error('typography')
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="period" class="block text-sm font-medium text-gray-700 mb-1.5">Periode</label>
                                <input type="text" id="period" name="period" value="{{ old('period') }}" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Masukkan periode...">
                                @error('period')
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="tags" class="block text-sm font-medium text-gray-700 mb-1.5">Tag (pisahkan dengan koma)</label>
                                <input type="text" id="tags" name="tags" value="{{ old('tags') }}" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Masukkan tag...">
                                @error('tags')
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4 col-span-2 flex items-end">
                                <div id="carouselImagesContainer" class="flex-1 mr-4">
                                    <label for="carousel_images_0" class="block text-sm font-medium text-gray-700 mb-1.5">Gambar Carousel</label>
                                    <input type="file" id="carousel_images_0" name="carousel_images[]" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" accept="image/*">
                                </div>
                                <button type="button" id="addCarouselImage" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors">
                                    <i class="fas fa-plus text-sm"></i> Tambah
                                </button>
                            </div>
                        </div>
                        <div class="flex justify-end gap-3 mt-4">
                            <button type="button" class="bg-gray-200 hover:bg-gray-300 text-gray-900 text-sm font-medium px-4 py-2 rounded-md transition-colors" onclick="closeCreateModal()">Batal</button>
                            <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-2 rounded-md">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Modal Edit Artwork -->
            <div class="modal hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 modal-overlay" id="editModal">
                <div class="bg-white rounded-xl p-6 w-full max-w-2xl max-h-[80vh] overflow-y-auto shadow-xl">
                    <div class="flex justify-between items-center mb-4 bg-gradient-to-r from-blue-400 to-blue-500 text-white rounded-t-xl p-3">
                        <h3 class="text-lg font-semibold">Edit Karya</h3>
                        <button class="text-2xl hover:text-gray-200 transition-colors" onclick="closeEditModal()" aria-label="Tutup modal">&times;</button>
                    </div>
                    <form id="editArtworkForm" action="{{ route('admin.galeri.update', ':id') }}" method="POST" enctype="multipart/form-data">
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
                                <input type="text" id="edit_title" name="title" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Masukkan judul..." required>
                                @error('title')
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="edit_status" class="block text-sm font-medium text-gray-700 mb-1.5">Status</label>
                                <select id="edit_status" name="status" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                                    <option value="draft">Draft</option>
                                    <option value="published">Tayang</option>
                                    <option value="archived">Arsip</option>
                                </select>
                                @error('status')
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="edit_description" class="block text-sm font-medium text-gray-700 mb-1.5">Deskripsi</label>
                                <textarea id="edit_description" name="description" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" rows="3" placeholder="Masukkan deskripsi..."></textarea>
                                @error('description')
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="edit_category_id" class="block text-sm font-medium text-gray-700 mb-1.5">Kategori</label>
                                <select id="edit_category_id" name="category_id" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="edit_community_id" class="block text-sm font-medium text-gray-700 mb-1.5">Komunitas</label>
                                <select id="edit_community_id" name="community_id" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                                    <option value="">Pilih Komunitas (opsional)</option>
                                    @foreach ($communities as $community)
                                        <option value="{{ $community->id }}">{{ $community->name }}</option>
                                    @endforeach
                                </select>
                                @error('community_id')
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="edit_thumbnail" class="block text-sm font-medium text-gray-700 mb-1.5">Thumbnail</label>
                                <input type="file" id="edit_thumbnail" name="thumbnail" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" accept="image/*">
                                <input type="hidden" id="edit_thumbnail_hidden" name="thumbnail_hidden">
                                <div id="thumbnail_preview" class="mt-2"></div>
                                @error('thumbnail')
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="edit_palette" class="block text-sm font-medium text-gray-700 mb-1.5">Palet</label>
                                <input type="text" id="edit_palette" name="palette" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Masukkan palet...">
                                @error('palette')
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="edit_typography" class="block text-sm font-medium text-gray-700 mb-1.5">Tipografi</label>
                                <input type="text" id="edit_typography" name="typography" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Masukkan tipografi...">
                                @error('typography')
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="edit_period" class="block text-sm font-medium text-gray-700 mb-1.5">Periode</label>
                                <input type="text" id="edit_period" name="period" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Masukkan periode...">
                                @error('period')
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="edit_tags" class="block text-sm font-medium text-gray-700 mb-1.5">Tag (pisahkan dengan koma)</label>
                                <input type="text" id="edit_tags" name="tags" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Masukkan tag...">
                                @error('tags')
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4 col-span-2 flex items-end">
                                <div id="editCarouselImagesContainer" class="flex-1 mr-4">
                                    <label for="edit_carousel_images_0" class="block text-sm font-medium text-gray-700 mb-1.5">Gambar Carousel</label>
                                    <input type="file" id="edit_carousel_images_0" name="carousel_images[]" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" accept="image/*">
                                </div>
                                <button type="button" id="addEditCarouselImage" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors">
                                    <i class="fas fa-plus text-sm"></i> Tambah
                                </button>
                            </div>
                            <div class="mb-4 col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-1.5">Gambar Carousel yang Ada</label>
                                <div id="existingCarouselImages" class="grid grid-cols-3 gap-2"></div>
                            </div>
                        </div>
                        <div class="flex justify-end gap-3 mt-4">
                            <button type="button" class="bg-gray-200 hover:bg-gray-300 text-gray-900 text-sm font-medium px-4 py-2 rounded-md transition-colors" onclick="closeEditModal()">Batal</button>
                            <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-2 rounded-md">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Modal Delete Artwork -->
            <div class="modal hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 modal-overlay" id="deleteModal">
                <div class="bg-white rounded-xl p-6 w-full max-w-md shadow-xl">
                    <div class="flex justify-between items-center mb-4 bg-gradient-to-r from-red-400 to-red-500 text-white rounded-t-xl p-3">
                        <h3 class="text-lg font-semibold">Hapus Karya</h3>
                        <button class="text-2xl hover:text-gray-200 transition-colors" onclick="closeDeleteModal()" aria-label="Tutup modal">&times;</button>
                    </div>
                    <div class="mb-4 text-sm text-gray-700">
                        <p class="mb-2">Apakah Anda yakin ingin menghapus karya <strong id="deleteArtworkName"></strong>?</p>
                        <p>Tindakan ini tidak dapat dibatalkan dan semua data terkait akan dihapus permanen.</p>
                    </div>
                    <form id="deleteArtworkForm" action="{{ route('admin.galeri.destroy', ':id') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="flex justify-end gap-3">
                            <button type="button" class="bg-gray-200 hover:bg-gray-300 text-gray-900 text-sm font-medium px-4 py-2 rounded-md transition-colors" onclick="closeDeleteModal()">Batal</button>
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white text-sm font-medium px-4 py-2 rounded-md">Hapus Karya</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @push('scripts')
            <script>
                let carouselImageCount = 1;
                let editCarouselImageCount = 1;

                function showCreateModal() {
                    const modal = document.getElementById('createModal');
                    modal.classList.remove('hidden');
                    modal.classList.add('show');
                    document.getElementById('createArtworkForm').reset();
                    carouselImageCount = 1;
                    document.getElementById('carouselImagesContainer').innerHTML = `
                        <label for="carousel_images_0" class="block text-sm font-medium text-gray-700 mb-1.5">Gambar Carousel</label>
                        <input type="file" id="carousel_images_0" name="carousel_images[]" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" accept="image/*">
                    `;
                }

                function closeCreateModal() {
                    const modal = document.getElementById('createModal');
                    modal.classList.remove('show');
                    setTimeout(() => modal.classList.add('hidden'), 300);
                    document.getElementById('createArtworkForm').reset();
                    carouselImageCount = 1;
                    document.getElementById('carouselImagesContainer').innerHTML = `
                        <label for="carousel_images_0" class="block text-sm font-medium text-gray-700 mb-1.5">Gambar Carousel</label>
                        <input type="file" id="carousel_images_0" name="carousel_images[]" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" accept="image/*">
                    `;
                }

                function showEditModal(artworkId) {
                    fetch('{{ route("admin.galeri.edit", ":id") }}'.replace(':id', artworkId), {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('edit_id').value = data.artwork.id;
                        document.getElementById('edit_title').value = data.artwork.title;
                        document.getElementById('edit_description').value = data.artwork.description || '';
                        document.getElementById('edit_thumbnail_hidden').value = data.artwork.thumbnail || '';
                        document.getElementById('edit_palette').value = data.artwork.palette || '';
                        document.getElementById('edit_typography').value = data.artwork.typography || '';
                        document.getElementById('edit_period').value = data.artwork.period || '';
                        document.getElementById('edit_status').value = data.artwork.status;
                        document.getElementById('edit_category_id').value = data.artwork.category_id || '';
                        document.getElementById('edit_community_id').value = data.artwork.community_id || '';
                        document.getElementById('edit_tags').value = data.tags.join(', ');
                        document.getElementById('editArtworkForm').action = '{{ route("admin.galeri.update", ":id") }}'.replace(':id', data.artwork.id);

                        // Tampilkan preview thumbnail
                        const thumbnailPreview = document.getElementById('thumbnail_preview');
                        thumbnailPreview.innerHTML = data.artwork.thumbnail ? `<img src="{{ asset('storage') }}/${data.artwork.thumbnail}" alt="Thumbnail" class="w-20 h-20 rounded-md object-cover">` : '';

                        // Tampilkan gambar carousel yang sudah ada
                        const existingCarouselImages = document.getElementById('existingCarouselImages');
                        existingCarouselImages.innerHTML = data.files.map(file => `
                            <div class="relative">
                                <img src="{{ asset('storage') }}/${file.image_path}" alt="${file.image_title || 'Carousel Image'}" class="w-full h-20 rounded-md object-cover">
                                <button type="button" onclick="deleteCarouselImage(${file.id})" class="absolute top-1 right-1 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs">x</button>
                            </div>
                        `).join('');

                        editCarouselImageCount = 1;
                        document.getElementById('editCarouselImagesContainer').innerHTML = `
                            <label for="edit_carousel_images_0" class="block text-sm font-medium text-gray-700 mb-1.5">Gambar Carousel Baru</label>
                            <input type="file" id="edit_carousel_images_0" name="carousel_images[]" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" accept="image/*">
                        `;

                        const modal = document.getElementById('editModal');
                        modal.classList.remove('hidden');
                        modal.classList.add('show');
                    })
                    .catch(error => {
                        console.error('Error fetching artwork data:', error);
                        alert('Gagal mengambil data karya. Silakan coba lagi.');
                    });
                }

                function closeEditModal() {
                    const modal = document.getElementById('editModal');
                    modal.classList.remove('show');
                    setTimeout(() => modal.classList.add('hidden'), 300);
                    document.getElementById('editArtworkForm').reset();
                    document.getElementById('thumbnail_preview').innerHTML = '';
                    document.getElementById('existingCarouselImages').innerHTML = '';
                    editCarouselImageCount = 1;
                    document.getElementById('editCarouselImagesContainer').innerHTML = `
                        <label for="edit_carousel_images_0" class="block text-sm font-medium text-gray-700 mb-1.5">Gambar Carousel Baru</label>
                        <input type="file" id="edit_carousel_images_0" name="carousel_images[]" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" accept="image/*">
                    `;
                }

                function showDeleteModal(artworkName, artworkId) {
                    document.getElementById('deleteArtworkName').textContent = artworkName;
                    document.getElementById('deleteArtworkForm').action = '{{ route("admin.galeri.destroy", ":id") }}'.replace(':id', artworkId);
                    const modal = document.getElementById('deleteModal');
                    modal.classList.remove('hidden');
                    modal.classList.add('show');
                }

                function closeDeleteModal() {
                    const modal = document.getElementById('deleteModal');
                    modal.classList.remove('show');
                    setTimeout(() => modal.classList.add('hidden'), 300);
                }

                function deleteCarouselImage(fileId) {
                    if (confirm('Apakah Anda yakin ingin menghapus gambar ini?')) {
                        fetch(`/admin/galeri/file/${fileId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert('Gambar berhasil dihapus.');
                                document.querySelector(`button[onclick="deleteCarouselImage(${fileId})"]`).parentElement.remove();
                            } else {
                                alert('Gagal menghapus gambar.');
                            }
                        })
                        .catch(error => {
                            console.error('Error deleting carousel image:', error);
                            alert('Gagal menghapus gambar.');
                        });
                    }
                }

                document.getElementById('addCarouselImage').addEventListener('click', function() {
                    carouselImageCount++;
                    const container = document.getElementById('carouselImagesContainer');
                    const newInput = document.createElement('div');
                    newInput.className = 'mb-4';
                    newInput.innerHTML = `
                        <label for="carousel_images_${carouselImageCount}" class="block text-sm font-medium text-gray-700 mb-1.5">Gambar Carousel ${carouselImageCount + 1}</label>
                        <input type="file" id="carousel_images_${carouselImageCount}" name="carousel_images[]" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" accept="image/*">
                    `;
                    container.appendChild(newInput);
                });

                document.getElementById('addEditCarouselImage').addEventListener('click', function() {
                    editCarouselImageCount++;
                    const container = document.getElementById('editCarouselImagesContainer');
                    const newInput = document.createElement('div');
                    newInput.className = 'mb-4';
                    newInput.innerHTML = `
                        <label for="edit_carousel_images_${editCarouselImageCount}" class="block text-sm font-medium text-gray-700 mb-1.5">Gambar Carousel Baru ${editCarouselImageCount + 1}</label>
                        <input type="file" id="edit_carousel_images_${editCarouselImageCount}" name="carousel_images[]" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" accept="image/*">
                    `;
                    container.appendChild(newInput);
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

                @if (session('success'))
                    alert('{{ session('success') }}');
                @endif
                @if (session('error'))
                    alert('{{ session('error') }}');
                @endif
            </script>
        @endpush
    </div>
</x-admin-layout>