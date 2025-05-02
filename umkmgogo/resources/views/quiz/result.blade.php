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

@isset($recommendedClasses)
    @if($recommendedClasses->isNotEmpty())
        <!-- Loop untuk menampilkan kelas yang direkomendasikan -->
        @foreach($recommendedClasses as $class)
            <div class="col-md-4 mb-4">
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <h5 class="card-title">{{ ucfirst($class->kategori->nama) }}</h5>
                        <p class="card-text">
                            {{ ucfirst($class->field) }} - {{ ucfirst($class->level) }} ({{ ucfirst($class->type) }})
                        </p>
                        <a href="{{ route('classes.show', $class->id) }}" class="btn btn-primary">Lihat Kelas</a>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p>Tidak ada kelas yang direkomendasikan.</p>
    @endif
@else
    <p>Data kelas yang direkomendasikan tidak ditemukan.</p>
@endisset


<a href="{{ route('home') }}">
    <button class="custom-button">Kembali ke Beranda</button>
</a>
@endsection