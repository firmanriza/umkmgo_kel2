@extends('layouts.app')

@section('content')
<!-- Include Bootstrap 5 & Icons if not already in layout -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>
    .form-section {
        max-width: 700px;
        margin: auto;
        background: #ffffff;
        border-radius: 20px;
        padding: 3rem;
        box-shadow: 0 0 40px rgba(0, 0, 0, 0.05);
    }

    .form-section h2 {
        font-weight: 700;
        color: #003366;
        margin-bottom: 2rem;
    }

    .form-label {
        font-weight: 600;
        color: #333;
    }

    .btn-modern {
        background-color: #003366;
        color: #fff;
        border-radius: 30px;
        font-weight: 600;
        padding: 0.75rem 1.5rem;
        transition: all 0.3s ease;
    }

    .btn-modern:hover {
        background-color: #002244;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 51, 102, 0.4);
    }
</style>

<div class="py-5">
    <div class="form-section">
        <h2 class="text-center"><i class="bi bi-shop-window me-2"></i>Profil UMKM</h2>

        @if(session('success'))
            <div class="alert alert-success"><i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}</div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="kategori_umkm_id" class="form-label"><i class="bi bi-tags-fill me-1 text-primary"></i>Kategori UMKM</label>
                <select class="form-select @error('kategori_umkm_id') is-invalid @enderror" id="kategori_umkm_id" name="kategori_umkm_id" required>
                    <option value="">Pilih Kategori UMKM</option>
                    @foreach($kategori_umkms as $kategori)
                        <option value="{{ $kategori->id }}" {{ (old('kategori_umkm_id', $umkm->kategori_umkm_id ?? '') == $kategori->id) ? 'selected' : '' }}>
                            {{ $kategori->nama_kategori }}
                        </option>
                    @endforeach
                </select>
                @error('kategori_umkm_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nama_umkm" class="form-label"><i class="bi bi-pencil-fill me-1 text-primary"></i>Nama UMKM</label>
                <input type="text" class="form-control @error('nama_umkm') is-invalid @enderror" id="nama_umkm" name="nama_umkm" value="{{ old('nama_umkm', $umkm->nama_umkm ?? '') }}" required>
                @error('nama_umkm')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label"><i class="bi bi-geo-alt-fill me-1 text-primary"></i>Alamat</label>
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat', $umkm->alamat ?? '') }}">
                @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="telepon" class="form-label"><i class="bi bi-telephone-fill me-1 text-primary"></i>Telepon</label>
                <input type="text" class="form-control @error('telepon') is-invalid @enderror" id="telepon" name="telepon" value="{{ old('telepon', $umkm->telepon ?? '') }}">
                @error('telepon')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="deskripsi" class="form-label"><i class="bi bi-chat-text-fill me-1 text-primary"></i>Deskripsi</label>
                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="4">{{ old('deskripsi', $umkm->deskripsi ?? '') }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-modern"><i class="bi bi-save2 me-2"></i>Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection