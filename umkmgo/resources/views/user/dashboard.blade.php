@extends('layouts.app')

@section('content')
<style>
    .sidebar {
        width: 260px;
        min-height: 100vh;
        background: #6EC1E4;
        transition: transform 0.4s cubic-bezier(.4,2,.6,1);
        z-index: 10;
    }
    .sidebar.hide {
        transform: translateX(-100%);
    }
    .sidebar .active, .sidebar .nav-link.active {
        background: rgba(255,255,255,0.15);
        border-radius: 12px;
    }
    .sidebar .nav-link {
        color: #222;
        font-weight: 500;
        font-size: 1.1rem;
        margin-bottom: 8px;
        transition: background 0.2s;
    }
    .sidebar .nav-link:hover {
        background: rgba(255,255,255,0.25);
        border-radius: 12px;
    }
    .dashboard-bg {
        background: url('/images/background-baru.jpg') center center/cover no-repeat;
        min-height: 100vh;
        width: 100%;
        position: relative;
    }
    .dashboard-content {
        padding: 40px 40px 0 40px;
    }
    .card-metric {
        border-radius: 18px;
        box-shadow: 0 2px 12px rgba(0,0,0,0.07);
        background: #fff;
        padding: 24px 28px;
        min-width: 220px;
        min-height: 90px;
        margin-bottom: 18px;
    }
    .kelas-card {
        border-radius: 18px;
        box-shadow: 0 2px 12px rgba(0,0,0,0.07);
        background: #fff;
        padding: 20px 24px;
        min-width: 220px;
        margin-bottom: 18px;
    }
    .progress {
        height: 8px;
        border-radius: 6px;
    }
    @media (max-width: 900px) {
        .dashboard-content { padding: 20px 10px 0 10px; }
        .sidebar { width: 200px; }
    }
</style>

<div class="d-flex" style="min-height: 100vh;">
    <!-- Sidebar -->
    <div id="sidebar" class="sidebar position-fixed d-flex flex-column align-items-start p-4">
        <img src="{{ asset('images/logoumkm.png') }}" alt="UMKMGO" style="width: 120px;" class="mb-4">
        <nav class="flex-grow-1 w-100">
            <a href="#" class="nav-link active mb-2"><i class="fa fa-home me-2"></i> Menu Utama</a>
            <a href="#" class="nav-link mb-2"><i class="fa fa-box-open me-2"></i> Kelas</a>
            <a href="#" class="nav-link mb-2"><i class="fa fa-newspaper me-2"></i> Berita</a>
            <a href="#" class="nav-link mb-2"><i class="fa fa-comments me-2"></i> Forum</a>
            <a href="#" class="nav-link mb-2"><i class="fa fa-certificate me-2"></i> Sertifikat</a>
        </nav>
        <div class="mt-auto w-100">
            <a href="#" class="nav-link"><i class="fa fa-users me-2"></i> Team PPL</a>
        </div>
    </div>
    <!-- Sidebar Toggle Button -->
    <button id="sidebarToggle" class="btn btn-light position-absolute m-3 d-md-none" style="z-index:20;">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Main Content -->
    <div class="dashboard-bg flex-grow-1" style="margin-left:260px;">
        <div class="dashboard-content">
            <div class="d-flex align-items-center mb-4">
                <img src="/images/user.role.jpg" alt="User" class="rounded-circle me-3" style="width: 60px; height: 60px; object-fit:cover;">
                <div>
                    <h4 class="mb-0 fw-bold">Welcome Back User</h4>
                    <div class="text-white-50" style="font-size:1rem;">Here overview of your course</div>
                </div>
            </div>
            <!-- Metrics -->
            <div class="row g-3 mb-4">
                <div class="col-12 col-md-4">
                    <div class="card-metric">
                        <div class="fw-semibold">Skor Kamu</div>
                        <div class="fs-4 fw-bold">50</div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card-metric">
                        <div class="fw-semibold">Course diambil</div>
                        <div class="fs-4 fw-bold">50</div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card-metric">
                        <div class="fw-semibold">Enrol Kelas</div>
                        <div class="fs-4 fw-bold">5000</div>
                    </div>
                </div>
            </div>
            <!-- Kelas Terakhir -->
            <h5 class="fw-bold mb-3">Terakhir mengambil kelas</h5>
            <div class="row g-3">
                <!-- Dummy data kelas -->
                <div class="col-12 col-md-6">
                    <div class="kelas-card">
                        <div class="d-flex align-items-center mb-2">
                            <i class="fa fa-mobile-alt fa-lg me-2"></i>
                            <span class="fw-semibold">Marketing</span>
                        </div>
                        <div class="progress mb-1">
                            <div class="progress-bar bg-dark" style="width: 40%"></div>
                        </div>
                        <div class="text-end text-muted" style="font-size:0.95rem;">4/10 Lesion</div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="kelas-card">
                        <div class="d-flex align-items-center mb-2">
                            <i class="fa fa-gamepad fa-lg me-2"></i>
                            <span class="fw-semibold">Kerajinan</span>
                        </div>
                        <div class="progress mb-1">
                            <div class="progress-bar bg-dark" style="width: 20%"></div>
                        </div>
                        <div class="text-end text-muted" style="font-size:0.95rem;">4/20 Lesion</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Sidebar animation for mobile
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('sidebarToggle');
    if(toggleBtn) {
        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('hide');
        });
    }
</script>
@endsection
