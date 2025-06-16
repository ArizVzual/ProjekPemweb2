

<?php $__env->startSection('content'); ?>
    <h4>Peta Interaktif ULM</h4>

    <div class="d-flex flex-column flex-md-row">
        <div id="map" style="width: 100%; height: 500px;"></div>
            <div id="room-info" class="card ms-md-3 mt-3 mt-md-0 p-3 d-none" style="width: 100%; max-width: 300px;">
                <div class="card-body">
                    <h5 id="room-title" class="card-title">Judul Ruangan</h5>
                    <p id="room-desc" class="card-text">Deskripsi ruangan akan muncul di sini.</p>
                    <a id="room-book-btn" href="#" class="btn btn-primary mt-2">Pesan Ruangan</a>
                </div>
            </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script>
        var map = L.map('map').setView([-3.2991, 114.5858], 18); // Koordinat awal kampus ULM

        // Tambahkan TileLayer dari OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 22,
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Looping data rooms dari Laravel
        <?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            L.marker([<?php echo e($room->latitude); ?>, <?php echo e($room->longitude); ?>])
                .addTo(map)
                .bindPopup(`<b><?php echo e($room->nama); ?></b><br>
                            Kapasitas: <?php echo e($room->kapasitas); ?><br>
                            <?php echo e($room->deskripsi); ?><br><br>
                            <a href="<?php echo e(route('bookings.create')); ?>?room_id=<?php echo e($room->id); ?>" class="btn btn-sm btn-primary mt-2">Pesan Ruangan</a>`)
                .on('click', function () {
                    document.getElementById('room-title').innerText = "<?php echo e($room->nama); ?>";
                    document.getElementById('room-desc').innerText = "Kapasitas: <?php echo e($room->kapasitas); ?> | <?php echo e($room->deskripsi); ?>";
                    document.getElementById('room-info').classList.remove('d-none');
                });
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\projek_pemweb\ulm_realtime\resources\views/map/index.blade.php ENDPATH**/ ?>