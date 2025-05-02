@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Kelas Baru</h1>

    <form action="{{ route('classes.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Judul Kelas</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi Kelas (opsional)</label>
            <textarea name="description" id="description" class="form-control" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="kategori_umkm_id" class="form-label">Kategori UMKM</label>
            <select name="kategori_umkm_id" id="kategori_umkm_id" class="form-select" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="field" class="form-label">Bidang</label>
            <select name="field" id="field" class="form-select" required>
                <option value="">-- Pilih Bidang --</option>
                @foreach($fields as $field)
                    <option value="{{ $field }}">{{ ucfirst($field) }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="level" class="form-label">Level</label>
            <select name="level" id="level" class="form-select" required>
                <option value="">-- Pilih Level --</option>
                @foreach($levels as $level)
                    <option value="{{ $level }}">{{ ucfirst($level) }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Metode</label>
            <select name="type" id="type" class="form-select" required>
                <option value="">-- Pilih Metode --</option>
                @foreach($types as $type)
                    <option value="{{ $type }}">{{ ucfirst($type) }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="video_url" class="form-label">URL Video (opsional)</label>
            <input type="url" name="video_url" id="video_url" class="form-control" placeholder="https://example.com/video">
        </div>

        <div class="mb-3">
            <label for="schedule_info" class="form-label">Info Jadwal (opsional)</label>
            <textarea name="schedule_info" id="schedule_info" class="form-control" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Kelas</button>
    </form>
</div>
@endsection
