@extends('layouts.app')

@section('content')
<h2 class="mb-4">Hasil Kuis</h2>

<div class="card mb-4">
    <div class="card-body text-center">
        <p class="h5">Skor kamu: <strong>{{ $score }} / {{ $total }}</strong></p>

        @if($score == $total)
            <p class="text-success mt-3">Keren! Kamu menjawab semua pertanyaan dengan benar! 🔥</p>
        @elseif($score >= ($total / 2))
            <p class="text-warning mt-3">Lumayan bagus, tapi masih bisa ditingkatkan!</p>
        @else
            <p class="text-danger mt-3">Kamu butuh belajar lebih lanjut, tetap semangat 💪</p>
        @endif
    </div>
</div>

<a href="{{ route('home') }}">
    <button class="custom-button">Kembali ke Beranda</button>
</a>
@endsection
