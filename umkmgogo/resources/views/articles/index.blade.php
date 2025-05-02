@extends('layouts.app')

@section('content')
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

    @if(auth()->user()->role === 'admin')
    <div class="text-end mb-4">
        <a href="{{ route('articles.create') }}">
            <button class="custom-button">+ Buat Artikel</button>
        </a>
    </div>
    @endif

    @foreach ($articles as $article)
    <div class="card-article">
        <a href="{{ route('articles.show', $article->id) }}" class="text-decoration-none">
            <h5>{{ $article->title }}</h5>
        </a>
        @if ($article->image)
        <div class="mb-3">
            <a href="{{ route('articles.show', $article->id) }}">
                <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid rounded" alt="{{ $article->title }}">
            </a>
        </div>
        @endif
        <p>{{ Str::limit(strip_tags($article->content ?? ''), 100) }}</p>

        @if(auth()->user()->role === 'admin')
        <div class="d-flex gap-2">
            <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
            {{-- Delete button intentionally removed as per original articles view --}}
        </div>
        @endif
    </div>
    @endforeach
</div>
@endsection
