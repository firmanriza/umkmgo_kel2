

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Pilih Kategori dan Bidang Kelas</h1>

    <form action="<?php echo e(route('classes.list')); ?>" method="GET" class="mb-4">
        <div class="mb-3">
            <label for="kategori_umkm_id" class="form-label">Kategori UMKM</label>
            <select name="kategori_umkm_id" id="kategori_umkm_id" class="form-select" style="color: black; background-color: white;">
                <option value="">-- Pilih Kategori --</option>
                <?php $__currentLoopData = $kategoris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($kategori->id); ?>" style="color: black; background-color: white;"><?php echo e($kategori->nama_kategori); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="field" class="form-label">Bidang</label>
            <select name="field" id="field" class="form-select">
                <option value="">-- Pilih Bidang --</option>
                <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($field); ?>"><?php echo e(ucfirst($field)); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="level" class="form-label">Tingkatan Level</label>
            <select name="level" id="level" class="form-select">
                <option value="">-- Pilih Level --</option>
                <?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($level); ?>"><?php echo e(ucfirst($level)); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Metode</label>
            <select name="type" id="type" class="form-select">
                <option value="">-- Pilih Metode --</option>
                <option value="daring">Daring</option>
                <option value="luring">Luring</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Cari Kelas</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\umkmgo\resources\views/classes/index.blade.php ENDPATH**/ ?>