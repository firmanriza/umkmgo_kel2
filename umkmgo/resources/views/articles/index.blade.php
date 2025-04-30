@extends('layouts.app')

@section('content')
<div class="container py-4">

    {{-- Tombol Buat Artikel --}}
    @if(auth()->user()->role === 'admin')
    <div class="d-flex justify-content-start mb-4">
        <a href="{{ route('articles.create') }}" class="btn btn-success">Buat Artikel</a>
    </div>
    @endif

    {{-- List Artikel --}}
    @foreach ($articles as $article)
    <div class="card mb-4 shadow-sm">
        <div class="row g-0">
            @if ($article->image)
            <div class="col-md-4">
                <a href="{{ route('articles.show', $article->id) }}">
                    <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid rounded-start" alt="{{ $article->title }}">
                </a>
            </div>
            @endif
            <div class="col-md-8">
                <div class="card-body">
                    <a href="{{ route('articles.show', $article->id) }}" class="text-decoration-none">
                        <h5 class="card-title">{{ $article->title }}</h5>
                    </a>
                    <div class="mt-3 d-flex gap-2">
                        @if(auth()->user()->role === 'admin')
                        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-sm btn-success">Edit</a>
                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <!-- <button type="submit" class="btn btn-sm btn-danger">Delete</button> -->
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

</div>
@endsection
