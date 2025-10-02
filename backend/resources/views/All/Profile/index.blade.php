<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TARA - Profil</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { font-family: 'Space Grotesk', sans-serif; }
        .gradient-bg { position: fixed; inset: 0; background: linear-gradient(to bottom right, #eff6ff, #ede9fe); z-index: -10; opacity: 0.3; }
        #particles-js { position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: -5; pointer-events: none; }
        .glass-effect { backdrop-filter: blur(10px); background: rgba(255, 255, 255, 0.9); border: 1px solid rgba(0, 0, 0, 0.1); box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1); }
        .button-primary { @apply bg-black text-white px-4 py-2 rounded-full hover:bg-gray-800 transition; }
        .card { @apply transition-all rounded-lg overflow-hidden hover:shadow-lg hover:-translate-y-1; }
    </style>
</head>
<body class="bg-white text-black">
    <div class="gradient-bg"></div>
    <div id="particles-js"></div>

    <header class="py-6 px-8 flex justify-between items-center bg-white shadow-sm border-b border-gray-200 fixed top-0 w-full z-40">
        <nav class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <a href="/" class="text-3xl font-bold text-gray-900">TARA</a>
                <span class="text-yellow-400 text-2xl">●</span>
            </div>
            <div class="flex items-center gap-6">
                <a href="/profile/edit" class="button-primary">Edit Profil</a>
                <i class="fas fa-bell text-gray-500 cursor-pointer text-xl" onclick="toggleNotifications()"></i>
            </div>
        </nav>
    </header>

    <main class="mt-16 max-w-5xl mx-auto px-4 py-16">
        @if ($user)
            <section class="card glass-effect p-8">
                <div class="flex flex-col md:flex-row gap-6">
                    <!-- Profile Info -->
                    <div class="w-full md:w-1/3 text-center">
                        <img src="{{ $user->avatar ? Storage::url($user->avatar) : 'https://i.pravatar.cc/300?u=' . $user->username }}" alt="Profile" class="w-32 h-32 rounded-full mx-auto border-4 border-white shadow-lg">
                        <h1 class="text-2xl font-bold mt-4">{{ $user->name }}</h1>
                        <p class="text-gray-600">@{{ $user->username }}</p>
                        <p class="text-gray-500 mt-2">{{ $user->bio ?? 'Belum ada bio.' }}</p>
                    </div>

                    <!-- Stats and Chart -->
                    <div class="w-full md:w-2/3">
                        <h2 class="text-xl font-bold mb-4">Statistik Aktivitas</h2>
                        <canvas id="activityChart" class="w-full h-64"></canvas>
                    </div>
                </div>

                <!-- Artworks -->
                <div class="mt-8">
                    <h2 class="text-xl font-bold mb-4">Karya Terbaru</h2>
                    @if ($artworks->isEmpty())
                        <p class="text-gray-500">Belum ada karya.</p>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            @foreach ($artworks as $artwork)
                                <div class="card p-4">
                                    <img src="{{ Storage::url($artwork->file_path) }}" alt="{{ $artwork->title }}" class="w-full h-48 object-cover rounded">
                                    <h3 class="text-lg font-semibold mt-2">{{ $artwork->title }}</h3>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Projects -->
                <div class="mt-8">
                    <h2 class="text-xl font-bold mb-4">Project</h2>
                    @if ($projects->isEmpty())
                        <p class="text-gray-500">Belum ada Project.</p>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            @foreach ($projects as $project)
                                <div class="card p-4">
                                    <h3 class="text-lg font-semibold">{{ $project->name }}</h3>
                                    <p class="text-gray-500">Role: {{ $project->pivot->role }}</p>
                                    <p class="text-gray-500">Bergabung: {{ $project->pivot->joined_at->diffForHumans() }}</p>
                                    <a href="{{ route('projects.show', $project->id) }}" class="text-blue-500 hover:underline">Lihat Project</a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Communities -->
                <div class="mt-8">
                    <h2 class="text-xl font-bold mb-4">Komunitas</h2>
                    @if ($communities->isEmpty())
                        <p class="text-gray-500">Belum bergabung dengan komunitas.</p>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            @foreach ($communities as $community)
                                <div class="card p-4">
                                    <h3 class="text-lg font-semibold">{{ $community->name }}</h3>
                                    <p class="text-gray-500">Role: {{ $community->pivot->role }}</p>
                                    <p class="text-gray-500">Bergabung: {{ $community->pivot->joined_at->diffForHumans() }}</p>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Activities -->
                <div class="mt-8">
                    <h2 class="text-xl font-bold mb-4">Aktivitas Terbaru</h2>
                    @if ($activities->isEmpty())
                        <p class="text-gray-500">Belum ada aktivitas.</p>
                    @else
                        <div class="space-y-4">
                            @foreach ($activities as $activity)
                                <div class="card p-4">
                                    <p>{{ $activity['description'] }}</p>
                                    <p class="text-gray-500 text-sm">{{ $activity['created_at'] }}</p>
                                    <a href="{{ $activity['link'] }}" class="text-blue-500 hover:underline">Lihat Detail</a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Badges -->
                <div class="mt-8">
                    <h2 class="text-xl font-bold mb-4">Lencana</h2>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        @foreach ($badges as $badge)
                            <div class="card p-4 {{ $badge['locked'] ? 'opacity-50' : '' }}">
                                @if ($badge['lottie'])
                                    <div class="w-16 h-16 mx-auto">
                                        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                                        <lottie-player src="{{ $badge['lottie'] }}" background="transparent" speed="1" loop autoplay></lottie-player>
                                    </div>
                                @else
                                    <i class="fas fa-lock text-gray-500 text-2xl mx-auto"></i>
                                @endif
                                <h3 class="text-lg font-semibold text-center">{{ $badge['name'] }}</h3>
                                <p class="text-gray-500 text-sm text-center">{{ $badge['description'] }}</p>
                                @if ($badge['is_new'])
                                    <span class="bg-yellow-400 text-black text-xs px-2 py-1 rounded-full mt-2 inline-block">Baru</span>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @else
            <section class="text-center py-16">
                <p class="text-gray-500">Silakan login untuk melihat profil Anda.</p>
                <a href="{{ route('login') }}" class="button-primary mt-4">Login</a>
            </section>
        @endif
    </main>

    <script>
        // Particles.js
        particlesJS("particles-js", {
            particles: {
                number: { value: 50, density: { enable: true, value_area: 800 } },
                color: { value: "#000000" },
                shape: { type: "circle" },
                opacity: { value: 0.3, random: true },
                size: { value: 3, random: true },
                line_linked: { enable: true, distance: 80, color: "#000000", opacity: 0.2, width: 1 },
                move: { enable: true, speed: 1, out_mode: "out" },
            },
            interactivity: { events: { onhover: { enable: false }, onclick: { enable: false } } },
            retina_detect: true,
        });

        // Chart.js for activity chart
        @if ($user)
            const ctx = document.getElementById('activityChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: @json($chartData['labels']),
                    datasets: [{
                        label: 'Aktivitas',
                        data: @json($chartData['data']),
                        backgroundColor: ['#facc15', '#4a4a4a', '#d1d5db', '#000000'],
                        borderColor: ['#000000'],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: { beginAtZero: true }
                    },
                    plugins: {
                        legend: { display: false }
                    }
                }
            });
        @endif

        // Notification toggle (placeholder)
        function toggleNotifications() {
            fetch('{{ route('profile.toggleNotifications') }}', { method: 'POST' })
                .then(response => response.json())
                .then(data => console.log(data))
                .catch(error => console.error('Error:', error));
        }
    </script>
</body>
</html>