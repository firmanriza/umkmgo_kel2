@extends('layouts.app')

@section('content')

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<style>
.hover-scale {
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.hover-scale:hover {
  transform: scale(1.05);
  box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
}

.section-title {
  font-size: 1.5rem;
  font-weight: 700;
  color: #fff;
  background-color: rgba(0, 0, 0, 0.4);
  padding: 0.5rem 1rem;
  border-left: 5px solid #FF6B00;
  border-radius: 8px;
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  text-shadow: none;
}

.blur-wrapper {
  background: rgba(0, 112, 224, 0.25);
  backdrop-filter: blur(12px);
  border: 1px solid rgba(255,255,255,0.2);
  border-radius: 20px;
  padding: 24px;
}

.btn-white-custom {
  background: white;
  color: #333;
  font-weight: 600;
  border: none;
  padding: 10px 20px;
  border-radius: 8px;
  transition: all 0.3s ease-in-out;
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
  font-size: 0.95rem;
}

.btn-white-custom:hover {
  background: #f1f1f1;
  color: #000;
  transform: scale(1.05);
  box-shadow: 0 6px 14px rgba(0,0,0,0.15);
}

.admin-badge {
  background-color: #FF6B00;
  color: white;
  font-weight: bold;
  padding: 4px 16px;
  border-radius: 12px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.15);
  border: 1px solid rgba(0,0,0,0.1);
}
</style>

@if(auth()->user()->role === 'admin')
<!-- ADMIN -->
<div class="container mt-5 px-4 px-md-5">
    <div class="blur-wrapper mb-4">
        <div class="card shadow-lg rounded-4 border-0 bg-white p-4 w-100">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                <h1 class="fw-bold mb-3 mb-md-0" style="font-family: 'Plus Jakarta Sans', sans-serif; font-size: 2rem;">
                    Dashboard
                    <span class="admin-badge ms-3">Admin</span>
                </h1>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-md-6 col-lg-3">
            <div class="card p-4 hover-scale text-white h-100" style="background-color:#20c997; border-radius:10px;">
                <h4 class="d-flex justify-content-between align-items-center">
                    Manajemen Artikel
                    <i class="bi bi-journal-richtext fs-4"></i>
                </h4>
                <p>Mengelola artikel untuk edukasi UMKM.</p>
                <a href="{{ route('articles.index') }}" class="btn btn-light btn-sm mt-auto">Kelola Artikel</a>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card p-4 hover-scale text-white h-100" style="background-color:#fd7e14; border-radius:10px;">
                <h4 class="d-flex justify-content-between align-items-center">
                    Manajemen Forum
                    <i class="bi bi-people-fill fs-4"></i>
                </h4>
                <p>Kelola forum pada komunitas.</p>
                <a href="{{ route('forum.index') }}" class="btn btn-light btn-sm mt-auto">Kelola Forum</a>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card p-4 hover-scale text-white h-100" style="background-color:#0d6efd; border-radius:10px;">
                <h4 class="d-flex justify-content-between align-items-center">
                    Manajemen Kelas
                    <i class="bi bi-easel2-fill fs-4"></i>
                </h4>
                <p>CRUD kelas luring/daring dari kategori UMKM dan bidangnya.</p>
                <a href="{{ route('classes.index') }}" class="btn btn-light btn-sm mb-2">Kelola Kelas</a>
                <a href="{{ route('classes.create') }}" class="btn btn-light btn-sm">Tambah Kelas</a>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card p-4 hover-scale text-white h-100" style="background-color:#dc3545; border-radius:10px;">
                <h4 class="d-flex justify-content-between align-items-center">
                    Monitor Sertifikat
                    <i class="bi bi-award-fill fs-4"></i>
                </h4>
                <p>Melihat user yang sudah mengerjakan quiz dan mendapat sertifikat</p>
                <a href="{{ route('admin.certificates.assign') }}" class="btn btn-light btn-sm mt-auto">Monitor Sertifikat</a>
            </div>
        </div>
    </div>
</div 


@elseif(auth()->user()->role === 'mentor')
<!-- MENTOR -->
<div class="d-flex flex-column align-items-center vh-100 text-center">
<h1 class="text-white mb-4 mt-5" style="font-family: 'Plus Jakarta Sans', sans-serif;">
    <b>Dashboard</b>     
    <span class="fw-bold px-2 py-1" style="background-color: #FF6B00; border-radius: 20px;">
        Mentor
    </span>
</h1>
<div class="mentor-dashboard container px-4 px-md-5">
    <div class="mentor-cards d-flex gap-4 flex-wrap">
        <div class="card p-3 d-flex flex-column justify-content-between" style="flex:1; background-color:#fd7e14; color:white; border-radius:10px; min-height: 250px;">
            <div>
                <h3>Manajemen Forum</h3>
                <p>Kelola forum pada komunitas.</p>
            </div>
            <a href="{{ route('forum.index') }}" class="btn btn-light mt-3">Kelola Forum</a>
        </div>
        <div class="card p-3 d-flex flex-column justify-content-between" style="flex:1; background-color:#0d6efd; color:white; border-radius:10px; min-height: 250px;">
            <div>
                <h3>Manajemen Kelas</h3>
                <p>CRUD kelas luring/daring dari kategori UMKM dan bidangnya.</p>
            </div>
            <div>
                <a href="{{ route('classes.index') }}" class="btn btn-light">Kelola Kelas</a>
            </div>
        </div>
        <div class="card p-3 d-flex flex-column justify-content-between" style="flex:1; background-color:#dc3545; color:white; border-radius:10px; min-height: 250px;">
            <div>
                <h3>Manajemen Sertifikat</h3>
                <p>Tambah sertifikat untuk pengguna yang menyelesaikan kelas dan quiz akhir.</p>
            </div>
            <a href="{{ route('admin.certificates.assign') }}" class="btn btn-light mt-3">Kelola Sertifikat</a>
        </div>
    </div>
</div>

@else
<!-- USER -->
<div class="dashboard-header py-5 px-4 px-md-5 mb-0 w-100" style="background: rgba(0, 112, 224, 0.4); backdrop-filter: blur(12px); border: 1px solid rgba(255,255,255,0.2); border-radius: 20px; margin-top: 70px;">
    <div class="container px-0">
        <div class="card shadow-lg rounded-4 border-0 bg-white p-4 w-100">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                <div>
                    <h2 class="fw-bold text-dark mb-2" style="font-size: 2rem;">Halo, {{ auth()->user()->name }} 👋</h2>
                    <p class="text-secondary mb-2" style="font-size: 1.1rem;">Selamat datang di platform komunitas UMKM untuk berbagi, berdiskusi, dan bertumbuh bersama.</p>
                </div>
                <div class="bg-light rounded-pill px-4 py-2 shadow-sm">
                    <span class="fw-bold text-dark">Status Akun:</span> <span class="text-success">Aktif</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Aktivitas Belajar & Lain dalam 1 row -->
<div class="container mt-5 px-4 px-md-5">
    <div class="row g-4">
        <!-- Aktivitas Belajar -->
        <div class="col-md-8">
            <div class="card p-4 shadow-sm border-0 rounded-4 bg-white h-100">
                <h4 class="fw-bold mb-3"><i class="bi bi-journal-check me-2 text-primary"></i> Aktivitas Belajar</h4>
                @if(isset($certificates) && $certificates->count())
                    <ul class="list-group list-group-flush">
                        @foreach($certificates as $certificate)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>
                                    {{ $certificate->class->kategori->nama_kategori ?? '-' }} -
                                    {{ ucfirst($certificate->class->field ?? '-') }} -
                                    {{ ucfirst($certificate->class->level ?? '-') }}
                                    <span class="badge bg-success ms-2">Selesai</span>
                                </span>
                                <span class="text-muted" style="font-size:0.9em;">
                                    {{ ($certificate->issued_at instanceof \Illuminate\Support\Carbon) ? $certificate->issued_at->format('d-m-Y') : \Carbon\Carbon::parse($certificate->issued_at)->format('d-m-Y') }}
                                </span>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div class="text-secondary">Belum ada aktivitas belajar.</div>
                @endif
            </div>
        </div>

        <!-- Aktivitas Lain -->
        <div class="col-md-4">
            <div class="card p-4 shadow-sm border-0 rounded-4 bg-white h-100">
                <h4 class="fw-bold mb-3"><i class="bi bi-activity me-2 text-warning"></i> Aktivitas Lain</h4>
                @if(isset($forums) && $forums->count())
                    <ul class="list-group list-group-flush">
                        @foreach($forums as $forum)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>{{ $forum->title }}</span>
                                <a href="{{ route('forum.show', $forum->id) }}" class="btn btn-outline-primary btn-sm">Lihat</a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div class="text-secondary">Belum ada aktivitas lain.</div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Fitur -->
<div class="container my-5 px-4 px-md-5">
    <h4 class="section-title mb-4">
        <i class="bi bi-grid-fill"></i> Fitur
    </h4>
    <div class="card p-4 shadow-sm border-0 rounded-4 bg-light">
        <div class="row row-cols-2 row-cols-md-3 g-4 text-center">
            <div class="col">
                <a href="{{ route('forum.index') }}" class="text-decoration-none">
                    <div class="p-3 rounded-3 shadow-sm h-100 transition-transform hover-scale" style="background-color: #FF6B00;">
                        <i class="bi bi-people-fill display-5 text-white"></i>
                        <p class="mt-2 mb-0 text-white fw-semibold">Forum</p>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="{{ route('user.certificates') }}" class="text-decoration-none">
                    <div class="p-3 rounded-3 shadow-sm h-100 transition-transform hover-scale" style="background-color: #FF6B00;">
                        <i class="bi bi-award-fill display-5 text-white"></i>
                        <p class="mt-2 mb-0 text-white fw-semibold">Sertifikat</p>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="{{ route('kategori.index') }}" class="text-decoration-none">
                    <div class="p-3 rounded-3 shadow-sm h-100 transition-transform hover-scale" style="background-color: #FF6B00;">
                        <i class="bi bi-clipboard-check-fill display-5 text-white"></i>
                        <p class="mt-2 mb-0 text-white fw-semibold">Quiz Awal</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Artikel -->
<div class="container mt-5 mb-5 px-4 px-md-5">
    <h3 class="section-title mb-4">
        <i class="bi bi-newspaper"></i> Berita & Artikel Terbaru
    </h3>
    <div class="row g-4">
        @php
            $articles = $articles ?? \App\Models\Article::latest()->take(6)->get();
        @endphp
        @forelse($articles as $article)
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm rounded-4">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $article->title }}</h5>
                        <p class="card-text text-secondary">{{ Str::limit($article->content, 100) }}</p>
                        <a href="{{ route('articles.show', $article->id) }}" class="btn btn-outline-primary rounded-pill">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center text-secondary">Belum ada berita atau artikel.</div>
        @endforelse
    </div>
</div>
@endif

@endsection




