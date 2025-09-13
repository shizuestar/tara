<x-admin-layout>
    <div class="bg-gray-100 min-h-screen p-2">
        <div class="max-w-7xl mx-auto bg-white rounded-lg shadow-lg p-6">
            <!-- Page Header -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6 border-b border-gray-200 pb-4">
                <h1 class="text-2xl font-bold text-gray-900 flex items-center gap-3">
                    <i class="fas fa-blog text-yellow-400 text-xl"></i>
                    Detail Artikel
                </h1>
                <div class="flex items-center gap-3">
                    <button id="edit-btn" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors">
                        <i class="fas fa-edit text-sm"></i>
                        Edit
                    </button>
                    <button id="delete-btn" class="bg-red-500 hover:bg-red-600 text-white text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors" onclick="showDeleteModal()">
                        <i class="fas fa-trash text-sm"></i>
                        Hapus
                    </button>
                    <form action="{{ route('admin.blog.update', $blog->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <select name="status" onchange="this.form.submit()" class="p-2 border border-gray-300 rounded-md text-sm text-gray-900 focus:ring-2 focus:ring-yellow-400">
                            <option value="published" {{ $blog->status == 'published' ? 'selected' : '' }}>Tayang</option>
                            <option value="draft" {{ $blog->status == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="archived" {{ $blog->status == 'archived' ? 'selected' : '' }}>Arsip</option>
                        </select>
                    </form>
                </div>
            </div>

            <!-- Thumbnail -->
            <div class="mb-6">
                <div class="w-full h-[400px] sm:h-[400px] overflow-hidden rounded-md border border-gray-300">
                    <img id="article-hero-image" src="{{ $blog->cover_image ? asset('storage/' . $blog->cover_image) : 'https://picsum.photos/id/1015/1200/800' }}" alt="Gambar Artikel" class="w-full h-full object-cover">
                </div>
            </div>

            <!-- Article Detail -->
            <div id="view-mode">
                <h2 id="article-title" class="text-xl font-semibold text-gray-900 mb-4">{{ $blog->title }}</h2>
                <div class="article-info-grid mb-6">
                    <div class="article-info-item">
                        <label class="article-info-label">Kategori</label>
                        <div id="article-category" class="article-info-value">{{ $blog->category->name }}</div>
                    </div>
                    <div class="article-info-item">
                        <label class="article-info-label">Penulis</label>
                        <div id="article-author" class="article-info-value">{{ $blog->author->name }}</div>
                    </div>
                    <div class="article-info-item">
                        <label class="article-info-label">Tanggal</label>
                        <div id="article-date" class="article-info-value">{{ $blog->created_at ? \Carbon\Carbon::parse($blog->created_at)->translatedFormat('d M Y') : '' }}</div>
                    </div>
                    <div class="article-info-item">
                        <label class="article-info-label">Status</label>
                        <div id="article-status" class="status-badge {{ $blog->status == 'published' ? 'status-published' : ($blog->status == 'draft' ? 'status-draft' : 'status-archived') }}">
                            {{ ucfirst($blog->status) }}
                        </div>
                    </div>
                    <div class="article-info-item">
                        <label class="article-info-label">Dilihat</label>
                        <div id="article-views" class="article-info-value">{{ $blog->views }} kali</div>
                    </div>
                    <div class="article-info-item">
                        <label class="article-info-label">Suka</label>
                        <div id="article-likes" class="article-info-value">{{ $blog->likes->count() }} suka</div>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Isi Artikel</label>
                    <div id="article-body-view" class="text-sm text-gray-700 prose prose-sm max-w-none">{!! $blog->content !!}</div>
                </div>
            </div>

            <!-- Edit Mode -->
            <div id="edit-mode" class="hidden">
                <form action="{{ route('admin.blog.update', $blog->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-600 mb-1">Judul</label>
                        <input id="edit-title" name="title" type="text" class="w-full p-2 border border-gray-300 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" value="{{ $blog->title }}" />
                        @error('title')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Kategori</label>
                            <select id="edit-category" name="category_id" class="w-full p-2 border border-gray-300 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                                @foreach ($categories as $id => $name)
                                    <option value="{{ $id }}" {{ $blog->category_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Penulis</label>
                            <select id="edit-author" name="author_id" class="w-full p-2 border border-gray-300 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                                @foreach ($authors as $id => $name)
                                    <option value="{{ $id }}" {{ $blog->author_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                                @endforeach
                            </select>
                            @error('author_id')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Tanggal</label>
                            <input id="edit-date" name="created_at" type="date" class="w-full p-2 border border-gray-300 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" value="{{ $blog->created_at ? \Carbon\Carbon::parse($blog->created_at)->format('Y-m-d') : '' }}" />
                            @error('created_at')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Status</label>
                            <select id="edit-status" name="status" class="w-full p-2 border border-gray-300 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                                <option value="published" {{ $blog->status == 'published' ? 'selected' : '' }}>Tayang</option>
                                <option value="draft" {{ $blog->status == 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="archived" {{ $blog->status == 'archived' ? 'selected' : '' }}>Arsip</option>
                            </select>
                            @error('status')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Isi Artikel</label>
                        <div id="editor-container" class="border border-gray-300 rounded-md overflow-hidden">
                            <textarea id="edit-body" name="content" class="hidden">{!! $blog->content !!}</textarea>
                        </div>
                        @error('content')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex gap-3 mt-4">
                        <button type="submit" id="save-btn" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-2 rounded-md">Simpan</button>
                        <button type="button" id="cancel-btn" class="bg-gray-200 hover:bg-gray-300 text-gray-900 text-sm font-medium px-4 py-2 rounded-md">Batal</button>
                    </div>
                </form>
            </div>

            <!-- Comments Section -->
            <div class="mt-10">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-semibold text-gray-900">Komentar</h2>
                    <div id="comment-count" class="text-sm text-gray-600">{{ $blog->comments->count() }} Komentar</div>
                </div>
                <div class="bg-white border border-gray-300 rounded-md overflow-hidden">
                    <div class="max-h-[300px] overflow-y-auto">
                        <table class="w-full border-collapse">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-3 text-left text-sm font-semibold text-gray-600 w-1/5">Pengguna</th>
                                    <th class="p-3 text-left text-sm font-semibold text-gray-600 w-3/5">Komentar</th>
                                    <th class="p-3 text-left text-sm font-semibold text-gray-600 w-1/5">Tanggal</th>
                                    <th class="p-3 text-left text-sm font-semibold text-gray-600 w-10">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="comment-list" class="divide-y divide-gray-200">
                                @foreach ($blog->comments->where('parent_comment_id', null) as $comment)
                                    <tr class="hover:bg-gray-50">
                                        <td class="p-3 text-sm text-gray-900">{{ $comment->user->name ?? 'Pengguna Anonim' }}</td>
                                        <td class="p-3 text-sm text-gray-600">{{ $comment->comment }}</td>
                                        <td class="p-3 text-sm text-gray-600">{{ \Carbon\Carbon::parse($comment->created_at)->translatedFormat('d M Y, H:i') }}</td>
                                        <td class="p-3">
                                            <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus komentar ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-sm" aria-label="Hapus Komentar">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @foreach ($blog->comments->where('parent_comment_id', $comment->id) as $reply)
                                        <tr class="hover:bg-gray-50">
                                            <td class="p-3 text-sm text-gray-900 pl-8">↳ {{ $reply->user->name ?? 'Pengguna Anonim' }}</td>
                                            <td class="p-3 text-sm text-gray-600">{{ $reply->comment }}</td>
                                            <td class="p-3 text-sm text-gray-600">{{ \Carbon\Carbon::parse($reply->created_at)->translatedFormat('d M Y, H:i') }}</td>
                                            <td class="p-3">
                                                <form action="{{ route('admin.comments.destroy', $reply->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus komentar ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-sm" aria-label="Hapus Komentar">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Delete Modal -->
            <div class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" id="deleteModal">
                <div class="bg-white rounded-lg p-6 w-full max-w-md">
                    <div class="flex justify-between items-center mb-4 border-b border-gray-200 pb-3">
                        <h3 class="text-lg font-semibold text-gray-900">Hapus Artikel</h3>
                        <button class="text-xl text-gray-600 hover:text-gray-900" onclick="closeDeleteModal()" aria-label="Tutup modal">&times;</button>
                    </div>
                    <div class="mb-4 text-sm text-gray-600">
                        <p class="mb-2">Yakin ingin menghapus artikel <strong id="deleteArticleName">{{ $blog->title }}</strong>?</p>
                        <p>Tindakan ini tidak dapat dibatalkan.</p>
                    </div>
                    <div class="flex justify-end gap-3">
                        <button class="bg-gray-200 hover:bg-gray-300 text-gray-900 text-sm font-medium px-4 py-2 rounded-md" onclick="closeDeleteModal()">Batal</button>
                        <form action="{{ route('admin.blog.destroy', $blog->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white text-sm font-medium px-4 py-2 rounded-md">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>

            @push('styles')
            <style>
                body {
                    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
                }
                .prose h2 {
                    font-size: 1.25rem;
                    font-weight: 600;
                    color: #111827;
                    margin-top: 1.5rem;
                    margin-bottom: 0.75rem;
                    padding-bottom: 0.5rem;
                    border-bottom: 2px solid #FACC15;
                }
                .prose h3 {
                    font-size: 1.125rem;
                    font-weight: 600;
                    color: #111827;
                    margin-top: 1.25rem;
                    margin-bottom: 0.5rem;
                }
                .prose p {
                    color: #374151;
                    margin-bottom: 1rem;
                    line-height: 1.7;
                }
                .prose blockquote {
                    border-left: 4px solid #FACC15;
                    padding: 1rem 1.5rem;
                    background-color: #FFFBEB;
                    color: #6b7280;
                    font-style: italic;
                    margin: 1.5rem 0;
                    border-radius: 0.375rem;
                }
                .prose pre {
                    background-color: #1F2937;
                    color: #E5E7EB;
                    padding: 1rem;
                    border-radius: 0.375rem;
                    margin-bottom: 1.5rem;
                    overflow-x: auto;
                    font-size: 0.875rem;
                }
                .prose code {
                    background-color: #F3F4F6;
                    color: #111827;
                    padding: 0.2rem 0.4rem;
                    border-radius: 0.25rem;
                    font-size: 0.875rem;
                }
                .prose pre code {
                    background-color: transparent;
                    color: inherit;
                    padding: 0;
                }
                .prose img {
                    max-width: 100%;
                    border-radius: 0.5rem;
                    margin: 1.5rem 0;
                    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
                }
                .max-h-\[300px\]::-webkit-scrollbar {
                    width: 6px;
                }
                .max-h-\[300px\]::-webkit-scrollbar-track {
                    background: #f3f4f6;
                    border-radius: 3px;
                }
                .max-h-\[300px\]::-webkit-scrollbar-thumb {
                    background: #6b7280;
                    border-radius: 3px;
                }
                .max-h-\[300px\]::-webkit-scrollbar-thumb:hover {
                    background: #4b5563;
                }
                .article-info-grid {
                    display: grid;
                    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                    gap: 1rem;
                    background-color: #FFFBEB;
                    padding: 1.5rem;
                    border-radius: 0.5rem;
                    border-left: 4px solid #FACC15;
                }
                .article-info-item {
                    display: flex;
                    flex-direction: column;
                }
                .article-info-label {
                    font-size: 0.75rem;
                    font-weight: 600;
                    color: #92400E;
                    margin-bottom: 0.25rem;
                    text-transform: uppercase;
                    letter-spacing: 0.05em;
                }
                .article-info-value {
                    font-size: 0.875rem;
                    font-weight: 500;
                    color: #111827;
                }
                .status-badge {
                    display: inline-flex;
                    align-items: center;
                    padding: 0.25rem 0.75rem;
                    border-radius: 9999px;
                    font-size: 0.75rem;
                    font-weight: 600;
                }
                .status-published {
                    background-color: #FEF3C7;
                    color: #92400E;
                }
                .status-draft {
                    background-color: #F3F4F6;
                    color: #374151;
                }
                .status-archived {
                    background-color: #E5E7EB;
                    color: #6B7280;
                }
                .tox-tinymce {
                    border: 1px solid #d1d5db !important;
                    border-radius: 0.375rem;
                }
                .tox .tox-toolbar__primary {
                    background: #f9fafb;
                    border-bottom: 1px solid #e5e7eb;
                }
                .tox .tox-edit-area__iframe {
                    background-color: white;
                }
                .tox .tox-statusbar {
                    border-top: 1px solid #e5e7eb;
                }
            </style>
            @endpush

            @push('scripts')
            <script src="https://cdn.tiny.cloud/1/vcya58nqfw4vp8bbe79scjwpyqp4vlnlbzodc3utt7zjubiz/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
            <script>
                let editor;

                const initEditor = () => {
                    return tinymce.init({
                        selector: '#edit-body',
                        plugins: 'advlist autolink lists link image charmap preview anchor pagebreak searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media table emoticons',
                        toolbar: 'undo redo | styles | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | code emoticons | preview',
                        height: 400,
                        menubar: false,
                        statusbar: true,
                        branding: false,
                        automatic_uploads: true,
                        images_upload_url: '/upload/image',
                        file_picker_types: 'image',
                        content_style: `
                            body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size: 14px; line-height: 1.6; color: #374151; }
                            h2 { font-size: 1.25rem; font-weight: 600; color: #111827; margin-top: 1.5rem; margin-bottom: 0.75rem; padding-bottom: 0.5rem; border-bottom: 2px solid #FACC15; }
                            h3 { font-size: 1.125rem; font-weight: 600; color: #111827; margin-top: 1.25rem; margin-bottom: 0.5rem; }
                            blockquote { border-left: 4px solid #FACC15; padding: 1rem 1.5rem; background-color: #FFFBEB; color: #6b7280; font-style: italic; margin: 1.5rem 0; border-radius: 0.375rem; }
                            pre { background-color: #1F2937; color: #E5E7EB; padding: 1rem; border-radius: 0.375rem; margin-bottom: 1.5rem; overflow-x: auto; font-size: 0.875rem; }
                            code { background-color: #F3F4F6; color: #111827; padding: 0.2rem 0.4rem; border-radius: 0.25rem; font-size: 0.875rem; }
                            img { max-width: 100%; border-radius: 0.5rem; margin: 1.5rem 0; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); }
                        `,
                        setup: function (ed) {
                            editor = ed;
                        }
                    });
                };

                document.getElementById('edit-btn').addEventListener('click', async () => {
                    document.getElementById('view-mode').classList.add('hidden');
                    document.getElementById('edit-mode').classList.remove('hidden');
                    if (!editor) {
                        await initEditor();
                    }
                    editor.setContent('{!! addslashes($blog->content) !!}');
                });

                document.getElementById('cancel-btn').addEventListener('click', () => {
                    document.getElementById('edit-mode').classList.add('hidden');
                    document.getElementById('view-mode').classList.remove('hidden');
                    if (editor) {
                        editor.remove();
                        editor = null;
                    }
                });

                function showDeleteModal() {
                    document.getElementById('deleteModal').classList.remove('hidden');
                }

                function closeDeleteModal() {
                    document.getElementById('deleteModal').classList.add('hidden');
                }
            </script>
            @endpush
        </div>
    </div>
</x-admin-layout>