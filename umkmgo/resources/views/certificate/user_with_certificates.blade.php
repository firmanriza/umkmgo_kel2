@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card text-white" style="background-color: #FF6B00;">
    <div class="card-header text-center text-white">
        <h2>User dengan Sertifikat</h2>
    </div>
    <div class="card-body">

                    @if($users->isEmpty())
                        <div class="alert alert-info text-center mb-0">Tidak ada user yang memiliki sertifikat.</div>
                    @else
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama User</th>
                                    <th>Email</th>
                                    <th>Tanggal sertifikat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $i => $user)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <ul class="mb-0 ps-3">
                                                @foreach($user->certificates as $certificate)
                                                    <li>
                                                        {{ $certificate->name }}  
                                                        @if($certificate->issued_at)
                                                            {{ ($certificate->issued_at instanceof \Illuminate\Support\Carbon) ? $certificate->issued_at->format('d-m-Y') : \Carbon\Carbon::parse($certificate->issued_at)->format('d-m-Y') }}
                                                        @else
                                                            
                                                        @endif
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection