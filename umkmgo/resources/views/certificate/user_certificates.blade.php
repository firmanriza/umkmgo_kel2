@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Sertifikat Saya</h2>
                </div>
                <div class="card-body">
                    @if($certificates->count())
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kelas</th>
                                    <th>Tanggal Terbit</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($certificates as $i => $certificate)
                                    <tr>
                                        <td>{{ $i+1 }}</td>
                                        <td>{{ $certificate->class->kategori->nama_kategori ?? '-' }} - {{ ucfirst($certificate->class->field ?? '-') }} - {{ ucfirst($certificate->class->level ?? '-') }}</td>
                                        <td>
                                            @if($certificate->issued_at)
                                                {{ ($certificate->issued_at instanceof \Illuminate\Support\Carbon) ? $certificate->issued_at->format('d-m-Y') : \Carbon\Carbon::parse($certificate->issued_at)->format('d-m-Y') }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('viewCertificate') }}" target="_blank" class="btn btn-success btn-sm">Lihat Sertifikat</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-info text-center mb-0">Belum ada sertifikat yang diperoleh.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 