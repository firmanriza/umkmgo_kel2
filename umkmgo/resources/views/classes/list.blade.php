@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Kelas</h1>

    @if($classes->isEmpty())
        <p>Tidak ada kelas yang sesuai dengan kriteria pencarian.</p>
    @else
        <div class="list-group">
            @foreach($classes as $class)
                <a href="{{ route('classes.show', $class->id) }}" class="list-group-item list-group-item-action">
                    <h5>{{ ucfirst($class->kategori->nama) }} - {{ ucfirst($class->field) }} - {{ ucfirst($class->level) }} ({{ ucfirst($class->type) }})</h5>
                </a>
            @endforeach
        </div>
    @endif

    <a href="{{ route('classes.index') }}" class="btn btn-secondary mt-3">Kembali ke Pilihan Kelas</a>
</div>
@endsection
