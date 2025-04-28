<?php $__env->startSection('content'); ?>
<h2 class="mb-4">Hasil Kuis</h2>

<div class="card mb-4">
    <div class="card-body text-center">
    <?php $__currentLoopData = $hasilAkhir; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bidang => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="mb-4">
            <h3 class="text-xl font-semibold"><?php echo e($bidang); ?></h3>
            <p class="text-gray-700">Level Anda: <strong><?php echo e($data['level']); ?></strong></p>
            <p class="text-gray-700">Saran: <?php echo e($data['saran']); ?></p>
        </div>
        <hr class="my-3">
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<a href="<?php echo e(route('home')); ?>">
    <button class="custom-button">Kembali ke Beranda</button>
</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\umkmgo\resources\views/quiz/result.blade.php ENDPATH**/ ?>