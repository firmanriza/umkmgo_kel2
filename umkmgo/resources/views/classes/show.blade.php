@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Kelas</h1>

    <h3>{{ ucfirst($class->kategori->nama) }} - {{ ucfirst($class->field) }} - {{ ucfirst($class->level) }} ({{ ucfirst($class->type) }})</h3>

    @if($class->type === 'daring')
        <h4>Materi Video</h4>
        <div class="ratio ratio-16x9">
            <iframe src="{{ $class->video_url }}" title="YouTube video" allowfullscreen></iframe>
        </div>
    @elseif($class->type === 'luring')
        <h4>Jadwal Pelatihan</h4>
        <p>{!! nl2br(e($class->schedule_info)) !!}</p>
    @endif

    <a href="{{ route('classes.final_quiz', $class->kategori_umkm_id) }}" class="btn btn-primary mt-3">Ikuti Kuis Akhir</a>
    <a href="{{ route('classes.certificate', $class->id) }}" class="btn btn-success mt-3">Lihat Sertifikat</a>
    <a href="{{ route('classes.list') }}" class="btn btn-secondary mt-3">Kembali ke Daftar Kelas</a>
</div>
@endsection
