@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-lg p-4">
        <h1 class="text-center mb-4 text-primary fw-bold fs-3">{{ $quiz->judul }}</h1>

        <form action="{{ route('quiz.submit', $quiz->id) }}" method="POST">
            @csrf

            <div id="soal-container">
                @foreach ($quiz->soals as $index => $soal)
                    <div class="soal-item" style="{{ $index !== 0 ? 'display: none;' : '' }}">
                        {{-- Bidang Soal --}}
                        <p class="text-muted mb-2"><strong>Bidang:</strong> {{ $soal->bidang }}</p>

                        {{-- Pertanyaan --}}
                        <h5 class="mb-3">Soal {{ $index + 1 }}: {{ $soal->pertanyaan }}</h5>

                        {{-- Pilihan Jawaban --}}
                        <div class="form-check">
                            <input type="radio" name="jawaban[{{ $soal->id }}]" value="{{ $soal->pilihan_a }}" class="form-check-input" id="a{{ $soal->id }}">
                            <label class="form-check-label" for="a{{ $soal->id }}">{{ $soal->pilihan_a }}</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="jawaban[{{ $soal->id }}]" value="{{ $soal->pilihan_b }}" class="form-check-input" id="b{{ $soal->id }}">
                            <label class="form-check-label" for="b{{ $soal->id }}">{{ $soal->pilihan_b }}</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="jawaban[{{ $soal->id }}]" value="{{ $soal->pilihan_c }}" class="form-check-input" id="c{{ $soal->id }}">
                            <label class="form-check-label" for="c{{ $soal->id }}">{{ $soal->pilihan_c }}</label>
                        </div>
                        <div class="form-check mb-4">
                            <input type="radio" name="jawaban[{{ $soal->id }}]" value="{{ $soal->pilihan_d }}" class="form-check-input" id="d{{ $soal->id }}">
                            <label class="form-check-label" for="d{{ $soal->id }}">{{ $soal->pilihan_d }}</label>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-between mt-4">
                <button type="button" class="btn btn-primary" id="nextBtn">Selanjutnya</button>
                <button type="button" class="btn btn-secondary" id="prevBtn">Sebelumnya</button>
                <button type="submit" class="btn btn-success d-none" id="submitBtn">Kirim Jawaban</button>
            </div>
        </form>
    </div>
</div>

<script>
    const soalItems = document.querySelectorAll('.soal-item');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const submitBtn = document.getElementById('submitBtn');
    let currentSoal = 0;

    function showSoal(index) {
        soalItems.forEach((item, i) => {
            item.style.display = (i === index) ? 'block' : 'none';
        });

        prevBtn.style.display = index === 0 ? 'none' : 'inline-block';
        nextBtn.style.display = index === soalItems.length - 1 ? 'none' : 'inline-block';
        submitBtn.classList.toggle('d-none', index !== soalItems.length - 1);
    }

    prevBtn.addEventListener('click', () => {
        if (currentSoal > 0) {
            currentSoal--;
            showSoal(currentSoal);
        }
    });

    nextBtn.addEventListener('click', () => {
        if (currentSoal < soalItems.length - 1) {
            currentSoal++;
            showSoal(currentSoal);
        }
    });

    // initial load
    showSoal(currentSoal);
</script>
@endsection
