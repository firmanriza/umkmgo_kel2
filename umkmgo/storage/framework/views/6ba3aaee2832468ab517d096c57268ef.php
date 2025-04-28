<?php $__env->startSection('content'); ?>
<h2>Buat Diskusi Baru</h2>

<form method="POST" action="<?php echo e(route('forum.store')); ?>">
    <?php echo csrf_field(); ?>
    <div class="mb-3">
        <label for="title" class="form-label">Judul</label>
        <input type="text" name="title" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Isi Diskusi</label>
        <textarea name="content" class="form-control" rows="5" required></textarea>
    </div>
    <button type="submit" class="btn btn-success">Kirim</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\umkmgo\resources\views/forum/create.blade.php ENDPATH**/ ?>