@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Pilih Kategori dan Bidang Kelas</h1>

    <form action="{{ route('classes.list') }}" method="GET" class="mb-4">
        <div class="mb-3">
            <label for="kategori_umkm_id" class="form-label">Kategori UMKM</label>
            <select name="kategori_umkm_id" id="kategori_umkm_id" class="form-select" style="color: black; background-color: white;">
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" style="color: black; background-color: white;">{{ $kategori->nama_kategori }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="field" class="form-label">Bidang</label>
            <select name="field" id="field" class="form-select">
                <option value="">-- Pilih Bidang --</option>
                @foreach($fields as $field)
                    <option value="{{ $field }}">{{ ucfirst($field) }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="level" class="form-label">Tingkatan Level</label>
            <select name="level" id="level" class="form-select">
                <option value="">-- Pilih Level --</option>
                @foreach($levels as $level)
                    <option value="{{ $level }}">{{ ucfirst($level) }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Metode</label>
            <select name="type" id="type" class="form-select">
                <option value="">-- Pilih Metode --</option>
                <option value="daring">Daring</option>
                <option value="luring">Luring</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Cari Kelas</button>
    </form>
</div>
@endsection
