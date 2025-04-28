<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <!-- Forum Post -->
    <div class="card mb-4">
        <div class="card-body">
            <h2 class="card-title"><?php echo e($forum->title); ?></h2>
            <p class="card-text"><?php echo e($forum->content); ?></p>
            <p class="text-muted mb-0">
                <small>Diposting oleh <strong><?php echo e($forum->user->name); ?></strong> pada <?php echo e($forum->created_at->format('d M Y H:i')); ?></small>
            </p>
        </div>
    </div>

    <!-- Komentar -->
    <div class="card mb-4">
        <div class="card-header">
            <h5>Komentar</h5>
        </div>
        <div class="card-body">
            <?php if($forum->comments->count() > 0): ?>
                <?php $__currentLoopData = $forum->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="mb-3 border-bottom pb-2">
                        <p class="mb-1"><strong><?php echo e($comment->user->name); ?></strong> mengatakan:</p>
                        <p class="mb-0"><?php echo e($comment->content); ?></p>
                        <small class="text-muted"><?php echo e($comment->created_at->diffForHumans()); ?></small>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <p class="text-muted">Belum ada komentar.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Form Komentar -->
    <div class="card">
        <div class="card-header">
            <h5>Tulis Komentar</h5>
        </div>
        <div class="card-body">
            <form action="<?php echo e(route('comments.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="forum_id" value="<?php echo e($forum->id); ?>">

                <div class="form-group mb-3">
                    <textarea name="content" class="form-control" rows="3" placeholder="Tulis komentarmu..." required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Kirim Komentar</button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\umkmgo\resources\views/forum/show.blade.php ENDPATH**/ ?>