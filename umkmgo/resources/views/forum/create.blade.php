@extends('layouts.app')

@section('content')
<h1 class="text-white mb-4 mt-5" style="font-family: 'Plus Jakarta Sans', sans-serif;">
    <b>Buat Diskusi</b>     
    <span class="fw-bold px-2 py-1" style="background-color: #FF6B00; border-radius: 20px;">
        Baru
    </span>
</h1>

<form method="POST" action="{{ route('forum.store') }}">
    @csrf
    <div class="mb-3">
        <label for="title" class="text-white"><b>Judul</b></label>
        <input type="text" name="title" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="content" class="text-white"><b>Tulis Diskusi</b></label>
        <textarea name="content" class="form-control" rows="5" required></textarea>
    </div>
    <button type="submit" class="btn" style="background-color: #FF6B00; color: white;">Kirim</button>
</form>
@endsection
