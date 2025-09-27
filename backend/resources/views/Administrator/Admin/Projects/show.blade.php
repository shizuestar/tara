<x-admin-layout>
    <div class="bg-white rounded-xl shadow-sm p-6">
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg flex items-center gap-2" role="alert">
                <i class="fas fa-check-circle"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif
        @if (session('error') || $errors->has('error'))
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg flex items-center gap-2" role="alert">
                <i class="fas fa-exclamation-circle"></i>
                <span>{{ session('error') ?? $errors->first('error') }}</span>
            </div>
        @endif

        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
            <h1 class="text-xl font-semibold flex items-center gap-2 text-gray-900 font-['Space_Grotesk']">
                <i class="fas fa-project-diagram text-yellow-400 text-base"></i>
                Detail Proyek: {{ $project->project_name }}
            </h1>
            <div class="flex gap-3 flex-wrap">
                <a href="{{ route('admin.projects.index') }}" class="bg-gray-50 hover:bg-gray-100 text-gray-900 text-sm font-medium px-4 py-2 rounded-lg flex items-center gap-2 transition-colors">
                    <i class="fas fa-arrow-left text-sm"></i>
                    Kembali ke Daftar Proyek
                </a>
                <button onclick="showEditModal({{ $project->id }})" class="bg-blue-100 hover:bg-blue-200 text-blue-600 text-sm font-medium px-4 py-2 rounded-lg flex items-center gap-2 transition-colors" aria-label="Edit Proyek">
                    <i class="fas fa-edit text-sm"></i>
                    Edit Proyek
                </button>
                <button onclick="showDeleteModal('{{ addslashes($project->project_name) }}', {{ $project->id }})" class="bg-red-100 hover:bg-red-200 text-red-600 text-sm font-medium px-4 py-2 rounded-lg flex items-center gap-2 transition-colors" aria-label="Hapus Proyek">
                    <i class="fas fa-trash text-sm"></i>
                    Hapus Proyek
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h4 class="text-lg font-semibold mb-3 text-gray-800 font-['Space_Grotesk']">Informasi Dasar</h4>
                <dl class="space-y-2">
                    <div>
                        <dt class="font-medium text-gray-900">Nama Proyek:</dt>
                        <dd>{{ $project->project_name }}</dd>
                    </div>
                    <div>
                        <dt class="font-medium text-gray-900">Pemilik:</dt>
                        <dd>{{ $project->creator ? $project->creator->name : 'Tidak Diketahui' }}</dd>
                    </div>
                    <div>
                        <dt class="font-medium text-gray-900">Komunitas:</dt>
                        <dd>{{ $project->community ? $project->community->name : '-' }}</dd>
                    </div>
                    <div>
                        <dt class="font-medium text-gray-900">Kategori:</dt>
                        <dd>{{ $project->category ? $project->category->name : '-' }}</dd>
                    </div>
                    <div>
                        <dt class="font-medium text-gray-900">Deskripsi:</dt>
                        <dd>{{ $project->description ?? '-' }}</dd>
                    </div>
                    <div>
                        <dt class="font-medium text-gray-900">Gambar Sampul:</dt>
                        <dd>
                            @if ($project->cover_images)
                                <a href="{{ asset('storage/' . $project->cover_images) }}" target="_blank" class="text-blue-600 hover:underline">Lihat Gambar</a>
                            @else
                                -
                            @endif
                        </dd>
                    </div>
                </dl>
            </div>
            <div>
                <h4 class="text-lg font-semibold mb-3 text-gray-800 font-['Space_Grotesk']">Timeline</h4>
                <dl class="space-y-2">
                    <div>
                        <dt class="font-medium text-gray-900">Tanggal Mulai:</dt>
                        <dd>{{ $project->start_date ? \Carbon\Carbon::parse($project->start_date)->format('d M Y') : '-' }}</dd>
                    </div>
                    <div>
                        <dt class="font-medium text-gray-900">Tanggal Selesai:</dt>
                        <dd>{{ $project->end_date ? \Carbon\Carbon::parse($project->end_date)->format('d M Y') : '-' }}</dd>
                    </div>
                    <div>
                        <dt class="font-medium text-gray-900">Progres:</dt>
                        <dd>{{ $project->progress }}%</dd>
                    </div>
                    <div>
                        <dt class="font-medium text-gray-900">Status:</dt>
                        <dd>{!! getStatusBadge($project->status) !!}</dd>
                    </div>
                </dl>
            </div>
            <div class="md:col-span-2">
                <h4 class="text-lg font-semibold mb-3 text-gray-800 font-['Space_Grotesk']">Anggota Tim</h4>
                <div class="flex flex-wrap gap-2">
                    @if ($project->members && $project->members->count() > 0)
                        @foreach ($project->members as $member)
                            <span class="member-tag text-xs">{{ $member->user ? $member->user->name : 'ID ' . $member->user_id }} ({{ $member->role }})</span>
                        @endforeach
                    @else
                        <span class="text-xs text-gray-600">Tidak ada anggota tim.</span>
                    @endif
                </div>
            </div>
            <div class="md:col-span-2">
                <h4 class="text-lg font-semibold mb-3 text-gray-800 font-['Space_Grotesk']">Linimasa Proyek</h4>
                <div class="flex flex-col gap-2">
                    @if ($project->milestones && $project->milestones->count() > 0)
                        @foreach ($project->milestones as $milestone)
                            <span class="milestone-tag text-xs">{{ $milestone->title }} ({{ \Carbon\Carbon::parse($milestone->due_date)->format('d M Y') }})</span>
                        @endforeach
                    @else
                        <span class="text-xs text-gray-600">Tidak ada linimasa proyek.</span>
                    @endif
                </div>
            </div>
        </div>

        <!-- Edit Modal -->
        <div class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" id="editModal" aria-hidden="true">
            <div class="bg-white rounded-lg p-6 w-full max-w-3xl mx-4 overflow-y-auto max-h-[90vh]">
                <div class="flex justify-between items-center mb-4 border-b border-gray-200 pb-3">
                    <h3 class="text-lg font-semibold text-gray-900 font-['Space_Grotesk']">Edit Proyek</h3>
                    <button class="text-xl text-gray-800 hover:text-gray-900" onclick="closeModal('editModal')" aria-label="Tutup modal">&times;</button>
                </div>
                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg flex items-center gap-2" role="alert">
                        <i class="fas fa-exclamation-circle"></i>
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form id="editProjectForm" action="" method="POST" enctype="multipart/form-data" onsubmit="return validateEditForm()">
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
                            <img id="edit_cover_images_preview" class="mt-2 w-full h-48 object-cover rounded-lg hidden" alt="Pratinjau gambar sampul">
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
                                    <button type="button" onclick="addMemberInput('edit')" class="bg-blue-400 hover:bg-blue-500 text-white text-sm font-medium px-3 py-2 rounded-lg flex items-center gap-2 transition-colors" aria-label="Tambah Anggota"><i class="fas fa-plus"></i> Tambah</button>
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
                                    <input type="date" class="w-1/3 p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']">
                                    <input type="text" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Deskripsi kegiatan" onkeydown="if(event.key === 'Enter') addMilestone('edit')">
                                    <button type="button" onclick="addMilestone('edit')" class="bg-blue-400 hover:bg-blue-500 text-white text-sm font-medium px-3 py-2 rounded-lg flex items-center gap-2 transition-colors" aria-label="Tambah Milestone"><i class="fas fa-plus"></i> Tambah</button>
                                </div>
                            </div>
                            <div id="edit_milestones" class="flex flex-col gap-2 mt-2"></div>
                            <input type="hidden" id="edit_milestones" name="milestones">
                            @error('milestones')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="flex justify-end gap-3 mt-6">
                        <button type="button" class="bg-gray-50 hover:bg-gray-100 text-gray-900 text-sm font-medium px-4 py-2 rounded-lg transition-colors" onclick="closeModal('editModal')">Batal</button>
                        <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-2 rounded-lg transition-colors">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Delete Modal -->
        <div class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" id="deleteModal" aria-hidden="true">
            <div class="bg-white rounded-lg p-6 w-full max-w-md mx-4">
                <div class="flex justify-between items-center mb-4 border-b border-gray-200 pb-3">
                    <h3 class="text-lg font-semibold text-gray-900 font-['Space_Grotesk']">Konfirmasi Hapus</h3>
                    <button class="text-xl text-gray-800 hover:text-gray-900" onclick="closeModal('deleteModal')" aria-label="Tutup modal">&times;</button>
                </div>
                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg flex items-center gap-2" role="alert">
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
                        <button type="button" class="bg-gray-50 hover:bg-gray-100 text-gray-900 text-sm font-medium px-4 py-2 rounded-lg transition-colors" onclick="closeModal('deleteModal')">Batal</button>
                        <button type="submit" class="bg-red-400 hover:bg-red-500 text-white text-sm font-medium px-4 py-2 rounded-lg transition-colors">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('styles')
        <style>
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
            .suggestion-item:hover {
                background-color: #f0f0f0;
                cursor: pointer;
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            function showEditModal(projectId) {
                fetch("{{ route('admin.projects.edit', ':id') }}".replace(':id', projectId))
                    .then(response => {
                        if (!response.ok) {
                            if (response.status === 404) throw new Error('Proyek tidak ditemukan.');
                            return response.json().then(data => { throw new Error(data.error || 'Terjadi kesalahan server.'); });
                        }
                        return response.json();
                    })
                    .then(project => {
                        document.getElementById('edit_id').value = project.id;
                        document.getElementById('edit_project_name').value = project.project_name || '';
                        document.getElementById('edit_creator_id').value = project.creator_id || '';
                        document.getElementById('edit_community_id').value = project.community_id || '';
                        document.getElementById('edit_category_id').value = project.category_id || '';
                        document.getElementById('edit_description').value = project.description || '';
                        document.getElementById('edit_start_date').value = project.start_date || '';
                        document.getElementById('edit_end_date').value = project.end_date || '';
                        document.getElementById('edit_progress').value = project.progress || 0;
                        updateEditProgressValue(project.progress || 0);
                        document.getElementById('edit_status').value = project.status || 'ongoing';

                        const coverPreview = document.getElementById('edit_cover_images_preview');
                        if (project.cover_images) {
                            coverPreview.src = project.cover_images;
                            coverPreview.classList.remove('hidden');
                        } else {
                            coverPreview.classList.add('hidden');
                        }

                        const membersContainer = document.getElementById('edit_members');
                        membersContainer.innerHTML = '';
                        if (project.members && project.members.length > 0) {
                            project.members.forEach(member => {
                                addMemberTag(member.user_id, 'edit', member.user ? member.user.name : `ID ${member.user_id}`, member.role);
                            });
                        }

                        const milestonesContainer = document.getElementById('edit_milestones');
                        milestonesContainer.innerHTML = '';
                        if (project.milestones && project.milestones.length > 0) {
                            project.milestones.forEach(milestone => {
                                addMilestoneTag(milestone.due_date, milestone.title, 'edit');
                            });
                        }

                        document.getElementById('edit_milestone_inputs_container').innerHTML = `
                            <div class="flex gap-2 mb-2">
                                <input type="date" class="w-1/3 p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']">
                                <input type="text" class="w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Deskripsi kegiatan" onkeydown="if(event.key === 'Enter') addMilestone('edit')">
                                <button type="button" onclick="addMilestone('edit')" class="bg-blue-400 hover:bg-blue-500 text-white text-sm font-medium px-3 py-2 rounded-lg flex items-center gap-2 transition-colors" aria-label="Tambah Milestone"><i class="fas fa-plus"></i> Tambah</button>
                            </div>
                        `;

                        document.getElementById('edit_member_inputs_container').innerHTML = `
                            <div class="flex gap-2 mb-2 member-input-group">
                                <div class="relative flex-grow">
                                    <input type="text" class="member_search w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Cari nama anggota..." onkeyup="searchMembers('edit', this.value, this, ${projectId})" autocomplete="off">
                                    <div class="member_suggestions hidden absolute bg-white border border-gray-200 rounded-lg shadow-md w-full max-h-40 overflow-y-auto z-10"></div>
                                </div>
                                <input type="text" class="w-1/3 p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Role anggota" onkeydown="if(event.key === 'Enter') addMember('edit')">
                                <button type="button" onclick="addMemberInput('edit')" class="bg-blue-400 hover:bg-blue-500 text-white text-sm font-medium px-3 py-2 rounded-lg flex items-center gap-2 transition-colors" aria-label="Tambah Anggota"><i class="fas fa-plus"></i> Tambah</button>
                            </div>
                        `;

                        document.getElementById('editProjectForm').action = "{{ route('admin.projects.update', ':id') }}".replace(':id', project.id);
                        document.getElementById('editModal').classList.remove('hidden');
                        document.getElementById('editModal').setAttribute('aria-hidden', 'false');
                        document.getElementById('editModal').classList.add('modal-open');
                    })
                    .catch(error => {
                        console.error('Error fetching project data:', error);
                        alert(`Gagal memuat data proyek: ${error.message}`);
                    });
            }

            function showDeleteModal(projectName, projectId) {
                document.getElementById('deleteProjectName').textContent = projectName;
                document.getElementById('delete_id').value = projectId;
                document.getElementById('deleteProjectForm').action = "{{ route('admin.projects.destroy', ':id') }}".replace(':id', projectId);
                document.getElementById('deleteModal').classList.remove('hidden');
                document.getElementById('deleteModal').setAttribute('aria-hidden', 'false');
                document.getElementById('deleteModal').classList.add('modal-open');
            }

            function closeModal(modalId) {
                const modal = document.getElementById(modalId);
                modal.classList.add('hidden');
                modal.classList.remove('modal-open');
                modal.setAttribute('aria-hidden', 'true');
                document.querySelectorAll('.member_suggestions').forEach(suggestions => suggestions.classList.add('hidden'));
            }

            function updateEditProgressValue(value) {
                document.getElementById('edit-progress-value').textContent = `${value}%`;
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
                    const input = document.getElementById(`${mode}_${field}`);
                    input.files = event.dataTransfer.files;
                    previewImage(input, `${mode}_${field}_preview`);
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

            function validateEditForm() {
                const requiredFields = ['edit_project_name', 'edit_creator_id', 'edit_community_id', 'edit_start_date'];
                let isValid = true;
                requiredFields.forEach(fieldId => {
                    const field = document.getElementById(fieldId);
                    if (!field.value.trim()) {
                        isValid = false;
                        field.classList.add('border-red-500');
                        const error = document.createElement('p');
                        error.className = 'text-red-600 text-xs mt-1';
                        error.textContent = 'Kolom ini wajib diisi.';
                        if (!field.nextElementSibling?.classList.contains('text-red-600')) {
                            field.parentElement.appendChild(error);
                        }
                    } else {
                        field.classList.remove('border-red-500');
                        if (field.nextElementSibling?.classList.contains('text-red-600')) {
                            field.nextElementSibling.remove();
                        }
                    }
                });
                return isValid;
            }

            function addMemberInput(mode = 'edit') {
                const container = document.getElementById(`${mode}_member_inputs_container`);
                const newInputGroup = document.createElement('div');
                newInputGroup.className = 'flex gap-2 mb-2 member-input-group';
                newInputGroup.innerHTML = `
                    <div class="relative flex-grow">
                        <input type="text" class="member_search w-full p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Cari nama anggota..." onkeyup="searchMembers('${mode}', this.value, this, document.getElementById('${mode}_id').value)" autocomplete="off">
                        <div class="member_suggestions hidden absolute bg-white border border-gray-200 rounded-lg shadow-md w-full max-h-40 overflow-y-auto z-10"></div>
                    </div>
                    <input type="text" class="w-1/3 p-2.5 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Role anggota" onkeydown="if(event.key === 'Enter') addMember('${mode}')">
                    <button type="button" onclick="addMemberInput('${mode}')" class="bg-blue-400 hover:bg-blue-500 text-white text-sm font-medium px-3 py-2 rounded-lg flex items-center gap-2 transition-colors" aria-label="Tambah Anggota"><i class="fas fa-plus"></i> Tambah</button>
                `;
                container.appendChild(newInputGroup);
            }

            function addMember(mode) {
                const container = document.getElementById(`${mode}_member_inputs_container`);
                const input = container.querySelector('.member_search');
                const roleInput = container.querySelector('input[placeholder="Role anggota"]');
                const id = input.dataset.selectedId;
                const name = input.value.trim();
                const role = roleInput.value.trim();
                if (id && role) {
                    addMemberTag(id, mode, name, role);
                    input.value = '';
                    input.dataset.selectedId = '';
                    roleInput.value = '';
                    input.nextElementSibling.classList.add('hidden');
                }
            }

            function addMemberTag(id, mode, name, role) {
                const container = document.getElementById(`${mode}_members`);
                const existingIds = Array.from(container.children).map(tag => tag.dataset.id);
                if (existingIds.includes(id.toString())) return;
                const tag = document.createElement('span');
                tag.className = 'member-tag text-xs';
                tag.dataset.id = id;
                tag.innerHTML = `${name} (${role}) <button type="button" onclick="this.parentElement.remove(); updateMembers('${mode}')" aria-label="Hapus Anggota">&times;</button>`;
                container.appendChild(tag);
                updateMembers(mode);
            }

            function updateMembers(mode) {
                const container = document.getElementById(`${mode}_members`);
                const hiddenId = `${mode}_member_ids`;
                const hiddenRoles = `${mode}_member_roles`;
                const ids = [];
                const roles = [];
                Array.from(container.children).forEach(tag => {
                    const id = tag.dataset.id;
                    const role = tag.textContent.replace(/\s*\×$/, '').split('(')[1].slice(0, -1);
                    ids.push(id);
                    roles.push(role);
                });
                document.getElementById(hiddenId).value = ids.join(',');
                document.getElementById(hiddenRoles).value = roles.join(',');
            }

            function addMilestone(mode) {
                const container = document.getElementById(`${mode}_milestone_inputs_container`);
                const dateInput = container.querySelector('input[type="date"]');
                const titleInput = container.querySelector('input[placeholder="Deskripsi kegiatan"]');
                const dueDate = dateInput.value;
                const title = titleInput.value.trim();
                if (dueDate && title) {
                    addMilestoneTag(dueDate, title, mode);
                    dateInput.value = '';
                    titleInput.value = '';
                }
            }

            function addMilestoneTag(dueDate, title, mode) {
                const container = document.getElementById(`${mode}_milestones`);
                const tag = document.createElement('div');
                tag.className = 'milestone-tag text-xs';
                tag.innerHTML = `${title} (${new Date(dueDate).toLocaleDateString('id-ID', { day: '2-digit', month: 'short', year: 'numeric' })}) <button type="button" onclick="this.parentElement.remove(); updateMilestones('${mode}')" aria-label="Hapus Milestone">&times;</button>`;
                container.appendChild(tag);
                updateMilestones(mode);
            }

            function updateMilestones(mode) {
                const container = document.getElementById(`${mode}_milestones`);
                const hiddenId = `${mode}_milestones`;
                const milestones = Array.from(container.querySelectorAll('.milestone-tag')).map(tag => {
                    const text = tag.textContent.replace(/\s*\×$/, '');
                    const [title, date] = text.split(' (');
                    const dueDate = new Date(date.slice(0, -1).split(' ').reverse().join('-')).toISOString().split('T')[0];
                    return `${dueDate}:${title}`;
                });
                document.getElementById(hiddenId).value = milestones.join('\n');
            }

            function searchMembers(mode, query, inputElement, projectId) {
                if (query.length < 2) {
                    inputElement.nextElementSibling.classList.add('hidden');
                    return;
                }
                fetch("{{ route('admin.projects.users.search') }}?query=" + encodeURIComponent(query) + "&project_id=" + projectId)
                    .then(response => response.json())
                    .then(users => {
                        const suggestions = inputElement.nextElementSibling;
                        suggestions.innerHTML = '';
                        users.forEach(user => {
                            const item = document.createElement('div');
                            item.className = 'suggestion-item text-sm p-2';
                            item.textContent = user.name;
                            item.onclick = () => {
                                inputElement.value = user.name;
                                inputElement.dataset.selectedId = user.id;
                                suggestions.classList.add('hidden');
                            };
                            suggestions.appendChild(item);
                        });
                        suggestions.classList.toggle('hidden', users.length === 0);
                    })
                    .catch(error => console.error('Error searching members:', error));
            }

            function getStatusBadge(status) {
                let color = 'bg-gray-100 text-gray-600';
                let text = 'Tidak Diketahui';
                if (status === 'ongoing') {
                    color = 'bg-green-100 text-green-600';
                    text = 'Berlangsung';
                } else if (status === 'pending') {
                    color = 'bg-yellow-100 text-yellow-600';
                    text = 'Menunggu Persetujuan';
                } else if (status === 'completed') {
                    color = 'bg-blue-100 text-blue-600';
                    text = 'Selesai';
                }
                return `<span class="px-2 py-1 rounded-full ${color} text-xs" aria-label="Status: ${text}">${text}</span>`;
            }

            window.onclick = function(event) {
                const modals = ['editModal', 'deleteModal'];
                modals.forEach(modalId => {
                    if (event.target.id === modalId) closeModal(modalId);
                });
                document.querySelectorAll('.member_suggestions').forEach(suggestions => {
                    if (!event.target.closest('.member_search') && !event.target.closest('.member_suggestions')) {
                        suggestions.classList.add('hidden');
                    }
                });
            };

            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    closeModal('editModal');
                    closeModal('deleteModal');
                }
            });
        </script>
    @endpush
</x-admin-layout>
