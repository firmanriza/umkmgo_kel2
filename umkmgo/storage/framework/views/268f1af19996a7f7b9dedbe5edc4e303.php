<?php $__env->startSection('content'); ?>
<h2>Edit Diskusi</h2>

<form method="POST" action="<?php echo e(route('forum.update', $forum->id)); ?>">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <div class="mb-3">
        <label for="title" class="form-label">Judul</label>
        <input type="text" name="title" class="form-control" value="<?php echo e($forum->title); ?>" required>
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Isi Diskusi</label>
        <textarea name="content" class="form-control" rows="5" required><?php echo e($forum->content); ?></textarea>
    </div>

    <button type="submit" class="custom-button-orange">Perbarui</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\umkmgo\resources\views/forum/edit.blade.php ENDPATH**/ ?>