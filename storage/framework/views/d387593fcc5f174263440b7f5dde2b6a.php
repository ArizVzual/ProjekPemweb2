

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Jadwal Kegiatan</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Kegiatan</th>
                <th>Ruangan</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Penanggung Jawab</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($schedule->nama_kegiatan); ?></td>
                <td><?php echo e($schedule->room->nama); ?></td>
                <td><?php echo e($schedule->tanggal); ?></td>
                <td><?php echo e($schedule->jam_mulai); ?> - <?php echo e($schedule->jam_selesai); ?></td>
                <td><?php echo e($schedule->penanggung_jawab ?? '-'); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\projek_pemweb\ulm_realtime\resources\views/schedules/index.blade.php ENDPATH**/ ?>