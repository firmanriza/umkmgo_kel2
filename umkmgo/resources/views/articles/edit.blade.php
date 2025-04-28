@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0">Edit Artikel</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Judul --}}
                <div class="mb-3">
                    <label for="title" class="form-label">Judul Artikel</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $article->title }}" required>
                </div>

                {{-- Konten --}}
                <div class="mb-3">
                    <label for="content" class="form-label">Isi Artikel</label>
                    <textarea class="form-control" name="content" id="content" rows="6" required>{{ $article->content }}</textarea>
                </div>

                {{-- Gambar --}}
                <div class="mb-3">
                    <label for="image" class="form-label">Gambar Saat Ini</label><br>
                    @if ($article->image)
                        <img src="{{ asset('storage/' . $article->image) }}" alt="Gambar Artikel" class="img-fluid mb-2" style="max-height: 200px;">
                    @else
                        <p><em>Tidak ada gambar</em></p>
                    @endif

                    <label for="image" class="form-label">Ganti Gambar (opsional)</label>
                    <input type="file" class="form-control" name="image" id="image" accept="image/*">
                </div>

                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('articles.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
