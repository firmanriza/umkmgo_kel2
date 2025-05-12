@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow-sm p-6">
        <h1 class="text-xl font-semibold mb-6">Hasil Kuis Akhir</h1>

        @foreach ($hasilAkhir as $bidang => $data)
    <div class="col-md-4 mb-4">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">{{ $bidang }}</h5>
                <p class="card-text"><strong>Nilai:</strong> {{ $data['persentase'] }}%</p>
                {{-- Jika hanya nilai, bagian di bawah ini bisa dihapus --}}
                {{-- <p class="card-text"><strong>Level:</strong> {{ $data['level'] }}</p>
                <p class="card-text"><strong>Saran:</strong> {{ $data['saran'] }}</p> --}}
            </div>
        </div>
    </div>
@endforeach


        @if ($recommendedClasses->isNotEmpty())
            <div class="mt-6">
                <h3 class="text-lg font-semibold">Kelas yang Direkomendasikan:</h3>
                <ul class="list-disc pl-5">
                    @foreach ($recommendedClasses as $class)
                        <li>{{ $class->name }} - Level: {{ ucfirst($class->level) }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <a href="{{ route('quiz.index', $quiz->kategori->id) }}" class="mt-6 inline-block px-4 py-2 bg-blue-100 text-blue-600 rounded-md hover:bg-blue-200 transition-colors">
            Kembali ke Kategori
        </a>
    </div>
</div>
@endsection
