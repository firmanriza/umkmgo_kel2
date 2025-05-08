@extends('layouts.app')

@section('content')
<style>
    .custom-header {
        background: linear-gradient(135deg, #F9A826, #F97316);
        color: white;
        padding: 30px 20px;
        border-radius: 12px;
        margin-bottom: 30px;
    }

    .custom-label {
        font-weight: 600;
        color: #333;
    }

    .custom-button {
        background-color: #F97316;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: 500;
    }

    .custom-button:hover {
        background-color: #ea6512;
    }
</style>

<div class="container">
    <div class="custom-header">
        <h2 class="mb-0">Edit Diskusi</h2>
        <p class="mb-0">Perbarui informasi diskusi UMKM yang sudah kamu buat</p>
    </div>

    <form method="POST" action="{{ route('forum.update', $forum->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label custom-label">Judul</label>
            <input type="text" name="title" class="form-control rounded-3" value="{{ $forum->title }}" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label custom-label">Isi Diskusi</label>
            <textarea name="content" class="form-control rounded-3" rows="5" required>{{ $forum->content }}</textarea>
        </div>

        <button type="submit" class="custom-button">Perbarui</button>
    </form>
</div>
@endsection