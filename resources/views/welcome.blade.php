<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Courier Delivery Probability Prediction</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
</head>

<body class="antialiased">



    <div class="welcome-background">
        <!-- Authentication Links
        @if (Route::has('login'))
        <div class="auth-links">
            @auth
            <a href="{{ url('/home') }}" class="auth-link">Home</a>
            @else
            <a href="{{ route('login') }}" class="auth-link">Log in</a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="auth-link">Register</a>
            @endif
            @endauth
        </div>
        @endif -->
        <div class="bgimg" style="margin-top: 150px;">
            <a href="{{ url('/') }}" class="text-nowrap logo-img text-center d-block py-3 w-100">
                <img src="{{ asset('assets/images/logos/dark-logo.svg') }}" width="500" alt="">
            </a>

        </div>
        <!-- Welcome Message -->
        <div class="welcome-container">
            <div class="welcome-content">
                <h1>Welcome to Our Research</h1>
                <p>Join our community and explore the endless possibilities.</p>
                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="welcome-button">Get Started</a>
                @endif
            </div>
        </div>
        </div>
    </div>
</body>

</html>
