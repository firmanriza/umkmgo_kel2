<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="card shadow-lg p-4">
        <h1 class="text-center mb-4 text-primary fw-bold fs-3"><?php echo e($quiz->judul); ?></h1>

        <form action="<?php echo e(route('quiz.submit', $quiz->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div id="soal-container">
                <?php $__currentLoopData = $quiz->soals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $soal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="soal-item" style="<?php echo e($index !== 0 ? 'display: none;' : ''); ?>">
                        
                        <p class="text-muted mb-2"><strong>Bidang:</strong> <?php echo e($soal->bidang); ?></p>

                        
                        <h5 class="mb-3">Soal <?php echo e($index + 1); ?>: <?php echo e($soal->pertanyaan); ?></h5>

                        
                        <div class="form-check">
                            <input type="radio" name="jawaban[<?php echo e($soal->id); ?>]" value="<?php echo e($soal->pilihan_a); ?>" class="form-check-input" id="a<?php echo e($soal->id); ?>">
                            <label class="form-check-label" for="a<?php echo e($soal->id); ?>"><?php echo e($soal->pilihan_a); ?></label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="jawaban[<?php echo e($soal->id); ?>]" value="<?php echo e($soal->pilihan_b); ?>" class="form-check-input" id="b<?php echo e($soal->id); ?>">
                            <label class="form-check-label" for="b<?php echo e($soal->id); ?>"><?php echo e($soal->pilihan_b); ?></label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="jawaban[<?php echo e($soal->id); ?>]" value="<?php echo e($soal->pilihan_c); ?>" class="form-check-input" id="c<?php echo e($soal->id); ?>">
                            <label class="form-check-label" for="c<?php echo e($soal->id); ?>"><?php echo e($soal->pilihan_c); ?></label>
                        </div>
                        <div class="form-check mb-4">
                            <input type="radio" name="jawaban[<?php echo e($soal->id); ?>]" value="<?php echo e($soal->pilihan_d); ?>" class="form-check-input" id="d<?php echo e($soal->id); ?>">
                            <label class="form-check-label" for="d<?php echo e($soal->id); ?>"><?php echo e($soal->pilihan_d); ?></label>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <button type="button" class="btn btn-secondary" id="prevBtn">Sebelumnya</button>
                <button type="button" class="btn btn-primary" id="nextBtn">Selanjutnya</button>
                <button type="submit" class="btn btn-success d-none" id="submitBtn">Kirim Jawaban</button>
            </div>
        </form>
    </div>
</div>

<script>
    const soalItems = document.querySelectorAll('.soal-item');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const submitBtn = document.getElementById('submitBtn');
    let currentSoal = 0;

    function showSoal(index) {
        soalItems.forEach((item, i) => {
            item.style.display = (i === index) ? 'block' : 'none';
        });

        prevBtn.style.display = index === 0 ? 'none' : 'inline-block';
        nextBtn.style.display = index === soalItems.length - 1 ? 'none' : 'inline-block';
        submitBtn.classList.toggle('d-none', index !== soalItems.length - 1);
    }

    prevBtn.addEventListener('click', () => {
        if (currentSoal > 0) {
            currentSoal--;
            showSoal(currentSoal);
        }
    });

    nextBtn.addEventListener('click', () => {
        if (currentSoal < soalItems.length - 1) {
            currentSoal++;
            showSoal(currentSoal);
        }
    });

    // initial load
    showSoal(currentSoal);
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\umkmgo\resources\views/quiz/attempt.blade.php ENDPATH**/ ?>