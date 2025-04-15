@extends('layouts.app')

@section('content')

<div class="d-flex flex-column align-items-center vh-100 text-center">
<h1 class="text-white mb-4 mt-5" style="font-family: 'Plus Jakarta Sans', sans-serif;">
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

            {{-- Card Artikel --}}
        <div class="glass-card">
            <p>
                Lihat berbagai macam informasi dan artikel menarik seputar UMKM.
            </p>
            <a href="{{ route('articles.index') }}">
                <button class="custom-button mt-3">Masuk ke Artikel</button>
            </a>
        </div>

        {{-- Card Quiz --}}
        <div class="glass-card">
            <p>
                Ukur pengetahuan mu dengan mengerjakan quiz.  
            </p>
            <div class="d-flex flex-column gap-2 mt-3 w-100 align-items-center">
                <a href="{{ route('kategori.index') }}">
                    <button class="custom-button w-100">Kuis Awal</button>
                </a>
                <a href="{{ route('quiz.final') }}">
                    <button class="custom-button w-100">Kuis Akhir</button>
                </a>
            </div>
        </div>
    </div>

@endsection
