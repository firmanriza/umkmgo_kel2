@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Daftar Kategori Kelas</h1>

    <div class="card p-3 mb-4">
        <form method="GET" action="{{ route('classes.list') }}">
            <div class="row g-3">
                <div class="col-md-3">
                    <select name="kategori_umkm_id" id="kategori_umkm_id" class="form-select" style="color: black; background-color: white;">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($kategoris as $kategori)
                            <option value="{{ $kategori->id }}" style="color: black; background-color: white;">{{ $kategori->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="field" class="form-select">
                        <option value="">Pilih Bidang</option>
                        @foreach ($fields as $field)
                            <option value="{{ $field }}">{{ ucfirst($field) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="level" class="form-select">
                        <option value="">Pilih Level</option>
                        @foreach ($levels as $level)
                            <option value="{{ $level }}">{{ ucfirst($level) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 d-flex align-items-center">
                    <button class="btn btn-primary w-100" type="submit">Filter</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
