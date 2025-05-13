@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-lg p-4">
        <h1 class="text-center mb-4 text-info fw-bold fs-3">{{ $quiz->nama_quiz }}</h1>

        <div id="soal-container">
            @foreach ($quiz->soals as $index => $soal)
                <div class="soal-item">
                    {{-- Bidang Soal --}}
                    <p class="text-muted mb-2"><strong>Bidang:</strong> {{ $soal->bidang }}</p>

                    {{-- Pertanyaan --}}
                    <h5 class="mb-3">Soal {{ $index + 1 }}: {{ $soal->pertanyaan }}</h5>

                    {{-- Pilihan Jawaban --}}
                    <ul class="list-disc ml-6 text-gray-700">
                        <li>A. {{ $soal->pilihan_a }}</li>
                        <li>B. {{ $soal->pilihan_b }}</li>
                        <li>C. {{ $soal->pilihan_c }}</li>
                        <li>D. {{ $soal->pilihan_d }}</li>
                    </ul>
                </div>
            @endforeach
        </div>

        <a href="{{ route('home') }}" class="btn btn-secondary mt-4">Kembali ke Beranda</a>
    </div>
</div>
@endsection
