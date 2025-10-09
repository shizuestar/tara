<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>TARA - Gallery Showcase</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLMDJd/rB7A/bZJ2Kfa2NqE7D5f2R5H7P7y3p7o2Z+5s7g/rXl0+E8s7/e9Vw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="https://unpkg.com/cursor-effects@latest/dist/browser.js"></script>
    <script>
        new cursoreffects.fairyDustCursor({ colors: ["#5ec5ff", "#ffffff", "#ff57a3"] });
    </script>

    @if($settings?->favicon_path)
        <link rel="icon" type="image/png" href="{{ Storage::url($settings->favicon_path) }}" />
    @endif

    <style>
        .body {
            font-family: 'Space Grotesk', sans-serif;
        }
    </style>
    
    @stack('styles')
</head>

<body class="hero-bg min-h-screen">
    <x-main-navbar />
    {{ $slot }}
    <x-main-footer />
    
    @stack('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (window.location.pathname === '/') {
                @if (Auth::check())
                    const userId = {{ Auth::id() }};
                    const today = new Date().toISOString().split('T')[0];
                    const visitKey = `visit_${userId}_${today}`;
                    
                    Object.keys(localStorage).forEach(key => {
                        if (key.startsWith(`visit_${userId}_`)) {
                            const date = key.split('_')[2];
                            const visitDate = new Date(date);
                            const daysDiff = (new Date() - visitDate) / (1000 * 60 * 60 * 24);
                            if (daysDiff > 30) {
                                localStorage.removeItem(key);
                            }
                        }
                    });
                    
                    let visitData = JSON.parse(localStorage.getItem(visitKey)) || { count: 0, lastVisit: null };
                    visitData.count += 1;
                    visitData.lastVisit = new Date().toISOString();
                    localStorage.setItem(visitKey, JSON.stringify(visitData));
                    
                    fetch('{{ route('log.visit') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ user_id: userId, visit_date: today })
                    });
                @endif
            }
        });
    </script>
</body>
</html>