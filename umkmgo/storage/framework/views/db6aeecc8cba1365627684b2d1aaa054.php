<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <h1 class="text-white mb-4 mt-5" style="font-family: 'Plus Jakarta Sans', sans-serif;">
        <b>Daftar kategori</b>     
        <span class="fw-bold px-2 py-1" style="background-color: #FF6B00; border-radius: 20px;">
            Kelas
        </span>
    </h1>

    <div class="card p-3 mb-4" style="background-color: #757575;"> 
        
        <form method="GET" action="<?php echo e(route('classes.list')); ?>">
            <div class="row g-4">
                
                <div class="col-md-4">
                    <div class="card p-3" style="background-color: #0d6efd;">
                        <label for="kategori_umkm_id" class="form-label text-white"><b>Pilih Kategori</b></label>
                        <select name="kategori_umkm_id" id="kategori_umkm_id" class="form-select" style="color: black; background-color: white;">
                            <option value="">Kategori</option>
                            <?php $__currentLoopData = $kategoris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($kategori->id); ?>"><?php echo e($kategori->nama_kategori); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                
                <div class="col-md-4">
                    <div class="card p-3" style="background-color: #0d6efd;">
                        <label for="field" class="form-label text-white"><b>Pilih Bidang</b></label>
                        <select name="field" class="form-select">
                            <option value="">Bidang</option>
                            <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($field); ?>"><?php echo e(ucfirst($field)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                
                <div class="col-md-4">
                    <div class="card p-3" style="background-color: #0d6efd;">
                        <label for="level" class="form-label text-white"><b>Pilih Level</b></label>
                        <select name="level" class="form-select">
                            <option value="">Level</option>
                            <?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($level); ?>"><?php echo e(ucfirst($level)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>

            
            <div class="col-md-12 d-flex justify-content-center mt-3">
    <button type="submit" class="btn w-100" style="background-color: white; color: #0d6efd; border: 1px solid #0d6efd;">
        Filter
    </button>
</div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Aplikasi\Xampp\htdocs\umkmgo_kel2-Sean_umkgo\umkmgo_kel2-Sean_umkgo\umkmgo\resources\views/classes/index.blade.php ENDPATH**/ ?>