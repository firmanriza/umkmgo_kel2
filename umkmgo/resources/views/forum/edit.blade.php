@extends('layouts.app')

@section('content')
    <h1>Edit Diskusi</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('forum.update', $forum->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ $forum->title }}" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Isi Diskusi</label>
            <textarea class="form-control" name="content" id="content" rows="5" required>{{ $forum->content }}</textarea>
        </div>
        <button type="submit" class="btn btn-orange">Update</button>
        <a href="{{ route('forum.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
