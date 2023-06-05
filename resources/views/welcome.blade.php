@extends('template.landing')

@section('content')
    <section class="sec1">
        <div class="container">
            <div class="row sec1-mt">
                <div class="col-md-6 sec1-col-1 mt-5" data-aos="fade-right" data-aos-duration="1500">
                    @if (session('sukses'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <strong>{{ session('sukses') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show">
                            <strong>{{ session('error') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    <h1 class="text-primary">Selamat Datang di E-Voting HIMTIF</h1>
                    <p class="text-muted">Silahkan gunakan hak suara kalian untuk <br> menentukan ketua dan wakil HIMTIF
                        yang baru</p>
                    <div class="btn-login">
                        <a href="/verifikasi" class="btn btn-primary bg-gradient">Verifikasi NIM</a>
                        <button type="button" class="btn btn-success bg-gradient" data-bs-toggle="modal"
                            data-bs-target="#modalLogin">Login Disini</button>
                    </div>
                </div>
                <div class="col-md-6" data-aos="fade-left" data-aos-duration="1500">
                    <img src="{{ asset('assets/img/hero1.png') }}" class="img-fluid sec1-img">
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="modalLoginLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title" id="modalLoginLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/login" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                            <input type="text" name="nimuser" id="nimuser"
                                class="form-control @error('nimuser') is-invalid @enderror" placeholder="Masukan nim"
                                value="{{ old('nimuser') }}" required>
                        </div>
                        @error('nimuser')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                            <input type="text" name="kodeunikuser" id="kodeunikuser"
                                class="form-control @error('kodeunikuser') is-invalid @enderror"
                                placeholder="Masukan kode unik"required>

                        </div>
                        @error('kodeunikuser')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                            <input type="password" name="passworduser" id="passworduser"
                                class="form-control @error('passworduser') is-invalid @enderror"
                                placeholder="Masukan password"required>

                        </div>
                        @error('passworduser')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div id="loadingLogin"></div>
                        <button class="btn btn-primary bg-gradient" type="submit" id="btnLogin"
                            style="width: 100px">Login</button>
                    </form>
                </div>
            </div>
        </div>

        @if ($errors->has('nimuser') || $errors->has('passworduser'))
            <script>
                $(document).ready(function() {
                    $('#modalLogin').modal('show');
                })
            </script>
        @endif
    </div>

    <script>
        $(document).on('click', '#btnLogin', function() {
            let email = $('#nimuser').val();
            let password = $('#passworduser').val();

            if (email == '') {
                $('#nimuser').focus();
                $('#nimuser').addClass('is-invalid');
            } else if (password == '') {
                $('#passworduser').focus();
                $('#passworduser').addClass('is-invalid');
            } else {
                $('#btnLogin').addClass('d-none');
                $('#loadingLogin').html(`
                    <button class="btn btn-primary" type="button" disabled>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Loading...
                    </button>             
                `);
            }
        });
    </script>
@endsection
