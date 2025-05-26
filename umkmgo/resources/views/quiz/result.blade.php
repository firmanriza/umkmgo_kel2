@extends('layouts.app')

@section('content')
<div class="relative h-screen overflow-hidden">

    <!-- Background tetap -->
    <div class="fixed inset-0 -z-10 bg-no-repeat bg-center bg-cover" style="background-image: url('/images/bg-illustration.png');"></div>

    <!-- Konten utama -->
    <div class="relative z-10 h-full px-6 pt-4 pb-4 flex flex-col items-center justify-start gap-6">

        <!-- Judul: Hasil Kuis -->
        <h2 class="text-3xl font-extrabold text-white text-center drop-shadow-[0_3px_6px_rgba(0,0,0,0.8)] -mt-3">
            Hasil Kuis
        </h2>

        <!-- Kotak hasil kuis -->
        <div class="max-w-6xl w-full flex flex-wrap justify-center gap-6 p-8 bg-orange-500/10 backdrop-blur-sm rounded-xl shadow-lg border border-orange-400/20">
            @foreach ($hasilAkhir as $bidang => $data)
                <div class="flex-1 min-w-[260px] max-w-sm bg-orange-500 rounded-xl p-6 text-center text-white drop-shadow-lg">
                    <h3 class="text-2xl font-bold mb-3">{{ $bidang }}</h3>
                    <p class="text-base mb-2">Level Anda: <strong>{{ $data['level'] }}</strong></p>
                    <p class="text-sm leading-snug">{{ $data['saran'] }}</p>
                </div>
            @endforeach
        </div>

        <!-- Kelas Rekomendasi + Tombol -->
        <div class="w-full max-w-6xl flex flex-col items-center gap-4 -mt-2">

            <!-- Judul rekomendasi -->
            <h3 class="text-2xl font-extrabold text-white text-center drop-shadow-[0_3px_6px_rgba(0,0,0,0.8)]">
                Kelas Rekomendasi
            </h3>

            @isset($recommendedClasses)
                @if($recommendedClasses->isNotEmpty())
                    <div class="flex flex-wrap justify-center gap-4">
                        @foreach($recommendedClasses as $class)
                            <a href="{{ route('classes.show', $class->id) }}"
                               class="w-56 bg-orange-500 hover:bg-orange-600 rounded-xl shadow-md transition duration-300 text-white cursor-pointer p-4 flex flex-col items-center text-center">
                                <h5 class="text-base font-medium mb-1 drop-shadow">
                                    {{ ucfirst($class->kategori->nama) }}
                                </h5>
                                <p class="drop-shadow text-base leading-snug">
                                    {{ ucfirst($class->field) }} - {{ ucfirst($class->level) }} ({{ ucfirst($class->type) }})
                                </p>
                            </a>
                        @endforeach
                    </div>
                @else
                    <p class="text-white text-center drop-shadow">Tidak ada kelas yang direkomendasikan.</p>
                @endif
            @else
                <p class="text-white text-center drop-shadow">Data kelas yang direkomendasikan tidak ditemukan.</p>
            @endisset

            <!-- Tombol -->
            <a href="{{ route('home') }}">
                <button class="mt-1 px-6 py-2 bg-orange-500 hover:bg-orange-600 rounded-xl text-white shadow-md transition duration-300">
                    Kembali ke Beranda
                </button>
            </a>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.tailwindcss.com"></script>
@endpush