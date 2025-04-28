

<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Buat Artikel Baru</h4>
        </div>
        <div class="card-body">
            <form action="<?php echo e(route('articles.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                
                <div class="mb-3">
                    <label for="title" class="form-label">Judul Artikel</label>
                    <input type="text" class="form-control" name="title" id="title" required>
                </div>

                
                <div class="mb-3">
                    <label for="content" class="form-label">Isi Artikel</label>
                    <textarea class="form-control" name="content" id="content" rows="6" required></textarea>
                </div>

                
                <div class="mb-3">
                    <label for="image" class="form-label">Upload Gambar (Opsional)</label>
                    <input type="file" class="form-control" name="image" id="image" accept="image/*">
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?php echo e(route('articles.index')); ?>" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\umkmgo\resources\views/articles/create.blade.php ENDPATH**/ ?>