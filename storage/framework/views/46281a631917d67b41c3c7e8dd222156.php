

<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Dashboard</h2>
        <?php if(auth()->guard()->guest()): ?>
            <div>
                <a href="<?php echo e(url('/login?as=user')); ?>" class="btn btn-outline-primary me-2">Login sebagai User</a>
                <a href="<?php echo e(url('/login?as=admin')); ?>" class="btn btn-outline-danger">Login sebagai Admin</a>
            </div>
        <?php else: ?>
            <div class="d-flex align-items-center gap-2">
                <?php if(Auth::user()->role === 'user'): ?>
                    <a href="<?php echo e(route('bookings.create')); ?>" class="btn btn-dark">Pesan Ruangan</a>
                <?php endif; ?>
                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-outline-danger">Logout</button>
                </form>
            </div>
        <?php endif; ?>
    </div>

    
    <div class="row mb-4">
        <div class="col-md-4 mb-2">
            <div class="card text-center bg-success text-white h-100">
                <div class="card-body">
                    <h5 class="card-title">Cari Ruangan Kosong</h5>
                    <p class="card-text">Lihat ruangan yang tersedia saat ini</p>
                    <a href="<?php echo e(route('rooms.available')); ?>" class="btn btn-light btn-sm">Lihat Sekarang</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="card text-center bg-warning h-100">
                <div class="card-body">
                    <h5 class="card-title">Rating & Ulasan</h5>
                    <p class="card-text">Lihat pengalaman pengguna lain</p>
                    <a href="<?php echo e(route('reviews.index')); ?>" class="btn btn-dark btn-sm">Lihat Ulasan</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="card text-center bg-info text-white h-100">
                <div class="card-body">
                    <h5 class="card-title">Riwayat Pemakaian</h5>
                    <p class="card-text">Lihat pemakaian ruangan sebelumnya</p>
                    <a href="<?php echo e(route('bookings.history')); ?>" class="btn btn-light btn-sm">Cek Riwayat</a>
                </div>
            </div>
        </div>
    </div>

    
    <h4>Lokasi Ruangan (Peta)</h4>
    <div class="mb-5">
        <div id="map" style="height: 600px;"></div>
    </div>

    
    <h4>Jadwal Kegiatan Ruangan</h4>
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-center p-3">
                <strong>Senin</strong>
                <span>F.Hasan</span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center p-3">
                <strong>Selasa</strong>
                <span>Labkom Pilkom</span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center p-3">
                <strong>Rabu</strong>
                <span>Aula Hasan Bondan</span>
            </div>
        </div>
    </div>

    
    <h4>Ulasan Singkat</h4>
    <div class="mb-4">
        <?php $__currentLoopData = ['Bryan', 'Alex', 'Sandra']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card bg-primary text-white mb-2">
            <div class="card-body">
                <h6 class="card-title mb-1"><?php echo e($name); ?> ★★★★☆</h6>
                <p class="card-text">Komentar pengguna.</p>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <button class="btn btn-outline-secondary btn-sm">See more...</button>
    </div>

    
    <h4>Daftar Ruangan & Kapasitas</h4>
    <div class="mb-4">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Ruangan</th>
                    <th>Kapasitas</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>F.Hasan</td><td>35</td></tr>
                <tr><td>R.25</td><td>25</td></tr>
                <tr><td>R.23</td><td>60</td></tr>
                <tr><td>Lab.Mipa</td><td>25</td></tr>
            </tbody>
        </table>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var map = L.map('map').setView([-3.2991, 114.5858], 17); // Fokus ke lokasi ULM

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    <?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        var marker = L.marker([<?php echo e($room->latitude); ?>, <?php echo e($room->longitude); ?>]).addTo(map);
        marker.bindPopup(`
            <b><?php echo e($room->nama); ?></b><br>
            Kapasitas: <?php echo e($room->kapasitas); ?><br>
            <?php echo e($room->deskripsi); ?><br>
            <a href="<?php echo e(route('bookings.create')); ?>?room_id=<?php echo e($room->id); ?>" class="btn btn-sm btn-primary mt-2">Pesan Ruangan</a>
        `);
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\projek_pemweb\ulm_realtime\resources\views/dashboard/index.blade.php ENDPATH**/ ?>