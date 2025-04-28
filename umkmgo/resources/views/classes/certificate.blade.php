@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Sertifikat Kelas</h1>

    <p>Selamat! Anda telah menyelesaikan kelas dan kuis akhir.</p>

    <p>Sertifikat ini diberikan sebagai bukti partisipasi dan keberhasilan Anda.</p>

    {{-- Placeholder for certificate details --}}
    <div class="certificate-details">
        <p><strong>ID Sertifikat:</strong> {{ $id }}</p>
        <p><strong>Nama Peserta:</strong> {{ auth()->user()->name }}</p>
        <p><strong>Tanggal:</strong> {{ date('d-m-Y') }}</p>
    </div>

    <a href="{{ route('classes.index') }}" class="btn btn-primary mt-3">Kembali ke Pilihan Kelas</a>
</div>
@endsection
