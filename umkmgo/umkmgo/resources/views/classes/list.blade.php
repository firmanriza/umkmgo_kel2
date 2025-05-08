@extends('layouts.app')

@section('content')
<h1 class="text-white mb-4 mt-5" style="font-family: 'Plus Jakarta Sans', sans-serif;">
    <b>Daftar</b>     
    <span class="fw-bold px-2 py-1" style="background-color: #FF6B00; border-radius: 20px;">
        Kelas
    </span>
</h1>

{{-- Tab Navigation --}}
<ul class="nav nav-tabs" id="classTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="daring-tab" data-bs-toggle="tab" data-bs-target="#daring" type="button" role="tab" aria-controls="daring" aria-selected="true">
            Kelas Daring
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="luring-tab" data-bs-toggle="tab" data-bs-target="#luring" type="button" role="tab" aria-controls="luring" aria-selected="false">
            Kelas Luring
        </button>
    </li>
</ul>

{{-- Tab Content --}}
<div class="tab-content mt-3" id="classTabContent">
    {{-- Kelas Daring --}}
    <div class="tab-pane fade show active" id="daring" role="tabpanel" aria-labelledby="daring-tab">
        @php $daringClasses = $classes->where('type', 'daring'); @endphp
        @forelse ($daringClasses as $class)
            <div class="card mb-3 shadow-sm position-relative">
                <div class="card-body">
                    {{-- Dropdown tombol untuk admin --}}
                    @if(auth()->user() && (auth()->user()->role === 'admin' || auth()->user()->role === 'mentor'))
                        <div class="position-absolute top-0 end-0 m-2">
                            <div class="dropdown">
                                <button class="btn btn-sm dropdown-toggle text-white" style="background-color: #FF6B00;" type="button" id="dropdownMenuDaring{{ $class->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                    ⋮
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuDaring{{ $class->id }}">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('classes.edit', $class->id) }}">Update</a>
                                    </li>
                                    <li>
                                        <form action="{{ route('classes.destroy', $class->id) }}" method="POST" onsubmit="return confirm('Yakin hapus kelas ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item text-danger">Hapus</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endif

                    <h5 class="card-title">{{ $class->title }}</h5>
                    <p class="card-text mb-2">{{ $class->description }}</p>
                    <a href="{{ route('classes.show', $class->id) }}" class="btn btn-sm btn-outline-primary">Detail</a>
                </div>
            </div>
        @empty
            <p>Tidak ada kelas daring.</p>
        @endforelse
    </div>

    {{-- Kelas Luring --}}
    <div class="tab-pane fade" id="luring" role="tabpanel" aria-labelledby="luring-tab">
        @php $luringClasses = $classes->where('type', 'luring'); @endphp
        @forelse ($luringClasses as $class)
            <div class="card mb-3 shadow-sm position-relative">
                <div class="card-body">
                    {{-- Dropdown tombol untuk admin --}}
                    @if(auth()->user() && (auth()->user()->role === 'admin' || auth()->user()->role === 'mentor'))
                        <div class="position-absolute top-0 end-0 m-2">
                            <div class="dropdown">
                                <button class="btn btn-sm dropdown-toggle text-white" style="background-color: #FF6B00;" type="button" id="dropdownMenuLuring{{ $class->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                    ⋮
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLuring{{ $class->id }}">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('classes.edit', $class->id) }}">Update</a>
                                    </li>
                                    <li>
                                        <form action="{{ route('classes.destroy', $class->id) }}" method="POST" onsubmit="return confirm('Yakin hapus kelas ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item text-danger">Hapus</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endif

                    <h5 class="card-title">{{ $class->title }}</h5>
                    <p class="card-text mb-2">{{ $class->description }}</p>
                    <a href="{{ route('classes.show', $class->id) }}" class="btn btn-sm btn-outline-primary">Detail</a>
                </div>
            </div>
        @empty
            <p>Tidak ada kelas luring.</p>
        @endforelse
    </div>
</div>
@endsection
