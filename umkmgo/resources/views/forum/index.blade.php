@extends('layouts.app')

@section('content')
<h2 class="mb-4">Diskusi UMKM</h2>
<a href="{{ route('forum.create') }}" class="btn btn-orange mb-3">+ Tambah Diskusi</a>

@foreach ($forums as $forum)
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $forum->title }}</h5>
            <p class="card-text">{{ $forum->content }}</p>
            <small class="text-muted">Oleh: {{ $forum->user->name }}</small>
        </div>
    </div>
@endforeach
@endsection
