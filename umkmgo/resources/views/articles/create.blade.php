@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Buat Artikel Baru</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Judul --}}
                <div class="mb-3">
                    <label for="title" class="form-label">Judul Artikel</label>
                    <input type="text" class="form-control" name="title" id="title" required>
                </div>

                {{-- Konten --}}
                <div class="mb-3">
                    <label for="content" class="form-label">Isi Artikel</label>
                    <textarea class="form-control" name="content" id="content" rows="6" required></textarea>
                </div>

                {{-- Gambar --}}
                <div class="mb-3">
                    <label for="image" class="form-label">Upload Gambar (Opsional)</label>
                    <input type="file" class="form-control" name="image" id="image" accept="image/*">
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('articles.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
