@extends('layouts.app')

@section('content')
<h2 class="mb-4">Hasil Kuis</h2>

<div class="card mb-4">
    <div class="card-body text-center">
    @foreach ($hasilAkhir as $bidang => $data)
        <div class="mb-4">
            <h3 class="text-xl font-semibold">{{ $bidang }}</h3>
            <p class="text-gray-700">Level Anda: <strong>{{ $data['level'] }}</strong></p>
            <p class="text-gray-700">Saran: {{ $data['saran'] }}</p>
        </div>
        <hr class="my-3">
    @endforeach
    </div>
</div>

<a href="{{ route('home') }}">
    <button class="custom-button">Kembali ke Beranda</button>
</a>
@endsection
