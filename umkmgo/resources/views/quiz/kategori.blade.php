@extends('layouts.app')

@section('content')

<!-- Font Awesome CDN supaya ikon muncul -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />

@push('scripts')
    <script>
        tailwind.config = {
            corePlugins: {
                preflight: false
            }
        }
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
@endpush

<div class="container mx-auto px-4 pt-0 pb-12">
    <h2 class="text-2xl text-white font-bold text-center mb-3" style="font-family: 'Plus Jakarta Sans', sans-serif;">
        Pilih Kategori UMKM
    </h2>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-6">
        @foreach($kategoris as $kategori)
            <a href="{{ route('quiz.index', ['id' => $kategori->id]) }}"
               class="block text-center bg-orange-600 hover:bg-orange-700 text-white shadow-md hover:shadow-xl rounded-xl px-8 py-3 transition-all duration-300 ease-in-out w-full max-w-[280px] mx-auto flex flex-col justify-center items-center gap-3">
                <div>
                    @switch($kategori->nama_kategori)
                        @case('Kuliner')
                            <i class="fas fa-utensils text-white text-3xl drop-shadow-md"></i>
                            @break
                        @case('Jasa')
                            <i class="fas fa-handshake text-white text-3xl drop-shadow-md"></i>
                            @break
                        @case('Kerajinan')
                            <i class="fas fa-tools text-white text-3xl drop-shadow-md"></i>
                            @break
                        @case('Fashion')
                            <i class="fas fa-tshirt text-white text-3xl drop-shadow-md"></i>
                            @break
                        @default
                            <i class="fas fa-box text-white text-3xl drop-shadow-md"></i>
                    @endswitch
                </div>
                <p class="font-semibold text-lg tracking-wide">{{ $kategori->nama_kategori }}</p>
            </a>
        @endforeach
    </div>
</div>

@endsection