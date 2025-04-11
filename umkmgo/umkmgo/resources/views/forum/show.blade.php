@extends('layouts.app')

@section('content')
    <h1>{{ $forum->title }}</h1>
    <p>{!! nl2br(e($forum->content)) !!}</p>

    <small class="text-muted">Oleh: {{ $forum->user->name }} | {{ $forum->created_at->diffForHumans() }}</small>

    <div class="mt-3">
        @can('update', $forum)
            <a href="{{ route('forum.edit', $forum->id) }}" class="btn btn-sm btn-warning">Edit</a>
        @endcan

        @can('delete', $forum)
            <form action="{{ route('forum.destroy', $forum->id) }}" method="POST" class="d-inline"
                  onsubmit="return confirm('Yakin ingin menghapus diskusi ini?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger">Hapus</button>
            </form>
        @endcan

        <a href="{{ route('forum.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
    </div>
@endsection
