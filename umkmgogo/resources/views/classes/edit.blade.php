@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Edit Kelas</h1>

    <div class="card p-4">
        <form action="{{ route('classes.update', $class->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Judul Kelas</label>
                <input type="text" name="title" id="title" class="form-control" required value="{{ old('title', $class->title) }}">
            </div>

            <div class="mb-3">
                <label for="kategori_umkm_id" class="form-label">Kategori UMKM</label>
                <select name="kategori_umkm_id" id="kategori_umkm_id" class="form-select" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($kategoris as $kategori)
                        <option value="{{ $kategori->id }}" {{ (old('kategori_umkm_id', $class->kategori_umkm_id) == $kategori->id) ? 'selected' : '' }}>
                            {{ $kategori->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="field" class="form-label">Bidang</label>
                <select name="field" id="field" class="form-select" required>
                    <option value="">-- Pilih Bidang --</option>
                    @foreach($fields as $field)
                        <option value="{{ $field }}" {{ (old('field', $class->field) == $field) ? 'selected' : '' }}>
                            {{ ucfirst($field) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="level" class="form-label">Level</label>
                <select name="level" id="level" class="form-select" required>
                    <option value="">-- Pilih Level --</option>
                    @foreach($levels as $level)
                        <option value="{{ $level }}" {{ (old('level', $class->level) == $level) ? 'selected' : '' }}>
                            {{ ucfirst($level) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Metode</label>
                <select name="type" id="type" class="form-select" required>
                    <option value="">-- Pilih Metode --</option>
                    @foreach($types as $type)
                        <option value="{{ $type }}" {{ (old('type', $class->type) == $type) ? 'selected' : '' }}>
                            {{ ucfirst($type) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea name="description" id="description" class="form-control" rows="3">{{ old('description', $class->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="video_url" class="form-label">URL Video (opsional)</label>
                <input type="url" name="video_url" id="video_url" class="form-control" value="{{ old('video_url', $class->video_url) }}" placeholder="https://example.com/video">
            </div>

            <div class="mb-3">
                <label for="schedule_info" class="form-label">Info Jadwal (opsional)</label>
                <textarea name="schedule_info" id="schedule_info" class="form-control" rows="3">{{ old('schedule_info', $class->schedule_info) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Perbarui Kelas</button>
        </form>
    </div>
</div>
@endsection
