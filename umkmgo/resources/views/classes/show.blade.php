@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="text-white mb-4"><b>{{ $class->title }}</b></h2>

    <div class="row">
        <!-- Kiri: Info Detail Kelas (kecil) -->
        <div class="col-md-4">
            <div class="card shadow-sm p-3 mb-4">
                <h6 class="mb-3">📘 Info Kelas</h6>
                <p><strong>Kategori:</strong><br> {{ $class->kategori->nama_kategori ?? '-' }}</p>
                <p><strong>Bidang:</strong><br> {{ ucfirst($class->field) }}</p>
                <p><strong>Tingkat:</strong><br> {{ ucfirst($class->level) }}</p>
                <p><strong>Jenis:</strong><br> {{ ucfirst($class->type) }}</p>
                @if ($class->type === 'luring')
                    <p><strong>Jadwal Luring:</strong><br>{{ $class->schedule_info }}</p>
                @endif
            </div>
        </div>

        <!-- Kanan: Video & Materi -->
        <div class="col-md-8">
            <div class="card shadow-sm p-4 mb-4">
                <h5 class="mb-3">📝 Deskripsi Kelas</h5>
                <p>{{ $class->description }}</p>
            </div>

            @if ($class->type === 'daring')
                <div class="card shadow-sm p-3 mb-3">
                    <h6 class="mb-2">🎥 Video Pembelajaran</h6>
                    <a href="{{ $class->video_url }}" target="_blank" class="btn btn-sm btn-outline-primary mb-2">Tonton Video</a>
                    <div class="form-check mt-2">
                        <input class="form-check-input checklist" type="checkbox" value="" id="videoWatched">
                        <label class="form-check-label" for="videoWatched">
                            ✅ Saya sudah menonton video
                        </label>
                    </div>
                </div>
            @endif

            @if($class->material_pdf)
                <div class="card shadow-sm p-3 mb-3">
                    <h6 class="mb-2">📄 Materi PDF</h6>
                    <a href="{{ asset('storage/' . $class->material_pdf) }}" target="_blank" class="btn btn-sm btn-outline-success mb-2">Lihat / Download Materi</a>
                    <div class="form-check mt-2">
                        <input class="form-check-input checklist" type="checkbox" value="" id="materialRead">
                        <label class="form-check-label" for="materialRead">
                            ✅ Saya sudah membaca materi
                        </label>
                    </div>
                </div>
            @endif

            <!-- Tombol kuis akhir -->
            <div id="quizBtnWrapper" class="d-none">
    <a href="{{ route('classes.final_quiz', $class->kategori_umkm_id) }}"
       id="quizBtn"
       class="btn text-white w-100 mt-3"
       style="background-color: #FF6B00;">
        🚀 Ikuti Kuis Akhir
    </a>
</div>

        </div>
    </div>
</div>

<!-- Script Checklist -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const videoCheckbox = document.getElementById('videoWatched');
        const materialCheckbox = document.getElementById('materialRead');
        const quizBtnWrapper = document.getElementById('quizBtnWrapper');

        if (videoCheckbox) videoCheckbox.checked = localStorage.getItem('videoWatched') === 'true';
        if (materialCheckbox) materialCheckbox.checked = localStorage.getItem('materialRead') === 'true';

        function toggleQuizButton() {
            const videoReady = videoCheckbox ? videoCheckbox.checked : true;
            const materialReady = materialCheckbox ? materialCheckbox.checked : true;

            if (videoReady && materialReady) {
                quizBtnWrapper.classList.remove('d-none');
            } else {
                quizBtnWrapper.classList.add('d-none');
            }
        }

        toggleQuizButton();

        if (videoCheckbox) {
            videoCheckbox.addEventListener('change', () => {
                localStorage.setItem('videoWatched', videoCheckbox.checked);
                toggleQuizButton();
            });
        }

        if (materialCheckbox) {
            materialCheckbox.addEventListener('change', () => {
                localStorage.setItem('materialRead', materialCheckbox.checked);
                toggleQuizButton();
            });
        }
    });
</script>
@endsection