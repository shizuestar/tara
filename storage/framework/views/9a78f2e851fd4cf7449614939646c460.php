<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TARA - Gallery Showcase</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <script src="https://unpkg.com/cursor-effects@latest/dist/browser.js"></script>
    <script>
        new cursoreffects.fairyDustCursor({ colors: ["#5ec5ff", "#ffffff", "#ff57a3"] });
    </script>
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>

<body class="hero-bg min-h-screen">
    <?php if (isset($component)) { $__componentOriginal40111882c465c187dd9d7b7c9a099bc5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal40111882c465c187dd9d7b7c9a099bc5 = $attributes; } ?>
<?php $component = App\View\Components\MainNavbar::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('main-navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\MainNavbar::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal40111882c465c187dd9d7b7c9a099bc5)): ?>
<?php $attributes = $__attributesOriginal40111882c465c187dd9d7b7c9a099bc5; ?>
<?php unset($__attributesOriginal40111882c465c187dd9d7b7c9a099bc5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal40111882c465c187dd9d7b7c9a099bc5)): ?>
<?php $component = $__componentOriginal40111882c465c187dd9d7b7c9a099bc5; ?>
<?php unset($__componentOriginal40111882c465c187dd9d7b7c9a099bc5); ?>
<?php endif; ?>
    <?php echo e($slot); ?>

    <?php if (isset($component)) { $__componentOriginalb3cc9df89cde89a13f9cf34ef8385cce = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb3cc9df89cde89a13f9cf34ef8385cce = $attributes; } ?>
<?php $component = App\View\Components\MainFooter::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('main-footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\MainFooter::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb3cc9df89cde89a13f9cf34ef8385cce)): ?>
<?php $attributes = $__attributesOriginalb3cc9df89cde89a13f9cf34ef8385cce; ?>
<?php unset($__attributesOriginalb3cc9df89cde89a13f9cf34ef8385cce); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb3cc9df89cde89a13f9cf34ef8385cce)): ?>
<?php $component = $__componentOriginalb3cc9df89cde89a13f9cf34ef8385cce; ?>
<?php unset($__componentOriginalb3cc9df89cde89a13f9cf34ef8385cce); ?>
<?php endif; ?>
    <?php echo $__env->yieldPushContent('scripts'); ?>
    <script>
        const burger = document.getElementById('burger-toggle');
        const navMenu = document.getElementById('nav-menu');

        burger.addEventListener('click', () => {
            navMenu.classList.toggle('hidden');
        });

        function toggleNotifications() {
            const modal = document.getElementById('notification-modal');
            const isOpen = modal.classList.contains('open');
            modal.classList.toggle('open');
            gsap.to(modal, {
                x: isOpen ? '100%' : '0%',
                duration: 0.3,
                ease: "power2.out"
            });
            if (!isOpen) {
                renderNotifications();
            }
        }

        const currentPath = window.location.pathname.split('/').pop() || 'index.blade.php';
        const isDetailPage = window.location.search.includes('id=');

        document.querySelectorAll('.nav-link').forEach(link => {
            const href = link.getAttribute('href').split('/').pop();

            const detailPages = ['blog.html', 'komunitas.html', 'galeri.html', 'agenda.html'];

            const isActive = 
                href === currentPath || 
                (detailPages.includes(href) && isDetailPage && currentPath === href);

            if (isActive) {
                link.classList.add('active');
            } else {
                link.classList.remove('active');
            }
        });

    </script>
</body>

</html><?php /**PATH C:\laragon\www\tara\backend\resources\views/components/layout.blade.php ENDPATH**/ ?>