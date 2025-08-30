<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TARA Admin Panel</title>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
    @stack('styles')
</head>
<body>
    <x-admin-sidebar />

    <main class="main-content">
        <x-admin-navbar />

        <div class="content-wrapper">
            {{ $slot }}
        </div>
    </main>

    @stack('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navItems = document.querySelectorAll('.nav-item');
            navItems.forEach(item => {
                item.addEventListener('click', function() {
                    navItems.forEach(i => i.classList.remove('active'));
                    this.classList.add('active');
                });
            });

            const statValues = document.querySelectorAll('.stat-value');
            statValues.forEach(value => {
                const originalText = value.textContent;
                value.textContent = '0';
                let counter = 0;
                const target = parseInt(originalText.replace(/,/g, ''));
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
</body>
</html>