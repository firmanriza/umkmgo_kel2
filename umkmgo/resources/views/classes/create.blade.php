@extends('layouts.app')

@section('content')


    <div class="card p-3" style="background-color: #757575;">
        <form action="{{ isset($class) ? route('classes.update', $class->id) : route('classes.store') }}" method="POST">
            @csrf
            @if (isset($class))
                @method('PUT')
            @endif

            <div class="row">
                <div class="col-md-6">
                    <div class="card p-3 mb-3" style="background-color: #0d6efd;">
                        <label for="title" class="form-label text-white">Judul</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title', $class->title ?? '') }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card p-3 mb-3" style="background-color: #0d6efd;">
                        <label for="kategori_umkm_id" class="form-label text-white">Kategori UMKM</label>
                        <select name="kategori_umkm_id" id="kategori_umkm_id" class="form-select" required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($kategoris as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card p-3 mb-3" style="background-color: #0d6efd;">
                        <label for="field" class="form-label text-white">Bidang</label>
                        <select name="field" class="form-select" required>
                            @foreach ($fields as $field)
                                <option value="{{ $field }}" {{ (isset($class) && $class->field == $field) ? 'selected' : '' }}>
                                    {{ ucfirst($field) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card p-3 mb-3" style="background-color: #0d6efd;">
                        <label for="level" class="form-label text-white">Level</label>
                        <select name="level" class="form-select" required>
                            @foreach ($levels as $level)
                                <option value="{{ $level }}" {{ (isset($class) && $class->level == $level) ? 'selected' : '' }}>
                                    {{ ucfirst($level) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card p-3 mb-3" style="background-color: #0d6efd;">
                        <label for="type" class="form-label text-white">Tipe</label>
                        <select name="type" class="form-select" required>
                            @foreach ($types as $type)
                                <option value="{{ $type }}" {{ (isset($class) && $class->type == $type) ? 'selected' : '' }}>
                                    {{ ucfirst($type) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card p-3 mb-3" style="background-color: #0d6efd;">
                        <label for="video_url" class="form-label text-white">Link Video</label>
                        <input type="url" name="video_url" class="form-control" value="{{ old('video_url', $class->video_url ?? '') }}">
                    </div>
                </div>
            </div>

            <div class="card p-3 mb-3" style="background-color: #0d6efd;">
                <label for="schedule_info" class="form-label text-white">Jadwal (Jika Luring)</label>
                <textarea name="schedule_info" class="form-control">{{ old('schedule_info', $class->schedule_info ?? '') }}</textarea>
            </div>

            <div class="card p-3 mb-3" style="background-color: #0d6efd;">
                <label for="description" class="form-label text-white">Deskripsi</label>
                <textarea name="description" class="form-control">{{ old('description', $class->description ?? '') }}</textarea>
            </div>
        </form>
        <button type="submit" class="custom-button mt-3">Simpan</button>
    </div>
</div>
@endsection
