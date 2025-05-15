@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Daftar Kelas</h1>

    @if($classes->isEmpty())
        <p class="text-center">Tidak ada kelas yang sesuai dengan kriteria pencarian.</p>
    @else
        <div class="row">
            @foreach($classes as $class)
                <div class="col-md-4 mb-4">
                    <a href="{{ route('classes.show', $class->id) }}" class="text-decoration-none">
                        <div class="card h-100 text-center shadow" style="color: black;">
                            <div class="card-body d-flex flex-column justify-content-center">
                                <h5 class="card-title">{{ $class->title }}</h5>
                                <p class="card-text">
                                    {{ ucfirst($class->kategori->nama) }}<br>
                                    {{ ucfirst($class->field) }} - {{ ucfirst($class->level) }}<br>
                                    ({{ ucfirst($class->type) }})
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @endif

    <div class="text-center mt-4">
        <a href="{{ route('classes.index') }}" class="btn btn-secondary">Kembali ke Pilihan Kelas</a>
    </div>
</div>
@endsection
