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

    <title>{{ config('app.name') }}</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/img/himtif.png') }}" class="img-fluid" width="80">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item active">
                        {{-- <a class="nav-link" href="#" style="font-weight: bold;">
                            HIMPUNAN MAHASISWA TEKNIK INFORMATIKA UNIVERSITAS PAMULANG
                        </a> --}}
                        <h5 class="text-center">SISTEM E-VOTING</h5>
                        <span class="text-secondary">HIMPUNAN MAHASISWA TEKNIK INFORMATIKA UNIVERSITAS PAMULANG</span>
                    </li>
                </ul>
            </div>
            <img src="{{ asset('assets/img/unpam.png') }}" class="img-fluid img-verif-unpam" width="80">
        </div>
    </nav>

    @yield('content')


    <footer style="margin-top: 50px">
        <div class="container">
            <p class="text-secondary text-center">
                © Copyright E-Voting HIMTIF UNIVERSITAS PAMULANG</p>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
        integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('landingpage') }}/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('landingpage') }}/aos.js"></script>
    <script>
        AOS.init();
    </script>
    @yield('footer')


</body>

</html>
