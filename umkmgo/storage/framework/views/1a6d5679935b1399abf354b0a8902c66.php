<?php $__env->startSection('content'); ?>
<h2 class="mb-4">Hasil Kuis</h2>

<div class="card mb-4">
    <div class="card-body text-center">
        <p class="h5">Skor kamu: <strong><?php echo e($score); ?> / <?php echo e($total); ?></strong></p>

        <?php if($score == $total): ?>
            <p class="text-success mt-3">Keren! Kamu menjawab semua pertanyaan dengan benar! 🔥</p>
        <?php elseif($score >= ($total / 2)): ?>
            <p class="text-warning mt-3">Lumayan bagus, tapi masih bisa ditingkatkan!</p>
        <?php else: ?>
            <p class="text-danger mt-3">Kamu butuh belajar lebih lanjut, tetap semangat 💪</p>
        <?php endif; ?>
    </div>
</div>

<a href="<?php echo e(route('home')); ?>">
    <button class="custom-button">Kembali ke Beranda</button>
</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Aplikasi\laragon\www\umkmgo\resources\views/quiz/result.blade.php ENDPATH**/ ?>