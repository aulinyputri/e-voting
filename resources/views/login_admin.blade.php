<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ config('app.name') }} - Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets') }}/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container mt-5">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-md-5">
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session('error') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img src="{{ asset('assets/img/himtif.png') }}" width="65"
                                            style="margin-top: -40px">
                                        <h1 class="h4 text-gray-900 mb-4 mt-1">Selamat Datang Admin</h1>
                                    </div>
                                    <form action="/admin/proseslogin" class="user" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" name="email"
                                                class="form-control form-control-user @error('email') is-invalid @enderror"
                                                id="email" placeholder="Masukan Email" value="{{ old('email') }}"
                                                required>
                                            @error('email')
                                                <span class="text-danger ml-3">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password"
                                                class="form-control form-control-user @error('password') is-invalid @enderror"
                                                id="password" placeholder="Password" required>
                                            @error('password')
                                                <span class="text-danger ml-3">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div id="loadingLogin"></div>
                                        <button type="submit"
                                            class="btn bg-gradient-primary text-white btn-user btn-block"
                                            id="btnLogin">
                                            Login
                                        </button>
                                    </form>
                                </div>
                                {{-- <p class="small text-center text-secondary" style="margin-top: -20px">&copy; E-VOTING
                                    SMK AS - SAABIQ SINGAPARNA
                                    {{ date('Y') }}</p> --}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets') }}/js/sb-admin-2.min.js"></script>

    <script>
        $(document).on('click', '#btnLogin', function() {
            let email = $('#email').val();
            let password = $('#password').val();

            if (email == '') {
                $('#email').focus();
                $('#email').addClass('is-invalid');
            } else if (password == '') {
                $('#password').focus();
                $('#password').addClass('is-invalid');
            } else {
                $('#btnLogin').addClass('d-none');
                $('#loadingLogin').html(`
                <button class="btn bg-gradient-primary text-white btn-user btn-block" type="button" disabled>
                    <span class="spinner-border spinner-border-sm"></span>
                    Loading...
                </button>
               `);
            }
        });
    </script>

</body>

</html>
