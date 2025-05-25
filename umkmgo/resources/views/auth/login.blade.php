@extends('layouts.app')

@section('content')
<div class="row min-vh-100 align-items-center justify-content-end g-0">
    <!-- <div class="col-lg-6 d-none d-lg-flex flex-column justify-content-center align-items-start px-5">
        <img src="/images/logoumkm.png" alt="UMKMGo Logo" style="width:180px; margin-bottom:2rem;">
        <h2 class="fw-bold mb-3 text-white"><b>Dari Komunitas,</b><br>Untuk UMKM Naik Kelas.</h2>
        <p class="text-secondary mb-4" style="max-width:400px;">Komunitas yang menjadi go global menjadi national excellence in the word</p>
    </div> -->
    <div class="col-lg-6 d-flex align-items-center justify-content-center">
        <div class="card p-5 shadow-lg border-0 w-100" style="max-width:400px; border-radius:24px; background:rgba(255,255,255,0.95);">
            <h5 class="mb-3 text-center text-secondary">WELCOME BACK</h5>
            <h2 class="mb-4 text-center fw-bold">Log In to your Account</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required autofocus value="{{ old('email') }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>
                    <a href="#" class="text-decoration-none small">Forgot Password?</a>
                </div>
                <button class="custom-button w-100 mb-3">CONTINUE</button>
            </form>
            <div class="text-center mt-3">
                New User? <a href="{{ route('register') }}" class="fw-bold">SIGN UP HERE</a>
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
