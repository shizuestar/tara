<x-admin-layout>
    <div class="bg-white rounded-xl shadow-sm p-4">
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg flex items-center gap-2">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 mb-6">
            <h1 class="text-lg font-semibold flex items-center gap-2 text-gray-900 font-['Space_Grotesk']">
                <i class="fas fa-chart-bar text-yellow-400 text-base"></i>
                Laporan Platform
            </h1>
            <div class="flex gap-3 flex-wrap">
                <button onclick="exportReport('pdf')" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-3 py-1.5 rounded-lg flex items-center gap-2 transition-colors">
                    <i class="fas fa-file-pdf text-sm"></i>
                    Ekspor PDF
                </button>
                <button onclick="exportReport('excel')" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-3 py-1.5 rounded-lg flex items-center gap-2 transition-colors">
                    <i class="fas fa-file-excel text-sm"></i>
                    Ekspor Excel
                </button>
            </div>
        </div>

        <div class="bg-white rounded-lg p-4 mb-6 border border-gray-200">
            <h3 class="text-base font-semibold flex items-center gap-2 mb-3 text-gray-900 font-['Space_Grotesk']">
                <i class="fas fa-filter text-yellow-400 text-sm"></i>
                Filter Laporan
            </h3>
            <form method="GET" action="{{ route('admin.reports.index') }}">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                    <div>
                        <label for="start_date" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Tanggal Mulai</label>
                        <input type="date" id="start_date" name="start_date" value="{{ $startDate }}" class="w-full p-2 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']">
                    </div>
                    <div>
                        <label for="end_date" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Tanggal Selesai</label>
                        <input type="date" id="end_date" name="end_date" value="{{ $endDate }}" class="w-full p-2 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']">
                    </div>
                    <div>
                        <label for="category_id" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Kategori</label>
                        <select id="category_id" name="category_id" class="w-full p-2 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']">
                            <option value="">Semua Kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $categoryId == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="report_type" class="block text-sm font-medium text-gray-900 mb-1 font-['Space_Grotesk']">Tipe Laporan</label>
                        <select id="report_type" name="report_type" class="w-full p-2 border border-gray-200 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 font-['Space_Grotesk']">
                            <option value="general" {{ $reportType == 'general' ? 'selected' : '' }}>Umum</option>
                            <option value="users" {{ $reportType == 'users' ? 'selected' : '' }}>Pengguna</option>
                            <option value="communities" {{ $reportType == 'communities' ? 'selected' : '' }}>Komunitas</option>
                            <option value="projects" {{ $reportType == 'projects' ? 'selected' : '' }}>Proyek</option>
                            <option value="artworks" {{ $reportType == 'artworks' ? 'selected' : '' }}>Karya</option>
                            <option value="events" {{ $reportType == 'events' ? 'selected' : '' }}>Event</option>
                        </select>
                    </div>
                </div>
                <div class="flex gap-3 mt-3">
                    <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm font-medium px-3 py-1.5 rounded-lg flex items-center gap-2 transition-colors">
                        <i class="fas fa-filter text-sm"></i>
                        Terapkan
                    </button>
                    <a href="{{ route('admin.reports.index') }}" class="bg-gray-50 hover:bg-gray-100 text-gray-900 text-sm font-medium px-3 py-1.5 rounded-lg flex items-center gap-2 transition-colors">
                        <i class="fas fa-redo text-sm"></i>
                        Reset
                    </a>
                </div>
            </form>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-lg p-4 flex items-center gap-4 shadow-sm border-l-4 border-yellow-400">
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center text-yellow-400">
                    <i class="fas fa-users"></i>
                </div>
                <div>
                    <div class="text-xl font-bold text-gray-900">{{ $totalCommunities }}</div>
                    <div class="text-sm text-gray-600">Total Komunitas</div>
                </div>
            </div>
            <div class="bg-white rounded-lg p-4 flex items-center gap-4 shadow-sm border-l-4 border-yellow-400">
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center text-yellow-400">
                    <i class="fas fa-project-diagram"></i>
                </div>
                <div>
                    <div class="text-xl font-bold text-gray-900">{{ $totalProjects }}</div>
                    <div class="text-sm text-gray-600">Total Proyek</div>
                </div>
            </div>
            <div class="bg-white rounded-lg p-4 flex items-center gap-4 shadow-sm border-l-4 border-yellow-400">
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center text-yellow-400">
                    <i class="fas fa-images"></i>
                </div>
                <div>
                    <div class="text-xl font-bold text-gray-900">{{ $totalArtworks }}</div>
                    <div class="text-sm text-gray-600">Total Karya</div>
                </div>
            </div>
            <div class="bg-white rounded-lg p-4 flex items-center gap-4 shadow-sm border-l-4 border-yellow-400">
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center text-yellow-400">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <div>
                    <div class="text-xl font-bold text-gray-900">{{ $totalEvents }}</div>
                    <div class="text-sm text-gray-600">Total Event</div>
                </div>
            </div>
            <div class="bg-white rounded-lg p-4 flex items-center gap-4 shadow-sm border-l-4 border-yellow-400">
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center text-yellow-400">
                    <i class="fas fa-user-check"></i>
                </div>
                <div>
                    <div class="text-xl font-bold text-gray-900">{{ $totalActiveUsers }}</div>
                    <div class="text-sm text-gray-600">User Aktif</div>
                </div>
            </div>
            <div class="bg-white rounded-lg p-4 flex items-center gap-4 shadow-sm border-l-4 border-yellow-400">
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center text-yellow-400">
                    <i class="fas fa-thumbs-up"></i>
                </div>
                <div>
                    <div class="text-xl font-bold text-gray-900">{{ $totalLikes }}</div>
                    <div class="text-sm text-gray-600">Total Suka</div>
                </div>
            </div>
            <div class="bg-white rounded-lg p-4 flex items-center gap-4 shadow-sm border-l-4 border-yellow-400">
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center text-yellow-400">
                    <i class="fas fa-comment"></i>
                </div>
                <div>
                    <div class="text-xl font-bold text-gray-900">{{ $totalComments }}</div>
                    <div class="text-sm text-gray-600">Total Komentar</div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <div class="bg-white rounded-lg p-6 shadow-sm">
                <h3 class="text-base font-semibold flex items-center gap-2 mb-3 text-gray-900 font-['Space_Grotesk']">
                    <i class="fas fa-chart-line text-yellow-400 text-sm"></i>
                    Grafik Pengunjung
                </h3>
                <div class="h-64">
                    <canvas id="pengunjungChart"></canvas>
                </div>
            </div>
            <div class="bg-white rounded-lg p-6 shadow-sm">
                <h3 class="text-base font-semibold flex items-center gap-2 mb-3 text-gray-900 font-['Space_Grotesk']">
                    <i class="fas fa-chart-pie text-yellow-400 text-sm"></i>
                    Distribusi Kategori
                </h3>
                <div class="h-64">
                    <canvas id="kategoriChart"></canvas>
                </div>
            </div>
            <div class="bg-white rounded-lg p-6 shadow-sm">
                <h3 class="text-base font-semibold flex items-center gap-2 mb-3 text-gray-900 font-['Space_Grotesk']">
                    <i class="fas fa-chart-bar text-yellow-400 text-sm"></i>
                    Tingkat Interaksi
                </h3>
                <div class="h-64">
                    <canvas id="interaksiChart"></canvas>
                </div>
            </div>
            <div class="bg-white rounded-lg p-6 shadow-sm">
                <h3 class="text-base font-semibold flex items-center gap-2 mb-3 text-gray-900 font-['Space_Grotesk']">
                    <i class="fas fa-chart-area text-yellow-400 text-sm"></i>
                    Distribusi Event
                </h3>
                <div class="h-64">
                    <canvas id="eventChart"></canvas>
                </div>
            </div>
            <div class="bg-white rounded-lg p-6 shadow-sm col-span-2">
                <h3 class="text-base font-semibold flex items-center gap-2 mb-3 text-gray-900 font-['Space_Grotesk']">
                    <i class="fas fa-chart-line text-yellow-400 text-sm"></i>
                    Pertumbuhan Anggota
                </h3>
                <div class="h-64">
                    <canvas id="anggotaChart"></canvas>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg p-4 mb-6 border border-gray-200">
            <h3 class="text-base font-semibold flex items-center gap-2 mb-3 text-gray-900 font-['Space_Grotesk']">
                <i class="fas fa-list text-yellow-400 text-sm"></i>
                Laporan Aktivitas
            </h3>
            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="p-3 text-left text-sm font-semibold text-gray-600">ID</th>
                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Pengguna</th>
                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Deskripsi</th>
                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Subjek</th>
                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($activities as $activity)
                            <tr class="hover:bg-gray-50">
                                <td class="p-3 text-sm text-gray-900">{{ $activity->id }}</td>
                                <td class="p-3 text-sm text-gray-900">{{ $activity->user ? $activity->user->name : 'Sistem' }}</td>
                                <td class="p-3 text-sm text-gray-900">{{ $activity->description }}</td>
                                <td class="p-3 text-sm text-gray-900">{{ $activity->subject_type ? class_basename($activity->subject_type) : 'N/A' }}</td>
                                <td class="p-3 text-sm text-gray-900">{{ $activity->created_at->format('d M Y H:i') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-3 text-center text-sm text-gray-600">Tidak ada aktivitas</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $activities->links() }}
        </div>

        @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            new Chart(document.getElementById('pengunjungChart'), {
                type: 'line',
                data: {
                    labels: @json(array_keys($visitorData['daily'])),
                    datasets: [{
                        label: 'Pengunjung',
                        data: @json(array_values($visitorData['daily'])),
                        borderColor: '#ffd700',
                        backgroundColor: 'rgba(255, 215, 0, 0.1)',
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {responsive:true,maintainAspectRatio:false,scales:{y:{beginAtZero:true},x:{grid:{display:false}}}}
            });

            new Chart(document.getElementById('kategoriChart'), {
                type: 'pie',
                data: {
                    labels: @json($categoryNames),
                    datasets: [{
                        data: @json($categoryCounts),
                        backgroundColor: ['#ffd700','#ffeb3b','#fbc02d','#f57f17','#ff9800','#ff5722'],
                        borderColor: '#fff',
                        borderWidth: 2
                    }]
                },
                options: {responsive:true,maintainAspectRatio:false,plugins:{legend:{position:'bottom'}}}
            });

            new Chart(document.getElementById('interaksiChart'), {
                type: 'bar',
                data: {
                    labels: ['Karya','Blog','Proyek','Event'],
                    datasets: [
                        {
                            label: 'Suka',
                            data: [
                                @json($interactionData['likes']['artworks']),
                                @json($interactionData['likes']['blogs']),
                                @json($interactionData['likes']['projects']),
                                0
                            ],
                            backgroundColor: 'rgba(255, 215, 0, 0.5)',
                            borderColor: '#ffd700',
                            borderWidth: 2
                        },
                        {
                            label: 'Komentar',
                            data: [
                                @json($interactionData['comments']['artworks']),
                                @json($interactionData['comments']['blogs']),
                                @json($interactionData['comments']['projects']),
                                @json($interactionData['comments']['events'])
                            ],
                            backgroundColor: 'rgba(100, 100, 100, 0.5)',
                            borderColor: '#666',
                            borderWidth: 2
                        }
                    ]
                },
                options: {responsive:true,maintainAspectRatio:false,scales:{y:{beginAtZero:true},x:{grid:{display:false}}}}
            });

            new Chart(document.getElementById('eventChart'), {
                type: 'doughnut',
                data: {
                    labels: @json(array_keys($eventData)),
                    datasets: [{
                        data: @json(array_values($eventData)),
                        backgroundColor: ['#ffd700','#ffeb3b','#fbc02d','#f57f17','#ff9800','#ff5722'],
                        borderColor: '#fff',
                        borderWidth: 2
                    }]
                },
                options: {responsive:true,maintainAspectRatio:false,plugins:{legend:{position:'bottom'}}}
            });

            new Chart(document.getElementById('anggotaChart'), {
                type: 'line',
                data: {
                    labels: @json(array_keys($growthData)),
                    datasets: [{
                        label: 'Anggota Baru',
                        data: @json(array_values($growthData)),
                        borderColor: '#ffd700',
                        backgroundColor: 'rgba(255, 215, 0, 0.1)',
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {responsive:true,maintainAspectRatio:false,scales:{y:{beginAtZero:true},x:{grid:{display:false}}}}
            });
            function exportReport(format) {
                const startDate = document.getElementById('start_date').value;
                const endDate = document.getElementById('end_date').value;
                const categoryId = document.getElementById('category_id').value;
                const reportType = document.getElementById('report_type').value;
                window.location.href = `{{ url('admin/reports/export') }}/${format}?start_date=${startDate}&end_date=${endDate}&category_id=${categoryId}&report_type=${reportType}`;
            }
        </script>
        @endpush
    </div>
</x-admin-layout>
