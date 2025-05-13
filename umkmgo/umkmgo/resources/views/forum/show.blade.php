@extends('layouts.app')

@section('content')
<style>
    .custom-header {
        background: linear-gradient(135deg, #F9A826, #F97316);
        color: white;
        padding: 20px 20px;
        border-radius: 12px;
        margin-bottom: 30px;
    }

    .custom-card {
        border-radius: 16px;
        box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.05);
        transition: box-shadow 0.3s;
    }

    .custom-card:hover {
        box-shadow: 0px 4px 16px rgba(0, 0, 0, 0.1);
    }

    .custom-button {
        background-color: #F97316;
        color: white;
        border: none;
        padding: 10px 18px;
        border-radius: 8px;
        font-weight: 500;
    }

    .custom-button:hover {
        background-color: #ea6512;
    }

    .comment-author {
        font-weight: 600;
        color: #333;
    }

    .comment-time {
        font-size: 0.85rem;
        color: #999;
    }
</style>

<div class="container mt-4">
    <div class="custom-header">
        <h2 class="mb-1">{{ $forum->title }}</h2>
        <p class="fs-5">{{ $forum->content }}</p>
        <small>Diposting oleh <strong>{{ $forum->user->name }}</strong> pada {{ $forum->created_at->format('d M Y H:i') }}</small>
    </div>



 
    <div class="card custom-card custom-card-comment mb-4" style="background-color: white;">
        <div class="card-header bg-white">
            <h5 class="mb-0">Komentar</h5>
        </div>
        <div class="card-body">
            @forelse ($forum->comments as $comment)
                <div class="mb-3 border-bottom pb-2">
                    <p class="mb-1 comment-author">{{ $comment->user->name }} mengatakan:</p>
                    <p class="mb-0">{{ $comment->content }}</p>
                    <div class="comment-time">{{ $comment->created_at->diffForHumans() }}</div>
                </div>
            @empty
                <p class="text-muted">Belum ada komentar.</p>
            @endforelse
        </div>

        <div class="card-body">
            <form action="{{ route('comments.store') }}" method="POST">
                @csrf
                <input type="hidden" name="forum_id" value="{{ $forum->id }}">
                <textarea name="content" class="form-control mb-3" rows="3" placeholder="Tulis komentarmu..." required></textarea>
                <button type="submit" class="custom-button">Kirim Komentar</button>
            </form>
        </div>
    </div>
</div>
@endsection