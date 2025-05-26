@extends('layouts.app')

@section('content')
<style>
    .quiz-result-wrapper {
        background-color: rgba(255, 115, 0, 0.15);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 2rem;
        border: 1px solid rgba(255, 115, 0, 0.3);
        max-width: 700px;
        margin: 0 auto;
    }

    .quiz-card {
        background-color: #FF7300;
        color: white;
        padding: 2rem;
        border-radius: 20px;
        font-size: 1.25rem;
        font-weight: 600;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        text-align: center;
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
        background-color: #FF7300;
        color: white;
        padding: 12px 24px;
        border-radius: 12px;
        font-weight: 600;
        margin-top: 20px;
        display: inline-block;
    }

    .btn-wrapper {
        margin-top: 40px;
        text-align: center;
    }

    .btn-wrapper .btn {
        margin: 0 10px;
    }
</style>

<h2 class="mb-6 text-3xl font-extrabold text-white text-center drop-shadow-lg">Hasil Kuis Akhir</h2>

<div class="quiz-result-wrapper">
    <div class="quiz-card">
        <div>Skor Anda: <strong>{{ $score }}</strong> dari <strong>{{ $total }}</strong> soal</div>
        <div class="mt-2">Nilai Akhir Anda: <strong>{{ $nilai }}%</strong></div>
    </div>
</div>

@if($nilai >= 75)
<div class="btn-wrapper">
    <a href="{{ route('home') }}">
        <button class="btn btn-secondary">Kembali ke Beranda</button>
    </a>
    <a href="{{ route('viewCertificate') }}">
        <button class="btn btn-custom-blue">Lihat Sertifikat</button>
    </a>
</div>
@else
    <div class="text-center mt-6">
        <span class="alert-custom">
            ⚠ Nilai Anda belum mencukupi untuk mendapatkan sertifikat. Minimal 75%.
        </span>

        <div class="btn-wrapper">
            <a href="{{ route('home') }}">
                <button class="btn btn-secondary">Kembali ke Beranda</button>
            </a>
        </div>
    </div>
@endif
@endsection
