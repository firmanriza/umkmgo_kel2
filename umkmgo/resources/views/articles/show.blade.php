@extends('layouts.app')

@section('content')

{{-- Style khusus halaman ini --}}
<style>
    body {
        display: block !important;
    }
</style>

<div class="py-12 px-4 bg-blue-100 min-h-screen flex justify-center items-start">
    <div class="bg-white rounded-xl shadow-lg p-6 md:p-10 w-full max-w-2xl">

        {{-- Judul --}}
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">
            {{ $article->title }}
        </h1>

        {{-- Gambar Artikel --}}
        @if ($article->image)
        <div class="flex justify-center mb-6">
            <img 
                src="{{ asset('storage/' . $article->image) }}" 
                class="rounded-lg object-cover max-h-[300px] w-auto shadow-md" 
                alt="Gambar Artikel"
            >
        </div>
        @endif

        {{-- Konten Artikel --}}
        <div class="text-gray-700 leading-relaxed whitespace-pre-line text-justify mb-8">
            {!! nl2br(e($article->content)) !!}
        </div>

        {{-- Tombol Kembali --}}
        <div class="flex justify-center">
            <a href="{{ url()->previous() }}" 
               class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-2 rounded-lg transition">
                Kembali
            </a>
        </div>

    </div>
</div>
@endsection
