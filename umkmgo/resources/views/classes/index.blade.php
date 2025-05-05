@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="text-white mb-4 mt-5" style="font-family: 'Plus Jakarta Sans', sans-serif;">
        <b>Daftar kategori</b>     
        <span class="fw-bold px-2 py-1" style="background-color: #FF6B00; border-radius: 20px;">
            Kelas
        </span>
    </h1>

    <div class="card p-3 mb-4" style="background-color: #757575;"> {{-- ✅ FIXED: tanda kutip ditutup --}}
        {{-- Form Filter --}}
        <form method="GET" action="{{ route('classes.list') }}">
            <div class="row g-4">
                {{-- Card Kategori --}}
                <div class="col-md-4">
                    <div class="card p-3" style="background-color: #0d6efd;">
                        <label for="kategori_umkm_id" class="form-label text-white"><b>Pilih Kategori</b></label>
                        <select name="kategori_umkm_id" id="kategori_umkm_id" class="form-select" style="color: black; background-color: white;">
                            <option value="">Kategori</option>
                            @foreach($kategoris as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- Card Bidang --}}
                <div class="col-md-4">
                    <div class="card p-3" style="background-color: #0d6efd;">
                        <label for="field" class="form-label text-white"><b>Pilih Bidang</b></label>
                        <select name="field" class="form-select">
                            <option value="">Bidang</option>
                            @foreach ($fields as $field)
                                <option value="{{ $field }}">{{ ucfirst($field) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- Card Level --}}
                <div class="col-md-4">
                    <div class="card p-3" style="background-color: #0d6efd;">
                        <label for="level" class="form-label text-white"><b>Pilih Level</b></label>
                        <select name="level" class="form-select">
                            <option value="">Level</option>
                            @foreach ($levels as $level)
                                <option value="{{ $level }}">{{ ucfirst($level) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            {{-- Tombol Filter --}}
            <div class="col-md-12 d-flex justify-content-center mt-3">
    <button type="submit" class="btn w-100" style="background-color: white; color: #0d6efd; border: 1px solid #0d6efd;">
        Filter
    </button>
</div>
        </form>
    </div>
</div>
@endsection
