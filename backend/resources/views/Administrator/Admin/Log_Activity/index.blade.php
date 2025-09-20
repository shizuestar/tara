<x-admin-layout>
    <div class="bg-gray-100 min-h-screen p-2">
        <div class="max-w-7xl mx-auto bg-white rounded-lg shadow-lg p-6">
            <!-- Page Header -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6 border-b border-gray-200 pb-4">
                <h1 class="text-2xl font-bold text-gray-900 flex items-center gap-3">
                    <i class="fas fa-history text-yellow-400 text-xl"></i>
                    Log Aktivitas
                </h1>
                <div class="flex items-center gap-3">
                    <div class="relative">
                        <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-600"></i>
                        <input type="text" name="keyword" placeholder="Cari deskripsi..." class="pl-10 p-2 border border-gray-300 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" value="{{ request('keyword') }}">
                    </div>
                </div>
            </div>

            <!-- Settings Container -->
            <div class="grid grid-cols-1 lg:grid-cols-[250px_1fr] gap-6">
                <!-- Sidebar -->
                <div class="bg-white rounded-lg shadow-lg p-4 sticky top-6">
                    <a href="{{ route('admin.activity-logs.index') }}" class="settings-menu-item {{ is_null($type) ? 'active' : '' }}" data-target="all-logs">
                        <i class="fas fa-list text-yellow-400"></i>
                        <span>Semua Log</span>
                    </a>
                    <a href="{{ route('admin.activity-logs.index', ['type' => 'community']) }}" class="settings-menu-item {{ $type == 'community' ? 'active' : '' }}" data-target="community-logs">
                        <i class="fas fa-users text-yellow-400"></i>
                        <span>Log Komunitas</span>
                    </a>
                    <a href="{{ route('admin.activity-logs.index', ['type' => 'project']) }}" class="settings-menu-item {{ $type == 'project' ? 'active' : '' }}" data-target="project-logs">
                        <i class="fas fa-project-diagram text-yellow-400"></i>
                        <span>Log Proyek</span>
                    </a>
                    <a href="{{ route('admin.activity-logs.index', ['type' => 'blog']) }}" class="settings-menu-item {{ $type == 'blog' ? 'active' : '' }}" data-target="blog-logs">
                        <i class="fas fa-blog text-yellow-400"></i>
                        <span>Log Blog</span>
                    </a>
                    <a href="{{ route('admin.activity-logs.index', ['type' => 'event']) }}" class="settings-menu-item {{ $type == 'event' ? 'active' : '' }}" data-target="agenda-logs">
                        <i class="fas fa-calendar-alt text-yellow-400"></i>
                        <span>Log Agenda</span>
                    </a>
                    <a href="{{ route('admin.activity-logs.index', ['type' => 'category']) }}" class="settings-menu-item {{ $type == 'category' ? 'active' : '' }}" data-target="category-logs">
                        <i class="fas fa-tags text-yellow-400"></i>
                        <span>Log Kategori</span>
                    </a>
                    <a href="{{ route('admin.activity-logs.index', ['type' => 'user']) }}" class="settings-menu-item {{ $type == 'user' ? 'active' : '' }}" data-target="user-logs">
                        <i class="fas fa-user text-yellow-400"></i>
                        <span>Log User</span>
                    </a>
                    <a href="{{ route('admin.activity-logs.index', ['type' => 'artwork']) }}" class="settings-menu-item {{ $type == 'artwork' ? 'active' : '' }}" data-target="galeri-logs">
                        <i class="fas fa-images text-yellow-400"></i>
                        <span>Log Galeri</span>
                    </a>
                    <a href="{{ route('admin.activity-logs.index', ['type' => 'settings']) }}" class="settings-menu-item {{ $type == 'settings' ? 'active' : '' }}" data-target="settings-logs">
                        <i class="fas fa-cog text-yellow-400"></i>
                        <span>Log Settings</span>
                    </a>
                </div>

                <!-- Content -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <!-- All Logs Section -->
                    <div class="settings-section {{ is_null($type) ? 'active' : '' }}" id="all-logs">
                        <h2 class="text-xl font-semibold text-gray-900 mb-4 border-b border-gray-200 pb-2">Semua Log Aktivitas</h2>
                        <form method="GET" action="{{ route('admin.activity-logs.index') }}" class="mb-6 grid grid-cols-1 sm:grid-cols-4 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-600 mb-1">User</label>
                                <select name="user_id" class="w-full p-2 border border-gray-300 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                                    <option value="">Semua User</option>
                                    @foreach ($users ?? [] as $user)
                                        <option value="{{ $user->id }}" {{ request('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-600 mb-1">Tanggal Mulai</label>
                                <input type="date" name="start_date" class="w-full p-2 border border-gray-300 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" value="{{ request('start_date') }}">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-600 mb-1">Tanggal Akhir</label>
                                <input type="date" name="end_date" class="w-full p-2 border border-gray-300 rounded-md text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400" value="{{ request('end_date') }}">
                            </div>
                            <div class="flex items-end">
                                <button type="submit" class="w-full bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-4 py-2 rounded-md">Filter</button>
                            </div>
                        </form>
                        <div class="overflow-x-auto rounded-lg shadow-sm">
                            <table class="w-full min-w-max">
                                <thead>
                                    <tr class="bg-gray-100 text-gray-600 uppercase text-sm">
                                        <th class="p-4 text-left">User</th>
                                        <th class="p-4 text-left">Deskripsi</th>
                                        <th class="p-4 text-left">Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($logs ?? [] as $log)
                                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                                            <td class="p-4">{{ $log->user->name ?? 'Sistem' }}</td>
                                            <td class="p-4">{{ $log->description }}</td>
                                            <td class="p-4">{{ $log->created_at->format('d M Y, H:i') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $logs->links() ?? '' }}
                    </div>

                    <!-- Community Logs Section -->
                    <div class="settings-section {{ $type == 'community' ? 'active' : '' }}" id="community-logs">
                        <h2 class="text-xl font-semibold text-gray-900 mb-4 border-b border-gray-200 pb-2">Log Aktivitas Komunitas</h2>
                        <div class="overflow-x-auto rounded-lg shadow-sm">
                            <table class="w-full min-w-max">
                                <thead>
                                    <tr class="bg-gray-100 text-gray-600 uppercase text-sm">
                                        <th class="p-4 text-left">User</th>
                                        <th class="p-4 text-left">Deskripsi</th>
                                        <th class="p-4 text-left">Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($logs ?? [] as $log)
                                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                                            <td class="p-4">{{ $log->user->name ?? 'Sistem' }}</td>
                                            <td class="p-4">{{ $log->description }}</td>
                                            <td class="p-4">{{ $log->created_at->format('d M Y, H:i') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $logs->links() ?? '' }}
                    </div>

                    <!-- Project Logs Section -->
                    <div class="settings-section {{ $type == 'project' ? 'active' : '' }}" id="project-logs">
                        <h2 class="text-xl font-semibold text-gray-900 mb-4 border-b border-gray-200 pb-2">Log Aktivitas Proyek</h2>
                        <div class="overflow-x-auto rounded-lg shadow-sm">
                            <table class="w-full min-w-max">
                                <thead>
                                    <tr class="bg-gray-100 text-gray-600 uppercase text-sm">
                                        <th class="p-4 text-left">User</th>
                                        <th class="p-4 text-left">Deskripsi</th>
                                        <th class="p-4 text-left">Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($logs ?? [] as $log)
                                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                                            <td class="p-4">{{ $log->user->name ?? 'Sistem' }}</td>
                                            <td class="p-4">{{ $log->description }}</td>
                                            <td class="p-4">{{ $log->created_at->format('d M Y, H:i') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $logs->links() ?? '' }}
                    </div>

                    <!-- Blog Logs Section -->
                    <div class="settings-section {{ $type == 'blog' ? 'active' : '' }}" id="blog-logs">
                        <h2 class="text-xl font-semibold text-gray-900 mb-4 border-b border-gray-200 pb-2">Log Aktivitas Blog</h2>
                        <div class="overflow-x-auto rounded-lg shadow-sm">
                            <table class="w-full min-w-max">
                                <thead>
                                    <tr class="bg-gray-100 text-gray-600 uppercase text-sm">
                                        <th class="p-4 text-left">User</th>
                                        <th class="p-4 text-left">Deskripsi</th>
                                        <th class="p-4 text-left">Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($logs ?? [] as $log)
                                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                                            <td class="p-4">{{ $log->user->name ?? 'Sistem' }}</td>
                                            <td class="p-4">{{ $log->description }}</td>
                                            <td class="p-4">{{ $log->created_at->format('d M Y, H:i') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $logs->links() ?? '' }}
                    </div>

                    <div class="settings-section {{ $type == 'event' ? 'active' : '' }}" id="agenda-logs">
                        <h2 class="text-xl font-semibold text-gray-900 mb-4 border-b border-gray-200 pb-2">Log Aktivitas Agenda</h2>
                        <div class="overflow-x-auto rounded-lg shadow-sm">
                            <table class="w-full min-w-max">
                                <thead>
                                    <tr class="bg-gray-100 text-gray-600 uppercase text-sm">
                                        <th class="p-4 text-left">User</th>
                                        <th class="p-4 text-left">Deskripsi</th>
                                        <th class="p-4 text-left">Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($logs ?? [] as $log)
                                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                                            <td class="p-4">{{ $log->user->name ?? 'Sistem' }}</td>
                                            <td class="p-4">{{ $log->description }}</td>
                                            <td class="p-4">{{ $log->created_at->format('d M Y, H:i') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $logs->links() ?? '' }}
                    </div>

                    <!-- Category Logs Section -->
                    <div class="settings-section {{ $type == 'category' ? 'active' : '' }}" id="category-logs">
                        <h2 class="text-xl font-semibold text-gray-900 mb-4 border-b border-gray-200 pb-2">Log Aktivitas Kategori</h2>
                        <div class="overflow-x-auto rounded-lg shadow-sm">
                            <table class="w-full min-w-max">
                                <thead>
                                    <tr class="bg-gray-100 text-gray-600 uppercase text-sm">
                                        <th class="p-4 text-left">User</th>
                                        <th class="p-4 text-left">Deskripsi</th>
                                        <th class="p-4 text-left">Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($logs ?? [] as $log)
                                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                                            <td class="p-4">{{ $log->user->name ?? 'Sistem' }}</td>
                                            <td class="p-4">{{ $log->description }}</td>
                                            <td class="p-4">{{ $log->created_at->format('d M Y, H:i') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $logs->links() ?? '' }}
                    </div>

                    <!-- User Logs Section -->
                    <div class="settings-section {{ $type == 'user' ? 'active' : '' }}" id="user-logs">
                        <h2 class="text-xl font-semibold text-gray-900 mb-4 border-b border-gray-200 pb-2">Log Aktivitas User</h2>
                        <div class="overflow-x-auto rounded-lg shadow-sm">
                            <table class="w-full min-w-max">
                                <thead>
                                    <tr class="bg-gray-100 text-gray-600 uppercase text-sm">
                                        <th class="p-4 text-left">User</th>
                                        <th class="p-4 text-left">Deskripsi</th>
                                        <th class="p-4 text-left">Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($logs ?? [] as $log)
                                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                                            <td class="p-4">{{ $log->user->name ?? 'Sistem' }}</td>
                                            <td class="p-4">{{ $log->description }}</td>
                                            <td class="p-4">{{ $log->created_at->format('d M Y, H:i') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $logs->links() ?? '' }}
                    </div>

                    <!-- Galeri Logs Section -->
                    <div class="settings-section {{ $type == 'artwork' ? 'active' : '' }}" id="galeri-logs">
                        <h2 class="text-xl font-semibold text-gray-900 mb-4 border-b border-gray-200 pb-2">Log Aktivitas Galeri</h2>
                        <div class="overflow-x-auto rounded-lg shadow-sm">
                            <table class="w-full min-w-max">
                                <thead>
                                    <tr class="bg-gray-100 text-gray-600 uppercase text-sm">
                                        <th class="p-4 text-left">User</th>
                                        <th class="p-4 text-left">Deskripsi</th>
                                        <th class="p-4 text-left">Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($logs ?? [] as $log)
                                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                                            <td class="p-4">{{ $log->user->name ?? 'Sistem' }}</td>
                                            <td class="p-4">{{ $log->description }}</td>
                                            <td class="p-4">{{ $log->created_at->format('d M Y, H:i') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $logs->links() ?? '' }}
                    </div>

                    <!-- Settings Logs Section -->
                    <div class="settings-section {{ $type == 'settings' ? 'active' : '' }}" id="settings-logs">
                        <h2 class="text-xl font-semibold text-gray-900 mb-4 border-b border-gray-200 pb-2">Log Aktivitas Settings</h2>
                        <div class="overflow-x-auto rounded-lg shadow-sm">
                            <table class="w-full min-w-max">
                                <thead>
                                    <tr class="bg-gray-100 text-gray-600 uppercase text-sm">
                                        <th class="p-4 text-left">User</th>
                                        <th class="p-4 text-left">Deskripsi</th>
                                        <th class="p-4 text-left">Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($logs ?? [] as $log)
                                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                                            <td class="p-4">{{ $log->user->name ?? 'Sistem' }}</td>
                                            <td class="p-4">{{ $log->description }}</td>
                                            <td class="p-4">{{ $log->created_at->format('d M Y, H:i') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $logs->links() ?? '' }}
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