

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Daftar Kelas</h1>

    <?php if($classes->isEmpty()): ?>
        <p>Tidak ada kelas yang sesuai dengan kriteria pencarian.</p>
    <?php else: ?>
        <div class="list-group">
            <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('classes.show', $class->id)); ?>" class="list-group-item list-group-item-action">
                    <h5><?php echo e(ucfirst($class->kategori->nama)); ?> - <?php echo e(ucfirst($class->field)); ?> - <?php echo e(ucfirst($class->level)); ?> (<?php echo e(ucfirst($class->type)); ?>)</h5>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>

    <a href="<?php echo e(route('classes.index')); ?>" class="btn btn-secondary mt-3">Kembali ke Pilihan Kelas</a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\umkmgo\resources\views/classes/list.blade.php ENDPATH**/ ?>