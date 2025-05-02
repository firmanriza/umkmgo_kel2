@extends('layouts.app')

@section('content')
<h2>Edit Diskusi</h2>

<form method="POST" action="{{ route('forum.update', $forum->id) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="title" class="form-label">Judul</label>
        <input type="text" name="title" class="form-control" value="{{ $forum->title }}" required>
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Isi Diskusi</label>
        <textarea name="content" class="form-control" rows="5" required>{{ $forum->content }}</textarea>
    </div>

    <button type="submit" class="custom-button-orange">Perbarui</button>
</form>
@endsection
