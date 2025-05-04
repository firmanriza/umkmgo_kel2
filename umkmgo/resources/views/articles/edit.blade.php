@extends('layouts.app')

@section('content')
<div class="container py-4">
    <!-- Header Section -->
    

    <!-- Card for Edit Form -->
    <div class="card shadow-sm" style="background-color: white; color: black; border-radius: 12px;">
        <div class="card-header" style="background-color: #F97316; color: white; border-radius: 12px 12px 0 0;">
            <h4 class="mb-0">Edit Artikel</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Title Input -->
                <div class="mb-3">
                    <label for="title" class="form-label">Judul Artikel</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $article->title }}" required>
                </div>

                <!-- Content Input -->
                <div class="mb-3">
                    <label for="content" class="form-label">Isi Artikel</label>
                    <textarea class="form-control" name="content" id="content" rows="6" required>{{ $article->content }}</textarea>
                </div>

                <!-- Current Image -->
                <div class="mb-3">
                    <label for="image" class="form-label">Gambar Saat Ini</label><br>
                    @if ($article->image)
                        <img src="{{ asset('storage/' . $article->image) }}" alt="Gambar Artikel" class="img-fluid mb-2" style="max-height: 200px;">
                    @else
                        <p><em>Tidak ada gambar</em></p>
                    @endif

                    <!-- Image Upload -->
                    <label for="image" class="form-label">Ganti Gambar (opsional)</label>
                    <input type="file" class="form-control" name="image" id="image" accept="image/*">
                </div>

                <!-- Action Buttons -->
                <div class="d-flex gap-3 mt-4">
                    <button type="submit" class="btn btn-success px-6 py-2 rounded-lg">
                        Update
                    </button>
                    <a href="{{ route('articles.index') }}" class="btn btn-secondary px-6 py-2 rounded-lg">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection