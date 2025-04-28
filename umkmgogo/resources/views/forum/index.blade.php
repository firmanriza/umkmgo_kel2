@extends('layouts.app')

@section('content')
<h2 class="mb-4">Diskusi UMKM</h2>

<a href="{{ route('forum.create') }}">
    <button class="custom-button mb-4">Tambah Diskusi</button>
</a>

@foreach ($forums as $forum)
    <a href="{{ route('forum.show', $forum->id) }}" style="text-decoration: none; color: inherit;">
        <div class="card mb-3" style="border-radius: 20px; transition: box-shadow 0.3s;" onmouseover="this.style.boxShadow='0px 4px 12px rgba(0,0,0,0.15)'" onmouseout="this.style.boxShadow='none'">
            <div class="card-body">
                <h5 class="card-title">{{ $forum->title }}</h5>
                <p class="card-text text-muted">{{ Str::limit($forum->content, 100) }}</p>

                <small class="text-muted">
                    Oleh: {{ $forum->user->name }}
                    @if ($forum->user->role === 'admin')
                        <span class="badge bg-primary ms-2">Admin</span>
                    @endif
                </small>

                @if (Auth::id() === $forum->user_id || Auth::user()->role === 'admin')
                    <div class="mt-2 d-flex gap-2">
                        <a href="{{ route('forum.edit', $forum->id) }}">
                            <button class="custom-button-blue">Edit</button>
                        </a>

                        <form action="{{ route('forum.destroy', $forum->id) }}" method="POST" onsubmit="return confirm('Yakin hapus forum ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="custom-button-orange">Hapus</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </a>
@endforeach

@endsection
