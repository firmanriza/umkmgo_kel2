@extends('layouts.app')

@section('content')

@if(auth()->user()->role === 'admin')
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
            <a href="{{ route('admin.users.index') }}" class="btn btn-light mt-3">Kelola Pengguna</a>
        </div>

        <div class="card p-3 d-flex flex-column justify-content-between" style="flex:1; background-color:#20c997; color:white; border-radius:10px; min-height: 250px;">
            <div>
                <h3>Manajemen Artikel</h3>
                <p>Mengelola artikel untuk edukasi UMKM.</p>
            </div>
            <a href="{{ route('articles.index') }}" class="btn btn-light mt-3">Kelola Artikel</a>
        </div>

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
                <a href="{{ route('classes.create') }}" class="btn btn-light mt-2">Tambah Kelas</a>
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

@elseif(auth()->user()->role === 'mentor')
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
            <a href="{{ route('forum.index') }}" class="btn btn-light mt-3">Kelola Forum</a>
        </div>

        <div class="card p-3 d-flex flex-column justify-content-between" style="flex:1; background-color:#0d6efd; color:white; border-radius:10px; min-height: 250px;">
            <div>
                <h3>Manajemen Kelas</h3>
                <p>CRUD kelas luring/daring dari kategori UMKM dan bidangnya.</p>
            </div>
            <div>
                <a href="{{ route('classes.index') }}" class="btn btn-light">Kelola Kelas</a>
                <!-- <a href="{{ route('classes.create') }}" class="btn btn-light mt-2">Tambah Kelas</a> -->
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
<!-- Section Header Selamat Datang -->
<div class="dashboard-header py-5 px-3 mb-0 w-100" style="background: #0070e0; margin-top:70px;">
    <div class="container">
        <h1 class="fw-bold text-white mb-2" style="font-size:2.5rem;">Selamat datang, {{ auth()->user()->name }}!</h1>
        <p class="text-white mb-3" style="font-size:1.2rem;">Semoga aktivitas belajarmu menyenangkan.</p>
        <div class="dashboard-status bg-white rounded-3 shadow-sm p-3 d-inline-block">
            <span class="fw-bold text-dark">Status Akun:</span> <span class="text-success">Aktif</span>
        </div>
    </div>
</div>

<!-- Section Progress Report -->
<div class="container my-5">
    <div class="row g-4">
        <div class="col-md-8">
            <div class="card p-4 h-100 shadow-sm border-0 rounded-4">
                <h4 class="fw-bold mb-3">Aktivitas Belajar</h4>
                <!-- Progress report kelas/kuis akan ditampilkan di sini -->
                <div class="text-secondary">Belum ada aktivitas belajar.</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-4 h-100 shadow-sm border-0 rounded-4">
                <h4 class="fw-bold mb-3">Aktivitas Lain</h4>
                <div class="text-secondary">Belum ada aktivitas lain.</div>
            </div>
        </div>
    </div>
</div>

<!-- Section Berita/Artikel -->
<div class="container mt-5 mb-5">
    <h3 class="fw-bold mb-4">Berita & Artikel Terbaru</h3>
    <div class="row g-4">
        @php
            $articles = $articles ?? \App\Models\Article::latest()->take(6)->get();
        @endphp
        @foreach($articles as $article)
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm rounded-4">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $article->title }}</h5>
                        <p class="card-text text-secondary">{{ Str::limit($article->content, 100) }}</p>
                        <a href="{{ route('articles.show', $article->id) }}" class="btn btn-outline-primary rounded-pill">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        @endforeach
        @if(empty($articles) || count($articles) === 0)
            <div class="col-12 text-center text-secondary">Belum ada berita atau artikel.</div>
        @endif
    </div>
</div>

<!-- Section Forum & Sertifikat -->
<div class="container my-5">
    <div class="row g-4">
        <div class="col-md-6">
            <div class="card p-4 h-100 shadow-sm border-0 rounded-4">
                <h4 class="fw-bold mb-3">Forum Komunitas</h4>
                <p class="text-secondary">Bergabung dan diskusi bersama komunitas UMKM.</p>
                <a href="{{ route('forum.index') }}" class="btn btn-primary rounded-pill mt-2">Masuk Forum</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card p-4 h-100 shadow-sm border-0 rounded-4">
                <h4 class="fw-bold mb-3">Sertifikat Saya</h4>
                <ul class="list-group list-group-flush">
                    @php
                        // Dummy sertifikat, ganti dengan relasi user jika sudah ada
                        $certificates = [
                            ['title' => 'Kelas Digital Marketing', 'url' => '#'],
                            ['title' => 'Kelas Manajemen UMKM', 'url' => '#'],
                        ];
                    @endphp
                    @forelse($certificates as $cert)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $cert['title'] }}
                            <a href="{{ $cert['url'] }}" class="btn btn-outline-success btn-sm rounded-pill">Lihat Sertifikat</a>
                        </li>
                    @empty
                        <li class="list-group-item text-secondary">Belum ada sertifikat yang diambil.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>
@endif

@endsection