@extends('layouts.app')

@section('content')
<h2 class="mb-4 text-white">Hasil Kuis</h2>

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
        <h3 class="mb-3 tet-white">Kelas Rekomendasi</h3>

        
        <div class="d-flex flex-wrap gap-3">
            
            @foreach($recommendedClasses as $class)
                <a href="{{ route('classes.show', $class->id) }}" style="text-decoration: none; color: inherit;">
                    <div class="card text-center" style="width: 18rem; flex: 0 0 auto; background-color: #FF6B00; color: white; cursor: pointer;">
                        <div class="card-body">
                            <h5 class="card-title">{{ ucfirst($class->kategori->nama) }}</h5>
                            <p class="card-text">
                                {{ ucfirst($class->field) }} - {{ ucfirst($class->level) }} ({{ ucfirst($class->type) }})
                            </p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    @else
        <p>Tidak ada kelas yang direkomendasikan.</p>
    @endif
@else
    <p>Data kelas yang direkomendasikan tidak ditemukan.</p>
@endisset

<a href="{{ route('home') }}">
    <button class="btn btn-secondary mt-4">Kembali ke Beranda</button>
</a>
@endsection
