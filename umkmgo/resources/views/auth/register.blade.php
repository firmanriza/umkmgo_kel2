@extends('layouts.app')

@section('content')
<div class="row min-vh-100 align-items-center justify-content-center g-0">
    <div class="col-lg-6 d-none d-lg-flex flex-column justify-content-center align-items-start px-5">
        <img src="/images/logoumkm.png" alt="UMKMGo Logo" style="width:180px; margin-bottom:2rem;">
        <h2 class="fw-bold mb-3 text-dark">Building the Future...</h2>
        <p class="text-secondary mb-4" style="max-width:400px;">Website ini lahir bukan hanya sekedar tugas biasa namun ada suka duka serta harapan untuk memajukan UMKM di Indonesia dikancah global</p>
    </div>
    <div class="col-lg-6 d-flex align-items-center justify-content-center">
        <div class="card p-5 shadow-lg border-0 w-100" style="max-width:400px; border-radius:24px; background:rgba(255,255,255,0.95);">
            <h5 class="mb-3 text-center text-secondary">LET'S GET YOU STARTED</h5>
            <h2 class="mb-4 text-center fw-bold">Create an Account</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control" required autofocus value="{{ old('name') }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Role</label>
                    <select name="role" class="form-select" required>
                        <option value="user" selected>User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>
                <button class="custom-button w-100 mb-3">Register Here</button>
            </form>
            <div class="text-center mt-3">
                Already have an account? <a href="{{ route('login') }}" class="fw-bold">LOGIN HERE</a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('custom-style')
<style>
body {overflow-x: hidden;}
.card {backdrop-filter: blur(6px);}
</style>
@endpush
