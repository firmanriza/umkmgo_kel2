@extends('layouts.app')

@section('content')
    <h1>Buat Diskusi Baru</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('forum.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control" name="title" id="title" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Isi Diskusi</label>
            <textarea class="form-control" name="content" id="content" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-orange">Kirim</button>
        <a href="{{ route('forum.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
