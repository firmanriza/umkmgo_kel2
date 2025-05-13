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
<style>
    .sidebar-fe {
        background: #3498db;
        min-height: 100vh;
        border-radius: 20px 0 0 20px;
        color: #fff;
        padding: 32px 0 32px 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 220px;
    }
    .sidebar-fe .logo {
        width: 120px;
        margin-bottom: 40px;
    }
    .sidebar-fe .nav-link {
        color: #fff;
        font-weight: 500;
        font-size: 1.1rem;
        margin: 12px 0;
        display: flex;
        align-items: center;
        gap: 10px;
        border-radius: 8px;
        padding: 8px 16px;
        transition: background 0.2s;
    }
    .sidebar-fe .nav-link.active, .sidebar-fe .nav-link:hover {
        background: rgba(255,255,255,0.12);
        text-decoration: none;
    }
    .sidebar-fe .bottom {
        margin-top: auto;
        font-size: 0.95rem;
        opacity: 0.8;
    }
    .main-fe {
        background: #f8f9fa;
        min-height: 100vh;
        border-radius: 0 20px 20px 0;
        padding: 40px 40px 40px 40px;
        flex: 1;
    }
    .fe-card {
        background: #fff;
        border-radius: 18px;
        box-shadow: 0 2px 12px rgba(0,0,0,0.06);
        padding: 28px 24px;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        min-width: 220px;
        min-height: 180px;
        transition: box-shadow 0.2s;
    }
    .fe-card:hover {
        box-shadow: 0 6px 24px rgba(52,152,219,0.13);
    }
    .fe-card .fe-icon {
        font-size: 2.2rem;
        margin-bottom: 18px;
        color: #3498db;
    }
    .fe-card .fe-desc {
        font-size: 1.05rem;
        margin-bottom: 18px;
        color: #444;
    }
    .fe-card .custom-button {
        font-size: 1rem;
        padding: 8px 20px;
    }
    .fe-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 32px;
    }
    .fe-header .search-box {
        background: #fff;
        border-radius: 12px;
        padding: 8px 18px;
        border: 1px solid #e0e0e0;
        min-width: 220px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .fe-header .search-box input {
        border: none;
        outline: none;
        background: none;
        width: 100%;
    }
    @media (max-width: 991px) {
        .sidebar-fe { display: none; }
        .main-fe { border-radius: 20px; padding: 20px 5vw; }
    }
</style>
<div class="d-flex" style="min-height: 100vh;">
    <aside class="sidebar-fe d-none d-lg-flex">
        <img src="/images/logoumkm.png" class="logo" alt="UMKMGo Logo">
        <a href="#" class="nav-link active"><i class="bi bi-house-door"></i> Menu Utama</a>
        <a href="<?php echo e(route('classes.index')); ?>" class="nav-link"><i class="bi bi-easel"></i> Kelas</a>
        <a href="<?php echo e(route('articles.index')); ?>" class="nav-link"><i class="bi bi-newspaper"></i> Berita</a>
        <a href="<?php echo e(route('forum.index')); ?>" class="nav-link"><i class="bi bi-chat-dots"></i> Forum</a>
        <a href="<?php echo e(route('profile.edit')); ?>" class="nav-link"><i class="bi bi-person"></i> Sertifikat</a>
        <a href="<?php echo e(route('logout')); ?>" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bi bi-box-arrow-right"></i> Logout</a>
        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none"><?php echo csrf_field(); ?></form>
        <div class="bottom mt-4"><i class="bi bi-people"></i> Team PPL</div>
    </aside>
    <main class="main-fe w-100">
        <div class="fe-header">
            <div>
                <div class="fw-bold" style="font-size:1.3rem;">Welcome Back (<?php echo e(auth()->user()->name); ?>)</div>
                <div class="text-muted" style="font-size:0.98rem;">Here overview of your course</div>
            </div>
            <div class="search-box">
                <i class="bi bi-search"></i>
                <input type="text" placeholder="search.."/>
            </div>
        </div>
        <div class="row g-4 mb-4">
            <div class="col-md-3">
                <div class="fe-card h-100">
                    <div class="fe-icon"><i class="bi bi-chat-dots"></i></div>
                    <div class="fe-desc">Platform komunitas UMKM untuk berbagi, berdiskusi, dan bertumbuh bersama.</div>
                    <a href="<?php echo e(route('forum.index')); ?>" class="custom-button">Masuk ke Forum</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="fe-card h-100">
                    <div class="fe-icon"><i class="bi bi-newspaper"></i></div>
                    <div class="fe-desc">Lihat berbagai macam informasi dan artikel menarik seputar UMKM.</div>
                    <a href="<?php echo e(route('articles.index')); ?>" class="custom-button">Masuk ke Artikel</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="fe-card h-100">
                    <div class="fe-icon"><i class="bi bi-patch-question"></i></div>
                    <div class="fe-desc">Ukur pengetahuanmu dengan mengerjakan quiz.</div>
                    <a href="<?php echo e(route('kategori.index')); ?>" class="custom-button">Kuis Awal</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="fe-card h-100">
                    <div class="fe-icon"><i class="bi bi-easel"></i></div>
                    <div class="fe-desc">Pilih dan ikuti kelas daring atau luring sesuai minat dan kebutuhanmu.</div>
                    <a href="<?php echo e(route('classes.index')); ?>" class="custom-button">Masuk ke Kelas</a>
                </div>
            </div>
        </div>
        
    </main>
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Aplikasi\Xampp\htdocs\umkmgo_kel2-Sean_umkgo\umkmgo_kel2-Sean_umkgo\umkmgo\resources\views/home.blade.php ENDPATH**/ ?>