@extends('layouts.app')

@section('content')
<div class="container">
    


    <div class="card mb-4" style="background-color: white; border-radius: 12px; box-shadow: 0 0 6px rgba(0,0,0,0.1);">
        <div class="card-body">
            <h3 class="card-title">{{ $article->title }}</h3>

            @if ($article->image)
                <div class="mb-3">
                    <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid rounded" alt="Gambar Artikel">
                </div>
            @endif
        </div>
    </div>


    <div class="card" style="background-color: white; border-radius: 12px; box-shadow: 0 0 6px rgba(0,0,0,0.1);">
        <div class="card-body">
            <div class="text-gray-700 leading-relaxed">
                {!! nl2br(e($article->content)) !!}
            </div>
        </div>
    </div>

    <div class="text-end mt-4">
        <a href="{{ route('articles.index') }}">
            <button class="custom-button px-6 py-2 rounded-lg">
                Kembali ke Daftar Artikel
            </button>
        </a>
    </div>
</div>
@endsection