<x-admin-layout>
    @push('styles')
        <style>
            .sidebar-history {
                height: calc(100vh - 2rem);
            }
            @media (max-width: 1023px) {
                .main-content {
                    width: 100%;
                }
                .history-sidebar {
                    width: 100%;
                    margin-top: 1.5rem;
                }
            }
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

    <div class="bg-gray-100">
        <div class="flex flex-col lg:flex-row gap-4">
            <div class="main-content bg-white rounded-lg p-6 shadow-sm lg:w-3/4">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
                    <h1 class="text-xl font-semibold flex items-center gap-2 text-gray-900">
                        <i class="fas fa-users text-yellow-400 text-lg"></i>
                        Manajemen Pengguna
                    </h1>
                    <button onclick="showCreateModal()" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors">
                        <i class="fas fa-plus text-sm"></i>
                        Tambah Pengguna Baru
                    </button>
                </div>

                <!-- Filter Section -->
                <div class="bg-white rounded-lg p-5 mb-8 border border-gray-200">
                    <h3 class="text-lg font-semibold flex items-center gap-2 mb-4 text-gray-900">
                        <i class="fas fa-filter text-yellow-400 text-base"></i>
                        Filter Pengguna
                    </h3>
                    <form id="filterForm" action="{{ route('admin.users.index') }}" method="GET">
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                            <div>
                                <label for="role-filter" class="block text-sm font-medium text-gray-700 mb-1.5">Peran</label>
                                <select id="role-filter" name="role" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                                    <option value="">Semua Peran</option>
                                    <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="kurator" {{ request('role') == 'kurator' ? 'selected' : '' }}>Kurator</option>
                                    <option value="member" {{ request('role') == 'member' ? 'selected' : '' }}>Member</option>
                                </select>
                            </div>
                            <div>
                                <label for="status-filter" class="block text-sm font-medium text-gray-700 mb-1.5">Status</label>
                                <select id="status-filter" name="status" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                                    <option value="">Semua Status</option>
                                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                                    <option value="banned" {{ request('status') == 'banned' ? 'selected' : '' }}>Dibanned</option>
                                </select>
                            </div>
                            <div>
                                <label for="date-filter" class="block text-sm font-medium text-gray-700 mb-1.5">Tanggal Bergabung</label>
                                <select id="date-filter" name="year" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                                    <option value="">Semua</option>
                                    <option value="2025" {{ request('year') == '2025' ? 'selected' : '' }}>2025</option>
                                    <option value="2024" {{ request('year') == '2024' ? 'selected' : '' }}>2024</option>
                                    <option value="2023" {{ request('year') == '2023' ? 'selected' : '' }}>2023</option>
                                </select>
                            </div>
                            <div>
                                <label for="keyword-filter" class="block text-sm font-medium text-gray-700 mb-1.5">Kata Kunci</label>
                                <input id="keyword-filter" name="keyword" type="text" value="{{ request('keyword') }}" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Cari nama, username, atau email...">
                            </div>
                        </div>
                        <div class="flex gap-3 mt-4">
                            <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors">
                                <i class="fas fa-filter text-sm"></i>
                                Terapkan
                            </button>
                            <a href="{{ route('admin.users.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors">
                                <i class="fas fa-redo text-sm"></i>
                                Reset
                            </a>
                        </div>
                    </form>
                </div>

                <!-- User List -->
                <div class="bg-white rounded-lg p-5 border border-gray-200">
                    <div class="flex justify-between items-center gap-4 mb-5">
                        <h2 class="text-lg font-semibold text-gray-900">Daftar Pengguna</h2>
                        <div class="text-[12px] text-gray-600">Menampilkan {{ $users->count() }} dari {{ $users->total() }} pengguna</div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse">
                            <thead>
                                <tr class="bg-gray-50">
                                    <th class="p-3 text-left text-[12px] font-semibold text-gray-600">Nama</th>
                                    <th class="p-3 text-left text-[12px] font-semibold text-gray-600">Username</th>
                                    <th class="p-3 text-left text-[12px] font-semibold text-gray-600">Email</th>
                                    <th class="p-3 text-left text-[12px] font-semibold text-gray-600">Peran</th>
                                    <th class="p-3 text-left text-[12px] font-semibold text-gray-600">Status</th>
                                    <th class="p-3 text-left text-[12px] font-semibold text-gray-600">Tanggal Bergabung</th>
                                    <th class="p-3 text-left text-[12px] font-semibold text-gray-600 w-24">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr class="hover:bg-gray-50">
                                        <td class="p-3 text-[13px] font-medium text-gray-900">{{ $user->name }}</td>
                                        <td class="p-3 text-[12px] text-gray-600">{{ $user->username }}</td>
                                        <td class="p-3 text-[12px] text-gray-600">{{ $user->email }}</td>
                                        <td class="p-3 text-[12px] text-gray-900">{{ ucfirst($user->role) }}</td>
                                        <td class="p-3">
                                            <span class="px-2 py-1 rounded-full {{ $user->status == 'active' ? 'bg-green-100 text-green-600' : ($user->status == 'inactive' ? 'bg-red-100 text-red-600' : 'bg-yellow-100 text-yellow-600') }} text-xs">
                                                {{ $user->status == 'active' ? 'Aktif' : ($user->status == 'inactive' ? 'Tidak Aktif' : 'Dibanned') }}
                                            </span>
                                        </td>
                                        <td class="p-3 text-[12px] text-gray-900">{{ $user->created_at->format('Y-m-d') }}</td>
                                        <td class="p-3">
                                            <div class="flex gap-2">
                                                <a href="{{ route('admin.users.show', $user->id) }}" class="w-8 h-8 rounded-md bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 text-[12px]" aria-label="Lihat {{ $user->name }}"><i class="fas fa-eye"></i></a>
                                                <button onclick="showEditModal({{ $user->id }})" class="w-8 h-8 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200 text-[12px]" aria-label="Edit {{ $user->name }}"><i class="fas fa-edit"></i></button>
                                                <button onclick="showDeleteModal('{{ $user->name }}', {{ $user->id }})" class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-[12px]" aria-label="Hapus {{ $user->name }}"><i class="fas fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="p-3 text-center text-[12px] text-gray-600">Tidak ada pengguna ditemukan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="flex justify-center mt-5 gap-2">
                        {{ $users->appends(request()->query())->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>

            <!-- Sidebar Riwayat Keseharian -->
            <div class="history-sidebar bg-white rounded-lg p-6 shadow-sm lg:w-1/4">
                <h2 class="text-lg font-semibold flex items-center gap-2 mb-4 text-gray-900">
                    <i class="fas fa-history text-yellow-400 text-lg"></i>
                    Riwayat Keseharian
                </h2>
                <div class="sidebar-history overflow-y-auto pr-2">
                    @forelse ($activities as $activity)
                        <div class="mb-4 pb-4 border-b border-gray-200">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-sm font-medium text-gray-900">{{ $activity->created_at->isToday() ? 'Hari ini' : ($activity->created_at->isYesterday() ? 'Kemarin' : $activity->created_at->format('d M Y')) }}</span>
                                <span class="text-xs text-gray-500">{{ $activity->created_at->format('H:i') }}</span>
                            </div>
                            <p class="text-xs text-gray-600">{{ $activity->description }}</p>
                        </div>
                    @empty
                        <p class="text-xs text-gray-600">Belum ada riwayat aktivitas.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Modal Create User -->
        <div class="modal hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 modal-overlay" id="createModal">
            <div class="bg-white rounded-xl p-4 w-full max-w-md mx-4 shadow-xl">
                <div class="flex justify-between items-center mb-3 bg-gradient-to-r from-blue-400 to-blue-500 text-white rounded-t-xl p-3">
                    <h3 class="text-lg font-semibold">Tambah Pengguna Baru</h3>
                    <button class="text-2xl hover:text-gray-200 transition-colors" onclick="closeCreateModal()" aria-label="Tutup modal">&times;</button>
                </div>
                <form id="createUserForm" action="{{ route('admin.users.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1.5">Nama Lengkap</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                        @error('name')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="username" class="block text-sm font-medium text-gray-700 mb-1.5">Username</label>
                        <input type="text" id="username" name="username" value="{{ old('username') }}" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                        @error('username')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                        @error('email')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1.5">Password</label>
                        <input type="password" id="password" name="password" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                        @error('password')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1.5">Konfirmasi Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                    </div>
                    <div class="mb-3">
                        <label for="avatar" class="block text-sm font-medium text-gray-700 mb-1.5">Avatar URL (opsional)</label>
                        <input type="text" id="avatar" name="avatar" value="{{ old('avatar') }}" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                        @error('avatar')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="bio" class="block text-sm font-medium text-gray-700 mb-1.5">Bio (opsional)</label>
                        <textarea id="bio" name="bio" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">{{ old('bio') }}</textarea>
                        @error('bio')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="role" class="block text-sm font-medium text-gray-700 mb-1.5">Peran</label>
                        <select id="role" name="role" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                            <option value="member" {{ old('role') == 'member' ? 'selected' : '' }}>Member</option>
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="kurator" {{ old('role') == 'kurator' ? 'selected' : '' }}>Kurator</option>
                        </select>
                        @error('role')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-1.5">Status</label>
                        <select id="status" name="status" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                            <option value="banned" {{ old('status') == 'banned' ? 'selected' : '' }}>Dibanned</option>
                        </select>
                        @error('status')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex justify-end gap-3 mt-4">
                        <button type="button" class="bg-gray-200 hover:bg-gray-300 text-gray-900 text-sm font-medium px-4 py-1.5 rounded-md transition-colors" onclick="closeCreateModal()">Batal</button>
                        <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-1.5 rounded-md transition-colors">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal Edit User -->
        <div class="modal hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 modal-overlay" id="editModal">
            <div class="bg-white rounded-xl p-4 w-full max-w-md mx-4 shadow-xl">
                <div class="flex justify-between items-center mb-3 bg-gradient-to-r from-blue-400 to-blue-500 text-white rounded-t-xl p-3">
                    <h3 class="text-lg font-semibold">Edit Pengguna</h3>
                    <button class="text-2xl hover:text-gray-200 transition-colors" onclick="closeEditModal()" aria-label="Tutup modal">&times;</button>
                </div>
                <form id="editUserForm" action="{{ route('admin.users.update', ':id') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit_id" name="id">
                    <div class="mb-3">
                        <label for="edit_name" class="block text-sm font-medium text-gray-700 mb-1.5">Nama Lengkap</label>
                        <input type="text" id="edit_name" name="name" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                        @error('name')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="edit_username" class="block text-sm font-medium text-gray-700 mb-1.5">Username</label>
                        <input type="text" id="edit_username" name="username" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                        @error('username')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="edit_email" class="block text-sm font-medium text-gray-700 mb-1.5">Email</label>
                        <input type="email" id="edit_email" name="email" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                        @error('email')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="edit_password" class="block text-sm font-medium text-gray-700 mb-1.5">Password (biarkan kosong jika tidak diubah)</label>
                        <input type="password" id="edit_password" name="password" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                        @error('password')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="edit_password_confirmation" class="block text-sm font-medium text-gray-700 mb-1.5">Konfirmasi Password</label>
                        <input type="password" id="edit_password_confirmation" name="password_confirmation" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                    </div>
                    <div class="mb-3">
                        <label for="edit_avatar" class="block text-sm font-medium text-gray-700 mb-1.5">Avatar URL (opsional)</label>
                        <input type="text" id="edit_avatar" name="avatar" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                        @error('avatar')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="edit_bio" class="block text-sm font-medium text-gray-700 mb-1.5">Bio (opsional)</label>
                        <textarea id="edit_bio" name="bio" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400"></textarea>
                        @error('bio')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="edit_role" class="block text-sm font-medium text-gray-700 mb-1.5">Peran</label>
                        <select id="edit_role" name="role" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                            <option value="member">Member</option>
                            <option value="admin">Admin</option>
                            <option value="kurator">Kurator</option>
                        </select>
                        @error('role')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="edit_status" class="block text-sm font-medium text-gray-700 mb-1.5">Status</label>
                        <select id="edit_status" name="status" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                            <option value="active">Aktif</option>
                            <option value="inactive">Tidak Aktif</option>
                            <option value="banned">Dibanned</option>
                        </select>
                        @error('status')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex justify-end gap-3 mt-4">
                        <button type="button" class="bg-gray-200 hover:bg-gray-300 text-gray-900 text-sm font-medium px-4 py-1.5 rounded-md transition-colors" onclick="closeEditModal()">Batal</button>
                        <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-1.5 rounded-md transition-colors">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal Delete User -->
        <div class="modal hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 modal-overlay" id="deleteModal">
            <div class="bg-white rounded-xl p-4 w-full max-w-md mx-4 shadow-xl">
                <div class="flex justify-between items-center mb-3 bg-gradient-to-r from-red-400 to-red-500 text-white rounded-t-xl p-3">
                    <h3 class="text-lg font-semibold">Hapus Pengguna</h3>
                    <button class="text-2xl hover:text-gray-200 transition-colors" onclick="closeDeleteModal()" aria-label="Tutup modal">&times;</button>
                </div>
                <form id="deleteUserForm" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="mb-3 text-sm text-gray-700">
                        <p class="mb-2">Apakah Anda yakin ingin menghapus pengguna <strong id="deleteUserName"></strong>?</p>
                        <p>Tindakan ini tidak dapat dibatalkan dan semua data terkait pengguna ini akan dihapus permanen.</p>
                    </div>
                    <div class="flex justify-end gap-3">
                        <button type="button" class="bg-gray-200 hover:bg-gray-300 text-gray-900 text-sm font-medium px-4 py-1.5 rounded-md transition-colors" onclick="closeDeleteModal()">Batal</button>
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white text-sm font-medium px-4 py-1.5 rounded-md transition-colors">Hapus Pengguna</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            // Modal functions for Create
            function showCreateModal() {
                const modal = document.getElementById('createModal');
                modal.classList.remove('hidden');
                modal.classList.add('show');
                document.getElementById('createUserForm').reset();
            }

            function closeCreateModal() {
                const modal = document.getElementById('createModal');
                modal.classList.remove('show');
                setTimeout(() => modal.classList.add('hidden'), 300);
                document.getElementById('createUserForm').reset();
            }

            // Modal functions for Edit
            function showEditModal(userId) {
                fetch('{{ route("admin.users.edit", ":id") }}'.replace(':id', userId), {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(user => {
                    document.getElementById('edit_id').value = user.id;
                    document.getElementById('edit_name').value = user.name;
                    document.getElementById('edit_username').value = user.username;
                    document.getElementById('edit_email').value = user.email;
                    document.getElementById('edit_avatar').value = user.avatar || '';
                    document.getElementById('edit_bio').value = user.bio || '';
                    document.getElementById('edit_role').value = user.role;
                    document.getElementById('edit_status').value = user.status;
                    document.getElementById('edit_password').value = '';
                    document.getElementById('edit_password_confirmation').value = '';
                    document.getElementById('editUserForm').action = '{{ route("admin.users.update", ":id") }}'.replace(':id', user.id);

                    const modal = document.getElementById('editModal');
                    modal.classList.remove('hidden');
                    modal.classList.add('show');
                })
                .catch(error => {
                    console.error('Error fetching user data:', error);
                    alert('Gagal mengambil data pengguna. Silakan coba lagi.');
                });
            }

            function closeEditModal() {
                const modal = document.getElementById('editModal');
                modal.classList.remove('show');
                setTimeout(() => modal.classList.add('hidden'), 300);
                document.getElementById('editUserForm').reset();
            }

            // Modal functions for Delete
            function showDeleteModal(userName, userId) {
                const modal = document.getElementById('deleteModal');
                const userNameElement = document.getElementById('deleteUserName');
                userNameElement.textContent = userName;
                document.getElementById('deleteUserForm').action = '{{ route("admin.users.destroy", ":id") }}'.replace(':id', userId);
                modal.classList.remove('hidden');
                modal.classList.add('show');
            }

            function closeDeleteModal() {
                const modal = document.getElementById('deleteModal');
                modal.classList.remove('show');
                setTimeout(() => modal.classList.add('hidden'), 300);
            }

            document.getElementById('createUserForm').addEventListener('submit', function(e) {
                const password = document.getElementById('password').value;
                const passwordConfirmation = document.getElementById('password_confirmation').value;
                if (password !== passwordConfirmation) {
                    e.preventDefault();
                    alert('Password dan konfirmasi password tidak cocok!');
                }
            });

            document.getElementById('editUserForm').addEventListener('submit', function(e) {
                const password = document.getElementById('edit_password').value;
                const passwordConfirmation = document.getElementById('edit_password_confirmation').value;
                if (password && password !== passwordConfirmation) {
                    e.preventDefault();
                    alert('Password dan konfirmasi password tidak cocok!');
                }
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
</x-admin-layout>