@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Sertifikat</h1>

    <form action="{{ route('certificates.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="user_id" class="form-label">Pilih User</label>
            <select name="user_id" id="user_id" class="form-select" required>
                <option value="">-- Pilih User --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="class_id" class="form-label">Pilih Kelas</label>
            <select name="class_id" id="class_id" class="form-select" required>
                <option value="">-- Pilih Kelas --</option>
                @foreach($classes as $class)
                    <option value="{{ $class->id }}">{{ $class->kategori->nama_kategori ?? '-' }} - {{ ucfirst($class->field) }} - {{ ucfirst($class->level) }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quiz_id" class="form-label">Pilih Quiz (opsional)</label>
            <select name="quiz_id" id="quiz_id" class="form-select">
                <option value="">-- Pilih Quiz --</option>
                @foreach($quizzes as $quiz)
                    <option value="{{ $quiz->id }}">{{ $quiz->nama_quiz }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="certificate_path" class="form-label">Path Sertifikat (opsional)</label>
            <input type="text" name="certificate_path" id="certificate_path" class="form-control" placeholder="Path file sertifikat">
        </div>

        <div class="mb-3">
            <label for="issued_at" class="form-label">Tanggal Terbit (opsional)</label>
            <input type="date" name="issued_at" id="issued_at" class="form-control" value="{{ date('Y-m-d') }}">
        </div>

        <button type="submit" class="btn btn-primary">Simpan Sertifikat</button>
    </form>
</div>
@endsection
