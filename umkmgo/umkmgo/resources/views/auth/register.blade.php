@extends('layouts.app')

@section('content')
<div class="d-flex min-vh-100" style="width: 100vw;">
    <!-- Kiri: Gambar, Logo, Teks -->
    <div class="d-none d-md-flex flex-column justify-content-center align-items-center p-0 position-relative" style="width: 50vw; background: url('/images/Register.jpg') center center/cover no-repeat;">
        <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0,0,0,0.5);"></div>
        <div class="position-relative text-white text-center p-5 z-1 d-flex flex-column align-items-center justify-content-center w-100 h-100">
            <img src="/images/logoumkm.png" alt="UMKMGO" class="mb-4" style="width: 120px;">
            <h2 class="fw-bold mb-3">Building the Future...</h2>
            <p class="mb-0">Website ini lahir bukan hanya sekedar tugas biasa namun ada suka duka serta harapan untuk memajukan UMKM di Indonesia dikancah global</p>
        </div>
    </div>
    <!-- Kanan: Form Register -->
    <div class="bg-white d-flex flex-column justify-content-center p-5" style="width: 100vw; max-width: 50vw;">
        <div class="mb-2 text-secondary">LET'S GET YOU STARTED</div>
        <h3 class="fw-semibold mb-4">Create an Account</h3>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="user@umkmgo.com" required autofocus>
                </div>
                <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="***************" required>
                </div>
            <button type="submit" class="btn btn-dark w-100 mb-3">Register Here</button>
        </form>
        <div class="d-flex align-items-center my-3">
            <hr class="flex-grow-1">
            <span class="mx-2 text-muted">Or</span>
            <hr class="flex-grow-1">
                </div>
        <div class="d-grid gap-2 mb-3">
            <a href="#" class="btn btn-outline-secondary d-flex align-items-center justify-content-center gap-2">
                <i class="fab fa-google"></i> Sign up with Google
            </a>
            <a href="#" class="btn btn-outline-secondary d-flex align-items-center justify-content-center gap-2">
                <i class="fab fa-facebook"></i> Sign up with Facebook
            </a>
            <a href="#" class="btn btn-outline-secondary d-flex align-items-center justify-content-center gap-2">
                <i class="fab fa-apple"></i> Sign up with Apple
            </a>
                </div>
        <div class="text-center mt-3">
            Already have an account? <a href="{{ route('login') }}" class="fw-semibold text-decoration-none text-primary">LOGIN HERE</a>
        </div>
    </div>
</div>
@endsection
