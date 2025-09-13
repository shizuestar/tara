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
                <i class="fas fa-blog text-yellow-400 text-xl"></i>
                Manajemen Blog
            </h1>
            <div class="flex gap-3 flex-wrap">
                <button onclick="showCreateModal()" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors">
                    <i class="fas fa-plus text-sm"></i>
                    Tambah Blog Baru
                </button>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="bg-white rounded-lg p-5 mb-8 border border-gray-200">
            <h3 class="text-lg font-semibold flex items-center gap-2 mb-4 text-gray-900" style="font-family: 'Space Grotesk', sans-serif;">
                <i class="fas fa-filter text-yellow-400 text-base"></i>
                Filter Blog
            </h3>
            <form method="GET" action="{{ route('admin.blog.index') }}">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-1.5">Kategori</label>
                        <select id="category" name="category" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                            <option value="">Semua Kategori</option>
                            @foreach($categories as $id => $name)
                                <option value="{{ $name }}" {{ $filters['category'] == $name ? 'selected' : '' }}>{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-1.5">Status</label>
                        <select id="status" name="status" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                            <option value="">Semua Status</option>
                            @foreach($statuses as $key => $label)
                                <option value="{{ $key }}" {{ $filters['status'] == $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="keyword" class="block text-sm font-medium text-gray-700 mb-1.5">Kata Kunci</label>
                        <input id="keyword" name="keyword" type="text" value="{{ $filters['keyword'] ?? '' }}" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Cari judul atau konten...">
                    </div>
                </div>
                <div class="flex gap-3 mt-4">
                    <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors">
                        <i class="fas fa-filter text-sm"></i>
                        Terapkan
                    </button>
                    <a href="{{ route('admin.blog.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors">
                        <i class="fas fa-redo text-sm"></i>
                        Reset
                    </a>
                </div>
            </form>
        </div>

        <!-- Grid View -->
        <div class="bg-white rounded-lg p-5 mb-8 border border-gray-200">
            <div class="flex justify-between items-center gap-4 mb-5">
                <h2 class="text-lg font-semibold text-gray-900" style="font-family: 'Space Grotesk', sans-serif;">Daftar Blog</h2>
                <div class="text-sm text-gray-600">Menampilkan {{ $blogs->count() }} dari {{ $blogs->total() }} blog</div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @forelse($blogs as $blog)
                    <div class="bg-white rounded-lg border border-gray-200 overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                        <div class="relative">
                            <img src="{{ $blog->cover_image ? asset('storage/' . $blog->cover_image) : 'https://picsum.photos/600/400?random=' . $blog->id }}" alt="{{ $blog->title }}" class="w-full h-32 object-cover">
                            <img src="{{ $blog->author->profile_photo_url ?? 'https://picsum.photos/id/' . ($blog->id + 100) . '/100/100' }}" alt="{{ $blog->author->name }}" class="rounded-full w-16 h-16 object-cover border-3 border-white relative z-10 ml-4 -mt-8">
                        </div>
                        <div class="p-3">
                            <h3 class="font-semibold text-gray-900 mb-1 text-sm" style="font-family: 'Space Grotesk', sans-serif;">{{ Str::limit($blog->title, 30) }}</h3>
                            <p class="text-xs text-gray-600 mb-2">{{ Str::limit(strip_tags($blog->content), 50) }}...</p>
                            <div class="flex justify-between items-center mb-2">
                                <div class="flex items-center text-xs text-gray-600">
                                    <i class="fas fa-user mr-1"></i>
                                    <span>{{ $blog->author->name ?? 'Unknown' }}</span>
                                </div>
                                <span class="px-2 py-1 rounded-full bg-{{ $blog->status == 'published' ? 'green' : ($blog->status == 'draft' ? 'yellow' : 'gray') }}-100 text-{{ $blog->status == 'published' ? 'green' : ($blog->status == 'draft' ? 'yellow' : 'gray') }}-600 text-xs">
                                    {{ ucfirst($blog->status) }}
                                </span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-xs text-gray-600">{{ $blog->views }} views</span>
                                <div class="flex gap-2">
                                    <a href="{{ route('admin.blog.show', $blog->id) }}" 
                        class="w-8 h-8 rounded-md bg-gray-100 text-gray-600 flex items-center justify-center hover:bg-gray-200 text-xs" 
                        aria-label="Detail {{ $blog->title }}">
                            <i class="fas fa-eye"></i>
                        </a>
                                    <button onclick="showEditModal({{ $blog->id }}, '{{ addslashes($blog->title) }}', {{ $blog->category_id }}, '{{ addslashes($blog->content) }}', '{{ $blog->cover_image ? asset('storage/' . $blog->cover_image) : '' }}', '{{ $blog->status }}', '{{ $blog->tags ? implode(', ', $blog->tags) : '' }}')" class="w-8 h-8 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-xs" aria-label="Edit {{ $blog->title }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button onclick="showDeleteModal({{ $blog->id }}, '{{ addslashes($blog->title) }}')" class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-xs" aria-label="Hapus {{ $blog->title }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="col-span-full text-center text-gray-500">Tidak ada blog ditemukan.</p>
                @endforelse
            </div>
        </div>

        <!-- Pagination -->
        <div class="flex justify-center mt-5 gap-2">
            {{ $blogs->links('pagination::simple-tailwind') }}
        </div>

        <div class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4" id="createModal">
            <div class="bg-white rounded-lg p-6 w-full max-w-4xl max-h-screen overflow-y-auto">
                <div class="flex justify-between items-center mb-4 border-b border-gray-200 pb-3">
                    <h3 class="text-lg font-semibold text-gray-900" style="font-family: 'Space Grotesk', sans-serif;">Tambah Blog Baru</h3>
                    <button class="text-xl text-gray-600 hover:text-gray-900" onclick="closeCreateModal()" aria-label="Tutup modal">&times;</button>
                </div>
                <form method="POST" action="{{ route('admin.blog.store') }}" class="grid grid-cols-1 md:grid-cols-2 gap-6" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-1.5">Judul Blog *</label>
                        <input type="text" id="title" name="title" value="{{ old('title') }}" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Masukkan judul blog" required>
                    </div>
                    <div>
                        <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1.5">Kategori *</label>
                        <select id="category_id" name="category_id" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                            <option value="">Pilih Kategori</option>
                            @foreach($categories as $id => $name)
                                <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="md:col-span-2">
                        <label for="content" class="block text-sm font-medium text-gray-700 mb-1.5">Konten *</label>
                        <textarea id="content" name="content" class="w-full h-64">{{ old('content') }}</textarea>
                    </div>
                    <div class="md:col-span-2">
                        <label for="cover_image" class="block text-sm font-medium text-gray-700 mb-1.5">Gambar Cover (jpg, jpeg, png, max 2MB)</label>
                        <input type="file" id="cover_image" name="cover_image" accept="image/jpeg,image/png" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                    </div>
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-1.5">Status *</label>
                        <select id="status" name="status" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                            <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draf</option>
                            <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Diterbitkan</option>
                            <option value="archived" {{ old('status') == 'archived' ? 'selected' : '' }}>Arsip</option>
                        </select>
                    </div>
                    <div>
                        <label for="tags" class="block text-sm font-medium text-gray-700 mb-1.5">Tag (pisahkan dengan koma)</label>
                        <input type="text" id="tags" name="tags" value="{{ old('tags') }}" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Contoh: puisi, inspirasi">
                    </div>
                    <div class="md:col-span-2 flex justify-end gap-3 mt-4">
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

        <div class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4" id="editModal">
            <div class="bg-white rounded-lg p-6 w-full max-w-4xl max-h-screen overflow-y-auto">
                <div class="flex justify-between items-center mb-4 border-b border-gray-200 pb-3">
                    <h3 class="text-lg font-semibold text-gray-900" style="font-family: 'Space Grotesk', sans-serif;">Edit Blog</h3>
                    <button class="text-xl text-gray-600 hover:text-gray-900" onclick="closeEditModal()" aria-label="Tutup modal">&times;</button>
                </div>
                <form id="editBlogForm" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit_id" name="id">
                    <div>
                        <label for="edit_title" class="block text-sm font-medium text-gray-700 mb-1.5">Judul Blog *</label>
                        <input type="text" id="edit_title" name="title" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                    </div>
                    <div>
                        <label for="edit_category_id" class="block text-sm font-medium text-gray-700 mb-1.5">Kategori *</label>
                        <select id="edit_category_id" name="category_id" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                            <option value="">Pilih Kategori</option>
                            @foreach($categories as $id => $name)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="md:col-span-2">
                        <label for="edit_content" class="block text-sm font-medium text-gray-700 mb-1.5">Konten *</label>
                        <textarea id="edit_content" name="content" class="w-full h-64"></textarea>
                    </div>
                    <div class="md:col-span-2">
                        <label for="edit_cover_image" class="block text-sm font-medium text-gray-700 mb-1.5">Gambar Cover (jpg, jpeg, png, max 2MB)</label>
                        <input type="file" id="edit_cover_image" name="cover_image" accept="image/jpeg,image/png" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                        <div id="cover_image_preview" class="mt-2"></div>
                    </div>
                    <div>
                        <label for="edit_status" class="block text-sm font-medium text-gray-700 mb-1.5">Status *</label>
                        <select id="edit_status" name="status" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                            <option value="draft">Draf</option>
                            <option value="published">Diterbitkan</option>
                            <option value="archived">Arsip</option>
                        </select>
                    </div>
                    <div>
                        <label for="edit_tags" class="block text-sm font-medium text-gray-700 mb-1.5">Tag (pisahkan dengan koma)</label>
                        <input type="text" id="edit_tags" name="tags" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                    </div>
                    <div class="md:col-span-2 flex justify-end gap-3 mt-4">
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

        <!-- Modal Delete Blog -->
        <div class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" id="deleteModal">
            <div class="bg-white rounded-lg p-6 w-full max-w-md">
                <div class="flex justify-between items-center mb-4 border-b border-gray-200 pb-3">
                    <h3 class="text-lg font-semibold text-gray-900" style="font-family: 'Space Grotesk', sans-serif;">Hapus Blog</h3>
                    <button class="text-xl text-gray-600 hover:text-gray-900" onclick="closeDeleteModal()" aria-label="Tutup modal">&times;</button>
                </div>
                <div class="mb-4 text-sm text-gray-700">
                    <p class="mb-2">Apakah Anda yakin ingin menghapus blog <strong id="deleteBlogTitle"></strong>?</p>
                    <p>Tindakan ini tidak bisa dibatalkan.</p>
                </div>
                <form id="deleteBlogForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="flex justify-end gap-3">
                        <button type="button" class="bg-gray-100 hover:bg-gray-200 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors" onclick="closeDeleteModal()">
                            <i class="fas fa-times text-sm"></i>
                            Batal
                        </button>
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors">
                            <i class="fas fa-trash text-sm"></i>
                            Hapus Blog
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('styles')
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
        <style>
            .blog-cover { height: 120px; object-fit: cover; }
            .blog-avatar { width: 64px; height: 64px; object-fit: cover; border: 3px solid white; margin-top: -40px; }
            @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
            .modal-open { animation: fadeIn 0.3s ease; }
            .ql-container { min-height: 120px; border-radius: 0 0 8px 8px; font-family: 'Space Grotesk', sans-serif; }
            .ql-toolbar { border-radius: 8px 8px 0 0; }
            #cover_image_preview img { max-width: 200px; max-height: 200px; object-fit: cover; border-radius: 8px; }
        </style>
    @endpush

   @push('scripts')
        <!-- TinyMCE CDN (free version) -->
        <script src="https://cdn.tiny.cloud/1/vcya58nqfw4vp8bbe79scjwpyqp4vlnlbzodc3utt7zjubiz/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
            // Inisialisasi TinyMCE untuk textarea content
            tinymce.init({
                selector: '#content, #edit_content', // Target kedua textarea
                height: 300,
                menubar: false,
                plugins: [
                    'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                    'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                    'insertdatetime', 'media', 'table', 'help', 'wordcount'
                ],
                toolbar: 'undo redo | blocks | ' +
                    'bold italic forecolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat | help',
                content_style: 'body { font-family:Space Grotesk,sans-serif; font-size:14px }',
                // Setup untuk image upload (opsional, jika ingin upload inline image di editor)
                images_upload_url: '/admin/blogs/upload-image', // Route khusus jika perlu (lihat catatan)
                automatic_uploads: false // Matikan auto-upload jika tidak setup route
            });

            let currentBlogId = null;

            // Modal Create
            function showCreateModal() {
                document.getElementById('createModal').classList.remove('hidden');
                document.getElementById('createModal').classList.add('modal-open');
                document.getElementById('createBlogForm').reset();
                tinymce.get('content').setContent(''); // Kosongkan TinyMCE
            }

            function closeCreateModal() {
                document.getElementById('createModal').classList.add('hidden');
                document.getElementById('createModal').classList.remove('modal-open');
            }

            // Modal Edit
            function showEditModal(id, title, category_id, content, cover_image, status, tags) {
                currentBlogId = id;
                document.getElementById('edit_id').value = id;
                document.getElementById('edit_title').value = title;
                document.getElementById('edit_category_id').value = category_id;
                tinymce.get('edit_content').setContent(content);
                document.getElementById('edit_status').value = status;
                document.getElementById('edit_tags').value = tags;
                document.getElementById('editBlogForm').action = `/admin/blogs/${id}`;
                const preview = document.getElementById('cover_image_preview');
                preview.innerHTML = cover_image ? `<img src="${cover_image}" alt="Cover Image Preview">` : '';
                document.getElementById('editModal').classList.remove('hidden');
                document.getElementById('editModal').classList.add('modal-open');
            }

            function closeEditModal() {
                document.getElementById('editModal').classList.add('hidden');
                document.getElementById('editModal').classList.remove('modal-open');
                document.getElementById('cover_image_preview').innerHTML = '';
                tinymce.get('edit_content').setContent(''); // Kosongkan TinyMCE
            }

            // Modal Delete (tidak berubah)
            function showDeleteModal(id, title) {
                currentBlogId = id;
                document.getElementById('deleteBlogTitle').textContent = title;
                document.getElementById('deleteBlogForm').action = `/admin/blogs/${id}`;
                document.getElementById('deleteModal').classList.remove('hidden');
                document.getElementById('deleteModal').classList.add('modal-open');
            }

            function closeDeleteModal() {
                document.getElementById('deleteModal').classList.add('hidden');
                document.getElementById('deleteModal').classList.remove('modal-open');
            }

            // Close modals on outside click / Escape (tidak berubah)
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