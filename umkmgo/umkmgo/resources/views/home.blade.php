@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="glass-card p-5 text-center">
        <h1 class="text-primary">Selamat Datang di <span class="fw-bold">UMKMGo</span>!</h1>
        <p class="mt-3 text-primary">Platform komunitas UMKM untuk berbagi, berdiskusi, dan bertumbuh bersama.</p>

        <a href="{{ route('forum.index') }}">
            <button class="custom-button mt-4">Masuk ke Forum</button>
        </a>
    </div>
</div>
@endsection
