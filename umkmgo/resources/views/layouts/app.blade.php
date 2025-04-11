<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UMKMGo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
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
    min-height: 100vh;
}


    .navbar {
    background-color: #0d6efd; 
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); 
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

@stack('scripts')
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">
    <a class="navbar-brand fw-bold" href="{{ url('/home') }}">UMKMGo</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                @guest
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                @else

                    <a class="nav-link {{ request()->routeIs('kategori.index') ? 'active' : '' }}" href="{{ route('kategori.index') }}">Quiz</a>

                    <li class="nav-item"><a class="nav-link" href="{{ route('forum.index') }}">Forum</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

</body>
</html>
