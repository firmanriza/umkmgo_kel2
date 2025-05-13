<?php $__env->startSection('content'); ?>
<h1 class="text-white mb-4 mt-5" style="font-family: 'Plus Jakarta Sans', sans-serif;">
    <b>Daftar</b>     
    <span class="fw-bold px-2 py-1" style="background-color: #FF6B00; border-radius: 20px;">
        Kelas
    </span>
</h1>


<ul class="nav nav-tabs" id="classTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="daring-tab" data-bs-toggle="tab" data-bs-target="#daring" type="button" role="tab" aria-controls="daring" aria-selected="true">
            Kelas Daring
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="luring-tab" data-bs-toggle="tab" data-bs-target="#luring" type="button" role="tab" aria-controls="luring" aria-selected="false">
            Kelas Luring
        </button>
    </li>
</ul>


<div class="tab-content mt-3" id="classTabContent">
    
    <div class="tab-pane fade show active" id="daring" role="tabpanel" aria-labelledby="daring-tab">
        <?php $daringClasses = $classes->where('type', 'daring'); ?>
        <?php $__empty_1 = true; $__currentLoopData = $daringClasses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="card mb-3 shadow-sm position-relative">
                <div class="card-body">
                    
                    <?php if(auth()->user() && (auth()->user()->role === 'admin' || auth()->user()->role === 'mentor')): ?>
                        <div class="position-absolute top-0 end-0 m-2">
                            <div class="dropdown">
                                <button class="btn btn-sm dropdown-toggle text-white" style="background-color: #FF6B00;" type="button" id="dropdownMenuDaring<?php echo e($class->id); ?>" data-bs-toggle="dropdown" aria-expanded="false">
                                    ⋮
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuDaring<?php echo e($class->id); ?>">
                                    <li>
                                        <a class="dropdown-item" href="<?php echo e(route('classes.edit', $class->id)); ?>">Update</a>
                                    </li>
                                    <li>
                                        <form action="<?php echo e(route('classes.destroy', $class->id)); ?>" method="POST" onsubmit="return confirm('Yakin hapus kelas ini?')">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="dropdown-item text-danger">Hapus</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>

                    <h5 class="card-title"><?php echo e($class->title); ?></h5>
                    <p class="card-text mb-2"><?php echo e($class->description); ?></p>
                    <a href="<?php echo e(route('classes.show', $class->id)); ?>" class="btn btn-sm btn-outline-primary">Detail</a>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p>Tidak ada kelas daring.</p>
        <?php endif; ?>
    </div>

    
    <div class="tab-pane fade" id="luring" role="tabpanel" aria-labelledby="luring-tab">
        <?php $luringClasses = $classes->where('type', 'luring'); ?>
        <?php $__empty_1 = true; $__currentLoopData = $luringClasses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="card mb-3 shadow-sm position-relative">
                <div class="card-body">
                    
                    <?php if(auth()->user() && (auth()->user()->role === 'admin' || auth()->user()->role === 'mentor')): ?>
                        <div class="position-absolute top-0 end-0 m-2">
                            <div class="dropdown">
                                <button class="btn btn-sm dropdown-toggle text-white" style="background-color: #FF6B00;" type="button" id="dropdownMenuLuring<?php echo e($class->id); ?>" data-bs-toggle="dropdown" aria-expanded="false">
                                    ⋮
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLuring<?php echo e($class->id); ?>">
                                    <li>
                                        <a class="dropdown-item" href="<?php echo e(route('classes.edit', $class->id)); ?>">Update</a>
                                    </li>
                                    <li>
                                        <form action="<?php echo e(route('classes.destroy', $class->id)); ?>" method="POST" onsubmit="return confirm('Yakin hapus kelas ini?')">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="dropdown-item text-danger">Hapus</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>

                    <h5 class="card-title"><?php echo e($class->title); ?></h5>
                    <p class="card-text mb-2"><?php echo e($class->description); ?></p>
                    <a href="<?php echo e(route('classes.show', $class->id)); ?>" class="btn btn-sm btn-outline-primary">Detail</a>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p>Tidak ada kelas luring.</p>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Aplikasi\Xampp\htdocs\umkmgo_kel2-Sean_umkgo\umkmgo_kel2-Sean_umkgo\umkmgo\resources\views/classes/list.blade.php ENDPATH**/ ?>