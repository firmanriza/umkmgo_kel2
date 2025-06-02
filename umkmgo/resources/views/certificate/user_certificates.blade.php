@extends('layouts.app')

@section('content')
<style>
    .certificate-card {
        background: rgba(255, 255, 255, 0.9);
        border-radius: 1rem;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .certificate-header {
        background-color: #003366;
        color: white;
        padding: 1.5rem;
        text-align: center;
        font-size: 1.75rem;
        font-weight: 600;
    }

    .table thead {
        background-color: #f8f9fa;
    }

    .table td, .table th {
        vertical-align: middle;
    }

    .btn-view {
        border-radius: 999px;
        padding: 0.4rem 1rem;
        font-weight: 600;
        font-size: 0.875rem;
        transition: all 0.2s ease-in-out;
    }

    .btn-view:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 128, 0, 0.3);
    }
</style>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="certificate-card">
                <div class="certificate-header">
                    📜 Sertifikat Saya
                </div>
                <div class="card-body p-4">
                    @if($certificates->count())
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover align-middle text-center">
                                <thead class="table-light">
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
                                            <td>{{ $i + 1 }}</td>
                                            <td>{{ $certificate->class->kategori->nama_kategori ?? '-' }} - {{ ucfirst($certificate->class->field ?? '-') }} - {{ ucfirst($certificate->class->level ?? '-') }}</td>
                                            <td>
                                                @if($certificate->issued_at)
                                                    {{ ($certificate->issued_at instanceof \Illuminate\Support\Carbon) ? $certificate->issued_at->format('d-m-Y') : \Carbon\Carbon::parse($certificate->issued_at)->format('d-m-Y') }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('viewCertificate') }}" target="_blank" class="btn btn-success btn-sm btn-view">Lihat Sertifikat</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info text-center">Belum ada sertifikat yang diperoleh.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection