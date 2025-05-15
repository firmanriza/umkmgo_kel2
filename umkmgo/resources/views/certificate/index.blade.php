@extends('layouts.app')
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Certificate Download</h2>
                </div>
                <div class="card-body text-center">
                    <iframe src="{{ route('viewCertificate') }}" width="600px" height="400px"></iframe>
                    <br>
                    <a href="{{ route('downloadCertificate') }}" class="btn btn-primary">Download</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
