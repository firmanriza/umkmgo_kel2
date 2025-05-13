<?php $__env->startSection('content'); ?>

<?php if(auth()->user()->role === 'admin'): ?>
<div class="d-flex flex-column align-items-center vh-100 text-center">
<h1 class="text-white mb-4 mt-5" style="font-family: 'Plus Jakarta Sans', sans-serif;">
    <b>Dashboard</b>     
    <span class="fw-bold px-2 py-1" style="background-color: #FF6B00; border-radius: 20px;">
        Admin
    </span>
</h1>
<div class="admin-dashboard">
    <div class="admin-cards d-flex gap-4 flex-wrap">
        <div class="card p-3 d-flex flex-column justify-content-between" style="flex:1; background-color:#6f42c1; color:white; border-radius:10px; min-height: 250px;">
            <div>
                <h3>Manajemen Pengguna</h3>
                <p>Lihat dan kelola akun pengguna, termasuk penambahan role Mentor.</p>
            </div>
            <a href="<?php echo e(route('admin.users.index')); ?>" class="btn btn-light mt-3">Kelola Pengguna</a>
        </div>

        <div class="card p-3 d-flex flex-column justify-content-between" style="flex:1; background-color:#20c997; color:white; border-radius:10px; min-height: 250px;">
            <div>
                <h3>Manajemen Artikel</h3>
                <p>Mengelola artikel untuk edukasi UMKM.</p>
            </div>
            <a href="<?php echo e(route('articles.index')); ?>" class="btn btn-light mt-3">Kelola Artikel</a>
        </div>

        <div class="card p-3 d-flex flex-column justify-content-between" style="flex:1; background-color:#fd7e14; color:white; border-radius:10px; min-height: 250px;">
            <div>
                <h3>Manajemen Forum</h3>
                <p>Kelola forum pada komunitas.</p>
            </div>
            <a href="<?php echo e(route('forum.index')); ?>" class="btn btn-light mt-3">Kelola Forum</a>
        </div>

        <div class="card p-3 d-flex flex-column justify-content-between" style="flex:1; background-color:#0d6efd; color:white; border-radius:10px; min-height: 250px;">
            <div>
                <h3>Manajemen Kelas</h3>
                <p>CRUD kelas luring/daring dari kategori UMKM dan bidangnya.</p>
            </div>
            <div>
                <a href="<?php echo e(route('classes.index')); ?>" class="btn btn-light">Kelola Kelas</a>
                <a href="<?php echo e(route('classes.create')); ?>" class="btn btn-light mt-2">Tambah Kelas</a>
            </div>
        </div>

        <div class="card p-3 d-flex flex-column justify-content-between" style="flex:1; background-color:#dc3545; color:white; border-radius:10px; min-height: 250px;">
            <div>
                <h3>Manajemen Sertifikat</h3>
                <p>Tambah sertifikat untuk pengguna yang menyelesaikan kelas dan quiz akhir.</p>
            </div>
            <a href="<?php echo e(route('admin.certificates.assign')); ?>" class="btn btn-light mt-3">Kelola Sertifikat</a>
        </div>
    </div>
</div>

<?php elseif(auth()->user()->role === 'mentor'): ?>
<div class="d-flex flex-column align-items-center vh-100 text-center">
<h1 class="text-white mb-4 mt-5" style="font-family: 'Plus Jakarta Sans', sans-serif;">
    <b>Dashboard</b>     
    <span class="fw-bold px-2 py-1" style="background-color: #FF6B00; border-radius: 20px;">
        Mentor
    </span>
</h1>
<div class="mentor-dashboard">
    <div class="mentor-cards d-flex gap-4 flex-wrap">
        <div class="card p-3 d-flex flex-column justify-content-between" style="flex:1; background-color:#fd7e14; color:white; border-radius:10px; min-height: 250px;">
            <div>
                <h3>Manajemen Forum</h3>
                <p>Kelola forum pada komunitas.</p>
            </div>
            <a href="<?php echo e(route('forum.index')); ?>" class="btn btn-light mt-3">Kelola Forum</a>
        </div>

        <div class="card p-3 d-flex flex-column justify-content-between" style="flex:1; background-color:#0d6efd; color:white; border-radius:10px; min-height: 250px;">
            <div>
                <h3>Manajemen Kelas</h3>
                <p>CRUD kelas luring/daring dari kategori UMKM dan bidangnya.</p>
            </div>
            <div>
                <a href="<?php echo e(route('classes.index')); ?>" class="btn btn-light">Kelola Kelas</a>
                <!-- <a href="<?php echo e(route('classes.create')); ?>" class="btn btn-light mt-2">Tambah Kelas</a> -->
            </div>
        </div>

        <div class="card p-3 d-flex flex-column justify-content-between" style="flex:1; background-color:#dc3545; color:white; border-radius:10px; min-height: 250px;">
            <div>
                <h3>Manajemen Sertifikat</h3>
                <p>Tambah sertifikat untuk pengguna yang menyelesaikan kelas dan quiz akhir.</p>
            </div>
            <a href="<?php echo e(route('admin.certificates.assign')); ?>" class="btn btn-light mt-3">Kelola Sertifikat</a>
        </div>
    </div>
</div>

<?php else: ?>
<div class="d-flex flex-column align-items-center vh-100 text-center">
<h1 class="text-white mb-4 mt-5" style="font-family: 'Plus Jakarta Sans', sans-serif;">
    <b>Selamat Datang di</b>     
    <span class="fw-bold px-2 py-1" style="background-color: #FF6B00; border-radius: 20px;">
        UMKMGo
    </span>
</h1>
<div class="w-100 d-flex justify-content-center gap-4 px-5">
    
    <div class="glass-card">
        <p><b>Platform komunitas UMKM untuk berbagi, berdiskusi, dan bertumbuh bersama.</b></p>
        <a href="<?php echo e(route('forum.index')); ?>">
            <button class="custom-button mt-3">Masuk ke Forum</button>
        </a>
    </div>

    
    <div class="glass-card">
        <p><b>Lihat berbagai macam informasi dan artikel menarik seputar UMKM.</b></p>
        <a href="<?php echo e(route('articles.index')); ?>">
            <button class="custom-button mt-3">Masuk ke Artikel</button>
        </a>
    </div>

    
    <div class="glass-card">
        <p><b>Ukur pengetahuanmu dengan mengerjakan quiz.</b></p>
        <div class="d-flex flex-column gap-2 mt-3 w-100 align-items-center">
            <a href="<?php echo e(route('kategori.index')); ?>">
                <button class="custom-button w-100">Kuis Awal</button>
            </a>
            <!-- <a href="<?php echo e(route('quiz.final')); ?>">
                <button class="custom-button w-100">Kuis Akhir</button>
            </a> -->
        </div>
    </div>

    
    <div class="glass-card">
        <p><b>Pilih dan ikuti kelas daring atau luring sesuai minat dan kebutuhanmu.</b></p>
        <a href="<?php echo e(route('classes.index')); ?>">
            <button class="custom-button mt-3">Masuk ke Kelas</button>
        </a>
    </div>
</div>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Aplikasi\Xampp\htdocs\umkmgo_kel2-yuda_umkgo\umkmgo\resources\views/home.blade.php ENDPATH**/ ?>