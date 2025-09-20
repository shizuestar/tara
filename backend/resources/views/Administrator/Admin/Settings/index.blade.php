<x-admin-layout>
    <div class="bg-gray-100 min-h-screen p-2">
        <div class="max-w-7xl mx-auto bg-white rounded-lg shadow-lg p-6">
            <!-- Page Header -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6 border-b border-gray-200 pb-4">
                <h1 class="text-2xl font-bold text-gray-900 flex items-center gap-3">
                    <i class="fas fa-cog text-yellow-400 text-xl"></i>
                    Pengaturan Sistem
                </h1>
                <div class="flex items-center gap-3">
                    <div class="relative">
                        <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-600"></i>
                        <input type="text" placeholder="Cari pengaturan..." class="pl-10 p-2 border border-gray-300 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                    </div>
                </div>
            </div>

            <!-- Settings Container -->
            <div class="grid grid-cols-1 lg:grid-cols-[250px_1fr] gap-6">
                <!-- Sidebar -->
                <div class="bg-white rounded-lg shadow-lg p-4 sticky top-6">
                    <div class="settings-menu-item active" data-target="logo-platform">
                        <i class="fas fa-palette text-yellow-400"></i>
                        <span>Logo & Nama Platform</span>
                    </div>
                    <div class="settings-menu-item" data-target="backup-restore">
                        <i class="fas fa-database text-yellow-400"></i>
                        <span>Backup & Restore Data</span>
                    </div>
                </div>

                <!-- Content -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <!-- Logo & Nama Platform Section -->
                    <div class="settings-section active" id="logo-platform">
                        <h2 class="text-xl font-semibold text-gray-900 mb-4 border-b border-gray-200 pb-2">Logo & Nama Platform</h2>
                        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Nama Platform</label>
                                <input type="text" name="platform_name" class="w-full p-2 border border-gray-300 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" value="{{ $settings->platform_name ?? 'TARA Admin Panel' }}">
                                @error('platform_name')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Logo Platform</label>
                                <div class="logo-preview mb-2">
                                    <img id="logo-preview-img" src="{{ $settings->logo_path ? asset('storage/' . $settings->logo_path) : 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwIiBoZWlnaHQ9IjEwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwIiBoZWlnaHQ9IjEwMCIgZmlsbD0iI2U0ZTVlNiIvPjx0ZXh0IHg9IjUwIiB5PSI1MCIgZG9taW5hbnQtYmFzZWxpbmU9Im1pZGRsZSIgdGV4dC1hbmNob3I9Im1pZGRsZSIgZm9udC1mYW1pbHk9IkFyaWFsIiBmb250LXNpemU9IjE4IiBmaWxsPSIjNjY2Ij5Mb2dvPC90ZXh0Pjwvc3ZnPg==' }}" alt="Logo Preview">
                                </div>
                                <input type="file" id="logo-upload" name="logo" class="hidden" accept="image/png">
                                <label for="logo-upload" class="inline-flex items-center px-4 py-2 bg-gray-200 hover:bg-gray-300 border border-gray-300 rounded-md text-sm text-gray-900 cursor-pointer">
                                    <i class="fas fa-upload mr-2"></i> Unggah Logo
                                </label>
                                <div class="text-sm text-gray-600 mt-1">Rekomendasi: 200x200px, format PNG</div>
                                @error('logo')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Favicon</label>
                                <div class="logo-preview w-[60px] h-[60px] mb-2">
                                    <img id="favicon-preview-img" src="{{ $settings->favicon_path ? asset('storage/' . $settings->favicon_path) : 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzIiIGhlaWdodD0iMzIiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHJlY3Qgd2lkdGg9IjMyIiBoZWlnaHQ9IjMyIiBmaWxsPSIjZmZkNzAwIi8+PHRleHQgeD0iMTYiIHk9IjE2IiBkb21pbmFudC1iYXNlbGluZT0ibWlkZGxlIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIiBmb250LWZhbWlseT0iQXJpYWwiIGZvbnQtc2l6ZT0iMTAiIGZpbGw9IndoaXRlIj5UPC90ZXh0Pjwvc3ZnPg==' }}" alt="Favicon Preview">
                                </div>
                                <input type="file" id="favicon-upload" name="favicon" class="hidden" accept="image/png">
                                <label for="favicon-upload" class="inline-flex items-center px-4 py-2 bg-gray-200 hover:bg-gray-300 border border-gray-300 rounded-md text-sm text-gray-900 cursor-pointer">
                                    <i class="fas fa-upload mr-2"></i> Unggah Favicon
                                </label>
                                @error('favicon')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex justify-end gap-3">
                                <button type="button" class="bg-gray-200 hover:bg-gray-300 text-gray-900 text-sm font-medium px-4 py-2 rounded-md">Batal</button>
                                <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-2 rounded-md">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>

                    <!-- Backup & Restore Data Section -->
                    <div class="settings-section" id="backup-restore">
                        <h2 class="text-xl font-semibold text-gray-900 mb-4 border-b border-gray-200 pb-2">Backup & Restore Data</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
                            <form action="{{ route('admin.backups.create', ['type' => 'database']) }}" method="POST">
                                @csrf
                                <button type="submit" class="w-full p-4 bg-[#FFFBEB] border-l-4 border-yellow-400 rounded-md text-center hover:bg-yellow-50">
                                    <i class="fas fa-download text-yellow-400 text-2xl mb-2"></i>
                                    <div class="text-sm font-medium text-gray-900">Backup Database</div>
                                    <div class="text-xs text-gray-600">Ekspor seluruh data database</div>
                                </button>
                            </form>
                            <form action="{{ route('admin.backups.create', ['type' => 'media']) }}" method="POST">
                                @csrf
                                <button type="submit" class="w-full p-4 bg-[#FFFBEB] border-l-4 border-yellow-400 rounded-md text-center hover:bg-yellow-50">
                                    <i class="fas fa-file-export text-yellow-400 text-2xl mb-2"></i>
                                    <div class="text-sm font-medium text-gray-900">Backup Media</div>
                                    <div class="text-xs text-gray-600">Ekspor file media</div>
                                </button>
                            </form>
                            <form action="{{ route('admin.backups.restore') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <label class="w-full p-4 bg-[#FFFBEB] border-l-4 border-yellow-400 rounded-md text-center cursor-pointer hover:bg-yellow-50">
                                    <input type="file" name="backup_file" class="hidden" accept=".sql,.zip">
                                    <i class="fas fa-upload text-yellow-400 text-2xl mb-2"></i>
                                    <div class="text-sm font-medium text-gray-900">Restore Data</div>
                                    <div class="text-xs text-gray-600">Impor data dari backup</div>
                                </label>
                                @error('backup_file')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </form>
                        </div>
                        <form action="{{ route('admin.backups.schedule') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Jadwal Backup Otomatis</label>
                                <select name="schedule" class="w-full p-2 border border-gray-300 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                                    <option value="disabled" {{ $backup_schedule ?? 'disabled' == 'disabled' ? 'selected' : '' }}>Nonaktif</option>
                                    <option value="daily" {{ $backup_schedule ?? '' == 'daily' ? 'selected' : '' }}>Harian</option>
                                    <option value="weekly" {{ $backup_schedule ?? '' == 'weekly' ? 'selected' : '' }}>Mingguan</option>
                                    <option value="monthly" {{ $backup_schedule ?? '' == 'monthly' ? 'selected' : '' }}>Bulanan</option>
                                </select>
                                @error('schedule')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex justify-end gap-3 mt-4">
                                <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-2 rounded-md">Simpan Jadwal</button>
                            </div>
                        </form>
                        <div class="mt-6">
                            <h3 class="text-sm font-medium text-gray-600 mb-4">Riwayat Backup</h3>
                            <div class="space-y-2">
                                @foreach ($backups ?? [] as $backup)
                                    <div class="flex justify-between items-center p-3 bg-[#FFFBEB] border-l-4 border-yellow-400 rounded-md">
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">Backup {{ ucfirst($backup->type ?? '') }}</div>
                                            <div class="text-xs text-gray-600">{{ \Carbon\Carbon::parse($backup->created_at ?? now())->translatedFormat('d M Y, H:i:s') }}</div>
                                        </div>
                                        <a href="{{ route('admin.backups.download', $backup->id ?? '') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-900 text-sm font-medium px-3 py-1 rounded-md">Unduh</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @push('styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            body {
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
                overflow-x: hidden;
            }
            .settings-menu-item {
                display: flex;
                align-items: center;
                padding: 12px 16px;
                color: #111827;
                font-weight: 500;
                cursor: pointer;
                transition: all 0.3s ease;
                border-left: 4px solid transparent;
            }
            .settings-menu-item:hover {
                background: #FFFBEB;
                border-left-color: #FACC15;
            }
            .settings-menu-item.active {
                background: #FFFBEB;
                border-left-color: #FACC15;
                font-weight: 600;
            }
            .settings-menu-item i {
                width: 24px;
                margin-right: 12px;
                color: #6B7280;
                transition: color 0.3s ease;
            }
            .settings-menu-item.active i,
            .settings-menu-item:hover i {
                color: #FACC15;
            }
            .settings-section {
                display: none;
            }
            .settings-section.active {
                display: block;
                animation: fadeIn 0.3s ease;
            }
            .logo-preview {
                width: 150px;
                height: 150px;
                border: 1px dashed #D1D5DB;
                border-radius: 8px;
                display: flex;
                align-items: center;
                justify-content: center;
                overflow: hidden;
                background: #F3F4F6;
                transition: border-color 0.3s ease;
            }
            .logo-preview:hover {
                border-color: #FACC15;
            }
            .logo-preview img {
                max-width: 100%;
                max-height: 100%;
                object-fit: contain;
            }
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(10px); }
                to { opacity: 1; transform: translateY(0); }
            }
            @media (max-width: 1024px) {
                .grid-cols-[250px_1fr] {
                    grid-template-columns: 1fr;
                }
                .sticky {
                    position: static;
                }
            }
            @media (max-width: 768px) {
                .grid-cols-3 {
                    grid-template-columns: 1fr;
                }
            }
        </style>
        @endpush

        @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Menu item click handler
                const menuItems = document.querySelectorAll('.settings-menu-item');
                const sections = document.querySelectorAll('.settings-section');

                menuItems.forEach(item => {
                    item.addEventListener('click', function() {
                        const target = this.getAttribute('data-target');
                        menuItems.forEach(i => i.classList.remove('active'));
                        sections.forEach(s => s.classList.remove('active'));
                        this.classList.add('active');
                        document.getElementById(target).classList.add('active');
                    });
                });

                // Logo and favicon preview
                const logoInput = document.getElementById('logo-upload');
                const faviconInput = document.getElementById('favicon-upload');
                const logoPreview = document.getElementById('logo-preview-img');
                const faviconPreview = document.getElementById('favicon-preview-img');

                if (logoInput) {
                    logoInput.addEventListener('change', function() {
                        const file = this.files[0];
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                logoPreview.src = e.target.result;
                            };
                            reader.readAsDataURL(file);
                        }
                    });
                }

                if (faviconInput) {
                    faviconInput.addEventListener('change', function() {
                        const file = this.files[0];
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                faviconPreview.src = e.target.result;
                            };
                            reader.readAsDataURL(file);
                        }
                    });
                }

                // Prevent horizontal overflow
                document.body.style.overflowX = 'hidden';
                window.addEventListener('resize', () => {
                    document.body.style.overflowX = 'hidden';
                });
            });
        </script>
        @endpush
    </div>
</x-admin-layout>