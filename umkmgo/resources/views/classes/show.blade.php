@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-3">{{ $class->title }}</h2>

    <div class="card p-3 mb-3 shadow-sm">
        <div class="mb-2">
            <strong>Kategori:</strong> {{ $class->kategori->nama_kategori ?? '-' }}
        </div>

        <div class="mb-2">
            <strong>Bidang:</strong> {{ ucfirst($class->field) }}
        </div>

        <div class="mb-2">
            <strong>Tingkat:</strong> {{ ucfirst($class->level) }}
        </div>

        <div class="mb-2">
            <strong>Jenis:</strong> {{ ucfirst($class->type) }}
        </div>

        <div class="mb-2">
            <strong>Deskripsi:</strong><br>
            {{ $class->description }}
        </div>

        @if ($class->type === 'daring')
            <div class="mb-2">
                <strong>Video Pembelajaran:</strong> 
                <a href="{{ $class->video_url }}" target="_blank" class="btn btn-sm btn-outline-primary">Tonton Video</a>
            </div>
        @else
            <div class="mb-2">
                <strong>Jadwal Kelas Luring:</strong> {{ $class->schedule_info }}
            </div>
        @endif
    </div>

    <a href="{{ route('classes.final_quiz', $class->kategori_umkm_id) }}" class="btn btn-warning text-white mt-3">Ikuti Kuis Akhir</a>
</div>
@endsection
