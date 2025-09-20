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
            .dropzone {
                border: 2px dashed #d1d5db;
                transition: border-color 0.3s ease;
            }
            .dropzone:hover {
                border-color: #FACC15;
            }
        </style>
    @endpush

    <div class="bg-gray-100 min-h-screen p-2">
        <div class="max-w-7xl mx-auto flex flex-col lg:flex-row gap-4">
            <div class="main-content bg-white rounded-lg p-6 shadow-sm lg:w-3/4">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
                    <h1 class="text-xl font-semibold flex items-center gap-2 text-gray-900 font-['Space_Grotesk']">
                        <i class="fas fa-users text-yellow-400 text-lg"></i>
                        Manajemen Pengguna
                    </h1>
                    <button onclick="showCreateModal()" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors font-['Space_Grotesk']">
                        <i class="fas fa-plus text-sm"></i>
                        Tambah Pengguna Baru
                    </button>
                </div>
                <div class="bg-white rounded-lg p-5 mb-8 border border-gray-200">
                    <h3 class="text-lg font-semibold flex items-center gap-2 mb-4 text-gray-900 font-['Space_Grotesk']">
                        <i class="fas fa-filter text-yellow-400 text-base"></i>
                        Filter Pengguna
                    </h3>
                    <form id="filterForm" action="{{ route('admin.users.index') }}" method="GET">
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                            <div>
                                <label for="role-filter" class="block text-sm font-medium text-gray-700 mb-1.5 font-['Space_Grotesk']">Peran</label>
                                <select id="role-filter" name="role" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']">
                                    <option value="">Semua Peran</option>
                                    <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="kurator" {{ request('role') == 'kurator' ? 'selected' : '' }}>Kurator</option>
                                    <option value="member" {{ request('role') == 'member' ? 'selected' : '' }}>Member</option>
                                </select>
                            </div>
                            <div>
                                <label for="status-filter" class="block text-sm font-medium text-gray-700 mb-1.5 font-['Space_Grotesk']">Status</label>
                                <select id="status-filter" name="status" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']">
                                    <option value="">Semua Status</option>
                                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                                    <option value="banned" {{ request('status') == 'banned' ? 'selected' : '' }}>Dibanned</option>
                                </select>
                            </div>
                            <div>
                                <label for="date-filter" class="block text-sm font-medium text-gray-700 mb-1.5 font-['Space_Grotesk']">Tanggal Bergabung</label>
                                <select id="date-filter" name="year" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']">
                                    <option value="">Semua</option>
                                    <option value="2025" {{ request('year') == '2025' ? 'selected' : '' }}>2025</option>
                                    <option value="2024" {{ request('year') == '2024' ? 'selected' : '' }}>2024</option>
                                    <option value="2023" {{ request('year') == '2023' ? 'selected' : '' }}>2023</option>
                                </select>
                            </div>
                            <div>
                                <label for="keyword-filter" class="block text-sm font-medium text-gray-700 mb-1.5 font-['Space_Grotesk']">Kata Kunci</label>
                                <input id="keyword-filter" name="keyword" type="text" value="{{ request('keyword') }}" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" placeholder="Cari nama, username, atau email...">
                            </div>
                        </div>
                        <div class="flex gap-3 mt-4">
                            <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors font-['Space_Grotesk']">
                                <i class="fas fa-filter text-sm"></i>
                                Terapkan
                            </button>
                            <a href="{{ route('admin.users.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-900 text-sm font-medium px-4 py-2 rounded-md flex items-center gap-2 transition-colors font-['Space_Grotesk']">
                                <i class="fas fa-redo text-sm"></i>
                                Reset
                            </a>
                        </div>
                    </form>
                </div>
                <div class="bg-white rounded-lg p-5 border border-gray-200">
                    <div class="flex justify-between items-center gap-4 mb-5">
                        <h2 class="text-lg font-semibold text-gray-900 font-['Space_Grotesk']">Daftar Pengguna</h2>
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
                                                <button onclick="showDeleteModal('{{ addslashes($user->name) }}', {{ $user->id }})" class="w-8 h-8 rounded-md bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 text-[12px]" aria-label="Hapus {{ $user->name }}"><i class="fas fa-trash"></i></button>
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
            <div class="history-sidebar bg-white rounded-lg p-6 shadow-sm lg:w-1/4">
                <h2 class="text-lg font-semibold flex items-center gap-2 mb-4 text-gray-900 font-['Space_Grotesk']">
                    <i class="fas fa-history text-yellow-400 text-lg"></i>
                    Riwayat Keseharian
                </h2>
                <div class="sidebar-history overflow-y-auto pr-2">
                    @forelse ($activities as $activity)
                        <div class="mb-4 pb-4 border-b border-gray-200">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-sm font-medium text-gray-900 font-['Space_Grotesk']">
                                    {{ $activity->created_at->isToday() ? 'Hari ini' : ($activity->created_at->isYesterday() ? 'Kemarin' : $activity->created_at->translatedFormat('d M Y')) }}
                                </span>
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
        <div class="modal hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 modal-overlay" id="createModal">
            <div class="bg-white rounded-xl p-4 w-full max-w-2xl mx-4 shadow-xl">
                <div class="flex justify-between items-center mb-3 bg-gradient-to-r from-yellow-400 to-yellow-500 text-white rounded-t-xl p-3">
                    <h3 class="text-lg font-semibold font-['Space_Grotesk']">Tambah Pengguna Baru</h3>
                    <button class="text-2xl hover:text-gray-200 transition-colors" onclick="closeCreateModal()" aria-label="Tutup modal">&times;</button>
                </div>
                <form id="createUserForm" action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="create_avatar" class="block text-sm font-medium text-gray-700 mb-1.5 font-['Space_Grotesk']">Avatar (opsional)</label>
                            <div class="w-full h-32 p-4 border-2 border-dashed border-gray-200 rounded-lg text-center dropzone cursor-pointer" onclick="document.getElementById('create_avatar').click()">
                                <input type="file" id="create_avatar" name="avatar" accept="image/*" class="hidden" onchange="previewImage(this, 'create_avatar_preview')">
                                <p class="text-sm text-gray-600">Klik atau seret gambar</p>
                            </div>
                            <img id="create_avatar_preview" class="mt-2 w-full h-32 object-cover rounded-lg hidden" alt="Pratinjau avatar">
                            @error('avatar')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="create_name" class="block text-sm font-medium text-gray-700 mb-1.5 font-['Space_Grotesk']">Nama Lengkap</label>
                            <input type="text" id="create_name" name="name" value="{{ old('name') }}" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required>
                            @error('name')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                            <label for="create_username" class="block text-sm font-medium text-gray-700 mb-1.5 mt-3 font-['Space_Grotesk']">Username</label>
                            <input type="text" id="create_username" name="username" value="{{ old('username') }}" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required>
                            @error('username')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="create_email" class="block text-sm font-medium text-gray-700 mb-1.5 font-['Space_Grotesk']">Email</label>
                            <input type="email" id="create_email" name="email" value="{{ old('email') }}" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required>
                            @error('email')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                            <label for="create_password" class="block text-sm font-medium text-gray-700 mb-1.5 mt-3 font-['Space_Grotesk']">Password</label>
                            <input type="password" id="create_password" name="password" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required>
                            @error('password')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="create_password_confirmation" class="block text-sm font-medium text-gray-700 mb-1.5 font-['Space_Grotesk']">Konfirmasi Password</label>
                            <input type="password" id="create_password_confirmation" name="password_confirmation" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required>
                            <label for="create_bio" class="block text-sm font-medium text-gray-700 mb-1.5 mt-3 font-['Space_Grotesk']">Bio (opsional)</label>
                            <textarea id="create_bio" name="bio" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']">{{ old('bio') }}</textarea>
                            @error('bio')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="create_role" class="block text-sm font-medium text-gray-700 mb-1.5 font-['Space_Grotesk']">Peran</label>
                            <select id="create_role" name="role" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required>
                                <option value="member" {{ old('role') == 'member' ? 'selected' : '' }}>Member</option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="kurator" {{ old('role') == 'kurator' ? 'selected' : '' }}>Kurator</option>
                            </select>
                            @error('role')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="create_status" class="block text-sm font-medium text-gray-700 mb-1.5 font-['Space_Grotesk']">Status</label>
                            <select id="create_status" name="status" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required>
                                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                                <option value="banned" {{ old('status') == 'banned' ? 'selected' : '' }}>Dibanned</option>
                            </select>
                            @error('status')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex justify-end gap-3 mt-4">
                        <button type="button" class="bg-gray-200 hover:bg-gray-300 text-gray-900 text-sm font-medium px-4 py-1.5 rounded-md transition-colors font-['Space_Grotesk']" onclick="closeCreateModal()">Batal</button>
                        <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-1.5 rounded-md transition-colors font-['Space_Grotesk']">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 modal-overlay" id="editModal">
            <div class="bg-white rounded-xl p-4 w-full max-w-2xl mx-4 shadow-xl">
                <div class="flex justify-between items-center mb-3 bg-gradient-to-r from-blue-400 to-blue-500 text-white rounded-t-xl p-3">
                    <h3 class="text-lg font-semibold font-['Space_Grotesk']">Edit Pengguna</h3>
                    <button class="text-2xl hover:text-gray-200 transition-colors" onclick="closeEditModal()" aria-label="Tutup modal">&times;</button>
                </div>
                <form id="editUserForm" action="{{ route('admin.users.update', ':id') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit_id" name="id">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="edit_avatar" class="block text-sm font-medium text-gray-700 mb-1.5 font-['Space_Grotesk']">Avatar (opsional)</label>
                            <div class="w-full h-32 p-4 border-2 border-dashed border-gray-200 rounded-lg text-center dropzone cursor-pointer" onclick="document.getElementById('edit_avatar').click()">
                                <input type="file" id="edit_avatar" name="avatar" accept="image/*" class="hidden" onchange="previewImage(this, 'edit_avatar_preview')">
                                <img id="edit_avatar_preview" class="w-full h-24 object-cover rounded-lg hidden" alt="Pratinjau avatar">
                                <p id="edit_avatar_placeholder" class="text-sm text-gray-600">Klik atau seret gambar</p>
                            </div>
                            @error('avatar')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="edit_name" class="block text-sm font-medium text-gray-700 mb-1.5 font-['Space_Grotesk']">Nama Lengkap</label>
                            <input type="text" id="edit_name" name="name" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required>
                            @error('name')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                            <label for="edit_username" class="block text-sm font-medium text-gray-700 mb-1.5 mt-3 font-['Space_Grotesk']">Username</label>
                            <input type="text" id="edit_username" name="username" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required>
                            @error('username')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="edit_email" class="block text-sm font-medium text-gray-700 mb-1.5 font-['Space_Grotesk']">Email</label>
                            <input type="email" id="edit_email" name="email" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required>
                            @error('email')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                            <label for="edit_password" class="block text-sm font-medium text-gray-700 mb-1.5 mt-3 font-['Space_Grotesk']">Password (kosongkan jika tidak diubah)</label>
                            <input type="password" id="edit_password" name="password" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']">
                            @error('password')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="edit_password_confirmation" class="block text-sm font-medium text-gray-700 mb-1.5 font-['Space_Grotesk']">Konfirmasi Password</label>
                            <input type="password" id="edit_password_confirmation" name="password_confirmation" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']">
                            <label for="edit_bio" class="block text-sm font-medium text-gray-700 mb-1.5 mt-3 font-['Space_Grotesk']">Bio (opsional)</label>
                            <textarea id="edit_bio" name="bio" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']"></textarea>
                            @error('bio')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="edit_role" class="block text-sm font-medium text-gray-700 mb-1.5 font-['Space_Grotesk']">Peran</label>
                            <select id="edit_role" name="role" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required>
                                <option value="member">Member</option>
                                <option value="admin">Admin</option>
                                <option value="kurator">Kurator</option>
                            </select>
                            @error('role')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="edit_status" class="block text-sm font-medium text-gray-700 mb-1.5 font-['Space_Grotesk']">Status</label>
                            <select id="edit_status" name="status" class="w-full p-2 border border-gray-200 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']" required>
                                <option value="active">Aktif</option>
                                <option value="inactive">Tidak Aktif</option>
                                <option value="banned">Dibanned</option>
                            </select>
                            @error('status')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex justify-end gap-3 mt-4">
                        <button type="button" class="bg-gray-200 hover:bg-gray-300 text-gray-900 text-sm font-medium px-4 py-1.5 rounded-md transition-colors font-['Space_Grotesk']" onclick="closeEditModal()">Batal</button>
                        <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-1.5 rounded-md transition-colors font-['Space_Grotesk']">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 modal-overlay" id="deleteModal">
            <div class="bg-white rounded-xl p-4 w-full max-w-md mx-4 shadow-xl">
                <div class="flex justify-between items-center mb-3 bg-gradient-to-r from-red-400 to-red-500 text-white rounded-t-xl p-3">
                    <h3 class="text-lg font-semibold font-['Space_Grotesk']">Hapus Pengguna</h3>
                    <button class="text-2xl hover:text-gray-200 transition-colors" onclick="closeDeleteModal()" aria-label="Tutup modal">&times;</button>
                </div>
                <form id="deleteUserForm" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="mb-3 text-sm text-gray-700 font-['Space_Grotesk']">
                        <p class="mb-2">Apakah Anda yakin ingin menghapus pengguna <strong id="deleteUserName"></strong>?</p>
                        <p>Tindakan ini tidak dapat dibatalkan dan semua data terkait pengguna ini akan dihapus permanen.</p>
                    </div>
                    <div class="flex justify-end gap-3">
                        <button type="button" class="bg-gray-200 hover:bg-gray-300 text-gray-900 text-sm font-medium px-4 py-1.5 rounded-md transition-colors font-['Space_Grotesk']" onclick="closeDeleteModal()">Batal</button>
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white text-sm font-medium px-4 py-1.5 rounded-md transition-colors font-['Space_Grotesk']">Hapus Pengguna</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function previewImage(input, previewId) {
                const preview = document.getElementById(previewId);
                const placeholder = document.getElementById(previewId.replace('preview', 'placeholder'));
                if (input.files && input.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.classList.remove('hidden');
                        if (placeholder) placeholder.classList.add('hidden');
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
            function showCreateModal() {
                const modal = document.getElementById('createModal');
                modal.classList.remove('hidden');
                modal.classList.add('show');
                document.getElementById('createUserForm').reset();
                document.getElementById('create_avatar_preview').classList.add('hidden');
                document.getElementById('create_avatar_preview').src = '';
            }
            function closeCreateModal() {
                const modal = document.getElementById('createModal');
                modal.classList.remove('show');
                setTimeout(() => modal.classList.add('hidden'), 300);
                document.getElementById('createUserForm').reset();
                document.getElementById('create_avatar_preview').classList.add('hidden');
                document.getElementById('create_avatar_preview').src = '';
            }
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
                    document.getElementById('edit_bio').value = user.bio || '';
                    document.getElementById('edit_role').value = user.role;
                    document.getElementById('edit_status').value = user.status;
                    document.getElementById('edit_password').value = '';
                    document.getElementById('edit_password_confirmation').value = '';
                    document.getElementById('editUserForm').action = '{{ route("admin.users.update", ":id") }}'.replace(':id', user.id);
                    const avatarPreview = document.getElementById('edit_avatar_preview');
                    const avatarPlaceholder = document.getElementById('edit_avatar_placeholder');
                    if (user.avatar) {
                        avatarPreview.src = user.avatar;
                        avatarPreview.classList.remove('hidden');
                        avatarPlaceholder.classList.add('hidden');
                    } else {
                        avatarPreview.classList.add('hidden');
                        avatarPlaceholder.classList.remove('hidden');
                    }
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
                document.getElementById('edit_avatar_preview').classList.add('hidden');
                document.getElementById('edit_avatar_preview').src = '';
                document.getElementById('edit_avatar_placeholder').classList.remove('hidden');
            }
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
                const password = document.getElementById('create_password').value;
                const passwordConfirmation = document.getElementById('create_password_confirmation').value;
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