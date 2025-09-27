<x-admin-layout>
    <div class="bg-white rounded-xl shadow-sm p-4">
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg flex items-center gap-2">
                <i class="fas fa-check-circle"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif
        @if (session('error') || $errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg flex items-center gap-2">
                <i class="fas fa-exclamation-circle"></i>
                @if (session('error'))
                    <span>{{ session('error') }}</span>
                @elseif ($errors->any())
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        @endif

        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 mb-6">
            <h1 class="text-lg font-semibold flex items-center gap-2 text-gray-900 font-['Space_Grotesk']">
                <i class="fas fa-project-diagram text-yellow-400 text-base"></i>
                Daftar Proyek
            </h1>
            <div class="flex gap-3 flex-wrap">
                <button onclick="showCreateModal()" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-3 py-1.5 rounded-lg flex items-center gap-2 transition-colors">
                    <i class="fas fa-plus text-sm"></i>
                    Tambah Proyek Baru
                </button>
                <a href="{{ route('admin.categories.index') }}" class="bg-gray-800 hover:bg-gray-900 text-white text-sm font-medium px-3 py-1.5 rounded-lg flex items-center gap-2 transition-colors">
                    <i class="fas fa-tags text-sm"></i>
                    Kelola Kategori
                </a>
            </div>
        </div>

        <div class="bg-white rounded-lg p-4 mb-6 border border-gray-200">
            <h3 class="text-base font-semibold flex items-center gap-2 mb-3 text-gray-900 font-['Space_Grotesk']">
                <i class="fas fa-chart-bar text-yellow-400 text-sm"></i>
                Distribusi Proyek berdasarkan Kategori
            </h3>
            <div id="chartCanvas" class="w-full h-64"></div>
        </div>

        <div class="bg-white rounded-lg p-4 mb-6 border border-gray-200">
            <h3 class="text-base font-semibold flex items-center gap-2 mb-3 text-gray-900 font-['Space_Grotesk']">
                <i class="fas fa-filter text-yellow-400 text-sm"></i>
                Filter Proyek
            </h3>
            <form id="filterForm" method="GET" action="{{ route('admin.projects.index') }}">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                    <div>
                        <label for="category-filter" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Kategori Proyek</label>
                        <select id="category-filter" name="category" class="w-full p-2 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']">
                            <option value="">Semua Kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="status-filter" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Status Proyek</label>
                        <select id="status-filter" name="status" class="w-full p-2 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']">
                            <option value="">Semua Status</option>
                            <option value="ongoing" {{ request('status') == 'ongoing' ? 'selected' : '' }}>Berlangsung</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Menunggu Persetujuan</option>
                            <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Selesai</option>
                        </select>
                    </div>
                    <div>
                        <label for="manager-filter" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Manajer</label>
                        <select id="manager-filter" name="manager" class="w-full p-2 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']">
                            <option value="">Semua Manajer</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ request('manager') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="keyword-filter" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Kata Kunci</label>
                        <input id="keyword-filter" name="keyword" type="text" value="{{ request('keyword') }}" class="w-full p-2 border border-gray-200 rounded-lg text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Cari nama atau deskripsi proyek...">
                    </div>
                </div>
                <div class="flex gap-3 mt-3">
                    <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-3 py-1.5 rounded-lg flex items-center gap-2 transition-colors">
                        <i class="fas fa-filter text-sm"></i>
                        Terapkan
                    </button>
                    <a href="{{ route('admin.projects.index') }}" class="bg-gray-50 hover:bg-gray-100 text-gray-900 text-sm font-medium px-3 py-1.5 rounded-lg flex items-center gap-2 transition-colors">
                        <i class="fas fa-redo text-sm"></i>
                        Reset
                    </a>
                </div>
            </form>
        </div>

        <div class="mb-6">
            <div class="flex justify-between items-center gap-3 mb-4">
                <h2 class="text-base font-semibold text-gray-900 font-['Space_Grotesk']">Daftar Proyek</h2>
                <div class="text-xs text-gray-800">Menampilkan {{ $projects->firstItem() }}-{{ $projects->lastItem() }} dari {{ $projects->total() }} hasil</div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($projects as $project)
                    <div class="bg-white rounded-lg border border-gray-200 overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                        <div class="relative">
                            <img src="{{ $project->cover_images ? asset('storage/' . $project->cover_images) : 'https://picsum.photos/id/' . ($project->id + 99) . '/400/120' }}" alt="Cover {{ $project->project_name }}" class="w-full project-cover">
                            <div class="w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center text-gray-400 text-sm relative z-10 ml-4 -mt-6">
                                <i class="{{ getThumbnailIcon($project->category ? $project->category->name : '') }}"></i>
                            </div>
                        </div>
                        <div class="p-3">
                            <h3 class="font-semibold text-gray-900 mb-1 text-sm font-['Space_Grotesk']">{{ $project->project_name }}</h3>
                            <p class="text-xs text-gray-800 mb-2">{{ $project->description ? Str::limit($project->description, 50) : '' }}</p>
                            <div class="flex justify-between items-center mb-2">
                                <div class="flex items-center text-xs text-gray-800">
                                    <i class="fas fa-user mr-1"></i>
                                    <span>{{ $project->creator ? $project->creator->name : 'Tidak Diketahui' }}</span>
                                </div>
                                <span class="px-2 py-1 rounded-full {{ $project->status_text }}"></span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-xs text-gray-800">{{ $project->category ? $project->category->name : '-' }}</span>
                                <div class="flex gap-2">
                                    <a href="{{ route('admin.projects.show', $project->id) }}" class="w-8 h-8 rounded-lg bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-xs" aria-label="Lihat {{ $project->project_name }}"><i class="fas fa-eye"></i></a>
                                    <button onclick="showEditModal({{ $project->id }})" class="w-8 h-8 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-xs" aria-label="Edit {{ $project->project_name }}"><i class="fas fa-edit"></i></button>
                                    <button onclick="showDeleteModal('{{ addslashes($project->project_name) }}', {{ $project->id }})" class="w-8 h-8 rounded-lg bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-xs" aria-label="Hapus {{ $project->project_name }}"><i class="fas fa-trash"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="flex justify-center mt-4 gap-2">
            {{ $projects->appends(request()->query())->links('vendor.pagination.tailwind') }}
        </div>

        <div class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" id="createModal">
            <div class="bg-white rounded-lg p-6 w-full max-w-3xl mx-4 overflow-y-auto max-h-[90vh]">
                <div class="flex justify-between items-center mb-4 border-b border-gray-200 pb-3">
                    <h3 class="text-lg font-semibold text-gray-900 font-['Space_Grotesk']">Tambah Proyek Baru</h3>
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
                <form id="createProjectForm" action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4 col-span-2">
                            <label for="cover_images" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Gambar Sampul</label>
                            <div class="w-full h-32 p-4 border-2 border-dashed border-gray-200 rounded-lg text-center cursor-pointer hover:border-yellow-400" ondragover="allowDrop(event)" ondrop="handleDrop(event, 'create', 'cover_images')" onclick="document.getElementById('cover_images').click()">
                                <input type="file" id="cover_images" name="cover_images" accept="image/*" class="hidden" onchange="previewImage(this, 'create_cover_images_preview')">
                                <p class="text-sm text-gray-600">Seret dan lepas gambar atau klik untuk memilih</p>
                            </div>
                            <img id="create_cover_images_preview" src="https://picsum.photos/id/100/400/120" class="mt-2 w-full h-48 object-cover rounded-lg" alt="Preview cover image">
                            @error('cover_images')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4 col-span-2">
                            <label for="project_name" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Nama Proyek</label>
                            <input type="text" id="project_name" name="project_name" value="{{ old('project_name') }}" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required>
                            @error('project_name')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="creator_id" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Pemilik Proyek</label>
                            <select id="creator_id" name="creator_id" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required>
                                <option value="">Pilih Pemilik Proyek</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ old('creator_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                            @error('creator_id')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="community_id" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Komunitas</label>
                            <select id="community_id" name="community_id" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required>
                                <option value="">Pilih Komunitas</option>
                                @foreach ($communities as $community)
                                    <option value="{{ $community->id }}" {{ old('community_id') == $community->id ? 'selected' : '' }}>{{ $community->name }}</option>
                                @endforeach
                            </select>
                            @error('community_id')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="category_id" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Kategori Proyek</label>
                            <select id="category_id" name="category_id" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']">
                                <option value="">Pilih Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4 col-span-2">
                            <label for="description" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Deskripsi Proyek</label>
                            <textarea id="description" name="description" rows="3" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Jelaskan detail proyek, tujuan, dan manfaatnya...">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="start_date" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Tanggal Mulai</label>
                            <input type="date" id="start_date" name="start_date" value="{{ old('start_date') }}" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required>
                            @error('start_date')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="end_date" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Tanggal Selesai (Estimasi)</label>
                            <input type="date" id="end_date" name="end_date" value="{{ old('end_date') }}" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']">
                            @error('end_date')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="progress" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Progres (%)</label>
                            <input type="range" id="progress" name="progress" class="w-full" step="1" min="0" max="100" value="{{ old('progress', 0) }}" oninput="updateProgressValue(this.value)">
                            <div class="flex justify-between items-center mt-1">
                                <span class="text-xs text-gray-500">0%</span>
                                <span id="progress-value" class="text-sm font-medium">{{ old('progress', 0) }}%</span>
                                <span class="text-xs text-gray-500">100%</span>
                            </div>
                            @error('progress')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Status</label>
                            <select id="status" name="status" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']">
                                <option value="ongoing" {{ old('status') == 'ongoing' ? 'selected' : '' }}>Berlangsung</option>
                                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Menunggu Persetujuan</option>
                                <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Selesai</option>
                            </select>
                            @error('status')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4 col-span-2">
                            <label class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Anggota Tim</label>
                            <div id="member_inputs_container">
                                <div class="flex gap-2 mb-2 member-input-group">
                                    <div class="relative flex-grow">
                                        <input type="text" class="member_search w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Cari nama anggota..." onkeyup="searchMembers('create', this.value, this)" autocomplete="off">
                                        <div class="member_suggestions hidden absolute bg-white border border-gray-200 rounded-lg shadow-md w-full max-h-40 overflow-y-auto z-10"></div>
                                    </div>
                                    <input type="text" class="w-1/3 p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Role anggota" onkeydown="if(event.key === 'Enter') addMember('create')">
                                    <button type="button" onclick="addMemberInput()" class="bg-blue-400 hover:bg-blue-500 text-white text-sm font-medium px-3 py-2 rounded-lg flex items-center gap-2 transition-colors"><i class="fas fa-plus"></i> Tambah</button>
                                </div>
                            </div>
                            <div id="create_members" class="flex flex-wrap gap-2 mt-2"></div>
                            <input type="hidden" id="member_ids" name="member_ids">
                            <input type="hidden" id="member_roles" name="member_roles">
                            @error('member_ids')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4 col-span-2">
                            <label class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Linimasa Proyek</label>
                            <div id="milestone_inputs_container">
                                <div class="flex gap-2 mb-2">
                                    <input type="date" class="w-1/4 p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']">
                                    <input type="text" class="w-1/4 p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Judul kegiatan">
                                    <textarea class="w-1/4 p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Deskripsi kegiatan" rows="2"></textarea>
                                    <select class="w-1/4 p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']">
                                        <option value="upcoming">Upcoming</option>
                                        <option value="on_progress">On Progress</option>
                                        <option value="done">Completed</option>
                                    </select>
                                    <button type="button" onclick="addMilestone('create')" class="bg-blue-400 hover:bg-blue-500 text-white text-sm font-medium px-3 py-2 rounded-lg flex items-center gap-2 transition-colors"><i class="fas fa-plus"></i> Tambah</button>
                                </div>
                            </div>
                            <div id="create_milestones" class="flex flex-col gap-2 mt-2"></div>
                            <input type="hidden" id="milestones" name="milestones">
                            @error('milestones')
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
                    <h3 class="text-lg font-semibold text-gray-900 font-['Space_Grotesk']">Edit Proyek</h3>
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
                <form id="editProjectForm" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit_id" name="id">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4 col-span-2">
                            <label for="edit_cover_images" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Gambar Sampul</label>
                            <div class="w-full h-32 p-4 border-2 border-dashed border-gray-200 rounded-lg text-center cursor-pointer hover:border-yellow-400" ondragover="allowDrop(event)" ondrop="handleDrop(event, 'edit', 'cover_images')" onclick="document.getElementById('edit_cover_images').click()">
                                <input type="file" id="edit_cover_images" name="cover_images" accept="image/*" class="hidden" onchange="previewImage(this, 'edit_cover_images_preview')">
                                <p class="text-sm text-gray-600">Seret dan lepas gambar atau klik untuk memilih</p>
                            </div>
                            <img id="edit_cover_images_preview" src="https://picsum.photos/id/100/400/120" class="mt-2 w-full h-48 object-cover rounded-lg" alt="Preview cover image">
                            @error('cover_images')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4 col-span-2">
                            <label for="edit_project_name" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Nama Proyek</label>
                            <input type="text" id="edit_project_name" name="project_name" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required>
                            @error('project_name')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="edit_creator_id" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Pemilik Proyek</label>
                            <select id="edit_creator_id" name="creator_id" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required>
                                <option value="">Pilih Pemilik Proyek</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            @error('creator_id')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="edit_community_id" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Komunitas</label>
                            <select id="edit_community_id" name="community_id" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required>
                                <option value="">Pilih Komunitas</option>
                                @foreach ($communities as $community)
                                    <option value="{{ $community->id }}">{{ $community->name }}</option>
                                @endforeach
                            </select>
                            @error('community_id')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="edit_category_id" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Kategori Proyek</label>
                            <select id="edit_category_id" name="category_id" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']">
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
                            <label for="edit_description" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Deskripsi Proyek</label>
                            <textarea id="edit_description" name="description" rows="3" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Jelaskan detail proyek, tujuan, dan manfaatnya..."></textarea>
                            @error('description')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="edit_start_date" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Tanggal Mulai</label>
                            <input type="date" id="edit_start_date" name="start_date" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required>
                            @error('start_date')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="edit_end_date" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Tanggal Selesai (Estimasi)</label>
                            <input type="date" id="edit_end_date" name="end_date" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']">
                            @error('end_date')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="edit_progress" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Progres (%)</label>
                            <input type="range" id="edit_progress" name="progress" class="w-full" step="1" min="0" max="100" value="0" oninput="updateEditProgressValue(this.value)">
                            <div class="flex justify-between items-center mt-1">
                                <span class="text-xs text-gray-500">0%</span>
                                <span id="edit-progress-value" class="text-sm font-medium">0%</span>
                                <span class="text-xs text-gray-500">100%</span>
                            </div>
                            @error('progress')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="edit_status" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Status</label>
                            <select id="edit_status" name="status" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']">
                                <option value="ongoing">Berlangsung</option>
                                <option value="pending">Menunggu Persetujuan</option>
                                <option value="completed">Selesai</option>
                            </select>
                            @error('status')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4 col-span-2">
                            <label class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Anggota Tim</label>
                            <div id="edit_member_inputs_container">
                                <div class="flex gap-2 mb-2 member-input-group">
                                    <div class="relative flex-grow">
                                        <input type="text" class="member_search w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Cari nama anggota..." onkeyup="searchMembers('edit', this.value, this, document.getElementById('edit_id').value)" autocomplete="off">
                                        <div class="member_suggestions hidden absolute bg-white border border-gray-200 rounded-lg shadow-md w-full max-h-40 overflow-y-auto z-10"></div>
                                    </div>
                                    <input type="text" class="w-1/3 p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Role anggota" onkeydown="if(event.key === 'Enter') addMember('edit')">
                                    <button type="button" onclick="addMemberInput('edit')" class="bg-blue-400 hover:bg-blue-500 text-white text-sm font-medium px-3 py-2 rounded-lg flex items-center gap-2 transition-colors"><i class="fas fa-plus"></i> Tambah</button>
                                </div>
                            </div>
                            <div id="edit_members" class="flex flex-wrap gap-2 mt-2"></div>
                            <input type="hidden" id="edit_member_ids" name="member_ids">
                            <input type="hidden" id="edit_member_roles" name="member_roles">
                            @error('member_ids')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4 col-span-2">
    <label class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Linimasa Proyek</label>
    
    <div id="edit_milestone_inputs_container">
        <div class="flex gap-2 mb-2">
            <input type="date" class="w-1/4 p-2.5 ...">
            <button type="button" onclick="addMilestone('edit')" class="bg-blue-400 ..."> Tambah</button>
        </div>
    </div>
    
    <div id="edit_milestones" class="flex flex-col gap-2 mt-2"></div>
    
    <input type="hidden" id="hidden_edit_milestones_input" name="milestones">
    
    @error('milestones')
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
                <p class="text-sm text-gray-800 mb-6">Apakah Anda yakin ingin menghapus proyek <span id="deleteProjectName" class="font-medium"></span>?</p>
                <form id="deleteProjectForm" action="" method="POST">
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
            .project-cover {
                height: 120px;
                object-fit: cover;
            }
            .modal-open {
                animation: fadeIn 0.3s ease;
            }
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(10px); }
                to { opacity: 1; transform: translateY(0); }
            }
            .member-tag, .milestone-tag {
                background-color: #e0f2fe;
                color: #0369a1;
                padding: 4px 8px;
                border-radius: 9999px;
                display: inline-flex;
                align-items: center;
                gap: 4px;
            }
            .member-tag button, .milestone-tag button {
                color: #0369a1;
                font-weight: bold;
            }
        </style>
    @endpush

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
const chartData = {
    type: 'bar',
    data: {
        labels: {!! json_encode($categoryNames) !!}, 
        datasets: [{
            label: 'Jumlah Proyek',
            data: {!! json_encode($projectCounts) !!},
            backgroundColor: ['#f59e0b', '#d97706', '#b45309', '#92400e', '#78350f'],
            borderColor: ['#f59e0b', '#d97706', '#b45309', '#92400e', '#78350f'],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                title: { display: true, text: 'Jumlah Proyek' }
            },
            x: {
                title: { display: true, text: 'Kategori' }
            }
        },
        plugins: {
            legend: { labels: { color: '#111827' } }
        }
    }
};

