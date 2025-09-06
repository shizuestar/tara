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
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body class="flex min-h-screen bg-gray-100 overflow-x-hidden">

    <?php if (isset($component)) { $__componentOriginal5dbcd2c5f624951ffc95c729c55bdb11 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5dbcd2c5f624951ffc95c729c55bdb11 = $attributes; } ?>
<?php $component = App\View\Components\AdminSidebar::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AdminSidebar::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5dbcd2c5f624951ffc95c729c55bdb11)): ?>
<?php $attributes = $__attributesOriginal5dbcd2c5f624951ffc95c729c55bdb11; ?>
<?php unset($__attributesOriginal5dbcd2c5f624951ffc95c729c55bdb11); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5dbcd2c5f624951ffc95c729c55bdb11)): ?>
<?php $component = $__componentOriginal5dbcd2c5f624951ffc95c729c55bdb11; ?>
<?php unset($__componentOriginal5dbcd2c5f624951ffc95c729c55bdb11); ?>
<?php endif; ?>

    <main class="flex-1 ml-0 md:ml-64 transition-all duration-300">
        <?php if (isset($component)) { $__componentOriginalec6b0940b981aec7453f768a1110aa81 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalec6b0940b981aec7453f768a1110aa81 = $attributes; } ?>
<?php $component = App\View\Components\AdminNavbar::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AdminNavbar::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalec6b0940b981aec7453f768a1110aa81)): ?>
<?php $attributes = $__attributesOriginalec6b0940b981aec7453f768a1110aa81; ?>
<?php unset($__attributesOriginalec6b0940b981aec7453f768a1110aa81); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalec6b0940b981aec7453f768a1110aa81)): ?>
<?php $component = $__componentOriginalec6b0940b981aec7453f768a1110aa81; ?>
<?php unset($__componentOriginalec6b0940b981aec7453f768a1110aa81); ?>
<?php endif; ?>


        <div class="p-6 ml-3 pt-0 mt-3 bg-gray-100 min-h-[calc(100vh)] w-[100%]">
            <?php echo e($slot); ?>

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
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\lomba\tara\backend\resources\views/components/admin-layout.blade.php ENDPATH**/ ?>