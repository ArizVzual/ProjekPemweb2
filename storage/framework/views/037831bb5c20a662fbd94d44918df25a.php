<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>ULM Realtime</title>

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">

    <?php echo $__env->yieldPushContent('scripts'); ?>
<?php echo $__env->yieldContent('scripts'); ?>

</head>
<body>
    <div id="app" class="d-flex flex-column flex-md-row min-vh-100">

        
        <aside class="bg-danger text-white p-3" style="width: 250px;">
            <div class="text-center mb-4">
                <img src="<?php echo e(asset('logo_ulm1.png')); ?>" alt="Logo" width="100">
                <h5 class="mt-2 text-white">Universitas Lambung Mangkurat</h5>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link text-white" href="<?php echo e(route('home')); ?>">🏠 Home</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="<?php echo e(route('jadwal')); ?>">🗓️ Jadwal</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="<?php echo e(route('peta')); ?>">🗺️ Map ULM</a></li>
            </ul>
            <div class="mt-auto small text-white-50 pt-5">Need Help?</div>
        </aside>

        
        <main class="flex-grow-1 p-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <?php echo $__env->yieldContent('scripts'); ?>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\projek_pemweb\ulm_realtime\resources\views/layouts/app.blade.php ENDPATH**/ ?>