const ctx = document.getElementById('chartCanvas') ? document.getElementById('chartCanvas').getContext('2d') : null;
if (ctx) {
    new Chart(ctx, chartData);
}

// Fungsi Modal dan UI dasar
function updateProgressValue(value) {
    const el = document.getElementById('progress-value');
    if (el) el.textContent = `${value}%`;
}

function updateEditProgressValue(value) {
    const el = document.getElementById('edit-progress-value');
    if (el) el.textContent = `${value}%`;
}

function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.add('hidden');
        modal.classList.remove('modal-open');
    }
}

function showCreateModal() {
    const modal = document.getElementById('createModal');
    if (!modal) return;
    
    modal.classList.remove('hidden');
    modal.classList.add('modal-open');
    
    // Reset form dan membersihkan tags
    document.getElementById('createProjectForm')?.reset();
    document.getElementById('create_cover_images_preview')?.setAttribute('src', 'https://picsum.photos/id/100/400/120');
    document.getElementById('create_cover_images_preview')?.classList.remove('hidden');
    document.getElementById('create_members').innerHTML = '';
    document.getElementById('member_ids').value = '';
    document.getElementById('member_roles').value = '';
    document.getElementById('create_milestones').innerHTML = '';
    document.getElementById('milestones').value = '';
    document.getElementById('progress').value = 0;
    updateProgressValue(0);

    // Render ulang input anggota
    document.getElementById('member_inputs_container').innerHTML = `
        <div class="flex gap-2 mb-2 member-input-group">
            <div class="relative flex-grow">
                <input type="text" class="member_search w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Cari nama anggota..." onkeyup="searchMembers('create', this.value, this)" autocomplete="off">
                <div class="member_suggestions hidden absolute bg-white border border-gray-200 rounded-lg shadow-md w-full max-h-40 overflow-y-auto z-10"></div>
            </div>
            <input type="text" class="w-1/3 p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Role anggota" onkeydown="if(event.key === 'Enter') addMember('create')">
            <button type="button" onclick="addMemberInput()" class="bg-blue-400 hover:bg-blue-500 text-white text-sm font-medium px-3 py-2 rounded-lg flex items-center gap-2 transition-colors"><i class="fas fa-plus"></i> Tambah</button>
        </div>
    `;

    // Render ulang input milestone
    document.getElementById('milestone_inputs_container').innerHTML = `
        <div class="flex gap-2 mb-2">
            <input type="date" class="w-1/4 p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']">
            <input type="text" class="w-1/4 p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Judul kegiatan">
            <textarea class="w-1/4 p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Deskripsi kegiatan" rows="2"></textarea>
            <select class="w-1/4 p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']">
                <option value="pending">Pending</option>
                <option value="ongoing">Ongoing</option>
                <option value="completed">Completed</option>
            </select>
            <button type="button" onclick="addMilestone('create')" class="bg-blue-400 hover:bg-blue-500 text-white text-sm font-medium px-3 py-2 rounded-lg flex items-center gap-2 transition-colors"><i class="fas fa-plus"></i> Tambah</button>
        </div>
    `;
}

function closeCreateModal() { closeModal('createModal'); }
function closeEditModal() { closeModal('editModal'); }
function closeDeleteModal() { closeModal('deleteModal'); }

function showDeleteModal(projectName, projectId) {
    document.getElementById('deleteProjectName').textContent = projectName;
    document.getElementById('delete_id').value = projectId;
    document.getElementById('deleteProjectForm').action = `/admin/projects/${projectId}`;
    closeModal('deleteModal'); // ensure it's closed before opening
    document.getElementById('deleteModal').classList.remove('hidden');
    document.getElementById('deleteModal').classList.add('modal-open');
}

// Fungsi Fetch dan Tampilkan Modal Edit
function showEditModal(projectId) {
    fetch(`/admin/projects/${projectId}/edit`)
        .then(response => {
            if (!response.ok) {
                if (response.status === 404) throw new Error('Proyek tidak ditemukan.');
                return response.json().then(data => { throw new Error(data.error || 'Terjadi kesalahan server.'); });
            }
            return response.json();
        })
        .then(project => {
            // Mengisi data proyek ke dalam form edit
            document.getElementById('edit_id').value = project.id;
            document.getElementById('edit_project_name').value = project.project_name;
            document.getElementById('edit_creator_id').value = project.creator_id || '';
            document.getElementById('edit_community_id').value = project.community_id || '';
            document.getElementById('edit_category_id').value = project.category_id || '';
            document.getElementById('edit_description').value = project.description || '';
            document.getElementById('edit_start_date').value = project.start_date ? new Date(project.start_date).toISOString().split('T')[0] : '';
            document.getElementById('edit_end_date').value = project.end_date ? new Date(project.end_date).toISOString().split('T')[0] : '';
            document.getElementById('edit_progress').value = project.progress || 0;
            updateEditProgressValue(project.progress || 0);
            document.getElementById('edit_status').value = project.status || 'ongoing';

            // Cover Image
            const coverPreview = document.getElementById('edit_cover_images_preview');
            coverPreview.src = project.cover_images ? `/storage/${project.cover_images}` : `https://picsum.photos/id/${project.id + 99}/400/120`;
            coverPreview.classList.remove('hidden');

            // Anggota Proyek
            const membersContainer = document.getElementById('edit_members');
            membersContainer.innerHTML = '';
            if (project.members && project.members.length > 0) {
                project.members.forEach(member => {
                    addMemberTag(member.user_id, 'edit', member.user ? member.user.name : `ID ${member.user_id}`, member.role);
                });
            }

            // Milestones
            const milestonesContainer = document.getElementById('edit_milestones');
            milestonesContainer.innerHTML = '';
            // PENTING: Milestones yang sudah ada dimuat dan dijadikan tag
            if (project.milestones && project.milestones.length > 0) {
                project.milestones.forEach(milestone => {
                    addMilestoneTag(milestone.due_date, milestone.title, milestone.description, milestone.status, 'edit');
                });
            }

            // Render ulang input milestone (HANYA INPUT SAJA)
            document.getElementById('edit_milestone_inputs_container').innerHTML = `
                <div class="flex gap-2 mb-2">
                    <input type="date" class="w-1/4 p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']">
                    <input type="text" class="w-1/4 p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Judul kegiatan">
                    <textarea class="w-1/4 p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Deskripsi kegiatan" rows="2"></textarea>
                    <select class="w-1/4 p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']">
                        <option value="upcoming">Upcoming</option>
                                        <option value="on_progress">On Progress</option>
                                        <option value="done">Completed</option>
                    </select>
                    <button type="button" onclick="addMilestone('edit')" class="bg-blue-400 hover:bg-blue-500 text-white text-sm font-medium px-3 py-2 rounded-lg flex items-center gap-2 transition-colors"><i class="fas fa-plus"></i> Tambah</button>
                </div>
            `;
            
            // Render ulang input anggota
            document.getElementById('edit_member_inputs_container').innerHTML = `
                <div class="flex gap-2 mb-2 member-input-group">
                    <div class="relative flex-grow">
                        <input type="text" class="member_search w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Cari nama anggota..." onkeyup="searchMembers('edit', this.value, this, ${projectId})" autocomplete="off">
                        <div class="member_suggestions hidden absolute bg-white border border-gray-200 rounded-lg shadow-md w-full max-h-40 overflow-y-auto z-10"></div>
                    </div>
                    <input type="text" class="w-1/3 p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Role anggota" onkeydown="if(event.key === 'Enter') addMember('edit')">
                    <button type="button" onclick="addMemberInput('edit')" class="bg-blue-400 hover:bg-blue-500 text-white text-sm font-medium px-3 py-2 rounded-lg flex items-center gap-2 transition-colors"><i class="fas fa-plus"></i> Tambah</button>
                </div>
            `;

            document.getElementById('editProjectForm').action = `/admin/projects/${project.id}`;
            document.getElementById('editModal').classList.remove('hidden');
            document.getElementById('editModal').classList.add('modal-open');
        })
        .catch(error => {
            console.error('Error fetching project data:', error);
            alert('Gagal memuat data proyek: ' + error.message);
        });
}

