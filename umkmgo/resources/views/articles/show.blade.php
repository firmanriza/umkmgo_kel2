@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 bg-blue-100">
    <div class="bg-white rounded-xl shadow-lg p-8 max-w-3xl w-full">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">
            {{ $article->title }}
        </h1>

        @if ($article->image)
            <img src="{{ asset('storage/' . $article->image) }}" class="rounded-lg mb-6 w-full" alt="Gambar Artikel">
        @endif

        <div class="text-gray-700 leading-relaxed">
            {!! nl2br(e($article->content)) !!}
        </div>

        <div class="mt-8">
            <a href="{{ route('articles.index') }}" class="inline-block bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition">
                Kembali ke Daftar Artikel
            </a>
        </div>
    </div>
</div>
@endsection
