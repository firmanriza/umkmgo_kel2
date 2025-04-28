

<?php $__env->startSection('content'); ?>
<div class="container py-4">

    
    <div class="d-flex justify-content-start mb-4">
        <a href="<?php echo e(route('articles.create')); ?>" class="btn btn-success">Buat Artikel</a>
    </div>

    
    <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="card mb-4 shadow-sm">
        <div class="row g-0">
            <?php if($article->image): ?>
            <div class="col-md-4">
                <a href="<?php echo e(route('articles.show', $article->id)); ?>">
                    <img src="<?php echo e(asset('storage/' . $article->image)); ?>" class="img-fluid rounded-start" alt="<?php echo e($article->title); ?>">
                </a>
            </div>
            <?php endif; ?>
            <div class="col-md-8">
                <div class="card-body">
                    <a href="<?php echo e(route('articles.show', $article->id)); ?>" class="text-decoration-none">
                        <h5 class="card-title"><?php echo e($article->title); ?></h5>
                    </a>
                    <div class="mt-3">
                        <a href="<?php echo e(route('articles.edit', $article->id)); ?>" class="btn btn-sm btn-success">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\umkmgo\resources\views/articles/index.blade.php ENDPATH**/ ?>