// Fungsi Drag & Drop
function allowDrop(event) {
    event.preventDefault();
    event.target.classList.add('border-yellow-400');
}

function handleDrop(event, mode, field) {
    event.preventDefault();
    event.target.classList.remove('border-yellow-400');
    const file = event.dataTransfer.files[0];
    if (file && file.type.startsWith('image/')) {
        const input = document.getElementById(`${mode}_${field}`);
        input.files = event.dataTransfer.files;
        previewImage(input, `${mode}_cover_images_preview`);
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
    } else {
        preview.src = preview.src || 'https://picsum.photos/id/100/400/120';
        preview.classList.remove('hidden');
    }
}

// --- FUNGSI ANGGOTA (Members) ---

function addMemberInput(mode = 'create') {
    const containerId = mode === 'create' ? 'member_inputs_container' : 'edit_member_inputs_container';
    const container = document.getElementById(containerId);
    if (!container) return;
    
    const projectId = mode === 'edit' ? document.getElementById('edit_id')?.value : '';
    const projectIdArg = projectId ? `, ${projectId}` : '';

    const newInputGroup = document.createElement('div');
    newInputGroup.className = 'flex gap-2 mb-2 member-input-group';
    newInputGroup.innerHTML = `
        <div class="relative flex-grow">
            <input type="text" class="member_search w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Cari nama anggota..." onkeyup="searchMembers('${mode}', this.value, this${projectIdArg})" autocomplete="off">
            <div class="member_suggestions hidden absolute bg-white border border-gray-200 rounded-lg shadow-md w-full max-h-40 overflow-y-auto z-10"></div>
        </div>
        <input type="text" class="w-1/3 p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Role anggota" onkeydown="if(event.key === 'Enter') addMember('${mode}')">
        <button type="button" onclick="addMemberInput('${mode}')" class="bg-blue-400 hover:bg-blue-500 text-white text-sm font-medium px-3 py-2 rounded-lg flex items-center gap-2 transition-colors"><i class="fas fa-plus"></i> Tambah</button>
    `;
    container.appendChild(newInputGroup);
}

