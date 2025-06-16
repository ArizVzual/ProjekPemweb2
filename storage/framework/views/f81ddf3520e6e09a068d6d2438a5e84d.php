

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Daftar Pemesanan Ruangan</h2>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <?php if($bookings->count() > 0): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama User</th>
                    <th>Ruangan</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($booking->user->name); ?> (<?php echo e($booking->user->nim); ?>)</td>
                        <td><?php echo e($booking->nama_ruangan); ?></td>
                        <td><?php echo e($booking->tanggal); ?></td>
                        <td><?php echo e($booking->waktu); ?></td>
                        <td><?php echo e(ucfirst($booking->status)); ?></td>
                        <td>
                            <?php if($booking->status === 'pending'): ?>
                                <form action="<?php echo e(route('admin.bookings.approve', $booking->id)); ?>" method="POST" style="display:inline;">
                                    <?php echo csrf_field(); ?>
                                    <button class="btn btn-success btn-sm">Setujui</button>
                                </form>
                                <form action="<?php echo e(route('admin.bookings.reject', $booking->id)); ?>" method="POST" style="display:inline;">
                                    <?php echo csrf_field(); ?>
                                    <button class="btn btn-danger btn-sm">Tolak</button>
                                </form>
                            <?php else: ?>
                                <span class="text-muted">Sudah <?php echo e($booking->status); ?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Tidak ada data pemesanan.</p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\projek_pemweb\ulm_realtime\resources\views/admin/bookings/index.blade.php ENDPATH**/ ?>