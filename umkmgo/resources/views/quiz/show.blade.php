@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h2 class="text-2xl font-bold mb-4">Hasil Kuis</h2>

    <div class="bg-white shadow rounded p-6 mb-4">
        <p class="text-xl">Skor kamu: <strong>{{ $score }} / {{ $total }}</strong></p>

        @if($score == $total)
            <p class="text-green-600 mt-4">Keren! Kamu menjawab semua pertanyaan dengan benar! 🔥</p>
        @elseif($score >= ($total / 2))
            <p class="text-yellow-600 mt-4">Lumayan bagus, tapi masih bisa ditingkatkan!</p>
        @else
            <p class="text-red-600 mt-4">Kamu butuh belajar lebih lanjut, tetap semangat 💪</p>
        @endif
    </div>

    <a href="{{ route('home') }}" class="text-blue-600 underline">Kembali ke Beranda</a>
</div>
@endsection
