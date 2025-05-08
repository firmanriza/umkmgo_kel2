@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Profile UMKM</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="kategori_umkm_id" class="form-label">Kategori UMKM</label>
            <select class="form-select @error('kategori_umkm_id') is-invalid @enderror" id="kategori_umkm_id" name="kategori_umkm_id">
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
            <label for="nama_umkm" class="form-label">Nama UMKM</label>
            <input type="text" class="form-control @error('nama_umkm') is-invalid @enderror" id="nama_umkm" name="nama_umkm" value="{{ old('nama_umkm', $umkm->nama_umkm ?? '') }}" required>
            @error('nama_umkm')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat', $umkm->alamat ?? '') }}">
            @error('alamat')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="telepon" class="form-label">Telepon</label>
            <input type="text" class="form-control @error('telepon') is-invalid @enderror" id="telepon" name="telepon" value="{{ old('telepon', $umkm->telepon ?? '') }}">
            @error('telepon')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="4">{{ old('deskripsi', $umkm->deskripsi ?? '') }}</textarea>
            @error('deskripsi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
