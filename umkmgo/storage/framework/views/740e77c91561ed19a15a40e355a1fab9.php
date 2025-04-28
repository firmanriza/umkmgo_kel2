

<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0">Edit Artikel</h4>
        </div>
        <div class="card-body">
            <form action="<?php echo e(route('articles.update', $article->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                
                <div class="mb-3">
                    <label for="title" class="form-label">Judul Artikel</label>
                    <input type="text" class="form-control" name="title" id="title" value="<?php echo e($article->title); ?>" required>
                </div>

                
                <div class="mb-3">
                    <label for="content" class="form-label">Isi Artikel</label>
                    <textarea class="form-control" name="content" id="content" rows="6" required><?php echo e($article->content); ?></textarea>
                </div>

                
                <div class="mb-3">
                    <label for="image" class="form-label">Gambar Saat Ini</label><br>
                    <?php if($article->image): ?>
                        <img src="<?php echo e(asset('storage/' . $article->image)); ?>" alt="Gambar Artikel" class="img-fluid mb-2" style="max-height: 200px;">
                    <?php else: ?>
                        <p><em>Tidak ada gambar</em></p>
                    <?php endif; ?>

                    <label for="image" class="form-label">Ganti Gambar (opsional)</label>
                    <input type="file" class="form-control" name="image" id="image" accept="image/*">
                </div>

                <button type="submit" class="btn btn-success">Update</button>
                <a href="<?php echo e(route('articles.index')); ?>" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\umkmgo\resources\views/articles/edit.blade.php ENDPATH**/ ?>