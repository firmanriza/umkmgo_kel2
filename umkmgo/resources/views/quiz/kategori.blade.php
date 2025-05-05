@extends('layouts.app')

@section('content')
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

<div class="container mx-auto px-4">
    <h2 class="text-2xl text-white font-bold text-center mb-6">
        Pilih Kategori
        <span class="fw-bold px-2 py-1" style="background-color: #FF6B00; border-radius: 20px;">
            UMKM
        </span>
    </h2>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($kategoris as $kategori)
            <a href="{{ route('quiz.index', ['id' => $kategori->id]) }}"
               class="block text-center bg-[#FF6B00] hover:bg-orange-600 text-white shadow-md hover:shadow-lg rounded-xl p-4 transition duration-300">
                <div class="mb-2">
                    @switch($kategori->nama_kategori)
                        @case('Kuliner')
                            <svg class="w-10 h-10 mx-auto text-white" fill="none" stroke="currentColor" stroke-width="2"
                                 viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                            </svg>
                            @break
                        @case('Jasa')
                            <svg class="w-10 h-10 mx-auto text-white" fill="none" stroke="currentColor" stroke-width="2"
                                 viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            @break
                        @case('Kerajinan')
                            <svg class="w-10 h-10 mx-auto text-white" fill="none" stroke="currentColor" stroke-width="2"
                                 viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c1.1 0 2 .9 2 2v2c0 1.1-.9 2-2 2s-2-.9-2-2v-2c0-1.1.9-2 2-2z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16"/>
                            </svg>
                            @break
                        @case('Fashion')
                            <svg class="w-10 h-10 mx-auto text-white" fill="none" stroke="currentColor" stroke-width="2"
                                 viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 3h12l-1 6H7L6 3z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13h14v8H5z"/>
                            </svg>
                            @break
                        @default
                            <svg class="w-10 h-10 mx-auto text-white" fill="none" stroke="currentColor" stroke-width="2"
                                 viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 4h16v16H4z"/>
                            </svg>
                    @endswitch
                </div>
                <p class="font-semibold">{{ $kategori->nama_kategori }}</p>
            </a>
        @endforeach
    </div>
</div>
@endsection
