<?php $__env->startSection('content'); ?>

<div class="card" style="background-color: white; color: black; border-radius: 12px; box-shadow: 0 0 6px rgba(0,0,0,0.1);">
    <div class="card-header" style="background-color: #F97316; color: white; border-radius: 12px 12px 0 0;">
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

            <div class="d-flex gap-2">
                <button type="submit" class="custom-button px-6 py-2 rounded-lg">
                    Simpan
                </button>
                <a href="<?php echo e(route('articles.index')); ?>" class="custom-button px-6 py-2 rounded-lg btn-secondary">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Aplikasi\Xampp\htdocs\umkmgo_kel2-Sean_umkgo\umkmgo_kel2-Sean_umkgo\umkmgo\resources\views/articles/create.blade.php ENDPATH**/ ?>