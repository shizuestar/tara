<x-admin-layout>
    @push('styles')
        <style>
            :root {
                --primary-bg: #ffffff;
                --secondary-bg: #f8f8f8;
                --text-color: #1a1a1a;
                --accent-color: #FFD700;
                --border-color: #e0e0e0;
                --hover-color: #f5f5f5;
                --shadow-sm: 0 2px 6px rgba(0, 0, 0, 0.05);
                --shadow-md: 0 4px 12px rgba(0, 0, 0, 0.08);
            }

            .container {
                max-width: 1440px;
                margin: 0 auto;
                padding: 0 16px;
            }

            .cover-container {
                width: 100%;
                max-height: 360px;
                overflow: hidden;
                position: relative;
                border-bottom: 1px solid var(--border-color);
                margin-bottom: 40px;
            }

            .community-cover {
                width: 100%;
                height: 360px;
                object-fit: cover;
                display: block;
                filter: brightness(0.95);
            }

            .cover-overlay {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: linear-gradient(to bottom, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.3));
            }

            .community-avatar {
                width: 100px;
                height: 100px;
                object-fit: cover;
                border: 4px solid var(--primary-bg);
                border-radius: 9999px;
                box-shadow: var(--shadow-sm);
                position: absolute;
                bottom: -50px;
                left: 32px;
                z-index: 10;
                transition: transform 0.3s ease;
            }

            .community-avatar:hover {
                transform: scale(1.05);
            }

            .content-wrapper {
                display: flex;
                gap: 24px;
                flex-wrap: wrap;
                align-items: start;
            }

            .main-content {
                flex: 1;
                min-width: 0;
                max-width: 960px;
            }

            .rightbar {
                width: 100%;
                max-width: 340px;
                padding: 20px;
                background: var(--primary-bg);
                border-radius: 12px;
                box-shadow: var(--shadow-sm);
            }

            .table-container {
                overflow-x: auto;
                margin-top: 20px;
                border-radius: 8px;
                border: 1px solid var(--border-color);
            }

            table {
                width: 100%;
                border-collapse: collapse;
                background: var(--primary-bg);
            }

            th, td {
                padding: 14px 16px;
                text-align: left;
                border-bottom: 1px solid var(--border-color);
                font-size: 14px;
            }

            th {
                font-weight: 600;
                color: #4B5563;
                background: var(--secondary-bg);
                text-transform: uppercase;
                letter-spacing: 0.05em;
                font-size: 13px;
            }

            td {
                color: #1F2937;
            }

            tr {
                transition: background 0.2s ease;
            }

            tr:hover {
                background: var(--hover-color);
            }

            .detail-info p {
                margin-bottom: 10px;
                font-size: 15px;
                line-height: 1.6;
                color: #374151;
            }

            .detail-info strong {
                color: #111827;
                font-weight: 600;
            }

            .rules-list {
                list-style-type: disc;
                list-style-position: inside;
                margin-top: 12px;
                padding-left: 16px;
            }

            .rules-list li {
                margin-bottom: 8px;
                font-size: 14px;
                color: #374151;
            }

            .section-header {
                display: flex;
                align-items: center;
                gap: 8px;
                margin-bottom: 20px;
                font-size: 18px;
                font-weight: 600;
                color: #111827;
                font-family: 'Space Grotesk', sans-serif;
            }

            .content-section {
                margin-bottom: 24px;
                padding: 20px;
                background: var(--primary-bg);
                border-radius: 12px;
                box-shadow: var(--shadow-sm);
                transition: box-shadow 0.3s ease;
            }

            .content-section:hover {
                box-shadow: var(--shadow-md);
            }

            .status-badge {
                padding: 4px 12px;
                border-radius: 9999px;
                font-size: 13px;
                font-weight: 500;
                display: inline-flex;
                align-items: center;
            }

            .rightbar-section {
                margin-bottom: 20px;
            }

            .rightbar-section:last-child {
                margin-bottom: 0;
            }

            .action-button {
                display: flex;
                align-items: center;
                gap: 8px;
                padding: 8px 16px;
                border-radius: 8px;
                font-size: 14px;
                font-weight: 500;
                transition: background 0.2s ease, transform 0.2s ease;
                width: 100%;
                text-align: left;
            }

            .action-button:hover {
                transform: translateY(-1px);
            }

            .modal-open {
                animation: fadeIn 0.3s ease;
            }

            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(10px); }
                to { opacity: 1; transform: translateY(0); }
            }

            .moderator-tag, .rule-tag {
                background-color: #e0f2fe;
                color: #0369a1;
                padding: 4px 8px;
                border-radius: 9999px;
                display: inline-flex;
                align-items: center;
                gap: 4px;
            }

            .moderator-tag button, .rule-tag button {
                color: #0369a1;
                font-weight: bold;
            }

            @media (max-width: 1024px) {
                .content-wrapper {
                    flex-direction: column;
                }

                .main-content {
                    max-width: 100%;
                }

                .rightbar {
                    max-width: 100%;
                }
            }

            @media (max-width: 768px) {
                .cover-container {
                    max-height: 240px;
                }

                .community-cover {
                    height: 240px;
                }

                .community-avatar {
                    width: 80px;
                    height: 80px;
                    bottom: -40px;
                    left: 16px;
                }

                .content-section, .rightbar {
                    padding: 16px;
                }

                th, td {
                    padding: 12px;
                    font-size: 13px;
                }

                .detail-info p {
                    font-size: 14px;
                }

                .section-header {
                    font-size: 16px;
                }
            }
        </style>
    @endpush

    <!-- Cover Image -->
    <div class="cover-container">
        <img src="{{ $community->cover_image ? asset('storage/' . $community->cover_image) : 'https://picsum.photos/id/' . ($community->id + 99) . '/1920/360' }}" alt="Cover {{ $community->name }}" class="community-cover">
        <div class="cover-overlay"></div>
        <img src="{{ $community->avatar ? asset('storage/' . $community->avatar) : 'https://picsum.photos/id/' . ($community->id + 100) . '/100/100' }}" alt="Avatar {{ $community->name }}" class="community-avatar">
    </div>

    <!-- Content Wrapper -->
    <div class="container">
        <div class="content-wrapper">
            <!-- Main Content -->
            <div class="main-content">
                <!-- Display Session Messages -->
                @if (session('success'))
                    <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-lg flex items-center gap-3">
                        <i class="fas fa-check-circle text-lg"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif
                @if (session('error') || $errors->has('error'))
                    <div class="mb-6 p-4 bg-red-100 text-red-700 rounded-lg flex items-center gap-3">
                        <i class="fas fa-exclamation-circle text-lg"></i>
                        <span>{{ session('error') ?? $errors->first('error') }}</span>
                    </div>
                @endif

                <!-- Community Header -->
                <div class="mb-6">
                    <h1 class="text-2xl font-semibold flex items-center gap-3 text-gray-900 font-['Space_Grotesk']">
                        <i class="fas fa-users text-yellow-400 text-xl"></i>
                        {{ $community->name }}
                    </h1>
                </div>

                <!-- Community Details -->
                <div class="content-section">
                    <h3 class="section-header">
                        <i class="fas fa-info-circle text-yellow-400"></i>
                        Informasi Komunitas
                    </h3>
                    <div class="detail-info grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <p><strong>Nama:</strong> {{ $community->name }}</p>
                            <p><strong>Deskripsi:</strong> {{ $community->description ?? 'Tidak ada deskripsi' }}</p>
                            <p><strong>Kategori:</strong> {{ $community->category->name ?? 'Tidak ada kategori' }}</p>
                            <p><strong>Pembuat:</strong> {{ $community->creator->name ?? 'Tidak ada pembuat' }}</p>
                        </div>
                        <div>
                            <p><strong>Tipe:</strong> {{ $community->type === 'public' ? 'Publik' : 'Privat' }}</p>
                            <p><strong>Status:</strong> <span class="status-badge {{ $community->status === 'active' ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }}">{{ $community->status === 'active' ? 'Aktif' : 'Tidak Aktif' }}</span></p>
                            <p><strong>Jumlah Anggota:</strong> {{ $community->getMemberCountAttribute() }}</p>
                            @if ($community->rules)
                                <p><strong>Peraturan Komunitas:</strong>
                                    <ul class="rules-list">
                                        @foreach (explode("\n", $community->rules) as $rule)
                                            <li>{{ $rule }}</li>
                                        @endforeach
                                    </ul>
                                </p>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Administrators List -->
                <div class="content-section">
                    <h3 class="section-header">
                        <i class="fas fa-user-shield text-yellow-400"></i>
                        Administrator
                    </h3>
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Bergabung</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($community->admins as $admin)
                                    <tr>
                                        <td>{{ $admin->name }}</td>
                                        <td>{{ $admin->pivot->joined_at ? \Carbon\Carbon::parse($admin->pivot->joined_at)->format('d M Y H:i') : 'N/A' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="text-center text-gray-600">Tidak ada administrator.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Members List -->
                <div class="content-section">
                    <h3 class="section-header">
                        <i class="fas fa-users text-yellow-400"></i>
                        Anggota
                    </h3>
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Role</th>
                                    <th>Bergabung</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($community->members as $member)
                                    <tr>
                                        <td>{{ $member->name }}</td>
                                        <td>{{ ucfirst($member->pivot->role) }}</td>
                                        <td>{{ $member->pivot->joined_at ? \Carbon\Carbon::parse($member->pivot->joined_at)->format('d M Y H:i') : 'N/A' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center text-gray-600">Tidak ada anggota.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Posts List -->
                <div class="content-section">
                    <h3 class="section-header">
                        <i class="fas fa-file-alt text-yellow-400"></i>
                        Postingan
                    </h3>
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Pembuat</th>
                                    <th>Dibuat Pada</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($community->posts as $post)
                                    <tr>
                                        <td>{{ $post->title ?? 'Tanpa Judul' }}</td>
                                        <td>{{ $post->user->name ?? 'Tidak diketahui' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($post->created_at)->format('d M Y H:i') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center text-gray-600">Tidak ada postingan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Rightbar -->
            <div class="rightbar">
                <!-- Community Quick Stats -->
                <div class="rightbar-section">
                    <h3 class="section-header">
                        <i class="fas fa-info text-yellow-400"></i>
                        Ringkasan
                    </h3>
                    <div class="detail-info">
                        <p><strong>Status:</strong> <span class="status-badge {{ $community->status === 'active' ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }}">{{ $community->status === 'active' ? 'Aktif' : 'Tidak Aktif' }}</span></p>
                        <p><strong>Jumlah Anggota:</strong> {{ $community->getMemberCountAttribute() }}</p>
                        <p><strong>Jumlah Postingan:</strong> {{ $community->posts->count() }}</p>
                        <p><strong>Dibuat Pada:</strong> {{ \Carbon\Carbon::parse($community->created_at)->format('d M Y') }}</p>
                    </div>
                </div>

                <!-- Actions -->
                <div class="rightbar-section">
                    <h3 class="section-header">
                        <i class="fas fa-cog text-yellow-400"></i>
                        Aksi
                    </h3>
                    <div class="flex flex-col gap-2">
                        <a href="{{ route('admin.communities.index') }}" class="action-button bg-yellow-400 hover:bg-yellow-500 text-gray-900">
                            <i class="fas fa-arrow-left text-sm"></i>
                            Kembali
                        </a>
                        <button onclick="showEditModal({{ $community->id }})" class="action-button bg-blue-100 hover:bg-blue-200 text-blue-600">
                            <i class="fas fa-edit text-sm"></i>
                            Edit
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" id="editModal">
        <div class="bg-white rounded-lg p-6 w-full max-w-3xl mx-4 overflow-y-auto max-h-[90vh]">
            <div class="flex justify-between items-center mb-4 border-b border-gray-200 pb-3">
                <h3 class="text-lg font-semibold text-gray-900 font-['Space_Grotesk']">Edit Komunitas</h3>
                <button class="text-xl text-gray-800 hover:text-gray-900" onclick="closeEditModal()" aria-label="Tutup modal">&times;</button>
            </div>
            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg flex items-center gap-2">
                    <i class="fas fa-exclamation-circle"></i>
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form id="editCommunityForm" action="" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" id="edit_id" name="id">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="mb-4 col-span-2">
                        <label for="edit_cover_image" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Gambar Image</label>
                        <div class="w-full h-32 p-4 border-2 border-dashed border-gray-200 rounded-lg text-center cursor-pointer hover:border-yellow-400" ondragover="allowDrop(event)" ondrop="handleDrop(event, 'edit', 'cover_image')" onclick="document.getElementById('edit_cover_image').click()">
                            <input type="file" id="edit_cover_image" name="cover_image" accept="image/*" class="hidden" onchange="previewImage(this, 'edit_cover_image_preview')">
                            <p class="text-sm text-gray-600">Seret dan lepas gambar atau klik untuk memilih</p>
                        </div>
                        <img id="edit_cover_image_preview" class="mt-2 w-full h-48 object-cover rounded-lg hidden" alt="Preview cover_image">
                        @error('cover_image')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4 col-span-2">
                        <label for="edit_avatar" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Gambar Avatar</label>
                        <div class="w-full h-32 p-4 border-2 border-dashed border-gray-200 rounded-lg text-center cursor-pointer hover:border-yellow-400" ondragover="allowDrop(event)" ondrop="handleDrop(event, 'edit', 'avatar')" onclick="document.getElementById('edit_avatar').click()">
                            <input type="file" id="edit_avatar" name="avatar" accept="image/*" class="hidden" onchange="previewImage(this, 'edit_avatar_preview')">
                            <p class="text-sm text-gray-600">Seret dan lepas gambar atau klik untuk memilih</p>
                        </div>
                        <img id="edit_avatar_preview" class="mt-2 w-full h-48 object-cover rounded-lg hidden" alt="Preview Avatar">
                        @error('avatar')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="edit_name" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Nama Komunitas</label>
                        <input type="text" id="edit_name" name="name" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required>
                        @error('name')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="edit_category_id" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Kategori</label>
                        <select id="edit_category_id" name="category_id" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required>
                            <option value="">Pilih Kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4 col-span-2">
                        <label for="edit_description" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Deskripsi</label>
                        <textarea id="edit_description" name="description" rows="3" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required></textarea>
                        @error('description')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="edit_type" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Tipe Komunitas</label>
                        <select id="edit_type" name="type" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required>
                            <option value="public">Publik</option>
                            <option value="private">Privat</option>
                        </select>
                        @error('type')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="edit_status" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Status</label>
                        <select id="edit_status" name="status" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required>
                            <option value="active">Aktif</option>
                            <option value="inactive">Tidak Aktif</option>
                        </select>
                        @error('status')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="edit_creator_id" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Pembuat</label>
                        <select id="edit_creator_id" name="creator_id" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required>
                            <option value="">Pilih Pembuat</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        @error('creator_id')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4 col-span-2">
                        <label class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Moderator</label>
                        <div id="edit_moderator_inputs_container">
                            <div class="flex gap-2 mb-2 moderator-input-group">
                                <div class="relative flex-grow">
                                    <input type="text" class="moderator_search w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Cari nama moderator..." onkeyup="searchMembers('edit', this.value, this, document.getElementById('edit_id').value)" autocomplete="off">
                                    <div class="moderator_suggestions hidden absolute bg-white border border-gray-200 rounded-lg shadow-md w-full max-h-40 overflow-y-auto z-10"></div>
                                </div>
                                <button type="button" onclick="addModeratorInput('edit')" class="bg-blue-400 hover:bg-blue-500 text-white text-sm font-medium px-3 py-2 rounded-lg flex items-center gap-2 transition-colors"><i class="fas fa-plus"></i> Tambah</button>
                            </div>
                        </div>
                        <div id="edit_moderators" class="flex flex-wrap gap-2 mt-2"></div>
                        <input type="hidden" id="edit_moderator_ids" name="moderator_ids">
                        @error('moderator_ids')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
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
                        @error('rules')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-end gap-3 mt-6">
                    <button type="button" class="bg-gray-50 hover:bg-gray-100 text-gray-900 text-sm font-medium px-4 py-2 rounded-lg transition-colors" onclick="closeEditModal()">Batal</button>
                    <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-2 rounded-lg transition-colors">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
        <script>
            function showEditModal(communityId) {
                fetch(`/admin/komunitas/${communityId}/edit`)
                    .then(response => {
                        if (!response.ok) {
                            if (response.status === 404) {
                                throw new Error('Komunitas tidak ditemukan. Mungkin telah dihapus atau ID tidak valid.');
                            } else if (response.status === 500) {
                                return response.json().then(data => {
                                    throw new Error(data.error || 'Terjadi kesalahan server saat memuat data komunitas.');
                                });
                            } else {
                                throw new Error('Gagal memuat data komunitas. Status: ' + response.status);
                            }
                        }
                        return response.json();
                    })
                    .then(community => {
                        // Populate form fields
                        document.getElementById('edit_id').value = community.id;
                        document.getElementById('edit_name').value = community.name;
                        document.getElementById('edit_description').value = community.description || '';
                        document.getElementById('edit_type').value = community.type;
                        document.getElementById('edit_status').value = community.status;
                        document.getElementById('edit_category_id').value = community.category_id || '';
                        document.getElementById('edit_creator_id').value = community.creator_id || '';

                        // Populate cover image preview
                        const coverPreview = document.getElementById('edit_cover_image_preview');
                        if (community.cover_image) {
                            coverPreview.src = community.cover_image;
                            coverPreview.classList.remove('hidden');
                        } else {
                            coverPreview.classList.add('hidden');
                        }

                        // Populate avatar preview
                        const avatarPreview = document.getElementById('edit_avatar_preview');
                        if (community.avatar) {
                            avatarPreview.src = community.avatar;
                            avatarPreview.classList.remove('hidden');
                        } else {
                            avatarPreview.classList.add('hidden');
                        }

                        // Populate moderators
                        const moderatorsContainer = document.getElementById('edit_moderators');
                        moderatorsContainer.innerHTML = '';
                        if (community.moderator_ids && community.moderator_ids.length > 0) {
                            community.moderator_ids.forEach(id => {
                                fetch(`/admin/users/${id}`)
                                    .then(response => {
                                        if (!response.ok) {
                                            if (response.status === 404) {
                                                console.warn(`Pengguna dengan ID ${id} tidak ditemukan.`);
                                                return { id, name: `Pengguna ID ${id} (Tidak Ditemukan)` };
                                            }
                                            throw new Error('Gagal memuat data pengguna.');
                                        }
                                        return response.json();
                                    })
                                    .then(user => {
                                        addModeratorTag(user.id, 'edit', user.name);
                                    })
                                    .catch(error => {
                                        console.error('Error fetching user data:', error);
                                        alert(`Gagal memuat data moderator: ${error.message}`);
                                    });
                            });
                        }

                        // Populate rules
                        const rulesContainer = document.getElementById('edit_rules_container');
                        rulesContainer.innerHTML = `
                            <div class="flex gap-2 mb-2">
                                <input type="text" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Masukkan peraturan" onkeydown="if(event.key === 'Enter') addRule('edit')">
                                <button type="button" onclick="addRule('edit')" class="bg-blue-400 hover:bg-blue-500 text-white text-sm font-medium px-3 py-2 rounded-lg flex items-center gap-2 transition-colors"><i class="fas fa-plus"></i> Tambah</button>
                            </div>
                        `;
                        if (community.rules && community.rules.length > 0) {
                            community.rules.forEach(rule => addRuleTag(rule, 'edit'));
                        }

                        // Set form action
                        document.getElementById('editCommunityForm').action = `/admin/komunitas/${community.id}`;

                        // Show modal
                        const modal = document.getElementById('editModal');
                        modal.classList.remove('hidden');
                        modal.classList.add('modal-open');
                    })
                    .catch(error => {
                        console.error('Error fetching community data:', error);
                        let errorMessage = 'Gagal memuat data komunitas. ';
                        if (error.message.includes('Komunitas tidak ditemukan')) {
                            errorMessage = error.message;
                        } else if (error.message.includes('Terjadi kesalahan server')) {
                            errorMessage = error.message;
                        } else if (error.message.includes('NetworkError') || error.message.includes('Failed to fetch')) {
                            errorMessage = 'Gagal terhubung ke server. Periksa koneksi internet Anda.';
                        } else {
                            errorMessage += 'Silakan coba lagi atau hubungi administrator.';
                        }
                        alert(errorMessage);
                    });
            }

            function closeEditModal() {
                const modal = document.getElementById('editModal');
                modal.classList.add('hidden');
                modal.classList.remove('modal-open');
            }

            function allowDrop(event) {
                event.preventDefault();
                event.target.classList.add('border-yellow-400');
            }

            function handleDrop(event, mode, field) {
                event.preventDefault();
                event.target.classList.remove('border-yellow-400');
                const file = event.dataTransfer.files[0];
                if (file && file.type.startsWith('image/')) {
                    const input = document.getElementById(mode + '_' + field);
                    input.files = event.dataTransfer.files;
                    previewImage(input, mode + '_' + field + '_preview');
                }
            }

            function previewImage(input, previewId) {
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

            function addModeratorInput(mode = 'edit') {
                const containerId = 'edit_moderator_inputs_container';
                const container = document.getElementById(containerId);
                const newInputGroup = document.createElement('div');
                newInputGroup.className = 'flex gap-2 mb-2 moderator-input-group';
                newInputGroup.innerHTML = `
                    <div class="relative flex-grow">
                        <input type="text" class="moderator_search w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Cari nama moderator..." onkeyup="searchMembers('${mode}', this.value, this, document.getElementById('edit_id').value)" autocomplete="off">
                        <div class="moderator_suggestions hidden absolute bg-white border border-gray-200 rounded-lg shadow-md w-full max-h-40 overflow-y-auto z-10"></div>
                    </div>
                    <button type="button" onclick="addModeratorInput('${mode}')" class="bg-blue-400 hover:bg-blue-500 text-white text-sm font-medium px-3 py-2 rounded-lg flex items-center gap-2 transition-colors"><i class="fas fa-plus"></i> Tambah</button>
                `;
                container.appendChild(newInputGroup);
            }

            function addModeratorTag(id, mode, name) {
                const containerId = 'edit_moderators';
                const container = document.getElementById(containerId);
                const existingIds = Array.from(container.children).map(tag => tag.dataset.id);
                if (existingIds.includes(id.toString())) return;
                const tag = document.createElement('span');
                tag.className = 'moderator-tag text-xs';
                tag.dataset.id = id;
                tag.innerHTML = `${name} (ID: ${id}) <button type="button" onclick="this.parentElement.remove(); updateModeratorIds('${mode}')">&times;</button>`;
                container.appendChild(tag);
                updateModeratorIds(mode);
            }

            function updateModeratorIds(mode) {
                const containerId = 'edit_moderators';
                const hiddenId = 'edit_moderator_ids';
                const container = document.getElementById(containerId);
                const ids = Array.from(container.children).map(tag => tag.dataset.id);
                document.getElementById(hiddenId).value = ids.join(',');
            }

            function addRule(mode) {
                const containerId = 'edit_rules_container';
                const container = document.getElementById(containerId);
                const input = container.querySelector('input');
                const rule = input.value.trim();
                if (rule) {
                    addRuleTag(rule, mode);
                    input.value = '';
                }
            }

            function addRuleTag(rule, mode) {
                const containerId = 'edit_rules_container';
                const container = document.getElementById(containerId);
                const tag = document.createElement('div');
                tag.className = 'rule-tag text-xs mb-2';
                tag.innerHTML = `${rule} <button type="button" onclick="this.parentElement.remove(); updateRules('${mode}')">&times;</button>`;
                container.insertBefore(tag, container.lastChild);
                updateRules(mode);
            }

            function updateRules(mode) {
                const containerId = 'edit_rules_container';
                const hiddenId = 'edit_rules';
                const container = document.getElementById(containerId);
                const rules = Array.from(container.querySelectorAll('.rule-tag')).map(tag => tag.textContent.replace(/\s*\×$/, '').trim());
                document.getElementById(hiddenId).value = rules.join('\n');
            }

            function searchMembers(mode, query, inputElement, communityId = null) {
                if (query.length < 2) {
                    inputElement.nextElementSibling.classList.add('hidden');
                    return;
                }
                let url = `/admin/users/search?query=${encodeURIComponent(query)}`;
                if (communityId) url += `&community_id=${communityId}`;
                fetch(url)
                    .then(response => response.json())
                    .then(users => {
                        const suggestions = inputElement.nextElementSibling;
                        suggestions.innerHTML = '';
                        users.forEach(user => {
                            const item = document.createElement('div');
                            item.className = 'suggestion-item text-sm';
                            item.textContent = user.name;
                            item.onclick = () => selectModerator(mode, user.id, user.name, inputElement);
                            suggestions.appendChild(item);
                        });
                        suggestions.classList.toggle('hidden', users.length === 0);
                    });
            }

            function selectModerator(mode, id, name, inputElement) {
                addModeratorTag(id, mode, name);
                inputElement.value = '';
                inputElement.nextElementSibling.classList.add('hidden');
            }

            window.onclick = function(event) {
                const editModal = document.getElementById('editModal');
                if (event.target === editModal) {
                    closeEditModal();
                }
                document.querySelectorAll('.moderator_suggestions').forEach(suggestions => {
                    if (!event.target.closest('.moderator_search') && !event.target.closest('.moderator_suggestions')) {
                        suggestions.classList.add('hidden');
                    }
                });
            };

            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    closeEditModal();
                    document.querySelectorAll('.moderator_suggestions').forEach(suggestions => {
                        suggestions.classList.add('hidden');
                    });
                }
            });
        </script>
    @endpush
</x-admin-layout>