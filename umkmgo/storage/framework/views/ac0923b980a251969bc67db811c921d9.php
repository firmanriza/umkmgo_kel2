<?php $__env->startSection('content'); ?>

<?php if(auth()->user()->role === 'admin'): ?>
<div class="admin-dashboard">
    <h1>Dashboard Admin</h1>
    <div class="admin-cards d-flex gap-4">
        <div class="card p-3" style="flex:1; background-color:#6f42c1; color:white; border-radius:10px;">
            <h3>Manajemen Pengguna</h3>
            <p>Lihat dan kelola akun pengguna, termasuk penambahan role Mentor.</p>
            <a href="<?php echo e(route('admin.users.index')); ?>" class="btn btn-light">Kelola Pengguna</a>
        </div>
        <div class="card p-3" style="flex:1; background-color:#20c997; color:white; border-radius:10px;">
            <h3>Manajemen Artikel</h3>
            <p>CRUD artikel untuk edukasi UMKM.</p>
            <a href="<?php echo e(route('articles.index')); ?>" class="btn btn-light">Kelola Artikel</a>
        </div>
        <div class="card p-3" style="flex:1; background-color:#fd7e14; color:white; border-radius:10px;">
            <h3>Manajemen Forum</h3>
            <p>Hapus diskusi/komunitas forum.</p>
            <a href="<?php echo e(route('forum.index')); ?>" class="btn btn-light">Kelola Forum</a>
        </div>
        <div class="card p-3" style="flex:1; background-color:#0d6efd; color:white; border-radius:10px;">
            <h3>Manajemen Kelas</h3>
            <p>CRUD kelas luring/daring dari kategori UMKM dan bidangnya.</p>
            <a href="#" class="btn btn-light">Kelola Kelas</a>
        </div>
        <div class="card p-3" style="flex:1; background-color:#dc3545; color:white; border-radius:10px;">
            <h3>Manajemen Sertifikat</h3>
            <p>Tambah sertifikat untuk pengguna yang menyelesaikan kelas dan quiz akhir.</p>
            <a href="#" class="btn btn-light">Kelola Sertifikat</a>
        </div>
    </div>
</div>

<?php else: ?>
<div class="w-100 d-flex justify-content-center gap-4 px-5">
    
    <div class="glass-card">
        <p>Platform komunitas UMKM untuk berbagi, berdiskusi, dan bertumbuh bersama.</p>
        <a href="<?php echo e(route('forum.index')); ?>">
            <button class="custom-button mt-3">Masuk ke Forum</button>
        </a>
    </div>

    
    <div class="glass-card">
        <p>Lihat berbagai macam informasi dan artikel menarik seputar UMKM.</p>
        <a href="<?php echo e(route('articles.index')); ?>">
            <button class="custom-button mt-3">Masuk ke Artikel</button>
        </a>
    </div>

    
    <div class="glass-card">
        <p>Ukur pengetahuanmu dengan mengerjakan quiz.</p>
        <div class="d-flex flex-column gap-2 mt-3 w-100 align-items-center">
            <a href="<?php echo e(route('kategori.index')); ?>">
                <button class="custom-button w-100">Kuis Awal</button>
            </a>
            <a href="<?php echo e(route('quiz.final')); ?>">
                <button class="custom-button w-100">Kuis Akhir</button>
            </a>
        </div>
    </div>

    
    <div class="glass-card">
        <p>Pilih dan ikuti kelas daring atau luring sesuai minat dan kebutuhanmu.</p>
        <a href="<?php echo e(route('classes.index')); ?>">
            <button class="custom-button mt-3">Masuk ke Kelas</button>
        </a>
    </div>
</div>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\umkmgo\resources\views/home.blade.php ENDPATH**/ ?>