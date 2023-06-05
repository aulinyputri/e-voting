<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Scada&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap CSS -->
    <link href="{{ asset('landingpage') }}/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('landingpage') }}/aos.css" />
    {{-- <link rel="stylesheet" href="{{ asset('landingpage') }}/all.min.css" /> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/mycss.css') }}">

    @yield('header')

    <script src="{{ asset('assets') }}/vendor/jquery/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
        integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('landingpage') }}/bootstrap.bundle.min.js"></script>

    <title>{{ config('app.name') }}</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="#">
                <img src="{{ asset('assets/img/himtif.png') }}" class="img-fluid" width="80">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @if (session('login') === true)
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->segment(1) == 'home' ? 'active' : '' }}"
                                aria-current="page" href="/home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->segment(1) == 'voting' ? 'active' : '' }}"
                                aria-current="page" href="/voting">Voting</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->segment(1) == 'suara' ? 'active' : '' }}"
                                aria-current="page" href="/suara">Suara</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ session('nama') }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/logoutuser">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                @else
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Contact Us
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="https://www.instagram.com/himtif_unpam/"
                                        target="_blank">Instagram</a></li>
                                <li><a class="dropdown-item"href="https://www.youtube.com/channel/UCA6ReaCM44wzSdSEeLT1smg"
                                        target="_blank">Youtube</a></li>
                                <li><a class="dropdown-item"href="https://api.whatsapp.com/send?phone={{ getWaAadmin() }}"
                                        target="_blank">Whatsapp</a></li>
                            </ul>
                        </li>
                    </ul>
                @endif
            </div>
        </div>
    </nav>

    @yield('content')


    <footer style="margin-top: 50px">
        <div class="container">
            <p class="text-secondary text-center">
                © Copyright E-Voting HIMTIF UNIVERSITAS PAMULANG</p>
        </div>
    </footer>
    <script src="{{ asset('landingpage') }}/aos.js"></script>
    <script>
        AOS.init();
    </script>
    @yield('footer')


</body>

</html>
