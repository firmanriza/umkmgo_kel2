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
    <h2 class="text-2xl font-bold text-center mb-6">Pilih Kategori UMKM</h2>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($kategoris as $kategori)
            <a href="{{ route('quiz.final_intro', ['id' => $kategori->id]) }}" 
               class="block text-center bg-white shadow hover:shadow-lg rounded-xl p-4 transition">
                <div class="text-4xl mb-2">
                    @switch($kategori->nama_kategori)
                        @case('Kuliner') 🍜 @break
                        @case('Jasa') 🛠️ @break
                        @case('Kerajinan') 🎨 @break
                        @case('Fashion') 👗 @break
                        @case('Perikanan') 🐟 @break
                        @default 📦
                    @endswitch
                </div>
                <p class="font-semibold">{{ $kategori->nama_kategori }}</p>
            </a>
        @endforeach
    </div>
</div>
@endsection
