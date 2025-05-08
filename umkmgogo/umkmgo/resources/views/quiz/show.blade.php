<h2 class="text-2xl font-bold mb-6 text-center">{{ $quiz->nama_quiz }}</h2>

@foreach($soalsGrouped as $bidang => $soals)
    <div class="mb-6">
        <h3 class="text-xl font-semibold mb-2 text-indigo-600">{{ $bidang }}</h3>

        @foreach($soals as $index => $soal)
            <div class="mb-4">
                <p class="font-medium">{{ $index + 1 }}. {{ $soal->pertanyaan }}</p>
                <ul class="list-disc ml-6 text-gray-700">
                    <li>A. {{ $soal->pilihan_a }}</li>
                    <li>B. {{ $soal->pilihan_b }}</li>
                    <li>C. {{ $soal->pilihan_c }}</li>
                    <li>D. {{ $soal->pilihan_d }}</li>
                </ul>
            </div>
        @endforeach
    </div>
    <hr class="my-4">
@endforeach
