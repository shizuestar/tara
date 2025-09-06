<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TARA Admin Panel</title>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/admin.css')); ?>">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>
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

    <main class="main-content">
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
        <div class="content-wrapper">
            <?php echo e($slot); ?>

        </div>
    </main>

    <?php echo $__env->yieldPushContent('scripts'); ?>
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
</html><?php /**PATH C:\laragon\www\tara\backend\resources\views/components/admin-layout.blade.php ENDPATH**/ ?>