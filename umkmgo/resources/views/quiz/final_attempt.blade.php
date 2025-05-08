@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="breadcrumb text-sm text-gray-600 mb-6" aria-label="Breadcrumb">
        {{ $quiz->kategori->nama_kategori }} / {{ $quiz->nama_quiz }} / Latihan Soal
    </div>

    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
        <h1 class="text-2xl font-bold mb-4">Summary of your previous attempts</h1>
        <table class="w-full" role="table">
            <thead>
                <tr>
                    <th class="text-left py-2">Attempt</th>
                    <th class="text-left py-2">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($quiz->soals as $index => $soal)
                    <tr>
                        <td class="py-3">{{ $index + 1 }}</td>
                        <td class="py-3 text-blue-600">
                            @if(isset($answers[$soal->id]))
                                Answer saved
                            @else
                                Not yet answered
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="bg-white rounded-lg shadow-sm p-6">
        <h2 class="text-lg font-semibold mb-4">Questions</h2>
        <form id="quizForm" action="{{ route('quiz.final_submit', $quiz->id) }}" method="POST" aria-label="Form kuis akhir">
            @csrf
            
            @foreach($quiz->soals as $index => $soal)
                <div class="mb-6">
                    <p class="font-semibold">{{ $index + 1 }}. {{ $soal->pertanyaan }}</p>
                    <div class="space-y-2">
                        <label class="flex items-center">
                            <input type="radio" name="jawaban[{{ $soal->id }}]" value="A" class="mr-2" aria-label="Pilihan A: {{ $soal->pilihan_a }}">
                            {{ $soal->pilihan_a }}
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="jawaban[{{ $soal->id }}]" value="B" class="mr-2" aria-label="Pilihan B: {{ $soal->pilihan_b }}">
                            {{ $soal->pilihan_b }}
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="jawaban[{{ $soal->id }}]" value="C" class="mr-2" aria-label="Pilihan C: {{ $soal->pilihan_c }}">
                            {{ $soal->pilihan_c }}
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="jawaban[{{ $soal->id }}]" value="D" class="mr-2" aria-label="Pilihan D: {{ $soal->pilihan_d }}">
                            {{ $soal->pilihan_d }}
                        </label>
                    </div>
                </div>
            @endforeach

            <div class="flex justify-between">
                <button type="button" class="btn-prev text-blue-600" onclick="history.back()" aria-label="Kembali ke halaman sebelumnya">
                    ← Kembali
                </button>
                <button type="submit" class="btn-submit bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition-colors" aria-label="Selesaikan kuis">
                    Selesai
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    body {
        background-color: #1a73e8;
    }
</style>
@endsection
