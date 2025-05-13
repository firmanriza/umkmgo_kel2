<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <h2 class="mb-4 text-white"><?php echo e(isset($class) ? 'Edit Kelas' : 'Tambah Kelas'); ?></h2>

    <div class="card p-3" style="background-color: #757575;">
        <form action="<?php echo e(isset($class) ? route('classes.update', $class->id) : route('classes.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php if(isset($class)): ?>
                <?php echo method_field('PUT'); ?>
            <?php endif; ?>

            <div class="row">
                <div class="col-md-6">
                    <div class="card p-3 mb-3" style="background-color: #0d6efd;">
                        <label for="title" class="form-label text-white">Judul</label>
                        <input type="text" name="title" class="form-control" value="<?php echo e(old('title', $class->title ?? '')); ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card p-3 mb-3" style="background-color: #0d6efd;">
                        <label for="kategori_umkm_id" class="form-label text-white">Kategori UMKM</label>
                        <select name="kategori_umkm_id" class="form-select" required>
                            <option value="">-- Pilih Kategori --</option>
                            <?php $__currentLoopData = $kategoris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($kategori->id); ?>" <?php echo e((isset($class) && $class->kategori_umkm_id == $kategori->id) ? 'selected' : ''); ?>>
                                    <?php echo e($kategori->nama_kategori); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card p-3 mb-3" style="background-color: #0d6efd;">
                        <label for="field" class="form-label text-white">Bidang</label>
                        <select name="field" class="form-select" required>
                            <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($field); ?>" <?php echo e((isset($class) && $class->field == $field) ? 'selected' : ''); ?>>
                                    <?php echo e(ucfirst($field)); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card p-3 mb-3" style="background-color: #0d6efd;">
                        <label for="level" class="form-label text-white">Level</label>
                        <select name="level" class="form-select" required>
                            <?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($level); ?>" <?php echo e((isset($class) && $class->level == $level) ? 'selected' : ''); ?>>
                                    <?php echo e(ucfirst($level)); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card p-3 mb-3" style="background-color: #0d6efd;">
                        <label for="type" class="form-label text-white">Tipe</label>
                        <select name="type" class="form-select" required>
                            <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($type); ?>" <?php echo e((isset($class) && $class->type == $type) ? 'selected' : ''); ?>>
                                    <?php echo e(ucfirst($type)); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card p-3 mb-3" style="background-color: #0d6efd;">
                        <label for="video_url" class="form-label text-white">Link Video</label>
                        <input type="url" name="video_url" class="form-control" value="<?php echo e(old('video_url', $class->video_url ?? '')); ?>">
                    </div>
                </div>
            </div>

            <div class="card p-3 mb-3" style="background-color: #0d6efd;">
                <label for="schedule_info" class="form-label text-white">Jadwal (Jika Luring)</label>
                <textarea name="schedule_info" class="form-control"><?php echo e(old('schedule_info', $class->schedule_info ?? '')); ?></textarea>
            </div>

            <div class="card p-3 mb-3" style="background-color: #0d6efd;">
                <label for="description" class="form-label text-white">Deskripsi</label>
                <textarea name="description" class="form-control"><?php echo e(old('description', $class->description ?? '')); ?></textarea>
            </div>

            <?php if(auth()->user() && auth()->user()->role === 'admin'): ?>
                <div class="card p-3 mb-3" style="background-color: #0d6efd;">
                    <label for="material_pdf" class="form-label text-white">Upload Materi PDF</label>
                    <input type="file" name="material_pdf" id="material_pdf" class="form-control" accept="application/pdf">
                </div>
            <?php endif; ?>

            <div class="text-end">
                <button type="submit" class="custom-button mt-3">Simpan</button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Aplikasi\Xampp\htdocs\umkmgo_kel2-Sean_umkgo\umkmgo_kel2-Sean_umkgo\umkmgo\resources\views/classes/create.blade.php ENDPATH**/ ?>