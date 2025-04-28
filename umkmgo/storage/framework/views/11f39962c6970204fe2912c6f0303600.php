<?php $__env->startSection('content'); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        tailwind.config = {
            corePlugins: {
                preflight: false
            }
        }
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
<div class="max-w-3xl mx-auto px-4 py-8">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h1 class="text-3xl font-bold mb-6 text-center text-indigo-600"><?php echo e($quiz->judul); ?></h1>

        <form action="<?php echo e(route('quiz.submit', $quiz->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <?php $__currentLoopData = $quiz->soals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $soal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="mb-8">
                    <p class="text-lg font-semibold mb-2">Soal <?php echo e($index + 1); ?>: <?php echo e($soal->pertanyaan); ?></p>
                    <div class="space-y-2 ml-4">
                        <label class="block">
                            <input type="radio" name="jawaban[<?php echo e($soal->id); ?>]" value="<?php echo e($soal->pilihan_a); ?>" class="mr-2">
                            <?php echo e($soal->pilihan_a); ?>

                        </label>
                        <label class="block">
                            <input type="radio" name="jawaban[<?php echo e($soal->id); ?>]" value="<?php echo e($soal->pilihan_b); ?>" class="mr-2">
                            <?php echo e($soal->pilihan_b); ?>

                        </label>
                        <label class="block">
                            <input type="radio" name="jawaban[<?php echo e($soal->id); ?>]" value="<?php echo e($soal->pilihan_c); ?>" class="mr-2">
                            <?php echo e($soal->pilihan_c); ?>

                        </label>
                        <label class="block">
                            <input type="radio" name="jawaban[<?php echo e($soal->id); ?>]" value="<?php echo e($soal->pilihan_d); ?>" class="mr-2">
                            <?php echo e($soal->pilihan_d); ?>

                        </label>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <div class="text-center">
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-2 rounded-lg shadow-md transition duration-300">
                    Kirim Jawaban
                </button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Aplikasi\laragon\www\umkmgo\resources\views/quiz/attempt.blade.php ENDPATH**/ ?>