function addMember(mode) {
    const containerId = mode === 'create' ? 'member_inputs_container' : 'edit_member_inputs_container';
    const container = document.getElementById(containerId);
    if (!container) return;

    // Ambil input dari group terakhir yang baru saja diisi
    const lastGroup = container.lastElementChild;
    if (!lastGroup) return;
    
    const input = lastGroup.querySelector('.member_search');
    const roleInput = lastGroup.querySelector('input[placeholder="Role anggota"]');
    
    const id = input?.dataset.selectedId;
    const name = input?.value.trim();
    const role = roleInput?.value.trim();
    
    if (id && role && name) {
        addMemberTag(id, mode, name, role);
        // Clear input setelah berhasil ditambahkan
        input.value = '';
        input.dataset.selectedId = '';
        roleInput.value = '';
        input.nextElementSibling?.classList.add('hidden');
    }
}

function addMemberTag(id, mode, name, role) {
    const containerId = mode === 'create' ? 'create_members' : 'edit_members';
    const container = document.getElementById(containerId);
    if (!container) return;

    // Cegah duplikasi anggota berdasarkan ID
    const existingIds = Array.from(container.children).map(tag => tag.dataset.id);
    if (existingIds.includes(id.toString())) return;
    
    const tag = document.createElement('span');
    tag.className = 'member-tag text-xs bg-gray-100 text-gray-800 px-2 py-1 rounded-full flex items-center gap-1';
    tag.dataset.id = id;
    // Simpan role di dataset agar lebih mudah diambil
    tag.dataset.role = role;
    tag.innerHTML = `${name} (${role}) <button type="button" class="text-gray-500 hover:text-gray-800 ml-1" onclick="this.parentElement.remove(); updateMembers('${mode}')">&times;</button>`;
    
    container.appendChild(tag);
    updateMembers(mode);
}

