@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto text-center bg-white p-10 mt-12 rounded-2xl shadow-lg">
    <h1 class="text-3xl font-extrabold text-gray-800 mb-4">UMKM Kuis Awal - {{ $kategori->nama_kategori }}</h1>
    <p class="text-lg text-gray-600 mb-8">
        Ayo mulai kuis awal untuk tahu seberapa besar UMKM-mu sudah berkembang!
    </p>

    @if($quiz)
        <a href="{{ route('quiz.attempt', $quiz->id) }}"
           class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold px-8 py-3 rounded-full shadow transition duration-300">
            Mulai Kuis
        </a>
    @else
        <p class="text-red-500 font-medium">Kuis belum tersedia untuk kategori ini.</p>
    @endif
</div>
@endsection

