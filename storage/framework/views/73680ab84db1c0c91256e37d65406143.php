

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Daftar Pemesanan Ruangan</h2>

    <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card mb-3">
            <div class="card-body">
                <h5><?php echo e($booking->nama_ruangan); ?></h5>
                <p><strong>Peminjam:</strong> <?php echo e($booking->user->name); ?> (<?php echo e($booking->user->nim); ?>)</p>
                <p><strong>Waktu:</strong> <?php echo e($booking->tanggal); ?> - <?php echo e($booking->waktu); ?></p>
                <p><strong>Status:</strong> <?php echo e(ucfirst($booking->status)); ?></p>

                <?php if($booking->status === 'pending'): ?>
                    <form action="<?php echo e(route('admin.bookings.approve', $booking->id)); ?>" method="POST" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <button class="btn btn-success btn-sm">Setujui</button>
                    </form>
                    <form action="<?php echo e(route('admin.bookings.reject', $booking->id)); ?>" method="POST" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <button class="btn btn-danger btn-sm">Tolak</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\projek_pemweb\ulm_realtime\resources\views/bookings/index.blade.php ENDPATH**/ ?>