function updateMembers(mode) {
    const containerId = mode === 'create' ? 'create_members' : 'edit_members';
    const hiddenId = mode === 'create' ? 'member_ids' : 'edit_member_ids';
    const hiddenRoles = mode === 'create' ? 'member_roles' : 'edit_member_roles';
    
    const container = document.getElementById(containerId);
    const hiddenInputId = document.getElementById(hiddenId);
    const hiddenInputRoles = document.getElementById(hiddenRoles);
    
    if (!container || !hiddenInputId || !hiddenInputRoles) return;

    const ids = [];
    const roles = [];
    
    Array.from(container.querySelectorAll('.member-tag')).forEach(tag => {
        const id = tag.dataset.id;
        // Ambil role dari dataset, lebih aman daripada parsing textContent
        const role = tag.dataset.role; 
        ids.push(id);
        roles.push(role);
    });
    
    hiddenInputId.value = ids.join(',');
    hiddenInputRoles.value = roles.join(',');
}

function searchMembers(mode, query, inputElement, projectId = null) {
    if (query.length < 2) {
        inputElement.nextElementSibling.classList.add('hidden');
        return;
    }
    let url = `/admin/projects/search-users?query=${encodeURIComponent(query)}`;
    if (projectId) url += `&project_id=${projectId}`;
    
    fetch(url)
        .then(response => response.json())
        .then(users => {
            const suggestions = inputElement.nextElementSibling;
            if (!suggestions) return;
            suggestions.innerHTML = '';
            
            users.forEach(user => {
                const item = document.createElement('div');
                item.className = 'suggestion-item text-sm p-2 cursor-pointer hover:bg-gray-100';
                item.textContent = user.name;
                item.onclick = () => {
                    inputElement.value = user.name;
                    inputElement.dataset.selectedId = user.id;
                    suggestions.classList.add('hidden');
                };
                suggestions.appendChild(item);
            });
            suggestions.classList.toggle('hidden', users.length === 0);
        });
}

