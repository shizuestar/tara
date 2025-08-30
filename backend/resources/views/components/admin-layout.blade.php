<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TARA Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Space Grotesk', sans-serif;
        }
    </style>
    @stack('styles')
</head>
<body class="flex min-h-screen bg-gray-100 overflow-x-hidden">

    <x-admin-sidebar />

    <main class="flex-1 ml-0 md:ml-64 transition-all duration-300">
        <x-admin-navbar />

        <div class="p-6 ml-3 pt-0 mt-3 bg-gray-100 min-h-[calc(100vh)] w-[100%]">
            {{ $slot }}
        </div>

    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animated Counter for Stat Values
            const statValues = document.querySelectorAll('.stat-value');
            statValues.forEach(value => {
                const originalText = value.textContent;
                value.textContent = '0';
                let counter = 0;
                const target = parseInt(originalText.replace(/,/g, '')) || 0;
                const increment = target / 30;

                const updateCounter = () => {
                    if (counter < target) {
                        counter += increment;
                        value.textContent = Math.round(counter).toLocaleString();
                        setTimeout(updateCounter, 50);
                    } else {
                        value.textContent = originalText;
                    }
                };
                setTimeout(updateCounter, 500);
            });
        });
    </script>
    @stack('scripts')
</body>
</html>
