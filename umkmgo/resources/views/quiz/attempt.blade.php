@extends('layouts.app')

@section('content')
@push('scripts')
    <script>
        tailwind.config = {
            corePlugins: {
                preflight: false
            }
        }
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
<div class="max-w-3xl mx-auto px-4 py-8">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h1 class="text-3xl font-bold mb-6 text-center text-indigo-600">{{ $quiz->judul }}</h1>

        <form action="{{ route('quiz.submit', $quiz->id) }}" method="POST">
            @csrf

            @foreach ($quiz->soals as $index => $soal)
                <div class="mb-8">
                    <p class="text-lg font-semibold mb-2">Soal {{ $index + 1 }}: {{ $soal->pertanyaan }}</p>
                    <div class="space-y-2 ml-4">
                        <label class="block">
                            <input type="radio" name="jawaban[{{ $soal->id }}]" value="{{ $soal->pilihan_a }}" class="mr-2">
                            {{ $soal->pilihan_a }}
                        </label>
                        <label class="block">
                            <input type="radio" name="jawaban[{{ $soal->id }}]" value="{{ $soal->pilihan_b }}" class="mr-2">
                            {{ $soal->pilihan_b }}
                        </label>
                        <label class="block">
                            <input type="radio" name="jawaban[{{ $soal->id }}]" value="{{ $soal->pilihan_c }}" class="mr-2">
                            {{ $soal->pilihan_c }}
                        </label>
                        <label class="block">
                            <input type="radio" name="jawaban[{{ $soal->id }}]" value="{{ $soal->pilihan_d }}" class="mr-2">
                            {{ $soal->pilihan_d }}
                        </label>
                    </div>
                </div>
            @endforeach

            <div class="text-center">
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-2 rounded-lg shadow-md transition duration-300">
                    Kirim Jawaban
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