// --- FUNGSI MILESTONES (Perbaikan ID Duplikat) ---

function addMilestone(mode) {
    const containerId = mode === 'create' ? 'milestone_inputs_container' : 'edit_milestone_inputs_container';
    const container = document.getElementById(containerId);
    if (!container) return;

    // Ambil input dari container
    const dateInput = container.querySelector('input[type="date"]');
    const titleInput = container.querySelector('input[placeholder="Judul kegiatan"]');
    const descriptionInput = container.querySelector('textarea[placeholder="Deskripsi kegiatan"]');
    const statusInput = container.querySelector('select');
    
    if (!dateInput || !titleInput || !statusInput) return; // Pengecekan keamanan

    const dueDate = dateInput.value;
    const title = titleInput.value.trim();
    const description = descriptionInput ? descriptionInput.value.trim() : '';
    const status = statusInput.value;

    if (!dueDate || !title) {
        alert('Tanggal dan judul kegiatan wajib diisi!');
        return;
    }

    addMilestoneTag(dueDate, title, description, status, mode);
    
    // Reset input fields
    dateInput.value = '';
    titleInput.value = '';
    if (descriptionInput) descriptionInput.value = '';
    statusInput.value = 'pending';
}

function addMilestoneTag(dueDate, title, description, status, mode) {
    // containerId ini untuk menampilkan tag
    const containerId = mode === 'create' ? 'create_milestones' : 'edit_milestones'; 
    const container = document.getElementById(containerId);
    if (!container) return;

    const tag = document.createElement('div');
    tag.className = 'milestone-tag text-xs bg-gray-100 text-gray-800 px-2 py-1 rounded-full flex items-center gap-1';
    tag.dataset.dueDate = dueDate;
    tag.dataset.title = title;
    tag.dataset.description = description || '';
    tag.dataset.status = status;
    
    // Format tanggal
    const formattedDate = new Date(dueDate).toLocaleDateString('id-ID', { day: '2-digit', month: 'short', year: 'numeric' });
    
    tag.innerHTML = `${title} (${formattedDate}) - ${status} <span class="ml-2">${description ? `: ${description}` : ''}</span> <button type="button" class="text-gray-500 hover:text-gray-800 ml-1" onclick="this.parentElement.remove(); updateMilestones('${mode}')">&times;</button>`;
    
    container.appendChild(tag);
    updateMilestones(mode);
}

