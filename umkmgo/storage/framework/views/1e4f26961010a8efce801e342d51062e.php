<?php $__env->startSection('content'); ?>
<style>
    .group-header {
        background: linear-gradient(135deg, #F9A826, #F97316);
        color: white;
        padding: 40px 20px;
        border-radius: 12px;
        position: relative;
    }

    .group-header h2 {
        margin-bottom: 0;
        font-weight: 700;
    }

    .group-subinfo {
        font-size: 0.9rem;
        opacity: 0.9;
    }

    .nav-umkmgo {
        border-bottom: 2px solid #ddd;
    }

    .nav-umkmgo .nav-link {
        color: #333;
        font-weight: 500;
    }

    .nav-umkmgo .nav-link.active {
        color: #F97316;
        border-bottom: 3px solid #F97316;
    }

    .card-post:hover {
        box-shadow: 0 6px 16px rgba(0,0,0,0.1);
    }

    .custom-button {
        background-color: #F97316;
        color: white;
        border: none;
        padding: 8px 14px;
        border-radius: 8px;
    }

    .custom-button:hover {
        background-color: #ea6512;
    }

    .dropdown-toggle {
        background-color: #F97316; 
        color: white; 
        border: none;
        padding: 8px 14px; 
        border-radius: 8px; 
    }

    .dropdown-toggle:hover {
        background-color: #ea6512; 
    }

    .dropdown-toggle::after {
        content: '';
    }

    .dropdown-menu {
        min-width: 160px;
    }

    .dropdown-menu .dropdown-item {
        font-size: 0.9rem; 
    }

    .dropdown-menu .dropdown-item:hover {
        background-color: #F97316;
        color: white;
    }

    .dropdown-menu .dropdown-item:active {
        background-color: #ea6512;
    }
</style>

<div class="group-header mb-4">
    <div class="container">
        <h2>Forum Diskusi UMKMGO</h2>
        <p class="group-subinfo">Forum Untuk Berbagi & Bertanya seputar UMKM</p>
    </div>
</div>

<div class="container">
    <div class="text-end mb-3">
        <a href="<?php echo e(route('forum.create')); ?>">
            <button class="custom-button">+ Tambah Diskusi</button>
        </a>
    </div>

    <?php $__currentLoopData = $forums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $forum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="card mb-4 card-post p-3 rounded-4 position-relative">
        <h5 class="mb-1"><?php echo e($forum->title); ?></h5>
        <p class="text-muted mb-2">
            <a href="<?php echo e(route('forum.show', $forum->id)); ?>" class="text-decoration-none text-muted">
                <?php echo e(Str::limit($forum->content, 100)); ?>

            </a>
        </p>

        <small class="text-muted">
            Oleh: <?php echo e($forum->user->name); ?>

            <?php if($forum->user->role === 'admin'): ?>
                <span class="badge bg-primary ms-1">Admin</span>
            <?php endif; ?>
        </small>
        <small>Diposting oleh <?php echo e($forum->user->name); ?> pada <?php echo e($forum->created_at->format('d M Y H:i')); ?></small>

      
        <?php if(Auth::id() === $forum->user_id || Auth::user()->role === 'admin'): ?>
        <div class="position-absolute top-0 end-0 mt-2 me-2">
            <div class="dropdown">
                <button class="btn btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i> 
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="<?php echo e(route('forum.edit', $forum->id)); ?>">Edit</a></li>
                    <li>
                        <form action="<?php echo e(route('forum.destroy', $forum->id)); ?>" method="POST" onsubmit="return confirm('Yakin hapus forum ini?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="dropdown-item">Hapus</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <?php endif; ?>

        
        <div class="mt-3">
            <strong>Komentar</strong>
            <?php if($forum->comments->count() > 0): ?>
                <?php $__currentLoopData = $forum->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="mb-2 border-bottom pb-2">
                        <strong><?php echo e($comment->user->name); ?></strong> <small class="text-muted"><?php echo e($comment->created_at->diffForHumans()); ?></small>
                        <p class="mb-1"><?php echo e($comment->content); ?></p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <p class="text-muted">Belum ada komentar.</p>
            <?php endif; ?>
        </div>

       
        <form action="<?php echo e(route('comments.store')); ?>" method="POST" class="mt-3">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="forum_id" value="<?php echo e($forum->id); ?>">
            <textarea name="content" class="form-control mb-2" rows="2" placeholder="Tulis komentar..." required></textarea>
            <button type="submit" class="btn btn-sm custom-button">Kirim Komentar</button>
        </form>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Aplikasi\Xampp\htdocs\umkmgo_kel2-Sean_umkgo\umkmgo_kel2-Sean_umkgo\umkmgo\resources\views/forum/index.blade.php ENDPATH**/ ?>