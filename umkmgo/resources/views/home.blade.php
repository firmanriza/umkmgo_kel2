@extends('layouts.app')

@section('content')
<div class="d-flex flex-column align-items-center vh-100 text-center">
    <h1 class="text-white mb-4 mt-5">
        Selamat Datang di 
        <span class="fw-bold px-2 py-1" style="background-color: #FF6B00; border-radius: 20px;">
            UMKMGo
        </span>
    </h1>

    <div class="w-100 d-flex justify-content-center gap-4 px-5">
        {{-- Card Forum --}}
        <div class="glass-card">
            <p>
                Platform komunitas UMKM untuk berbagi, berdiskusi, dan bertumbuh bersama.
            </p>
            <a href="{{ route('forum.index') }}">
                <button class="custom-button mt-3">Masuk ke Forum</button>
            </a>
        </div>

        {{-- Card Quiz --}}
        <div class="glass-card">
            <p>
                Ukur pengetahuan mu dengan mengerjakan quiz.  
            </p>
            <div class="d-flex justify-content-center gap-3 mt-3">
                <a href="{{ route('kategori.index') }}">
                    <button class="custom-button">Kuis Awal</button>
                </a>
                <a href="#">
                    <button class="custom-button">Kuis Akhir</button>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
