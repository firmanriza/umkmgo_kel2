@extends('layouts.app')

@section('content')
<div class="text-center">
    <h1>Selamat Datang di <span class="text-primary">UMKMGo</span>!</h1>
    <p class="mt-3">Platform komunitas UMKM untuk berbagi, berdiskusi, dan bertumbuh bersama.</p>
    <a href="{{ route('forum.index') }}" class="btn btn-orange mt-4">Masuk ke Forum</a>
</div>
@endsection
