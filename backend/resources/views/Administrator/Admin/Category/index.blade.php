<x-admin-layout>
    <div class="bg-white rounded-lg p-6 shadow-sm border border-gray-200">
        <!-- Session Notifications -->
        @if (session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-md text-sm flex items-center gap-2">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded-md text-sm flex items-center gap-2">
                <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded-md text-sm flex items-center gap-2">
                <i class="fas fa-exclamation-circle"></i>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Page Header -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
            <h1 class="text-2xl font-bold flex items-center gap-2 text-gray-900" style="font-family: 'Space Grotesk', sans-serif;">
                <i class="fas fa-folder text-yellow-400 text-xl"></i>
                Manajemen Kategori
            </h1>
            <div class="flex gap-3 flex-wrap">
                <button onclick="showCreateModal()" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors">
                    <i class="fas fa-plus text-sm"></i>
                    Tambah Kategori Baru
                </button>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="bg-white rounded-lg p-5 mb-8 border border-gray-200">
            <h3 class="text-lg font-semibold flex items-center gap-2 mb-4 text-gray-900" style="font-family: 'Space Grotesk', sans-serif;">
                <i class="fas fa-filter text-yellow-400 text-base"></i>
                Filter Kategori
            </h3>
            <form method="GET" action="{{ route('admin.categories.index') }}">
                <div class="grid grid-cols-1 sm:grid-cols-1 gap-4">
                    <div>
                        <label for="keyword" class="block text-sm font-medium text-gray-700 mb-1.5">Kata Kunci</label>
                        <input id="keyword" name="keyword" type="text" value="{{ $keyword ?? '' }}" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Cari nama atau deskripsi...">
                    </div>
                </div>
                <div class="flex gap-3 mt-4">
                    <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors">
                        <i class="fas fa-filter text-sm"></i>
                        Terapkan
                    </button>
                    <a href="{{ route('admin.categories.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors">
                        <i class="fas fa-redo text-sm"></i>
                        Reset
                    </a>
                </div>
            </form>
        </div>

        <!-- Grid View -->
        <div class="bg-white rounded-lg p-5 mb-8 border border-gray-200">
            <div class="flex justify-between items-center gap-4 mb-5">
                <h2 class="text-lg font-semibold text-gray-900" style="font-family: 'Space Grotesk', sans-serif;">Daftar Kategori</h2>
                <div class="text-sm text-gray-600">Menampilkan {{ $categories->count() }} dari {{ $categories->total() }} kategori</div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @forelse($categories as $category)
                    <div class="bg-white rounded-lg border border-gray-200 overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                        <div class="p-3">
                            <h3 class="font-semibold text-gray-900 mb-1 text-sm" style="font-family: 'Space Grotesk', sans-serif;">{{ Str::limit($category->name, 30) }}</h3>
                            <p class="text-xs text-gray-600 mb-2">{{ $category->description ? Str::limit(strip_tags($category->description), 50) : 'Tidak ada deskripsi' }}...</p>
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-xs text-gray-600">{{ $category->created_at->format('d M Y') }}</span>
                                <span class="px-2 py-1 rounded-full bg-blue-100 text-blue-600 text-xs">{{ $category->blogs()->count() }} Blog</span>
                            </div>
                            <div class="flex justify-end gap-2">
                                <button onclick="showEditModal({{ $category->id }}, '{{ addslashes($category->name) }}', '{{ addslashes($category->description ?? '') }}')" class="w-8 h-8 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-xs" aria-label="Edit {{ $category->name }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori {{ $category->name }}?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-xs" aria-label="Hapus {{ $category->name }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="col-span-full text-center text-gray-500">Tidak ada kategori ditemukan.</p>
                @endforelse
            </div>
        </div>

        <!-- Pagination -->
        <div class="flex justify-center mt-5 gap-2">
            {{ $categories->links('pagination::simple-tailwind') }}
        </div>

        <!-- Modal Create Category -->
        <div class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4" id="createModal">
            <div class="bg-white rounded-lg p-6 w-full max-w-md max-h-screen overflow-y-auto">
                <div class="flex justify-between items-center mb-4 border-b border-gray-200 pb-3">
                    <h3 class="text-lg font-semibold text-gray-900" style="font-family: 'Space Grotesk', sans-serif;">Tambah Kategori Baru</h3>
                    <button class="text-xl text-gray-600 hover:text-gray-900" onclick="closeCreateModal()" aria-label="Tutup modal">&times;</button>
                </div>
                <form method="POST" action="{{ route('admin.categories.store') }}" class="grid grid-cols-1 gap-6">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1.5">Nama Kategori *</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Masukkan nama kategori" required>
                    </div>
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1.5">Deskripsi</label>
                        <textarea id="description" name="description" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Masukkan deskripsi kategori">{{ old('description') }}</textarea>
                    </div>
                    <div class="flex justify-end gap-3 mt-4">
                        <button type="button" class="bg-gray-100 hover:bg-gray-200 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors" onclick="closeCreateModal()">
                            <i class="fas fa-times text-sm"></i>
                            Batal
                        </button>
                        <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors">
                            <i class="fas fa-save text-sm"></i>
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal Edit Category -->
        <div class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4" id="editModal">
            <div class="bg-white rounded-lg p-6 w-full max-w-md max-h-screen overflow-y-auto">
                <div class="flex justify-between items-center mb-4 border-b border-gray-200 pb-3">
                    <h3 class="text-lg font-semibold text-gray-900" style="font-family: 'Space Grotesk', sans-serif;">Edit Kategori</h3>
                    <button class="text-xl text-gray-600 hover:text-gray-900" onclick="closeEditModal()" aria-label="Tutup modal">&times;</button>
                </div>
                <form id="editCategoryForm" method="POST" class="grid grid-cols-1 gap-6">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit_id" name="id">
                    <div>
                        <label for="edit_name" class="block text-sm font-medium text-gray-700 mb-1.5">Nama Kategori *</label>
                        <input type="text" id="edit_name" name="name" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                    </div>
                    <div>
                        <label for="edit_description" class="block text-sm font-medium text-gray-700 mb-1.5">Deskripsi</label>
                        <textarea id="edit_description" name="description" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400"></textarea>
                    </div>
                    <div class="flex justify-end gap-3 mt-4">
                        <button type="button" class="bg-gray-100 hover:bg-gray-200 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors" onclick="closeEditModal()">
                            <i class="fas fa-times text-sm"></i>
                            Batal
                        </button>
                        <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors">
                            <i class="fas fa-save text-sm"></i>
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal Delete Category -->
        <div class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" id="deleteModal">
            <div class="bg-white rounded-lg p-6 w-full max-w-md">
                <div class="flex justify-between items-center mb-4 border-b border-gray-200 pb-3">
                    <h3 class="text-lg font-semibold text-gray-900" style="font-family: 'Space Grotesk', sans-serif;">Hapus Kategori</h3>
                    <button class="text-xl text-gray-600 hover:text-gray-900" onclick="closeDeleteModal()" aria-label="Tutup modal">&times;</button>
                </div>
                <div class="mb-4 text-sm text-gray-700">
                    <p class="mb-2">Apakah Anda yakin ingin menghapus kategori <strong id="deleteCategoryName"></strong>?</p>
                    <p>Tindakan ini tidak bisa dibatalkan kecuali kategori tidak digunakan oleh blog.</p>
                </div>
                <form id="deleteCategoryForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="flex justify-end gap-3">
                        <button type="button" class="bg-gray-100 hover:bg-gray-200 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors" onclick="closeDeleteModal()">
                            <i class="fas fa-times text-sm"></i>
                            Batal
                        </button>
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors">
                            <i class="fas fa-trash text-sm"></i>
                            Hapus Kategori
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('styles')
        <style>
            @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
            .modal-open { animation: fadeIn 0.3s ease; }
        </style>
    @endpush

    @push('scripts')
        <script>
            let currentCategoryId = null;

            function showCreateModal() {
                document.getElementById('createModal').classList.remove('hidden');
                document.getElementById('createModal').classList.add('modal-open');
                document.getElementById('name').value = '';
                document.getElementById('description').value = '';
            }

            function closeCreateModal() {
                document.getElementById('createModal').classList.add('hidden');
                document.getElementById('createModal').classList.remove('modal-open');
            }

            function showEditModal(id, name, description) {
                currentCategoryId = id;
                document.getElementById('edit_id').value = id;
                document.getElementById('edit_name').value = name;
                document.getElementById('edit_description').value = description || '';
                document.getElementById('editCategoryForm').action = `/admin/categories/${id}`;
                document.getElementById('editModal').classList.remove('hidden');
                document.getElementById('editModal').classList.add('modal-open');
            }

            function closeEditModal() {
                document.getElementById('editModal').classList.add('hidden');
                document.getElementById('editModal').classList.remove('modal-open');
            }

            function showDeleteModal(id, name) {
                currentCategoryId = id;
                document.getElementById('deleteCategoryName').textContent = name;
                document.getElementById('deleteCategoryForm').action = `/admin/categories/${id}`;
                document.getElementById('deleteModal').classList.remove('hidden');
                document.getElementById('deleteModal').classList.add('modal-open');
            }

            function closeDeleteModal() {
                document.getElementById('deleteModal').classList.add('hidden');
                document.getElementById('deleteModal').classList.remove('modal-open');
            }

            window.onclick = function(event) {
                if (event.target.id === 'createModal') closeCreateModal();
                if (event.target.id === 'editModal') closeEditModal();
                if (event.target.id === 'deleteModal') closeDeleteModal();
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