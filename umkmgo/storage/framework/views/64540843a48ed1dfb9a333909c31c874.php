<?php $__env->startSection('content'); ?>
<style>
    .group-header {
        background: linear-gradient(135deg, #F9A826, #F97316);
        color: white;
        padding: 40px 20px;
        border-radius: 12px;
        position: relative;
        margin-bottom: 30px;
    }

    .group-header h2 {
        margin-bottom: 0;
        font-weight: 700;
    }

    .group-subinfo {
        font-size: 0.9rem;
        opacity: 0.9;
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

    .card-article {
        background-color: white;
        padding: 15px;
        border-radius: 12px;
        box-shadow: 0 0 6px rgba(0,0,0,0.1);
        transition: box-shadow 0.3s ease;
        margin-bottom: 20px;
    }

    .card-article:hover {
        box-shadow: 0 6px 16px rgba(0,0,0,0.1);
    }

    .card-article h5 {
        margin-bottom: 10px;
    }

    .card-article p {
        color: #555;
        font-size: 0.85rem;
        line-height: 1.3;
        max-height: 3.9em; /* approx 3 lines */
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        margin-bottom: 0;
    }
</style>

<div class="container">
    <div class="group-header">
        <h2>Daftar Artikel UMKMGO</h2>
        <p class="group-subinfo">Berisi kumpulan artikel seputar UMKM</p>
    </div>

    <?php if(auth()->user()->role === 'admin'): ?>
    <div class="text-end mb-4">
        <a href="<?php echo e(route('articles.create')); ?>">
            <button class="custom-button">+ Buat Artikel</button>
        </a>
    </div>
    <?php endif; ?>

    <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="card-article">
        <a href="<?php echo e(route('articles.show', $article->id)); ?>" class="text-decoration-none">
            <h5><?php echo e($article->title); ?></h5>
        </a>
        <?php if($article->image): ?>
        <div class="mb-3">
            <a href="<?php echo e(route('articles.show', $article->id)); ?>">
                <img src="<?php echo e(asset('storage/' . $article->image)); ?>" class="img-fluid rounded" alt="<?php echo e($article->title); ?>">
            </a>
        </div>
        <?php endif; ?>
        <p><?php echo e(Str::limit(strip_tags($article->content ?? ''), 100)); ?></p>

        <?php if(auth()->user()->role === 'admin'): ?>
        <div class="d-flex gap-2">
            <a href="<?php echo e(route('articles.edit', $article->id)); ?>" class="btn btn-sm btn-outline-primary">Edit</a>
            
        </div>
        <?php endif; ?>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Aplikasi\Xampp\htdocs\umkmgo_kel2-Sean_umkgo\umkmgo_kel2-Sean_umkgo\umkmgo\resources\views/articles/index.blade.php ENDPATH**/ ?>