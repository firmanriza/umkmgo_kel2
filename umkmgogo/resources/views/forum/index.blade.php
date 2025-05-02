@extends('layouts.app')

@section('content')
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
</style>

<div class="group-header mb-4">
    <div class="container">
        <h2>Forum Diskusi UMKMGO</h2>
        <p class="group-subinfo">Forum Untuk Berbagi & Bertanya seputar UMKM</p>
    </div>
</div>

<div class="container">
    <!-- Tab Navigasi -->
    <ul class="nav nav-tabs nav-umkmgo mb-4">
        <li class="nav-item">
            <a class="nav-link active" href="#">Diskusi</a>
       
    </ul>

    <!-- Tombol Tambah Diskusi -->
    <div class="text-end mb-3">
        <a href="{{ route('forum.create') }}">
            <button class="custom-button">+ Tambah Diskusi</button>
        </a>
    </div>

    <!-- Daftar Forum -->
    @foreach ($forums as $forum)
        <div class="card mb-3 card-post p-3 rounded-4">
            <a href="{{ route('forum.show', $forum->id) }}" style="text-decoration: none; color: inherit;">
                <h5 class="mb-1">{{ $forum->title }}</h5>
                <p class="text-muted mb-2">{{ Str::limit($forum->content, 100) }}</p>

                <small class="text-muted">
                    Oleh: {{ $forum->user->name }}
                    @if ($forum->user->role === 'admin')
                        <span class="badge bg-primary ms-1">Admin</span>
                    @endif
                </small>
            </a>

            @if (Auth::id() === $forum->user_id || Auth::user()->role === 'admin')
                <div class="mt-2 d-flex gap-2">
                    <a href="{{ route('forum.edit', $forum->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>

                    <form action="{{ route('forum.destroy', $forum->id) }}" method="POST" onsubmit="return confirm('Yakin hapus forum ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                    </form>
                </div>
            @endif
        </div>
    @endforeach
</div>
@endsection
