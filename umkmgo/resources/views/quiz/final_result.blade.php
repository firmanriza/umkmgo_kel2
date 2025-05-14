@extends('layouts.app')

@section('content')
<style>
    .quiz-result-card {
        background-color: #003366;
        color: white;
        transition: box-shadow 0.3s ease, transform 0.3s ease;
    }

    .quiz-result-card:hover {
        box-shadow: 0 0 20px rgba(0, 123, 255, 0.6);
        transform: translateY(-5px);
    }

    .btn-custom-blue {
        background-color: #003366;
        color: white;
        border: none;
        transition: box-shadow 0.3s ease, transform 0.3s ease;
    }

    .btn-custom-blue:hover {
        box-shadow: 0 0 15px rgba(0, 123, 255, 0.6);
        transform: translateY(-3px);
    }

    .alert-custom {
        background-color: #003366;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        display: inline-block;
    }
</style>

<h2 class="mb-4 text-white">Hasil Kuis Akhir</h2>

<div class="card mb-4 quiz-result-card">
    <div class="card-body text-center">
        <h3 class="text-xl font-semibold">Skor Anda</h3>
        <p>Anda mendapatkan skor <strong>{{ $score }}</strong> dari total <strong>{{ $total }}</strong> soal yang dikerjakan.</p>
        <p class="mt-2">Nilai Akhir Anda: <strong>{{ $nilai }}%</strong></p>
    </div>
</div>

@if($nilai >= 75)
    <div class="d-flex justify-content-center gap-3 mt-4">
        <a href="{{ route('home') }}">
            <button class="btn btn-secondary">Kembali ke Beranda</button>
        </a>
        <a href="{{ route('viewCertificate') }}">
            <button class="btn btn-custom-blue">Lihat Sertifikat</button>
        </a>
    </div>
@else
    <div class="text-center mt-4">
        <span class="alert-custom">
            ⚠️ Nilai Anda belum mencukupi untuk mendapatkan sertifikat. Minimal 75%.
        </span>
    </div>

    <div class="text-center mt-3">
        <a href="{{ route('home') }}">
            <button class="btn btn-secondary">Kembali ke Beranda</button>
        </a>
    </div>
@endif

@endsection
