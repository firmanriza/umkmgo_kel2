@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto text-center bg-white/30 backdrop-blur-md p-8 mt-10 rounded-2xl shadow-lg border border-white/20">
    <h1 class="text-3xl font-bold mb-4 text-white drop-shadow">
        Kuis Akhir UMKM - {{ $kategori->nama_kategori }}
    </h1>
    
    <p class="text-lg text-white/90 mb-6 drop-shadow">
    Ayo mulai kuis akhir untuk mengetahui perkembangan UMKM-mu secara menyeluruh!
    </p>

    @if($quiz)
        <a href="{{ route('quiz.final_attempt', $quiz->id) }}"
           class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition duration-300 shadow-md">
            Mulai Kuis Akhir
        </a>
    @else
        <p class="text-red-200 font-semibold drop-shadow">Kuis akhir belum tersedia untuk kategori ini.</p>
    @endif
</div>
@endsection

@push('scripts')
    <script src="https://cdn.tailwindcss.com"></script>
@endpush
