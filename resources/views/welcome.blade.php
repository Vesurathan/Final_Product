<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
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

        <!-- Research Section -->
        <h2>Meet Our Researchers</h2>
        <div class="research-section">


            <div class="research-cards-container">
                <div class="research-card">
                    <img src="{{ asset('path-to-researcher-image.jpg') }}" alt="Researcher">
                    <h3>Dr Nuwan Kuruwitaarachchi</h3>
                    <p>Short description or bio of the researcher. Something engaging and interesting.</p>
                </div>

            </div>

            <div class="research-cards-container">
                <div class="research-card">
                    <img src="{{ asset('path-to-researcher-image.jpg') }}" alt="Researcher">
                    <h3>Dr. (Eng.) Nimal Skandhakumar</h3>
                    <p>Short description or bio of the researcher. Something engaging and interesting.</p>
                </div>

            </div>

            <div class="research-cards-container">
                <div class="research-card">
                    <img src="{{ asset('path-to-researcher-image.jpg') }}" alt="Researcher">
                    <h3>S.Vesurathan</h3>
                    <p>Short description or bio of the researcher. Something engaging and interesting.</p>
                </div>

            </div>

            <div class="research-cards-container">
                <div class="research-card">
                    <img src="{{ asset('path-to-researcher-image.jpg') }}" alt="Researcher">
                    <h3>S.Saranka</h3>
                    <p>Short description or bio of the researcher. Something engaging and interesting.</p>
                </div>

            </div>

            <div class="research-cards-container">
                <div class="research-card">
                    <img src="{{ asset('path-to-researcher-image.jpg') }}" alt="Researcher">
                    <h3>Y.P.Dulakshi</h3>
                    <p>Short description or bio of the researcher. Something engaging and interesting.</p>
                </div>

            </div>
        </div>
    </div>
</body>

</html>