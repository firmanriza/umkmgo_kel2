<?php $__env->startSection('content'); ?>
<div class="max-w-2xl mx-auto text-center bg-white/30 backdrop-blur-md p-8 mt-10 rounded-2xl shadow-lg border border-white/20">
    <h1 class="text-3xl font-bold mb-4 text-white drop-shadow">
        UMKM Kuis Awal - <?php echo e($kategori->nama_kategori); ?>

    </h1>
    
    <p class="text-lg text-white/90 mb-6 drop-shadow">
    Ayo mulai kuis awal untuk tahu seberapa besar UMKM-mu sudah berkembang!
    </p>

    <?php if($quiz): ?>
        <a href="<?php echo e(route('quiz.attempt', $quiz->id)); ?>"
           class="bg-orange-500 text-white px-6 py-3 rounded-lg hover:bg-orange-600 transition duration-300 shadow-md">
            Mulai Kuis
        </a>
    <?php else: ?>
        <p class="text-red-200 font-semibold drop-shadow">Kuis belum tersedia untuk kategori ini.</p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="https://cdn.tailwindcss.com"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\umkmgo\resources\views/quiz/intro.blade.php ENDPATH**/ ?>