function updateMilestones(mode) {
    // containerId untuk mengambil tag-tag yang sudah dibuat
    const containerId = mode === 'create' ? 'create_milestones' : 'edit_milestones';
    
    // *** PERBAIKAN UTAMA: Targetkan ID unik untuk hidden input di mode 'edit' ***
    const hiddenId = mode === 'create' ? 'milestones' : 'hidden_edit_milestones_input'; 

    const container = document.getElementById(containerId);
    const hiddenInput = document.getElementById(hiddenId);
    
    if (!hiddenInput) {
        console.error(`Hidden input #${hiddenId} tidak ditemukan! Pastikan ID input tersembunyi sudah diubah di HTML.`);
        return;
    }

    const milestones = Array.from(container.querySelectorAll('.milestone-tag')).map(tag => {
        const dueDate = tag.dataset.dueDate;
        const title = tag.dataset.title;
        const description = tag.dataset.description;
        const status = tag.dataset.status;
        
        // Format data menjadi string yang dipisahkan oleh kolon (:)
        return `${dueDate}:${title}:${description || ''}:${status}`;
    });

    // Masukkan data milestones ke hidden input, dipisahkan oleh newline
    hiddenInput.value = milestones.join('\n');
    console.log(`Milestones (${mode}):`, hiddenInput.value); // Debugging
}

// --- GLOBAL EVENT LISTENERS ---

window.onclick = function(event) {
    const modals = ['createModal', 'editModal', 'deleteModal'];
    modals.forEach(modalId => {
        // Cek jika klik dilakukan di luar konten modal tapi di dalam backdrop
        const modal = document.getElementById(modalId);
        if (modal && event.target === modal) closeModal(modalId);
    });
    
    // Sembunyikan saran anggota
    document.querySelectorAll('.member_suggestions').forEach(suggestions => {
        if (!event.target.closest('.member_search') && !event.target.closest('.member_suggestions')) {
            suggestions.classList.add('hidden');
        }
    });
};

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeCreateModal();
        closeEditModal();
        closeDeleteModal();
        // Sembunyikan semua saran anggota saat Esc
        document.querySelectorAll('.member_suggestions').forEach(suggestions => {
            suggestions.classList.add('hidden');
        });
    }
});
        </script>
    @endpush
</x-admin-layout>