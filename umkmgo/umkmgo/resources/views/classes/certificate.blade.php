@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Sertifikat Kelas</h1>

    @if($certificate)
        <p>Selamat! Anda telah menyelesaikan kelas dan kuis akhir.</p>
        <p>Sertifikat ini diberikan sebagai bukti partisipasi dan keberhasilan Anda.</p>

        <div class="certificate-details">
            <p><strong>ID Sertifikat:</strong> {{ $certificate->id }}</p>
            <p><strong>Nama Peserta:</strong> {{ $certificate->user->name }}</p>
            <p><strong>Kelas:</strong> {{ $certificate->class->kategori->nama_kategori ?? '-' }} - {{ ucfirst($certificate->class->field) }} - {{ ucfirst($certificate->class->level) }}</p>
            <p><strong>Tanggal Terbit:</strong> {{ $certificate->issued_at ? $certificate->issued_at->format('d-m-Y') : '-' }}</p>
            @if($certificate->certificate_path)
                <p><strong>File Sertifikat:</strong> <a href="{{ asset($certificate->certificate_path) }}" target="_blank">Lihat Sertifikat</a></p>
            @endif
        </div>
    @else
        <p>Sertifikat tidak ditemukan.</p>
    @endif

    <a href="{{ route('classes.index') }}" class="btn btn-primary mt-3">Kembali ke Pilihan Kelas</a>
</div>
@endsection
