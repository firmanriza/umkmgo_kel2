@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">{{ isset($class) ? 'Edit Kelas' : 'Tambah Kelas' }}</h2>
    <div class="card p-4">
        <form action="{{ isset($class) ? route('classes.update', $class->id) : route('classes.store') }}" method="POST">
            @csrf
            @if (isset($class))
                @method('PUT')
            @endif

            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $class->title ?? '') }}" required>
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
                <select name="field" class="form-select" required>
                    @foreach ($fields as $field)
                        <option value="{{ $field }}" {{ (isset($class) && $class->field == $field) ? 'selected' : '' }}>
                            {{ ucfirst($field) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="level" class="form-label">Level</label>
                <select name="level" class="form-select" required>
                    @foreach ($levels as $level)
                        <option value="{{ $level }}" {{ (isset($class) && $class->level == $level) ? 'selected' : '' }}>
                            {{ ucfirst($level) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Tipe</label>
                <select name="type" class="form-select" required>
                    @foreach ($types as $type)
                        <option value="{{ $type }}" {{ (isset($class) && $class->type == $type) ? 'selected' : '' }}>
                            {{ ucfirst($type) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="video_url" class="form-label">Link Video</label>
                <input type="url" name="video_url" class="form-control" value="{{ old('video_url', $class->video_url ?? '') }}">
            </div>

            <div class="mb-3">
                <label for="schedule_info" class="form-label">Jadwal (Jika Luring)</label>
                <textarea name="schedule_info" class="form-control">{{ old('schedule_info', $class->schedule_info ?? '') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea name="description" class="form-control">{{ old('description', $class->description ?? '') }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</div>
@endsection
