<x-admin-layout>
    <div class="bg-white rounded-xl shadow-sm p-4">
        <!-- Display Session Messages -->
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg flex items-center gap-2">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif
        @if (session('error') || $errors->has('error'))
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg flex items-center gap-2">
                <i class="fas fa-exclamation-circle"></i>
                {{ session('error') ?? $errors->first('error') }}
            </div>
        @endif

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

        <!-- Chart Section -->
        <div class="bg-white rounded-lg p-4 mb-6 border border-gray-200">
            <h3 class="text-base font-semibold flex items-center gap-2 mb-3 text-gray-900 font-['Space_Grotesk']">
                <i class="fas fa-chart-bar text-yellow-400 text-sm"></i>
                Distribusi Komunitas berdasarkan Jumlah Anggota
            </h3>
            <div id="chartCanvas" class="w-full h-64"></div>
        </div>

        <div class="bg-white rounded-lg p-4 mb-6 border border-gray-200">
            <h3 class="text-base font-semibold flex items-center gap-2 mb-3 text-gray-900 font-['Space_Grotesk']">
                <i class="fas fa-filter text-yellow-400 text-sm"></i>
                Filter Komunitas
            </h3>
            <form id="filterForm" action="{{ route('admin.communities.index') }}" method="GET">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                    <div>
                        <label for="type-filter" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Tipe</label>
                        <select id="type-filter" name="type" class="w-full p-2 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']">
                            <option value="">Semua Tipe</option>
                            <option value="public" {{ request('type') === 'public' ? 'selected' : '' }}>Publik</option>
                            <option value="private" {{ request('type') === 'private' ? 'selected' : '' }}>Privat</option>
                        </select>
                    </div>
                    <div>
                        <label for="member-filter" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Jumlah Anggota</label>
                        <select id="member-filter" name="member_count" class="w-full p-2 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']">
                            <option value="">Semua</option>
                            <option value="0-50" {{ request('member_count') === '0-50' ? 'selected' : '' }}>0-50</option>
                            <option value="51-100" {{ request('member_count') === '51-100' ? 'selected' : '' }}>51-100</option>
                            <option value="101+" {{ request('member_count') === '101+' ? 'selected' : '' }}>101+</option>
                        </select>
                    </div>
                    <div>
                        <label for="status-filter" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Status</label>
                        <select id="status-filter" name="status" class="w-full p-2 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']">
                            <option value="">Semua Status</option>
                            <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Aktif</option>
                            <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                    </div>
                    <div>
                        <label for="keyword-filter" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Kata Kunci</label>
                        <input id="keyword-filter" type="text" name="keyword" value="{{ request('keyword') }}" class="w-full p-2 border border-gray-200 rounded-lg text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Cari nama atau deskripsi...">
                    </div>
                </div>
                <div class="flex gap-3 mt-3">
                    <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-3 py-1.5 rounded-lg flex items-center gap-2 transition-colors">
                        <i class="fas fa-filter text-sm"></i>
                        Terapkan
                    </button>
                    <a href="{{ route('admin.communities.index') }}" class="bg-gray-50 hover:bg-gray-100 text-gray-900 text-sm font-medium px-3 py-1.5 rounded-lg flex items-center gap-2 transition-colors">
                        <i class="fas fa-redo text-sm"></i>
                        Reset
                    </a>
                </div>
            </form>
        </div>

        <!-- Grid View -->
        <div class="mb-6">
            <div class="flex justify-between items-center gap-3 mb-4">
                <h2 class="text-base font-semibold text-gray-900 font-['Space_Grotesk']">Daftar Komunitas</h2>
                <div class="text-xs text-gray-800">Menampilkan {{ $communities->count() }} dari {{ $communities->total() }} komunitas</div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($communities as $community)
                    <div class="bg-white rounded-lg border border-gray-200 overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                        <div class="relative">
                            <img src="{{ $community->cover_image ? asset('storage/' . $community->cover_image) : 'https://picsum.photos/id/' . ($community->id + 99) . '/400/120' }}" alt="cover_image {{ $community->name }}" class="w-full community-cover">
                            <img src="{{ $community->avatar ? asset('storage/' . $community->avatar) : 'https://picsum.photos/id/' . ($community->id + 100) . '/100/100' }}" alt="Avatar {{ $community->name }}" class="rounded-full community-avatar relative z-10 ml-4">
                        </div>
                        <div class="p-3">
                            <h3 class="font-semibold text-gray-900 mb-1 text-sm font-['Space_Grotesk']">{{ $community->name }}</h3>
                            <p class="text-xs text-gray-800 mb-2">{{ Str::limit($community->description, 50) }}</p>
                            <div class="flex justify-between items-center mb-2">
                                <div class="flex items-center text-xs text-gray-800">
                                    <i class="fas fa-users mr-1"></i>
                                    <span>{{ $community->member_count }} Anggota</span>
                                </div>
                                <span class="px-2 py-1 rounded-full {{ $community->status === 'active' ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }} text-xs">{{ $community->status === 'active' ? 'Aktif' : 'Tidak Aktif' }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-xs text-gray-800">{{ $community->type === 'public' ? 'Publik' : 'Privat' }}</span>
                                <div class="flex gap-2">
                                    <a href="{{ route('admin.communities.show', $community->id) }}" class="w-8 h-8 rounded-lg bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-xs" aria-label="Lihat {{ $community->name }}"><i class="fas fa-eye"></i></a>
                                    <button onclick="showEditModal({{ $community->id }})" class="w-8 h-8 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-xs" aria-label="Edit {{ $community->name }}"><i class="fas fa-edit"></i></button>
                                    <button onclick="showDeleteModal('{{ $community->name }}', {{ $community->id }})" class="w-8 h-8 rounded-lg bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-xs" aria-label="Hapus {{ $community->name }}"><i class="fas fa-trash"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Pagination -->
        <div class="flex justify-center mt-4 gap-2">
            {{ $communities->appends(request()->query())->links('vendor.pagination.tailwind') }}
        </div>

        <!-- Create Modal -->
        <div class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" id="createModal">
            <div class="bg-white rounded-lg p-6 w-full max-w-3xl mx-4 overflow-y-auto max-h-[90vh]">
                <div class="flex justify-between items-center mb-4 border-b border-gray-200 pb-3">
                    <h3 class="text-lg font-semibold text-gray-900 font-['Space_Grotesk']">Tambah Komunitas Baru</h3>
                    <button class="text-xl text-gray-800 hover:text-gray-900" onclick="closeCreateModal()" aria-label="Tutup modal">&times;</button>
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
                <form id="createCommunityForm" action="{{ route('admin.communities.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4 col-span-2">
                            <label for="cover_image" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Gambar Image</label>
                            <div class="w-full h-32 p-4 border-2 border-dashed border-gray-200 rounded-lg text-center cursor-pointer hover:border-yellow-400" ondragover="allowDrop(event)" ondrop="handleDrop(event, 'create', 'cover_image')" onclick="document.getElementById('cover_image').click()">
                                <input type="file" id="cover_image" name="cover_image" accept="image/*" class="hidden" onchange="previewImage(this, 'create_cover_image_preview')">
                                <p class="text-sm text-gray-600">Seret dan lepas gambar atau klik untuk memilih</p>
                            </div>
                            <img id="create_cover_image_preview" class="mt-2 w-full h-48 object-cover rounded-lg hidden" alt="Preview cover_image">
                            @error('cover_image')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4 col-span-2">
                            <label for="avatar" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Gambar Avatar</label>
                            <div class="w-full h-32 p-4 border-2 border-dashed border-gray-200 rounded-lg text-center cursor-pointer hover:border-yellow-400" ondragover="allowDrop(event)" ondrop="handleDrop(event, 'create', 'avatar')" onclick="document.getElementById('avatar').click()">
                                <input type="file" id="avatar" name="avatar" accept="image/*" class="hidden" onchange="previewImage(this, 'create_avatar_preview')">
                                <p class="text-sm text-gray-600">Seret dan lepas gambar atau klik untuk memilih</p>
                            </div>
                            <img id="create_avatar_preview" class="mt-2 w-full h-48 object-cover rounded-lg hidden" alt="Preview Avatar">
                            @error('avatar')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Nama Komunitas</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required>
                            @error('name')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="category_id" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Kategori</label>
                            <select id="category_id" name="category_id" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') === $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4 col-span-2">
                            <label for="description" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Deskripsi</label>
                            <textarea id="description" name="description" rows="3" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required>{{ old('description') }}</textarea>
                            @error('description')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="type" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Tipe Komunitas</label>
                            <select id="type" name="type" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required>
                                <option value="public" {{ old('type') === 'public' ? 'selected' : '' }}>Publik</option>
                                <option value="private" {{ old('type') === 'private' ? 'selected' : '' }}>Privat</option>
                            </select>
                            @error('type')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Status</label>
                            <select id="status" name="status" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required>
                                <option value="active" {{ old('status') === 'active' ? 'selected' : '' }}>Aktif</option>
                                <option value="inactive" {{ old('status') === 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                            </select>
                            @error('status')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="creator_id" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Pembuat</label>
                            <select id="creator_id" name="creator_id" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required>
                                <option value="">Pilih Pembuat</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ old('creator_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                            @error('creator_id')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4 col-span-2">
                            <label class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Moderator</label>
                            <div id="moderator_inputs_container">
                                <div class="flex gap-2 mb-2 moderator-input-group">
                                    <div class="relative flex-grow">
                                        <input type="text" class="moderator_search w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Cari nama moderator..." onkeyup="searchMembers('create', this.value, this)" autocomplete="off">
                                        <div class="moderator_suggestions hidden absolute bg-white border border-gray-200 rounded-lg shadow-md w-full max-h-40 overflow-y-auto z-10"></div>
                                    </div>
                                    <button type="button" onclick="addModeratorInput()" class="bg-blue-400 hover:bg-blue-500 text-white text-sm font-medium px-3 py-2 rounded-lg flex items-center gap-2 transition-colors"><i class="fas fa-plus"></i> Tambah</button>
                                </div>
                            </div>
                            <div id="create_moderators" class="flex flex-wrap gap-2 mt-2"></div>
                            <input type="hidden" id="moderator_ids" name="moderator_ids">
                            @error('moderator_ids')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4 col-span-2">
                            <label class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Peraturan Komunitas</label>
                            <div id="create_rules_container">
                                <div class="flex gap-2 mb-2">
                                    <input type="text" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Masukkan peraturan" onkeydown="if(event.key === 'Enter') addRule('create')">
                                    <button type="button" onclick="addRule('create')" class="bg-blue-400 hover:bg-blue-500 text-white text-sm font-medium px-3 py-2 rounded-lg flex items-center gap-2 transition-colors"><i class="fas fa-plus"></i> Tambah</button>
                                </div>
                            </div>
                            <input type="hidden" id="rules" name="rules" value="{{ old('rules') }}">
                            @error('rules')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="flex justify-end gap-3 mt-6">
                        <button type="button" class="bg-gray-50 hover:bg-gray-100 text-gray-900 text-sm font-medium px-4 py-2 rounded-lg transition-colors" onclick="closeCreateModal()">Batal</button>
                        <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-2 rounded-lg transition-colors">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

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

        <!-- Delete Modal -->
        <div class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" id="deleteModal">
            <div class="bg-white rounded-lg p-6 w-full max-w-md mx-4">
                <div class="flex justify-between items-center mb-4 border-b border-gray-200 pb-3">
                    <h3 class="text-lg font-semibold text-gray-900 font-['Space_Grotesk']">Konfirmasi Hapus</h3>
                    <button class="text-xl text-gray-800 hover:text-gray-900" onclick="closeDeleteModal()" aria-label="Tutup modal">&times;</button>
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
                <p class="text-sm text-gray-800 mb-6">Apakah Anda yakin ingin menghapus komunitas <span id="deleteCommunityName" class="font-medium"></span>?</p>
                <form id="deleteCommunityForm" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" id="delete_id" name="id">
                    <div class="flex justify-end gap-3">
                        <button type="button" class="bg-gray-50 hover:bg-gray-100 text-gray-900 text-sm font-medium px-4 py-2 rounded-lg transition-colors" onclick="closeDeleteModal()">Batal</button>
                        <button type="submit" class="bg-red-400 hover:bg-red-500 text-white text-sm font-medium px-4 py-2 rounded-lg transition-colors">Hapus</button>
                    </div>
                </form>
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
                display: inline-flex;
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
            // Chart Data
            const chartData = {
                type: 'bar',
                data: {
                    labels: ['0-50', '51-100', '101+'],
                    datasets: [{
                        label: 'Jumlah Komunitas',
                        data: {!! json_encode($communityCounts) !!},
                        backgroundColor: ['#f59e0b', '#d97706', '#b45309'],
                        borderColor: ['#f59e0b', '#d97706', '#b45309'],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Jumlah Komunitas'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Rentang Anggota'
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            labels: {
                                color: '#111827'
                            }
                        }
                    }
                }
            };

            // Render Chart
            const ctx = document.getElementById('chartCanvas').getContext('2d');
            new Chart(ctx, chartData);

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
                document.getElementById('create_cover_image_preview').classList.add('hidden');
                document.getElementById('create_avatar_preview').classList.add('hidden');
                document.getElementById('creator_id').value = '';
                document.getElementById('moderator_inputs_container').innerHTML = `
                    <div class="flex gap-2 mb-2 moderator-input-group">
                        <div class="relative flex-grow">
                            <input type="text" class="moderator_search w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Cari nama moderator..." onkeyup="searchMembers('create', this.value, this)" autocomplete="off">
                            <div class="moderator_suggestions hidden absolute bg-white border border-gray-200 rounded-lg shadow-md w-full max-h-40 overflow-y-auto z-10"></div>
                        </div>
                        <button type="button" onclick="addModeratorInput()" class="bg-blue-400 hover:bg-blue-500 text-white text-sm font-medium px-3 py-2 rounded-lg flex items-center gap-2 transition-colors"><i class="fas fa-plus"></i> Tambah</button>
                    </div>
                `;
            }

            function closeCreateModal() {
                document.getElementById('createModal').classList.add('hidden');
                document.getElementById('createModal').classList.remove('modal-open');
            }

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
                        document.getElementById('edit_description').value = community.description;
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

// Close modal when clicking outside
window.onclick = function(event) {
    const editModal = document.getElementById('editModal');
    if (event.target === editModal) {
        closeEditModal();
    }
};

// Close modal on Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeEditModal();
    }
});

            function closeEditModal() {
                document.getElementById('editModal').classList.add('hidden');
                document.getElementById('editModal').classList.remove('modal-open');
            }

            function showDeleteModal(communityName, communityId) {
                document.getElementById('deleteCommunityName').textContent = communityName;
                document.getElementById('delete_id').value = communityId;
                document.getElementById('deleteCommunityForm').action = `/admin/komunitas/${communityId}`;
                document.getElementById('deleteModal').classList.remove('hidden');
                document.getElementById('deleteModal').classList.add('modal-open');
            }

            function closeDeleteModal() {
                document.getElementById('deleteModal').classList.add('hidden');
                document.getElementById('deleteModal').classList.remove('modal-open');
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

            function addModeratorInput(mode = 'create') {
                const containerId = mode === 'create' ? 'moderator_inputs_container' : 'edit_moderator_inputs_container';
                const container = document.getElementById(containerId);
                const newInputGroup = document.createElement('div');
                newInputGroup.className = 'flex gap-2 mb-2 moderator-input-group';
                newInputGroup.innerHTML = `
                    <div class="relative flex-grow">
                        <input type="text" class="moderator_search w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Cari nama moderator..." onkeyup="searchMembers('${mode}', this.value, this${mode === 'edit' ? ', document.getElementById(\'edit_id\').value' : ''})" autocomplete="off">
                        <div class="moderator_suggestions hidden absolute bg-white border border-gray-200 rounded-lg shadow-md w-full max-h-40 overflow-y-auto z-10"></div>
                    </div>
                    <button type="button" onclick="addModeratorInput('${mode}')" class="bg-blue-400 hover:bg-blue-500 text-white text-sm font-medium px-3 py-2 rounded-lg flex items-center gap-2 transition-colors"><i class="fas fa-plus"></i> Tambah</button>
                `;
                container.appendChild(newInputGroup);
            }

            function addModeratorTag(id, mode, name) {
                const containerId = mode === 'create' ? 'create_moderators' : 'edit_moderators';
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
                const containerId = mode === 'create' ? 'create_moderators' : 'edit_moderators';
                const hiddenId = mode === 'create' ? 'moderator_ids' : 'edit_moderator_ids';
                const container = document.getElementById(containerId);
                const ids = Array.from(container.children).map(tag => tag.dataset.id);
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
                const container = document.getElementById(containerId);
                const tag = document.createElement('div');
                tag.className = 'rule-tag text-xs mb-2';
                tag.innerHTML = `${rule} <button type="button" onclick="this.parentElement.remove(); updateRules('${mode}')">&times;</button>`;
                container.insertBefore(tag, container.lastChild);
                updateRules(mode);
            }

            function updateRules(mode) {
                const containerId = mode === 'create' ? 'create_rules_container' : 'edit_rules_container';
                const hiddenId = mode === 'create' ? 'rules' : 'edit_rules';
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
                const createModal = document.getElementById('createModal');
                const editModal = document.getElementById('editModal');
                const deleteModal = document.getElementById('deleteModal');
                if (event.target === createModal) closeCreateModal();
                if (event.target === editModal) closeEditModal();
                if (event.target === deleteModal) closeDeleteModal();
                document.querySelectorAll('.moderator_suggestions').forEach(suggestions => {
                    if (!event.target.closest('.moderator_search') && !event.target.closest('.moderator_suggestions')) {
                        suggestions.classList.add('hidden');
                    }
                });
            };

            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    closeCreateModal();
                    closeEditModal();
                    closeDeleteModal();
                    document.querySelectorAll('.moderator_suggestions').forEach(suggestions => {
                        suggestions.classList.add('hidden');
                    });
                }
            });
        </script>
    @endpush
</x-admin-layout>