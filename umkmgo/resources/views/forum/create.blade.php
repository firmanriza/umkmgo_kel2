@extends('layouts.app')

@section('content')
<h2>Buat Diskusi Baru</h2>

<form method="POST" action="{{ route('forum.store') }}">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Judul</label>
        <input type="text" name="title" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Isi Diskusi</label>
        <textarea name="content" class="form-control" rows="5" required></textarea>
    </div>
    <button type="submit" class="btn btn-success">Kirim</button>
</form>
@endsection
