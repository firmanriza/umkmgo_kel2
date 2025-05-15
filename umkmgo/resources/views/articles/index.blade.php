@extends('layouts.app')

@section('content')
<div class="container py-4">

    {{-- Tombol Buat Artikel --}}
    @if(auth()->user()->role === 'admin')
    <div class="mb-4 text-start">
        <a href="{{ route('articles.create') }}" class="btn btn-success">Buat Artikel</a>
    </div>
    @endif

    {{-- List Artikel --}}
    <div class="d-flex flex-wrap justify-content-center gap-4">
        @foreach ($articles as $article)
        <div class="card text-center mx-auto shadow" style="max-width: 400px; width: 100%; background-color: #FFA500;"> {{-- Warna oranye --}}
            @if ($article->image)
            <a href="{{ route('articles.show', $article->id) }}">
                <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top" style="max-height: 250px; object-fit: contain;" alt="{{ $article->title }}">
            </a>
            @endif

            <div class="card-body">
                <a href="{{ route('articles.show', $article->id) }}" class="text-decoration-none">
                    <h5 class="card-title text-white">{{ $article->title }}</h5>
                </a>

                @if(auth()->user()->role === 'admin')
                <div class="mt-3 d-flex justify-content-center gap-2">
                    <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-sm btn-light">Edit</a>
                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-dark">Hapus</button>
                    </form>
                </div>
                @endif
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection
