@extends('layouts.app')

@section('content')
<h2 class="mb-4 text-white">Hasil Kuis Akhir</h2>

<div class="card mb-4">
    <div class="card-body text-center">
        <h3 class="text-xl font-semibold">Skor Anda</h3>
        <p class="text-gray-700">Anda mendapatkan skor <strong>{{ $score }}</strong> dari total <strong>{{ $total }}</strong> soal yang dikerjakan.</p>
    </div>
</div>

<a href="{{ route('home') }}">
    <button class="btn btn-secondary mt-4">Kembali ke Beranda</button>
</a>
@endsection
