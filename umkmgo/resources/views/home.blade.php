@extends('layouts.app')

@section('content')

@if(auth()->user()->role === 'admin')
<div class="admin-dashboard">
    <h1>Dashboard Admin</h1>
    <div class="admin-cards d-flex gap-4">
        <div class="card p-3" style="flex:1; background-color:#6f42c1; color:white; border-radius:10px;">
            <h3>Manajemen Pengguna</h3>
            <p>Lihat dan kelola akun pengguna, termasuk penambahan role Mentor.</p>
            <a href="{{ route('admin.users.index') }}" class="btn btn-light">Kelola Pengguna</a>
        </div>
        <div class="card p-3" style="flex:1; background-color:#20c997; color:white; border-radius:10px;">
            <h3>Manajemen Artikel</h3>
            <p>CRUD artikel untuk edukasi UMKM.</p>
            <a href="{{ route('articles.index') }}" class="btn btn-light">Kelola Artikel</a>
        </div>
        <div class="card p-3" style="flex:1; background-color:#fd7e14; color:white; border-radius:10px;">
            <h3>Manajemen Forum</h3>
            <p>Hapus diskusi/komunitas forum.</p>
            <a href="{{ route('forum.index') }}" class="btn btn-light">Kelola Forum</a>
        </div>
        <div class="card p-3" style="flex:1; background-color:#0d6efd; color:white; border-radius:10px;">
            <h3>Manajemen Kelas</h3>
            <p>CRUD kelas luring/daring dari kategori UMKM dan bidangnya.</p>
            <a href="{{ route('classes.index') }}" class="btn btn-light">Kelola Kelas</a>
            <a href="{{ route('classes.create') }}" class="btn btn-light mt-2">Tambah Kelas</a>
        </div>
        <div class="card p-3" style="flex:1; background-color:#dc3545; color:white; border-radius:10px;">
            <h3>Manajemen Sertifikat</h3>
            <p>Tambah sertifikat untuk pengguna yang menyelesaikan kelas dan quiz akhir.</p>
            <a href="{{ route('admin.certificates.assign') }}" class="btn btn-light">Kelola Sertifikat</a>
        </div>
    </div>
</div>

@else
<div class="w-100 d-flex justify-content-center gap-4 px-5">
    {{-- Card Forum --}}
    <div class="glass-card">
        <p>Platform komunitas UMKM untuk berbagi, berdiskusi, dan bertumbuh bersama.</p>
        <a href="{{ route('forum.index') }}">
            <button class="custom-button mt-3">Masuk ke Forum</button>
        </a>
    </div>

    {{-- Card Artikel --}}
    <div class="glass-card">
        <p>Lihat berbagai macam informasi dan artikel menarik seputar UMKM.</p>
        <a href="{{ route('articles.index') }}">
            <button class="custom-button mt-3">Masuk ke Artikel</button>
        </a>
    </div>

    {{-- Card Quiz --}}
    <div class="glass-card">
        <p>Ukur pengetahuanmu dengan mengerjakan quiz.</p>
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
        <p>Pilih dan ikuti kelas daring atau luring sesuai minat dan kebutuhanmu.</p>
        <a href="{{ route('classes.index') }}">
            <button class="custom-button mt-3">Masuk ke Kelas</button>
        </a>
    </div>
</div>
@endif

@endsection
