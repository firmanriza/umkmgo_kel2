<?php $__env->startSection('content'); ?>
<h2 class="mb-4">Diskusi UMKM</h2>

<a href="<?php echo e(route('forum.create')); ?>">
    <button class="custom-button mb-4">Tambah Diskusi</button>
</a>


<?php $__currentLoopData = $forums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $forum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a href="<?php echo e(route('forum.show', $forum->id)); ?>" style="text-decoration: none; color: inherit;">
        <div class="card mb-3" style="border-radius: 20px; transition: box-shadow 0.3s;" onmouseover="this.style.boxShadow='0px 4px 12px rgba(0,0,0,0.15)'" onmouseout="this.style.boxShadow='none'">
            <div class="card-body">
                <h5 class="card-title"><?php echo e($forum->title); ?></h5>
                <p class="card-text text-muted"><?php echo e(Str::limit($forum->content, 100)); ?></p>
                <small class="text-muted">Oleh: <?php echo e($forum->user->name); ?></small>

                            <?php if(Auth::id() === $forum->user_id): ?>
                <div class="mt-2 d-flex gap-2">
                    <a href="<?php echo e(route('forum.edit', $forum->id)); ?>">
                        <button class="custom-button-blue">Edit</button>
                    </a>

                    <form action="<?php echo e(route('forum.destroy', $forum->id)); ?>" method="POST" onsubmit="return confirm('Yakin hapus forum ini?')">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="custom-button-orange">Hapus</button>
                    </form>
                </div>
            <?php endif; ?>
            </div>
        </div>
    </a>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\umkmgo\resources\views/forum/index.blade.php ENDPATH**/ ?>