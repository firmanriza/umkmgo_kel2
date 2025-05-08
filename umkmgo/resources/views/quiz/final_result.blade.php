@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="breadcrumb text-sm text-gray-600 mb-6" aria-label="Breadcrumb">
        {{ $quiz->kategori->nama_kategori }} / {{ $quiz->nama_quiz }} / Hasil Kuis
    </div>

    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex items-center gap-3 mb-6">
            <div class="w-8 h-8 bg-pink-500 rounded-lg flex items-center justify-center" aria-hidden="true">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <h1 class="text-xl font-semibold">Hasil Kuis</h1>
        </div>

        <div class="mb-8">
            <div class="text-center p-6 bg-gray-50 rounded-lg">
                <div class="text-6xl font-bold mb-4">
                    {{ $score }} / {{ $total }}
                </div>

                @php
                    $percentage = ($score / $total) * 100;
                @endphp

                <div class="text-2xl font-semibold mb-4">
                    Nilai: {{ number_format($percentage, 1) }}%
                </div>

                <div class="text-lg">
                    @if($percentage >= 80)
                        <p class="text-green-600">Selamat! Anda telah menguasai materi dengan sangat baik!</p>
                    @elseif($percentage >= 60)
                        <p class="text-yellow-600">Bagus! Anda memiliki pemahaman yang baik.</p>
                    @else
                        <p class="text-orange-600">Anda masih perlu meningkatkan pemahaman. Tetap semangat! 💪</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="mb-8">
            <h2 class="text-lg font-semibold mb-4">Review Jawaban</h2>
            <div class="space-y-6">
                @foreach($quiz->soals as $index => $soal)
                    <div class="p-4 rounded-lg {{ $userAnswers[$soal->id] === $correctAnswers[$soal->id] ? 'bg-green-50' : 'bg-red-50' }}">
                        <div class="flex items-start gap-3">
                            <div class="w-6 h-6 mt-1 rounded-full flex items-center justify-center {{ $userAnswers[$soal->id] === $correctAnswers[$soal->id] ? 'bg-green-500' : 'bg-red-500' }}" aria-hidden="true">
                                @if($userAnswers[$soal->id] === $correctAnswers[$soal->id])
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                @else
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                @endif
                            </div>
                            <div class="flex-1">
                                <p class="font-semibold mb-3">{{ $index + 1 }}. {{ $soal->pertanyaan }}</p>
                                
                                <div class="space-y-2 ml-4">
                                    @foreach(['A' => $soal->pilihan_a, 'B' => $soal->pilihan_b, 'C' => $soal->pilihan_c, 'D' => $soal->pilihan_d] as $option => $text)
                                        <div class="flex items-center gap-2 {{ $correctAnswers[$soal->id] === $option ? 'text-green-700 font-semibold' : '' }} {{ $userAnswers[$soal->id] === $option && $userAnswers[$soal->id] !== $correctAnswers[$soal->id] ? 'text-red-600' : '' }}">
                                            <span class="w-6">{{ $option }}.</span>
                                            <span>{{ $text }}</span>
                                            @if($correctAnswers[$soal->id] === $option)
                                                <span class="text-green-600 ml-2">(Jawaban Benar)</span>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>

                                @if($userAnswers[$soal->id] !== $correctAnswers[$soal->id])
                                    <div class="mt-3 text-red-600" aria-label="Jawaban Anda">
                                        Jawaban Anda: {{ $userAnswers[$soal->id] }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="flex justify-between">
            <a href="{{ route('quiz.final') }}" class="px-6 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors" aria-label="Kembali ke Daftar Kuis">
                Kembali ke Daftar Kuis
            </a>
            <a href="{{ route('quiz.final_attempt', $quiz->id) }}" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors" aria-label="Coba Lagi">
                Coba Lagi
            </a>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.tailwindcss.com"></script>
@endpush
@endsection
