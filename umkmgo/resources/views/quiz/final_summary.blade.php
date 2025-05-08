@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="breadcrumb text-sm text-gray-600 mb-6" aria-label="Breadcrumb">
        FAKULTAS REKAYASA INDUSTRI / PRODI SI SISTEM INFORMASI / {{ $quiz->kategori->nama_kategori }} / Latihan Soal / Summary of attempt
    </div>

    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex items-center gap-3 mb-6">
            <div class="w-8 h-8 bg-pink-500 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                </svg>
            </div>
            <h1 class="text-xl font-semibold">Latihan Soal</h1>
        </div>

        <a href="{{ url()->previous() }}" class="inline-block mb-6">
            <button class="px-4 py-2 bg-blue-100 text-blue-600 rounded-md hover:bg-blue-200 transition-colors" aria-label="Kembali ke halaman sebelumnya">
                ← Back
            </button>
        </a>

        <div class="mb-8">
            <h2 class="text-lg font-semibold mb-4">Summary of attempt</h2>
            <div class="bg-gray-50 rounded-lg p-6">
                <table class="w-full" role="table">
                    <thead>
                        <tr class="border-b">
                            <th class="text-left py-2 w-20">Question</th>
                            <th class="text-left py-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($quiz->soals as $index => $soal)
                            <tr class="border-b last:border-0">
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
        </div>

        <div class="flex justify-between items-center">
            <button onclick="history.back()" class="px-4 py-2 border border-gray-300 rounded-md hover:bg-gray-50 transition-colors" aria-label="Kembali ke halaman latihan soal">
                Return to attempt
            </button>
            <form action="{{ route('quiz.final_submit', $quiz->id) }}" method="POST" class="inline" aria-label="Form submit kuis akhir">
                @csrf
                @foreach($answers as $soal_id => $answer)
                    <input type="hidden" name="jawaban[{{ $soal_id }}]" value="{{ $answer }}">
                @endforeach
                <button type="submit" class="px-6 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition-colors" aria-label="Submit semua jawaban dan selesai">
                    Submit all and finish
                </button>
            </form>
        </div>
    </div>

    <div class="fixed top-4 right-4 bg-white rounded-lg shadow-lg p-4 w-64" aria-label="Navigasi kuis">
        <h3 class="text-lg font-semibold mb-4">Quiz navigation</h3>
        <div class="grid grid-cols-5 gap-2">
            @foreach($quiz->soals as $index => $soal)
                <div class="w-10 h-10 flex items-center justify-center rounded border 
                    {{ isset($answers[$soal->id]) ? 'bg-gray-200' : 'border-gray-300' }}">
                    {{ $index + 1 }}
                </div>
            @endforeach
        </div>
        <div class="mt-4 text-sm text-gray-500">
            <p>Coming soon: Progress tracking across all quizzes</p>
        </div>
    </div>
</div>
@endsection
