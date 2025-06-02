<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UMKMGo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    
    
    <style>
    :root {
        --primary:rgb(21, 189, 255); 
        --accent: #FF6B00;
    }

    body {
    background-image: url('/images/background baru.jpg'); 
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
    background-attachment: fixed;
    min-height: 100vh;
}


    .navbar {
        background-color: #0d6efd;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); 
        min-height: 60px;
        padding-top: 0;
        padding-bottom: 0;
        display: flex;
        align-items: center;
    }

    .navbar-brand img {
        height: 70px; 
        object-fit: contain;
        margin-top: -10px;  
        margin-bottom: -10px;
    }



    .navbar-brand,
    .nav-link,
    .navbar-toggler-icon {
        color: #fff !important;
    }

    .custom-button {
    display: inline-block;
    outline: 0;
    border: 0;
    cursor: pointer;
    background: #FCFCFD;
    box-shadow: 0px 2px 4px rgb(45 35 66 / 40%),
                0px 7px 13px -3px rgb(45 35 66 / 30%),
                inset 0px -3px 0px #d6d6e7;
    height: 48px;
    padding: 0 32px;
    font-size: 18px;
    border-radius: 6px;
    color: #36395a;
    font-weight: 600;
    transition: box-shadow 0.15s ease, transform 0.15s ease;
    will-change: box-shadow, transform;
}

.custom-button:hover {
    box-shadow: 0px 4px 8px rgb(45 35 66 / 40%),
                0px 7px 13px -3px rgb(45 35 66 / 30%),
                inset 0px -3px 0px #d6d6e7;
    transform: translateY(-2px);
}

.custom-button:active {
    box-shadow: inset 0px 3px 7px #d6d6e7;
    transform: translateY(2px);
}


    .card {
        border-radius: 20px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .glass-card {
    background: linear-gradient(135deg, rgba(247, 168, 55, 1) 0%, rgba(247, 140, 0, 1) 100%);
    backdrop-filter: blur(4px);
    -webkit-backdrop-filter: blur(6px);
    border-radius: 20px;
    box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.2);
    border: 1px solid rgba(255, 255, 255, 0.18);
    
    width: 300px;
    height: 300px;
    
    color: white;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    padding: 2rem;
}

</style>

<style>
    .nav-tabs .nav-link.active {
        background-color: #fd7e14 !important; 
        color: white !important;
        border-color: #fd7e14 #fd7e14 #fff !important;
    }
    .nav-tabs .nav-link {
        color: #fd7e14;
    }
    .nav-tabs .nav-link:hover {
        color: #e96b0c;
    }

    .navbar-nav .nav-link {
    position: relative;
    color: #fff !important;
    transition: color 0.3s ease;
}

.navbar-nav .nav-link::after {
    content: '';
    position: absolute;
    bottom: 4px;
    left: 0;
    width: 0%;
    height: 2px;
    background-color: var(--accent);
    transition: width 0.3s ease;
}

.navbar-nav .nav-link:hover::after {
    width: 100%;
}


    .custom-button-blue {
        background-color: #007bff;
        color: white;
        padding: 6px 16px;
        border: none;
        border-radius: 8px;
        font-size: 14px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .custom-button-blue:hover {
        background-color: #0069d9;
    }

    .custom-button-orange {
        background-color: #fd7e14;
        color: white;
        padding: 6px 16px;
        border: none;
        border-radius: 8px;
        font-size: 14px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .custom-button-orange:hover {
        background-color: #e96b0c;
    }
    
</style>


@stack('scripts')
</head>
<body
    @php
        $route = request()->route() ? request()->route()->getName() : '';
        $bg = '/images/background baru.jpg';
        if ($route === 'login') {
            $bg = '/images/loginumkm.jpg';
        } elseif ($route === 'register') {
            $bg = '/images/loginumkm.jpg';
        }
    @endphp
    style="background-image: url('{{ $bg }}'); background-size: cover; background-repeat: no-repeat; background-position: center center; min-height: 100vh;"
>

<nav class="navbar navbar-expand-lg sticky-top" style="background: #0070e0; z-index: 1050;">
    <div class="container-fluid px-4">
        <a class="navbar-brand d-flex align-items-center me-3" href="{{ url('/home') }}">
            <img src="{{ asset('images/logoumkm.png') }}" alt="UMKMGo Logo" style="height:56px; width:auto;">   
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNavbar">
            @guest
                <ul class="navbar-nav ms-auto align-items-center" style="font-size:1.1rem;">
                    <li class="nav-item"><a class="nav-link" style="color:#fff !important;" href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" style="color:#fff !important;" href="{{ route('register') }}">Register</a></li>
                </ul>
            @else
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0" style="font-size:1.1rem;">
                    <li class="nav-item">
                        <a class="nav-link" style="color:#fff !important;" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color:#fff !important;" href="{{ route('classes.index') }}">Academy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color:#fff !important;" href="{{ route('forum.index') }}">Forum</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto align-items-center" style="font-size:1.1rem;">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:#fff !important;">
                            <i class="bi bi-person-circle fs-4 me-2"></i>
                            <span>Halo, {{ auth()->user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            @if(auth()->user()->role === 'user')
                                <li>
                                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                        <i class="bi bi-gear me-2"></i> Edit Profil
                                    </a>
                                </li>
                            @endif
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item text-danger" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                </ul>
            @endguest
        </div>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('custom-style')
</body>
</html>
