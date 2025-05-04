@extends('layouts.app')

@section('content')

<!-- Card untuk Formulir -->
<div class="card" style="background-color: white; color: black; border-radius: 12px; box-shadow: 0 0 6px rgba(0,0,0,0.1);">
    <div class="card-header" style="background-color: #F97316; color: white; border-radius: 12px 12px 0 0;">
        <h4 class="mb-0">Buat Artikel Baru</h4> <!-- Menambahkan color putih di sini -->
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

            <div class="d-flex gap-2">
                <button type="submit" class="custom-button px-6 py-2 rounded-lg">
                    Simpan
                </button>
                <a href="{{ route('articles.index') }}" class="custom-button px-6 py-2 rounded-lg btn-secondary">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>

@endsection