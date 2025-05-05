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

@else
<div class="d-flex flex-column align-items-center vh-100 text-center">
<h1 class="text-white mb-4 mt-5" style="font-family: 'Plus Jakarta Sans', sans-serif;">
    <b>Selamat Datang di</b>     
    <span class="fw-bold px-2 py-1" style="background-color: #FF6B00; border-radius: 20px;">
        UMKMGo
    </span>
</h1>
<div class="w-100 d-flex justify-content-center gap-4 px-5">
    {{-- Card Forum --}}
    <div class="glass-card">
        <p><b>Platform komunitas UMKM untuk berbagi, berdiskusi, dan bertumbuh bersama.</b></p>
        <a href="{{ route('forum.index') }}">
            <button class="custom-button mt-3">Masuk ke Forum</button>
        </a>
    </div>

    {{-- Card Artikel --}}
    <div class="glass-card">
        <p><b>Lihat berbagai macam informasi dan artikel menarik seputar UMKM.</b></p>
        <a href="{{ route('articles.index') }}">
            <button class="custom-button mt-3">Masuk ke Artikel</button>
        </a>
    </div>

    {{-- Card Quiz --}}
    <div class="glass-card">
        <p><b>Ukur pengetahuanmu dengan mengerjakan quiz.</b></p>
        <div class="d-flex flex-column gap-2 mt-3 w-100 align-items-center">
            <a href="{{ route('kategori.index') }}">
                <button class="custom-button w-100">Kuis Awal</button>
            </a>
            <a href="{{ route('quiz.final') }}">
                <button class="custom-button w-100">Kuis Akhir</button>
            </a>
        </div>
    </div>

    {{-- Card Kelas --}}
    <div class="glass-card">
        <p><b>Pilih dan ikuti kelas daring atau luring sesuai minat dan kebutuhanmu.</b></p>
        <a href="{{ route('classes.index') }}">
            <button class="custom-button mt-3">Masuk ke Kelas</button>
        </a>
    </div>
</div>
@endif

@endsection
