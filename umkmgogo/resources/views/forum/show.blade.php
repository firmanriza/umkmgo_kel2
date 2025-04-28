@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <!-- Forum Post -->
    <div class="card mb-4">
        <div class="card-body">
            <h2 class="card-title">{{ $forum->title }}</h2>
            <p class="card-text">{{ $forum->content }}</p>
            <p class="text-muted mb-0">
                <small>Diposting oleh <strong>{{ $forum->user->name }}</strong> pada {{ $forum->created_at->format('d M Y H:i') }}</small>
            </p>
        </div>
    </div>

    <!-- Komentar -->
    <div class="card mb-4">
        <div class="card-header">
            <h5>Komentar</h5>
        </div>
        <div class="card-body">
            @if ($forum->comments->count() > 0)
                @foreach ($forum->comments as $comment)
                    <div class="mb-3 border-bottom pb-2">
                        <p class="mb-1"><strong>{{ $comment->user->name }}</strong> mengatakan:</p>
                        <p class="mb-0">{{ $comment->content }}</p>
                        <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                    </div>
                @endforeach
            @else
                <p class="text-muted">Belum ada komentar.</p>
            @endif
        </div>
    </div>

    <!-- Form Komentar -->
    <div class="card">
        <div class="card-header">
            <h5>Tulis Komentar</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('comments.store') }}" method="POST">
                @csrf
                <input type="hidden" name="forum_id" value="{{ $forum->id }}">

                <div class="form-group mb-3">
                    <textarea name="content" class="form-control" rows="3" placeholder="Tulis komentarmu..." required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Kirim Komentar</button>
            </form>
        </div>
    </div>
</div>
@endsection
